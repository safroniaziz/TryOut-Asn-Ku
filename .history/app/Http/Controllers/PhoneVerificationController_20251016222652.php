<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhoneVerification;
use App\Models\User;
use App\Services\WhatsAppService;
use App\Services\ActivityLogService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Cache;

class PhoneVerificationController extends Controller
{
    /**
     * Send OTP to phone number via WhatsApp
     */
    public function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp harus diisi'
            ], 400);
        }

        $phoneNumber = $request->phone_number;

        // Rate limiting - maksimal 5 request per nomor per 3 menit
        $rateLimitKey = 'otp_send:' . $phoneNumber;
        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);
            return response()->json([
                'success' => false,
                'message' => "Terlalu banyak permintaan OTP. Coba lagi dalam " . ceil($seconds / 60) . " menit."
            ], 429);
        }

        // Rate limiting global - maksimal 30 OTP per IP per jam
        $globalRateKey = 'otp_global:' . $request->ip();
        if (RateLimiter::tooManyAttempts($globalRateKey, 30)) {
            return response()->json([
                'success' => false,
                'message' => "Batas pengiriman OTP tercapai. Coba lagi nanti."
            ], 429);
        }

        // Validasi format nomor HP Indonesia
        if (!WhatsAppService::validatePhoneNumber($phoneNumber)) {
            return response()->json([
                'success' => false,
                'message' => 'Format nomor WhatsApp tidak valid. Gunakan format nomor Indonesia (08xx atau 62xx)'
            ], 400);
        }

        // Cek apakah nomor HP sudah terdaftar
        if (User::where('phone_number', $phoneNumber)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp sudah terdaftar, silakan gunakan nomor lain'
            ], 400);
        }

        // Cek apakah ada OTP yang masih valid untuk nomor ini
        $existingVerification = PhoneVerification::where('phone_number', $phoneNumber)
            ->where('expires_at', '>', now())
            ->where('is_verified', false)
            ->first();

        if ($existingVerification) {
            // Masih ada OTP yang valid, tidak perlu kirim ulang
            $remainingTime = $existingVerification->expires_at->diffInMinutes(now());

            return response()->json([
                'success' => true,
                'message' => "Kode OTP masih berlaku. Silakan cek WhatsApp Anda atau tunggu {$remainingTime} menit untuk meminta kode baru.",
                'expires_at' => $existingVerification->expires_at->timestamp,
                'debug_otp' => config('app.debug') ? $existingVerification->otp_code : null,
                'reuse_existing' => true
            ]);
        }

        // Cek apakah nomor sudah pernah diverifikasi tapi belum register
        $verifiedButNotRegistered = PhoneVerification::where('phone_number', $phoneNumber)
            ->where('is_verified', true)
            ->whereDoesntHave('user') // Belum ada user yang menggunakan nomor ini
            ->first();

        if ($verifiedButNotRegistered) {
            // Nomor sudah diverifikasi, bisa langsung lanjut tanpa OTP lagi
            return response()->json([
                'success' => true,
                'message' => 'Nomor WhatsApp sudah terverifikasi sebelumnya. Anda dapat melanjutkan pendaftaran.',
                'already_verified' => true,
                'verification_id' => $verifiedButNotRegistered->id
            ]);
        }

        try {
            // Generate dan simpan OTP
            $verification = PhoneVerification::createOTP($phoneNumber);

            // Log OTP untuk development
            Log::info("OTP untuk nomor {$phoneNumber}: {$verification->otp_code}");

            // Kirim WhatsApp OTP
            $whatsappResult = WhatsAppService::sendOTP($phoneNumber, $verification->otp_code);

            if ($whatsappResult['success']) {
                // Hit rate limiter setelah berhasil kirim
                RateLimiter::hit($rateLimitKey, 180); // 3 menit
                RateLimiter::hit($globalRateKey, 3600); // 1 jam

                // Log successful OTP sending
                ActivityLogService::logOTPSent($phoneNumber, true);

                return response()->json([
                    'success' => true,
                    'message' => 'Kode OTP berhasil dikirim ke WhatsApp Anda.',
                    'expires_at' => $verification->expires_at->timestamp, // Unix timestamp untuk countdown
                    'debug_otp' => config('app.debug') ? $verification->otp_code : null // Hanya tampil di development
                ]);
            } else {
                // Hapus OTP jika gagal dikirim
                $verification->delete();

                // Log failed OTP sending
                ActivityLogService::logOTPSent($phoneNumber, false, $whatsappResult['error'] ?? 'Unknown error');

                Log::error("Failed to send WhatsApp OTP", $whatsappResult);

                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim kode OTP ke WhatsApp. Silakan coba lagi.',
                    'error' => $whatsappResult['error'] ?? 'Unknown error'
                ], 500);
            }

        } catch (\Exception $e) {
            // Log exception
            ActivityLogService::logOTPSent($phoneNumber, false, $e->getMessage());
            
            Log::error("Error sending OTP: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim kode OTP. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Verify OTP
     */
    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string',
            'otp_code' => 'required|string|size:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp dan kode OTP harus diisi dengan benar'
            ], 400);
        }

        $phoneNumber = $request->phone_number;
        $otpCode = $request->otp_code;

        if (PhoneVerification::verifyOTP($phoneNumber, $otpCode)) {
            return response()->json([
                'success' => true,
                'message' => 'Nomor WhatsApp berhasil diverifikasi!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP tidak valid atau sudah kadaluarsa'
            ], 400);
        }
    }

    /**
     * Check if phone number is verified
     */
    public function checkVerification(Request $request)
    {
        $phoneNumber = $request->phone_number;

        if (!$phoneNumber) {
            return response()->json([
                'success' => false,
                'verified' => false
            ]);
        }

        $isVerified = PhoneVerification::isPhoneVerified($phoneNumber);

        return response()->json([
            'success' => true,
            'verified' => $isVerified
        ]);
    }

    /**
     * Resend OTP
     */
    public function resendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp harus diisi'
            ], 400);
        }

        $phoneNumber = $request->phone_number;

        // Cek apakah ada OTP yang masih berlaku
        $existingOTP = PhoneVerification::getLatestOTP($phoneNumber);
        if ($existingOTP && $existingOTP->created_at->diffInMinutes(now()) < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Harap tunggu 1 menit sebelum meminta OTP kembali'
            ], 429);
        }

        // Panggil ulang sendOTP
        return $this->sendOTP($request);
    }
}

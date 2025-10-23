<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhoneVerification;
use App\Models\User;
use App\Services\WhatsAppService;
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

        // Rate limiting - maksimal 3 request per nomor per 5 menit
        $rateLimitKey = 'otp_send:' . $phoneNumber;
        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);
            return response()->json([
                'success' => false,
                'message' => "Terlalu banyak permintaan OTP. Coba lagi dalam " . ceil($seconds / 60) . " menit."
            ], 429);
        }

        // Rate limiting global - maksimal 10 OTP per IP per jam
        $globalRateKey = 'otp_global:' . $request->ip();
        if (RateLimiter::tooManyAttempts($globalRateKey, 10)) {
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

        try {
            // Generate dan simpan OTP
            $verification = PhoneVerification::createOTP($phoneNumber);

            // Log OTP untuk development
            Log::info("OTP untuk nomor {$phoneNumber}: {$verification->otp_code}");

            // Kirim WhatsApp OTP
            $whatsappResult = WhatsAppService::sendOTP($phoneNumber, $verification->otp_code);

            if ($whatsappResult['success']) {
                // Hit rate limiter setelah berhasil kirim
                RateLimiter::hit($rateLimitKey, 300); // 5 menit
                RateLimiter::hit($globalRateKey, 3600); // 1 jam

                return response()->json([
                    'success' => true,
                    'message' => 'Kode OTP berhasil dikirim ke WhatsApp Anda.',
                    'expires_at' => $verification->expires_at->timestamp, // Unix timestamp untuk countdown
                    'debug_otp' => config('app.debug') ? $verification->otp_code : null // Hanya tampil di development
                ]);
            } else {
                // Hapus OTP jika gagal dikirim
                $verification->delete();

                Log::error("Failed to send WhatsApp OTP", $whatsappResult);

                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim kode OTP ke WhatsApp. Silakan coba lagi.',
                    'error' => $whatsappResult['error'] ?? 'Unknown error'
                ], 500);
            }

        } catch (\Exception $e) {
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

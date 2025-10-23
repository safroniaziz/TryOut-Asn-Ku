<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailVerification; // Reuse same model for phone verification
use App\Models\User;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class WhatsAppVerificationController extends Controller
{
    /**
     * Send OTP to WhatsApp
     */
    public function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|min:10|max:15'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Format nomor WhatsApp tidak valid'
            ], 400);
        }

        $phone = $request->phone;

        // Validate phone format
        if (!WhatsAppService::validatePhoneNumber($phone)) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp tidak valid. Gunakan format Indonesia (08xxx)'
            ], 400);
        }

        // Cek apakah phone sudah terdaftar
        if (User::where('phone', $phone)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp sudah terdaftar, silakan gunakan nomor lain'
            ], 400);
        }

        try {
            // Generate dan simpan OTP (reuse EmailVerification model)
            $verification = EmailVerification::createOTP($phone); // Use phone instead of email
            
            // Kirim WhatsApp OTP
            $result = WhatsAppService::sendOTP($phone, $verification->otp_code);
            
            if ($result['success']) {
                Log::info("WhatsApp OTP sent successfully to {$phone}");
                
                return response()->json([
                    'success' => true,
                    'message' => 'Kode OTP berhasil dikirim ke WhatsApp Anda.',
                    'expires_at' => $verification->expires_at->timestamp,
                    'debug_otp' => $verification->otp_code // Hapus ini di production
                ]);
            } else {
                Log::error("Failed to send WhatsApp OTP to {$phone}: " . ($result['error'] ?? 'Unknown error'));
                
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim kode OTP. Silakan coba lagi atau gunakan metode lain.'
                ], 500);
            }

        } catch (\Exception $e) {
            Log::error("WhatsApp OTP error: " . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Verify WhatsApp OTP
     */
    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'otp_code' => 'required|string|size:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor WhatsApp dan kode OTP harus diisi dengan benar'
            ], 400);
        }

        $phone = $request->phone;
        $otpCode = $request->otp_code;

        if (EmailVerification::verifyOTP($phone, $otpCode)) {
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
     * Check if phone is verified
     */
    public function checkVerification(Request $request)
    {
        $phone = $request->phone;
        
        if (!$phone) {
            return response()->json([
                'success' => false,
                'verified' => false
            ]);
        }

        $isVerified = EmailVerification::isEmailVerified($phone); // Reuse method
        
        return response()->json([
            'success' => true,
            'verified' => $isVerified
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmailVerificationController extends Controller
{
    /**
     * Send OTP to email
     */
    public function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Format email tidak valid'
            ], 400);
        }

        $email = $request->email;

        // Cek apakah email sudah terdaftar
        if (User::where('email', $email)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Email sudah terdaftar, silakan gunakan email lain'
            ], 400);
        }

        try {
            // Generate dan simpan OTP
            $verification = EmailVerification::createOTP($email);
            
            // Kirim email OTP (sementara kita log saja untuk testing)
            Log::info("OTP untuk email {$email}: {$verification->otp_code}");
            
            // TODO: Uncomment ini untuk kirim email sungguhan
            /*
            Mail::send('emails.otp', [
                'otp_code' => $verification->otp_code,
                'email' => $email
            ], function($message) use ($email) {
                $message->to($email)->subject('Kode Verifikasi Email - ASN Ku');
            });
            */

            return response()->json([
                'success' => true,
                'message' => 'Kode OTP berhasil dikirim ke email Anda. Silakan cek email Anda.',
                'debug_otp' => $verification->otp_code // Hapus ini di production
            ]);

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
            'email' => 'required|email',
            'otp_code' => 'required|string|size:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Email dan kode OTP harus diisi dengan benar'
            ], 400);
        }

        $email = $request->email;
        $otpCode = $request->otp_code;

        if (EmailVerification::verifyOTP($email, $otpCode)) {
            return response()->json([
                'success' => true,
                'message' => 'Email berhasil diverifikasi!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP tidak valid atau sudah kadaluarsa'
            ], 400);
        }
    }

    /**
     * Check if email is verified
     */
    public function checkVerification(Request $request)
    {
        $email = $request->email;
        
        if (!$email) {
            return response()->json([
                'success' => false,
                'verified' => false
            ]);
        }

        $isVerified = EmailVerification::isEmailVerified($email);
        
        return response()->json([
            'success' => true,
            'verified' => $isVerified
        ]);
    }
}

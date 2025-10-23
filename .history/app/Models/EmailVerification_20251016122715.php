<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EmailVerification extends Model
{
    protected $fillable = [
        'email',
        'otp_code',
        'expires_at',
        'is_verified'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    /**
     * Generate OTP code (6 digit)
     */
    public static function generateOTP()
    {
        return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Create new OTP for email
     */
    public static function createOTP($email)
    {
        // Hapus OTP lama yang belum verified
        static::where('email', $email)->where('is_verified', false)->delete();

        $otp = static::generateOTP();

        return static::create([
            'email' => $email,
            'otp_code' => $otp,
            'expires_at' => Carbon::now()->addMinutes(3), // OTP berlaku 3 menit
            'is_verified' => false,
        ]);
    }

    /**
     * Verify OTP
     */
    public static function verifyOTP($email, $otpCode)
    {
        $verification = static::where('email', $email)
            ->where('otp_code', $otpCode)
            ->where('is_verified', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if ($verification) {
            $verification->update(['is_verified' => true]);
            return true;
        }

        return false;
    }

    /**
     * Check if email is verified
     */
    public static function isEmailVerified($email)
    {
        return static::where('email', $email)
            ->where('is_verified', true)
            ->where('expires_at', '>', Carbon::now())
            ->exists();
    }
}

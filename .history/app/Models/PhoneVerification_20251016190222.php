<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PhoneVerification extends Model
{
    protected $fillable = [
        'phone_number',
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
        return str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Create new OTP for phone number
     */
    public static function createOTP($phoneNumber)
    {
        // Hapus OTP lama yang belum verified
        static::where('phone_number', $phoneNumber)->where('is_verified', false)->delete();

        $otp = static::generateOTP();

        return static::create([
            'phone_number' => $phoneNumber,
            'otp_code' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10), // OTP berlaku 10 menit
            'is_verified' => false,
        ]);
    }

    /**
     * Verify OTP
     */
    public static function verifyOTP($phoneNumber, $otpCode)
    {
        $verification = static::where('phone_number', $phoneNumber)
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
     * Check if phone number is verified
     */
    public static function isPhoneVerified($phoneNumber)
    {
        return static::where('phone_number', $phoneNumber)
            ->where('is_verified', true)
            ->where('expires_at', '>', Carbon::now())
            ->exists();
    }

    /**
     * Get latest OTP for phone number
     */
    public static function getLatestOTP($phoneNumber)
    {
        return static::where('phone_number', $phoneNumber)
            ->where('is_verified', false)
            ->where('expires_at', '>', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->first();
    }
}

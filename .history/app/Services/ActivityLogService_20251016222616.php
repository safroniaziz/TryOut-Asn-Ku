<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogService
{
    /**
     * Log WhatsApp OTP sending activity
     */
    public static function logOTPSent($phoneNumber, $success = true, $error = null)
    {
        $properties = [
            'phone_number' => $phoneNumber,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'success' => $success
        ];

        if ($error) {
            $properties['error'] = $error;
        }

        activity('otp')
            ->withProperties($properties)
            ->log($success ? 'WhatsApp OTP sent successfully' : 'Failed to send WhatsApp OTP');
    }

    /**
     * Log OTP verification activity
     */
    public static function logOTPVerified($phoneNumber, $success = true, $attempts = 1)
    {
        $properties = [
            'phone_number' => $phoneNumber,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'success' => $success,
            'attempts' => $attempts
        ];

        activity('otp')
            ->withProperties($properties)
            ->log($success ? 'WhatsApp OTP verified successfully' : 'Failed to verify WhatsApp OTP');
    }

    /**
     * Log user registration activity
     */
    public static function logUserRegistration($user, $additionalData = [])
    {
        $properties = [
            'user_id' => $user->id,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'registration_step' => 'completed'
        ];

        if (!empty($additionalData)) {
            $properties = array_merge($properties, $additionalData);
        }

        activity('registration')
            ->performedOn($user)
            ->withProperties($properties)
            ->log('User registration completed');
    }

    /**
     * Log user login activity
     */
    public static function logUserLogin($user, $success = true, $method = 'email')
    {
        $properties = [
            'user_id' => $user->id,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'login_method' => $method,
            'success' => $success
        ];

        activity('authentication')
            ->performedOn($user)
            ->withProperties($properties)
            ->log($success ? 'User logged in successfully' : 'Failed login attempt');
    }

    /**
     * Log user logout activity
     */
    public static function logUserLogout($user)
    {
        $properties = [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent()
        ];

        activity('authentication')
            ->causedBy($user)
            ->performedOn($user)
            ->withProperties($properties)
            ->log('User logged out');
    }

    /**
     * Log registration step progress
     */
    public static function logRegistrationStep($step, $data = [], $phoneNumber = null)
    {
        $properties = [
            'step' => $step,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'timestamp' => now()
        ];

        if ($phoneNumber) {
            $properties['phone_number'] = $phoneNumber;
        }

        if (!empty($data)) {
            $properties['form_data'] = $data;
        }

        activity('registration')
            ->withProperties($properties)
            ->log("Registration step {$step} completed");
    }

    /**
     * Log password reset activity
     */
    public static function logPasswordReset($email, $success = true)
    {
        $properties = [
            'email' => $email,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'success' => $success
        ];

        activity('authentication')
            ->withProperties($properties)
            ->log($success ? 'Password reset successful' : 'Password reset failed');
    }

    /**
     * Log referral usage
     */
    public static function logReferralUsed($referralCode, $newUserId, $referrerId)
    {
        $properties = [
            'referral_code' => $referralCode,
            'new_user_id' => $newUserId,
            'referrer_id' => $referrerId,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent()
        ];

        activity('referral')
            ->withProperties($properties)
            ->log('Referral code used during registration');
    }

    /**
     * Log suspicious activity
     */
    public static function logSuspiciousActivity($description, $data = [])
    {
        $properties = [
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'timestamp' => now(),
            'data' => $data
        ];

        if (Auth::check()) {
            $properties['user_id'] = Auth::id();
        }

        activity('security')
            ->withProperties($properties)
            ->log("Suspicious activity: {$description}");
    }

    /**
     * Log rate limit exceeded
     */
    public static function logRateLimitExceeded($type, $identifier, $limit)
    {
        $properties = [
            'type' => $type,
            'identifier' => $identifier,
            'limit' => $limit,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent()
        ];

        activity('security')
            ->withProperties($properties)
            ->log("Rate limit exceeded for {$type}");
    }

    /**
     * Get activity logs for a specific user
     */
    public static function getUserActivities($userId, $limit = 50)
    {
        return Activity::where('causer_id', $userId)
            ->orWhere('subject_id', $userId)
            ->orWhere('properties->user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get recent activities
     */
    public static function getRecentActivities($limit = 100)
    {
        return Activity::orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
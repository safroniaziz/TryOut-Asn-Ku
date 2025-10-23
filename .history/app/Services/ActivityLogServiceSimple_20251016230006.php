<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogService
{
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
     * Log any authenticated user activity (after login)
     */
    public static function logAuthenticatedActivity($description, $subject = null, $properties = [])
    {
        if (!Auth::check()) {
            return; // Only log if user is authenticated
        }

        $user = Auth::user();
        $defaultProperties = [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'timestamp' => now()
        ];

        $allProperties = array_merge($defaultProperties, $properties);

        $activityLog = activity('user_activity')
            ->causedBy($user)
            ->withProperties($allProperties);

        if ($subject) {
            $activityLog->performedOn($subject);
        }

        $activityLog->log($description);
    }

    /**
     * Log referral usage during registration
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

    /**
     * Get authentication logs (register/login)
     */
    public static function getAuthLogs($limit = 100)
    {
        return Activity::whereIn('log_name', ['registration', 'authentication'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get user activity logs (after login activities)
     */
    public static function getUserActivityLogs($limit = 100)
    {
        return Activity::where('log_name', 'user_activity')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
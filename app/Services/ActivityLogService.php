<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;

class ActivityLogService
{
    /**
     * Check if logging is enabled
     */
    private static function isLoggingEnabled(): bool
    {
        return config('app.activity_logging_enabled', true);
    }

    /**
     * Log user registration activity
     */
    public static function logUserRegistration($user, $additionalData = [])
    {
        if (!self::isLoggingEnabled()) return;

        try {
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
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties($properties)
                ->log('Pendaftaran pengguna berhasil diselesaikan');
        } catch (\Exception $e) {
            Log::warning('Activity logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Log user login activity
     */
    public static function logUserLogin($user, $success = true, $method = 'email')
    {
        if (!self::isLoggingEnabled()) return;

        try {
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
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties($properties)
                ->log($success ? 'Pengguna berhasil masuk' : 'Percobaan masuk gagal');
        } catch (\Exception $e) {
            Log::warning('Activity logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Log user logout activity
     */
    public static function logUserLogout($user)
    {
        if (!self::isLoggingEnabled()) return;

        try {
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
                ->log('Pengguna keluar dari sistem');
        } catch (\Exception $e) {
            Log::warning('Activity logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Log authenticated user activity (optimized for shared hosting)
     */
    public static function logAuthenticatedActivity($user, $description, $properties = [])
    {
        if (!self::isLoggingEnabled() || !Auth::check()) {
            return;
        }

        try {
            $defaultProperties = [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
                'timestamp' => now()
            ];

            $allProperties = array_merge($defaultProperties, $properties);

            activity('user_activity')
                ->causedBy($user)
                ->withProperties($allProperties)
                ->log($description);
        } catch (\Exception $e) {
            Log::warning('Activity logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Log referral usage during registration
     */
    public static function logReferralUsed($referralCode, $newUserId, $referrerId)
    {
        if (!self::isLoggingEnabled()) return;

        try {
            $properties = [
                'referral_code' => $referralCode,
                'new_user_id' => $newUserId,
                'referrer_id' => $referrerId,
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent()
            ];

            activity('referral')
                ->causedBy(Auth::user())
                ->withProperties($properties)
                ->log('Kode referral digunakan saat pendaftaran');
        } catch (\Exception $e) {
            Log::warning('Activity logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Get recent activities with complete data
     */
    public static function getRecentActivities($limit = 100)
    {
        return Activity::select([
                'id', 'log_name', 'description', 'subject_type', 'subject_id',
                'causer_type', 'causer_id', 'properties', 'batch_uuid', 'event',
                'created_at'
            ])
            ->with(['causer:id,name,email'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get()
            ->map(function($activity) {
                return [
                    'id' => $activity->id,
                    'type' => $activity->log_name,
                    'description' => $activity->description,
                    'event' => $activity->event,
                    'user' => [
                        'id' => $activity->causer?->id,
                        'name' => $activity->causer?->name ?? 'System',
                        'email' => $activity->causer?->email,
                    ],
                    'properties' => $activity->properties,
                    'ip_address' => $activity->properties['ip_address'] ?? null,
                    'user_agent' => $activity->properties['user_agent'] ?? null,
                    'url' => $activity->properties['url'] ?? null,
                    'method' => $activity->properties['method'] ?? null,
                    'route' => $activity->properties['route'] ?? null,
                    'created_at' => $activity->created_at->format('Y-m-d H:i:s'),
                    'created_at_human' => $activity->created_at->diffForHumans(),
                ];
            });
    }

    /**
     * Get activity statistics for dashboard
     */
    public static function getActivityStats()
    {
        $today = now()->startOfDay();
        $thisWeek = now()->startOfWeek();
        $thisMonth = now()->startOfMonth();

        return [
            'total_activities' => Activity::count(),
            'today_activities' => Activity::where('created_at', '>=', $today)->count(),
            'this_week_activities' => Activity::where('created_at', '>=', $thisWeek)->count(),
            'this_month_activities' => Activity::where('created_at', '>=', $thisMonth)->count(),
            'auth_activities' => Activity::whereIn('log_name', ['registration', 'authentication'])->count(),
            'user_activities' => Activity::where('log_name', 'user_activity')->count(),
        ];
    }

    /**
     * Get authentication related logs (registration, login, logout)
     */
    public static function getAuthLogs($limit = 50)
    {
        return Activity::whereIn('log_name', ['registration', 'authentication'])
            ->with(['causer:id,name,email'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get user activity logs (post-login activities)
     */
    public static function getUserActivityLogs($limit = 100)
    {
        return Activity::where('log_name', 'user_activity')
            ->with(['causer:id,name,email', 'subject'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get activities for a specific user
     */
    public static function getUserActivities($userId, $limit = 50)
    {
        return Activity::where('causer_id', $userId)
            ->where('causer_type', 'App\\Models\\User')
            ->with(['subject'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get paginated activities with filters
     */
    public static function getPaginatedActivities($filters = [], $perPage = 20)
    {
        $query = Activity::with(['causer:id,name,email', 'subject'])
            ->orderBy('created_at', 'desc');

        // Apply filters
        if (!empty($filters['log_name'])) {
            $query->where('log_name', $filters['log_name']);
        }

        if (!empty($filters['user_id'])) {
            $query->where('causer_id', $filters['user_id']);
        }

        if (!empty($filters['date_from'])) {
            $query->whereDate('created_at', '>=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $query->whereDate('created_at', '<=', $filters['date_to']);
        }

        if (!empty($filters['search'])) {
            $query->where('description', 'like', '%' . $filters['search'] . '%');
        }

        return $query->paginate($perPage);
    }

    /**
     * Clean up old logs (shared hosting friendly)
     */
    public static function cleanup($days = 30)
    {
        try {
            $cutoff = now()->subDays($days);
            $deleted = Activity::where('created_at', '<', $cutoff)->delete();

            return [
                'success' => true,
                'deleted' => $deleted,
                'message' => "Deleted {$deleted} old activity logs"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Cleanup failed: ' . $e->getMessage()
            ];
        }
    }
}

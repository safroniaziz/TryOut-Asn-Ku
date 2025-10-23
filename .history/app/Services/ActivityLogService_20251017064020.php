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
            ->log('Pendaftaran pengguna berhasil diselesaikan');
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
     * Get activity logs for a specific user with optimized query
     */
    public static function getUserActivities($userId, $limit = 50)
    {
        return Activity::select([
                'id', 'log_name', 'description', 'subject_type', 'subject_id',
                'causer_type', 'causer_id', 'properties', 'batch_uuid', 'event',
                'created_at'
            ])
            ->where(function($query) use ($userId) {
                $query->where('causer_id', $userId)
                      ->orWhere('subject_id', $userId);
            })
            ->with(['causer:id,name,email', 'subject'])
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
                        'name' => $activity->causer?->name,
                        'email' => $activity->causer?->email,
                    ],
                    'properties' => $activity->properties,
                    'ip_address' => $activity->properties['ip_address'] ?? null,
                    'user_agent' => $activity->properties['user_agent'] ?? null,
                    'url' => $activity->properties['url'] ?? null,
                    'method' => $activity->properties['method'] ?? null,
                    'created_at' => $activity->created_at->format('Y-m-d H:i:s'),
                    'created_at_human' => $activity->created_at->diffForHumans(),
                ];
            });
    }

    /**
     * Get recent activities with optimized query and complete data
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
     * Get authentication logs (register/login) with optimized query
     */
    public static function getAuthLogs($limit = 100)
    {
        return Activity::select([
                'id', 'log_name', 'description', 'causer_type', 'causer_id',
                'properties', 'event', 'created_at'
            ])
            ->whereIn('log_name', ['registration', 'authentication'])
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
                    'login_method' => $activity->properties['method'] ?? null,
                    'success' => $activity->properties['success'] ?? null,
                    'ip_address' => $activity->properties['ip_address'] ?? null,
                    'user_agent' => $activity->properties['user_agent'] ?? null,
                    'created_at' => $activity->created_at->format('Y-m-d H:i:s'),
                    'created_at_human' => $activity->created_at->diffForHumans(),
                ];
            });
    }

    /**
     * Get user activity logs (after login activities) with optimized query
     */
    public static function getUserActivityLogs($limit = 100)
    {
        return Activity::select([
                'id', 'log_name', 'description', 'causer_type', 'causer_id',
                'properties', 'event', 'created_at'
            ])
            ->where('log_name', 'user_activity')
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
                        'name' => $activity->causer?->name,
                        'email' => $activity->causer?->email,
                    ],
                    'url' => $activity->properties['url'] ?? null,
                    'method' => $activity->properties['method'] ?? null,
                    'route' => $activity->properties['route'] ?? null,
                    'ip_address' => $activity->properties['ip_address'] ?? null,
                    'user_agent' => $activity->properties['user_agent'] ?? null,
                    'response_status' => $activity->properties['response_status'] ?? null,
                    'created_at' => $activity->created_at->format('Y-m-d H:i:s'),
                    'created_at_human' => $activity->created_at->diffForHumans(),
                ];
            });
    }

    /**
     * Get paginated activities with filters for dashboard
     */
    public static function getPaginatedActivities($filters = [], $perPage = 20)
    {
        $query = Activity::select([
                'id', 'log_name', 'description', 'subject_type', 'subject_id',
                'causer_type', 'causer_id', 'properties', 'batch_uuid', 'event',
                'created_at'
            ])
            ->with(['causer:id,name,email']);

        // Apply filters
        if (!empty($filters['type'])) {
            $query->where('log_name', $filters['type']);
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
            $query->where(function($q) use ($filters) {
                $q->where('description', 'LIKE', '%' . $filters['search'] . '%')
                  ->orWhere('properties->url', 'LIKE', '%' . $filters['search'] . '%');
            });
        }

        return $query->orderBy('created_at', 'desc')
                    ->paginate($perPage)
                    ->through(function($activity) {
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
            'top_users' => Activity::select('causer_id')
                ->selectRaw('COUNT(*) as activity_count')
                ->with(['causer:id,name,email'])
                ->whereNotNull('causer_id')
                ->groupBy('causer_id')
                ->orderBy('activity_count', 'desc')
                ->limit(5)
                ->get()
                ->map(function($item) {
                    return [
                        'user' => [
                            'id' => $item->causer?->id,
                            'name' => $item->causer?->name,
                            'email' => $item->causer?->email,
                        ],
                        'activity_count' => $item->activity_count
                    ];
                }),
        ];
    }
}

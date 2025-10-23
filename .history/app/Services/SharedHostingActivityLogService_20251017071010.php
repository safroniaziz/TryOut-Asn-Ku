<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;

class SharedHostingActivityLogService
{
    /**
     * Check if we should log based on shared hosting limitations
     */
    private static function shouldLog(): bool
    {
        // Don't log if disabled in config
        if (!config('app.activity_logging_enabled', true)) {
            return false;
        }

        // Don't log during high traffic periods (optional)
        if (config('app.activity_logging_high_traffic_mode', false)) {
            return false;
        }

        return true;
    }

    /**
     * Log only essential activities for shared hosting
     */
    public static function logEssentialActivity($logName, $description, $user = null, $properties = [])
    {
        if (!self::shouldLog()) {
            return;
        }

        try {
            $user = $user ?? Auth::user();
            
            // Minimal properties for shared hosting
            $essentialProperties = [
                'user_id' => $user?->id,
                'ip_address' => Request::ip(),
                'timestamp' => now()->format('Y-m-d H:i:s')
            ];

            // Merge with additional properties (limit size)
            $allProperties = array_merge($essentialProperties, array_slice($properties, 0, 5));

            activity($logName)
                ->causedBy($user)
                ->withProperties($allProperties)
                ->log($description);

        } catch (\Exception $e) {
            // Fail silently in shared hosting to avoid breaking app
            \Log::warning('Activity logging failed: ' . $e->getMessage());
        }
    }

    /**
     * Log authentication events (high priority)
     */
    public static function logAuth($description, $user, $success = true, $method = 'email')
    {
        self::logEssentialActivity('authentication', $description, $user, [
            'success' => $success,
            'method' => $method
        ]);
    }

    /**
     * Log critical business events (medium priority)
     */
    public static function logCritical($description, $properties = [])
    {
        self::logEssentialActivity('critical', $description, null, $properties);
    }

    /**
     * Log user actions (low priority - only if needed)
     */
    public static function logUserAction($description, $properties = [])
    {
        // Only log if explicitly enabled
        if (!config('app.log_user_actions', false)) {
            return;
        }

        self::logEssentialActivity('user_action', $description, null, $properties);
    }

    /**
     * Cleanup old logs (for shared hosting cron job)
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

    /**
     * Get basic stats for shared hosting
     */
    public static function getBasicStats()
    {
        try {
            return [
                'total_logs' => Activity::count(),
                'today_logs' => Activity::whereDate('created_at', today())->count(),
                'week_logs' => Activity::where('created_at', '>=', now()->subWeek())->count(),
                'db_size_mb' => self::getTableSizeMB()
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Get approximate table size
     */
    private static function getTableSizeMB()
    {
        try {
            $result = \DB::select("SELECT 
                ROUND(((data_length + index_length) / 1024 / 1024), 2) AS size_mb 
                FROM information_schema.TABLES 
                WHERE table_schema = DATABASE() 
                AND table_name = 'activity_log'");
            
            return $result[0]->size_mb ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
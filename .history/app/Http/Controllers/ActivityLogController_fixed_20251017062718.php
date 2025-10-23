<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Services\ActivityLogService;

class ActivityLogController extends Controller
{
    /**
     * Display activity logs dashboard
     */
    public function index(Request $request)
    {
        // Get filters from request
        $filters = [
            'type' => $request->filled('type') ? $request->type : null,
            'user_id' => $request->filled('user_id') ? $request->user_id : null,
            'date_from' => $request->filled('date_from') ? $request->date_from : null,
            'date_to' => $request->filled('date_to') ? $request->date_to : null,
            'search' => $request->filled('search') ? $request->search : null,
        ];

        // Get paginated activities with filters
        $activities = ActivityLogService::getPaginatedActivities($filters, 20);

        // Get statistics
        $stats = ActivityLogService::getActivityStats();

        // Get activity types for filter dropdown
        $activityTypes = Activity::select('log_name')
                               ->distinct()
                               ->pluck('log_name')
                               ->filter()
                               ->sort()
                               ->values();

        return view('admin.activity-logs', compact('activities', 'stats', 'activityTypes', 'filters'));
    }

    /**
     * Get activity logs for specific user
     */
    public function userLogs($userId)
    {
        $activities = ActivityLogService::getUserActivities($userId, 100);
        
        return response()->json([
            'success' => true,
            'activities' => $activities
        ]);
    }

    /**
     * Get recent activities (API endpoint)
     */
    public function recent()
    {
        $activities = ActivityLogService::getRecentActivities(20);
        
        return response()->json([
            'success' => true,
            'activities' => $activities
        ]);
    }

    /**
     * Get authentication logs (API endpoint)
     */
    public function authLogs()
    {
        $activities = ActivityLogService::getAuthLogs(50);
        
        return response()->json([
            'success' => true,
            'activities' => $activities
        ]);
    }

    /**
     * Get user activity logs (API endpoint)
     */
    public function userActivityLogs()
    {
        $activities = ActivityLogService::getUserActivityLogs(50);
        
        return response()->json([
            'success' => true,
            'activities' => $activities
        ]);
    }

    /**
     * Export activity logs
     */
    public function export(Request $request)
    {
        // Get filters from request
        $filters = [
            'type' => $request->filled('type') ? $request->type : null,
            'user_id' => $request->filled('user_id') ? $request->user_id : null,
            'date_from' => $request->filled('date_from') ? $request->date_from : null,
            'date_to' => $request->filled('date_to') ? $request->date_to : null,
            'search' => $request->filled('search') ? $request->search : null,
        ];

        // Get activities for export (no pagination)
        $activities = ActivityLogService::getPaginatedActivities($filters, 10000);

        $filename = 'activity-logs-' . now()->format('Y-m-d-H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($activities) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID', 'Timestamp', 'Type', 'Description', 'User ID', 'User Name', 
                'User Email', 'IP Address', 'User Agent', 'URL', 'Method', 'Route'
            ]);

            foreach ($activities as $activity) {
                fputcsv($file, [
                    $activity['id'],
                    $activity['created_at'],
                    $activity['type'],
                    $activity['description'],
                    $activity['user']['id'] ?? 'N/A',
                    $activity['user']['name'] ?? 'System',
                    $activity['user']['email'] ?? 'N/A',
                    $activity['ip_address'] ?? 'N/A',
                    $activity['user_agent'] ?? 'N/A',
                    $activity['url'] ?? 'N/A',
                    $activity['method'] ?? 'N/A',
                    $activity['route'] ?? 'N/A',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
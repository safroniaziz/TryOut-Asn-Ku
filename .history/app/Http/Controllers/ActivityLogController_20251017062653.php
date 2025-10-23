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
            'this_month_activities' => Activity::whereMonth('created_at', now()->month)
                                             ->whereYear('created_at', now()->year)
                                             ->count(),
        ];

        // Get activity types
        $activityTypes = Activity::select('log_name')
                               ->distinct()
                               ->pluck('log_name')
                               ->filter()
                               ->sort()
                               ->values();

        return view('admin.activity-logs', compact('activities', 'stats', 'activityTypes'));
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
     * Export activity logs
     */
    public function export(Request $request)
    {
        $query = Activity::with(['causer', 'subject']);

        // Apply same filters as index
        if ($request->filled('type')) {
            $query->where('log_name', $request->type);
        }
        if ($request->filled('user_id')) {
            $query->where(function($q) use ($request) {
                $q->where('causer_id', $request->user_id)
                  ->orWhere('subject_id', $request->user_id)
                  ->orWhere('properties->user_id', $request->user_id);
            });
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $activities = $query->orderBy('created_at', 'desc')->get();

        $filename = 'activity-logs-' . now()->format('Y-m-d-H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($activities) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Timestamp', 'User ID', 'User Name', 'User Email', 'Type', 
                'Description', 'IP Address', 'User Agent', 'Properties'
            ]);

            foreach ($activities as $activity) {
                $causer = $activity->causer;
                $properties = $activity->properties;
                
                fputcsv($file, [
                    $activity->created_at->format('Y-m-d H:i:s'),
                    $causer?->id ?? 'N/A',
                    $causer?->name ?? 'System',
                    $causer?->email ?? 'N/A',
                    $activity->log_name,
                    $activity->description,
                    $properties['ip_address'] ?? 'N/A',
                    $properties['user_agent'] ?? 'N/A',
                    json_encode($properties)
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;
use App\Services\ActivityLogService;

class ShowActivityLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:activity 
                            {--user= : Show logs for specific user ID}
                            {--type= : Filter by log type (otp, registration, authentication, etc)}
                            {--limit=50 : Number of logs to show}
                            {--since= : Show logs since date (Y-m-d format)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display activity logs for users and system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->option('user');
        $type = $this->option('type');
        $limit = $this->option('limit');
        $since = $this->option('since');

        $query = Activity::with(['causer', 'subject']);

        // Filter by user
        if ($userId) {
            $query->where(function($q) use ($userId) {
                $q->where('causer_id', $userId)
                  ->orWhere('subject_id', $userId)
                  ->orWhere('properties->user_id', $userId);
            });
        }

        // Filter by type
        if ($type) {
            $query->where('log_name', $type);
        }

        // Filter by date
        if ($since) {
            try {
                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $since);
                $query->where('created_at', '>=', $date);
            } catch (\Exception $e) {
                $this->error('Invalid date format. Use Y-m-d format (e.g., 2024-01-01)');
                return;
            }
        }

        $activities = $query->orderBy('created_at', 'desc')
                           ->limit($limit)
                           ->get();

        if ($activities->isEmpty()) {
            $this->info('No activity logs found with the given criteria.');
            return;
        }

        $this->info("Showing {$activities->count()} activity logs:");
        $this->line('');

        $headers = ['Time', 'User', 'Type', 'Description', 'IP', 'Details'];
        $rows = [];

        foreach ($activities as $activity) {
            $causer = $activity->causer;
            $userName = $causer ? "{$causer->name} (ID: {$causer->id})" : 'System';
            
            $properties = $activity->properties;
            $ipAddress = $properties['ip_address'] ?? 'N/A';
            
            // Format details
            $details = [];
            if (isset($properties['phone_number'])) {
                $details[] = "Phone: {$properties['phone_number']}";
            }
            if (isset($properties['success'])) {
                $details[] = "Success: " . ($properties['success'] ? 'Yes' : 'No');
            }
            if (isset($properties['step'])) {
                $details[] = "Step: {$properties['step']}";
            }
            if (isset($properties['route'])) {
                $details[] = "Route: {$properties['route']}";
            }
            
            $rows[] = [
                $activity->created_at->format('Y-m-d H:i:s'),
                $userName,
                $activity->log_name,
                $activity->description,
                $ipAddress,
                implode(', ', $details) ?: 'N/A'
            ];
        }

        $this->table($headers, $rows);

        // Show summary
        $this->line('');
        $this->info('Summary:');
        $summary = $activities->groupBy('log_name')->map->count();
        foreach ($summary as $type => $count) {
            $this->line("  {$type}: {$count} activities");
        }
    }
}

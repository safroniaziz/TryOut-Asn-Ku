<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class CleanupActivityLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activity:cleanup {--days=90 : Number of days to keep logs}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up old activity logs to maintain database performance';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->option('days');
        $cutoffDate = Carbon::now()->subDays($days);

        $this->info("Cleaning up activity logs older than {$days} days (before {$cutoffDate->format('Y-m-d')})...");

        $count = Activity::where('created_at', '<', $cutoffDate)->count();

        if ($count == 0) {
            $this->info('No old logs found to clean up.');
            return 0;
        }

        if ($this->confirm("This will delete {$count} activity log records. Continue?")) {
            $deleted = Activity::where('created_at', '<', $cutoffDate)->delete();

            $this->info("Successfully deleted {$deleted} activity log records.");
            $this->info('Database cleanup completed.');
        } else {
            $this->info('Cleanup cancelled.');
        }

        return 0;
    }
}

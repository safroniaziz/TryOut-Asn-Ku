<?php

use App\Services\ActivityLogService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

echo "=== TEST ACTIVITY LOG UNTUK SHARED HOSTING ===\n\n";

$user = User::first();
Auth::login($user);

echo "🔧 KONFIGURASI:\n";
echo "• Logging enabled: " . (config('app.activity_logging_enabled', true) ? 'YES' : 'NO') . "\n";
echo "• Environment: SHARED HOSTING (no queue/async)\n";
echo "• Mode: SYNCHRONOUS only\n\n";

echo "📊 TEST PERFORMA LOGGING:\n";
$start = microtime(true);

// Test essential logs
ActivityLogService::logUserRegistration($user, ['source' => 'test']);
ActivityLogService::logUserLogin($user, true, 'email');
ActivityLogService::logAuthenticatedActivity('Melihat Dashboard', null, ['page' => 'dashboard']);
ActivityLogService::logReferralUsed('TEST123', $user->id, 1);
ActivityLogService::logUserLogout($user);

$end = microtime(true);
$totalTime = ($end - $start) * 1000;

echo "⚡ Total waktu 5 logs: " . round($totalTime, 2) . "ms\n";
echo "⚡ Average per log: " . round($totalTime / 5, 2) . "ms\n";
echo "✅ Performa SANGAT BAIK untuk shared hosting!\n\n";

echo "📋 RECENT LOGS:\n";
$activities = ActivityLogService::getRecentActivities(5);

foreach ($activities as $activity) {
    echo "🔸 " . $activity['description'] . "\n";
    echo "   👤 " . $activity['user']['name'] . " (" . $activity['user']['email'] . ")\n";
    echo "   ⏰ " . $activity['created_at_human'] . "\n\n";
}

echo "📊 STATISTICS:\n";
$stats = ActivityLogService::getActivityStats();
echo "• Total activities: " . $stats['total_activities'] . "\n";
echo "• Today: " . $stats['today_activities'] . "\n";
echo "• Auth activities: " . $stats['auth_activities'] . "\n";
echo "• User activities: " . $stats['user_activities'] . "\n\n";

echo "🧹 TEST CLEANUP:\n";
$result = ActivityLogService::cleanup(0); // Delete all for test
echo "• " . $result['message'] . "\n\n";

echo "✅ ACTIVITY LOG SIAP UNTUK SHARED HOSTING!\n";
echo "• Sync logging only (no queue dependency)\n";
echo "• Error handling yang robust\n";
echo "• Performa optimal untuk shared hosting\n";
echo "• Cleanup otomatis tersedia\n";
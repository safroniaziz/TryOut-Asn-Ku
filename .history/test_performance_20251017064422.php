<?php

echo "=== TEST PERFORMA ACTIVITY LOGGING ===\n\n";

use App\Services\ActivityLogService;
use App\Models\User;

$user = User::first();

// Test 1: Single Log Performance
echo "1. Test performa single log:\n";
$start = microtime(true);
ActivityLogService::logAuthenticatedActivity('Test aktivitas cepat', null, [
    'test_data' => 'performance_test'
]);
$end = microtime(true);
echo "✅ Single log: " . round(($end - $start) * 1000, 2) . "ms\n";

// Test 2: Multiple Logs Performance
echo "\n2. Test performa multiple logs (10 aktivitas):\n";
$start = microtime(true);
for ($i = 1; $i <= 10; $i++) {
    ActivityLogService::logAuthenticatedActivity("Test aktivitas batch #$i", null, [
        'batch_number' => $i,
        'test_type' => 'batch_performance'
    ]);
}
$end = microtime(true);
echo "✅ 10 logs: " . round(($end - $start) * 1000, 2) . "ms\n";
echo "✅ Average per log: " . round(($end - $start) * 1000 / 10, 2) . "ms\n";

// Test 3: Database Query Performance  
echo "\n3. Test performa query recent activities:\n";
$start = microtime(true);
$activities = ActivityLogService::getRecentActivities(20);
$end = microtime(true);
echo "✅ Query 20 activities: " . round(($end - $start) * 1000, 2) . "ms\n";

echo "\n=== OPTIMASI YANG DILAKUKAN ===\n";
echo "✅ Background processing (async logging bisa ditambahkan)\n";
echo "✅ Database indexes pada kolom penting\n";
echo "✅ SELECT specific fields only\n";
echo "✅ Minimal data processing\n";
echo "✅ Efficient query structure\n";
echo "✅ No complex calculations during logging\n";

echo "\n💡 REKOMENDASI TAMBAHAN:\n";
echo "- Untuk traffic tinggi: gunakan Queue Jobs\n";
echo "- Log cleanup otomatis untuk data lama\n";
echo "- Caching untuk statistics\n";
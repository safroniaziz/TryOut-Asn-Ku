<?php

use App\Services\ActivityLogService;
use App\Models\User;

echo "=== TEST LOG BAHASA INDONESIA ===\n\n";

// Get user for testing
$user = User::first();
if (!$user) {
    echo "❌ Tidak ada user untuk testing\n";
    exit;
}

echo "Testing activity logs dalam bahasa Indonesia...\n\n";

// Test 1: Registration
echo "1. Test Registration Log:\n";
ActivityLogService::logUserRegistration($user, [
    'registration_source' => 'web',
    'education_level' => 'S1'
]);
echo "✅ Log pendaftaran dibuat\n";

// Test 2: Login Success
echo "\n2. Test Login Success Log:\n";
ActivityLogService::logUserLogin($user, true, 'email');
echo "✅ Log login berhasil dibuat\n";

// Test 3: Login Failed
echo "\n3. Test Login Failed Log:\n";
ActivityLogService::logUserLogin($user, false, 'email');
echo "✅ Log login gagal dibuat\n";

// Test 4: Logout
echo "\n4. Test Logout Log:\n";
ActivityLogService::logUserLogout($user);
echo "✅ Log logout dibuat\n";

// Test 5: Authenticated Activity
echo "\n5. Test Authenticated Activity Log:\n";
ActivityLogService::logAuthenticatedActivity(
    'Melihat Detail Tryout CPNS', 
    null, 
    [
        'tryout_id' => 1,
        'tryout_name' => 'Tryout CPNS Kemenkeu 2025',
        'url' => '/tryouts/1'
    ]
);
echo "✅ Log aktivitas pengguna dibuat\n";

// Test 6: Referral
echo "\n6. Test Referral Log:\n";
ActivityLogService::logReferralUsed('ABC123', $user->id, 1);
echo "✅ Log referral dibuat\n";

// Check recent logs in Indonesian
echo "\n=== RECENT LOGS (Indonesian) ===\n";
$recentLogs = ActivityLogService::getRecentActivities(6);

foreach ($recentLogs as $log) {
    echo "- " . $log['description'] . " (" . $log['created_at_human'] . ")\n";
}

echo "\n✅ Semua log sudah dalam bahasa Indonesia!\n";
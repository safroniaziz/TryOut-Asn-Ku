<?php

use App\Services\ActivityLogService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

echo "=== TEST USER DATA DALAM LOG ===\n\n";

$user = User::first();
if (!$user) {
    echo "❌ Tidak ada user untuk testing\n";
    exit;
}

// Set auth user untuk testing
Auth::login($user);
echo "👤 Testing dengan user: {$user->name} ({$user->email})\n\n";

// Test registration dengan user data
echo "1. Test Registration Log dengan User Data:\n";
ActivityLogService::logUserRegistration($user, [
    'registration_source' => 'web_test',
    'education_level' => 'S1'
]);

// Test login
echo "2. Test Login Log dengan User Data:\n";
ActivityLogService::logUserLogin($user, true, 'email');

// Test authenticated activity
echo "3. Test Authenticated Activity dengan User Data:\n";
ActivityLogService::logAuthenticatedActivity('Melihat Detail Tryout CPNS 2025', null, [
    'tryout_id' => 123,
    'tryout_name' => 'CPNS Kemenkeu 2025'
]);

echo "\n=== RECENT LOGS DENGAN USER DATA ===\n";
$activities = ActivityLogService::getRecentActivities(5);

foreach ($activities as $activity) {
    echo "🔸 " . $activity['description'] . "\n";
    echo "   👤 User: " . ($activity['user']['name'] ?? 'System') . "\n";
    echo "   📧 Email: " . ($activity['user']['email'] ?? 'N/A') . "\n";
    echo "   🆔 User ID: " . ($activity['user']['id'] ?? 'N/A') . "\n";
    echo "   ⏰ Waktu: " . $activity['created_at_human'] . "\n";
    
    // Show some properties
    if (!empty($activity['properties']['email'])) {
        echo "   📝 Email di Properties: " . $activity['properties']['email'] . "\n";
    }
    if (!empty($activity['properties']['user_id'])) {
        echo "   🔢 User ID di Properties: " . $activity['properties']['user_id'] . "\n";
    }
    echo "\n";
}

echo "✅ User data sekarang sudah muncul di logs!\n";
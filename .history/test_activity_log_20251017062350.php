<?php

use App\Services\ActivityLogService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Create a test user (you can modify this to use an existing user)
$user = User::first(); // or create a test user

if (!$user) {
    echo "No users found. Please create a user first.\n";
    exit;
}

echo "Testing Activity Log Implementation...\n\n";

// Test 1: User Registration Logging
echo "1. Testing User Registration Logging:\n";
try {
    ActivityLogService::logUserRegistration($user, ['ip_address' => '127.0.0.1']);
    echo "✅ User registration logged successfully\n";
} catch (Exception $e) {
    echo "❌ Error logging user registration: " . $e->getMessage() . "\n";
}

// Test 2: User Login Logging
echo "\n2. Testing User Login Logging:\n";
try {
    ActivityLogService::logUserLogin($user, true, 'email');
    echo "✅ User login logged successfully\n";
} catch (Exception $e) {
    echo "❌ Error logging user login: " . $e->getMessage() . "\n";
}

// Test 3: Authenticated Activity Logging
echo "\n3. Testing Authenticated Activity Logging:\n";
try {
    ActivityLogService::logAuthenticatedActivity(
        $user, 
        'Viewed Dashboard', 
        [
            'route' => 'dashboard',
            'url' => 'http://localhost/dashboard',
            'method' => 'GET',
            'ip_address' => '127.0.0.1'
        ]
    );
    echo "✅ Authenticated activity logged successfully\n";
} catch (Exception $e) {
    echo "❌ Error logging authenticated activity: " . $e->getMessage() . "\n";
}

// Test 4: User Logout Logging
echo "\n4. Testing User Logout Logging:\n";
try {
    ActivityLogService::logUserLogout($user, ['ip_address' => '127.0.0.1']);
    echo "✅ User logout logged successfully\n";
} catch (Exception $e) {
    echo "❌ Error logging user logout: " . $e->getMessage() . "\n";
}

// Test 5: Retrieve Recent Activities
echo "\n5. Testing Activity Retrieval:\n";
try {
    $activities = ActivityLogService::getRecentActivities(5);
    echo "✅ Retrieved " . count($activities) . " recent activities\n";
    
    if (count($activities) > 0) {
        echo "Latest activity: " . $activities[0]['description'] . "\n";
    }
} catch (Exception $e) {
    echo "❌ Error retrieving activities: " . $e->getMessage() . "\n";
}

// Test 6: Retrieve User Activities
echo "\n6. Testing User Activity Retrieval:\n";
try {
    $userActivities = ActivityLogService::getUserActivities($user->id, 5);
    echo "✅ Retrieved " . count($userActivities) . " user activities\n";
    
    if (count($userActivities) > 0) {
        echo "Latest user activity: " . $userActivities[0]['description'] . "\n";
    }
} catch (Exception $e) {
    echo "❌ Error retrieving user activities: " . $e->getMessage() . "\n";
}

echo "\n✅ Activity Log Testing Complete!\n";
echo "\nYou can now:\n";
echo "- View logs at: /admin/activity-logs\n";
echo "- Export logs at: /admin/activity-logs/export\n";
echo "- Get user logs via API: /admin/activity-logs/user/{userId}\n";
echo "- Get recent logs via API: /admin/activity-logs/recent\n";
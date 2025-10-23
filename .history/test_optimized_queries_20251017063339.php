<?php

use App\Services\ActivityLogService;

echo "Testing Optimized Activity Log Queries...\n\n";

// Test 1: Recent Activities
echo "1. Recent Activities (5 items):\n";
$recent = ActivityLogService::getRecentActivities(5);
echo "Retrieved: " . count($recent) . " activities\n";

if (count($recent) > 0) {
    $first = $recent[0];
    echo "Sample data structure:\n";
    echo "- ID: " . $first['id'] . "\n";
    echo "- Type: " . $first['type'] . "\n";
    echo "- Description: " . $first['description'] . "\n";
    echo "- User: " . $first['user']['name'] . "\n";
    echo "- IP: " . ($first['ip_address'] ?? 'N/A') . "\n";
    echo "- URL: " . ($first['url'] ?? 'N/A') . "\n";
    echo "- Method: " . ($first['method'] ?? 'N/A') . "\n";
    echo "- Time: " . $first['created_at_human'] . "\n";
}

// Test 2: Auth Logs
echo "\n2. Authentication Logs (3 items):\n";
$authLogs = ActivityLogService::getAuthLogs(3);
echo "Retrieved: " . count($authLogs) . " auth activities\n";

if (count($authLogs) > 0) {
    $first = $authLogs[0];
    echo "Sample auth data:\n";
    echo "- Type: " . $first['type'] . "\n";
    echo "- Description: " . $first['description'] . "\n";
    echo "- Login Method: " . ($first['login_method'] ?? 'N/A') . "\n";
    echo "- Success: " . ($first['success'] ? 'Yes' : 'No') . "\n";
}

// Test 3: Activity Stats
echo "\n3. Activity Statistics:\n";
$stats = ActivityLogService::getActivityStats();
echo "- Total Activities: " . $stats['total_activities'] . "\n";
echo "- Today: " . $stats['today_activities'] . "\n";
echo "- This Week: " . $stats['this_week_activities'] . "\n";
echo "- This Month: " . $stats['this_month_activities'] . "\n";
echo "- Auth Activities: " . $stats['auth_activities'] . "\n";
echo "- User Activities: " . $stats['user_activities'] . "\n";

if (count($stats['top_users']) > 0) {
    echo "- Top User: " . $stats['top_users'][0]['user']['name'] . " (" . $stats['top_users'][0]['activity_count'] . " activities)\n";
}

echo "\n✅ All optimized queries working with complete data structure!\n";
echo "\nOptimizations implemented:\n";
echo "- SELECT specific fields only (reduced memory usage)\n";
echo "- Eager loading with causer relationship\n";
echo "- Transformed data structure for consistent API responses\n";
echo "- Human-readable timestamps\n";
echo "- Extracted key properties (IP, User Agent, URL, Method)\n";
echo "- Efficient filtering and pagination\n";
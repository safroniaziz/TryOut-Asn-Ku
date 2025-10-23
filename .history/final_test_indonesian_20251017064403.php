<?php

use App\Services\ActivityLogService;
use App\Models\User;

echo "=== TEST FINAL: LOG BAHASA INDONESIA ===\n\n";

// Get user
$user = User::first();
echo "Testing berbagai jenis aktivitas...\n\n";

// Simulate berbagai aktivitas dalam bahasa Indonesia
ActivityLogService::logAuthenticatedActivity('Melihat Detail Tryout CPNS', null, [
    'tryout_id' => 1,
    'action' => 'view_tryout'
]);

ActivityLogService::logAuthenticatedActivity('Memulai Mengerjakan Tryout', null, [
    'tryout_id' => 1,
    'action' => 'start_tryout'
]);

ActivityLogService::logAuthenticatedActivity('Mengirim Jawaban Soal Nomor 1', null, [
    'question_id' => 1,
    'answer' => 'A',
    'action' => 'submit_answer'
]);

ActivityLogService::logAuthenticatedActivity('Menyelesaikan Tryout', null, [
    'tryout_id' => 1,
    'total_questions' => 100,
    'answered' => 95,
    'score' => 850,
    'action' => 'finish_tryout'
]);

ActivityLogService::logAuthenticatedActivity('Melihat Hasil Tryout', null, [
    'tryout_id' => 1,
    'score' => 850,
    'ranking' => 5,
    'action' => 'view_result'
]);

ActivityLogService::logAuthenticatedActivity('Membeli Paket Langganan Premium', null, [
    'subscription_type' => 'premium',
    'duration' => '1_month',
    'price' => 99000,
    'action' => 'purchase_subscription'
]);

echo "✅ Semua aktivitas simulasi berhasil dicatat\n\n";

// Get recent activities
echo "=== AKTIVITAS TERBARU (Bahasa Indonesia) ===\n";
$activities = ActivityLogService::getRecentActivities(10);

foreach ($activities as $activity) {
    echo "🔸 " . $activity['description'] . "\n";
    echo "   ⏰ " . $activity['created_at_human'] . "\n";
    echo "   👤 " . ($activity['user']['name'] ?? 'System') . "\n";
    if (!empty($activity['properties']['action'])) {
        echo "   🏷️  Action: " . $activity['properties']['action'] . "\n";
    }
    echo "\n";
}

echo "✅ IMPLEMENTASI SELESAI: Semua log dalam Bahasa Indonesia!\n";
echo "📝 Properties tetap dalam bahasa Inggris sesuai permintaan\n";

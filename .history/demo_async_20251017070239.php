<?php

use App\Services\ActivityLogService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

echo "=== DEMO PERBANDINGAN SYNC vs ASYNC ===\n\n";

$user = User::first();
Auth::login($user);

echo "🔄 TEST SYNCHRONOUS LOGGING:\n";
$start = microtime(true);

// Simulate multiple activities (synchronous)
ActivityLogService::logAuthenticatedActivity('Melihat Dashboard', null, ['page' => 'dashboard']);
ActivityLogService::logAuthenticatedActivity('Melihat Profile', null, ['page' => 'profile']);
ActivityLogService::logAuthenticatedActivity('Melihat Tryout List', null, ['page' => 'tryouts']);

$end = microtime(true);
$syncTime = ($end - $start) * 1000;
echo "⏳ Waktu SYNC: " . round($syncTime, 2) . "ms\n";
echo "👤 User harus MENUNGGU " . round($syncTime, 2) . "ms untuk response\n\n";

echo "⚡ TEST ASYNCHRONOUS LOGGING:\n";
$start = microtime(true);

// Simulate same activities (asynchronous)
ActivityLogService::logAuthenticatedActivityAsync('Melihat Dashboard Async', null, ['page' => 'dashboard']);
ActivityLogService::logAuthenticatedActivityAsync('Melihat Profile Async', null, ['page' => 'profile']);
ActivityLogService::logAuthenticatedActivityAsync('Melihat Tryout List Async', null, ['page' => 'tryouts']);

$end = microtime(true);
$asyncTime = ($end - $start) * 1000;
echo "🚀 Waktu ASYNC: " . round($asyncTime, 2) . "ms\n";
echo "👤 User mendapat response INSTANT dalam " . round($asyncTime, 2) . "ms\n";
echo "🔄 Log diproses di BACKGROUND oleh Queue Worker\n\n";

echo "📊 PERBANDINGAN:\n";
echo "Sync Time:  " . round($syncTime, 2) . "ms\n";
echo "Async Time: " . round($asyncTime, 2) . "ms\n";
echo "Speed Up:   " . round($syncTime / $asyncTime, 1) . "x lebih cepat!\n\n";

echo "🎯 KESIMPULAN:\n";
echo "• Sync: User tunggu sampai log selesai disimpan\n";
echo "• Async: User langsung dapat response, log diproses background\n";
echo "• Async = Better User Experience!\n\n";

echo "⚙️ CARA SETUP QUEUE WORKER:\n";
echo "1. Setting queue driver di .env:\n";
echo "   QUEUE_CONNECTION=database\n\n";
echo "2. Jalankan migration queue:\n";
echo "   php artisan queue:table\n";
echo "   php artisan migrate\n\n";
echo "3. Start queue worker:\n";
echo "   php artisan queue:work\n\n";
echo "4. Atau pakai Supervisor di production\n\n";

echo "✅ Async logging siap digunakan untuk performa optimal!\n";
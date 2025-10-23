<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Protected routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tryout routes
    Route::prefix('tryouts')->name('tryouts.')->group(function () {
        Route::get('/', [TryoutController::class, 'index'])->name('index');
        Route::get('/{tryout}', [TryoutController::class, 'show'])->name('show');
        Route::post('/{tryout}/start', [TryoutController::class, 'start'])->name('start');
        Route::get('/{tryout}/soal/{soal}', [TryoutController::class, 'question'])->name('question');
        Route::post('/{tryout}/soal/{soal}/answer', [TryoutController::class, 'answer'])->name('answer');
        Route::get('/{tryout}/submit', [TryoutController::class, 'submit'])->name('submit');
        Route::get('/{tryout}/result', [TryoutController::class, 'result'])->name('result');
    });

    // Materi routes
    Route::prefix('materis')->name('materis.')->group(function () {
        Route::get('/', [MateriController::class, 'index'])->name('index');
        Route::get('/{materi}', [MateriController::class, 'show'])->name('show');
        Route::get('/{materi}/download', [MateriController::class, 'download'])->name('download');
        Route::get('/tryout/{tryout}', [MateriController::class, 'byTryout'])->name('by-tryout');
    });

    // Subscription routes
    Route::prefix('subscription')->name('subscription.')->group(function () {
        Route::get('/premium', [SubscriptionController::class, 'premium'])->name('premium');
        Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
        Route::get('/history', [SubscriptionController::class, 'history'])->name('history');
        Route::patch('/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
    });

    // Leaderboard routes
    Route::prefix('leaderboards')->name('leaderboards.')->group(function () {
        Route::get('/', [LeaderboardController::class, 'index'])->name('index');
        Route::get('/global', [LeaderboardController::class, 'global'])->name('global');
        Route::get('/{tryout}', [LeaderboardController::class, 'show'])->name('show');
    });

    // Admin routes for activity logs
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs');
        Route::get('/activity-logs/export', [ActivityLogController::class, 'export'])->name('activity-logs.export');
        Route::get('/activity-logs/user/{userId}', [ActivityLogController::class, 'userLogs'])->name('activity-logs.user');
        Route::get('/activity-logs/recent', [ActivityLogController::class, 'recent'])->name('activity-logs.recent');
    });
});

// API routes untuk dropdown
Route::get('/api/kota/{provinsi_id}', function($provinsi_id) {
    $kota = \App\Models\Kota::where('provinsi_id', $provinsi_id)
                           ->where('aktif', true)
                           ->orderBy('nama_kota')
                           ->get(['id', 'nama_kota', 'jenis']);
    return response()->json($kota);
})->name('api.kota');

// API route untuk validasi referral code
Route::post('/api/validate-referral', [App\Http\Controllers\ReferralController::class, 'validateReferralCode'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.validate-referral');

// API routes untuk WhatsApp OTP verification
Route::post('/api/phone/send-otp', [App\Http\Controllers\PhoneVerificationController::class, 'sendOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.phone.send-otp');

Route::post('/api/phone/verify-otp', [App\Http\Controllers\PhoneVerificationController::class, 'verifyOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.phone.verify-otp');

Route::post('/api/phone/resend-otp', [App\Http\Controllers\PhoneVerificationController::class, 'resendOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.phone.resend-otp');

Route::get('/api/phone/check-verification', [App\Http\Controllers\PhoneVerificationController::class, 'checkVerification'])
    ->name('api.phone.check-verification');

require __DIR__.'/auth.php';

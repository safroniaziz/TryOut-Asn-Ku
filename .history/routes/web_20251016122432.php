<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\LeaderboardController;
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

// API routes untuk email verification OTP
Route::post('/api/email/send-otp', [App\Http\Controllers\EmailVerificationController::class, 'sendOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.email.send-otp');

Route::post('/api/email/verify-otp', [App\Http\Controllers\EmailVerificationController::class, 'verifyOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.email.verify-otp');

Route::get('/api/email/check-verification', [App\Http\Controllers\EmailVerificationController::class, 'checkVerification'])
    ->name('api.email.check-verification');

require __DIR__.'/auth.php';

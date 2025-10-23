<?php

use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

// SEO Routes
Route::get('robots.txt', [SeoController::class, 'robots'])->name('robots');

// Admin SEO Management (protected)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::post('seo/check-score', [SeoController::class, 'checkScore'])->name('admin.seo.check-score');
    Route::post('seo/clear-cache', [SeoController::class, 'clearCache'])->name('admin.seo.clear-cache');
});

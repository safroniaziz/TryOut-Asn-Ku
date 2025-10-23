<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set default timezone untuk Carbon dan seluruh aplikasi
        date_default_timezone_set(config('app.timezone', 'Asia/Jakarta'));

        // Pastikan Carbon juga menggunakan timezone yang sama
        \Carbon\Carbon::setLocale(config('app.locale', 'id'));
    }
}

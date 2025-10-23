<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::post('/validate-referral', function (Request $request) {
    $referralCode = $request->input('referral_code');

    if (empty($referralCode)) {
        return response()->json(['valid' => false, 'message' => 'Kode referral kosong']);
    }

    $user = User::where('my_referral_code', $referralCode)
                ->where('id', '!=', Auth::id() ?? 0) // Exclude current user if logged in
                ->first(['name', 'email', 'my_referral_code']);

    if ($user) {
        return response()->json([
            'valid' => true,
            'message' => 'Kode referral ditemukan!',
            'referrer' => [
                'name' => $user->name,
                'email' => substr($user->email, 0, 3) . '***' . substr($user->email, -10) // Partially hide email
            ]
        ]);
    }

    return response()->json([
        'valid' => false,
        'message' => 'Kode referral tidak ditemukan atau tidak valid'
    ]);
})->name('api.validate-referral');

// Log registration step progress (optional - for tracking partial registrations)
Route::post('/log-registration-step', function (Request $request) {
    try {
        // Simple activity logging without dedicated method
        if (\Illuminate\Support\Facades\Auth::check()) {
            \App\Services\ActivityLogService::logAuthenticatedActivity(
                'Langkah pendaftaran: ' . $request->input('step'),
                null,
                [
                    'step' => $request->input('step'),
                    'form_data' => $request->input('form_data', []),
                    'phone_number' => $request->input('phone_number')
                ]
            );
        }

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Failed to log registration step: ' . $e->getMessage());
        return response()->json(['success' => false], 500);
    }
})->name('api.log-registration-step');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function validateReferralCode(Request $request)
    {
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
    }
}

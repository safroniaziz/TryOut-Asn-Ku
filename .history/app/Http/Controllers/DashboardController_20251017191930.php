<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Materi;
use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Get recent tryouts
        $recentTryouts = Tryout::active()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Get user's completed tryouts
        $userTryouts = $user->leaderboards()
            ->with('tryout')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get recent materials
        $recentMateris = Materi::active()
            ->with('tryout')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Check if user has premium subscription
        $hasPremium = $user->hasActivePremiumSubscription();
        $premiumSubscription = $user->getActivePremiumSubscription();

        // Get statistics
        $stats = [
            'total_tryouts_completed' => $user->leaderboards()->count(),
            'average_score' => $user->leaderboards()->avg('total_skor') ?? 0,
            'best_score' => $user->leaderboards()->max('total_skor') ?? 0,
            'total_materials_downloaded' => 0, // TODO: Track material downloads
        ];

        return view('dashboard', compact(
            'recentTryouts',
            'userTryouts',
            'recentMateris',
            'hasPremium',
            'premiumSubscription',
            'stats'
        ));
    }
}

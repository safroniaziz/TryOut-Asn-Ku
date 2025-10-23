<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Materi;
use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard.
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Get recent tryout results for display
        $recentTryouts = $user->leaderboards()
            ->with('tryout')
            ->where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Get basic statistics for the stats grid
        $totalCompleted = $user->leaderboards()->count();
        $avgScore = $user->leaderboards()->avg('total_skor') ?? 0;
        $bestScore = $user->leaderboards()->max('total_skor') ?? 0;
        $totalQuestions = $user->tryoutResults()->sum('total_answered');
        $correctAnswers = $user->tryoutResults()->sum('total_correct');
        $accuracyRate = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 1) : 0;



        return view('dashboard', compact(
            'stats',
            'recentTryouts'
        ));
    }

    /**
     * Get unique categories count for user
     */
    private function getUniqueCategoriesCount(User $user): int
    {
        return $user->leaderboards()
            ->with('tryout')
            ->get()
            ->pluck('tryout.category')
            ->filter()
            ->unique()
            ->count();
    }

    /**
     * Simplify category name for grouping
     */
    private function simplifyCategory(string $title): string
    {
        $title = strtolower($title);

        if (str_contains($title, 'twk')) return 'TWK';
        if (str_contains($title, 'tiu')) return 'TIU';
        if (str_contains($title, 'tkp')) return 'TKP';
        if (str_contains($title, 'skd')) return 'SKD';
        if (str_contains($title, 'skb')) return 'SKB';
        if (str_contains($title, 'teknis')) return 'Kompetensi Teknis';
        if (str_contains($title, 'manajerial')) return 'Kompetensi Manajerial';
        if (str_contains($title, 'sosio')) return 'Kompetensi Sosio Kultural';

        return 'Umum';
    }
}

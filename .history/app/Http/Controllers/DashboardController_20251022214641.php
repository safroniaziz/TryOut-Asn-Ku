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
        // Simple static data - no complex objects or queries
        $stats = [
            'best_score' => 0,
            'avg_score' => 0,
            'accuracy_rate' => 0,
            'total_tryouts_completed' => 0,
            'total_answered' => 0,
            'current_streak' => 0,
            'experience_level' => 'Pemula',
            'current_level' => 1,
            'categories_tried' => 0,
        ];

        // Empty collection - no data at all
        $recentTryouts = collect();

        return view('dashboard', compact(
            'stats',
            'recentTryouts'
        ));
    }

    /**
     * Calculate experience level based on average score
     */
    private function calculateExperienceLevel($avgScore): string
    {
        if ($avgScore >= 85) return 'Expert';
        if ($avgScore >= 70) return 'Advanced';
        if ($avgScore >= 55) return 'Intermediate';
        if ($avgScore >= 40) return 'Beginner';
        return 'Pemula';
    }

    /**
     * Calculate level based on completed tryouts
     */
    private function calculateLevel($totalCompleted): int
    {
        if ($totalCompleted >= 20) return 5;
        if ($totalCompleted >= 15) return 4;
        if ($totalCompleted >= 10) return 3;
        if ($totalCompleted >= 5) return 2;
        return 1;
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

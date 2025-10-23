<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Materi;
use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Debug log
        Log::info('Dashboard accessed', ['user_id' => $user->id, 'user_name' => $user->name]);

        // Get recent tryouts
        $recentTryouts = Tryout::active()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        Log::info('Recent tryouts count', ['count' => $recentTryouts->count()]);

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
        $totalCompleted = $user->leaderboards()->count();
        $avgScore = $user->leaderboards()->avg('total_skor') ?? 0;
        $bestScore = $user->leaderboards()->max('total_skor') ?? 0;

        $stats = [
            'total_tryouts_completed' => $totalCompleted,
            'average_score' => $avgScore,
            'best_score' => $bestScore,
            'total_materials_downloaded' => 0, // TODO: Track material downloads
        ];

        // Get learning progress data
        $progressData = [
            'total_tryouts_available' => Tryout::active()->count(),
            'completion_rate' => Tryout::active()->count() > 0
                ? round(($totalCompleted / Tryout::active()->count()) * 100, 1)
                : 0,
            'study_streak' => $this->calculateStudyStreak($user),
            'rank_position' => $this->getUserRankPosition($user),
            'total_users' => User::count(),
            'recent_achievements' => $this->getRecentAchievements($user),
        ];

        // Get performance by category
        $performanceByCategory = $user->leaderboards()
            ->with('tryout')
            ->get()
            ->groupBy('tryout.kategori')
            ->map(function ($items) {
                return [
                    'count' => $items->count(),
                    'avg_score' => round($items->avg('total_skor'), 1),
                    'best_score' => $items->max('total_skor'),
                ];
            });

        // Debug: dump all data
        Log::info('Dashboard data', [
            'stats' => $stats,
            'progressData' => $progressData,
            'performanceByCategory' => $performanceByCategory->toArray(),
            'recentTryouts_count' => $recentTryouts->count(),
            'userTryouts_count' => $userTryouts->count(),
            'recentMateris_count' => $recentMateris->count(),
        ]);

        return view('dashboard', compact(
            'recentTryouts',
            'userTryouts',
            'recentMateris',
            'hasPremium',
            'premiumSubscription',
            'stats',
            'progressData',
            'performanceByCategory'
        ));
    }

    /**
     * Calculate user's study streak (consecutive days)
     */
    private function calculateStudyStreak(User $user): int
    {
        $activities = $user->leaderboards()
            ->orderBy('created_at', 'desc')
            ->pluck('created_at')
            ->map(fn($date) => $date->format('Y-m-d'))
            ->unique()
            ->values();

        if ($activities->isEmpty()) {
            return 0;
        }

        $streak = 1;
        $yesterday = now()->subDay()->format('Y-m-d');

        // Check if there's activity today or yesterday
        if (!in_array(now()->format('Y-m-d'), $activities->toArray()) &&
            !in_array($yesterday, $activities->toArray())) {
            return 0;
        }

        for ($i = 0; $i < $activities->count() - 1; $i++) {
            $current = \Carbon\Carbon::parse($activities[$i]);
            $next = \Carbon\Carbon::parse($activities[$i + 1]);

            if ($current->diffInDays($next) === 1) {
                $streak++;
            } else {
                break;
            }
        }

        return $streak;
    }

    /**
     * Get user's rank position among all users
     */
    private function getUserRankPosition(User $user): int
    {
        $userTotalScore = $user->leaderboards()->sum('total_skor');

        $betterUsers = User::whereHas('leaderboards')
            ->get()
            ->filter(function ($u) use ($userTotalScore) {
                return $u->leaderboards()->sum('total_skor') > $userTotalScore;
            })
            ->count();

        return $betterUsers + 1;
    }

    /**
     * Get user's recent achievements
     */
    private function getRecentAchievements(User $user): array
    {
        $achievements = [];
        $totalCompleted = $user->leaderboards()->count();
        $bestScore = $user->leaderboards()->max('total_skor') ?? 0;

        // Milestone achievements
        if ($totalCompleted >= 1) {
            $achievements[] = ['icon' => '🎯', 'title' => 'Tryout Pertama', 'desc' => 'Menyelesaikan tryout pertama'];
        }
        if ($totalCompleted >= 5) {
            $achievements[] = ['icon' => '🔥', 'title' => 'Semangat Belajar', 'desc' => 'Menyelesaikan 5 tryout'];
        }
        if ($totalCompleted >= 10) {
            $achievements[] = ['icon' => '💪', 'title' => 'Konsisten', 'desc' => 'Menyelesaikan 10 tryout'];
        }
        if ($bestScore >= 80) {
            $achievements[] = ['icon' => '⭐', 'title' => 'Nilai Bagus', 'desc' => 'Mendapat skor 80+'];
        }
        if ($bestScore >= 90) {
            $achievements[] = ['icon' => '🏆', 'title' => 'Hampir Sempurna', 'desc' => 'Mendapat skor 90+'];
        }

        return array_slice($achievements, -3); // Return last 3 achievements
    }
}

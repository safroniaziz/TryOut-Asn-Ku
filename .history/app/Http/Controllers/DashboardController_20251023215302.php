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
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Get basic statistics for the stats grid
        $totalCompleted = $user->leaderboards()->count();
        $avgScore = $user->leaderboards()->avg('total_skor') ?? 0;
        $bestScore = $user->leaderboards()->max('total_skor') ?? 0;

        // Calculate total questions and correct answers from leaderboards
        $leaderboards = $user->leaderboards()->get();
        $totalQuestions = $leaderboards->sum(function ($leaderboard) {
            return $leaderboard->benar + $leaderboard->salah + $leaderboard->tidak_dijawab;
        });
        $correctAnswers = $leaderboards->sum('benar');
        $accuracyRate = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 1) : 0;

        $stats = [
            'best_score' => round($bestScore),
            'avg_score' => round($avgScore),
            'average_score' => round($avgScore), // Alias for compatibility
            'total_tryouts_completed' => $totalCompleted,
            'total_answered' => $totalQuestions,
            'current_streak' => 1, // TODO: Implement streak tracking
            'experience_level' => 'Pemula', // TODO: Implement experience level calculation
            'current_level' => 1, // TODO: Implement level system
            'categories_tried' => $this->getUniqueCategoriesCount($user),
        ];

        // Calculate progress data for dashboard
        $progressData = $this->calculateProgressData($user);

        // Calculate performance by category
        $performanceByCategory = $this->calculatePerformanceByCategory($user);

        // Get all user tryouts for additional statistics
        $userTryouts = $user->leaderboards()
            ->with('tryout')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get user's premium status and target test preference
        $hasPremium = $user->hasActivePremiumSubscription();
        $targetTest = $user->target_test ?? 'both';

        return view('dashboard', compact(
            'stats',
            'recentTryouts',
            'progressData',
            'performanceByCategory',
            'userTryouts',
            'hasPremium',
            'targetTest'
        ));
    }

    /**
     * Simplified performance analysis page
     */
    public function performanceAnalysisSimplified(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Get user's completed tryouts
        $completedTryouts = $user->leaderboards()
            ->with('tryout')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($completedTryouts->isEmpty()) {
            return view('performance-analysis-simplified', [
                'completedTryouts' => collect(),
                'avgScore' => 0,
                'bestScore' => 0,
                'totalCompleted' => 0,
                'recentPerformance' => collect(),
                'categoryPerformance' => collect(),
                'recommendations' => []
            ]);
        }

        // Calculate basic statistics
        $avgScore = round($completedTryouts->avg('total_skor'));
        $bestScore = round($completedTryouts->max('total_skor'));
        $totalCompleted = $completedTryouts->count();

        // Get recent performance trend (last 10 tryouts)
        $recentPerformance = $completedTryouts->take(10)->map(function ($tryout) {
            return [
                'title' => $tryout->tryout->title ?? 'Unknown',
                'score' => $tryout->total_skor,
                'date' => $tryout->created_at->format('d M Y'),
                'percentage' => round(($tryout->total_skor / $tryout->tryout->total_questions) * 100, 1)
            ];
        });

        // Simplified category analysis (basic grouping)
        $categoryPerformance = $completedTryouts->groupBy(function ($tryout) {
            return $this->simplifyCategory($tryout->tryout->title ?? 'Umum');
        })->map(function ($tryouts, $category) {
            $avgScore = round($tryouts->avg('total_skor'));
            $count = $tryouts->count();

            return [
                'category' => $category,
                'count' => $count,
                'avg_score' => $avgScore,
                'best_score' => round($tryouts->max('total_skor')),
                'performance' => $avgScore >= 70 ? 'Baik' : ($avgScore >= 50 ? 'Sedang' : 'Perlu Perbaikan')
            ];
        })->values();

        // Generate simple recommendations
        $recommendations = [];

        if ($avgScore < 60) {
            $recommendations[] = 'Fokus pada pemahaman dasar materi dan latihan soal-soal fundamental.';
        }

        if ($totalCompleted < 5) {
            $recommendations[] = 'Tingkatkan frekuensi latihan untuk membangun konsistensi.';
        }

        $weakCategories = $categoryPerformance->filter(function ($cat) {
            return $cat['avg_score'] < 60;
        });

        if ($weakCategories->isNotEmpty()) {
            $recommendations[] = 'Berikan perhatian khusus pada kategori: ' . $weakCategories->pluck('category')->join(', ');
        }

        if ($avgScore >= 80) {
            $recommendations[] = 'Pertahankan performa excellent Anda dan tingkatkan variasi latihan.';
        }

        return view('performance-analysis-simplified', compact(
            'completedTryouts',
            'avgScore',
            'bestScore',
            'totalCompleted',
            'recentPerformance',
            'categoryPerformance',
            'recommendations'
        ));
    }

    /**
     * Calculate progress data for dashboard
     */
    private function calculateProgressData(User $user): array
    {
        // Get total tryouts available (all tryouts in the system)
        $totalTryoutsAvailable = Tryout::count();

        // Get user's completed tryouts
        $completedTryouts = $user->leaderboards()->count();

        // Calculate completion rate
        $completionRate = $totalTryoutsAvailable > 0 ? round(($completedTryouts / $totalTryoutsAvailable) * 100, 1) : 0;

        // Calculate study streak (simplified - using consecutive days with activity)
        $studyStreak = $this->calculateStudyStreak($user);

        // Calculate rank position and total users
        $rankData = $this->calculateUserRank($user);

        return [
            'completion_rate' => $completionRate,
            'total_tryouts_available' => $totalTryoutsAvailable,
            'study_streak' => $studyStreak,
            'rank_position' => $rankData['rank'],
            'total_users' => $rankData['total_users']
        ];
    }

    /**
     * Calculate study streak for user
     */
    private function calculateStudyStreak(User $user): int
    {
        // Get user's activity dates
        $activityDates = $user->leaderboards()
            ->selectRaw('DATE(created_at) as activity_date')
            ->distinct()
            ->orderBy('activity_date', 'desc')
            ->pluck('activity_date')
            ->map(function ($date) {
                return \Carbon\Carbon::parse($date);
            });

        if ($activityDates->isEmpty()) {
            return 0;
        }

        $streak = 0;
        $currentDate = \Carbon\Carbon::today();

        foreach ($activityDates as $activityDate) {
            if ($activityDate->isSameDay($currentDate) || $activityDate->isSameDay($currentDate->subDay())) {
                $streak++;
                $currentDate = $activityDate;
            } else {
                break;
            }
        }

        return $streak;
    }

    /**
     * Calculate user rank based on average score
     */
    private function calculateUserRank(User $user): array
    {
        $userAvgScore = $user->leaderboards()->avg('total_skor') ?? 0;

        // Get all users with their average scores
        $allUsers = User::whereHas('leaderboards')
            ->withCount('leaderboards')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'avg_score' => $user->leaderboards()->avg('total_skor') ?? 0
                ];
            })
            ->sortByDesc('avg_score')
            ->values();

        $totalUsers = $allUsers->count();
        $rank = 1;

        foreach ($allUsers as $index => $userData) {
            if ($userData['id'] === $user->id) {
                $rank = $index + 1;
                break;
            }
        }

        return [
            'rank' => $rank,
            'total_users' => $totalUsers
        ];
    }

    /**
     * Calculate performance by category
     */
    private function calculatePerformanceByCategory(User $user): \Illuminate\Support\Collection
    {
        // Get user's completed tryouts with category information
        $completedTryouts = $user->leaderboards()
            ->with('tryout')
            ->get()
            ->filter(function ($leaderboard) {
                return $leaderboard->tryout !== null;
            });

        if ($completedTryouts->isEmpty()) {
            return collect();
        }

        // Group by category and calculate statistics
        $categoryStats = $completedTryouts->groupBy(function ($leaderboard) {
            return $leaderboard->tryout->category ?? 'Umum';
        })->map(function ($tryouts, $category) {
            $scores = $tryouts->pluck('total_skor');

            return [
                'kategori' => $category,
                'avg_score' => round($scores->avg(), 1),
                'best_score' => $scores->max(),
                'worst_score' => $scores->min(),
                'count' => $tryouts->count(),
                'total_questions' => $tryouts->sum(function ($t) {
                    return $t->benar + $t->salah + $t->tidak_dijawab;
                }),
                'correct_answers' => $tryouts->sum('benar'),
                'accuracy' => $tryouts->sum(function ($t) {
                    $total = $t->benar + $t->salah + $t->tidak_dijawab;
                    return $total > 0 ? round(($t->benar / $total) * 100, 1) : 0;
                })
            ];
        })->values();

        return $categoryStats;
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

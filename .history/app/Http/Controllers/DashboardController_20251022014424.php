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


        $stats = [
            'best_score' => round($bestScore),
            'avg_score' => round($avgScore),
            'accuracy_rate' => $accuracyRate,
            'total_tryouts_completed' => $totalCompleted,
            'total_answered' => $totalQuestions,
            'current_streak' => 1, // TODO: Implement streak tracking
            'experience_level' => 'Pemula', // TODO: Implement experience level calculation
            'current_level' => 1, // TODO: Implement level system
            'categories_tried' => $this->getUniqueCategoriesCount($user),
        ];

        return view('dashboard', compact(
            'stats',
            'recentTryouts'
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
            ->where('status', 'completed')
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

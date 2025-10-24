<?php

namespace App\Services;

use App\Models\User;
use App\Models\Leaderboard;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class AIRecommendationService
{
    /**
     * Generate personalized AI recommendations for user
     */
    public function generatePersonalRecommendations(User $user): array
    {
        $performanceData = $this->analyzeUserPerformance($user);
        $learningStyle = $this->detectLearningStyle($user);
        $studyPattern = $this->analyzeStudyPattern($user);
        $motivationProfile = $this->createMotivationProfile($user);

        $recommendations = [
            'ai_insights' => $this->generateAIInsights($performanceData, $learningStyle, $studyPattern),
            'personalized_plan' => $this->createPersonalizedStudyPlan($performanceData, $learningStyle, $studyPattern),
            'smart_recommendations' => $this->generateSmartRecommendations($performanceData, $motivationProfile),
            'gamification_challenges' => $this->createGamificationChallenges($performanceData, $studyPattern),
            'premium_insights' => $this->generatePremiumInsights($performanceData, $learningStyle),
        ];

        return $recommendations;
    }

    /**
     * Analyze user performance data comprehensively
     */
    private function analyzeUserPerformance(User $user): array
    {
        $leaderboards = $user->leaderboards()
            ->with('tryout')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($leaderboards->isEmpty()) {
            return [
                'total_tryouts' => 0,
                'avg_score' => 0,
                'best_score' => 0,
                'worst_score' => 0,
                'recent_trend' => 'neutral',
                'consistency' => 0,
                'category_performance' => collect(),
                'improvement_rate' => 0,
                'strength_areas' => [],
                'weakness_areas' => [],
                'study_frequency' => 0,
                'avg_time_per_question' => 0,
                'improvement_potential' => 'medium'
            ];
        }

        // Basic statistics
        $scores = $leaderboards->pluck('total_skor');
        $avgScore = $scores->avg();
        $bestScore = $scores->max();
        $worstScore = $scores->min();

        // Trend analysis
        $recentScores = $leaderboards->take(5)->pluck('total_skor');
        $olderScores = $leaderboards->slice(5, 5)->pluck('total_skor');

        $recentTrend = 'neutral';
        if ($recentScores->avg() > $olderScores->avg() + 5) {
            $recentTrend = 'improving';
        } elseif ($recentScores->avg() < $olderScores->avg() - 5) {
            $recentTrend = 'declining';
        }

        // Consistency calculation
        $standardDeviation = $this->calculateStandardDeviation($scores->toArray());
        $consistency = max(0, 100 - ($standardDeviation / max($avgScore, 1) * 100));

        // Category performance
        $categoryPerformance = $leaderboards->groupBy(function($item) {
            return $this->categorizeTryout($item->tryout->title ?? 'Umum');
        })->map(function($group, $category) {
            $scores = $group->pluck('total_skor');
            return [
                'category' => $category,
                'count' => $group->count(),
                'avg_score' => round($scores->avg(), 1),
                'best_score' => $scores->max(),
                'trend' => $this->calculateCategoryTrend($group),
                'confidence_level' => $this->calculateConfidenceLevel($group)
            ];
        })->values();

        // Identify strength and weakness areas
        $sortedCategories = $categoryPerformance->sortBy('avg_score');
        $weaknessAreas = $sortedCategories->take(2)->pluck('category')->toArray();
        $strengthAreas = $sortedCategories->reverse()->take(2)->pluck('category')->toArray();

        // Study frequency (last 30 days)
        $studyFrequency = $leaderboards
            ->filter(function($item) {
                return $item->created_at->greaterThan(Carbon::now()->subDays(30));
            })
            ->count();

        // Time analysis
        $totalTime = $leaderboards->sum('waktu_pengerjaan_detik');
        $totalQuestions = $leaderboards->sum(function($item) {
            return $item->benar + $item->salah + $item->tidak_dijawab;
        });
        $avgTimePerQuestion = $totalQuestions > 0 ? $totalTime / $totalQuestions : 0;

        // Improvement potential
        $improvementPotential = 'high';
        if ($avgScore > 75) $improvementPotential = 'low';
        elseif ($avgScore > 60) $improvementPotential = 'medium';

        return [
            'total_tryouts' => $leaderboards->count(),
            'avg_score' => round($avgScore, 1),
            'best_score' => $bestScore,
            'worst_score' => $worstScore,
            'recent_trend' => $recentTrend,
            'consistency' => round($consistency, 1),
            'category_performance' => $categoryPerformance,
            'improvement_rate' => $this->calculateImprovementRate($leaderboards),
            'strength_areas' => $strengthAreas,
            'weakness_areas' => $weaknessAreas,
            'study_frequency' => $studyFrequency,
            'avg_time_per_question' => round($avgTimePerQuestion, 1),
            'improvement_potential' => $improvementPotential
        ];
    }

    /**
     * Detect user's learning style based on performance patterns
     */
    private function detectLearningStyle(User $user): string
    {
        $leaderboards = $user->leaderboards()
            ->with('tryout')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        if ($leaderboards->count() < 5) {
            return 'not_enough_data';
        }

        // Analyze timing patterns
        $totalQuestions = $leaderboards->sum(function($item) {
            return $item->benar + $item->salah + $item->tidak_dijawab;
        });
        $totalCorrect = $leaderboards->sum('benar');
        $accuracy = $totalQuestions > 0 ? ($totalCorrect / $totalQuestions) * 100 : 0;

        $avgTimePerQuestion = $totalQuestions > 0 ? ($leaderboards->sum('waktu_pengerjaan_detik') / $totalQuestions) : 60;

        // Learning style detection logic
        if ($avgTimePerQuestion < 45 && $accuracy > 70) {
            return 'quick_learner';
        } elseif ($avgTimePerQuestion > 90 && $accuracy > 70) {
            return 'thorough_learner';
        } elseif ($avgTimePerQuestion < 60 && $accuracy < 50) {
            return 'speed_focused';
        } elseif ($avgTimePerQuestion > 60 && $accuracy < 50) {
            return 'needs_foundation';
        } else {
            return 'balanced_learner';
        }
    }

    /**
     * Analyze user's study pattern
     */
    private function analyzeStudyPattern(User $user): array
    {
        $leaderboards = $user->leaderboards()
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();

        if ($leaderboards->isEmpty()) {
            return ['frequency' => 'none', 'consistency' => 0, 'peak_time' => 'unknown'];
        }

        // Study frequency analysis
        $studiesThisWeek = $leaderboards
            ->filter(function($item) {
                return $item->created_at->greaterThan(Carbon::now()->subDays(7));
            })
            ->count();

        $frequency = 'low';
        if ($studiesThisWeek >= 5) $frequency = 'high';
        elseif ($studiesThisWeek >= 2) $frequency = 'medium';

        // Consistency analysis
        $dailyGroups = $leaderboards->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });
        $consistency = ($dailyGroups->count() / min(30, $leaderboards->count())) * 100;

        // Peak study time
        $hourGroups = $leaderboards->groupBy(function($item) {
            return $item->created_at->hour;
        });
        $peakHour = $hourGroups->map->count()->sortDesc()->keys()->first();

        $peakTime = 'morning';
        if ($peakHour >= 12 && $peakHour < 17) $peakTime = 'afternoon';
        elseif ($peakHour >= 17 && $peakHour < 21) $peakTime = 'evening';
        elseif ($peakHour >= 21 || $peakHour < 6) $peakTime = 'night';

        return [
            'frequency' => $frequency,
            'consistency' => round($consistency, 1),
            'peak_time' => $peakTime,
            'avg_sessions_per_week' => round($leaderboards->count() / 4, 1)
        ];
    }

    /**
     * Create motivation profile for user
     */
    private function createMotivationProfile(User $user): array
    {
        $performance = $this->analyzeUserPerformance($user);

        $motivationType = 'achievement_oriented';
        if ($performance['study_frequency'] < 2) {
            $motivationType = 'needs_motivation';
        } elseif ($performance['consistency'] > 80) {
            $motivationType = 'consistency_driven';
        } elseif ($performance['improvement_rate'] > 10) {
            $motivationType = 'growth_oriented';
        }

        return [
            'type' => $motivationType,
            'confidence_level' => $performance['avg_score'] > 70 ? 'high' :
                              ($performance['avg_score'] > 50 ? 'medium' : 'low'),
            'goal_orientation' => $performance['improvement_potential'] === 'high' ? 'improvement' : 'maintenance'
        ];
    }

    /**
     * Generate AI insights
     */
    private function generateAIInsights(array $performance, string $learningStyle, array $studyPattern): array
    {
        $insights = [];

        // Performance insights
        if ($performance['recent_trend'] === 'improving') {
            $insights[] = [
                'type' => 'positive',
                'icon' => '📈',
                'title' => 'Performa Meningkat',
                'description' => "Skor Anda meningkat {$performance['improvement_rate']}% dalam tryout terakhir. Pertahankan momentum ini!"
            ];
        } elseif ($performance['recent_trend'] === 'declining') {
            $insights[] = [
                'type' => 'warning',
                'icon' => '📉',
                'title' => 'Perlu Perhatian',
                'description' => "Performa Anda menurun. Mari kita tingkatkan kembali dengan strategi baru!"
            ];
        }

        // Consistency insights
        if ($performance['consistency'] > 80) {
            $insights[] = [
                'type' => 'positive',
                'icon' => '🎯',
                'title' => 'Sangat Konsisten',
                'description' => 'Konsistensi Anda luar biasa! Ini adalah kunci sukses dalam ujian CPNS/PPPK.'
            ];
        } elseif ($performance['consistency'] < 40) {
            $insights[] = [
                'type' => 'warning',
                'icon' => '⚡',
                'title' => 'Tingkatkan Konsistensi',
                'description' => 'Variasi skor Anda tinggi. Fokus pada pembelajaran terstruktur untuk hasil yang lebih konsisten.'
            ];
        }

        // Learning style insights
        $learningStyleDescriptions = [
            'quick_learner' => 'Anda adalah pembelajar cepat yang dapat memahami materi dengan baik dalam waktu singkat.',
            'thorough_learner' => 'Anda adalah pembelajar yang teliti dan mendalam, cocok untuk soal-soal kompleks.',
            'speed_focused' => 'Anda cenderung fokus pada kecepatan. Tingkatkan akurasi tanpa mengorbankan kecepatan.',
            'needs_foundation' => 'Fokus pada pemahaman konsep dasar sebelum melanjutkan ke materi yang lebih sulit.',
            'balanced_learner' => 'Anda memiliki keseimbangan yang baik antara kecepatan dan akurasi.'
        ];

        if (isset($learningStyleDescriptions[$learningStyle])) {
            $insights[] = [
                'type' => 'info',
                'icon' => '🧠',
                'title' => 'Gaya Belajar Anda',
                'description' => $learningStyleDescriptions[$learningStyle]
            ];
        }

        return $insights;
    }

    /**
     * Create personalized study plan
     */
    private function createPersonalizedStudyPlan(array $performance, string $learningStyle, array $studyPattern): array
    {
        $plan = [];

        // Weekly study schedule
        $weeklyHours = $this->calculateRecommendedWeeklyHours($performance, $studyPattern);

        $plan['schedule'] = [
            'weekly_hours' => $weeklyHours,
            'daily_sessions' => ceil($weeklyHours / 5),
            'optimal_time' => $studyPattern['peak_time'],
            'session_length' => $this->calculateOptimalSessionLength($learningStyle)
        ];

        // Focus areas
        $plan['focus_areas'] = [];
        if (!empty($performance['weakness_areas'])) {
            foreach ($performance['weakness_areas'] as $area) {
                $plan['focus_areas'][] = [
                    'area' => $area,
                    'priority' => 'high',
                    'time_allocation' => '40%',
                    'activities' => $this->getStudyActivities($area, $learningStyle)
                ];
            }
        }

        if (!empty($performance['strength_areas'])) {
            foreach ($performance['strength_areas'] as $area) {
                $plan['focus_areas'][] = [
                    'area' => $area,
                    'priority' => 'maintain',
                    'time_allocation' => '20%',
                    'activities' => $this->getStudyActivities($area, $learningStyle)
                ];
            }
        }

        return $plan;
    }

    /**
     * Generate smart recommendations
     */
    private function generateSmartRecommendations(array $performance, array $motivationProfile): array
    {
        $recommendations = [];

        // Performance-based recommendations
        if ($performance['avg_score'] >= 70) {
            $recommendations[] = [
                'type' => 'advanced',
                'priority' => 'maintain',
                'title' => 'Program Kelas Master',
                'description' => 'Pertahankan performa unggul dan targetkan skor maksimal.',
                'action_items' => [
                    'Tingkatkan kecepatan pengerjaan',
                    'Coba soal-soal dengan tingkat kesulitan tinggi',
                    'Mentor pemula di study group'
                ],
                'estimated_time' => '6-8 minggu',
                'success_probability' => 95
            ];
        }

        return $recommendations;
    }

    /**
     * Create gamification challenges
     */
    private function createGamificationChallenges(array $performance, array $studyPattern): array
    {
        $challenges = [];

        // Daily challenges
        $challenges[] = [
            'type' => 'daily',
            'title' => 'Konsistensi Harian',
            'description' => 'Selesaikan 1 sesi tryout dengan skor di atas rerata Anda',
            'difficulty' => 'easy',
            'estimated_time' => '30 menit',
            'completion_rate' => $studyPattern['frequency'] === 'high' ? 75 : 60,
            'cashback' => 'Rp 5.000'
        ];

        // Weekly challenges
        $challenges[] = [
            'type' => 'weekly',
            'title' => 'Komitmen Mingguan',
            'description' => 'Selesaikan 5 sesi tryout dalam 7 hari',
            'difficulty' => 'medium',
            'estimated_time' => '3-4 jam',
            'completion_rate' => $studyPattern['frequency'] === 'high' ? 80 : 45,
            'cashback' => 'Rp 25.000'
        ];

        // Performance challenges
        if ($performance['avg_score'] < 70) {
            $challenges[] = [
                'type' => 'performance',
                'title' => 'Target Peningkatan',
                'description' => 'Capai skor 10 poin lebih tinggi dari skor rata-rata Anda',
                'difficulty' => 'medium',
                'estimated_time' => '1 jam',
                'completion_rate' => 65,
                'cashback' => 'Rp 15.000'
            ];
        } else {
            $challenges[] = [
                'type' => 'performance',
                'title' => 'Tantangan Master',
                'description' => 'Capai skor sempurna atau di atas 90%',
                'difficulty' => 'hard',
                'estimated_time' => '1.5 jam',
                'completion_rate' => 25,
                'cashback' => 'Rp 50.000'
            ];
        }

        return $challenges;
    }

    /**
     * Generate premium insights
     */
    private function generatePremiumInsights(array $performance, string $learningStyle): array
    {
        $insights = [];

        // Advanced performance analysis
        $weeksToGoal = $this->predictTimeToGoal($performance);
        $insights[] = [
            'title' => 'Analisis Prediktif AI',
            'description' => "Berdasarkan performa Anda, kami memprediksi Anda akan mencapai skor maksimal dalam {$weeksToGoal} minggu dengan belajar terstruktur.",
            'premium_feature' => true,
            'action_text' => 'Lihat Prediksi Lengkap'
        ];

        // Personalized tips
        $insights[] = [
            'title' => 'Strategi Berdasarkan Gaya Belajar',
            'description' => $this->getPersonalizedStrategy($learningStyle, $performance),
            'premium_feature' => true,
            'action_text' => 'Dapatkan Strategi Lengkap'
        ];

        return $insights;
    }

    // Helper methods
    private function calculateStandardDeviation(array $numbers): float
    {
        if (count($numbers) < 2) return 0;

        $mean = array_sum($numbers) / count($numbers);
        $variance = array_sum(array_map(function($x) use ($mean) {
            return pow($x - $mean, 2);
        }, $numbers)) / count($numbers);

        return sqrt($variance);
    }

    private function calculateCategoryTrend(Collection $group): string
    {
        if ($group->count() < 3) return 'stable';

        $recent = $group->take(3)->avg('total_skor');
        $earlier = $group->slice(3, 3)->avg('total_skor');

        return $recent > $earlier ? 'improving' : ($recent < $earlier ? 'declining' : 'stable');
    }

    private function calculateConfidenceLevel(Collection $group): string
    {
        if ($group->count() < 3) return 'low';

        $stdDev = $this->calculateStandardDeviation($group->pluck('total_skor')->toArray());
        $avg = $group->avg('total_skor');

        $coefficient = $stdDev / max($avg, 1);

        if ($coefficient < 0.1) return 'high';
        if ($coefficient < 0.2) return 'medium';
        return 'low';
    }

    private function categorizeTryout(string $title): string
    {
        $title = strtolower($title);

        if (str_contains($title, 'twk')) return 'TWK';
        if (str_contains($title, 'tiu')) return 'TIU';
        if (str_contains($title, 'tkp')) return 'TKP';
        if (str_contains($title, 'skd')) return 'SKD';
        if (str_contains($title, 'skb')) return 'SKB';
        if (str_contains($title, 'teknis')) return 'Teknis';
        if (str_contains($title, 'manajerial')) return 'Manajerial';
        if (str_contains($title, 'sosio')) return 'Sosio Kultural';

        return 'Umum';
    }

    private function calculateImprovementRate(Collection $leaderboards): float
    {
        if ($leaderboards->count() < 6) return 0;

        $firstHalf = $leaderboards->slice(0, floor($leaderboards->count() / 2));
        $secondHalf = $leaderboards->slice(floor($leaderboards->count() / 2));

        $firstAvg = $firstHalf->avg('total_skor');
        $secondAvg = $secondHalf->avg('total_skor');

        return $firstAvg > 0 ? round((($secondAvg - $firstAvg) / $firstAvg) * 100, 1) : 0;
    }

    private function calculateRecommendedWeeklyHours(array $performance, array $studyPattern): int
    {
        $baseHours = 10; // Base recommendation

        if ($performance['avg_score'] < 50) $baseHours = 15;
        elseif ($performance['avg_score'] < 70) $baseHours = 12;
        elseif ($performance['avg_score'] >= 80) $baseHours = 8;

        // Adjust based on study frequency
        if ($studyPattern['frequency'] === 'low') $baseHours += 3;
        if ($studyPattern['frequency'] === 'high') $baseHours -= 2;

        return max(5, min(20, $baseHours));
    }

    private function calculateOptimalSessionLength(string $learningStyle): string
    {
        $sessionLengths = [
            'quick_learner' => '45-60 menit',
            'thorough_learner' => '90-120 menit',
            'speed_focused' => '30-45 menit',
            'needs_foundation' => '60-75 menit',
            'balanced_learner' => '60-90 menit'
        ];

        return $sessionLengths[$learningStyle] ?? '60-75 menit';
    }

    private function getStudyActivities(string $area, string $learningStyle): array
    {
        $activities = [
            'TWK' => [
                'quick_learner' => ['Flashcard Speed Review', 'Quick Quiz Sessions'],
                'thorough_learner' => ['Detailed Material Study', 'Case Analysis'],
                'speed_focused' => ['Timed Practice', 'Pattern Recognition'],
                'needs_foundation' => ['Basic Concept Review', 'Step-by-step Learning']
            ],
            'TIU' => [
                'quick_learner' => ['Logic Puzzles', 'Speed Problem Solving'],
                'thorough_learner' => ['Analytical Reasoning', 'Complex Problem Breakdown'],
                'speed_focused' => ['Timed Logic Tests', 'Pattern Recognition'],
                'needs_foundation' => ['Basic Logic Training', 'Step-by-step Reasoning']
            ],
            'TKP' => [
                'quick_learner' => ['Quick Scenarios', 'Fast Decision Making'],
                'thorough_learner' => ['Detailed Scenario Analysis', 'Character Assessment'],
                'speed_focused' => ['Rapid Response Training', 'Instinct Building'],
                'needs_foundation' => ['Personality Understanding', 'Basic TKP Concepts']
            ]
        ];

        return $activities[$area][$learningStyle] ?? ['General Practice', 'Regular Reviews'];
    }

    private function predictTimeToGoal(array $performance): int
    {
        if ($performance['improvement_rate'] <= 0) return 12;

        $targetScore = 90;
        $currentScore = $performance['avg_score'];
        $gap = $targetScore - $currentScore;

        $weeklyImprovement = max(1, $performance['improvement_rate'] / 4); // Convert to weekly

        return max(4, min(20, ceil($gap / $weeklyImprovement)));
    }

    private function getPersonalizedStrategy(string $learningStyle, array $performance): string
    {
        $strategies = [
            'quick_learner' => 'Gunakan teknik pomodoro 25 menit dengan 5 menit break. Fokus pada variety dan speed training.',
            'thorough_learner' => 'Sesi belajar 2 jam dengan deep dives. Gunakan mind mapping dan detailed note taking.',
            'speed_focused' => 'Prioritaskan accuracy training. Gunakan timer dan focus pada quality over speed.',
            'needs_foundation' => 'Mulai dari basic concepts. Gunakan visual aids dan real-life examples.',
            'balanced_learner' => 'Kombinasikan speed dan accuracy. Gunakan mixed practice sessions.'
        ];

        return $strategies[$learningStyle] ?? 'Ikuti program belajar terstruktur dengan jadwal rutin.';
    }
}

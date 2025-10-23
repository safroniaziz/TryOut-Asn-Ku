<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display user's dashboard.
     */
    public function index()
    {
        // Static data with better formatting from dashboard-old
        $stats = [
            'total_tryouts_completed' => 12,
            'average_score' => 78.5,
            'best_score' => 92,
            'accuracy_rate' => 85.2,
            'current_streak' => 3,
            'study_streak' => 5,
        ];

        // Progress data for enhanced display
        $progressData = [
            'total_tryouts_available' => 50,
            'completion_rate' => 24,
            'study_streak' => 5,
        ];

        // Sample recent tryouts with better data
        $recentTryouts = collect([
            (object) [
                'id' => 1,
                'total_skor' => 92,
                'created_at' => now(),
                'tryout' => (object) [
                    'title' => 'TWK - Tes Wawasan Kebangsaan',
                    'total_questions' => 30
                ],
                'persentase' => 85.5
            ],
            (object) [
                'id' => 2,
                'total_skor' => 78,
                'created_at' => now()->subDays(1),
                'tryout' => (object) [
                    'title' => 'TIU - Tes Intelegensia Umum',
                    'total_questions' => 35
                ],
                'persentase' => 72.8
            ],
            (object) [
                'id' => 3,
                'total_skor' => 85,
                'created_at' => now()->subDays(2),
                'tryout' => (object) [
                    'title' => 'TKP - Tes Karakteristik Pribadi',
                    'total_questions' => 40
                ],
                'persentase' => 79.2
            ]
        ]);

        return view('dashboard', compact(
            'stats',
            'progressData',
            'recentTryouts'
        ));
    }
}

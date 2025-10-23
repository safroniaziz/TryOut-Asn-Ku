<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTryout;
use App\Models\Tryout;
use App\Models\UserAnswer;

class HistoryController extends Controller
{
    /**
     * Display all user's tryout history
     */
    public function index()
    {
        $user = Auth::user();

        // Get all user's tryouts with tryout details
        $userTryouts = UserTryout::with('tryout')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Calculate statistics
        $stats = [
            'total_tryouts' => $userTryouts->total(),
            'avg_score' => $userTryouts->avg('total_skor'),
            'best_score' => $userTryouts->max('total_skor'),
            'completion_rate' => $userTryouts->where('status', 'completed')->count() > 0
                ? round(($userTryouts->where('status', 'completed')->count() / $userTryouts->total()) * 100)
                : 0
        ];

        return view('history.index', compact('userTryouts', 'stats'));
    }

    /**
     * Display detailed tryout results with answers
     */
    public function show(UserTryout $tryout)
    {
        // Ensure user can only see their own results
        if ($tryout->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        // Load tryout with answers and question details
        $tryout->load([
            'tryout',
            'answers.question',
            'answers.question.options'
        ]);

        // Group answers by category if available
        $answersByCategory = [];
        if ($tryout->answers->isNotEmpty()) {
            foreach ($tryout->answers as $answer) {
                $category = $answer->question->kategori ?? 'Umum';
                if (!isset($answersByCategory[$category])) {
                    $answersByCategory[$category] = [
                        'questions' => [],
                        'correct' => 0,
                        'total' => 0
                    ];
                }

                $answersByCategory[$category]['questions'][] = $answer;
                $answersByCategory[$category]['total']++;

                if ($answer->is_correct) {
                    $answersByCategory[$category]['correct']++;
                }
            }
        }

        // Calculate category scores
        foreach ($answersByCategory as $category => &$data) {
            $data['percentage'] = $data['total'] > 0
                ? round(($data['correct'] / $data['total']) * 100)
                : 0;
        }

        return view('history.show', compact('tryout', 'answersByCategory'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\Tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index()
    {
        $tryouts = Tryout::active()
            ->withCount('leaderboards')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('leaderboards.index', compact('tryouts'));
    }

    public function show(Tryout $tryout)
    {
        $user = Auth::user();
        
        $leaderboards = Leaderboard::with('user')
            ->where('tryout_id', $tryout->id)
            ->orderBy('rank')
            ->paginate(50);

        // Get current user's rank if they participated
        $userRank = null;
        if ($user) {
            $userLeaderboard = Leaderboard::where([
                'user_id' => $user->id,
                'tryout_id' => $tryout->id
            ])->first();
            
            $userRank = $userLeaderboard ? $userLeaderboard->rank : null;
        }

        return view('leaderboards.show', compact('tryout', 'leaderboards', 'userRank'));
    }

    public function global()
    {
        // Global ranking based on average scores across all tryouts
        $rankings = Leaderboard::selectRaw('
                user_id,
                COUNT(*) as total_tryouts,
                AVG(total_skor) as avg_score,
                SUM(total_skor) as total_score,
                AVG(persentase) as avg_percentage
            ')
            ->with('user')
            ->groupBy('user_id')
            ->having('total_tryouts', '>=', 3) // Minimum 3 tryouts to be ranked
            ->orderBy('avg_score', 'desc')
            ->paginate(50);

        return view('leaderboards.global', compact('rankings'));
    }
}

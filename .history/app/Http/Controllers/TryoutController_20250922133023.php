<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Soal;
use App\Models\JawabanUser;
use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TryoutController extends Controller
{
    public function index()
    {
        $tryouts = Tryout::active()->paginate(12);
        return view('tryouts.index', compact('tryouts'));
    }

    public function show(Tryout $tryout)
    {
        $user = Auth::user();
        $hasCompleted = $user->hasCompletedTryout($tryout->id);

        if ($hasCompleted) {
            return redirect()->route('tryouts.result', $tryout);
        }

        return view('tryouts.show', compact('tryout', 'hasCompleted'));
    }

    public function start(Tryout $tryout)
    {
        $user = Auth::user();

        // Check if user already completed this tryout
        if ($user->hasCompletedTryout($tryout->id)) {
            return redirect()->route('tryouts.result', $tryout)
                ->with('info', 'Anda sudah mengerjakan tryout ini.');
        }

        // Get first question
        $soal = $tryout->soals()->orderBy('nomor_soal')->first();

        if (!$soal) {
            return redirect()->route('tryouts.index')
                ->with('error', 'Tryout ini belum memiliki soal.');
        }

        return redirect()->route('tryouts.question', [$tryout, $soal]);
    }

    public function question(Tryout $tryout, Soal $soal)
    {
        $user = Auth::user();

        // Check if user already completed this tryout
        if ($user->hasCompletedTryout($tryout->id)) {
            return redirect()->route('tryouts.result', $tryout);
        }

        // Get user's answer for this question if exists
        $existingAnswer = JawabanUser::where([
            'user_id' => $user->id,
            'tryout_id' => $tryout->id,
            'soal_id' => $soal->id
        ])->first();

        // Get all questions for navigation
        $allSoals = $tryout->soals()->orderBy('nomor_soal')->get();
        $currentIndex = $allSoals->search(function($item) use ($soal) {
            return $item->id === $soal->id;
        });

        return view('tryouts.question', compact(
            'tryout',
            'soal',
            'existingAnswer',
            'allSoals',
            'currentIndex'
        ));
    }

    public function answer(Request $request, Tryout $tryout, Soal $soal)
    {
        $request->validate([
            'jawaban' => 'required|in:A,B,C,D,E'
        ]);

        $user = Auth::user();
        $jawaban = $request->jawaban;
        $isCorrect = $soal->isCorrectAnswer($jawaban);
        $skor = $isCorrect ? 5 : 0; // 5 points per correct answer

        // Save or update answer
        JawabanUser::updateOrCreate(
            [
                'user_id' => $user->id,
                'tryout_id' => $tryout->id,
                'soal_id' => $soal->id
            ],
            [
                'jawaban' => $jawaban,
                'is_correct' => $isCorrect,
                'skor' => $skor
            ]
        );

        // Get next question
        $nextSoal = $tryout->soals()
            ->where('nomor_soal', '>', $soal->nomor_soal)
            ->orderBy('nomor_soal')
            ->first();

        if ($nextSoal) {
            return redirect()->route('tryouts.question', [$tryout, $nextSoal]);
        } else {
            // Last question, redirect to submit
            return redirect()->route('tryouts.submit', $tryout);
        }
    }

    public function submit(Tryout $tryout)
    {
        $user = Auth::user();

        // Check if already submitted
        if ($user->hasCompletedTryout($tryout->id)) {
            return redirect()->route('tryouts.result', $tryout);
        }

        // Calculate final score
        $jawabans = JawabanUser::where([
            'user_id' => $user->id,
            'tryout_id' => $tryout->id
        ])->get();

        $totalSoal = $tryout->soals()->count();
        $benar = $jawabans->where('is_correct', true)->count();
        $salah = $jawabans->where('is_correct', false)->count();
        $tidakDijawab = $totalSoal - $jawabans->count();
        $totalSkor = $jawabans->sum('skor');
        $persentase = $totalSoal > 0 ? ($benar / $totalSoal) * 100 : 0;

        // Save to leaderboard
        Leaderboard::create([
            'user_id' => $user->id,
            'tryout_id' => $tryout->id,
            'total_skor' => $totalSkor,
            'benar' => $benar,
            'salah' => $salah,
            'tidak_dijawab' => $tidakDijawab,
            'persentase' => $persentase,
            'waktu_pengerjaan_detik' => 0 // TODO: Track actual time
        ]);

        // Update ranks for all users
        $this->updateRanks($tryout->id);

        return redirect()->route('tryouts.result', $tryout);
    }

    public function result(Tryout $tryout)
    {
        $user = Auth::user();
        $leaderboard = $user->leaderboards()
            ->where('tryout_id', $tryout->id)
            ->first();

        if (!$leaderboard) {
            return redirect()->route('tryouts.show', $tryout)
                ->with('error', 'Anda belum mengerjakan tryout ini.');
        }

        // Get answers with explanations
        $jawabans = JawabanUser::with('soal')
            ->where([
                'user_id' => $user->id,
                'tryout_id' => $tryout->id
            ])
            ->get()
            ->keyBy('soal.nomor_soal');

        return view('tryouts.result', compact('tryout', 'leaderboard', 'jawabans'));
    }

    private function updateRanks($tryoutId)
    {
        $leaderboards = Leaderboard::where('tryout_id', $tryoutId)
            ->orderBy('total_skor', 'desc')
            ->orderBy('created_at', 'asc')
            ->get();

        foreach ($leaderboards as $index => $leaderboard) {
            $leaderboard->update(['rank' => $index + 1]);
        }
    }
}

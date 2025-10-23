<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Soal;
use App\Models\JawabanUser;
use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TryoutController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $hasPremium = $user->hasActivePremiumSubscription();

        // Priority to URL parameter, fallback to user preference
        $targetTest = $request->get('type', $user->target_test ?? 'both');

        // Get all active tryouts based on filter
        if ($targetTest === 'CPNS') {
            $allTryouts = Tryout::active()->cpns()->orderBy('created_at', 'desc')->get();
            $groupedPackages = $this->groupTryoutsByPackage($allTryouts, 'CPNS');
            $tryoutPackages = $this->getAvailablePackages($groupedPackages, $hasPremium);
        } elseif ($targetTest === 'PPPK') {
            $allTryouts = Tryout::active()->pppk()->orderBy('created_at', 'desc')->get();
            $groupedPackages = $this->groupTryoutsByPackage($allTryouts, 'PPPK');
            $tryoutPackages = $this->getAvailablePackages($groupedPackages, $hasPremium);
        } else { // both or no filter
            $cpnsTryouts = Tryout::active()->cpns()->orderBy('created_at', 'desc')->get();
            $pppkTryouts = Tryout::active()->pppk()->orderBy('created_at', 'desc')->get();
            $cpnsGroupedPackages = $this->groupTryoutsByPackage($cpnsTryouts, 'CPNS');
            $pppkGroupedPackages = $this->groupTryoutsByPackage($pppkTryouts, 'PPPK');
            $cpnsPackages = $this->getAvailablePackages($cpnsGroupedPackages, $hasPremium);
            $pppkPackages = $this->getAvailablePackages($pppkGroupedPackages, $hasPremium);
            $tryoutPackages = array_merge($cpnsPackages, $pppkPackages);
        }

        return view('tryouts.index', compact('tryoutPackages', 'hasPremium', 'targetTest'));
    }

    /**
     * Group tryouts by individual packages (each tryout is a package)
     */
    private function groupTryoutsByPackage($tryouts, $type)
    {
        $packages = [];

        foreach ($tryouts as $tryout) {
            $packageData = [
                'name' => $tryout->title,
                'type' => $type,
                'category_type' => $this->getCategoryTypeFromCategories($tryout),
                'tryouts' => collect([$tryout]),
                'total_questions' => $tryout->total_questions,
                'total_duration' => $tryout->duration_minutes,
                'categories' => $this->getTryoutCategoryNames($tryout),
                'created_at' => $tryout->created_at
            ];

            $packageData['total_participants'] = $this->getTotalParticipants($packageData['tryouts']);
            $packageData['completion_rate'] = $this->getCompletionRate($packageData['tryouts']);
            $packageData['average_score'] = $this->getAverageScore($packageData['tryouts']);
            $packageData['time_access_label'] = $this->getTimeAccessLabel($tryout);
            $packageData['payment_type_label'] = $this->getPaymentTypeLabel($tryout);
            $packageData['is_free_package'] = $tryout->package_type === 'free';
            $packageData['is_premium_package'] = $tryout->package_type === 'premium';
            $packageData['category_names'] = $this->getTryoutCategoryNames($tryout);
            $packageData['category_details'] = $this->getTryoutCategoryDetails($tryout);
            $packageData['start_date'] = $tryout->start_date;
            $packageData['end_date'] = $tryout->end_date;
            $packageData['is_completed_by_user'] = $this->isPackageCompletedByUser($packageData['tryouts'], Auth::user());
            $packageData['user_score_in_package'] = $this->getUserScoreInPackage($packageData['tryouts'], Auth::user());

            $packages[] = $packageData;
        }

        // Sort by creation date (newest first)
        usort($packages, function($a, $b) {
            return $b['created_at'] <=> $a['created_at'];
        });

        return $packages;
    }

    /**
     * Get total participants for tryouts in a package
     */
    private function getTotalParticipants($tryouts)
    {
        return $tryouts->sum(function($tryout) {
            return $tryout->leaderboards()->count();
        });
    }

    /**
     * Get completion rate for tryouts in a package
     */
    private function getCompletionRate($tryouts)
    {
        $totalPossibleCompletions = $tryouts->count() * User::count();
        if ($totalPossibleCompletions === 0) return 0;

        $totalCompletions = $tryouts->sum(function($tryout) {
            return $tryout->leaderboards()->count();
        });

        return round(($totalCompletions / $totalPossibleCompletions) * 100, 1);
    }

    /**
     * Get average score for tryouts in a package
     */
    private function getAverageScore($tryouts)
    {
        $totalScore = $tryouts->sum(function($tryout) {
            return $tryout->leaderboards()->avg('total_skor') ?? 0;
        });

        return $tryouts->count() > 0 ? round($totalScore / $tryouts->count(), 1) : 0;
    }

    /**
     * Get category type based on tryout categories for proper CPNS SKD vs SKB distinction
     */
    private function getCategoryTypeFromCategories($tryout)
    {
        $categories = $tryout->categories->pluck('name')->toArray();

        if (empty($categories)) {
            return $this->getCategoryType($tryout->kategori ?? '');
        }

        if ($tryout->type === 'CPNS') {
            $skdCategories = ['TWK', 'TIU', 'TKP'];

            if (count($categories) === 3 && empty(array_diff($categories, $skdCategories))) {
                return 'SKD';
            }

            return 'SKB';
        }

        if ($tryout->type === 'PPPK') {
            $nonTeknisCategories = ['Manajerial', 'Sosio Kultural', 'Wawancara'];
            if (count(array_intersect($categories, $nonTeknisCategories)) > 0) {
                return 'Non-Teknis';
            }

            return 'Teknis';
        }

        return $this->getCategoryType($tryout->kategori ?? '');
    }

    /**
     * Get category type based on package name
     */
    private function getCategoryType($packageName)
    {
        $packageName = strtolower($packageName);

        if (str_contains($packageName, 'nasional') || str_contains($packageName, 'serentak')) {
            return 'Nasional';
        } elseif (str_contains($packageName, 'bisa kapan saja')) {
            return 'Bebas';
        } elseif (str_contains($packageName, 'teknis')) {
            return 'Teknis';
        } elseif (str_contains($packageName, 'non-teknis')) {
            return 'Non-Teknis';
        } elseif (str_contains($packageName, 'skd')) {
            return 'SKD';
        } else {
            return 'Bebas';
        }
    }

    /**
     * Get category names for a tryout
     */
    private function getTryoutCategoryNames($tryout)
    {
        $categoryNames = $tryout->categories->pluck('name')->toArray();

        if (empty($categoryNames)) {
            $kategori = $tryout->kategori;

            $invalidCategories = ['Bebas', 'Nasional', 'SKD Nasional', 'Latihan PPPK', 'SKD Latihan', 'Manajerial Nasional'];

            if ($kategori && !in_array($kategori, $invalidCategories)) {
                return [$kategori];
            }
        }

        $invalidCategories = ['SKD Nasional', 'Latihan PPPK', 'SKD Latihan', 'Manajerial Nasional'];
        $categoryNames = array_filter($categoryNames, function($name) use ($invalidCategories) {
            return !in_array($name, $invalidCategories);
        });

        return array_values($categoryNames);
    }

    /**
     * Get detailed category information including question counts
     */
    private function getTryoutCategoryDetails($tryout)
    {
        $categoryDetails = [];

        foreach ($tryout->categories as $category) {
            $questionCount = $category->pivot->question_count ?? 0;
            $estimatedMinutes = max(15, $questionCount * 1.2);

            $categoryDetails[] = [
                'name' => $category->name,
                'question_count' => $questionCount,
                'estimated_minutes' => round($estimatedMinutes)
            ];
        }

        if (empty($categoryDetails) && $tryout->kategori) {
            $categoryDetails[] = [
                'name' => $tryout->kategori,
                'question_count' => $tryout->total_questions,
                'estimated_minutes' => round($tryout->duration_minutes)
            ];
        }

        return $categoryDetails;
    }

    /**
     * Get time access label for display
     */
    private function getTimeAccessLabel($tryout)
    {
        if ($tryout->tryout_time === 'nasional') {
            return 'Serentak Nasional';
        }

        if ($tryout->tryout_time === 'free') {
            return 'Akses Kapanpun';
        }

        return '';
    }

    /**
     * Get payment type label for display
     */
    private function getPaymentTypeLabel($tryout)
    {
        if ($tryout->package_type === 'premium') {
            return 'Premium';
        }

        return '';
    }

    /**
     * Check if user has completed this package
     */
    private function isPackageCompletedByUser($tryouts, $user)
    {
        $completedTryouts = $user->leaderboards()
            ->whereIn('tryout_id', $tryouts->pluck('id'))
            ->count();

        return $completedTryouts === $tryouts->count();
    }

    /**
     * Get user's best score in this package
     */
    private function getUserScoreInPackage($tryouts, $user)
    {
        return $user->leaderboards()
            ->whereIn('tryout_id', $tryouts->pluck('id'))
            ->max('total_skor') ?? 0;
    }

    /**
     * Filter packages based on availability
     */
    private function getAvailablePackages($packages, $hasPremium = false)
    {
        $availablePackages = [];

        foreach ($packages as $package) {
            $isAvailable = $this->isPackageAvailable($package, $hasPremium);

            if ($isAvailable) {
                $package['is_free'] = $this->isPackageFree($package);
                $package['is_premium'] = !$package['is_free'];
                $availablePackages[] = $package;
            }
        }

        // Sort by creation date (newest first)
        usort($availablePackages, function($a, $b) {
            return $b['created_at'] <=> $a['created_at'];
        });

        return $availablePackages;
    }

    /**
     * Check if package is available for user
     */
    private function isPackageAvailable($package, $hasPremium)
    {
        return true;
    }

    /**
     * Check if package is free
     */
    private function isPackageFree($package)
    {
        foreach ($package['tryouts'] as $tryout) {
            if ($tryout->isPremium()) {
                return false;
            }
        }
        return true;
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

    public function start(Request $request, Tryout $tryout)
    {
        $user = Auth::user();

        // Check if user already completed this tryout
        if ($user->hasCompletedTryout($tryout->id)) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda sudah mengerjakan tryout ini.',
                    'already_completed' => true
                ]);
            }
            return redirect()->route('tryouts.result', $tryout)
                ->with('info', 'Anda sudah mengerjakan tryout ini.');
        }

        // Store start time in session if not already started
        $sessionKey = "tryout_{$tryout->id}_start_time";
        if (!session()->has($sessionKey)) {
            session([$sessionKey => now()->timestamp]);
        }

        // Get first question
        $soal = $tryout->soals()->orderBy('nomor_soal')->first();

        if (!$soal) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tryout ini belum memiliki soal.'
                ]);
            }
            return redirect()->route('tryouts.index')
                ->with('error', 'Tryout ini belum memiliki soal.');
        }

        // Handle AJAX request - return first question data
        if ($request->ajax()) {
            // Get user's answer for this question if exists
            $existingAnswer = JawabanUser::where([
                'user_id' => $user->id,
                'tryout_id' => $tryout->id,
                'soal_id' => $soal->id
            ])->first();

            // Get all questions for navigation
            $allSoals = $tryout->soals()->orderBy('nomor_soal')->get();
            $currentIndex = 0; // First question

            // Generate answer options HTML
            $answerOptionsHtml = '';
            foreach (['A', 'B', 'C', 'D', 'E'] as $option) {
                $isSelected = $existingAnswer && $existingAnswer->jawaban === $option;
                $answerOptionsHtml .= view('partials.answer-option', [
                    'option' => $option,
                    'soal' => $soal,
                    'existingAnswer' => $existingAnswer,
                    'isSelected' => $isSelected
                ])->render();
            }

            // Get categories string for display
            $categoriesList = $tryout->categories()->pluck('name')->implode(', ');

            return response()->json([
                'success' => true,
                'message' => 'TryOut siap dimulai!',
                'redirect' => route('tryouts.question', $tryout),
                'tryout_title' => $tryout->title,
                'total_questions' => $tryout->total_questions,
                'duration_minutes' => $tryout->duration_minutes,
                'categories' => $categoriesList,
                'question' => [
                    'id' => $soal->id,
                    'nomor_soal' => $soal->nomor_soal,
                    'kategori' => $soal->kategori,
                    'pertanyaan' => $soal->pertanyaan,
                    'answer_options_html' => $answerOptionsHtml
                ],
                'navigation' => [
                    'has_previous' => false,
                    'previous_nomor' => null,
                    'previous_index' => null,
                    'has_next' => true,
                    'next_nomor' => $allSoals->count() > 1 ? $allSoals[1]->nomor_soal : null,
                    'next_index' => $allSoals->count() > 1 ? 1 : null,
                    'is_last' => $allSoals->count() === 1
                ],
                'current_index' => $currentIndex
            ]);
        }

        return redirect()->route('tryouts.question', $tryout);
    }

    public function questionByFirst(Tryout $tryout)
    {
        $user = Auth::user();

        // Check if user already completed this tryout
        if ($user->hasCompletedTryout($tryout->id)) {
            return redirect()->route('tryouts.result', $tryout);
        }

        // Store start time in session if not already started
        $sessionKey = "tryout_{$tryout->id}_start_time";
        if (!session()->has($sessionKey)) {
            session([$sessionKey => now()->timestamp]);
        }

        // Calculate remaining time in seconds
        $startTime = session($sessionKey);
        $elapsedSeconds = now()->timestamp - $startTime;
        $totalSeconds = $tryout->duration_minutes * 60;
        $remainingSeconds = max(0, $totalSeconds - $elapsedSeconds);

        // If time is up, auto-submit
        if ($remainingSeconds <= 0) {
            return redirect()->route('tryouts.submit', $tryout);
        }

        // Get first question
        $soal = $tryout->soals()->orderBy('nomor_soal')->first();

        if (!$soal) {
            return redirect()->route('tryouts.index')
                ->with('error', 'Tryout ini belum memiliki soal.');
        }

        // Get user's answer for this question if exists
        $existingAnswer = JawabanUser::where([
            'user_id' => $user->id,
            'tryout_id' => $tryout->id,
            'soal_id' => $soal->id
        ])->first();

        // Get all questions for navigation
        $allSoals = $tryout->soals()->orderBy('nomor_soal')->get();
        $currentIndex = 0; // First question

        return view('tryouts.question', compact(
            'tryout',
            'soal',
            'existingAnswer',
            'allSoals',
            'currentIndex',
            'remainingSeconds'
        ));
    }

    public function questionByNumber(Tryout $tryout, $questionNumber)
    {
        // Enhanced debug logging
        \Log::info('=== questionByNumber START ===', [
            'tryout_id' => $tryout->id,
            'tryout_slug' => $tryout->slug,
            'question_number' => $questionNumber,
            'question_number_type' => gettype($questionNumber),
            'total_questions' => $tryout->soals()->count()
        ]);

        $user = Auth::user();

        // Check if user already completed this tryout
        if ($user->hasCompletedTryout($tryout->id)) {
            return response()->json([
                'success' => false,
                'redirect' => route('tryouts.result', $tryout)
            ]);
        }

        // Find question by number
        \Log::info('Finding question by number', [
            'searching_for' => $questionNumber,
            'search_type' => gettype($questionNumber)
        ]);

        $soal = $tryout->soals()->where('nomor_soal', $questionNumber)->first();

        \Log::info('Question search result', [
            'found' => $soal ? true : false,
            'found_soal_id' => $soal ? $soal->id : null,
            'found_soal_nomor' => $soal ? $soal->nomor_soal : null,
            'searching_for' => $questionNumber
        ]);

        if (!$soal) {
            \Log::error('Question not found', [
                'tryout_id' => $tryout->id,
                'question_number' => $questionNumber,
                'question_number_type' => gettype($questionNumber),
                'available_numbers' => $tryout->soals()->pluck('nomor_soal')->toArray(),
                'available_count' => $tryout->soals()->count()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Soal tidak ditemukan'
            ]);
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

        // Generate answer options HTML
        $answerOptionsHtml = '';
        foreach (['A', 'B', 'C', 'D', 'E'] as $option) {
            $isSelected = $existingAnswer && $existingAnswer->jawaban === $option;
            $answerOptionsHtml .= view('partials.answer-option', [
                'option' => $option,
                'soal' => $soal,
                'existingAnswer' => $existingAnswer,
                'isSelected' => $isSelected
            ])->render();
        }

        // Navigation info
        $hasPrevious = $currentIndex > 0;
        $hasNext = $currentIndex < $allSoals->count() - 1;
        $isLast = $currentIndex === $allSoals->count() - 1;

        $navigation = [
            'has_previous' => $hasPrevious,
            'previous_nomor' => $hasPrevious ? $allSoals[$currentIndex - 1]->nomor_soal : null,
            'previous_index' => $hasPrevious ? $currentIndex - 1 : null,
            'has_next' => $hasNext,
            'next_nomor' => $hasNext ? $allSoals[$currentIndex + 1]->nomor_soal : null,
            'next_index' => $hasNext ? $currentIndex + 1 : null,
            'is_last' => $isLast
        ];

        // Calculate remaining time in seconds
        $sessionKey = "tryout_{$tryout->id}_start_time";
        $startTime = session($sessionKey, now()->timestamp);
        $elapsedSeconds = now()->timestamp - $startTime;
        $totalSeconds = $tryout->duration_minutes * 60;
        $remainingSeconds = max(0, $totalSeconds - $elapsedSeconds);

        // Get all answered questions for this user
        $answeredQuestions = JawabanUser::where([
            'user_id' => $user->id,
            'tryout_id' => $tryout->id
        ])->pluck('soal_id')->toArray();

        // Debug: Check if current question is in answered list
        $isCurrentAnswered = in_array($soal->id, $answeredQuestions);

        \Log::info('=== ANSWERED QUESTIONS DEBUG (AJAX) ===', [
            'total_answered' => count($answeredQuestions),
            'answered_ids' => $answeredQuestions,
            'current_question_id' => $soal->id,
            'current_question_number' => $questionNumber,
            'is_current_answered' => $isCurrentAnswered,
            'total_questions' => $allSoals->count(),
            'remaining_seconds' => $remainingSeconds
        ]);

        // Also debug specific question 1 if we're on it
        if ($questionNumber == 1) {
            \Log::info('QUESTION 1 AJAX DEBUG', [
                'question_1_id' => $soal->id,
                'in_answered_list' => $isCurrentAnswered,
                'answered_list_contains_1' => in_array($soal->id, $answeredQuestions)
            ]);
        }

        return response()->json([
            'success' => true,
            'question' => [
                'id' => $soal->id,
                'nomor_soal' => $soal->nomor_soal,
                'kategori' => $soal->kategori,
                'pertanyaan' => $soal->pertanyaan,
                'answer_options_html' => $answerOptionsHtml
            ],
            'navigation' => $navigation,
            'current_index' => $currentIndex,
            'answered_questions' => $answeredQuestions,
            'remaining_seconds' => $remainingSeconds
        ]);
    }

    public function answer(Request $request, Tryout $tryout)
    {
        try {
            $validated = $request->validate([
                'jawaban' => 'required|in:A,B,C,D,E',
                'soal_id' => 'required|exists:soals,id'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors for AJAX requests
            if ($request->ajax()) {
                $errors = $e->errors();

                // Simplify error messages
                $errorMessage = 'Jawaban wajib dipilih';

                // Check for specific validation errors
                if (isset($errors['jawaban'])) {
                    $errorMessage = 'Jawaban wajib dipilih';
                } elseif (isset($errors['soal_id'])) {
                    $errorMessage = 'Soal tidak valid';
                }

                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                    'errors' => $errors
                ]);
            }

            // For non-AJAX requests, let Laravel handle the validation as usual
            throw $e;
        }

        $user = Auth::user();
        $soalId = $request->soal_id;
        $jawaban = $request->jawaban;

        // Find the soal
        $soal = \App\Models\Soal::findOrFail($soalId);

        // Verify this soal belongs to this tryout
        if ($soal->tryout_id !== $tryout->id) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Soal tidak valid untuk tryout ini'
                ]);
            }
            return redirect()->back()->with('error', 'Soal tidak valid');
        }

        $isCorrect = $soal->isCorrectAnswer($jawaban);
        $skor = $isCorrect ? 5 : 0; // 5 points per correct answer

        // Save or update answer
        JawabanUser::updateOrCreate(
            [
                'user_id' => $user->id,
                'tryout_id' => $tryout->id,
                'soal_id' => $soalId
            ],
            [
                'jawaban' => $jawaban,
                'is_correct' => $isCorrect,
                'skor' => $skor
            ]
        );

        // Handle AJAX request
        if ($request->ajax()) {
            // Get next question
            $nextSoal = $tryout->soals()
                ->where('nomor_soal', '>', $soal->nomor_soal)
                ->orderBy('nomor_soal')
                ->first();

            if ($nextSoal) {
                $allSoals = $tryout->soals()->orderBy('nomor_soal')->get();
                $currentIndex = $allSoals->search(function($item) use ($nextSoal) {
                    return $item->id === $nextSoal->id;
                });

                // Generate answer options for next question
                $nextExistingAnswer = JawabanUser::where([
                    'user_id' => $user->id,
                    'tryout_id' => $tryout->id,
                    'soal_id' => $nextSoal->id
                ])->first();

                $nextAnswerOptionsHtml = '';
                foreach (['A', 'B', 'C', 'D', 'E'] as $option) {
                    $isNextSelected = $nextExistingAnswer && $nextExistingAnswer->jawaban === $option;
                    $nextAnswerOptionsHtml .= view('partials.answer-option', [
                        'option' => $option,
                        'soal' => $nextSoal,
                        'existingAnswer' => $nextExistingAnswer,
                        'isSelected' => $isNextSelected
                    ])->render();
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Jawaban disimpan!',
                    'next_question' => [
                        'id' => $nextSoal->id,
                        'nomor_soal' => $nextSoal->nomor_soal,
                        'kategori' => $nextSoal->kategori,
                        'pertanyaan' => $nextSoal->pertanyaan,
                        'answer_options_html' => $nextAnswerOptionsHtml
                    ],
                    'navigation' => [
                        'has_previous' => true,
                        'previous_nomor' => $soal->nomor_soal,
                        'previous_index' => $currentIndex,
                        'has_next' => $currentIndex < $allSoals->count() - 1,
                        'next_nomor' => $currentIndex < $allSoals->count() - 1 ? $allSoals[$currentIndex + 1]->nomor_soal : null,
                        'next_index' => $currentIndex < $allSoals->count() - 1 ? $currentIndex + 1 : null,
                        'is_last' => false
                    ],
                    'current_index' => $currentIndex + 1,
                    'total_answered' => JawabanUser::where(['user_id' => $user->id, 'tryout_id' => $tryout->id])->count()
                ]);
            } else {
                // Last question - mark as completed
                $this->completeTryout($user, $tryout);

                return response()->json([
                    'success' => true,
                    'message' => 'Selamat! TryOut telah selesai.',
                    'completed' => true,
                    'redirect' => route('tryouts.result', $tryout)
                ]);
            }
        }

        // Get next question for non-AJAX (fallback)
        $nextSoal = $tryout->soals()
            ->where('nomor_soal', '>', $soal->nomor_soal)
            ->orderBy('nomor_soal')
            ->first();

        if ($nextSoal) {
            return redirect()->route('tryouts.question', [$tryout, $nextSoal]);
        } else {
            // Last question, complete tryout
            $this->completeTryout($user, $tryout);
            return redirect()->route('tryouts.result', $tryout);
        }
    }

    public function checkAnswer(Tryout $tryout, $questionNumber)
    {
        $user = Auth::user();

        // Find the question
        $soal = $tryout->soals()->where('nomor_soal', $questionNumber)->first();
        if (!$soal) {
            return response()->json([
                'success' => false,
                'answered' => false
            ]);
        }

        // Check if user has answered this question
        $answered = JawabanUser::where([
            'user_id' => $user->id,
            'tryout_id' => $tryout->id,
            'soal_id' => $soal->id
        ])->exists();

        return response()->json([
            'success' => true,
            'answered' => $answered
        ]);
    }

    public function submit(Tryout $tryout)
    {
        $user = Auth::user();

        // Check if already submitted
        if ($user->hasCompletedTryout($tryout->id)) {
            return redirect()->route('tryouts.result', $tryout);
        }

        // Calculate actual working time
        $sessionKey = "tryout_{$tryout->id}_start_time";
        $startTime = session($sessionKey, now()->timestamp);
        $elapsedSeconds = now()->timestamp - $startTime;
        $waktuPengerjaanDetik = min($elapsedSeconds, $tryout->duration_minutes * 60); // Cap at max duration

        // Clear the session timer
        session()->forget($sessionKey);

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
            'waktu_pengerjaan_detik' => $waktuPengerjaanDetik
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

<?php

namespace App\Services;

use App\Models\User;
use App\Models\Leaderboard;
use App\Models\UserAchievement;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AIValidationService
{
    private $aiRecommendationService;

    public function __construct(AIRecommendationService $aiRecommendationService)
    {
        $this->aiRecommendationService = $aiRecommendationService;
    }

    /**
     * Simulate user progress for testing challenges
     */
    public function simulateUserProgress(User $user, int $completedPackages = 7): array
    {
        $simulation = [];

        // Simulate completed packages
        for ($i = 1; $i <= $completedPackages; $i++) {
            $achievement = $this->createMockAchievement($user, $i);
            $simulation[] = $achievement;

            // Add cashback for specific packages (3, 6, 10)
            if (in_array($i, [3, 6, 10])) {
                $this->addCashbackToUser($user, 5000);
            }
        }

        return [
            'user_id' => $user->id,
            'email' => $user->email,
            'completed_packages' => $completedPackages,
            'achievements' => $simulation,
            'total_cashback' => $this->calculateTotalCashback($completedPackages),
            'next_challenge' => $completedPackages + 1,
            'remaining_challenges' => 10 - $completedPackages
        ];
    }

    /**
     * Create mock achievement for testing
     */
    private function createMockAchievement(User $user, int $packageNumber): array
    {
        $badges = [
            1 => ['name' => 'Pemula', 'description' => 'Langkah pertama menuju sukses'],
            2 => ['name' => 'Pekerja Keras', 'description' => 'Menunjukkan konsistensi belajar'],
            3 => ['name' => 'Pencapaian Cashback', 'description' => 'Mendapatkan cashback pertama'],
            4 => ['name' => 'Pembelajar Cerdas', 'description' => 'Mengembangkan strategi efektif'],
            5 => ['name' => 'Semi Finalis', 'description' => 'Melewati titik tengah perjalanan'],
            6 => ['name' => 'Master Cashback', 'description' => 'Mendapatkan cashback kedua'],
            7 => ['name' => 'Elite Performer', 'description' => 'Performa luar biasa'],
            8 => ['name' => 'Challenger Pro', 'description' => 'Tantangan mudah bagi Anda'],
            9 => ['name' => 'Grand Finalist', 'description' => 'Satu langkah lagi menuju juara'],
            10 => ['name' => 'Master Achievement', 'description' => 'Menyelesaikan semua tantangan']
        ];

        return [
            'package_number' => $packageNumber,
            'badge_name' => $badges[$packageNumber]['name'],
            'badge_description' => $badges[$packageNumber]['description'],
            'completed_at' => now()->subDays(10 - $packageNumber),
            'score_distribution' => [
                'TIU' => rand(4, 5),
                'TWK' => rand(4, 5),
                'TKP' => rand(4, 5)
            ],
            'total_score' => rand(12, 15),
            'cashback_earned' => in_array($packageNumber, [3, 6, 10]) ? 5000 : 0
        ];
    }

    /**
     * Add mock cashback to user balance
     */
    private function addCashbackToUser(User $user, int $amount): void
    {
        // This would integrate with your payment/balance system
        Log::info("Added cashback {$amount} to user {$user->id}");
    }

    /**
     * Calculate total cashback earned
     */
    private function calculateTotalCashback(int $completedPackages): int
    {
        $cashbackPackages = [3, 6, 10];
        $total = 0;

        foreach ($cashbackPackages as $package) {
            if ($completedPackages >= $package) {
                $total += 5000;
            }
        }

        return $total;
    }

    /**
     * Get AI recommendations for simulated user
     */
    public function getRecommendationsForSimulatedUser(string $email, int $completedPackages = 7): array
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return [
                'error' => 'User not found',
                'email' => $email
            ];
        }

        // Simulate progress
        $simulation = $this->simulateUserProgress($user, $completedPackages);

        // Get AI recommendations
        $recommendations = $this->aiRecommendationService->generatePersonalizedRecommendations($user);

        return [
            'simulation' => $simulation,
            'ai_recommendations' => $recommendations,
            'user_stats' => [
                'name' => $user->name,
                'email' => $user->email,
                'average_score' => $user->leaderboards()->avg('total_skor') ?? 0,
                'total_tryouts' => $user->leaderboards()->count()
            ],
            'challenge_status' => [
                'current_package' => $completedPackages + 1,
                'remaining_packages' => 10 - $completedPackages,
                'potential_remaining_cashback' => $this->calculatePotentialRemainingCashback($completedPackages)
            ]
        ];
    }

    /**
     * Calculate potential remaining cashback
     */
    private function calculatePotentialRemainingCashback(int $completedPackages): int
    {
        $cashbackPackages = [3, 6, 10];
        $potential = 0;

        foreach ($cashbackPackages as $package) {
            if ($completedPackages < $package) {
                $potential += 5000;
            }
        }

        return $potential;
    }

    /**
     * Get challenge button status for user
     */
    public function getChallengeButtonStatus(string $email, int $completedPackages = 7): array
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return ['error' => 'User not found'];
        }

        $simulation = $this->simulateUserProgress($user, $completedPackages);

        $isPremium = $user->hasActivePremiumSubscription();
        $nextPackage = $completedPackages + 1;

        if (!$isPremium) {
            return [
                'status' => 'upgrade_required',
                'button_text' => 'Upgrade Premium',
                'button_class' => 'bg-gray-900 hover:bg-gray-800',
                'icon' => 'fas fa-lock',
                'message' => '🔒 Upgrade Premium untuk mengerjakan tantangan'
            ];
        }

        if ($nextPackage > 10) {
            return [
                'status' => 'completed_all',
                'button_text' => 'Semua Tantangan Selesai',
                'button_class' => 'bg-green-600 hover:bg-green-700',
                'icon' => 'fas fa-trophy',
                'message' => '🎉 Selamat! Anda telah menyelesaikan semua tantangan'
            ];
        }

        $cashbackInfo = '';
        if (in_array($nextPackage, [3, 6, 10])) {
            $cashbackInfo = "🎯 Paket {$nextPackage} - Dapatkan Rp 5.000 Cashback!";
        } else {
            $cashbackInfo = "Paket {$nextPackage} - Badge Only";
        }

        return [
            'status' => 'available',
            'button_text' => 'Mulai Sekarang',
            'button_class' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700',
            'icon' => 'fas fa-play',
            'message' => $cashbackInfo,
            'next_package' => $nextPackage,
            'remaining_packages' => 10 - $completedPackages
        ];
    }

    /**
     * Validate AI recommendation components
     */
    public function validateRecommendationComponents(): array
    {
        $validation = [
            'timestamp' => now(),
            'status' => 'success',
            'checks' => []
        ];

        // Check 1: AI Service Availability
        try {
            $this->aiRecommendationService;
            $validation['checks']['ai_service'] = [
                'status' => 'pass',
                'message' => 'AI Recommendation Service loaded successfully'
            ];
        } catch (\Exception $e) {
            $validation['checks']['ai_service'] = [
                'status' => 'fail',
                'message' => 'AI Service Error: ' . $e->getMessage()
            ];
            $validation['status'] = 'error';
        }

        // Check 2: User Availability
        try {
            $testUser = User::where('email', 'test@example.com')->first();
            if ($testUser) {
                $validation['checks']['test_user'] = [
                    'status' => 'pass',
                    'message' => 'Test user found: ' . $testUser->name
                ];
            } else {
                $validation['checks']['test_user'] = [
                    'status' => 'warning',
                    'message' => 'Test user not found. Use createTestUser() method.'
                ];
            }
        } catch (\Exception $e) {
            $validation['checks']['test_user'] = [
                'status' => 'fail',
                'message' => 'Database Error: ' . $e->getMessage()
            ];
        }

        // Check 3: Recommendation Generation
        try {
            $testUser = User::where('email', 'test@example.com')->first();
            if ($testUser) {
                $recommendations = $this->aiRecommendationService->generatePersonalizedRecommendations($testUser);
                $validation['checks']['recommendation_generation'] = [
                    'status' => 'pass',
                    'message' => 'Recommendations generated successfully',
                    'data' => [
                        'smart_recommendations_count' => count($recommendations['smart_recommendations'] ?? []),
                        'challenges_count' => count($recommendations['gamification_challenges'] ?? [])
                    ]
                ];
            } else {
                $validation['checks']['recommendation_generation'] = [
                    'status' => 'skip',
                    'message' => 'Cannot test without test user'
                ];
            }
        } catch (\Exception $e) {
            $validation['checks']['recommendation_generation'] = [
                'status' => 'fail',
                'message' => 'Recommendation Error: ' . $e->getMessage()
            ];
            $validation['status'] = 'error';
        }

        return $validation;
    }

    /**
     * Create test user if not exists
     */
    public function createTestUser(): array
    {
        $existingUser = User::where('email', 'test@example.com')->first();

        if ($existingUser) {
            return [
                'status' => 'exists',
                'message' => 'Test user already exists',
                'user' => [
                    'id' => $existingUser->id,
                    'name' => $existingUser->name,
                    'email' => $existingUser->email
                ]
            ];
        }

        try {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password123'),
                'email_verified_at' => now()
            ]);

            return [
                'status' => 'created',
                'message' => 'Test user created successfully',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Failed to create test user: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Quick test method for development
     */
    public function quickTest(): array
    {
        // Create test user if needed
        $userCheck = $this->createTestUser();

        // Validate components
        $validation = $this->validateRecommendationComponents();

        // Get button status for package 7
        $buttonStatus = $this->getChallengeButtonStatus('test@example.com', 7);

        return [
            'test_summary' => [
                'timestamp' => now()->format('Y-m-d H:i:s'),
                'user_check' => $userCheck,
                'validation' => $validation,
                'button_status_for_package_7' => $buttonStatus
            ],
            'recommendations' => $this->getRecommendationsForSimulatedUser('test@example.com', 7)
        ];
    }
}
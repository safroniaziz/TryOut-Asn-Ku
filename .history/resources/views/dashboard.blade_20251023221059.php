<x-app-layout>

@php
    // Define performance analytics variables at the top level
    // Passing Grade Resmi CPNS SKD dan PPPK per kategori
    if(isset($performanceByCategory) && $performanceByCategory->count() > 0) {
        $passingGrades = collect([
            // CPNS SKD
            'TWK' => 65,
            'TIU' => 80,
            'TKP' => 166,
            // PPPK (passing grade berbeda-beda per formasi, umumnya 70-90)
            'MANAJERIAL' => 85,
            'SOSIO KULTURAL' => 85,
            'WAWANCARA' => 165,
            'TEKNIS' => 85,
            'NON-TEKNIS' => 85,
            // Default untuk kategori lainnya
            'DEFAULT' => 85
        ]);

        // Check passing grade per kategori
        $passedCategories = $performanceByCategory->filter(function($item) use ($passingGrades) {
            $categoryName = strtoupper($item['kategori']);
            $passingScore = $passingGrades->get($categoryName, $passingGrades->get('DEFAULT', 85));
            return $item['avg_score'] >= $passingScore;
        });

        $failedCategories = $performanceByCategory->filter(function($item) use ($passingGrades) {
            $categoryName = strtoupper($item['kategori']);
            $passingScore = $passingGrades->get($categoryName, $passingGrades->get('DEFAULT', 85));
            return $item['avg_score'] < $passingScore;
        });

        $totalAvg = $performanceByCategory->avg('avg_score');

        // For backward compatibility dengan variable lama
        $excellentCount = $passedCategories->count();
        $goodCount = 0;
        $needsImprovementCount = $failedCategories->count();
        $strongCategories = $passedCategories;
        $weakCategories = $failedCategories;
        $passedCount = $passedCategories->count();
        $failedCount = $failedCategories->count();

        // Prepare passing grade data for recommendations
        $allCategoriesPassed = true;
        $criticalCategories = [];
        if(isset($performanceByCategory) && $performanceByCategory->count() > 0) {
            foreach($performanceByCategory as $category) {
                $categoryName = strtoupper($category['kategori']);
                $passingScore = $passingGrades->get($categoryName, $passingGrades->get('DEFAULT', 85));
                if($category['avg_score'] < $passingScore) {
                    $allCategoriesPassed = false;
                    $selisih = $passingScore - $category['avg_score'];
                    $criticalCategories[] = [
                        'name' => $category['kategori'],
                        'passing' => $passingScore,
                        'current' => $category['avg_score'],
                        'gap' => round($selisih, 1),
                        'type' => $passingGrades->has($categoryName) ? ($categoryName == 'TWK' || $categoryName == 'TIU' || $categoryName == 'TKP' ? 'CPNS' : 'PPPK') : 'PPPK'
                    ];
                }
            }
        }
    } else {
        $excellentCount = 0;
        $goodCount = 0;
        $needsImprovementCount = 0;
        $strongCategories = collect([]);
        $weakCategories = collect([]);
        $totalAvg = 0;
        $passedCount = 0;
        $failedCount = 0;
        $allCategoriesPassed = false;
        $criticalCategories = [];
    }
@endphp

    <!-- Spectacular Statistics Section -->
    <div class="bg-gradient-to-br from-slate-50 to-gray-100 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 pt-16 pb-12">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl mb-6 shadow-lg">
                    <i class="fas fa-chart-line text-white text-3xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-3">
                    Pencapaian Luar Biasa
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    📈 Monitor progress dan pencapaian belajar Anda secara <span class="font-bold text-emerald-600">real-time</span>
                </p>
            </div>

                <!-- Epic Statistics Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-20 items-stretch">
                    <!-- Total Completed Card -->
                    <div class="h-full group min-h-[280px]">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100 min-h-[280px]">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:animate-bounce transition-all duration-300">
                                        <span class="text-white text-xl">📋</span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        @if($stats['total_tryouts_completed'] >= 10)
                                            <div class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-full mb-1">
                                                📈 Produktif
                                            </div>
                                        @endif
                                        <div class="text-xs text-gray-500 font-medium">Selesai</div>
                                    </div>
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="text-4xl font-black text-transparent bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text mb-2 tabular-nums">{{ $stats['total_tryouts_completed'] }}</div>
                                    <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Tryout Selesai</div>

                                    <!-- Progress Info -->
                                    <div class="mb-3">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs text-gray-600">Progress</span>
                                            <span class="text-xs font-bold text-blue-600">{{ $progressData['completion_rate'] }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-1.5 rounded-full transition-all duration-300" style="width: {{ min($progressData['completion_rate'], 100) }}%"></div>
                                        </div>
                                    </div>

                                    <!-- Additional Stats -->
                                    <div class="grid grid-cols-2 gap-2 mb-3">
                                        <div class="text-center p-2 bg-blue-50 rounded-lg">
                                            <div class="text-lg font-bold text-blue-600">{{ $progressData['total_tryouts_available'] }}</div>
                                            <div class="text-xs text-gray-600">Tersedia</div>
                                        </div>
                                        <div class="text-center p-2 bg-cyan-50 rounded-lg">
                                            <div class="text-lg font-bold text-cyan-600">{{ $progressData['study_streak'] }}</div>
                                            <div class="text-xs text-gray-600">Hari Streak</div>
                                        </div>
                                    </div>

                                    @if($stats['total_tryouts_completed'] >= 10)
                                        <div class="bg-gradient-to-r from-green-400 to-emerald-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🚀 Hebat!
                                        </div>
                                    @elseif($stats['total_tryouts_completed'] >= 5)
                                        <div class="bg-gradient-to-r from-blue-400 to-indigo-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            📈 Bagus!
                                        </div>
                                    @else
                                        <div class="bg-gradient-to-r from-orange-400 to-red-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🚀 Mulai!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Best Score Card -->
                    <div class="h-full group min-h-[280px]">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100 min-h-[280px]">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:animate-bounce transition-all duration-300">
                                        <span class="text-white text-xl">🏆</span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        @if($stats['best_score'] >= 90)
                                            <div class="text-xs font-bold text-purple-600 bg-purple-50 px-2 py-1 rounded-full mb-1">
                                                👑 Rekor
                                            </div>
                                        @endif
                                        <div class="text-xs text-gray-500 font-medium">Terbaik</div>
                                    </div>
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="text-4xl font-black text-transparent bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text mb-2 tabular-nums">{{ $stats['best_score'] }}</div>
                                    <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Skor Tertinggi</div>

                                    <!-- Score Comparison -->
                                    <div class="mb-3">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs text-gray-600">Rata-rata</span>
                                            <span class="text-xs font-bold text-purple-600">{{ number_format($stats['average_score'], 1) }}</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-1.5 rounded-full transition-all duration-300" style="width: {{ min($stats['best_score'], 100) }}%"></div>
                                        </div>
                                    </div>

                                    <!-- Score Stats -->
                                    <div class="grid grid-cols-2 gap-2 mb-3">
                                        <div class="text-center p-2 bg-purple-50 rounded-lg">
                                            <div class="text-lg font-bold text-purple-600">{{ $stats['average_score'] }}</div>
                                            <div class="text-xs text-gray-600">Rata-rata</div>
                                        </div>
                                        <div class="text-center p-2 bg-pink-50 rounded-lg">
                                            <div class="text-lg font-bold text-pink-600">{{ $stats['best_score'] - $stats['average_score'] > 0 ? '+' . ($stats['best_score'] - $stats['average_score']) : '0' }}</div>
                                            <div class="text-xs text-gray-600">Selisih</div>
                                        </div>
                                    </div>

                                    @if($stats['best_score'] >= 90)
                                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🏆 Sempurna!
                                        </div>
                                    @elseif($stats['best_score'] >= 80)
                                        <div class="bg-gradient-to-r from-blue-400 to-indigo-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            ⭐ Sangat Baik!
                                        </div>
                                    @else
                                        <div class="bg-gradient-to-r from-purple-400 to-pink-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            📈 Tingkatkan!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Global Ranking Card -->
                    <div class="h-full group min-h-[280px]">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100 min-h-[280px]">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:animate-bounce transition-all duration-300">
                                        <span class="text-white text-xl">🥇</span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        @if($progressData['rank_position'] <= 100)
                                            <div class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full mb-1">
                                                🌟 Top {{ round(($progressData['rank_position'] / $progressData['total_users']) * 100) }}%
                                            </div>
                                        @endif
                                        <div class="text-xs text-gray-500 font-medium">Global</div>
                                    </div>
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="text-4xl font-black text-transparent bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text mb-2 tabular-nums">#{{ $progressData['rank_position'] }}</div>
                                    <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Peringkat Global</div>

                                    <!-- Ranking Progress -->
                                    <div class="mb-3">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs text-gray-600">Dari {{ number_format($progressData['total_users']) }} user</span>
                                            <span class="text-xs font-bold text-orange-600">Top {{ round(($progressData['rank_position'] / $progressData['total_users']) * 100, 1) }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-gradient-to-r from-orange-500 to-red-500 h-1.5 rounded-full transition-all duration-300" style="width: {{ min(100 - (($progressData['rank_position'] - 1) / $progressData['total_users']) * 100, 100) }}%"></div>
                                        </div>
                                    </div>

                                    <!-- Ranking Stats -->
                                    <div class="grid grid-cols-2 gap-2 mb-3">
                                        <div class="text-center p-2 bg-orange-50 rounded-lg">
                                            <div class="text-lg font-bold text-orange-600">{{ number_format($progressData['total_users']) }}</div>
                                            <div class="text-xs text-gray-600">Total User</div>
                                        </div>
                                        <div class="text-center p-2 bg-red-50 rounded-lg">
                                            <div class="text-lg font-bold text-red-600">{{ $progressData['rank_position'] > 1 ? $progressData['rank_position'] - 1 : 0 }}</div>
                                            <div class="text-xs text-gray-600">Di Atas</div>
                                        </div>
                                    </div>

                                    @if($progressData['rank_position'] <= 10)
                                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🏆 Elite!
                                        </div>
                                    @elseif($progressData['rank_position'] <= 50)
                                        <div class="bg-gradient-to-r from-purple-400 to-pink-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🌟 Top 50!
                                        </div>
                                    @elseif($progressData['rank_position'] <= 100)
                                        <div class="bg-gradient-to-r from-green-400 to-emerald-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            ✅ Bagus!
                                        </div>
                                    @else
                                        <div class="bg-gradient-to-r from-indigo-400 to-blue-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            ⬆️ Naik!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Activity Card -->
                    <div class="h-full group min-h-[280px]">
                    <div class="relative h-full">
                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-teal-500 to-green-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                        <!-- Card Content -->
                        <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100 min-h-[280px]">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-green-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:animate-bounce transition-all duration-300">
                                    <span class="text-white text-xl">🕐</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    @if($userTryouts->count() >= 10)
                                        <div class="text-xs font-bold text-teal-600 bg-teal-50 px-2 py-1 rounded-full mb-1">
                                            📈 Aktif
                                        </div>
                                    @endif
                                    <div class="text-xs text-gray-500 font-medium">Terbaru</div>
                                </div>
                            </div>
                            <div class="flex-grow flex flex-col justify-center">
                                @if($userTryouts->count() > 0)
                                    @php
                                        $latestTryout = $userTryouts->first();
                                        $totalSoal = $latestTryout->benar + $latestTryout->salah + $latestTryout->tidak_dijawab;
                                        $tryout = $latestTryout->tryout;
                                    @endphp

                                    <!-- Judul Tryout -->
                                    <div class="text-sm font-bold text-gray-800 mb-2 truncate" title="{{ $tryout->title }}">
                                        {{ strlen($tryout->title) > 20 ? substr($tryout->title, 0, 20) . '...' : $tryout->title }}
                                    </div>

                                    <div class="text-2xl font-black text-transparent bg-gradient-to-r from-teal-600 to-green-600 bg-clip-text mb-1 tabular-nums">{{ $latestTryout->benar }}/{{ $totalSoal }}</div>
                                    <div class="text-xs font-bold text-gray-700 uppercase tracking-wide mb-3">Jawaban Benar</div>

                                    <!-- Tryout Info -->
                                    <div class="mb-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-600">Skor</span>
                                            <span class="text-xs font-bold text-teal-600">{{ number_format($latestTryout->persentase, 1) }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-gradient-to-r from-teal-500 to-green-500 h-1.5 rounded-full transition-all duration-300" style="width: {{ min($latestTryout->persentase, 100) }}%"></div>
                                        </div>
                                    </div>

                                    <!-- Tryout Details -->
                                    <div class="grid grid-cols-2 gap-2 mb-3">
                                        <div class="text-center p-2 bg-teal-50 rounded-lg">
                                            <div class="text-lg font-bold text-teal-600">{{ $tryout->type }}</div>
                                            <div class="text-xs text-gray-600">Jenis</div>
                                        </div>
                                        <div class="text-center p-2 bg-green-50 rounded-lg">
                                            <div class="text-lg font-bold text-green-600">{{ $tryout->isFree() ? 'FREE' : 'PREMIUM' }}</div>
                                            <div class="text-xs text-gray-600">Paket</div>
                                        </div>
                                    </div>

                                    @if($latestTryout->persentase >= 90)
                                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🏆 Sempurna!
                                        </div>
                                    @elseif($latestTryout->persentase >= 80)
                                        <div class="bg-gradient-to-r from-blue-400 to-indigo-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            ⭐ Sangat Baik!
                                        </div>
                                    @elseif($latestTryout->persentase >= 60)
                                        <div class="bg-gradient-to-r from-green-400 to-emerald-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            ✅ Bagus!
                                        </div>
                                    @endif

                                    <!-- Tombol Lihat Riwayat -->
                                    <div class="mt-2">
                                        <a href="{{ route('tryouts.index') }}"
                                           class="w-full bg-gradient-to-r from-teal-500 to-green-500 hover:from-teal-600 hover:to-green-600 text-white text-xs font-bold py-2 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                            <i class="fas fa-history"></i>
                                            <span>Lihat Riwayat</span>
                                        </a>
                                    </div>
                                @else
                                    <div class="text-2xl font-black text-transparent bg-gradient-to-r from-teal-600 to-green-600 bg-clip-text mb-1 tabular-nums">0/0</div>
                                    <div class="text-xs font-bold text-gray-700 uppercase tracking-wide mb-3">Jawaban Benar</div>

                                    <!-- Empty State Info -->
                                    <div class="mb-3">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="text-xs text-gray-600">Progress</span>
                                            <span class="text-xs font-bold text-gray-400">0%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-gray-300 h-1.5 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>

                                    <!-- Empty State Stats -->
                                    <div class="grid grid-cols-2 gap-2 mb-3">
                                        <div class="text-center p-2 bg-gray-50 rounded-lg">
                                            <div class="text-lg font-bold text-gray-400">-</div>
                                            <div class="text-xs text-gray-600">Jenis</div>
                                        </div>
                                        <div class="text-center p-2 bg-gray-50 rounded-lg">
                                            <div class="text-lg font-bold text-gray-400">-</div>
                                            <div class="text-xs text-gray-600">Paket</div>
                                        </div>
                                    </div>

                                    <div class="text-xs text-gray-500 text-center font-medium bg-gray-50 px-3 py-1 rounded-full mb-3">Belum ada aktivitas</div>

                                    <!-- Tombol Mulai Tryout -->
                                    <div class="mt-2">
                                        <a href="{{ route('tryouts.index') }}"
                                           class="w-full bg-gradient-to-r from-teal-500 to-green-500 hover:from-teal-600 hover:to-green-600 text-white text-xs font-bold py-2 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                            <i class="fas fa-play"></i>
                                            <span>Mulai Tryout</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Analytics Row (only if data exists) -->
                @if($performanceByCategory->count() > 0)
                <div class="mb-6">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8">
                        <!-- Header with Clear Explanation -->
                        <div class="mb-6">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Analisis Performa Tryout</h2>
                                    <p class="text-gray-600 mb-3">Statistik performa Anda berdasarkan <strong>semua tryout yang telah dikerjakan</strong></p>
                                    <div class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-sm">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        <span>Data dari {{ $userTryouts->count() }} tryout terakhir</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-6">
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-transparent bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text">
                                            {{ number_format($performanceByCategory->avg('avg_score'), 1) }}
                                        </div>
                                        <div class="text-sm text-gray-600">Skor Rata-rata</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-transparent bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text">
                                            {{ $performanceByCategory->filter(fn($item) => $item['avg_score'] >= 65)->count() }}
                                        </div>
                                        <div class="text-sm text-gray-600">Lulus Passing Grade</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-transparent bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text">
                                            {{ $performanceByCategory->filter(fn($item) => $item['avg_score'] < 65)->count() }}
                                        </div>
                                        <div class="text-sm text-gray-600">Tidak Lulus</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Charts with Better UX - More Spacing & Clean Layout -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                            <!-- Distribusi Skor - Clean & Spacious -->
                            <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                <div class="mb-6">
                                    <div class="flex items-center mb-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mr-3">
                                            <span class="text-white">📊</span>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">Distribusi Skor</h3>
                                            <p class="text-sm text-gray-500">Performa per kategori</p>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <div class="text-sm text-gray-600">Skor Rata-rata</div>
                                        <div class="text-2xl font-bold text-purple-600">{{ number_format($performanceByCategory->avg('avg_score'), 1) }}/100</div>
                                    </div>
                                </div>

                                <!-- Chart with proper spacing -->
                                <div class="flex justify-center mb-6">
                                    <div class="relative h-40 w-40">
                                        <canvas id="scoreDistributionChart"></canvas>
                                    </div>
                                </div>

                                <!-- Performance Categories dengan Passing Grade Resmi -->
                                <div class="space-y-3">
                                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                        <h4 class="text-sm font-bold text-blue-800 mb-3">📊 Passing Grade Resmi</h4>

                                        <!-- CPNS SKD -->
                                        <div class="mb-3">
                                            <h5 class="text-xs font-semibold text-blue-700 mb-2">🏛️ CPNS SKD</h5>
                                            <div class="grid grid-cols-3 gap-2 text-xs">
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-blue-600">TWK</div>
                                                    <div class="text-gray-600">≥ 65</div>
                                                </div>
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-blue-600">TIU</div>
                                                    <div class="text-gray-600">≥ 80</div>
                                                </div>
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-blue-600">TKP</div>
                                                    <div class="text-gray-600">≥ 166</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PPPK -->
                                        <div>
                                            <h5 class="text-xs font-semibold text-green-700 mb-2">📋 PPPK</h5>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-xs">
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-green-600">Manajerial</div>
                                                    <div class="text-gray-600">≥ 85</div>
                                                </div>
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-green-600">Sosio Kultural</div>
                                                    <div class="text-gray-600">≥ 85</div>
                                                </div>
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-green-600">Wawancara</div>
                                                    <div class="text-gray-600">≥ 165</div>
                                                </div>
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-green-600">Teknis</div>
                                                    <div class="text-gray-600">≥ 85</div>
                                                </div>
                                                <div class="text-center p-2 bg-white rounded border">
                                                    <div class="font-bold text-green-600">Non-Teknis</div>
                                                    <div class="text-gray-600">≥ 85</div>
                                                </div>
                                                <div class="text-center p-2 bg-gray-50 rounded border">
                                                    <div class="font-bold text-gray-600">Lainnya</div>
                                                    <div class="text-gray-600">≥ 85</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg border border-green-200">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                            <span class="text-sm font-semibold text-green-700">Lulus Passing Grade</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <span class="text-lg font-bold text-green-600">{{ $excellentCount }}</span>
                                            <span class="text-sm text-green-600 bg-white px-3 py-1 rounded-full border">{{ round(($excellentCount / max($performanceByCategory->count(), 1)) * 100) }}%</span>
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg border border-orange-200">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full mr-3"></div>
                                            <span class="text-sm font-semibold text-orange-700">Tidak Lulus</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <span class="text-lg font-bold text-orange-600">{{ $needsImprovementCount }}</span>
                                            <span class="text-sm text-orange-600 bg-white px-3 py-1 rounded-full border">{{ round(($needsImprovementCount / max($performanceByCategory->count(), 1)) * 100) }}%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Summary Stats with proper spacing -->
                                <div class="grid grid-cols-3 gap-3 mt-6">
                                    <div class="text-center p-3 bg-purple-50 rounded-lg border border-purple-200">
                                        <div class="text-lg font-bold text-purple-600">{{ $performanceByCategory->count() }}</div>
                                        <div class="text-xs text-purple-600">Total Kategori</div>
                                    </div>
                                    <div class="text-center p-3 bg-green-50 rounded-lg border border-green-200">
                                        <div class="text-lg font-bold text-green-600">{{ round(($performanceByCategory->filter(fn($item) => $item['avg_score'] >= 65)->count() / max($performanceByCategory->count(), 1)) * 100) }}%</div>
                                        <div class="text-xs text-green-600">Lulus Passing Grade</div>
                                    </div>
                                    <div class="text-center p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <div class="text-lg font-bold text-gray-600">{{ $userTryouts->count() }}</div>
                                        <div class="text-xs text-gray-600">Tryout Dikerjakan</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Analisis Kategori - Better Layout -->
                            <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                <div class="mb-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                                <span class="text-white">📈</span>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold text-gray-900">Analisis Kategori</h3>
                                                <p class="text-sm text-gray-500">Per kategori</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm text-gray-600">Kategori Terbaik</div>
                                        <div class="text-xl font-bold text-green-600">{{ $performanceByCategory->sortByDesc('avg_score')->first()['kategori'] ?? '-' }}</div>
                                    </div>
                                </div>

                                <!-- Chart with proper size -->
                                <div class="relative h-48 mb-6">
                                    <canvas id="categoryComparisonChart"></canvas>
                                </div>

                                <!-- Statistics with better spacing -->
                                <div class="space-y-4">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Range Skor</h4>
                                        <div class="grid grid-cols-3 gap-3">
                                            <div class="text-center">
                                                <div class="text-lg font-bold text-blue-600">{{ $performanceByCategory->pluck('avg_score')->max() }}/100</div>
                                                <div class="text-xs text-gray-600">Tertinggi</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-lg font-bold text-orange-600">{{ $performanceByCategory->pluck('avg_score')->min() }}/100</div>
                                                <div class="text-xs text-gray-600">Terendah</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-lg font-bold text-purple-600">{{ $performanceByCategory->pluck('avg_score')->max() - $performanceByCategory->pluck('avg_score')->min() }}</div>
                                                <div class="text-xs text-gray-600">Range</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Performa Kategori</h4>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="text-center">
                                                <div class="text-lg font-bold text-green-600">{{ $performanceByCategory->filter(fn($item) => $item['avg_score'] >= 60)->count() }}</div>
                                                <div class="text-xs text-gray-600">Kategori Baik (≥60)</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-lg font-bold text-orange-600">{{ $needsImprovementCount }}</div>
                                                <div class="text-xs text-gray-600">Perlu Fokus (<60)</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-purple-50 rounded-lg p-4 text-center">
                                        <div class="text-2xl font-bold text-purple-600">{{ number_format($performanceByCategory->avg('avg_score'), 1) }}/100</div>
                                        <div class="text-sm text-purple-600">Skor Rata-rata Keseluruhan</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Analisis Performa - Clean & Organized -->
                            <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                                <div class="mb-6">
                                    <div class="flex items-center mb-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                            <span class="text-white">💡</span>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">Analisis Performa</h3>
                                            <p class="text-sm text-gray-500">Insights & rekomendasi</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <!-- Performance Summary -->
                                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg p-4 border border-purple-200">
                                        <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                                            <i class="fas fa-chart-line mr-2 text-purple-600"></i>
                                            Statistik Performa
                                        </h4>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-purple-600">{{ number_format($performanceByCategory->avg('avg_score'), 1) }}</div>
                                                <div class="text-sm text-gray-600">Skor Rata-rata</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-green-600">{{ round(($performanceByCategory->filter(fn($item) => $item['avg_score'] >= 60)->count() / max($performanceByCategory->count(), 1)) * 100) }}%</div>
                                                <div class="text-sm text-gray-600">Tingkat Kelulusan</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Category Analysis -->
                                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg p-4 border border-blue-200">
                                        <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                                            <i class="fas fa-chart-bar mr-2 text-blue-600"></i>
                                            Analisis Kategori
                                        </h4>
                                        <div class="space-y-2">
                                            <div class="flex justify-between items-center py-2 border-b border-blue-100">
                                                <span class="text-sm text-gray-600">Lulus Passing Grade (≥65)</span>
                                                <span class="font-bold text-green-600 text-lg">{{ $performanceByCategory->filter(fn($item) => $item['avg_score'] >= 65)->count() }}</span>
                                            </div>
                                            <div class="flex justify-between items-center py-2 border-b border-blue-100">
                                                <span class="text-sm text-gray-600">Tidak Lulus (<65)</span>
                                                <span class="font-bold text-orange-600 text-lg">{{ $performanceByCategory->filter(fn($item) => $item['avg_score'] < 65)->count() }}</span>
                                            </div>
                                            <div class="flex justify-between items-center py-2">
                                                <span class="text-sm text-gray-600">Range Skor</span>
                                                <span class="font-bold text-blue-600 text-lg">{{ $performanceByCategory->pluck('avg_score')->min() }} - {{ $performanceByCategory->pluck('avg_score')->max() }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Recommendations -->
                                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-4 border border-green-200">
                                        <h4 class="text-xs font-bold text-gray-700 mb-1">🎯 Rekomendasi Aksi</h4>

                                        @if($allCategoriesPassed)
                                            <div class="text-xs text-green-700">
                                                <div class="font-bold">🎉 Semua Kategori Lulus Passing Grade!</div>
                                                <div>Fokus kecepatan dan optimisasi waktu</div>
                                            </div>
                                        @elseif(count($criticalCategories) == 1)
                                            <div class="text-xs text-orange-700">
                                                <div class="font-bold">📚 Fokus 1 Kategori</div>
                                                <div>{{ $criticalCategories[0]['name'] }}: butuh {{ $criticalCategories[0]['gap'] }} poin lagi</div>
                                            </div>
                                        @else
                                            <div class="text-xs text-red-700">
                                                <div class="font-bold">🔥 {{ count($criticalCategories) }} Kategori Perlu Fokus</div>
                                                <div>TWK: ≥65, TIU: ≥80, TKP: ≥166</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Deep Performance Analysis -->
                        <div class="border-t border-gray-200/50 pt-8">
                            <!-- Performance Trend Analysis -->
                            <div class="mb-8">
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-analytics text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">Analisis Trend Performa</h3>
                                        <p class="text-sm text-gray-600">Identifikasi pola dan area pengembangan Anda</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <!-- Strengths -->
                                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200/50">
                                        <div class="flex items-center mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-star text-white"></i>
                                            </div>
                                            <h4 class="font-bold text-green-800">Keunggulan</h4>
                                        </div>
                                        @if(isset($strongCategories) && $strongCategories->count() > 0)
                                            <div class="space-y-2">
                                                @foreach($strongCategories->take(2) as $category)
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-sm font-medium text-green-700">{{ $category['kategori'] }}</span>
                                                        <span class="text-sm font-bold text-green-600">{{ $category['avg_score'] }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-sm text-green-600">Belum ada kategori dengan performa ≥80</p>
                                        @endif
                                    </div>

                                    <!-- Average Performance -->
                                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200/50">
                                        <div class="flex items-center mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-balance-scale text-white"></i>
                                            </div>
                                            <h4 class="font-bold text-blue-800">Performa Rata-rata</h4>
                                        </div>
                                        <div class="text-center py-4">
                                            <p class="text-sm text-gray-600">Analisis performa per kategori</p>
                                        </div>
                                    </div>

                                    <!-- Improvement Areas -->
                                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-4 border border-orange-200/50">
                                        <div class="flex items-center mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-rocket text-white"></i>
                                            </div>
                                            <h4 class="font-bold text-orange-800">Area Fokus</h4>
                                        </div>
                                        @if(isset($weakCategories) && $weakCategories->count() > 0)
                                            <div class="space-y-2">
                                                <h4 class="text-xs font-semibold text-orange-700 mb-2">⚠️ Kategori Perlu Fokus:</h4>
                                                @foreach($weakCategories->take(3) as $category)
                                                    @php
                                                        $categoryName = strtoupper($category['kategori']);
                                                        $passingScore = $passingGrades->get($categoryName, $passingGrades->get('DEFAULT', 85));
                                                        $selisih = $passingScore - $category['avg_score'];
                                                    @endphp
                                                    <div class="flex justify-between items-center p-2 bg-white rounded border">
                                                        <div>
                                                            <div class="flex items-center gap-1">
                                                                <span class="text-sm font-medium text-orange-700">{{ ($passingGrades->has($categoryName) && ($categoryName == 'TWK' || $categoryName == 'TIU' || $categoryName == 'TKP')) ? '🏛️' : '📋' }} {{ $category['kategori'] }}</span>
                                                            </div>
                                                            <div class="text-xs text-gray-500">Passing: {{ $passingScore }} (Kurang: {{ round($selisih, 1) }})</div>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="text-sm font-bold text-orange-600">{{ $category['avg_score'] }}</span>
                                                            <div class="text-xs text-red-600">❌ BELUM LULUS</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-sm text-green-600">🎉 Semua kategori lulus passing grade!</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Personalized Recommendations -->
                            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-200/50">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-lightbulb text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-indigo-900">Rekomendasi Personal</h3>
                                        <p class="text-sm text-indigo-700">Strategi berdasarkan analisis performa Anda</p>
                                    </div>
                                </div>


                                @if($totalAvg >= 80)
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="bg-white/80 rounded-lg p-4">
                                            <h4 class="font-bold text-green-800 mb-2">🏆 Pertahankan Keunggulan</h4>
                                            <p class="text-sm text-gray-700">Performa Anda luar biasa! Fokus pada pemeliharaan dan tingkatkan kecepatan pengerjaan.</p>
                                        </div>
                                        <div class="bg-white/80 rounded-lg p-4">
                                            <h4 class="font-bold text-blue-800 mb-2">🎯 Target Tertinggi</h4>
                                            <p class="text-sm text-gray-700">Coba tryout dengan tingkat kesulitas lebih tinggi untuk terus berkembang.</p>
                                        </div>
                                    </div>
                                @elseif($totalAvg >= 60)
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="bg-white/80 rounded-lg p-4">
                                            <h4 class="font-bold text-orange-800 mb-2">📈 Optimasi Kategori Lemah</h4>
                                            <p class="text-sm text-gray-700">Alokasikan 70% waktu belajar untuk {{ $needsImprovementCount }} kategori yang perlu perbaikan.</p>
                                        </div>
                                        <div class="bg-white/80 rounded-lg p-4">
                                            <h4 class="font-bold text-blue-800 mb-2">⚡ Latihan Terstruktur</h4>
                                            <p class="text-sm text-gray-700">Jadwalkan 2-3 sesi tryout per minggu untuk kategori target Anda.</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="bg-white/80 rounded-lg p-4">
                                        <h4 class="font-bold text-red-800 mb-2">🚀 Program Intensif Dibutuhkan</h4>
                                        <p class="text-sm text-gray-700 mb-3">Prioritaskan fondasi dasar dan konsistensi belajar harian.</p>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="text-center p-2 bg-red-50 rounded">
                                                <div class="text-lg font-bold text-red-600">{{ $needsImprovementCount }}</div>
                                                <div class="text-xs text-red-700">Kategori Fokus</div>
                                            </div>
                                            <div class="text-center p-2 bg-orange-50 rounded">
                                                <div class="text-lg font-bold text-orange-600">30+ menit</div>
                                                <div class="text-xs text-orange-700">Harian</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Performance Insights Footer -->
                            <div class="mt-6 text-center">
                                <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    Analisis berdasarkan {{ $userTryouts->count() }} tryout • Diperbarui: {{ now()->format('d M Y H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content Container - No Gap -->
    <div class="-mt-8">

            <!-- Premium Package Sections -->
            @if($targetTest === 'both')
            <!-- Full Width CPNS Section - No Gap -->
            <div x-data="{ cpnsActiveTab: 'all' }" class="bg-gradient-to-br from-blue-50 to-indigo-50 -mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-600 rounded-2xl mb-6 shadow-lg">
                            <i class="fas fa-briefcase text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-3">
                            Paket TryOut CPNS
                        </h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                            🚀 Persiapan terbaik untuk <span class="font-bold text-blue-600">Calon Pegawai Negeri Sipil</span>
                            dengan lengkapan tes <span class="font-bold text-indigo-600">SKD & SKB</span> terlengkap
                        </p>
                    </div>

                    <!-- Tabs Navigation -->
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                                <button @click="cpnsActiveTab = 'all'"
                                        :class="cpnsActiveTab === 'all' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Semua
                                </button>
                                <button @click="cpnsActiveTab = 'SKD'"
                                        :class="cpnsActiveTab === 'SKD' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-file-alt mr-2"></i>SKD
                                </button>
                                <button @click="cpnsActiveTab = 'SKB'"
                                        :class="cpnsActiveTab === 'SKB' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-user-tie mr-2"></i>SKB
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Grid (Full Width, Outside Container) -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 pb-12">
                    <!-- All Tab -->
                    <div x-show="cpnsActiveTab === 'all'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
                                @forelse($tryoutPackages['CPNS']['all'] as $package)
                            <div class="h-full flex flex-col">
                                <!-- Card with Consistent Height -->
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden h-full flex flex-col">
                                    <!-- Professional Header -->
                                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-3">
                                            <!-- Access Type Badge -->
                                            @if($package['is_free_package'])
                                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-unlock mr-1"></i>FREE
                                                    </span>
                                                </div>
                                            @else
                                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-crown mr-1"></i>PREMIUM
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- Time Access Badge -->
                                            @if(!empty($package['time_access_label']))
                                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1">
                                                    <span class="text-white font-semibold text-xs">
                                                        @if(str_contains($package['time_access_label'], 'Serentak'))
                                                            🏆 {{ $package['time_access_label'] }}
                                                        @else
                                                            🎯 {{ $package['time_access_label'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            </div>
                                        <h3 class="text-lg font-bold text-white mb-1 truncate">{{ $package['name'] }}</h3>
                                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                                            <div class="flex items-center">
                                                <i class="fas fa-layer-group mr-2"></i>
                                                <span>{{ count($package['category_names']) }} Kategori</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                <span>{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">

                                        <!-- Progress and Stats -->
                                        <div class="space-y-4">
                                            <!-- Completion Rate -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                                                    <span class="text-xs font-bold text-blue-600">{{ $package['completion_rate'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['completion_rate'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Average Score -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Skor Rata-rata</span>
                                                    <span class="text-xs font-bold text-green-600">{{ $package['average_score'] }}/100</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['average_score'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Duration -->
                                            <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock text-orange-500 mr-2 text-sm"></i>
                                                    <span class="text-xs font-semibold text-gray-700">Durasi</span>
                                                </div>
                                                <span class="text-xs font-bold text-orange-600">{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>

                                            <!-- Date Range for Nasional Tryouts -->
                                            @if($package['start_date'] && $package['end_date'])
                                                <div class="flex items-center justify-between p-2 bg-purple-50 rounded-lg">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-calendar-alt text-purple-500 mr-2 text-sm"></i>
                                                        <span class="text-xs font-semibold text-gray-700">Periode</span>
                                                    </div>
                                                    <span class="text-xs font-bold text-purple-600">
                                                        {{ $package['start_date']->format('d M') }} - {{ $package['end_date']->format('d M Y') }}
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- User's Performance (if completed) -->
                                            @if($package['user_score_in_package'] > 0)
                                                <div class="p-2 bg-green-50 rounded-lg border border-green-200">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs font-semibold text-green-700">Skor Anda</span>
                                                        <span class="text-sm font-bold text-green-600">{{ $package['user_score_in_package'] }}/100</span>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Test Categories Detail -->
                                            <div class="mt-auto pt-4">
                                                <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                                <div class="space-y-2.5">
                                                    @if(!empty($package['category_details']))
                                                        @foreach($package['category_details'] as $category)
                                                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                                                                <div class="flex items-center">
                                                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                                                    <span class="text-xs font-semibold text-gray-700">{{ $category['name'] }}</span>
                                                                </div>
                                                                <div class="flex items-center space-x-2">
                                                                    <span class="text-xs font-bold text-blue-600">{{ $category['question_count'] }} soal</span>
                                                                    <span class="text-xs font-semibold text-orange-600">{{ $category['estimated_minutes'] }} menit</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="p-2 bg-gray-50 rounded-lg">
                                                            <span class="text-xs text-gray-600">{{ $package['tryouts']->first()->kategori }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
                                            </span>
                                            @if($package['is_completed_by_user'])
                                                <span class="text-xs font-semibold text-green-600">
                                                    ✓ Selesai
                                                </span>
                                            @else
                                                <span class="text-xs font-semibold text-orange-600">
                                                    ○ Belum Selesai
                                                </span>
                                            @endif
                                        </div>

                                        <!-- CTA Button -->
                                        @if($package['is_premium_package'] && !$hasPremium)
                                            <a href="{{ route('subscription.premium') }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                <i class="fas fa-crown text-yellow-300 text-sm"></i>
                                                <span class="text-sm">Upgrade Premium</span>
                                                <i class="fas fa-arrow-right text-sm"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                @if($package['is_completed_by_user'])
                                                    <i class="fas fa-redo text-sm"></i>
                                                    <span class="text-sm">Kerjakan Lagi</span>
                                                    <i class="fas fa-chart-line text-sm"></i>
                                                @else
                                                    @if($package['is_free'])
                                                        <i class="fas fa-rocket text-yellow-300 text-sm"></i>
                                                        <span class="text-sm">Mulai Gratis</span>
                                                        <i class="fas fa-star text-yellow-300 text-sm"></i>
                                                    @else
                                                        <i class="fas fa-play text-sm"></i>
                                                        <span class="text-sm">Mulai Tes</span>
                                                        <i class="fas fa-fire text-orange-300 text-sm"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8">
                                    <i class="fas fa-inbox text-4xl text-blue-500 mb-3"></i>
                                    <p class="text-gray-600 text-lg">Belum ada paket tryout CPNS tersedia.</p>
                                </div>
                            </div>
                        @endforelse
                            </div>

                    <!-- SKD Tab -->
                    <div x-show="cpnsActiveTab === 'SKD'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
                                @forelse($tryoutPackages['CPNS']['SKD'] as $package)
                            <div class="h-full flex flex-col">
                                <!-- Card with Consistent Height -->
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden h-full flex flex-col">
                                    <!-- Professional Header -->
                                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-3">
                                            <!-- Access Type Badge -->
                                            @if($package['is_free_package'])
                                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-unlock mr-1"></i>FREE
                                                    </span>
                                                </div>
                                            @else
                                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-crown mr-1"></i>PREMIUM
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- Time Access Badge -->
                                            @if(!empty($package['time_access_label']))
                                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1">
                                                    <span class="text-white font-semibold text-xs">
                                                        @if(str_contains($package['time_access_label'], 'Serentak'))
                                                            🏆 {{ $package['time_access_label'] }}
                                                        @else
                                                            🎯 {{ $package['time_access_label'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            </div>
                                        <h3 class="text-lg font-bold text-white mb-1 truncate">{{ $package['name'] }}</h3>
                                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                                            <div class="flex items-center">
                                                <i class="fas fa-layer-group mr-2"></i>
                                                <span>{{ count($package['category_names']) }} Kategori</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                <span>{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">

                                        <!-- Progress and Stats -->
                                        <div class="space-y-4">
                                            <!-- Completion Rate -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                                                    <span class="text-xs font-bold text-blue-600">{{ $package['completion_rate'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['completion_rate'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Average Score -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Skor Rata-rata</span>
                                                    <span class="text-xs font-bold text-green-600">{{ $package['average_score'] }}/100</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['average_score'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Duration -->
                                            <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock text-orange-500 mr-2 text-sm"></i>
                                                    <span class="text-xs font-semibold text-gray-700">Durasi</span>
                                                </div>
                                                <span class="text-xs font-bold text-orange-600">{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>

                                            <!-- Date Range for Nasional Tryouts -->
                                            @if($package['start_date'] && $package['end_date'])
                                                <div class="flex items-center justify-between p-2 bg-purple-50 rounded-lg">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-calendar-alt text-purple-500 mr-2 text-sm"></i>
                                                        <span class="text-xs font-semibold text-gray-700">Periode</span>
                                                    </div>
                                                    <span class="text-xs font-bold text-purple-600">{{ $package['start_date']->format('d M') }} - {{ $package['end_date']->format('d M Y') }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Engaging Test Categories Detail -->
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <h4 class="text-xs font-bold text-gray-700 flex items-center">
                                                    <i class="fas fa-layer-group mr-2 text-blue-500"></i>
                                                    Kategori Tes
                                                </h4>
                                            </div>
                                            <div class="space-y-2">
                                                @if(!empty($package['category_details']))
                                                    @foreach($package['category_details'] as $category)
                                                        <div class="group relative overflow-hidden rounded-lg bg-gradient-to-r from-gray-50 to-white border border-gray-100 hover:shadow-md transition-all duration-300 hover:border-blue-200 hover:from-blue-50 hover:to-white">
                                                            <!-- Hover overlay effect -->
                                                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                            <div class="flex items-center justify-between p-3 relative z-10">
                                                                <div class="flex items-center space-x-3">
                                                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300 group-hover:scale-110">
                                                                        <i class="fas fa-brain text-white text-xs"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-sm font-bold text-gray-800 group-hover:text-blue-700 transition-colors duration-300">{{ $category['name'] }}</span>
                                                                        <div class="text-xs text-gray-500">Tes Kompetensi</div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center space-x-3">
                                                                    <div class="text-center">
                                                                        <div class="text-lg font-bold text-blue-600 group-hover:text-blue-700 transition-colors duration-300">{{ $category['question_count'] }}</div>
                                                                        <div class="text-xs text-gray-500">Soal</div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <div class="text-lg font-bold text-orange-500 group-hover:text-orange-600 transition-colors duration-300">{{ $category['estimated_minutes'] }}</div>
                                                                        <div class="text-xs text-gray-500">Menit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Progress bar -->
                                                            <div class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="p-3 bg-gradient-to-r from-gray-50 to-white rounded-lg border border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <div class="w-8 h-8 bg-gradient-to-r from-gray-400 to-gray-500 rounded-lg flex items-center justify-center">
                                                                <i class="fas fa-folder text-white text-xs"></i>
                                                            </div>
                                                            <div>
                                                                <span class="text-sm font-medium text-gray-700">{{ $package['tryouts']->first()->kategori }}</span>
                                                                <div class="text-xs text-gray-500">Single Category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
                                            </span>
                                            @if($package['is_completed_by_user'])
                                                <span class="text-xs font-semibold text-green-600">
                                                    ✓ Selesai
                                                </span>
                                            @else
                                                <span class="text-xs font-semibold text-orange-600">
                                                    ○ Belum Selesai
                                                </span>
                                            @endif
                                        </div>

                                        <!-- CTA Button -->
                                        @if($package['is_premium_package'] && !$hasPremium)
                                            <a href="{{ route('subscription.premium') }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                <i class="fas fa-crown text-yellow-300 text-sm"></i>
                                                <span class="text-sm">Upgrade Premium</span>
                                                <i class="fas fa-arrow-right text-sm"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                @if($package['is_completed_by_user'])
                                                    <i class="fas fa-redo text-sm"></i>
                                                    <span class="text-sm">Kerjakan Lagi</span>
                                                    <i class="fas fa-chart-line text-sm"></i>
                                                @else
                                                    @if($package['is_free'])
                                                        <i class="fas fa-rocket text-yellow-300 text-sm"></i>
                                                        <span class="text-sm">Mulai Gratis</span>
                                                        <i class="fas fa-star text-yellow-300 text-sm"></i>
                                                    @else
                                                        <i class="fas fa-play text-sm"></i>
                                                        <span class="text-sm">Mulai Tes</span>
                                                        <i class="fas fa-fire text-orange-300 text-sm"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8">
                                    <i class="fas fa-inbox text-4xl text-blue-500 mb-3"></i>
                                    <p class="text-gray-600 text-lg">Belum ada paket tryout SKD tersedia.</p>
                                </div>
                            </div>
                        @endforelse
                            </div>

                    <!-- SKB Tab -->
                    <div x-show="cpnsActiveTab === 'SKB'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
                                @forelse($tryoutPackages['CPNS']['SKB'] as $package)
                            <div class="h-full flex flex-col">
                                <!-- Card with Consistent Height -->
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden h-full flex flex-col">
                                    <!-- Professional Header -->
                                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-3">
                                            <!-- Access Type Badge -->
                                            @if($package['is_free_package'])
                                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-unlock mr-1"></i>FREE
                                                    </span>
                                                </div>
                                            @else
                                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-crown mr-1"></i>PREMIUM
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- Time Access Badge -->
                                            @if(!empty($package['time_access_label']))
                                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1">
                                                    <span class="text-white font-semibold text-xs">
                                                        @if(str_contains($package['time_access_label'], 'Serentak'))
                                                            🏆 {{ $package['time_access_label'] }}
                                                        @else
                                                            🎯 {{ $package['time_access_label'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            </div>
                                        <h3 class="text-lg font-bold text-white mb-1 truncate">{{ $package['name'] }}</h3>
                                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                                            <div class="flex items-center">
                                                <i class="fas fa-layer-group mr-2"></i>
                                                <span>{{ count($package['category_names']) }} Kategori</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                <span>{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">

                                        <!-- Progress and Stats -->
                                        <div class="space-y-4">
                                            <!-- Completion Rate -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                                                    <span class="text-xs font-bold text-blue-600">{{ $package['completion_rate'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['completion_rate'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Average Score -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Skor Rata-rata</span>
                                                    <span class="text-xs font-bold text-green-600">{{ $package['average_score'] }}/100</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['average_score'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Duration -->
                                            <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock text-orange-500 mr-2 text-sm"></i>
                                                    <span class="text-xs font-semibold text-gray-700">Durasi</span>
                                                </div>
                                                <span class="text-xs font-bold text-orange-600">{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>

                                            <!-- Date Range for Nasional Tryouts -->
                                            @if($package['start_date'] && $package['end_date'])
                                                <div class="flex items-center justify-between p-2 bg-purple-50 rounded-lg">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-calendar-alt text-purple-500 mr-2 text-sm"></i>
                                                        <span class="text-xs font-semibold text-gray-700">Periode</span>
                                                    </div>
                                                    <span class="text-xs font-bold text-purple-600">{{ $package['start_date']->format('d M') }} - {{ $package['end_date']->format('d M Y') }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Engaging Test Categories Detail -->
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <h4 class="text-xs font-bold text-gray-700 flex items-center">
                                                    <i class="fas fa-layer-group mr-2 text-blue-500"></i>
                                                    Kategori Tes
                                                </h4>
                                            </div>
                                            <div class="space-y-2">
                                                @if(!empty($package['category_details']))
                                                    @foreach($package['category_details'] as $category)
                                                        <div class="group relative overflow-hidden rounded-lg bg-gradient-to-r from-gray-50 to-white border border-gray-100 hover:shadow-md transition-all duration-300 hover:border-blue-200 hover:from-blue-50 hover:to-white">
                                                            <!-- Hover overlay effect -->
                                                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                            <div class="flex items-center justify-between p-3 relative z-10">
                                                                <div class="flex items-center space-x-3">
                                                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300 group-hover:scale-110">
                                                                        <i class="fas fa-brain text-white text-xs"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-sm font-bold text-gray-800 group-hover:text-blue-700 transition-colors duration-300">{{ $category['name'] }}</span>
                                                                        <div class="text-xs text-gray-500">Tes Kompetensi</div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center space-x-3">
                                                                    <div class="text-center">
                                                                        <div class="text-lg font-bold text-blue-600 group-hover:text-blue-700 transition-colors duration-300">{{ $category['question_count'] }}</div>
                                                                        <div class="text-xs text-gray-500">Soal</div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <div class="text-lg font-bold text-orange-500 group-hover:text-orange-600 transition-colors duration-300">{{ $category['estimated_minutes'] }}</div>
                                                                        <div class="text-xs text-gray-500">Menit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Progress bar -->
                                                            <div class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="p-3 bg-gradient-to-r from-gray-50 to-white rounded-lg border border-gray-100">
                                                        <div class="flex items-center space-x-3">
                                                            <div class="w-8 h-8 bg-gradient-to-r from-gray-400 to-gray-500 rounded-lg flex items-center justify-center">
                                                                <i class="fas fa-folder text-white text-xs"></i>
                                                            </div>
                                                            <div>
                                                                <span class="text-sm font-medium text-gray-700">{{ $package['tryouts']->first()->kategori }}</span>
                                                                <div class="text-xs text-gray-500">Single Category</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
                                            </span>
                                            @if($package['is_completed_by_user'])
                                                <span class="text-xs font-semibold text-green-600">
                                                    ✓ Selesai
                                                </span>
                                            @else
                                                <span class="text-xs font-semibold text-orange-600">
                                                    ○ Belum Selesai
                                                </span>
                                            @endif
                                        </div>

                                        <!-- CTA Button -->
                                        @if($package['is_premium_package'] && !$hasPremium)
                                            <a href="{{ route('subscription.premium') }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                <i class="fas fa-crown text-yellow-300 text-sm"></i>
                                                <span class="text-sm">Upgrade Premium</span>
                                                <i class="fas fa-arrow-right text-sm"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                @if($package['is_completed_by_user'])
                                                    <i class="fas fa-redo text-sm"></i>
                                                    <span class="text-sm">Kerjakan Lagi</span>
                                                    <i class="fas fa-chart-line text-sm"></i>
                                                @else
                                                    @if($package['is_free'])
                                                        <i class="fas fa-rocket text-yellow-300 text-sm"></i>
                                                        <span class="text-sm">Mulai Gratis</span>
                                                        <i class="fas fa-star text-yellow-300 text-sm"></i>
                                                    @else
                                                        <i class="fas fa-play text-sm"></i>
                                                        <span class="text-sm">Mulai Tes</span>
                                                        <i class="fas fa-fire text-orange-300 text-sm"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8">
                                    <i class="fas fa-inbox text-4xl text-blue-500 mb-3"></i>
                                    <p class="text-gray-600 text-lg">Belum ada paket tryout SKB tersedia.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- View All Button -->
                    <div class="text-center mt-10">
                        <a href="{{ route('tryouts.index') }}?type=cpns"
                           class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                            <i class="fas fa-th-list mr-3"></i>
                            Lihat Semua Paket CPNS
                            <i class="fas fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Full Width PPPK Section - No Gap -->
            <div x-data="{ pppkActiveTab: 'all' }" class="bg-gradient-to-br from-emerald-50 to-green-50 -mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-emerald-600 rounded-2xl mb-6 shadow-lg">
                            <i class="fas fa-user-tie text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-3">
                            Paket TryOut PPPK
                        </h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                            🎯 Persiapan lengkap untuk <span class="font-bold text-emerald-600">Pegawai Pemerintah dengan Perjanjian Kerja</span>
                            meliputi <span class="font-bold text-green-600">Manajerial, Sosio Kultural, Wawancara & Teknis</span>
                        </p>
                    </div>

                    <!-- Tabs Navigation -->
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                                <button @click="pppkActiveTab = 'all'"
                                        :class="pppkActiveTab === 'all' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Semua
                                </button>
                                <button @click="pppkActiveTab = 'Non-Teknis'"
                                        :class="pppkActiveTab === 'Non-Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-users mr-2"></i>Non-Teknis
                                </button>
                                <button @click="pppkActiveTab = 'Teknis'"
                                        :class="pppkActiveTab === 'Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-cog mr-2"></i>Teknis
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Grid (Full Width, Outside Container) -->
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 pb-12">
                    <!-- All Tab -->
                    <div x-show="pppkActiveTab === 'all'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
                                @forelse($tryoutPackages['PPPK']['all'] as $package)
                            <div class="h-full flex flex-col">
                                <!-- Card with Consistent Height -->
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden h-full flex flex-col">
                                    <!-- Professional Header -->
                                    <div class="bg-gradient-to-r from-emerald-600 to-green-700 p-4 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-3">
                                            <!-- Access Type Badge -->
                                            @if($package['is_free_package'])
                                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-unlock mr-1"></i>FREE
                                                    </span>
                                                </div>
                                            @else
                                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-crown mr-1"></i>PREMIUM
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- Time Access Badge -->
                                            @if(!empty($package['time_access_label']))
                                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1">
                                                    <span class="text-white font-semibold text-xs">
                                                        @if(str_contains($package['time_access_label'], 'Serentak'))
                                                            🏆 {{ $package['time_access_label'] }}
                                                        @else
                                                            🎯 {{ $package['time_access_label'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            </div>
                                        <h3 class="text-lg font-bold text-white mb-1 truncate">{{ $package['name'] }}</h3>
                                        <p class="text-emerald-100 text-sm">{{ count($package['category_names']) }} Kategori • {{ implode(', ', array_slice($package['category_names'], 0, 2)) }}{{ count($package['category_names']) > 2 ? '...' : '' }}</p>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">
                                        <!-- Key Metrics Grid -->
                                        <div class="grid grid-cols-2 gap-3 mb-4">
                                            <!-- Participants -->
                                            <div class="text-center p-2 bg-gray-50 rounded-lg">
                                                <div class="text-lg font-bold text-gray-800">
                                                    {{ number_format($package['total_participants']) }}
                                                </div>
                                                <div class="text-xs text-gray-600">Peserta</div>
                                            </div>
                                            <!-- Questions -->
                                            <div class="text-center p-2 bg-emerald-50 rounded-lg">
                                                <div class="text-lg font-bold text-emerald-600">
                                                    {{ number_format($package['total_questions']) }}
                                                </div>
                                                <div class="text-xs text-gray-600">Soal</div>
                                            </div>
                                        </div>

                                        <!-- Progress and Stats -->
                                        <div class="space-y-4">
                                            <!-- Completion Rate -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                                                    <span class="text-xs font-bold text-emerald-600">{{ $package['completion_rate'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-emerald-500 to-green-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['completion_rate'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Average Score -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Skor Rata-rata</span>
                                                    <span class="text-xs font-bold text-green-600">{{ $package['average_score'] }}/100</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['average_score'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Duration -->
                                            <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock text-orange-500 mr-2 text-sm"></i>
                                                    <span class="text-xs font-semibold text-gray-700">Durasi</span>
                                                </div>
                                                <span class="text-xs font-bold text-orange-600">{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>

                                            <!-- Date Range for Nasional Tryouts -->
                                            @if($package['start_date'] && $package['end_date'])
                                                <div class="flex items-center justify-between p-2 bg-purple-50 rounded-lg">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-calendar-alt text-purple-500 mr-2 text-sm"></i>
                                                        <span class="text-xs font-semibold text-gray-700">Periode</span>
                                                    </div>
                                                    <span class="text-xs font-bold text-purple-600">
                                                        {{ $package['start_date']->format('d M') }} - {{ $package['end_date']->format('d M Y') }}
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- User's Performance (if completed) -->
                                            @if($package['user_score_in_package'] > 0)
                                                <div class="p-2 bg-green-50 rounded-lg border border-green-200">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs font-semibold text-green-700">Skor Anda</span>
                                                        <span class="text-sm font-bold text-green-600">{{ $package['user_score_in_package'] }}/100</span>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Test Categories Detail -->
                                            <div class="mt-auto pt-4">
                                                <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                                <div class="space-y-2.5">
                                                    @if(!empty($package['category_details']))
                                                        @foreach($package['category_details'] as $category)
                                                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                                                                <div class="flex items-center">
                                                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                                                    <span class="text-xs font-semibold text-gray-700">{{ $category['name'] }}</span>
                                                                </div>
                                                                <div class="flex items-center space-x-2">
                                                                    <span class="text-xs font-bold text-blue-600">{{ $category['question_count'] }} soal</span>
                                                                    <span class="text-xs font-semibold text-orange-600">{{ $category['estimated_minutes'] }} menit</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="p-2 bg-gray-50 rounded-lg">
                                                            <span class="text-xs text-gray-600">{{ $package['tryouts']->first()->kategori }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
                                            </span>
                                            @if($package['is_completed_by_user'])
                                                <span class="text-xs font-semibold text-green-600">
                                                    ✓ Selesai
                                                </span>
                                            @else
                                                <span class="text-xs font-semibold text-orange-600">
                                                    ○ Belum Selesai
                                                </span>
                                            @endif
                                        </div>

                                        <!-- CTA Button -->
                                        @if($package['is_premium_package'] && !$hasPremium)
                                            <a href="{{ route('subscription.premium') }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                <i class="fas fa-crown text-yellow-300 text-sm"></i>
                                                <span class="text-sm">Upgrade Premium</span>
                                                <i class="fas fa-arrow-right text-sm"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('tryouts.index') }}?package={{ urlencode($package['name']) }}&type=pppk"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                @if($package['is_completed_by_user'])
                                                    <i class="fas fa-redo text-sm"></i>
                                                    <span class="text-sm">Kerjakan Lagi</span>
                                                    <i class="fas fa-chart-line text-sm"></i>
                                                @else
                                                    @if($package['is_free'])
                                                        <i class="fas fa-rocket text-yellow-300 text-sm"></i>
                                                        <span class="text-sm">Mulai Gratis</span>
                                                        <i class="fas fa-star text-yellow-300 text-sm"></i>
                                                    @else
                                                        <i class="fas fa-play text-sm"></i>
                                                        <span class="text-sm">Mulai Tes</span>
                                                        <i class="fas fa-fire text-orange-300 text-sm"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl p-8">
                                    <i class="fas fa-inbox text-4xl text-emerald-500 mb-3"></i>
                                    <p class="text-gray-600 text-lg">Belum ada paket tryout PPPK tersedia.</p>
                                </div>
                            </div>
                        @endforelse
                            </div>

                    <!-- Non-Teknis Tab -->
                    <div x-show="pppkActiveTab === 'Non-Teknis'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
                                @forelse($tryoutPackages['PPPK']['Non-Teknis'] as $package)
                            <div class="h-full flex flex-col">
                                <!-- Card with Consistent Height -->
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden h-full flex flex-col">
                                    <!-- Professional Header -->
                                    <div class="bg-gradient-to-r from-emerald-600 to-green-700 p-4 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-3">
                                            <!-- Access Type Badge -->
                                            @if($package['is_free_package'])
                                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-unlock mr-1"></i>FREE
                                                    </span>
                                                </div>
                                            @else
                                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg px-3 py-1 shadow-md">
                                                    <span class="text-white font-bold text-sm flex items-center">
                                                        <i class="fas fa-crown mr-1"></i>PREMIUM
                                                    </span>
                                                </div>
                                            @endif

                                            <!-- Time Access Badge -->
                                            @if(!empty($package['time_access_label']))
                                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1">
                                                    <span class="text-white font-semibold text-xs">
                                                        @if(str_contains($package['time_access_label'], 'Serentak'))
                                                            🏆 {{ $package['time_access_label'] }}
                                                        @else
                                                            🎯 {{ $package['time_access_label'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            </div>
                                        <h3 class="text-lg font-bold text-white mb-1 truncate">{{ $package['name'] }}</h3>
                                        <p class="text-emerald-100 text-sm">{{ count($package['category_names']) }} Kategori • {{ implode(', ', array_slice($package['category_names'], 0, 2)) }}{{ count($package['category_names']) > 2 ? '...' : '' }}</p>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">
                                        <!-- Key Metrics Grid -->
                                        <div class="grid grid-cols-2 gap-3 mb-4">
                                            <!-- Participants -->
                                            <div class="text-center p-2 bg-gray-50 rounded-lg">
                                                <div class="text-lg font-bold text-gray-800">
                                                    {{ number_format($package['total_participants']) }}
                                                </div>
                                                <div class="text-xs text-gray-600">Peserta</div>
                                            </div>
                                            <!-- Questions -->
                                            <div class="text-center p-2 bg-emerald-50 rounded-lg">
                                                <div class="text-lg font-bold text-emerald-600">
                                                    {{ number_format($package['total_questions']) }}
                                                </div>
                                                <div class="text-xs text-gray-600">Soal</div>
                                            </div>
                                        </div>

                                        <!-- Progress and Stats -->
                                        <div class="space-y-4">
                                            <!-- Completion Rate -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                                                    <span class="text-xs font-bold text-emerald-600">{{ $package['completion_rate'] }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['completion_rate'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Average Score -->
                                            <div>
                                                <div class="flex justify-between items-center mb-1">
                                                    <span class="text-xs font-semibold text-gray-700">Skor Rata-rata</span>
                                                    <span class="text-xs font-bold text-green-600">{{ $package['average_score'] }}/100</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full transition-all duration-300"
                                                         style="width: {{ min($package['average_score'], 100) }}%"></div>
                                                </div>
                                            </div>

                                            <!-- Duration -->
                                            <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock text-orange-500 mr-2 text-sm"></i>
                                                    <span class="text-xs font-semibold text-gray-700">Durasi</span>
                                                </div>
                                                <span class="text-xs font-bold text-orange-600">{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>

                                            <!-- Date Range for Nasional Tryouts -->
                                            @if($package['start_date'] && $package['end_date'])
                                                <div class="flex items-center justify-between p-2 bg-purple-50 rounded-lg">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-calendar-alt text-purple-500 mr-2 text-sm"></i>
                                                        <span class="text-xs font-semibold text-gray-700">Periode</span>
                                                    </div>
                                                    <span class="text-xs font-bold text-purple-600">{{ $package['start_date']->format('d M') }} - {{ $package['end_date']->format('d M Y') }}</span>
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
                                            </span>
                                            @if($package['is_completed_by_user'])
                                                <span class="text-xs font-semibold text-green-600">
                                                    ✓ Selesai
                                                </span>
                                            @else
                                                <span class="text-xs font-semibold text-orange-600">
                                                    ○ Belum Selesai
                                                </span>
                                            @endif
                                        </div>

                                        <!-- CTA Button -->
                                        @if($package['is_premium_package'] && !$hasPremium)
                                            <a href="{{ route('subscription.premium') }}"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                <i class="fas fa-crown text-yellow-300 text-sm"></i>
                                                <span class="text-sm">Upgrade Premium</span>
                                                <i class="fas fa-arrow-right text-sm"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('tryouts.index') }}?package={{ urlencode($package['name']) }}&type=pppk"
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                                                @if($package['is_completed_by_user'])
                                                    <i class="fas fa-redo text-sm"></i>
                                                    <span class="text-sm">Kerjakan Lagi</span>
                                                    <i class="fas fa-chart-line text-sm"></i>
                                                @else
                                                    @if($package['is_free'])
                                                        <i class="fas fa-rocket text-yellow-300 text-sm"></i>
                                                        <span class="text-sm">Mulai Gratis</span>
                                                        <i class="fas fa-star text-yellow-300 text-sm"></i>
                                                    @else
                                                        <i class="fas fa-play text-sm"></i>
                                                        <span class="text-sm">Mulai Tes</span>
                                                        <i class="fas fa-fire text-orange-300 text-sm"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl p-8">
                                    <i class="fas fa-inbox text-4xl text-emerald-500 mb-3"></i>
                                    <p class="text-gray-600 text-lg">Belum ada paket tryout Non-Teknis tersedia.</p>
                                </div>
                            </div>
                        @endforelse
                            </div>

                    <!-- View All Button -->
                    <div class="text-center mt-10">
                        <a href="{{ route('tryouts.index') }}?type=pppk"
                           class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                            <i class="fas fa-th-list mr-3"></i>
                            Lihat Semua Paket PPPK
                            <i class="fas fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <!-- Single Section (CPNS or PPPK only) -->
                <div class="section">
                    <div class="section-header mb-6">
                        <h3 class="section-title flex items-center text-lg">
                            <div class="stats-icon-{{ $targetTest === 'cpns' ? 'primary' : 'success' }} mr-3">
                                <i class="fas fa-{{ $targetTest === 'cpns' ? 'landmark' : 'user-tie' }} text-sm"></i>
                            </div>
                            Paket TryOut {{ strtoupper($targetTest) }}
                        </h3>
                        <p class="text-gray-600">
                            @if($targetTest === 'cpns')
                                Persiapan seleksi Calon Pegawai Negeri Sipil dengan lengkapan tes SKD dan SKB
                            @else
                                Persiapan seleksi Pegawai Pemerintah dengan Perjanjian Kerja (Manajerial, Sosio Kultural, Wawancara, dan Teknis)
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
                        @forelse($tryoutPackages as $package)
                            <div class="dashboard-card p-7 animate-fade-in-up hover:shadow-2xl" style="animation-delay: {{ $loop->iteration * 100 }}ms;">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="stats-icon-{{ $targetTest === 'cpns' ? 'primary' : 'success' }} mr-3">
                                        <i class="fas fa-{{ $targetTest === 'cpns' ? 'building' : 'user-tie' }}"></i>
                                    </div>
                                    <span class="badge-success">Paket {{ $loop->iteration }}</span>
                                </div>
                                <h4 class="package-title">{{ $package['name'] }}</h4>

                                <div class="space-y-3 mb-3">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-list-check mr-2 text-{{ $targetTest === 'cpns' ? 'blue' : 'green' }}-500"></i>
                                        <span><strong>{{ $package['tryouts']->count() }}</strong> Jenis Tes</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-question-circle mr-2 text-emerald-500"></i>
                                        <span><strong>{{ number_format($package['total_questions']) }}</strong> Soal</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-clock mr-2 text-orange-500"></i>
                                        <span><strong>{{ number_format($package['total_duration']) }}</strong> Menit</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <p class="text-xs font-semibold text-gray-700 mb-2">Jenis Tes:</p>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($package['tryouts'] as $tryout)
                                            <span class="px-2 py-1 bg-{{ $targetTest === 'cpns' ? 'blue' : 'green' }}-50 text-{{ $targetTest === 'cpns' ? 'blue' : 'green' }}-700 text-xs rounded-full">
                                                {{ $tryout->kategori }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                    <div class="text-xs text-gray-500">
                                        @if($package['tryouts']->first()->created_at)
                                            {{ $package['tryouts']->first()->created_at->diffForHumans() }}
                                        @endif
                                    </div>
                                    <a href="{{ route('tryouts.index') }}?package={{ urlencode($package['name']) }}&type={{ $targetTest }}" class="btn-primary text-sm px-4 py-2">
                                        Mulai TryOut
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8">
                                <p class="text-gray-500">Belum ada paket tryout {{ strtoupper($targetTest) }} tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center mt-6">
                        <a href="{{ route('tryouts.index') }}?type={{ $targetTest }}" class="btn-secondary">
                            <i class="fas fa-th-list mr-2"></i>
                            Lihat Semua Paket {{ strtoupper($targetTest) }}
                        </a>
                    </div>
                </div>
            @endif

            <!-- Clean Empty State - Belum ada aktivitas -->
            @if($stats['total_tryouts_completed'] == 0 && $recentTryouts->count() == 0)
                <div class="section">
                    <div class="dashboard-card p-12 text-center">
                        <!-- Welcome Icon -->
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full mb-6">
                            <i class="fas fa-rocket text-blue-600 text-3xl"></i>
                        </div>

                        <!-- Welcome Message -->
                        <h2 class="text-3xl font-bold text-gray-900 mb-3">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h2>
                        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                            Platform persiapan CPNS & PPPK terlengkap dengan ribuan soal dan pembahasan detail.
                        </p>

                        <!-- Feature Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto mb-6">
                            <div class="dashboard-card p-6 text-center">
                                <div class="text-4xl mb-3">🏛️</div>
                                <h3 class="font-semibold text-gray-900 mb-2">TryOut CPNS</h3>
                                <p class="text-sm text-gray-600">Persiapan SKD (TIU, TWK, TKP) dan SKB sesuai formasi</p>
                            </div>

                            <div class="dashboard-card p-6 text-center">
                                <div class="text-4xl mb-3">👔</div>
                                <h3 class="font-semibold text-gray-900 mb-2">TryOut PPPK</h3>
                                <p class="text-sm text-gray-600">Persiapan Manajerial, Sosio Kultural, Wawancara, dan Teknis</p>
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div class="bg-gradient-to-r from-blue-600 to-violet-600 rounded-xl p-8 text-white mb-8">
                            <h3 class="text-2xl font-bold mb-3">Mulai Perjalanan ASN Anda</h3>
                            <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
                                Setiap latihan adalah investasi untuk masa depan Anda. Mulai sekarang!
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('tryouts.index') }}" class="btn-primary bg-white text-blue-600 hover:bg-gray-50 flex items-center justify-center">
                                    <i class="fas fa-play-circle mr-2"></i>
                                    Lihat Paket Tryout
                                </a>
                                <a href="{{ route('materis.index') }}" class="btn-secondary border-2 border-white/20 text-white hover:bg-white/10 flex items-center justify-center">
                                    <i class="fas fa-book-open mr-2"></i>
                                    Pelajari Materi
                                </a>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-8 mb-8">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">5000+</div>
                                <div class="text-sm text-gray-600">Soal Tersedia</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">1000+</div>
                                <div class="text-sm text-gray-600">Pengguna Aktif</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">95%</div>
                                <div class="text-sm text-gray-600">Kepuasan</div>
                            </div>
                        </div>

                        <!-- Tips Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 text-left max-w-3xl mx-auto">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-lightbulb text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">💡 Tips Memulai</h4>
                                    <p class="text-gray-700">
                                        <strong>CPNS:</strong> Mulai dengan SKD (TIU, TWK, TKP) untuk tes dasar, lalu lanjut ke SKB sesuai formasi pilihan.<br>
                                        <strong>PPPK:</strong> Fokus pada Manajerial dan Sosio Kultural, lalu Wawancara dan Teknis sesuai bidang Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Normal Dashboard Content untuk user yang sudah ada aktivitas -->






            @endif {{-- End of Empty State Check --}}

        </div>
    </div>

    <!-- Premium Upgrade Section - Bottom -->
    @if(!$hasPremium)
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl mb-6 shadow-xl">
                    <span class="text-white text-2xl">👑</span>
                </div>
                <h2 class="text-3xl font-bold mb-3">🔥 Upgrade ke Premium</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Dapatkan akses tak terbatas ke semua paket tryout, materi pembelajaran, dan fitur eksklusif
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    <div class="text-center">
                        <div class="text-3xl mb-3">📚</div>
                        <h3 class="font-bold text-white mb-2">Akses Semua Paket</h3>
                        <p class="text-gray-400 text-sm">CPNS & PPPK tanpa batas</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-3">📊</div>
                        <h3 class="font-bold text-white mb-2">Progress Tracking</h3>
                        <p class="text-gray-400 text-sm">Analisis perkembangan lengkap</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-3">📖</div>
                        <h3 class="font-bold text-white mb-2">Materi Download</h3>
                        <p class="text-gray-400 text-sm">PDF dan modul belajar</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-3">🏆</div>
                        <h3 class="font-bold text-white mb-2">Leaderboard Priority</h3>
                        <p class="text-gray-400 text-sm">Bandingkan skor dengan user lain</p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('subscription.premium') }}"
                       class="inline-flex items-center bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <span class="mr-3">🚀</span>
                        <span>Upgrade ke Premium Sekarang</span>
                        <span class="ml-3">→</span>
                    </a>
                    <p class="text-gray-400 text-sm mt-4">
                        <span class="text-yellow-400">✨</span> Garansi 7 hari uang kembali
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if($performanceByCategory->count() > 0)
    // Prepare data for charts
    const categories = @json($performanceByCategory->keys()->toArray());
    const avgScores = @json($performanceByCategory->pluck('avg_score')->toArray());
    const bestScores = @json($performanceByCategory->pluck('best_score')->toArray());

    // Color scheme based on performance
    const getScoreColor = (score) => {
        if (score >= 80) return 'rgba(34, 197, 94, 0.8)';  // green
        if (score >= 60) return 'rgba(59, 130, 246, 0.8)'; // blue
        return 'rgba(251, 146, 60, 0.8)';  // orange
    };

    const getBorderColor = (score) => {
        if (score >= 80) return 'rgb(34, 197, 94)';
        if (score >= 60) return 'rgb(59, 130, 246)';
        return 'rgb(251, 146, 60)';
    };

    // 1. Score Distribution Pie Chart
    const scoreDistributionCtx = document.getElementById('scoreDistributionChart').getContext('2d');
    const excellentCount = avgScores.filter(score => score >= 80).length;
    const goodCount = avgScores.filter(score => score >= 60 && score < 80).length;
    const needsImprovementCount = avgScores.filter(score => score < 60).length;

    new Chart(scoreDistributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sangat Baik (≥80)', 'Cukup Baik (60-79)', 'Perlu Bimbingan (<60)'],
            datasets: [{
                data: [excellentCount, goodCount, needsImprovementCount],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(251, 146, 60, 0.8)'
                ],
                borderColor: [
                    'rgb(34, 197, 94)',
                    'rgb(59, 130, 246)',
                    'rgb(251, 146, 60)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });

    // 2. Category Comparison Bar Chart
    const categoryComparisonCtx = document.getElementById('categoryComparisonChart').getContext('2d');
    const backgroundColors = avgScores.map(score => getScoreColor(score));
    const borderColors = avgScores.map(score => getBorderColor(score));

    new Chart(categoryComparisonCtx, {
        type: 'bar',
        data: {
            labels: categories,
            datasets: [
                {
                    label: 'Rata-rata',
                    data: avgScores,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                },
                {
                    label: 'Terbaik',
                    data: bestScores,
                    backgroundColor: 'rgba(168, 85, 247, 0.3)',
                    borderColor: 'rgb(168, 85, 247)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y + '%';
                        }
                    }
                }
            }
        }
    });
    @endif
});
</script>

</x-app-layout>

<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard-enhanced.css') }}">
        <style>
            body { background: none !important; }
            .main-content { padding: 0 !important; }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.body.classList.add('dashboard-enhanced');
            });
        </script>
    @endpush

    <div class="dashboard-bg min-h-screen">
        <!-- Header dengan Animasi -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 pt-16 pb-12">
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-white bg-opacity-20 backdrop-blur-lg rounded-3xl mb-6 shadow-2xl floating">
                        <i class="fas fa-chart-line text-white text-4xl"></i>
                    </div>
                    <h1 class="text-5xl font-bold text-white mb-4">
                        Dashboard Analisis Performa
                    </h1>
                    <p class="text-xl text-white text-opacity-90 max-w-3xl mx-auto">
                        📊 Pantau progress belajar Anda dengan visualisasi data yang interaktif dan menarik
                    </p>

                    <!-- Streak Badge -->
                    @if($progressData['study_streak'] > 0)
                        <div class="mt-6 inline-flex items-center gap-2 streak-badge">
                            <i class="fas fa-fire"></i>
                            <span>{{ $progressData['study_streak'] }} Hari Berturut-turut</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 pb-16">

            <!-- Statistics Cards Grid -->
            <div class="dashboard-grid mb-12">
                <!-- Total Tryouts Card -->
                <div class="enhanced-card rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clipboard-check text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-800 animated-number">{{ $stats['total_tryouts_completed'] }}</div>
                            <div class="text-sm text-gray-600">Tryout Selesai</div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs text-gray-600">Progress Keseluruhan</span>
                            <span class="text-xs font-bold text-blue-600">{{ $progressData['completion_rate'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="progress-bar-animated h-2 rounded-full" style="width: {{ min($progressData['completion_rate'], 100) }}%"></div>
                        </div>
                    </div>

                    <!-- Additional Stats -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <div class="text-lg font-bold text-blue-600">{{ $progressData['total_tryouts_available'] }}</div>
                            <div class="text-xs text-gray-600">Tersedia</div>
                        </div>
                        <div class="bg-cyan-50 rounded-lg p-3 text-center">
                            <div class="text-lg font-bold text-cyan-600">{{ $progressData['study_streak'] }}</div>
                            <div class="text-xs text-gray-600">Hari Streak</div>
                        </div>
                    </div>

                    @if($stats['total_tryouts_completed'] >= 10)
                        <div class="mt-4 achievement-badge">
                            <i class="fas fa-trophy"></i>
                            <span>Super Achiever!</span>
                        </div>
                    @endif
                </div>

                <!-- Average Score Card -->
                <div class="enhanced-card rounded-2xl p-6">
                    <div class="text-center">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Skor Rata-rata</h3>
                        <div class="progress-circle" data-progress="{{ min($stats['average_score'] ?? 0, 100) }}">
                            <div class="score-circle-text">
                                {{ number_format($stats['average_score'] ?? 0, 1) }}
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">
                            @if(($stats['average_score'] ?? 0) >= 80)
                                🌟 Luar Biasa!
                            @elseif(($stats['average_score'] ?? 0) >= 60)
                                👍 Bagus!
                            @else
                                💪 Terus Belajar!
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Performance Breakdown Card -->
                <div class="enhanced-card rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Distribusi Performa</h3>

                    @php
                        $totalCategories = ($excellentCount ?? 0) + ($goodCount ?? 0) + ($needsImprovementCount ?? 0);
                        $excellentPercent = $totalCategories > 0 ? round(($excellentCount ?? 0) / $totalCategories * 100) : 0;
                        $goodPercent = $totalCategories > 0 ? round(($goodCount ?? 0) / $totalCategories * 100) : 0;
                        $needsImprovementPercent = $totalCategories > 0 ? round(($needsImprovementCount ?? 0) / $totalCategories * 100) : 0;
                    @endphp

                    <div class="space-y-3">
                        <div class="performance-indicator performance-excellent">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">🌟 Sangat Baik (≥80)</span>
                                <span class="font-bold">{{ $excellentCount ?? 0 }} ({{ $excellentPercent }}%)</span>
                            </div>
                        </div>
                        <div class="performance-indicator performance-good">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">👍 Baik (60-79)</span>
                                <span class="font-bold">{{ $goodCount ?? 0 }} ({{ $goodPercent }}%)</span>
                            </div>
                        </div>
                        <div class="performance-indicator performance-needs-improvement">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">💪 Perlu Peningkatan (<60)</span>
                                <span class="font-bold">{{ $needsImprovementCount ?? 0 }} ({{ $needsImprovementPercent }}%)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Achievement Card -->
                <div class="enhanced-card rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Pencapaian Terkini</h3>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-3 pulse">
                            <i class="fas fa-medal text-white text-2xl"></i>
                        </div>
                        @if($stats['total_tryouts_completed'] >= 1)
                            <p class="text-sm text-gray-700 font-medium">
                                🎯 Menyelesaikan {{ $stats['total_tryouts_completed'] }} tryout
                            </p>
                        @endif
                        @if(($stats['average_score'] ?? 0) >= 70)
                            <p class="text-sm text-gray-700 font-medium mt-2">
                                📈 Skor rata-rata di atas 70
                            </p>
                        @endif
                        @if($progressData['study_streak'] >= 3)
                            <p class="text-sm text-gray-700 font-medium mt-2">
                                🔥 {{ $progressData['study_streak'] }} hari belajar berturut-turut
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Performance Trend Chart -->
                <div class="enhanced-card rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">📈 Tren Performa</h3>
                    <div class="chart-container">
                        <canvas id="performanceChart"></canvas>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="expand-details bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors" data-chart="performance">
                            Lihat Detail Tren
                        </button>
                    </div>
                </div>

                <!-- Category Performance Chart -->
                <div class="enhanced-card rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">📊 Performa per Kategori</h3>
                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                    <div class="mt-4 flex justify-center gap-2">
                        <button class="filter-button active bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm transition-colors" data-filter="all">
                            Semua
                        </button>
                        <button class="filter-button bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm transition-colors" data-filter="excellent">
                            Sangat Baik
                        </button>
                        <button class="filter-button bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors" data-filter="good">
                            Baik
                        </button>
                        <button class="filter-button bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-sm transition-colors" data-filter="improvement">
                            Perlu Peningkatan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Detailed Performance Analysis -->
            <div class="enhanced-card rounded-2xl p-6 mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">📋 Analisis Performa Detail</h3>

                @if(isset($performanceByCategory) && !empty($performanceByCategory) && count($performanceByCategory) > 0)
                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-200">
                                    <th class="text-left py-3 px-4 font-bold text-gray-700">Kategori</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Jumlah Soal</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Benar</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Salah</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Skor</th>
                                    <th class="text-center py-3 px-4 font-bold text-gray-700">Performa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($performanceByCategory as $category)
                                    <tr class="border-b hover:bg-gray-50 transition-colors filterable-item" data-category="{{ $category['avg_score'] >= 80 ? 'excellent' : ($category['avg_score'] >= 60 ? 'good' : 'improvement') }}">
                                        <td class="py-4 px-4">
                                            <div class="font-semibold text-gray-800">{{ $category['category_name'] }}</div>
                                        </td>
                                        <td class="text-center py-4 px-4">{{ $category['total_answered'] }}</td>
                                        <td class="text-center py-4 px-4">
                                            <span class="text-green-600 font-bold">{{ $category['correct_answers'] }}</span>
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            <span class="text-red-600 font-bold">{{ $category['wrong_answers'] }}</span>
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            <span class="font-bold text-lg {{ $category['avg_score'] >= 80 ? 'text-green-600' : ($category['avg_score'] >= 60 ? 'text-blue-600' : 'text-orange-600') }}">
                                                {{ number_format($category['avg_score'], 1) }}
                                            </span>
                                        </td>
                                        <td class="text-center py-4 px-4">
                                            @if($category['avg_score'] >= 80)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    🌟 Sangat Baik
                                                </span>
                                            @elseif($category['avg_score'] >= 60)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    👍 Baik
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                    💪 Perlu Peningkatan
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-bar text-gray-400 text-3xl"></i>
                        </div>
                        <p class="text-gray-500 text-lg">Belum ada data performa</p>
                        <p class="text-gray-400 text-sm mt-2">Mulai tryout untuk melihat analisis performa Anda</p>
                    </div>
                @endif
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="enhanced-card rounded-2xl p-6 text-center hover:scale-105 transition-transform cursor-pointer" onclick="window.location.href='{{ route('tryouts.index') }}'">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-play text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Mulai Tryout</h4>
                    <p class="text-sm text-gray-600">Lanjutkan belajar dengan tryout baru</p>
                </div>

                <div class="enhanced-card rounded-2xl p-6 text-center hover:scale-105 transition-transform cursor-pointer" onclick="window.location.href='{{ route('tryouts.history') }}'">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-history text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Riwayat Tryout</h4>
                    <p class="text-sm text-gray-600">Lihat hasil tryout sebelumnya</p>
                </div>

                <div class="enhanced-card rounded-2xl p-6 text-center hover:scale-105 transition-transform cursor-pointer" onclick="window.location.href='{{ route('reports.index') }}'">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Laporan Lengkap</h4>
                    <p class="text-sm text-gray-600">Download laporan analisis lengkap</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Pass data to JavaScript
            window.dashboardData = @json([
                'performanceTrend' => $performanceTrend ?? [],
                'categoryBreakdown' => $categoryBreakdown ?? [],
                'studyCalendar' => $studyCalendar ?? [],
                'performanceByCategory' => $performanceByCategory ?? []
            ]);
        </script>
        <script src="{{ asset('js/dashboard-enhanced.js') }}"></script>
    @endpush
</x-app-layout>
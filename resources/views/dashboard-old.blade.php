<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-title flex items-center">
                    <i class="fas fa-chart-line mr-3 text-blue-600"></i>
                    Dashboard
                </h1>
                <p class="text-subtitle mt-1">
                    Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>. Pantau progress belajar Anda.
                </p>
            </div>
            @if(!$hasPremium)
                <a href="{{ route('subscription.premium') }}" class="btn-primary flex items-center">
                    <i class="fas fa-crown mr-2"></i>
                    Upgrade Premium
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Professional Statistics Cards -->
            <div class="stats-grid">
                <!-- TryOut Completed Card -->
                <div class="dashboard-card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="stats-icon stats-icon-primary">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        @if($stats['total_tryouts_completed'] > 0)
                            <span class="badge-success">Aktif</span>
                        @endif
                    </div>
                    <div>
                        <p class="text-card-title mb-2">TryOut Selesai</p>
                        <p class="text-stat-number">{{ $stats['total_tryouts_completed'] }}</p>
                        @if($progressData['total_tryouts_available'] > 0)
                            <div class="mt-3">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $progressData['completion_rate'] }}%"></div>
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-stat-label">{{ number_format($progressData['completion_rate'], 0) }}%</span>
                                    <span class="text-stat-label">dari {{ $progressData['total_tryouts_available'] }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Average Score Card -->
                <div class="dashboard-card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="stats-icon stats-icon-success">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        @if($stats['average_score'] >= 80)
                            <span class="badge-success">Excellent</span>
                        @endif
                    </div>
                    <div>
                        <p class="text-card-title mb-2">Rata-rata Skor</p>
                        <p class="text-stat-number">{{ number_format($stats['average_score'], 1) }}</p>
                        <div class="flex items-center mt-2">
                            @for($i = 1; $i <= 5; $i++)
                                @if($stats['average_score'] >= $i * 20)
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                @else
                                    <i class="far fa-star text-gray-300 text-sm"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="text-stat-label mt-2">
                            @if($stats['average_score'] >= 80)
                                Sangat Baik
                            @elseif($stats['average_score'] >= 60)
                                Cukup Baik
                            @elseif($stats['average_score'] > 0)
                                Perlu Perbaikan
                            @else
                                Belum Ada Data
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Best Score Card -->
                <div class="dashboard-card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="stats-icon stats-icon-warning">
                            <i class="fas fa-trophy"></i>
                        </div>
                        @if($stats['best_score'] >= 90)
                            <span class="badge-warning">Top Score</span>
                        @endif
                    </div>
                    <div>
                        <p class="text-card-title mb-2">Skor Terbaik</p>
                        <p class="text-stat-number">{{ $stats['best_score'] }}</p>
                        <p class="text-stat-label mt-2">
                            @if($stats['best_score'] >= 95)
                                Sempurna
                            @elseif($stats['best_score'] >= 90)
                                Sangat Baik
                            @elseif($stats['best_score'] >= 80)
                                Baik
                            @elseif($stats['best_score'] > 0)
                                Cukup
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Study Streak Card -->
                <div class="dashboard-card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="stats-icon stats-icon-violet">
                            <i class="fas fa-fire"></i>
                        </div>
                        @if($progressData['study_streak'] >= 7)
                            <span class="badge-info">On Fire</span>
                        @endif
                    </div>
                    <div>
                        <p class="text-card-title mb-2">Streak Belajar</p>
                        <p class="text-stat-number">{{ $progressData['study_streak'] }}</p>
                        <p class="text-stat-label mt-2">
                            @if($progressData['study_streak'] >= 30)
                                30+ Hari Konsisten
                            @elseif($progressData['study_streak'] >= 14)
                                2 Minggu
                            @elseif($progressData['study_streak'] >= 7)
                                1 Minggu
                            @elseif($progressData['study_streak'] > 0)
                                {{ $progressData['study_streak'] }} Hari
                            @else
                                Mulai Hari Ini
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Clean Empty State - Belum ada aktivitas -->
            @if($stats['total_tryouts_completed'] == 0 && $recentTryouts->count() == 0)
                <div class="section">
                    <div class="dashboard-card p-12 text-center">
                        <!-- Welcome Icon -->
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-full mb-6">
                            <i class="fas fa-rocket text-blue-600 text-3xl"></i>
                        </div>

                        <!-- Welcome Message -->
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h2>
                        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                            Platform persiapan CPNS & PPPK terlengkap dengan ribuan soal dan pembahasan detail.
                        </p>

                        <!-- Feature Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto mb-10">
                            <div class="dashboard-card p-6 text-center">
                                <div class="text-4xl mb-4">📚</div>
                                <h3 class="font-semibold text-gray-900 mb-2">Latihan Soal</h3>
                                <p class="text-sm text-gray-600">Ribuan soal dengan tingkat kesulitan bervariasi</p>
                            </div>

                            <div class="dashboard-card p-6 text-center">
                                <div class="text-4xl mb-4">🎯</div>
                                <h3 class="font-semibold text-gray-900 mb-2">Tryout Realistis</h3>
                                <p class="text-sm text-gray-600">Simulasi ujian sesuai format SKD terbaru</p>
                            </div>

                            <div class="dashboard-card p-6 text-center">
                                <div class="text-4xl mb-4">🏆</div>
                                <h3 class="font-semibold text-gray-900 mb-2">Ranking & Analisis</h3>
                                <p class="text-sm text-gray-600">Pantau peringkat dan identifikasi area perbaikan</p>
                            </div>
                        </div>

                        {{-- CTA Section with Blue-Orange Theme & Clear Spacing --}}
                        {{-- Spectacular CTA Section with Enhanced Design --}}
                        <div class="relative max-w-4xl mx-auto mb-12 animate-fade-in-up delay-400">
                            <div class="enhanced-dashboard-button rounded-3xl p-12 !text-white shadow-2xl animate-glow relative overflow-hidden">
                                <!-- Floating background elements -->
                                <div class="absolute inset-0 overflow-hidden">
                                    <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full animate-floating"></div>
                                    <div class="absolute bottom-10 right-10 w-16 h-16 bg-white/10 rounded-full animate-floating" style="animation-delay: 0.5s;"></div>
                                    <div class="absolute top-1/2 right-1/4 w-12 h-12 bg-white/10 rounded-full animate-floating" style="animation-delay: 1s;"></div>
                                </div>

                                <div class="relative z-10 text-center space-y-6 mb-8">
                                    <div class="inline-flex items-center justify-center w-24 h-24 !bg-white/20 backdrop-blur-sm rounded-full mb-4 animate-glow">
                                        <i class="fas fa-rocket text-6xl !text-white animate-floating"></i>
                                    </div>
                                    <h3 class="text-4xl md:text-5xl font-black !text-white font-sora animate-glow">
                                        🚀 Mulai Tryout Sekarang!
                                    </h3>
                                    <p class="text-xl !text-white/95 max-w-2xl mx-auto font-space">
                                        Jangan tunda lagi! Setiap detik yang kamu manfaatkan adalah investasi untuk masa depanmu.
                                    </p>
                                </div>

                                {{-- Enhanced CTA Buttons --}}
                                <div class="relative z-10 flex flex-col sm:flex-row gap-4 justify-center mb-8">
                                    <a href="{{ route('tryouts.index') }}" class="group !bg-white hover:!bg-gray-50 !text-blue-700 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl flex items-center justify-center spectacular-card">
                                        <i class="fas fa-play-circle mr-3 text-2xl animate-floating"></i>
                                        <span class="font-space">Mulai Tryout</span>
                                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                                    </a>
                                    <a href="{{ route('materis.index') }}" class="group glass-premium hover:!bg-white/25 !text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 border-2 !border-white/50 flex items-center justify-center backdrop-blur-sm spectacular-card">
                                        <i class="fas fa-book-open mr-3 text-2xl animate-floating" style="animation-delay: 0.3s;"></i>
                                        <span class="font-space">Pelajari Materi</span>
                                    </a>
                                </div>

                                {{-- Enhanced Stats Preview with Animations --}}
                                <div class="relative z-10 grid grid-cols-3 gap-6 pt-8 border-t !border-white/30">
                                    <div class="text-center animate-fade-in-up delay-500">
                                        <div class="text-4xl font-black mb-2 !text-white font-space animate-pulse-glow">5000+</div>
                                        <div class="text-sm !text-white/90 font-inter">Soal Tersedia</div>
                                    </div>
                                    <div class="text-center animate-fade-in-up delay-600">
                                        <div class="text-4xl font-black mb-2 !text-white font-space animate-pulse-glow">1000+</div>
                                        <div class="text-sm !text-white/90 font-inter">Pengguna Aktif</div>
                                    </div>
                                    <div class="text-center animate-fade-in-up delay-700">
                                        <div class="text-4xl font-black mb-2 !text-white font-space animate-pulse-glow">95%</div>
                                        <div class="text-sm !text-white/90 font-inter">Kepuasan</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Spectacular Tips Box with Enhanced Design --}}
                        <div class="max-w-3xl mx-auto spectacular-card !bg-gradient-to-r !from-yellow-50 !to-amber-100 border-l-4 !border-yellow-500 rounded-xl p-8 shadow-lg animate-fade-in-up delay-500 animate-glow">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-16 h-16 !bg-gradient-to-r !from-yellow-500 !to-amber-600 rounded-xl flex items-center justify-center shadow-lg animate-glow">
                                    <i class="fas fa-lightbulb !text-white text-3xl animate-floating"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-2xl font-black text-gradient font-sora mb-3">💡 Tips Pro</h4>
                                    <p class="!text-gray-700 leading-relaxed font-inter text-lg">
                                        Mulai dengan tryout kategori <strong class="text-gradient font-bold">TWK (Tes Wawasan Kebangsaan)</strong> untuk mengukur kemampuan dasarmu. Lalu lanjut ke TIU dan TKP untuk persiapan maksimal!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Normal Dashboard Content --}}

            {{-- Motivational Banner - Clean Blue-Orange --}}
            @if($stats['total_tryouts_completed'] == 0 && $recentTryouts->count() > 0)
                <div class="mb-8 !bg-gradient-to-r !from-blue-600 !to-orange-600 rounded-2xl p-8 !text-white shadow-xl border !border-blue-300/30">
                    <div class="flex items-center gap-6">
                        <div class="text-7xl">🎯</div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-black mb-3 !text-white">
                                Ada {{ $recentTryouts->count() }} Tryout Menanti! 🚀
                            </h3>
                            <p class="!text-white/90 mb-4 text-lg">
                                Setiap ahli pernah menjadi pemula. Tryout pertamamu adalah langkah awal menuju kesuksesan!
                            </p>
                            <a href="{{ route('tryouts.index') }}" class="inline-flex items-center !bg-white !text-blue-700 hover:!bg-gray-50 px-6 py-3 rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-play-circle mr-2"></i>
                                Mulai Tryout Pertama
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Banner Premium - Clean Design -->
            @if(!$hasPremium)
                <div class="mb-8 !bg-gradient-to-r !from-blue-600 !to-orange-600 rounded-2xl p-8 !text-white shadow-xl border !border-blue-300/30">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                        <div class="flex-1">
                            <h3 class="text-3xl font-black mb-4 !text-white">
                                🔥 Buka Akses Premium Sekarang!
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 !bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-check !text-white"></i>
                                    </div>
                                    <span class="!text-white font-medium">Pembahasan detail semua soal</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 !bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-check !text-white"></i>
                                    </div>
                                    <span class="!text-white font-medium">Materi terbaru CPNS & PPPK</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 !bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-check !text-white"></i>
                                    </div>
                                    <span class="!text-white font-medium">File PDF bisa di-download</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 !bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-check !text-white"></i>
                                    </div>
                                    <span class="!text-white font-medium">Ranking untuk ukur kemampuan</span>
                                </div>
                            </div>
                            <p class="!text-white/90 font-bold text-lg">💡 1x berlangganan = akses 1 tahun penuh!</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('subscription.premium') }}" class="!bg-white !text-blue-700 hover:!bg-gray-50 px-8 py-4 rounded-xl font-bold text-xl transition-all duration-200 transform hover:scale-105 shadow-xl inline-flex items-center">
                                <i class="fas fa-crown mr-2"></i>
                                Upgrade Premium
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Status Premium -->
            @if($hasPremium && $premiumSubscription)
                <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold flex items-center">
                                <i class="fas fa-crown text-yellow-300 mr-2"></i>
                                Status Premium Aktif
                            </h3>
                            <p class="mt-1">Berlaku hingga: {{ $premiumSubscription->tanggal_akhir->format('d M Y') }}</p>
                            <p class="text-green-100 text-sm">Sisa waktu: {{ $premiumSubscription->getDaysRemaining() }} hari</p>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold">{{ number_format($premiumSubscription->getRemainingPercentage(), 0) }}%</div>
                            <div class="text-green-200 text-sm">tersisa</div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clipboard-check text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">TryOut Selesai</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_tryouts_completed'] }}</p>
                            <p class="text-xs text-gray-400">dari {{ $progressData['total_tryouts_available'] }} tersedia</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Rata-rata Skor</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['average_score'], 1) }}</p>
                            <p class="text-xs text-gray-400">
                                @if($stats['average_score'] >= 80)
                                    <span class="text-green-600">🎯 Sangat Baik!</span>
                                @elseif($stats['average_score'] >= 60)
                                    <span class="text-blue-600">👍 Cukup Baik</span>
                                @else
                                    <span class="text-orange-600">💪 Terus Belajar</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-trophy text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Skor Terbaik</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['best_score'] }}</p>
                            <p class="text-xs text-gray-400">
                                @if($stats['best_score'] >= 90)
                                    🏆 Top Score!
                                @elseif($stats['best_score'] >= 80)
                                    ⭐ Excellent!
                                @else
                                    🎯 Keep Going!
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-fire text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Streak Belajar</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $progressData['study_streak'] }}</p>
                            <p class="text-xs text-gray-400">hari berturut-turut 🔥</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Spectacular Progress & Ranking Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Learning Progress - Spectacular Version -->
                <div class="spectacular-card premium-stats-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white animate-fade-in-up animate-glow">
                    <h3 class="text-xl font-bold mb-4 flex items-center font-sora">
                        <i class="fas fa-graduation-cap mr-3 text-2xl animate-floating"></i>
                        Progress Belajar
                    </h3>
                    <div class="mb-6">
                        <div class="flex justify-between mb-3">
                            <span class="text-sm font-medium font-inter">Completion Rate</span>
                            <span class="text-sm font-bold font-space animate-pulse-glow">{{ $progressData['completion_rate'] }}%</span>
                        </div>
                        <div class="w-full bg-blue-300 rounded-full h-4 overflow-hidden">
                            <div class="!bg-gradient-to-r !from-white !to-blue-100 h-full rounded-full transition-all duration-1000 animate-shimmer" style="width: {{ $progressData['completion_rate'] }}%"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="text-center p-3 bg-white/10 rounded-lg backdrop-blur-sm">
                            <div class="text-blue-100 font-inter">Selesai</div>
                            <div class="text-3xl font-black font-space">{{ $stats['total_tryouts_completed'] }}</div>
                        </div>
                        <div class="text-center p-3 bg-white/10 rounded-lg backdrop-blur-sm">
                            <div class="text-blue-100 font-inter">Tersedia</div>
                            <div class="text-3xl font-black font-space">{{ $progressData['total_tryouts_available'] }}</div>
                        </div>
                    </div>
                </div>

                <!-- Ranking Position - Spectacular Version -->
                <div class="spectacular-card premium-stats-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white animate-fade-in-up delay-200 animate-glow">
                    <h3 class="text-xl font-bold mb-4 flex items-center font-sora">
                        <i class="fas fa-ranking-star mr-3 text-2xl animate-floating" style="animation-delay: 0.3s;"></i>
                        Peringkat Kamu
                    </h3>
                    <div class="text-center">
                        <div class="text-6xl font-black mb-3 font-space text-gradient animate-pulse-glow">#{{ $progressData['rank_position'] }}</div>
                        <div class="text-orange-100 font-inter">dari {{ $progressData['total_users'] }} pengguna</div>
                        @if($progressData['rank_position'] <= 10)
                            <div class="mt-4 bg-white/20 rounded-lg p-3 backdrop-blur-sm animate-pulse-glow">
                                <div class="text-lg font-bold">🏆 Top 10 Leaderboard!</div>
                            </div>
                        @elseif($progressData['rank_position'] <= 50)
                            <div class="mt-4 bg-white/20 rounded-lg p-3 backdrop-blur-sm animate-glow">
                                <div class="text-lg font-bold">⭐ Top 50 Achiever!</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Achievements - Spectacular Version -->
                <div class="spectacular-card premium-stats-card bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white animate-fade-in-up delay-400 animate-glow">
                    <h3 class="text-xl font-bold mb-4 flex items-center font-sora">
                        <i class="fas fa-medal mr-3 text-2xl animate-floating" style="animation-delay: 0.6s;"></i>
                        Pencapaian Terbaru
                    </h3>
                    @if(count($progressData['recent_achievements']) > 0)
                        <div class="space-y-3">
                            @foreach($progressData['recent_achievements'] as $achievement)
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-3 spectacular-card">
                                    <div class="flex items-center">
                                        <div class="text-3xl mr-3 animate-floating">{{ $achievement['icon'] }}</div>
                                        <div class="flex-1">
                                            <div class="font-bold text-sm font-sora">{{ $achievement['title'] }}</div>
                                            <div class="text-xs text-green-100 font-inter">{{ $achievement['desc'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6 text-green-100">
                            <i class="fas fa-star text-5xl mb-3 animate-floating"></i>
                            <p class="text-sm font-inter">Selesaikan tryout pertama untuk mendapat pencapaian!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Performance by Category -->
            @if($performanceByCategory->count() > 0)
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-chart-pie mr-2 text-blue-600"></i>
                        Performa per Kategori
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($performanceByCategory as $kategori => $data)
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <h4 class="font-bold text-gray-800 mb-2">{{ $kategori }}</h4>
                                <div class="space-y-1 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Jumlah:</span>
                                        <span class="font-semibold">{{ $data['count'] }} tryout</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Rata-rata:</span>
                                        <span class="font-semibold text-blue-600">{{ $data['avg_score'] }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Terbaik:</span>
                                        <span class="font-semibold text-green-600">{{ $data['best_score'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- TryOut Terbaru -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900">TryOut Terbaru</h3>
                        <a href="{{ route('tryouts.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentTryouts->take(3) as $tryout)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900">{{ $tryout->title }}</h4>
                                    <p class="text-sm text-gray-500">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-100 text-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-800">
                                            {{ $tryout->type }}
                                        </span>
                                        <span class="ml-2">{{ $tryout->kategori }}</span>
                                    </p>
                                </div>
                                <a href="{{ route('tryouts.show', $tryout) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Mulai
                                </a>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada TryOut tersedia.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Materi Terbaru -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Materi Terbaru</h3>
                        <a href="{{ route('materis.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="space-y-3">
                        @forelse($recentMateris->take(3) as $materi)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900 flex items-center">
                                        {{ $materi->title }}
                                        @if($materi->is_premium)
                                            <i class="fas fa-crown text-orange-500 ml-2 text-sm"></i>
                                        @endif
                                    </h4>
                                    <p class="text-sm text-gray-500">{{ $materi->tryout->title }}</p>
                                </div>
                                <a href="{{ route('materis.show', $materi) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Lihat
                                </a>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada materi tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Aktivitas Terakhir -->
            @if($userTryouts->count() > 0)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Aktivitas Terakhir</h3>
                    <div class="space-y-3">
                        @foreach($userTryouts as $leaderboard)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900">{{ $leaderboard->tryout->title }}</h4>
                                    <p class="text-sm text-gray-500">
                                        Skor: {{ $leaderboard->total_skor }} |
                                        Benar: {{ $leaderboard->benar }} |
                                        Ranking: #{{ $leaderboard->rank ?? '-' }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-blue-600">{{ number_format($leaderboard->persentase, 1) }}%</div>
                                    <div class="text-xs text-gray-500">{{ $leaderboard->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @endif {{-- End of Empty State Check --}}
        </div>
    </div>
</x-app-layout>

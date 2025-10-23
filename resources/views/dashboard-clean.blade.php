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

                        <!-- CTA Section -->
                        <div class="bg-gradient-to-r from-blue-600 to-violet-600 rounded-xl p-8 text-white mb-8">
                            <h3 class="text-2xl font-bold mb-4">Mulai Perjalanan ASN Anda</h3>
                            <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
                                Setiap latihan adalah investasi untuk masa depan Anda. Mulai sekarang!
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('tryouts.index') }}" class="btn-primary bg-white text-blue-600 hover:bg-gray-50 flex items-center justify-center">
                                    <i class="fas fa-play-circle mr-2"></i>
                                    Mulai Tryout
                                </a>
                                <a href="{{ route('materis.index') }}" class="btn-secondary border-2 border-white/20 text-white hover:bg-white/10 flex items-center justify-center">
                                    <i class="fas fa-book-open mr-2"></i>
                                    Pelajari Materi
                                </a>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-6 mb-8">
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
                                        Mulai dengan tryout kategori <strong>TWK (Tes Wawasan Kebangsaan)</strong> untuk mengukur kemampuan dasar Anda, lalu lanjut ke TIU dan TKP untuk persiapan maksimal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Normal Dashboard Content untuk user yang sudah ada aktivitas -->

                <!-- Premium Banner -->
                @if(!$hasPremium)
                    <div class="section">
                        <div class="bg-gradient-to-r from-blue-600 to-violet-600 rounded-xl p-6 text-white">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold mb-2">🔥 Upgrade ke Premium</h3>
                                    <p class="text-blue-100 mb-4">Dapatkan akses penuh ke semua materi dan pembahasan detail</p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-check mr-2"></i>
                                            <span>Pembahasan detail semua soal</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-check mr-2"></i>
                                            <span>Materi terbaru CPNS & PPPK</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-check mr-2"></i>
                                            <span>File PDF bisa di-download</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-check mr-2"></i>
                                            <span>Ranking sistem</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('subscription.premium') }}" class="btn-primary bg-white text-blue-600 hover:bg-gray-50">
                                        <i class="fas fa-crown mr-2"></i>
                                        Upgrade Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Progress & Learning Insights -->
                <div class="dashboard-grid lg:grid-cols-3">
                    <!-- Learning Progress -->
                    <div class="dashboard-card p-6">
                        <div class="section-header">
                            <h3 class="section-title flex items-center">
                                <i class="fas fa-graduation-cap mr-2 text-blue-600"></i>
                                Progress Belajar
                            </h3>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-sm font-medium">Completion Rate</span>
                                    <span class="text-sm font-bold text-blue-600">{{ $progressData['completion_rate'] }}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $progressData['completion_rate'] }}%"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 pt-2">
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-gray-900">{{ $stats['total_tryouts_completed'] }}</div>
                                    <div class="text-xs text-gray-600">Selesai</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-gray-900">{{ $progressData['total_tryouts_available'] }}</div>
                                    <div class="text-xs text-gray-600">Tersedia</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ranking Position -->
                    <div class="dashboard-card p-6">
                        <div class="section-header">
                            <h3 class="section-title flex items-center">
                                <i class="fas fa-ranking-star mr-2 text-violet-600"></i>
                                Peringkat Anda
                            </h3>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold text-gray-900 mb-2">#{{ $progressData['rank_position'] }}</div>
                            <div class="text-sm text-gray-600 mb-4">dari {{ $progressData['total_users'] }} pengguna</div>
                            @if($progressData['rank_position'] <= 10)
                                <div class="bg-yellow-50 text-yellow-800 rounded-lg p-3">
                                    <div class="text-sm font-semibold">🏆 Top 10 Leaderboard!</div>
                                </div>
                            @elseif($progressData['rank_position'] <= 50)
                                <div class="bg-blue-50 text-blue-800 rounded-lg p-3">
                                    <div class="text-sm font-semibold">⭐ Top 50 Achiever!</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Recent Achievements -->
                    <div class="dashboard-card p-6">
                        <div class="section-header">
                            <h3 class="section-title flex items-center">
                                <i class="fas fa-medal mr-2 text-green-600"></i>
                                Pencapaian Terbaru
                            </h3>
                        </div>
                        @if(count($progressData['recent_achievements']) > 0)
                            <div class="space-y-3">
                                @foreach($progressData['recent_achievements'] as $achievement)
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <div class="text-2xl mr-3">{{ $achievement['icon'] }}</div>
                                            <div>
                                                <div class="font-semibold text-sm">{{ $achievement['title'] }}</div>
                                                <div class="text-xs text-gray-600">{{ $achievement['desc'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-6 text-gray-500">
                                <i class="fas fa-star text-3xl mb-2"></i>
                                <p class="text-sm">Selesaikan tryout pertama untuk mendapat pencapaian!</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Performance by Category -->
                @if($performanceByCategory->count() > 0)
                    <div class="section">
                        <div class="section-header">
                            <h3 class="section-title flex items-center">
                                <i class="fas fa-chart-pie mr-2 text-blue-600"></i>
                                Performa per Kategori
                            </h3>
                        </div>
                        <div class="dashboard-card p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($performanceByCategory as $kategori => $data)
                                    <div class="border border-gray-200 rounded-lg p-4">
                                        <h4 class="font-semibold text-gray-800 mb-3">{{ $kategori }}</h4>
                                        <div class="space-y-2">
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-600">Jumlah:</span>
                                                <span class="text-sm font-semibold">{{ $data['count'] }} tryout</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-600">Rata-rata:</span>
                                                <span class="text-sm font-semibold text-blue-600">{{ $data['avg_score'] }}</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-600">Terbaik:</span>
                                                <span class="text-sm font-semibold text-green-600">{{ $data['best_score'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Recent Activities -->
                <div class="dashboard-grid lg:grid-cols-2">
                    <!-- TryOut Terbaru -->
                    <div class="dashboard-card p-6">
                        <div class="section-header">
                            <div class="flex items-center justify-between">
                                <h3 class="section-title flex items-center">
                                    <i class="fas fa-clock mr-2 text-blue-600"></i>
                                    TryOut Terbaru
                                </h3>
                                <a href="{{ route('tryouts.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Lihat Semua →
                                </a>
                            </div>
                        </div>
                        <div class="space-y-3">
                            @forelse($recentTryouts->take(5) as $tryout)
                                <div class="list-item rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900">{{ $tryout->title }}</h4>
                                            <p class="text-sm text-gray-500">
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-100 text-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-800">
                                                    {{ $tryout->type }}
                                                </span>
                                                <span class="ml-2">{{ $tryout->kategori }}</span>
                                            </p>
                                        </div>
                                        <a href="{{ route('tryouts.show', $tryout) }}" class="btn-primary text-sm px-4 py-2">
                                            Mulai
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Belum ada TryOut tersedia.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Materi Terbaru -->
                    <div class="dashboard-card p-6">
                        <div class="section-header">
                            <div class="flex items-center justify-between">
                                <h3 class="section-title flex items-center">
                                    <i class="fas fa-book mr-2 text-green-600"></i>
                                    Materi Terbaru
                                </h3>
                                <a href="{{ route('materis.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Lihat Semua →
                                </a>
                            </div>
                        </div>
                        <div class="space-y-3">
                            @forelse($recentMateris->take(5) as $materi)
                                <div class="list-item rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900 flex items-center">
                                                {{ $materi->title }}
                                                @if($materi->is_premium)
                                                    <i class="fas fa-crown text-yellow-500 ml-2 text-sm"></i>
                                                @endif
                                            </h4>
                                            <p class="text-sm text-gray-500">{{ $materi->tryout->title }}</p>
                                        </div>
                                        <a href="{{ route('materis.show', $materi) }}" class="btn-secondary text-sm px-4 py-2">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Belum ada materi tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Aktivitas Terakhir -->
                @if($userTryouts->count() > 0)
                    <div class="section">
                        <div class="section-header">
                            <h3 class="section-title flex items-center">
                                <i class="fas fa-history mr-2 text-gray-600"></i>
                                Aktivitas Terakhir
                            </h3>
                        </div>
                        <div class="dashboard-card p-6">
                            <div class="space-y-3">
                                @foreach($userTryouts as $leaderboard)
                                    <div class="list-item rounded-lg">
                                        <div class="flex items-center justify-between">
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
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            @endif {{-- End of Empty State Check --}}

        </div>
    </div>
</x-app-layout>
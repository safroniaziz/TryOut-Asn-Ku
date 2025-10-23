<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-blue-900 leading-tight">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </h2>
                <p class="text-blue-600 mt-1">Selamat datang kembali, {{ Auth::user()->name }}!</p>
            </div>
            @if(!$hasPremium)
                <a href="{{ route('subscription.premium') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-crown mr-2"></i>Upgrade Premium
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Empty State - Belum ada aktivitas --}}
            @if($stats['total_tryouts_completed'] == 0 && $recentTryouts->count() == 0)
                <div class="text-center py-16">
                    <div class="mb-8">
                        <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-blue-100 to-orange-100 rounded-full mb-6">
                            <i class="fas fa-rocket text-6xl text-blue-600"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">
                            Selamat Datang, {{ Auth::user()->name }}! 🎉
                        </h2>
                        <p class="text-xl text-gray-600 mb-8">
                            Siap memulai perjalananmu menuju ASN impian?
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-12">
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all">
                            <div class="text-4xl mb-4">📚</div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Latihan Soal</h3>
                            <p class="text-gray-600 text-sm">Ribuan soal CPNS & PPPK menanti untuk diasah kemampuanmu</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all">
                            <div class="text-4xl mb-4">🎯</div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Tryout Realistis</h3>
                            <p class="text-gray-600 text-sm">Simulasi ujian sesuai format SKD terbaru</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all">
                            <div class="text-4xl mb-4">🏆</div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Ranking & Analisis</h3>
                            <p class="text-gray-600 text-sm">Lihat posisimu dan identifikasi area yang perlu ditingkatkan</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-blue-600 to-orange-600 rounded-2xl p-8 text-white max-w-2xl mx-auto mb-8">
                        <h3 class="text-2xl font-bold mb-4">🚀 Mulai Sekarang!</h3>
                        <p class="mb-6">Jangan tunda lagi! Setiap detik berharga untuk persiapanmu.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('tryouts.index') }}" class="bg-white text-blue-700 hover:bg-gray-100 px-8 py-3 rounded-xl font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-clipboard-check mr-2"></i>Mulai Tryout
                            </a>
                            <a href="{{ route('materis.index') }}" class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-3 rounded-xl font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg border-2 border-white">
                                <i class="fas fa-book mr-2"></i>Lihat Materi
                            </a>
                        </div>
                    </div>

                    <div class="text-gray-500 text-sm">
                        💡 <strong>Tips:</strong> Mulai dengan tryout kategori TWK untuk mengukur kemampuan dasarmu!
                    </div>
                </div>
            @else
                {{-- Normal Dashboard Content --}}

            {{-- Motivational Banner - Belum pernah tryout tapi ada tryout available --}}
            @if($stats['total_tryouts_completed'] === 0 && $recentTryouts->count() > 0)
                <div class="mb-8 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex items-center">
                        <div class="text-6xl mr-6">🎯</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold mb-2">
                                Mulai Perjalananmu! Ada {{ $recentTryouts->count() }} Tryout Menanti 🚀
                            </h3>
                            <p class="text-purple-100 mb-3">
                                Setiap ahli pernah menjadi pemula. Tryout pertamamu adalah langkah awal menuju kesuksesan!
                            </p>
                            <a href="{{ route('tryouts.index') }}" class="inline-block bg-white text-purple-700 hover:bg-purple-50 px-6 py-2 rounded-lg font-bold transition-all duration-200 transform hover:scale-105">
                                Mulai Tryout Pertama <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Banner Premium (jika belum premium) -->
            @if(!$hasPremium)
                <div class="mb-8 bg-gradient-to-r from-blue-600 via-blue-700 to-orange-600 rounded-2xl p-6 text-white shadow-xl">
                    <div class="flex flex-col lg:flex-row items-center justify-between">
                        <div class="flex-1 mb-4 lg:mb-0">
                            <h3 class="text-2xl font-bold mb-2">
                                🔥 Siap Lolos CPNS & PPPK? Buka Akses Premium Sekarang!
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-300 mr-2"></i>
                                    <span>Pembahasan detail semua soal</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-300 mr-2"></i>
                                    <span>Materi terbaru CPNS & PPPK</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-300 mr-2"></i>
                                    <span>File PDF bisa di-download</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-orange-300 mr-2"></i>
                                    <span>Ranking untuk ukur kemampuanmu</span>
                                </div>
                            </div>
                            <p class="mt-3 text-orange-100">💡 1x berlangganan = akses 1 tahun penuh!</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('subscription.premium') }}" class="bg-white text-blue-700 hover:bg-orange-50 px-8 py-3 rounded-xl font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                                Buka Akses Premium
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

            <!-- Progress & Ranking Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Learning Progress -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Progress Belajar
                    </h3>
                    <div class="mb-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm">Completion Rate</span>
                            <span class="text-sm font-bold">{{ $progressData['completion_rate'] }}%</span>
                        </div>
                        <div class="w-full bg-blue-300 rounded-full h-3">
                            <div class="bg-white rounded-full h-3 transition-all duration-500" style="width: {{ $progressData['completion_rate'] }}%"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <div class="text-blue-100">Selesai</div>
                            <div class="text-2xl font-bold">{{ $stats['total_tryouts_completed'] }}</div>
                        </div>
                        <div>
                            <div class="text-blue-100">Tersedia</div>
                            <div class="text-2xl font-bold">{{ $progressData['total_tryouts_available'] }}</div>
                        </div>
                    </div>
                </div>

                <!-- Ranking Position -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-ranking-star mr-2"></i>
                        Peringkat Kamu
                    </h3>
                    <div class="text-center">
                        <div class="text-5xl font-bold mb-2">#{{ $progressData['rank_position'] }}</div>
                        <div class="text-orange-100">dari {{ $progressData['total_users'] }} pengguna</div>
                        @if($progressData['rank_position'] <= 10)
                            <div class="mt-4 bg-white/20 rounded-lg p-2">
                                <div class="text-sm">🏆 Top 10 Leaderboard!</div>
                            </div>
                        @elseif($progressData['rank_position'] <= 50)
                            <div class="mt-4 bg-white/20 rounded-lg p-2">
                                <div class="text-sm">⭐ Top 50 Achiever!</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Achievements -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-medal mr-2"></i>
                        Pencapaian Terbaru
                    </h3>
                    @if(count($progressData['recent_achievements']) > 0)
                        <div class="space-y-2">
                            @foreach($progressData['recent_achievements'] as $achievement)
                                <div class="bg-white/20 rounded-lg p-3">
                                    <div class="flex items-center">
                                        <div class="text-2xl mr-3">{{ $achievement['icon'] }}</div>
                                        <div>
                                            <div class="font-bold text-sm">{{ $achievement['title'] }}</div>
                                            <div class="text-xs text-green-100">{{ $achievement['desc'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6 text-green-100">
                            <i class="fas fa-star text-4xl mb-2"></i>
                            <p class="text-sm">Selesaikan tryout pertama untuk mendapat pencapaian!</p>
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

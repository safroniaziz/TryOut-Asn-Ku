<x-app-layout>

    <!-- Compact Welcome Section - Touch Navbar -->
    <div class="bg-gradient-to-br from-blue-600 via-orange-600 to-blue-700 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
            <div class="text-center text-white">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-3 shadow-xl border border-white/30">
                    <span class="text-3xl">🎯</span>
                </div>
                <h1 class="text-4xl font-black mb-3">
                    Halo, {{ Auth::user()->name }}! 🚀
                </h1>
                <p class="text-xl text-blue-100">
                    Selamat datang di <span class="font-bold text-white">Dashboard Analisis Cerdas</span> Anda
                </p>
            </div>
        </div>
    </div>

    <!-- Spectacular Statistics Section - No Gap -->
    <div class="bg-gradient-to-br from-slate-50 to-gray-100 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-12">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-600 via-orange-600 to-blue-700 rounded-2xl mb-6 shadow-xl transform hover:scale-110 transition-all duration-300">
                    <span class="text-white text-3xl">📊</span>
                </div>
                <h2 class="text-4xl font-black mb-3">
                    <span class="bg-gradient-to-r from-blue-600 via-orange-600 to-blue-700 bg-clip-text text-transparent">
                        Pencapaian Luar Biasa
                    </span>
                    <br>
                    <span class="text-gray-900">Anda</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Monitor progress dan pencapaian belajar Anda secara real-time
                </p>
            </div>

                <!-- Epic Statistics Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
                    <!-- Total Completed Card -->
                    <div class="h-full group">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                        <span class="text-white text-xl">📋</span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        @if($progressData['study_streak'] >= 7)
                                            <div class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full mb-1 animate-pulse">
                                                🔥 {{ $progressData['study_streak'] }}h
                                            </div>
                                        @endif
                                        <div class="text-xs text-gray-500 font-medium">Konsisten</div>
                                    </div>
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="text-4xl font-black text-transparent bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text mb-2 tabular-nums">{{ $stats['total_tryouts_completed'] }}</div>
                                    <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Tryout Selesai</div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-2 rounded-full transition-all duration-1000 ease-out" style="width: {{ min($stats['total_tryouts_completed'] * 10, 100) }}%"></div>
                                    </div>
                                    <div class="text-xs text-gray-500 text-center mt-1 font-medium">{{ min($stats['total_tryouts_completed'] * 10, 100) }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Average Score Card -->
                    <div class="h-full group">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-green-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-all duration-300">
                                        <span class="text-white text-xl">⭐</span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        @if($stats['average_score'] >= 80)
                                            <div class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full mb-1">
                                                ⚡ Tinggi
                                            </div>
                                        @endif
                                        <div class="text-xs text-gray-500 font-medium">Performa</div>
                                    </div>
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="text-4xl font-black text-transparent bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text mb-2 tabular-nums">{{ number_format($stats['average_score'], 1) }}</div>
                                    <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Skor Rata-rata</div>
                                    <div class="flex items-center justify-center space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="text-lg transform hover:scale-110 transition-transform duration-200 {{ $i <= round($stats['average_score'] / 20) ? 'text-yellow-400' : 'text-gray-300' }} drop-shadow-sm">{{ $i <= round($stats['average_score'] / 20) ? '⭐' : '☆' }}</span>
                                        @endfor
                                    </div>
                                    <div class="text-xs text-gray-500 text-center mt-1 font-medium">{{ round($stats['average_score'] / 20) }}/5</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Best Score Card -->
                    <div class="h-full group">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100">
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
                                    @if($stats['best_score'] >= 90)
                                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🏆 Sempurna!
                                        </div>
                                    @elseif($stats['best_score'] >= 80)
                                        <div class="bg-gradient-to-r from-blue-400 to-indigo-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            ⭐ Sangat Baik!
                                        </div>
                                    @else
                                        <div class="text-xs text-gray-500 text-center font-medium bg-gray-50 px-3 py-1 rounded-full">Tingkatkan!</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Global Ranking Card -->
                    <div class="h-full group">
                        <div class="relative h-full">
                            <!-- Glow Effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl blur opacity-0 group-hover:opacity-40 transition duration-500"></div>

                            <!-- Card Content -->
                            <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col border border-gray-100">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                        <span class="text-white text-xl">🥇</span>
                                    </div>
                                    <div class="flex flex-col items-end">
                                        @if($progressData['rank_position'] <= 100)
                                            <div class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full mb-1">
                                                🌟 Top {{ round(($progressData['rank_position'] / $progressData['total_users']) * 100) }}%
                                            </div>
                                        @endif
                                        <div class="text-xs text-gray-500 font-medium">Nasional</div>
                                    </div>
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="text-4xl font-black text-transparent bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text mb-2 tabular-nums">#{{ $progressData['rank_position'] }}</div>
                                    <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-3">Peringkat Global</div>
                                    <div class="text-xs text-gray-500 text-center font-medium mb-1">dari {{ $progressData['total_users'] }} peserta</div>
                                    @if($progressData['rank_position'] <= 10)
                                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs font-bold px-3 py-1 rounded-full text-center shadow-md">
                                            🏆 Elite!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secondary Statistics Row with Consistent Heights -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <!-- Learning Progress Card -->
                    <div class="h-full flex flex-col">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white text-xl">🎓</span>
                                </div>
                                <span class="text-2xl font-bold text-blue-600">{{ $progressData['completion_rate'] }}%</span>
                            </div>
                            <div class="flex-grow flex flex-col">
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Progress Belajar</h3>
                                <div class="space-y-4 flex-grow">
                                    <div>
                                        <div class="flex justify-between text-sm mb-2">
                                            <span class="text-gray-600">Penyelesaian</span>
                                            <span class="font-bold text-blue-600">{{ $stats['total_tryouts_completed'] }}/{{ $progressData['total_tryouts_available'] }}</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full transition-all duration-1000" style="width: {{ $progressData['completion_rate'] }}%"></div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3 mt-auto">
                                        <div class="text-center p-3 bg-blue-50 rounded-lg">
                                            <div class="text-xl font-bold text-blue-600">{{ $stats['total_tryouts_completed'] }}</div>
                                            <div class="text-xs text-gray-600">Selesai</div>
                                        </div>
                                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                                            <div class="text-xl font-bold text-gray-600">{{ $progressData['total_tryouts_available'] - $stats['total_tryouts_completed'] }}</div>
                                            <div class="text-xs text-gray-600">Tersisa</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Study Streak Card -->
                    <div class="h-full flex flex-col">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white text-xl">🔥</span>
                                </div>
                                <span class="text-2xl font-bold text-orange-600">{{ $progressData['study_streak'] }}</span>
                            </div>
                            <div class="flex-grow flex flex-col">
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Streak Belajar</h3>
                                <div class="flex-grow flex items-center justify-center">
                                    @if($progressData['study_streak'] >= 30)
                                        <div class="bg-gradient-to-r from-orange-100 to-red-100 rounded-xl p-4 text-center w-full">
                                            <div class="text-3xl mb-2">🔥</div>
                                            <div class="font-bold text-orange-700">30+ Hari Konsisten!</div>
                                            <div class="text-xs text-orange-600">Performa luar biasa</div>
                                        </div>
                                    @elseif($progressData['study_streak'] >= 14)
                                        <div class="bg-gradient-to-r from-yellow-100 to-orange-100 rounded-xl p-4 text-center w-full">
                                            <div class="text-3xl mb-2">⭐</div>
                                            <div class="font-bold text-yellow-700">2 Minggu Beruntun!</div>
                                            <div class="text-xs text-yellow-600">Mengesankan</div>
                                        </div>
                                    @elseif($progressData['study_streak'] >= 7)
                                        <div class="bg-gradient-to-r from-blue-100 to-indigo-100 rounded-xl p-4 text-center w-full">
                                            <div class="text-3xl mb-2">💪</div>
                                            <div class="font-bold text-blue-700">1 Minggu Konsisten!</div>
                                            <div class="text-xs text-blue-600">Bagus!</div>
                                        </div>
                                    @else
                                        <div class="bg-gray-50 rounded-xl p-4 text-center w-full">
                                            <div class="text-3xl mb-2">🎯</div>
                                            <div class="font-bold text-gray-700">Mulai Hari Ini</div>
                                            <div class="text-xs text-gray-600">Bangun streak Anda</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Achievements Card -->
                    <div class="h-full flex flex-col">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white text-xl">🏅</span>
                                </div>
                                <span class="text-xs font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">
                                    {{ count($progressData['recent_achievements']) }} Prestasi
                                </span>
                            </div>
                            <div class="flex-grow flex flex-col">
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Pencapaian Terbaru</h3>
                                <div class="flex-grow">
                                    @if(count($progressData['recent_achievements']) > 0)
                                        <div class="space-y-3">
                                            @foreach($progressData['recent_achievements'] as $achievement)
                                                <div class="group bg-gradient-to-r from-yellow-50 to-amber-50 rounded-lg p-3 border border-yellow-200 hover:shadow-md transition-all duration-300 hover:from-yellow-100 hover:to-amber-100 relative overflow-hidden">
                                                    <!-- Hover effect -->
                                                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/10 to-amber-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                    <div class="flex items-center relative z-10">
                                                        <div class="text-xl mr-3 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12">{{ $achievement['icon'] }}</div>
                                                        <div class="flex-1">
                                                            <div class="font-bold text-sm text-gray-900 group-hover:text-yellow-700 transition-colors duration-300">{{ $achievement['title'] }}</div>
                                                            <div class="text-xs text-gray-600">{{ $achievement['desc'] }}</div>
                                                        </div>
                                                        <!-- Animated badge -->
                                                        <div class="ml-auto">
                                                            <div class="w-2 h-2 bg-yellow-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-opacity duration-300"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Progress bar -->
                                                    <div class="absolute bottom-0 left-0 h-0.5 bg-gradient-to-r from-yellow-400 to-amber-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-6 flex flex-col justify-center h-full">
                                            <div class="text-4xl mb-3">🎯</div>
                                            <p class="text-sm font-bold text-gray-700">Selesaikan tryout pertama</p>
                                            <p class="text-xs text-gray-500">untuk mendapat pencapaian!</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Container - No Gap -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4 -mt-8">
        <!-- Full Width Activities Section -->
        @if($userTryouts->count() > 0)
        <div class="bg-gradient-to-br from-orange-50 to-amber-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="section mb-12">
                    <div class="section-header mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-history text-white text-lg"></i>
                            </div>
                            Aktivitas Terakhir
                        </h3>
                        <p class="text-gray-600 text-lg mt-2">Riwayat tryout yang telah Anda kerjakan</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
                        @foreach($userTryouts as $leaderboard)
                            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900 text-lg mb-2">{{ $leaderboard->tryout->title }}</h4>
                                        <div class="flex items-center space-x-3 text-sm text-gray-600 mb-3">
                                            <span class="flex items-center">
                                                <i class="fas fa-tag mr-1 text-blue-500"></i>
                                                {{ $leaderboard->tryout->type }}
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-layer-group mr-1 text-purple-500"></i>
                                                {{ $leaderboard->tryout->kategori }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                            {{ number_format($leaderboard->persentase, 1) }}%
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $leaderboard->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-3 mb-3">
                                    <div class="text-center p-2 bg-blue-50 rounded-lg">
                                        <div class="text-lg font-bold text-blue-600">{{ $leaderboard->total_skor }}</div>
                                        <div class="text-xs text-gray-600">Skor</div>
                                    </div>
                                    <div class="text-center p-2 bg-green-50 rounded-lg">
                                        <div class="text-lg font-bold text-green-600">{{ $leaderboard->benar }}</div>
                                        <div class="text-xs text-gray-600">Benar</div>
                                    </div>
                                    <div class="text-center p-2 bg-purple-50 rounded-lg">
                                        <div class="text-lg font-bold text-purple-600">#{{ $leaderboard->rank ?? '-' }}</div>
                                        <div class="text-xs text-gray-600">Ranking</div>
                                    </div>
                                </div>

                                <a href="{{ route('tryouts.show', $leaderboard->tryout) }}"
                                   class="w-full bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-all duration-300 text-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    Lihat Detail
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Premium Package Sections -->
            @if($targetTest === 'both')
                <!-- CPNS Section -->
                </div>
            </div>

            <!-- Full Width CPNS Section - No Gap -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 -mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                    <div x-data="{ activeTab: 'all' }" class="mb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                                <button @click="activeTab = 'all'"
                                        :class="activeTab === 'all' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Semua
                                </button>
                                <button @click="activeTab = 'SKD'"
                                        :class="activeTab === 'SKD' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-file-alt mr-2"></i>SKD
                                </button>
                                <button @click="activeTab = 'SKB'"
                                        :class="activeTab === 'SKB' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
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
                    <div x-show="activeTab === 'all'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
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
                                        <p class="text-blue-100 text-sm">{{ count($package['category_names']) }} Kategori • {{ implode(', ', array_slice($package['category_names'], 0, 2)) }}{{ count($package['category_names']) > 2 ? '...' : '' }}</p>
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
                                            <div class="text-center p-2 bg-blue-50 rounded-lg">
                                                <div class="text-lg font-bold text-blue-600">
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
                                            <div class="mt-auto">
                                                <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                                <div class="space-y-2">
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
                                            <span class="text-xs text-gray-500">
                                                {{ $package['tryouts']->first()->created_at->format('M Y') }}
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
                                            <a href="{{ route('tryouts.index') }}?package={{ urlencode($package['name']) }}&type={{ request()->segment(1) ?? 'cpns' }}"
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
                            <div x-show="activeTab === 'SKD'" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-y-4"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
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
                                        <p class="text-blue-100 text-sm">{{ count($package['category_names']) }} Kategori • {{ implode(', ', array_slice($package['category_names'], 0, 2)) }}{{ count($package['category_names']) > 2 ? '...' : '' }}</p>
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
                                            <div class="text-center p-2 bg-blue-50 rounded-lg">
                                                <div class="text-lg font-bold text-blue-600">
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
                                            <span class="text-xs text-gray-500">
                                                {{ $package['tryouts']->first()->created_at->format('M Y') }}
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
                                            <a href="{{ route('tryouts.index') }}?package={{ urlencode($package['name']) }}&type={{ request()->segment(1) ?? 'cpns' }}"
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
                            <div x-show="activeTab === 'SKB'" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-y-4"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
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
                                        <p class="text-blue-100 text-sm">{{ count($package['category_names']) }} Kategori • {{ implode(', ', array_slice($package['category_names'], 0, 2)) }}{{ count($package['category_names']) > 2 ? '...' : '' }}</p>
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
                                            <div class="text-center p-2 bg-blue-50 rounded-lg">
                                                <div class="text-lg font-bold text-blue-600">
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
                                            <span class="text-xs text-gray-500">
                                                {{ $package['tryouts']->first()->created_at->format('M Y') }}
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
                                            <a href="{{ route('tryouts.index') }}?package={{ urlencode($package['name']) }}&type={{ request()->segment(1) ?? 'cpns' }}"
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
                        </div>
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
            <div class="bg-gradient-to-br from-emerald-50 to-green-50 -mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                    <div x-data="{ activeTab: 'all' }" class="mb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                                <button @click="activeTab = 'all'"
                                        :class="activeTab === 'all' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Semua
                                </button>
                                <button @click="activeTab = 'Non-Teknis'"
                                        :class="activeTab === 'Non-Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-users mr-2"></i>Non-Teknis
                                </button>
                                <button @click="activeTab = 'Teknis'"
                                        :class="activeTab === 'Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-cog mr-2"></i>Teknis
                                </button>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="mt-10">
                            <!-- All Tab -->
                            <div x-show="activeTab === 'all'" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-y-4"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
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
                                            <div class="mt-auto">
                                                <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                                <div class="space-y-2">
                                                    @if(!empty($package['category_details']))
                                                        @foreach($package['category_details'] as $category)
                                                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                                                                <div class="flex items-center">
                                                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></div>
                                                                    <span class="text-xs font-semibold text-gray-700">{{ $category['name'] }}</span>
                                                                </div>
                                                                <div class="flex items-center space-x-2">
                                                                    <span class="text-xs font-bold text-emerald-600">{{ $category['question_count'] }} soal</span>
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
                                            <span class="text-xs text-gray-500">
                                                {{ $package['tryouts']->first()->created_at->format('M Y') }}
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
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-200 text-center shadow-md hover:shadow-lg space-x-3">
                                                <i class="fas fa-crown text-yellow-300"></i>
                                                <span>Upgrade Premium</span>
                                                <i class="fas fa-arrow-right"></i>
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
                            <div x-show="activeTab === 'Non-Teknis'" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-y-4"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="col-span-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
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

                                        <!-- Test Categories Detail -->
                                        <div class="mt-auto">
                                            <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                            <div class="space-y-2">
                                                @if(!empty($package['category_details']))
                                                    @foreach($package['category_details'] as $category)
                                                        <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                                                            <div class="flex items-center">
                                                                <div class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></div>
                                                                <span class="text-xs font-semibold text-gray-700">{{ $category['name'] }}</span>
                                                            </div>
                                                            <div class="flex items-center space-x-2">
                                                                <span class="text-xs font-bold text-emerald-600">{{ $category['question_count'] }} soal</span>
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

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500">
                                                {{ $package['tryouts']->first()->created_at->format('M Y') }}
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
                                               class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-4 px-6 rounded-xl transition-colors duration-200 text-center shadow-md hover:shadow-lg space-x-3">
                                                <i class="fas fa-crown text-yellow-300"></i>
                                                <span>Upgrade Premium</span>
                                                <i class="fas fa-arrow-right"></i>
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
                        </div>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
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
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
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

</x-app-layout>

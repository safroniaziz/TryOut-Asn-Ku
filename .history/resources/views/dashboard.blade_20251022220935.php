<x-app-layout>

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

        </div>
    </div>

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
                        @php($latestTryout = $userTryouts->first())
                        @php($totalSoal = $latestTryout->benar + $latestTryout->salah + $latestTryout->tidak_dijawab)
                        @php($tryout = $latestTryout->tryout)

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
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl !text-gray-900">
                    <i class="fas fa-chart-line mr-3 !text-blue-600"></i>Dashboard Analytics
                </h2>
                <p class="!text-gray-600 mt-2 font-medium">Halo, <span class="!text-blue-600 font-bold">{{ Auth::user()->name }}</span> 👋 Pantau progress dan raih target impianmu!</p>
            </div>
            @if(!$hasPremium)
                <a href="{{ route('subscription.premium') }}" class="group relative !bg-gradient-to-r !from-orange-500 !to-orange-600 hover:!from-orange-600 hover:!to-orange-700 !text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-2xl">
                    <span class="relative flex items-center">
                        <i class="fas fa-crown mr-2"></i>
                        Upgrade Premium
                        <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Premium Statistics Cards with Blue-Orange Theme --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 animate-fade-in-up">
                {{-- TryOut Completed Card --}}
                <div class="group relative bg-gradient-to-br from-blue-50 to-blue-100 backdrop-blur-xl rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-blue-200/50 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-400 rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 !bg-blue-600 rounded-2xl shadow-lg">
                                <i class="fas fa-clipboard-check !text-white text-2xl"></i>
                            </div>
                            @if($stats['total_tryouts_completed'] > 0)
                                <span class="px-3 py-1 !bg-green-500 !text-white rounded-full text-xs font-bold">Active</span>
                            @endif
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm font-semibold !text-gray-600">TryOut Selesai</p>
                            <p class="text-4xl font-black !text-gray-900">{{ $stats['total_tryouts_completed'] }}</p>
                            @if($progressData['total_tryouts_available'] > 0)
                                <div class="flex items-center space-x-2">
                                    <div class="flex-1 !bg-gray-200 rounded-full h-2.5 overflow-hidden">
                                        <div class="!bg-gradient-to-r !from-blue-500 !to-blue-700 h-full rounded-full transition-all duration-1000" style="width: {{ $progressData['completion_rate'] }}%"></div>
                                    </div>
                                    <span class="text-xs font-bold !text-blue-600">{{ number_format($progressData['completion_rate'], 0) }}%</span>
                                </div>
                                <p class="text-xs !text-gray-500 mt-1">dari {{ $progressData['total_tryouts_available'] }} tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Average Score Card --}}
                <div class="group relative bg-gradient-to-br from-orange-50 to-orange-100 backdrop-blur-xl rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-orange-200/50 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-400 rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 !bg-orange-600 rounded-2xl shadow-lg">
                                <i class="fas fa-chart-line !text-white text-2xl"></i>
                            </div>
                            @if($stats['average_score'] >= 80)
                                <span class="px-3 py-1 !bg-green-500 !text-white rounded-full text-xs font-bold flex items-center">
                                    <i class="fas fa-star !text-yellow-300 mr-1"></i> Excellent
                                </span>
                            @endif
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm font-semibold !text-gray-600">Rata-rata Skor</p>
                            <p class="text-4xl font-black !text-gray-900">{{ number_format($stats['average_score'], 1) }}</p>
                            <div class="flex items-center space-x-1 mt-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($stats['average_score'] >= $i * 20)
                                        <i class="fas fa-star !text-yellow-400 text-sm"></i>
                                    @else
                                        <i class="far fa-star !text-gray-300 text-sm"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-xs font-bold !text-orange-600 mt-1">
                                @if($stats['average_score'] >= 80)
                                    🎯 Outstanding!
                                @elseif($stats['average_score'] >= 60)
                                    👍 Good Progress
                                @elseif($stats['average_score'] > 0)
                                    💪 Keep Pushing
                                @else
                                    🚀 Start Journey
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Best Score Card --}}
                <div class="group relative bg-gradient-to-br from-amber-50 to-yellow-100 backdrop-blur-xl rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-amber-200/50 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-400 rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 !bg-amber-500 rounded-2xl shadow-lg">
                                <i class="fas fa-trophy !text-white text-2xl"></i>
                            </div>
                            @if($stats['best_score'] >= 90)
                                <span class="px-3 py-1 !bg-yellow-500 !text-gray-900 rounded-full text-xs font-bold flex items-center">
                                    <i class="fas fa-crown !text-gray-900 mr-1"></i> Top Score
                                </span>
                            @endif
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm font-semibold !text-gray-600">Skor Terbaik</p>
                            <p class="text-4xl font-black !text-gray-900">{{ $stats['best_score'] }}</p>
                            <p class="text-sm font-bold !text-amber-700 mt-2">
                                @if($stats['best_score'] >= 95)
                                    🏆 Perfect Score!
                                @elseif($stats['best_score'] >= 90)
                                    ⭐ Almost Perfect!
                                @elseif($stats['best_score'] >= 80)
                                    🎯 Excellent Work!
                                @elseif($stats['best_score'] > 0)
                                    💫 Keep Improving!
                                @else
                                    <span class="!text-gray-900">🎮 Start Playing!</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Study Streak Card - BLUE THEME --}}
                <div class="group relative !bg-gradient-to-br !from-blue-50 !to-sky-100 backdrop-blur-xl rounded-3xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border !border-blue-200/50 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 !bg-blue-400 rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 !bg-blue-600 rounded-2xl shadow-lg">
                                <i class="fas fa-fire !text-white text-2xl"></i>
                            </div>
                            @if($progressData['study_streak'] >= 7)
                                <span class="px-3 py-1 !bg-orange-500 !text-white rounded-full text-xs font-bold flex items-center">
                                    <i class="fas fa-bolt mr-1"></i> On Fire!
                                </span>
                            @endif
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm font-semibold !text-gray-600">Streak Belajar</p>
                            <p class="text-4xl font-black !text-gray-900">{{ $progressData['study_streak'] }}</p>
                            <p class="text-sm font-bold !text-blue-700 mt-2">
                                @if($progressData['study_streak'] >= 30)
                                    🔥 Unstoppable!
                                @elseif($progressData['study_streak'] >= 14)
                                    🌟 Two Weeks!
                                @elseif($progressData['study_streak'] >= 7)
                                    💪 One Week!
                                @elseif($progressData['study_streak'] > 0)
                                    ⚡ Keep Going!
                                @else
                                    🎯 Start Today!
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Empty State - Belum ada aktivitas --}}
            @if($stats['total_tryouts_completed'] == 0 && $recentTryouts->count() == 0)
                <div class="relative overflow-hidden">
                    {{-- Animated Background Shapes --}}
                    <div class="absolute inset-0 overflow-hidden pointer-events-none">
                        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl animate-pulse"></div>
                        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-orange-400/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl animate-pulse delay-2000"></div>
                    </div>

                    <div class="relative text-center py-20">
                        {{-- Hero Section with Animation --}}
                        <div class="mb-12 animate-fade-in-up">
                            <div class="inline-flex items-center justify-center w-40 h-40 !bg-gradient-to-br !from-blue-600 !to-orange-600 rounded-full mb-8 animate-float shadow-2xl">
                                <i class="fas fa-rocket text-7xl !text-white transform rotate-45"></i>
                            </div>
                            <h2 class="text-5xl md:text-6xl font-black !text-gray-900 mb-6">
                                Selamat Datang, {{ Auth::user()->name }}! 🎉
                            </h2>
                            <p class="text-2xl !text-gray-700 mb-4 font-semibold">
                                Siap memulai perjalananmu menuju ASN impian?
                            </p>
                            <p class="text-lg !text-gray-500 max-w-2xl mx-auto">
                                Platform terlengkap untuk persiapan CPNS & PPPK dengan ribuan soal dan pembahasan detail
                            </p>
                        </div>

                        {{-- Feature Cards with Hover Effects --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-16">
                            <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-blue-400 animate-fade-in-up delay-100">
                                <div class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-300">📚</div>
                                <h3 class="font-bold text-2xl text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">Latihan Soal</h3>
                                <p class="text-gray-600">Ribuan soal CPNS & PPPK dengan tingkat kesulitan bervariasi untuk mengasah kemampuanmu</p>
                                <div class="mt-4 flex items-center justify-center text-blue-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span>Mulai Latihan</span>
                                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                                </div>
                            </div>

                            <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-purple-400 animate-fade-in-up delay-200">
                                <div class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-300">🎯</div>
                                <h3 class="font-bold text-2xl text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">Tryout Realistis</h3>
                                <p class="text-gray-600">Simulasi ujian sesuai format SKD terbaru dengan sistem penilaian yang akurat</p>
                                <div class="mt-4 flex items-center justify-center text-purple-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span>Coba Tryout</span>
                                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                                </div>
                            </div>

                            <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-orange-400 animate-fade-in-up delay-300">
                                <div class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-300">🏆</div>
                                <h3 class="font-bold text-2xl text-gray-900 mb-3 group-hover:text-orange-600 transition-colors">Ranking & Analisis</h3>
                                <p class="text-gray-600">Lihat peringkatmu dan identifikasi area yang perlu ditingkatkan dengan analisis mendalam</p>
                                <div class="mt-4 flex items-center justify-center text-orange-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span>Lihat Ranking</span>
                                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Section with Blue-Orange Theme & Clear Spacing --}}
                        <div class="relative max-w-4xl mx-auto mb-12 animate-fade-in-up delay-400">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-orange-600 rounded-3xl blur-lg opacity-50 animate-pulse"></div>
                            <div class="relative !bg-gradient-to-r !from-blue-600 !via-indigo-700 !to-orange-600 rounded-3xl p-10 !text-white shadow-2xl space-y-8">
                                {{-- Header --}}
                                <div class="flex items-center justify-center">
                                    <div class="w-16 h-16 !bg-white/20 rounded-full flex items-center justify-center animate-bounce">
                                        <i class="fas fa-fire text-4xl !text-white"></i>
                                    </div>
                                </div>

                                <div class="text-center space-y-4">
                                    <h3 class="text-4xl font-black !text-white">🚀 Mulai Petualanganmu Sekarang!</h3>
                                    <p class="text-xl !text-white">Jangan tunda lagi! Setiap detik yang kamu manfaatkan adalah investasi untuk masa depanmu.</p>
                                </div>

                                {{-- CTA Buttons with Clear Spacing --}}
                                <div class="flex flex-col sm:flex-row gap-6 justify-center pt-4">
                                    <a href="{{ route('tryouts.index') }}" class="group relative !bg-white !text-blue-700 hover:!bg-blue-50 px-10 py-4 rounded-2xl font-bold text-xl transition-all duration-300 transform hover:scale-105 shadow-2xl overflow-hidden">
                                        <span class="absolute inset-0 !bg-gradient-to-r !from-blue-400 !to-orange-400 opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                        <span class="relative flex items-center justify-center">
                                            <i class="fas fa-clipboard-check mr-3 text-2xl"></i>
                                            Mulai Tryout
                                            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform"></i>
                                        </span>
                                    </a>
                                    <a href="{{ route('materis.index') }}" class="group relative !bg-white/10 hover:!bg-white/20 !text-white px-10 py-4 rounded-2xl font-bold text-xl transition-all duration-300 transform hover:scale-105 shadow-2xl border-2 border-white/50 hover:border-white overflow-hidden backdrop-blur-sm">
                                        <span class="relative flex items-center justify-center">
                                            <i class="fas fa-book mr-3 text-2xl"></i>
                                            Pelajari Materi
                                            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform"></i>
                                        </span>
                                    </a>
                                </div>

                                {{-- Stats Preview with Proper Spacing --}}
                                <div class="grid grid-cols-3 gap-6 pt-8 border-t border-white/30">
                                    <div class="text-center">
                                        <div class="text-3xl font-black mb-2 !text-white">5000+</div>
                                        <div class="text-sm !text-white/90">Soal Tersedia</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-3xl font-black mb-2 !text-white">1000+</div>
                                        <div class="text-sm !text-white/90">Pengguna Aktif</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-3xl font-black mb-2 !text-white">95%</div>
                                        <div class="text-sm !text-white/90">Tingkat Kepuasan</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tips Box with Visible Lightbulb Icon --}}
                        <div class="max-w-2xl mx-auto !bg-gradient-to-r !from-yellow-50 !to-amber-100 border-l-4 border-yellow-500 rounded-xl p-8 shadow-lg animate-fade-in-up delay-500">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 !bg-yellow-500 rounded-full flex items-center justify-center shadow-lg">
                                        <i class="fas fa-lightbulb !text-white text-2xl"></i>
                                    </div>
                                </div>
                                <div class="text-left space-y-2">
                                    <h4 class="text-xl font-bold !text-gray-900">💡 Tips Pro dari Kami</h4>
                                    <p class="!text-gray-700 leading-relaxed">Mulai dengan tryout kategori <strong>TWK (Tes Wawasan Kebangsaan)</strong> untuk mengukur kemampuan dasarmu. Lalu lanjut ke TIU dan TKP untuk persiapan maksimal!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Normal Dashboard Content --}}

            {{-- Motivational Banner - Blue-Orange Theme --}}
            @if($stats['total_tryouts_completed'] == 0 && $recentTryouts->count() > 0)
                <div class="mb-8 !bg-gradient-to-r !from-blue-600 !via-indigo-600 !to-orange-600 rounded-2xl p-8 !text-white shadow-xl">
                    <div class="flex items-center space-x-6">
                        <div class="text-6xl">🎯</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold mb-2 !text-white">
                                Mulai Perjalananmu! Ada {{ $recentTryouts->count() }} Tryout Menanti 🚀
                            </h3>
                            <p class="!text-blue-100 mb-3">
                                Setiap ahli pernah menjadi pemula. Tryout pertamamu adalah langkah awal menuju kesuksesan!
                            </p>
                            <a href="{{ route('tryouts.index') }}" class="inline-block !bg-white !text-blue-700 hover:!bg-blue-50 px-6 py-3 rounded-lg font-bold transition-all duration-200 transform hover:scale-105 shadow-lg">
                                Mulai Tryout Pertama <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Banner Premium (Blue-Orange Theme) -->
            @if(!$hasPremium)
                <div class="mb-8 !bg-gradient-to-r !from-blue-600 !via-blue-700 !to-orange-600 rounded-2xl p-8 !text-white shadow-xl">
                    <div class="flex flex-col lg:flex-row items-center justify-between">
                        <div class="flex-1 mb-4 lg:mb-0">
                            <h3 class="text-2xl font-bold mb-4 !text-white">
                                🔥 Siap Lolos CPNS & PPPK? Buka Akses Premium Sekarang!
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle !text-orange-300 mr-2"></i>
                                    <span class="!text-white">Pembahasan detail semua soal</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle !text-orange-300 mr-2"></i>
                                    <span class="!text-white">Materi terbaru CPNS & PPPK</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle !text-orange-300 mr-2"></i>
                                    <span class="!text-white">File PDF bisa di-download</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle !text-orange-300 mr-2"></i>
                                    <span class="!text-white">Ranking untuk ukur kemampuanmu</span>
                                </div>
                            </div>
                            <p class="mt-4 !text-orange-100 font-bold">💡 1x berlangganan = akses 1 tahun penuh!</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('subscription.premium') }}" class="!bg-white !text-blue-700 hover:!bg-orange-50 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
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

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

</x-app-layout>

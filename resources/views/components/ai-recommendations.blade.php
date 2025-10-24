
    <!-- Study Challenges -->
    @if(isset($aiRecommendations['gamification_challenges']) && count($aiRecommendations['gamification_challenges']) > 0)
        <div class="bg-white rounded-3xl border border-gray-200/50 shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 px-8 py-8">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <i class="fas fa-target text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-2">🎯 Tantangan Belajar</h3>
                        <p class="text-white/90 text-lg">Selesaikan tantangan dan dapatkan cashback!</p>
                    </div>
                </div>
            </div>

            <!-- Challenges Grid -->
            <div class="p-8 bg-gradient-to-br from-blue-50 to-indigo-50">
                <!-- Achievement System Info Alert -->
                <div class="bg-gradient-to-r from-purple-100 to-pink-100 rounded-xl p-4 mb-8 border border-purple-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-trophy text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h5 class="font-bold text-purple-900 text-sm mb-1">🏆 Sistem Achievement Personal</h5>
                            <p class="text-purple-700 text-xs">
                                <strong>10 Paket Achievement</strong> yang disesuaikan dengan level Anda.
                                Setiap paket berisi <strong>15 soal (5 TIU + 5 TWK + 5 TKP)</strong> dengan kriteria
                                <strong>minimal 12 benar, maksimal 1 salah per kategori</strong>.
                                Selesaikan paket 3, 6, dan 10 untuk mendapatkan <strong>cashback Rp 5.000</strong> masing-masing!
                                <br><br>
                                <span class="text-purple-800 font-semibold">💰 Cashback akan ditambahkan ke saldo Anda dan bisa di-claim kapanpun!</span>
                                <br><br>
                                <span class="text-red-600 font-bold">🔒 Syarat: Harus Upgrade Premium untuk mengerjakan tantangan dan mendapatkan achievement!</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($aiRecommendations['gamification_challenges'] as $challenge)
                        <div class="group relative">
                            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 h-full flex flex-col">
                                <!-- Header -->
                                    <div class="flex items-center justify-between mb-6">
                                    <span class="px-4 py-2 text-sm font-bold rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
                                        Paket {{ $challenge['package_number'] ?? 1 }}
                                    </span>
                                    <div class="flex items-center text-lg font-bold text-green-600">
                                        <i class="fas fa-coins mr-2"></i>
                                        @if(($challenge['cashback'] ?? 0) > 0)
                                            Rp {{ number_format($challenge['cashback'], 0, ',', '.') }}
                                        @else
                                            Badge Only
                                        @endif
                                    </div>
                                </div>

                                @if(($challenge['cashback'] ?? 0) > 0)
                                <!-- Cashback Info -->
                                <div class="mb-4 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200">
                                    <div class="flex items-center text-sm text-green-700">
                                        <i class="fas fa-wallet mr-2 text-green-600"></i>
                                        <span class="font-medium">Cashback akan ditambahkan ke saldo Anda dan bisa di-claim kapanpun!</span>
                                    </div>
                                </div>
                                @endif

                                <h5 class="text-xl font-bold text-gray-900 mb-4">{{ $challenge['title'] }}</h5>
                                <p class="text-gray-600 text-base mb-6 leading-relaxed">{{ $challenge['description'] }}</p>

                                <!-- Status -->
                                <div class="mb-6">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <i class="fas fa-clock text-blue-500 mr-2"></i>
                                                <span class="font-bold text-blue-800">Belum Dikerjakan</span>
                                            </div>
                                            <div class="flex items-center text-blue-600">
                                                <i class="fas fa-play mr-1"></i>
                                                Mulai Sekarang
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Badge & Requirements Info -->
                                <div class="mb-6">
                                    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-4 border border-yellow-200">
                                        <div class="flex items-center mb-3">
                                            <i class="fas fa-medal mr-2 text-yellow-500"></i>
                                            <span class="font-bold text-yellow-800">{{ $challenge['badge_name'] ?? 'Achievement Badge' }}</span>
                                        </div>
                                        <p class="text-sm text-yellow-700 mb-3">{{ $challenge['badge_description'] ?? 'Deskripsi badge' }}</p>

                                        <!-- Requirements -->
                                        <div class="grid grid-cols-3 gap-2 text-xs">
                                            <div class="text-center bg-white rounded-lg p-2">
                                                <div class="font-bold text-blue-600">{{ $challenge['questions']['tiu'] ?? 5 }}</div>
                                                <div class="text-gray-600">TIU</div>
                                            </div>
                                            <div class="text-center bg-white rounded-lg p-2">
                                                <div class="font-bold text-green-600">{{ $challenge['questions']['twk'] ?? 5 }}</div>
                                                <div class="text-gray-600">TWK</div>
                                            </div>
                                            <div class="text-center bg-white rounded-lg p-2">
                                                <div class="font-bold text-purple-600">{{ $challenge['questions']['tkp'] ?? 5 }}</div>
                                                <div class="text-gray-600">TKP</div>
                                            </div>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <span class="text-xs font-medium text-gray-600">
                                                Minimal {{ $challenge['min_correct'] ?? 12 }}/{{ $challenge['total_questions'] ?? 15 }} benar
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="mt-auto">
                                    <button class="w-full px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                        <i class="fas fa-play mr-3"></i>
                                        Mulai Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

</div>

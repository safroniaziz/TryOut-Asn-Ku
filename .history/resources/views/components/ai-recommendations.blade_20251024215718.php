<!-- AI Recommendations Component - Clean & Elegant Design -->
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Smart Recommendation Alert -->
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-2xl p-6 shadow-xl border border-purple-200">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fas fa-brain text-white text-xl"></i>
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-bold text-white mb-3">🧠 Rekomendasi Cerdas Personal</h3>
                <div class="text-white/90 text-sm space-y-2">
                    <p><strong>📊 Dari mana rekomendasi ini?</strong> Berdasarkan analisis mendalam terhadap <span class="font-bold">{{ auth()->user()->leaderboards()->count() }}</span> tryout yang telah Anda kerjakan, kami menganalisis pola belajar, performa, dan preferensi Anda.</p>

                    <p><strong>⚙️ Metode yang digunakan:</strong> Sistem rekomendasi cerdas menggunakan <span class="font-bold">statistical analysis</span> dan <span class="font-bold">pattern recognition</span> untuk mengidentifikasi gaya belajar unik Anda dan area yang perlu ditingkatkan.</p>

                    <p><strong>🎯 Mengapa ini keren?</strong> Setiap rekomendasi disesuaikan dengan level kemampuan, gaya belajar, dan pola performa Anda. Tidak ada rekomendasi yang sama - semuanya personal dan relevan!</p>

                    <div class="mt-4 p-4 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                        <p class="text-sm font-medium text-white mb-2">💡 <strong>Fakta Menarik:</strong></p>
                        <p class="text-xs text-white/80">Sistem menganalisis {{ auth()->user()->leaderboards()->count() > 0 ? 'rata-rata ' . number_format(auth()->user()->leaderboards()->avg('total_skor'), 1) : '0' }} skor Anda, {{ auth()->user()->leaderboards()->count() > 0 ? 'waktu pengerjaan ' . number_format(auth()->user()->leaderboards()->avg('waktu_pengerjaan_detik') / 60, 1) . ' menit per soal' : 'dan pola belajar' }} untuk memberikan rekomendasi yang tepat sasaran.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Personalized Study Plan -->
    @if(isset($aiRecommendations['personalized_plan']))
        <div class="bg-white rounded-3xl border border-gray-200/50 shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 via-cyan-500 to-teal-500 px-8 py-8">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-2">📚 Rencana Belajar Anda</h3>
                        <p class="text-white/90 text-lg">Strategi belajar yang disesuaikan dengan performa Anda</p>
                    </div>
                </div>
            </div>

            <!-- Study Schedule Dashboard -->
            <div class="p-8 bg-gradient-to-br from-blue-50 to-cyan-50">
                <!-- Personalization Info Alert -->
                <div class="bg-gradient-to-r from-blue-100 to-cyan-100 rounded-xl p-4 mb-6 border border-blue-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-cog text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h5 class="font-bold text-blue-900 text-sm mb-1">🎯 Rekomendasi Personal untuk Anda</h5>
                            <p class="text-blue-700 text-xs">
                                Berdasarkan analisis <strong>{{ auth()->user()->leaderboards()->count() }} tryout</strong> Anda,
                                sistem mendeteksi gaya belajar <strong>{{ ucfirst(str_replace('_', ' ', $aiRecommendations['personalized_plan']['learning_style'] ?? 'balanced')) }}</strong>
                                dengan performa rata-rata <strong>{{ number_format(auth()->user()->leaderboards()->avg('total_skor') ?? 0, 1) }} poin</strong>.
                                Setiap user mendapat rekomendasi yang berbeda!
                            </p>
                        </div>
                    </div>
                </div>

                <h4 class="text-xl font-bold text-gray-900 mb-8 text-center">💡 Rekomendasi Belajar</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Weekly Hours -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg border border-blue-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-white text-2xl"></i>
                        </div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ $aiRecommendations['personalized_plan']['schedule']['weekly_hours'] }}</div>
                        <div class="text-sm text-gray-600 font-medium mb-2">Jam per Minggu</div>
                        <div class="px-3 py-1 text-xs font-semibold rounded-full {{
                            $aiRecommendations['personalized_plan']['schedule']['weekly_hours'] >= 12 ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700'
                        }}">
                            {{ $aiRecommendations['personalized_plan']['schedule']['weekly_hours'] >= 12 ? 'Intensif' : 'Normal' }}
                        </div>
                    </div>

                    <!-- Daily Sessions -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg border border-green-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-day text-white text-2xl"></i>
                        </div>
                        <div class="text-4xl font-bold text-green-600 mb-2">{{ $aiRecommendations['personalized_plan']['schedule']['daily_sessions'] }}</div>
                        <div class="text-sm text-gray-600 font-medium mb-2">Sesi per Hari</div>
                        <div class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                            Konsisten
                        </div>
                    </div>

                    <!-- Peak Time -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg border border-purple-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-sun text-white text-2xl"></i>
                        </div>
                        <div class="text-2xl font-bold text-purple-600 mb-2">{{ ucfirst($aiRecommendations['personalized_plan']['schedule']['optimal_time']) }}</div>
                        <div class="text-sm text-gray-600 font-medium mb-2">Waktu Terbaik</div>
                        <div class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">
                            Fokus Maksimal
                        </div>
                    </div>

                    <!-- Session Length -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-lg border border-orange-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-stopwatch text-white text-2xl"></i>
                        </div>
                        <div class="text-2xl font-bold text-orange-600 mb-2">{{ $aiRecommendations['personalized_plan']['schedule']['session_length'] }}</div>
                        <div class="text-sm text-gray-600 font-medium mb-2">Durasi Sesi</div>
                        <div class="px-3 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-700">
                            Optimal
                        </div>
                    </div>
                </div>

                <!-- Focus Areas -->
                @if(isset($aiRecommendations['personalized_plan']['focus_areas']) && count($aiRecommendations['personalized_plan']['focus_areas']) > 0)
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-crosshairs text-red-500 mr-3"></i>
                            🎯 Fokus Utama Anda
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($aiRecommendations['personalized_plan']['focus_areas'] as $area)
                                <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center">
                                            <h5 class="text-lg font-semibold text-gray-900">{{ $area['area'] }}</h5>
                                            <span class="ml-3 px-3 py-1 text-xs font-semibold rounded-full
                                                @if($area['priority'] === 'high')
                                                    bg-red-100 text-red-700
                                                @else
                                                    bg-blue-100 text-blue-700
                                                @endif
                                                ">
                                                    @if($area['priority'] === 'high')
                                                        Prioritas Tinggi
                                                    @else
                                                        Maintain
                                                    @endif
                                            </span>
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $area['time_allocation'] }}</span>
                                    </div>
                                    </div>

                                    <!-- Activities -->
                                    <div>
                                        <h6 class="text-sm font-medium text-gray-700 mb-3">Aktivitas Rekomendasi:</h6>
                                        <div class="space-y-2">
                                            @foreach($area['activities'] as $activity)
                                                <div class="flex items-center text-sm text-gray-600">
                                                    <i class="fas fa-check-circle text-green-500 mr-3 text-xs"></i>
                                                    {{ $activity }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- Smart Recommendations -->
    @if(isset($aiRecommendations['smart_recommendations']) && count($aiRecommendations['smart_recommendations']) > 0)
        <!-- Smart Recommendations Info Alert -->
        <div class="bg-gradient-to-r from-green-100 to-emerald-100 rounded-xl p-4 mb-6 border border-green-200">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-lightbulb text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h5 class="font-bold text-green-900 text-sm mb-1">💡 Rekomendasi Cerdas Berdasarkan Performa</h5>
                    <p class="text-green-700 text-xs">
                        Sistem menganalisis <strong>skor rata-rata {{ number_format(auth()->user()->leaderboards()->avg('total_skor') ?? 0, 1) }}</strong> dan
                        <strong>konsistensi performa</strong> Anda untuk memberikan rekomendasi yang tepat.
                        Rekomendasi ini <strong>unik untuk setiap user</strong> berdasarkan data performa individual!
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            @foreach($aiRecommendations['smart_recommendations'] as $recommendation)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200">
                    <!-- Priority Banner -->
                    <div class="h-1 {{
                        $recommendation['priority'] === 'urgent' ? 'bg-red-500' :
                        ($recommendation['priority'] === 'high' ? 'bg-orange-500' :
                        ($recommendation['priority'] === 'maintain' ? 'bg-blue-500' : 'bg-gray-500'))
                    }}"></div>

                    <div class="p-8">
                        <!-- Header -->
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 {{
                                        $recommendation['type'] === 'foundation' ? 'bg-blue-600' :
                                        ($recommendation['type'] === 'intermediate' ? 'bg-purple-600' :
                                        'bg-green-600')
                                    }} rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas text-white text-lg">
                                            @if($recommendation['type'] === 'foundation')
                                                fa-graduation-cap
                                            @elseif($recommendation['type'] === 'intermediate')
                                                fa-chart-line
                                            @else
                                                fa-trophy
                                            @endif
                                        </i>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-900">{{ $recommendation['title'] }}</h4>
                                </div>
                                <p class="text-gray-600 text-base leading-relaxed">{{ $recommendation['description'] }}</p>
                            </div>

                            <!-- Success Rate -->
                            <div class="text-right">
                                <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold rounded-full">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    {{ $recommendation['success_probability'] }}% Success
                                </div>
                            </div>
                        </div>

                        <!-- Action Items -->
                        <div class="mb-6">
                            <h5 class="text-sm font-semibold text-gray-700 mb-4">Langkah-langkah:</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                @foreach($recommendation['action_items'] as $item)
                                    <div class="flex items-start text-sm text-gray-600">
                                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1 text-xs"></i>
                                        <span>{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-2"></i>
                                Estimasi: {{ $recommendation['estimated_time'] }}
                            </div>

                            @if(!auth()->user()->hasActivePremiumSubscription())
                                <button class="px-6 py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors duration-200">
                                    <i class="fas fa-lock mr-2"></i>
                                    Upgrade untuk Akses Lengkap
                                </button>
                            @else
                                <button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fas fa-play mr-2"></i>
                                    Mulai Program
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

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
                            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
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

                                <!-- Premium Requirement -->
                                <div class="mb-4 p-3 bg-gradient-to-r from-red-50 to-pink-50 rounded-lg border border-red-200">
                                    <div class="flex items-center text-sm text-red-700">
                                        <i class="fas fa-crown mr-2 text-red-600"></i>
                                        <span class="font-medium">🔒 Harus Upgrade Premium untuk mengerjakan tantangan ini!</span>
                                    </div>
                                </div>

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
                                <button class="w-full px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    <i class="fas fa-play mr-3"></i>
                                    Mulai Sekarang
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- System Explanation Footer -->
    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-6 border border-gray-200">
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-cogs text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">🔬 Bagaimana Sistem Ini Bekerja?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-700">
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-database text-blue-600 text-lg"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">1. Data Collection</h4>
                    <p>Menganalisis {{ auth()->user()->leaderboards()->count() }} tryout Anda untuk mengidentifikasi pola belajar dan performa</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-brain text-purple-600 text-lg"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">2. Pattern Recognition</h4>
                    <p>Menggunakan statistical analysis untuk mendeteksi gaya belajar dan area yang perlu ditingkatkan</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-user-cog text-green-600 text-lg"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">3. Personalization</h4>
                    <p>Menghasilkan rekomendasi unik yang disesuaikan dengan karakteristik dan kebutuhan individual Anda</p>
                </div>
            </div>
            <div class="mt-6 p-4 bg-white rounded-xl border border-gray-200">
                <p class="text-sm text-gray-600">
                    <strong>💡 Mengapa Setiap User Berbeda?</strong> Karena sistem menganalisis data performa,
                    gaya belajar, dan pola study yang unik untuk setiap individu. Tidak ada dua user yang memiliki
                    rekomendasi yang sama karena setiap orang memiliki karakteristik dan kebutuhan yang berbeda!
                </p>
            </div>
        </div>
    </div>

</div>

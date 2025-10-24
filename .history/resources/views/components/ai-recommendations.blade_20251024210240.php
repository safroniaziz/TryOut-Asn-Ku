<!-- AI Recommendations Component - Clean & Elegant Design -->
<div class="max-w-7xl mx-auto space-y-8">
    <!-- AI Insights Section -->
    @if(isset($aiRecommendations['ai_insights']) && count($aiRecommendations['ai_insights']) > 0)
        <div class="bg-white rounded-3xl border border-gray-200/50 shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 px-8 py-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">📊 Analisis Performa Anda</h3>
                            <p class="text-white/90 text-lg">Temukan kekuatan dan area yang perlu ditingkatkan</p>
                        </div>
                    </div>
                    @if(auth()->user()->hasActivePremiumSubscription())
                        <div class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full border border-white/30">
                            ✨ Premium
                        </div>
                    @endif
                </div>
            </div>

            <!-- Insights Grid -->
            <div class="p-8 bg-gradient-to-br from-gray-50 to-white">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($aiRecommendations['ai_insights'] as $index => $insight)
                        <div class="group relative">
                            <!-- Card -->
                            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 hover:border-gray-200">
                                <!-- Icon and Title -->
                                <div class="flex items-start space-x-4 mb-6">
                                    <div class="w-14 h-14 {{
                                        $insight['type'] === 'positive' ? 'bg-gradient-to-br from-green-400 to-green-600' :
                                        ($insight['type'] === 'warning' ? 'bg-gradient-to-br from-orange-400 to-orange-600' :
                                        'bg-gradient-to-br from-blue-400 to-blue-600')
                                    }} rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                        <span class="text-3xl text-white">
                                            {{ $insight['icon'] }}
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-xl font-bold text-gray-900 group-hover:text-gray-800 transition-colors duration-300 mb-2">
                                            {{ $insight['title'] }}
                                        </h4>
                                        <div class="flex items-center space-x-2">
                                            @if($insight['type'] === 'positive')
                                                <span class="flex items-center text-green-600 text-sm font-medium">
                                                    <i class="fas fa-arrow-trend-up mr-2"></i>
                                                    Meningkat
                                                </span>
                                            @elseif($insight['type'] === 'warning')
                                                <span class="flex items-center text-orange-600 text-sm font-medium">
                                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                                    Perlu Perhatian
                                                </span>
                                            @else
                                                <span class="flex items-center text-blue-600 text-sm font-medium">
                                                    <i class="fas fa-info-circle mr-2"></i>
                                                    Informasi
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <p class="text-gray-600 leading-relaxed text-base">{{ $insight['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

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

    <!-- Achievement Challenges -->
    @if(isset($aiRecommendations['gamification_challenges']) && count($aiRecommendations['gamification_challenges']) > 0)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-trophy text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">🏆 Tantangan & Achievement</h3>
                        <p class="text-gray-600">Selesaikan tantangan berjenjang dan dapatkan cashback!</p>
                    </div>
                </div>

            <!-- Challenges Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($aiRecommendations['gamification_challenges'] as $challenge)
                        <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow duration-200">
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{
                                    $challenge['difficulty'] === 'easy' ? 'bg-green-100 text-green-800' :
                                    ($challenge['difficulty'] === 'medium' ? 'bg-orange-100 text-orange-800' :
                                    'bg-red-100 text-red-800')
                                }}">
                                    {{ $challenge['difficulty'] === 'easy' ? 'Bronze' : ($challenge['difficulty'] === 'medium' ? 'Silver' : 'Gold') }}
                                </span>
                                <div class="flex items-center text-sm font-semibold text-purple-600">
                                    <i class="fas fa-coins mr-1"></i>
                                    {{ $challenge['cashback'] ?? 'Rp 10.000' }}
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $challenge['title'] }}</h5>
                            <p class="text-gray-600 text-base mb-4">{{ $challenge['description'] }}</p>

                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
                                    <span>Progress</span>
                                    <span>{{ $challenge['completion_rate'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="h-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full transition-all duration-500"
                                         style="width: {{ $challenge['completion_rate'] }}%"></div>
                                </div>
                            </div>

                            <!-- Badge Preview -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-medal mr-2"></i>
                                    Badge: {{ $challenge['badge_name'] ?? 'Achievement Badge' }}
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-clock mr-2"></i>
                                    {{ $challenge['estimated_time'] ?? '1 minggu' }}
                                </div>
                            </div>

                            <!-- Action Button -->
                            <button class="w-full px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors duration-200">
                                <i class="fas fa-play mr-2"></i>
                                Mulai Tantangan
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Cashback Info -->
                <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-money-bill-wave text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-green-900">💰 Sistem Cashback</h4>
                            <p class="text-green-700">Dapatkan cashback langsung ke saldo Anda!</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">Bronze</div>
                            <div class="text-gray-600">Rp 5.000 - 15.000</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-orange-600">Silver</div>
                            <div class="text-gray-600">Rp 20.000 - 50.000</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-yellow-600">Gold</div>
                            <div class="text-gray-600">Rp 75.000 - 150.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Premium Upgrade Section -->
    @if(!auth()->user()->hasActivePremiumSubscription())
        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">🚀 Upgrade ke Premium</h3>
                        <p class="text-gray-600">Akses analisis AI yang lebih mendalam dan rekomendasi personal</p>
                    </div>
                </div>

            <!-- Premium Features -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-brain text-blue-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Analisis AI Mendalam</h4>
                        <p class="text-sm text-gray-600">Prediksi performa dan strategi belajar optimal</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Progress Tracking</h4>
                        <p class="text-sm text-gray-600">Monitor kemajuan belajar secara real-time</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-target text-purple-600 text-2xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Rekomendasi Personal</h4>
                        <p class="text-sm text-gray-600">Strategi belajar yang disesuaikan dengan Anda</p>
                    </div>
                </div>

                <!-- Upgrade CTA -->
                <div class="text-center">
                    <button class="px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200">
                        <i class="fas fa-rocket mr-3"></i>
                        Mulai Premium Sekarang
                    </button>
                    <p class="text-xs text-gray-500 mt-3">
                        <i class="fas fa-shield-alt mr-1"></i>
                        Garansi 7 hari • Batal kapan saja
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>

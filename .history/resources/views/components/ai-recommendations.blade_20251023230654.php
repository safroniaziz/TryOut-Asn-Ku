<!-- AI Recommendations Component - Clean & Elegant Design -->
<div class="max-w-7xl mx-auto space-y-8">
    <!-- AI Insights Section -->
    @if(isset($aiRecommendations['ai_insights']) && count($aiRecommendations['ai_insights']) > 0)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Analisis Performa</h3>
                            <p class="text-gray-600">Insight personal berdasarkan data tryout Anda</p>
                        </div>
                        @if(auth()->user()->hasActivePremiumSubscription())
                            <div class="px-3 py-1 bg-gray-900 text-white text-xs font-semibold rounded-full">
                                Premium
                            </div>
                        @endif
                    </div>
                </div>

            <!-- Insights Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($aiRecommendations['ai_insights'] as $index => $insight)
                        <div class="group">
                            <!-- Card -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6 transition-all duration-200 hover:border-gray-300 hover:shadow-md">
                                <!-- Icon and Title -->
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 {{
                                        $insight['type'] === 'positive' ? 'bg-green-100' :
                                        ($insight['type'] === 'warning' ? 'bg-orange-100' :
                                        'bg-blue-100')
                                    }} rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-200">
                                        <span class="text-2xl {{
                                            $insight['type'] === 'positive' ? 'text-green-600' :
                                            ($insight['type'] === 'warning' ? 'text-orange-600' :
                                            'text-blue-600')
                                        }}">
                                            {{ $insight['icon'] }}
                                        </span>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 group-hover:text-gray-800 transition-colors duration-200">
                                        {{ $insight['title'] }}
                                    </h4>
                                </div>

                                <!-- Description -->
                                <p class="text-gray-600 leading-relaxed mb-4">{{ $insight['description'] }}</p>

                                <!-- Status Indicator -->
                                <div class="flex items-center text-sm font-medium">
                                    @if($insight['type'] === 'positive')
                                        <span class="flex items-center text-green-600">
                                            <i class="fas fa-arrow-trend-up mr-2"></i>
                                            Meningkat
                                        </span>
                                    @elseif($insight['type'] === 'warning')
                                        <span class="flex items-center text-orange-600">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            Perlu Perhatian
                                        </span>
                                    @else
                                        <span class="flex items-center text-blue-600">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            Informasi
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Personalized Study Plan -->
    @if(isset($aiRecommendations['personalized_plan']))
        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Rencana Belajar Personal</h3>
                        <p class="text-gray-600">Disesuaikan dengan gaya belajar dan performa Anda</p>
                    </div>
                </div>

            <!-- Study Schedule Dashboard -->
            <div class="p-8">
                <h4 class="text-lg font-semibold text-gray-900 mb-6">Jadwal Optimal Anda</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Weekly Hours -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">{{ $aiRecommendations['personalized_plan']['schedule']['weekly_hours'] }}</div>
                        <div class="text-sm text-gray-600 font-medium">Jam per Minggu</div>
                        <div class="text-xs text-blue-500 mt-1">
                            {{ $aiRecommendations['personalized_plan']['schedule']['weekly_hours'] >= 12 ? 'Intensif' : 'Normal' }}
                        </div>
                    </div>

                    <!-- Daily Sessions -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">{{ $aiRecommendations['personalized_plan']['schedule']['daily_sessions'] }}</div>
                        <div class="text-sm text-gray-600 font-medium">Sesi per Hari</div>
                        <div class="text-xs text-green-500 mt-1">Konsisten</div>
                    </div>

                    <!-- Peak Time -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                        <div class="text-2xl font-bold text-purple-600 mb-2">{{ ucfirst($aiRecommendations['personalized_plan']['schedule']['optimal_time']) }}</div>
                        <div class="text-sm text-gray-600 font-medium">Waktu Terbaik</div>
                        <div class="text-xs text-purple-500 mt-1">Fokus Maksimal</div>
                    </div>

                    <!-- Session Length -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                        <div class="text-xl font-bold text-orange-600 mb-2">{{ $aiRecommendations['personalized_plan']['schedule']['session_length'] }}</div>
                        <div class="text-sm text-gray-600 font-medium">Durasi Sesi</div>
                        <div class="text-xs text-orange-500 mt-1">Optimal</div>
                    </div>
                </div>

                <!-- Focus Areas -->
                @if(isset($aiRecommendations['personalized_plan']['focus_areas']) && count($aiRecommendations['personalized_plan']['focus_areas']) > 0)
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-crosshairs text-red-500 mr-3"></i>
                            Area Fokus Prioritas
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

    <!-- Gamification Challenges -->
    @if(isset($aiRecommendations['gamification_challenges']) && count($aiRecommendations['gamification_challenges']) > 0)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-gamepad text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Tantangan & Rewards</h3>
                        <p class="text-gray-600">Selesaikan tantangan dan dapatkan XP serta badges</p>
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
                                    {{ $challenge['difficulty'] === 'easy' ? 'Mudah' : ($challenge['difficulty'] === 'medium' ? 'Sedang' : 'Sulit') }}
                                </span>
                                <span class="text-xs text-gray-500">{{ $challenge['type'] }}</span>
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

                            <!-- Footer -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-clock mr-2"></i>
                                    {{ $challenge['estimated_time'] }}
                                </div>
                                <div class="flex items-center text-sm font-semibold text-purple-600">
                                    <i class="fas fa-gift mr-2"></i>
                                    {{ $challenge['reward'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Premium Insights -->
    @if(isset($aiRecommendations['premium_insights']) && count($aiRecommendations['premium_insights']) > 0 && !auth()->user()->hasActivePremiumSubscription())
        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 px-8 py-6 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-crown text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Premium Insights</h3>
                        <p class="text-gray-600">Analisis AI lanjutan hanya untuk member Premium</p>
                    </div>
                </div>

            <!-- Premium Features -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($aiRecommendations['premium_insights'] as $insight)
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-brain text-white text-lg"></i>
                                </div>
                                <h5 class="text-lg font-semibold text-gray-900">{{ $insight['title'] }}</h5>
                            </div>
                            <p class="text-gray-600 text-base mb-4">{{ $insight['description'] }}</p>
                            <button class="w-full px-4 py-3 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                                <i class="fas fa-lock mr-2"></i>
                                {{ $insight['action_text'] }}
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Upgrade CTA -->
                <div class="px-8 py-6 text-center bg-gray-50 border-t border-gray-100">
                    <button class="px-8 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-bold rounded-xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-200">
                        <i class="fas fa-rocket mr-3"></i>
                        Upgrade ke Premium untuk Mengakses Semua Fitur AI
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

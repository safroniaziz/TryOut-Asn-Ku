<div class="h-full flex flex-col">
    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
        <!-- Header -->
        <div class="bg-gradient-to-r {{ $package['type'] === 'CPNS' ? 'from-blue-600 to-blue-700' : 'from-emerald-600 to-green-700' }} px-5 py-5 flex-shrink-0">
            <div class="flex items-center justify-between mb-4">
                <!-- Access Type Badge -->
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1.5">
                    @if($package['time_access_label'])
                        <span class="text-white text-xs font-bold">
                            {{ $package['time_access_label'] }}
                        </span>
                    @endif
                </div>

                <!-- Right side badges container -->
                <div class="flex items-center space-x-2">
                    <!-- Payment Type Badge -->
                    @if($package['payment_type_label'])
                        <div class="bg-gradient-to-r from-amber-500 to-orange-500 rounded-lg px-3 py-1.5">
                            <span class="text-white text-xs font-bold flex items-center">
                                <i class="fas fa-crown mr-1.5"></i>{{ $package['payment_type_label'] }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <h3 class="text-xl font-bold text-white mb-3 leading-tight">
                {{ $package['name'] }}
            </h3>
            <div class="flex items-center space-x-4 {{ $package['type'] === 'CPNS' ? 'text-blue-100' : 'text-emerald-100' }} text-sm">
                <!-- Question Count -->
                <div class="flex items-center">
                    <i class="fas fa-layer-group mr-2"></i>
                    <span>{{ count($package['category_names']) }} Kategori</span>
                </div>
                <!-- Duration -->
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    <span>{{ number_format($package['total_duration']) }} Menit</span>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="px-5 py-5 flex-grow">
            <!-- Progress and Stats -->
            <div class="space-y-4 flex-grow">
                <!-- Completion Rate -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                        <span class="text-xs font-bold {{ $package['type'] === 'CPNS' ? 'text-blue-600' : 'text-emerald-600' }}">{{ $package['completion_rate'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                        <div class="bg-gradient-to-r {{ $package['type'] === 'CPNS' ? 'from-blue-500 to-blue-600' : 'from-emerald-500 to-emerald-600' }} h-full rounded-full transition-all duration-300"
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
                <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-clock text-orange-500 mr-2.5 text-sm"></i>
                        <span class="text-xs font-semibold text-gray-700">Durasi</span>
                    </div>
                    <span class="text-xs font-bold text-orange-600">{{ number_format($package['total_duration']) }} Menit</span>
                </div>

                <!-- User's Performance (if completed) -->
                @if($package['user_score_in_package'] > 0)
                    <div class="p-3 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-green-700">Skor Anda</span>
                            <span class="text-sm font-bold text-green-600">{{ $package['user_score_in_package'] }}/100</span>
                        </div>
                    </div>
                @endif

                <!-- Test Categories Detail -->
                <div class="mt-auto pt-2">
                    <p class="text-xs font-bold text-gray-700 mb-3">Detail Kategori:</p>
                    <div class="space-y-2">
                        @if(!empty($package['category_details']))
                            @foreach($package['category_details'] as $category)
                                <div class="flex items-center justify-between p-2.5 bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 {{ $package['type'] === 'CPNS' ? 'bg-blue-500' : 'bg-emerald-500' }} rounded-full mr-2.5"></div>
                                        <span class="text-xs font-semibold text-gray-700">{{ $category['name'] }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs font-bold {{ $package['type'] === 'CPNS' ? 'text-blue-600' : 'text-emerald-600' }}">{{ $category['question_count'] }} soal</span>
                                        <span class="text-xs font-semibold text-orange-600">{{ $category['estimated_minutes'] }} menit</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-2.5 bg-gray-50 rounded-lg">
                                <span class="text-xs text-gray-600">{{ $package['tryouts']->first()->kategori }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-5 py-4 border-t border-gray-100 flex-shrink-0">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs text-gray-500 font-medium">
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
                   class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                    <i class="fas fa-crown text-yellow-300"></i>
                    <span>Upgrade Premium</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            @else
                <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
                   class="flex items-center justify-center w-full bg-gradient-to-r {{ $package['type'] === 'CPNS' ? 'from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700' : 'from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700' }} text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                    @if($package['is_completed_by_user'])
                        <i class="fas fa-redo"></i>
                        <span>Kerjakan Lagi</span>
                        <i class="fas fa-chart-line"></i>
                    @else
                        @if($package['is_free'])
                            <i class="fas fa-rocket text-yellow-300"></i>
                            <span>Mulai Gratis</span>
                            <i class="fas fa-star text-yellow-300"></i>
                        @else
                            <i class="fas fa-play"></i>
                            <span>Mulai Tes</span>
                            <i class="fas fa-fire text-orange-300"></i>
                        @endif
                    @endif
                </a>
            @endif
        </div>
    </div>
</div>

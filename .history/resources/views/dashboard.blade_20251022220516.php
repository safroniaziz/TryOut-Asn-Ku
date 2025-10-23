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


                <!-- Performance Analytics Row (only if data exists) -->
                @if($performanceByCategory->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                    <!-- Pie Chart - Score Distribution -->
                    <div class="h-full flex flex-col">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white text-xl">📊</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-600">Performa keseluruhan</div>
                                    <div class="text-2xl font-bold text-transparent bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text">
                                        {{ number_format(collect($performanceByCategory)->avg('avg_score'), 1) }}/100
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-bold text-gray-900 mb-4">Distribusi Skor Kategori</h3>
                                <div class="relative h-48">
                                    <canvas id="scoreDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bar Chart - Category Comparison -->
                    <div class="h-full flex flex-col">
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 p-6 h-full flex flex-col">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white text-xl">📈</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-600">Kategori terbaik</div>
                                    <div class="text-lg font-bold text-green-600">
                                        {{ collect($performanceByCategory)->sortByDesc('avg_score')->first()['kategori'] ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-bold text-gray-900 mb-4">Perbandingan per Kategori</h3>
                                <div class="relative h-48">
                                    <canvas id="categoryComparisonChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content Container - No Gap -->
    <div class="-mt-8">

            <!-- Premium Package Sections -->
            @if($targetTest === 'both')
            <!-- Full Width CPNS Section - No Gap -->
            <div x-data="{ cpnsActiveTab: 'all' }" class="bg-gradient-to-br from-blue-50 to-indigo-50 -mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
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
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                                <button @click="cpnsActiveTab = 'all'"
                                        :class="cpnsActiveTab === 'all' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Semua
                                </button>
                                <button @click="cpnsActiveTab = 'SKD'"
                                        :class="cpnsActiveTab === 'SKD' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-file-alt mr-2"></i>SKD
                                </button>
                                <button @click="cpnsActiveTab = 'SKB'"
                                        :class="cpnsActiveTab === 'SKB' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
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
                    <div x-show="cpnsActiveTab === 'all'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
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
                                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                                            <div class="flex items-center">
                                                <i class="fas fa-layer-group mr-2"></i>
                                                <span>{{ count($package['category_names']) }} Kategori</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                <span>{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">

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
                                            <div class="mt-auto pt-4">
                                                <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                                <div class="space-y-2.5">
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
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
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
                                            <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
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
                    <div x-show="cpnsActiveTab === 'SKD'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
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
                                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                                            <div class="flex items-center">
                                                <i class="fas fa-layer-group mr-2"></i>
                                                <span>{{ count($package['category_names']) }} Kategori</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                <span>{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">

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
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
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
                                            <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
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
                    <div x-show="cpnsActiveTab === 'SKB'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
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
                                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                                            <div class="flex items-center">
                                                <i class="fas fa-layer-group mr-2"></i>
                                                <span>{{ count($package['category_names']) }} Kategori</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-2"></i>
                                                <span>{{ number_format($package['total_duration']) }} Menit</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Body Content with Flex Grow -->
                                    <div class="p-4 flex flex-col">

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
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
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
                                            <a href="{{ route('tryouts.show', $package['tryouts']->first()) }}"
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
            <div x-data="{ pppkActiveTab: 'all' }" class="bg-gradient-to-br from-emerald-50 to-green-50 -mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
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
                    <div class="mb-8">
                        <div class="flex justify-center">
                            <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                                <button @click="pppkActiveTab = 'all'"
                                        :class="pppkActiveTab === 'all' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-layer-group mr-2"></i>Semua
                                </button>
                                <button @click="pppkActiveTab = 'Non-Teknis'"
                                        :class="pppkActiveTab === 'Non-Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-users mr-2"></i>Non-Teknis
                                </button>
                                <button @click="pppkActiveTab = 'Teknis'"
                                        :class="pppkActiveTab === 'Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                        class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                                    <i class="fas fa-cog mr-2"></i>Teknis
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Grid (Full Width, Outside Container) -->
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 pb-12">
                    <!-- All Tab -->
                    <div x-show="pppkActiveTab === 'all'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
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
                                            <div class="mt-auto pt-4">
                                                <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                                                <div class="space-y-2.5">
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
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
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
                    <div x-show="pppkActiveTab === 'Non-Teknis'" x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-stretch">
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

                                    </div>

                                    <!-- Professional Footer -->
                                    <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-xs text-gray-500 flex items-center">
                                                @if($package['type'] === 'CPNS')
                                                    <i class="fas fa-building mr-1 text-blue-500"></i>
                                                    <span class="font-semibold text-blue-600">CPNS</span>
                                                @else
                                                    <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                                                    <span class="font-semibold text-emerald-600">PPPK</span>
                                                @endif
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
                </div>
            </div>
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
                        <div class="grid grid-cols-1 md:gridå´-cols-2 gap-8 max-w-4xl mx-auto mb-6">
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

<!-- Chart.js Library -->

</x-app-layout>

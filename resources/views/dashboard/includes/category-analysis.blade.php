{{-- Category Analysis Module --}}
<div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
    <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white p-6">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-th-large text-white text-xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold">Analisis per Kategori</h3>
                <p class="text-sm opacity-90">Performa rata-rata Anda berdasarkan kategori</p>
            </div>
        </div>

    <div class="p-6">
        @if(isset($categoryDistribution) && $categoryDistribution->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($categoryDistribution as $category)
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:border-blue-300 transition-colors duration-200">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h4 class="font-bold text-lg text-gray-900 mb-1">{{ $category['kategori'] }}</h4>
                                <div class="text-sm text-gray-600">
                                    {{ $category['count'] }} tryout
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold {{
                                    $category['avg_score'] >= 80 ? 'text-green-600' :
                                    ($category['avg_score'] >= 70 ? 'text-yellow-600' : 'text-red-600')
                                }}">
                                    {{ round($category['avg_score']) }}
                                </div>
                                <div class="text-sm text-gray-600">
                                    Level: <span class="font-semibold {{
                                        $category['performance_level'] == 'Sangat Baik' ? 'text-green-800 bg-green-100 border-green-200' :
                                        ($category['performance_level'] == 'Baik' ? 'text-blue-800 bg-blue-100 border-blue-200' :
                                        ($category['performance_level'] == 'Cukup' ? 'text-yellow-800 bg-yellow-100 border-yellow-200' :
                                        'text-red-800 bg-red-100 border-red-200'
                                    @endif
                                    }}">
                                        {{ $category['performance_level'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Performance Metrics -->
                        <div class="grid grid-cols-2 gap-2 text-sm mb-3">
                            <div>
                                <span class="text-gray-600">Skor Rata-rata:</span>
                                <span class="font-semibold ml-1">{{ $category['avg_score'] }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Skor Terbaik:</span>
                                <span class="font-semibold ml-1 text-green-600">{{ $category['max_score'] }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Skor Terburuk:</span>
                                <span class="font-semibold ml-1 text-red-600">{{ $category['min_score'] }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Akurasi:</span>
                                <span class="font-semibold ml-1 text-blue-600">{{ round($category['avg_correct']) }}%</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Waktu Rata-rata:</span>
                                <span class="font-semibold ml-1 text-purple-600">{{ $category['avg_time'] }}s</span>
                            </div>
                        </div>

                        <!-- Performance Level Badge -->
                        <div class="mt-3">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                @if($category['performance_level'] == 'Sangat Baik')
                                    bg-green-100 text-green-800 border-green-200
                                @elseif($category['performance_level'] == 'Baik')
                                    bg-blue-100 text-blue-800 border-blue-200
                                @elseif($category['performance_level'] == 'Cukup')
                                    bg-yellow-100 text-yellow-800 border-yellow-200
                                @else
                                    bg-red-100 text-red-800 border-red-200
                                @endif
                            ">
                                {{ $category['performance_level'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-th-large text-4xl mb-4 text-gray-300"></i>
                <p class="text-lg">Belum ada data kategori</p>
                <p class="text-sm">Mulailah tryout untuk melihat analisis kategori Anda</p>
            </div>
        @endif
    </div>
</div>
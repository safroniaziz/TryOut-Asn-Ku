{{-- Performance Summary Module --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Overall Stats -->
    <div class="lg:col-span-1 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 text-center">
            <div class="text-3xl font-bold">{{ $avgScore ?? 0 }}</div>
            <div class="text-sm opacity-90">Skor Rata-rata</div>
        </div>
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="text-2xl font-bold text-green-600">{{ $bestScore ?? 0 }}</div>
                    <div class="text-sm text-gray-600">Skor Terbaik</div>
                </div>
                <div>
                    <div class="text-2xl font-bold text-red-600">{{ $worstScore ?? 0 }}</div>
                    <div class="text-sm text-gray-600">Skor Terburuk</div>
                </div>
            </div>
            <div>
                <div class="text-xl font-bold text-blue-600">{{ $totalTryouts ?? 0 }}</div>
                <div class="text-sm text-gray-600">Total Tryout</div>
            </div>
            <div>
                <div class="text-xl font-bold text-purple-600">{{ $accuracyRate ?? 0 }}%</div>
                <div class="text-sm text-gray-600">Akurasi</div>
            </div>
        </div>
    </div>

    <!-- Trend Chart -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
        <div class="flex items-center mb-6">
            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-chart-line text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900">Tren Performa</h3>
        </div>

        @if(isset($performanceTrend) && $performanceTrend->count() > 0)
            <div class="h-64">
                <canvas id="performanceTrendChart" width="400" height="100"></canvas>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($performanceTrend->take(-3) as $trend)
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="font-semibold text-gray-800">{{ $trend['tryout_name'] }}</h4>
                            <span class="text-sm font-bold text-blue-600">{{ $trend['score'] }}</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span>{{ \Carbon\Carbon::parse($trend['date'])->format('d M Y') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-chart-line text-4xl mb-4 text-gray-300"></i>
                <p class="text-lg">Belum ada data tren performa</p>
                <p class="text-sm">Mulailah tryout untuk melihat tren performa Anda</p>
            </div>
        @endif
    </div>
</div>
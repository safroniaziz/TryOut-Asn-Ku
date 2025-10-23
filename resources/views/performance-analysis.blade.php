@extends('layouts.app')

@section('title', 'Analisis Performa Tryout - Tryout ASN')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-gray-100">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:border-gray-300 transition duration-150 ease-in-out">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 1.414L10 10.586a1 1 0 01-1.414 1.414l-10-10.586A1 1 0 01-1.414-1.414L12.586 3.414a1 1 0 01 1.414 1.414L3.707 16.707A1 1 0 01 1.414 1.414L2.293 2.293a1 1 0 01 1.414 1.414l10.586 7.414a1 1 0 01-1.414-1.414L12.586 3.414a1 1 0 01 1.414 1.414L16.707 17.707a1 1 0 01 1.414 1.414z"/>
                        </svg>
                        <span class="sr-only">Kembali ke Dashboard</span>
                        Dashboard
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold text-gray-900">Analisis Performa Tryout</h1>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Selamat datang,</span>
                        <span class="text-sm font-semibold text-blue-600">{{ $user->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Overall Performance Summary -->
            <div class="lg:col-span-1 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 text-center">
                    <div class="text-3xl font-bold">{{ round($avgScore) }}</div>
                    <div class="text-sm opacity-90">Skor Rata-rata</div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-2xl font-bold text-green-600">{{ $bestScore }}</div>
                            <div class="text-sm text-gray-600">Skor Terbaik</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-red-600">{{ $worstScore }}</div>
                            <div class="text-sm text-gray-600">Skor Terburuk</div>
                        </div>
                    </div>
                    <div>
                        <div class="text-xl font-bold text-blue-600">{{ $totalTryouts }}</div>
                        <div class="text-sm text-gray-600">Total Tryout</div>
                    </div>
                    <div>
                        <div class="text-xl font-bold text-purple-600">{{ $accuracyRate }}%</div>
                        <div class="text-sm text-gray-600">Akurasi</div>
                    </div>
                </div>
            </div>

            <!-- Performance Trends -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Tren Performa</h3>
                </div>

                @if($performanceTrend->count() > 0)
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

        <!-- Performance by Category -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white p-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-th-large text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Analisis per Kategori</h3>
                </div>
            </div>

            <!-- Category Cards -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($categoryDistribution as $category)
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:border-blue-300 transition-colors duration-200">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h4 class="font-bold text-lg text-gray-900">{{ $category['kategori'] }}</h4>
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
                                </div>
                            </div>

                            <!-- Performance Metrics -->
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div>
                                    <span class="text-gray-600">Skor Rata-rata:</span>
                                    <span class="font-semibold ml-1">{{ $category['avg_score'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Skor Terbaik:</span>
                                    <span class="font-semibold ml-1 text-green-600">{{ $category['max_score'] }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Akurasi:</span>
                                    <span class="font-semibold ml-1 text-blue-600">{{ round($category['avg_correct']) }}%</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Waktu Rata-rata:</span>
                                    <span class="font-semibold ml-1 text-purple-600">{{ $category['avg_time'] }}s</span>
                                </div>
                                <div>
                                    <span class="text-gray-600">Butuh Perbaikan:</span>
                                    <span class="font-semibold ml-1 text-red-600">{{ $category['improvement_needed'] }}</span>
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
            </div>
        </div>

        <!-- Personalized Recommendations -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white p-6">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-lightbulb text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold">Rekomendasi Personal</h3>
                </div>
            </div>

            <div class="p-6">
                @if($recommendations->count() > 0)
                    <div class="space-y-4">
                        @foreach($recommendations as $recommendation)
                            <div class="rounded-lg border-l-4 p-4
                                @if($recommendation['priority'] == 'critical')
                                    border-red-300 bg-red-50
                                @elseif($recommendation['priority'] == 'high')
                                    border-orange-300 bg-orange-50
                                @else
                                    border-blue-300 bg-blue-50
                                @endif
                            ">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mr-4
                                        @if($recommendation['priority'] == 'critical')
                                            bg-red-500
                                        @elseif($recommendation['priority'] == 'high')
                                            bg-orange-500
                                        @else
                                            bg-blue-500
                                        @endif
                                    >
                                        <span class="text-white text-lg">{{ $recommendation['icon'] }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg mb-2
                                            @if($recommendation['priority'] == 'critical')
                                                text-red-800
                                            @elseif($recommendation['priority'] == 'high')
                                                text-orange-800
                                            @else
                                                text-blue-800
                                            @endif
                                        ">
                                            {{ $recommendation['title'] }}
                                        </h4>
                                        <p class="text-gray-700 mb-3">{{ $recommendation['description'] }}</p>
                                        <div class="bg-white rounded-md p-3 border border-gray-200">
                                            <h5 class="font-semibold text-sm mb-1">Aksi yang Direkomendasikan:</h5>
                                            <p class="text-sm text-gray-600">{{ $recommendation['action'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-lightbulb text-4xl mb-4 text-gray-300"></i>
                        <p class="text-lg">Belum ada rekomendasi</p>
                        <p class="text-sm">Lakukan lebih banyak tryout untuk mendapatkan rekomendasi yang lebih personal</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Scripts for Charts -->
@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    @if($performanceTrend->count() > 0)
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('performanceTrendChart').getContext('2d');

            const performanceData = @json($performanceTrend->toArray());

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: performanceData.map(item => item.date),
                    datasets: [{
                        label: 'Skor Performa',
                        data: performanceData.map(item => parseFloat(item.score)),
                        borderColor: 'rgb(99, 102, 241)',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                step: 20
                            }
                        }
                    }
                }
            });
        });
    @endif
</script>
@endpush
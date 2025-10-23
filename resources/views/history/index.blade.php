<x-app-layout>
    <x-slot name="title">
        Riwayat Tryout - {{ config('app.name') }}
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-history text-indigo-600 mr-3"></i>
                            Riwayat Tryout
                        </h1>
                        <p class="text-gray-600 mt-2">Lihat semua tryout yang telah Anda kerjakan beserta detail jawaban</p>
                    </div>
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Dashboard
                    </a>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Total Tryout</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_tryouts'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-list text-blue-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Rata-rata Skor</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['avg_score'], 1) }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-green-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Skor Tertinggi</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['best_score'] }}</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-trophy text-purple-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Tingkat Penyelesaian</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['completion_rate'] }}%</p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-orange-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tryout List -->
            <div class="bg-white rounded-xl shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Tryout</h2>
                </div>

                @if($userTryouts->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($userTryouts as $userTryout)
                            <div class="p-6 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $userTryout->tryout->title }}</h3>
                                            @if($userTryout->status === 'completed')
                                                <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Selesai
                                                </span>
                                            @else
                                                <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    {{ ucwords($userTryout->status) }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center space-x-6 text-sm text-gray-600">
                                            <span class="flex items-center">
                                                <i class="fas fa-tag mr-1"></i>
                                                {{ $userTryout->tryout->type }}
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-layer-group mr-1"></i>
                                                {{ $userTryout->tryout->kategori }}
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-clock mr-1"></i>
                                                {{ $userTryout->created_at->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-indigo-600">{{ $userTryout->total_skor }}</div>
                                            <div class="text-sm text-gray-600">Skor</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-semibold text-green-600">{{ $userTryout->benar }}/{{ $userTryout->total_soal }}</div>
                                            <div class="text-sm text-gray-600">Benar</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-semibold text-blue-600">{{ number_format($userTryout->persentase, 1) }}%</div>
                                            <div class="text-sm text-gray-600">Akurasi</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex space-x-2">
                                        @if($userTryout->status === 'completed')
                                            <a href="{{ route('dashboard.history.show', $userTryout) }}"
                                               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                                                <i class="fas fa-eye mr-2"></i>
                                                Lihat Detail
                                            </a>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Durasi: {{ $userTryout->duration ? \Carbon\Carbon::parse($userTryout->duration)->format('H:i:s') : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $userTryouts->links() }}
                    </div>
                @else
                    <div class="p-12 text-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada riwayat tryout</h3>
                        <p class="text-gray-600 mb-6">Mulai kerjakan tryout untuk melihat riwayat Anda di sini</p>
                        <a href="{{ route('tryouts.index') }}"
                           class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Mulai Tryout
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
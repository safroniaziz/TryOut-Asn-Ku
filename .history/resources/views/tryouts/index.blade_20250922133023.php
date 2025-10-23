<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-blue-900 leading-tight">
                    <i class="fas fa-book-open mr-2"></i>TryOut CPNS & PPPK
                </h2>
                <p class="text-blue-600 mt-1">Pilih tryout untuk mengasah kemampuan Anda</p>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Filter Kategori -->
            <div class="mb-6 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Filter Kategori</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('tryouts.index') }}" class="px-4 py-2 rounded-lg font-medium transition-colors {{ !request('type') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Semua TryOut
                    </a>
                    <a href="{{ route('tryouts.index', ['type' => 'CPNS']) }}" class="px-4 py-2 rounded-lg font-medium transition-colors {{ request('type') === 'CPNS' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-building mr-2"></i>CPNS
                    </a>
                    <a href="{{ route('tryouts.index', ['type' => 'PPPK']) }}" class="px-4 py-2 rounded-lg font-medium transition-colors {{ request('type') === 'PPPK' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <i class="fas fa-user-tie mr-2"></i>PPPK
                    </a>
                </div>
            </div>

            <!-- Grid TryOut -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($tryouts as $tryout)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                        <!-- Header dengan badge -->
                        <div class="relative p-6 bg-gradient-to-br from-{{ $tryout->type === 'CPNS' ? 'blue-500' : 'green-500' }} to-{{ $tryout->type === 'CPNS' ? 'blue-600' : 'green-600' }} text-white">
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/20 backdrop-blur-sm">
                                    {{ $tryout->type }}
                                </span>
                                @if(auth()->user()->hasCompletedTryout($tryout->id))
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500">
                                        <i class="fas fa-check mr-1"></i>Selesai
                                    </span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ $tryout->title }}</h3>
                            <p class="text-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-100 text-sm">{{ $tryout->kategori }}</p>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $tryout->description }}</p>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-clock mr-2 text-orange-500"></i>
                                    <span>{{ $tryout->duration_minutes }} menit</span>
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-question-circle mr-2 text-blue-500"></i>
                                    <span>{{ $tryout->total_questions }} soal</span>
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-users mr-2 text-green-500"></i>
                                    <span>{{ $tryout->leaderboards_count ?? 0 }} peserta</span>
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-trophy mr-2 text-yellow-500"></i>
                                    @if(auth()->user()->hasCompletedTryout($tryout->id))
                                        <span>Skor: {{ auth()->user()->getTryoutScore($tryout->id) }}</span>
                                    @else
                                        <span>Belum dikerjakan</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3">
                                @if(auth()->user()->hasCompletedTryout($tryout->id))
                                    <a href="{{ route('tryouts.result', $tryout) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-3 px-4 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-chart-bar mr-2"></i>Lihat Hasil
                                    </a>
                                    <a href="{{ route('leaderboards.show', $tryout) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 px-4 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-trophy"></i>
                                    </a>
                                @else
                                    <a href="{{ route('tryouts.show', $tryout) }}" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white text-center py-3 px-4 rounded-lg font-medium transition-all duration-200 transform hover:scale-105">
                                        <i class="fas fa-play mr-2"></i>Mulai TryOut
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-book-open text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada TryOut</h3>
                            <p class="text-gray-500">TryOut akan segera tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($tryouts->hasPages())
                <div class="mt-8">
                    {{ $tryouts->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

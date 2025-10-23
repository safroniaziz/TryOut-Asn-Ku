<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('tryouts.index') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-blue-900 leading-tight">{{ $tryout->title }}</h2>
                <p class="text-blue-600 mt-1">{{ $tryout->type }} - {{ $tryout->kategori }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- TryOut Info Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <!-- Header -->
                <div class="bg-gradient-to-br from-{{ $tryout->type === 'CPNS' ? 'blue-500' : 'green-500' }} to-{{ $tryout->type === 'CPNS' ? 'blue-600' : 'green-600' }} text-white p-8">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-white/20 backdrop-blur-sm">
                            <i class="fas fa-{{ $tryout->type === 'CPNS' ? 'building' : 'user-tie' }} mr-2"></i>
                            {{ $tryout->type }}
                        </span>
                        @if($hasCompleted)
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-500">
                                <i class="fas fa-check mr-2"></i>Sudah Selesai
                            </span>
                        @endif
                    </div>
                    <h1 class="text-3xl font-bold mb-2">{{ $tryout->title }}</h1>
                    <p class="text-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-100 text-lg">{{ $tryout->kategori }}</p>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <!-- Description -->
                    @if($tryout->description)
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-3">Deskripsi</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $tryout->description }}</p>
                        </div>
                    @endif

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-clock text-orange-600 text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">{{ $tryout->duration_minutes }}</div>
                            <div class="text-sm text-gray-500">Menit</div>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-question-circle text-blue-600 text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">{{ $tryout->total_questions }}</div>
                            <div class="text-sm text-gray-500">Soal</div>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-users text-green-600 text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">{{ $tryout->leaderboards()->count() }}</div>
                            <div class="text-sm text-gray-500">Peserta</div>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-trophy text-purple-600 text-xl"></i>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">
                                @if($hasCompleted)
                                    {{ auth()->user()->getTryoutScore($tryout->id) }}
                                @else
                                    -
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">Skor Anda</div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">
                            <i class="fas fa-info-circle mr-2"></i>Instruksi TryOut
                        </h3>
                        <ul class="space-y-2 text-blue-800">
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Waktu pengerjaan adalah <strong>{{ $tryout->duration_minutes }} menit</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Jumlah soal sebanyak <strong>{{ $tryout->total_questions }} butir</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Setiap jawaban benar bernilai <strong>5 poin</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Jawaban salah <strong>tidak mengurangi nilai</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Setelah selesai, Anda dapat melihat <strong>pembahasan</strong> setiap soal</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>TryOut hanya dapat dikerjakan <strong>sekali</strong></span>
                            </li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        @if($hasCompleted)
                            <a href="{{ route('tryouts.result', $tryout) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-4 px-6 rounded-lg font-bold text-lg transition-colors">
                                <i class="fas fa-chart-bar mr-2"></i>Lihat Hasil & Pembahasan
                            </a>
                            <a href="{{ route('leaderboards.show', $tryout) }}" class="bg-gray-600 hover:bg-gray-700 text-white text-center py-4 px-6 rounded-lg font-bold text-lg transition-colors">
                                <i class="fas fa-trophy mr-2"></i>Leaderboard
                            </a>
                        @else
                            <form action="{{ route('tryouts.start', $tryout) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-4 px-6 rounded-lg font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-play mr-2"></i>Mulai TryOut Sekarang
                                </button>
                            </form>
                            <a href="{{ route('leaderboards.show', $tryout) }}" class="bg-gray-600 hover:bg-gray-700 text-white text-center py-4 px-6 rounded-lg font-bold text-lg transition-colors">
                                <i class="fas fa-trophy mr-2"></i>Lihat Ranking
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Related Materials -->
            @if($tryout->materis()->count() > 0)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-download mr-2 text-green-600"></i>Materi Terkait
                        </h3>
                        <a href="{{ route('materis.by-tryout', $tryout) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($tryout->materis()->take(4)->get() as $materi)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900 flex items-center">
                                        {{ $materi->title }}
                                        @if($materi->is_premium)
                                            <i class="fas fa-crown text-orange-500 ml-2 text-sm"></i>
                                        @endif
                                    </h4>
                                    <p class="text-sm text-gray-500">{{ $materi->getFileSizeFormatted() }}</p>
                                </div>
                                <a href="{{ route('materis.show', $materi) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
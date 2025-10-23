@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Hasil Tryout</h1>
            <p class="text-gray-600">{{ $tryout->title }}</p>
        </div>

        <!-- Your Score Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">Peringkat #{{ $leaderboard->rank }}</p>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-gray-800">{{ $leaderboard->total_skor }}</div>
                    <p class="text-gray-600 text-sm">Total Skor</p>
                </div>
            </div>

            <!-- Score Details -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="text-center p-3 bg-green-50 rounded">
                    <div class="text-xl font-semibold text-green-600">{{ $leaderboard->benar }}</div>
                    <div class="text-xs text-gray-600">Benar</div>
                </div>
                <div class="text-center p-3 bg-red-50 rounded">
                    <div class="text-xl font-semibold text-red-600">{{ $leaderboard->salah }}</div>
                    <div class="text-xs text-gray-600">Salah</div>
                </div>
                <div class="text-center p-3 bg-gray-100 rounded">
                    <div class="text-xl font-semibold text-gray-600">{{ $leaderboard->tidak_dijawab }}</div>
                    <div class="text-xs text-gray-600">Kosong</div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div>
                <div class="flex justify-between text-sm text-gray-600 mb-1">
                    <span>Progress</span>
                    <span>{{ $leaderboard->persentase }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-500"
                         style="width: {{ $leaderboard->persentase }}%">
                    </div>
                </div>
            </div>
        </div>

        <!-- Leaderboard -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Papan Peringkat</h3>

            <div class="space-y-2">
                @php
                    $leaderboards = App\Models\Leaderboard::with('user')
                        ->where('tryout_id', $tryout->id)
                        ->orderBy('total_skor', 'desc')
                        ->orderBy('waktu_pengerjaan_detik', 'asc')
                        ->limit(10)
                        ->get();
                @endphp

                @foreach($leaderboards as $index => $lb)
                    <div class="flex items-center p-3 rounded-lg {{ $lb->user_id === Auth::id() ? 'bg-blue-50 border border-blue-200' : 'hover:bg-gray-50' }}">
                        <!-- Rank -->
                        <div class="w-8 text-center font-semibold text-gray-600 mr-3">
                            @if($index == 0)
                                <span class="text-yellow-500">1</span>
                            @elseif($index == 1)
                                <span class="text-gray-400">2</span>
                            @elseif($index == 2)
                                <span class="text-orange-600">3</span>
                            @else
                                {{ $index + 1 }}
                            @endif
                        </div>

                        <!-- User Info -->
                        <div class="flex-grow">
                            <div class="font-medium text-gray-800">
                                {{ $lb->user->name }}
                                @if($lb->user_id === Auth::id())
                                    <span class="ml-2 text-xs bg-blue-600 text-white px-2 py-1 rounded">Anda</span>
                                @endif
                            </div>
                            <div class="text-sm text-gray-600">{{ $lb->persentase }}% • {{ gmdate('i:s', $lb->waktu_pengerjaan_detik) }}</div>
                        </div>

                        <!-- Score -->
                        <div class="text-right">
                            <div class="font-semibold text-gray-800">{{ $lb->total_skor }}</div>
                            <div class="text-xs text-gray-600">skor</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center space-x-4">
            <a href="{{ route('dashboard') }}"
               class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            <a href="{{ route('tryouts.show', $tryout) }}"
               class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                <i class="fas fa-redo mr-2"></i>Coba Lagi
            </a>
        </div>
    </div>
</div>

@endsection
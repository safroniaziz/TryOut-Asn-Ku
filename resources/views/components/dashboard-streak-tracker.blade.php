@props([
    'currentStreak',
    'longestStreak',
    'thisWeek' => [],
    'lastWeek' => []
])

@php
    $today = now()->format('Y-m-d');
    $weekDays = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
@endphp

<div class="enhanced-card rounded-2xl p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-800">🔥 Streak Belajar</h3>
        <div class="flex items-center gap-2">
            <div class="text-sm text-gray-600">Terpanjang:</div>
            <div class="text-lg font-bold text-orange-600">{{ $longestStreak }} hari</div>
        </div>
    </div>

    <!-- Current Streak Display -->
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-orange-400 to-red-500 rounded-full mb-3 pulse">
            <div class="text-white text-center">
                <div class="text-2xl font-bold">{{ $currentStreak }}</div>
                <div class="text-xs">Hari</div>
            </div>
        </div>
        @if($currentStreak > 0)
            <p class="text-sm text-gray-700 font-medium">
                🎉 {{ $currentStreak }} hari berturut-turut!
            </p>
        @else
            <p class="text-sm text-gray-500">
                Mulai streak Anda hari ini!
            </p>
        @endif
    </div>

    <!-- Weekly Progress -->
    <div class="mb-6">
        <h4 class="text-sm font-bold text-gray-700 mb-3">Progress Minggu Ini</h4>
        <div class="grid grid-cols-7 gap-2">
            @for($i = 0; $i < 7; $i++)
                @php
                    $date = now()->startOfWeek()->addDays($i)->format('Y-m-d');
                    $isToday = $date === $today;
                    $hasActivity = in_array($date, $thisWeek);
                    $isPast = $date < $today;
                    $isFuture = $date > $today;
                @endphp

                <div class="text-center">
                    <div class="text-xs text-gray-600 mb-1">{{ $weekDays[$i] }}</div>
                    <div class="streak-day relative">
                        <div class="w-10 h-10 mx-auto rounded-full border-2 flex items-center justify-center text-xs font-bold transition-all duration-300
                            @if($hasActivity)
                                bg-green-500 border-green-600 text-white scale-110
                            @elseif($isToday)
                                border-gray-400 text-gray-700 bg-yellow-100
                            @elseif($isPast)
                                border-gray-200 text-gray-400 bg-gray-100
                            @else
                                border-gray-200 text-gray-400
                            @endif
                            {{ $isToday ? 'ring-2 ring-yellow-400' : '' }}">
                            @if($hasActivity)
                                <i class="fas fa-check"></i>
                            @elseif($isToday)
                                <i class="fas fa-fire"></i>
                            @else
                                {{ now()->startOfWeek()->addDays($i)->format('j') }}
                            @endif
                        </div>

                        <!-- Tooltip -->
                        @if($hasActivity || $isToday)
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 pointer-events-none transition-opacity whitespace-nowrap">
                                @if($hasActivity)
                                    ✅ Belajar aktif
                                @elseif($isToday)
                                    🔥 Hari ini
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Streak Milestones -->
    <div class="border-t pt-4">
        <h4 class="text-sm font-bold text-gray-700 mb-3">Target Streak</h4>
        <div class="space-y-2">
            @foreach([7, 14, 30, 60, 100] as $milestone)
                @php
                    $achieved = $longestStreak >= $milestone;
                    $current = $currentStreak >= $milestone;
                @endphp

                <div class="flex items-center justify-between p-2 rounded-lg {{ $current ? 'bg-green-50' : ($achieved ? 'bg-gray-50' : 'bg-white') }}">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs
                            @if($current)
                                bg-green-500 text-white
                            @elseif($achieved)
                                bg-gray-400 text-white
                            @else
                                border-2 border-gray-300 text-gray-400
                            @endif">
                            @if($current || $achieved)
                                <i class="fas fa-check"></i>
                            @else
                                {{ $milestone }}
                            @endif
                        </div>
                        <span class="text-sm font-medium {{ $current ? 'text-green-700' : ($achieved ? 'text-gray-600' : 'text-gray-500') }}">
                            {{ $milestone }} hari
                        </span>
                    </div>
                    @if($current)
                        <span class="text-xs font-bold text-green-600">🔥 Aktif</span>
                    @elseif($achieved)
                        <span class="text-xs text-gray-500">✅ Selesai</span>
                    @else
                        <span class="text-xs text-gray-400">{{ $milestone - $currentStreak }} hari lagi</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Motivational Message -->
    <div class="mt-4 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg border border-orange-200">
        <div class="flex items-start gap-2">
            <i class="fas fa-lightbulb text-orange-500 mt-0.5"></i>
            <div class="text-sm text-gray-700">
                @if($currentStreak == 0)
                    <strong>Memulai perjalanan!</strong> Setiap hari belajar membawa Anda lebih dekat ke tujuan.
                @elseif($currentStreak < 7)
                    <strong>Hebat!</strong> Anda sudah {{ $currentStreak }} hari. Targetkan 7 hari pertama!
                @elseif($currentStreak < 30)
                    <strong>Luar biasa!</strong> {{ $currentStreak }} hari konsistensi. Pertahankan momentum!
                @else
                    <strong>Amaaazing!</strong> {{ $currentStreak }} hari disiplin. Anda inspirasi!
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.streak-day:hover .absolute {
    opacity: 1;
}
</style>
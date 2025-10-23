{{-- Stats Grid Module --}}
@if(isset($stats))
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Total Score -->
        <div class="bg-gradient-to-br from-blue-600 to-indigo-600 text-white p-6 rounded-lg border border-blue-400">
            <div class="text-center">
                <div class="text-3xl font-bold">{{ $stats['best_score'] ?? 0 }}</div>
                <div class="text-sm">Skor Tertinggi</div>
                <div class="text-xs opacity-75">dari {{ $stats['total_tryouts_completed'] ?? 0 }} tryout</div>
            </div>
        </div>

        <!-- Average Score -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600">{{ $stats['avg_score'] ?? 0 }}</div>
                <div class="text-sm">Skor Rata-rata</div>
                <div class="text-xs opacity-75">dari {{ $stats['total_tryouts_completed'] ?? 0 }} tryout</div>
            </div>
        </div>

        <!-- Accuracy Rate -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-green-600">{{ round($stats['accuracy_rate'] ?? 0) }}%</div>
                <div class="text-sm">Tingkat Keakuratan</div>
                <div class="text-xs opacity-75">dari {{ $stats['total_answered'] ?? 0 }} jawaban</div>
            </div>
        </div>

        <!-- Streak Days -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-orange-600">{{ $stats['current_streak'] ?? 1 }}</div>
                <div class="text-sm">Hari Beruntun</div>
                <div class="text-xs opacity-75">berturut-turut</div>
            </div>
        </div>

        <!-- Experience Level -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">{{ $stats['experience_level'] ?? 'Pemula' }}</div>
                <div class="text-sm">Level Pengalaman</div>
                <div class="text-xs opacity-75">Level {{ $stats['current_level'] ?? 1 }}</div>
            </div>
        </div>

        <!-- Category Count -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-indigo-600">{{ $stats['categories_tried'] ?? 0 }}</div>
                <div class="text-sm">Kategori Dicoba</div>
            </div>
        </div>
    @else
        <div class="col-span-full bg-gray-100 p-6 rounded-lg">
            <div class="text-center text-gray-500">
                <div class="text-4xl mb-4">📊</div>
                <p class="text-lg">Statistik tidak tersedia</p>
            </div>
        </div>
    @endif
</div>
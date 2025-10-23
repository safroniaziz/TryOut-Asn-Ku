@props([
    'title',
    'value',
    'icon',
    'color' => 'blue',
    'progress' => null,
    'trend' => null,
    'description' => null
])

@php
    $colorClasses = [
        'blue' => 'from-blue-500 to-cyan-500',
        'green' => 'from-green-500 to-emerald-500',
        'purple' => 'from-purple-500 to-pink-500',
        'orange' => 'from-orange-500 to-red-500',
        'indigo' => 'from-indigo-500 to-purple-500'
    ];

    $bgColor = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="enhanced-card group cursor-pointer" onclick="this.classList.toggle('expanded')">
    <div class="relative overflow-hidden">
        <!-- Glow Effect on Hover -->
        <div class="absolute -inset-1 bg-gradient-to-r {{ $bgColor }} rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>

        <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $bgColor }} rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="{{ $icon }} text-white text-xl"></i>
                </div>

                @if($trend)
                    <div class="flex items-center text-sm {{ $trend > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                        <i class="fas fa-arrow-{{ $trend > 0 ? 'up' : 'down' }} mr-1"></i>
                        {{ abs($trend) }}%
                    </div>
                @endif
            </div>

            <!-- Main Content -->
            <div class="mb-4">
                <div class="text-3xl font-bold text-gray-800 animated-number">{{ $value }}</div>
                <div class="text-sm font-medium text-gray-600 uppercase tracking-wide">{{ $title }}</div>
                @if($description)
                    <div class="text-xs text-gray-500 mt-1">{{ $description }}</div>
                @endif
            </div>

            <!-- Progress Bar (if provided) -->
            @if($progress !== null)
                <div class="mb-3">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs text-gray-600">Progress</span>
                        <span class="text-xs font-bold text-{{ $color }}-600">{{ $progress }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="progress-bar-animated h-2 rounded-full bg-gradient-to-r {{ $bgColor }}" style="width: {{ min($progress, 100) }}%"></div>
                    </div>
                </div>
            @endif

            <!-- Expandable Details -->
            <div class="expandable-details hidden mt-4 pt-4 border-t border-gray-100">
                <div class="text-sm text-gray-600">
                    <slot name="details">
                        <p>Detail informasi akan ditampilkan di sini.</p>
                    </slot>
                </div>
            </div>

            <!-- Expand Button -->
            @if(isset($expandable) && $expandable)
                <button class="text-xs text-{{ $color }}-600 font-medium hover:text-{{ $color }}-700 transition-colors mt-2">
                    <i class="fas fa-chevron-down mr-1"></i>
                    Lihat Detail
                </button>
            @endif
        </div>
    </div>
</div>
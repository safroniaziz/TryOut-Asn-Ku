<x-app-layout>
    <x-slot name="title">
        Detail Tryout - {{ $tryout->tryout->title }} - {{ config('app.name') }}
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <a href="{{ route('dashboard.history') }}"
                           class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-4">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Riwayat
                        </a>
                        <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-clipboard-check text-indigo-600 mr-3"></i>
                            {{ $tryout->tryout->title }}
                        </h1>
                        <div class="flex items-center space-x-6 text-sm text-gray-600 mt-2">
                            <span class="flex items-center">
                                <i class="fas fa-tag mr-1"></i>
                                {{ $tryout->tryout->type }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-layer-group mr-1"></i>
                                {{ $tryout->tryout->kategori }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-calendar mr-1"></i>
                                {{ $tryout->created_at->format('d M Y H:i') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Result Summary -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Total Skor</p>
                                <p class="text-2xl font-bold text-indigo-600">{{ $tryout->total_skor }}</p>
                            </div>
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-star text-indigo-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Jawaban Benar</p>
                                <p class="text-2xl font-bold text-green-600">{{ $tryout->benar }}/{{ $tryout->total_soal }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Akurasi</p>
                                <p class="text-2xl font-bold text-blue-600">{{ number_format($tryout->persentase, 1) }}%</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-percentage text-blue-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Durasi</p>
                                <p class="text-2xl font-bold text-purple-600">
                                    {{ $tryout->duration ? \Carbon\Carbon::parse($tryout->duration)->format('H:i:s') : 'N/A' }}
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-purple-600"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Summary -->
                @if($answersByCategory && count($answersByCategory) > 1)
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan per Kategori</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($answersByCategory as $category => $data)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="font-medium text-gray-900">{{ $category }}</h3>
                                        <span class="text-lg font-bold {{ $data['percentage'] >= 70 ? 'text-green-600' : ($data['percentage'] >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                                            {{ $data['percentage'] }}%
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">{{ $data['correct'] }} benar</span>
                                        <span class="text-gray-600">dari {{ $data['total'] }} soal</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                                        <div class="bg-gradient-to-r {{ $data['percentage'] >= 70 ? 'from-green-500 to-green-600' : ($data['percentage'] >= 50 ? 'from-yellow-500 to-yellow-600' : 'from-red-500 to-red-600') }} h-2 rounded-full"
                                             style="width: {{ $data['percentage'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Detailed Answers -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Detail Jawaban</h2>
                    </div>

                    <div class="divide-y divide-gray-200">
                        @foreach($tryout->answers as $index => $answer)
                            <div class="p-6 {{ $answer->is_correct ? 'bg-green-50' : 'bg-red-50' }}">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center {{ $answer->is_correct ? 'bg-green-500' : 'bg-red-500' }}">
                                            <span class="text-white font-bold">{{ $index + 1 }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="mb-3">
                                            <div class="flex items-center mb-2">
                                                <h3 class="text-base font-medium text-gray-900 mr-3">
                                                    {{ $answer->question->pertanyaan }}
                                                </h3>
                                                @if($answer->is_correct)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-check mr-1"></i>
                                                        Benar
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        <i class="fas fa-times mr-1"></i>
                                                        Salah
                                                    </span>
                                                @endif
                                            </div>

                                            @if($answer->question->gambar)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $answer->question->gambar) }}"
                                                         alt="Soal"
                                                         class="max-w-sm rounded-lg">
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Options -->
                                        <div class="space-y-2">
                                            @foreach($answer->question->options as $option)
                                                <div class="flex items-center p-3 rounded-lg border {{
                                                    $option->id === $answer->selected_option_id
                                                        ? ($option->is_correct ? 'border-green-500 bg-green-50' : 'border-red-500 bg-red-50')
                                                        : ($option->is_correct ? 'border-green-300 bg-green-50' : 'border-gray-200 bg-gray-50')
                                                }}">
                                                    <div class="flex items-center flex-1">
                                                        <div class="flex items-center justify-center w-6 h-6 rounded-full border-2 {{
                                                            $option->id === $answer->selected_option_id
                                                                ? 'border-gray-900'
                                                                : 'border-gray-300'
                                                        }}">
                                                            @if($option->id === $answer->selected_option_id)
                                                                <div class="w-2 h-2 bg-gray-900 rounded-full"></div>
                                                            @endif
                                                        </div>
                                                        <div class="ml-3 flex-1">
                                                            <div class="text-sm {{
                                                                $option->id === $answer->selected_option_id
                                                                    ? 'font-medium text-gray-900'
                                                                    : 'text-gray-700'
                                                            }}">
                                                                {{ $option->teks }}
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center ml-3">
                                                            @if($option->id === $answer->selected_option_id)
                                                                @if($option->is_correct)
                                                                    <i class="fas fa-check text-green-600"></i>
                                                                @else
                                                                    <i class="fas fa-times text-red-600"></i>
                                                                @endif
                                                            @else
                                                                @if($option->is_correct)
                                                                    <i class="fas fa-check text-green-600"></i>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Explanation (if available) -->
                                        @if($answer->question->pembahasan)
                                            <div class="mt-3 p-3 bg-blue-50 rounded-lg">
                                                <div class="flex items-start">
                                                    <i class="fas fa-info-circle text-blue-600 mt-0.5 mr-2"></i>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-blue-900 mb-1">Pembahasan:</h4>
                                                        <p class="text-sm text-blue-800">{{ $answer->question->pembahasan }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <h2 class="font-bold text-xl text-blue-900">{{ $tryout->title }}</h2>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    Soal {{ $currentIndex + 1 }} dari {{ $allSoals->count() }}
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Timer -->
                <div id="timer" class="bg-orange-100 text-orange-800 px-4 py-2 rounded-lg font-bold">
                    <i class="fas fa-clock mr-2"></i>
                    <span id="timer-display">{{ $tryout->duration_minutes }}:00</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Progress</span>
                    <span class="text-sm font-medium text-gray-700">{{ number_format((($currentIndex + 1) / $allSoals->count()) * 100, 1) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 h-2 rounded-full transition-all duration-300" style="width: {{ (($currentIndex + 1) / $allSoals->count()) * 100 }}%"></div>
                </div>
            </div>

            <!-- Question Card -->
            <div class="bg-white rounded-xl shadow-lg mb-6">
                <div class="p-8">
                    <!-- Question Number & Category -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                                {{ $soal->nomor_soal }}
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Soal Nomor {{ $soal->nomor_soal }}</div>
                                <div class="text-sm text-gray-500">{{ $soal->kategori }}</div>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-100 text-{{ $tryout->type === 'CPNS' ? 'blue' : 'green' }}-800">
                            {{ $tryout->type }}
                        </span>
                    </div>

                    <!-- Question Text -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Pertanyaan:</h3>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                            <p class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $soal->pertanyaan }}</p>
                        </div>
                    </div>

                    <!-- Answer Form -->
                    <form action="{{ route('tryouts.answer', [$tryout, $soal]) }}" method="POST" id="answer-form">
                        @csrf
                        <div class="space-y-4">
                            @foreach(['A', 'B', 'C', 'D', 'E'] as $option)
                                <label class="flex items-start p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors group {{ $existingAnswer && $existingAnswer->jawaban === $option ? 'bg-blue-50 border-blue-300' : '' }}">
                                    <input type="radio" name="jawaban" value="{{ $option }}" class="mt-1 mr-4 text-blue-600 focus:ring-blue-500" {{ $existingAnswer && $existingAnswer->jawaban === $option ? 'checked' : '' }}>
                                    <div class="flex-1">
                                        <div class="flex items-start">
                                            <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 group-hover:bg-blue-100 text-gray-700 group-hover:text-blue-700 rounded-full font-bold mr-3 transition-colors">
                                                {{ $option }}
                                            </span>
                                            <p class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $soal->{'pilihan_' . strtolower($option)} }}</p>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        @error('jawaban')
                            <div class="mt-4 text-red-600 text-sm">{{ $message }}</div>
                        @enderror

                        <!-- Navigation Buttons -->
                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                            <!-- Previous Button -->
                            <div>
                                @if($currentIndex > 0)
                                    @php $prevSoal = $allSoals[$currentIndex - 1]; @endphp
                                    <a href="{{ route('tryouts.question', [$tryout, $prevSoal]) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 font-medium transition-colors">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Sebelumnya
                                    </a>
                                @endif
                            </div>

                            <!-- Next/Submit Button -->
                            <div class="flex items-center space-x-3">
                                @if($currentIndex < $allSoals->count() - 1)
                                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                        Selanjutnya
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                @else
                                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                                        <i class="fas fa-check mr-2"></i>
                                        Selesai
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Question Navigation -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Navigasi Soal</h3>
                <div class="grid grid-cols-5 sm:grid-cols-10 gap-2">
                    @foreach($allSoals as $index => $item)
                        @php
                            $answered = \App\Models\JawabanUser::where([
                                'user_id' => auth()->id(),
                                'tryout_id' => $tryout->id,
                                'soal_id' => $item->id
                            ])->exists();
                        @endphp
                        <a href="{{ route('tryouts.question', [$tryout, $item]) }}" class="w-10 h-10 rounded-lg flex items-center justify-center text-sm font-medium transition-colors
                            {{ $index === $currentIndex ? 'bg-blue-600 text-white' :
                               ($answered ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-100 text-gray-700 hover:bg-gray-200') }}">
                            {{ $item->nomor_soal }}
                        </a>
                    @endforeach
                </div>
                <div class="flex items-center justify-center space-x-6 mt-4 text-sm">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-600 rounded mr-2"></div>
                        <span class="text-gray-600">Sedang dikerjakan</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-green-100 border border-green-300 rounded mr-2"></div>
                        <span class="text-gray-600">Sudah dijawab</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-gray-100 border border-gray-300 rounded mr-2"></div>
                        <span class="text-gray-600">Belum dijawab</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Timer & Auto-submit JavaScript -->
    <script>
        // Timer functionality
        let timeLeft = {{ $tryout->duration_minutes }} * 60; // Convert to seconds
        const timerDisplay = document.getElementById('timer-display');
        const form = document.getElementById('answer-form');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            // Change color when time is running out
            const timer = document.getElementById('timer');
            if (timeLeft <= 300) { // 5 minutes left
                timer.className = 'bg-red-100 text-red-800 px-4 py-2 rounded-lg font-bold animate-pulse';
            } else if (timeLeft <= 600) { // 10 minutes left
                timer.className = 'bg-yellow-100 text-yellow-800 px-4 py-2 rounded-lg font-bold';
            }

            if (timeLeft <= 0) {
                // Auto submit when time is up
                alert('Waktu habis! TryOut akan diselesaikan secara otomatis.');
                window.location.href = '{{ route("tryouts.submit", $tryout) }}';
                return;
            }

            timeLeft--;
        }

        // Update timer every second
        const timerInterval = setInterval(updateTimer, 1000);

        // Handle form submission
        form.addEventListener('submit', function() {
            clearInterval(timerInterval);
        });

        // Auto-save answer when radio button is selected
        const radioButtons = document.querySelectorAll('input[name="jawaban"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                // You can add auto-save functionality here if needed
                // For now, we'll just highlight the selected answer
                document.querySelectorAll('label').forEach(label => {
                    label.classList.remove('bg-blue-50', 'border-blue-300');
                });
                this.closest('label').classList.add('bg-blue-50', 'border-blue-300');
            });
        });

        // Warn user before leaving page
        window.addEventListener('beforeunload', function(e) {
            e.preventDefault();
            e.returnValue = 'Apakah Anda yakin ingin meninggalkan halaman? Progress TryOut Anda mungkin akan hilang.';
        });

        // Remove warning when form is submitted
        form.addEventListener('submit', function() {
            window.removeEventListener('beforeunload', function() {});
        });
    </script>
</x-app-layout>

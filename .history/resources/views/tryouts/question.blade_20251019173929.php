<x-app-layout>

    <!-- Progress Header - Sticky -->
    <div class="bg-gradient-to-br {{ $tryout->type === 'CPNS' ? 'from-blue-900 via-blue-800 to-blue-900' : 'from-emerald-900 via-green-800 to-emerald-900' }} sticky top-0 z-40 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <!-- Progress Info -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center">
                        <i class="fas fa-{{ $tryout->type === 'CPNS' ? 'building' : 'user-tie' }} text-white text-xl"></i>
                    </div>
                    <div class="text-white">
                        <h1 class="text-xl font-bold">{{ $tryout->title }}</h1>
                        <p class="text-white/80 text-sm"><span id="question-category">{{ $soal->kategori }}</span> • Soal <span id="question-number">{{ $currentIndex + 1 }}</span> dari {{ $allSoals->count() }}</p>
                    </div>
                </div>

                <!-- Timer -->
                <div id="timer" class="bg-white/10 backdrop-blur-md text-white px-6 py-3 rounded-xl font-bold text-lg flex items-center">
                    <i class="fas fa-clock mr-3"></i>
                    <span id="timer-display">{{ $tryout->duration_minutes }}:00</span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="relative">
                @php
                    $answeredCount = \App\Models\JawabanUser::where([
                        'user_id' => auth()->id(),
                        'tryout_id' => $tryout->id
                    ])->count();
                    $progressPercentage = $allSoals->count() > 0 ? ($answeredCount / $allSoals->count()) * 100 : 0;
                @endphp
                <div class="w-full bg-white/10 rounded-full h-3">
                    <div id="header-progress-bar" class="bg-gradient-to-r from-green-400 to-emerald-500 h-3 rounded-full transition-all duration-500 shadow-lg" style="width: {{ $progressPercentage }}%"></div>
                </div>
                <div class="flex justify-between mt-2">
                    <span id="header-progress-text" class="text-white/80 text-sm">{{ number_format($progressPercentage, 1) }}% Complete</span>
                    <span id="header-progress-count" class="text-white/80 text-sm">{{ $answeredCount }} / {{ $allSoals->count() }} soal</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-12 gap-6">
                <!-- Left Sidebar - Question Navigation (Wider) -->
                <div class="col-span-4">
                    <div class="bg-white rounded-xl shadow-xl p-6 sticky top-6">
                        <!-- Header -->
                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl mb-4 shadow-lg">
                                <i class="fas fa-list-ol text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-black text-gray-900">Navigasi Soal</h3>
                        </div>

                        <!-- Navigation Grid -->
                        <div class="grid grid-cols-10 gap-1 mb-6" id="navigation-grid">
                            @foreach($allSoals as $index => $item)
                                @php
                                    $answered = \App\Models\JawabanUser::where([
                                        'user_id' => auth()->id(),
                                        'tryout_id' => $tryout->id,
                                        'soal_id' => $item->id
                                    ])->exists();

                                    // FIXED: Prioritize current status over answered status
                                    // Current question should always be blue (so user knows their position)
                                    if ($index === $currentIndex) {
                                        $buttonClass = 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-md ring-2 ring-blue-300 transform scale-105';
                                    } elseif ($answered) {
                                        $buttonClass = 'bg-gradient-to-r from-green-500 to-green-600 text-white shadow-sm hover:shadow-md';
                                    } else {
                                        $buttonClass = 'bg-gray-400 text-white hover:bg-gray-500 shadow-sm hover:shadow-sm';
                                    }
                                @endphp
                                <button type="button" data-question="{{ $item->nomor_soal }}" data-soal-id="{{ $item->id }}"
                                   class="nav-question w-full aspect-square rounded-md flex items-center justify-center text-xs font-black transition-all duration-300 hover:scale-105 shadow-sm {{ $buttonClass }}">
                                    {{ $item->nomor_soal }}
                                </button>
                            @endforeach
                        </div>

                        <!-- Legend -->
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg mr-3 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Sedang dikerjakan</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-gradient-to-r from-green-500 to-green-600 rounded-lg mr-3 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Sudah dijawab</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-gray-400 rounded-lg mr-3 shadow-sm"></div>
                                <span class="text-sm font-bold text-gray-700">Belum dijawab</span>
                            </div>
                        </div>

                        <!-- Progress Stats -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200">
                            <div class="text-center">
                                @php
                                    $sidebarAnsweredCount = \App\Models\JawabanUser::where(['user_id' => auth()->id(), 'tryout_id' => $tryout->id])->count();
                                    $sidebarPercentage = $allSoals->count() > 0 ? ($sidebarAnsweredCount / $allSoals->count()) * 100 : 0;
                                @endphp
                                <div id="sidebar-progress-count" class="text-3xl font-black text-gray-900 mb-2">
                                    {{ $sidebarAnsweredCount }}/{{ $allSoals->count() }}
                                </div>
                                <div class="text-sm font-bold text-gray-600 mb-4">Soal Dijawab</div>

                                <!-- Progress Bar -->
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div id="sidebar-progress-bar" class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full transition-all duration-500 shadow-inner" style="width: {{ $sidebarPercentage }}%"></div>
                                </div>
                                <div class="mt-2">
                                    <span id="sidebar-progress-text" class="text-xs font-bold text-gray-700">{{ number_format($sidebarPercentage, 1) }}% Selesai</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="space-y-3">
                            @if($currentIndex > 0)
                                @php $prevSoal = $allSoals[$currentIndex - 1]; @endphp
                                <a href="{{ route('tryouts.question', [$tryout, $prevSoal]) }}" class="w-full flex items-center justify-center px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-xl font-bold text-gray-700 transition-all duration-200 transform hover:scale-105">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Sebelumnya
                                </a>
                            @endif
                            @if($currentIndex < $allSoals->count() - 1)
                                @php $nextSoal = $allSoals[$currentIndex + 1]; @endphp
                                <a href="{{ route('tryouts.question', [$tryout, $nextSoal]) }}" class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r {{ $tryout->type === 'CPNS' ? 'from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800' : 'from-emerald-600 to-green-700 hover:from-emerald-700 hover:to-green-800' }} text-white rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg">
                                    Selanjutnya
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            @else
                                <form action="{{ route('tryouts.submit', $tryout) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        Selesai
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Main Content - Question -->
                <div class="col-span-8">
                    <!-- Timer & Info Bar -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-6">
                                <div>
                                    <h2 class="text-xl font-black text-gray-900">{{ $tryout->title }}</h2>
                                    <div class="flex items-center space-x-3 mt-1">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                                            <i class="fas fa-list-ol mr-2"></i>
                                            Soal {{ $currentIndex + 1 }} dari {{ $allSoals->count() }}
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                            <i class="fas fa-tag mr-1"></i>
                                            {{ $soal->kategori }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <!-- Timer -->
                                <div id="timer" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-3 rounded-xl font-bold flex items-center shadow-lg">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span id="timer-display">{{ $tryout->duration_minutes }}:00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div>
                            @php
                                $mainAnsweredCount = \App\Models\JawabanUser::where(['user_id' => auth()->id(), 'tryout_id' => $tryout->id])->count();
                                $mainPercentage = $allSoals->count() > 0 ? ($mainAnsweredCount / $allSoals->count()) * 100 : 0;
                            @endphp
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div id="main-progress-bar" class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full transition-all duration-500 shadow-inner" style="width: {{ $mainPercentage }}%"></div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span id="main-progress-text" class="text-sm font-bold text-gray-700">Progress: {{ number_format($mainPercentage, 1) }}%</span>
                                <span id="main-progress-count" class="text-sm text-gray-500">{{ $mainAnsweredCount }} / {{ $allSoals->count() }} soal</span>
                            </div>
                        </div>
                    </div>

                    <!-- Question Card -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Question Header -->
                        <div class="bg-gradient-to-r {{ $tryout->type === 'CPNS' ? 'from-blue-600 to-blue-700' : 'from-emerald-600 to-green-700' }} p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center">
                                        <span class="text-2xl font-black text-white" id="header-question-number">{{ $soal->nomor_soal }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-white">Soal Nomor <span id="header-question-text">{{ $soal->nomor_soal }}</span></h3>
                                        <p class="text-white/90 text-sm" id="header-question-category">{{ $soal->kategori }}</p>
                                    </div>
                                </div>
                                <span class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-bold text-white">
                                    {{ $tryout->type }}
                                </span>
                            </div>
                        </div>

                        <!-- Question Content -->
                        <div class="p-8">
                            <!-- Question Text -->
                            <div class="mb-8">
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl p-8">
                                    <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-question-circle text-blue-600 mr-3 text-xl"></i>
                                        Pertanyaan
                                    </h4>
                                    <p class="text-gray-800 leading-relaxed whitespace-pre-line text-lg">{{ $soal->pertanyaan }}</p>
                                </div>
                            </div>

                            <!-- Answer Form -->
                            <form action="{{ route('tryouts.answer', $tryout) }}" method="POST" id="answer-form">
                                @csrf
                                <input type="hidden" name="soal_id" value="{{ $soal->id }}" id="current-soal-id">
                                <div class="space-y-4 mb-8" id="answer-options">
                                    @foreach(['A', 'B', 'C', 'D', 'E'] as $option)
                                        <label class="group flex items-start p-6 border-2 border-gray-200 rounded-2xl hover:border-blue-400 hover:shadow-xl cursor-pointer transition-all duration-300 {{ $existingAnswer && $existingAnswer->jawaban === $option ? 'bg-blue-50 border-blue-500 shadow-xl' : '' }}">
                                            <input type="radio" name="jawaban" value="{{ $option }}" class="mt-1 mr-5 text-blue-600 focus:ring-blue-500 w-5 h-5" {{ $existingAnswer && $existingAnswer->jawaban === $option ? 'checked' : '' }}>
                                            <div class="flex-1">
                                                <div class="flex items-start">
                                                    <span class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-gray-100 to-gray-200 group-hover:from-blue-100 group-hover:to-blue-200 text-gray-700 group-hover:text-blue-700 rounded-xl font-black text-lg mr-5 transition-all duration-200 shadow-sm">
                                                        {{ $option }}
                                                    </span>
                                                    <div class="flex-1">
                                                        <p class="text-gray-800 leading-relaxed whitespace-pre-line text-base">{{ $soal->{'pilihan_' . strtolower($option)} }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                @error('jawaban')
                                    <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4 flex items-center">
                                        <i class="fas fa-exclamation-triangle text-red-600 mr-3"></i>
                                        <span class="text-red-800 font-medium">{{ $message }}</span>
                                    </div>
                                @enderror

                                <!-- Navigation Buttons -->
                                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                    <!-- Previous Button -->
                                    <div>
                                        @if($currentIndex > 0)
                                            @php $prevSoal = $allSoals[$currentIndex - 1]; @endphp
                                            <button onclick="loadQuestionByNumber({{ $prevSoal->nomor_soal }})" class="inline-flex items-center px-8 py-3 border-2 border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 font-bold transition-all duration-200 transform hover:scale-105">
                                                <i class="fas fa-arrow-left mr-2"></i>
                                                Sebelumnya
                                            </button>
                                        @endif
                                    </div>

                                    <!-- Next/Submit Button -->
                                    <div class="flex items-center space-x-4">
                                        @if($currentIndex < $allSoals->count() - 1)
                                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r {{ $tryout->type === 'CPNS' ? 'from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800' : 'from-emerald-600 to-green-700 hover:from-emerald-700 hover:to-green-800' }} text-white rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg">
                                                Selanjutnya
                                                <i class="fas fa-arrow-right ml-2"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                Selesai & Lihat Hasil
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS for Loading Overlay (Tailwind) -->
    <style>
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
    </style>

    <!-- jQuery & SweetAlert Timer & Auto-submit JavaScript -->
    <script>
        // Timer functionality
        let timeLeft = {{ $tryout->duration_minutes }} * 60; // Convert to seconds
        const $timerDisplay = $('#timer-display');
        const $form = $('#answer-form');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            $timerDisplay.text(`${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);

            // Change color when time is running out
            const $timer = $('#timer');
            if (timeLeft <= 300) { // 5 minutes left
                $timer.removeClass().addClass('bg-red-100 text-red-800 px-4 py-2 rounded-lg font-bold animate-pulse flex items-center');
            } else if (timeLeft <= 600) { // 10 minutes left
                $timer.removeClass().addClass('bg-yellow-100 text-yellow-800 px-4 py-2 rounded-lg font-bold flex items-center');
            }

            if (timeLeft <= 0) {
                // Auto submit when time is up
                clearInterval(timerInterval);
                Swal.fire({
                    icon: 'warning',
                    title: 'Waktu Habis!',
                    text: 'TryOut akan diselesaikan secara otomatis.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#f59e0b',
                    willClose: () => {
                        window.location.href = '{{ route("tryouts.submit", $tryout) }}';
                    }
                });
                return;
            }

            timeLeft--;
        }

        // Update timer every second
        const timerInterval = setInterval(updateTimer, 1000);

        // jQuery AJAX form submission
        $form.on('submit', function(e) {
            e.preventDefault();

            const $submitButton = $(this).find('button[type="submit"]');
            const originalText = $submitButton.html();

            // Show loading state
            $submitButton.prop('disabled', true);
            $submitButton.html('<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...');

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        // Show success toast
                        showToast(data.message || 'Jawaban berhasil disimpan!');

                        // IMPORTANT: Update navigation button color for the question that was just answered
                        const currentSoalId = $('#current-soal-id').val();
                        const currentQuestionNumber = parseInt($('#header-question-number').text());

                        console.log('🟢 === ANSWER SAVED - UPDATING NAVIGATION ===');
                        console.log('Current question ID:', currentSoalId);
                        console.log('Current question number:', currentQuestionNumber);

                        // Update the navigation button for the answered question to green
                        const $answeredBtn = $(`.nav-question[data-question="${currentQuestionNumber}"]`);
                        console.log('🔍 Found navigation button:', $answeredBtn.length > 0 ? 'YES' : 'NO');

                        if ($answeredBtn.length) {
                            console.log('🟢 BEFORE - Button classes:', $answeredBtn.attr('class'));
                            console.log('🟢 BEFORE - Button CSS:', $answeredBtn.css('background'));

                            // Remove all color classes first
                            $answeredBtn.removeClass(function(index, className) {
                                return className.split(' ').filter(function(c) {
                                    return c.includes('bg-gradient') || c.includes('text-white') || c.includes('shadow-') || c.includes('ring-') || c.includes('transform') || c.includes('scale-');
                                }).join(' ');
                            });

                            // Add green classes
                            $answeredBtn.addClass('bg-gradient-to-r from-green-500 to-green-600 text-white shadow-sm hover:shadow-md');

                            // Force update with inline styles to ensure it shows immediately
                            $answeredBtn.css({
                                'background': 'linear-gradient(to right, rgb(34 197 94), rgb(22 163 74)) !important',
                                'color': 'white !important',
                                'box-shadow': '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1) !important'
                            });

                            console.log('🟢 AFTER - Button classes:', $answeredBtn.attr('class'));
                            console.log('🟢 AFTER - Button CSS:', $answeredBtn.css('background'));
                            console.log('✅ Navigation button updated to GREEN immediately');

                            // Add this question to global answered questions array
                            const alreadyExists = globalAnsweredQuestions.some(q =>
                                q.questionNum === currentQuestionNumber || q.soalId === currentSoalId.toString()
                            );

                            if (!alreadyExists) {
                                globalAnsweredQuestions.push({
                                    questionNum: currentQuestionNumber,
                                    soalId: currentSoalId.toString()
                                });
                                console.log('✅ Added to global answered questions:', currentQuestionNumber);
                            } else {
                                console.log('ℹ️ Question already exists in global array');
                            }
                        } else {
                            console.log('❌ ERROR: Navigation button not found for question:', currentQuestionNumber);
                        }

                        // Update progress bars after answer is saved
                        if (data.total_answered !== undefined) {
                            const totalQuestions = $('.nav-question').length;
                            const answeredCount = data.total_answered;
                            const progressPercentage = ((answeredCount / totalQuestions) * 100).toFixed(1);

                            console.log('📊 Updating progress after answer save:', {
                                answeredCount,
                                totalQuestions,
                                progressPercentage
                            });

                            // Update header progress bar using specific IDs
                            $('#header-progress-bar').css('width', progressPercentage + '%');
                            $('#header-progress-text').text(progressPercentage + '% Complete');
                            $('#header-progress-count').text(`${answeredCount} / ${totalQuestions} soal`);

                            // Update sidebar stats using specific IDs
                            $('#sidebar-progress-count').text(`${answeredCount}/${totalQuestions}`);
                            $('#sidebar-progress-bar').css('width', progressPercentage + '%');
                            $('#sidebar-progress-text').text(progressPercentage + '% Selesai');

                            // Update main content progress bar using specific IDs
                            $('#main-progress-bar').css('width', progressPercentage + '%');
                            $('#main-progress-text').text('Progress: ' + progressPercentage + '%');
                            $('#main-progress-count').text(`${answeredCount} / ${totalQuestions} soal`);
                        }

                        if (data.redirect) {
                            // Last question, redirect to result/submit page
                            clearInterval(timerInterval);
                            window.location.href = data.redirect;
                        } else if (data.next_question) {
                            // Load next question via AJAX
                            loadQuestionByNumber(data.next_question.nomor_soal);
                        }
                    } else {
                        // Show error message
                        // Check if this is a validation error
                        const isValidationError = data.message && data.message.includes('validasi');

                        Swal.fire({
                            icon: isValidationError ? 'warning' : 'error',
                            title: isValidationError ? 'Validasi Gagal' : 'Terjadi Kesalahan',
                            text: data.message || 'Terjadi kesalahan. Silakan coba lagi.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: isValidationError ? '#f59e0b' : '#ef4444'
                        });
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ef4444'
                    });
                },
                complete: function() {
                    $submitButton.prop('disabled', false);
                    $submitButton.html(originalText);
                }
            });
        });

        // Function to load question via jQuery AJAX
        function loadQuestionByNumber(questionNumber) {
            console.log('=== AJAX REQUEST START ===');
            console.log('Loading question:', questionNumber);
            console.log('Type of questionNumber:', typeof questionNumber);
            showLoading();

            const url = `/tryouts/{{ $tryout->slug }}/question/${questionNumber}`;
            console.log('Request URL:', url);

            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                beforeSend: function(xhr) {
                    console.log('Sending request to:', url);
                    console.log('QuestionNumber being sent:', questionNumber);
                },
                success: function(data) {
                    console.log('=== AJAX RESPONSE RECEIVED ===');
                    console.log('Response received:', data);
                    console.log('Success:', data.success);
                    if (data.success) {
                        console.log('Question loaded:', data.question);
                        console.log('Question nomor_soal:', data.question.nomor_soal);
                        console.log('Question ID:', data.question.id);
                        console.log('Current index from server:', data.current_index);
                        console.log('Answered questions from server:', data.answered_questions);
                        console.log('Type of answered_questions:', typeof data.answered_questions);
                        console.log('Length of answered_questions:', data.answered_questions ? data.answered_questions.length : 'undefined');

                        updateQuestionDisplay(data.question, data.current_index, data.answered_questions || []);
                        updateNavigationButtons(data.navigation);
                        hideLoading();

                        console.log('=== DISPLAY UPDATED ===');
                        console.log('Should now show question', data.question.nomor_soal);
                    } else {
                        hideLoading();
                        console.error('Server error:', data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Memuat Soal',
                            text: data.message || 'Gagal memuat soal.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#ef4444'
                        });
                    }
                },
                error: function(xhr) {
                    hideLoading();
                    console.error('=== AJAX ERROR ===');
                    console.error('AJAX Error:', xhr);
                    console.error('Status:', xhr.status);
                    console.error('Response Text:', xhr.responseText);
                    console.error('QuestionNumber requested:', questionNumber);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Memuat Soal',
                        text: 'Gagal memuat soal. Silakan refresh halaman.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ef4444'
                    });
                }
            });
        }

        // SweetAlert Toast function for success messages
        function showToast(message, type = 'success') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: type,
                title: message
            });
        }

        // Function to update question display using jQuery
        function updateQuestionDisplay(question, index, answeredQuestions = []) {
            // Update header with jQuery
            $('#header-question-number').text(question.nomor_soal);
            $('#header-question-text').text(question.nomor_soal);
            $('#header-question-category').text(question.kategori);

            // Update progress info with jQuery
            $('#question-category').text(question.kategori);
            $('#question-number').text(question.nomor_soal);

            // Update progress bars with answered questions count
            const totalQuestions = $('.nav-question').length;
            const answeredCount = answeredQuestions.length;
            const progressPercentage = ((answeredCount / totalQuestions) * 100).toFixed(1);
            const currentPositionPercentage = ((index + 1) / totalQuestions * 100).toFixed(1);

            console.log('📊 Updating progress:', {
                answeredCount,
                totalQuestions,
                progressPercentage,
                currentPositionPercentage
            });

            // Update header progress bar using specific IDs
            console.log('🔍 Updating header progress elements...');

            $('#header-progress-bar').css('width', progressPercentage + '%');
            $('#header-progress-text').text(progressPercentage + '% Complete');
            $('#header-progress-count').text(`${answeredCount} / ${totalQuestions} soal`);

            console.log('✅ Header progress updated:', {
                bar: progressPercentage + '%',
                text: progressPercentage + '% Complete',
                count: `${answeredCount} / ${totalQuestions} soal`
            });

            // Update sidebar progress bar (answered questions based)
            console.log('🔍 Updating sidebar progress elements...');
            
            $('#sidebar-progress-count').text(`${answeredCount}/${totalQuestions}`);
            $('#sidebar-progress-bar').css('width', progressPercentage + '%');
            $('#sidebar-progress-text').text(progressPercentage + '% Selesai');
            
            console.log('✅ Sidebar progress updated:', {
                count: `${answeredCount}/${totalQuestions}`,
                bar: progressPercentage + '%',
                text: progressPercentage + '% Selesai'
            });

            // Update main content progress bar (answered questions based)
            console.log('🔍 Updating main content progress elements...');
            
            $('#main-progress-bar').css('width', progressPercentage + '%');
            $('#main-progress-text').text('Progress: ' + progressPercentage + '%');
            $('#main-progress-count').text(`${answeredCount} / ${totalQuestions} soal`);
            
            console.log('✅ Main content progress updated:', {
                bar: progressPercentage + '%',
                text: 'Progress: ' + progressPercentage + '%',
                count: `${answeredCount} / ${totalQuestions} soal`
            });

            // Update question text with fade effect using jQuery
            const $container = $('.bg-gradient-to-br.from-gray-50.to-gray-100');
            $container.fadeOut(150, function() {
                // Update question content
                const $questionText = $container.find('p');
                if ($questionText.length > 0) {
                    $questionText.text(question.pertanyaan);
                }

                // Update answer options
                const $answerOptions = $('#answer-options');
                if ($answerOptions.length > 0) {
                    $answerOptions.html(question.answer_options_html);
                }

                // Update form action and soal_id
                $form.attr('action', `/tryouts/{{ $tryout->slug }}/answer`);
                $('#current-soal-id').val(question.id);

                // Restore radio button event listeners
                setupRadioListeners();

                $container.fadeIn(150);
            });

            // Update navigation colors after question loads
            updateNavigationColors(question.nomor_soal, question.id, answeredQuestions);
        }

        // Function to update navigation colors
        function updateNavigationColors(currentQuestionNumber, currentSoalId, answeredQuestions = []) {
            console.log('Updating navigation colors:', {
                currentQuestionNumber,
                currentSoalId,
                answeredQuestions: answeredQuestions.length + ' items',
                answeredQuestionsContent: answeredQuestions
            });

            // Simple approach: remove ALL styling first, then apply new styling
            $('.nav-question').removeClass(function(index, className) {
                // Remove all gradient and color classes
                return className.split(' ').filter(function(c) {
                    return c.includes('bg-gradient') || c.includes('text-white') || c.includes('shadow-') || c.includes('ring-') || c.includes('transform') || c.includes('scale-');
                }).join(' ');
            });

            // Add base classes back
            $('.nav-question').addClass('w-full aspect-square rounded-md flex items-center justify-center text-xs font-black transition-all duration-300 hover:scale-105 shadow-sm');

            // Now apply colors based on state
            // PRIORITY: current > answered > unanswered
            $('.nav-question').each(function(index) {
                const $btn = $(this);
                const questionNum = parseInt($btn.text().trim()); // Get number from button text
                const soalId = $btn.data('soal-id');

                console.log('Question ' + questionNum + ' (ID: ' + soalId + ')');

                // Check if answered
                let isAnswered = false;
                if (soalId) {
                    isAnswered = answeredQuestions.includes(soalId.toString()) ||
                               answeredQuestions.includes(parseInt(soalId)) ||
                               answeredQuestions.includes(Number(soalId));
                }

                // FIXED: Prioritize current status over answered status
                // Current question should ALWAYS be blue (so user knows their position)
                if (questionNum === currentQuestionNumber) {
                    // Current question - blue (regardless of answered status)
                    $btn.addClass('bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-md ring-2 ring-blue-300 transform scale-105');
                    console.log('Question ' + questionNum + ' → BLUE (current)');
                } else if (isAnswered) {
                    // Answered (not current) - green
                    $btn.addClass('bg-gradient-to-r from-green-500 to-green-600 text-white shadow-sm hover:shadow-md');
                    console.log('Question ' + questionNum + ' → GREEN (answered)');
                } else {
                    // Not answered - gray
                    $btn.addClass('bg-gray-400 text-white hover:bg-gray-500 shadow-sm hover:shadow-sm');
                    console.log('Question ' + questionNum + ' → GRAY (unanswered)');
                }
            });
        }


        // Function to update navigation buttons using jQuery
        function updateNavigationButtons(navigation) {
            const $prevButton = $('button[onclick*="loadQuestionByNumber"]');
            const $nextButton = $form.find('button[type="submit"]');

            // Update previous button onclick if exists
            if ($prevButton.length > 0 && navigation.has_previous) {
                $prevButton.attr('onclick', `loadQuestionByNumber(${navigation.previous_nomor})`);
                $prevButton.show();
            } else if ($prevButton.length > 0) {
                $prevButton.hide();
            }

            // Update next/submit button
            if (navigation.is_last) {
                $nextButton.html('<i class="fas fa-check-circle mr-2"></i>Selesai & Lihat Hasil');
                $nextButton.removeClass().addClass('inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg');
            } else {
                $nextButton.html('Selanjutnya<i class="fas fa-arrow-right ml-2"></i>');
                $nextButton.removeClass().addClass(`inline-flex items-center px-8 py-3 bg-gradient-to-r {{ $tryout->type === 'CPNS' ? 'from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800' : 'from-emerald-600 to-green-700 hover:from-emerald-700 hover:to-green-800' }} text-white rounded-xl font-bold transition-all duration-200 transform hover:scale-105 shadow-lg`);
            }
        }

        // Loading functions using jQuery
        function showLoading() {
            const overlayHtml = `
                <div id="loading-overlay" class="loading-overlay">
                    <div class="loading-spinner">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            `;
            $('body').append(overlayHtml);
            $('#loading-overlay').fadeIn(200);
        }

        function hideLoading() {
            $('#loading-overlay').fadeOut(200, function() {
                $(this).remove();
            });
        }

        // Setup radio button listeners using jQuery
        function setupRadioListeners() {
            $('input[name="jawaban"]').off('change').on('change', function() {
                // Remove all previous highlights
                $('label').removeClass('bg-blue-50 border-blue-500');
                // Highlight selected answer
                $(this).closest('label').addClass('bg-blue-50 border-blue-500');
            });
        }

        // Initialize radio listeners
        setupRadioListeners();

        // Global variable to store answered questions from server
        let globalAnsweredQuestions = [];

        // Simple initialization: just ensure current question is properly highlighted
        $(document).ready(function() {
            const currentQuestionNumber = parseInt($('#header-question-number').text());
            console.log('🚀 Page loaded - current question:', currentQuestionNumber);

            // Initialize answered questions from backend HTML
            globalAnsweredQuestions = [];
            $('.nav-question').each(function() {
                const $btn = $(this);
                const questionNum = parseInt($btn.text().trim());
                const soalId = $btn.data('soal-id');
                const classes = $btn.attr('class');

                console.log(`🔍 Page load - Question ${questionNum}: classes="${classes}"`);

                // Check if button has green OR blue classes from Laravel backend
                // Green = answered and not current
                // Blue = current (might be answered or not)
                // For blue buttons, we need to check if there's an answer selected
                if (classes.includes('from-green-500') && classes.includes('to-green-600')) {
                    // Definitely answered (green button)
                    globalAnsweredQuestions.push({
                        questionNum: questionNum,
                        soalId: soalId.toString()
                    });
                    console.log('✅ Found answered question (green):', questionNum);
                } else if (classes.includes('from-blue-600') && classes.includes('to-blue-700')) {
                    // Current question - check if it has an answer selected
                    const hasAnswer = $('input[name="jawaban"]:checked').length > 0;
                    if (hasAnswer) {
                        globalAnsweredQuestions.push({
                            questionNum: questionNum,
                            soalId: soalId.toString()
                        });
                        console.log('✅ Found answered question (blue/current):', questionNum);
                    } else {
                        console.log(`🔵 Current question not answered yet:`, questionNum);
                    }
                } else {
                    console.log(`⚪ Question ${questionNum} not answered`);
                }
            });

            console.log('📝 Global answered questions initialized:', globalAnsweredQuestions);
            console.log('📝 Total answered questions on page load:', globalAnsweredQuestions.length);

            // IMPORTANT: Don't override any styling on page load
            // The backend already set the correct colors - just trust it!
            console.log('✅ Keeping backend colors intact on page load');
        });

        // Navigation button click handler - use event delegation
        $(document).on('click', '.nav-question', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const questionNumber = parseInt($(this).data('question'));
            const soalId = $(this).data('soal-id');

            console.log('=== NAV BUTTON CLICKED ===');
            console.log('Clicked button text:', $(this).text().trim());
            console.log('Data question attr:', questionNumber);
            console.log('Data soal-id attr:', soalId);

            if (questionNumber) {
                // Update navigation colors immediately to show clicked button as current
                updateNavigationColorsImmediate(questionNumber);

                // Then load the question
                loadQuestionByNumber(questionNumber);
            } else {
                console.error('No question number found on button');
            }
        });

        // Immediate navigation color update for visual feedback - SIMPLIFIED VERSION
        function updateNavigationColorsImmediate(currentQuestionNumber) {
            console.log('🎨 === UPDATE NAVIGATION COLORS ===');
            console.log('🎨 Target question:', currentQuestionNumber);
            console.log('🎨 Global answered questions:', globalAnsweredQuestions);

            // Use global answered questions array that was initialized from backend
            const answeredQuestions = [...globalAnsweredQuestions];
            console.log(`📝 Answered questions from global: ${answeredQuestions.length}`);

            // STEP 1: Apply colors to all buttons based on current state
            // PRIORITY: current > answered > unanswered
            $('.nav-question').each(function() {
                const $btn = $(this);
                const questionNum = parseInt($btn.text().trim());
                const soalId = $btn.data('soal-id');

                // Check if this question is answered from global array
                const isAnswered = answeredQuestions.some(aq =>
                    aq.questionNum === questionNum || aq.soalId === soalId.toString()
                );

                console.log(`🔍 Question ${questionNum}: isAnswered=${isAnswered}, isCurrent=${questionNum === currentQuestionNumber}`);

                // FIXED: Prioritize current status over answered status
                // Current question should ALWAYS be blue (so user knows their position)
                if (questionNum === currentQuestionNumber) {
                    // Current = BLUE (always, regardless of answered status)
                    console.log(`🔵 Question ${questionNum}: Current = BLUE`);
                    $btn.removeClass().addClass('nav-question w-full aspect-square rounded-md flex items-center justify-center text-xs font-black transition-all duration-300 hover:scale-105 shadow-sm bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-md ring-2 ring-blue-300 transform scale-105');
                    $btn.css({
                        'background': 'linear-gradient(to right, #2563eb, #1d4ed8)',
                        'color': 'white',
                        'transform': 'scale(1.05)',
                        'outline': '3px solid #60a5fa',
                        'z-index': '10'
                    });
                } else if (isAnswered) {
                    // Answered (not current) = GREEN
                    console.log(`🟢 Question ${questionNum}: Answered = GREEN`);
                    $btn.removeClass().addClass('nav-question w-full aspect-square rounded-md flex items-center justify-center text-xs font-black transition-all duration-300 hover:scale-105 shadow-sm bg-gradient-to-r from-green-500 to-green-600 text-white shadow-sm hover:shadow-md');
                    $btn.css({
                        'background': 'linear-gradient(to right, rgb(34 197 94), rgb(22 163 74))',
                        'color': 'white',
                        'transform': '',
                        'outline': '',
                        'z-index': ''
                    });
                } else {
                    // Not Current + Not Answered = GRAY
                    console.log(`⚪ Question ${questionNum}: Not Answered = GRAY`);
                    $btn.removeClass().addClass('nav-question w-full aspect-square rounded-md flex items-center justify-center text-xs font-black transition-all duration-300 hover:scale-105 shadow-sm bg-gray-400 text-white hover:bg-gray-500 shadow-sm hover:shadow-sm');
                    $btn.css({
                        'background': 'rgb(156 163 175)',
                        'color': 'white',
                        'transform': '',
                        'outline': '',
                        'z-index': ''
                    });
                }
            });

            console.log('✨ Navigation colors updated successfully');
        }

        // Warn user before leaving page
        $(window).on('beforeunload', function(e) {
            e.preventDefault();
            e.returnValue = 'Apakah Anda yakin ingin meninggalkan halaman? Progress TryOut Anda mungkin akan hilang.';
        });

        // Keyboard navigation using jQuery
        $(document).on('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) return; // Ignore if modifier key is pressed

            if (e.key >= '1' && e.key <= '5') {
                e.preventDefault();
                const $labels = $('label');
                const index = parseInt(e.key) - 1;
                if ($labels[index]) {
                    $labels.eq(index).find('input[type="radio"]').click();
                }
            }
        });
    </script>
</x-app-layout>

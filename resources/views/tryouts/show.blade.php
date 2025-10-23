<x-app-layout>

    <!-- Hero Section - Full Width -->
    <div class="bg-gradient-to-br {{ $tryout->type === 'CPNS' ? 'from-blue-900 via-blue-800 to-blue-900' : 'from-emerald-900 via-green-800 to-emerald-900' }} relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M0 0h40v40H0z"/%3E%3Cpath d="M20 20h20v20H20z"/%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-8">
            <!-- Breadcrumb -->
            <div class="flex items-center mb-8">
                <a href="{{ route('tryouts.index') }}" class="text-white/80 hover:text-white transition-colors flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Kembali ke TryOut</span>
                </a>
            </div>

            <!-- Hero Content -->
            <div class="text-center text-white mb-12">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white/10 backdrop-blur-xl rounded-3xl mb-8 shadow-2xl ring-1 ring-white/20">
                    <i class="fas fa-{{ $tryout->type === 'CPNS' ? 'building' : 'user-tie' }} text-white text-4xl"></i>
                </div>

                <h1 class="text-5xl font-black mb-4 leading-tight">
                    <span class="block">{{ $tryout->title }}</span>
                </h1>

                <div class="flex items-center justify-center space-x-6 text-xl mb-6">
                    <span class="inline-flex items-center px-6 py-3 bg-white/10 backdrop-blur-md rounded-full font-semibold">
                        <i class="fas fa-{{ $tryout->type === 'CPNS' ? 'building' : 'user-tie' }} mr-2"></i>
                        {{ $tryout->type }}
                    </span>
                    <span class="text-white/80">{{ $tryout->kategori }}</span>
                </div>

                @if($hasCompleted)
                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full font-bold text-lg shadow-xl">
                        <i class="fas fa-check-circle mr-2"></i>
                        ✓ Sudah Anda Selesaikan
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Stats Cards Section -->
    <div class="bg-gradient-to-br from-slate-50 to-gray-100 -mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Duration Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-clock text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900">{{ $tryout->duration_minutes }}</div>
                            <div class="text-sm text-gray-500 font-medium">Menit</div>
                        </div>
                    </div>
                    <div class="text-gray-600 font-medium">Waktu Pengerjaan</div>
                </div>

                <!-- Questions Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br {{ $tryout->type === 'CPNS' ? 'from-blue-400 to-blue-600' : 'from-emerald-400 to-emerald-600' }} rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-question-circle text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900">{{ $tryout->total_questions }}</div>
                            <div class="text-sm text-gray-500 font-medium">Butir</div>
                        </div>
                    </div>
                    <div class="text-gray-600 font-medium">Jumlah Soal</div>
                </div>

                <!-- Participants Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900">{{ $tryout->leaderboards()->count() }}</div>
                            <div class="text-sm text-gray-500 font-medium">Orang</div>
                        </div>
                    </div>
                    <div class="text-gray-600 font-medium">Telah Mengerjakan</div>
                </div>

                <!-- Score Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-trophy text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900">
                                @if($hasCompleted)
                                    {{ auth()->user()->getTryoutScore($tryout->id) }}
                                @else
                                    -
                                @endif
                            </div>
                            <div class="text-sm text-gray-500 font-medium">Poin</div>
                        </div>
                    </div>
                    <div class="text-gray-600 font-medium">Skor Terbaik Anda</div>
                </div>
            </div>

            <!-- Instructions & Actions Section -->
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Instructions Card -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-info-circle text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Petunjuk Pengerjaan</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">Waktu Terbatas</h4>
                                <p class="text-blue-700 text-sm">{{ $tryout->duration_minutes }} menit pengerjaan</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-100">
                            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check-double text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-green-900 mb-1">Skor Positif</h4>
                                <p class="text-green-700 text-sm">5 poin per jawaban benar</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-100">
                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-lightbulb text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-purple-900 mb-1">Pembahasan Lengkap</h4>
                                <p class="text-purple-700 text-sm">Tersedia setelah selesai</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-gradient-to-br from-orange-50 to-red-50 rounded-xl border border-orange-100">
                            <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-redo text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-orange-900 mb-1">Kesempatan Sekali</h4>
                                <p class="text-orange-700 text-sm">Hanya bisa dikerjakan satu kali</p>
                            </div>
                        </div>
                    </div>

                    @if($tryout->description)
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-bold text-gray-900 mb-3">Deskripsi TryOut</h4>
                            <p class="text-gray-600 leading-relaxed">{{ $tryout->description }}</p>
                        </div>
                    @endif
                </div>

                <!-- Actions Card -->
                <div class="lg:col-span-1">
                    <div class="bg-gradient-to-br {{ $tryout->type === 'CPNS' ? 'from-blue-600 to-blue-700' : 'from-emerald-600 to-green-700' }} rounded-2xl shadow-xl p-8 text-white sticky top-8">
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-rocket text-white text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Siap Mulai?</h3>
                            <p class="text-white/80">{{ $tryout->total_questions }} soal • {{ $tryout->duration_minutes }} menit</p>
                        </div>

                        @if($hasCompleted)
                            <a href="{{ route('tryouts.result', $tryout) }}"
                               class="w-full bg-white text-blue-600 hover:bg-gray-50 text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg mb-4 flex items-center justify-center">
                                <i class="fas fa-chart-line mr-2"></i>
                                Lihat Hasil & Pembahasan
                            </a>
                            <a href="{{ route('leaderboards.show', $tryout) }}"
                               class="w-full bg-white/10 backdrop-blur-md hover:bg-white/20 text-white text-center py-3 px-6 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-trophy mr-2"></i>
                                Lihat Ranking
                            </a>
                        @else
                            <form id="startTryoutForm" action="{{ route('tryouts.start', $tryout) }}" method="POST" class="mb-4">
                                @csrf
                                <button type="submit"
                                        class="w-full bg-white text-blue-600 hover:bg-gray-50 py-4 px-6 rounded-xl font-bold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center justify-center">
                                    <i class="fas fa-play mr-2"></i>
                                    Mulai TryOut Sekarang
                                </button>
                            </form>
                            <a href="{{ route('leaderboards.show', $tryout) }}"
                               class="w-full bg-white/10 backdrop-blur-md hover:bg-white/20 text-white text-center py-3 px-6 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Lihat Ranking
                            </a>
                        @endif

                        <!-- Warning Box -->
                        <div class="mt-6 p-4 bg-white/10 backdrop-blur-md rounded-xl border border-white/20">
                            <p class="text-white/90 text-sm text-center">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Pastikan koneksi internet stabil sebelum memulai
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Materials Section -->
            @if($tryout->materis()->count() > 0)
                <div class="mt-12 bg-white rounded-2xl shadow-xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-download text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Materi Pembelajaran</h3>
                        </div>
                        <a href="{{ route('materis.by-tryout', $tryout) }}"
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold">
                            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($tryout->materis()->take(4)->get() as $materi)
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                    @if($materi->is_premium)
                                        <i class="fas fa-crown text-orange-500 text-xl"></i>
                                    @endif
                                </div>
                                <h4 class="font-bold text-gray-900 mb-2 line-clamp-2">{{ $materi->title }}</h4>
                                <p class="text-sm text-gray-500 mb-4">{{ $materi->getFileSizeFormatted() }}</p>
                                <a href="{{ route('materis.show', $materi) }}"
                                   class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-2 px-4 rounded-lg font-semibold transition-all duration-200 text-center">
                                    <i class="fas fa-eye mr-1"></i>
                                    Lihat
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- JavaScript for AJAX Start Tryout -->
    <script>
        $(document).ready(function() {
            $('#startTryoutForm').on('submit', function(e) {
                e.preventDefault();

                const $form = $(this);
                const $button = $form.find('button[type="submit"]');
                const originalText = $button.html();

                // Show loading state
                $button.prop('disabled', true)
                       .html('<i class="fas fa-spinner fa-spin mr-2"></i>Memulai...');

                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            // Show 3-second countdown then confirmation modal
                            let countdown = 3;

                            Swal.fire({
                                title: 'Bersiap Memulai TryOut',
                                html: `
                                    <div style="text-align: center;">
                                        <div style="font-size: 48px; font-weight: bold; color: #10b981; margin: 20px 0;">
                                            ${countdown}
                                        </div>
                                        <p style="font-size: 16px; margin: 0;">TryOut akan dimulai dalam hitungan detik...</p>
                                        <p style="font-size: 14px; color: #666; margin-top: 10px;">Siapkan diri Anda dengan baik</p>
                                    </div>
                                `,
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    const interval = setInterval(() => {
                                        countdown--;
                                        const timerElement = Swal.getHtmlContainer().querySelector('div[style*="font-size: 48px"]');
                                        if (timerElement) {
                                            timerElement.textContent = countdown;
                                        }
                                        if (countdown <= 0) {
                                            clearInterval(interval);
                                        }
                                    }, 1000);
                                }
                            }).then(() => {
                                // After countdown, show confirmation modal
                                Swal.fire({
                                    title: 'Konfirmasi Mulai TryOut',
                                    html: `
                                        <div style="text-align: left; line-height: 1.6;">
                                            <p style="margin-bottom: 20px;">Anda akan memulai <strong>${data.tryout_title || 'TryOut'}</strong> dengan rincian:</p>

                                            <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                                    <span>Total Soal:</span>
                                                    <strong>${data.total_questions || '-'} soal</strong>
                                                </div>
                                                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                                    <span>Waktu:</span>
                                                    <strong>${data.duration_minutes || '-'} menit</strong>
                                                </div>
                                                <div style="display: flex; justify-content: space-between;">
                                                    <span>Kategori:</span>
                                                    <strong>${data.categories || '-'}</strong>
                                                </div>
                                            </div>

                                            <p style="margin-bottom: 15px;"><strong>📋 Pastikan Anda telah mempersiapkan:</strong></p>
                                            <ul style="margin-left: 20px; margin-bottom: 20px;">
                                                <li>Koneksi internet yang stabil</li>
                                                <li>Lingkungan yang tenang dan nyaman</li>
                                                <li>Alat tulis (jika diperlukan)</li>
                                                <li>Kondisi fisik dan mental yang prima</li>
                                            </ul>

                                            <div style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
                                                <p style="margin: 0; font-size: 14px;">
                                                    <strong>⚠️ Penting:</strong> Waktu akan berjalan segera setelah Anda mengklik "Ya, Saya Siap"
                                                </p>
                                            </div>

                                            <p style="margin: 0; font-size: 14px; color: #666;">
                                                Apakah Anda yakin ingin memulai TryOut sekarang?
                                            </p>
                                        </div>
                                    `,
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'Ya, Saya Siap',
                                    cancelButtonText: 'Batal',
                                    confirmButtonColor: '#10b981',
                                    cancelButtonColor: '#ef4444',
                                    width: '600px'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to question page
                                        window.location.href = data.redirect || data.question_url;
                                    }
                                });
                            });
                        } else {
                            // Show error SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Memulai TryOut',
                                text: data.message || 'Terjadi kesalahan. Silakan coba lagi.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#ef4444'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal memulai TryOut. Silakan coba lagi.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#ef4444'
                        });
                    },
                    complete: function() {
                        // Restore button state
                        $button.prop('disabled', false)
                               .html(originalText);
                    }
                });
            });
        });
    </script>
</x-app-layout>

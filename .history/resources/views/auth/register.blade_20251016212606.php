@extends('layouts.auth')

@section('content')
<!-- Handle Validation Errors with SweetAlert -->
@if($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function() {
    let errorMessages = '';
    @foreach($errors->all() as $error)
        errorMessages += '• {{ $error }}\n';
    @endforeach

    // Preserve form state - stay on step 4 (final step) if there are validation errors
    currentStep = 4;
    document.getElementById('step4').style.display = 'block';
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step3').style.display = 'none';

    // Update progress
    updateProgressBar();
    updateReview();

    // Preserve phone verification state if phone_number has value
    const phoneNumber = document.getElementById('phone_number').value;
    if (phoneNumber) {
        phoneVerified = true;
        const phoneStatus = document.getElementById('phoneVerificationStatus');
        phoneStatus.classList.remove('hidden');
        document.getElementById('phone_number').disabled = true;
        document.getElementById('phone_number').classList.add('bg-gray-100');
    }

    Swal.fire({
        title: '❌ Validasi Error',
        html: `
            <div class="text-left">
                <p class="text-gray-600 mb-4">Terdapat kesalahan dalam pengisian form:</p>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <pre class="text-red-700 text-sm whitespace-pre-line">${errorMessages}</pre>
                </div>
                <p class="text-sm text-gray-600 mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    Data form Anda telah disimpan. Perbaiki kesalahan dan coba lagi.
                </p>
            </div>
        `,
        icon: 'error',
        confirmButtonText: 'Perbaiki Form',
        confirmButtonColor: '#ef4444',
        customClass: {
            popup: 'rounded-2xl shadow-2xl',
            title: 'text-xl font-bold text-gray-800',
            confirmButton: 'font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300'
        },
        backdrop: 'rgba(0,0,0,0.4)'
    });
});
</script>
@endif

<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="max-w-7xl mx-auto w-full px-8 sm:px-12 lg:px-16">
        <div class="flex flex-col lg:flex-row items-center justify-center min-h-screen gap-12 lg:gap-20">

            <!-- Left Side - Informative Branding -->
            <div class="hidden lg:flex lg:w-1/2 flex-col justify-center pr-8 pl-4">
                <div class="text-white space-y-5">
                    <!-- Logo Brand -->
                    <div class="flex items-center space-x-5 group mb-8">
                        <div class="relative transform group-hover:scale-110 transition-all duration-500">
                            <div class="relative w-18 h-18 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-graduation-cap text-white text-3xl transform group-hover:rotate-12 transition-transform duration-500"></i>
                            </div>
                        </div>

                        <div class="transform group-hover:translate-x-1 transition-transform duration-500">
                            <div class="font-black text-4xl text-white">
                                TryOut<span class="text-orange-300">ASN</span>ku
                            </div>
                            <div class="text-sm font-semibold text-blue-200">
                                Platform Premium
                            </div>
                        </div>
                    </div>

                    <p class="text-lg text-blue-100 leading-relaxed mb-6">
                        Platform persiapan <span class="font-bold text-orange-300">CPNS & PPPK</span> terpercaya
                    </p>

                    <!-- Informative Features -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-book-open text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-base">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-sm">Bank soal terlengkap dengan pembahasan detail</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-base">Analisis Mendalam</div>
                                <div class="text-blue-200 text-sm">Laporan dan rekomendasi belajar personal</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-trophy text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-base">Ranking Nasional</div>
                                <div class="text-blue-200 text-sm">Kompetisi dengan ribuan peserta lain</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-users text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-base">Komunitas Aktif</div>
                                <div class="text-blue-200 text-sm">Belajar bersama 10,000+ member</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-4 border-t border-white/20">
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">98%</div>
                            <div class="text-blue-200 text-xs">Success Rate</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">10K+</div>
                            <div class="text-blue-200 text-xs">Members</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">24/7</div>
                            <div class="text-blue-200 text-xs">Support</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center px-4 lg:pl-8 lg:pr-4">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-4xl font-black text-white mb-2">
                        TryOut<span class="text-orange-400">ASN</span>ku
                    </h1>
                    <p class="text-blue-100">Platform persiapan CPNS & PPPK terpercaya</p>
                </div>

                <div class="w-full">
                    <!-- Registration Card -->
                    <div class="bg-white rounded-3xl px-12 py-4 shadow-2xl">
                        <!-- Header -->
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 via-blue-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <i class="fas fa-user-plus text-white text-2xl"></i>
                            </div>
                            <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 mb-2">
                                Daftar Sekarang
                            </h2>
                            <p class="text-gray-600 text-lg font-medium">
                                Mulai perjalanan menuju <span class="text-blue-600 font-bold">ASN impianmu</span>
                            </p>
                            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mx-auto mt-3"></div>
                        </div>                    <!-- Progress Steps Indicator -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between max-w-md mx-auto">
                            <div class="step-indicator text-center" data-step="1">
                                <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center text-sm font-semibold shadow-lg">1</div>
                                <p class="text-xs mt-2 font-medium text-blue-600">Personal</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200 mx-2">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-500" id="progressLine" style="width: 25%"></div>
                            </div>
                            <div class="step-indicator text-center" data-step="2">
                                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">2</div>
                                <p class="text-xs mt-2 font-medium text-gray-400">Target</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                            <div class="step-indicator text-center" data-step="3">
                                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">3</div>
                                <p class="text-xs mt-2 font-medium text-gray-400">Background</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                            <div class="step-indicator text-center" data-step="4">
                                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">4</div>
                                <p class="text-xs mt-2 font-medium text-gray-400">Review</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-6" id="wizardForm">
                        @csrf

                        <!-- STEP 1: DATA PERSONAL -->
                        <div class="wizard-step active" id="step1">
                            <div class="mb-3">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                    <i class="fas fa-user text-blue-500 mr-2"></i>
                                    Data Personal
                                </h3>
                                <p class="text-sm text-gray-600">Informasi dasar dan kontak Anda</p>
                            </div>

                            <div class="space-y-4">
                                <!-- Name & Email -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="name" class="block text-sm font-semibold text-gray-700">
                                            Nama Lengkap <span class="text-red-500">*</span>
                                        </label>
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300"
                                               placeholder="Nama lengkap">
                                        @error('name')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="email" class="block text-sm font-semibold text-gray-700">
                                            Email <span class="text-red-500">*</span>
                                        </label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300"
                                               placeholder="Email address">
                                        @error('email')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- WhatsApp & CPNS Type -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="phone_number" class="block text-sm font-semibold text-gray-700">
                                            WhatsApp <span class="text-red-500">*</span>
                                        </label>
                                        <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required
                                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300"
                                               placeholder="08123456789" disabled>
                                        @error('phone_number')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror

                                        <!-- Phone verification status -->
                                        <div id="phoneVerificationStatus" class="hidden">
                                            <div class="flex items-center text-sm">
                                                <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="text-green-600 font-medium">WhatsApp berhasil diverifikasi!</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="cpns_type" class="block text-sm font-semibold text-gray-700">
                                            Jenis yang Dituju <span class="text-red-500">*</span>
                                        </label>
                                        <select id="cpns_type" name="cpns_type" required
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                            <option value="">Pilih</option>
                                            <option value="CPNS" {{ old('cpns_type') == 'CPNS' ? 'selected' : '' }}>CPNS</option>
                                            <option value="PPPK" {{ old('cpns_type') == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                                            <option value="Keduanya" {{ old('cpns_type') == 'Keduanya' ? 'selected' : '' }}>Keduanya</option>
                                        </select>
                                        @error('cpns_type')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Province & City -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="province" class="block text-sm font-semibold text-gray-700">
                                            Provinsi <span class="text-red-500">*</span>
                                        </label>
                                        <select id="province" name="province" required
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300 searchable-select">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="Aceh" {{ old('province') == 'Aceh' ? 'selected' : '' }}>Aceh</option>
                                            <option value="Sumatera Utara" {{ old('province') == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                                            <option value="Sumatera Barat" {{ old('province') == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                                            <option value="Riau" {{ old('province') == 'Riau' ? 'selected' : '' }}>Riau</option>
                                            <option value="Kepulauan Riau" {{ old('province') == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                                            <option value="Jambi" {{ old('province') == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                                            <option value="Sumatera Selatan" {{ old('province') == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                                            <option value="Bangka Belitung" {{ old('province') == 'Bangka Belitung' ? 'selected' : '' }}>Bangka Belitung</option>
                                            <option value="Bengkulu" {{ old('province') == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                                            <option value="Lampung" {{ old('province') == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                                            <option value="DKI Jakarta" {{ old('province') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                                            <option value="Jawa Barat" {{ old('province') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                                            <option value="Banten" {{ old('province') == 'Banten' ? 'selected' : '' }}>Banten</option>
                                            <option value="Jawa Tengah" {{ old('province') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                                            <option value="DI Yogyakarta" {{ old('province') == 'DI Yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
                                            <option value="Jawa Timur" {{ old('province') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                            <option value="Bali" {{ old('province') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                            <option value="Nusa Tenggara Barat" {{ old('province') == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                                            <option value="Nusa Tenggara Timur" {{ old('province') == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                                            <option value="Kalimantan Barat" {{ old('province') == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                                            <option value="Kalimantan Tengah" {{ old('province') == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                                            <option value="Kalimantan Selatan" {{ old('province') == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                                            <option value="Kalimantan Timur" {{ old('province') == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                                            <option value="Kalimantan Utara" {{ old('province') == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                                            <option value="Sulawesi Utara" {{ old('province') == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                                            <option value="Gorontalo" {{ old('province') == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                            <option value="Sulawesi Tengah" {{ old('province') == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                                            <option value="Sulawesi Barat" {{ old('province') == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                                            <option value="Sulawesi Selatan" {{ old('province') == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                                            <option value="Sulawesi Tenggara" {{ old('province') == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                                            <option value="Maluku" {{ old('province') == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                                            <option value="Maluku Utara" {{ old('province') == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                                            <option value="Papua Barat" {{ old('province') == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                                            <option value="Papua" {{ old('province') == 'Papua' ? 'selected' : '' }}>Papua</option>
                                        </select>
                                        @error('province')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="city" class="block text-sm font-semibold text-gray-700">
                                            Kota/Kabupaten <span class="text-red-500">*</span>
                                        </label>
                                        <select id="city" name="city" required
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300 searchable-select">
                                            <option value="">Pilih Provinsi dulu</option>
                                        </select>
                                        @error('city')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="space-y-2">
                                    <label for="address" class="block text-sm font-semibold text-gray-700">
                                        Alamat Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input id="address" type="text" name="address" value="{{ old('address') }}" required
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Alamat lengkap">
                                    @error('address')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- STEP 2: TARGET & ASPIRASI -->
                        <div class="wizard-step" id="step2" style="display: none;">
                            <div class="mb-3">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                    <i class="fas fa-bullseye text-blue-500 mr-2"></i>
                                    Target & Aspirasi
                                </h3>
                                <p class="text-sm text-gray-600">Tujuan karir dan instansi yang Anda inginkan</p>
                            </div>

                            <div class="space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="education_level" class="block text-sm font-semibold text-gray-700">
                                            Pendidikan Terakhir <span class="text-red-500">*</span>
                                        </label>
                                        <select id="education_level" name="education_level" required
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300">
                                            <option value="">Pilih</option>
                                            <option value="SMA" {{ old('education_level') == 'SMA' ? 'selected' : '' }}>SMA/SMK</option>
                                            <option value="D3" {{ old('education_level') == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="S1" {{ old('education_level') == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ old('education_level') == 'S2' ? 'selected' : '' }}>S2</option>
                                        </select>
                                        @error('education_level')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="work_status" class="block text-sm font-semibold text-gray-700">
                                            Status Kerja <span class="text-red-500">*</span>
                                        </label>
                                        <select id="work_status" name="work_status" required
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300">
                                            <option value="">Pilih</option>
                                            <option value="mahasiswa" {{ old('work_status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                            <option value="pengangguran" {{ old('work_status') == 'pengangguran' ? 'selected' : '' }}>Pencari Kerja</option>
                                            <option value="swasta" {{ old('work_status') == 'swasta' ? 'selected' : '' }}>Swasta</option>
                                        </select>
                                        @error('work_status')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="target_agency" class="block text-sm font-semibold text-gray-700">
                                            Instansi Tujuan
                                        </label>
                                        <select id="target_agency" name="target_agency"
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300 searchable-select">
                                            <option value="">Pilih instansi tujuan (opsional)</option>
                                            @if(isset($instansi))
                                                @foreach($instansi->sortBy('nama_instansi') as $inst)
                                                    <option value="{{ $inst->nama_instansi }}" {{ old('target_agency') == $inst->nama_instansi ? 'selected' : '' }}>
                                                        {{ $inst->nama_instansi }}{{ $inst->singkatan ? ' (' . $inst->singkatan . ')' : '' }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('target_agency')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="target_score" class="block text-sm font-semibold text-gray-700">
                                            Target Skor
                                        </label>
                                        <input id="target_score" type="number" name="target_score" value="{{ old('target_score') }}" min="100" max="500"
                                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                               placeholder="400 (opsional)">
                                        @error('target_score')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 3: BACKGROUND -->
                        <div class="wizard-step" id="step3" style="display: none;">
                            <div class="mb-3">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                    <i class="fas fa-user-graduate text-blue-500 mr-2"></i>
                                    Background Information
                                </h3>
                                <p class="text-sm text-gray-600">Informasi tambahan untuk personalisasi</p>
                            </div>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label for="major" class="block text-sm font-semibold text-gray-700">
                                        Jurusan/Bidang Keahlian
                                    </label>
                                    <select id="major" name="major"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300 searchable-select">
                                        <option value="">Pilih jurusan/bidang keahlian (opsional)</option>
                                        @if(isset($jurusan))
                                            @foreach($jurusan->groupBy('kategori') as $kategori => $jurusanGroup)
                                                <optgroup label="{{ ucwords(str_replace('_', ' ', $kategori)) }}">
                                                    @foreach($jurusanGroup as $jur)
                                                        <option value="{{ $jur->nama_jurusan }}" {{ old('major') == $jur->nama_jurusan ? 'selected' : '' }}>
                                                            {{ $jur->nama_jurusan }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('major')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="university" class="block text-sm font-semibold text-gray-700">
                                        Asal Universitas/Sekolah
                                    </label>
                                    <select id="university" name="university"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300 searchable-select">
                                        <option value="">Pilih universitas/sekolah (opsional)</option>
                                        @if(isset($universitas))
                                            @foreach($universitas as $univ)
                                                <option value="{{ $univ->nama_universitas }}" {{ old('university') == $univ->nama_universitas ? 'selected' : '' }}>
                                                    {{ $univ->nama_universitas }}{{ $univ->singkatan ? ' (' . $univ->singkatan . ')' : '' }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('university')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="used_referral_code" class="block text-sm font-semibold text-gray-700">
                                        Kode Referral (Opsional)
                                    </label>
                                    <input id="used_referral_code" type="text" name="used_referral_code" value="{{ old('used_referral_code') }}"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Masukkan kode referral jika ada">
                                    @error('used_referral_code')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- STEP 4: REVIEW & PASSWORD -->
                        <div class="wizard-step" id="step4" style="display: none;">
                            <div class="mb-3">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                    <i class="fas fa-check-circle text-blue-500 mr-2"></i>
                                    Review & Finalisasi
                                </h3>
                                <p class="text-sm text-gray-600">Periksa data Anda dan buat password</p>
                            </div>

            <!-- Compact Data Review Summary -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4 mb-4 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="bg-blue-500 rounded-lg p-2 mr-3">
                        <i class="fas fa-user-check text-white text-sm"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800">Ringkasan Data</h4>
                    <button type="button" onclick="toggleDetailReview()" class="ml-auto text-blue-600 hover:text-blue-800 text-sm font-medium">
                        <i class="fas fa-eye mr-1" id="toggleIcon"></i>
                        <span id="toggleText">Lihat Detail</span>
                    </button>
                </div>

                <!-- Compact Summary (Always Visible) -->
                <div class="grid grid-cols-2 gap-3 text-sm mb-3">
                    <div class="flex items-center">
                        <i class="fas fa-user text-gray-400 mr-2 w-4"></i>
                        <span class="font-medium text-gray-800" id="reviewName">-</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-gray-400 mr-2 w-4"></i>
                        <span class="font-medium text-gray-800" id="reviewPhone">-</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-gray-400 mr-2 w-4"></i>
                        <span class="font-medium text-gray-800 truncate" id="reviewEmail">-</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bullseye text-gray-400 mr-2 w-4"></i>
                        <span class="font-medium text-gray-800" id="reviewTarget">-</span>
                    </div>
                </div>

                <!-- Detailed Review (Collapsible) -->
                <div id="detailReview" class="hidden">
                    <hr class="my-3 border-blue-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                        <div class="space-y-2">
                            <h6 class="font-medium text-gray-700 text-xs uppercase tracking-wide">Personal</h6>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tanggal Lahir:</span>
                                <span class="font-medium" id="reviewBirthDate">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jenis Kelamin:</span>
                                <span class="font-medium" id="reviewGender">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Lokasi:</span>
                                <span class="font-medium" id="reviewLocation">-</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h6 class="font-medium text-gray-700 text-xs uppercase tracking-wide">Pendidikan & Target</h6>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Pendidikan:</span>
                                <span class="font-medium" id="reviewEducation">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Universitas:</span>
                                <span class="font-medium" id="reviewUniversity">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Target Skor:</span>
                                <span class="font-medium" id="reviewTargetScore">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirmation -->
                <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-xs text-yellow-800 flex items-center">
                        <i class="fas fa-shield-alt text-yellow-600 mr-2"></i>
                        <strong>Data akan disimpan permanen.</strong> Pastikan sudah benar sebelum melanjutkan.
                    </p>
                </div>
            </div>                            <!-- Password Fields -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label for="password" class="block text-sm font-semibold text-gray-700">
                                        Password <span class="text-red-500">*</span>
                                    </label>
                                    <input id="password" type="password" name="password" required
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Password">
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">
                                        Konfirmasi Password <span class="text-red-500">*</span>
                                    </label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Konfirmasi password">
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Navigation Buttons -->
                    <div class="mt-4">
                        <!-- Navigation Button Row -->
                        <div class="flex items-center justify-between">
                            <!-- Previous Button -->
                            <button type="button" id="prevBtn"
                                    class="flex items-center space-x-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-800 rounded-md transition-all duration-300 font-medium"
                                    style="display: none;">
                                <i class="fas fa-chevron-left"></i>
                                <span>Kembali</span>
                            </button>

                            <!-- Next/Submit Button -->
                            <button type="button" id="nextBtn"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-all duration-300 flex items-center justify-center space-x-2 shadow-sm">
                                <span id="nextBtnText">Lanjutkan</span>
                                <i class="fas fa-arrow-right" id="nextBtnIcon"></i>
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="mt-4 pt-4 border-t border-gray-200 text-center">
                            <p class="text-gray-600">
                                Sudah punya akun?
                                <a href="{{ route('login') }}"
                                   class="font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Animate.css for SweetAlert2 animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
    // Province-City Data (Complete Indonesia)
    const cityData = {
        'Aceh': ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Sabang', 'Subulussalam', 'Aceh Barat', 'Aceh Barat Daya', 'Aceh Besar', 'Aceh Jaya', 'Aceh Selatan', 'Aceh Singkil', 'Aceh Tamiang', 'Aceh Tengah', 'Aceh Tenggara', 'Aceh Timur', 'Aceh Utara', 'Bener Meriah', 'Bireuen', 'Gayo Lues', 'Nagan Raya', 'Pidie', 'Pidie Jaya', 'Simeulue'],
        'Sumatera Utara': ['Binjai', 'Gunungsitoli', 'Medan', 'Padangsidimpuan', 'Pematangsiantar', 'Sibolga', 'Tanjungbalai', 'Tebing Tinggi', 'Asahan', 'Batu Bara', 'Dairi', 'Deli Serdang', 'Humbang Hasundutan', 'Karo', 'Labuhanbatu', 'Labuhanbatu Selatan', 'Labuhanbatu Utara', 'Langkat', 'Mandailing Natal', 'Nias', 'Nias Barat', 'Nias Selatan', 'Nias Utara', 'Padang Lawas', 'Padang Lawas Utara', 'Pakpak Bharat', 'Samosir', 'Serdang Bedagai', 'Simalungun', 'Tapanuli Selatan', 'Tapanuli Tengah', 'Tapanuli Utara', 'Toba'],
        'Sumatera Barat': ['Bukittinggi', 'Padang', 'Padang Panjang', 'Pariaman', 'Payakumbuh', 'Sawahlunto', 'Solok', 'Agam', 'Dharmasraya', 'Kepulauan Mentawai', 'Lima Puluh Kota', 'Padang Pariaman', 'Pasaman', 'Pasaman Barat', 'Pesisir Selatan', 'Sijunjung', 'Solok', 'Solok Selatan', 'Tanah Datar'],
        'Riau': ['Pekanbaru', 'Dumai', 'Bengkalis', 'Indragiri Hilir', 'Indragiri Hulu', 'Kampar', 'Kepulauan Meranti', 'Kuantan Singingi', 'Pelalawan', 'Rokan Hilir', 'Rokan Hulu', 'Siak'],
        'Kepulauan Riau': ['Batam', 'Tanjungpinang', 'Bintan', 'Karimun', 'Kepulauan Anambas', 'Lingga', 'Natuna'],
        'Jambi': ['Jambi', 'Sungai Penuh', 'Batanghari', 'Bungo', 'Kerinci', 'Merangin', 'Muaro Jambi', 'Sarolangun', 'Tanjung Jabung Barat', 'Tanjung Jabung Timur', 'Tebo'],
        'Sumatera Selatan': ['Lubuklinggau', 'Pagar Alam', 'Palembang', 'Prabumulih', 'Banyuasin', 'Empat Lawang', 'Lahat', 'Muara Enim', 'Musi Banyuasin', 'Musi Rawas', 'Musi Rawas Utara', 'Ogan Ilir', 'Ogan Komering Ilir', 'Ogan Komering Ulu', 'Ogan Komering Ulu Selatan', 'Ogan Komering Ulu Timur', 'Penukal Abab Lematang Ilir'],
        'Bangka Belitung': ['Pangkalpinang', 'Bangka', 'Bangka Barat', 'Bangka Selatan', 'Bangka Tengah', 'Belitung', 'Belitung Timur'],
        'Bengkulu': ['Bengkulu', 'Bengkulu Selatan', 'Bengkulu Tengah', 'Bengkulu Utara', 'Kaur', 'Kepahiang', 'Lebong', 'Mukomuko', 'Rejang Lebong', 'Seluma'],
        'Lampung': ['Bandar Lampung', 'Metro', 'Lampung Barat', 'Lampung Selatan', 'Lampung Tengah', 'Lampung Timur', 'Lampung Utara', 'Mesuji', 'Pesawaran', 'Pesisir Barat', 'Pringsewu', 'Tanggamus', 'Tulang Bawang', 'Tulang Bawang Barat', 'Way Kanan'],
        'DKI Jakarta': ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Utara', 'Kepulauan Seribu'],
        'Jawa Barat': ['Bandung', 'Bekasi', 'Bogor', 'Cimahi', 'Cirebon', 'Depok', 'Sukabumi', 'Tasikmalaya', 'Banjar', 'Bandung', 'Bandung Barat', 'Bekasi', 'Bogor', 'Ciamis', 'Cianjur', 'Cirebon', 'Garut', 'Indramayu', 'Karawang', 'Kuningan', 'Majalengka', 'Pangandaran', 'Purwakarta', 'Subang', 'Sukabumi', 'Sumedang', 'Tasikmalaya'],
        'Banten': ['Cilegon', 'Serang', 'Tangerang', 'Tangerang Selatan', 'Lebak', 'Pandeglang', 'Serang', 'Tangerang'],
        'Jawa Tengah': ['Magelang', 'Pekalongan', 'Salatiga', 'Semarang', 'Surakarta', 'Tegal', 'Banjarnegara', 'Banyumas', 'Batang', 'Blora', 'Boyolali', 'Brebes', 'Cilacap', 'Demak', 'Grobogan', 'Jepara', 'Karanganyar', 'Kebumen', 'Kendal', 'Klaten', 'Kudus', 'Pati', 'Pekalongan', 'Pemalang', 'Purbalingga', 'Purworejo', 'Rembang', 'Semarang', 'Sragen', 'Sukoharjo', 'Tegal', 'Temanggung', 'Wonogiri', 'Wonosobo'],
        'DI Yogyakarta': ['Yogyakarta', 'Bantul', 'Gunungkidul', 'Kulon Progo', 'Sleman'],
        'Jawa Timur': ['Batu', 'Blitar', 'Kediri', 'Madiun', 'Malang', 'Mojokerto', 'Pasuruan', 'Probolinggo', 'Surabaya', 'Bangkalan', 'Banyuwangi', 'Blitar', 'Bojonegoro', 'Bondowoso', 'Gresik', 'Jember', 'Jombang', 'Kediri', 'Lamongan', 'Lumajang', 'Madiun', 'Magetan', 'Malang', 'Mojokerto', 'Nganjuk', 'Ngawi', 'Pacitan', 'Pamekasan', 'Pasuruan', 'Ponorogo', 'Probolinggo', 'Sampang', 'Sidoarjo', 'Situbondo', 'Sumenep', 'Trenggalek', 'Tuban', 'Tulungagung'],
        'Bali': ['Denpasar', 'Badung', 'Bangli', 'Buleleng', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan'],
        'Nusa Tenggara Barat': ['Mataram', 'Bima', 'Bima', 'Dompu', 'Lombok Barat', 'Lombok Tengah', 'Lombok Timur', 'Lombok Utara', 'Sumbawa', 'Sumbawa Barat'],
        'Nusa Tenggara Timur': ['Kupang', 'Alor', 'Belu', 'Ende', 'Flores Timur', 'Kupang', 'Lembata', 'Malaka', 'Manggarai', 'Manggarai Barat', 'Manggarai Timur', 'Nagekeo', 'Ngada', 'Rote Ndao', 'Sabu Raijua', 'Sikka', 'Sumba Barat', 'Sumba Barat Daya', 'Sumba Tengah', 'Sumba Timur', 'Timor Tengah Selatan', 'Timor Tengah Utara'],
        'Kalimantan Barat': ['Pontianak', 'Singkawang', 'Bengkayang', 'Kapuas Hulu', 'Kayong Utara', 'Ketapang', 'Kubu Raya', 'Landak', 'Melawi', 'Mempawah', 'Sambas', 'Sanggau', 'Sekadau', 'Sintang'],
        'Kalimantan Tengah': ['Palangka Raya', 'Barito Selatan', 'Barito Timur', 'Barito Utara', 'Gunung Mas', 'Kapuas', 'Katingan', 'Kotawaringin Barat', 'Kotawaringin Timur', 'Lamandau', 'Murung Raya', 'Pulang Pisau', 'Seruyan', 'Sukamara'],
        'Kalimantan Selatan': ['Banjarbaru', 'Banjarmasin', 'Balangan', 'Banjar', 'Barito Kuala', 'Hulu Sungai Selatan', 'Hulu Sungai Tengah', 'Hulu Sungai Utara', 'Kotabaru', 'Tabalong', 'Tanah Bumbu', 'Tanah Laut', 'Tapin'],
        'Kalimantan Timur': ['Balikpapan', 'Bontang', 'Samarinda', 'Berau', 'Kutai Barat', 'Kutai Kartanegara', 'Kutai Timur', 'Mahakam Ulu', 'Paser', 'Penajam Paser Utara'],
        'Kalimantan Utara': ['Tarakan', 'Bulungan', 'Malinau', 'Nunukan', 'Tana Tidung'],
        'Sulawesi Utara': ['Bitung', 'Kotamobagu', 'Manado', 'Tomohon', 'Bolaang Mongondow', 'Bolaang Mongondow Selatan', 'Bolaang Mongondow Timur', 'Bolaang Mongondow Utara', 'Kepulauan Sangihe', 'Kepulauan Siau Tagulandang Biaro', 'Kepulauan Talaud', 'Minahasa', 'Minahasa Selatan', 'Minahasa Tenggara', 'Minahasa Utara'],
        'Gorontalo': ['Gorontalo', 'Boalemo', 'Bone Bolango', 'Gorontalo', 'Gorontalo Utara', 'Pohuwato'],
        'Sulawesi Tengah': ['Palu', 'Banggai', 'Banggai Kepulauan', 'Banggai Laut', 'Buol', 'Donggala', 'Morowali', 'Morowali Utara', 'Parigi Moutong', 'Poso', 'Sigi', 'Tojo Una-Una', 'Toli-Toli'],
        'Sulawesi Barat': ['Majene', 'Mamasa', 'Mamuju', 'Mamuju Tengah', 'Pasangkayu', 'Polewali Mandar'],
        'Sulawesi Selatan': ['Makassar', 'Palopo', 'Parepare', 'Bantaeng', 'Barru', 'Bone', 'Bulukumba', 'Enrekang', 'Gowa', 'Jeneponto', 'Kepulauan Selayar', 'Luwu', 'Luwu Timur', 'Luwu Utara', 'Maros', 'Pangkajene dan Kepulauan', 'Pinrang', 'Sidenreng Rappang', 'Sinjai', 'Soppeng', 'Takalar', 'Tana Toraja', 'Toraja Utara', 'Wajo'],
        'Sulawesi Tenggara': ['Bau-Bau', 'Kendari', 'Bombana', 'Buton', 'Buton Selatan', 'Buton Tengah', 'Buton Utara', 'Kolaka', 'Kolaka Timur', 'Kolaka Utara', 'Konawe', 'Konawe Kepulauan', 'Konawe Selatan', 'Konawe Utara', 'Muna', 'Muna Barat', 'Wakatobi'],
        'Maluku': ['Ambon', 'Tual', 'Buru', 'Buru Selatan', 'Kepulauan Aru', 'Maluku Barat Daya', 'Maluku Tengah', 'Maluku Tenggara', 'Seram Bagian Barat', 'Seram Bagian Timur'],
        'Maluku Utara': ['Ternate', 'Tidore Kepulauan', 'Halmahera Barat', 'Halmahera Tengah', 'Halmahera Timur', 'Halmahera Selatan', 'Halmahera Utara', 'Kepulauan Sula', 'Pulau Morotai', 'Pulau Taliabu'],
        'Papua Barat': ['Manokwari', 'Sorong', 'Fakfak', 'Kaimana', 'Manokwari Selatan', 'Pegunungan Arfak', 'Teluk Bintuni', 'Teluk Wondama'],
        'Papua': ['Jayapura', 'Asmat', 'Biak Numfor', 'Boven Digoel', 'Jayapura', 'Jayawijaya', 'Keerom', 'Mamberamo Raya', 'Mamberamo Tengah', 'Merauke', 'Mimika', 'Nabire', 'Paniai', 'Pegunungan Bintang', 'Sarmi', 'Supiori', 'Tolikara', 'Waropen', 'Yahukimo', 'Yalimo']
    };

    // Wizard functionality
    let currentStep = 1;
    const totalSteps = 4;

    document.addEventListener('DOMContentLoaded', function() {
        initWizard();
        // Dropdown functionality now handled by Select2 events above
    });

    function initWizard() {
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');

        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (currentStep < totalSteps) {
                if (validateStep(currentStep)) {
                    nextStep();
                }
            } else {
                // Submit form on last step
                if (validateStep(currentStep)) {
                    Swal.fire({
                        title: '🎉 Memproses Pendaftaran',
                        html: `
                            <div class="text-center py-4">
                                <div class="relative inline-block mb-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto">
                                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg mb-2">Sedang memproses pendaftaran Anda...</p>
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mt-4">
                                    <p class="text-blue-800 text-sm">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Mohon tunggu sebentar, jangan tutup halaman ini
                                    </p>
                                </div>
                            </div>
                        `,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl border-0',
                            title: 'text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600'
                        },
                        backdrop: 'rgba(59, 130, 246, 0.1)',
                        didOpen: () => {
                            const popup = Swal.getPopup();
                            popup.style.background = 'linear-gradient(135deg, #ffffff 0%, #f8fafc 100%)';
                        }
                    });

                    // Delay singkat untuk menampilkan loading
                    setTimeout(() => {
                        document.getElementById('wizardForm').submit();
                    }, 800);
                }
            }
        });

        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            prevStep();
        });

        updateWizardUI();
        addStepClickListeners();
    }

    function addStepClickListeners() {
        // Add click event listeners to step indicators
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            // Add cursor pointer style
            indicator.style.cursor = 'pointer';

            indicator.addEventListener('click', function() {
                const targetStep = index + 1;
                console.log('Step clicked:', targetStep, 'Current step:', currentStep);

                if (targetStep > currentStep) {
                    Swal.fire({
                        icon: 'info',
                        title: '📝 Selesaikan Step Saat Ini',
                        html: `
                            <div class="text-center">
                                <p class="text-gray-600 mb-4">Anda harus menyelesaikan step saat ini terlebih dahulu</p>
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                    <p class="text-blue-800 text-sm">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Lengkapi semua field yang diperlukan pada step <strong>${currentStep}</strong> untuk melanjutkan
                                    </p>
                                </div>
                            </div>
                        `,
                        confirmButtonText: '<i class="fas fa-check mr-2"></i>Mengerti',
                        confirmButtonColor: '#3b82f6',
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl',
                            title: 'text-xl font-bold text-gray-800',
                            confirmButton: 'font-semibold py-2 px-6 rounded-lg shadow-lg transition-all duration-300'
                        }
                    });
                } else if (targetStep < currentStep) {
                    // Allow going back to previous completed steps
                    while (currentStep > targetStep) {
                        prevStep();
                    }
                }
            });
        });
    }    function nextStep() {
        if (currentStep < totalSteps) {
            document.getElementById('step' + currentStep).style.display = 'none';
            currentStep++;
            document.getElementById('step' + currentStep).style.display = 'block';

            if (currentStep === 4) {
                updateReviewData();
            }

            updateWizardUI();
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            document.getElementById('step' + currentStep).style.display = 'none';
            currentStep--;
            document.getElementById('step' + currentStep).style.display = 'block';
            updateWizardUI();
        }
    }

    function updateWizardUI() {
        // Update progress
        const progressLine = document.getElementById('progressLine');
        const progressWidth = (currentStep / totalSteps) * 100;
        progressLine.style.width = progressWidth + '%';

        // Update step indicators
        for (let i = 1; i <= totalSteps; i++) {
            const stepIndicator = document.querySelector(`[data-step="${i}"] div`);
            if (i <= currentStep) {
                stepIndicator.className = 'w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center text-sm font-semibold shadow-lg';
            } else {
                stepIndicator.className = 'w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold';
            }
        }

        // Update buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        if (currentStep === 1) {
            prevBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'flex';
        }

        if (currentStep === totalSteps) {
            document.getElementById('nextBtnText').textContent = 'Daftar Sekarang';
            document.getElementById('nextBtnIcon').className = 'fas fa-check';
        } else {
            document.getElementById('nextBtnText').textContent = 'Lanjutkan';
            document.getElementById('nextBtnIcon').className = 'fas fa-arrow-right';
        }
    }

    function validateStep(step) {
        let isValid = true;
        const stepElement = document.getElementById('step' + step);
        const requiredFields = stepElement.querySelectorAll('[required]');

        requiredFields.forEach(field => {
            const value = field.type === 'select-one' ? field.selectedIndex : field.value.trim();

            if (!value || (field.type === 'select-one' && value === 0)) {
                isValid = false;
                field.classList.add('border-red-500', 'bg-red-50');

                // Remove error styling when user interacts
                const removeError = () => {
                    field.classList.remove('border-red-500', 'bg-red-50');
                    field.removeEventListener('input', removeError);
                    field.removeEventListener('change', removeError);
                };
                field.addEventListener('input', removeError);
                field.addEventListener('change', removeError);
            } else {
                field.classList.remove('border-red-500', 'bg-red-50');
            }
        });

        if (!isValid) {
            Swal.fire({
                icon: 'warning',
                title: '⚠️ Data Belum Lengkap',
                html: `
                    <div class="text-center">
                        <p class="text-gray-600 mb-4">Mohon lengkapi semua field yang wajib diisi untuk melanjutkan</p>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                            <p class="text-yellow-800 text-sm">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Pastikan semua field bertanda <span class="text-red-500 font-bold">*</span> sudah terisi
                            </p>
                        </div>
                    </div>
                `,
                confirmButtonText: '<i class="fas fa-check mr-2"></i>Saya Mengerti',
                confirmButtonColor: '#f59e0b',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl',
                    title: 'text-xl font-bold text-gray-800',
                    confirmButton: 'font-semibold py-2 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300'
                },
                backdrop: 'rgba(0,0,0,0.4)'
            });
        }

        return isValid;
    }

    function updateReviewData() {
        // Personal Info
        document.getElementById('reviewName').textContent = document.getElementById('name').value || '-';
        document.getElementById('reviewEmail').textContent = document.getElementById('email').value || '-';
        document.getElementById('reviewPhone').textContent = document.getElementById('phone_number').value || '-';
        document.getElementById('reviewBirthDate').textContent = document.getElementById('birth_date').value || '-';

        // Gender
        const genderValue = document.getElementById('gender').value;
        const genderText = genderValue === 'male' ? 'Laki-laki' : genderValue === 'female' ? 'Perempuan' : '-';
        document.getElementById('reviewGender').textContent = genderText;

        // Location
        const provinceText = document.getElementById('province').selectedOptions[0]?.text || '';
        const cityText = document.getElementById('city').selectedOptions[0]?.text || '';
        const locationText = cityText ? `${cityText}, ${provinceText}` : provinceText || '-';
        document.getElementById('reviewLocation').textContent = locationText;

        // Career & Education
        document.getElementById('reviewTarget').textContent = document.getElementById('cpns_type').value || '-';
        document.getElementById('reviewAgency').textContent = document.getElementById('target_agency').value || 'Tidak disebutkan';
        document.getElementById('reviewEducation').textContent = document.getElementById('education_level').value || '-';

        // University (only if visible)
        const universityContainer = document.getElementById('university').closest('.space-y-2');
        if (universityContainer.style.display !== 'none') {
            document.getElementById('reviewUniversity').textContent = document.getElementById('university').value || 'Tidak disebutkan';
        } else {
            document.getElementById('reviewUniversity').textContent = 'Tidak berlaku (SMA/SMK)';
        }

        document.getElementById('reviewMajor').textContent = document.getElementById('major').value || 'Tidak disebutkan';

        // Work Status
        const workStatusValue = document.getElementById('work_status').value;
        let workStatusText = '-';
        switch(workStatusValue) {
            case 'mahasiswa': workStatusText = 'Mahasiswa'; break;
            case 'pengangguran': workStatusText = 'Pencari Kerja'; break;
            case 'swasta': workStatusText = 'Swasta'; break;
        }
        document.getElementById('reviewWorkStatus').textContent = workStatusText;

        // Target & Referral
        document.getElementById('reviewTargetScore').textContent = document.getElementById('target_score').value || 'Tidak diset';
        document.getElementById('reviewReferralCode').textContent = document.getElementById('used_referral_code').value || 'Tidak ada';
    }

    // Show/Hide University dropdown based on education level
    function toggleUniversityField() {
        const educationLevel = document.getElementById('education_level').value;
        const universityContainer = document.getElementById('university').closest('.space-y-2');

        if (educationLevel === 'SMA') {
            // Hide university for SMA/SMK
            universityContainer.style.display = 'none';
            document.getElementById('university').value = ''; // Clear selection
        } else {
            // Show university for D3, S1, S2
            universityContainer.style.display = 'block';
        }
    }

    // Initialize university field visibility on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleUniversityField();

        // Add event listener for education level changes
        document.getElementById('education_level').addEventListener('change', toggleUniversityField);

        // Add referral code validation
        setupReferralValidation();
    });

    // Referral code AJAX validation
    function setupReferralValidation() {
        const referralInput = document.getElementById('used_referral_code');
        let debounceTimer;

        referralInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            const code = this.value.trim();

            // Clear previous styling
            this.classList.remove('border-green-500', 'bg-green-50', 'border-red-500', 'bg-red-50');

            if (code.length === 0) {
                return; // No validation for empty input
            }

            // Debounce API call
            debounceTimer = setTimeout(() => {
                validateReferralCode(code, referralInput);
            }, 500);
        });
    }

    function validateReferralCode(code, inputElement) {
        // Show loading state
        inputElement.style.opacity = '0.7';

        fetch('/api/validate-referral', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ referral_code: code })
        })
        .then(response => response.json())
        .then(data => {
            inputElement.style.opacity = '1';

            if (data.valid) {
                // Valid referral code
                inputElement.classList.add('border-green-500', 'bg-green-50');

                Swal.fire({
                    icon: 'success',
                    title: '✅ Kode Referral Ditemukan!',
                    html: `
                        <div class="text-center">
                            <p class="text-gray-600 mb-4">${data.message}</p>
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                <h4 class="font-semibold text-green-800 mb-2">Referrer:</h4>
                                <p class="text-green-700">
                                    <i class="fas fa-user mr-2"></i>${data.referrer.name}
                                </p>
                                <p class="text-green-600 text-sm">
                                    <i class="fas fa-envelope mr-2"></i>${data.referrer.email}
                                </p>
                            </div>
                            <p class="text-sm text-gray-500 mt-3">
                                <i class="fas fa-gift mr-1"></i>
                                Anda akan mendapatkan benefit dari sistem referral!
                            </p>
                        </div>
                    `,
                    confirmButtonText: '<i class="fas fa-thumbs-up mr-2"></i>Mantap!',
                    confirmButtonColor: '#10b981',
                    customClass: {
                        popup: 'rounded-2xl shadow-2xl',
                        title: 'text-xl font-bold text-gray-800',
                        confirmButton: 'font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300'
                    },
                    backdrop: 'rgba(0,0,0,0.4)'
                });
            } else {
                // Invalid referral code
                inputElement.classList.add('border-red-500', 'bg-red-50');

                Swal.fire({
                    icon: 'warning',
                    title: '⚠️ Kode Referral Tidak Valid',
                    html: `
                        <div class="text-center">
                            <p class="text-gray-600 mb-4">${data.message}</p>
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                                <p class="text-yellow-800 text-sm">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Pastikan kode referral yang Anda masukkan benar, atau kosongkan jika tidak ada
                                </p>
                            </div>
                        </div>
                    `,
                    confirmButtonText: '<i class="fas fa-edit mr-2"></i>Perbaiki',
                    confirmButtonColor: '#f59e0b',
                    customClass: {
                        popup: 'rounded-2xl shadow-2xl',
                        title: 'text-xl font-bold text-gray-800',
                        confirmButton: 'font-semibold py-2 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300'
                    },
                    backdrop: 'rgba(0,0,0,0.4)'
                });
            }
        })
        .catch(error => {
            console.error('Referral validation error:', error);
            inputElement.style.opacity = '1';
            inputElement.classList.add('border-gray-300');
        });
    }

    // ===== WHATSAPP VERIFICATION SYSTEM =====
    let phoneVerified = false;
    let otpCountdownTimer = null;
    let otpExpiryTimer = null;
    let otpExpiryTime = null;

    // Setup WhatsApp verification - Show modal when "Lanjutkan" clicked
    function setupWhatsAppVerification() {
        const phoneInput = document.getElementById('phone_number');
        const phoneStatus = document.getElementById('phoneVerificationStatus');

        // Enable phone input initially
        phoneInput.disabled = false;
        phoneInput.classList.remove('bg-gray-100');

        // Format phone number input (Indonesia format)
        phoneInput.addEventListener('input', function() {
            let value = this.value.replace(/[^0-9]/g, '');

            // Auto-add 0 if starts with 8
            if (value.length > 0 && !value.startsWith('0') && !value.startsWith('62')) {
                value = '0' + value;
            }

            this.value = value;
        });
    }

    // Show WhatsApp OTP Modal
    function showWhatsAppOTPModal() {
        const phoneNumber = document.getElementById('phone_number').value.trim();

        if (!phoneNumber) {
            Swal.fire({
                icon: 'warning',
                title: 'Nomor WhatsApp Required',
                text: 'Silakan masukkan nomor WhatsApp Anda terlebih dahulu'
            });
            return false;
        }

        // Validate phone number format
        if (!/^(0[0-9]{9,12}|62[0-9]{9,12})$/.test(phoneNumber.replace(/\s+/g, ''))) {
            Swal.fire({
                icon: 'error',
                title: 'Format Nomor Tidak Valid',
                text: 'Masukkan nomor WhatsApp dengan format: 08123456789'
            });
            return false;
        }

        // Send OTP and show modal
        sendWhatsAppOTP(phoneNumber);
        return false; // Prevent form submission
    }

    // Send WhatsApp OTP
    function sendWhatsAppOTP(phoneNumber) {
        Swal.fire({
            title: 'Mengirim OTP...',
            text: 'Sedang mengirim kode verifikasi ke WhatsApp Anda',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        fetch('/api/phone/send-otp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ phone_number: phoneNumber })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Store OTP expiry time
                if (data.expires_at) {
                    otpExpiryTime = data.expires_at * 1000;
                }

                // Show OTP verification modal
                showOTPVerificationModal(phoneNumber, data.debug_otp);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengirim OTP',
                    html: `
                        <p class="text-gray-600 mb-4">${data.message}</p>
                        <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                            <p class="text-red-700 text-sm">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Silakan periksa nomor WhatsApp Anda dan coba lagi
                            </p>
                        </div>
                    `,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ef4444'
                });
            }
        })
        .catch(error => {
            console.error('Send OTP error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim OTP. Silakan coba lagi.',
                confirmButtonColor: '#ef4444'
            });
        });
    }

    // Show OTP Verification Modal
    function showOTPVerificationModal(phoneNumber, debugOtp = null) {
        const otpInputs = Array.from({length: 6}, (_, i) =>
            `<input type="text" id="otp_${i}" maxlength="1" class="w-12 h-12 text-center text-lg font-bold border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 mx-1" autocomplete="off">`
        ).join('');

        Swal.fire({
            title: '🔐 Verifikasi WhatsApp',
            html: `
                <div class="text-left space-y-4">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center space-x-2">
                            <i class="fab fa-whatsapp text-green-500 text-xl"></i>
                            <div>
                                <p class="font-medium text-gray-800">Kode OTP telah dikirim ke:</p>
                                <p class="text-blue-600 font-semibold">${phoneNumber}</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Masukkan 6 digit kode OTP:</label>
                        <div class="flex justify-center">
                            ${otpInputs}
                        </div>
                        ${debugOtp ? `<p class="text-xs text-gray-500 mt-2">Debug: ${debugOtp}</p>` : ''}
                    </div>

                    <div id="otpTimer" class="text-center">
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-3">
                            <p class="text-orange-700 text-sm">
                                <i class="fas fa-clock mr-2"></i>
                                Kode berlaku: <span id="timeRemaining" class="font-bold">10:00</span>
                            </p>
                        </div>
                    </div>

                    <div id="otpExpired" class="text-center hidden">
                        <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                            <p class="text-red-700 text-sm">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Kode OTP sudah kadaluarsa
                            </p>
                        </div>
                    </div>
                </div>
            `,
            showCancelButton: true,
            cancelButtonText: '<i class="fas fa-edit mr-2"></i>Ubah Nomor',
            confirmButtonText: '<i class="fas fa-check mr-2"></i>Verifikasi OTP',
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#6b7280',
            allowOutsideClick: false,
            allowEscapeKey: false,
            preConfirm: () => {
                const otpCode = Array.from({length: 6}, (_, i) =>
                    document.getElementById(`otp_${i}`).value
                ).join('');

                if (otpCode.length !== 6) {
                    Swal.showValidationMessage('Silakan masukkan 6 digit kode OTP');
                    return false;
                }

                return verifyWhatsAppOTP(phoneNumber, otpCode);
            },
            didOpen: () => {
                setupOTPInputs();
                startOTPTimer();
            },
            didDestroy: () => {
                if (otpExpiryTimer) {
                    clearInterval(otpExpiryTimer);
                }
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.cancel) {
                // User wants to change phone number
                document.getElementById('phone_number').focus();
            }
        });
    }

    // Setup OTP inputs (auto-focus next input)
    function setupOTPInputs() {
        for (let i = 0; i < 6; i++) {
            const input = document.getElementById(`otp_${i}`);

            input.addEventListener('input', function(e) {
                // Only allow numbers
                this.value = this.value.replace(/[^0-9]/g, '');

                // Auto-focus next input
                if (this.value.length === 1 && i < 5) {
                    document.getElementById(`otp_${i + 1}`).focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                // Handle backspace
                if (e.key === 'Backspace' && this.value === '' && i > 0) {
                    document.getElementById(`otp_${i - 1}`).focus();
                }
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').substring(0, 6);

                for (let j = 0; j < Math.min(pastedData.length, 6); j++) {
                    document.getElementById(`otp_${j}`).value = pastedData[j];
                }

                if (pastedData.length > 0) {
                    const nextIndex = Math.min(pastedData.length, 5);
                    document.getElementById(`otp_${nextIndex}`).focus();
                }
            });
        }

        // Focus first input
        document.getElementById('otp_0').focus();
    }

    // Verify WhatsApp OTP
    function verifyWhatsAppOTP(phoneNumber, otpCode) {
        return fetch('/api/phone/verify-otp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                phone_number: phoneNumber,
                otp_code: otpCode
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                phoneVerified = true;

                // Update UI to show verification success
                const phoneInput = document.getElementById('phone_number');
                const phoneStatus = document.getElementById('phoneVerificationStatus');

                phoneInput.disabled = true;
                phoneInput.classList.add('bg-gray-100');
                phoneStatus.classList.remove('hidden');

                Swal.fire({
                    icon: 'success',
                    title: '✅ Verifikasi Berhasil!',
                    text: data.message,
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    // Continue to next step
                    nextStep();
                });

                return true;
            } else {
                Swal.showValidationMessage(data.message);
                return false;
            }
        })
        .catch(error => {
            console.error('Verify OTP error:', error);
            Swal.showValidationMessage('Terjadi kesalahan saat verifikasi OTP');
            return false;
        });
    }

    // Start OTP Timer
    function startOTPTimer() {
        if (!otpExpiryTime) return;

        const timerElement = document.getElementById('timeRemaining');
        const timerContainer = document.getElementById('otpTimer');
        const expiredContainer = document.getElementById('otpExpired');

        otpExpiryTimer = setInterval(() => {
            const now = Date.now();
            const timeLeft = otpExpiryTime - now;

            if (timeLeft > 0) {
                const minutes = Math.floor(timeLeft / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                // Change color when less than 1 minute
                if (timeLeft < 60000) {
                    timerContainer.querySelector('.bg-orange-50').className = 'bg-red-50 border border-red-200 rounded-lg p-3';
                    timerElement.parentElement.className = 'text-red-700 text-sm';
                }
            } else {
                // OTP expired
                clearInterval(otpExpiryTimer);
                timerContainer.classList.add('hidden');
                expiredContainer.classList.remove('hidden');

                // Disable confirm button
                const confirmBtn = Swal.getConfirmButton();
                if (confirmBtn) {
                    confirmBtn.disabled = true;
                    confirmBtn.textContent = 'Kode Kadaluarsa';
                    confirmBtn.style.backgroundColor = '#6b7280';
                }
            }
        }, 1000);
    }



    // Override nextStep untuk cek WhatsApp verification
    const originalNextStep = window.nextStep;
    window.nextStep = function() {
        if (currentStep === 1) {
            // Check if phone is verified before proceeding
            if (!phoneVerified) {
                // Show WhatsApp OTP modal instead of proceeding
                return showWhatsAppOTPModal();
            }
        }

        return originalNextStep();
    };

    // Toggle detail review function
    function toggleDetailReview() {
        const detailDiv = document.getElementById('detailReview');
        const toggleIcon = document.getElementById('toggleIcon');
        const toggleText = document.getElementById('toggleText');

        if (detailDiv.classList.contains('hidden')) {
            detailDiv.classList.remove('hidden');
            toggleIcon.className = 'fas fa-eye-slash mr-1';
            toggleText.textContent = 'Sembunyikan Detail';
        } else {
            detailDiv.classList.add('hidden');
            toggleIcon.className = 'fas fa-eye mr-1';
            toggleText.textContent = 'Lihat Detail';
        }
    }

    // Initialize WhatsApp verification when page loads
    document.addEventListener('DOMContentLoaded', function() {
        setupWhatsAppVerification();
    });
</script>


<style>
    .wizard-step {
        transition: all 0.3s ease-in-out;
    }

    .wizard-step[style*="none"] {
        opacity: 0;
        pointer-events: none;
    }

    .step-indicator {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .step-indicator:hover div {
        transform: scale(1.05);
    }

    .step-indicator div {
        transition: all 0.3s ease;
    }

    #progressLine {
        transition: width 0.5s ease-in-out;
    }

    /* Dropdown fix */
    select {
        pointer-events: auto !important;
        cursor: pointer !important;
        z-index: 10;
        position: relative;
    }

    select:disabled {
        background-color: #f3f4f6;
        cursor: not-allowed;
        opacity: 0.7;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .grid-cols-2 {
            grid-template-columns: 1fr;
        }
    }

    /* Select2 custom styling */
    .select2-container {
        width: 100% !important;
    }

    .select2-selection {
        background: rgb(249 250 251) !important;
        border: 1px solid rgb(229 231 235) !important;
        border-radius: 0.75rem !important;
        padding: 0.5rem 0.75rem !important;
        min-height: 3rem !important;
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    .select2-selection:focus,
    .select2-container--default.select2-container--focus .select2-selection {
        border-color: rgb(59 130 246) !important;
        box-shadow: 0 0 0 2px rgb(59 130 246 / 0.2) !important;
        outline: none !important;
    }

    .select2-dropdown {
        border: 1px solid rgb(229 231 235) !important;
        border-radius: 0.75rem !important;
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1) !important;
        margin-top: 4px !important;
    }

    .select2-results__option--highlighted {
        background-color: rgb(59 130 246) !important;
        color: white !important;
    }

    .select2-search__field {
        border: 1px solid rgb(229 231 235) !important;
        border-radius: 0.5rem !important;
        padding: 0.5rem !important;
        margin: 0.5rem !important;
    }

    .select2-selection__rendered {
        color: rgb(17 24 39) !important;
        padding: 0 !important;
        line-height: 1.75rem !important;
    }

    .select2-selection__placeholder {
        color: rgb(107 114 128) !important;
    }
</style>

<script>
    // Initialize Select2 for all searchable selects
    $(document).ready(function() {
        $('.searchable-select').select2({
            placeholder: 'Ketik untuk mencari...',
            allowClear: true,
            width: '100%',
            language: {
                noResults: function() {
                    return 'Tidak ada hasil ditemukan';
                },
                searching: function() {
                    return 'Mencari...';
                },
                removeAllItems: function() {
                    return 'Hapus semua item';
                }
            }
        });

        // Handle province change for dependency dropdown
        $('#province').on('select2:select', function(e) {
            const selectedProvince = e.params.data.id;
            console.log('Province changed to:', selectedProvince);
            updateCitiesSelect2(selectedProvince);
        });

        // Handle education level change for university visibility
        $('#education_level').on('change', function() {
            toggleUniversityFieldSelect2();
        });

        // Initialize university field visibility on page load  
        toggleUniversityFieldSelect2();

        // Handle form reset - reinitialize Select2
        $('form').on('reset', function() {
            setTimeout(function() {
                $('.searchable-select').select2({
                    placeholder: 'Ketik untuk mencari...',
                    allowClear: true,
                    width: '100%'
                });
                toggleUniversityFieldSelect2();
            }, 100);
        });

        // Initialize cities if province is selected on page load
        const initialProvince = $('#province').val();
        if (initialProvince) {
            updateCitiesSelect2(initialProvince);
        }
    });

    // Show/Hide University dropdown based on education level (Select2 version)
    function toggleUniversityFieldSelect2() {
        const educationLevel = $('#education_level').val();
        const universityContainer = $('#university').closest('.space-y-2');

        if (educationLevel === 'SMA') {
            // Hide university for SMA/SMK
            universityContainer.hide();
            $('#university').val('').trigger('change'); // Clear selection and trigger Select2 update
        } else {
            // Show university for D3, S1, S2
            universityContainer.show();
        }
    }

    // Update cities function for Select2
    function updateCitiesSelect2(selectedProvince) {
        console.log('updateCitiesSelect2 called with:', selectedProvince);
        const citySelect = $('#city');
        
        // Clear and destroy existing Select2
        citySelect.select2('destroy');
        citySelect.empty();
        
        // Add default option
        citySelect.append('<option value="">Pilih Kota/Kabupaten</option>');

        if (cityData[selectedProvince]) {
            console.log('Cities found:', cityData[selectedProvince].length);
            cityData[selectedProvince].forEach(city => {
                const option = new Option(city, city, false, false);
                // Check if this was the old selected value
                if ('{{ old("city") }}' === city) {
                    option.selected = true;
                }
                citySelect.append(option);
            });
            citySelect.prop('disabled', false);
        } else {
            console.log('No cities found for province');
            citySelect.prop('disabled', true);
        }
        
        // Reinitialize Select2 for city dropdown
        citySelect.select2({
            placeholder: 'Ketik untuk mencari kota...',
            allowClear: true,
            width: '100%',
            language: {
                noResults: function() {
                    return 'Tidak ada hasil ditemukan';
                },
                searching: function() {
                    return 'Mencari...';
                }
            }
        });
    }
</script>
@endsection

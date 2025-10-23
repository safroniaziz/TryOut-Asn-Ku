@extends('layouts.auth')

@section('content')
<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="max-w-7xl mx-auto w-full px-8 sm:px-12 lg:px-16">
        <div class="flex flex-col lg:flex-row items-center justify-center min-h-screen gap-12 lg:gap-20">

            <!-- Left Side - Informative Branding -->
            <div class="hidden lg:flex lg:w-1/3 flex-col justify-center pr-16 pl-8">
                <div class="text-white space-y-6">
                    <!-- Logo Brand -->
                    <div class="flex items-center space-x-5 group mb-8">
                        <div class="relative transform group-hover:scale-110 transition-all duration-500">
                            <div class="relative w-18 h-18 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-graduation-cap text-white text-3xl transform group-hover:rotate-12 transition-transform duration-500"></i>
                            </div>
                        </div>

                        <div class="transform group-hover:translate-x-1 transition-transform duration-500">
                            <div class="font-black text-5xl text-white">
                                TryOut<span class="text-orange-300">ASN</span>ku
                            </div>
                            <div class="text-base font-semibold text-blue-200">
                                Platform Premium
                            </div>
                        </div>
                    </div>

                    <p class="text-xl text-blue-100 leading-relaxed mb-8">
                        Platform persiapan <span class="font-bold text-orange-300">CPNS & PPPK</span> terpercaya
                    </p>

                    <!-- Informative Features -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-book-open text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-base">Bank soal terlengkap dengan pembahasan detail</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Analisis Mendalam</div>
                                <div class="text-blue-200 text-base">Laporan dan rekomendasi belajar personal</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-trophy text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Ranking Nasional</div>
                                <div class="text-blue-200 text-base">Kompetisi dengan ribuan peserta lain</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Komunitas Aktif</div>
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
            <div class="w-full lg:w-2/3 flex items-center justify-center px-4 lg:pl-16 lg:pr-8">
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
                        <div class="text-center mb-8">
                            <!-- Animated Icon -->
                            <div class="relative mb-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 via-blue-600 to-purple-600 rounded-3xl flex items-center justify-center mx-auto shadow-xl shadow-blue-500/25 animate-pulse">
                                    <div class="relative">
                                        <i class="fas fa-graduation-cap text-white text-3xl transform hover:rotate-12 transition-transform duration-500"></i>
                                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-orange-400 rounded-full animate-ping"></div>
                                    </div>
                                </div>
                                <!-- Floating Elements -->
                                <div class="absolute top-2 left-1/2 transform -translate-x-8 w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
                                <div class="absolute top-4 right-1/2 transform translate-x-8 w-1 h-1 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 0.4s;"></div>
                            </div>
                            
                            <!-- Elegant Title -->
                            <div class="space-y-3">
                                <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800">
                                    Daftar Sekarang
                                </h2>
                                <p class="text-gray-600 text-lg font-medium">
                                    Mulai perjalanan menuju <span class="text-blue-600 font-bold">ASN impianmu</span>
                                </p>
                                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mx-auto"></div>
                            </div>
                        </div>

                    <!-- Progress Steps Indicator -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between max-w-lg mx-auto">
                            <div class="step-indicator text-center relative" data-step="1">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center text-sm font-bold shadow-lg ring-4 ring-blue-100 transform scale-110 z-10 relative">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <p class="text-xs mt-3 font-semibold text-blue-600">Personal</p>
                                <div class="absolute -inset-1 bg-blue-200 rounded-full opacity-30 animate-ping"></div>
                            </div>
                            <div class="flex-1 h-2 bg-gray-100 mx-3 rounded-full relative overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 via-purple-500 to-blue-600 transition-all duration-700 rounded-full shadow-sm" id="progressLine" style="width: 25%"></div>
                            </div>
                            <div class="step-indicator text-center" data-step="2">
                                <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-sm font-semibold shadow-sm border-2 border-gray-200">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <p class="text-xs mt-3 font-medium text-gray-400">Target</p>
                            </div>
                            <div class="flex-1 h-2 bg-gray-100 mx-3 rounded-full"></div>
                            <div class="step-indicator text-center" data-step="3">
                                <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-sm font-semibold shadow-sm border-2 border-gray-200">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <p class="text-xs mt-3 font-medium text-gray-400">Background</p>
                            </div>
                            <div class="flex-1 h-2 bg-gray-100 mx-3 rounded-full"></div>
                            <div class="step-indicator text-center" data-step="4">
                                <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-sm font-semibold shadow-sm border-2 border-gray-200">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <p class="text-xs mt-3 font-medium text-gray-400">Review</p>
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
                                        <label for="whatsapp" class="block text-sm font-semibold text-gray-700">
                                            WhatsApp <span class="text-red-500">*</span>
                                        </label>
                                        <input id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp') }}" required
                                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300"
                                               placeholder="08123456789">
                                        @error('whatsapp')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
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
                                        <select id="province" name="province" required onchange="updateCities()"
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="DKI Jakarta" {{ old('province') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                                            <option value="Jawa Barat" {{ old('province') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                                            <option value="Jawa Tengah" {{ old('province') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                                            <option value="Jawa Timur" {{ old('province') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                            <!-- Add more provinces as needed -->
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
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300">
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
                                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300">
                                            <option value="">Pilih (opsional)</option>
                                            <option value="Kementerian Dalam Negeri">Kementerian Dalam Negeri</option>
                                            <option value="Kementerian Keuangan">Kementerian Keuangan</option>
                                            <option value="Kementerian Hukum dan HAM">Kementerian Hukum dan HAM</option>
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
                                    <input id="major" type="text" name="major" value="{{ old('major') }}"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Contoh: Administrasi Negara, Akuntansi, dll">
                                    @error('major')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="university" class="block text-sm font-semibold text-gray-700">
                                        Asal Universitas/Sekolah
                                    </label>
                                    <input id="university" type="text" name="university" value="{{ old('university') }}"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Nama institusi pendidikan">
                                    @error('university')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="referral_code" class="block text-sm font-semibold text-gray-700">
                                        Kode Referral (Opsional)
                                    </label>
                                    <input id="referral_code" type="text" name="referral_code" value="{{ old('referral_code') }}"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 placeholder-gray-500 transition-all duration-300"
                                           placeholder="Masukkan kode referral jika ada">
                                    @error('referral_code')
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

                            <!-- Data Review Summary -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
                                <h4 class="font-medium text-gray-800 mb-2">Ringkasan Data Anda</h4>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-600">Nama: <span class="font-medium" id="reviewName">-</span></p>
                                        <p class="text-gray-600">Email: <span class="font-medium" id="reviewEmail">-</span></p>
                                        <p class="text-gray-600">Lokasi: <span class="font-medium" id="reviewLocation">-</span></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Target: <span class="font-medium" id="reviewTarget">-</span></p>
                                        <p class="text-gray-600">Instansi: <span class="font-medium" id="reviewAgency">-</span></p>
                                        <p class="text-gray-600">Pendidikan: <span class="font-medium" id="reviewEducation">-</span></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Fields -->
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
                                    style="visibility: hidden;">
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
    // Province-City Data (simplified)
    const cityData = {
        'DKI Jakarta': ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur'],
        'Jawa Barat': ['Bandung', 'Bekasi', 'Bogor', 'Depok', 'Cimahi', 'Sukabumi'],
        'Jawa Tengah': ['Semarang', 'Surakarta', 'Magelang', 'Salatiga', 'Pekalongan'],
        'Jawa Timur': ['Surabaya', 'Malang', 'Kediri', 'Blitar', 'Mojokerto']
    };

    function updateCities() {
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        const selectedProvince = provinceSelect.value;

        // Clear cities
        citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';

        if (cityData[selectedProvince]) {
            cityData[selectedProvince].forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                if ('{{ old("city") }}' === city) {
                    option.selected = true;
                }
                citySelect.appendChild(option);
            });
        }
    }

    // Wizard functionality
    let currentStep = 1;
    const totalSteps = 4;

    document.addEventListener('DOMContentLoaded', function() {
        initWizard();

        // Initialize cities if province is selected
        const provinceSelect = document.getElementById('province');
        if (provinceSelect.value) {
            updateCities();
        }
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
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto animate-pulse">
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
                        showClass: {
                            popup: 'animate__animated animate__zoomIn animate__faster'
                        },
                        didOpen: () => {
                            // Custom loading animation
                            const popup = Swal.getPopup();
                            popup.style.background = 'linear-gradient(135deg, #ffffff 0%, #f8fafc 100%)';
                        }
                    });
                    
                    // Delay untuk menampilkan animasi loading yang indah
                    setTimeout(() => {
                        document.getElementById('wizardForm').submit();
                    }, 1500);
                }
            }
        });

        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            prevStep();
        });

        updateWizardUI();
    }

    function nextStep() {
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

        // Update step indicators with elegant animations
        for (let i = 1; i <= totalSteps; i++) {
            const stepContainer = document.querySelector(`[data-step="${i}"]`);
            const stepIndicator = stepContainer.querySelector('div');
            const stepText = stepContainer.querySelector('p');
            
            if (i < currentStep) {
                // Completed steps
                stepIndicator.className = 'w-12 h-12 rounded-full bg-gradient-to-br from-green-500 to-green-600 text-white flex items-center justify-center text-sm font-bold shadow-lg transform transition-all duration-500';
                stepText.className = 'text-xs mt-3 font-semibold text-green-600';
            } else if (i === currentStep) {
                // Current step
                stepIndicator.className = 'w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center text-sm font-bold shadow-lg ring-4 ring-blue-100 transform scale-110 transition-all duration-500';
                stepText.className = 'text-xs mt-3 font-semibold text-blue-600';
            } else {
                // Future steps
                stepIndicator.className = 'w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-sm font-semibold shadow-sm border-2 border-gray-200 transition-all duration-500';
                stepText.className = 'text-xs mt-3 font-medium text-gray-400';
            }
        }

        // Update step text
        document.getElementById('currentStepText').textContent = currentStep;
        const stepDescriptions = ['Data Personal', 'Target & Aspirasi', 'Background', 'Review & Password'];
        document.getElementById('stepDescription').textContent = stepDescriptions[currentStep - 1];

        // Update buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        if (currentStep === 1) {
            prevBtn.style.visibility = 'hidden';
        } else {
            prevBtn.style.visibility = 'visible';
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
                backdrop: 'rgba(0,0,0,0.4)',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__faster'
                }
            });
        }

        return isValid;
    }

    function updateReviewData() {
        document.getElementById('reviewName').textContent = document.getElementById('name').value || '-';
        document.getElementById('reviewEmail').textContent = document.getElementById('email').value || '-';
        document.getElementById('reviewLocation').textContent =
            (document.getElementById('city').value || document.getElementById('province').value || '-');
        document.getElementById('reviewTarget').textContent = document.getElementById('cpns_type').value || '-';
        document.getElementById('reviewAgency').textContent = document.getElementById('target_agency').value || 'Tidak disebutkan';
        document.getElementById('reviewEducation').textContent = document.getElementById('education_level').value || '-';
    }
</script>


<style>
    .wizard-step {
        transition: all 0.3s ease-in-out;
    }

    .wizard-step[style*="none"] {
        opacity: 0;
        pointer-events: none;
    }

    .step-indicator div {
        transition: all 0.3s ease;
    }

    #progressLine {
        transition: width 0.5s ease-in-out;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .grid-cols-2 {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@extends('layouts.auth-register')

@section('content')
<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-center min-h-screen">

            <!-- Left Side - Informative Branding -->
            <div class="hidden lg:flex lg:w-1/3 flex-col justify-center pr-8">
                <div class="text-white space-y-6">
                    <!-- Logo Brand dengan Design Premium -->
                    <div class="flex items-center space-x-5 group mb-8">
                        <div class="relative transform group-hover:scale-110 transition-all duration-500">
                            <div class="relative w-18 h-18 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-graduation-cap text-white text-3xl transform group-hover:rotate-12 transition-transform duration-500"></i>
                            </div>
                        </div>

                        <div class="transform group-hover:translate-x-1 transition-transform duration-500">
                            <div class="font-black text-5xl text-white">
                                Join<span class="text-orange-300">ASN</span>ku
                            </div>
                            <div class="text-base font-semibold text-blue-200">
                                Platform Premium
                            </div>
                        </div>
                    </div>

                    <p class="text-xl text-blue-100 leading-relaxed mb-8">
                        Bergabung dengan <span class="font-bold text-orange-300">10,000+</span> calon ASN sukses
                    </p>                    <!-- Benefits -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gift text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Free Trial 7 Hari</div>
                                <div class="text-blue-200 text-sm">Akses penuh semua fitur premium</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-book-open text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-sm">Bank soal terlengkap dengan pembahasan</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Komunitas Aktif</div>
                                <div class="text-blue-200 text-sm">Diskusi dan berbagi tips dengan sesama</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Analisis Personal</div>
                                <div class="text-blue-200 text-sm">Laporan dan rekomendasi belajar</div>
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
                            <div class="text-xl font-bold text-white">FREE</div>
                            <div class="text-blue-200 text-xs">7 Days Trial</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">24/7</div>
                            <div class="text-blue-200 text-xs">Support</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="w-full lg:w-2/3 bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl p-8 lg:p-12 relative overflow-hidden">
                <div class="register-form">
                    <!-- Form Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Sekarang</h2>
                        <p class="text-gray-600">Mulai perjalanan menuju ASN impianmu</p>
                    </div>

                    <!-- Progress Steps Indicator -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between max-w-md mx-auto">
                            <div class="step-indicator text-center" data-step="1">
                                <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center text-sm font-semibold shadow-lg ring-4 ring-blue-200 animate-pulse">1</div>
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

                    <form method="POST" action="{{ route('register') }}" class="space-y-6" id="wizardForm">
                        @csrf

                            <!-- STEP 1: DATA PERSONAL -->
                            <div class="wizard-step active" id="step1">
                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                        <i class="fas fa-user text-blue-500 mr-2"></i>
                                        Data Personal
                                    </h3>
                                    <p class="text-sm text-gray-600">Informasi dasar dan kontak Anda</p>
                                </div>

                                <div class="space-y-4">
                                    <!-- Name & Email Fields - 2 Columns -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Name Field -->
                                <div class="space-y-1">
                                    <label for="name" class="block text-xs font-medium text-gray-700">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="name"
                                               type="text"
                                               name="name"
                                               value="{{ old('name') }}"
                                               required
                                               autocomplete="name"
                                               placeholder="Nama lengkap"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('name')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="space-y-1">
                                    <label for="email" class="block text-xs font-medium text-gray-700">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="email"
                                               type="email"
                                               name="email"
                                               value="{{ old('email') }}"
                                               required
                                               autocomplete="email"
                                               placeholder="Email address"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('email')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Contact & CPNS Type - 2 Columns -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- WhatsApp Field -->
                                <div class="space-y-1">
                                    <label for="whatsapp" class="block text-xs font-medium text-gray-700">
                                        WhatsApp <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fab fa-whatsapp text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="whatsapp"
                                               type="text"
                                               name="whatsapp"
                                               value="{{ old('whatsapp') }}"
                                               required
                                               placeholder="08123456789"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('whatsapp')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- CPNS Type Field -->
                                <div class="space-y-1">
                                    <label for="cpns_type" class="block text-xs font-medium text-gray-700">
                                        Jenis yang Dituju <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-user-tie text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="cpns_type"
                                                name="cpns_type"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih</option>
                                            <option value="CPNS" {{ old('cpns_type') == 'CPNS' ? 'selected' : '' }}>CPNS (Calon Pegawai Negeri Sipil)</option>
                                            <option value="PPPK" {{ old('cpns_type') == 'PPPK' ? 'selected' : '' }}>PPPK (Pegawai Pemerintah dengan Perjanjian Kerja)</option>
                                            <option value="Keduanya" {{ old('cpns_type') == 'Keduanya' ? 'selected' : '' }}>Keduanya (CPNS & PPPK)</option>
                                        </select>
                                        @error('cpns_type')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Location - Province & City -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Province Field -->
                                <div class="space-y-1">
                                    <label for="province" class="block text-xs font-medium text-gray-700">
                                        Provinsi <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-map text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="province"
                                                name="province"
                                                required
                                                onchange="updateCities()"
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
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
                                            <option value="Jawa Tengah" {{ old('province') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                                            <option value="DI Yogyakarta" {{ old('province') == 'DI Yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
                                            <option value="Jawa Timur" {{ old('province') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                            <option value="Banten" {{ old('province') == 'Banten' ? 'selected' : '' }}>Banten</option>
                                            <option value="Bali" {{ old('province') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                            <option value="Nusa Tenggara Barat" {{ old('province') == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                                            <option value="Nusa Tenggara Timur" {{ old('province') == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                                            <option value="Kalimantan Barat" {{ old('province') == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                                            <option value="Kalimantan Tengah" {{ old('province') == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                                            <option value="Kalimantan Selatan" {{ old('province') == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                                            <option value="Kalimantan Timur" {{ old('province') == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                                            <option value="Kalimantan Utara" {{ old('province') == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                                            <option value="Sulawesi Utara" {{ old('province') == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                                            <option value="Sulawesi Tengah" {{ old('province') == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                                            <option value="Sulawesi Selatan" {{ old('province') == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                                            <option value="Sulawesi Tenggara" {{ old('province') == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                                            <option value="Gorontalo" {{ old('province') == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                            <option value="Sulawesi Barat" {{ old('province') == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                                            <option value="Maluku" {{ old('province') == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                                            <option value="Maluku Utara" {{ old('province') == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                                            <option value="Papua" {{ old('province') == 'Papua' ? 'selected' : '' }}>Papua</option>
                                            <option value="Papua Barat" {{ old('province') == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                                            <option value="Papua Selatan" {{ old('province') == 'Papua Selatan' ? 'selected' : '' }}>Papua Selatan</option>
                                            <option value="Papua Tengah" {{ old('province') == 'Papua Tengah' ? 'selected' : '' }}>Papua Tengah</option>
                                            <option value="Papua Pegunungan" {{ old('province') == 'Papua Pegunungan' ? 'selected' : '' }}>Papua Pegunungan</option>
                                            <option value="Papua Barat Daya" {{ old('province') == 'Papua Barat Daya' ? 'selected' : '' }}>Papua Barat Daya</option>
                                        </select>
                                        @error('province')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- City Field -->
                                <div class="space-y-1">
                                    <label for="city" class="block text-xs font-medium text-gray-700">
                                        Kota/Kabupaten <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="city"
                                                name="city"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih Provinsi dulu</option>
                                        </select>
                                        @error('city')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Address Field -->
                            <div class="space-y-1">
                                <label for="address" class="block text-xs font-medium text-gray-700">
                                    Alamat Lengkap <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-2.5 left-2.5 pointer-events-none">
                                        <i class="fas fa-home text-gray-400 text-xs"></i>
                                    </div>
                                    <textarea id="address"
                                              name="address"
                                              required
                                              rows="3"
                                              placeholder="Jl. Contoh No. 123, RT/RW 001/002, Kelurahan/Desa, Kecamatan"
                                              class="w-full pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm resize-none">{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- STEP 2: TARGET & ASPIRASI -->
                        <div class="wizard-step" id="step2" style="display: none;">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-bullseye text-blue-500 mr-2"></i>
                                    Target & Aspirasi
                                </h3>
                                <p class="text-sm text-gray-600">Tujuan karir dan instansi yang Anda inginkan</p>
                            </div>

                            <div class="space-y-4">
                                <!-- CPNS Type & Target Score -->
                                <div class="grid grid-cols-2 gap-3">
                                    <!-- CPNS Type Field -->
                                    <div class="space-y-1">
                                        <label for="cpns_type" class="block text-xs font-medium text-gray-700">
                                            Jenis yang Dituju <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                                <i class="fas fa-user-tie text-gray-400 text-xs"></i>
                                            </div>
                                            <select id="cpns_type"
                                                    name="cpns_type"
                                                    required
                                                    class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                                <option value="">Pilih</option>
                                                <option value="CPNS" {{ old('cpns_type') == 'CPNS' ? 'selected' : '' }}>CPNS (Calon Pegawai Negeri Sipil)</option>
                                                <option value="PPPK" {{ old('cpns_type') == 'PPPK' ? 'selected' : '' }}>PPPK (Pegawai Pemerintah dengan Perjanjian Kerja)</option>
                                                <option value="Keduanya" {{ old('cpns_type') == 'Keduanya' ? 'selected' : '' }}>Keduanya (CPNS & PPPK)</option>
                                            </select>
                                            @error('cpns_type')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Target Score Field -->
                                    <div class="space-y-1">
                                        <label for="target_score" class="block text-xs font-medium text-gray-700">
                                            Target Skor
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                                <i class="fas fa-bullseye text-gray-400 text-xs"></i>
                                            </div>
                                            <input id="target_score"
                                                   type="number"
                                                   name="target_score"
                                                   value="{{ old('target_score') }}"
                                                   min="100"
                                                   max="500"
                                                   placeholder="400 (opsional)"
                                                   class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            @error('target_score')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            <!-- Instansi & Jurusan - 2 Columns -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Education Level Field -->
                                <div class="space-y-1">
                                    <label for="education_level" class="block text-xs font-medium text-gray-700">
                                        Pendidikan Terakhir <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-graduation-cap text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="education_level"
                                                name="education_level"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih</option>
                                            <option value="SMA" {{ old('education_level') == 'SMA' ? 'selected' : '' }}>SMA/SMK</option>
                                            <option value="D3" {{ old('education_level') == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="S1" {{ old('education_level') == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ old('education_level') == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ old('education_level') == 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                        @error('education_level')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Work Status Field -->
                                <div class="space-y-1">
                                    <label for="work_status" class="block text-xs font-medium text-gray-700">
                                        Status Kerja Saat Ini <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-briefcase text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="work_status"
                                                name="work_status"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih</option>
                                            <option value="mahasiswa" {{ old('work_status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                            <option value="pengangguran" {{ old('work_status') == 'pengangguran' ? 'selected' : '' }}>Pencari Kerja</option>
                                            <option value="swasta" {{ old('work_status') == 'swasta' ? 'selected' : '' }}>Swasta</option>
                                            <option value="pns" {{ old('work_status') == 'pns' ? 'selected' : '' }}>PNS/ASN</option>
                                            <option value="freelancer" {{ old('work_status') == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                                            <option value="wiraswasta" {{ old('work_status') == 'wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                        </select>
                                        @error('work_status')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Instansi & Jurusan - 2 Columns -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Instansi Tujuan Field -->
                                <div class="space-y-1">
                                    <label for="target_agency" class="block text-xs font-medium text-gray-700">
                                        Instansi Tujuan
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-building text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="target_agency"
                                                name="target_agency"
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih (opsional)</option>

                                            <!-- Kementerian Koordinator -->
                                            <optgroup label="Kementerian Koordinator">
                                                <option value="Kemenko Polhukam" {{ old('target_agency') == 'Kemenko Polhukam' ? 'selected' : '' }}>Kemenko Politik, Hukum & Keamanan</option>
                                                <option value="Kemenko Perekonomian" {{ old('target_agency') == 'Kemenko Perekonomian' ? 'selected' : '' }}>Kemenko Perekonomian</option>
                                                <option value="Kemenko PMK" {{ old('target_agency') == 'Kemenko PMK' ? 'selected' : '' }}>Kemenko Pembangunan Manusia & Kebudayaan</option>
                                                <option value="Kemenko Maritim" {{ old('target_agency') == 'Kemenko Maritim' ? 'selected' : '' }}>Kemenko Maritim & Investasi</option>
                                            </optgroup>

                                            <!-- Kementerian -->
                                            <optgroup label="Kementerian">
                                                <option value="Kementerian Dalam Negeri" {{ old('target_agency') == 'Kementerian Dalam Negeri' ? 'selected' : '' }}>Kementerian Dalam Negeri</option>
                                                <option value="Kementerian Luar Negeri" {{ old('target_agency') == 'Kementerian Luar Negeri' ? 'selected' : '' }}>Kementerian Luar Negeri</option>
                                                <option value="Kementerian Pertahanan" {{ old('target_agency') == 'Kementerian Pertahanan' ? 'selected' : '' }}>Kementerian Pertahanan</option>
                                                <option value="Kementerian Hukum dan HAM" {{ old('target_agency') == 'Kementerian Hukum dan HAM' ? 'selected' : '' }}>Kementerian Hukum dan HAM</option>
                                                <option value="Kementerian Keuangan" {{ old('target_agency') == 'Kementerian Keuangan' ? 'selected' : '' }}>Kementerian Keuangan</option>
                                                <option value="Kementerian ESDM" {{ old('target_agency') == 'Kementerian ESDM' ? 'selected' : '' }}>Kementerian Energi & Sumber Daya Mineral</option>
                                                <option value="Kementerian Perindustrian" {{ old('target_agency') == 'Kementerian Perindustrian' ? 'selected' : '' }}>Kementerian Perindustrian</option>
                                                <option value="Kementerian Perdagangan" {{ old('target_agency') == 'Kementerian Perdagangan' ? 'selected' : '' }}>Kementerian Perdagangan</option>
                                                <option value="Kementerian Pertanian" {{ old('target_agency') == 'Kementerian Pertanian' ? 'selected' : '' }}>Kementerian Pertanian</option>
                                                <option value="Kementerian Kehutanan" {{ old('target_agency') == 'Kementerian Kehutanan' ? 'selected' : '' }}>Kementerian Lingkungan Hidup & Kehutanan</option>
                                                <option value="Kementerian Perhubungan" {{ old('target_agency') == 'Kementerian Perhubungan' ? 'selected' : '' }}>Kementerian Perhubungan</option>
                                                <option value="Kementerian Kelautan" {{ old('target_agency') == 'Kementerian Kelautan' ? 'selected' : '' }}>Kementerian Kelautan & Perikanan</option>
                                                <option value="Kementerian ATR/BPN" {{ old('target_agency') == 'Kementerian ATR/BPN' ? 'selected' : '' }}>Kementerian ATR/BPN</option>
                                                <option value="Kementerian Pendidikan" {{ old('target_agency') == 'Kementerian Pendidikan' ? 'selected' : '' }}>Kementerian Pendidikan, Kebudayaan, Riset & Teknologi</option>
                                                <option value="Kementerian Kesehatan" {{ old('target_agency') == 'Kementerian Kesehatan' ? 'selected' : '' }}>Kementerian Kesehatan</option>
                                                <option value="Kementerian Agama" {{ old('target_agency') == 'Kementerian Agama' ? 'selected' : '' }}>Kementerian Agama</option>
                                                <option value="Kementerian Sosial" {{ old('target_agency') == 'Kementerian Sosial' ? 'selected' : '' }}>Kementerian Sosial</option>
                                                <option value="Kementerian Tenaga Kerja" {{ old('target_agency') == 'Kementerian Tenaga Kerja' ? 'selected' : '' }}>Kementerian Ketenagakerjaan</option>
                                                <option value="Kementerian Pemberdayaan Perempuan" {{ old('target_agency') == 'Kementerian Pemberdayaan Perempuan' ? 'selected' : '' }}>Kementerian Pemberdayaan Perempuan & Perlindungan Anak</option>
                                                <option value="Kementerian PAN-RB" {{ old('target_agency') == 'Kementerian PAN-RB' ? 'selected' : '' }}>Kementerian PAN-RB</option>
                                                <option value="Kementerian PPN/Bappenas" {{ old('target_agency') == 'Kementerian PPN/Bappenas' ? 'selected' : '' }}>Kementerian PPN/Bappenas</option>
                                                <option value="Kementerian PUPR" {{ old('target_agency') == 'Kementerian PUPR' ? 'selected' : '' }}>Kementerian PUPR</option>
                                                <option value="Kementerian Desa" {{ old('target_agency') == 'Kementerian Desa' ? 'selected' : '' }}>Kementerian Desa, Pembangunan Daerah Tertinggal & Transmigrasi</option>
                                                <option value="Kementerian Kominfo" {{ old('target_agency') == 'Kementerian Kominfo' ? 'selected' : '' }}>Kementerian Komunikasi & Informatika</option>
                                                <option value="Kementerian Koperasi" {{ old('target_agency') == 'Kementerian Koperasi' ? 'selected' : '' }}>Kementerian Koperasi & UKM</option>
                                                <option value="Kementerian Investasi" {{ old('target_agency') == 'Kementerian Investasi' ? 'selected' : '' }}>Kementerian Investasi/BKPM</option>
                                                <option value="Kementerian Pariwisata" {{ old('target_agency') == 'Kementerian Pariwisata' ? 'selected' : '' }}>Kementerian Pariwisata & Ekonomi Kreatif</option>
                                                <option value="Kementerian BUMN" {{ old('target_agency') == 'Kementerian BUMN' ? 'selected' : '' }}>Kementerian BUMN</option>
                                                <option value="Kementerian Pemuda" {{ old('target_agency') == 'Kementerian Pemuda' ? 'selected' : '' }}>Kementerian Pemuda & Olahraga</option>
                                            </optgroup>

                                            <!-- Lembaga Pemerintah Non Kementerian -->
                                            <optgroup label="Lembaga Pemerintah Non Kementerian">
                                                <option value="BPS" {{ old('target_agency') == 'BPS' ? 'selected' : '' }}>Badan Pusat Statistik</option>
                                                <option value="BPKP" {{ old('target_agency') == 'BPKP' ? 'selected' : '' }}>Badan Pengawasan Keuangan & Pembangunan</option>
                                                <option value="BKN" {{ old('target_agency') == 'BKN' ? 'selected' : '' }}>Badan Kepegawaian Negara</option>
                                                <option value="BPOM" {{ old('target_agency') == 'BPOM' ? 'selected' : '' }}>Badan Pengawas Obat & Makanan</option>
                                                <option value="BATAN" {{ old('target_agency') == 'BATAN' ? 'selected' : '' }}>Badan Tenaga Nuklir Nasional</option>
                                                <option value="LAPAN" {{ old('target_agency') == 'LAPAN' ? 'selected' : '' }}>Lembaga Penerbangan & Antariksa Nasional</option>
                                                <option value="LIPI" {{ old('target_agency') == 'LIPI' ? 'selected' : '' }}>Lembaga Ilmu Pengetahuan Indonesia</option>
                                                <option value="BRIN" {{ old('target_agency') == 'BRIN' ? 'selected' : '' }}>Badan Riset & Inovasi Nasional</option>
                                                <option value="BMKG" {{ old('target_agency') == 'BMKG' ? 'selected' : '' }}>Badan Meteorologi Klimatologi & Geofisika</option>
                                                <option value="BIG" {{ old('target_agency') == 'BIG' ? 'selected' : '' }}>Badan Informasi Geospasial</option>
                                                <option value="BNPB" {{ old('target_agency') == 'BNPB' ? 'selected' : '' }}>Badan Nasional Penanggulangan Bencana</option>
                                                <option value="BNN" {{ old('target_agency') == 'BNN' ? 'selected' : '' }}>Badan Narkotika Nasional</option>
                                                <option value="Basarnas" {{ old('target_agency') == 'Basarnas' ? 'selected' : '' }}>Badan SAR Nasional</option>
                                                <option value="ANRI" {{ old('target_agency') == 'ANRI' ? 'selected' : '' }}>Arsip Nasional Republik Indonesia</option>
                                                <option value="BAKAMLA" {{ old('target_agency') == 'BAKAMLA' ? 'selected' : '' }}>Badan Keamanan Laut</option>
                                                <option value="BSSN" {{ old('target_agency') == 'BSSN' ? 'selected' : '' }}>Badan Siber & Sandi Negara</option>
                                                <option value="BAPETEN" {{ old('target_agency') == 'BAPETEN' ? 'selected' : '' }}>Badan Pengawas Tenaga Nuklir</option>
                                                <option value="BNPT" {{ old('target_agency') == 'BNPT' ? 'selected' : '' }}>Badan Nasional Penanggulangan Terorisme</option>
                                                <option value="BIN" {{ old('target_agency') == 'BIN' ? 'selected' : '' }}>Badan Intelijen Negara</option>
                                                <option value="PPATK" {{ old('target_agency') == 'PPATK' ? 'selected' : '' }}>Pusat Pelaporan & Analisis Transaksi Keuangan</option>
                                                <option value="LKPP" {{ old('target_agency') == 'LKPP' ? 'selected' : '' }}>Lembaga Kebijakan Pengadaan Barang/Jasa</option>
                                                <option value="BSN" {{ old('target_agency') == 'BSN' ? 'selected' : '' }}>Badan Standardisasi Nasional</option>
                                                <option value="BAPANAS" {{ old('target_agency') == 'BAPANAS' ? 'selected' : '' }}>Badan Pangan Nasional</option>
                                                <option value="BKKBN" {{ old('target_agency') == 'BKKBN' ? 'selected' : '' }}>Badan Kependudukan & Keluarga Berencana</option>
                                            </optgroup>

                                            <!-- Lembaga Non Struktural -->
                                            <optgroup label="Lembaga Non Struktural">
                                                <option value="KSP" {{ old('target_agency') == 'KSP' ? 'selected' : '' }}>Kantor Staf Presiden</option>
                                                <option value="Setneg" {{ old('target_agency') == 'Setneg' ? 'selected' : '' }}>Sekretariat Negara</option>
                                                <option value="Setkab" {{ old('target_agency') == 'Setkab' ? 'selected' : '' }}>Sekretariat Kabinet</option>
                                                <option value="UKP-PIP" {{ old('target_agency') == 'UKP-PIP' ? 'selected' : '' }}>Unit Kerja Presiden Pembinaan Ideologi Pancasila</option>
                                            </optgroup>

                                            <!-- Badan Usaha Milik Negara -->
                                            <optgroup label="BUMN & Anak Perusahaan">
                                                <option value="PLN" {{ old('target_agency') == 'PLN' ? 'selected' : '' }}>PT PLN (Persero)</option>
                                                <option value="Pertamina" {{ old('target_agency') == 'Pertamina' ? 'selected' : '' }}>PT Pertamina (Persero)</option>
                                                <option value="Garuda Indonesia" {{ old('target_agency') == 'Garuda Indonesia' ? 'selected' : '' }}>PT Garuda Indonesia (Persero)</option>
                                                <option value="Telkom" {{ old('target_agency') == 'Telkom' ? 'selected' : '' }}>PT Telkom Indonesia (Persero)</option>
                                                <option value="Bank Mandiri" {{ old('target_agency') == 'Bank Mandiri' ? 'selected' : '' }}>PT Bank Mandiri (Persero)</option>
                                                <option value="Bank BNI" {{ old('target_agency') == 'Bank BNI' ? 'selected' : '' }}>PT Bank Negara Indonesia (Persero)</option>
                                                <option value="Bank BRI" {{ old('target_agency') == 'Bank BRI' ? 'selected' : '' }}>PT Bank Rakyat Indonesia (Persero)</option>
                                                <option value="Bank BTN" {{ old('target_agency') == 'Bank BTN' ? 'selected' : '' }}>PT Bank Tabungan Negara (Persero)</option>
                                                <option value="Pos Indonesia" {{ old('target_agency') == 'Pos Indonesia' ? 'selected' : '' }}>PT Pos Indonesia (Persero)</option>
                                                <option value="KAI" {{ old('target_agency') == 'KAI' ? 'selected' : '' }}>PT Kereta Api Indonesia (Persero)</option>
                                                <option value="Pelni" {{ old('target_agency') == 'Pelni' ? 'selected' : '' }}>PT Pelni (Persero)</option>
                                                <option value="Angkasa Pura I" {{ old('target_agency') == 'Angkasa Pura I' ? 'selected' : '' }}>PT Angkasa Pura I (Persero)</option>
                                                <option value="Angkasa Pura II" {{ old('target_agency') == 'Angkasa Pura II' ? 'selected' : '' }}>PT Angkasa Pura II (Persero)</option>
                                                <option value="Pelindo" {{ old('target_agency') == 'Pelindo' ? 'selected' : '' }}>PT Pelindo (Persero)</option>
                                                <option value="Semen Indonesia" {{ old('target_agency') == 'Semen Indonesia' ? 'selected' : '' }}>PT Semen Indonesia (Persero)</option>
                                                <option value="Pupuk Indonesia" {{ old('target_agency') == 'Pupuk Indonesia' ? 'selected' : '' }}>PT Pupuk Indonesia (Persero)</option>
                                                <option value="Bio Farma" {{ old('target_agency') == 'Bio Farma' ? 'selected' : '' }}>PT Bio Farma (Persero)</option>
                                                <option value="Kimia Farma" {{ old('target_agency') == 'Kimia Farma' ? 'selected' : '' }}>PT Kimia Farma (Persero)</option>
                                                <option value="PTPN" {{ old('target_agency') == 'PTPN' ? 'selected' : '' }}>PT Perkebunan Nusantara</option>
                                                <option value="Bulog" {{ old('target_agency') == 'Bulog' ? 'selected' : '' }}>Perum Bulog</option>
                                                <option value="Perum Jamkrindo" {{ old('target_agency') == 'Perum Jamkrindo' ? 'selected' : '' }}>Perum Jamkrindo</option>
                                                <option value="LEN Industri" {{ old('target_agency') == 'LEN Industri' ? 'selected' : '' }}>PT LEN Industri (Persero)</option>
                                                <option value="INKA" {{ old('target_agency') == 'INKA' ? 'selected' : '' }}>PT INKA (Persero)</option>
                                                <option value="DI" {{ old('target_agency') == 'DI' ? 'selected' : '' }}>PT Dirgantara Indonesia (Persero)</option>
                                                <option value="PAL Indonesia" {{ old('target_agency') == 'PAL Indonesia' ? 'selected' : '' }}>PT PAL Indonesia (Persero)</option>
                                                <option value="Pindad" {{ old('target_agency') == 'Pindad' ? 'selected' : '' }}>PT Pindad (Persero)</option>
                                            </optgroup>

                                            <!-- Rumah Sakit & Institusi Kesehatan -->
                                            <optgroup label="Rumah Sakit & Fasilitas Kesehatan">
                                                <option value="RSUPN Dr. Cipto Mangunkusumo" {{ old('target_agency') == 'RSUPN Dr. Cipto Mangunkusumo' ? 'selected' : '' }}>RSUPN Dr. Cipto Mangunkusumo</option>
                                                <option value="RS Jantung Harapan Kita" {{ old('target_agency') == 'RS Jantung Harapan Kita' ? 'selected' : '' }}>RS Jantung & Pembuluh Darah Harapan Kita</option>
                                                <option value="RS Kanker Dharmais" {{ old('target_agency') == 'RS Kanker Dharmais' ? 'selected' : '' }}>RS Kanker Dharmais</option>
                                                <option value="RSUP Fatmawati" {{ old('target_agency') == 'RSUP Fatmawati' ? 'selected' : '' }}>RSUP Fatmawati</option>
                                                <option value="RSUP Persahabatan" {{ old('target_agency') == 'RSUP Persahabatan' ? 'selected' : '' }}>RSUP Persahabatan</option>
                                                <option value="RS Mata Cicendo" {{ old('target_agency') == 'RS Mata Cicendo' ? 'selected' : '' }}>RS Mata Cicendo</option>
                                                <option value="RS Dr. Sardjito" {{ old('target_agency') == 'RS Dr. Sardjito' ? 'selected' : '' }}>RSUP Dr. Sardjito</option>
                                                <option value="RS Dr. Soetomo" {{ old('target_agency') == 'RS Dr. Soetomo' ? 'selected' : '' }}>RSUD Dr. Soetomo</option>
                                            </optgroup>

                                            <!-- Kepolisian & TNI -->
                                            <optgroup label="Keamanan & Pertahanan">
                                                <option value="Polri" {{ old('target_agency') == 'Polri' ? 'selected' : '' }}>Kepolisian Negara RI</option>
                                                <option value="TNI AD" {{ old('target_agency') == 'TNI AD' ? 'selected' : '' }}>TNI Angkatan Darat</option>
                                                <option value="TNI AL" {{ old('target_agency') == 'TNI AL' ? 'selected' : '' }}>TNI Angkatan Laut</option>
                                                <option value="TNI AU" {{ old('target_agency') == 'TNI AU' ? 'selected' : '' }}>TNI Angkatan Udara</option>
                                            </optgroup>

                                            <!-- Lembaga Tinggi Negara -->
                                            <optgroup label="Lembaga Tinggi Negara">
                                                <option value="Kejaksaan" {{ old('target_agency') == 'Kejaksaan' ? 'selected' : '' }}>Kejaksaan Agung RI</option>
                                                <option value="MA" {{ old('target_agency') == 'MA' ? 'selected' : '' }}>Mahkamah Agung</option>
                                                <option value="MK" {{ old('target_agency') == 'MK' ? 'selected' : '' }}>Mahkamah Konstitusi</option>
                                                <option value="KPK" {{ old('target_agency') == 'KPK' ? 'selected' : '' }}>Komisi Pemberantasan Korupsi</option>
                                                <option value="Komnas HAM" {{ old('target_agency') == 'Komnas HAM' ? 'selected' : '' }}>Komnas HAM</option>
                                            </optgroup>

                                            <!-- Pemerintah Daerah -->
                                            <optgroup label="Pemerintah Daerah">
                                                <option value="Pemprov" {{ old('target_agency') == 'Pemprov' ? 'selected' : '' }}>Pemerintah Provinsi</option>
                                                <option value="Pemkab" {{ old('target_agency') == 'Pemkab' ? 'selected' : '' }}>Pemerintah Kabupaten</option>
                                                <option value="Pemkot" {{ old('target_agency') == 'Pemkot' ? 'selected' : '' }}>Pemerintah Kota</option>
                                            </optgroup>
                                        </select>
                                        @error('target_agency')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Jurusan Field -->
                                <div class="space-y-1">
                                    <label for="major" class="block text-xs font-medium text-gray-700">
                                        Jurusan/Bidang Studi
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-book text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="major"
                                                name="major"
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih (opsional)</option>

                                            <!-- Teknik -->
                                            <optgroup label="Teknik">
                                                <option value="Teknik Sipil" {{ old('major') == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                                                <option value="Teknik Mesin" {{ old('major') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                                                <option value="Teknik Elektro" {{ old('major') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                                                <option value="Teknik Informatika" {{ old('major') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                                <option value="Teknik Komputer" {{ old('major') == 'Teknik Komputer' ? 'selected' : '' }}>Teknik Komputer</option>
                                                <option value="Sistem Informasi" {{ old('major') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                                <option value="Teknik Industri" {{ old('major') == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>
                                                <option value="Teknik Kimia" {{ old('major') == 'Teknik Kimia' ? 'selected' : '' }}>Teknik Kimia</option>
                                                <option value="Arsitektur" {{ old('major') == 'Arsitektur' ? 'selected' : '' }}>Arsitektur</option>
                                                <option value="Teknik Lingkungan" {{ old('major') == 'Teknik Lingkungan' ? 'selected' : '' }}>Teknik Lingkungan</option>
                                                <option value="Teknik Geologi" {{ old('major') == 'Teknik Geologi' ? 'selected' : '' }}>Teknik Geologi</option>
                                                <option value="Teknik Geodesi" {{ old('major') == 'Teknik Geodesi' ? 'selected' : '' }}>Teknik Geodesi</option>
                                                <option value="Teknik Pertambangan" {{ old('major') == 'Teknik Pertambangan' ? 'selected' : '' }}>Teknik Pertambangan</option>
                                                <option value="Teknik Kelautan" {{ old('major') == 'Teknik Kelautan' ? 'selected' : '' }}>Teknik Kelautan</option>
                                                <option value="Teknik Perkapalan" {{ old('major') == 'Teknik Perkapalan' ? 'selected' : '' }}>Teknik Perkapalan</option>
                                                <option value="Teknik Penerbangan" {{ old('major') == 'Teknik Penerbangan' ? 'selected' : '' }}>Teknik Penerbangan (Aeronautika)</option>
                                                <option value="Teknik Dirgantara" {{ old('major') == 'Teknik Dirgantara' ? 'selected' : '' }}>Teknik Dirgantara (Astronautika)</option>
                                                <option value="Teknik Metalurgi" {{ old('major') == 'Teknik Metalurgi' ? 'selected' : '' }}>Teknik Metalurgi & Material</option>
                                                <option value="Teknik Nuklir" {{ old('major') == 'Teknik Nuklir' ? 'selected' : '' }}>Teknik Nuklir</option>
                                                <option value="Teknik Biomedik" {{ old('major') == 'Teknik Biomedik' ? 'selected' : '' }}>Teknik Biomedik</option>
                                                <option value="Teknik Pangan" {{ old('major') == 'Teknik Pangan' ? 'selected' : '' }}>Teknik Pangan</option>
                                                <option value="Teknik Tekstil" {{ old('major') == 'Teknik Tekstil' ? 'selected' : '' }}>Teknik Tekstil</option>
                                                <option value="Teknik Fisika" {{ old('major') == 'Teknik Fisika' ? 'selected' : '' }}>Teknik Fisika</option>
                                                <option value="Perencanaan Wilayah Kota" {{ old('major') == 'Perencanaan Wilayah Kota' ? 'selected' : '' }}>Perencanaan Wilayah & Kota</option>
                                                <option value="Desain Interior" {{ old('major') == 'Desain Interior' ? 'selected' : '' }}>Desain Interior</option>
                                                <option value="Lanskap" {{ old('major') == 'Lanskap' ? 'selected' : '' }}>Arsitektur Lanskap</option>
                                            </optgroup>

                                            <!-- Ekonomi & Bisnis -->
                                            <optgroup label="Ekonomi & Bisnis">
                                                <option value="Akuntansi" {{ old('major') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                                                <option value="Manajemen" {{ old('major') == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                                                <option value="Ekonomi Pembangunan" {{ old('major') == 'Ekonomi Pembangunan' ? 'selected' : '' }}>Ekonomi Pembangunan</option>
                                                <option value="Ekonomi Syariah" {{ old('major') == 'Ekonomi Syariah' ? 'selected' : '' }}>Ekonomi Syariah</option>
                                                <option value="Bisnis Digital" {{ old('major') == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                                <option value="Administrasi Bisnis" {{ old('major') == 'Administrasi Bisnis' ? 'selected' : '' }}>Administrasi Bisnis</option>
                                                <option value="Keuangan Perbankan" {{ old('major') == 'Keuangan Perbankan' ? 'selected' : '' }}>Keuangan & Perbankan</option>
                                            </optgroup>

                                            <!-- Hukum & Politik -->
                                            <optgroup label="Hukum & Politik">
                                                <option value="Ilmu Hukum" {{ old('major') == 'Ilmu Hukum' ? 'selected' : '' }}>Ilmu Hukum</option>
                                                <option value="Ilmu Politik" {{ old('major') == 'Ilmu Politik' ? 'selected' : '' }}>Ilmu Politik</option>
                                                <option value="Hubungan Internasional" {{ old('major') == 'Hubungan Internasional' ? 'selected' : '' }}>Hubungan Internasional</option>
                                                <option value="Administrasi Negara" {{ old('major') == 'Administrasi Negara' ? 'selected' : '' }}>Administrasi Negara</option>
                                                <option value="Kriminologi" {{ old('major') == 'Kriminologi' ? 'selected' : '' }}>Kriminologi</option>
                                            </optgroup>

                                            <!-- Kesehatan -->
                                            <optgroup label="Kesehatan">
                                                <option value="Kedokteran" {{ old('major') == 'Kedokteran' ? 'selected' : '' }}>Kedokteran</option>
                                                <option value="Kedokteran Gigi" {{ old('major') == 'Kedokteran Gigi' ? 'selected' : '' }}>Kedokteran Gigi</option>
                                                <option value="Kedokteran Hewan" {{ old('major') == 'Kedokteran Hewan' ? 'selected' : '' }}>Kedokteran Hewan</option>
                                                <option value="Keperawatan" {{ old('major') == 'Keperawatan' ? 'selected' : '' }}>Keperawatan</option>
                                                <option value="Farmasi" {{ old('major') == 'Farmasi' ? 'selected' : '' }}>Farmasi</option>
                                                <option value="Kesehatan Masyarakat" {{ old('major') == 'Kesehatan Masyarakat' ? 'selected' : '' }}>Kesehatan Masyarakat</option>
                                                <option value="Gizi" {{ old('major') == 'Gizi' ? 'selected' : '' }}>Ilmu Gizi</option>
                                                <option value="Fisioterapi" {{ old('major') == 'Fisioterapi' ? 'selected' : '' }}>Fisioterapi</option>
                                                <option value="Kebidanan" {{ old('major') == 'Kebidanan' ? 'selected' : '' }}>Kebidanan</option>
                                                <option value="Analis Kesehatan" {{ old('major') == 'Analis Kesehatan' ? 'selected' : '' }}>Teknologi Laboratorium Medis</option>
                                                <option value="Radiologi" {{ old('major') == 'Radiologi' ? 'selected' : '' }}>Teknik Radiodiagnostik & Radioterapi</option>
                                                <option value="Terapi Okupasi" {{ old('major') == 'Terapi Okupasi' ? 'selected' : '' }}>Terapi Okupasi</option>
                                                <option value="Terapi Wicara" {{ old('major') == 'Terapi Wicara' ? 'selected' : '' }}>Terapi Wicara</option>
                                                <option value="Ortotik Prostetik" {{ old('major') == 'Ortotik Prostetik' ? 'selected' : '' }}>Ortotik Prostetik</option>
                                                <option value="Teknik Kardiovaskular" {{ old('major') == 'Teknik Kardiovaskular' ? 'selected' : '' }}>Teknik Kardiovaskular</option>
                                                <option value="Teknik Elektromedis" {{ old('major') == 'Teknik Elektromedis' ? 'selected' : '' }}>Teknik Elektromedis</option>
                                                <option value="Rekam Medis" {{ old('major') == 'Rekam Medis' ? 'selected' : '' }}>Manajemen Informasi Kesehatan</option>
                                                <option value="Sanitasi Lingkungan" {{ old('major') == 'Sanitasi Lingkungan' ? 'selected' : '' }}>Kesehatan Lingkungan</option>
                                                <option value="Keselamatan Kerja" {{ old('major') == 'Keselamatan Kerja' ? 'selected' : '' }}>Keselamatan & Kesehatan Kerja</option>
                                                <option value="Epidemiologi" {{ old('major') == 'Epidemiologi' ? 'selected' : '' }}>Epidemiologi</option>
                                                <option value="Biostatistik" {{ old('major') == 'Biostatistik' ? 'selected' : '' }}>Biostatistik & Kependudukan</option>
                                                <option value="Promosi Kesehatan" {{ old('major') == 'Promosi Kesehatan' ? 'selected' : '' }}>Promosi Kesehatan & Ilmu Perilaku</option>
                                            </optgroup>

                                            <!-- Pendidikan -->
                                            <optgroup label="Pendidikan">
                                                <option value="Pendidikan Guru SD" {{ old('major') == 'Pendidikan Guru SD' ? 'selected' : '' }}>Pendidikan Guru Sekolah Dasar</option>
                                                <option value="Pendidikan Bahasa Indonesia" {{ old('major') == 'Pendidikan Bahasa Indonesia' ? 'selected' : '' }}>Pendidikan Bahasa Indonesia</option>
                                                <option value="Pendidikan Bahasa Inggris" {{ old('major') == 'Pendidikan Bahasa Inggris' ? 'selected' : '' }}>Pendidikan Bahasa Inggris</option>
                                                <option value="Pendidikan Matematika" {{ old('major') == 'Pendidikan Matematika' ? 'selected' : '' }}>Pendidikan Matematika</option>
                                                <option value="Pendidikan Fisika" {{ old('major') == 'Pendidikan Fisika' ? 'selected' : '' }}>Pendidikan Fisika</option>
                                                <option value="Pendidikan Kimia" {{ old('major') == 'Pendidikan Kimia' ? 'selected' : '' }}>Pendidikan Kimia</option>
                                                <option value="Pendidikan Biologi" {{ old('major') == 'Pendidikan Biologi' ? 'selected' : '' }}>Pendidikan Biologi</option>
                                                <option value="Pendidikan Sejarah" {{ old('major') == 'Pendidikan Sejarah' ? 'selected' : '' }}>Pendidikan Sejarah</option>
                                                <option value="Pendidikan Geografi" {{ old('major') == 'Pendidikan Geografi' ? 'selected' : '' }}>Pendidikan Geografi</option>
                                                <option value="Pendidikan Ekonomi" {{ old('major') == 'Pendidikan Ekonomi' ? 'selected' : '' }}>Pendidikan Ekonomi</option>
                                                <option value="Pendidikan Seni" {{ old('major') == 'Pendidikan Seni' ? 'selected' : '' }}>Pendidikan Seni</option>
                                                <option value="Pendidikan Olahraga" {{ old('major') == 'Pendidikan Olahraga' ? 'selected' : '' }}>Pendidikan Olahraga</option>
                                            </optgroup>

                                            <!-- MIPA -->
                                            <optgroup label="Matematika & IPA">
                                                <option value="Matematika" {{ old('major') == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                                                <option value="Fisika" {{ old('major') == 'Fisika' ? 'selected' : '' }}>Fisika</option>
                                                <option value="Kimia" {{ old('major') == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                                                <option value="Biologi" {{ old('major') == 'Biologi' ? 'selected' : '' }}>Biologi</option>
                                                <option value="Statistika" {{ old('major') == 'Statistika' ? 'selected' : '' }}>Statistika</option>
                                                <option value="Geografi" {{ old('major') == 'Geografi' ? 'selected' : '' }}>Geografi</option>
                                                <option value="Geofisika" {{ old('major') == 'Geofisika' ? 'selected' : '' }}>Geofisika</option>
                                                <option value="Meteorologi" {{ old('major') == 'Meteorologi' ? 'selected' : '' }}>Meteorologi</option>
                                            </optgroup>

                                            <!-- Sosial & Humaniora -->
                                            <optgroup label="Sosial & Humaniora">
                                                <option value="Sosiologi" {{ old('major') == 'Sosiologi' ? 'selected' : '' }}>Sosiologi</option>
                                                <option value="Antropologi" {{ old('major') == 'Antropologi' ? 'selected' : '' }}>Antropologi</option>
                                                <option value="Psikologi" {{ old('major') == 'Psikologi' ? 'selected' : '' }}>Psikologi</option>
                                                <option value="Ilmu Sejarah" {{ old('major') == 'Ilmu Sejarah' ? 'selected' : '' }}>Ilmu Sejarah</option>
                                                <option value="Arkeologi" {{ old('major') == 'Arkeologi' ? 'selected' : '' }}>Arkeologi</option>
                                                <option value="Bahasa Indonesia" {{ old('major') == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa & Sastra Indonesia</option>
                                                <option value="Bahasa Inggris" {{ old('major') == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa & Sastra Inggris</option>
                                                <option value="Bahasa Jepang" {{ old('major') == 'Bahasa Jepang' ? 'selected' : '' }}>Bahasa & Sastra Jepang</option>
                                                <option value="Bahasa Mandarin" {{ old('major') == 'Bahasa Mandarin' ? 'selected' : '' }}>Bahasa & Sastra Mandarin</option>
                                                <option value="Bahasa Jerman" {{ old('major') == 'Bahasa Jerman' ? 'selected' : '' }}>Bahasa & Sastra Jerman</option>
                                                <option value="Bahasa Perancis" {{ old('major') == 'Bahasa Perancis' ? 'selected' : '' }}>Bahasa & Sastra Perancis</option>
                                                <option value="Bahasa Korea" {{ old('major') == 'Bahasa Korea' ? 'selected' : '' }}>Bahasa & Sastra Korea</option>
                                                <option value="Sastra Daerah" {{ old('major') == 'Sastra Daerah' ? 'selected' : '' }}>Sastra Daerah</option>
                                                <option value="Linguistik" {{ old('major') == 'Linguistik' ? 'selected' : '' }}>Linguistik</option>
                                                <option value="Ilmu Komunikasi" {{ old('major') == 'Ilmu Komunikasi' ? 'selected' : '' }}>Ilmu Komunikasi</option>
                                                <option value="Jurnalistik" {{ old('major') == 'Jurnalistik' ? 'selected' : '' }}>Jurnalistik</option>
                                                <option value="Broadcasting" {{ old('major') == 'Broadcasting' ? 'selected' : '' }}>Broadcasting</option>
                                                <option value="Hubungan Masyarakat" {{ old('major') == 'Hubungan Masyarakat' ? 'selected' : '' }}>Hubungan Masyarakat</option>
                                                <option value="Periklanan" {{ old('major') == 'Periklanan' ? 'selected' : '' }}>Periklanan (Advertising)</option>
                                                <option value="Penyiaran" {{ old('major') == 'Penyiaran' ? 'selected' : '' }}>Televisi & Film</option>
                                                <option value="Ilmu Perpustakaan" {{ old('major') == 'Ilmu Perpustakaan' ? 'selected' : '' }}>Ilmu Perpustakaan & Informasi</option>
                                                <option value="Kearsipan" {{ old('major') == 'Kearsipan' ? 'selected' : '' }}>Kearsipan</option>
                                                <option value="Criminology" {{ old('major') == 'Criminology' ? 'selected' : '' }}>Kriminologi</option>
                                                <option value="Kesejahteraan Sosial" {{ old('major') == 'Kesejahteraan Sosial' ? 'selected' : '' }}>Ilmu Kesejahteraan Sosial</option>
                                            </optgroup>

                                            <!-- Pertanian & Kehutanan -->
                                            <optgroup label="Pertanian & Kehutanan">
                                                <option value="Agroteknologi" {{ old('major') == 'Agroteknologi' ? 'selected' : '' }}>Agroteknologi</option>
                                                <option value="Agribisnis" {{ old('major') == 'Agribisnis' ? 'selected' : '' }}>Agribisnis</option>
                                                <option value="Kehutanan" {{ old('major') == 'Kehutanan' ? 'selected' : '' }}>Kehutanan</option>
                                                <option value="Peternakan" {{ old('major') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                                                <option value="Perikanan" {{ old('major') == 'Perikanan' ? 'selected' : '' }}>Perikanan</option>
                                                <option value="Kelautan" {{ old('major') == 'Kelautan' ? 'selected' : '' }}>Ilmu Kelautan</option>
                                            </optgroup>

                                            <!-- Agama & Filsafat -->
                                            <optgroup label="Agama & Filsafat">
                                                <option value="Ilmu Al-Quran Tafsir" {{ old('major') == 'Ilmu Al-Quran Tafsir' ? 'selected' : '' }}>Ilmu Al-Quran & Tafsir</option>
                                                <option value="Hadits" {{ old('major') == 'Hadits' ? 'selected' : '' }}>Ilmu Hadits</option>
                                                <option value="Fiqh" {{ old('major') == 'Fiqh' ? 'selected' : '' }}>Fiqh & Ushul Fiqh</option>
                                                <option value="Bahasa Arab" {{ old('major') == 'Bahasa Arab' ? 'selected' : '' }}>Bahasa & Sastra Arab</option>
                                                <option value="Dakwah" {{ old('major') == 'Dakwah' ? 'selected' : '' }}>Komunikasi & Penyiaran Islam</option>
                                                <option value="Bimbingan Konseling Islam" {{ old('major') == 'Bimbingan Konseling Islam' ? 'selected' : '' }}>Bimbingan & Konseling Islam</option>
                                                <option value="Manajemen Haji" {{ old('major') == 'Manajemen Haji' ? 'selected' : '' }}>Manajemen Haji & Umrah</option>
                                                <option value="Filsafat" {{ old('major') == 'Filsafat' ? 'selected' : '' }}>Filsafat</option>
                                                <option value="Teologi" {{ old('major') == 'Teologi' ? 'selected' : '' }}>Teologi</option>
                                            </optgroup>

                                            <!-- Seni & Desain -->
                                            <optgroup label="Seni & Desain">
                                                <option value="Seni Rupa" {{ old('major') == 'Seni Rupa' ? 'selected' : '' }}>Seni Rupa</option>
                                                <option value="Desain Komunikasi Visual" {{ old('major') == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                                                <option value="Desain Grafis" {{ old('major') == 'Desain Grafis' ? 'selected' : '' }}>Desain Grafis</option>
                                                <option value="Desain Produk" {{ old('major') == 'Desain Produk' ? 'selected' : '' }}>Desain Produk</option>
                                                <option value="Seni Musik" {{ old('major') == 'Seni Musik' ? 'selected' : '' }}>Seni Musik</option>
                                                <option value="Seni Tari" {{ old('major') == 'Seni Tari' ? 'selected' : '' }}>Seni Tari</option>
                                                <option value="Seni Teater" {{ old('major') == 'Seni Teater' ? 'selected' : '' }}>Seni Teater</option>
                                                <option value="Seni Karawitan" {{ old('major') == 'Seni Karawitan' ? 'selected' : '' }}>Seni Karawitan</option>
                                                <option value="Etnomusikologi" {{ old('major') == 'Etnomusikologi' ? 'selected' : '' }}>Etnomusikologi</option>
                                                <option value="Film & Televisi" {{ old('major') == 'Film & Televisi' ? 'selected' : '' }}>Film & Televisi</option>
                                                <option value="Fotografi" {{ old('major') == 'Fotografi' ? 'selected' : '' }}>Fotografi</option>
                                                <option value="Animasi" {{ old('major') == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                                                <option value="Game Technology" {{ old('major') == 'Game Technology' ? 'selected' : '' }}>Game Technology</option>
                                                <option value="Kriya Seni" {{ old('major') == 'Kriya Seni' ? 'selected' : '' }}>Kriya Seni</option>
                                                <option value="Seni Keramik" {{ old('major') == 'Seni Keramik' ? 'selected' : '' }}>Seni Keramik</option>
                                            </optgroup>

                                            <!-- Komputer & Teknologi Informasi -->
                                            <optgroup label="Komputer & Teknologi Informasi">
                                                <option value="Ilmu Komputer" {{ old('major') == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer (Computer Science)</option>
                                                <option value="Teknologi Informasi" {{ old('major') == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                                                <option value="Sistem Komputer" {{ old('major') == 'Sistem Komputer' ? 'selected' : '' }}>Sistem Komputer</option>
                                                <option value="Software Engineering" {{ old('major') == 'Software Engineering' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                                <option value="Data Science" {{ old('major') == 'Data Science' ? 'selected' : '' }}>Sains Data</option>
                                                <option value="Cyber Security" {{ old('major') == 'Cyber Security' ? 'selected' : '' }}>Keamanan Siber</option>
                                                <option value="Artificial Intelligence" {{ old('major') == 'Artificial Intelligence' ? 'selected' : '' }}>Kecerdasan Buatan</option>
                                                <option value="Digital Forensics" {{ old('major') == 'Digital Forensics' ? 'selected' : '' }}>Forensik Digital</option>
                                                <option value="Network Engineering" {{ old('major') == 'Network Engineering' ? 'selected' : '' }}>Teknik Jaringan Komputer</option>
                                                <option value="Mobile Application" {{ old('major') == 'Mobile Application' ? 'selected' : '' }}>Teknologi Mobile</option>
                                                <option value="Internet of Things" {{ old('major') == 'Internet of Things' ? 'selected' : '' }}>Internet of Things (IoT)</option>
                                                <option value="Cloud Computing" {{ old('major') == 'Cloud Computing' ? 'selected' : '' }}>Cloud Computing</option>
                                            </optgroup>

                                            <!-- Vokasi & Politeknik -->
                                            <optgroup label="Vokasi & Politeknik">
                                                <option value="Administrasi Perkantoran" {{ old('major') == 'Administrasi Perkantoran' ? 'selected' : '' }}>Administrasi Perkantoran</option>
                                                <option value="Sekretari" {{ old('major') == 'Sekretari' ? 'selected' : '' }}>Sekretari</option>
                                                <option value="Perpajakan" {{ old('major') == 'Perpajakan' ? 'selected' : '' }}>Perpajakan</option>
                                                <option value="Kepabeanan" {{ old('major') == 'Kepabeanan' ? 'selected' : '' }}>Kepabeanan & Cukai</option>
                                                <option value="Perhotelan" {{ old('major') == 'Perhotelan' ? 'selected' : '' }}>Manajemen Perhotelan</option>
                                                <option value="Pariwisata" {{ old('major') == 'Pariwisata' ? 'selected' : '' }}>Kepariwisataan</option>
                                                <option value="Tata Boga" {{ old('major') == 'Tata Boga' ? 'selected' : '' }}>Tata Boga</option>
                                                <option value="Tata Busana" {{ old('major') == 'Tata Busana' ? 'selected' : '' }}>Tata Busana</option>
                                                <option value="Otomotif" {{ old('major') == 'Otomotif' ? 'selected' : '' }}>Teknik Otomotif</option>
                                                <option value="Elektronika" {{ old('major') == 'Elektronika' ? 'selected' : '' }}>Teknik Elektronika</option>
                                                <option value="Teknik Refrigerasi" {{ old('major') == 'Teknik Refrigerasi' ? 'selected' : '' }}>Teknik Pendingin & Tata Udara</option>
                                                <option value="Teknik Konstruksi" {{ old('major') == 'Teknik Konstruksi' ? 'selected' : '' }}>Teknik Konstruksi Bangunan</option>
                                                <option value="Survei Pemetaan" {{ old('major') == 'Survei Pemetaan' ? 'selected' : '' }}>Survei & Pemetaan</option>
                                            </optgroup>

                                            <!-- Ilmu Terapan -->
                                            <optgroup label="Ilmu Terapan">
                                                <option value="Meteorologi Terapan" {{ old('major') == 'Meteorologi Terapan' ? 'selected' : '' }}>Meteorologi Terapan</option>
                                                <option value="Oceanografi" {{ old('major') == 'Oceanografi' ? 'selected' : '' }}>Oceanografi</option>
                                                <option value="Planologi" {{ old('major') == 'Planologi' ? 'selected' : '' }}>Perencanaan Wilayah & Kota</option>
                                                <option value="Ilmu Lingkungan" {{ old('major') == 'Ilmu Lingkungan' ? 'selected' : '' }}>Ilmu Lingkungan</option>
                                                <option value="Kartografi" {{ old('major') == 'Kartografi' ? 'selected' : '' }}>Kartografi & Penginderaan Jauh</option>
                                                <option value="Hidrografi" {{ old('major') == 'Hidrografi' ? 'selected' : '' }}>Hidrografi</option>
                                            </optgroup>
                                        </select>
                                        @error('major')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Custom Fields - 2 Columns (Jika tidak ada dalam daftar) -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Custom Instansi Field -->
                                <div class="space-y-1">
                                    <label for="custom_agency" class="block text-xs font-medium text-gray-700">
                                        Instansi Lain (jika tidak ada dalam daftar)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-plus-circle text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="custom_agency"
                                               type="text"
                                               name="custom_agency"
                                               value="{{ old('custom_agency') }}"
                                               placeholder="Tulis nama instansi"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('custom_agency')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Custom Jurusan Field -->
                                <div class="space-y-1">
                                    <label for="custom_major" class="block text-xs font-medium text-gray-700">
                                        Jurusan Lain (jika tidak ada dalam daftar)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-plus-circle text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="custom_major"
                                               type="text"
                                               name="custom_major"
                                               value="{{ old('custom_major') }}"
                                               placeholder="Tulis nama jurusan"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('custom_major')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                                <!-- Referral Code Field (Optional) -->
                                <div class="space-y-1">
                                    <div class="flex items-center space-x-1">
                                        <label for="used_referral_code" class="block text-xs font-medium text-gray-700">
                                            Kode Referral
                                        </label>
                                        <div class="relative group">
                                            <i class="fas fa-info-circle text-blue-500 text-xs cursor-help"></i>
                                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 mb-1 px-3 py-2 bg-gray-800 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-10">
                                                <div class="text-center">
                                                    <i class="fas fa-gift mr-1"></i>
                                                    Masukkan kode referral dari teman
                                                    <br>untuk mendapat bonus poin!
                                                </div>
                                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-users text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="used_referral_code"
                                               type="text"
                                               name="used_referral_code"
                                               value="{{ old('used_referral_code', request('ref')) }}"
                                               placeholder="ASN123ABC (opsional)"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm uppercase">
                                        @error('used_referral_code')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 3: BACKGROUND & ANALYTICS -->
                        <div class="wizard-step" id="step3" style="display: none;">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-chart-line text-blue-500 mr-2"></i>
                                    Background & Analytics
                                </h3>
                                <p class="text-sm text-gray-600">Latar belakang pendidikan dan pola belajar Anda</p>
                            </div>

                            <div class="space-y-4">
                                <!-- Education & Work Status - 2 Columns -->
                                <div class="grid grid-cols-2 gap-3">
                                    <!-- Education Level Field -->
                                    <div class="space-y-1">
                                        <label for="education_level" class="block text-xs font-medium text-gray-700">
                                            Pendidikan Terakhir <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                                <i class="fas fa-graduation-cap text-gray-400 text-xs"></i>
                                            </div>
                                            <select id="education_level"
                                                    name="education_level"
                                                    required
                                                    class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                                <option value="">Pilih</option>
                                                <option value="SMA" {{ old('education_level') == 'SMA' ? 'selected' : '' }}>SMA/SMK</option>
                                                <option value="D3" {{ old('education_level') == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="S1" {{ old('education_level') == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2" {{ old('education_level') == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3" {{ old('education_level') == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                            @error('education_level')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Work Status Field -->
                                <div class="space-y-1">
                                    <div class="flex items-center space-x-1">
                                        <label for="used_referral_code" class="block text-xs font-medium text-gray-700">
                                            Kode Referral
                                        </label>
                                        <div class="relative group">
                                            <i class="fas fa-info-circle text-blue-500 text-xs cursor-help"></i>
                                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 mb-1 px-3 py-2 bg-gray-800 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-10">
                                                <div class="text-center">
                                                    <i class="fas fa-gift mr-1"></i>
                                                    Masukkan kode referral dari teman
                                                    <br>untuk mendapat bonus poin!
                                                </div>
                                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-users text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="used_referral_code"
                                               type="text"
                                               name="used_referral_code"
                                               value="{{ old('used_referral_code', request('ref')) }}"
                                               placeholder="ASN123ABC (opsional)"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm uppercase">
                                        @error('used_referral_code')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Analytics Fields - Age & Experience -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Age Field -->
                                <div class="space-y-1">
                                    <label for="age" class="block text-xs font-medium text-gray-700">
                                        Usia <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-calendar text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="age"
                                               type="number"
                                               name="age"
                                               value="{{ old('age') }}"
                                               required
                                               min="17"
                                               max="35"
                                               placeholder="25"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('age')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Test Experience Field -->
                                <div class="space-y-1">
                                    <label for="test_experience" class="block text-xs font-medium text-gray-700">
                                        Pengalaman Test CPNS <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-clipboard-check text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="test_experience"
                                                name="test_experience"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih</option>
                                            <option value="Belum Pernah" {{ old('test_experience') == 'Belum Pernah' ? 'selected' : '' }}>Belum Pernah</option>
                                            <option value="1x" {{ old('test_experience') == '1x' ? 'selected' : '' }}>1 kali</option>
                                            <option value="2x" {{ old('test_experience') == '2x' ? 'selected' : '' }}>2 kali</option>
                                            <option value="3x" {{ old('test_experience') == '3x' ? 'selected' : '' }}>3 kali</option>
                                            <option value="Lebih dari 3x" {{ old('test_experience') == 'Lebih dari 3x' ? 'selected' : '' }}>Lebih dari 3 kali</option>
                                        </select>
                                        @error('test_experience')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Study Budget & Information Source -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Study Budget Field -->
                                <div class="space-y-1">
                                    <label for="study_budget" class="block text-xs font-medium text-gray-700">
                                        Budget Belajar/Bulan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-wallet text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="study_budget"
                                                name="study_budget"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih Range Budget</option>
                                            <option value="< Rp 100.000" {{ old('study_budget') == '< Rp 100.000' ? 'selected' : '' }}>< Rp 100.000</option>
                                            <option value="Rp 100.000 - 300.000" {{ old('study_budget') == 'Rp 100.000 - 300.000' ? 'selected' : '' }}>Rp 100.000 - 300.000</option>
                                            <option value="Rp 300.000 - 500.000" {{ old('study_budget') == 'Rp 300.000 - 500.000' ? 'selected' : '' }}>Rp 300.000 - 500.000</option>
                                            <option value="Rp 500.000 - 1.000.000" {{ old('study_budget') == 'Rp 500.000 - 1.000.000' ? 'selected' : '' }}>Rp 500.000 - 1.000.000</option>
                                            <option value="> Rp 1.000.000" {{ old('study_budget') == '> Rp 1.000.000' ? 'selected' : '' }}>> Rp 1.000.000</option>
                                        </select>
                                        @error('study_budget')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Information Source Field -->
                                <div class="space-y-1">
                                    <label for="info_source" class="block text-xs font-medium text-gray-700">
                                        Tau Platform Ini Dari <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-search text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="info_source"
                                                name="info_source"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih Sumber Info</option>
                                            <option value="Google Search" {{ old('info_source') == 'Google Search' ? 'selected' : '' }}>Google Search</option>
                                            <option value="Facebook" {{ old('info_source') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                            <option value="Instagram" {{ old('info_source') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                            <option value="TikTok" {{ old('info_source') == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                                            <option value="YouTube" {{ old('info_source') == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                                            <option value="WhatsApp Group" {{ old('info_source') == 'WhatsApp Group' ? 'selected' : '' }}>WhatsApp Group</option>
                                            <option value="Telegram" {{ old('info_source') == 'Telegram' ? 'selected' : '' }}>Telegram</option>
                                            <option value="Referral Teman" {{ old('info_source') == 'Referral Teman' ? 'selected' : '' }}>Referral Teman</option>
                                            <option value="Forum Online" {{ old('info_source') == 'Forum Online' ? 'selected' : '' }}>Forum Online (Kaskus, dll)</option>
                                            <option value="Lainnya" {{ old('info_source') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('info_source')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Study Time & Motivation -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Study Time Per Day -->
                                <div class="space-y-1">
                                    <label for="study_time" class="block text-xs font-medium text-gray-700">
                                        Waktu Belajar/Hari <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-clock text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="study_time"
                                                name="study_time"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih Durasi</option>
                                            <option value="< 1 jam" {{ old('study_time') == '< 1 jam' ? 'selected' : '' }}>< 1 jam</option>
                                            <option value="1-2 jam" {{ old('study_time') == '1-2 jam' ? 'selected' : '' }}>1-2 jam</option>
                                            <option value="2-3 jam" {{ old('study_time') == '2-3 jam' ? 'selected' : '' }}>2-3 jam</option>
                                            <option value="3-4 jam" {{ old('study_time') == '3-4 jam' ? 'selected' : '' }}>3-4 jam</option>
                                            <option value="> 4 jam" {{ old('study_time') == '> 4 jam' ? 'selected' : '' }}>> 4 jam</option>
                                        </select>
                                        @error('study_time')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Primary Motivation -->
                                <div class="space-y-1">
                                    <label for="motivation" class="block text-xs font-medium text-gray-700">
                                        Motivasi Utama <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-heart text-gray-400 text-xs"></i>
                                        </div>
                                        <select id="motivation"
                                                name="motivation"
                                                required
                                                class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                            <option value="">Pilih Motivasi</option>
                                            <option value="Job Security" {{ old('motivation') == 'Job Security' ? 'selected' : '' }}>Stabilitas Kerja</option>
                                            <option value="Mengabdi Negara" {{ old('motivation') == 'Mengabdi Negara' ? 'selected' : '' }}>Mengabdi kepada Negara</option>
                                            <option value="Gaji & Tunjangan" {{ old('motivation') == 'Gaji & Tunjangan' ? 'selected' : '' }}>Gaji & Tunjangan</option>
                                            <option value="Status Sosial" {{ old('motivation') == 'Status Sosial' ? 'selected' : '' }}>Status Sosial</option>
                                            <option value="Passion Bidang" {{ old('motivation') == 'Passion Bidang' ? 'selected' : '' }}>Sesuai Passion</option>
                                            <option value="Dekat Keluarga" {{ old('motivation') == 'Dekat Keluarga' ? 'selected' : '' }}>Dekat Keluarga</option>
                                            <option value="Lainnya" {{ old('motivation') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('motivation')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 4: REVIEW & PASSWORD -->
                        <div class="wizard-step" id="step4" style="display: none;">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-check-circle text-blue-500 mr-2"></i>
                                    Review & Finalisasi
                                </h3>
                                <p class="text-sm text-gray-600">Periksa data Anda dan buat password</p>
                            </div>

                            <!-- Data Review Summary -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                                <h4 class="font-medium text-gray-800 mb-3">
                                    <i class="fas fa-clipboard-list mr-2"></i>
                                    Ringkasan Data Anda
                                </h4>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-600">Nama: <span class="font-medium" id="reviewName">-</span></p>
                                        <p class="text-gray-600">Email: <span class="font-medium" id="reviewEmail">-</span></p>
                                        <p class="text-gray-600">Lokasi: <span class="font-medium" id="reviewLocation">-</span></p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Target: <span class="font-medium" id="reviewTarget">-</span></p>
                                        <p class="text-gray-600">Instansi: <span class="font-medium" id="reviewAgency">-</span></p>
                                        <p class="text-gray-600">Jurusan: <span class="font-medium" id="reviewMajor">-</span></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Fields - 2 Columns -->
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Password Field -->
                                <div class="space-y-1">
                                    <label for="password" class="block text-xs font-medium text-gray-700">
                                        Password <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="password"
                                               type="password"
                                               name="password"
                                               required
                                               autocomplete="new-password"
                                               placeholder="Password"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('password')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="space-y-1">
                                    <label for="password_confirmation" class="block text-xs font-medium text-gray-700">
                                        Konfirmasi Password <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-check-circle text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="password_confirmation"
                                               type="password"
                                               name="password_confirmation"
                                               required
                                               autocomplete="new-password"
                                               placeholder="Konfirmasi password"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Navigation Buttons -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <!-- Step Progress Info -->
                            <div class="mb-4 text-center">
                                <p class="text-sm text-gray-600">
                                    <span class="font-medium">Step <span id="currentStepText">1</span> dari 4</span>
                                    <span class="mx-2">•</span>
                                    <span id="stepDescription">Data Personal</span>
                                </p>
                                <div class="mt-2 bg-gray-200 rounded-full h-2 w-full max-w-xs mx-auto">
                                    <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full transition-all duration-500"
                                         id="miniProgress" style="width: 25%"></div>
                                </div>
                            </div>

                            <!-- Navigation Button Row -->
                            <div class="flex items-center justify-between">
                                <!-- Previous Button -->
                                <button type="button"
                                        id="prevBtn"
                                        class="group flex items-center justify-center space-x-2 px-6 py-4 bg-white border-2 border-gray-300 hover:border-blue-400 text-gray-600 hover:text-blue-600 rounded-xl transition-all duration-300 text-base font-semibold shadow-sm hover:shadow-md min-w-[120px] cursor-pointer"
                                        style="visibility: hidden; opacity: 0;">
                                    <i class="fas fa-chevron-left text-sm group-hover:-translate-x-0.5 transition-transform"></i>
                                    <span>Kembali</span>
                                </button>

                                <!-- Step Skip/Tips (Optional) -->
                                <div class="text-center">
                                    <button type="button" id="skipStep" class="text-xs text-gray-400 hover:text-gray-600 transition-colors" style="display: none;">
                                        Lewati tahap ini →
                                    </button>
                                </div>

                                <!-- Next/Submit Button with Enhanced Design -->
                                <button type="button"
                                        id="nextBtn"
                                        class="group relative flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 via-blue-700 to-purple-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 text-base min-w-[160px] z-50 cursor-pointer"
                                        style="display: block !important; visibility: visible !important; opacity: 1 !important;">
                                    <!-- Animated background effect -->
                                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                                    <!-- Button Content -->
                                    <div class="relative z-10 flex items-center space-x-3">
                                        <span id="nextBtnText" class="font-bold">Lanjutkan</span>
                                        <i class="fas fa-arrow-right text-lg group-hover:translate-x-1 transition-transform" id="nextBtnIcon"></i>
                                    </div>

                                    <!-- Loading spinner (hidden by default) -->
                                    <div class="absolute inset-0 flex items-center justify-center bg-blue-600 rounded-xl" id="btnLoading" style="display: none;">
                                        <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span class="ml-2 text-white">Loading...</span>
                                    </div>
                                </button>
                            </div>

                            <!-- Helpful Tips -->
                            <div class="mt-4 text-center">
                                <p class="text-xs text-gray-500" id="helpText">
                                    💡 <span class="font-medium">Tip:</span> Pastikan data yang Anda masukkan akurat untuk rekomendasi terbaik
                                </p>
                            </div>
                        </div>
                    </form>

                    <!-- Enhanced Navigation Buttons (inside card, below form) -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <!-- Step Progress Info -->
                        <div class="mb-4 text-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Step <span id="currentStepText">1</span> dari 4</span>
                                <span class="mx-2">•</span>
                                <span id="stepDescription">Data Personal</span>
                            </p>
                            <div class="mt-2 bg-gray-200 rounded-full h-2 w-full max-w-xs mx-auto">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full transition-all duration-500"
                                     id="miniProgress" style="width: 25%"></div>
                            </div>
                        </div>

                        <!-- Navigation Button Row -->
                        <div class="flex items-center justify-between">
                            <!-- Previous Button -->
                            <button type="button"
                                    id="prevBtn"
                                    class="group flex items-center justify-center space-x-2 px-6 py-4 bg-white border-2 border-gray-300 hover:border-blue-400 text-gray-600 hover:text-blue-600 rounded-xl transition-all duration-300 text-base font-semibold shadow-sm hover:shadow-md min-w-[120px] cursor-pointer"
                                    style="visibility: hidden; opacity: 0;">
                                <i class="fas fa-chevron-left text-sm group-hover:-translate-x-0.5 transition-transform"></i>
                                <span>Kembali</span>
                            </button>

                            <!-- Step Skip/Tips (Optional) -->
                            <div class="text-center">
                                <button type="button" id="skipStep" class="text-xs text-gray-400 hover:text-gray-600 transition-colors" style="display: none;">
                                    Lewati tahap ini →
                                </button>
                            </div>

                            <!-- Next/Submit Button with Enhanced Design -->
                            <button type="button"
                                    id="nextBtn"
                                    class="group relative flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 via-blue-700 to-purple-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 text-base min-w-[160px] z-50 cursor-pointer"
                                    style="display: block !important; visibility: visible !important; opacity: 1 !important;">
                                <!-- Animated background effect -->
                                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                                <!-- Button Content -->
                                <div class="relative z-10 flex items-center space-x-3">
                                    <span id="nextBtnText" class="font-bold">Lanjutkan</span>
                                    <i class="fas fa-arrow-right text-lg group-hover:translate-x-1 transition-transform" id="nextBtnIcon"></i>
                                </div>

                                <!-- Loading spinner (hidden by default) -->
                                <div class="absolute inset-0 flex items-center justify-center bg-blue-600 rounded-xl" id="btnLoading" style="display: none;">
                                    <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 714 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="ml-2 text-white">Loading...</span>
                                </div>
                            </button>
                        </div>

                        <!-- Helpful Tips -->
                        <div class="mt-4 text-center">
                            <p class="text-xs text-gray-500" id="helpText">
                                💡 <span class="font-medium">Tip:</span> Pastikan data yang Anda masukkan akurat untuk rekomendasi terbaik
                            </p>
                        </div>
                    </div>

                    <!-- Login Link -->
                    <div class="mt-4 pt-4 border-t border-gray-200 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}"
                               class="font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateCities() {
                                        <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.o00rg/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span class="ml-2 text-white">Loading...</span>
                                    </div>
                                </button>
                            </div>

                            <!-- Helpful Tips -->
                            <div class="mt-4 text-center">
                                <p class="text-xs text-gray-500" id="helpText">
                                    💡 <span class="font-medium">Tip:</span> Pastikan data yang Anda masukkan akurat untuk rekomendasi terbaik
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateCities() {
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        const selectedProvince = provinceSelect.value;

        console.log('Selected province:', selectedProvince); // Debug log

        // Clear current cities
        citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';

        // Data kota berdasarkan provinsi (data lengkap semua provinsi Indonesia)
        const cityData = {
            'Aceh': [
                'Kota Banda Aceh', 'Kota Sabang', 'Kota Langsa', 'Kota Lhokseumawe', 'Kota Subulussalam',
                'Kabupaten Aceh Besar', 'Kabupaten Aceh Jaya', 'Kabupaten Aceh Selatan', 'Kabupaten Aceh Singkil', 'Kabupaten Aceh Tamiang',
                'Kabupaten Aceh Tengah', 'Kabupaten Aceh Tenggara', 'Kabupaten Aceh Timur', 'Kabupaten Aceh Utara', 'Kabupaten Bener Meriah',
                'Kabupaten Bireuen', 'Kabupaten Gayo Lues', 'Kabupaten Nagan Raya', 'Kabupaten Pidie', 'Kabupaten Pidie Jaya', 'Kabupaten Simeulue'
            ],
            'Sumatera Utara': [
                'Kota Medan', 'Kota Binjai', 'Kota Tebing Tinggi', 'Kota Pematang Siantar', 'Kota Tanjung Balai', 'Kota Sibolga', 'Kota Padang Sidimpuan', 'Kota Gunungsitoli',
                'Kabupaten Deli Serdang', 'Kabupaten Langkat', 'Kabupaten Karo', 'Kabupaten Simalungun', 'Kabupaten Asahan', 'Kabupaten Labuhan Batu', 'Kabupaten Tapanuli Utara',
                'Kabupaten Tapanuli Tengah', 'Kabupaten Tapanuli Selatan', 'Kabupaten Nias', 'Kabupaten Mandailing Natal', 'Kabupaten Toba Samosir', 'Kabupaten Humbang Hasundutan',
                'Kabupaten Pakpak Bharat', 'Kabupaten Samosir', 'Kabupaten Serdang Bedagai', 'Kabupaten Batu Bara', 'Kabupaten Padang Lawas Utara', 'Kabupaten Padang Lawas',
                'Kabupaten Labuhan Batu Selatan', 'Kabupaten Labuhan Batu Utara', 'Kabupaten Nias Utara', 'Kabupaten Nias Barat', 'Kabupaten Nias Selatan'
            ],
            'Sumatera Barat': [
                'Kota Padang', 'Kota Solok', 'Kota Sawahlunto', 'Kota Padang Panjang', 'Kota Bukittinggi', 'Kota Payakumbuh', 'Kota Pariaman',
                'Kabupaten Agam', 'Kabupaten Dharmasraya', 'Kabupaten Kepulauan Mentawai', 'Kabupaten Lima Puluh Kota', 'Kabupaten Padang Pariaman',
                'Kabupaten Pasaman', 'Kabupaten Pasaman Barat', 'Kabupaten Pesisir Selatan', 'Kabupaten Sijunjung', 'Kabupaten Solok', 'Kabupaten Solok Selatan', 'Kabupaten Tanah Datar'
            ],
            'Riau': [
                'Kota Pekanbaru', 'Kota Dumai',
                'Kabupaten Bengkalis', 'Kabupaten Indragiri Hilir', 'Kabupaten Indragiri Hulu', 'Kabupaten Kampar', 'Kabupaten Kepulauan Meranti',
                'Kabupaten Kuantan Singingi', 'Kabupaten Pelalawan', 'Kabupaten Rokan Hilir', 'Kabupaten Rokan Hulu', 'Kabupaten Siak'
            ],
            'Kepulauan Riau': [
                'Kota Batam', 'Kota Tanjung Pinang',
                'Kabupaten Bintan', 'Kabupaten Karimun', 'Kabupaten Kepulauan Anambas', 'Kabupaten Lingga', 'Kabupaten Natuna'
            ],
            'Jambi': [
                'Kota Jambi', 'Kota Sungai Penuh',
                'Kabupaten Batang Hari', 'Kabupaten Bungo', 'Kabupaten Kerinci', 'Kabupaten Merangin', 'Kabupaten Muaro Jambi',
                'Kabupaten Sarolangun', 'Kabupaten Tanjung Jabung Barat', 'Kabupaten Tanjung Jabung Timur', 'Kabupaten Tebo'
            ],
            'Sumatera Selatan': [
                'Kota Palembang', 'Kota Prabumulih', 'Kota Pagar Alam', 'Kota Lubuk Linggau',
                'Kabupaten Banyuasin', 'Kabupaten Empat Lawang', 'Kabupaten Lahat', 'Kabupaten Muara Enim', 'Kabupaten Musi Banyuasin',
                'Kabupaten Musi Rawas', 'Kabupaten Musi Rawas Utara', 'Kabupaten Ogan Ilir', 'Kabupaten Ogan Komering Ilir', 'Kabupaten Ogan Komering Ulu',
                'Kabupaten Ogan Komering Ulu Selatan', 'Kabupaten Ogan Komering Ulu Timur', 'Kabupaten Penukal Abab Lematang Ilir'
            ],
            'Bangka Belitung': [
                'Kota Pangkal Pinang',
                'Kabupaten Bangka', 'Kabupaten Bangka Barat', 'Kabupaten Bangka Selatan', 'Kabupaten Bangka Tengah', 'Kabupaten Belitung', 'Kabupaten Belitung Timur'
            ],
            'Bengkulu': [
                'Kota Bengkulu',
                'Kabupaten Bengkulu Selatan', 'Kabupaten Bengkulu Tengah', 'Kabupaten Bengkulu Utara', 'Kabupaten Kaur', 'Kabupaten Kepahiang',
                'Kabupaten Lebong', 'Kabupaten Mukomuko', 'Kabupaten Rejang Lebong', 'Kabupaten Seluma'
            ],
            'Lampung': [
                'Kota Bandar Lampung', 'Kota Metro',
                'Kabupaten Lampung Barat', 'Kabupaten Lampung Selatan', 'Kabupaten Lampung Tengah', 'Kabupaten Lampung Timur', 'Kabupaten Lampung Utara',
                'Kabupaten Mesuji', 'Kabupaten Pesawaran', 'Kabupaten Pesisir Barat', 'Kabupaten Pringsewu', 'Kabupaten Tanggamus', 'Kabupaten Tulang Bawang',
                'Kabupaten Tulang Bawang Barat', 'Kabupaten Way Kanan'
            ],
            'DKI Jakarta': [
                'Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur', 'Kepulauan Seribu'
            ],
            'Jawa Barat': [
                'Kota Bandung', 'Kota Bogor', 'Kota Sukabumi', 'Kota Cirebon', 'Kota Bekasi', 'Kota Depok', 'Kota Cimahi', 'Kota Tasikmalaya', 'Kota Banjar',
                'Kabupaten Bogor', 'Kabupaten Sukabumi', 'Kabupaten Cianjur', 'Kabupaten Bandung', 'Kabupaten Garut', 'Kabupaten Tasikmalaya', 'Kabupaten Ciamis',
                'Kabupaten Kuningan', 'Kabupaten Cirebon', 'Kabupaten Majalengka', 'Kabupaten Sumedang', 'Kabupaten Indramayu', 'Kabupaten Subang', 'Kabupaten Purwakarta',
                'Kabupaten Karawang', 'Kabupaten Bekasi', 'Kabupaten Bandung Barat', 'Kabupaten Pangandaran'
            ],
            'Jawa Tengah': [
                'Kota Semarang', 'Kota Surakarta', 'Kota Salatiga', 'Kota Pekalongan', 'Kota Tegal', 'Kota Magelang',
                'Kabupaten Cilacap', 'Kabupaten Banyumas', 'Kabupaten Purbalingga', 'Kabupaten Banjarnegara', 'Kabupaten Kebumen', 'Kabupaten Purworejo',
                'Kabupaten Wonosobo', 'Kabupaten Magelang', 'Kabupaten Boyolali', 'Kabupaten Klaten', 'Kabupaten Sukoharjo', 'Kabupaten Wonogiri',
                'Kabupaten Karanganyar', 'Kabupaten Sragen', 'Kabupaten Grobogan', 'Kabupaten Blora', 'Kabupaten Rembang', 'Kabupaten Pati',
                'Kabupaten Kudus', 'Kabupaten Jepara', 'Kabupaten Demak', 'Kabupaten Semarang', 'Kabupaten Temanggung', 'Kabupaten Kendal',
                'Kabupaten Batang', 'Kabupaten Pekalongan', 'Kabupaten Pemalang', 'Kabupaten Tegal', 'Kabupaten Brebes'
            ],
            'DI Yogyakarta': [
                'Kota Yogyakarta',
                'Kabupaten Bantul', 'Kabupaten Gunung Kidul', 'Kabupaten Kulon Progo', 'Kabupaten Sleman'
            ],
            'Jawa Timur': [
                'Kota Surabaya', 'Kota Malang', 'Kota Batu', 'Kota Blitar', 'Kota Kediri', 'Kota Mojokerto', 'Kota Madiun', 'Kota Pasuruan', 'Kota Probolinggo',
                'Kabupaten Pacitan', 'Kabupaten Ponorogo', 'Kabupaten Trenggalek', 'Kabupaten Tulungagung', 'Kabupaten Blitar', 'Kabupaten Kediri', 'Kabupaten Malang',
                'Kabupaten Lumajang', 'Kabupaten Jember', 'Kabupaten Banyuwangi', 'Kabupaten Bondowoso', 'Kabupaten Situbondo', 'Kabupaten Probolinggo',
                'Kabupaten Pasuruan', 'Kabupaten Sidoarjo', 'Kabupaten Mojokerto', 'Kabupaten Jombang', 'Kabupaten Nganjuk', 'Kabupaten Madiun',
                'Kabupaten Magetan', 'Kabupaten Ngawi', 'Kabupaten Bojonegoro', 'Kabupaten Tuban', 'Kabupaten Lamongan', 'Kabupaten Gresik',
                'Kabupaten Bangkalan', 'Kabupaten Sampang', 'Kabupaten Pamekasan', 'Kabupaten Sumenep'
            ],
            'Banten': [
                'Kota Tangerang', 'Kota Cilegon', 'Kota Serang', 'Kota Tangerang Selatan',
                'Kabupaten Tangerang', 'Kabupaten Serang', 'Kabupaten Lebak', 'Kabupaten Pandeglang'
            ],
            'Bali': [
                'Kota Denpasar', 'Kabupaten Badung', 'Kabupaten Gianyar', 'Kabupaten Klungkung', 'Kabupaten Bangli', 'Kabupaten Karangasem', 'Kabupaten Buleleng', 'Kabupaten Jembrana', 'Kabupaten Tabanan'
            ],
            'Nusa Tenggara Barat': [
                'Kota Mataram', 'Kota Bima',
                'Kabupaten Lombok Barat', 'Kabupaten Lombok Tengah', 'Kabupaten Lombok Timur', 'Kabupaten Sumbawa', 'Kabupaten Dompu', 'Kabupaten Bima',
                'Kabupaten Sumbawa Barat', 'Kabupaten Lombok Utara'
            ],
            'Nusa Tenggara Timur': [
                'Kota Kupang',
                'Kabupaten Timor Tengah Selatan', 'Kabupaten Timor Tengah Utara', 'Kabupaten Belu', 'Kabupaten Alor', 'Kabupaten Lembata', 'Kabupaten Flores Timur',
                'Kabupaten Sikka', 'Kabupaten Ende', 'Kabupaten Ngada', 'Kabupaten Manggarai', 'Kabupaten Rote Ndao', 'Kabupaten Manggarai Barat',
                'Kabupaten Sumba Timur', 'Kabupaten Sumba Barat', 'Kabupaten Sumba Tengah', 'Kabupaten Sumba Barat Daya', 'Kabupaten Nagekeo',
                'Kabupaten Manggarai Timur', 'Kabupaten Sabu Raijua', 'Kabupaten Malaka'
            ],
            'Kalimantan Barat': [
                'Kota Pontianak', 'Kota Singkawang',
                'Kabupaten Sambas', 'Kabupaten Bengkayang', 'Kabupaten Landak', 'Kabupaten Mempawah', 'Kabupaten Sanggau', 'Kabupaten Ketapang',
                'Kabupaten Sintang', 'Kabupaten Kapuas Hulu', 'Kabupaten Sekadau', 'Kabupaten Melawi', 'Kabupaten Kayong Utara', 'Kabupaten Kubu Raya'
            ],
            'Kalimantan Tengah': [
                'Kota Palangkaraya',
                'Kabupaten Kotawaringin Barat', 'Kabupaten Kotawaringin Timur', 'Kabupaten Kapuas', 'Kabupaten Barito Selatan', 'Kabupaten Barito Utara',
                'Kabupaten Sukamara', 'Kabupaten Lamandau', 'Kabupaten Seruyan', 'Kabupaten Katingan', 'Kabupaten Pulang Pisau', 'Kabupaten Gunung Mas',
                'Kabupaten Barito Timur', 'Kabupaten Murung Raya'
            ],
            'Kalimantan Selatan': [
                'Kota Banjarmasin', 'Kota Banjarbaru',
                'Kabupaten Tanah Laut', 'Kabupaten Kotabaru', 'Kabupaten Banjar', 'Kabupaten Barito Kuala', 'Kabupaten Tapin', 'Kabupaten Hulu Sungai Selatan',
                'Kabupaten Hulu Sungai Tengah', 'Kabupaten Hulu Sungai Utara', 'Kabupaten Tabalong', 'Kabupaten Tanah Bumbu', 'Kabupaten Balangan'
            ],
            'Kalimantan Timur': [
                'Kota Samarinda', 'Kota Balikpapan', 'Kota Bontang',
                'Kabupaten Kutai Kartanegara', 'Kabupaten Berau', 'Kabupaten Paser', 'Kabupaten Kutai Barat', 'Kabupaten Kutai Timur', 'Kabupaten Penajam Paser Utara', 'Kabupaten Mahakam Ulu'
            ],
            'Kalimantan Utara': [
                'Kota Tarakan',
                'Kabupaten Malinau', 'Kabupaten Bulungan', 'Kabupaten Tana Tidung', 'Kabupaten Nunukan'
            ],
            'Sulawesi Utara': [
                'Kota Manado', 'Kota Bitung', 'Kota Tomohon', 'Kota Kotamobagu',
                'Kabupaten Minahasa', 'Kabupaten Kepulauan Sangihe', 'Kabupaten Kepulauan Talaud', 'Kabupaten Minahasa Selatan', 'Kabupaten Minahasa Utara',
                'Kabupaten Bolaang Mongondow', 'Kabupaten Siau Tagulandang Biaro', 'Kabupaten Minahasa Tenggara', 'Kabupaten Bolaang Mongondow Utara',
                'Kabupaten Bolaang Mongondow Selatan', 'Kabupaten Bolaang Mongondow Timur'
            ],
            'Sulawesi Tengah': [
                'Kota Palu',
                'Kabupaten Donggala', 'Kabupaten Poso', 'Kabupaten Banggai Kepulauan', 'Kabupaten Banggai', 'Kabupaten Morowali', 'Kabupaten Toli-Toli',
                'Kabupaten Buol', 'Kabupaten Parigi Moutong', 'Kabupaten Tojo Una-Una', 'Kabupaten Sigi', 'Kabupaten Morowali Utara'
            ],
            'Sulawesi Selatan': [
                'Kota Makassar', 'Kota Parepare', 'Kota Palopo',
                'Kabupaten Selayar', 'Kabupaten Bulukumba', 'Kabupaten Bantaeng', 'Kabupaten Jeneponto', 'Kabupaten Takalar', 'Kabupaten Gowa', 'Kabupaten Sinjai',
                'Kabupaten Maros', 'Kabupaten Pangkajene dan Kepulauan', 'Kabupaten Barru', 'Kabupaten Bone', 'Kabupaten Soppeng', 'Kabupaten Wajo',
                'Kabupaten Sidenreng Rappang', 'Kabupaten Pinrang', 'Kabupaten Enrekang', 'Kabupaten Luwu', 'Kabupaten Tana Toraja', 'Kabupaten Luwu Utara',
                'Kabupaten Luwu Timur', 'Kabupaten Toraja Utara'
            ],
            'Sulawesi Tenggara': [
                'Kota Kendari', 'Kota Baubau',
                'Kabupaten Buton', 'Kabupaten Muna', 'Kabupaten Konawe', 'Kabupaten Kolaka', 'Kabupaten Konawe Selatan', 'Kabupaten Bombana', 'Kabupaten Wakatobi',
                'Kabupaten Kolaka Utara', 'Kabupaten Buton Utara', 'Kabupaten Konawe Utara', 'Kabupaten Kolaka Timur', 'Kabupaten Konawe Kepulauan', 'Kabupaten Muna Barat', 'Kabupaten Buton Tengah', 'Kabupaten Buton Selatan'
            ],
            'Gorontalo': [
                'Kota Gorontalo',
                'Kabupaten Gorontalo', 'Kabupaten Boalemo', 'Kabupaten Pohuwato', 'Kabupaten Bone Bolango', 'Kabupaten Gorontalo Utara'
            ],
            'Sulawesi Barat': [
                'Kabupaten Majene', 'Kabupaten Polewali Mandar', 'Kabupaten Mamasa', 'Kabupaten Mamuju', 'Kabupaten Mamuju Utara', 'Kabupaten Mamuju Tengah'
            ],
            'Maluku': [
                'Kota Ambon', 'Kota Tual',
                'Kabupaten Maluku Tenggara Barat', 'Kabupaten Maluku Tenggara', 'Kabupaten Maluku Tengah', 'Kabupaten Buru', 'Kabupaten Kepulauan Aru',
                'Kabupaten Seram Bagian Barat', 'Kabupaten Seram Bagian Timur', 'Kabupaten Maluku Barat Daya', 'Kabupaten Buru Selatan'
            ],
            'Maluku Utara': [
                'Kota Ternate', 'Kota Tidore Kepulauan',
                'Kabupaten Halmahera Barat', 'Kabupaten Halmahera Tengah', 'Kabupaten Kepulauan Sula', 'Kabupaten Halmahera Selatan', 'Kabupaten Halmahera Utara',
                'Kabupaten Halmahera Timur', 'Kabupaten Pulau Morotai', 'Kabupaten Pulau Taliabu'
            ],
            'Papua Barat': [
                'Kota Sorong',
                'Kabupaten Fakfak', 'Kabupaten Kaimana', 'Kabupaten Teluk Wondama', 'Kabupaten Teluk Bintuni', 'Kabupaten Manokwari', 'Kabupaten Sorong Selatan',
                'Kabupaten Sorong', 'Kabupaten Raja Ampat', 'Kabupaten Tambrauw', 'Kabupaten Maybrat', 'Kabupaten Manokwari Selatan', 'Kabupaten Pegunungan Arfak'
            ],
            'Papua': [
                'Kota Jayapura',
                'Kabupaten Merauke', 'Kabupaten Jayawijaya', 'Kabupaten Jayapura', 'Kabupaten Nabire', 'Kabupaten Kepulauan Yapen', 'Kabupaten Biak Numfor',
                'Kabupaten Paniai', 'Kabupaten Puncak Jaya', 'Kabupaten Mimika', 'Kabupaten Boven Digoel', 'Kabupaten Mappi', 'Kabupaten Asmat', 'Kabupaten Yahukimo',
                'Kabupaten Pegunungan Bintang', 'Kabupaten Tolikara', 'Kabupaten Sarmi', 'Kabupaten Keerom', 'Kabupaten Waropen', 'Kabupaten Supiori', 'Kabupaten Mamberamo Raya',
                'Kabupaten Nduga', 'Kabupaten Lanny Jaya', 'Kabupaten Mamberamo Tengah', 'Kabupaten Yalimo', 'Kabupaten Puncak', 'Kabupaten Dogiyai', 'Kabupaten Intan Jaya', 'Kabupaten Deiyai'
            ]
        };

        if (cityData[selectedProvince]) {
            console.log('Found cities for', selectedProvince, ':', cityData[selectedProvince].length, 'cities'); // Debug log
            cityData[selectedProvince].forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                // Check if this city was previously selected (for old() values)
                if ('{{ old("city") }}' === city) {
                    option.selected = true;
                }
                citySelect.appendChild(option);
            });
        } else {
            console.log('No cities found for province:', selectedProvince); // Debug log
        }
    }

    // Initialize cities if province is already selected (for old() values)
    document.addEventListener('DOMContentLoaded', function() {
        const provinceSelect = document.getElementById('province');
        if (provinceSelect.value) {
            updateCities();
        }

        // Initialize wizard
        initWizard();

        // Add field interactions
        addFieldInteractions();

        // Fallback: Make sure buttons are visible
        setTimeout(() => {
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');

            if (nextBtn) {
                nextBtn.style.display = 'flex';
                nextBtn.style.visibility = 'visible';
                nextBtn.style.opacity = '1';
                console.log('✅ Fallback: Next button made visible');
            }

            if (prevBtn) {
                prevBtn.style.display = 'flex';
                console.log('✅ Fallback: Previous button made visible');
            }
        }, 500);
    });

    // Wizard functionality
    let currentStep = 1;
    const totalSteps = 4;

    function initWizard() {
        console.log('🎮 Initializing Wizard...');

        // Use the correct button IDs
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');

        if (!nextBtn) {
            console.error('❌ Next button not found!');
            return;
        }

        if (!prevBtn) {
            console.error('❌ Previous button not found!');
            return;
        }

        console.log('✅ Wizard buttons found successfully');

        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log(`🚀 Next button clicked! Current step: ${currentStep}`);

            if (currentStep < totalSteps) {
                console.log('🔍 Validating current step...');
                if (validateStep(currentStep)) {
                    console.log('✅ Validation passed, moving to next step');
                    nextStep();
                } else {
                    console.log('❌ Validation failed');
                }
            } else {
                console.log('📝 Submitting form...');
                // Submit form on last step
                if (validateStep(currentStep)) {
                    document.getElementById('wizardForm').submit();
                }
            }
        });

        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log(`⬅️ Previous button clicked! Current step: ${currentStep}`);
            prevStep();
        });

        console.log('🎯 Initial wizard UI update...');
        updateWizardUI();

        // Show success notification
        showNotification('✅ Wizard siap! Gunakan tombol di bawah form untuk navigasi.', 'success');
    }

    function nextStep() {
        if (currentStep < totalSteps) {
            // Hide current step
            document.getElementById('step' + currentStep).style.display = 'none';

            currentStep++;

            // Show next step
            document.getElementById('step' + currentStep).style.display = 'block';

            // Update review if going to step 4
            if (currentStep === 4) {
                updateReviewData();
            }

            updateWizardUI();
            scrollToTop();
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            // Hide current step
            document.getElementById('step' + currentStep).style.display = 'none';

            currentStep--;

            // Show previous step
            document.getElementById('step' + currentStep).style.display = 'block';

            updateWizardUI();
            scrollToTop();
        }
    }

    function updateWizardUI() {
        // Update main progress line
        const progressLine = document.getElementById('progressLine');
        const progressWidth = (currentStep / totalSteps) * 100;
        progressLine.style.width = progressWidth + '%';

        // Update mini progress bar
        const miniProgress = document.getElementById('miniProgress');
        if (miniProgress) {
            miniProgress.style.width = progressWidth + '%';
        }

        // Update step counter and description
        const currentStepText = document.getElementById('currentStepText');
        const stepDescription = document.getElementById('stepDescription');
        const helpText = document.getElementById('helpText');

        const stepTitles = [
            'Data Personal',
            'Target & Aspirasi',
            'Background & Analytics',
            'Review & Finalisasi'
        ];

        const stepHints = [
            '💡 <span class="font-medium">Tip:</span> Pastikan data yang Anda masukkan akurat untuk rekomendasi terbaik',
            '🎯 <span class="font-medium">Tip:</span> Pilih instansi dan jurusan sesuai dengan latar belakang Anda',
            '📊 <span class="font-medium">Tip:</span> Data ini membantu kami memberikan analisis yang tepat',
            '✨ <span class="font-medium">Tip:</span> Periksa kembali semua data sebelum mendaftar'
        ];

        if (currentStepText) currentStepText.textContent = currentStep;
        if (stepDescription) stepDescription.textContent = stepTitles[currentStep - 1];
        if (helpText) helpText.innerHTML = stepHints[currentStep - 1];

        // Update step indicators with animation
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            const stepNumber = index + 1;
            const circle = indicator.querySelector('div');
            const text = indicator.querySelector('p');

            setTimeout(() => {
                if (stepNumber < currentStep) {
                    // Completed step
                    circle.className = 'w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center text-sm font-semibold shadow-lg transform scale-110';
                    circle.innerHTML = '<i class="fas fa-check"></i>';
                    text.className = 'text-xs mt-2 font-medium text-green-600';
                } else if (stepNumber === currentStep) {
                    // Current step
                    circle.className = 'w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center text-sm font-semibold shadow-lg ring-4 ring-blue-200 animate-pulse';
                    text.className = 'text-xs mt-2 font-medium text-blue-600';
                    indicator.classList.add('active');
                } else {
                    // Future step
                    circle.className = 'w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold';
                    text.className = 'text-xs mt-2 font-medium text-gray-400';
                    indicator.classList.remove('active');
                }
            }, index * 100); // Staggered animation
        });

        // Update navigation buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const nextBtnText = document.getElementById('nextBtnText');
        const nextBtnIcon = document.getElementById('nextBtnIcon');

        // Show/hide previous button with animation
        if (currentStep > 1) {
            prevBtn.style.visibility = 'visible';
            prevBtn.style.opacity = '1';
            prevBtn.style.display = 'flex';
            console.log('👈 Previous button shown');
        } else {
            prevBtn.style.visibility = 'hidden';
            prevBtn.style.opacity = '0';
            console.log('👈 Previous button hidden');
        }

        // Make sure next button is always visible
        nextBtn.style.display = 'flex';
        nextBtn.style.visibility = 'visible';
        nextBtn.style.opacity = '1';
        console.log('👉 Next button ensured visible');

        // Update next button text and icon with animation
        if (currentStep === totalSteps) {
            nextBtnText.textContent = '🚀 Daftar Sekarang';
            nextBtnIcon.className = 'fas fa-rocket text-sm relative z-10 group-hover:translate-x-1 transition-transform animate-bounce';
            nextBtn.classList.add('bg-gradient-to-r', 'from-green-600', 'to-emerald-700');
        } else {
            nextBtnText.textContent = 'Lanjutkan';
            nextBtnIcon.className = 'fas fa-arrow-right text-sm relative z-10 group-hover:translate-x-1 transition-transform';
            nextBtn.classList.remove('from-green-600', 'to-emerald-700');
        }

        // Add step completion animation
        if (currentStep > 1) {
            showStepCompletionAnimation(currentStep - 1);
        }
    }

    function showStepCompletionAnimation(completedStep) {
        // Add celebration effect for completed steps
        const completedIndicator = document.querySelector(`[data-step="${completedStep}"]`);
        if (completedIndicator) {
            completedIndicator.classList.add('animate-bounce');
            setTimeout(() => {
                completedIndicator.classList.remove('animate-bounce');
            }, 1000);
        }
    }

    function validateStep(step) {
        let isValid = true;
        let stepElement = document.getElementById('step' + step);
        let invalidFields = [];

        // Get required fields in current step
        const requiredFields = stepElement.querySelectorAll('[required]');

        requiredFields.forEach(field => {
            const value = field.type === 'select-one' ? field.selectedIndex : field.value.trim();

            if (!value || (field.type === 'select-one' && value === 0)) {
                isValid = false;
                invalidFields.push(field);

                // Add error styling with animation
                field.classList.add('border-red-500', 'bg-red-50', 'animate-pulse');

                // Remove error styling after user interacts
                const removeError = function() {
                    field.classList.remove('border-red-500', 'bg-red-50', 'animate-pulse');
                    field.removeEventListener('input', removeError);
                    field.removeEventListener('change', removeError);
                };

                field.addEventListener('input', removeError);
                field.addEventListener('change', removeError);
            } else {
                // Remove error styling if field is now valid
                field.classList.remove('border-red-500', 'bg-red-50', 'animate-pulse');
            }
        });

        if (!isValid) {
            // Show error message with field count
            const fieldCount = invalidFields.length;
            const message = fieldCount === 1
                ? 'Mohon lengkapi field yang masih kosong'
                : `Mohon lengkapi ${fieldCount} field yang masih kosong`;

            showNotification(message, 'error');

            // Focus on first invalid field
            if (invalidFields.length > 0) {
                invalidFields[0].focus();
                invalidFields[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } else {
            // Show success animation
            showNotification('Data step ini sudah lengkap! 👍', 'success');
        }

        return isValid;
    }

    function updateReviewData() {
        // Update review summary
        document.getElementById('reviewName').textContent = document.getElementById('name').value || '-';
        document.getElementById('reviewEmail').textContent = document.getElementById('email').value || '-';

        const province = document.getElementById('province').selectedOptions[0]?.text || '-';
        const city = document.getElementById('city').selectedOptions[0]?.text || '-';
        document.getElementById('reviewLocation').textContent = province + (city !== '-' ? ', ' + city : '');

        document.getElementById('reviewTarget').textContent = document.getElementById('cpns_type').selectedOptions[0]?.text || '-';
        document.getElementById('reviewAgency').textContent = document.getElementById('target_agency').selectedOptions[0]?.text || '-';
        document.getElementById('reviewMajor').textContent = document.getElementById('major').selectedOptions[0]?.text || '-';
    }

    function scrollToTop() {
        document.querySelector('.register-form').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-4 py-3 rounded-lg text-white font-medium text-sm shadow-lg transition-all duration-300 transform translate-x-full`;

        if (type === 'error') {
            notification.classList.add('bg-red-500');
        } else if (type === 'success') {
            notification.classList.add('bg-green-500');
        } else {
            notification.classList.add('bg-blue-500');
        }

        notification.textContent = message;
        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Add interactive field behaviors
    function addFieldInteractions() {
        // Add progress indicators when fields are filled
        const allFields = document.querySelectorAll('input[required], select[required], textarea[required]');

        allFields.forEach(field => {
            field.addEventListener('input', function() {
                updateFieldProgress();
            });

            field.addEventListener('change', function() {
                updateFieldProgress();
            });

            // Add focus animations
            field.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-105');
            });

            field.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-105');
            });
        });

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'Enter') {
                // Ctrl+Enter to go to next step
                document.getElementById('nextBtn').click();
            }

            if (e.key === 'Escape') {
                // ESC to go back
                if (currentStep > 1) {
                    document.getElementById('prevBtn').click();
                }
            }
        });
    }

    function updateFieldProgress() {
        const currentStepElement = document.getElementById('step' + currentStep);
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let filledFields = 0;

        requiredFields.forEach(field => {
            const value = field.type === 'select-one' ? field.selectedIndex : field.value.trim();
            if (value && !(field.type === 'select-one' && value === 0)) {
                filledFields++;
            }
        });

        const completionRate = (filledFields / requiredFields.length) * 100;

        // Update mini progress with field completion
        const miniProgress = document.getElementById('miniProgress');
        if (miniProgress) {
            const baseWidth = ((currentStep - 1) / totalSteps) * 100;
            const stepWidth = (1 / totalSteps) * 100;
            const adjustedWidth = baseWidth + (stepWidth * (completionRate / 100));
            miniProgress.style.width = adjustedWidth + '%';
        }

        // Show completion status in help text
        const helpText = document.getElementById('helpText');
        if (completionRate === 100) {
            helpText.innerHTML = '✅ <span class="font-medium text-green-600">Step ini sudah lengkap!</span> Klik "Lanjutkan" untuk melanjutkan.';
        }
    }
</script>

<style>
    /* 🎨 Enhanced Wizard Styles */
    .wizard-step {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        min-height: 400px;
    }

    .step-indicator {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .step-indicator.active {
        transform: scale(1.15);
    }

    .step-indicator:hover {
        transform: scale(1.05);
    }

    /* ✨ Enhanced Progress Lines */
    #progressLine, #miniProgress {
        transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(90deg, #3B82F6, #6366F1, #8B5CF6);
        box-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
        position: relative;
        overflow: hidden;
    }

    #progressLine::after, #miniProgress::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shine 2s infinite;
    }

    @keyframes shine {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* 🎯 Enhanced Form Field Interactions */
    .wizard-step input, .wizard-step select, .wizard-step textarea {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .wizard-step input:focus,
    .wizard-step select:focus,
    .wizard-step textarea:focus {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.15), 0 5px 15px rgba(0,0,0,0.08);
        border-color: #6366F1;
        background: linear-gradient(145deg, #ffffff, #f8fafc);
    }

    .wizard-step .relative:hover {
        transform: translateY(-1px);
    }

    /* 🚀 Button Animations */
    #nextBtn, #prevBtn {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        display: flex !important;
        z-index: 1000;
    }

    #nextBtn {
        visibility: visible !important;
        opacity: 1 !important;
        pointer-events: all !important;
    }

    #nextBtn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.4);
    }

    #prevBtn:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    #nextBtn:active, #prevBtn:active {
        transform: translateY(0) scale(0.98);
    }

    /* ⚡ Ripple Effect */
    #nextBtn::before, #prevBtn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        transition: width 0.6s, height 0.6s, top 0.6s, left 0.6s;
        transform: translate(-50%, -50%);
    }

    #nextBtn:active::before, #prevBtn:active::before {
        width: 300px;
        height: 300px;
    }

    /* 🌊 Step Transition Animations */
    .wizard-step {
        opacity: 1;
        transform: translateX(0) scale(1);
    }

    .wizard-step[style*="none"] {
        opacity: 0;
        transform: translateX(30px) scale(0.95);
        pointer-events: none;
    }

    /* ⚠️ Enhanced Validation Animations */
    .animate-pulse {
        animation: pulseError 1.5s infinite;
    }

    @keyframes pulseError {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            border-color: #EF4444;
        }
        50% {
            box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
            border-color: #DC2626;
        }
    }

    /* ✅ Success Animations */
    @keyframes successPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .success-animation {
        animation: successPulse 0.6s ease-in-out;
    }

    /* 🔄 Loading Animation */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* 📋 Enhanced Review Summary */
    .wizard-step #step4 .bg-blue-50 {
        animation: fadeInUp 0.6s ease-out;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* 📱 Mobile Optimizations */
    @media (max-width: 768px) {
        .step-indicator p {
            font-size: 0.6rem;
            margin-top: 0.25rem;
        }

        .step-indicator div {
            width: 2.5rem;
            height: 2.5rem;
        }

        .wizard-step {
            min-height: 350px;
        }

        #nextBtn, #prevBtn {
            padding: 0.875rem 1.5rem;
            font-size: 0.875rem;
        }

        .wizard-step input:focus,
        .wizard-step select:focus,
        .wizard-step textarea:focus {
            transform: translateY(-1px) scale(1.01);
        }
    }

    /* 🎭 Interactive Hover States */
    .wizard-step .space-y-1:hover {
        background: rgba(59, 130, 246, 0.02);
        border-radius: 0.5rem;
        padding: 0.25rem;
        margin: -0.25rem;
        transition: all 0.2s ease;
    }

    /* 🌈 Step Completion Celebration */
    @keyframes celebrate {
        0% { transform: scale(1) rotate(0deg); }
        25% { transform: scale(1.1) rotate(5deg); }
        50% { transform: scale(1.2) rotate(-5deg); }
        75% { transform: scale(1.1) rotate(3deg); }
        100% { transform: scale(1) rotate(0deg); }
    }

    .celebrate {
        animation: celebrate 0.6s ease-in-out;
    }

    /* 🔧 Debug & Force Visibility */
    .mt-8.pt-6.border-t {
        background: rgba(0, 0, 0, 0.01);
        min-height: 120px;
        position: relative;
        z-index: 100;
    }



    #nextBtn {
        background: linear-gradient(135deg, #3B82F6, #6366F1, #8B5CF6) !important;
        border: 2px solid #ffffff20;
        box-shadow: 0 8px 32px rgba(59, 130, 246, 0.4) !important;
    }

    /* Force button visibility */
    button[id="nextBtn"] {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        position: relative !important;
        z-index: 1000 !important;
        animation: pulse-glow 2s infinite;
    }

    @keyframes pulse-glow {
        0%, 100% {
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.4), 0 0 0 0 rgba(59, 130, 246, 0.7);
        }
        50% {
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.6), 0 0 0 10px rgba(59, 130, 246, 0);
        }
    }

    /* Debug outline */
    .debug-mode #nextBtn {
        outline: 3px solid red !important;
        outline-offset: 2px;
    }
</style>

@endsection

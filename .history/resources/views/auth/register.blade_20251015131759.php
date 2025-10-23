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

            <!-- Right Side - Register Form -->
            <div class="w-full lg:w-2/3 flex items-center justify-center">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-4xl font-black text-white mb-2">
                        Join<span class="text-orange-400">ASN</span>ku
                    </h1>
                    <p class="text-blue-100">Bergabung dengan 10,000+ calon ASN sukses</p>
                </div>

                <div class="w-full max-w-xl">
                    <!-- Register Card -->
                    <div class="bg-white rounded-2xl px-6 py-8 shadow-2xl register-form">
                        <!-- Header -->
                        <div class="text-center mb-6">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                                <i class="fas fa-user-plus text-white text-lg"></i>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 mb-1">
                                Buat Akun Baru
                            </h2>
                            <p class="text-sm text-gray-600 mb-3">
                                Mulai perjalanan sukses CPNS Anda hari ini
                            </p>

                            <!-- Back to Home Button -->
                            <a href="{{ url('/') }}"
                               class="inline-flex items-center space-x-2 bg-gray-50 hover:bg-blue-50 px-3 py-2 rounded-lg border border-gray-200 hover:border-blue-300 transition-all duration-300 text-sm">
                                <i class="fas fa-arrow-left text-gray-500 text-xs"></i>
                                <span class="text-gray-700 font-medium">Kembali</span>
                            </a>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="space-y-3">
                            @csrf

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

                            <!-- Contact Info - 2 Columns -->
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

                                <!-- City Field -->
                                <div class="space-y-1">
                                    <label for="city" class="block text-xs font-medium text-gray-700">
                                        Kota Asal <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                                        </div>
                                        <input id="city"
                                               type="text"
                                               name="city"
                                               value="{{ old('city') }}"
                                               required
                                               placeholder="Jakarta, Bandung, dll"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('city')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

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
                                            <option value="Kementerian Pendidikan" {{ old('target_agency') == 'Kementerian Pendidikan' ? 'selected' : '' }}>Kementerian Pendidikan</option>
                                            <option value="Kementerian Kesehatan" {{ old('target_agency') == 'Kementerian Kesehatan' ? 'selected' : '' }}>Kementerian Kesehatan</option>
                                            <option value="Kementerian Keuangan" {{ old('target_agency') == 'Kementerian Keuangan' ? 'selected' : '' }}>Kementerian Keuangan</option>
                                            <option value="Kepolisian" {{ old('target_agency') == 'Kepolisian' ? 'selected' : '' }}>Kepolisian</option>
                                            <option value="TNI" {{ old('target_agency') == 'TNI' ? 'selected' : '' }}>TNI</option>
                                            <option value="BPS" {{ old('target_agency') == 'BPS' ? 'selected' : '' }}>BPS</option>
                                            <option value="BPKP" {{ old('target_agency') == 'BPKP' ? 'selected' : '' }}>BPKP</option>
                                            <option value="Kejaksaan" {{ old('target_agency') == 'Kejaksaan' ? 'selected' : '' }}>Kejaksaan</option>
                                            <option value="Pemda/PEMKOT" {{ old('target_agency') == 'Pemda/PEMKOT' ? 'selected' : '' }}>Pemda/PEMKOT</option>
                                            <option value="Lainnya" {{ old('target_agency') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                        <input id="major"
                                               type="text"
                                               name="major"
                                               value="{{ old('major') }}"
                                               placeholder="Teknik Informatika, Akuntansi, dll"
                                               class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-1 focus:ring-blue-500/20 transition-all duration-300 text-sm">
                                        @error('major')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Target Score & Referral Code - 2 Columns -->
                            <div class="grid grid-cols-2 gap-3">
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

                            <!-- Password Fields - 2 Columns (Moved to Last) -->
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
                            </div>                            <!-- Register Button -->
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2.5 px-6 rounded-lg transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:scale-[1.02] text-sm mt-4">
                                <span>Daftar Sekarang</span>
                                <i class="fas fa-rocket text-xs"></i>
                            </button>
                        </form>

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
</div>
@endsection
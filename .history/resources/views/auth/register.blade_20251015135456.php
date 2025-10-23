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

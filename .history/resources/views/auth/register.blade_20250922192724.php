<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Daftar Gratis</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .input-group {
            position: relative;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            transform: translateY(-1.5rem) scale(0.75);
            color: #667eea;
        }

        .input-group label {
            position: absolute;
            left: 1rem;
            top: 1rem;
            color: #6b7280;
            transition: all 0.3s ease;
            pointer-events: none;
            background: white;
            padding: 0 0.5rem;
        }
    </style>
</head>
<body class="font-inter antialiased">
    <div class="min-h-screen gradient-bg flex items-center justify-center relative overflow-hidden">
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>
            <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>
            <div class="floating-animation absolute top-60 left-1/3 w-12 h-12 bg-blue-500/20 rounded-full" style="animation-delay: 0.5s;"></div>
            <div class="floating-animation absolute bottom-60 right-1/4 w-24 h-24 bg-orange-500/20 rounded-full" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Branding -->
                <div class="text-white lg:pr-8">
                    <!-- Logo -->
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 via-purple-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-xl">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-black bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                TryOut ASNku
                            </h1>
                            <p class="text-blue-200">Platform #1 Persiapan ASN Indonesia</p>
                        </div>
                    </div>

                    <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">
                        Mulai Perjalanan 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">ASN</span> 
                        Impianmu!
                    </h2>

                    <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                        Bergabung dengan <strong class="text-yellow-300">1000+ peserta</strong> yang sudah merasakan 
                        pengalaman tryout premium dengan fitur terlengkap dan analisis mendalam.
                    </p>

                    <!-- Features Preview -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <span class="text-blue-100">50,000+ Soal Premium Gratis untuk Member Baru</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <span class="text-blue-100">Analisis Performance Real-time</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <span class="text-blue-100">Grup Telegram Eksklusif</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Registration Form -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-black text-gray-900 mb-2">Daftar Gratis Sekarang!</h3>
                        <p class="text-gray-600">Lengkapi data di bawah untuk memulai persiapan ASN terbaikmu</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Step 1: Personal Info -->
                        <div class="bg-blue-50 rounded-2xl p-6">
                            <h4 class="text-lg font-bold text-blue-900 mb-4 flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                Informasi Personal
                            </h4>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <!-- Name -->
                                <div class="input-group">
                                    <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    <label for="name">Nama Lengkap</label>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="input-group">
                                    <input id="email" type="email" name="email" :value="old('email')" required 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    <label for="email">Email Address</label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Phone -->
                                <div class="input-group">
                                    <input id="phone" type="tel" name="phone" :value="old('phone')" required 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                    <label for="phone">No. WhatsApp/Telegram</label>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <!-- Target Test -->
                                <div>
                                    <select name="target_test" required 
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                                        <option value="">Pilih Target Tes</option>
                                        <option value="cpns_2024">CPNS 2024</option>
                                        <option value="pppk_2024">PPPK 2024</option>
                                        <option value="cpns_2025">CPNS 2025</option>
                                        <option value="pppk_2025">PPPK 2025</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('target_test')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Goals & Experience -->
                        <div class="bg-green-50 rounded-2xl p-6">
                            <h4 class="text-lg font-bold text-green-900 mb-4 flex items-center">
                                <i class="fas fa-target mr-2"></i>
                                Target & Pengalaman
                            </h4>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <!-- Experience Level -->
                                <div>
                                    <select name="experience_level" required 
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors">
                                        <option value="">Pengalaman Tes ASN</option>
                                        <option value="beginner">Pertama kali ikut tes</option>
                                        <option value="intermediate">Sudah pernah 1-2x</option>
                                        <option value="experienced">Veteran (3x+)</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                                </div>

                                <!-- Target Institution -->
                                <div class="input-group">
                                    <input id="target_institution" type="text" name="target_institution" :value="old('target_institution')" 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors">
                                    <label for="target_institution">Instansi Target (Optional)</label>
                                    <x-input-error :messages="$errors->get('target_institution')" class="mt-2" />
                                </div>

                                <!-- Referral Code -->
                                <div class="input-group">
                                    <input id="referral_code" type="text" name="referral_code" :value="old('referral_code')" 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:outline-none transition-colors">
                                    <label for="referral_code">Kode Referral (Optional)</label>
                                    <x-input-error :messages="$errors->get('referral_code')" class="mt-2" />
                                </div>

                                <!-- Motivation -->
                                <div>
                                    <select name="motivation" required 
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-colors">
                                        <option value="">Motivasi jadi ASN</option>
                                        <option value="serve_nation">Mengabdi untuk Negara</option>
                                        <option value="job_security">Stabilitas Karir</option>
                                        <option value="career_growth">Pengembangan Karir</option>
                                        <option value="family_dream">Cita-cita Keluarga</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('motivation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Security -->
                        <div class="bg-purple-50 rounded-2xl p-6">
                            <h4 class="text-lg font-bold text-purple-900 mb-4 flex items-center">
                                <i class="fas fa-lock mr-2"></i>
                                Keamanan Akun
                            </h4>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <!-- Password -->
                                <div class="input-group">
                                    <input id="password" type="password" name="password" required 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:outline-none transition-colors">
                                    <label for="password">Password</label>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="input-group">
                                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                                           placeholder=" " 
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:outline-none transition-colors">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Terms & Register Button -->
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" id="terms" required 
                                       class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="terms" class="text-sm text-gray-600">
                                    Saya setuju dengan <a href="#" class="text-blue-600 hover:underline">Syarat & Ketentuan</a> 
                                    dan <a href="#" class="text-blue-600 hover:underline">Kebijakan Privasi</a>
                                </label>
                            </div>

                            <div class="flex items-start space-x-3">
                                <input type="checkbox" id="newsletter" name="newsletter" 
                                       class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="newsletter" class="text-sm text-gray-600">
                                    Saya ingin menerima tips belajar dan update terbaru via email
                                </label>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 text-white py-4 rounded-xl font-black text-lg hover:scale-105 transition-transform duration-300 shadow-xl">
                                <i class="fas fa-rocket mr-2"></i>
                                Daftar Gratis & Mulai Tryout!
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-gray-600">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

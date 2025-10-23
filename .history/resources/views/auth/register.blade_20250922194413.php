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
        .auth-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
        }
        
        .auth-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .brand-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .spectacular-input {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .spectacular-input:focus {
            border-color: #667eea;
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.1),
                0 10px 20px rgba(102, 126, 234, 0.1);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-1px);
        }

        .btn-spectacular {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            box-shadow: 
                0 10px 20px rgba(102, 126, 234, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-spectacular:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 15px 30px rgba(102, 126, 234, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.2) inset;
        }

        .btn-spectacular::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-spectacular:hover::before {
            left: 100%;
        }

        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .feature-highlight {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .icon-glow {
            filter: drop-shadow(0 4px 8px rgba(102, 126, 234, 0.3));
        }

        .text-glow {
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="font-inter antialiased">
    <div class="min-h-screen auth-bg flex items-center justify-center relative overflow-hidden py-8">
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-element w-20 h-20 top-20 left-10" style="animation-delay: 0s;"></div>
            <div class="floating-element w-32 h-32 top-40 right-20" style="animation-delay: 1s;"></div>
            <div class="floating-element w-16 h-16 bottom-40 left-20" style="animation-delay: 2s;"></div>
            <div class="floating-element w-24 h-24 top-60 left-1/3" style="animation-delay: 0.5s;"></div>
            <div class="floating-element w-28 h-28 bottom-60 right-1/4" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-5 gap-8 items-center">
                
                <!-- Left Side - Spectacular Branding -->
                <div class="lg:col-span-2">
                    <div class="brand-card rounded-3xl p-8 text-white">
                        <!-- Logo Section -->
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 icon-glow shadow-2xl">
                                <i class="fas fa-graduation-cap text-white text-3xl"></i>
                            </div>
                            <h1 class="text-3xl font-black text-glow mb-2">
                                TryOut ASNku
                            </h1>
                            <p class="text-blue-200 text-sm font-medium">Platform #1 Persiapan ASN Indonesia</p>
                        </div>

                        <div class="text-center mb-8">
                            <h2 class="text-2xl md:text-3xl font-black mb-4 leading-tight text-glow">
                                Mulai Perjalanan 
                                <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">ASN</span> 
                                Impianmu!
                            </h2>
                            <p class="text-blue-100 leading-relaxed">
                                Bergabung dengan <strong class="text-yellow-300">1000+ peserta</strong> yang sudah merasakan 
                                pengalaman tryout premium terlengkap.
                            </p>
                        </div>

                        <!-- Spectacular Features -->
                        <div class="space-y-4">
                            <div class="feature-highlight rounded-2xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center icon-glow">
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">50,000+ Soal Premium</h4>
                                        <p class="text-blue-200 text-sm">Gratis untuk member baru</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="feature-highlight rounded-2xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center icon-glow">
                                        <i class="fas fa-chart-line text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Analisis Real-time</h4>
                                        <p class="text-blue-200 text-sm">Performance tracking advanced</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="feature-highlight rounded-2xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center icon-glow">
                                        <i class="fab fa-telegram text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Grup Telegram Eksklusif</h4>
                                        <p class="text-blue-200 text-sm">Komunitas premium + mentoring</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Spectacular Registration Form -->
                <div class="lg:col-span-3">
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-blue-100 text-sm">50,000+ Soal Premium Gratis</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-blue-100 text-sm">Analisis Performance Real-time</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-blue-100 text-sm">Grup Telegram Eksklusif</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Registration Form -->

                <div class="glass-card rounded-2xl neon-glow p-6 max-w-md w-full">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-black bg-gradient-to-r from-purple-600 via-blue-600 to-green-500 bg-clip-text text-transparent mb-2">
                            Daftar Gratis!
                        </h3>
                        <p class="text-gray-600 text-sm">Lengkapi data untuk mulai persiapan ASN</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-3">
                        @csrf

                        <!-- Essential Fields Only -->
                        <div class="space-y-3">
                            <!-- Name & Email -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                                           placeholder="Nama Lengkap" 
                                           class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
                                </div>
                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                                           placeholder="Email Address" 
                                           class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
                                </div>
                            </div>

                            <!-- Phone & Target Test -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required 
                                           placeholder="WhatsApp/Telegram" 
                                           class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                                    <x-input-error :messages="$errors->get('phone')" class="mt-1 text-xs" />
                                </div>
                                <div>
                                    <select name="target_test" required 
                                            class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 text-sm">
                                        <option value="">Target Tes</option>
                                        <option value="cpns_2025" {{ old('target_test') == 'cpns_2025' ? 'selected' : '' }}>CPNS 2025</option>
                                        <option value="pppk_2025" {{ old('target_test') == 'pppk_2025' ? 'selected' : '' }}>PPPK 2025</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('target_test')" class="mt-1 text-xs" />
                                </div>
                            </div>

                            <!-- Experience & Motivation -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <select name="experience_level" required 
                                            class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 text-sm">
                                        <option value="">Pengalaman</option>
                                        <option value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>Pemula</option>
                                        <option value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>Menengah</option>
                                        <option value="experienced" {{ old('experience_level') == 'experienced' ? 'selected' : '' }}>Expert</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('experience_level')" class="mt-1 text-xs" />
                                </div>
                                <div>
                                    <select name="motivation" required 
                                            class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 text-sm">
                                        <option value="">Motivasi</option>
                                        <option value="serve_nation" {{ old('motivation') == 'serve_nation' ? 'selected' : '' }}>Mengabdi Negara</option>
                                        <option value="job_security" {{ old('motivation') == 'job_security' ? 'selected' : '' }}>Stabilitas Karir</option>
                                        <option value="career_growth" {{ old('motivation') == 'career_growth' ? 'selected' : '' }}>Pengembangan</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('motivation')" class="mt-1 text-xs" />
                                </div>
                            </div>

                            <!-- Password Fields -->
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <input id="password" type="password" name="password" required 
                                           placeholder="Password" 
                                           class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
                                </div>
                                <div>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                                           placeholder="Konfirmasi" 
                                           class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs" />
                                </div>
                            </div>
                        </div>                        <!-- Terms & Register Button -->
                        <div class="space-y-3 mt-4">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="terms" required 
                                       class="w-3 h-3 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                <label for="terms" class="text-xs text-gray-600">
                                    Setuju <a href="#" class="text-purple-600 hover:underline font-semibold">Terms</a> & <a href="#" class="text-purple-600 hover:underline font-semibold">Privacy</a>
                                </label>
                            </div>

                            <input type="hidden" name="newsletter" value="1">
                            <input type="hidden" name="target_institution" value="">
                            <input type="hidden" name="referral_code" value="">

                            <button type="submit" 
                                    class="btn-spectacular w-full text-white py-3 rounded-lg font-black text-sm transition-all duration-300">
                                <i class="fas fa-rocket mr-2"></i>
                                Daftar Gratis & Mulai!
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-3">
                            <p class="text-gray-600 text-xs">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-bold">
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

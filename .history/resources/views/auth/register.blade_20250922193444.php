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
        .hero-gradient {
            background: linear-gradient(-45deg, #ff006e, #8338ec, #3a86ff, #06ffa5, #ffbe0b, #fb5607);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .neon-glow {
            box-shadow: 0 0 20px rgba(131, 56, 236, 0.4), 0 0 40px rgba(58, 134, 255, 0.3);
        }

        .input-modern {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(131, 56, 236, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-modern:focus {
            border-color: #8338ec;
            box-shadow: 0 0 0 4px rgba(131, 56, 236, 0.1);
            background: rgba(255, 255, 255, 1);
        }

        .btn-spectacular {
            background: linear-gradient(135deg, #8338ec 0%, #3a86ff 50%, #06ffa5 100%);
            box-shadow: 0 10px 30px rgba(131, 56, 236, 0.3);
            transition: all 0.3s ease;
        }

        .btn-spectacular:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(131, 56, 236, 0.4);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            animation: floatUpDown 6s ease-in-out infinite;
        }

        @keyframes floatUpDown {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }
    </style>
</head>
<body class="font-inter antialiased">
    <div class="min-h-screen hero-gradient flex items-center justify-center relative overflow-hidden">
        
        <!-- Floating Shapes -->
        <div class="floating-shapes">
            <div class="shape w-16 h-16 bg-pink-400/20 top-20 left-10" style="animation-delay: 0s;"></div>
            <div class="shape w-24 h-24 bg-purple-400/20 top-32 right-20" style="animation-delay: 1s;"></div>
            <div class="shape w-12 h-12 bg-blue-400/20 bottom-40 left-16" style="animation-delay: 2s;"></div>
            <div class="shape w-20 h-20 bg-green-400/20 top-1/2 right-1/3" style="animation-delay: 0.5s;"></div>
            <div class="shape w-14 h-14 bg-yellow-400/20 bottom-32 right-10" style="animation-delay: 1.5s;"></div>
            <div class="shape w-18 h-18 bg-orange-400/20 top-16 left-1/2" style="animation-delay: 3s;"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <div class="flex justify-center">
                <!-- Registration Form -->

                <div class="glass-card rounded-3xl neon-glow p-8 max-w-md w-full">
                    <!-- Logo Header -->
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-500 via-purple-600 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 neon-glow">
                            <i class="fas fa-graduation-cap text-white text-3xl"></i>
                        </div>
                        <h1 class="text-2xl font-black bg-gradient-to-r from-purple-600 via-blue-600 to-green-500 bg-clip-text text-transparent mb-2">
                            TryOut ASNku
                        </h1>
                        <p class="text-gray-600 text-sm">Daftar & Mulai Persiapan ASN Impianmu!</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <!-- Essential Fields Only -->
                        <div class="space-y-4">
                            <!-- Name -->
                            <div>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                                       placeholder="Nama Lengkap" 
                                       class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm" />
                            </div>

                            <!-- Email -->
                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                                       placeholder="Email Address" 
                                       class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required 
                                       placeholder="WhatsApp/Telegram" 
                                       class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                <x-input-error :messages="$errors->get('phone')" class="mt-1 text-sm" />
                            </div>

                            <!-- Target Test -->
                            <div>
                                <select name="target_test" required 
                                        class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900">
                                    <option value="">Target Tes ASN</option>
                                    <option value="cpns_2025" {{ old('target_test') == 'cpns_2025' ? 'selected' : '' }}>CPNS 2025</option>
                                    <option value="pppk_2025" {{ old('target_test') == 'pppk_2025' ? 'selected' : '' }}>PPPK 2025</option>
                                    <option value="cpns_2024" {{ old('target_test') == 'cpns_2024' ? 'selected' : '' }}>CPNS 2024</option>
                                    <option value="pppk_2024" {{ old('target_test') == 'pppk_2024' ? 'selected' : '' }}>PPPK 2024</option>
                                </select>
                                <x-input-error :messages="$errors->get('target_test')" class="mt-1 text-sm" />
                            </div>

                            <!-- Experience Level -->
                            <div>
                                <select name="experience_level" required 
                                        class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900">
                                    <option value="">Pengalaman Tes ASN</option>
                                    <option value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>Pemula (Pertama kali)</option>
                                    <option value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>Menengah (1-2x)</option>
                                    <option value="experienced" {{ old('experience_level') == 'experienced' ? 'selected' : '' }}>Berpengalaman (3x+)</option>
                                </select>
                                <x-input-error :messages="$errors->get('experience_level')" class="mt-1 text-sm" />
                            </div>

                            <!-- Motivation -->
                            <div>
                                <select name="motivation" required 
                                        class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900">
                                    <option value="">Motivasi Jadi ASN</option>
                                    <option value="serve_nation" {{ old('motivation') == 'serve_nation' ? 'selected' : '' }}>Mengabdi untuk Negara</option>
                                    <option value="job_security" {{ old('motivation') == 'job_security' ? 'selected' : '' }}>Stabilitas Karir</option>
                                    <option value="career_growth" {{ old('motivation') == 'career_growth' ? 'selected' : '' }}>Pengembangan Karir</option>
                                    <option value="family_dream" {{ old('motivation') == 'family_dream' ? 'selected' : '' }}>Cita-cita Keluarga</option>
                                </select>
                                <x-input-error :messages="$errors->get('motivation')" class="mt-1 text-sm" />
                            </div>

                            <!-- Password -->
                            <div>
                                <input id="password" type="password" name="password" required 
                                       placeholder="Password" 
                                       class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <input id="password_confirmation" type="password" name="password_confirmation" required 
                                       placeholder="Konfirmasi Password" 
                                       class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm" />
                            </div>
                        </div>

                        <!-- Terms & Register Button -->
                        <div class="space-y-3 mt-6">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="terms" required 
                                       class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                <label for="terms" class="text-xs text-gray-600">
                                    Setuju <a href="#" class="text-purple-600 hover:underline font-semibold">Terms</a> & <a href="#" class="text-purple-600 hover:underline font-semibold">Privacy</a>
                                </label>
                            </div>

                            <input type="hidden" name="newsletter" value="1">
                            <input type="hidden" name="target_institution" value="">
                            <input type="hidden" name="referral_code" value="">

                            <button type="submit" 
                                    class="btn-spectacular w-full text-white py-4 rounded-xl font-black text-lg transition-all duration-300">
                                <i class="fas fa-rocket mr-2"></i>
                                Daftar Gratis & Mulai!
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-4">
                            <p class="text-gray-600 text-sm">
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

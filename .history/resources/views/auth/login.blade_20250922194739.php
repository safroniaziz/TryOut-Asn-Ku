<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Masuk ke Akun</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background Spectacular */
        .auth-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
        }

        .auth-bg::before,
        .auth-bg::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
        }

        .auth-bg::before {
            top: -150px;
            right: -150px;
            animation: float 6s ease-in-out infinite;
        }

        .auth-bg::after {
            bottom: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite reverse;
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

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
        }

        .icon-glow {
            animation: iconGlow 3s ease-in-out infinite alternate;
        }

        @keyframes iconGlow {
            from {
                box-shadow: 
                    0 0 20px rgba(102, 126, 234, 0.6),
                    0 0 40px rgba(102, 126, 234, 0.4),
                    0 0 60px rgba(102, 126, 234, 0.2);
            }
            to {
                box-shadow: 
                    0 0 30px rgba(118, 75, 162, 0.8),
                    0 0 60px rgba(118, 75, 162, 0.6),
                    0 0 90px rgba(118, 75, 162, 0.4);
            }
        }

        .feature-highlight {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
        }

        .feature-highlight:hover {
            transform: translateX(8px);
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 12px;
        }

        .feature-highlight:hover::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: linear-gradient(180deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        /* Floating Elements Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
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

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
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

        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-8 items-center min-h-screen py-8">
                
                <!-- Left Side - Welcome Back -->
                <div class="text-white">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 via-purple-600 to-blue-600 rounded-xl flex items-center justify-center shadow-xl">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-black bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                TryOut ASNku
                            </h1>
                            <p class="text-blue-200 text-sm">Platform #1 Persiapan ASN Indonesia</p>
                        </div>
                    </div>

                    <h2 class="text-3xl md:text-4xl font-black mb-4 leading-tight">
                        Selamat Datang 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">Kembali!</span>
                    </h2>

                    <p class="text-lg text-blue-100 mb-6 leading-relaxed">
                        Lanjutkan perjalanan menuju <strong class="text-yellow-300">ASN impian</strong> dengan 
                        tools dan materi terlengkap.
                    </p>

                    <!-- Statistics -->
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        <div class="stat-card rounded-xl p-4 text-center">
                            <h3 class="text-2xl font-black text-white mb-1">1,234</h3>
                            <p class="text-blue-200 text-xs">Member Aktif</p>
                        </div>
                        <div class="stat-card rounded-xl p-4 text-center">
                            <h3 class="text-2xl font-black text-yellow-300 mb-1">89%</h3>
                            <p class="text-blue-200 text-xs">Success Rate</p>
                        </div>
                    </div>

                    <!-- Recent Updates -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-blue-100 text-xs">Update: Bank soal CPNS 2024 terbaru</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                            <span class="text-blue-100 text-xs">Fitur: Analisis prediksi kelulusan</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->

                <div class="glass-card rounded-2xl neon-glow p-6 max-w-md w-full">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-black bg-gradient-to-r from-purple-600 via-blue-600 to-green-500 bg-clip-text text-transparent mb-2">
                            Masuk ke Akun
                        </h3>
                        <p class="text-gray-600 text-sm">Akses semua fitur premium dan lanjutkan progres</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <!-- Email -->
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                   placeholder="Email Address" 
                                   class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
                        </div>

                        <!-- Password -->
                        <div>
                            <input id="password" type="password" name="password" required 
                                   placeholder="Password" 
                                   class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between text-xs">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" 
                                       class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500 w-3 h-3">
                                <span class="ml-2 text-gray-600">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit" 
                                class="btn-spectacular w-full text-white py-3 rounded-lg font-black text-sm transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk ke Dashboard
                        </button>

                        <!-- Quick Stats -->
                        <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl p-3 mt-4">
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div>
                                    <h4 class="text-sm font-black text-purple-600">1.2K+</h4>
                                    <p class="text-xs text-gray-600">Members</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-black text-blue-600">89%</h4>
                                    <p class="text-xs text-gray-600">Success</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-black text-green-600">50K+</h4>
                                    <p class="text-xs text-gray-600">Soal</p>
                                </div>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center mt-3">
                            <p class="text-gray-600 text-xs">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-bold">
                                    Daftar gratis
                                </a>
                            </p>
                        </div>

                        <!-- Social Proof -->
                        <div class="text-center pt-2 border-t border-gray-200">
                            <div class="flex justify-center items-center space-x-1">
                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                <span class="text-xs text-gray-600 ml-1">4.9/5 dari 1,234 review</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

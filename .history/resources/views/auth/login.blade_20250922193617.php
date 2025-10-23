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

        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <div class="flex justify-center">
                <!-- Login Form -->

                <div class="glass-card rounded-3xl neon-glow p-8 max-w-md w-full">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Logo Header -->
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-500 via-purple-600 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 neon-glow">
                            <i class="fas fa-graduation-cap text-white text-3xl"></i>
                        </div>
                        <h1 class="text-2xl font-black bg-gradient-to-r from-purple-600 via-blue-600 to-green-500 bg-clip-text text-transparent mb-2">
                            TryOut ASNku
                        </h1>
                        <p class="text-gray-600 text-sm">Masuk & Lanjutkan Persiapan ASN!</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <!-- Email -->
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                   placeholder="Email Address" 
                                   class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
                        </div>

                        <!-- Password -->
                        <div>
                            <input id="password" type="password" name="password" required 
                                   placeholder="Password" 
                                   class="input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between text-sm">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" 
                                       class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500">
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
                                class="btn-spectacular w-full text-white py-4 rounded-xl font-black text-lg transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk ke Dashboard
                        </button>

                        <!-- Quick Stats -->
                        <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-4 mt-4">
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div>
                                    <h4 class="text-lg font-black text-purple-600">1.2K+</h4>
                                    <p class="text-xs text-gray-600">Members</p>
                                </div>
                                <div>
                                    <h4 class="text-lg font-black text-blue-600">89%</h4>
                                    <p class="text-xs text-gray-600">Success</p>
                                </div>
                                <div>
                                    <h4 class="text-lg font-black text-green-600">50K+</h4>
                                    <p class="text-xs text-gray-600">Soal</p>
                                </div>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center mt-4">
                            <p class="text-gray-600 text-sm">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-bold">
                                    Daftar gratis
                                </a>
                            </p>
                        </div>

                        <!-- Social Proof -->
                        <div class="text-center pt-3 border-t border-gray-200">
                            <div class="flex justify-center items-center space-x-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-xs text-gray-600 ml-2">4.9/5 dari 1,234 review</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

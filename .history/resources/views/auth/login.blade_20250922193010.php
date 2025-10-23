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

        .stats-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
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
                
                <!-- Left Side - Welcome Back -->
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
                        Selamat Datang 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">Kembali!</span>
                    </h2>

                    <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                        Lanjutkan perjalanan menuju <strong class="text-yellow-300">ASN impian</strong> dengan 
                        tools dan materi terlengkap yang sudah dipercaya ribuan peserta.
                    </p>

                    <!-- Statistics -->
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="stats-card rounded-2xl p-6 text-center">
                            <h3 class="text-3xl font-black text-white mb-2">1,234</h3>
                            <p class="text-blue-200 text-sm">Member Aktif</p>
                        </div>
                        <div class="stats-card rounded-2xl p-6 text-center">
                            <h3 class="text-3xl font-black text-yellow-300 mb-2">89%</h3>
                            <p class="text-blue-200 text-sm">Success Rate</p>
                        </div>
                        <div class="stats-card rounded-2xl p-6 text-center">
                            <h3 class="text-3xl font-black text-green-300 mb-2">50K+</h3>
                            <p class="text-blue-200 text-sm">Soal Premium</p>
                        </div>
                        <div class="stats-card rounded-2xl p-6 text-center">
                            <h3 class="text-3xl font-black text-orange-300 mb-2">24/7</h3>
                            <p class="text-blue-200 text-sm">Support</p>
                        </div>
                    </div>

                    <!-- Recent Updates -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-blue-100 text-sm">Update: Bank soal CPNS 2024 terbaru ditambahkan</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                            <span class="text-blue-100 text-sm">Fitur: Analisis prediksi kelulusan real-time</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
                            <span class="text-blue-100 text-sm">Event: Webinar gratis setiap Sabtu pukul 19:00</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-black text-gray-900 mb-2">Masuk ke Akun</h3>
                        <p class="text-gray-600">Akses semua fitur premium dan lanjutkan progres belajarmu</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email -->
                        <div class="input-group">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                   placeholder=" " 
                                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition-colors text-lg">
                            <label for="email">Email Address</label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="input-group">
                            <input id="password" type="password" name="password" required 
                                   placeholder=" " 
                                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none transition-colors text-lg">
                            <label for="password">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember" 
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 text-white py-4 rounded-xl font-black text-lg hover:scale-105 transition-transform duration-300 shadow-xl">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk ke Dashboard
                        </button>

                        <!-- Quick Access -->
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4 text-center">Akses Cepat</h4>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="#" class="flex flex-col items-center p-3 bg-blue-100 rounded-xl hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-clock text-blue-600 text-xl mb-2"></i>
                                    <span class="text-sm font-semibold text-blue-800">Tryout Kilat</span>
                                </a>
                                <a href="#" class="flex flex-col items-center p-3 bg-green-100 rounded-xl hover:bg-green-200 transition-colors">
                                    <i class="fas fa-chart-bar text-green-600 text-xl mb-2"></i>
                                    <span class="text-sm font-semibold text-green-800">Statistik</span>
                                </a>
                                <a href="#" class="flex flex-col items-center p-3 bg-purple-100 rounded-xl hover:bg-purple-200 transition-colors">
                                    <i class="fas fa-book text-purple-600 text-xl mb-2"></i>
                                    <span class="text-sm font-semibold text-purple-800">Materi</span>
                                </a>
                                <a href="#" class="flex flex-col items-center p-3 bg-orange-100 rounded-xl hover:bg-orange-200 transition-colors">
                                    <i class="fab fa-telegram text-orange-600 text-xl mb-2"></i>
                                    <span class="text-sm font-semibold text-orange-800">Grup</span>
                                </a>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-gray-600">
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-semibold">
                                    Daftar gratis sekarang
                                </a>
                            </p>
                        </div>

                        <!-- Social Proof -->
                        <div class="text-center pt-4 border-t border-gray-200">
                            <p class="text-xs text-gray-500 mb-2">Dipercaya oleh ribuan calon ASN</p>
                            <div class="flex justify-center space-x-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-sm text-gray-600 ml-2">4.9/5 dari 1,234 review</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

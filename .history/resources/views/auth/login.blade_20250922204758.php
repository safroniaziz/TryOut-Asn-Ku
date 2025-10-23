<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TryOut ASN - Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .auth-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .brand-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .spectacular-input {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
        }
        .spectacular-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: rgba(255, 255, 255, 1);
        }
        .btn-spectacular {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            transition: all 0.3s ease;
        }
        .btn-spectacular:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
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
            from { box-shadow: 0 0 20px rgba(102, 126, 234, 0.6); }
            to { box-shadow: 0 0 30px rgba(118, 75, 162, 0.8); }
        }
        .feature-highlight {
            transition: all 0.3s ease;
        }
        .feature-highlight:hover {
            transform: translateX(8px);
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 12px;
        }
    </style>
</head>
<body class="auth-bg">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-6xl">
            <div class="grid lg:grid-cols-5 gap-8 items-center">
                
                <div class="lg:col-span-2">
                    <div class="brand-card rounded-3xl p-8 text-white">
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-white via-blue-100 to-purple-100 rounded-3xl flex items-center justify-center mx-auto mb-6 icon-glow shadow-2xl">
                                <i class="fas fa-graduation-cap text-purple-600 text-3xl"></i>
                            </div>
                            <h1 class="text-4xl font-black mb-3">
                                <span class="text-white">TryOut</span>
                                <span class="text-yellow-300">ASN</span>
                            </h1>
                            <p class="text-blue-100 text-lg font-medium">Platform Persiapan ASN Terdepan</p>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-xl font-bold text-white mb-6">✨ Keunggulan Platform:</h3>
                            
                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-question-circle text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">50,000+ Soal Premium</h4>
                                        <p class="text-blue-100 text-sm">Bank soal terlengkap dan terupdate</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-chart-line text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Analisis Real-time</h4>
                                        <p class="text-blue-100 text-sm">Performance tracking yang akurat</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center">
                                        <i class="fab fa-telegram text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Komunitas Eksklusif</h4>
                                        <p class="text-blue-100 text-sm">Grup Telegram untuk diskusi dan tips</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-trophy text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Success Rate 95%</h4>
                                        <p class="text-blue-100 text-sm">Alumni yang berhasil lulus seleksi ASN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="glass-card rounded-3xl p-8">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4 icon-glow shadow-2xl">
                                <i class="fas fa-sign-in-alt text-white text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-black gradient-text mb-2">Selamat Datang Kembali!</h3>
                            <p class="text-gray-600">Masuk untuk melanjutkan persiapan ASN terbaikmu</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                                <h4 class="text-lg font-bold gradient-text mb-4 flex items-center">
                                    <i class="fas fa-user-circle mr-3 text-blue-500"></i>
                                    Masuk ke Akun
                                </h4>
                                
                                <div class="space-y-4">
                                    <div>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                               placeholder="Email Address" 
                                               class="spectacular-input w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    
                                    <div>
                                        <input id="password" type="password" name="password" required 
                                               placeholder="Password" 
                                               class="spectacular-input w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="flex items-center">
                                        <input id="remember_me" type="checkbox" name="remember" 
                                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">
                                            Lupa password?
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" 
                                        class="btn-spectacular w-full text-white py-4 rounded-xl font-black text-lg transition-all duration-300">
                                    <i class="fas fa-rocket mr-2"></i>
                                    Masuk & Lanjut Tryout!
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="text-gray-600">
                                    Belum punya akun? 
                                    <a href="{{ route('register') }}" class="gradient-text font-bold hover:underline">
                                        Daftar gratis di sini
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
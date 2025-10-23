<!DOCTYPE html><!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head><head>

    <meta charset="utf-8">    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel') }} - Masuk ke Akun</title>    <title>{{ config('app.name', 'Laravel') }} - Masuk ke Akun</title>



    <!-- Fonts -->    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">



    <!-- Icons -->    <!-- Icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Scripts -->    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <style>    <style>

        /* Background Spectacular */        /* Background Spectacular */

        .auth-bg {        .auth-bg {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);

            min-height: 100vh;            min-height: 100vh;

            position: relative;            position: relative;

            overflow: hidden;            overflow: hidden;

            font-family: 'Inter', sans-serif;            font-family: 'Inter', sans-serif;

        }        }



        .auth-bg::before,        .auth-bg::before,

        .auth-bg::after {        .auth-bg::after {

            content: '';            content: '';

            position: absolute;            position: absolute;

            width: 300px;            width: 300px;

            height: 300px;            height: 300px;

            border-radius: 50%;            border-radius: 50%;

            background: rgba(255, 255, 255, 0.1);            background: rgba(255, 255, 255, 0.1);

            backdrop-filter: blur(5px);            backdrop-filter: blur(5px);

        }        }



        .auth-bg::before {        .auth-bg::before {

            top: -150px;            top: -150px;

            right: -150px;            right: -150px;

            animation: float 6s ease-in-out infinite;            animation: float 6s ease-in-out infinite;

        }        }



        .auth-bg::after {        .auth-bg::after {

            bottom: -150px;            bottom: -150px;

            left: -150px;            left: -150px;

            animation: float 8s ease-in-out infinite reverse;            animation: float 8s ease-in-out infinite reverse;

        }        }



        .glass-card {        .glass-card {

            background: rgba(255, 255, 255, 0.95);            background: rgba(255, 255, 255, 0.95);

            backdrop-filter: blur(20px);            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.3);            border: 1px solid rgba(255, 255, 255, 0.3);

            box-shadow:             box-shadow: 

                0 25px 50px -12px rgba(0, 0, 0, 0.25),                0 25px 50px -12px rgba(0, 0, 0, 0.25),

                0 0 0 1px rgba(255, 255, 255, 0.05),                0 0 0 1px rgba(255, 255, 255, 0.05),

                inset 0 1px 0 rgba(255, 255, 255, 0.1);                inset 0 1px 0 rgba(255, 255, 255, 0.1);

        }        }



        .brand-card {        .brand-card {

            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);

            backdrop-filter: blur(20px);            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.2);            border: 1px solid rgba(255, 255, 255, 0.2);

            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);

        }        }



        .spectacular-input {        .spectacular-input {

            background: rgba(255, 255, 255, 0.9);            background: rgba(255, 255, 255, 0.9);

            border: 2px solid rgba(102, 126, 234, 0.2);            border: 2px solid rgba(102, 126, 234, 0.2);

            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

            position: relative;            position: relative;

        }        }



        .spectacular-input:focus {        .spectacular-input:focus {

            border-color: #667eea;            border-color: #667eea;

            box-shadow:             box-shadow: 

                0 0 0 4px rgba(102, 126, 234, 0.1),                0 0 0 4px rgba(102, 126, 234, 0.1),

                0 10px 20px rgba(102, 126, 234, 0.1);                0 10px 20px rgba(102, 126, 234, 0.1);

            background: rgba(255, 255, 255, 1);            background: rgba(255, 255, 255, 1);

            transform: translateY(-1px);            transform: translateY(-1px);

        }        }



        .btn-spectacular {        .btn-spectacular {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);

            box-shadow:             box-shadow: 

                0 10px 20px rgba(102, 126, 234, 0.3),                0 10px 20px rgba(102, 126, 234, 0.3),

                0 0 0 1px rgba(255, 255, 255, 0.1) inset;                0 0 0 1px rgba(255, 255, 255, 0.1) inset;

            transition: all 0.3s ease;            transition: all 0.3s ease;

            position: relative;            position: relative;

            overflow: hidden;            overflow: hidden;

        }        }



        .btn-spectacular:hover {        .btn-spectacular:hover {

            transform: translateY(-2px);            transform: translateY(-2px);

            box-shadow:             box-shadow: 

                0 15px 30px rgba(102, 126, 234, 0.4),                0 15px 30px rgba(102, 126, 234, 0.4),

                0 0 0 1px rgba(255, 255, 255, 0.2) inset;                0 0 0 1px rgba(255, 255, 255, 0.2) inset;

        }        }



        .btn-spectacular::before {        .btn-spectacular::before {

            content: '';            content: '';

            position: absolute;            position: absolute;

            top: 0;            top: 0;

            left: -100%;            left: -100%;

            width: 100%;            width: 100%;

            height: 100%;            height: 100%;

            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);

            transition: left 0.5s;            transition: left 0.5s;

        }        }



        .btn-spectacular:hover::before {        .btn-spectacular:hover::before {

            left: 100%;            left: 100%;

        }        }



        .gradient-text {        .gradient-text {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);

            background-clip: text;            background-clip: text;

            -webkit-background-clip: text;            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;            -webkit-text-fill-color: transparent;

            font-weight: 900;            font-weight: 900;

        }        }



        .icon-glow {        .icon-glow {

            animation: iconGlow 3s ease-in-out infinite alternate;            animation: iconGlow 3s ease-in-out infinite alternate;

        }        }



        @keyframes iconGlow {        @keyframes iconGlow {

            from {            from {

                box-shadow:                 box-shadow: 

                    0 0 20px rgba(102, 126, 234, 0.6),                    0 0 20px rgba(102, 126, 234, 0.6),

                    0 0 40px rgba(102, 126, 234, 0.4),                    0 0 40px rgba(102, 126, 234, 0.4),

                    0 0 60px rgba(102, 126, 234, 0.2);                    0 0 60px rgba(102, 126, 234, 0.2);

            }            }

            to {            to {

                box-shadow:                 box-shadow: 

                    0 0 30px rgba(118, 75, 162, 0.8),                    0 0 30px rgba(118, 75, 162, 0.8),

                    0 0 60px rgba(118, 75, 162, 0.6),                    0 0 60px rgba(118, 75, 162, 0.6),

                    0 0 90px rgba(118, 75, 162, 0.4);                    0 0 90px rgba(118, 75, 162, 0.4);

            }            }

        }        }



        .feature-highlight {        .feature-highlight {

            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

            cursor: pointer;            cursor: pointer;

            position: relative;            position: relative;

        }        }



        .feature-highlight:hover {        .feature-highlight:hover {

            transform: translateX(8px);            transform: translateX(8px);

            background: rgba(255, 255, 255, 0.15);            background: rgba(255, 255, 255, 0.15);

            border-radius: 12px;            border-radius: 12px;

            padding: 12px;            padding: 12px;

        }        }



        .feature-highlight:hover::before {        .feature-highlight:hover::before {

            content: '';            content: '';

            position: absolute;            position: absolute;

            left: -8px;            left: -8px;

            top: 50%;            top: 50%;

            transform: translateY(-50%);            transform: translateY(-50%);

            width: 4px;            width: 4px;

            height: 60%;            height: 60%;

            background: linear-gradient(180deg, #667eea, #764ba2);            background: linear-gradient(180deg, #667eea, #764ba2);

            border-radius: 2px;            border-radius: 2px;

        }        }



        /* Floating Elements Animation */        /* Floating Elements Animation */

        @keyframes float {        @keyframes float {

            0%, 100% { transform: translateY(0px); }            0%, 100% { transform: translateY(0px); }

            50% { transform: translateY(-20px); }            50% { transform: translateY(-20px); }

        }        }



        /* Step Section Styles */        .input-modern:focus {

        .bg-gradient-to-r.from-blue-50.to-purple-50 {            border-color: #8338ec;

            background: linear-gradient(135deg,             box-shadow: 0 0 0 4px rgba(131, 56, 236, 0.1);

                rgba(239, 246, 255, 0.8) 0%,             background: rgba(255, 255, 255, 1);

                rgba(250, 245, 255, 0.8) 100%);        }

            border: 1px solid rgba(59, 130, 246, 0.2);

            transition: all 0.3s ease;        .btn-spectacular {

        }            background: linear-gradient(135deg, #8338ec 0%, #3a86ff 50%, #06ffa5 100%);

            box-shadow: 0 10px 30px rgba(131, 56, 236, 0.3);

        .bg-gradient-to-r.from-blue-50.to-purple-50:hover {            transition: all 0.3s ease;

            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.1);        }

            transform: translateY(-2px);

        }        .btn-spectacular:hover {

    </style>            transform: translateY(-2px);

</head>            box-shadow: 0 15px 40px rgba(131, 56, 236, 0.4);

<body class="auth-bg">        }

    <div class="min-h-screen flex items-center justify-center px-4 py-8">

        <div class="w-full max-w-6xl">        .floating-shapes {

            <div class="grid lg:grid-cols-5 gap-8 items-center">            position: absolute;

                            width: 100%;

                <!-- Left Side - Spectacular Branding -->            height: 100%;

                <div class="lg:col-span-2">            overflow: hidden;

                    <div class="brand-card rounded-3xl p-8 text-white">            pointer-events: none;

                        <!-- Logo & Brand -->        }

                        <div class="text-center mb-8">

                            <div class="w-20 h-20 bg-gradient-to-br from-white via-blue-100 to-purple-100 rounded-3xl flex items-center justify-center mx-auto mb-6 icon-glow shadow-2xl">        .shape {

                                <i class="fas fa-graduation-cap text-purple-600 text-3xl"></i>            position: absolute;

                            </div>            border-radius: 50%;

                            <h1 class="text-4xl font-black mb-3">            animation: floatUpDown 6s ease-in-out infinite;

                                <span class="text-white">TryOut</span>        }

                                <span class="text-yellow-300">ASN</span>

                            </h1>        @keyframes floatUpDown {

                            <p class="text-blue-100 text-lg font-medium">            0%, 100% { transform: translateY(0px) rotate(0deg); }

                                Platform Persiapan ASN Terdepan            50% { transform: translateY(-30px) rotate(180deg); }

                            </p>        }

                        </div>

        .stat-card {

                        <!-- Features Highlight -->            background: rgba(255, 255, 255, 0.1);

                        <div class="space-y-4">            backdrop-filter: blur(10px);

                            <h3 class="text-xl font-bold text-white mb-6">✨ Keunggulan Platform:</h3>            border: 1px solid rgba(255, 255, 255, 0.2);

                                    }

                            <div class="feature-highlight p-4 rounded-xl">    </style>

                                <div class="flex items-center space-x-4"></head>

                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center"><body class="font-inter antialiased">

                                        <i class="fas fa-question-circle text-white text-xl"></i>    <div class="min-h-screen hero-gradient flex items-center justify-center relative overflow-hidden">

                                    </div>        

                                    <div>        <!-- Floating Shapes -->

                                        <h4 class="font-bold text-white">50,000+ Soal Premium</h4>        <div class="floating-shapes">

                                        <p class="text-blue-100 text-sm">Bank soal terlengkap dan terupdate</p>            <div class="shape w-16 h-16 bg-pink-400/20 top-20 left-10" style="animation-delay: 0s;"></div>

                                    </div>            <div class="shape w-24 h-24 bg-purple-400/20 top-32 right-20" style="animation-delay: 1s;"></div>

                                </div>            <div class="shape w-12 h-12 bg-blue-400/20 bottom-40 left-16" style="animation-delay: 2s;"></div>

                            </div>            <div class="shape w-20 h-20 bg-green-400/20 top-1/2 right-1/3" style="animation-delay: 0.5s;"></div>

            <div class="shape w-14 h-14 bg-yellow-400/20 bottom-32 right-10" style="animation-delay: 1.5s;"></div>

                            <div class="feature-highlight p-4 rounded-xl">            <div class="shape w-18 h-18 bg-orange-400/20 top-16 left-1/2" style="animation-delay: 3s;"></div>

                                <div class="flex items-center space-x-4">        </div>

                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center">

                                        <i class="fas fa-chart-line text-white text-xl"></i>        <div class="max-w-5xl mx-auto px-4 relative z-10">

                                    </div>            <div class="grid lg:grid-cols-2 gap-8 items-center min-h-screen py-8">

                                    <div>                

                                        <h4 class="font-bold text-white">Analisis Real-time</h4>                <!-- Left Side - Welcome Back -->

                                        <p class="text-blue-100 text-sm">Performance tracking yang akurat</p>                <div class="text-white">

                                    </div>                    <!-- Logo -->

                                </div>                    <div class="flex items-center space-x-3 mb-6">

                            </div>                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 via-purple-600 to-blue-600 rounded-xl flex items-center justify-center shadow-xl">

                            <i class="fas fa-graduation-cap text-white text-xl"></i>

                            <div class="feature-highlight p-4 rounded-xl">                        </div>

                                <div class="flex items-center space-x-4">                        <div>

                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center">                            <h1 class="text-2xl font-black bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">

                                        <i class="fab fa-telegram text-white text-xl"></i>                                TryOut ASNku

                                    </div>                            </h1>

                                    <div>                            <p class="text-blue-200 text-sm">Platform #1 Persiapan ASN Indonesia</p>

                                        <h4 class="font-bold text-white">Komunitas Eksklusif</h4>                        </div>

                                        <p class="text-blue-100 text-sm">Grup Telegram untuk diskusi dan tips</p>                    </div>

                                    </div>

                                </div>                    <h2 class="text-3xl md:text-4xl font-black mb-4 leading-tight">

                            </div>                        Selamat Datang 

                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">Kembali!</span>

                            <div class="feature-highlight p-4 rounded-xl">                    </h2>

                                <div class="flex items-center space-x-4">

                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center">                    <p class="text-lg text-blue-100 mb-6 leading-relaxed">

                                        <i class="fas fa-trophy text-white text-xl"></i>                        Lanjutkan perjalanan menuju <strong class="text-yellow-300">ASN impian</strong> dengan 

                                    </div>                        tools dan materi terlengkap.

                                    <div>                    </p>

                                        <h4 class="font-bold text-white">Success Rate 95%</h4>

                                        <p class="text-blue-100 text-sm">Alumni yang berhasil lulus seleksi ASN</p>                    <!-- Statistics -->

                                    </div>                    <div class="grid grid-cols-2 gap-3 mb-6">

                                </div>                        <div class="stat-card rounded-xl p-4 text-center">

                            </div>                            <h3 class="text-2xl font-black text-white mb-1">1,234</h3>

                        </div>                            <p class="text-blue-200 text-xs">Member Aktif</p>

                    </div>                        </div>

                </div>                        <div class="stat-card rounded-xl p-4 text-center">

                            <h3 class="text-2xl font-black text-yellow-300 mb-1">89%</h3>

                <!-- Right Side - Spectacular Login Form -->                            <p class="text-blue-200 text-xs">Success Rate</p>

                <div class="lg:col-span-3">                        </div>

                    <div class="glass-card rounded-3xl p-8">                    </div>

                        <!-- Header Spectacular -->

                        <div class="text-center mb-8">                    <!-- Recent Updates -->

                            <div class="w-16 h-16 bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4 icon-glow shadow-2xl">                    <div class="space-y-2">

                                <i class="fas fa-sign-in-alt text-white text-2xl"></i>                        <div class="flex items-center space-x-2">

                            </div>                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>

                            <h3 class="text-3xl font-black gradient-text mb-2">                            <span class="text-blue-100 text-xs">Update: Bank soal CPNS 2024 terbaru</span>

                                Selamat Datang Kembali!                        </div>

                            </h3>                        <div class="flex items-center space-x-2">

                            <p class="text-gray-600">Masuk untuk melanjutkan persiapan ASN terbaikmu</p>                            <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>

                        </div>                            <span class="text-blue-100 text-xs">Fitur: Analisis prediksi kelulusan</span>

                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">                    </div>

                            @csrf                </div>



                            <!-- Session Status -->                <!-- Right Side - Login Form -->

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="glass-card rounded-2xl neon-glow p-6 max-w-md w-full">

                            <!-- Login Section -->                    <!-- Session Status -->

                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                <h4 class="text-lg font-bold gradient-text mb-4 flex items-center">

                                    <i class="fas fa-user-circle mr-3 text-blue-500"></i>                    <div class="text-center mb-6">

                                    Masuk ke Akun                        <h3 class="text-2xl font-black bg-gradient-to-r from-purple-600 via-blue-600 to-green-500 bg-clip-text text-transparent mb-2">

                                </h4>                            Masuk ke Akun

                                                        </h3>

                                <div class="space-y-4">                        <p class="text-gray-600 text-sm">Akses semua fitur premium dan lanjutkan progres</p>

                                    <div>                    </div>

                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 

                                               placeholder="Email Address"                     <form method="POST" action="{{ route('login') }}" class="space-y-4">

                                               class="spectacular-input w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">                        @csrf

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>                        <!-- Email -->

                                                            <div>

                                    <div>                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 

                                        <input id="password" type="password" name="password" required                                    placeholder="Email Address" 

                                               placeholder="Password"                                    class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">

                                               class="spectacular-input w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />                        </div>

                                    </div>

                                </div>                        <!-- Password -->

                            </div>                        <div>

                            <input id="password" type="password" name="password" required 

                            <!-- Options & Submit -->                                   placeholder="Password" 

                            <div class="space-y-4">                                   class="input-modern w-full px-3 py-2.5 rounded-lg focus:outline-none text-gray-900 placeholder-gray-500 text-sm">

                                <div class="flex items-center justify-between">                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />

                                    <label for="remember_me" class="flex items-center">                        </div>

                                        <input id="remember_me" type="checkbox" name="remember" 

                                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">                        <!-- Remember Me & Forgot Password -->

                                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>                        <div class="flex items-center justify-between text-xs">

                                    </label>                            <label for="remember_me" class="inline-flex items-center">

                                <input id="remember_me" type="checkbox" name="remember" 

                                    @if (Route::has('password.request'))                                       class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500 w-3 h-3">

                                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">                                <span class="ml-2 text-gray-600">Ingat saya</span>

                                            Lupa password?                            </label>

                                        </a>

                                    @endif                            @if (Route::has('password.request'))

                                </div>                                <a href="{{ route('password.request') }}" class="text-purple-600 hover:text-purple-800 font-semibold">

                                    Lupa password?

                                <button type="submit"                                 </a>

                                        class="btn-spectacular w-full text-white py-4 rounded-xl font-black text-lg transition-all duration-300">                            @endif

                                    <i class="fas fa-rocket mr-2"></i>                        </div>

                                    Masuk & Lanjut Tryout!

                                </button>                        <!-- Login Button -->

                            </div>                        <button type="submit" 

                                class="btn-spectacular w-full text-white py-3 rounded-lg font-black text-sm transition-all duration-300">

                            <!-- Register Link -->                            <i class="fas fa-sign-in-alt mr-2"></i>

                            <div class="text-center">                            Masuk ke Dashboard

                                <p class="text-gray-600">                        </button>

                                    Belum punya akun? 

                                    <a href="{{ route('register') }}" class="gradient-text font-bold hover:underline">                        <!-- Quick Stats -->

                                        Daftar gratis di sini                        <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl p-3 mt-4">

                                    </a>                            <div class="grid grid-cols-3 gap-2 text-center">

                                </p>                                <div>

                            </div>                                    <h4 class="text-sm font-black text-purple-600">1.2K+</h4>

                        </form>                                    <p class="text-xs text-gray-600">Members</p>

                    </div>                                </div>

                </div>                                <div>

                                    <h4 class="text-sm font-black text-blue-600">89%</h4>

            </div>                                    <p class="text-xs text-gray-600">Success</p>

        </div>                                </div>

    </div>                                <div>

</body>                                    <h4 class="text-sm font-black text-green-600">50K+</h4>

</html>                                    <p class="text-xs text-gray-600">Soal</p>
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

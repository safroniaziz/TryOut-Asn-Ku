<!DOCTYPE html><!DOCTYPE html><!DOCTYPE html><!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1"><head><html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }} - Masuk</title>

    <meta name="viewport" content="width=device-width, initial-scale=1"><head><head>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">    <meta charset="utf-8">    <meta charset="utf-8">



    <!-- Icons -->    <title>{{ config('app.name', 'Laravel') }} - Masuk</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])    <!-- Fonts -->



    <style>    <link rel="preconnect" href="https://fonts.googleapis.com">    <meta name="csrf-token" content="{{ csrf_token() }}">    <meta name="csrf-token" content="{{ csrf_token() }}">

        body {

            font-family: 'Inter', sans-serif;    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        }

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        .auth-container {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

            min-height: 100vh;

        }    <!-- Icons -->    <title>{{ config('app.name', 'Laravel') }} - Masuk</title>    <title>{{ config('app.name', 'Laravel') }} - Masuk</title>



        .glass-effect {    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

            background: rgba(255, 255, 255, 0.95);

            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.2);

            border-radius: 20px;    <!-- Scripts -->

            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);

        }    @vite(['resources/css/app.css', 'resources/js/app.js'])    <!-- Fonts -->    <!-- Fonts -->



        .brand-card {

            background: rgba(255, 255, 255, 0.1);

            backdrop-filter: blur(20px);    <style>    <link rel="preconnect" href="https://fonts.googleapis.com">    <link rel="preconnect" href="https://fonts.googleapis.com">

            border: 1px solid rgba(255, 255, 255, 0.2);

            border-radius: 20px;        body {

        }

            font-family: 'Inter', sans-serif;    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        .input-field {

            border: 2px solid #e5e7eb;        }

            border-radius: 12px;

            transition: all 0.3s ease;    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

        }

        .auth-bg {

        .input-field:focus {

            outline: none;            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

            border-color: #667eea;

            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);            position: relative;

        }

            min-height: 100vh;    <!-- Icons -->    <!-- Icons -->

        .btn-primary {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);        }

            border: none;

            border-radius: 12px;            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

            transition: all 0.3s ease;

        }        .auth-bg::before {



        .btn-primary:hover {            content: '';

            transform: translateY(-1px);

            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);            position: absolute;

        }

            top: 0;    <!-- Scripts -->    <!-- Scripts -->

        .text-gradient {

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);            left: 0;

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;            right: 0;    @vite(['resources/css/app.css', 'resources/js/app.js'])    @vite(['resources/css/app.css', 'resources/js/app.js'])

            background-clip: text;

        }            bottom: 0;

    </style>

</head>            background-image: 

<body class="auth-container">

    <div class="min-h-screen flex items-center justify-center p-6">                radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),

        <div class="max-w-6xl w-full">

            <div class="grid lg:grid-cols-2 gap-8 items-center">                radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);    <style>    <style>

                

                <!-- Left Side - Branding -->            animation: subtle-float 8s ease-in-out infinite alternate;

                <div class="text-white">

                    <div class="brand-card p-8">        }        body {        * {

                        <div class="text-center mb-8">

                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4">

                                <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>

                            </div>        @keyframes subtle-float {            font-family: 'Inter', sans-serif;            margin: 0;

                            <h1 class="text-4xl font-bold mb-2">TryOut ASNku</h1>

                            <p class="text-blue-200">Platform Persiapan ASN Terdepan</p>            0%, 100% { transform: translateY(0px); }

                        </div>

            50% { transform: translateY(-10px); }        }            padding: 0;

                        <div class="text-center mb-8">

                            <h2 class="text-2xl font-bold mb-4">Selamat Datang Kembali!</h2>        }

                            <p class="text-blue-100">

                                Lanjutkan persiapan ASN terbaikmu bersama             box-sizing: border-box;

                                <span class="text-yellow-300 font-bold">10,000+</span> 

                                peserta sukses lainnya.        .glass-card {

                            </p>

                        </div>            background: rgba(255, 255, 255, 0.95);        .auth-bg {        }



                        <div class="space-y-4">            backdrop-filter: blur(25px);

                            <div class="flex items-center space-x-4 p-4 rounded-xl bg-white/10">

                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">            border: 1px solid rgba(255, 255, 255, 0.3);            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

                                    <i class="fas fa-database text-white"></i>

                                </div>            box-shadow: 

                                <div>

                                    <h4 class="font-semibold">50,000+ Soal Premium</h4>                0 25px 50px -12px rgba(0, 0, 0, 0.25),            position: relative;        body {

                                    <p class="text-sm text-blue-200">Bank soal terlengkap</p>

                                </div>                0 0 0 1px rgba(255, 255, 255, 0.05),

                            </div>

                                            inset 0 1px 0 rgba(255, 255, 255, 0.1);            min-height: 100vh;            font-family: 'Inter', sans-serif;

                            <div class="flex items-center space-x-4 p-4 rounded-xl bg-white/10">

                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">            border-radius: 24px;

                                    <i class="fas fa-chart-line text-white"></i>

                                </div>        }        }            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

                                <div>

                                    <h4 class="font-semibold">Analisis Mendalam</h4>

                                    <p class="text-sm text-blue-200">Tracking performa</p>

                                </div>        .brand-card {                    min-height: 100vh;

                            </div>

                                        background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.05) 100%);

                            <div class="flex items-center space-x-4 p-4 rounded-xl bg-white/10">

                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">            backdrop-filter: blur(25px);        .auth-bg::before {            position: relative;

                                    <i class="fas fa-users text-white"></i>

                                </div>            border: 1px solid rgba(255, 255, 255, 0.2);

                                <div>

                                    <h4 class="font-semibold">Komunitas Elite</h4>            box-shadow:             content: '';        }

                                    <p class="text-sm text-blue-200">Networking eksklusif</p>

                                </div>                0 25px 50px -12px rgba(0, 0, 0, 0.15),

                            </div>

                        </div>                inset 0 1px 0 rgba(255, 255, 255, 0.1);            position: absolute;

                    </div>

                </div>            border-radius: 24px;



                <!-- Right Side - Login Form -->        }            top: 0;        /* Premium Background */

                <div>

                    <div class="glass-effect p-8 max-w-md mx-auto">

                        <div class="text-center mb-8">

                            <h3 class="text-3xl font-bold text-gradient mb-2">Masuk Akun</h3>        .premium-input {            left: 0;        body::before {

                            <p class="text-gray-600">Silakan masuk untuk melanjutkan</p>

                        </div>            background: rgba(255, 255, 255, 0.95);



                        <x-auth-session-status class="mb-4" :status="session('status')" />            border: 2px solid rgba(102, 126, 234, 0.15);            right: 0;            content: '';



                        <form method="POST" action="{{ route('login') }}" class="space-y-6">            border-radius: 16px;

                            @csrf

            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);            bottom: 0;            position: absolute;

                            <div>

                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">            font-family: 'Inter', sans-serif;

                                    Email Address

                                </label>        }            background-image:             top: 0;

                                <input id="email" 

                                       type="email" 

                                       name="email" 

                                       value="{{ old('email') }}"         .premium-input:focus {                radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),            left: 0;

                                       required 

                                       autofocus             outline: none;

                                       autocomplete="username"

                                       placeholder="Masukkan email Anda"             border-color: #667eea;                radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);            right: 0;

                                       class="input-field w-full px-4 py-3 text-gray-900">

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />            background: rgba(255, 255, 255, 1);

                            </div>

            box-shadow:             animation: subtle-float 8s ease-in-out infinite alternate;            bottom: 0;

                            <div>

                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">                0 0 0 4px rgba(102, 126, 234, 0.1),

                                    Password

                                </label>                0 10px 25px rgba(102, 126, 234, 0.15);        }            background-image: 

                                <input id="password" 

                                       type="password"             transform: translateY(-2px);

                                       name="password" 

                                       required         }                radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),

                                       autocomplete="current-password"

                                       placeholder="Masukkan password Anda" 

                                       class="input-field w-full px-4 py-3 text-gray-900">

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />        .premium-btn {        @keyframes subtle-float {                radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);

                            </div>

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

                            <div class="flex items-center justify-between">

                                <label for="remember_me" class="flex items-center">            border: none;            0%, 100% { transform: translateY(0px); }            animation: float 6s ease-in-out infinite;

                                    <input id="remember_me" 

                                           type="checkbox"             border-radius: 16px;

                                           name="remember" 

                                           class="w-4 h-4 text-blue-600 border-gray-300 rounded">            color: white;            50% { transform: translateY(-10px); }        }

                                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>

                                </label>            font-family: 'Space Grotesk', sans-serif;



                                @if (Route::has('password.request'))            font-weight: 600;        }

                                    <a href="{{ route('password.request') }}" 

                                       class="text-sm text-blue-600 hover:text-blue-800">            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

                                        Lupa password?

                                    </a>            position: relative;        @keyframes float {

                                @endif

                            </div>            overflow: hidden;



                            <button type="submit"         }        .glass-card {            0%, 100% { transform: translateY(0px); }

                                    class="btn-primary w-full py-3 text-white font-semibold">

                                <i class="fas fa-sign-in-alt mr-2"></i>

                                Masuk Sekarang

                            </button>        .premium-btn::before {            background: rgba(255, 255, 255, 0.95);            50% { transform: translateY(-20px); }



                            <div class="text-center pt-4 border-t border-gray-200">            content: '';

                                <p class="text-gray-600">

                                    Belum punya akun?             position: absolute;            backdrop-filter: blur(25px);        }

                                    <a href="{{ route('register') }}" class="text-gradient font-semibold">

                                        Daftar gratis di sini            top: 0;

                                    </a>

                                </p>            left: -100%;            border: 1px solid rgba(255, 255, 255, 0.3);

                            </div>

                        </form>            width: 100%;

                    </div>

                </div>            height: 100%;            box-shadow:         /* Premium Glass Card */

            </div>

        </div>            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);

    </div>

</body>            transition: left 0.6s;                0 25px 50px -12px rgba(0, 0, 0, 0.25),        .glass-card {

</html>
        }

                0 0 0 1px rgba(255, 255, 255, 0.05),            background: rgba(255, 255, 255, 0.95);

        .premium-btn:hover {

            transform: translateY(-2px);                inset 0 1px 0 rgba(255, 255, 255, 0.1);            backdrop-filter: blur(20px);

            box-shadow: 

                0 15px 35px rgba(102, 126, 234, 0.4),            border-radius: 24px;            border: 1px solid rgba(255, 255, 255, 0.3);

                0 5px 15px rgba(0, 0, 0, 0.1);

        }        }            border-radius: 24px;



        .premium-btn:hover::before {            box-shadow: 

            left: 100%;

        }        .brand-card {                0 25px 50px -12px rgba(0, 0, 0, 0.25),



        .gradient-text {            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.05) 100%);                0 0 0 1px rgba(255, 255, 255, 0.05),

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

            background-clip: text;            backdrop-filter: blur(25px);                inset 0 1px 0 rgba(255, 255, 255, 0.1);

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;            border: 1px solid rgba(255, 255, 255, 0.2);            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

            font-weight: 800;

        }            box-shadow:         }



        .icon-premium {                0 25px 50px -12px rgba(0, 0, 0, 0.15),

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

            box-shadow:                 inset 0 1px 0 rgba(255, 255, 255, 0.1);        .glass-card:hover {

                0 10px 25px rgba(102, 126, 234, 0.3),

                0 0 0 1px rgba(255, 255, 255, 0.1) inset;            border-radius: 24px;            transform: translateY(-5px);

            animation: premium-glow 3s ease-in-out infinite alternate;

        }        }            box-shadow: 



        @keyframes premium-glow {                0 35px 70px -12px rgba(0, 0, 0, 0.3),

            from {

                box-shadow:         .premium-input {                0 0 0 1px rgba(255, 255, 255, 0.1),

                    0 10px 25px rgba(102, 126, 234, 0.3),

                    0 0 0 1px rgba(255, 255, 255, 0.1) inset;            background: rgba(255, 255, 255, 0.95);                inset 0 1px 0 rgba(255, 255, 255, 0.2);

            }

            to {            border: 2px solid rgba(102, 126, 234, 0.15);        }

                box-shadow: 

                    0 15px 35px rgba(102, 126, 234, 0.5),            border-radius: 16px;

                    0 0 0 1px rgba(255, 255, 255, 0.2) inset;

            }            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);        /* Elegant Inputs */

        }

            font-family: 'Inter', sans-serif;        .premium-input {

        .feature-card {

            background: rgba(255, 255, 255, 0.1);        }            background: rgba(255, 255, 255, 0.9);

            border: 1px solid rgba(255, 255, 255, 0.2);

            border-radius: 16px;            border: 2px solid rgba(102, 126, 234, 0.2);

            backdrop-filter: blur(10px);

            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);        .premium-input:focus {            border-radius: 16px;

        }

            outline: none;            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

        .feature-card:hover {

            background: rgba(255, 255, 255, 0.15);            border-color: #667eea;            font-family: 'Inter', sans-serif;

            transform: translateY(-4px);

            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);            background: rgba(255, 255, 255, 1);            font-weight: 500;

        }

            box-shadow:         }

        .stats-number {

            font-family: 'Space Grotesk', sans-serif;                0 0 0 4px rgba(102, 126, 234, 0.1),

            font-weight: 700;

            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);                0 10px 25px rgba(102, 126, 234, 0.15);        .premium-input:focus {

            background-clip: text;

            -webkit-background-clip: text;            transform: translateY(-2px);            outline: none;

            -webkit-text-fill-color: transparent;

        }        }            border-color: #667eea;



        .floating-element {            background: rgba(255, 255, 255, 1);

            position: absolute;

            border-radius: 50%;        .premium-btn {            box-shadow: 

            background: rgba(255, 255, 255, 0.1);

            animation: float-gentle 6s ease-in-out infinite;            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);                0 0 0 4px rgba(102, 126, 234, 0.1),

        }

            border: none;                0 10px 20px rgba(102, 126, 234, 0.15);

        @keyframes float-gentle {

            0%, 100% { transform: translateY(0px) rotate(0deg); }            border-radius: 16px;            transform: translateY(-2px);

            50% { transform: translateY(-15px) rotate(180deg); }

        }            color: white;        }



        /* Responsive */            font-family: 'Space Grotesk', sans-serif;

        @media (max-width: 768px) {

            .auth-bg {            font-weight: 600;        .premium-input::placeholder {

                padding: 1rem;

            }            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);            color: rgba(107, 114, 128, 0.7);

            

            .glass-card, .brand-card {            position: relative;            font-weight: 400;

                border-radius: 20px;

                padding: 1.5rem;            overflow: hidden;        }

            }

                    }

            .premium-input {

                border-radius: 12px;        /* Spectacular Button */

            }

                    .premium-btn::before {        .btn-spectacular {

            .premium-btn {

                border-radius: 12px;            content: '';            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);

            }

        }            position: absolute;            border: none;

    </style>

</head>            top: 0;            border-radius: 16px;

<body class="auth-bg">

    <!-- Floating Elements -->            left: -100%;            color: white;

    <div class="absolute inset-0 overflow-hidden pointer-events-none">

        <div class="floating-element w-20 h-20 top-20 left-10" style="animation-delay: 0s;"></div>            width: 100%;            font-family: 'Sora', sans-serif;

        <div class="floating-element w-32 h-32 top-40 right-20" style="animation-delay: 1s;"></div>

        <div class="floating-element w-16 h-16 bottom-40 left-20" style="animation-delay: 2s;"></div>            height: 100%;            font-weight: 700;

        <div class="floating-element w-24 h-24 top-60 left-1/3" style="animation-delay: 0.5s;"></div>

        <div class="floating-element w-28 h-28 bottom-60 right-1/4" style="animation-delay: 1.5s;"></div>            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

    </div>

            transition: left 0.6s;            position: relative;

    <div class="min-h-screen flex items-center justify-center p-6 relative z-10">

        <div class="max-w-6xl w-full">        }            overflow: hidden;

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                            box-shadow: 

                <!-- Left Side - Branding & Info -->

                <div class="text-white">        .premium-btn:hover {                0 10px 20px rgba(102, 126, 234, 0.3),

                    <div class="brand-card p-8">

                        <!-- Logo & Brand -->            transform: translateY(-2px);                0 0 0 1px rgba(255, 255, 255, 0.1) inset;

                        <div class="text-center mb-8">

                            <div class="w-20 h-20 icon-premium rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-2xl">            box-shadow:         }

                                <i class="fas fa-graduation-cap text-white text-3xl"></i>

                            </div>                0 15px 35px rgba(102, 126, 234, 0.4),

                            <h1 class="text-4xl font-black mb-3 text-white">

                                TryOut ASNku                0 5px 15px rgba(0, 0, 0, 0.1);        .btn-spectacular::before {

                            </h1>

                            <p class="text-blue-200 text-lg font-medium">Platform Persiapan ASN Terdepan</p>        }            content: '';

                        </div>

            position: absolute;

                        <!-- Welcome Message -->

                        <div class="text-center mb-8">        .premium-btn:hover::before {            top: 0;

                            <h2 class="text-2xl md:text-3xl font-bold mb-4 leading-tight text-white">

                                Selamat Datang Kembali!            left: 100%;            left: -100%;

                            </h2>

                            <p class="text-blue-100 text-lg leading-relaxed">        }            width: 100%;

                                Lanjutkan persiapan ASN terbaikmu bersama 

                                <span class="stats-number text-2xl">10,000+</span>             height: 100%;

                                peserta sukses lainnya.

                            </p>        .gradient-text {            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);

                        </div>

            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);            transition: left 0.5s;

                        <!-- Key Features -->

                        <div class="space-y-4">            background-clip: text;        }

                            <div class="feature-card p-4">

                                <div class="flex items-center space-x-4">            -webkit-background-clip: text;

                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">

                                        <i class="fas fa-database text-white text-lg"></i>            -webkit-text-fill-color: transparent;        .btn-spectacular:hover {

                                    </div>

                                    <div>            font-weight: 800;            transform: translateY(-3px) scale(1.02);

                                        <h4 class="font-bold text-white text-lg">50,000+ Soal Premium</h4>

                                        <p class="text-blue-200">Bank soal terlengkap & terupdate</p>        }            box-shadow: 

                                    </div>

                                </div>                0 20px 40px rgba(102, 126, 234, 0.4),

                            </div>

                                    .icon-premium {                0 0 0 1px rgba(255, 255, 255, 0.2) inset;

                            <div class="feature-card p-4">

                                <div class="flex items-center space-x-4">            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);        }

                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">

                                        <i class="fas fa-chart-line text-white text-lg"></i>            box-shadow: 

                                    </div>

                                    <div>                0 10px 25px rgba(102, 126, 234, 0.3),        .btn-spectacular:hover::before {

                                        <h4 class="font-bold text-white text-lg">Analisis Mendalam</h4>

                                        <p class="text-blue-200">Tracking performa real-time</p>                0 0 0 1px rgba(255, 255, 255, 0.1) inset;            left: 100%;

                                    </div>

                                </div>            animation: premium-glow 3s ease-in-out infinite alternate;        }

                            </div>

                                    }

                            <div class="feature-card p-4">

                                <div class="flex items-center space-x-4">        .btn-spectacular:active {

                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">

                                        <i class="fas fa-users text-white text-lg"></i>        @keyframes premium-glow {            transform: translateY(-1px) scale(1.01);

                                    </div>

                                    <div>            from {        }

                                        <h4 class="font-bold text-white text-lg">Komunitas Elite</h4>

                                        <p class="text-blue-200">Networking & mentoring eksklusif</p>                box-shadow: 

                                    </div>

                                </div>                    0 10px 25px rgba(102, 126, 234, 0.3),        /* Elegant Text */

                            </div>

                        </div>                    0 0 0 1px rgba(255, 255, 255, 0.1) inset;        .gradient-text {



                        <!-- Success Stats -->            }            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);

                        <div class="mt-8 pt-6 border-t border-white/20">

                            <div class="grid grid-cols-3 gap-4 text-center">            to {            background-clip: text;

                                <div>

                                    <div class="stats-number text-2xl mb-1">95%</div>                box-shadow:             -webkit-background-clip: text;

                                    <p class="text-blue-200 text-sm">Success Rate</p>

                                </div>                    0 15px 35px rgba(102, 126, 234, 0.5),            -webkit-text-fill-color: transparent;

                                <div>

                                    <div class="stats-number text-2xl mb-1">10K+</div>                    0 0 0 1px rgba(255, 255, 255, 0.2) inset;            font-family: 'Sora', sans-serif;

                                    <p class="text-blue-200 text-sm">Alumni</p>

                                </div>            }            font-weight: 800;

                                <div>

                                    <div class="stats-number text-2xl mb-1">4.9★</div>        }        }

                                    <p class="text-blue-200 text-sm">Rating</p>

                                </div>

                            </div>

                        </div>        .feature-card {        /* Brand Card */

                    </div>

                </div>            background: rgba(255, 255, 255, 0.1);        .brand-card {



                <!-- Right Side - Login Form -->            border: 1px solid rgba(255, 255, 255, 0.2);            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);

                <div class="w-full">

                    <div class="glass-card p-8 max-w-md mx-auto">            border-radius: 16px;            backdrop-filter: blur(20px);

                        <!-- Form Header -->

                        <div class="text-center mb-8">            backdrop-filter: blur(10px);            border: 1px solid rgba(255, 255, 255, 0.2);

                            <div class="w-16 h-16 icon-premium rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">

                                <i class="fas fa-sign-in-alt text-white text-2xl"></i>            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);            border-radius: 24px;

                            </div>

                            <h3 class="text-3xl font-black gradient-text mb-2">        }            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);

                                Masuk Akun

                            </h3>            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

                            <p class="text-gray-600 text-lg">Silakan masuk untuk melanjutkan</p>

                        </div>        .feature-card:hover {        }



                        <!-- Session Status -->            background: rgba(255, 255, 255, 0.15);

                        <x-auth-session-status class="mb-4" :status="session('status')" />

            transform: translateY(-4px);        .brand-card:hover {

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">

                            @csrf            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);            transform: translateY(-3px);



                            <!-- Email -->        }            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);

                            <div>

                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">        }

                                    Email Address

                                </label>        .stats-number {

                                <input id="email" 

                                       type="email"             font-family: 'Space Grotesk', sans-serif;        /* Icon Glow */

                                       name="email" 

                                       value="{{ old('email') }}"             font-weight: 700;        .icon-elegant {

                                       required 

                                       autofocus             background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

                                       autocomplete="username"

                                       placeholder="Masukkan email Anda"             background-clip: text;            filter: drop-shadow(0 4px 8px rgba(102, 126, 234, 0.3));

                                       class="premium-input w-full px-4 py-3 text-gray-900 placeholder-gray-500">

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />            -webkit-background-clip: text;        }

                            </div>

            -webkit-text-fill-color: transparent;

                            <!-- Password -->

                            <div>        }        .icon-elegant:hover {

                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">

                                    Password            transform: scale(1.1);

                                </label>

                                <input id="password"         .floating-element {            filter: drop-shadow(0 8px 16px rgba(102, 126, 234, 0.4));

                                       type="password" 

                                       name="password"             position: absolute;        }

                                       required 

                                       autocomplete="current-password"            border-radius: 50%;

                                       placeholder="Masukkan password Anda" 

                                       class="premium-input w-full px-4 py-3 text-gray-900 placeholder-gray-500">            background: rgba(255, 255, 255, 0.1);        /* Feature Cards */

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>            animation: float-gentle 6s ease-in-out infinite;        .feature-card {



                            <!-- Remember Me -->        }            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.1) 100%);

                            <div class="flex items-center justify-between">

                                <label for="remember_me" class="flex items-center">            border: 1px solid rgba(255, 255, 255, 0.2);

                                    <input id="remember_me" 

                                           type="checkbox"         @keyframes float-gentle {            border-radius: 20px;

                                           name="remember" 

                                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">            0%, 100% { transform: translateY(0px) rotate(0deg); }            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

                                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>

                                </label>            50% { transform: translateY(-15px) rotate(180deg); }            backdrop-filter: blur(10px);



                                @if (Route::has('password.request'))        }        }

                                    <a href="{{ route('password.request') }}" 

                                       class="text-sm text-blue-600 hover:text-blue-800 font-semibold">

                                        Lupa password?

                                    </a>        /* Responsive */        .feature-card:hover {

                                @endif

                            </div>        @media (max-width: 768px) {            transform: translateX(8px) translateY(-2px);



                            <!-- Login Button -->            .auth-bg {            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.15) 100%);

                            <button type="submit" 

                                    class="premium-btn w-full py-3 px-6 text-white font-semibold text-lg">                padding: 1rem;            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);

                                <i class="fas fa-sign-in-alt mr-2"></i>

                                Masuk Sekarang            }        }

                            </button>

            

                            <!-- Register Link -->

                            <div class="text-center pt-4 border-t border-gray-200">            .glass-card, .brand-card {        /* Link Styles */

                                <p class="text-gray-600">

                                    Belum punya akun?                 border-radius: 20px;        .link-elegant {

                                    <a href="{{ route('register') }}" 

                                       class="gradient-text font-bold hover:underline">                padding: 1.5rem;            color: #667eea;

                                        Daftar gratis di sini

                                    </a>            }            font-weight: 600;

                                </p>

                            </div>                        text-decoration: none;

                        </form>

                    </div>            .premium-input {            transition: all 0.3s ease;

                </div>

            </div>                border-radius: 12px;            position: relative;

        </div>

    </div>            }        }

</body>

</html>            

            .premium-btn {        .link-elegant::after {

                border-radius: 12px;            content: '';

            }            position: absolute;

        }            width: 0;

    </style>            height: 2px;

</head>            bottom: -2px;

<body class="auth-bg">            left: 0;

    <!-- Floating Elements -->            background: linear-gradient(135deg, #667eea, #764ba2);

    <div class="absolute inset-0 overflow-hidden pointer-events-none">            transition: width 0.3s ease;

        <div class="floating-element w-20 h-20 top-20 left-10" style="animation-delay: 0s;"></div>        }

        <div class="floating-element w-32 h-32 top-40 right-20" style="animation-delay: 1s;"></div>

        <div class="floating-element w-16 h-16 bottom-40 left-20" style="animation-delay: 2s;"></div>        .link-elegant:hover::after {

        <div class="floating-element w-24 h-24 top-60 left-1/3" style="animation-delay: 0.5s;"></div>            width: 100%;

        <div class="floating-element w-28 h-28 bottom-60 right-1/4" style="animation-delay: 1.5s;"></div>        }

    </div>

        .link-elegant:hover {

    <div class="min-h-screen flex items-center justify-center p-6 relative z-10">            color: #764ba2;

        <div class="max-w-6xl w-full">        }

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                        /* Responsive Design */

                <!-- Left Side - Branding & Info -->        @media (max-width: 768px) {

                <div class="text-white">            .glass-card {

                    <div class="brand-card p-8">                margin: 1rem;

                        <!-- Logo & Brand -->                padding: 2rem 1.5rem;

                        <div class="text-center mb-8">            }

                            <div class="w-20 h-20 icon-premium rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-2xl">            

                                <i class="fas fa-graduation-cap text-white text-3xl"></i>            .brand-card {

                            </div>                margin-bottom: 2rem;

                            <h1 class="text-4xl font-black mb-3 text-white">            }

                                TryOut ASNku        }

                            </h1>

                            <p class="text-blue-200 text-lg font-medium">Platform Persiapan ASN Terdepan</p>        /* Subtle Animations */

                        </div>        .fade-in {

            animation: fadeIn 0.8s ease-out;

                        <!-- Welcome Message -->        }

                        <div class="text-center mb-8">

                            <h2 class="text-2xl md:text-3xl font-bold mb-4 leading-tight text-white">        @keyframes fadeIn {

                                Selamat Datang Kembali!            from {

                            </h2>                opacity: 0;

                            <p class="text-blue-100 text-lg leading-relaxed">                transform: translateY(20px);

                                Lanjutkan persiapan ASN terbaikmu bersama             }

                                <span class="stats-number text-2xl">10,000+</span>             to {

                                peserta sukses lainnya.                opacity: 1;

                            </p>                transform: translateY(0);

                        </div>            }

        }

                        <!-- Key Features -->

                        <div class="space-y-4">        .slide-in {

                            <div class="feature-card p-4">            animation: slideIn 0.6s ease-out;

                                <div class="flex items-center space-x-4">        }

                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">

                                        <i class="fas fa-database text-white text-lg"></i>        @keyframes slideIn {

                                    </div>            from {

                                    <div>                opacity: 0;

                                        <h4 class="font-bold text-white text-lg">50,000+ Soal Premium</h4>                transform: translateX(-20px);

                                        <p class="text-blue-200">Bank soal terlengkap & terupdate</p>            }

                                    </div>            to {

                                </div>                opacity: 1;

                            </div>                transform: translateX(0);

                                        }

                            <div class="feature-card p-4">    </style>

                                <div class="flex items-center space-x-4"></head>

                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg"><body class="antialiased">

                                        <i class="fas fa-chart-line text-white text-lg"></i>    <div class="min-h-screen flex items-center justify-center p-4 relative z-10">

                                    </div>        <div class="max-w-6xl w-full">

                                    <div>            <div class="grid lg:grid-cols-5 gap-8 items-center">

                                        <h4 class="font-bold text-white text-lg">Analisis Mendalam</h4>                

                                        <p class="text-blue-200">Tracking performa real-time</p>                <!-- Left Side - Brand Section -->

                                    </div>                <div class="lg:col-span-2 fade-in">

                                </div>                    <div class="brand-card p-8 text-white">

                            </div>                        <!-- Logo Section -->

                                                    <div class="text-center mb-8">

                            <div class="feature-card p-4">                            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 icon-elegant shadow-2xl">

                                <div class="flex items-center space-x-4">                                <i class="fas fa-graduation-cap text-white text-3xl"></i>

                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">                            </div>

                                        <i class="fas fa-users text-white text-lg"></i>                            <h1 class="text-3xl font-black text-white mb-2">

                                    </div>                                TryOut ASNku

                                    <div>                            </h1>

                                        <h4 class="font-bold text-white text-lg">Komunitas Elite</h4>                            <p class="text-blue-200 text-sm font-medium">Platform Persiapan ASN Terpercaya</p>

                                        <p class="text-blue-200">Networking & mentoring eksklusif</p>                        </div>

                                    </div>

                                </div>                        <div class="text-center mb-8">

                            </div>                            <h2 class="text-2xl md:text-3xl font-black mb-4 leading-tight text-white">

                        </div>                                Selamat Datang 

                                <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">Kembali!</span>

                        <!-- Success Stats -->                            </h2>

                        <div class="mt-8 pt-6 border-t border-white/20">                            <p class="text-blue-100 leading-relaxed">

                            <div class="grid grid-cols-3 gap-4 text-center">                                Lanjutkan persiapan ASN impianmu dengan 

                                <div>                                <strong class="text-yellow-300">50,000+ soal premium</strong> dan analisis mendalam.

                                    <div class="stats-number text-2xl mb-1">95%</div>                            </p>

                                    <p class="text-blue-200 text-sm">Success Rate</p>                        </div>

                                </div>

                                <div>                        <!-- Elegant Features -->

                                    <div class="stats-number text-2xl mb-1">10K+</div>                        <div class="space-y-4">

                                    <p class="text-blue-200 text-sm">Alumni</p>                            <div class="feature-card p-4 slide-in">

                                </div>                                <div class="flex items-center space-x-4">

                                <div>                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center icon-elegant">

                                    <div class="stats-number text-2xl mb-1">4.9★</div>                                        <i class="fas fa-check text-white"></i>

                                    <p class="text-blue-200 text-sm">Rating</p>                                    </div>

                                </div>                                    <div>

                            </div>                                        <h4 class="font-bold text-white">Akses Unlimited</h4>

                        </div>                                        <p class="text-blue-200 text-sm">Semua paket soal premium</p>

                    </div>                                    </div>

                </div>                                </div>

                            </div>

                <!-- Right Side - Login Form -->                            

                <div class="w-full">                            <div class="feature-card p-4 slide-in" style="animation-delay: 0.1s">

                    <div class="glass-card p-8 max-w-md mx-auto">                                <div class="flex items-center space-x-4">

                        <!-- Form Header -->                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center icon-elegant">

                        <div class="text-center mb-8">                                        <i class="fas fa-chart-line text-white"></i>

                            <div class="w-16 h-16 icon-premium rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl">                                    </div>

                                <i class="fas fa-sign-in-alt text-white text-2xl"></i>                                    <div>

                            </div>                                        <h4 class="font-bold text-white">Progress Tracking</h4>

                            <h3 class="text-3xl font-black gradient-text mb-2">                                        <p class="text-blue-200 text-sm">Analisis performa real-time</p>

                                Masuk Akun                                    </div>

                            </h3>                                </div>

                            <p class="text-gray-600 text-lg">Silakan masuk untuk melanjutkan</p>                            </div>

                        </div>                            

                            <div class="feature-card p-4 slide-in" style="animation-delay: 0.2s">

                        <!-- Session Status -->                                <div class="flex items-center space-x-4">

                        <x-auth-session-status class="mb-4" :status="session('status')" />                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center icon-elegant">

                                        <i class="fas fa-users text-white"></i>

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">                                    </div>

                            @csrf                                    <div>

                                        <h4 class="font-bold text-white">Komunitas Expert</h4>

                            <!-- Email -->                                        <p class="text-purple-200 text-sm">Diskusi & tips dari mentor</p>

                            <div>                                    </div>

                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">                                </div>

                                    Email Address                            </div>

                                </label>                        </div>

                                <input id="email"                     </div>

                                       type="email"                 </div>

                                       name="email" 

                                       value="{{ old('email') }}"                 <!-- Right Side - Login Form -->

                                       required                 <div class="lg:col-span-3 fade-in" style="animation-delay: 0.3s">

                                       autofocus                     <div class="glass-card p-8">

                                       autocomplete="username"                        <!-- Header -->

                                       placeholder="Masukkan email Anda"                         <div class="text-center mb-8">

                                       class="premium-input w-full px-4 py-3 text-gray-900 placeholder-gray-500">                            <div class="w-16 h-16 bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4 icon-elegant shadow-2xl">

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />                                <i class="fas fa-sign-in-alt text-white text-2xl"></i>

                            </div>                            </div>

                            <h3 class="text-3xl font-black gradient-text mb-2">

                            <!-- Password -->                                Masuk ke Akun

                            <div>                            </h3>

                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">                            <p class="text-gray-600">Masukkan email dan password untuk melanjutkan</p>

                                    Password                        </div>

                                </label>

                                <input id="password"                         <!-- Session Status -->

                                       type="password"                         <x-auth-session-status class="mb-4" :status="session('status')" />

                                       name="password" 

                                       required                         <form method="POST" action="{{ route('login') }}" class="space-y-6">

                                       autocomplete="current-password"                            @csrf

                                       placeholder="Masukkan password Anda" 

                                       class="premium-input w-full px-4 py-3 text-gray-900 placeholder-gray-500">                            <!-- Email Address -->

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />                            <div>

                            </div>                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">

                                    <i class="fas fa-envelope mr-2 text-blue-600"></i>

                            <!-- Remember Me -->                                    Email Address

                            <div class="flex items-center justify-between">                                </label>

                                <label for="remember_me" class="flex items-center">                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 

                                    <input id="remember_me"                                        placeholder="Masukkan email Anda" 

                                           type="checkbox"                                        class="premium-input w-full px-4 py-3 text-gray-900 placeholder-gray-500">

                                           name="remember"                                 <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">                            </div>

                                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>

                                </label>                            <!-- Password -->

                            <div>

                                @if (Route::has('password.request'))                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">

                                    <a href="{{ route('password.request') }}"                                     <i class="fas fa-lock mr-2 text-blue-600"></i>

                                       class="text-sm text-blue-600 hover:text-blue-800 font-semibold">                                    Password

                                        Lupa password?                                </label>

                                    </a>                                <input id="password" type="password" name="password" required 

                                @endif                                       placeholder="Masukkan password Anda"

                            </div>                                       class="premium-input w-full px-4 py-3 text-gray-900 placeholder-gray-500">

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <!-- Login Button -->                            </div>

                            <button type="submit" 

                                    class="premium-btn w-full py-3 px-6 text-white font-semibold text-lg">                            <!-- Remember Me & Forgot Password -->

                                <i class="fas fa-sign-in-alt mr-2"></i>                            <div class="flex items-center justify-between">

                                Masuk Sekarang                                <label for="remember_me" class="inline-flex items-center">

                            </button>                                    <input id="remember_me" type="checkbox" 

                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 

                            <!-- Register Link -->                                           name="remember">

                            <div class="text-center pt-4 border-t border-gray-200">                                    <span class="ml-2 text-sm text-gray-600 font-medium">Ingat saya</span>

                                <p class="text-gray-600">                                </label>

                                    Belum punya akun? 

                                    <a href="{{ route('register') }}"                                 @if (Route::has('password.request'))

                                       class="gradient-text font-bold hover:underline">                                    <a class="link-elegant text-sm" href="{{ route('password.request') }}">

                                        Daftar gratis di sini                                        Lupa password?

                                    </a>                                    </a>

                                </p>                                @endif

                            </div>                            </div>

                        </form>

                    </div>                            <!-- Login Button -->

                </div>                            <button type="submit" 

            </div>                                    class="btn-spectacular w-full py-4 px-6 text-white font-bold text-lg">

        </div>                                <i class="fas fa-sign-in-alt mr-2"></i>

    </div>                                Masuk ke Dashboard

</body>                            </button>

</html>
                            <!-- Divider -->
                            <div class="relative my-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500 font-medium">atau</span>
                                </div>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-gray-600">
                                    Belum punya akun? 
                                    <a href="{{ route('register') }}" class="link-elegant font-bold">
                                        Daftar gratis sekarang
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
        }

        @keyframes bgShift {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(2deg); }
        }

        /* PARTICLE SYSTEM */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--neon-blue);
            border-radius: 50%;
            animation: float-particle 15s linear infinite;
            box-shadow: 0 0 10px var(--neon-blue);
        }

        .particle:nth-child(2n) {
            background: var(--neon-purple);
            box-shadow: 0 0 10px var(--neon-purple);
            animation-duration: 20s;
        }

        .particle:nth-child(3n) {
            background: var(--cyber-green);
            box-shadow: 0 0 10px var(--cyber-green);
            animation-duration: 25s;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* HOLOGRAPHIC CARDS */
        .holo-card {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.1) 0%, 
                rgba(255, 255, 255, 0.05) 50%, 
                rgba(255, 255, 255, 0.1) 100%);
            backdrop-filter: blur(25px);
            border: 2px solid transparent;
            background-clip: padding-box;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 60px rgba(0, 212, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .holo-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple), var(--neon-pink), var(--cyber-green));
            z-index: -1;
            border-radius: inherit;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .holo-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: holographicSweep 3s infinite;
        }

        @keyframes holographicSweep {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* NEON LOGO */
        .neon-logo {
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.7));
            animation: neonPulse 2s ease-in-out infinite alternate;
            font-family: 'Orbitron', monospace;
        }

        @keyframes neonPulse {
            from { filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.7)); }
            to { filter: drop-shadow(0 0 35px rgba(181, 55, 242, 0.9)); }
        }

        /* CYBER INPUTS */
        .cyber-input {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(0, 212, 255, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .cyber-input::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 212, 255, 0.1), transparent);
            transition: left 0.6s;
        }

        .cyber-input:focus {
            border-color: var(--neon-blue);
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 
                0 0 30px rgba(0, 212, 255, 0.4),
                inset 0 0 20px rgba(0, 212, 255, 0.1);
            transform: translateY(-2px) scale(1.02);
        }

        .cyber-input:focus::before {
            left: 100%;
        }

        /* QUANTUM BUTTON */
        .quantum-btn {
            background: var(--primary-gradient);
            border: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.4s ease;
            box-shadow: 
                0 15px 35px rgba(118, 75, 162, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .quantum-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
            z-index: -1;
        }

        .quantum-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 
                0 25px 50px rgba(118, 75, 162, 0.6),
                0 0 40px rgba(0, 212, 255, 0.3);
        }

        .quantum-btn:hover::before {
            transform: translateX(100%);
        }

        .quantum-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .quantum-btn:active::after {
            width: 300px;
            height: 300px;
        }

        /* FEATURE CARDS WITH 3D EFFECT */
        .feature-3d {
            transform-style: preserve-3d;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            cursor: pointer;
        }

        .feature-3d:hover {
            transform: rotateY(10deg) rotateX(5deg) translateZ(20px);
            box-shadow: 
                -10px 20px 40px rgba(0, 0, 0, 0.3),
                0 0 30px rgba(0, 212, 255, 0.2);
        }

        /* GLITCH EFFECT */
        .glitch {
            position: relative;
            animation: glitch 2s infinite;
        }

        @keyframes glitch {
            0%, 90%, 100% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
        }

        /* MATRIX RAIN EFFECT */
        .matrix-rain {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .matrix-char {
            position: absolute;
            color: var(--cyber-green);
            font-family: 'Courier New', monospace;
            font-size: 14px;
            animation: matrix-fall 8s linear infinite;
            opacity: 0.7;
        }

        @keyframes matrix-fall {
            0% {
                transform: translateY(-100vh);
                opacity: 0;
            }
            10% {
                opacity: 0.7;
            }
            90% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        /* TYPING ANIMATION */
        .typing-text::after {
            content: '|';
            animation: blink 1s infinite;
            color: var(--neon-blue);
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        /* CYBER STATS */
        .cyber-stat {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(0, 212, 255, 0.3);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .cyber-stat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--neon-blue), var(--neon-purple));
            animation: progressBar 3s ease-in-out infinite;
        }

        @keyframes progressBar {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(0%); }
            100% { transform: translateX(100%); }
        }

        /* RESPONSIVE IMPROVEMENTS */
        @media (max-width: 768px) {
            .feature-3d:hover {
                transform: scale(1.05);
            }
        }
    </style>
</head>
<body class="cyber-bg">
    <!-- PARTICLE SYSTEM -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 4.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 1.5s;"></div>
    </div>

    <!-- MATRIX RAIN -->
    <div class="matrix-rain">
        <div class="matrix-char" style="left: 5%; animation-delay: 0s;">1</div>
        <div class="matrix-char" style="left: 15%; animation-delay: 1s;">0</div>
        <div class="matrix-char" style="left: 25%; animation-delay: 2s;">1</div>
        <div class="matrix-char" style="left: 35%; animation-delay: 3s;">0</div>
        <div class="matrix-char" style="left: 45%; animation-delay: 4s;">1</div>
        <div class="matrix-char" style="left: 55%; animation-delay: 5s;">0</div>
        <div class="matrix-char" style="left: 65%; animation-delay: 1.5s;">1</div>
        <div class="matrix-char" style="left: 75%; animation-delay: 2.5s;">0</div>
        <div class="matrix-char" style="left: 85%; animation-delay: 3.5s;">1</div>
        <div class="matrix-char" style="left: 95%; animation-delay: 4.5s;">0</div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative z-10">
        <div class="w-full max-w-7xl">
            <div class="grid lg:grid-cols-5 gap-12 items-center">
                
                <!-- LEFT SIDE - CYBER BRANDING -->
                <div class="lg:col-span-2">
                    <div class="holo-card rounded-3xl p-10 text-white">
                        <!-- NEON LOGO SECTION -->
                        <div class="text-center mb-10">
                            <div class="relative">
                                <div class="w-28 h-28 mx-auto mb-8 relative">
                                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 rounded-full animate-spin"></div>
                                    <div class="absolute inset-2 bg-black rounded-full flex items-center justify-center">
                                        <i class="fas fa-rocket text-4xl text-transparent bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="text-6xl font-black neon-logo mb-4 glitch">
                                TryOut<span class="text-transparent bg-gradient-to-r from-pink-500 to-yellow-400 bg-clip-text">ASN</span>
                            </h1>
                            <p class="text-cyan-300 text-xl font-medium typing-text">Next-Gen ASN Preparation Portal</p>
                        </div>

                        <!-- CYBER STATS -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-cyan-400">50K+</div>
                                <div class="text-xs text-gray-300">SOAL PREMIUM</div>
                            </div>
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-purple-400">95%</div>
                                <div class="text-xs text-gray-300">SUCCESS RATE</div>
                            </div>
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-pink-400">24/7</div>
                                <div class="text-xs text-gray-300">AI SUPPORT</div>
                            </div>
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-green-400">∞</div>
                                <div class="text-xs text-gray-300">POSSIBILITIES</div>
                            </div>
                        </div>

                        <!-- 3D FEATURE CARDS -->
                        <div class="space-y-4">
                            <h3 class="text-2xl font-bold text-cyan-300 mb-6 text-center">🚀 QUANTUM FEATURES</h3>
                            
                            <div class="feature-3d holo-card rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-brain text-white text-xl relative z-10"></i>
                                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-transparent opacity-50 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-lg">AI-Powered Analytics</h4>
                                        <p class="text-cyan-200 text-sm">Real-time performance prediction</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-3d holo-card rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-pink-600 rounded-xl flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-network-wired text-white text-xl relative z-10"></i>
                                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-transparent opacity-50 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-lg">Neural Network Scoring</h4>
                                        <p class="text-purple-200 text-sm">Advanced ML algorithms</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-3d holo-card rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-satellite text-white text-xl relative z-10"></i>
                                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-transparent opacity-50 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-lg">Quantum Community</h4>
                                        <p class="text-green-200 text-sm">Elite learner network</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE - QUANTUM LOGIN PORTAL -->
                <div class="lg:col-span-3">
                    <div class="holo-card rounded-3xl p-10">
                        <!-- PORTAL HEADER -->
                        <div class="text-center mb-10">
                            <div class="relative">
                                <div class="w-20 h-20 mx-auto mb-6 relative">
                                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 rounded-full animate-spin"></div>
                                    <div class="absolute inset-1 bg-black rounded-full flex items-center justify-center">
                                        <i class="fas fa-key text-2xl text-transparent bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black neon-logo mb-3">
                                ACCESS PORTAL
                            </h3>
                            <p class="text-gray-300">Enter the quantum realm of ASN preparation</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-8">
                            @csrf
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- QUANTUM INPUT SECTION -->
                            <div class="holo-card rounded-2xl p-8 bg-black/20">
                                <h4 class="text-xl font-bold neon-logo mb-6 flex items-center">
                                    <i class="fas fa-user-astronaut mr-3 text-cyan-400"></i>
                                    AUTHENTICATION REQUIRED
                                </h4>
                                
                                <div class="space-y-6">
                                    <div class="relative">
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                               placeholder="QUANTUM EMAIL ADDRESS" 
                                               class="cyber-input w-full px-6 py-4 rounded-xl focus:outline-none text-white placeholder-gray-400 font-mono text-lg">
                                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                            <i class="fas fa-envelope text-cyan-400"></i>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    
                                    <div class="relative">
                                        <input id="password" type="password" name="password" required 
                                               placeholder="SECURITY PASSPHRASE" 
                                               class="cyber-input w-full px-6 py-4 rounded-xl focus:outline-none text-white placeholder-gray-400 font-mono text-lg">
                                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                            <i class="fas fa-lock text-purple-400"></i>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <!-- QUANTUM OPTIONS -->
                            <div class="space-y-6">
                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="flex items-center cursor-pointer">
                                        <input id="remember_me" type="checkbox" name="remember" 
                                               class="w-5 h-5 text-cyan-600 border-2 border-cyan-400 rounded bg-transparent focus:ring-cyan-500 focus:ring-2">
                                        <span class="ml-3 text-gray-300 font-medium">Maintain Quantum State</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-cyan-400 hover:text-purple-400 font-semibold transition-colors duration-300">
                                            Reset Quantum Key?
                                        </a>
                                    @endif
                                </div>

                                <!-- QUANTUM LAUNCH BUTTON -->
                                <button type="submit" 
                                        class="quantum-btn w-full text-white py-5 rounded-xl font-black text-xl transition-all duration-500 relative">
                                    <span class="relative z-10 flex items-center justify-center">
                                        <i class="fas fa-rocket mr-3"></i>
                                        🚀 INITIATE QUANTUM LOGIN
                                        <i class="fas fa-bolt ml-3"></i>
                                    </span>
                                </button>
                            </div>

                            <!-- PORTAL NAVIGATION -->
                            <div class="text-center pt-4">
                                <p class="text-gray-400">
                                    No quantum access yet? 
                                    <a href="{{ route('register') }}" class="neon-logo font-bold hover:text-pink-400 transition-colors duration-300">
                                        Create Quantum Identity
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Dynamic particle generation
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 5 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            document.querySelector('.particles').appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 20000);
        }

        // Generate particles continuously
        setInterval(createParticle, 2000);

        // Add some interactivity
        document.addEventListener('mousemove', (e) => {
            const cursor = document.createElement('div');
            cursor.style.position = 'fixed';
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            cursor.style.width = '4px';
            cursor.style.height = '4px';
            cursor.style.backgroundColor = '#00d4ff';
            cursor.style.borderRadius = '50%';
            cursor.style.pointerEvents = 'none';
            cursor.style.zIndex = '9999';
            cursor.style.animation = 'fadeOut 1s ease-out forwards';
            cursor.style.boxShadow = '0 0 10px #00d4ff';
            
            document.body.appendChild(cursor);
            
            setTimeout(() => {
                cursor.remove();
            }, 1000);
        });

        // Add fadeOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                to {
                    opacity: 0;
                    transform: scale(2);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
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
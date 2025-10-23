<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TryOut ASNku - Platform Terbaik Persiapan CPNS & PPPK Indonesia</title>
    <meta name="description" content="Platform tryout online terlengkap untuk persiapan CPNS & PPPK. Ribuan soal, pembahasan detail, dan sistem ranking untuk mengukur kemampuanmu.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 25%, #3b82f6 50%, #f97316 75%, #ea580c 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        

        @keyframes gradientShift {        <!-- Icons -->

            0% { background-position: 0% 50%; }

            50% { background-position: 100% 50%; }        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

            100% { background-position: 0% 50%; }

        }

        

        .floating-animation {        <!-- Scripts -->        <!-- Fonts -->        <!-- Fonts -->

            animation: floating 3s ease-in-out infinite;

        }        @vite(['resources/css/app.css', 'resources/js/app.js'])

        

        @keyframes floating {                <link rel="preconnect" href="https://fonts.googleapis.com">        <link rel="preconnect" href="https://fonts.googleapis.com">

            0%, 100% { transform: translateY(0px); }

            50% { transform: translateY(-10px); }        <style>

        }

                    .gradient-bg {        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        .glass-morphism {

            background: rgba(255, 255, 255, 0.1);                background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 25%, #3b82f6 50%, #f97316 75%, #ea580c 100%);

            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.2);                background-size: 400% 400%;        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        }

                        animation: gradientShift 15s ease infinite;

        .text-gradient {

            background: linear-gradient(45deg, #3b82f6, #f97316);            }

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

            background-clip: text;

        }            @keyframes gradientShift {        <!-- Icons -->        <!-- Icons -->

    </style>

</head>                0% { background-position: 0% 50%; }

<body class="font-inter antialiased overflow-x-hidden">

                    50% { background-position: 100% 50%; }        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Navigation -->

    <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-lg border-b border-blue-100">                100% { background-position: 0% 50%; }

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between h-16">            }

                <!-- Logo -->

                <div class="flex items-center space-x-3">

                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">

                        <i class="fas fa-graduation-cap text-white text-xl"></i>            .floating-animation {        <!-- Scripts -->        <!-- Scripts -->

                    </div>

                    <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>                animation: floating 3s ease-in-out infinite;

                </div>

                            }        @vite(['resources/css/app.css', 'resources/js/app.js'])        @vite(['resources/css/app.css', 'resources/js/app.js'])

                <!-- Desktop Menu -->

                <div class="hidden md:flex items-center space-x-8">

                    <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Fitur</a>

                    <a href="#pricing" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Harga</a>            @keyframes floating {

                    <a href="#testimonials" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Testimoni</a>

                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Kontak</a>                0%, 100% { transform: translateY(0px); }

                </div>

                                50% { transform: translateY(-10px); }        <style>        <style>

                <!-- Auth Buttons -->

                <div class="flex items-center space-x-4">            }

                    @auth

                        <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">                        .gradient-bg {            .gradient-bg {

                            Dashboard

                        </a>            .glass-morphism {

                    @else

                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">                background: rgba(255, 255, 255, 0.1);                background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 25%, #3b82f6 50%, #f97316 75%, #ea580c 100%);                background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 25%, #3b82f6 50%, #f97316 75%, #ea580c 100%);

                            Masuk

                        </a>                backdrop-filter: blur(20px);

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">                border: 1px solid rgba(255, 255, 255, 0.2);                background-size: 400% 400%;                background-size: 400% 400%;

                                Daftar Gratis

                            </a>            }

                        @endif

                    @endauth                            animation: gradientShift 15s ease infinite;                animation: gradientShift 15s ease infinite;

                </div>

            </div>            .text-gradient {

        </div>

    </nav>                background: linear-gradient(45deg, #3b82f6, #f97316);            }            }



    <!-- Hero Section -->                -webkit-background-clip: text;

    <section class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-16">

        <!-- Floating Elements -->                -webkit-text-fill-color: transparent;

        <div class="absolute inset-0 overflow-hidden pointer-events-none">

            <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>                background-clip: text;

            <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>

            <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>            }            @keyframes gradientShift {            @keyframes gradientShift {

        </div>

                </style>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

            <div class="max-w-4xl mx-auto">    </head>                0% { background-position: 0% 50%; }                0% { background-position: 0% 50%; }

                <!-- Badge -->

                <div class="inline-flex items-center glass-morphism px-6 py-3 rounded-full text-white mb-8">    <body class="font-inter antialiased overflow-x-hidden">

                    <i class="fas fa-star text-yellow-300 mr-2"></i>

                    <span class="font-medium">Platform #1 Persiapan CPNS & PPPK Indonesia</span>                        50% { background-position: 100% 50%; }                50% { background-position: 100% 50%; }

                </div>

                        <!-- Navigation -->

                <!-- Main Heading -->

                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">        <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-lg border-b border-blue-100">                100% { background-position: 0% 50%; }                100% { background-position: 0% 50%; }

                    Raih Impian 

                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        ASN

                    </span>                <div class="flex items-center justify-between h-16">            }            }

                    <br>Bersama Kami

                </h1>                    <!-- Logo -->

                

                <!-- Subtitle -->                    <div class="flex items-center space-x-3">

                <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed max-w-3xl mx-auto">

                    Platform tryout online terlengkap dengan ribuan soal CPNS & PPPK,                         <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">

                    pembahasan detail, dan sistem ranking untuk mengukur kemampuanmu

                </p>                            <i class="fas fa-graduation-cap text-white text-xl"></i>            .floating-animation {            .floating-animation {

                

                <!-- CTA Buttons -->                        </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">

                    @auth                        <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>                animation: floating 3s ease-in-out infinite;                animation: floating 3s ease-in-out infinite;

                        <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

                            <i class="fas fa-tachometer-alt mr-2"></i>                    </div>

                            Mulai Belajar Sekarang

                        </a>                                }            }

                    @else

                        <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                    <!-- Desktop Menu -->

                            <i class="fas fa-rocket mr-2"></i>

                            Mulai Gratis Sekarang                    <div class="hidden md:flex items-center space-x-8">

                        </a>

                    @endauth                        <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Fitur</a>

                    <a href="#features" class="glass-morphism text-white hover:bg-white/20 px-8 py-4 rounded-xl font-bold text-lg transition-all">

                        <i class="fas fa-play mr-2"></i>                        <a href="#pricing" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Harga</a>            @keyframes floating {            @keyframes floating {

                        Lihat Demo

                    </a>                        <a href="#testimonials" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Testimoni</a>

                </div>

                                        <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Kontak</a>                0%, 100% { transform: translateY(0px); }                0%, 100% { transform: translateY(0px); }

                <!-- Stats -->

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">                    </div>

                    <div class="text-center">

                        <div class="text-3xl font-black text-white mb-2">10K+</div>                                    50% { transform: translateY(-10px); }                50% { transform: translateY(-10px); }

                        <div class="text-blue-200 text-sm">Soal Tersedia</div>

                    </div>                    <!-- Auth Buttons -->

                    <div class="text-center">

                        <div class="text-3xl font-black text-white mb-2">5K+</div>                    <div class="flex items-center space-x-4">            }            }

                        <div class="text-blue-200 text-sm">Peserta Aktif</div>

                    </div>                        @auth

                    <div class="text-center">

                        <div class="text-3xl font-black text-white mb-2">98%</div>                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">

                        <div class="text-blue-200 text-sm">Tingkat Kepuasan</div>

                    </div>                                Dashboard

                    <div class="text-center">

                        <div class="text-3xl font-black text-white mb-2">1K+</div>                            </a>            .glass-morphism {            .glass-morphism {

                        <div class="text-blue-200 text-sm">Lulus ASN</div>

                    </div>                        @else

                </div>

            </div>                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">                background: rgba(255, 255, 255, 0.1);                background: rgba(255, 255, 255, 0.1);

        </div>

                                        Masuk

        <!-- Scroll Indicator -->

        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">                            </a>                backdrop-filter: blur(20px);                backdrop-filter: blur(20px);

            <i class="fas fa-chevron-down text-2xl"></i>

        </div>                            @if (Route::has('register'))

    </section>

                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">                border: 1px solid rgba(255, 255, 255, 0.2);                border: 1px solid rgba(255, 255, 255, 0.2);

    <!-- Features Section -->

    <section id="features" class="py-20 bg-white">                                    Daftar Gratis

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->                                </a>            }            }

            <div class="text-center mb-16">

                <div class="inline-flex items-center bg-blue-50 px-4 py-2 rounded-full text-blue-600 font-medium mb-6">                            @endif

                    <i class="fas fa-star mr-2"></i>

                    Fitur Unggulan                        @endauth

                </div>

                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">                    </div>

                    Semua yang Kamu Butuhkan untuk 

                    <span class="text-gradient">Sukses ASN</span>                </div>            .text-gradient {            .text-gradient {

                </h2>

                <p class="text-xl text-gray-600 max-w-3xl mx-auto">            </div>

                    Platform komprehensif dengan fitur-fitur canggih yang dirancang khusus untuk membantu calon ASN meraih impiannya

                </p>        </nav>                background: linear-gradient(45deg, #3b82f6, #f97316);                background: linear-gradient(45deg, #3b82f6, #f97316);

            </div>

            

            <!-- Features Grid -->

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">        <!-- Hero Section -->                -webkit-background-clip: text;                -webkit-background-clip: text;

                <!-- Feature 1 -->

                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-2">        <section class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-16">

                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                        <i class="fas fa-brain text-white text-2xl"></i>            <!-- Floating Elements -->                -webkit-text-fill-color: transparent;                -webkit-text-fill-color: transparent;

                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-4">10,000+ Soal Premium</h3>            <div class="absolute inset-0 overflow-hidden pointer-events-none">

                    <p class="text-gray-600 leading-relaxed">

                        Koleksi soal terlengkap dengan pembahasan detail untuk semua kategori CPNS & PPPK                <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>                background-clip: text;                background-clip: text;

                    </p>

                </div>                <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>

                

                <!-- Feature 2 -->                <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>            }            }

                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-orange-200 transition-all duration-300 transform hover:-translate-y-2">

                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">            </div>

                        <i class="fas fa-stopwatch text-white text-2xl"></i>

                    </div>                    </style>        </style>

                    <h3 class="text-xl font-bold text-gray-900 mb-4">Simulasi Real-Time</h3>

                    <p class="text-gray-600 leading-relaxed">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

                        Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat

                    </p>                <div class="max-w-4xl mx-auto">    </head>    </head>

                </div>

                                    <!-- Badge -->

                <!-- Feature 3 -->

                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-green-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="inline-flex items-center glass-morphism px-6 py-3 rounded-full text-white mb-8">    <body class="font-inter antialiased overflow-x-hidden">    <body class="font-inter antialiased overflow-x-hidden">

                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                        <i class="fas fa-chart-line text-white text-2xl"></i>                        <i class="fas fa-star text-yellow-300 mr-2"></i>

                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Performa</h3>                        <span class="font-medium">Platform #1 Persiapan CPNS & PPPK Indonesia</span>

                    <p class="text-gray-600 leading-relaxed">

                        Laporan detail kemampuanmu dengan rekomendasi materi yang perlu diperdalam                    </div>

                    </p>

                </div>                            <!-- Navigation -->        <!-- Navigation -->

                

                <!-- Feature 4 -->                    <!-- Main Heading -->

                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-2">

                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                    <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">        <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-lg border-b border-blue-100">        <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-lg border-b border-blue-100">

                        <i class="fas fa-trophy text-white text-2xl"></i>

                    </div>                        Raih Impian

                    <h3 class="text-xl font-bold text-gray-900 mb-4">Sistem Ranking</h3>

                    <p class="text-gray-600 leading-relaxed">                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        Kompetisi sehat dengan peserta lain untuk memotivasi belajar lebih giat

                    </p>                            ASN

                </div>

                                        </span>                <div class="flex items-center justify-between h-16">                <div class="flex items-center justify-between h-16">

                <!-- Feature 5 -->

                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2">                        <br>Bersama Kami

                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                        <i class="fas fa-book-open text-white text-2xl"></i>                    </h1>                    <!-- Logo -->                    <!-- Logo -->

                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-4">Materi Lengkap</h3>

                    <p class="text-gray-600 leading-relaxed">

                        Ringkasan materi terkini sesuai kisi-kisi resmi dari berbagai instansi                    <!-- Subtitle -->                    <div class="flex items-center space-x-3">                    <div class="flex items-center space-x-3">

                    </p>

                </div>                    <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed max-w-3xl mx-auto">

                

                <!-- Feature 6 -->                        Platform tryout online terlengkap dengan ribuan soal CPNS & PPPK,                         <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">

                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-2">

                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        pembahasan detail, dan sistem ranking untuk mengukur kemampuanmu

                        <i class="fas fa-mobile-alt text-white text-2xl"></i>

                    </div>                    </p>                            <i class="fas fa-graduation-cap text-white text-xl"></i>                            <i class="fas fa-graduation-cap text-white text-xl"></i>

                    <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Mobile</h3>

                    <p class="text-gray-600 leading-relaxed">

                        Belajar kapan saja, di mana saja dengan platform yang responsif di semua device

                    </p>                    <!-- CTA Buttons -->                        </div>                        </div>

                </div>

            </div>                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">

        </div>

    </section>                        @auth                        <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>                        <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>



    <!-- Pricing Section -->                            <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

    <section id="pricing" class="py-20 bg-gray-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">                                <i class="fas fa-tachometer-alt mr-2"></i>                    </div>                    </div>

            <!-- Section Header -->

            <div class="text-center mb-16">                                Mulai Belajar Sekarang

                <div class="inline-flex items-center bg-orange-50 px-4 py-2 rounded-full text-orange-600 font-medium mb-6">

                    <i class="fas fa-gem mr-2"></i>                            </a>

                    Paket Premium

                </div>                        @else

                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

                    Investasi Terbaik untuk                             <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                    <!-- Desktop Menu -->                    <!-- Desktop Menu -->

                    <span class="text-gradient">Masa Depanmu</span>

                </h2>                                <i class="fas fa-rocket mr-2"></i>

                <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                    Pilih paket yang sesuai dengan kebutuhanmu. Semua paket sudah termasuk akses penuh ke seluruh fitur platform                                Mulai Gratis Sekarang                    <div class="hidden md:flex items-center space-x-8">                    <div class="hidden md:flex items-center space-x-8">

                </p>

            </div>                            </a>

            

            <!-- Pricing Cards -->                        @endauth                        <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Fitur</a>                        <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Fitur</a>

            <div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                <!-- Basic Plan -->                        <a href="#features" class="glass-morphism text-white hover:bg-white/20 px-8 py-4 rounded-xl font-bold text-lg transition-all">

                <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">

                    <div class="text-center mb-8">                            <i class="fas fa-play mr-2"></i>                        <a href="#pricing" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Harga</a>                        <a href="#pricing" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Harga</a>

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Basic</h3>

                        <div class="text-4xl font-black text-gray-900 mb-2">GRATIS</div>                            Lihat Demo

                        <p class="text-gray-600">Untuk memulai persiapan</p>

                    </div>                        </a>                        <a href="#testimonials" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Testimoni</a>                        <a href="#testimonials" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Testimoni</a>

                    

                    <ul class="space-y-4 mb-8">                    </div>

                        <li class="flex items-center">

                            <i class="fas fa-check text-green-500 mr-3"></i>                                            <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Kontak</a>                        <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Kontak</a>

                            <span class="text-gray-700">100 Soal latihan gratis</span>

                        </li>                    <!-- Stats -->

                        <li class="flex items-center">

                            <i class="fas fa-check text-green-500 mr-3"></i>                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">                    </div>                    </div>

                            <span class="text-gray-700">5 Tryout gratis per bulan</span>

                        </li>                        <div class="text-center">

                        <li class="flex items-center">

                            <i class="fas fa-check text-green-500 mr-3"></i>                            <div class="text-3xl font-black text-white mb-2">10K+</div>

                            <span class="text-gray-700">Akses materi dasar</span>

                        </li>                            <div class="text-blue-200 text-sm">Soal Tersedia</div>

                        <li class="flex items-center text-gray-400">

                            <i class="fas fa-times mr-3"></i>                        </div>                    <!-- Auth Buttons -->                    <!-- Auth Buttons -->

                            <span>Pembahasan detail</span>

                        </li>                        <div class="text-center">

                        <li class="flex items-center text-gray-400">

                            <i class="fas fa-times mr-3"></i>                            <div class="text-3xl font-black text-white mb-2">5K+</div>                    <div class="flex items-center space-x-4">                    <div class="flex items-center space-x-4">

                            <span>Analisis performa</span>

                        </li>                            <div class="text-blue-200 text-sm">Peserta Aktif</div>

                    </ul>

                                            </div>                        @auth                        @auth

                    <a href="{{ route('register') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-4 rounded-xl font-bold text-center block transition-colors">

                        Mulai Gratis                        <div class="text-center">

                    </a>

                </div>                            <div class="text-3xl font-black text-white mb-2">98%</div>                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">

                

                <!-- Premium Plan -->                            <div class="text-blue-200 text-sm">Tingkat Kepuasan</div>

                <div class="bg-gradient-to-br from-blue-600 to-blue-700 border border-blue-500 rounded-3xl p-8 relative transform scale-105 shadow-2xl">

                    <!-- Popular Badge -->                        </div>                                Dashboard                                Dashboard

                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">

                        <div class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold">                        <div class="text-center">

                            TERPOPULER ✨

                        </div>                            <div class="text-3xl font-black text-white mb-2">1K+</div>                            </a>                            </a>

                    </div>

                                                <div class="text-blue-200 text-sm">Lulus ASN</div>

                    <div class="text-center mb-8">

                        <h3 class="text-2xl font-bold text-white mb-4">Paket Premium</h3>                        </div>                        @else

                        <div class="text-4xl font-black text-white mb-2">Rp 99K</div>

                        <p class="text-blue-200">Per bulan</p>                    </div>

                    </div>

                                    </div>                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">

                    <ul class="space-y-4 mb-8">

                        <li class="flex items-center">            </div>

                            <i class="fas fa-check text-green-300 mr-3"></i>

                            <span class="text-white">10,000+ Soal premium</span>                                            Masuk                                Masuk

                        </li>

                        <li class="flex items-center">            <!-- Scroll Indicator -->

                            <i class="fas fa-check text-green-300 mr-3"></i>

                            <span class="text-white">Tryout unlimited</span>            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">                            </a>                            </a>

                        </li>

                        <li class="flex items-center">                <i class="fas fa-chevron-down text-2xl"></i>

                            <i class="fas fa-check text-green-300 mr-3"></i>

                            <span class="text-white">Pembahasan detail</span>            </div>                            @if (Route::has('register'))                            @if (Route::has('register'))

                        </li>

                        <li class="flex items-center">        </section>

                            <i class="fas fa-check text-green-300 mr-3"></i>

                            <span class="text-white">Analisis performa mendalam</span>                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded-lg font-medium transition-all transform hover:scale-105">

                        </li>

                        <li class="flex items-center">        <!-- Features Section -->

                            <i class="fas fa-check text-green-300 mr-3"></i>

                            <span class="text-white">Update soal terbaru</span>        <section id="features" class="py-20 bg-white">                                    Daftar Gratis                                    Daftar Gratis

                        </li>

                    </ul>            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    

                    <a href="{{ route('register') }}" class="w-full bg-white hover:bg-gray-100 text-blue-700 py-4 rounded-xl font-bold text-center block transition-colors">                <!-- Section Header -->                                </a>                                </a>

                        Berlangganan Sekarang

                    </a>                <div class="text-center mb-16">

                </div>

                                    <div class="inline-flex items-center bg-blue-50 px-4 py-2 rounded-full text-blue-600 font-medium mb-6">                            @endif                            @endif

                <!-- Pro Plan -->

                <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">                        <i class="fas fa-star mr-2"></i>

                    <div class="text-center mb-8">

                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Pro</h3>                        Fitur Unggulan                        @endauth                        @endauth

                        <div class="text-4xl font-black text-gray-900 mb-2">Rp 199K</div>

                        <p class="text-gray-600">Per 3 bulan</p>                    </div>

                    </div>

                                        <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">                    </div>                    </div>

                    <ul class="space-y-4 mb-8">

                        <li class="flex items-center">                        Semua yang Kamu Butuhkan untuk

                            <i class="fas fa-check text-green-500 mr-3"></i>

                            <span class="text-gray-700">Semua fitur Premium</span>                        <span class="text-gradient">Sukses ASN</span>                </div>                </div>

                        </li>

                        <li class="flex items-center">                    </h2>

                            <i class="fas fa-check text-green-500 mr-3"></i>

                            <span class="text-gray-700">Konsultasi mentor 1-on-1</span>                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">            </div>            </div>

                        </li>

                        <li class="flex items-center">                        Platform komprehensif dengan fitur-fitur canggih yang dirancang khusus untuk membantu calon ASN meraih impiannya

                            <i class="fas fa-check text-green-500 mr-3"></i>

                            <span class="text-gray-700">Simulasi interview</span>                    </p>        </nav>        </nav>

                        </li>

                        <li class="flex items-center">                </div>

                            <i class="fas fa-check text-green-500 mr-3"></i>

                            <span class="text-gray-700">Prediksi passing grade</span>

                        </li>

                        <li class="flex items-center">                <!-- Features Grid -->

                            <i class="fas fa-check text-green-500 mr-3"></i>

                            <span class="text-gray-700">Priority support</span>                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">        <!-- Hero Section -->        <!-- Hero Section -->

                        </li>

                    </ul>                    <!-- Feature 1 -->

                    

                    <a href="{{ route('register') }}" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-4 rounded-xl font-bold text-center block transition-colors">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-2">        <section class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-16">        <section class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-16">

                        Upgrade ke Pro

                    </a>                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                </div>

            </div>                            <i class="fas fa-brain text-white text-2xl"></i>            <!-- Floating Elements -->            <!-- Floating Elements -->

        </div>

    </section>                        </div>



    <!-- Testimonials Section -->                        <h3 class="text-xl font-bold text-gray-900 mb-4">10,000+ Soal Premium</h3>            <div class="absolute inset-0 overflow-hidden pointer-events-none">            <div class="absolute inset-0 overflow-hidden pointer-events-none">

    <section id="testimonials" class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">                        <p class="text-gray-600 leading-relaxed">

            <!-- Section Header -->

            <div class="text-center mb-16">                            Koleksi soal terlengkap dengan pembahasan detail untuk semua kategori CPNS & PPPK                <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>                <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>

                <div class="inline-flex items-center bg-green-50 px-4 py-2 rounded-full text-green-600 font-medium mb-6">

                    <i class="fas fa-users mr-2"></i>                        </p>

                    Testimoni Alumni

                </div>                    </div>                <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>                <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>

                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

                    Mereka Berhasil, 

                    <span class="text-gradient">Kamu Juga Bisa!</span>

                </h2>                    <!-- Feature 2 -->                <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>                <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>

                <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                    Ribuan alumni TryOut ASNku telah berhasil lolos seleksi ASN di berbagai instansi. Inilah cerita mereka!                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-orange-200 transition-all duration-300 transform hover:-translate-y-2">

                </p>

            </div>                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">            </div>            </div>

            

            <!-- Testimonials Grid -->                            <i class="fas fa-stopwatch text-white text-2xl"></i>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Testimonial 1 -->                        </div>

                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                    <div class="flex items-center mb-6">                        <h3 class="text-xl font-bold text-gray-900 mb-4">Simulasi Real-Time</h3>

                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b77c?w=64&h=64&fit=crop&crop=face" 

                             alt="Sarah" class="w-16 h-16 rounded-full object-cover mr-4">                        <p class="text-gray-600 leading-relaxed">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

                        <div>

                            <h4 class="font-bold text-gray-900">Sarah Putri</h4>                            Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat

                            <p class="text-gray-600 text-sm">Lolos CPNS Kemenkeu 2024</p>

                        </div>                        </p>                <div class="max-w-4xl mx-auto">                <div class="max-w-4xl mx-auto">

                    </div>

                    <div class="flex text-yellow-400 mb-4">                    </div>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>                                        <!-- Badge -->                    <!-- Badge -->

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>                    <!-- Feature 3 -->

                        <i class="fas fa-star"></i>

                    </div>                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-green-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="inline-flex items-center glass-morphism px-6 py-3 rounded-full text-white mb-8">                    <div class="inline-flex items-center glass-morphism px-6 py-3 rounded-full text-white mb-8">

                    <p class="text-gray-700 leading-relaxed">

                        "Platform ini luar biasa! Soal-soalnya persis seperti ujian asli. Berkat TryOut ASNku, saya berhasil lolos CPNS Kemenkeu dengan ranking 5 besar!"                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                    </p>

                </div>                            <i class="fas fa-chart-line text-white text-2xl"></i>                        <i class="fas fa-star text-yellow-300 mr-2"></i>                        <i class="fas fa-star text-yellow-300 mr-2"></i>

                

                <!-- Testimonial 2 -->                        </div>

                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                    <div class="flex items-center mb-6">                        <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Performa</h3>                        <span class="font-medium">Platform #1 Persiapan CPNS & PPPK Indonesia</span>                        <span class="font-medium">Platform #1 Persiapan CPNS & PPPK Indonesia</span>

                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&crop=face" 

                             alt="Ahmad" class="w-16 h-16 rounded-full object-cover mr-4">                        <p class="text-gray-600 leading-relaxed">

                        <div>

                            <h4 class="font-bold text-gray-900">Ahmad Rizki</h4>                            Laporan detail kemampuanmu dengan rekomendasi materi yang perlu diperdalam                    </div>                    </div>

                            <p class="text-gray-600 text-sm">Lolos PPPK Guru 2024</p>

                        </div>                        </p>

                    </div>

                    <div class="flex text-yellow-400 mb-4">                    </div>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>                    <!-- Feature 4 -->                    <!-- Main Heading -->                    <!-- Main Heading -->

                        <i class="fas fa-star"></i>

                    </div>                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-2">

                    <p class="text-gray-700 leading-relaxed">

                        "Analisis performanya sangat membantu untuk tahu kelemahan saya. Materinya juga update sesuai kisi-kisi terbaru. Recommended banget!"                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                    <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">                    <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">

                    </p>

                </div>                            <i class="fas fa-trophy text-white text-2xl"></i>

                

                <!-- Testimonial 3 -->                        </div>                        Raih Impian                         Raih Impian

                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                    <div class="flex items-center mb-6">                        <h3 class="text-xl font-bold text-gray-900 mb-4">Sistem Ranking</h3>

                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=64&h=64&fit=crop&crop=face" 

                             alt="Maya" class="w-16 h-16 rounded-full object-cover mr-4">                        <p class="text-gray-600 leading-relaxed">                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">

                        <div>

                            <h4 class="font-bold text-gray-900">Maya Sari</h4>                            Kompetisi sehat dengan peserta lain untuk memotivasi belajar lebih giat

                            <p class="text-gray-600 text-sm">Lolos CPNS Kemendikbud 2024</p>

                        </div>                        </p>                            ASN                            ASN

                    </div>

                    <div class="flex text-yellow-400 mb-4">                    </div>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>                                            </span>                        </span>

                        <i class="fas fa-star"></i>

                        <i class="fas fa-star"></i>                    <!-- Feature 5 -->

                        <i class="fas fa-star"></i>

                    </div>                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2">                        <br>Bersama Kami                        <br>Bersama Kami

                    <p class="text-gray-700 leading-relaxed">

                        "Interface-nya user friendly, soalnya berkualitas tinggi. Sistem rankingnya juga memotivasi untuk terus belajar. Terima kasih TryOut ASNku!"                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                    </p>

                </div>                            <i class="fas fa-book-open text-white text-2xl"></i>                    </h1>                    </h1>

            </div>

        </div>                        </div>

    </section>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Materi Lengkap</h3>

    <!-- CTA Section -->

    <section class="py-20 gradient-bg relative overflow-hidden">                        <p class="text-gray-600 leading-relaxed">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

            <!-- Floating Elements -->                            Ringkasan materi terkini sesuai kisi-kisi resmi dari berbagai instansi                    <!-- Subtitle -->                    <!-- Subtitle -->

            <div class="absolute inset-0 overflow-hidden pointer-events-none">

                <div class="floating-animation absolute top-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>                        </p>

                <div class="floating-animation absolute bottom-10 left-10 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1.5s;"></div>

            </div>                    </div>                    <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed max-w-3xl mx-auto">                    <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed max-w-3xl mx-auto">

            

            <div class="max-w-4xl mx-auto">

                <h2 class="text-4xl md:text-6xl font-black text-white mb-6">

                    Siap Menjadi                     <!-- Feature 6 -->                        Platform tryout online terlengkap dengan ribuan soal CPNS & PPPK,                         Platform tryout online terlengkap dengan ribuan soal CPNS & PPPK,

                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">

                        ASN Impianmu?                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-2">

                    </span>

                </h2>                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        pembahasan detail, dan sistem ranking untuk mengukur kemampuanmu                        pembahasan detail, dan sistem ranking untuk mengukur kemampuanmu

                <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">

                    Bergabunglah dengan ribuan calon ASN yang telah mempercayai TryOut ASNku sebagai partner belajar terbaik mereka                            <i class="fas fa-mobile-alt text-white text-2xl"></i>

                </p>

                                        </div>                    </p>                    </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">

                    @auth                        <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Mobile</h3>

                        <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

                            <i class="fas fa-rocket mr-2"></i>                        <p class="text-gray-600 leading-relaxed">

                            Mulai Belajar Sekarang

                        </a>                            Belajar kapan saja, di mana saja dengan platform yang responsif di semua device

                    @else

                        <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                        </p>                    <!-- CTA Buttons -->                    <!-- CTA Buttons -->

                            <i class="fas fa-rocket mr-2"></i>

                            Daftar Gratis Hari Ini                    </div>

                        </a>

                    @endauth                </div>                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">

                    <div class="flex items-center text-white">

                        <i class="fas fa-shield-alt mr-2"></i>            </div>

                        <span class="font-medium">Garansi 30 Hari Uang Kembali</span>

                    </div>        </section>                        @auth                        @auth

                </div>

                

                <!-- Trust Indicators -->

                <div class="flex flex-wrap justify-center items-center gap-8 text-blue-200">        <!-- Pricing Section -->                            <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                            <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

                    <div class="flex items-center">

                        <i class="fas fa-check-circle mr-2"></i>        <section id="pricing" class="py-20 bg-gray-50">

                        <span>SSL Secured</span>

                    </div>            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">                                <i class="fas fa-tachometer-alt mr-2"></i>                                <i class="fas fa-tachometer-alt mr-2"></i>

                    <div class="flex items-center">

                        <i class="fas fa-users mr-2"></i>                <!-- Section Header -->

                        <span>5,000+ Member Aktif</span>

                    </div>                <div class="text-center mb-16">                                Mulai Belajar Sekarang                                Mulai Belajar Sekarang

                    <div class="flex items-center">

                        <i class="fas fa-star mr-2"></i>                    <div class="inline-flex items-center bg-orange-50 px-4 py-2 rounded-full text-orange-600 font-medium mb-6">

                        <span>Rating 4.9/5</span>

                    </div>                        <i class="fas fa-gem mr-2"></i>                            </a>                            </a>

                </div>

            </div>                        Paket Premium

        </div>

    </section>                    </div>                        @else



    <!-- Footer -->                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

    <footer id="contact" class="bg-gray-900 text-white py-16">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">                        Investasi Terbaik untuk                             <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                            <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">

                <!-- Company Info -->                        <span class="text-gradient">Masa Depanmu</span>

                <div>

                    <div class="flex items-center space-x-3 mb-6">                    </h2>                                <i class="fas fa-rocket mr-2"></i>                                <i class="fas fa-rocket mr-2"></i>

                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">

                            <i class="fas fa-graduation-cap text-white text-xl"></i>                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                        </div>

                        <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>                        Pilih paket yang sesuai dengan kebutuhanmu. Semua paket sudah termasuk akses penuh ke seluruh fitur platform                                Mulai Gratis Sekarang                                Mulai Gratis Sekarang

                    </div>

                    <p class="text-gray-400 leading-relaxed mb-6">                    </p>

                        Platform tryout online terpercaya untuk persiapan CPNS & PPPK. Wujudkan impian ASNmu bersama kami!

                    </p>                </div>                            </a>                            </a>

                    <div class="flex space-x-4">

                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                            <i class="fab fa-facebook-f"></i>

                        </a>                <!-- Pricing Cards -->                        @endauth                        @endauth

                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                            <i class="fab fa-instagram"></i>                <div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                        </a>

                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">                    <!-- Basic Plan -->                        <a href="#features" class="glass-morphism text-white hover:bg-white/20 px-8 py-4 rounded-xl font-bold text-lg transition-all">                        <a href="#features" class="glass-morphism text-white hover:bg-white/20 px-8 py-4 rounded-xl font-bold text-lg transition-all">

                            <i class="fab fa-youtube"></i>

                        </a>                    <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">

                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                            <i class="fab fa-telegram"></i>                        <div class="text-center mb-8">                            <i class="fas fa-play mr-2"></i>                            <i class="fas fa-play mr-2"></i>

                        </a>

                    </div>                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Basic</h3>

                </div>

                                            <div class="text-4xl font-black text-gray-900 mb-2">GRATIS</div>                            Lihat Demo                            Lihat Demo

                <!-- Quick Links -->

                <div>                            <p class="text-gray-600">Untuk memulai persiapan</p>

                    <h3 class="font-bold text-lg mb-6">Menu Utama</h3>

                    <ul class="space-y-3">                        </div>                        </a>                        </a>

                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>

                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Harga</a></li>

                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors">Testimoni</a></li>

                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Login</a></li>                        <ul class="space-y-4 mb-8">                    </div>                    </div>

                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Daftar</a></li>

                    </ul>                            <li class="flex items-center">

                </div>

                                                <i class="fas fa-check text-green-500 mr-3"></i>

                <!-- Support -->

                <div>                                <span class="text-gray-700">100 Soal latihan gratis</span>

                    <h3 class="font-bold text-lg mb-6">Bantuan</h3>

                    <ul class="space-y-3">                            </li>                    <!-- Stats -->                    <!-- Stats -->

                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>

                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan</a></li>                            <li class="flex items-center">

                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>

                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>                                <i class="fas fa-check text-green-500 mr-3"></i>                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">

                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>

                    </ul>                                <span class="text-gray-700">5 Tryout gratis per bulan</span>

                </div>

                                            </li>                        <div class="text-center">                        <div class="text-center">

                <!-- Contact -->

                <div>                            <li class="flex items-center">

                    <h3 class="font-bold text-lg mb-6">Hubungi Kami</h3>

                    <ul class="space-y-4">                                <i class="fas fa-check text-green-500 mr-3"></i>                            <div class="text-3xl font-black text-white mb-2">10K+</div>                            <div class="text-3xl font-black text-white mb-2">10K+</div>

                        <li class="flex items-center">

                            <i class="fas fa-envelope text-blue-400 mr-3"></i>                                <span class="text-gray-700">Akses materi dasar</span>

                            <span class="text-gray-400">support@tryoutasnku.com</span>

                        </li>                            </li>                            <div class="text-blue-200 text-sm">Soal Tersedia</div>                            <div class="text-blue-200 text-sm">Soal Tersedia</div>

                        <li class="flex items-center">

                            <i class="fas fa-phone text-blue-400 mr-3"></i>                            <li class="flex items-center text-gray-400">

                            <span class="text-gray-400">+62 812-3456-7890</span>

                        </li>                                <i class="fas fa-times mr-3"></i>                        </div>                        </div>

                        <li class="flex items-center">

                            <i class="fas fa-map-marker-alt text-blue-400 mr-3"></i>                                <span>Pembahasan detail</span>

                            <span class="text-gray-400">Jakarta, Indonesia</span>

                        </li>                            </li>                        <div class="text-center">                        <div class="text-center">

                    </ul>

                </div>                            <li class="flex items-center text-gray-400">

            </div>

                                            <i class="fas fa-times mr-3"></i>                            <div class="text-3xl font-black text-white mb-2">5K+</div>                            <div class="text-3xl font-black text-white mb-2">5K+</div>

            <!-- Bottom Bar -->

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">                                <span>Analisis performa</span>

                <p class="text-gray-400">

                    © 2024 TryOut ASNku. All rights reserved. Made with ❤️ for future ASN Indonesia.                            </li>                            <div class="text-blue-200 text-sm">Peserta Aktif</div>                            <div class="text-blue-200 text-sm">Peserta Aktif</div>

                </p>

            </div>                        </ul>

        </div>

    </footer>                                                </div>                        </div>



    <!-- Floating Action Button -->                        <a href="{{ route('register') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-4 rounded-xl font-bold text-center block transition-colors">

    <div class="fixed bottom-6 right-6 z-50">

        <a href="https://wa.me/6281234567890" target="_blank"                             Mulai Gratis                        <div class="text-center">                        <div class="text-center">

           class="w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all transform hover:scale-110">

            <i class="fab fa-whatsapp text-white text-2xl"></i>                        </a>

        </a>

    </div>                    </div>                            <div class="text-3xl font-black text-white mb-2">98%</div>                            <div class="text-3xl font-black text-white mb-2">98%</div>



    <!-- Mobile Menu -->

    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40">

        <div class="grid grid-cols-4 gap-1 p-2">                    <!-- Premium Plan -->                            <div class="text-blue-200 text-sm">Tingkat Kepuasan</div>                            <div class="text-blue-200 text-sm">Tingkat Kepuasan</div>

            <a href="#features" class="text-center py-2">

                <i class="fas fa-star text-blue-600 mb-1"></i>                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 border border-blue-500 rounded-3xl p-8 relative transform scale-105 shadow-2xl">

                <div class="text-xs text-gray-600">Fitur</div>

            </a>                        <!-- Popular Badge -->                        </div>                        </div>

            <a href="#pricing" class="text-center py-2">

                <i class="fas fa-gem text-orange-600 mb-1"></i>                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">

                <div class="text-xs text-gray-600">Harga</div>

            </a>                            <div class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold">                        <div class="text-center">                        <div class="text-center">

            <a href="#testimonials" class="text-center py-2">

                <i class="fas fa-users text-green-600 mb-1"></i>                                TERPOPULER ✨

                <div class="text-xs text-gray-600">Testimoni</div>

            </a>                            </div>                            <div class="text-3xl font-black text-white mb-2">1K+</div>                            <div class="text-3xl font-black text-white mb-2">1K+</div>

            @auth

                <a href="{{ url('/dashboard') }}" class="text-center py-2">                        </div>

                    <i class="fas fa-tachometer-alt text-purple-600 mb-1"></i>

                    <div class="text-xs text-gray-600">Dashboard</div>                                                    <div class="text-blue-200 text-sm">Lulus ASN</div>                            <div class="text-blue-200 text-sm">Lulus ASN</div>

                </a>

            @else                        <div class="text-center mb-8">

                <a href="{{ route('register') }}" class="text-center py-2">

                    <i class="fas fa-user-plus text-purple-600 mb-1"></i>                            <h3 class="text-2xl font-bold text-white mb-4">Paket Premium</h3>                        </div>                        </div>

                    <div class="text-xs text-gray-600">Daftar</div>

                </a>                            <div class="text-4xl font-black text-white mb-2">Rp 99K</div>

            @endauth

        </div>                            <p class="text-blue-200">Per bulan</p>                    </div>                    </div>

    </div>

                        </div>

    <script>

        // Smooth scrolling                                        </div>                </div>

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {

            anchor.addEventListener('click', function (e) {                        <ul class="space-y-4 mb-8">

                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({                            <li class="flex items-center">            </div>            </div>

                    behavior: 'smooth'

                });                                <i class="fas fa-check text-green-300 mr-3"></i>

            });

        });                                <span class="text-white">10,000+ Soal premium</span>

        

        // Navbar scroll effect                            </li>

        window.addEventListener('scroll', function() {

            const nav = document.querySelector('nav');                            <li class="flex items-center">            <!-- Scroll Indicator -->            <!-- Scroll Indicator -->

            if (window.scrollY > 100) {

                nav.classList.add('bg-white/95');                                <i class="fas fa-check text-green-300 mr-3"></i>

                nav.classList.remove('bg-white/80');

            } else {                                <span class="text-white">Tryout unlimited</span>            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">

                nav.classList.add('bg-white/80');

                nav.classList.remove('bg-white/95');                            </li>

            }

        });                            <li class="flex items-center">                <i class="fas fa-chevron-down text-2xl"></i>                <i class="fas fa-chevron-down text-2xl"></i>

    </script>

</body>                                <i class="fas fa-check text-green-300 mr-3"></i>

</html>
                                <span class="text-white">Pembahasan detail</span>            </div>            </div>

                            </li>

                            <li class="flex items-center">        </section>        </section>

                                <i class="fas fa-check text-green-300 mr-3"></i>

                                <span class="text-white">Analisis performa mendalam</span>

                            </li>

                            <li class="flex items-center">        <!-- Features Section -->        <!-- Features Section -->

                                <i class="fas fa-check text-green-300 mr-3"></i>

                                <span class="text-white">Update soal terbaru</span>        <section id="features" class="py-20 bg-white">        <section id="features" class="py-20 bg-white">

                            </li>

                        </ul>            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">



                        <a href="{{ route('register') }}" class="w-full bg-white hover:bg-gray-100 text-blue-700 py-4 rounded-xl font-bold text-center block transition-colors">                <!-- Section Header -->                <!-- Section Header -->

                            Berlangganan Sekarang

                        </a>                <div class="text-center mb-16">                <div class="text-center mb-16">

                    </div>

                                        <div class="inline-flex items-center bg-blue-50 px-4 py-2 rounded-full text-blue-600 font-medium mb-6">                    <div class="inline-flex items-center bg-blue-50 px-4 py-2 rounded-full text-blue-600 font-medium mb-6">

                    <!-- Pro Plan -->

                    <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">                        <i class="fas fa-star mr-2"></i>                        <i class="fas fa-star mr-2"></i>

                        <div class="text-center mb-8">

                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Pro</h3>                        Fitur Unggulan                        Fitur Unggulan

                            <div class="text-4xl font-black text-gray-900 mb-2">Rp 199K</div>

                            <p class="text-gray-600">Per 3 bulan</p>                    </div>                    </div>

                        </div>

                                            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

                        <ul class="space-y-4 mb-8">

                            <li class="flex items-center">                        Semua yang Kamu Butuhkan untuk                         Semua yang Kamu Butuhkan untuk

                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Semua fitur Premium</span>                        <span class="text-gradient">Sukses ASN</span>                        <span class="text-gradient">Sukses ASN</span>

                            </li>

                            <li class="flex items-center">                    </h2>                    </h2>

                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Konsultasi mentor 1-on-1</span>                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                            </li>

                            <li class="flex items-center">                        Platform komprehensif dengan fitur-fitur canggih yang dirancang khusus untuk membantu calon ASN meraih impiannya                        Platform komprehensif dengan fitur-fitur canggih yang dirancang khusus untuk membantu calon ASN meraih impiannya

                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Simulasi interview</span>                    </p>                    </p>

                            </li>

                            <li class="flex items-center">                </div>                </div>

                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Prediksi passing grade</span>

                            </li>

                            <li class="flex items-center">                <!-- Features Grid -->                <!-- Features Grid -->

                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Priority support</span>                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                            </li>

                        </ul>                    <!-- Feature 1 -->                    <!-- Feature 1 -->



                        <a href="{{ route('register') }}" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-4 rounded-xl font-bold text-center block transition-colors">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-2">

                            Upgrade ke Pro

                        </a>                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                    </div>

                </div>                            <i class="fas fa-brain text-white text-2xl"></i>                            <i class="fas fa-brain text-white text-2xl"></i>

            </div>

        </section>                        </div>                        </div>



        <!-- Testimonials Section -->                        <h3 class="text-xl font-bold text-gray-900 mb-4">10,000+ Soal Premium</h3>                        <h3 class="text-xl font-bold text-gray-900 mb-4">10,000+ Soal Premium</h3>

        <section id="testimonials" class="py-20 bg-white">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">                        <p class="text-gray-600 leading-relaxed">                        <p class="text-gray-600 leading-relaxed">

                <!-- Section Header -->

                <div class="text-center mb-16">                            Koleksi soal terlengkap dengan pembahasan detail untuk semua kategori CPNS & PPPK                            Koleksi soal terlengkap dengan pembahasan detail untuk semua kategori CPNS & PPPK

                    <div class="inline-flex items-center bg-green-50 px-4 py-2 rounded-full text-green-600 font-medium mb-6">

                        <i class="fas fa-users mr-2"></i>                        </p>                        </p>

                        Testimoni Alumni

                    </div>                    </div>                    </div>

                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

                        Mereka Berhasil,

                        <span class="text-gradient">Kamu Juga Bisa!</span>

                    </h2>                    <!-- Feature 2 -->                    <!-- Feature 2 -->

                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                        Ribuan alumni TryOut ASNku telah berhasil lolos seleksi ASN di berbagai instansi. Inilah cerita mereka!                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-orange-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-orange-200 transition-all duration-300 transform hover:-translate-y-2">

                    </p>

                </div>                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">



                <!-- Testimonials Grid -->                            <i class="fas fa-stopwatch text-white text-2xl"></i>                            <i class="fas fa-stopwatch text-white text-2xl"></i>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Testimonial 1 -->                        </div>                        </div>

                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                        <div class="flex items-center mb-6">                        <h3 class="text-xl font-bold text-gray-900 mb-4">Simulasi Real-Time</h3>                        <h3 class="text-xl font-bold text-gray-900 mb-4">Simulasi Real-Time</h3>

                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b77c?w=64&h=64&fit=crop&crop=face"

                                 alt="Sarah" class="w-16 h-16 rounded-full object-cover mr-4">                        <p class="text-gray-600 leading-relaxed">                        <p class="text-gray-600 leading-relaxed">

                            <div>

                                <h4 class="font-bold text-gray-900">Sarah Putri</h4>                            Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat                            Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat

                                <p class="text-gray-600 text-sm">Lolos CPNS Kemenkeu 2024</p>

                            </div>                        </p>                        </p>

                        </div>

                        <div class="flex text-yellow-400 mb-4">                    </div>                    </div>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                    <!-- Feature 3 -->                    <!-- Feature 3 -->

                            <i class="fas fa-star"></i>

                        </div>                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-green-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-green-200 transition-all duration-300 transform hover:-translate-y-2">

                        <p class="text-gray-700 leading-relaxed">

                            "Platform ini luar biasa! Soal-soalnya persis seperti ujian asli. Berkat TryOut ASNku, saya berhasil lolos CPNS Kemenkeu dengan ranking 5 besar!"                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                        </p>

                    </div>                            <i class="fas fa-chart-line text-white text-2xl"></i>                            <i class="fas fa-chart-line text-white text-2xl"></i>



                    <!-- Testimonial 2 -->                        </div>                        </div>

                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                        <div class="flex items-center mb-6">                        <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Performa</h3>                        <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Performa</h3>

                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&crop=face"

                                 alt="Ahmad" class="w-16 h-16 rounded-full object-cover mr-4">                        <p class="text-gray-600 leading-relaxed">                        <p class="text-gray-600 leading-relaxed">

                            <div>

                                <h4 class="font-bold text-gray-900">Ahmad Rizki</h4>                            Laporan detail kemampuanmu dengan rekomendasi materi yang perlu diperdalam                            Laporan detail kemampuanmu dengan rekomendasi materi yang perlu diperdalam

                                <p class="text-gray-600 text-sm">Lolos PPPK Guru 2024</p>

                            </div>                        </p>                        </p>

                        </div>

                        <div class="flex text-yellow-400 mb-4">                    </div>                    </div>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                    <!-- Feature 4 -->                    <!-- Feature 4 -->

                            <i class="fas fa-star"></i>

                        </div>                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-2">

                        <p class="text-gray-700 leading-relaxed">

                            "Analisis performanya sangat membantu untuk tahu kelemahan saya. Materinya juga update sesuai kisi-kisi terbaru. Recommended banget!"                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                        </p>

                    </div>                            <i class="fas fa-trophy text-white text-2xl"></i>                            <i class="fas fa-trophy text-white text-2xl"></i>



                    <!-- Testimonial 3 -->                        </div>                        </div>

                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                        <div class="flex items-center mb-6">                        <h3 class="text-xl font-bold text-gray-900 mb-4">Sistem Ranking</h3>                        <h3 class="text-xl font-bold text-gray-900 mb-4">Sistem Ranking</h3>

                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=64&h=64&fit=crop&crop=face"

                                 alt="Maya" class="w-16 h-16 rounded-full object-cover mr-4">                        <p class="text-gray-600 leading-relaxed">                        <p class="text-gray-600 leading-relaxed">

                            <div>

                                <h4 class="font-bold text-gray-900">Maya Sari</h4>                            Kompetisi sehat dengan peserta lain untuk memotivasi belajar lebih giat                            Kompetisi sehat dengan peserta lain untuk memotivasi belajar lebih giat

                                <p class="text-gray-600 text-sm">Lolos CPNS Kemendikbud 2024</p>

                            </div>                        </p>                        </p>

                        </div>

                        <div class="flex text-yellow-400 mb-4">                    </div>                    </div>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                    <!-- Feature 5 -->                    <!-- Feature 5 -->

                            <i class="fas fa-star"></i>

                        </div>                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2">

                        <p class="text-gray-700 leading-relaxed">

                            "Interface-nya user friendly, soalnya berkualitas tinggi. Sistem rankingnya juga memotivasi untuk terus belajar. Terima kasih TryOut ASNku!"                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                        </p>

                    </div>                            <i class="fas fa-book-open text-white text-2xl"></i>                            <i class="fas fa-book-open text-white text-2xl"></i>

                </div>

            </div>                        </div>                        </div>

        </section>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Materi Lengkap</h3>                        <h3 class="text-xl font-bold text-gray-900 mb-4">Materi Lengkap</h3>

        <!-- CTA Section -->

        <section class="py-20 gradient-bg relative overflow-hidden">                        <p class="text-gray-600 leading-relaxed">                        <p class="text-gray-600 leading-relaxed">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

                <!-- Floating Elements -->                            Ringkasan materi terkini sesuai kisi-kisi resmi dari berbagai instansi                            Ringkasan materi terkini sesuai kisi-kisi resmi dari berbagai instansi

                <div class="absolute inset-0 overflow-hidden pointer-events-none">

                    <div class="floating-animation absolute top-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>                        </p>                        </p>

                    <div class="floating-animation absolute bottom-10 left-10 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1.5s;"></div>

                </div>                    </div>                    </div>



                <div class="max-w-4xl mx-auto">

                    <h2 class="text-4xl md:text-6xl font-black text-white mb-6">

                        Siap Menjadi                     <!-- Feature 6 -->                    <!-- Feature 6 -->

                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">

                            ASN Impianmu?                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-2">                    <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-2">

                        </span>

                    </h2>                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">

                    <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">

                        Bergabunglah dengan ribuan calon ASN yang telah mempercayai TryOut ASNku sebagai partner belajar terbaik mereka                            <i class="fas fa-mobile-alt text-white text-2xl"></i>                            <i class="fas fa-mobile-alt text-white text-2xl"></i>

                    </p>

                                            </div>                        </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">

                        @auth                        <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Mobile</h3>                        <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Mobile</h3>

                            <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

                                <i class="fas fa-rocket mr-2"></i>                        <p class="text-gray-600 leading-relaxed">                        <p class="text-gray-600 leading-relaxed">

                                Mulai Belajar Sekarang

                            </a>                            Belajar kapan saja, di mana saja dengan platform yang responsif di semua device                            Belajar kapan saja, di mana saja dengan platform yang responsif di semua device

                        @else

                            <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                        </p>                        </p>

                                <i class="fas fa-rocket mr-2"></i>

                                Daftar Gratis Hari Ini                    </div>                    </div>

                            </a>

                        @endauth                </div>                </div>

                        <div class="flex items-center text-white">

                            <i class="fas fa-shield-alt mr-2"></i>            </div>            </div>

                            <span class="font-medium">Garansi 30 Hari Uang Kembali</span>

                        </div>        </section>        </section>

                    </div>



                    <!-- Trust Indicators -->

                    <div class="flex flex-wrap justify-center items-center gap-8 text-blue-200">        <!-- Pricing Section -->        <!-- Pricing Section -->

                        <div class="flex items-center">

                            <i class="fas fa-check-circle mr-2"></i>        <section id="pricing" class="py-20 bg-gray-50">        <section id="pricing" class="py-20 bg-gray-50">

                            <span>SSL Secured</span>

                        </div>            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        <div class="flex items-center">

                            <i class="fas fa-users mr-2"></i>                <!-- Section Header -->                <!-- Section Header -->

                            <span>5,000+ Member Aktif</span>

                        </div>                <div class="text-center mb-16">                <div class="text-center mb-16">

                        <div class="flex items-center">

                            <i class="fas fa-star mr-2"></i>                    <div class="inline-flex items-center bg-orange-50 px-4 py-2 rounded-full text-orange-600 font-medium mb-6">                    <div class="inline-flex items-center bg-orange-50 px-4 py-2 rounded-full text-orange-600 font-medium mb-6">

                            <span>Rating 4.9/5</span>

                        </div>                        <i class="fas fa-gem mr-2"></i>                        <i class="fas fa-gem mr-2"></i>

                    </div>

                </div>                        Paket Premium                        Paket Premium

            </div>

        </section>                    </div>                    </div>



        <!-- Footer -->                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

        <footer id="contact" class="bg-gray-900 text-white py-16">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">                        Investasi Terbaik untuk                         Investasi Terbaik untuk

                <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">

                    <!-- Company Info -->                        <span class="text-gradient">Masa Depanmu</span>                        <span class="text-gradient">Masa Depanmu</span>

                    <div>

                        <div class="flex items-center space-x-3 mb-6">                    </h2>                    </h2>

                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">

                                <i class="fas fa-graduation-cap text-white text-xl"></i>                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                            </div>

                            <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>                        Pilih paket yang sesuai dengan kebutuhanmu. Semua paket sudah termasuk akses penuh ke seluruh fitur platform                        Pilih paket yang sesuai dengan kebutuhanmu. Semua paket sudah termasuk akses penuh ke seluruh fitur platform

                        </div>

                        <p class="text-gray-400 leading-relaxed mb-6">                    </p>                    </p>

                            Platform tryout online terpercaya untuk persiapan CPNS & PPPK. Wujudkan impian ASNmu bersama kami!

                        </p>                </div>                </div>

                        <div class="flex space-x-4">

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-facebook-f"></i>

                            </a>                <!-- Pricing Cards -->                <!-- Pricing Cards -->

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-instagram"></i>                <div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto">                <div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                            </a>

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">                    <!-- Basic Plan -->                    <!-- Basic Plan -->

                                <i class="fab fa-youtube"></i>

                            </a>                    <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">                    <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-telegram"></i>                        <div class="text-center mb-8">                        <div class="text-center mb-8">

                            </a>

                        </div>                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Basic</h3>                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Basic</h3>

                    </div>

                                                <div class="text-4xl font-black text-gray-900 mb-2">GRATIS</div>                            <div class="text-4xl font-black text-gray-900 mb-2">GRATIS</div>

                    <!-- Quick Links -->

                    <div>                            <p class="text-gray-600">Untuk memulai persiapan</p>                            <p class="text-gray-600">Untuk memulai persiapan</p>

                        <h3 class="font-bold text-lg mb-6">Menu Utama</h3>

                        <ul class="space-y-3">                        </div>                        </div>

                            <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>

                            <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Harga</a></li>

                            <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors">Testimoni</a></li>

                            <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Login</a></li>                        <ul class="space-y-4 mb-8">                        <ul class="space-y-4 mb-8">

                            <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Daftar</a></li>

                        </ul>                            <li class="flex items-center">                            <li class="flex items-center">

                    </div>

                                                    <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                    <!-- Support -->

                    <div>                                <span class="text-gray-700">100 Soal latihan gratis</span>                                <span class="text-gray-700">100 Soal latihan gratis</span>

                        <h3 class="font-bold text-lg mb-6">Bantuan</h3>

                        <ul class="space-y-3">                            </li>                            </li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan</a></li>                            <li class="flex items-center">                            <li class="flex items-center">

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>

                        </ul>                                <span class="text-gray-700">5 Tryout gratis per bulan</span>                                <span class="text-gray-700">5 Tryout gratis per bulan</span>

                    </div>

                                                </li>                            </li>

                    <!-- Contact -->

                    <div>                            <li class="flex items-center">                            <li class="flex items-center">

                        <h3 class="font-bold text-lg mb-6">Hubungi Kami</h3>

                        <ul class="space-y-4">                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                            <li class="flex items-center">

                                <i class="fas fa-envelope text-blue-400 mr-3"></i>                                <span class="text-gray-700">Akses materi dasar</span>                                <span class="text-gray-700">Akses materi dasar</span>

                                <span class="text-gray-400">support@tryoutasnku.com</span>

                            </li>                            </li>                            </li>

                            <li class="flex items-center">

                                <i class="fas fa-phone text-blue-400 mr-3"></i>                            <li class="flex items-center text-gray-400">                            <li class="flex items-center text-gray-400">

                                <span class="text-gray-400">+62 812-3456-7890</span>

                            </li>                                <i class="fas fa-times mr-3"></i>                                <i class="fas fa-times mr-3"></i>

                            <li class="flex items-center">

                                <i class="fas fa-map-marker-alt text-blue-400 mr-3"></i>                                <span>Pembahasan detail</span>                                <span>Pembahasan detail</span>

                                <span class="text-gray-400">Jakarta, Indonesia</span>

                            </li>                            </li>                            </li>

                        </ul>

                    </div>                            <li class="flex items-center text-gray-400">                            <li class="flex items-center text-gray-400">

                </div>

                                                <i class="fas fa-times mr-3"></i>                                <i class="fas fa-times mr-3"></i>

                <!-- Bottom Bar -->

                <div class="border-t border-gray-800 mt-12 pt-8 text-center">                                <span>Analisis performa</span>                                <span>Analisis performa</span>

                    <p class="text-gray-400">

                        © 2024 TryOut ASNku. All rights reserved. Made with ❤️ for future ASN Indonesia.                            </li>                            </li>

                    </p>

                </div>                        </ul>                        </ul>

            </div>

        </footer>



        <!-- Floating Action Button -->                        <a href="{{ route('register') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-4 rounded-xl font-bold text-center block transition-colors">                        <a href="{{ route('register') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-4 rounded-xl font-bold text-center block transition-colors">

        <div class="fixed bottom-6 right-6 z-50">

            <a href="https://wa.me/6281234567890" target="_blank"                             Mulai Gratis                            Mulai Gratis

               class="w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all transform hover:scale-110">

                <i class="fab fa-whatsapp text-white text-2xl"></i>                        </a>                        </a>

            </a>

        </div>                    </div>                    </div>



        <!-- Mobile Menu -->

        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40 pb-safe">

            <div class="grid grid-cols-4 gap-1 p-2">                    <!-- Premium Plan -->                    <!-- Premium Plan -->

                <a href="#features" class="text-center py-2">

                    <i class="fas fa-star text-blue-600 mb-1"></i>                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 border border-blue-500 rounded-3xl p-8 relative transform scale-105 shadow-2xl">                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 border border-blue-500 rounded-3xl p-8 relative transform scale-105 shadow-2xl">

                    <div class="text-xs text-gray-600">Fitur</div>

                </a>                        <!-- Popular Badge -->                        <!-- Popular Badge -->

                <a href="#pricing" class="text-center py-2">

                    <i class="fas fa-gem text-orange-600 mb-1"></i>                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">

                    <div class="text-xs text-gray-600">Harga</div>

                </a>                            <div class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold">                            <div class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold">

                <a href="#testimonials" class="text-center py-2">

                    <i class="fas fa-users text-green-600 mb-1"></i>                                TERPOPULER ✨                                TERPOPULER ✨

                    <div class="text-xs text-gray-600">Testimoni</div>

                </a>                            </div>                            </div>

                @auth

                    <a href="{{ url('/dashboard') }}" class="text-center py-2">                        </div>                        </div>

                        <i class="fas fa-tachometer-alt text-purple-600 mb-1"></i>

                        <div class="text-xs text-gray-600">Dashboard</div>

                    </a>

                @else                        <div class="text-center mb-8">                        <div class="text-center mb-8">

                    <a href="{{ route('register') }}" class="text-center py-2">

                        <i class="fas fa-user-plus text-purple-600 mb-1"></i>                            <h3 class="text-2xl font-bold text-white mb-4">Paket Premium</h3>                            <h3 class="text-2xl font-bold text-white mb-4">Paket Premium</h3>

                        <div class="text-xs text-gray-600">Daftar</div>

                    </a>                            <div class="text-4xl font-black text-white mb-2">Rp 99K</div>                            <div class="text-4xl font-black text-white mb-2">Rp 99K</div>

                @endauth

            </div>                            <p class="text-blue-200">Per bulan</p>                            <p class="text-blue-200">Per bulan</p>

        </div>

                        </div>                        </div>

        <script>

            // Smooth scrolling

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {

                anchor.addEventListener('click', function (e) {                        <ul class="space-y-4 mb-8">                        <ul class="space-y-4 mb-8">

                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({                            <li class="flex items-center">                            <li class="flex items-center">

                        behavior: 'smooth'

                    });                                <i class="fas fa-check text-green-300 mr-3"></i>                                <i class="fas fa-check text-green-300 mr-3"></i>

                });

            });                                <span class="text-white">10,000+ Soal premium</span>                                <span class="text-white">10,000+ Soal premium</span>



            // Navbar scroll effect                            </li>                            </li>

            window.addEventListener('scroll', function() {

                const nav = document.querySelector('nav');                            <li class="flex items-center">                            <li class="flex items-center">

                if (window.scrollY > 100) {

                    nav.classList.add('bg-white/95');                                <i class="fas fa-check text-green-300 mr-3"></i>                                <i class="fas fa-check text-green-300 mr-3"></i>

                    nav.classList.remove('bg-white/80');

                } else {                                <span class="text-white">Tryout unlimited</span>                                <span class="text-white">Tryout unlimited</span>

                    nav.classList.add('bg-white/80');

                    nav.classList.remove('bg-white/95');                            </li>                            </li>

                }

            });                            <li class="flex items-center">                            <li class="flex items-center">

        </script>

    </body>                                <i class="fas fa-check text-green-300 mr-3"></i>                                <i class="fas fa-check text-green-300 mr-3"></i>

</html>
                                <span class="text-white">Pembahasan detail</span>                                <span class="text-white">Pembahasan detail</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-300 mr-3"></i>                                <i class="fas fa-check text-green-300 mr-3"></i>

                                <span class="text-white">Analisis performa mendalam</span>                                <span class="text-white">Analisis performa mendalam</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-300 mr-3"></i>                                <i class="fas fa-check text-green-300 mr-3"></i>

                                <span class="text-white">Update soal terbaru</span>                                <span class="text-white">Update soal terbaru</span>

                            </li>                            </li>

                        </ul>                        </ul>



                        <a href="{{ route('register') }}" class="w-full bg-white hover:bg-gray-100 text-blue-700 py-4 rounded-xl font-bold text-center block transition-colors">                        <a href="{{ route('register') }}" class="w-full bg-white hover:bg-gray-100 text-blue-700 py-4 rounded-xl font-bold text-center block transition-colors">

                            Berlangganan Sekarang                            Berlangganan Sekarang

                        </a>                        </a>

                    </div>                    </div>



                    <!-- Pro Plan -->                    <!-- Pro Plan -->

                    <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">                    <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">

                        <div class="text-center mb-8">                        <div class="text-center mb-8">

                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Pro</h3>                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Pro</h3>

                            <div class="text-4xl font-black text-gray-900 mb-2">Rp 199K</div>                            <div class="text-4xl font-black text-gray-900 mb-2">Rp 199K</div>

                            <p class="text-gray-600">Per 3 bulan</p>                            <p class="text-gray-600">Per 3 bulan</p>

                        </div>                        </div>



                        <ul class="space-y-4 mb-8">                        <ul class="space-y-4 mb-8">

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Semua fitur Premium</span>                                <span class="text-gray-700">Semua fitur Premium</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Konsultasi mentor 1-on-1</span>                                <span class="text-gray-700">Konsultasi mentor 1-on-1</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Simulasi interview</span>                                <span class="text-gray-700">Simulasi interview</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Prediksi passing grade</span>                                <span class="text-gray-700">Prediksi passing grade</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-check text-green-500 mr-3"></i>                                <i class="fas fa-check text-green-500 mr-3"></i>

                                <span class="text-gray-700">Priority support</span>                                <span class="text-gray-700">Priority support</span>

                            </li>                            </li>

                        </ul>                        </ul>



                        <a href="{{ route('register') }}" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-4 rounded-xl font-bold text-center block transition-colors">                        <a href="{{ route('register') }}" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-4 rounded-xl font-bold text-center block transition-colors">

                            Upgrade ke Pro                            Upgrade ke Pro

                        </a>                        </a>

                    </div>                    </div>

                </div>                </div>

            </div>            </div>

        </section>        </section>



        <!-- Testimonials Section -->        <!-- Testimonials Section -->

        <section id="testimonials" class="py-20 bg-white">        <section id="testimonials" class="py-20 bg-white">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Section Header -->                <!-- Section Header -->

                <div class="text-center mb-16">                <div class="text-center mb-16">

                    <div class="inline-flex items-center bg-green-50 px-4 py-2 rounded-full text-green-600 font-medium mb-6">                    <div class="inline-flex items-center bg-green-50 px-4 py-2 rounded-full text-green-600 font-medium mb-6">

                        <i class="fas fa-users mr-2"></i>                        <i class="fas fa-users mr-2"></i>

                        Testimoni Alumni                        Testimoni Alumni

                    </div>                    </div>

                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">

                        Mereka Berhasil,                         Mereka Berhasil,

                        <span class="text-gradient">Kamu Juga Bisa!</span>                        <span class="text-gradient">Kamu Juga Bisa!</span>

                    </h2>                    </h2>

                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">

                        Ribuan alumni TryOut ASNku telah berhasil lolos seleksi ASN di berbagai instansi. Inilah cerita mereka!                        Ribuan alumni TryOut ASNku telah berhasil lolos seleksi ASN di berbagai instansi. Inilah cerita mereka!

                    </p>                    </p>

                </div>                </div>



                <!-- Testimonials Grid -->                <!-- Testimonials Grid -->

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Testimonial 1 -->                    <!-- Testimonial 1 -->

                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                        <div class="flex items-center mb-6">                        <div class="flex items-center mb-6">

                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b77c?w=64&h=64&fit=crop&crop=face"                             <img src="https://images.unsplash.com/photo-1494790108755-2616b612b77c?w=64&h=64&fit=crop&crop=face"

                                 alt="Sarah" class="w-16 h-16 rounded-full object-cover mr-4">                                 alt="Sarah" class="w-16 h-16 rounded-full object-cover mr-4">

                            <div>                            <div>

                                <h4 class="font-bold text-gray-900">Sarah Putri</h4>                                <h4 class="font-bold text-gray-900">Sarah Putri</h4>

                                <p class="text-gray-600 text-sm">Lolos CPNS Kemenkeu 2024</p>                                <p class="text-gray-600 text-sm">Lolos CPNS Kemenkeu 2024</p>

                            </div>                            </div>

                        </div>                        </div>

                        <div class="flex text-yellow-400 mb-4">                        <div class="flex text-yellow-400 mb-4">

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                        </div>                        </div>

                        <p class="text-gray-700 leading-relaxed">                        <p class="text-gray-700 leading-relaxed">

                            "Platform ini luar biasa! Soal-soalnya persis seperti ujian asli. Berkat TryOut ASNku, saya berhasil lolos CPNS Kemenkeu dengan ranking 5 besar!"                            "Platform ini luar biasa! Soal-soalnya persis seperti ujian asli. Berkat TryOut ASNku, saya berhasil lolos CPNS Kemenkeu dengan ranking 5 besar!"

                        </p>                        </p>

                    </div>                    </div>



                    <!-- Testimonial 2 -->                    <!-- Testimonial 2 -->

                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                        <div class="flex items-center mb-6">                        <div class="flex items-center mb-6">

                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&crop=face"                             <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&crop=face"

                                 alt="Ahmad" class="w-16 h-16 rounded-full object-cover mr-4">                                 alt="Ahmad" class="w-16 h-16 rounded-full object-cover mr-4">

                            <div>                            <div>

                                <h4 class="font-bold text-gray-900">Ahmad Rizki</h4>                                <h4 class="font-bold text-gray-900">Ahmad Rizki</h4>

                                <p class="text-gray-600 text-sm">Lolos PPPK Guru 2024</p>                                <p class="text-gray-600 text-sm">Lolos PPPK Guru 2024</p>

                            </div>                            </div>

                        </div>                        </div>

                        <div class="flex text-yellow-400 mb-4">                        <div class="flex text-yellow-400 mb-4">

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                        </div>                        </div>

                        <p class="text-gray-700 leading-relaxed">                        <p class="text-gray-700 leading-relaxed">

                            "Analisis performanya sangat membantu untuk tahu kelemahan saya. Materinya juga update sesuai kisi-kisi terbaru. Recommended banget!"                            "Analisis performanya sangat membantu untuk tahu kelemahan saya. Materinya juga update sesuai kisi-kisi terbaru. Recommended banget!"

                        </p>                        </p>

                    </div>                    </div>



                    <!-- Testimonial 3 -->                    <!-- Testimonial 3 -->

                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">

                        <div class="flex items-center mb-6">                        <div class="flex items-center mb-6">

                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=64&h=64&fit=crop&crop=face"                             <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=64&h=64&fit=crop&crop=face"

                                 alt="Maya" class="w-16 h-16 rounded-full object-cover mr-4">                                 alt="Maya" class="w-16 h-16 rounded-full object-cover mr-4">

                            <div>                            <div>

                                <h4 class="font-bold text-gray-900">Maya Sari</h4>                                <h4 class="font-bold text-gray-900">Maya Sari</h4>

                                <p class="text-gray-600 text-sm">Lolos CPNS Kemendikbud 2024</p>                                <p class="text-gray-600 text-sm">Lolos CPNS Kemendikbud 2024</p>

                            </div>                            </div>

                        </div>                        </div>

                        <div class="flex text-yellow-400 mb-4">                        <div class="flex text-yellow-400 mb-4">

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                            <i class="fas fa-star"></i>                            <i class="fas fa-star"></i>

                        </div>                        </div>

                        <p class="text-gray-700 leading-relaxed">                        <p class="text-gray-700 leading-relaxed">

                            "Interface-nya user friendly, soalnya berkualitas tinggi. Sistem rankingnya juga memotivasi untuk terus belajar. Terima kasih TryOut ASNku!"                            "Interface-nya user friendly, soalnya berkualitas tinggi. Sistem rankingnya juga memotivasi untuk terus belajar. Terima kasih TryOut ASNku!"

                        </p>                        </p>

                    </div>                    </div>

                </div>                </div>

            </div>            </div>

        </section>        </section>



        <!-- CTA Section -->        <!-- CTA Section -->

        <section class="py-20 gradient-bg relative overflow-hidden">        <section class="py-20 gradient-bg relative overflow-hidden">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

                <!-- Floating Elements -->                <!-- Floating Elements -->

                <div class="absolute inset-0 overflow-hidden pointer-events-none">                <div class="absolute inset-0 overflow-hidden pointer-events-none">

                    <div class="floating-animation absolute top-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>                    <div class="floating-animation absolute top-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>

                    <div class="floating-animation absolute bottom-10 left-10 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1.5s;"></div>                    <div class="floating-animation absolute bottom-10 left-10 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1.5s;"></div>

                </div>                </div>



                <div class="max-w-4xl mx-auto">                <div class="max-w-4xl mx-auto">

                    <h2 class="text-4xl md:text-6xl font-black text-white mb-6">                    <h2 class="text-4xl md:text-6xl font-black text-white mb-6">

                        Siap Menjadi                         Siap Menjadi

                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">

                            ASN Impianmu?                            ASN Impianmu?

                        </span>                        </span>

                    </h2>                    </h2>

                    <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">                    <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">

                        Bergabunglah dengan ribuan calon ASN yang telah mempercayai TryOut ASNku sebagai partner belajar terbaik mereka                        Bergabunglah dengan ribuan calon ASN yang telah mempercayai TryOut ASNku sebagai partner belajar terbaik mereka

                    </p>                    </p>



                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">

                        @auth                        @auth

                            <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                            <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

                                <i class="fas fa-rocket mr-2"></i>                                <i class="fas fa-rocket mr-2"></i>

                                Mulai Belajar Sekarang                                Mulai Belajar Sekarang

                            </a>                            </a>

                        @else

                            <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">                            <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">

                                <i class="fas fa-rocket mr-2"></i>                                <i class="fas fa-rocket mr-2"></i>

                                Daftar Gratis Hari Ini                                Daftar Gratis Hari Ini

                            </a>                            </a>

                        @endauth                        @endauth

                        <div class="flex items-center text-white">                        <div class="flex items-center text-white">

                            <i class="fas fa-shield-alt mr-2"></i>                            <i class="fas fa-shield-alt mr-2"></i>

                            <span class="font-medium">Garansi 30 Hari Uang Kembali</span>                            <span class="font-medium">Garansi 30 Hari Uang Kembali</span>

                        </div>                        </div>

                    </div>                    </div>



                    <!-- Trust Indicators -->                    <!-- Trust Indicators -->

                    <div class="flex flex-wrap justify-center items-center gap-8 text-blue-200">                    <div class="flex flex-wrap justify-center items-center gap-8 text-blue-200">

                        <div class="flex items-center">                        <div class="flex items-center">

                            <i class="fas fa-check-circle mr-2"></i>                            <i class="fas fa-check-circle mr-2"></i>

                            <span>SSL Secured</span>                            <span>SSL Secured</span>

                        </div>                        </div>

                        <div class="flex items-center">                        <div class="flex items-center">

                            <i class="fas fa-users mr-2"></i>                            <i class="fas fa-users mr-2"></i>

                            <span>5,000+ Member Aktif</span>                            <span>5,000+ Member Aktif</span>

                        </div>                        </div>

                        <div class="flex items-center">                        <div class="flex items-center">

                            <i class="fas fa-star mr-2"></i>                            <i class="fas fa-star mr-2"></i>

                            <span>Rating 4.9/5</span>                            <span>Rating 4.9/5</span>

                        </div>                        </div>

                    </div>                    </div>

                </div>                </div>

            </div>            </div>

        </section>        </section>



        <!-- Footer -->        <!-- Footer -->

        <footer id="contact" class="bg-gray-900 text-white py-16">        <footer id="contact" class="bg-gray-900 text-white py-16">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">                <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">

                    <!-- Company Info -->                    <!-- Company Info -->

                    <div>                    <div>

                        <div class="flex items-center space-x-3 mb-6">                        <div class="flex items-center space-x-3 mb-6">

                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">

                                <i class="fas fa-graduation-cap text-white text-xl"></i>                                <i class="fas fa-graduation-cap text-white text-xl"></i>

                            </div>                            </div>

                            <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>                            <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>

                        </div>                        </div>

                        <p class="text-gray-400 leading-relaxed mb-6">                        <p class="text-gray-400 leading-relaxed mb-6">

                            Platform tryout online terpercaya untuk persiapan CPNS & PPPK. Wujudkan impian ASNmu bersama kami!                            Platform tryout online terpercaya untuk persiapan CPNS & PPPK. Wujudkan impian ASNmu bersama kami!

                        </p>                        </p>

                        <div class="flex space-x-4">                        <div class="flex space-x-4">

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-facebook-f"></i>                                <i class="fab fa-facebook-f"></i>

                            </a>                            </a>

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-instagram"></i>                                <i class="fab fa-instagram"></i>

                            </a>                            </a>

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-youtube"></i>                                <i class="fab fa-youtube"></i>

                            </a>                            </a>

                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">

                                <i class="fab fa-telegram"></i>                                <i class="fab fa-telegram"></i>

                            </a>                            </a>

                        </div>                        </div>

                    </div>                    </div>



                    <!-- Quick Links -->                    <!-- Quick Links -->

                    <div>                    <div>

                        <h3 class="font-bold text-lg mb-6">Menu Utama</h3>                        <h3 class="font-bold text-lg mb-6">Menu Utama</h3>

                        <ul class="space-y-3">                        <ul class="space-y-3">

                            <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>                            <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>

                            <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Harga</a></li>                            <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Harga</a></li>

                            <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors">Testimoni</a></li>                            <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors">Testimoni</a></li>

                            <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Login</a></li>                            <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Login</a></li>

                            <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Daftar</a></li>                            <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Daftar</a></li>

                        </ul>                        </ul>

                    </div>                    </div>



                    <!-- Support -->                    <!-- Support -->

                    <div>                    <div>

                        <h3 class="font-bold text-lg mb-6">Bantuan</h3>                        <h3 class="font-bold text-lg mb-6">Bantuan</h3>

                        <ul class="space-y-3">                        <ul class="space-y-3">

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan</a></li>                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan</a></li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>

                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>

                        </ul>                        </ul>

                    </div>                    </div>



                    <!-- Contact -->                    <!-- Contact -->

                    <div>                    <div>

                        <h3 class="font-bold text-lg mb-6">Hubungi Kami</h3>                        <h3 class="font-bold text-lg mb-6">Hubungi Kami</h3>

                        <ul class="space-y-4">                        <ul class="space-y-4">

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-envelope text-blue-400 mr-3"></i>                                <i class="fas fa-envelope text-blue-400 mr-3"></i>

                                <span class="text-gray-400">support@tryoutasnku.com</span>                                <span class="text-gray-400">support@tryoutasnku.com</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-phone text-blue-400 mr-3"></i>                                <i class="fas fa-phone text-blue-400 mr-3"></i>

                                <span class="text-gray-400">+62 812-3456-7890</span>                                <span class="text-gray-400">+62 812-3456-7890</span>

                            </li>                            </li>

                            <li class="flex items-center">                            <li class="flex items-center">

                                <i class="fas fa-map-marker-alt text-blue-400 mr-3"></i>                                <i class="fas fa-map-marker-alt text-blue-400 mr-3"></i>

                                <span class="text-gray-400">Jakarta, Indonesia</span>                                <span class="text-gray-400">Jakarta, Indonesia</span>

                            </li>                            </li>

                        </ul>                        </ul>

                    </div>                    </div>

                </div>                </div>



                <!-- Bottom Bar -->                <!-- Bottom Bar -->

                <div class="border-t border-gray-800 mt-12 pt-8 text-center">                <div class="border-t border-gray-800 mt-12 pt-8 text-center">

                    <p class="text-gray-400">                    <p class="text-gray-400">

                        © 2024 TryOut ASNku. All rights reserved. Made with ❤️ for future ASN Indonesia.                        © 2024 TryOut ASNku. All rights reserved. Made with ❤️ for future ASN Indonesia.

                    </p>                    </p>

                </div>                </div>

            </div>            </div>

        </footer>        </footer>



        <!-- Floating Action Button -->        <!-- Floating Action Button -->

        <div class="fixed bottom-6 right-6 z-50">        <div class="fixed bottom-6 right-6 z-50">

            <a href="https://wa.me/6281234567890" target="_blank"             <a href="https://wa.me/6281234567890" target="_blank"

               class="w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all transform hover:scale-110">               class="w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all transform hover:scale-110">

                <i class="fab fa-whatsapp text-white text-2xl"></i>                <i class="fab fa-whatsapp text-white text-2xl"></i>

            </a>            </a>

        </div>        </div>



        <!-- Mobile Menu -->        <!-- Mobile Menu -->

        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40">        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40">

            <div class="grid grid-cols-4 gap-1 p-2">            <div class="grid grid-cols-4 gap-1 p-2">

                <a href="#features" class="text-center py-2">                <a href="#features" class="text-center py-2">

                    <i class="fas fa-star text-blue-600 mb-1"></i>                    <i class="fas fa-star text-blue-600 mb-1"></i>

                    <div class="text-xs text-gray-600">Fitur</div>                    <div class="text-xs text-gray-600">Fitur</div>

                </a>                </a>

                <a href="#pricing" class="text-center py-2">                <a href="#pricing" class="text-center py-2">

                    <i class="fas fa-gem text-orange-600 mb-1"></i>                    <i class="fas fa-gem text-orange-600 mb-1"></i>

                    <div class="text-xs text-gray-600">Harga</div>                    <div class="text-xs text-gray-600">Harga</div>

                </a>                </a>

                <a href="#testimonials" class="text-center py-2">                <a href="#testimonials" class="text-center py-2">

                    <i class="fas fa-users text-green-600 mb-1"></i>                    <i class="fas fa-users text-green-600 mb-1"></i>

                    <div class="text-xs text-gray-600">Testimoni</div>                    <div class="text-xs text-gray-600">Testimoni</div>

                </a>                </a>

                @auth                @auth

                    <a href="{{ url('/dashboard') }}" class="text-center py-2">                    <a href="{{ url('/dashboard') }}" class="text-center py-2">

                        <i class="fas fa-tachometer-alt text-purple-600 mb-1"></i>                        <i class="fas fa-tachometer-alt text-purple-600 mb-1"></i>

                        <div class="text-xs text-gray-600">Dashboard</div>                        <div class="text-xs text-gray-600">Dashboard</div>

                    </a>                    </a>

                @else

                    <a href="{{ route('register') }}" class="text-center py-2">                    <a href="{{ route('register') }}" class="text-center py-2">

                        <i class="fas fa-user-plus text-purple-600 mb-1"></i>                        <i class="fas fa-user-plus text-purple-600 mb-1"></i>

                        <div class="text-xs text-gray-600">Daftar</div>                        <div class="text-xs text-gray-600">Daftar</div>

                    </a>                    </a>

                @endauth                @endauth

            </div>            </div>

        </div>        </div>



        <script>        <script>

            // Smooth scrolling            // Smooth scrolling

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {            document.querySelectorAll('a[href^="#"]').forEach(anchor => {

                anchor.addEventListener('click', function (e) {                anchor.addEventListener('click', function (e) {

                    e.preventDefault();                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({                    document.querySelector(this.getAttribute('href')).scrollIntoView({

                        behavior: 'smooth'                        behavior: 'smooth'

                    });                    });

                });                });

            });            });



            // Navbar scroll effect            // Navbar scroll effect

            window.addEventListener('scroll', function() {            window.addEventListener('scroll', function() {

                const nav = document.querySelector('nav');                const nav = document.querySelector('nav');

                if (window.scrollY > 100) {                if (window.scrollY > 100) {

                    nav.classList.add('bg-white/95');                    nav.classList.add('bg-white/95');

                    nav.classList.remove('bg-white/80');                    nav.classList.remove('bg-white/80');

                } else {                } else {

                    nav.classList.add('bg-white/80');                    nav.classList.add('bg-white/80');

                    nav.classList.remove('bg-white/95');                    nav.classList.remove('bg-white/95');

                }                }

            });            });

        </script>        </script>

    </body>    </body>

</html></html>

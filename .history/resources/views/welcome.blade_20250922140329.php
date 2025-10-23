<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TryOut ASNku - Platform Revolusioner Persiapan CPNS & PPPK Indonesia</title>
    <meta name="description" content="Platform tryout online paling canggih di Indonesia. 50,000+ soal premium, AI-powered analytics, dan sistem pembelajaran adaptif untuk memastikan kesuksesan CPNS & PPPK Anda.">
    <meta name="keywords" content="tryout cpns, tryout pppk, simulasi cpns, latihan soal asn, belajar cpns online, persiapan pppk">
    <meta property="og:title" content="TryOut ASNku - Platform Revolusioner Persiapan CPNS & PPPK">
    <meta property="og:description" content="50,000+ soal premium, AI analytics, sistem pembelajaran adaptif">
    <meta property="og:type" content="website">
    
    <!-- Advanced Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Premium Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 25%, #3b82f6 50%, #f97316 75%, #ea580c 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .text-gradient {
            background: linear-gradient(45deg, #3b82f6, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Enhanced Professional Elements */
        .premium-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.3s ease;
        }
        
        .premium-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }
        
        .glow-effect {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }
        
        .glow-effect:hover {
            box-shadow: 0 0 30px rgba(249, 115, 22, 0.4);
        }
        
        .enhanced-button {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8, #f97316);
            background-size: 200% 200%;
            animation: buttonGradient 3s ease infinite;
            position: relative;
            overflow: hidden;
        }
        
        .enhanced-button::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #3b82f6, #f97316, #3b82f6);
            z-index: -1;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .enhanced-button:hover::before {
            opacity: 1;
        }
        
        @keyframes buttonGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .elegant-stats {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(249, 115, 22, 0.1));
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .professional-badge {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(249, 115, 22, 0.2));
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
        }
    </style>
</head>
<body class="font-inter antialiased overflow-x-hidden">

    <!-- Enhanced Professional Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-lg border-b border-blue-100/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18">
                <!-- Enhanced Logo -->
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center glow-effect">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                    <div>
                        <span class="font-black text-2xl text-gradient">TryOut ASNku</span>
                        <div class="text-xs text-gray-500 font-medium">Platform Premium</div>
                    </div>
                </div>
                
                <!-- Enhanced Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-700 hover:text-blue-600 font-medium transition-all duration-300 relative group">
                        <span>Fitur</span>
                        <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></div>
                    </a>
                    <a href="#pricing" class="text-gray-700 hover:text-orange-600 font-medium transition-all duration-300 relative group">
                        <span>Harga</span>
                        <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-600 group-hover:w-full transition-all duration-300"></div>
                    </a>
                    <a href="#testimonials" class="text-gray-700 hover:text-blue-600 font-medium transition-all duration-300 relative group">
                        <span>Testimoni</span>
                        <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></div>
                    </a>
                    <a href="#contact" class="text-gray-700 hover:text-orange-600 font-medium transition-all duration-300 relative group">
                        <span>Kontak</span>
                        <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-600 group-hover:w-full transition-all duration-300"></div>
                    </a>
                </div>
                
                <!-- Enhanced Auth Buttons -->
                <div class="flex items-center space-x-4">
                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="md:hidden p-2 text-gray-700 hover:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <!-- Desktop Auth Buttons -->
                    <div class="hidden md:flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="enhanced-button px-6 py-3 rounded-xl text-white font-bold transition-all duration-300 flex items-center space-x-2">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="enhanced-button px-6 py-3 rounded-xl text-white font-bold transition-all duration-300 flex items-center space-x-2">
                                    <i class="fas fa-rocket"></i>
                                    <span>Daftar Gratis</span>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden fixed top-0 left-0 w-full h-screen bg-white/95 backdrop-blur-xl z-40 transform -translate-x-full transition-transform duration-300">
            <div class="p-6 pt-20">
                <div class="space-y-6">
                    <a href="#features" class="block text-gray-700 hover:text-blue-600 font-medium text-lg transition-colors">Fitur</a>
                    <a href="#pricing" class="block text-gray-700 hover:text-orange-600 font-medium text-lg transition-colors">Harga</a>
                    <a href="#testimonials" class="block text-gray-700 hover:text-blue-600 font-medium text-lg transition-colors">Testimoni</a>
                    <a href="#contact" class="block text-gray-700 hover:text-orange-600 font-medium text-lg transition-colors">Kontak</a>
                    
                    <div class="pt-6 space-y-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block enhanced-button px-6 py-3 rounded-xl text-white font-bold text-center">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block text-center text-gray-700 hover:text-blue-600 font-medium py-2">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block enhanced-button px-6 py-3 rounded-xl text-white font-bold text-center">
                                    Daftar Gratis
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Enhanced Hero Section -->
    <section class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-16">
        <!-- Enhanced Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>
            <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>
            <div class="floating-animation absolute top-60 left-1/3 w-12 h-12 bg-blue-500/20 rounded-full" style="animation-delay: 0.5s;"></div>
            <div class="floating-animation absolute bottom-60 right-1/4 w-24 h-24 bg-orange-500/20 rounded-full" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="max-w-5xl mx-auto">
                <!-- Enhanced Premium Badge -->
                <div class="inline-flex items-center professional-badge px-8 py-4 rounded-full text-white mb-8 shadow-2xl">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse mr-3"></div>
                    <i class="fas fa-crown text-yellow-400 mr-2"></i>
                    <span class="font-bold text-lg">Platform #1 Persiapan CPNS & PPPK Indonesia</span>
                    <div class="ml-3 px-3 py-1 bg-white/20 rounded-full text-xs font-bold">
                        VERIFIED ✓
                    </div>
                </div>

                <!-- Enhanced Main Heading -->
                <h1 class="text-6xl md:text-8xl font-black text-white mb-8 leading-tight">
                    <span class="block">Raih Impian</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-orange-400 to-orange-500 block">
                        ASN
                    </span>
                    <span class="block text-5xl md:text-6xl">Bersama Kami</span>
                </h1>

                <!-- Enhanced Subtitle -->
                <p class="text-xl md:text-2xl text-blue-100 mb-10 leading-relaxed max-w-4xl mx-auto font-medium">
                    Platform tryout online terlengkap dengan 
                    <span class="text-yellow-300 font-bold">50,000+ soal premium</span>, 
                    pembahasan detail oleh ahli, dan sistem ranking nasional untuk 
                    <span class="text-orange-300 font-bold">menjamin kesuksesan CPNS & PPPK Anda</span>
                </p>

                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="enhanced-button px-10 py-5 rounded-xl text-white font-black text-xl transition-all duration-300 flex items-center space-x-3 shadow-2xl glow-effect">
                            <i class="fas fa-rocket text-xl"></i>
                            <span>Lanjutkan Belajar</span>
                            <i class="fas fa-arrow-right text-lg"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="enhanced-button px-10 py-5 rounded-xl text-white font-black text-xl transition-all duration-300 flex items-center space-x-3 shadow-2xl glow-effect">
                            <i class="fas fa-gift text-xl"></i>
                            <span>Mulai Gratis Sekarang</span>
                            <i class="fas fa-arrow-right text-lg"></i>
                        </a>
                        <a href="#features" class="glass-morphism px-10 py-5 rounded-xl text-white font-bold text-xl transition-all duration-300 hover:scale-105 flex items-center space-x-3 shadow-2xl">
                            <i class="fas fa-play-circle text-xl"></i>
                            <span>Lihat Demo Premium</span>
                        </a>
                    @endauth
                </div>

                <!-- Enhanced Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mb-12">
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">50K+</div>
                        <div class="text-blue-200 text-sm font-medium">Soal Premium</div>
                    </div>
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">99.2%</div>
                        <div class="text-blue-200 text-sm font-medium">Success Rate</div>
                    </div>
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">25K+</div>
                        <div class="text-blue-200 text-sm font-medium">Alumni Lolos</div>
                    </div>
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">4.9★</div>
                        <div class="text-blue-200 text-sm font-medium">Rating Alumni</div>
                    </div>
                </div>

                <!-- Trust Indicators -->
                <div class="flex flex-wrap justify-center items-center gap-8 text-blue-200 mb-8">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-shield-check text-green-400 text-xl"></i>
                        <span class="font-medium">Garansi 100% Uang Kembali</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-certificate text-yellow-400 text-xl"></i>
                        <span class="font-medium">Sertifikat Resmi</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-headset text-blue-400 text-xl"></i>
                        <span class="font-medium">Support 24/7</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
            <div class="flex flex-col items-center">
                <span class="text-sm font-medium mb-2">Jelajahi Fitur</span>
                <i class="fas fa-chevron-down text-2xl"></i>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider"></div>

    <!-- Revolutionary Features Section -->
    <section id="features" class="py-32 bg-gray-900 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Premium Section Header -->
            <div class="text-center mb-20">
                <div class="inline-flex items-center premium-glass px-6 py-3 rounded-full text-blue-400 font-bold mb-8">
                    <i class="ri-magic-line mr-2"></i>
                    Teknologi Revolusioner
                </div>
                <h2 class="text-5xl md:text-7xl font-black text-white mb-8 font-space">
                    <span class="text-gradient-premium">AI-Powered</span> Learning
                    <br>untuk <span class="text-gradient-gold">Masa Depan ASN</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-400 max-w-4xl mx-auto leading-relaxed">
                    Teknologi pembelajaran adaptif dengan kecerdasan buatan yang mempersonalisasi 
                    setiap sesi belajar sesuai kemampuan dan kebutuhan unik Anda
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-brain text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">10,000+ Soal Premium</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Koleksi soal terlengkap dengan pembahasan detail untuk semua kategori CPNS & PPPK
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-orange-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-stopwatch text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Simulasi Real-Time</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-green-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Performa</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Laporan detail kemampuanmu dengan rekomendasi materi yang perlu diperdalam
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-purple-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-trophy text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Sistem Ranking</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Kompetisi sehat dengan peserta lain untuk memotivasi belajar lebih giat
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-book-open text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Materi Lengkap</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Ringkasan materi terkini sesuai kisi-kisi resmi dari berbagai instansi
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Mobile</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Belajar kapan saja, di mana saja dengan platform yang responsif di semua device
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-orange-50 px-4 py-2 rounded-full text-orange-600 font-medium mb-6">
                    <i class="fas fa-gem mr-2"></i>
                    Paket Premium
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Investasi Terbaik untuk 
                    <span class="text-gradient">Masa Depanmu</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pilih paket yang sesuai dengan kebutuhanmu. Semua paket sudah termasuk akses penuh ke seluruh fitur platform
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Basic Plan -->
                <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Basic</h3>
                        <div class="text-4xl font-black text-gray-900 mb-2">GRATIS</div>
                        <p class="text-gray-600">Untuk memulai persiapan</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">100 Soal latihan gratis</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">5 Tryout gratis per bulan</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Akses materi dasar</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Pembahasan detail</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-times mr-3"></i>
                            <span>Analisis performa</span>
                        </li>
                    </ul>

                    <a href="{{ route('register') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-4 rounded-xl font-bold text-center block transition-colors">
                        Mulai Gratis
                    </a>
                </div>

                <!-- Premium Plan -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 border border-blue-500 rounded-3xl p-8 relative transform scale-105 shadow-2xl">
                    <!-- Popular Badge -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <div class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm font-bold">
                            TERPOPULER ✨
                        </div>
                    </div>

                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-white mb-4">Paket Premium</h3>
                        <div class="text-4xl font-black text-white mb-2">Rp 99K</div>
                        <p class="text-blue-200">Per bulan</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-3"></i>
                            <span class="text-white">10,000+ Soal premium</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-3"></i>
                            <span class="text-white">Tryout unlimited</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-3"></i>
                            <span class="text-white">Pembahasan detail</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-3"></i>
                            <span class="text-white">Analisis performa mendalam</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-3"></i>
                            <span class="text-white">Update soal terbaru</span>
                        </li>
                    </ul>

                    <a href="{{ route('register') }}" class="w-full bg-white hover:bg-gray-100 text-blue-700 py-4 rounded-xl font-bold text-center block transition-colors">
                        Berlangganan Sekarang
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="bg-white border border-gray-200 rounded-3xl p-8 relative">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Paket Pro</h3>
                        <div class="text-4xl font-black text-gray-900 mb-2">Rp 199K</div>
                        <p class="text-gray-600">Per 3 bulan</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Semua fitur Premium</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Konsultasi mentor 1-on-1</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Simulasi interview</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Prediksi passing grade</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-700">Priority support</span>
                        </li>
                    </ul>

                    <a href="{{ route('register') }}" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-4 rounded-xl font-bold text-center block transition-colors">
                        Upgrade ke Pro
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-green-50 px-4 py-2 rounded-full text-green-600 font-medium mb-6">
                    <i class="fas fa-users mr-2"></i>
                    Testimoni Alumni
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Mereka Berhasil, 
                    <span class="text-gradient">Kamu Juga Bisa!</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Ribuan alumni TryOut ASNku telah berhasil lolos seleksi ASN di berbagai instansi. Inilah cerita mereka!
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&h=387&q=80" alt="Sarah" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah Putri</h4>
                            <p class="text-green-600 font-medium">Lolos CPNS Kemenkeu 2024</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic">
                        "Platform ini luar biasa! Soal-soalnya persis seperti ujian asli. Berkat TryOut ASNku, saya berhasil lolos CPNS Kemenkeu dengan ranking 5 besar!"
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&h=387&q=80" alt="Ahmad" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Ahmad Rizki</h4>
                            <p class="text-green-600 font-medium">Lolos PPPK Guru 2024</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic">
                        "Analisis performanya sangat membantu untuk tahu kelemahan saya. Materinya juga update sesuai kisi-kisi terbaru. Recommended banget!"
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 relative">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&h=387&q=80" alt="Maya" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Maya Sari</h4>
                            <p class="text-green-600 font-medium">Lolos CPNS Kemendikbud 2024</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic">
                        "Interface-nya user friendly, soalnya berkualitas tinggi. Sistem rankingnya juga memotivasi untuk terus belajar. Terima kasih TryOut ASNku!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <!-- Floating Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="floating-animation absolute top-10 right-10 w-24 h-24 bg-white/10 rounded-full"></div>
                <div class="floating-animation absolute bottom-10 left-10 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1.5s;"></div>
            </div>

            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-6">
                    Siap Menjadi 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                        ASN Impianmu?
                    </span>
                </h2>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">
                    Bergabunglah dengan ribuan calon ASN yang telah mempercayai TryOut ASNku sebagai partner belajar terbaik mereka
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">
                            <i class="fas fa-play mr-2"></i>
                            Mulai Belajar Sekarang
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-2xl">
                            <i class="fas fa-rocket mr-2"></i>
                            Daftar Gratis Hari Ini
                        </a>
                        <a href="#pricing" class="glass-morphism text-white hover:bg-white/20 px-8 py-4 rounded-xl font-bold text-lg transition-all">
                            <i class="fas fa-crown mr-2"></i>
                            Lihat Paket Premium
                        </a>
                    @endauth
                </div>

                <!-- Trust Indicators -->
                <div class="flex flex-wrap justify-center items-center gap-8 text-blue-200">
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt mr-2"></i>
                        <span>Garansi 30 Hari Uang Kembali</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-lock mr-2"></i>
                        <span>SSL Secured</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users mr-2"></i>
                        <span>5,000+ Member Aktif</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-star mr-2"></i>
                        <span>Rating 4.9/5</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-orange-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="font-bold text-2xl text-gradient">TryOut ASNku</span>
                    </div>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        Platform tryout online terpercaya untuk persiapan CPNS & PPPK. Wujudkan impian ASNmu bersama kami!
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-400 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-pink-600 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-bold text-xl mb-6">Menu Utama</h3>
                    <ul class="space-y-3">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition-colors">Harga</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition-colors">Testimoni</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition-colors">Daftar</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="font-bold text-xl mb-6">Bantuan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Panduan</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-bold text-xl mb-6">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-500"></i>
                            <span class="text-gray-400">support@tryoutasnku.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-3 text-green-500"></i>
                            <span class="text-gray-400">+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                            <span class="text-gray-400">Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    © 2024 TryOut ASNku. All rights reserved. Made with ❤️ for future ASN Indonesia.
                </p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/6281234567890" target="_blank"
           class="w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all transform hover:scale-110">
            <i class="fab fa-whatsapp text-white text-2xl"></i>
        </a>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40">
        <div class="grid grid-cols-4 gap-1 p-2">
            <a href="#features" class="text-center py-2">
                <i class="fas fa-star text-blue-600 mb-1"></i>
                <div class="text-xs text-gray-600">Fitur</div>
            </a>
            <a href="#pricing" class="text-center py-2">
                <i class="fas fa-gem text-orange-600 mb-1"></i>
                <div class="text-xs text-gray-600">Harga</div>
            </a>
            <a href="#testimonials" class="text-center py-2">
                <i class="fas fa-users text-green-600 mb-1"></i>
                <div class="text-xs text-gray-600">Testimoni</div>
            </a>
            @auth
                <a href="{{ url('/dashboard') }}" class="text-center py-2">
                    <i class="fas fa-tachometer-alt text-purple-600 mb-1"></i>
                    <div class="text-xs text-gray-600">Dashboard</div>
                </a>
            @else
                <a href="{{ route('register') }}" class="text-center py-2">
                    <i class="fas fa-user-plus text-purple-600 mb-1"></i>
                    <div class="text-xs text-gray-600">Daftar</div>
                </a>
            @endauth
        </div>
    </div>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Enhanced navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('bg-white/95', 'shadow-lg');
                nav.classList.remove('bg-white/90');
            } else {
                nav.classList.add('bg-white/90');
                nav.classList.remove('bg-white/95', 'shadow-lg');
            }
        });

        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('-translate-x-full');
                    mobileMenu.classList.toggle('translate-x-0');
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        mobileMenu.classList.add('-translate-x-full');
                        mobileMenu.classList.remove('translate-x-0');
                    }
                });
                
                // Close menu when clicking menu links
                const menuLinks = mobileMenu.querySelectorAll('a');
                menuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('-translate-x-full');
                        mobileMenu.classList.remove('translate-x-0');
                    });
                });
            }
        });
    </script>
</body>
</html>
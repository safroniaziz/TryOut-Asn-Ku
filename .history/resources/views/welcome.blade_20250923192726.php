<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TryOut ASNku - Platform Revolusioner Persiapan CPNS & PPPK Indonesia</title>
    <meta name="description" content="Platform tryout online paling canggih di Indonesia. 50,000+ soal premium, sistem analisis canggih, dan pembelajaran terpersonalisasi untuk memastikan kesuksesan CPNS & PPPK Anda.">
    <meta name="keywords" content="tryout cpns, tryout pppk, simulasi cpns, latihan soal asn, belajar cpns online, persiapan pppk">
    <meta property="og:title" content="TryOut ASNku - Platform Revolusioner Persiapan CPNS & PPPK">
    <meta property="og:description" content="50,000+ soal premium, analisis mendalam, sistem pembelajaran terpersonalisasi">
    <meta property="og:type" content="website">

    <!-- Advanced Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Premium Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        /* Spectacular Navigation Animations */
        .floating-particle {
            animation-duration: 3s;
            animation-iteration-count: infinite;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .nav-item:hover::before {
            transform: translateX(100%);
        }

        /* Navbar scroll effect dengan background yang konsisten */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 1) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(156, 163, 175, 0.3);
        }

        /* Glowing effect */
        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3),
                           0 0 40px rgba(59, 130, 246, 0.1),
                           0 0 60px rgba(59, 130, 246, 0.05);
            }
            50% {
                box-shadow: 0 0 30px rgba(249, 115, 22, 0.4),
                           0 0 60px rgba(249, 115, 22, 0.2),
                           0 0 90px rgba(249, 115, 22, 0.1);
            }
        }

        .glow-animation {
            animation: glow 3s ease-in-out infinite;
        }

        /* Particle floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(10px) rotate(240deg); }
        }

        .floating-particle:nth-child(1) {
            animation: float 4s ease-in-out infinite;
            animation-delay: 0s;
        }

        .floating-particle:nth-child(2) {
            animation: float 3s ease-in-out infinite;
            animation-delay: 1s;
        }

        .floating-particle:nth-child(3) {
            animation: float 5s ease-in-out infinite;
            animation-delay: 2s;
        }
    </style>
</head>
<body class="font-inter antialiased overflow-x-hidden">

    <!-- Professional Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-500 bg-white backdrop-blur-xl border-b border-gray-200 shadow-sm" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Professional Logo -->
                <div class="flex items-center space-x-4 group">
                    <div class="relative transform group-hover:scale-110 transition-all duration-500">
                        <!-- Main Logo Container -->
                        <div class="relative w-12 h-12 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-graduation-cap text-white text-xl transform group-hover:rotate-12 transition-transform duration-500"></i>
                        </div>
                    </div>

                    <div class="transform group-hover:translate-x-1 transition-transform duration-500">
                        <div class="font-black text-2xl bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 bg-clip-text text-transparent">
                            TryOut ASNku
                        </div>
                        <div class="text-xs font-semibold text-gray-600">
                            Platform Premium
                        </div>
                    </div>
                </div>

                <!-- Clean Desktop Menu -->
                <div class="hidden xl:flex items-center space-x-2">
                    <a href="#hero" class="nav-item relative px-6 py-3 font-bold text-gray-700 hover:text-blue-600 transition-all duration-300 rounded-xl hover:bg-blue-50 group">
                        <span class="relative z-10">Home</span>
                        <div class="absolute -bottom-1 left-2 right-2 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>

                    <a href="#tryout-gratis" class="nav-item relative px-6 py-3 font-bold text-gray-700 hover:text-green-600 transition-all duration-300 rounded-xl hover:bg-green-50 group">
                        <span class="relative z-10">Tryout Gratis</span>
                        <div class="absolute -bottom-1 left-2 right-2 h-0.5 bg-gradient-to-r from-green-500 to-emerald-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>

                    <a href="#features" class="nav-item relative px-6 py-3 font-bold text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-xl hover:bg-purple-50 group">
                        <span class="relative z-10">Fitur</span>
                        <div class="absolute -bottom-1 left-2 right-2 h-0.5 bg-gradient-to-r from-purple-500 to-purple-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>

                    <a href="#pricing" class="nav-item relative px-6 py-3 font-bold text-gray-700 hover:text-orange-600 transition-all duration-300 rounded-xl hover:bg-orange-50 group">
                        <span class="relative z-10">Harga</span>
                        <div class="absolute -bottom-1 left-2 right-2 h-0.5 bg-gradient-to-r from-orange-500 to-red-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>

                    <a href="#contact" class="nav-item relative px-6 py-3 font-bold text-gray-700 hover:text-cyan-600 transition-all duration-300 rounded-xl hover:bg-cyan-50 group">
                        <span class="relative z-10">Kontak</span>
                        <div class="absolute -bottom-1 left-2 right-2 h-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Clean Auth Section -->
                <div class="flex items-center space-x-4">
                    <!-- Mobile Menu Button -->
                    <button type="button" id="mobileMenuBtn" class="xl:hidden relative p-2 text-gray-700 hover:text-blue-600 transition-all duration-300 z-50">
                        <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Desktop Auth Buttons -->
                    <div class="hidden xl:flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-600 text-white px-8 py-3 rounded-xl font-bold transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10 flex items-center">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                </span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="relative overflow-hidden bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-bold transition-all duration-300 hover:shadow-xl hover:scale-105 group border border-blue-400">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10 flex items-center">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                                </span>
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="relative overflow-hidden bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white px-8 py-3 rounded-xl font-bold transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                                    <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <span class="relative z-10 flex items-center">
                                        <i class="fas fa-rocket mr-2"></i>Daftar Gratis
                                    </span>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Backdrop -->
        <div id="mobileMenuBackdrop" class="xl:hidden fixed inset-0 bg-black/50 z-50 opacity-0 pointer-events-none transition-opacity duration-300"></div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobileMenu" class="xl:hidden fixed top-20 left-0 right-0 z-[60] bg-white/95 backdrop-blur-xl border-b border-gray-200/50 shadow-xl transform -translate-y-full opacity-0 transition-all duration-300 max-h-screen overflow-y-auto">
            <div class="max-w-7xl mx-auto px-4 py-6">
                    <!-- Close Button -->
                    <div class="flex justify-end mb-4">
                        <button id="mobileMenuClose" class="p-2 text-gray-500 hover:text-red-500 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Navigation Section -->
                    <div class="mb-6">
                        <h4 class="text-sm font-bold text-gray-500 mb-4 text-center">NAVIGASI</h4>
                        <div class="space-y-3">
                            <a href="#hero" class="flex items-center space-x-4 p-4 rounded-xl bg-gradient-to-r from-blue-50 to-cyan-50 hover:from-blue-100 hover:to-cyan-100 transition-all duration-300 group border border-blue-200/50">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-home text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-800 group-hover:text-blue-700">Home</span>
                            </a>

                            <a href="#tryout-gratis" class="flex items-center space-x-4 p-4 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 transition-all duration-300 group border border-green-200/50">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-gift text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-800 group-hover:text-green-700">Tryout Gratis</span>
                            </a>

                            <a href="#features" class="flex items-center space-x-4 p-4 rounded-xl bg-gradient-to-r from-purple-50 to-indigo-50 hover:from-purple-100 hover:to-indigo-100 transition-all duration-300 group border border-purple-200/50">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-star text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-800 group-hover:text-purple-700">Fitur Premium</span>
                            </a>

                            <a href="#pricing" class="flex items-center space-x-4 p-4 rounded-xl bg-gradient-to-r from-orange-50 to-red-50 hover:from-orange-100 hover:to-red-100 transition-all duration-300 group border border-orange-200/50">
                                <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-gem text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-800 group-hover:text-orange-700">Paket Harga</span>
                            </a>

                            <a href="#contact" class="flex items-center space-x-4 p-4 rounded-xl bg-gradient-to-r from-cyan-50 to-teal-50 hover:from-cyan-100 hover:to-teal-100 transition-all duration-300 group border border-cyan-200/50">
                                <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-phone text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-800 group-hover:text-cyan-700">Kontak Kami</span>
                            </a>
                        </div>
                    </div>

                    <!-- Mobile Auth Buttons -->
                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-sm font-bold text-gray-500 mb-4 text-center">AKUN ANDA</h4>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="w-full relative overflow-hidden bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-600 text-white p-4 rounded-xl font-bold text-center transition-all duration-300 hover:shadow-lg group border border-blue-400 flex items-center justify-center">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10 flex items-center">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                </span>
                            </a>
                        @else
                            <div class="space-y-3">
                                <a href="{{ route('login') }}" class="w-full relative overflow-hidden bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 text-white p-4 rounded-xl font-bold text-center transition-all duration-300 hover:shadow-lg group border border-blue-400 flex items-center justify-center">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <span class="relative z-10 flex items-center">
                                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                                    </span>
                                </a>

                                <a href="{{ route('register') }}" class="w-full relative overflow-hidden bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white p-4 rounded-xl font-bold text-center transition-all duration-300 hover:shadow-lg group flex items-center justify-center">
                                    <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <span class="relative z-10 flex items-center">
                                        <i class="fas fa-rocket mr-2"></i>Daftar Gratis
                                    </span>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Enhanced Hero Section -->
    <section id="hero" class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
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
                    <i class="fas fa-rocket text-yellow-400 mr-2"></i>
                    <span class="font-bold text-lg">Platform Terbaru Persiapan CPNS & PPPK Indonesia</span>
                    <div class="ml-3 px-3 py-1 bg-white/20 rounded-full text-xs font-bold">
                        FRESH LAUNCH 🚀
                    </div>
                </div>

                <!-- Enhanced Main Heading -->
                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">
                    <span class="block">Raih Impian</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-orange-400 to-orange-500 block">
                        ASN
                    </span>
                    <span class="block text-4xl md:text-5xl">Bersama Kami</span>
                </h1>

                <!-- Enhanced Subtitle -->
                <p class="text-lg md:text-xl text-blue-100 mb-8 leading-relaxed max-w-3xl mx-auto font-medium">
                    Platform tryout online terlengkap dengan
                    <span class="text-yellow-300 font-bold">50,000+ soal premium</span>,
                    pembahasan detail oleh ahli, dan sistem ranking nasional untuk
                    <span class="text-orange-300 font-bold">menjamin kesuksesan CPNS & PPPK Anda</span>
                </p>

                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-5 justify-center items-center mb-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="enhanced-button px-8 py-4 rounded-xl text-white font-black text-lg transition-all duration-300 flex items-center space-x-3 shadow-2xl glow-effect">
                            <i class="fas fa-rocket text-lg"></i>
                            <span>Lanjutkan Belajar</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="enhanced-button px-8 py-4 rounded-xl text-white font-black text-lg transition-all duration-300 flex items-center space-x-3 shadow-2xl glow-effect">
                            <i class="fas fa-gift text-lg"></i>
                            <span>Mulai Gratis Sekarang</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#features" class="glass-morphism px-8 py-4 rounded-xl text-white font-bold text-lg transition-all duration-300 hover:scale-105 flex items-center space-x-3 shadow-2xl">
                            <i class="fas fa-play-circle text-lg"></i>
                            <span>Lihat Demo Premium</span>
                        </a>
                    @endauth
                </div>

                <!-- Enhanced Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mb-12">
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">50K+</div>
                        <div class="text-blue-200 text-sm font-medium">Soal Siap Pakai</div>
                    </div>
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">500+</div>
                        <div class="text-blue-200 text-sm font-medium">Paket Tryout</div>
                    </div>
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">24/7</div>
                        <div class="text-blue-200 text-sm font-medium">Akses Platform</div>
                    </div>
                    <div class="elegant-stats rounded-2xl p-6 text-center">
                        <div class="text-4xl font-black text-white mb-2">FREE</div>
                        <div class="text-blue-200 text-sm font-medium">Trial Premium</div>
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

    <!-- Tryout Gratis Section - Hook Utama -->
    <section id="tryout-gratis" class="py-20 bg-gradient-to-br from-green-50 via-emerald-50 to-green-100 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-500/5"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Header dengan Emphasis -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-gradient-to-r from-green-100 to-emerald-100 px-8 py-4 rounded-full text-green-700 font-bold mb-8 shadow-lg">
                    <i class="fas fa-gift text-green-600 mr-3 text-xl"></i>
                    <span class="text-lg">🎉 GRATIS TANPA SYARAT!</span>
                    <i class="fas fa-gift text-green-600 ml-3 text-xl"></i>
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-6">
                    <span class="text-gradient">Coba Tryout Gratis</span>
                    <br>Sebelum <span class="text-green-600">Berlangganan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Rasakan pengalaman tryout premium secara <strong class="text-green-600">GRATIS</strong>!
                    Tidak perlu kartu kredit, langsung coba fitur-fitur terbaik kami.
                </p>
            </div>

            <!-- Grid Tryout Gratis dengan Tabs -->
            <div class="mb-8">
                <!-- Tab Navigation -->
                <div class="flex justify-center mb-12">
                    <div class="bg-white border-2 border-gray-200 rounded-2xl p-2 inline-flex">
                        <button id="cpnsTab" class="px-8 py-3 rounded-xl font-bold text-lg transition-all duration-300 bg-green-500 text-white">
                            CPNS
                        </button>
                        <button id="pppkTab" class="px-8 py-3 rounded-xl font-bold text-lg transition-all duration-300 text-gray-600 hover:text-green-600">
                            PPPK
                        </button>
                    </div>
                </div>

                <!-- CPNS Tryouts -->
                <div id="cpnsContent" class="grid md:grid-cols-3 gap-8">
                    <!-- TIU Basic -->
                    <div class="bg-white border-2 border-green-200 rounded-3xl p-8 hover:border-green-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-brain text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Tes Intelegensi Umum</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-green-600">30 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-green-600">45 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-green-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ranking:</span>
                                    <span class="font-bold text-green-600">✓ Nasional</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>

                    <!-- TWK Basic -->
                    <div class="bg-white border-2 border-blue-200 rounded-3xl p-8 hover:border-blue-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-flag text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Tes Wawasan Kebangsaan</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-blue-600">25 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-blue-600">35 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-blue-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ranking:</span>
                                    <span class="font-bold text-blue-600">✓ Nasional</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>

                    <!-- TKP Basic -->
                    <div class="bg-white border-2 border-purple-200 rounded-3xl p-8 hover:border-purple-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-purple-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-heart text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Tes Karakteristik Pribadi</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-purple-600">25 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-purple-600">30 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-purple-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ranking:</span>
                                    <span class="font-bold text-purple-600">✓ Nasional</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>
                </div>

                <!-- PPPK Tryouts -->
                <div id="pppkContent" class="hidden">
                    <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <!-- Kompetensi Teknis -->
                    <div class="bg-white border-2 border-orange-200 rounded-3xl p-8 hover:border-orange-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-orange-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-cogs text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Kompetensi Teknis</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-orange-600">35 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-orange-600">60 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-orange-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ranking:</span>
                                    <span class="font-bold text-orange-600">✓ Nasional</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>

                    <!-- Kompetensi Manajerial -->
                    <div class="bg-white border-2 border-indigo-200 rounded-3xl p-8 hover:border-indigo-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-indigo-400 to-indigo-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-users-cog text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Kompetensi Manajerial</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-indigo-600">30 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-indigo-600">45 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-indigo-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ranking:</span>
                                    <span class="font-bold text-indigo-600">✓ Nasional</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>

                    <!-- Kompetensi Sosio Kultural -->
                    <div class="bg-white border-2 border-teal-200 rounded-3xl p-8 hover:border-teal-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-teal-400 to-teal-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-globe-asia text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Kompetensi Sosio Kultural</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-teal-600">20 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-teal-600">30 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-teal-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ranking:</span>
                                    <span class="font-bold text-teal-600">✓ Nasional</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-teal-500 to-cyan-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>

                    <!-- Simulasi Wawancara PPPK -->
                    <div class="bg-white border-2 border-orange-200 rounded-3xl p-8 hover:border-orange-400 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 relative">
                        <div class="absolute -top-4 left-6">
                            <span class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                🆓 GRATIS
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-orange-600 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-users text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">Kompetensi Wawancara</h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah Soal:</span>
                                    <span class="font-bold text-orange-600">15 Soal</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="font-bold text-orange-600">20 Menit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembahasan:</span>
                                    <span class="font-bold text-orange-600">✓ Lengkap</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Contoh Jawaban:</span>
                                    <span class="font-bold text-orange-600">✓ Tersedia</span>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white py-3 rounded-xl font-bold hover:scale-105 transition-transform duration-300 shadow-lg">
                                Mulai Tryout Gratis
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section dengan Urgency -->
            <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-green-700 rounded-3xl p-8 md:p-12 text-white text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full transform translate-x-32 -translate-y-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full transform -translate-x-24 translate-y-24"></div>
                <div class="relative z-10">
                    <h3 class="text-3xl md:text-4xl font-black mb-4">
                        🚀 Siap Upgrade ke Premium?
                    </h3>
                    <p class="text-xl text-green-100 mb-8 max-w-3xl mx-auto">
                        Setelah mencoba tryout gratis, lanjutkan dengan <strong>50,000+ soal premium</strong>,
                        analisis mendalam, dan fitur eksklusif lainnya!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="#pricing" class="bg-white text-green-600 px-8 py-4 rounded-xl font-black text-lg hover:scale-105 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-crown mr-2"></i>
                            Lihat Paket Premium
                        </a>
                        <span class="text-green-200 font-medium">
                            <i class="fas fa-users mr-2"></i>
                            Sudah 1000+ orang bergabung minggu ini!
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider"></div>

    <!-- Professional Features Section -->
    <section id="features" class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50/30 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Professional Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-blue-50 px-6 py-3 rounded-full text-blue-600 font-semibold mb-8">
                    <i class="fas fa-star mr-2"></i>
                    Fitur Lengkap Platform
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-6">
                    <span class="text-gradient">Semua yang Anda Butuhkan</span>
                    <br>untuk <span class="text-gradient">Sukses ASN</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Platform tryout modern dengan fitur lengkap dan user experience terbaik untuk persiapan CPNS & PPPK
                </p>
            </div>

            <!-- Professional Features Grid dengan Variasi Layout -->
            <div class="space-y-12">

                <!-- Row 1: Hero Feature - Large Gradient Card -->
                <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 rounded-3xl p-8 md:p-12 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full transform translate-x-32 -translate-y-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full transform -translate-x-24 translate-y-24"></div>
                    <div class="relative z-10 grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-6">
                                    <i class="fas fa-database text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl md:text-4xl font-black">50,000+ Soal Premium</h3>
                            </div>
                            <p class="text-xl text-blue-100 leading-relaxed mb-6">
                                Bank soal terlengkap se-Indonesia dengan update berkala dan pembahasan detail oleh ahli berpengalaman. Tersedia dalam berbagai kategori dan tingkat kesulitan.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-semibold">TIU</span>
                                <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-semibold">TWK</span>
                                <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-semibold">TKP</span>
                                <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-semibold">CASN</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white/10 rounded-2xl p-8 backdrop-blur-sm">
                                <div class="text-5xl font-black text-yellow-300 mb-2">50K+</div>
                                <div class="text-lg text-white/90 mb-4">Soal Tersedia</div>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <div class="text-2xl font-bold text-yellow-300">500+</div>
                                        <div class="text-white/80">Paket Tryout</div>
                                    </div>
                                    <div>
                                        <div class="text-2xl font-bold text-yellow-300">100%</div>
                                        <div class="text-white/80">Update Berkala</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Core Features - 3 Medium Cards -->
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl p-8 text-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full transform translate-x-12 -translate-y-12 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="relative z-10">
                            <i class="fas fa-stopwatch text-4xl mb-6 block"></i>
                            <h3 class="text-2xl font-bold mb-4">Simulasi Real-Time</h3>
                            <p class="text-orange-100 leading-relaxed">
                                Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat
                            </p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl p-8 text-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full transform translate-x-12 -translate-y-12 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="relative z-10">
                            <i class="fas fa-chart-bar text-4xl mb-6 block"></i>
                            <h3 class="text-2xl font-bold mb-4">Analisis Mendalam</h3>
                            <p class="text-green-100 leading-relaxed">
                                Laporan performa detail dengan visualisasi grafik dan rekomendasi strategi belajar personal
                            </p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl p-8 text-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full transform translate-x-12 -translate-y-12 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="relative z-10">
                            <i class="fas fa-crown text-4xl mb-6 block"></i>
                            <h3 class="text-2xl font-bold mb-4">Leaderboard Nasional</h3>
                            <p class="text-purple-100 leading-relaxed">
                                Kompetisi real-time dengan peserta se-Indonesia dilengkapi sistem poin dan achievement
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Row 3: Learning Features - Horizontal Layout -->
                <div class="bg-white border-2 border-gray-200 rounded-3xl p-8 md:p-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h3 class="text-3xl font-black text-gray-900 mb-6">Modul Pembelajaran Lengkap</h3>
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-graduation-cap text-red-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900 mb-2">E-book Interaktif</h4>
                                        <p class="text-gray-600">Materi pembelajaran digital dengan kisi-kisi terbaru</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-download text-blue-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900 mb-2">Download Offline</h4>
                                        <p class="text-gray-600">Unduh materi dan pembahasan untuk belajar kapan saja</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-tasks text-green-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900 mb-2">Multi Tryout per Kategori</h4>
                                        <p class="text-gray-600">Berbagai variasi tryout dengan tingkat kesulitan bertahap</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-2xl p-8 text-center">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <div class="text-3xl font-black text-blue-600 mb-2">24/7</div>
                                    <div class="text-gray-600 text-sm">Akses Platform</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-black text-green-600 mb-2">∞</div>
                                    <div class="text-gray-600 text-sm">Download</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-black text-orange-600 mb-2">500+</div>
                                    <div class="text-gray-600 text-sm">Video Materi</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-black text-purple-600 mb-2">50+</div>
                                    <div class="text-gray-600 text-sm">Kategori</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 4: Advanced Features - Icon Strip Style -->
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-3xl p-8">
                    <h3 class="text-2xl font-black text-gray-900 text-center mb-8">Fitur Advanced & Community</h3>
                    <div class="grid grid-cols-2 md:grid-cols-6 gap-6">
                        <div class="text-center group">
                            <div class="w-16 h-16 bg-gradient-to-r from-red-400 to-red-600 rounded-2xl mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-video text-white text-xl"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Live Session</h4>
                            <p class="text-xs text-gray-600">YouTube Private</p>
                        </div>

                        <div class="text-center group">
                            <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-2xl mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Timer Akurat</h4>
                            <p class="text-xs text-gray-600">Scoring Real</p>
                        </div>

                        <div class="text-center group">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-comments text-white text-xl"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Forum Diskusi</h4>
                            <p class="text-xs text-gray-600">Q&A Mentor</p>
                        </div>

                        <div class="text-center group">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-headset text-white text-xl"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Support 24/7</h4>
                            <p class="text-xs text-gray-600">Help Center</p>
                        </div>

                        <div class="text-center group">
                            <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-purple-600 rounded-2xl mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-trophy text-white text-xl"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Achievement</h4>
                            <p class="text-xs text-gray-600">Ranking System</p>
                        </div>

                        <div class="text-center group">
                            <div class="w-16 h-16 bg-gradient-to-r from-pink-400 to-pink-600 rounded-2xl mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-chart-line text-white text-xl"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Analytics</h4>
                            <p class="text-xs text-gray-600">Progress Track</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Program Spesial & Benefit Section -->
    <section class="py-20 bg-gradient-to-br from-orange-50 via-red-50 to-pink-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-gradient-to-r from-orange-100 to-red-100 px-6 py-3 rounded-full text-orange-700 font-semibold mb-8">
                    <i class="fas fa-gift mr-2"></i>
                    Program Spesial & Benefit
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    <span class="text-gradient">Keuntungan Eksklusif</span> untuk Member
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Dapatkan berbagai benefit dan program menarik yang dirancang khusus untuk kesuksesan Anda
                </p>
            </div>

            <!-- Benefits dengan Design Variasi -->
            <div class="grid gap-8">
                <!-- Row 1: Financial Benefits - Horizontal Cards -->
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Kode Promo & Referral - Large Horizontal Card -->
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl p-8 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full transform translate-x-16 -translate-y-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full transform -translate-x-12 translate-y-12"></div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-tag text-white text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-black">Diskon & Referral Program</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-3 text-yellow-300"></i>
                                    <span class="text-lg">Diskon <strong>5%</strong> jika punya kode referral</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-3 text-yellow-300"></i>
                                    <span class="text-lg">Komisi <strong>10%</strong> untuk yang mereferral</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Money Back & Group Discount -->
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl p-8 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-28 h-28 bg-white/10 rounded-full transform translate-x-14 -translate-y-14"></div>
                        <div class="relative z-10">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-shield-alt text-white text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-black">Garansi & Bonus</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-3 text-yellow-300"></i>
                                    <span class="text-lg">Money Back <strong>15%</strong> jika tidak lulus</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-3 text-yellow-300"></i>
                                    <span class="text-lg">Diskon Grup <strong>10%</strong> (min. 3 orang)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Learning Benefits - Icon + Text Style -->
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white border-2 border-red-200 rounded-2xl p-6 text-center hover:border-red-400 transition-all duration-300 hover:shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-r from-red-400 to-red-600 rounded-2xl mx-auto mb-4 flex items-center justify-center transform hover:scale-110 transition-transform">
                            <i class="fab fa-youtube text-white text-2xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Live Pembahasan</h4>
                        <p class="text-gray-600 text-sm">2x seminggu di YouTube dengan mentor berpengalaman</p>
                    </div>

                    <div class="bg-white border-2 border-yellow-200 rounded-2xl p-6 text-center hover:border-yellow-400 transition-all duration-300 hover:shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-2xl mx-auto mb-4 flex items-center justify-center transform hover:scale-110 transition-transform">
                            <i class="fas fa-flag text-white text-2xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Tryout Nasional</h4>
                        <p class="text-gray-600 text-sm">Kompetisi gratis dengan peserta se-Indonesia</p>
                    </div>

                    <div class="bg-white border-2 border-indigo-200 rounded-2xl p-6 text-center hover:border-indigo-400 transition-all duration-300 hover:shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-r from-indigo-400 to-indigo-600 rounded-2xl mx-auto mb-4 flex items-center justify-center transform hover:scale-110 transition-transform">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Leaderboard Detail</h4>
                        <p class="text-gray-600 text-sm">Ranking per tryout dengan analisis mendalam</p>
                    </div>
                </div>

                <!-- Row 3: Community Benefits - List Style -->
                <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-3xl p-8 text-white">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <h3 class="text-3xl font-black mb-6">Komunitas & Konten Eksklusif</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-4 mt-1">
                                        <i class="fab fa-telegram text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg">Grup Telegram Eksklusif</h4>
                                        <p class="text-purple-100">Public discussion + private groups CASN & CPPPK terpisah</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-4 mt-1">
                                        <i class="fab fa-tiktok text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg">Konten TikTok & YouTube</h4>
                                        <p class="text-purple-100">Tips viral, pembahasan soal trending, dan motivasi harian</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                                <div class="text-4xl font-black text-yellow-300 mb-2">1000+</div>
                                <div class="text-purple-100">Member Aktif di Komunitas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Professional Stats Section -->
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-blue-50 px-4 py-2 rounded-full text-blue-600 font-medium mb-6">
                    <i class="fas fa-chart-line mr-2"></i>
                    Statistik Platform
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Dipercaya <span class="text-gradient">Ribuan Peserta</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Bergabunglah dengan komunitas terbesar calon ASN Indonesia yang telah membuktikan keberhasilan
                </p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 mb-4 group-hover:shadow-lg transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-black text-blue-600 mb-2">NEW</div>
                        <div class="text-gray-600 font-semibold">Platform Fresh</div>
                    </div>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 mb-4 group-hover:shadow-lg transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-black text-green-600 mb-2">MODERN</div>
                        <div class="text-gray-600 font-semibold">UI/UX Design</div>
                    </div>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 mb-4 group-hover:shadow-lg transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-black text-orange-600 mb-2">50K+</div>
                        <div class="text-gray-600 font-semibold">Soal Premium</div>
                    </div>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 mb-4 group-hover:shadow-lg transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-black text-purple-600 mb-2">24/7</div>
                        <div class="text-gray-600 font-semibold">Support Sistem</div>
                    </div>
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
    <div class="xl:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-40">
        <div class="grid grid-cols-5 gap-1 p-2">
            <a href="#hero" class="text-center py-2">
                <i class="fas fa-home text-blue-600 mb-1"></i>
                <div class="text-xs text-gray-600">Home</div>
            </a>
            <a href="#tryout-gratis" class="text-center py-2">
                <i class="fas fa-gift text-green-600 mb-1"></i>
                <div class="text-xs text-gray-600">Gratis</div>
            </a>
            <a href="#features" class="text-center py-2">
                <i class="fas fa-star text-purple-600 mb-1"></i>
                <div class="text-xs text-gray-600">Fitur</div>
            </a>
            <a href="#pricing" class="text-center py-2">
                <i class="fas fa-gem text-orange-600 mb-1"></i>
                <div class="text-xs text-gray-600">Harga</div>
            </a>
            <a href="#contact" class="text-center py-2">
                <i class="fas fa-phone text-cyan-600 mb-1"></i>
                <div class="text-xs text-gray-600">Kontak</div>
            </a>
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

        // Spectacular Navigation and Mobile Menu Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // CPNS/PPPK Tabs
            const cpnsTab = document.getElementById('cpnsTab');
            const pppkTab = document.getElementById('pppkTab');
            const cpnsContent = document.getElementById('cpnsContent');
            const pppkContent = document.getElementById('pppkContent');

            if (cpnsTab && pppkTab && cpnsContent && pppkContent) {
                cpnsTab.addEventListener('click', function() {
                    // Active CPNS tab
                    cpnsTab.classList.add('bg-green-500', 'text-white');
                    cpnsTab.classList.remove('text-gray-600', 'hover:text-green-600');

                    // Inactive PPPK tab
                    pppkTab.classList.remove('bg-green-500', 'text-white');
                    pppkTab.classList.add('text-gray-600', 'hover:text-green-600');

                    // Show CPNS content with animation
                    cpnsContent.classList.remove('hidden');
                    pppkContent.classList.add('hidden');
                });

                pppkTab.addEventListener('click', function() {
                    // Active PPPK tab
                    pppkTab.classList.add('bg-green-500', 'text-white');
                    pppkTab.classList.remove('text-gray-600', 'hover:text-green-600');

                    // Inactive CPNS tab
                    cpnsTab.classList.remove('bg-green-500', 'text-white');
                    cpnsTab.classList.add('text-gray-600', 'hover:text-green-600');

                    // Show PPPK content with animation
                    pppkContent.classList.remove('hidden');
                    cpnsContent.classList.add('hidden');
                });
            }

            // Enhanced Navbar Scroll Effects (tanpa auto-hide)
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;

                // Add/remove scrolled class untuk styling yang lebih solid
                if (currentScrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }

                // Navbar tetap terlihat - tidak auto-hide
            });

            // Mobile Dropdown Menu with enhanced functionality
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuClose = document.getElementById('mobileMenuClose');
            const mobileMenuBackdrop = document.getElementById('mobileMenuBackdrop');

            console.log('Mobile Menu Button:', mobileMenuBtn);
            console.log('Mobile Menu:', mobileMenu);
            console.log('Mobile Menu Close:', mobileMenuClose);
            console.log('Mobile Menu Backdrop:', mobileMenuBackdrop);

            function openMobileMenu() {
                console.log('Opening mobile menu...');
                console.log('Menu element:', mobileMenu);
                console.log('Current menu classes before:', mobileMenu.className);
                
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
                
                console.log('Current menu classes after:', mobileMenu.className);
                
                if (mobileMenuBackdrop) {
                    mobileMenuBackdrop.classList.remove('opacity-0', 'pointer-events-none');
                    mobileMenuBackdrop.classList.add('opacity-100', 'pointer-events-auto');
                }
                
                // Tidak gunakan overflow hidden untuk sementara
                // document.documentElement.style.overflow = 'hidden';
            }

            function closeMobileMenu() {
                console.log('Closing mobile menu...');
                mobileMenu.classList.remove('translate-y-0', 'opacity-100');
                mobileMenu.classList.add('-translate-y-full', 'opacity-0');
                
                if (mobileMenuBackdrop) {
                    mobileMenuBackdrop.classList.remove('opacity-100', 'pointer-events-auto');
                    mobileMenuBackdrop.classList.add('opacity-0', 'pointer-events-none');
                }
                
                // Restore scroll
                // document.documentElement.style.overflow = 'auto';
            }            if (mobileMenuBtn && mobileMenu) {
                // Hamburger button click
                mobileMenuBtn.addEventListener('click', function(e) {
                    console.log('Hamburger button clicked!');
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    const isOpen = mobileMenu.classList.contains('translate-y-0');
                    console.log('Menu is currently open:', isOpen);

                    if (isOpen) {
                        closeMobileMenu();
                    } else {
                        openMobileMenu();
                    }

                    return false;
                }, true);

                // Close button click
                if (mobileMenuClose) {
                    mobileMenuClose.addEventListener('click', function(e) {
                        console.log('Close button clicked!');
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        closeMobileMenu();
                        return false;
                    });
                }

                // Backdrop click
                if (mobileMenuBackdrop) {
                    mobileMenuBackdrop.addEventListener('click', function(e) {
                        console.log('Backdrop clicked!');
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        closeMobileMenu();
                        return false;
                    });
                }

                // Close menu when clicking menu links
                const menuLinks = mobileMenu.querySelectorAll('a[href^="#"]');
                menuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        console.log('Menu link clicked, closing menu...');
                        setTimeout(closeMobileMenu, 100); // Small delay for smooth transition
                    });
                });

                // Close menu on ESC key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && mobileMenu.classList.contains('translate-y-0')) {
                        closeMobileMenu();
                    }
                });
            } else {
                console.error('Mobile menu elements not found!');
            }            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    // Skip if this is inside the mobile menu button or other non-navigation elements
                    if (this.closest('#mobileMenuBtn')) {
                        return;
                    }

                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add glow animation to logo on hover
            const logo = document.querySelector('.w-14.h-14');
            if (logo) {
                logo.addEventListener('mouseenter', function() {
                    this.classList.add('glow-animation');
                });
                logo.addEventListener('mouseleave', function() {
                    this.classList.remove('glow-animation');
                });
            }

            // Parallax effect for floating particles
            window.addEventListener('scroll', () => {
                const particles = document.querySelectorAll('.floating-particle');
                const scrolled = window.pageYOffset;

                particles.forEach((particle, index) => {
                    const speed = 0.5 + (index * 0.2);
                    particle.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });
        });
    </script>
</body>
</html>

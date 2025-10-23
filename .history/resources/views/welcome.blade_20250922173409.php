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

        /* Navbar scroll effect */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
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

    <!-- Ultra Spectacular Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-500" id="navbar">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 via-purple-500/15 to-orange-500/20 backdrop-blur-2xl border-b border-white/20"></div>
        <div class="absolute inset-0 bg-white/10 backdrop-blur-xl"></div>

        <!-- Floating Particles Background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-particle w-2 h-2 bg-blue-400/30 rounded-full absolute top-4 left-1/4 animate-bounce"></div>
            <div class="floating-particle w-1 h-1 bg-orange-400/40 rounded-full absolute top-6 right-1/3 animate-pulse"></div>
            <div class="floating-particle w-1.5 h-1.5 bg-purple-400/30 rounded-full absolute bottom-4 left-1/3 animate-ping"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Spectacular Logo -->
                <div class="flex items-center space-x-4 group">
                    <div class="relative transform group-hover:scale-110 transition-all duration-500">
                        <!-- Glowing Ring -->
                        <div class="absolute -inset-2 bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 rounded-2xl blur-lg opacity-30 group-hover:opacity-60 animate-pulse"></div>

                        <!-- Main Logo Container -->
                        <div class="relative w-14 h-14 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-2xl flex items-center justify-center shadow-2xl">
                            <i class="fas fa-graduation-cap text-white text-2xl transform group-hover:rotate-12 transition-transform duration-500"></i>

                            <!-- Sparkle Effects -->
                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                            <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-green-400 rounded-full animate-bounce"></div>
                        </div>
                    </div>

                    <div class="transform group-hover:translate-x-2 transition-transform duration-500">
                        <div class="font-black text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 bg-clip-text text-transparent">
                            TryOut ASNku
                        </div>
                        <div class="text-sm font-bold text-gray-600 tracking-wider">
                            ✨ Platform Premium Elite ✨
                        </div>
                    </div>
                </div>

                <!-- Spectacular Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-2">
                    <div class="flex items-center space-x-1 bg-white/20 backdrop-blur-xl rounded-2xl p-2 border border-white/30">
                        <a href="#features" class="nav-item group relative px-6 py-3 rounded-xl transition-all duration-300 hover:bg-white/20">
                            <span class="relative z-10 font-semibold text-gray-700 group-hover:text-blue-600 transition-colors duration-300">Fitur</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute -bottom-1 left-1/2 w-0 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full group-hover:w-8 group-hover:-translate-x-4 transition-all duration-300"></div>
                        </a>

                        <a href="#pricing" class="nav-item group relative px-6 py-3 rounded-xl transition-all duration-300 hover:bg-white/20">
                            <span class="relative z-10 font-semibold text-gray-700 group-hover:text-orange-600 transition-colors duration-300">Harga</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute -bottom-1 left-1/2 w-0 h-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-full group-hover:w-8 group-hover:-translate-x-4 transition-all duration-300"></div>
                        </a>

                        <a href="#testimonials" class="nav-item group relative px-6 py-3 rounded-xl transition-all duration-300 hover:bg-white/20">
                            <span class="relative z-10 font-semibold text-gray-700 group-hover:text-purple-600 transition-colors duration-300">Testimoni</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute -bottom-1 left-1/2 w-0 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full group-hover:w-8 group-hover:-translate-x-4 transition-all duration-300"></div>
                        </a>

                        <a href="#contact" class="nav-item group relative px-6 py-3 rounded-xl transition-all duration-300 hover:bg-white/20">
                            <span class="relative z-10 font-semibold text-gray-700 group-hover:text-green-600 transition-colors duration-300">Kontak</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-teal-500/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute -bottom-1 left-1/2 w-0 h-1 bg-gradient-to-r from-green-500 to-teal-500 rounded-full group-hover:w-8 group-hover:-translate-x-4 transition-all duration-300"></div>
                        </a>
                    </div>
                </div>

                <!-- Spectacular Auth Section -->
                <div class="flex items-center space-x-4">
                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="lg:hidden relative p-3 text-gray-700 hover:text-blue-600 transition-all duration-300 group">
                        <div class="absolute inset-0 bg-white/20 backdrop-blur-xl rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg class="relative w-6 h-6 transform group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Desktop Auth Buttons -->
                    <div class="hidden lg:flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="group relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-blue-700 text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-500 hover:shadow-blue-500/25 hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-700 via-purple-700 to-blue-800 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                                <div class="relative flex items-center space-x-3">
                                    <i class="fas fa-tachometer-alt text-xl"></i>
                                    <span>Dashboard Elite</span>
                                    <i class="fas fa-crown text-yellow-300 animate-pulse"></i>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="group relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 px-4 py-2 rounded-xl hover:bg-white/20">
                                <span class="relative z-10">Masuk</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="group relative overflow-hidden bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl transition-all duration-500 hover:shadow-orange-500/25 hover:scale-105 animate-pulse">
                                    <div class="absolute inset-0 bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                                    <div class="relative flex items-center space-x-3">
                                        <i class="fas fa-rocket text-xl"></i>
                                        <span>Daftar Gratis</span>
                                        <i class="fas fa-gift text-yellow-300"></i>
                                    </div>
                                    <!-- Sparkle Animation -->
                                    <div class="absolute top-1 right-1 w-2 h-2 bg-white rounded-full animate-ping"></div>
                                    <div class="absolute bottom-1 left-1 w-1 h-1 bg-yellow-300 rounded-full animate-bounce"></div>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Elegant Mobile Menu Sidebar -->
        <div id="mobileMenu" class="lg:hidden fixed top-0 right-0 w-80 h-screen z-40 transform translate-x-full transition-all duration-500">
            <!-- Sophisticated Background -->
            <div class="absolute inset-0 bg-white/95 backdrop-blur-xl border-l border-gray-200/50 shadow-2xl"></div>
            
            <!-- Subtle Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-orange-50/50"></div>

            <div class="relative p-6 h-full flex flex-col">
                <!-- Close Button -->
                <button id="mobileMenuClose" class="absolute top-6 right-6 w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-xl flex items-center justify-center text-gray-600 hover:text-gray-800 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Logo in Mobile Menu -->
                <div class="flex items-center space-x-3 mb-8 pt-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <div>
                        <div class="font-black text-lg bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 bg-clip-text text-transparent">
                            TryOut ASNku
                        </div>
                        <div class="text-xs text-gray-500 font-medium">Platform Premium</div>
                    </div>
                </div>

                <!-- Menu Items -->
                <div class="space-y-4 mb-8">
                    <a href="#features" class="group flex items-center space-x-4 p-3 rounded-xl hover:bg-blue-50 transition-all duration-300">
                        <div class="w-8 h-8 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-star text-blue-600 text-sm"></i>
                        </div>
                        <span class="font-semibold text-gray-700 group-hover:text-blue-600">Fitur Premium</span>
                    </a>
                    
                    <a href="#pricing" class="group flex items-center space-x-4 p-3 rounded-xl hover:bg-orange-50 transition-all duration-300">
                        <div class="w-8 h-8 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-gem text-orange-600 text-sm"></i>
                        </div>
                        <span class="font-semibold text-gray-700 group-hover:text-orange-600">Paket Harga</span>
                    </a>
                    
                    <a href="#testimonials" class="group flex items-center space-x-4 p-3 rounded-xl hover:bg-purple-50 transition-all duration-300">
                        <div class="w-8 h-8 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-heart text-purple-600 text-sm"></i>
                        </div>
                        <span class="font-semibold text-gray-700 group-hover:text-purple-600">Testimoni</span>
                    </a>
                    
                    <a href="#contact" class="group flex items-center space-x-4 p-3 rounded-xl hover:bg-green-50 transition-all duration-300">
                        <div class="w-8 h-8 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-phone text-green-600 text-sm"></i>
                        </div>
                        <span class="font-semibold text-gray-700 group-hover:text-green-600">Kontak Kami</span>
                    </a>
                </div>

                <!-- Mobile Auth Buttons -->
                <div class="space-y-4 mt-auto">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4 rounded-xl font-semibold text-center shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 p-4 rounded-xl font-semibold text-center transition-all duration-300">
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Masuk</span>
                            </div>
                        </a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block w-full bg-gradient-to-r from-orange-500 to-red-500 text-white p-4 rounded-xl font-semibold text-center shadow-lg hover:shadow-xl transition-all duration-300">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-rocket"></i>
                                    <span>Daftar Gratis</span>
                                </div>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>    </nav>

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

    <!-- Professional Features Section -->
    <section id="features" class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50/30 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Professional Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-blue-50 px-6 py-3 rounded-full text-blue-600 font-semibold mb-8">
                    <i class="fas fa-star mr-2"></i>
                    Platform Premium
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-6">
                    <span class="text-gradient">Revolusi</span> TryOut
                    <br>untuk <span class="text-gradient">Generasi ASN</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Sistem tryout tercanggih dengan analisis mendalam dan pembelajaran terpersonalisasi
                    yang mengantarkan ribuan peserta meraih impian menjadi ASN
                </p>
            </div>

            <!-- Professional Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-database text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">50,000+ Soal Premium</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Bank soal terlengkap se-Indonesia dengan update berkala dan pembahasan detail oleh ahli berpengalaman
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-orange-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-stopwatch text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Simulasi Real-Time</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">

                            Pengalaman tryout yang persis seperti ujian asli dengan timer dan sistem penilaian akurat
                        </p>
                    </div>

                <!-- Feature 3 -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Mendalam</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Laporan performa detail dengan visualisasi grafik dan rekomendasi strategi belajar personal
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-crown text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Leaderboard Nasional</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Kompetisi real-time dengan peserta se-Indonesia dilengkapi sistem poin dan achievement
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-red-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Modul Pembelajaran</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        E-book interaktif, video pembelajaran, dan ringkasan materi sesuai kisi-kisi terbaru
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-indigo-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-rocket text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Platform Revolusioner</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Interface modern, performa super cepat, dan sinkronisasi otomatis di semua perangkat
                    </p>
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
                        <div class="text-4xl md:text-5xl font-black text-blue-600 mb-2">15,000+</div>
                        <div class="text-gray-600 font-semibold">Peserta Aktif</div>
                    </div>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 mb-4 group-hover:shadow-lg transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-black text-green-600 mb-2">89%</div>
                        <div class="text-gray-600 font-semibold">Tingkat Kelulusan</div>
                    </div>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 mb-4 group-hover:shadow-lg transition-all duration-300">
                        <div class="text-4xl md:text-5xl font-black text-orange-600 mb-2">50,000+</div>
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

    <!-- Advanced Features Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 via-white to-orange-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-gradient-to-r from-blue-100 to-orange-100 px-6 py-3 rounded-full text-blue-700 font-semibold mb-8">
                    <i class="fas fa-star mr-2"></i>
                    Fitur Unggulan
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Solusi <span class="text-gradient">Komprehensif</span> untuk Kesuksesan ASN
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Platform terintegrasi dengan fitur-fitur canggih yang telah terbukti mengantarkan ribuan peserta meraih impian menjadi ASN
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1: Download Materi -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-download text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Download Materi & Pembahasan</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Unduh materi pembelajaran dan pembahasan detail setelah mengerjakan tryout untuk dipelajari offline
                    </p>
                </div>

                <!-- Feature 2: Multiple Tryouts per Kategori -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-tasks text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Multi Tryout per Kategori</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Berbagai variasi tryout TIU, TWK, TKP dengan tingkat kesulitan bertahap untuk setiap kategori
                    </p>
                </div>

                <!-- Feature 3: Live YouTube Private -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-red-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-video text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Live Session Eksklusif</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        2x seminggu live YouTube private dimulai 1 bulan sebelum jadwal tes dengan mentor berpengalaman
                    </p>
                </div>

                <!-- Feature 6: Timer & Scoring Realistis -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-orange-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Timer & Scoring Akurat</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Sistem timer dan scoring yang persis seperti ujian asli dengan prediksi passing grade
                    </p>
                </div>

                <!-- Feature 7: Diskusi & Tanya Jawab -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-red-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-comments text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-4">Forum Diskusi</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Diskusi dengan sesama peserta dan mentor untuk bertukar tips, strategi, dan motivasi
                    </p>
                </div>

                <!-- Feature 8: Ranking & Leaderboard -->
                <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl hover:border-green-300 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-105 transition-transform">
                        <i class="fas fa-trophy text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Ranking & Leaderboard</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        Sistem peringkat nasional dengan leaderboard real-time untuk memotivasi kompetisi sehat antar peserta
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

        // Spectacular Navigation and Mobile Menu Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Spectacular Navbar Scroll Effects
            const navbar = document.getElementById('navbar');
            let lastScrollY = window.scrollY;

            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;

                // Add/remove scrolled class for navbar styling
                if (currentScrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }

                // Hide/show navbar on scroll
                if (currentScrollY > lastScrollY && currentScrollY > 100) {
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    navbar.style.transform = 'translateY(0)';
                }

                lastScrollY = currentScrollY;
            });

            // Spectacular Mobile Menu
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuClose = document.getElementById('mobileMenuClose');

            if (mobileMenuBtn && mobileMenu) {
                // Open mobile menu
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.remove('-translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                    document.body.style.overflow = 'hidden';
                });

                // Close mobile menu
                if (mobileMenuClose) {
                    mobileMenuClose.addEventListener('click', function() {
                        mobileMenu.classList.add('-translate-x-full');
                        mobileMenu.classList.remove('translate-x-0');
                        document.body.style.overflow = 'auto';
                    });
                }

                // Close menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        mobileMenu.classList.add('-translate-x-full');
                        mobileMenu.classList.remove('translate-x-0');
                        document.body.style.overflow = 'auto';
                    }
                });

                // Close menu when clicking menu links
                const menuLinks = mobileMenu.querySelectorAll('a');
                menuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('-translate-x-full');
                        mobileMenu.classList.remove('translate-x-0');
                        document.body.style.overflow = 'auto';
                    });
                });
            }

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
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
@extends('layouts.auth')

@section('content')
<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Enhanced Floating Elements - Subtle like welcome page -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>
        <div class="floating-animation absolute top-40 right-20 w-32 h-32 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>
        <div class="floating-animation absolute bottom-40 left-20 w-16 h-16 bg-white/10 rounded-full" style="animation-delay: 2s;"></div>
        <div class="floating-animation absolute top-60 left-1/3 w-12 h-12 bg-blue-500/20 rounded-full" style="animation-delay: 0.5s;"></div>
        <div class="floating-animation absolute bottom-60 right-1/4 w-24 h-24 bg-orange-500/20 rounded-full" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="relative z-10 min-h-screen flex w-full">
        <!-- Left Side - Professional Branding (Welcome Style) -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center px-16 relative">
            <!-- Professional Stats Cards (Welcome Style) -->
            <div class="absolute top-20 right-20 premium-card rounded-2xl p-6 rotate-3 hover:rotate-1 transition-transform duration-500">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <div>
                        <div class="text-white font-bold text-lg">98%</div>
                        <div class="text-blue-200 text-sm">Success Rate</div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-32 right-32 premium-card rounded-2xl p-6 -rotate-3 hover:rotate-0 transition-transform duration-500">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <div>
                        <div class="text-white font-bold text-lg">50K+</div>
                        <div class="text-blue-200 text-sm">Members</div>
                    </div>
                </div>
            </div>

            <!-- Main Content (Welcome Style) -->
            <div class="text-white space-y-8">
                <!-- Logo with Professional Styling -->
                <div class="relative">
                    <h1 class="text-6xl font-black mb-4 bg-gradient-to-r from-white via-blue-100 to-orange-200 bg-clip-text text-transparent">
                        TryOut<span class="text-gradient bg-gradient-to-r from-orange-400 to-orange-500 bg-clip-text text-transparent">ASN</span>ku
                    </h1>
                </div>

                <div class="space-y-6">
                    <p class="text-xl font-light text-blue-100 leading-relaxed">
                        Platform persiapan <span class="font-bold text-orange-300">CPNS & PPPK</span> dengan teknologi terdepan
                    </p>

                    <!-- Features with Professional Icons (Welcome Style) -->
                    <div class="space-y-4 mt-8">
                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-book-open text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-sm">Bank soal terlengkap dan terupdate</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Analisis Mendalam</div>
                                <div class="text-blue-200 text-sm">Laporan detail dan rekomendasi belajar</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-trophy text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Ranking Nasional</div>
                                <div class="text-blue-200 text-sm">Kompetisi real-time dengan peserta lain</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Professional Login Form (Welcome Style) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 relative">
            <!-- Mobile Logo -->
            <div class="lg:hidden absolute top-8 left-1/2 transform -translate-x-1/2 text-center">
                <h1 class="text-3xl font-black text-white mb-2 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">TryOut ASNku</h1>
            </div>

            <div class="w-full max-w-md relative">
                <!-- Login Card (Welcome Style) -->
                <div class="bg-white/[0.08] backdrop-blur-2xl rounded-3xl border border-white/20 p-8 shadow-2xl">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-3">
                            Selamat Datang Kembali
                        </h2>
                        <p class="text-blue-200">
                            Masuk untuk melanjutkan persiapan CPNS Anda
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-blue-200">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       class="w-full pl-10 pr-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-blue-200">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password"
                                       type="password"
                                       name="password"
                                       required
                                       autocomplete="current-password"
                                       class="w-full pl-10 pr-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-300">
                                @error('password')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="remember"
                                       class="w-4 h-4 text-blue-500 bg-white/10 border-white/20 rounded focus:ring-blue-400/20">
                                <span class="ml-2 text-blue-200 text-sm">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-blue-400 hover:text-blue-300 text-sm transition-colors duration-200">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button (Welcome Style) -->
                        <button type="submit"
                                class="w-full enhanced-button text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2 glow-effect">
                            <span>Sign In</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-6 pt-6 border-t border-white/10 text-center">
                        <p class="text-blue-200">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                               class="font-bold text-orange-400 hover:text-orange-300 transition-colors duration-200">
                                Create Account
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            </div>

            <!-- Main Content -->
            <div class="text-white space-y-8">
                <!-- Logo with glow -->
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-violet-600 via-purple-600 to-cyan-600 rounded-3xl blur-2xl opacity-30 animate-pulse"></div>
                    <h1 class="relative text-7xl font-black mb-4 bg-gradient-to-r from-white via-purple-200 to-cyan-200 bg-clip-text text-transparent">
                        TryOut<span class="text-gradient bg-gradient-to-r from-violet-400 to-cyan-400 bg-clip-text text-transparent">ASN</span>ku
                    </h1>
                </div>

                <div class="space-y-6">
                    <p class="text-2xl font-light text-gray-200 leading-relaxed">
                        Revolusi persiapan <span class="font-bold bg-gradient-to-r from-violet-400 to-cyan-400 bg-clip-text text-transparent">CPNS & PPPK</span> dengan teknologi AI terdepan
                    </p>

                    <!-- Features with icons -->
                    <div class="space-y-4 mt-8">
                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/25">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">Bank Soal Premium</div>
                                <div class="text-gray-300">50,000+ soal berkualitas tinggi terupdate</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/25">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">AI-Powered Analytics</div>
                                <div class="text-gray-300">Analisis mendalam dengan teknologi AI</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-500/25">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">Real-time Ranking</div>
                                <div class="text-gray-300">Kompetisi nasional dengan ranking live</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Spectacular Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 relative">
            <!-- Mobile Logo -->
            <div class="lg:hidden absolute top-8 left-1/2 transform -translate-x-1/2 text-center">
                <h1 class="text-4xl font-black text-white mb-2 bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">TryOut ASNku</h1>
            </div>

            <div class="w-full max-w-md relative">
                <!-- Glow effect behind card -->
                <div class="absolute -inset-6 bg-gradient-to-r from-violet-600 via-purple-600 to-cyan-600 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>

                <!-- Login Card -->
                <div class="relative bg-white/[0.08] backdrop-blur-2xl rounded-3xl border border-white/20 p-10 shadow-2xl">
                    <!-- Header -->
                    <div class="text-center mb-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-2xl shadow-violet-500/25">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-3 bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">
                            Welcome Back
                        </h2>
                        <p class="text-gray-300 text-lg">
                            Lanjutkan perjalanan sukses CPNS Anda
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-8">
                        @csrf

                        <!-- Email Field -->
                        <div class="space-y-3">
                            <label for="email" class="block text-sm font-semibold text-gray-200 uppercase tracking-wider">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:border-violet-400 focus:ring-4 focus:ring-violet-400/20 transition-all duration-300 text-lg">
                                @error('email')
                                    <p class="mt-3 text-sm text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-3">
                            <label for="password" class="block text-sm font-semibold text-gray-200 uppercase tracking-wider">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input id="password"
                                       type="password"
                                       name="password"
                                       required
                                       autocomplete="current-password"
                                       class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:border-violet-400 focus:ring-4 focus:ring-violet-400/20 transition-all duration-300 text-lg">
                                @error('password')
                                    <p class="mt-3 text-sm text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="remember"
                                       class="w-5 h-5 text-violet-500 bg-white/10 border-white/20 rounded-lg focus:ring-violet-400/20 focus:ring-4">
                                <span class="ml-3 text-gray-300 font-medium">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-violet-400 hover:text-violet-300 font-semibold transition-colors duration-200">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                                class="w-full relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 via-purple-600 to-cyan-600 rounded-2xl blur-lg opacity-70 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative bg-gradient-to-r from-violet-600 via-purple-600 to-cyan-600 text-white font-bold py-4 px-6 rounded-2xl text-lg transition-all duration-300 transform group-hover:scale-105 flex items-center justify-center space-x-2">
                                <span>Sign In</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-8 pt-8 border-t border-white/10 text-center">
                        <p class="text-gray-300 text-lg">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                               class="font-bold text-transparent bg-gradient-to-r from-violet-400 to-cyan-400 bg-clip-text hover:from-violet-300 hover:to-cyan-300 transition-colors duration-200">
                                Create Account
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

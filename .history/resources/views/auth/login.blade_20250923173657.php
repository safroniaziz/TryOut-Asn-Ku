@extends('layouts.auth')

@section('content')
<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">

    <div class="relative z-10 min-h-screen flex w-full">
        <!-- Left Side - Professional Branding -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center px-16 relative">
            <!-- Main Content -->
            <div class="text-white space-y-8">
                <!-- Logo with Professional Styling -->
                <div class="relative">
                    <h1 class="text-6xl font-black mb-4 text-white">
                        TryOut<span class="text-blue-400">ASN</span>ku
                    </h1>
                </div>

                <div class="space-y-6">
                    <p class="text-xl font-light text-gray-200 leading-relaxed">
                        Platform persiapan <span class="font-bold text-white">CPNS & PPPK</span> dengan teknologi terdepan
                    </p>

                    <!-- Features with Professional Icons -->
                    <div class="space-y-4 mt-8">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-book-open text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">50,000+ Soal Premium</div>
                                <div class="text-gray-300 text-sm">Bank soal terlengkap dan terupdate</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Analisis Mendalam</div>
                                <div class="text-gray-300 text-sm">Laporan detail dan rekomendasi belajar</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-trophy text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Ranking Nasional</div>
                                <div class="text-gray-300 text-sm">Kompetisi real-time dengan peserta lain</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Professional Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 relative">
            <!-- Mobile Logo -->
            <div class="lg:hidden absolute top-8 left-1/2 transform -translate-x-1/2 text-center">
                <h1 class="text-3xl font-black text-white mb-2">TryOut ASNku</h1>
            </div>

            <div class="w-full max-w-md relative">
                <!-- Login Card -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">
                            Selamat Datang Kembali
                        </h2>
                        <p class="text-gray-600">
                            Masuk untuk melanjutkan persiapan CPNS Anda
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">
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
                                       class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">
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
                                       class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="remember"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <span class="ml-2 text-gray-700 text-sm">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-blue-600 hover:text-blue-700 text-sm transition-colors duration-200">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
                            <span>Sign In</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                               class="font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
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

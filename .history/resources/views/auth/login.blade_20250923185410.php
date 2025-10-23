@extends('layouts.auth')

@section('content')
<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-center min-h-screen">

            <!-- Left Side - Informative Branding -->
            <div class="hidden lg:flex lg:w-1/2 flex-col justify-center pr-8">
                <div class="text-white space-y-6">
                    <!-- Logo -->
                    <div>
                        <h1 class="text-5xl font-black mb-4 text-white">
                            TryOut<span class="text-orange-400">ASN</span>ku
                        </h1>
                        <p class="text-lg text-blue-100 leading-relaxed">
                            Platform persiapan <span class="font-bold text-orange-300">CPNS & PPPK</span> terpercaya
                        </p>
                    </div>

                    <!-- Informative Features -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-book-open text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-sm">Bank soal terlengkap dengan pembahasan detail</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Analisis Mendalam</div>
                                <div class="text-blue-200 text-sm">Laporan dan rekomendasi belajar personal</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-trophy text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Ranking Nasional</div>
                                <div class="text-blue-200 text-sm">Kompetisi dengan ribuan peserta lain</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Komunitas Aktif</div>
                                <div class="text-blue-200 text-sm">Belajar bersama 10,000+ member</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-4 border-t border-white/20">
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">98%</div>
                            <div class="text-blue-200 text-xs">Success Rate</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">10K+</div>
                            <div class="text-blue-200 text-xs">Members</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">24/7</div>
                            <div class="text-blue-200 text-xs">Support</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-4xl font-black text-white mb-2">
                        TryOut<span class="text-orange-400">ASN</span>ku
                    </h1>
                    <p class="text-blue-100">Platform persiapan CPNS & PPPK terpercaya</p>
                </div>

                <div class="w-full max-w-md">
                    <!-- Login Card -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl">
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <!-- Logo dengan Gradient -->
                            <div class="relative transform hover:scale-110 transition-all duration-500 mx-auto mb-6 w-20 h-20">
                                <div class="relative w-20 h-20 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-2xl flex items-center justify-center shadow-2xl">
                                    <i class="fas fa-graduation-cap text-white text-3xl transform hover:rotate-12 transition-transform duration-500"></i>
                                </div>
                            </div>
                            
                            <!-- Brand Name -->
                            <div class="mb-4">
                                <div class="font-black text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-orange-600 bg-clip-text text-transparent mb-1">
                                    TryOut ASNku
                                </div>
                                <div class="text-sm font-semibold text-gray-500">
                                    Platform Premium
                                </div>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                                Selamat Datang Kembali
                            </h2>
                            <p class="text-gray-600">
                                Masuk untuk melanjutkan persiapan CPNS Anda
                            </p>

                            <!-- Back to Home Button -->
                            <div class="mt-4">
                                <a href="{{ url('/') }}"
                                   class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-700 transition-colors duration-200 text-sm">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Kembali ke Home</span>
                                </a>
                            </div>
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
                                           placeholder="Masukkan email Anda"
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
                                           placeholder="Masukkan password Anda"
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
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
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
</div>
@endsection

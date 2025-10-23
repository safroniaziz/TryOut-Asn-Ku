@extends('layouts.auth')

@section('content')
<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">

    <div class="relative z-10 min-h-screen flex w-full items-center justify-center">
        <div class="max-w-6xl mx-auto w-full flex items-center">
            <!-- Left Side - Rich Branding -->
            <div class="hidden lg:flex lg:w-1/2 flex-col justify-center pr-12">
                <!-- Main Content -->
                <div class="text-white space-y-8">
                    <!-- Logo -->
                    <div class="relative">
                        <h1 class="text-5xl font-black mb-4 text-white">
                            TryOut<span class="text-orange-400">ASN</span>ku
                        </h1>
                        <p class="text-lg text-blue-100 leading-relaxed mb-6">
                            Platform persiapan <span class="font-bold text-orange-300">CPNS & PPPK</span> terpercaya
                        </p>
                    </div>

                    <!-- Rich Features -->
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-book-open text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-sm leading-relaxed">Bank soal terlengkap dengan pembahasan detail dari para ahli. Update soal terbaru setiap minggu.</div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Analisis Mendalam</div>
                                <div class="text-blue-200 text-sm leading-relaxed">Laporan pembelajaran detail dengan rekomendasi belajar personal berdasarkan hasil tryout Anda.</div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-trophy text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Ranking Nasional</div>
                                <div class="text-blue-200 text-sm leading-relaxed">Kompetisi real-time dengan ribuan peserta lain. Lihat posisi Anda di ranking nasional.</div>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Komunitas Aktif</div>
                                <div class="text-blue-200 text-sm leading-relaxed">Bergabung dengan komunitas belajar 10,000+ calon ASN. Diskusi dan sharing tips sukses.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-6 border-t border-white/20">
                        <div class="text-center">
                            <div class="text-2xl font-black text-white">98%</div>
                            <div class="text-blue-200 text-xs">Success Rate</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-black text-white">10K+</div>
                            <div class="text-blue-200 text-xs">Members</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-black text-white">24/7</div>
                            <div class="text-blue-200 text-xs">Support</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Clear Login Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center pl-12 py-8">
                <!-- Mobile Logo -->
                <div class="lg:hidden absolute top-8 left-1/2 transform -translate-x-1/2 text-center">
                    <h1 class="text-3xl font-black text-white mb-2">TryOut ASNku</h1>
                </div>

                <div class="w-full max-w-md relative">
                    <!-- Login Card -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100">
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
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg text-lg">
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

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
                            Join<span class="text-orange-400">ASN</span>ku
                        </h1>
                        <p class="text-lg text-blue-100 leading-relaxed">
                            Bergabung dengan <span class="font-bold text-orange-300">10,000+</span> calon ASN sukses
                        </p>
                    </div>

                    <!-- Benefits -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gift text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Free Trial 7 Hari</div>
                                <div class="text-blue-200 text-sm">Akses penuh semua fitur premium</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-book-open text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-sm">Bank soal terlengkap dengan pembahasan</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Komunitas Aktif</div>
                                <div class="text-blue-200 text-sm">Diskusi dan berbagi tips dengan sesama</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Analisis Personal</div>
                                <div class="text-blue-200 text-sm">Laporan dan rekomendasi belajar</div>
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
                            <div class="text-xl font-bold text-white">FREE</div>
                            <div class="text-blue-200 text-xs">7 Days Trial</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">24/7</div>
                            <div class="text-blue-200 text-xs">Support</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Register Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-4xl font-black text-white mb-2">
                        Join<span class="text-orange-400">ASN</span>ku
                    </h1>
                    <p class="text-blue-100">Bergabung dengan 10,000+ calon ASN sukses</p>
                </div>

                <div class="w-full max-w-md">
                    <!-- Register Card -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl">
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <i class="fas fa-user-plus text-white text-2xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                                Buat Akun Baru
                            </h2>
                            <p class="text-gray-600">
                                Mulai perjalanan sukses CPNS Anda hari ini
                            </p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf

                            <!-- Name Field -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-gray-700">
                                    Nama Lengkap
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input id="name"
                                           type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           required
                                           autocomplete="name"
                                           placeholder="Masukkan nama lengkap Anda"
                                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

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
                                           autocomplete="new-password"
                                           placeholder="Masukkan password Anda"
                                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="space-y-2">
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">
                                    Konfirmasi Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-check-circle text-gray-400"></i>
                                    </div>
                                    <input id="password_confirmation"
                                           type="password"
                                           name="password_confirmation"
                                           required
                                           autocomplete="new-password"
                                           placeholder="Konfirmasi password Anda"
                                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                </div>
                            </div>

                            <!-- Register Button -->
                            <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
                                <span>Create Account</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>

                        <!-- Login Link -->
                        <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                            <p class="text-gray-600">
                                Already have an account?
                                <a href="{{ route('login') }}"
                                   class="font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                    Sign In
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

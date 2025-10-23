@extends('layouts.auth')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 flex">
    <!-- Left Side - Branding -->
    <div class="hidden lg:flex lg:w-1/2 flex-col justify-center px-12">
        <div class="text-white">
            <h1 class="text-5xl font-bold mb-6 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                TryOut ASNku
            </h1>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Platform persiapan tes CPNS terdepan dengan soal-soal berkualitas tinggi dan analisis mendalam.
            </p>
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <span class="text-gray-300">Ribuan soal berkualitas tinggi</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                    <span class="text-gray-300">Analisis mendalam hasil tryout</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                    <span class="text-gray-300">Ranking nasional real-time</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">TryOut ASNku</h1>
                <p class="text-gray-300">Masuk ke akun Anda</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 p-8 shadow-2xl">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang Kembali</h2>
                    <p class="text-gray-300">Masuk untuk melanjutkan persiapan CPNS Anda</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-200 mb-2">
                            Email
                        </label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autocomplete="email"
                               class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition-all duration-200">
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-200 mb-2">
                            Password
                        </label>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition-all duration-200">
                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox"
                                   name="remember"
                                   class="w-4 h-4 text-cyan-400 bg-white/5 border-white/20 rounded focus:ring-cyan-400/20">
                            <span class="ml-2 text-sm text-gray-300">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-cyan-400 hover:text-cyan-300 transition-colors duration-200">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 focus:ring-4 focus:ring-cyan-400/20">
                        Masuk
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-300">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                           class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors duration-200">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

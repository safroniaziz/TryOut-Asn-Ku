@extends('layouts.auth')

@section('content')
<div class="min-h-screen relative overflow-hidden bg-slate-950">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <!-- Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-violet-900 via-purple-900 to-slate-900"></div>
        
        <!-- Animated Orbs -->
        <div class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-r from-emerald-400 to-cyan-600 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-gradient-to-r from-violet-400 to-purple-600 rounded-full opacity-20 blur-3xl animate-bounce" style="animation-duration: 3s;"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-gradient-to-r from-rose-400 to-pink-600 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        
        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
    </div>

    <div class="relative z-10 min-h-screen flex">
        <!-- Left Side - Spectacular Branding -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center px-16 relative">
            <!-- Floating Stats Cards -->
            <div class="absolute top-20 right-20 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 rotate-6 hover:rotate-3 transition-transform duration-500">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-cyan-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold">50,000+</div>
                        <div class="text-gray-300 text-sm">Students Joined</div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-32 right-32 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 -rotate-6 hover:rotate-0 transition-transform duration-500">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold">Free Trial</div>
                        <div class="text-gray-300 text-sm">30 Days Access</div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="text-white space-y-8">
                <!-- Logo with glow -->
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-emerald-600 via-cyan-600 to-purple-600 rounded-3xl blur-2xl opacity-30 animate-pulse"></div>
                    <h1 class="relative text-7xl font-black mb-4 bg-gradient-to-r from-white via-cyan-200 to-purple-200 bg-clip-text text-transparent">
                        Join<span class="text-gradient bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">ASN</span>ku
                    </h1>
                </div>

                <div class="space-y-6">
                    <p class="text-2xl font-light text-gray-200 leading-relaxed">
                        Bergabung dengan <span class="font-bold bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">50,000+ calon ASN</span> dan raih impian karir Anda
                    </p>
                    
                    <!-- Features with icons -->
                    <div class="space-y-4 mt-8">
                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/25">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">Akses Selamanya</div>
                                <div class="text-gray-300">Sekali daftar, akses semua fitur premium</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/25">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">Instant Setup</div>
                                <div class="text-gray-300">Langsung mulai tryout dalam 30 detik</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 group hover:translate-x-2 transition-transform duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-500/25">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-white font-semibold text-lg">Success Guarantee</div>
                                <div class="text-gray-300">98% tingkat kelulusan peserta kami</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Spectacular Register Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 relative">
            <!-- Mobile Logo -->
            <div class="lg:hidden absolute top-8 left-1/2 transform -translate-x-1/2 text-center">
                <h1 class="text-4xl font-black text-white mb-2 bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent">TryOut ASNku</h1>
            </div>

            <div class="w-full max-w-md relative">
                <!-- Glow effect behind card -->
                <div class="absolute -inset-6 bg-gradient-to-r from-emerald-600 via-cyan-600 to-purple-600 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>
                
                <!-- Register Card -->
                <div class="relative bg-white/[0.08] backdrop-blur-2xl rounded-3xl border border-white/20 p-10 shadow-2xl">
                    <!-- Header -->
                    <div class="text-center mb-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-2xl shadow-emerald-500/25">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-3 bg-gradient-to-r from-white to-cyan-200 bg-clip-text text-transparent">
                            Create Account
                        </h2>
                        <p class="text-gray-300 text-lg">
                            Mulai perjalanan sukses CPNS Anda hari ini
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-7">
                        @csrf

                        <!-- Name Field -->
                        <div class="space-y-3">
                            <label for="name" class="block text-sm font-semibold text-gray-200 uppercase tracking-wider">
                                Full Name
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input id="name" 
                                       type="text" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autocomplete="name"
                                       class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/20 transition-all duration-300 text-lg">
                                @error('name')
                                    <p class="mt-3 text-sm text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

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
                                       class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/20 transition-all duration-300 text-lg">
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
                                       autocomplete="new-password"
                                       class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/20 transition-all duration-300 text-lg">
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

                        <!-- Confirm Password Field -->
                        <div class="space-y-3">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-200 uppercase tracking-wider">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <input id="password_confirmation" 
                                       type="password" 
                                       name="password_confirmation" 
                                       required 
                                       autocomplete="new-password"
                                       class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/20 transition-all duration-300 text-lg">
                            </div>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" 
                                class="w-full relative group mt-8">
                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 via-cyan-600 to-purple-600 rounded-2xl blur-lg opacity-70 group-hover:opacity-100 transition duration-300"></div>
                            <div class="relative bg-gradient-to-r from-emerald-600 via-cyan-600 to-purple-600 text-white font-bold py-4 px-6 rounded-2xl text-lg transition-all duration-300 transform group-hover:scale-105 flex items-center justify-center space-x-2">
                                <span>Create Account</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-8 pt-8 border-t border-white/10 text-center">
                        <p class="text-gray-300 text-lg">
                            Already have an account? 
                            <a href="{{ route('login') }}" 
                               class="font-bold text-transparent bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text hover:from-emerald-300 hover:to-cyan-300 transition-colors duration-200">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
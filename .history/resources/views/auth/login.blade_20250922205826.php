<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Masuk</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
            --neon-blue: #00d4ff;
            --neon-purple: #b537f2;
            --neon-pink: #ff006e;
            --cyber-green: #00ff88;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            overflow-x: hidden;
        }

        /* SPECTACULAR ANIMATED BACKGROUND */
        .cyber-bg {
            background: linear-gradient(45deg, #0a0a23, #1a1a3e, #2d1b69, #764ba2);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .cyber-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(181, 55, 242, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 40% 60%, rgba(255, 0, 110, 0.08) 0%, transparent 40%);
            animation: bgShift 8s ease-in-out infinite;
        }

        @keyframes bgShift {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(2deg); }
        }

        /* PARTICLE SYSTEM */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--neon-blue);
            border-radius: 50%;
            animation: float-particle 15s linear infinite;
            box-shadow: 0 0 10px var(--neon-blue);
        }

        .particle:nth-child(2n) {
            background: var(--neon-purple);
            box-shadow: 0 0 10px var(--neon-purple);
            animation-duration: 20s;
        }

        .particle:nth-child(3n) {
            background: var(--cyber-green);
            box-shadow: 0 0 10px var(--cyber-green);
            animation-duration: 25s;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* HOLOGRAPHIC CARDS */
        .holo-card {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.1) 0%, 
                rgba(255, 255, 255, 0.05) 50%, 
                rgba(255, 255, 255, 0.1) 100%);
            backdrop-filter: blur(25px);
            border: 2px solid transparent;
            background-clip: padding-box;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 60px rgba(0, 212, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .holo-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple), var(--neon-pink), var(--cyber-green));
            z-index: -1;
            border-radius: inherit;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .holo-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: holographicSweep 3s infinite;
        }

        @keyframes holographicSweep {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* NEON LOGO */
        .neon-logo {
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.7));
            animation: neonPulse 2s ease-in-out infinite alternate;
            font-family: 'Orbitron', monospace;
        }

        @keyframes neonPulse {
            from { filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.7)); }
            to { filter: drop-shadow(0 0 35px rgba(181, 55, 242, 0.9)); }
        }

        /* CYBER INPUTS */
        .cyber-input {
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(0, 212, 255, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .cyber-input::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 212, 255, 0.1), transparent);
            transition: left 0.6s;
        }

        .cyber-input:focus {
            border-color: var(--neon-blue);
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 
                0 0 30px rgba(0, 212, 255, 0.4),
                inset 0 0 20px rgba(0, 212, 255, 0.1);
            transform: translateY(-2px) scale(1.02);
        }

        .cyber-input:focus::before {
            left: 100%;
        }

        /* QUANTUM BUTTON */
        .quantum-btn {
            background: var(--primary-gradient);
            border: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.4s ease;
            box-shadow: 
                0 15px 35px rgba(118, 75, 162, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .quantum-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
            z-index: -1;
        }

        .quantum-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 
                0 25px 50px rgba(118, 75, 162, 0.6),
                0 0 40px rgba(0, 212, 255, 0.3);
        }

        .quantum-btn:hover::before {
            transform: translateX(100%);
        }

        .quantum-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .quantum-btn:active::after {
            width: 300px;
            height: 300px;
        }

        /* FEATURE CARDS WITH 3D EFFECT */
        .feature-3d {
            transform-style: preserve-3d;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            cursor: pointer;
        }

        .feature-3d:hover {
            transform: rotateY(10deg) rotateX(5deg) translateZ(20px);
            box-shadow: 
                -10px 20px 40px rgba(0, 0, 0, 0.3),
                0 0 30px rgba(0, 212, 255, 0.2);
        }

        /* GLITCH EFFECT */
        .glitch {
            position: relative;
            animation: glitch 2s infinite;
        }

        @keyframes glitch {
            0%, 90%, 100% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
        }

        /* MATRIX RAIN EFFECT */
        .matrix-rain {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .matrix-char {
            position: absolute;
            color: var(--cyber-green);
            font-family: 'Courier New', monospace;
            font-size: 14px;
            animation: matrix-fall 8s linear infinite;
            opacity: 0.7;
        }

        @keyframes matrix-fall {
            0% {
                transform: translateY(-100vh);
                opacity: 0;
            }
            10% {
                opacity: 0.7;
            }
            90% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        /* TYPING ANIMATION */
        .typing-text::after {
            content: '|';
            animation: blink 1s infinite;
            color: var(--neon-blue);
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        /* CYBER STATS */
        .cyber-stat {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(0, 212, 255, 0.3);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .cyber-stat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--neon-blue), var(--neon-purple));
            animation: progressBar 3s ease-in-out infinite;
        }

        @keyframes progressBar {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(0%); }
            100% { transform: translateX(100%); }
        }

        /* RESPONSIVE IMPROVEMENTS */
        @media (max-width: 768px) {
            .feature-3d:hover {
                transform: scale(1.05);
            }
        }
    </style>
</head>
<body class="cyber-bg">
    <!-- PARTICLE SYSTEM -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 4.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 1.5s;"></div>
    </div>

    <!-- MATRIX RAIN -->
    <div class="matrix-rain">
        <div class="matrix-char" style="left: 5%; animation-delay: 0s;">1</div>
        <div class="matrix-char" style="left: 15%; animation-delay: 1s;">0</div>
        <div class="matrix-char" style="left: 25%; animation-delay: 2s;">1</div>
        <div class="matrix-char" style="left: 35%; animation-delay: 3s;">0</div>
        <div class="matrix-char" style="left: 45%; animation-delay: 4s;">1</div>
        <div class="matrix-char" style="left: 55%; animation-delay: 5s;">0</div>
        <div class="matrix-char" style="left: 65%; animation-delay: 1.5s;">1</div>
        <div class="matrix-char" style="left: 75%; animation-delay: 2.5s;">0</div>
        <div class="matrix-char" style="left: 85%; animation-delay: 3.5s;">1</div>
        <div class="matrix-char" style="left: 95%; animation-delay: 4.5s;">0</div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative z-10">
        <div class="w-full max-w-7xl">
            <div class="grid lg:grid-cols-5 gap-12 items-center">
                
                <!-- LEFT SIDE - CYBER BRANDING -->
                <div class="lg:col-span-2">
                    <div class="holo-card rounded-3xl p-10 text-white">
                        <!-- NEON LOGO SECTION -->
                        <div class="text-center mb-10">
                            <div class="relative">
                                <div class="w-28 h-28 mx-auto mb-8 relative">
                                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 rounded-full animate-spin"></div>
                                    <div class="absolute inset-2 bg-black rounded-full flex items-center justify-center">
                                        <i class="fas fa-rocket text-4xl text-transparent bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="text-6xl font-black neon-logo mb-4 glitch">
                                TryOut<span class="text-transparent bg-gradient-to-r from-pink-500 to-yellow-400 bg-clip-text">ASN</span>
                            </h1>
                            <p class="text-cyan-300 text-xl font-medium typing-text">Next-Gen ASN Preparation Portal</p>
                        </div>

                        <!-- CYBER STATS -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-cyan-400">50K+</div>
                                <div class="text-xs text-gray-300">SOAL PREMIUM</div>
                            </div>
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-purple-400">95%</div>
                                <div class="text-xs text-gray-300">SUCCESS RATE</div>
                            </div>
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-pink-400">24/7</div>
                                <div class="text-xs text-gray-300">AI SUPPORT</div>
                            </div>
                            <div class="cyber-stat rounded-xl p-4 text-center">
                                <div class="text-3xl font-black text-green-400">∞</div>
                                <div class="text-xs text-gray-300">POSSIBILITIES</div>
                            </div>
                        </div>

                        <!-- 3D FEATURE CARDS -->
                        <div class="space-y-4">
                            <h3 class="text-2xl font-bold text-cyan-300 mb-6 text-center">🚀 QUANTUM FEATURES</h3>
                            
                            <div class="feature-3d holo-card rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-brain text-white text-xl relative z-10"></i>
                                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-transparent opacity-50 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-lg">AI-Powered Analytics</h4>
                                        <p class="text-cyan-200 text-sm">Real-time performance prediction</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-3d holo-card rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-pink-600 rounded-xl flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-network-wired text-white text-xl relative z-10"></i>
                                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-transparent opacity-50 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-lg">Neural Network Scoring</h4>
                                        <p class="text-purple-200 text-sm">Advanced ML algorithms</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-3d holo-card rounded-xl p-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center relative overflow-hidden">
                                        <i class="fas fa-satellite text-white text-xl relative z-10"></i>
                                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-transparent opacity-50 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white text-lg">Quantum Community</h4>
                                        <p class="text-green-200 text-sm">Elite learner network</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE - QUANTUM LOGIN PORTAL -->
                <div class="lg:col-span-3">
                    <div class="holo-card rounded-3xl p-10">
                        <!-- PORTAL HEADER -->
                        <div class="text-center mb-10">
                            <div class="relative">
                                <div class="w-20 h-20 mx-auto mb-6 relative">
                                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 via-purple-500 to-pink-500 rounded-full animate-spin"></div>
                                    <div class="absolute inset-1 bg-black rounded-full flex items-center justify-center">
                                        <i class="fas fa-key text-2xl text-transparent bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-4xl font-black neon-logo mb-3">
                                ACCESS PORTAL
                            </h3>
                            <p class="text-gray-300">Enter the quantum realm of ASN preparation</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-8">
                            @csrf
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- QUANTUM INPUT SECTION -->
                            <div class="holo-card rounded-2xl p-8 bg-black/20">
                                <h4 class="text-xl font-bold neon-logo mb-6 flex items-center">
                                    <i class="fas fa-user-astronaut mr-3 text-cyan-400"></i>
                                    AUTHENTICATION REQUIRED
                                </h4>
                                
                                <div class="space-y-6">
                                    <div class="relative">
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                               placeholder="QUANTUM EMAIL ADDRESS" 
                                               class="cyber-input w-full px-6 py-4 rounded-xl focus:outline-none text-white placeholder-gray-400 font-mono text-lg">
                                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                            <i class="fas fa-envelope text-cyan-400"></i>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    
                                    <div class="relative">
                                        <input id="password" type="password" name="password" required 
                                               placeholder="SECURITY PASSPHRASE" 
                                               class="cyber-input w-full px-6 py-4 rounded-xl focus:outline-none text-white placeholder-gray-400 font-mono text-lg">
                                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                            <i class="fas fa-lock text-purple-400"></i>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <!-- QUANTUM OPTIONS -->
                            <div class="space-y-6">
                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="flex items-center cursor-pointer">
                                        <input id="remember_me" type="checkbox" name="remember" 
                                               class="w-5 h-5 text-cyan-600 border-2 border-cyan-400 rounded bg-transparent focus:ring-cyan-500 focus:ring-2">
                                        <span class="ml-3 text-gray-300 font-medium">Maintain Quantum State</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-cyan-400 hover:text-purple-400 font-semibold transition-colors duration-300">
                                            Reset Quantum Key?
                                        </a>
                                    @endif
                                </div>

                                <!-- QUANTUM LAUNCH BUTTON -->
                                <button type="submit" 
                                        class="quantum-btn w-full text-white py-5 rounded-xl font-black text-xl transition-all duration-500 relative">
                                    <span class="relative z-10 flex items-center justify-center">
                                        <i class="fas fa-rocket mr-3"></i>
                                        🚀 INITIATE QUANTUM LOGIN
                                        <i class="fas fa-bolt ml-3"></i>
                                    </span>
                                </button>
                            </div>

                            <!-- PORTAL NAVIGATION -->
                            <div class="text-center pt-4">
                                <p class="text-gray-400">
                                    No quantum access yet? 
                                    <a href="{{ route('register') }}" class="neon-logo font-bold hover:text-pink-400 transition-colors duration-300">
                                        Create Quantum Identity
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Dynamic particle generation
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 5 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            document.querySelector('.particles').appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 20000);
        }

        // Generate particles continuously
        setInterval(createParticle, 2000);

        // Add some interactivity
        document.addEventListener('mousemove', (e) => {
            const cursor = document.createElement('div');
            cursor.style.position = 'fixed';
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            cursor.style.width = '4px';
            cursor.style.height = '4px';
            cursor.style.backgroundColor = '#00d4ff';
            cursor.style.borderRadius = '50%';
            cursor.style.pointerEvents = 'none';
            cursor.style.zIndex = '9999';
            cursor.style.animation = 'fadeOut 1s ease-out forwards';
            cursor.style.boxShadow = '0 0 10px #00d4ff';
            
            document.body.appendChild(cursor);
            
            setTimeout(() => {
                cursor.remove();
            }, 1000);
        });

        // Add fadeOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                to {
                    opacity: 0;
                    transform: scale(2);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-question-circle text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">50,000+ Soal Premium</h4>
                                        <p class="text-blue-100 text-sm">Bank soal terlengkap dan terupdate</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-chart-line text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Analisis Real-time</h4>
                                        <p class="text-blue-100 text-sm">Performance tracking yang akurat</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center">
                                        <i class="fab fa-telegram text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Komunitas Eksklusif</h4>
                                        <p class="text-blue-100 text-sm">Grup Telegram untuk diskusi dan tips</p>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-highlight p-4 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-trophy text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Success Rate 95%</h4>
                                        <p class="text-blue-100 text-sm">Alumni yang berhasil lulus seleksi ASN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="glass-card rounded-3xl p-8">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4 icon-glow shadow-2xl">
                                <i class="fas fa-sign-in-alt text-white text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-black gradient-text mb-2">Selamat Datang Kembali!</h3>
                            <p class="text-gray-600">Masuk untuk melanjutkan persiapan ASN terbaikmu</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                                <h4 class="text-lg font-bold gradient-text mb-4 flex items-center">
                                    <i class="fas fa-user-circle mr-3 text-blue-500"></i>
                                    Masuk ke Akun
                                </h4>
                                
                                <div class="space-y-4">
                                    <div>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                               placeholder="Email Address" 
                                               class="spectacular-input w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    
                                    <div>
                                        <input id="password" type="password" name="password" required 
                                               placeholder="Password" 
                                               class="spectacular-input w-full px-4 py-3 rounded-xl focus:outline-none text-gray-900 placeholder-gray-500">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="flex items-center">
                                        <input id="remember_me" type="checkbox" name="remember" 
                                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">
                                            Lupa password?
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" 
                                        class="btn-spectacular w-full text-white py-4 rounded-xl font-black text-lg transition-all duration-300">
                                    <i class="fas fa-rocket mr-2"></i>
                                    Masuk & Lanjut Tryout!
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="text-gray-600">
                                    Belum punya akun? 
                                    <a href="{{ route('register') }}" class="gradient-text font-bold hover:underline">
                                        Daftar gratis di sini
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
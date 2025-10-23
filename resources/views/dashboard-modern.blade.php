<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard - Analisis Performa Tryout</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f9fafb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: #f1f5f9;
            overflow-x: hidden;
        }

        /* Modern Background dengan Animated Particles */
        .modern-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            z-index: -2;
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #6366f1;
            border-radius: 50%;
            animation: float-up 10s linear infinite;
            opacity: 0.3;
        }

        @keyframes float-up {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 0.4;
            }
            90% {
                opacity: 0.4;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        /* Modern Glass Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.2);
        }

        /* Modern Grid Layout */
        .modern-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        /* Modern Stats Cards dengan 3D Effect */
        .stat-card-3d {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 24px;
            padding: 2rem;
            position: relative;
            transform-style: preserve-3d;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .stat-card-3d::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(99, 102, 241, 0.1));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .stat-card-3d:hover {
            transform: translateY(-8px) rotateX(5deg);
            box-shadow: 0 25px 50px rgba(99, 102, 241, 0.3);
        }

        .stat-card-3d:hover::after {
            opacity: 1;
        }

        /* Glowing Text Effect */
        .glow-text {
            text-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
            animation: pulse-glow 2s ease-in-out infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { text-shadow: 0 0 20px rgba(99, 102, 241, 0.5); }
            50% { text-shadow: 0 0 30px rgba(99, 102, 241, 0.8); }
        }

        /* Progress Ring yang Modern */
        .progress-ring {
            transform: rotate(-90deg);
            transition: stroke-dashoffset 1s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Animated Numbers */
        .counter {
            display: inline-block;
            font-variant-numeric: tabular-nums;
        }

        /* Modern Navigation */
        .modern-nav {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Modern Charts Container */
        .chart-modern {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .chart-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Interactive Buttons */
        .modern-btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .modern-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        }

        .modern-btn:hover::before {
            left: 100%;
        }

        /* Floating Action Cards */
        .floating-card {
            animation: float 6s ease-in-out infinite;
            animation-delay: var(--delay, 0s);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Performance Bars yang Modern */
        .performance-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .performance-fill {
            height: 100%;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
            transition: width 1s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .performance-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Hexagon Grid untuk Unique Layout */
        .hexagon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            padding: 2rem 0;
        }

        .hexagon-item {
            aspect-ratio: 1;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .hexagon-item::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, #6366f1, #8b5cf6, #ec4899);
            border-radius: 20px;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s;
        }

        .hexagon-item:hover {
            transform: scale(1.05);
            border-color: transparent;
        }

        .hexagon-item:hover::before {
            opacity: 1;
        }

        /* Modern Loading Animation */
        .modern-loader {
            width: 40px;
            height: 40px;
            border: 3px solid rgba(99, 102, 241, 0.2);
            border-top-color: #6366f1;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="modern-bg"></div>
    <div class="particles" id="particles"></div>

    <!-- Modern Navigation -->
    <nav class="modern-nav sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-line text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Modern Dashboard</h1>
                        <p class="text-xs text-gray-400">Analisis Performa Real-time</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="modern-btn">
                        <i class="fas fa-download mr-2"></i>Export Data
                    </button>
                    <a href="/dashboard" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Dashboard Classic
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Section dengan Animated Title -->
        <section class="mb-12 text-center">
            <div class="floating-card" style="--delay: 0s;">
                <h2 class="text-5xl md:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 mb-4 glow-text">
                    Your Performance
                </h2>
                <p class="text-xl text-gray-300 mb-8">Track your progress with cutting-edge analytics</p>
            </div>

            <!-- Modern Stats Bar -->
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <div class="glass-card px-6 py-3 flex items-center space-x-3">
                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-sm text-gray-300">Live Data</span>
                </div>
                <div class="glass-card px-6 py-3 flex items-center space-x-3">
                    <i class="fas fa-fire text-orange-400"></i>
                    <span class="text-sm text-gray-300">{{ $progressData['study_streak'] ?? 0 }} Day Streak</span>
                </div>
                <div class="glass-card px-6 py-3 flex items-center space-x-3">
                    <i class="fas fa-trophy text-yellow-400"></i>
                    <span class="text-sm text-gray-300">Top {{ $progressData['rank_position'] ?? 'N/A' }}</span>
                </div>
            </div>
        </section>

        <!-- Modern Stats Grid dengan 3D Effects -->
        <section class="mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Tryouts Card -->
                <div class="stat-card-3d floating-card" style="--delay: 0.2s;">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Total Tryouts</p>
                            <h3 class="text-4xl font-black text-white counter" data-target="{{ $stats['total_tryouts_completed'] ?? 0 }}">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clipboard-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="performance-bar">
                        <div class="performance-fill bg-gradient-to-r from-blue-500 to-cyan-500" style="width: {{ min($progressData['completion_rate'] ?? 0, 100) }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $progressData['completion_rate'] ?? 0 }}% Completion Rate</p>
                </div>

                <!-- Average Score Card -->
                <div class="stat-card-3d floating-card" style="--delay: 0.4s;">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Average Score</p>
                            <h3 class="text-4xl font-black text-white counter" data-target="{{ number_format($stats['average_score'] ?? 0, 0) }}">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="performance-bar">
                        <div class="performance-fill bg-gradient-to-r from-green-500 to-emerald-500" style="width: {{ min($stats['average_score'] ?? 0, 100) }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">
                        @if(($stats['average_score'] ?? 0) >= 80)
                            🌟 Excellent Performance
                        @elseif(($stats['average_score'] ?? 0) >= 60)
                            👍 Good Progress
                        @else
                            💪 Keep Learning
                        @endif
                    </p>
                </div>

                <!-- Best Score Card -->
                <div class="stat-card-3d floating-card" style="--delay: 0.6s;">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Best Score</p>
                            <h3 class="text-4xl font-black text-white counter" data-target="{{ number_format($stats['best_score'] ?? 0, 0) }}">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="performance-bar">
                        <div class="performance-fill bg-gradient-to-r from-yellow-500 to-orange-500" style="width: {{ min($stats['best_score'] ?? 0, 100) }}%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Personal Record</p>
                </div>

                <!-- Study Time Card -->
                <div class="stat-card-3d floating-card" style="--delay: 0.8s;">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Study Time</p>
                            <h3 class="text-4xl font-black text-white">
                                <span class="counter" data-target="{{ ($stats['total_tryouts_completed'] ?? 0) * 90 }}">0</span>
                                <span class="text-xl font-normal">min</span>
                            </h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="performance-bar">
                        <div class="performance-fill bg-gradient-to-r from-purple-500 to-pink-500" style="width: 75%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Total Learning Time</p>
                </div>
            </div>
        </section>

        <!-- Unique Hexagon Grid untuk Categories -->
        <section class="mb-12">
            <h3 class="text-2xl font-bold text-white mb-6 text-center">Performance Categories</h3>
            <div class="hexagon-grid">
                @php
                    $categories = [
                        ['name' => 'TWK', 'score' => 75, 'icon' => 'fa-flag', 'color' => 'from-blue-500 to-indigo-600'],
                        ['name' => 'TIU', 'score' => 82, 'icon' => 'fa-brain', 'color' => 'from-green-500 to-emerald-600'],
                        ['name' => 'TKP', 'score' => 68, 'icon' => 'fa-user', 'color' => 'from-purple-500 to-pink-600'],
                        ['name' => 'Overall', 'score' => $stats['average_score'] ?? 0, 'icon' => 'fa-trophy', 'color' => 'from-yellow-500 to-orange-600'],
                        ['name' => 'Progress', 'score' => $progressData['completion_rate'] ?? 0, 'icon' => 'fa-chart-line', 'color' => 'from-cyan-500 to-blue-600'],
                        ['name' => 'Streak', 'score' => min(($progressData['study_streak'] ?? 0) * 10, 100), 'icon' => 'fa-fire', 'color' => 'from-red-500 to-orange-600']
                    ];
                @endphp

                @foreach($categories as $category)
                    <div class="hexagon-item">
                        <div class="w-16 h-16 bg-gradient-to-br {{ $category['color'] }} rounded-2xl flex items-center justify-center mb-3">
                            <i class="fas {{ $category['icon'] }} text-white text-2xl"></i>
                        </div>
                        <h4 class="text-white font-bold text-lg">{{ $category['name'] }}</h4>
                        <p class="text-3xl font-black text-white mt-1">{{ $category['score'] }}%</p>
                        <div class="w-full bg-white/10 rounded-full h-2 mt-2">
                            <div class="h-2 rounded-full bg-gradient-to-r {{ $category['color'] }}" style="width: {{ $category['score'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Modern Charts Section -->
        <section class="mb-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Performance Trend Chart -->
                <div class="chart-modern">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Performance Trend</h3>
                        <div class="flex space-x-2">
                            <button class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></button>
                            <span class="text-xs text-gray-400">Live</span>
                        </div>
                    </div>
                    <div class="relative h-64">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>

                <!-- Category Performance Chart -->
                <div class="chart-modern">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Category Analysis</h3>
                        <button class="text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                    <div class="relative h-64">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Action Cards -->
        <section class="mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/tryouts" class="block group">
                    <div class="glass-card p-6 text-center cursor-pointer hover:scale-105 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-play text-white text-xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-1">Mulai Tryout</h4>
                        <p class="text-gray-400 text-sm">Latihan soal baru</p>
                    </div>
                </a>

                <a href="/dashboard/history" class="block group">
                    <div class="glass-card p-6 text-center cursor-pointer hover:scale-105 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-history text-white text-xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-1">Riwayat</h4>
                        <p class="text-gray-400 text-sm">Lihat hasil sebelumnya</p>
                    </div>
                </a>

                <a href="/leaderboard" class="block group">
                    <div class="glass-card p-6 text-center cursor-pointer hover:scale-105 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-trophy text-white text-xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-1">Peringkat</h4>
                        <p class="text-gray-400 text-sm">Top {{ $progressData['rank_position'] ?? 'N/A' }}</p>
                    </div>
                </a>

                <a href="/profile" class="block group">
                    <div class="glass-card p-6 text-center cursor-pointer hover:scale-105 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-1">Profile</h4>
                        <p class="text-gray-400 text-sm">Pengaturan akun</p>
                    </div>
                </a>
            </div>
        </section>

        <!-- Achievement Showcase -->
        <section class="mb-12">
            <h3 class="text-2xl font-bold text-white mb-6 text-center">Recent Achievements</h3>
            <div class="glass-card p-8">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @if(($stats['total_tryouts_completed'] ?? 0) >= 1)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-medal text-white text-2xl"></i>
                            </div>
                            <p class="text-xs text-gray-300">First Step</p>
                        </div>
                    @endif
                    @if(($stats['total_tryouts_completed'] ?? 0) >= 5)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-fire text-white text-2xl"></i>
                            </div>
                            <p class="text-xs text-gray-300">On Fire</p>
                        </div>
                    @endif
                    @if(($stats['average_score'] ?? 0) >= 80)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-star text-white text-2xl"></i>
                            </div>
                            <p class="text-xs text-gray-300">High Scorer</p>
                        </div>
                    @endif
                    @if(($progressData['study_streak'] ?? 0) >= 7)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-crown text-white text-2xl"></i>
                            </div>
                            <p class="text-xs text-gray-300">Week Warrior</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Modern Dashboard JavaScript -->
    <script>
        // Generate Animated Particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 10 + 's';
                particle.style.animationDuration = (10 + Math.random() * 10) + 's';

                // Random colors
                const colors = ['#6366f1', '#8b5cf6', '#ec4899', '#10b981', '#f59e0b'];
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];

                particlesContainer.appendChild(particle);
            }
        }

        // Animated Counter
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                const target = parseInt(counter.dataset.target);
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += step;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };

                updateCounter();
            });
        }

        // Initialize Charts
        function initCharts() {
            // Performance Trend Chart
            const trendCtx = document.getElementById('trendChart');
            if (trendCtx) {
                new Chart(trendCtx, {
                    type: 'line',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
                        datasets: [{
                            label: 'Score',
                            data: [65, 72, 78, 82, 88],
                            borderColor: '#6366f1',
                            backgroundColor: 'rgba(99, 102, 241, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: '#6366f1',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: 'rgba(255, 255, 255, 0.7)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: 'rgba(255, 255, 255, 0.7)'
                                }
                            }
                        }
                    }
                });
            }

            // Category Performance Chart
            const categoryCtx = document.getElementById('categoryChart');
            if (categoryCtx) {
                new Chart(categoryCtx, {
                    type: 'radar',
                    data: {
                        labels: ['TWK', 'TIU', 'TKP', 'Logic', 'Speed', 'Accuracy'],
                        datasets: [{
                            label: 'Current',
                            data: [75, 82, 68, 79, 85, 72],
                            borderColor: '#8b5cf6',
                            backgroundColor: 'rgba(139, 92, 246, 0.2)',
                            borderWidth: 2
                        }, {
                            label: 'Target',
                            data: [85, 85, 80, 85, 90, 85],
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {
                                    color: 'rgba(255, 255, 255, 0.7)'
                                }
                            }
                        },
                        scales: {
                            r: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.1)'
                                },
                                ticks: {
                                    color: 'rgba(255, 255, 255, 0.7)'
                                }
                            }
                        }
                    }
                });
            }
        }

        // Intersection Observer for animations
        function initScrollAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.stat-card-3d, .glass-card').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            animateCounters();
            initCharts();
            initScrollAnimations();

            // Add smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Add interactive hover effects
            document.querySelectorAll('.hexagon-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05) rotate(2deg)';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) rotate(0deg)';
                });
            });
        });

        // Dynamic data update simulation
        setInterval(() => {
            // Simulate live data updates
            const liveIndicator = document.querySelector('.animate-pulse');
            if (liveIndicator) {
                liveIndicator.style.opacity = Math.random() > 0.5 ? '1' : '0.3';
            }
        }, 3000);
    </script>
</body>
</html>
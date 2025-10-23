<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Dashboard - Analisis Performa Tryout</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Enhanced Dashboard CSS -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --info-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: #f3f4f6;
        }

        .dashboard-bg {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .enhanced-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .enhanced-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .enhanced-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .enhanced-card:hover::before {
            left: 100%;
        }

        .progress-bar-animated {
            background: linear-gradient(90deg, #3b82f6 0%, #60a5fa 50%, #3b82f6 100%);
            background-size: 200% 100%;
            animation: progressShimmer 2s linear infinite;
        }

        @keyframes progressShimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .progress-circle {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .score-circle-text {
            position: relative;
            z-index: 1;
            font-size: 28px;
            font-weight: bold;
            color: white;
        }

        .performance-indicator {
            padding: 15px;
            border-radius: 12px;
            margin: 10px 0;
            transition: all 0.3s ease;
        }

        .performance-excellent {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .performance-good {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .performance-needs-improvement {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .streak-badge {
            background: linear-gradient(135deg, #ff6b6b, #ff8e53);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .achievement-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }

        .achievement-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin: 20px 0;
        }

        .nav-link {
            color: #4b5563;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .animated-number {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="dashboard-bg">
        <!-- Navigation -->
        <nav class="bg-black bg-opacity-20 backdrop-blur-md border-b border-white border-opacity-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <i class="fas fa-chart-line text-white text-2xl mr-3"></i>
                        <span class="text-white font-bold text-xl">Enhanced Dashboard</span>
                    </div>
                    <div class="flex space-x-4">
                        <a href="/dashboard" class="nav-link">
                            <i class="fas fa-arrow-left mr-2"></i>Dashboard Biasa
                        </a>
                        <a href="/tryouts" class="nav-link">
                            <i class="fas fa-clipboard-list mr-2"></i>Tryout
                        </a>
                        <a href="/profile" class="nav-link">
                            <i class="fas fa-user mr-2"></i>Profile
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 py-8">

            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white bg-opacity-20 backdrop-blur-lg rounded-3xl mb-6 shadow-2xl floating">
                    <i class="fas fa-chart-line text-white text-4xl"></i>
                </div>
                <h1 class="text-5xl font-bold text-white mb-4">
                    Dashboard Analisis Performa
                </h1>
                <p class="text-xl text-white text-opacity-90 max-w-3xl mx-auto">
                    📊 Pantau progress belajar Anda dengan visualisasi data yang interaktif dan menarik
                </p>

                <!-- Streak Badge -->
                <div class="mt-6 inline-flex items-center gap-2 streak-badge">
                    <i class="fas fa-fire"></i>
                    <span>{{ $progressData['study_streak'] ?? 0 }} Hari Berturut-turut</span>
                </div>
            </div>

            <!-- Statistics Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Total Tryouts Card -->
                <div class="enhanced-card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clipboard-check text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-800 animated-number">{{ $stats['total_tryouts_completed'] ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Tryout Selesai</div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs text-gray-600">Progress Keseluruhan</span>
                            <span class="text-xs font-bold text-blue-600">{{ $progressData['completion_rate'] ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="progress-bar-animated h-2 rounded-full" style="width: {{ min($progressData['completion_rate'] ?? 0, 100) }}%"></div>
                        </div>
                    </div>

                    <!-- Additional Stats -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <div class="text-lg font-bold text-blue-600">{{ $progressData['total_tryouts_available'] ?? 0 }}</div>
                            <div class="text-xs text-gray-600">Tersedia</div>
                        </div>
                        <div class="bg-cyan-50 rounded-lg p-3 text-center">
                            <div class="text-lg font-bold text-cyan-600">{{ $progressData['study_streak'] ?? 0 }}</div>
                            <div class="text-xs text-gray-600">Hari Streak</div>
                        </div>
                    </div>

                    @if(($stats['total_tryouts_completed'] ?? 0) >= 10)
                        <div class="mt-4 achievement-badge">
                            <i class="fas fa-trophy"></i>
                            <span>Super Achiever!</span>
                        </div>
                    @endif
                </div>

                <!-- Average Score Card -->
                <div class="enhanced-card p-6">
                    <div class="text-center">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Skor Rata-rata</h3>
                        <div class="progress-circle" style="background: conic-gradient(#10b981 0deg {{ ($stats['average_score'] ?? 0) * 3.6 }deg, rgba(255,255,255,0.3) {{ ($stats['average_score'] ?? 0) * 3.6 }deg);">
                            <div class="score-circle-text">
                                {{ number_format($stats['average_score'] ?? 0, 1) }}
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">
                            @if(($stats['average_score'] ?? 0) >= 80)
                                🌟 Luar Biasa!
                            @elseif(($stats['average_score'] ?? 0) >= 60)
                                👍 Bagus!
                            @else
                                💪 Terus Belajar!
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Performance Breakdown Card -->
                <div class="enhanced-card p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Distribusi Performa</h3>

                    @php
                        $totalCategories = ($excellentCount ?? 0) + ($goodCount ?? 0) + ($needsImprovementCount ?? 0);
                        $excellentPercent = $totalCategories > 0 ? round(($excellentCount ?? 0) / $totalCategories * 100) : 0;
                        $goodPercent = $totalCategories > 0 ? round(($goodCount ?? 0) / $totalCategories * 100) : 0;
                        $needsImprovementPercent = $totalCategories > 0 ? round(($needsImprovementCount ?? 0) / $totalCategories * 100) : 0;
                    @endphp

                    <div class="space-y-3">
                        <div class="performance-indicator performance-excellent">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">🌟 Sangat Baik (≥80)</span>
                                <span class="font-bold">{{ $excellentCount ?? 0 }} ({{ $excellentPercent }}%)</span>
                            </div>
                        </div>
                        <div class="performance-indicator performance-good">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">👍 Baik (60-79)</span>
                                <span class="font-bold">{{ $goodCount ?? 0 }} ({{ $goodPercent }}%)</span>
                            </div>
                        </div>
                        <div class="performance-indicator performance-needs-improvement">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">💪 Perlu Peningkatan (<60)</span>
                                <span class="font-bold">{{ $needsImprovementCount ?? 0 }} ({{ $needsImprovementPercent }}%)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Achievement Card -->
                <div class="enhanced-card p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Pencapaian Terkini</h3>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-3 pulse">
                            <i class="fas fa-medal text-white text-2xl"></i>
                        </div>
                        @if(($stats['total_tryouts_completed'] ?? 0) >= 1)
                            <p class="text-sm text-gray-700 font-medium">
                                🎯 Menyelesaikan {{ $stats['total_tryouts_completed'] ?? 0 }} tryout
                            </p>
                        @endif
                        @if(($stats['average_score'] ?? 0) >= 70)
                            <p class="text-sm text-gray-700 font-medium mt-2">
                                📈 Skor rata-rata di atas 70
                            </p>
                        @endif
                        @if(($progressData['study_streak'] ?? 0) >= 3)
                            <p class="text-sm text-gray-700 font-medium mt-2">
                                🔥 {{ $progressData['study_streak'] ?? 0 }} hari belajar berturut-turut
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Performance Trend Chart -->
                <div class="enhanced-card p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">📈 Tren Performa</h3>
                    <div class="chart-container">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>

                <!-- Category Performance Chart -->
                <div class="enhanced-card p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">📊 Performa per Kategori</h3>
                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="enhanced-card p-6 text-center hover:scale-105 transition-transform cursor-pointer" onclick="window.location.href='/tryouts'">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-play text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Mulai Tryout</h4>
                    <p class="text-sm text-gray-600">Lanjutkan belajar dengan tryout baru</p>
                </div>

                <div class="enhanced-card p-6 text-center hover:scale-105 transition-transform cursor-pointer" onclick="window.location.href='/dashboard/history'">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-history text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Riwayat Tryout</h4>
                    <p class="text-sm text-gray-600">Lihat hasil tryout sebelumnya</p>
                </div>

                <div class="enhanced-card p-6 text-center hover:scale-105 transition-transform cursor-pointer" onclick="window.location.href='/dashboard'">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-arrow-left text-white text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Dashboard Biasa</h4>
                    <p class="text-sm text-gray-600">Kembali ke dashboard standar</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Dashboard JavaScript -->
    <script>
        // Pass data to JavaScript
        window.dashboardData = @json([
            'performanceTrend' => $performanceTrend ?? [],
            'categoryBreakdown' => $categoryBreakdown ?? [],
            'studyCalendar' => $studyCalendar ?? [],
            'performanceByCategory' => $performanceByCategory ?? []
        ]);

        // Initialize Dashboard
        class DashboardEnhancer {
            constructor() {
                this.init();
            }

            init() {
                this.initCharts();
                this.initAnimations();
            }

            initCharts() {
                this.createPerformanceChart();
                this.createCategoryChart();
            }

            createPerformanceChart() {
                const ctx = document.getElementById('performanceChart');
                if (!ctx) return;

                const data = this.getPerformanceData();

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Skor Rata-rata',
                            data: data.scores,
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: 'rgb(59, 130, 246)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 2000,
                            easing: 'easeInOutQuart'
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                cornerRadius: 8
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            createCategoryChart() {
                const ctx = document.getElementById('categoryChart');
                if (!ctx) return;

                const data = this.getCategoryData();

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Skor Rata-rata',
                            data: data.scores,
                            backgroundColor: data.scores.map(score => {
                                if (score >= 80) return 'rgba(16, 185, 129, 0.8)';
                                if (score >= 60) return 'rgba(59, 130, 246, 0.8)';
                                return 'rgba(245, 158, 11, 0.8)';
                            }),
                            borderColor: data.scores.map(score => {
                                if (score >= 80) return 'rgb(16, 185, 129)';
                                if (score >= 60) return 'rgb(59, 130, 246)';
                                return 'rgb(245, 158, 11)';
                            }),
                            borderWidth: 2,
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 2000,
                            easing: 'easeInOutBounce'
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            initAnimations() {
                this.animateNumbers();
                this.observeCards();
            }

            animateNumbers() {
                const numbers = document.querySelectorAll('.animated-number');

                numbers.forEach(number => {
                    const finalValue = parseInt(number.textContent);
                    let currentValue = 0;
                    const increment = finalValue / 50;
                    const timer = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= finalValue) {
                            currentValue = finalValue;
                            clearInterval(timer);
                        }
                        number.textContent = Math.floor(currentValue);
                    }, 30);
                });
            }

            observeCards() {
                const cards = document.querySelectorAll('.enhanced-card');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, { threshold: 0.1 });

                cards.forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    observer.observe(card);
                });
            }

            getPerformanceData() {
                if (window.dashboardData && window.dashboardData.performanceTrend) {
                    const trend = window.dashboardData.performanceTrend;
                    return {
                        labels: trend.map(item => item.tryout_name),
                        scores: trend.map(item => item.score)
                    };
                }
                return {
                    labels: ['Tryout 1', 'Tryout 2', 'Tryout 3', 'Tryout 4', 'Tryout 5'],
                    scores: [65, 72, 78, 82, 85]
                };
            }

            getCategoryData() {
                if (window.dashboardData && window.dashboardData.categoryBreakdown) {
                    const breakdown = window.dashboardData.categoryBreakdown;
                    return {
                        labels: breakdown.map(item => item.category),
                        scores: breakdown.map(item => item.avg_score)
                    };
                }
                return {
                    labels: ['TWK', 'TIU', 'TKP'],
                    scores: [75, 82, 68]
                };
            }
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Chart !== 'undefined') {
                try {
                    new DashboardEnhancer();
                } catch (error) {
                    console.error('Error initializing dashboard:', error);
                }
            }
        });
    </script>
</body>
</html>
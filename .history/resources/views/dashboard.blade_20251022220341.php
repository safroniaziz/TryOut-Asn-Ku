<x-app-layout>

    <!-- Spectacular Statistics Section -->
    <div class="bg-gradient-to-br from-slate-50 to-gray-100 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 pt-16 pb-12">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl mb-6 shadow-lg">
                    <i class="fas fa-chart-line text-white text-3xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-3">
                    Pencapaian Luar Biasa
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    📈 Monitor progress dan pencapaian belajar Anda secara <span class="font-bold text-emerald-600">real-time</span>
                </p>
            </div>




            </div>
        </div>
    </div>

    <!-- Main Content Container - No Gap -->
    <div class="-mt-8">


        </div>
    </div>

    <!-- Premium Upgrade Section - Bottom -->
    @if(!$hasPremium)
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl mb-6 shadow-xl">
                    <span class="text-white text-2xl">👑</span>
                </div>
                <h2 class="text-3xl font-bold mb-3">🔥 Upgrade ke Premium</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Dapatkan akses tak terbatas ke semua paket tryout, materi pembelajaran, dan fitur eksklusif
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    <div class="text-center">
                        <div class="text-3xl mb-3">📚</div>
                        <h3 class="font-bold text-white mb-2">Akses Semua Paket</h3>
                        <p class="text-gray-400 text-sm">CPNS & PPPK tanpa batas</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-3">📊</div>
                        <h3 class="font-bold text-white mb-2">Progress Tracking</h3>
                        <p class="text-gray-400 text-sm">Analisis perkembangan lengkap</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-3">📖</div>
                        <h3 class="font-bold text-white mb-2">Materi Download</h3>
                        <p class="text-gray-400 text-sm">PDF dan modul belajar</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-3">🏆</div>
                        <h3 class="font-bold text-white mb-2">Leaderboard Priority</h3>
                        <p class="text-gray-400 text-sm">Bandingkan skor dengan user lain</p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('subscription.premium') }}"
                       class="inline-flex items-center bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <span class="mr-3">🚀</span>
                        <span>Upgrade ke Premium Sekarang</span>
                        <span class="ml-3">→</span>
                    </a>
                    <p class="text-gray-400 text-sm mt-4">
                        <span class="text-yellow-400">✨</span> Garansi 7 hari uang kembali
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if($performanceByCategory->count() > 0)
    // Prepare data for charts
    const categories = @json($performanceByCategory->keys()->toArray());
    const avgScores = @json($performanceByCategory->pluck('avg_score')->toArray());
    const bestScores = @json($performanceByCategory->pluck('best_score')->toArray());

    // Color scheme based on performance
    const getScoreColor = (score) => {
        if (score >= 80) return 'rgba(34, 197, 94, 0.8)';  // green
        if (score >= 60) return 'rgba(59, 130, 246, 0.8)'; // blue
        return 'rgba(251, 146, 60, 0.8)';  // orange
    };

    const getBorderColor = (score) => {
        if (score >= 80) return 'rgb(34, 197, 94)';
        if (score >= 60) return 'rgb(59, 130, 246)';
        return 'rgb(251, 146, 60)';
    };

    // 1. Score Distribution Pie Chart
    const scoreDistributionCtx = document.getElementById('scoreDistributionChart').getContext('2d');
    const excellentCount = avgScores.filter(score => score >= 80).length;
    const goodCount = avgScores.filter(score => score >= 60 && score < 80).length;
    const needsImprovementCount = avgScores.filter(score => score < 60).length;

    new Chart(scoreDistributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sangat Baik (≥80)', 'Cukup Baik (60-79)', 'Perlu Bimbingan (<60)'],
            datasets: [{
                data: [excellentCount, goodCount, needsImprovementCount],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(251, 146, 60, 0.8)'
                ],
                borderColor: [
                    'rgb(34, 197, 94)',
                    'rgb(59, 130, 246)',
                    'rgb(251, 146, 60)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });

    // 2. Category Comparison Bar Chart
    const categoryComparisonCtx = document.getElementById('categoryComparisonChart').getContext('2d');
    const backgroundColors = avgScores.map(score => getScoreColor(score));
    const borderColors = avgScores.map(score => getBorderColor(score));

    new Chart(categoryComparisonCtx, {
        type: 'bar',
        data: {
            labels: categories,
            datasets: [
                {
                    label: 'Rata-rata',
                    data: avgScores,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2
                },
                {
                    label: 'Terbaik',
                    data: bestScores,
                    backgroundColor: 'rgba(168, 85, 247, 0.3)',
                    borderColor: 'rgb(168, 85, 247)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y + '%';
                        }
                    }
                }
            }
        }
    });
    @endif
});
</script>

</x-app-layout>

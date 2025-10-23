@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- Professional Statistics Cards -->
        <div class="stats-grid">
            <!-- TryOut Completed Card -->
            <div class="dashboard-card p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="stats-icon stats-icon-primary">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    @if($stats['total_tryouts_completed'] > 0)
                        <span class="badge-success">Aktif</span>
                    @endif
                </div>
                <div>
                    <p class="text-card-title mb-2">TryOut Selesai</p>
                    <p class="text-stat-number">{{ $stats['total_tryouts_completed'] }}</p>
                    @if($progressData['total_tryouts_available'] > 0)
                        <div class="mt-3">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $progressData['completion_rate'] }}%"></div>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-stat-label">{{ number_format($progressData['completion_rate'], 0) }}%</span>
                                <span class="text-stat-label">dari {{ $progressData['total_tryouts_available'] }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Average Score Card -->
            <div class="dashboard-card p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="stats-icon stats-icon-success">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    @if($stats['average_score'] >= 80)
                        <span class="badge-success">Excellent</span>
                    @endif
                </div>
                <div>
                    <p class="text-card-title mb-2">Rata-rata Skor</p>
                    <p class="text-stat-number">{{ number_format($stats['average_score'], 1) }}</p>
                    <div class="flex items-center mt-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($stats['average_score'] >= $i * 20)
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                            @else
                                <i class="far fa-star text-gray-300 text-sm"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="text-stat-label mt-2">
                        @if($stats['average_score'] >= 80)
                            Sangat Baik
                        @elseif($stats['average_score'] >= 60)
                            Cukup Baik
                        @elseif($stats['average_score'] > 0)
                            Perlu Perbaikan
                        @else
                            Belum Ada Data
                        @endif
                    </p>
                </div>
            </div>

            <!-- Best Score Card -->
            <div class="dashboard-card p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="stats-icon stats-icon-warning">
                        <i class="fas fa-trophy"></i>
                    </div>
                    @if($stats['best_score'] >= 90)
                        <span class="badge-warning">Top Score</span>
                    @endif
                </div>
                <div>
                    <p class="text-card-title mb-2">Skor Terbaik</p>
                    <p class="text-stat-number">{{ $stats['best_score'] }}</p>
                    <p class="text-stat-label mt-2">
                        @if($stats['best_score'] >= 95)
                            Sempurna
                        @elseif($stats['best_score'] >= 90)
                            Sangat Baik
                        @elseif($stats['best_score'] >= 80)
                            Baik
                        @elseif($stats['best_score'] > 0)
                            Cukup
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>

            <!-- Study Streak Card -->
            <div class="dashboard-card p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="stats-icon stats-icon-violet">
                        <i class="fas fa-fire"></i>
                    </div>
                    @if($progressData['study_streak'] >= 7)
                        <span class="badge-info">On Fire</span>
                    @endif
                </div>
                <div>
                    <p class="text-card-title mb-2">Streak Belajar</p>
                    <p class="text-stat-number">{{ $progressData['study_streak'] }}</p>
                    <p class="text-stat-label mt-2">
                        @if($progressData['study_streak'] >= 30)
                            30+ Hari Konsisten
                        @elseif($progressData['study_streak'] >= 14)
                            2 Minggu
                        @elseif($progressData['study_streak'] >= 7)
                            1 Minggu
                        @elseif($progressData['study_streak'] > 0)
                            {{ $progressData['study_streak'] }} Hari
                        @else
                            Mulai Hari Ini
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        @if($recentTryouts->isNotEmpty())
            <div class="section">
                <h2 class="section-title mb-6">Aktivitas Terkini</h2>

                <div class="recent-activities">
                    @foreach($recentTryouts as $tryout)
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-file-alt text-blue-600"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-header">
                                    <h4 class="activity-title">{{ $tryout->tryout->title }}</h4>
                                    <span class="activity-date">{{ $tryout->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="activity-stats">
                                    <div class="activity-score">
                                        <span class="score-label">Skor:</span>
                                        <span class="score-value {{ $tryout->total_skor >= 80 ? 'text-green-600' : ($tryout->total_skor >= 60 ? 'text-yellow-600' : 'text-red-600') }}">
                                            {{ $tryout->total_skor }}
                                        </span>
                                    </div>
                                    <div class="activity-percentage">
                                        <span class="percentage-label">Akurasi:</span>
                                        <span class="percentage-value {{ $tryout->persentase >= 80 ? 'text-green-600' : ($tryout->persentase >= 60 ? 'text-yellow-600' : 'text-red-600') }}">
                                            {{ number_format($tryout->persentase, 1) }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Quick Actions -->
        <div class="section">
            <h2 class="section-title mb-6">Aksi Cepat</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Start Tryout -->
                @if(Route::has('tryouts.index'))
                    <a href="{{ route('tryouts.index') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-play-circle text-blue-600"></i>
                        </div>
                        <h3 class="action-title">Mulai Tryout</h3>
                        <p class="action-description">Tes kemampuan dengan soal-soal standar</p>
                    </a>
                @endif

                <!-- Study Materials -->
                @if(Route::has('materis.index'))
                    <a href="{{ route('materis.index') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-book text-purple-600"></i>
                        </div>
                        <h3 class="action-title">Materi Belajar</h3>
                        <p class="action-description">Pelajari materi secara terstruktur</p>
                    </a>
                @endif

                <!-- History -->
                @if(Route::has('dashboard.history'))
                    <a href="{{ route('dashboard.history') }}" class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-history text-green-600"></i>
                        </div>
                        <h3 class="action-title">Riwayat Tryout</h3>
                        <p class="action-description">Lihat semua hasil tryout Anda</p>
                    </a>
                @endif
            </div>
        </div>

    </div>
</div>

<style>
/* Dashboard Styles */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
}

.dashboard-card {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border: 1px solid #e5e7eb;
}

.stats-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stats-icon-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.stats-icon-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
}

.stats-icon-warning {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.stats-icon-violet {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.text-card-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.text-stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
}

.text-stat-label {
    font-size: 0.875rem;
    color: #6b7280;
}

.badge-success {
    background: #10b981;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge-warning {
    background: #f59e0b;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge-info {
    background: #3b82f6;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
}

.progress-bar {
    width: 100%;
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #3b82f6 0%, #8b5cf6 100%);
    border-radius: 4px;
    transition: width 0.3s ease;
}

.section {
    margin-bottom: 2rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.recent-activities {
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border: 1px solid #e5e7eb;
    overflow: hidden;
}

.activity-item {
    padding: 1rem;
    border-bottom: 1px solid #f3f4f6;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.activity-content {
    flex: 1;
    min-width: 0;
}

.activity-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.activity-title {
    font-weight: 600;
    color: #1f2937;
}

.activity-date {
    font-size: 0.875rem;
    color: #6b7280;
}

.activity-stats {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.score-label, .percentage-label {
    font-size: 0.75rem;
    color: #6b7280;
}

.score-value, .percentage-value {
    font-weight: 600;
    font-size: 0.875rem;
}

.action-card {
    background: white;
    border-radius: 0.75rem;
    padding: 1.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border: 1px solid #e5e7eb;
}

.action-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.06);
}

.action-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.action-title {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.action-description {
    color: #6b7280;
    font-size: 0.875rem;
    line-height: 1.5;
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .activity-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .activity-stats {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>
@endsection

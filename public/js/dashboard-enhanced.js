// Enhanced Dashboard JavaScript
class DashboardEnhancer {
    constructor() {
        this.init();
    }

    init() {
        this.initCharts();
        this.initAnimations();
        this.initInteractions();
        this.initProgressBars();
        this.initTooltips();
    }

    // Initialize Charts with Animation
    initCharts() {
        // Performance Chart
        this.createPerformanceChart();
        this.createProgressChart();
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
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointBackgroundColor: 'rgb(102, 126, 234)',
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
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return `Skor: ${context.parsed.y.toFixed(1)}`;
                            }
                        }
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

    createProgressChart() {
        const ctx = document.getElementById('progressChart');
        if (!ctx) return;

        const data = this.getProgressData();

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Selesai', 'Berlangsung', 'Belum Dimulai'],
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(156, 163, 175, 0.8)'
                    ],
                    borderColor: [
                        'rgb(16, 185, 129)',
                        'rgb(59, 130, 246)',
                        'rgb(156, 163, 175)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 1500
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            font: {
                                size: 12
                            }
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

    // Initialize Animations
    initAnimations() {
        // Animate numbers
        this.animateNumbers();

        // Animate cards on scroll
        this.observeCards();

        // Animate progress bars
        this.animateProgressBars();
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

    animateProgressBars() {
        const progressBars = document.querySelectorAll('.progress-bar-animated');

        setTimeout(() => {
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        }, 500);
    }

    // Initialize Interactions
    initInteractions() {
        // Card hover effects
        this.initCardHover();

        // Click interactions
        this.initClickInteractions();

        // Filter functionality
        this.initFilters();
    }

    initCardHover() {
        const cards = document.querySelectorAll('.enhanced-card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px) scale(1.02)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
    }

    initClickInteractions() {
        // Expandable details
        const expandButtons = document.querySelectorAll('.expand-details');

        expandButtons.forEach(button => {
            button.addEventListener('click', () => {
                const details = button.nextElementSibling;
                if (details) {
                    details.classList.toggle('hidden');
                    button.textContent = details.classList.contains('hidden') ? 'Lihat Detail' : 'Sembunyikan Detail';
                }
            });
        });
    }

    initFilters() {
        const filterButtons = document.querySelectorAll('.filter-button');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                this.filterContent(filter);

                // Update active state
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });
    }

    filterContent(filter) {
        const items = document.querySelectorAll('.filterable-item');

        items.forEach(item => {
            if (filter === 'all' || item.dataset.category === filter) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 10);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    }

    // Initialize Progress Bars
    initProgressBars() {
        this.createCircularProgress();
        this.updateLinearProgress();
    }

    createCircularProgress() {
        const circles = document.querySelectorAll('.progress-circle');

        circles.forEach(circle => {
            const progress = circle.dataset.progress;
            const size = 120;
            const strokeWidth = 8;
            const radius = (size - strokeWidth) / 2;
            const circumference = 2 * Math.PI * radius;
            const offset = circumference - (progress / 100) * circumference;

            const svg = `
                <svg width="${size}" height="${size}">
                    <circle
                        cx="${size/2}"
                        cy="${size/2}"
                        r="${radius}"
                        stroke="rgba(255, 255, 255, 0.3)"
                        stroke-width="${strokeWidth}"
                        fill="none"
                    />
                    <circle
                        cx="${size/2}"
                        cy="${size/2}"
                        r="${radius}"
                        stroke="white"
                        stroke-width="${strokeWidth}"
                        fill="none"
                        stroke-dasharray="${circumference}"
                        stroke-dashoffset="${offset}"
                        stroke-linecap="round"
                        style="transition: stroke-dashoffset 1s ease"
                    />
                </svg>
            `;

            circle.innerHTML = svg + circle.innerHTML;
        });
    }

    updateLinearProgress() {
        const progressBars = document.querySelectorAll('.linear-progress');

        progressBars.forEach(bar => {
            const progress = bar.dataset.progress;
            setTimeout(() => {
                bar.style.width = `${progress}%`;
            }, 500);
        });
    }

    // Initialize Tooltips
    initTooltips() {
        const tooltips = document.querySelectorAll('[data-tooltip]');

        tooltips.forEach(element => {
            element.addEventListener('mouseenter', (e) => {
                this.showTooltip(e.target);
            });

            element.addEventListener('mouseleave', (e) => {
                this.hideTooltip(e.target);
            });
        });
    }

    showTooltip(element) {
        const text = element.dataset.tooltip;
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = text;
        document.body.appendChild(tooltip);

        const rect = element.getBoundingClientRect();
        tooltip.style.left = `${rect.left + rect.width / 2}px`;
        tooltip.style.top = `${rect.top - 10}px`;

        setTimeout(() => {
            tooltip.classList.add('show');
        }, 10);
    }

    hideTooltip(element) {
        const tooltip = document.querySelector('.custom-tooltip');
        if (tooltip) {
            tooltip.classList.remove('show');
            setTimeout(() => {
                tooltip.remove();
            }, 300);
        }
    }

    // Data Helper Methods
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

    getProgressData() {
        // Calculate from performance data
        if (window.dashboardData && window.dashboardData.performanceByCategory) {
            const categories = window.dashboardData.performanceByCategory;
            const excellent = categories.filter(c => c.avg_score >= 80).length;
            const good = categories.filter(c => c.avg_score >= 60 && c.avg_score < 80).length;
            const needsImprovement = categories.filter(c => c.avg_score < 60).length;
            return [excellent, good, needsImprovement];
        }
        return [12, 3, 5];
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
    // Ensure Chart.js is loaded
    if (typeof Chart === 'undefined') {
        console.warn('Chart.js not loaded. Charts will not be displayed.');
        return;
    }

    // Initialize dashboard with error handling
    try {
        new DashboardEnhancer();
    } catch (error) {
        console.error('Error initializing dashboard:', error);
        // Show fallback message
        const dashboardElement = document.querySelector('.dashboard-bg');
        if (dashboardElement) {
            const errorMsg = document.createElement('div');
            errorMsg.className = 'bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative';
            errorMsg.innerHTML = `
                <strong class="font-bold">Perhatian!</strong>
                <span class="block sm:inline"> Beberapa fitur dashboard mungkin tidak berfungsi dengan baik.</span>
            `;
            dashboardElement.insertBefore(errorMsg, dashboardElement.firstChild);
        }
    }
});

// Export for potential use in other scripts
window.DashboardEnhancer = DashboardEnhancer;
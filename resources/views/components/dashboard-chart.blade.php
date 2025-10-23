@props([
    'title',
    'type' => 'line',
    'data',
    'height' => '300px',
    'showFilters' => false,
    'filterOptions' => []
])

<div class="enhanced-card rounded-2xl p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-800">{{ $title }}</h3>
        @if($showFilters && count($filterOptions) > 0)
            <div class="flex gap-2">
                @foreach($filterOptions as $key => $label)
                    <button class="chart-filter-btn px-3 py-1 text-sm rounded-lg transition-colors {{ $loop->first ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}" data-filter="{{ $key }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Chart Container -->
    <div class="chart-container" style="height: {{ $height }};">
        <canvas id="chart-{{ Str::random(8) }}" class="chart-canvas"></canvas>
    </div>

    <!-- Chart Legend (Custom) -->
    <div class="mt-4 flex justify-center flex-wrap gap-4" id="chart-legend-{{ Str::random(8) }}">
        <!-- Legend items will be inserted here by JavaScript -->
    </div>

    <!-- Loading State -->
    <div class="chart-loading hidden absolute inset-0 bg-white bg-opacity-75 flex items-center justify-center">
        <div class="loading-spinner"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize chart when component is loaded
    const chartId = 'chart-{{ Str::random(8) }}';
    const chartElement = document.getElementById(chartId);

    if (chartElement && window.Chart) {
        const ctx = chartElement.getContext('2d');

        const chartConfig = {
            type: '{{ $type }}',
            data: @json($data),
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                },
                plugins: {
                    legend: {
                        display: false // We'll use custom legend
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        cornerRadius: 8,
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 13
                        },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y.toFixed(1);
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        };

        // Create chart
        const chart = new Chart(ctx, chartConfig);

        // Add custom legend
        const legendContainer = document.getElementById('chart-legend-' + chartId.replace('chart-', ''));
        if (legendContainer && chart.data.datasets.length > 0) {
            chart.data.datasets.forEach((dataset, index) => {
                const legendItem = document.createElement('div');
                legendItem.className = 'flex items-center gap-2 cursor-pointer';
                legendItem.innerHTML = `
                    <div class="w-3 h-3 rounded-full" style="background-color: ${dataset.borderColor}"></div>
                    <span class="text-sm text-gray-700">${dataset.label}</span>
                `;

                legendItem.addEventListener('click', () => {
                    const meta = chart.getDatasetMeta(index);
                    meta.hidden = !meta.hidden;
                    chart.update();
                    legendItem.style.opacity = meta.hidden ? '0.5' : '1';
                });

                legendContainer.appendChild(legendItem);
            });
        }

        // Handle filters if present
        const filterButtons = document.querySelectorAll('.chart-filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active state
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });
                this.classList.remove('bg-gray-200', 'text-gray-700');
                this.classList.add('bg-blue-500', 'text-white');

                // Trigger filter change event
                const filterEvent = new CustomEvent('chartFilterChange', {
                    detail: {
                        chartId: chartId,
                        filter: this.dataset.filter
                    }
                });
                document.dispatchEvent(filterEvent);
            });
        });
    }
});
</script>
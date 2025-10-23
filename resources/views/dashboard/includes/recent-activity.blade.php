{{-- Recent Activity Module --}}
<div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden p-6">
    <div class="flex items-center mb-4">
        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
            <i class="fas fa-history text-white text-xl"></i>
        </div>
        <div>
            <h3 class="text-xl font-bold text-gray-900">Aktivitas Terbaru</h3>
            <p class="text-sm text-gray-700">Performa dan belajar Anda terkini</p>
        </div>
    </div>

    @if(isset($recentTryouts) && $recentTryouts->count() > 0)
        <div class="space-y-4">
            @foreach($recentTryouts as $tryout)
                <div class="bg-white rounded-lg p-4 border border-gray-200 hover:border-blue-200 transition-colors duration-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($tryout->created_at)->format('d M Y') }}
                                <div class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($tryout->created_at)->format('H:i') }}</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('tryouts.show', $tryout->id) }}" class="text-lg font-bold text-blue-600 hover:text-blue-800">
                                    {{ $tryout->tryout->title ?? 'Tanpa Judul' }}
                                </a>
                                @if($tryout->completed_at)
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full ml-2">
                                        <i class="fas fa-check text-xs"></i> Selesai
                                    </span>
                                @else
                                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full ml-2">
                                        <i class="fas fa-clock text-xs"></i> {{ $tryout->completed_at ? 'Dalam Proses' : 'Belum Dimulai' }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-600">
                            <span class="font-bold">{{ round($tryout->persentase ?? 0) }}%</span>
                            <span>selesai</span>
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ round($tryout->benar ?? 0) }} benar
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ round($tryout->salah ?? 0) }} salah
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ round($tryout->kosong ?? 0) }} kosong
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-history text-4xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada aktivitas</p>
            <p class="text-sm">Mulailah tryout untuk melihat progress Anda</p>
        </div>
    @endif
</div>
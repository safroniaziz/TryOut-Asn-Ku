{{-- Recommendations Module --}}
<div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden p-6">
    <div class="flex items-center mb-4">
        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3">
            <i class="fas fa-lightbulb text-white text-xl"></i>
        </div>
        <div>
            <h3 class="text-xl font-bold text-gray-900">Rekomendasi</h3>
            <p class="text-sm text-gray-700">Berdasarkan analisis performa Anda</p>
        </div>
    </div>

    @if(isset($recommendations) && $recommendations->count() > 0)
        <div class="space-y-4">
            @foreach($recommendations as $recommendation)
                <div class="rounded-lg border-l-4 p-4
                    @if($recommendation['priority'] == 'critical')
                        border-red-300 bg-red-50
                    @elseif($recommendation['priority'] == 'high')
                        border-orange-300 bg-orange-50
                    @else
                        border-blue-300 bg-blue-50
                    @endif">

                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mr-4
                            <div class="w-6 h-6 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white text-lg">{{ $recommendation['icon'] }}</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div>
                                <h4 class="font-bold text-lg mb-2
                                    @if($recommendation['priority'] == 'critical')
                                        text-red-800
                                    @elseif($recommendation['priority'] == 'high')
                                        text-orange-800
                                    @else
                                        text-blue-800
                                    @endif
                                ">
                                    {{ $recommendation['title'] }}
                                </h4>
                            </div>
                            <div class="text-gray-700 mb-3">
                                {{ $recommendation['description'] }}
                            </div>
                            <div class="bg-white rounded-md p-3 border border-gray-200">
                                <h5 class="font-semibold text-sm mb-1">Aksi yang Direkomendasikan:</h5>
                                <p class="text-sm text-gray-600">{{ $recommendation['action'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8 text-gray-500">
            <i class="fas fa-lightbulb text-4xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada rekomendasi</p>
            <p class="text-sm">Lakukan lebih banyak tryout untuk mendapatkan rekomendasi yang lebih personal</p>
        </div>
    @endif
</div>
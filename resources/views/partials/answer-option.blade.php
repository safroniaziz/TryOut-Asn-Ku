<label class="group flex items-start p-6 border-2 border-gray-200 rounded-2xl hover:border-blue-400 hover:shadow-xl cursor-pointer transition-all duration-300 {{ $isSelected ? 'bg-blue-50 border-blue-500 shadow-xl' : '' }}">
    <input type="radio" name="jawaban" value="{{ $option }}" class="mt-1 mr-5 text-blue-600 focus:ring-blue-500 w-5 h-5" {{ $isSelected ? 'checked' : '' }}>
    <div class="flex-1">
        <div class="flex items-start">
            <span class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-gray-100 to-gray-200 group-hover:from-blue-100 group-hover:to-blue-200 text-gray-700 group-hover:text-blue-700 rounded-xl font-black text-lg mr-5 transition-all duration-200 shadow-sm">
                {{ $option }}
            </span>
            <div class="flex-1">
                <p class="text-gray-800 leading-relaxed whitespace-pre-line text-base">{{ $optionText ?? $soal->getOptionText($option) }}</p>
            </div>
        </div>
    </div>
</label>
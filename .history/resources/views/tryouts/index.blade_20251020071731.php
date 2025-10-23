<x-app-layout>

    <!-- Filter Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-orange-900 py-12">
        <!-- Animated Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 -right-4 w-72 h-72 bg-orange-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
            <div class="absolute bottom-0 right-20 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-6000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Content -->
            <div class="text-center mb-8">
                <div class="relative inline-flex items-center justify-center mb-6">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-orange-400 to-blue-500 rounded-full blur-3xl opacity-30 animate-pulse"></div>
                    <div class="relative bg-gradient-to-br from-white/20 to-white/5 backdrop-blur-2xl border border-white/20 rounded-2xl p-6 shadow-xl ring-1 ring-white/10 hover:scale-105 transition-transform duration-300">
                        <i class="fas fa-compass text-white text-4xl"></i>
                    </div>
                </div>

                <h1 class="text-6xl font-black mb-6 leading-tight tracking-tight">
                    <span class="block bg-gradient-to-r from-white via-blue-300 to-orange-300 bg-clip-text text-transparent drop-shadow-2xl animate-fade-in-up">Temukan Paket</span>
                    <span class="block bg-gradient-to-r from-orange-300 via-yellow-300 to-white bg-clip-text text-transparent drop-shadow-2xl animate-fade-in-up animation-delay-200">TryOut Terbaik</span>
                </h1>

                <p class="text-xl text-blue-200 max-w-3xl mx-auto leading-relaxed font-light animate-fade-in-up animation-delay-400">
                    🚀 Mulai perjalanan sukses CPNS & PPPK Anda dengan koleksi tryout terlengkap dan terpercaya
                </p>
            </div>

            <!-- Filter Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <a href="{{ route('tryouts.index') }}"
                   class="group relative inline-flex items-center px-8 py-4 rounded-full font-semibold text-base transition-all duration-300 overflow-hidden
                          {{ !request('type')
                              ? 'bg-gradient-to-r from-white to-gray-100 text-gray-900 shadow-2xl hover:shadow-3xl hover:scale-105 border border-white/20'
                              : 'bg-white/10 backdrop-blur-md text-white border border-white/20 hover:bg-white/20 hover:shadow-xl' }}">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-layer-group mr-3"></i>
                        <span>Semua Paket</span>
                    </span>
                    @if(!request('type'))
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-orange-500 opacity-10"></div>
                    @endif
                </a>

                <a href="{{ route('tryouts.index', ['type' => 'CPNS']) }}"
                   class="group relative inline-flex items-center px-8 py-4 rounded-full font-semibold text-base transition-all duration-300 overflow-hidden
                          {{ request('type') === 'CPNS'
                              ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-2xl hover:shadow-3xl hover:scale-105'
                              : 'bg-white/10 backdrop-blur-md text-white border border-white/20 hover:bg-white/20 hover:shadow-xl hover:border-blue-400/50' }}">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-building mr-3"></i>
                        <span>CPNS</span>
                    </span>
                    @if(request('type') === 'CPNS')
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 opacity-20 animate-pulse"></div>
                    @endif
                </a>

                <a href="{{ route('tryouts.index', ['type' => 'PPPK']) }}"
                   class="group relative inline-flex items-center px-8 py-4 rounded-full font-semibold text-base transition-all duration-300 overflow-hidden
                          {{ request('type') === 'PPPK'
                              ? 'bg-gradient-to-r from-orange-600 to-orange-700 text-white shadow-2xl hover:shadow-3xl hover:scale-105'
                              : 'bg-white/10 backdrop-blur-md text-white border border-white/20 hover:bg-white/20 hover:shadow-xl hover:border-orange-400/50' }}">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-user-tie mr-3"></i>
                        <span>PPPK</span>
                    </span>
                    @if(request('type') === 'PPPK')
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-orange-600 opacity-20 animate-pulse"></div>
                    @endif
                </a>
            </div>

            <!-- Filter Description -->
            <div class="text-center">
                <div class="inline-flex items-center px-6 py-3 bg-white/5 backdrop-blur-md rounded-full border border-white/10">
                    <i class="fas fa-filter text-white/70 mr-2"></i>
                    <p class="text-white/80 text-sm font-medium">
                        @if(request('type') === 'CPNS')
                            Paket TryOut CPNS - Calon Pegawai Negeri Sipil
                        @elseif(request('type') === 'PPPK')
                            Paket TryOut PPPK - Pegawai dengan Perjanjian Kerja
                        @else
                            Semua Paket TryOut CPNS & PPPK
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CPNS Section -->
    @if(request('type') != 'PPPK')
    <div x-data="{ cpnsActiveTab: 'all' }" class="bg-gradient-to-br from-slate-50 to-blue-50 -mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-600 rounded-2xl mb-6 shadow-lg">
                    <i class="fas fa-building text-white text-3xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Paket TryOut CPNS
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    🚀 Persiapan terbaik untuk <span class="font-bold text-blue-600">Calon Pegawai Negeri Sipil</span>
                    dengan lengkapan tes <span class="font-bold text-indigo-600">SKD & SKB</span> terlengkap
                </p>
            </div>

            <!-- Tabs Navigation -->
            <div class="mb-8">
                <div class="flex justify-center">
                    <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                        <button @click="cpnsActiveTab = 'all'"
                                :class="cpnsActiveTab === 'all' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <i class="fas fa-layer-group mr-2"></i>Semua
                        </button>
                        <button @click="cpnsActiveTab = 'SKD'"
                                :class="cpnsActiveTab === 'SKD' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <i class="fas fa-file-alt mr-2"></i>SKD
                        </button>
                        <button @click="cpnsActiveTab = 'SKB'"
                                :class="cpnsActiveTab === 'SKB' ? 'bg-blue-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <i class="fas fa-user-tie mr-2"></i>SKB
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- CPNS Card Grid (Full Width, Outside Container) -->
    <div class="bg-gradient-to-br from-slate-50 to-blue-50 pb-12">
        <!-- All Tab -->
        <div x-show="cpnsActiveTab === 'all'" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            @php
                $cpnsPackages = collect($tryoutPackages)->where('type', 'CPNS')->all();
            @endphp
            @forelse($cpnsPackages as $package)
                @include('partials.package-card', ['package' => $package, 'hasPremium' => $hasPremium])
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8">
                        <i class="fas fa-inbox text-4xl text-blue-500 mb-4"></i>
                        <p class="text-gray-600 text-lg">Belum ada paket tryout CPNS tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- SKD Tab -->
        <div x-show="cpnsActiveTab === 'SKD'" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            @php
                $skdPackages = collect($tryoutPackages)->where('type', 'CPNS')->where('category_type', 'SKD')->all();
            @endphp
            @forelse($skdPackages as $package)
                @include('partials.package-card', ['package' => $package, 'hasPremium' => $hasPremium])
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8">
                        <i class="fas fa-inbox text-4xl text-blue-500 mb-4"></i>
                        <p class="text-gray-600 text-lg">Belum ada paket tryout SKD tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- SKB Tab -->
        <div x-show="cpnsActiveTab === 'SKB'" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            @php
                $skbPackages = collect($tryoutPackages)->where('type', 'CPNS')->where('category_type', 'SKB')->all();
            @endphp
            @forelse($skbPackages as $package)
                @include('partials.package-card', ['package' => $package, 'hasPremium' => $hasPremium])
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8">
                        <i class="fas fa-inbox text-4xl text-blue-500 mb-4"></i>
                        <p class="text-gray-600 text-lg">Belum ada paket tryout SKB tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    @endif

    <!-- PPPK Section -->
    @if(request('type') != 'CPNS')
    <div x-data="{ pppkActiveTab: 'all' }" class="bg-gradient-to-br from-emerald-50 to-green-50 -mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-emerald-600 rounded-2xl mb-6 shadow-lg">
                    <i class="fas fa-user-tie text-white text-3xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Paket TryOut PPPK
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    🎯 Persiapan lengkap untuk <span class="font-bold text-emerald-600">Pegawai Pemerintah dengan Perjanjian Kerja</span>
                    meliputi <span class="font-bold text-green-600">Manajerial, Sosio Kultural, Wawancara & Teknis</span>
                </p>
            </div>

            <!-- Tabs Navigation -->
            <div class="mb-8">
                <div class="flex justify-center">
                    <div class="bg-white rounded-xl shadow-lg p-1 inline-flex">
                        <button @click="pppkActiveTab = 'all'"
                                :class="pppkActiveTab === 'all' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <i class="fas fa-layer-group mr-2"></i>Semua
                        </button>
                        <button @click="pppkActiveTab = 'Non-Teknis'"
                                :class="pppkActiveTab === 'Non-Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <i class="fas fa-users mr-2"></i>Non-Teknis
                        </button>
                        <button @click="pppkActiveTab = 'Teknis'"
                                :class="pppkActiveTab === 'Teknis' ? 'bg-emerald-600 text-white' : 'text-gray-600 hover:text-gray-800'"
                                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <i class="fas fa-cog mr-2"></i>Teknis
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- PPPK Card Grid (Full Width, Outside Container) -->
    <div class="bg-gradient-to-br from-emerald-50 to-green-50 pb-12">
        <!-- All Tab -->
        <div x-show="pppkActiveTab === 'all'" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            @php
                $pppkPackages = collect($tryoutPackages)->where('type', 'PPPK')->all();
            @endphp
            @forelse($pppkPackages as $package)
                @include('partials.package-card', ['package' => $package, 'hasPremium' => $hasPremium])
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl p-8">
                        <i class="fas fa-inbox text-4xl text-emerald-500 mb-4"></i>
                        <p class="text-gray-600 text-lg">Belum ada paket tryout PPPK tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Non-Teknis Tab -->
        <div x-show="pppkActiveTab === 'Non-Teknis'" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            @php
                $nonTeknisPackages = collect($tryoutPackages)->where('type', 'PPPK')->where('category_type', 'Non-Teknis')->all();
            @endphp
            @forelse($nonTeknisPackages as $package)
                @include('partials.package-card', ['package' => $package, 'hasPremium' => $hasPremium])
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl p-8">
                        <i class="fas fa-inbox text-4xl text-emerald-500 mb-4"></i>
                        <p class="text-gray-600 text-lg">Belum ada paket tryout Non-Teknis tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Teknis Tab -->
        <div x-show="pppkActiveTab === 'Teknis'" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            @php
                $teknisPackages = collect($tryoutPackages)->where('type', 'PPPK')->where('category_type', 'Teknis')->all();
            @endphp
            @forelse($teknisPackages as $package)
                @include('partials.package-card', ['package' => $package, 'hasPremium' => $hasPremium])
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl p-8">
                        <i class="fas fa-inbox text-4xl text-emerald-500 mb-4"></i>
                        <p class="text-gray-600 text-lg">Belum ada paket tryout Teknis tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    @endif

</x-app-layout>

<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}

@keyframes fade-in-up {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.animation-delay-6000 {
    animation-delay: 6s;
}

.animation-delay-200 {
    animation-delay: 0.2s;
}

.animation-delay-400 {
    animation-delay: 0.4s;
}

.animation-delay-600 {
    animation-delay: 0.6s;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}
</style>
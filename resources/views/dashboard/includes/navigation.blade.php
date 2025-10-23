{{-- Simple Navigation Module --}}
<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Tryout ASN" class="h-8 w-auto">
                </div>

                <!-- Main Nav -->
                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-8">
                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:border-gray-300 transition duration-150 ease-in-out @if(request()->routeIs('dashboard')) bg-blue-50 text-blue-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>

                        <!-- Performance Analysis -->
                        @if(Route::has('performance.analysis'))
                            <a href="{{ route('performance.analysis') }}"
                               class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:border-gray-300 transition duration-150 ease-in-out @if(request()->routeIs('performance.analysis')) bg-blue-50 text-blue-700">
                                <i class="fas fa-chart-line mr-2"></i>
                                Analisis
                            </a>
                        @endif

                        <!-- Tryouts -->
                        @if(Route::has('tryouts.index'))
                            <a href="{{ route('tryouts.index') }}"
                               class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:border-gray-300 transition duration-150 ease-in-out @if(request()->routeIs('tryouts.*')) bg-blue-50 text-blue-700">
                                <i class="fas fa-file-alt mr-2"></i>
                                Tryout
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative">
                        <button type="button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="userMenuToggle()" id="user-menu-button">
                            <span class="sr-only">Open user menu</span>
                            <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}" alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full">
                        </button>
                        <div id="user-menu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 hover:text-gray-900 hover:border-gray-300 transition duration-150 ease-in-out bg-blue-600 text-white">
                        Masuk
                    </a>
                @endauth

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="inline-flex items-center p-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="mobileMenuToggle()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Dashboard</a>
                @if(Route::has('performance.analysis'))
                    <a href="{{ route('performance.analysis') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Analisis</a>
                @endif
                @if(Route::has('tryouts.index'))
                    <a href="{{ route('tryouts.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Tryout</a>
                @endif
                @auth
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Masuk</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
function userMenuToggle() {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
}

function mobileMenuToggle() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

// Close menus when clicking outside
document.addEventListener('click', function(event) {
    const userMenu = document.getElementById('user-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const userButton = document.getElementById('user-menu-button');

    if (userMenu && !userMenu.contains(event.target) && !userButton.contains(event.target)) {
        userMenu.classList.add('hidden');
    }
});
</script>
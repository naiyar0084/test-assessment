<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="@auth
                                {{ Auth::user()->role === 'admin'
                                    ? route('admin.listings.index')
                                    : route('provider.listings.index') }}
                             @else
                                {{ url('/') }}
                             @endauth">
                        <span style="font-size: 20px; font-weight:bold">Gems 3D Studio</span>
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @guest
                        <a href="{{ url('/') }}" class="text-gray-700">
                            Home
                        </a>
                    @endguest

                    @auth
                        @if(Auth::user()->role === 'provider')
                            <a href="{{ route('provider.listings.index') }}"
                               class="text-gray-700 font-medium">
                                Provider Dashboard
                            </a>
                            <a href="{{ route('provider.enquiries.index') }}"
                               class="text-gray-700 font-medium">
                                Enquiries
                            </a>
                        @endif

                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.listings.index') }}"
                               class="text-gray-700 font-medium">
                                Admin Dashboard
                            </a>
                        @endif
                    @endauth

                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 me-4">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700">Register</a>
                @endguest

                @auth
                    <div class="relative">
                        <button class="inline-flex items-center px-3 py-2 text-sm text-gray-600">
                            {{ Auth::user()->name }}
                            <svg class="ms-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700">
                                Log Out
                            </button>
                        </form>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu (Mobile) -->
    <div x-show="open" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1 px-4">

            @guest
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest

            @auth
                @if(Auth::user()->role === 'provider')
                    <a href="{{ route('provider.listings.index') }}">
                        Provider Dashboard
                    </a>
                @endif

                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.listings.index') }}">
                        Admin Dashboard
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            @endauth

        </div>
    </div>
</nav>

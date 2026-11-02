<nav x-data="{ open: false }" class="bg-orange-50 border-b border-slate-300 shadow-md rounded-t-md pt-2 pb-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- ZONA IZQUIERDA: Logo + Texto intelCom -->
            <div class="flex items-center space-x-20">
                <a href="{{ route('inicio') }}" class="shrink-0 flex items-center">
                    <img class="block h-10 w-auto fill-current rounded-full" src="{{ asset('/logo.webp') }}" alt="nutri">
                </a>

                <a href="{{ route('inicio') }}" class="font-bold text-2xl text-orange-600 tracking-wide md:text-3xl">
                    intelCom 
                </a>
            </div>
            
            <!-- ZONA CENTRO/DERECHA: Navigation Links (Escritorio) empujados a la derecha -->
            <div class="hidden space-x-4 sm:flex sm:items-center sm:ml-auto sm:mr-6 mr-4">
                <x-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                    {{ __('Inicio') }}
                </x-nav-link>

                <x-nav-link :href="route('nosotros')" :active="request()->routeIs('nosotros')">
                    {{ __('Nosotros') }}
                </x-nav-link>

                <x-nav-link :href="route('productos')" :active="request()->routeIs('productos')">
                    {{ __('Productos') }}
                </x-nav-link>

                @auth
                    @if (Auth::user()->role == 1)
                        @if (Request::path() !== 'admin_panel')
                            <x-nav-link :href="route('admin_panel')" :active="request()->routeIs('admin_panel')">
                                {{ __('Panel admin') }}
                            </x-nav-link>
                            <x-nav-link :href="route('user_panel')" :active="request()->routeIs('user_panel')">
                                {{ __('Panel usuario') }}
                            </x-nav-link>
                        @endif
                    @elseif (Auth::user()->role == 2)
                        @if (Request::path() !== 'user_panel')
                            <x-nav-link :href="route('user_panel')" :active="request()->routeIs('user_panel')">
                                {{ __('Panel') }}
                            </x-nav-link>
                        @endif
                    @endif
                @endauth
                
                <x-nav-link :href="route('contacto')" :active="request()->routeIs('contacto')">
                    {{ __('Contacto') }}
                </x-nav-link>
            </div>

            <!-- ZONA DERECHA: Settings Dropdown / Login (Escritorio) -->
            <div class="hidden sm:flex sm:items-center rounded-md shadow-lg p-1">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-100 bg-blue-500 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <span>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</span>
                                <svg class="ms-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Salir') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center">
                        <x-dropdown-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-dropdown-link>
                    </div>
                @endauth
            </div>

            <!-- Hamburger Button (Móvil) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" 
                        aria-label="Abrir menú principal" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-200 hover:bg-slate-700 focus:outline-none focus:bg-slate-700 focus:text-gray-200 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Móvil) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-100 text-slate-600 border-t border-slatee-200 pb-4 pt-2">
        <div class="space-y-1 px-2">
            <x-responsive-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('nosotros')" :active="request()->routeIs('nosotros')">
                {{ __('Nosotros') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('productos')" :active="request()->routeIs('productos')">
                {{ __('Productos') }}
            </x-responsive-nav-link>

            @auth
                @if (Auth::user()->role == 1)
                    <x-responsive-nav-link :href="route('admin_panel')" :active="request()->routeIs('admin_panel')">
                        {{ __('Panel admin') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('user_panel')" :active="request()->routeIs('user_panel')">
                        {{ __('Panel usuario') }}
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role == 2)
                    <x-responsive-nav-link :href="route('user_panel')" :active="request()->routeIs('user_panel')">
                        {{ __('Panel usuario') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
            
            <x-responsive-nav-link :href="route('contacto')" :active="request()->routeIs('contacts')">
                {{ __('Contacto') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options / Auth state en Móvil -->
        <div class="pt-4 pb-1 border-t border-slate-200 mt-3 px-4">
            @auth
                <div class="font-medium text-sm text-center bg-transparent">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</div>

                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Salir') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
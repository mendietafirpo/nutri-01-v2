@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md h-full">
        <div class="p-4 text-lg font-bold">Panel</div>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" 
                        class="block px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                        📊 Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" 
                        class="block px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                        👥 Usuarios
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Contenido Principal -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</div>
@endsection
<x-app-layout>
@section('content')
<section class="flex h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-48 bg-white shadow-md h-full">
        <div class="p-4 text-lg font-bold">Panel</div>
        <nav>
            <ul>
                <li>
                    <button class="p-4" onclick="saveView(this)" data-valor="1">👥 Usuarios</button>
                </li>
                <li>
                    <button class="p-4" onclick="saveView(this)" data-valor="2">📊 Traces</button>
                </li>
                <li>
                    <button class="p-4" onclick="saveView(this)" data-valor="3">⚙️ Configuración</button>
                </li>
                <li>
                    <button class="p-4" onclick="saveView(this)" data-valor="4">📄 Reportes</button>
                </li>
            </ul>
        </nav>
    </aside>
    <button id="toggleSidebar" class="bg-white text-back px-2 py-2 rounded">
        <<
    </button>
    <!-- Contenido Principal -->
    <div class="flex-1 p-6">
        @if (!empty(session('viewSection')) && session('viewSection') == 1)
            @include('admin/sections/users')
        @elseif (!empty(session('viewSection')) && session('viewSection') == 2)
            @include('admin/sections/traces')
        @elseif (!empty(session('viewSection')) && session('viewSection') == 3)
            @include('admin/sections/contacts')
        @endif
    </div>
</section>
@endsection
</x-app-layout>
<script>
    function saveView(button) {
        let valor = button.getAttribute('data-valor');
        fetch('/save_view_section', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ valor: valor })
        })
        .then(response => response.json())
        .then(data => {
            //alert(data.mensaje);
            location.reload(); // Recarga la página automáticamente
        })
        .catch(error => console.error('Error:', error));
    };
</script>

<script>
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggleSidebar");
    
    toggleButton.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
        sidebar.classList.toggle("pl-2");
    });
</script>
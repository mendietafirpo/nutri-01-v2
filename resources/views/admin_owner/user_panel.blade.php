<x-app-layout>
@section('content')

<section class="flex h-screen">
    <!-- Sidebar -->
    <aside x-data="{ expand: true }" id="sidebar" class="w-48 bg-white shadow-md h-full">
        <div x-show="expand" class="p-4 text-lg font-bold">Panel</div>
        <nav>
            <ul>
                <li>
                    <button class="p-2" onclick="saveView(this)" data-valor="1">
                        <span x-text="expand ? '👥 Panel principal': '👥'"></span>
                    </button>
                </li>
                <!-- <li>
                    <button class="p-2" onclick="saveView(this)" data-valor="2">
                        <span x-text="expand ? '📄 Devices' : '📄'"></span>
                    </button>
                </li> -->
                <li>
                    <button class="p-2" onclick="saveView(this)" data-valor="3">
                        <span x-text="expand ? '📊 Registros tecnicos' : '📊'"></span>
                    </button>
                </li>
            </ul>
        </nav>
        
        <div class="text-right justify-center mt-8">
            <button @click="expand = !expand" id="toggleSidebar" class="bg-slate-100 shadow-md font-bold text-blue-600 px-2 py-2 rounded">
                <span x-text="expand ? '<<' : '>>'"></span> 
            </button>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="flex-1 p-6">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (!empty(session('viewSection_owner')) && session('viewSection_owner') == 1)
            @include('admin_owner.sections.welcome')
        @elseif (!empty(session('viewSection_owner')) && session('viewSection_owner') == 2)
            @include('admin_owner.sections.devices')
        @elseif (!empty(session('viewSection_owner')) && session('viewSection_owner') == 3)
            @include('admin_owner.sections.traces')
        @endif
    </div>
</section>
@endsection
</x-app-layout>


<script>
    function saveView(button) {
        let valor = button.getAttribute('data-valor');
        fetch('/save_view_section_owner', {
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
            // location.reload(); // Recarga la página automáticamente
            window.location.href = "{{ route('user_panel') }}";
        })
        .catch(error => console.error('Error:', error));
    };
</script>

<script>
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggleSidebar");
    
    toggleButton.addEventListener("click", () => {
        sidebar.classList.toggle("w-8");
        sidebar.classList.toggle("mt-8");
    });
</script>
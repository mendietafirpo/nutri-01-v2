<body class="w-full bg-gray-100 p-6">
    <div class="bg-white p-6 rounded-lg shadow-md border mb-6">
        <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            
            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1">Nombre o ciudad</label>
                <input name="search" class="w-full border rounded p-2 bg-gray-50 border-blue-300 focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1">Desde</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" 
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1">Hasta</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" 
                    class="w-full border rounded p-2">
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-bold transition flex-1">
                    Filtrar
                </button>
                <a href="{{ url()->current() }}" class="bg-gray-100 text-gray-500 px-4 py-2 rounded hover:bg-gray-200 transition">
                    <i class="fas fa-sync"></i>
                </a>
            </div>
        </form>
        <div class="justify-end w-8 mt-4">
            <form action="" method="GET">
                    <input name="search" value="" hidden>
                    <input name="date_from" value="" hidden>
                    <input name="date_to" value="" hidden>
                <div class="flex gap-2">
                    <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded font-bold transition flex-1">
                        Todos
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-full bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Mensajes de usuarios</h1>
        <!-- Tabla de usuarios -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Fecha</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Ciudad</th>
                    <th class="border px-4 py-2">País</th>
                    <th class="border px-4 py-2">Mensaje</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $contact->id }}</td>
                    <td class="border px-4 py-2">{{ $contact->updated_at }}</td>
                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                    <td class="border px-4 py-2">{{ $contact->cellPhone }}</td>
                    <td class="border px-4 py-2">{{ $contact->city }}</td>
                    <td class="border px-4 py-2">{{ $contact->country }}</td>
                    <td class="border px-4 py-2">{{ $contact->message }}</td>
                    <td class="border px-4 py-2">
                        <div class="inline-flex">
                            <!-- <button onclick="editUser({{ $contact->id }})" class="bg-blue-400 text-white mr-2 px-2 py-1 rounded">Edit</button> -->
                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="bg-red-400 text-white px-2 py-1 h-7 rounded hover:bg-red-600">
                                    Del
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $contacts->withQueryString()->links() }}</div>
    </div>

    <script>
        function confirmDelete(event) {
            if (!confirm("¿Seguro que quieres eliminar este usuario?")) {
                event.preventDefault(); // Cancela la eliminación si el usuario selecciona "Cancelar"
            }
        }
    </script>
</body>
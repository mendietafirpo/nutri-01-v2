<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Lista de Usuarios</h1>
        <!-- Tabla de usuarios -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Ciudad</th>
                    <th class="border px-4 py-2">País</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->cellPhone }}</td>
                    <td class="border px-4 py-2">{{ $user->city }}</td>
                    <td class="border px-4 py-2">{{ $user->country }}</td>
                    <td class="border px-4 py-2">
                        <button onclick="editUser({{ $user->id }})" class="bg-blue-400 text-white px-2 py-1 rounded">Editar</button>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-gray-500 text-white px-2 py-1 rounded">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Formulario de edición (oculto inicialmente) -->
        <div id="editForm" class="hidden mt-6 bg-gray-200 p-6 rounded">
            <h2 class="text-xl font-bold mb-4">Editar Usuario</h2>
            <form id="userForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="userId">

                <label class="block mb-2">Nombre</label>
                <input type="text" id="name" name="name" class="w-full border px-3 py-2 rounded mb-4" required>

                <label class="block mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border px-3 py-2 rounded mb-4" required>

                <label class="block mb-2">Teléfono</label>
                <input type="text" id="cellPhone" name="cellPhone" class="w-full border px-3 py-2 rounded mb-4">

                <label class="block mb-2">Ciudad</label>
                <input type="text" id="city" name="city" class="w-full border px-3 py-2 rounded mb-4">

                <label class="block mb-2">País</label>
                <input type="text" id="country" name="country" class="w-full border px-3 py-2 rounded mb-4">

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
                <button type="button" onclick="hideForm()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
            </form>
        </div>
    </div>

    <script>
        function editUser(id) {
            fetch(`/admin/sections/users/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('userId').value = id;
                    document.getElementById('name').value = data.name;
                    document.getElementById('email').value = data.email;
                    document.getElementById('cellPhone').value = data.cellPhone;
                    document.getElementById('city').value = data.city;
                    document.getElementById('country').value = data.country;

                    document.getElementById('userForm').action = `/admin/sections/users/${id}`;
                    document.getElementById('editForm').classList.remove('hidden');
                });
        }

        function hideForm() {
            document.getElementById('editForm').classList.add('hidden');
        }
    </script>

    <script>
        function confirmDelete(event) {
            if (!confirm("¿Seguro que quieres eliminar este usuario?")) {
                event.preventDefault(); // Cancela la eliminación si el usuario selecciona "Cancelar"
            }
        }
    </script>
</body>
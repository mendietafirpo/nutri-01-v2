<body class="w-full bg-gray-100 p-6">
    <div class="max-w-2xl grid grid-cols-3 bg-slate-100 rounded-md shadow-orange-200 mt-8 p-3">
        <div>
            <a href="{{ route('admin.users.create') }}" class="bg-black text-white px-2 py-1 rounded"> Nuevo usuario</a>
        </div>
        <div>
            <a href="{{ route('cities.index') }}" class="bg-blue-400 text-white px-2 py-1 rounded"> Update cities</a>
        </div>
        <div>
            <a href="{{ route('countries.index') }}" class="bg-blue-600 text-white px-2 py-1 rounded"> Update countries</a>
        </div>
        
    </div>
    <div class="w-full bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Usuarios registrados</h1>
        <!-- Tabla de usuarios -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Apellido</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th class="border px-4 py-2">Direc_linea1</th>
                    <th class="border px-4 py-2">Direc_linea2</th>
                    <th class="border px-4 py-2">Ciudad</th>
                    <th class="border px-4 py-2">zipCode</th>
                    <th class="border px-4 py-2">País</th>
                    <th class="border px-4 py-2">Rol</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->firstName }}</td>
                    <td class="border px-4 py-2">{{ $user->lastName }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->cellPhone }}</td>
                    <td class="border px-4 py-2">{{ $user->addrLine1 }}</td>
                    <td class="border px-4 py-2">{{ $user->addrLine2 }}</td>
                    <td class="border px-4 py-2">{{ $user->city }}</td>
                    <td class="border px-4 py-2">{{ $user->zipCode }}</td>
                    <td class="border px-4 py-2">{{ $user->country }}</td>
                    <td class="border px-4 py-2">{{ $user->role }}</td>
                    <td class="border px-4 py-2">
                        <div class="inline-flex">
                            <!-- <button onclick="editUser({{ $user->id }})" class="bg-blue-400 text-white mr-2 px-2 py-1 rounded">Edit</button> -->
                            <div class="bg-blue-400 text-white m mr-2 px-2 py-1 h-7 rounded hover:bg-blue-600">
                                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                            </div>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirmDelete(event)">
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

        <!-- Formulario de edición (oculto inicialmente) -->
        <!-- <div id="editForm" class="hidden mt-6 bg-gray-200 p-6 rounded">
            <h2 class="text-xl font-bold mb-4">Editar Usuario</h2>
            <form id="userForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="userId">

                <label class="block mb-2">Nombre</label>
                <input type="text" id="firstName" name="firstName" class="w-full border px-3 py-2 rounded mb-4" required autofocus>

                <label class="block mb-2">Apellido</label>
                <input type="text" id="lastName" name="lastName" class="w-full border px-3 py-2 rounded mb-4" required>

                <label class="block mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border px-3 py-2 rounded mb-4" required>

                <label class="block mb-2">Teléfono</label>
                <input type="text" id="cellPhone" name="cellPhone" class="w-full border px-3 py-2 rounded mb-4">

                <label class="block mb-2">Direc_linea1</label>
                <input type="text" id="addrLine1" name="addrLine1" class="w-full border px-3 py-2 rounded mb-4">
                
                <label class="block mb-2">Direc_linea2</label>
                <input type="text" id="addrLine2" name="addrLine2" class="w-full border px-3 py-2 rounded mb-4">
                
                <label class="block mb-2">Ciudad</label>
                <div class="form-group">
                    <select name="city" id="city" class="form-multiselect block rounded-md shadow-sm mt-1 w-full">
                    @foreach($cities as $ciudad => $op)
                        <option value="{{ $op }}" {{ ( $op == $user->ciudad) ? 'selected' : '' }}>
                            {{ $op }}
                        </option>
                    @endforeach
                    </select required>
                </div>
                
                <label class="block mb-2">zioCode</label>
                <input type="text" id="zipCode" name="zipCode" class="w-full border px-3 py-2 rounded mb-4">

                <label class="block mb-2">País</label>
                <div class="form-group">
                    <select name="country" id="country" class="form-multiselect block rounded-md shadow-sm mt-1 w-full">
                    @foreach($countries as $pais => $op)
                        <option value="{{ $op }}" {{ ( $op == $user->pais) ? 'selected' : '' }}>
                            {{ $op }}
                        </option>
                    @endforeach
                    </select required>
                </div>
                 <div class="form-group">
                    <label class="block mb-2">Roles</label>
                        <select id="role" type="text" title="roles" name="role" class="bg-blue-100 form-multiselect text-black-400 rounded-lg h-9 mx-2 w-full border-blue-500">
                        <option disabled selected>Roles</option>
                        <option value="1">Administrador</option>
                        <option value="2">Propietario</option>
                        <option value="3">Visitante</option>
                    </select>
                </div>
                <!-- <input type="text" id="city" name="city" class="w-full border px-3 py-2 rounded mb-4"> -->

                <!-- <label class="block mb-2">País</label>
                <input type="text" id="country" name="country" class="w-full border px-3 py-2 rounded mb-4">
                <div class="pt-4 inline-block">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
                    <button type="button" onclick="hideForm()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                </div>
            </form>
        </div> -->
    </div>

    <!-- <script>
        function editUser(id) {
            fetch(`/admin/sections/users/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('userId').value = id;
                    document.getElementById('firstName').value = data.firstName;
                    document.getElementById('lastName').value = data.lastName;
                    document.getElementById('email').value = data.email;
                    document.getElementById('cellPhone').value = data.cellPhone;
                    document.getElementById('addrLine1').value = data.addrLine1;
                    document.getElementById('addrLine2').value = data.addrLine2;
                    document.getElementById('city').value = data.city;
                    document.getElementById('zipCode').value = data.zipCode;
                    document.getElementById('country').value = data.country;
                    document.getElementById('role').value = data.role;
                    document.getElementById('userForm').action = `/admin/sections/users/${id}`;
                    document.getElementById('editForm').classList.remove('hidden');
                });
        }

        function hideForm() {
            document.getElementById('editForm').classList.add('hidden');
        }
    </script> -->

    <script>
        function confirmDelete(event) {
            if (!confirm("¿Seguro que quieres eliminar este usuario?")) {
                event.preventDefault(); // Cancela la eliminación si el usuario selecciona "Cancelar"
            }
        }
    </script>
</body>
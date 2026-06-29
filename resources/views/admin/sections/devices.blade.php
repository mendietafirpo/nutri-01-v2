<body class="bg-gray-100 p-4">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Administración de Dispositivos</h1>
        <div class="mb-4"> <a href="{{ route('devices.create') }}" class="bg-black text-white px-2 py-1 rounded"> Nuevo dispositivo</a></div>
        <!-- Tabla de registros -->
        <table class="w-full border-collapse border border-gray-100">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Device ID</th>
                    <th class="border px-4 py-2">Services</th>
                    <th class="border px-4 py-2">Duration</th>
                    <th class="border px-4 py-2">initTime</th>
                    <th class="border px-4 py-2">endTime</th>
                    <th class="border px-4 py-2">updatedOn</th>
                    <th class="border px-4 py-2">Dueño</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($devices as $device)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $device->devId }}</td>
                        <td class="border px-4 py-2">{{ $device->services }}</td>
                        <td class="border px-4 py-2">{{ $device->duration }}</td>
                        <td class="border px-4 py-2">{{ $device->initTime }}</td>
                        <td class="border px-4 py-2">{{ $device->endTime }}</td>
                        <td class="border px-4 py-2">{{ $device->updatedOn }}</td>
                        <td>
                            @if($device->users->isNotEmpty())
                                <span class="badge bg-green-100 text-green-800">
                                    {{ $device->users->first()->firstName }} {{ $device->users->first()->lastName }}
                                </span>
                            @else
                                <span class="text-gray-400 italic">Sin dueño</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('devices.edit', $device->devId) }}" class="bg-blue-400 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('devices.destroy', $device->devId) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="bg-red-400 text-white px-2 py-1 rounded">
                                    Del
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $devices->withQueryString()->links() }}

    <script>
        function confirmDelete(event) {
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                event.preventDefault(); // Cancela la eliminación si el usuario selecciona "Cancelar"
            }
        }
    </script>
</body>
<body class="bg-gray-100 p-4">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Lista de Registros</h1>
        
        <!-- Tabla de registros -->
        <table class="w-full border-collapse border border-gray-100">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Trace ID</th>
                    <th class="border px-4 py-2">Dev ID</th>
                    <th class="border px-4 py-2">Dev Long</th>
                    <th class="border px-4 py-2">Dev Lat</th>
                    <th class="border px-4 py-2">Serve Num</th>
                    <th class="border px-4 py-2">Serve Time</th>
                    <th class="border px-4 py-2">Serve Volt</th>
                    <th class="border px-4 py-2">Serve Temp</th>
                    <th class="border px-4 py-2">Serve Hum</th>
                    <th class="border px-4 py-2">Serve Press</th>
                    <th class="border px-4 py-2">Signal Qual</th>
                    <th class="border px-4 py-2">Modem IMEI</th>
                    <th class="border px-4 py-2">SIM ICCID</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($traces as $trace)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $trace->traceId }}</td>
                    <td class="border px-4 py-2">{{ $trace->devId }}</td>
                    <td class="border px-4 py-2">{{ $trace->devLong }}</td>
                    <td class="border px-4 py-2">{{ $trace->devLat }}</td>
                    <td class="border px-4 py-2">{{ $trace->serveNum }}</td>
                    <td class="border px-4 py-2">{{ $trace->serveTime }}</td>
                    <td class="border px-4 py-2">{{ $trace->serveVolt }}</td>
                    <td class="border px-4 py-2">{{ $trace->serveTemp }}</td>
                    <td class="border px-4 py-2">{{ $trace->serveHum }}</td>
                    <td class="border px-4 py-2">{{ $trace->servePress }}</td>
                    <td class="border px-4 py-2">{{ $trace->signalQual }}</td>
                    <td class="border px-4 py-2">{{ $trace->modemImei }}</td>
                    <td class="border px-4 py-2">{{ $trace->simIccid }}</td>

                    <td class="inline border p-2 text-sm">
                    <a href="{{ route('traces.edit', $trace->traceId) }}" class="bg-blue-400 text-white px-2 py-1 rounded">Edit</a>

                        <form action="{{ route('trace.destroy', $trace->traceId) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
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
        {{ $traces->withQueryString()->links() }}

    <script>
        function confirmDelete(event) {
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                event.preventDefault(); // Cancela la eliminación si el usuario selecciona "Cancelar"
            }
        }
    </script>
</body>
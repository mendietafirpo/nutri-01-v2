<body class="bg-gray-100 p-4">
    <div class="max-w-screen-2xl justify-center bg-white p-6 rounded-lg shadow-lg">
        <div class="bg-white p-6 rounded-lg shadow-md border mb-6">
            <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1">Seleccionar Dispositivo</label>
                    <select name="devId_select" class="w-full border rounded p-2 bg-gray-50 border-blue-300 focus:ring-2 focus:ring-blue-500">
                        @foreach($devices as $device)
                            <option value="{{ $device->devId }}" {{ $selectedDevId == $device->devId ? 'selected' : '' }}>
                                {{ $device->devId }} {{ $device->nombre ? '- '.$device->nombre : '' }}
                            </option>
                        @endforeach
                    </select>
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
                        Consultar
                    </button>
                
                <a href="{{ route('formulario.export') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold">
                    <i class="fas fa-file-csv"></i> Excel/CSV
                </a>
                </div>
            </form>
        </div>

        <h1 class="text-2xl font-bold mb-4">Parámetros técnicos</h1>      
        <!-- Tabla de registros -->
        <table class="w-full border-collapse border border-gray-100">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Updated_at</th>
                    <th class="border px-4 py-2">Trace ID</th>
                    <th class="border px-4 py-2">Dev ID</th>
                    <th class="border px-4 py-2">Dev Long</th>
                    <th class="border px-4 py-2">nsInd</th>
                    <th class="border px-4 py-2">Dev Lat</th>
                    <th class="border px-4 py-2">ewInd</th>
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
                <tr class="text-center text-sm">
                    <td class="border px-4 py-2">{{ $trace->updated_at }}</td>
                    <td class="border px-4 py-2">{{ $trace->traceId }}</td>
                    <td class="border px-4 py-2">{{ $trace->devId }}</td>
                    <td class="border px-4 py-2">{{ $trace->devLong }}</td>
                    <td class="border px-4 py-2">{{ $trace->nsInd }}</td>
                    <td class="border px-4 py-2">{{ $trace->devLat }}</td>
                    <td class="border px-4 py-2">{{ $trace->ewInd }}</td>
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
        <div>{{ $traces->withQueryString()->links() }}</div>
    </div>
    <script>
        function confirmDelete(event) {
            if (!confirm("¿Seguro que quieres eliminar este registro?")) {
                event.preventDefault(); // Cancela la eliminación si el usuario selecciona "Cancelar"
            }
        }
    </script>
</body>
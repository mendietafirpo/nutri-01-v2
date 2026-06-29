<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-md border mb-6">
        <form id="filter-form" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            
            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1">Seleccionar Dispositivo</label>
                <select name="devId_select" class="w-full border rounded p-2 bg-gray-50 border-blue-300 focus:ring-2 focus:ring-blue-500">
                    @foreach($user->devices as $device)
                        <option value="{{ $device->devId }}" {{ $selectedDevId == $device->devId ? 'selected' : '' }}>
                            {{ $device->devId }} {{ $device->nombre ? '- '.$device->nombre : '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1">Desde</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1">Hasta</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full border rounded p-2">
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold transition flex-1">
                    Consultar
                </button>

                <a href="{{ route('formulario.export') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold">
                    <i class="fas fa-file-csv"></i> Excel/CSV
                </a>

                <!-- <a href="{{ url()->current() }}" class="bg-gray-100 text-gray-500 px-4 py-2 rounded hover:bg-gray-200 transition">
                    <i class="fas fa-sync"></i>
                </a> -->
            </div>
        </form>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-8">
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded shadow-sm">
            <span class="text-blue-700 text-xs font-bold uppercase">Voltaje Medio</span>
            <p class="text-2xl font-black text-gray-800">{{ number_format($stats->avg_volt ?? 0, 2) }}V</p>
        </div>
        <div class="bg-blue-50 border-l-4 border-red-500 p-4 rounded shadow-sm">
            <span class="text-blue-700 text-xs font-bold uppercase">Humedad Media</span>
            <p class="text-2xl font-black text-gray-800">{{ number_format($stats->avg_hum ?? 0, 2) }}V</p>
        </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-red-50 border-l-4 border-blue-500 p-4 rounded shadow-sm">
            <span class="text-red-700 text-xs font-bold uppercase">Temp. Min</span>
            <p class="text-2xl font-black text-gray-800">{{ number_format($stats->min_temp ?? 0, 1) }}°C</p>
        </div>
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm">
            <span class="text-red-700 text-xs font-bold uppercase">Temp. Máx</span>
            <p class="text-2xl font-black text-gray-800">{{ number_format($stats->max_temp ?? 0, 1) }}°C</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border overflow-hidden">
        <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
            <h3 class="font-bold text-gray-700">Historial de Eventos Filtrados para el dispositivo: <span class="font-bold"> {{$selectedDevId}}</span></h3>
            <span class="text-xs font-medium bg-gray-200 px-2 py-1 rounded text-gray-600">
                Mostrando {{ $traces->count() }} de {{ $traces->total() }} registros
            </span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-6 py-3">Fecha/Hora</th>
                        <th class="px-6 py-3">Voltaje</th>
                        <th class="px-6 py-3">Temp.</th>
                        <th class="px-6 py-3">Humedad</th>
                        <th class="px-6 py-3">Señal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($traces as $trace)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ \Carbon\Carbon::parse($trace->updated_at)->format('d/m/Y H:i:s') }}
                        </td>
                        <td class="px-6 py-4">{{ $trace->serveVolt }}V</td>
                        <td class="px-6 py-4">{{ $trace->serveTemp }}°C</td>
                        <td class="px-6 py-4">{{ $trace->serveHum }}%</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-[10px] font-bold {{ $trace->signalQual == 'Exc' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ $trace->signalQual }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">
                            No se encontraron registros en este rango de fechas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 bg-gray-50">
            {{ $traces->links() }}
        </div>
    </div>
</div>

<!-- <script>
    function btnHiddenShow(elemento) {

        const btnQueryData = elemento.dataset.query;
        const btnExportar = document.getElementById('btn-exportar');
        if (btnQueryData=="query") {
            alert(btnQueryData);
            btnExportar.classList.remove('hidden'); // Agrega la clase de Tailwind para ocultarlo
        }
        // const btnExportarData = elemento.dataset.exportar;
        // alert(btnExportarData);
        // if (btnQueryData=="exportar") {
        //     alert(elemento.dataset.exportar);
        //     btnExportar.classList.add('hidden'); // Agrega la clase de Tailwind para ocultarlo
        // }
    }
</script> -->


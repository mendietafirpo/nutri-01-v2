{{-- admin/sections/traces.blade.php (sin <body>, sin @extends) --}}
<div class="bg-white rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500 overflow-hidden">

    <!-- ENCABEZADO -->
    <div class="px-6 py-5 border-b border-slate-200">
        <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Parámetros técnicos</h1>
        <div class="mt-2 h-1 w-12 rounded-full bg-orange-500"></div>
    </div>

    <!-- FILTROS -->
    <form action="" method="GET"
          class="px-6 py-5 bg-slate-50 border-b border-slate-200 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 items-end">

        <div>
            <label for="devId_select" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1.5">Dispositivo</label>
            <select id="devId_select" name="devId_select"
                    class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900
                           focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/40">
                @foreach($devices as $device)
                    <option value="{{ $device->devId }}" {{ $selectedDevId == $device->devId ? 'selected' : '' }}>
                        {{ $device->devId }} {{ $device->nombre ? '- '.$device->nombre : '' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="date_from" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1.5">Desde</label>
            <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}"
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900
                          focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/40">
        </div>

        <div>
            <label for="date_to" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1.5">Hasta</label>
            <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}"
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900
                          focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/40">
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="submit"
                    class="flex-1 inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-orange-500 text-sm font-bold text-slate-900
                           hover:bg-orange-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-300 focus-visible:ring-offset-2
                           active:scale-[0.98] transition">
                Consultar
            </button>
            <a href="{{ route('formulario.export') }}"
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-sm font-semibold text-slate-700
                      hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                      focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                </svg>
                Excel/CSV
            </a>
        </div>
    </form>

    <!-- TABLA (el scroll horizontal queda dentro de la tarjeta) -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left whitespace-nowrap">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-600 border-b border-slate-200">
                <tr>
                    <th scope="col" class="px-4 py-3 font-semibold">Actualizado</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Trace ID</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Dev ID</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Long</th>
                    <th scope="col" class="px-4 py-3 font-semibold">N/S</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Lat</th>
                    <th scope="col" class="px-4 py-3 font-semibold">E/W</th>
                    <th scope="col" class="px-4 py-3 font-semibold">N° serv.</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Hora serv.</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Volt</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Temp</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Hum</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Presión</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Señal</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Modem IMEI</th>
                    <th scope="col" class="px-4 py-3 font-semibold">SIM ICCID</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @forelse($traces as $trace)
                    <tr class="hover:bg-orange-50 transition-colors">
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->updated_at }}</td>
                        <td class="px-4 py-3 font-semibold text-slate-900 tabular-nums">{{ $trace->traceId }}</td>
                        <td class="px-4 py-3 text-slate-800">{{ $trace->devId }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->devLong }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $trace->nsInd }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->devLat }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $trace->ewInd }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->serveNum }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->serveTime }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->serveVolt }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->serveTemp }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->serveHum }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->servePress }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->signalQual }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->modemImei }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $trace->simIccid }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('traces.edit', $trace->traceId) }}"
                                   class="inline-flex items-center px-3 py-1.5 rounded-lg border border-slate-300 bg-white text-xs font-semibold text-slate-700
                                          hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                                          focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                                    Editar
                                </a>

                                <form action="{{ route('trace.destroy', $trace->traceId) }}" method="POST" class="inline"
                                      onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 rounded-lg border border-red-200 bg-red-50 text-xs font-semibold text-red-700
                                                   hover:bg-red-600 hover:text-white hover:border-red-600
                                                   focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 transition-colors">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="17" class="px-4 py-10 text-center text-slate-500">No hay registros para los filtros seleccionados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINACIÓN -->
    @if($traces->hasPages())
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
            {{ $traces->withQueryString()->links() }}
        </div>
    @endif
</div>

<script>
    function confirmDelete(event) {
        if (!confirm("¿Seguro que quieres eliminar este registro?")) {
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>
{{-- admin/sections/devices.blade.php (sin <body>, sin @extends) --}}
<div class="bg-white rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500 overflow-hidden">

    <!-- ENCABEZADO -->
    <div class="px-6 py-5 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Administración de dispositivos</h1>
            <div class="mt-2 h-1 w-12 rounded-full bg-orange-500"></div>
        </div>

        <a href="{{ route('devices.create') }}"
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-orange-500 text-sm font-bold text-slate-900
                  hover:bg-orange-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-300 focus-visible:ring-offset-2
                  active:scale-[0.98] transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
            </svg>
            Nuevo dispositivo
        </a>
    </div>

    <!-- TABLA (el scroll horizontal queda dentro de la tarjeta) -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left whitespace-nowrap">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-600 border-b border-slate-200">
                <tr>
                    <th scope="col" class="px-4 py-3 font-semibold">Device ID</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-center">Servicios</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-center">Duración</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-center">Inicio</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-center">Fin</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Actualizado</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Dueño</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @forelse($devices as $device)
                    <tr class="hover:bg-orange-50 transition-colors">
                        <td class="px-4 py-3 font-semibold text-slate-900">{{ $device->devId }}</td>
                        <td class="px-4 py-3 text-center text-slate-700">{{ $device->services }}</td>
                        <td class="px-4 py-3 text-center text-slate-700">{{ $device->duration }}</td>
                        <td class="px-4 py-3 text-center text-slate-700 tabular-nums">{{ $device->initTime }}</td>
                        <td class="px-4 py-3 text-center text-slate-700 tabular-nums">{{ $device->endTime }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $device->updatedOn }}</td>
                        <td class="px-4 py-3">
                            @if($device->users->isNotEmpty())
                                <span class="inline-block px-2.5 py-1 rounded-full bg-green-50 text-green-800 border border-green-200 text-xs font-medium">
                                    {{ $device->users->first()->firstName }} {{ $device->users->first()->lastName }}
                                </span>
                            @else
                                <span class="text-slate-400 italic">Sin dueño</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('devices.edit', $device->devId) }}"
                                   class="inline-flex items-center px-3 py-1.5 rounded-lg border border-slate-300 bg-white text-xs font-semibold text-slate-700
                                          hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                                          focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                                    Editar
                                </a>

                                <form action="{{ route('devices.destroy', $device->devId) }}" method="POST" class="inline"
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
                        <td colspan="8" class="px-4 py-10 text-center text-slate-500">No hay dispositivos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINACIÓN -->
    @if($devices->hasPages())
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
            {{ $devices->withQueryString()->links() }}
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
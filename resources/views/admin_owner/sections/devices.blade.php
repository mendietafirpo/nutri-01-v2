<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-md border mb-6">
        <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            
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

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-bold transition flex-1">
                    Consultar
                </button>
                <a href="{{ url()->current() }}" class="bg-gray-100 text-gray-500 px-4 py-2 rounded hover:bg-gray-200 transition">
                    <i class="fas fa-sync"></i>
                </a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-lg border overflow-hidden">
        <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
            <h3 class="font-bold text-gray-700">Información detallada del dispositivo seleccionado</h3>
            <span class="text-xs font-medium bg-gray-200 px-2 py-1 rounded text-gray-600">
                Mostrando {{ $devices->count() }} de {{ $devices->total() }} registros
            </span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-6 py-3">Fecha/Hora</th>
                        <th class="px-6 py-3">Services</th>
                        <th class="px-6 py-3">Duration</th>
                        <th class="px-6 py-3">iniTime</th>
                        <th class="px-6 py-3">endTime</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($devices as $device)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ \Carbon\Carbon::parse($device->updatedOn)->format('d/m/Y H:i:s') }}
                        </td>
                        <td class="px-6 py-4">{{ $device->services }} num</td>
                        <td class="px-6 py-4">{{ $device->duration }} seg</td>
                        <td class="px-6 py-4">{{ $device->initTime }} seg</td>
                        <td class="px-6 py-4">{{ $device->endTime }} seg</td>
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
            {{ $devices->links() }}
        </div>
    </div>
</div>
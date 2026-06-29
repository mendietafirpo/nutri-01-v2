<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8 border-l-4 border-blue-500">
        <h1 class="text-2xl font-bold text-gray-800">
            ¡Bienvenido, {{ $user->firstName }} {{ $user->lastName }}!
        </h1>
        <p class="text-gray-600">Desde aquí puedes gestionar tus dispositivos vinculados.</p>
    </div>

    <h2 class="text-xl font-semibold mb-4 text-gray-700">Mis Dispositivos</h2>

    @if($user->devices->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        Actualmente no tienes ningún dispositivo asignado a tu cuenta. 
                        Si crees que esto es un error, contacta con el administrador.
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($user->devices as $device)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                ID: {{ $device->devId }}
                            </span>
                            <i class="fas fa-tablet-alt text-gray-400"></i> </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Dispositivo {{ $device->devId}}
                        </h3>
                        
                        <div class="text-sm text-gray-500 space-y-2">
                            <p><span class="font-semibold">Ultima actualización:</span> 
                                {{ $device->updatedOn ? $device->updatedOn : 'N/D' }}
                            </p>
                            </div>
                        
                        <div class="mt-4 border-t border-gray-50 pt-4">
                            <div class="grid grid-cols-2 gap-y-3 gap-x-4">
                                <div>
                                    <span class="block text-xs text-gray-400 uppercase font-semibold">Servicio</span>
                                    <span class="text-sm text-gray-700 font-medium">{{ $device->services ?? 'Estándar' }}</span>
                                </div>

                                <div>
                                    <span class="block text-xs text-gray-400 uppercase font-semibold">Duración</span>
                                    <span class="text-sm text-gray-700 font-medium">{{ $device->duration }}</span>
                                </div>

                                <div>
                                    <span class="block text-xs text-gray-400 uppercase font-semibold">Inicio</span>
                                    <span class="text-sm text-gray-700 font-medium">
                                        {{ $device->initTime }}
                                    </span>
                                </div>

                                <div>
                                    <span class="block text-xs text-gray-400 uppercase font-semibold">Fin</span>
                                    <span class="text-sm text-gray-700 font-medium">
                                        {{ $device->endTime }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('device_owner.edit', $device->devId) }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                                Ajustes tecnicos
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


@extends('layouts.guestn')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="text-sm text-slate-200 ml-6">
            {{ session('success') }}
        </div>
    @endif
    <p class="bg-purple-100 text-2xl text-gray-600 font-bold p-4 ml-5">Modificar dispositivo</p>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex justify-center">
        <div class="max-w-2xl bg-slate-100 rounded-md shadow-md mb-4 p-6">
            <form action="{{ route('devices.update', $device->devId) }}" method="POST">
                @csrf
                @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <x-input-label for="devId" :value="__('ID disp')" />
                    <x-text-input id="devId" class="block mt-1 w-full" type="text" name="devId" :value="old('devId', $device->devId)" required autofocus/>
                    <x-input-error :messages="$errors->get('devId')" class="mt-2" />
                </div>

                <div class="grid col-span-2">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $device->email)" required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <div>
                    <x-input-label for="services" :value="__('Servicios')" />
                    <x-text-input id="services" class="block mt-1 w-full" type="text" name="services" :value="old('services', $device->services)" required/>
                    <x-input-error :messages="$errors->get('services')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="duration" :value="__('Duración')" />
                    <x-text-input id="duration" class="block mt-1 w-full" type="text" name="duration" :value="old('duration', $device->duration)" required/>
                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                </div>


                <div>
                    <x-input-label for="initTime" :value="__('Inicio')" />
                    <x-text-input id="initTime" class="block mt-1 w-full" type="text" name="initTime" :value="old('initTime', $device->initTime)" required/>
                    <x-input-error :messages="$errors->get('initTime')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="endTime" :value="__('Final')" />
                    <x-text-input id="endTime" class="block mt-1 w-full" type="text" name="endTime" :value="old('endTime', $device->endTime)" required/>
                    <x-input-error :messages="$errors->get('endTime')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="gmtTime" :value="__('gmtTime')" />
                    <x-text-input id="gmtTime" class="block mt-1 w-full" type="text" name="gmtTime" :value="old('gmtTime', $device->gmtTime)" required/>
                    <x-input-error :messages="$errors->get('gmtTime')" class="mt-2" />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button>
                        {{ __('Guardar cambios') }}
                    </x-primary-button>
                </div>
            </div>
            </form>
            <div class="grid grid-cols-1 gap-3" >
                <div class="text-blue-600 font-bold">Administrar propietarios</div>
                <div>
                    @if($device->users->isNotEmpty())
                        <form action="{{ route('devices.detach', [$device->devId, $device->users->first()->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-400 rounded-md shadow-md text-white p-1" onclick="return confirm('¿Estás seguro de quitar al dueño actual?')">
                                Eliminar aueño actual: {{ $device->users->first()->lastName }} {{ $device->users->first()->firstName }}
                            </button>
                        </form>
                    @else
                        <a href="{{ route('devices.assign.create', $device->devId) }}" class="bg-green-600 text-white hover:bg-gray-400 rounded-md shadow-md p-1">
                            Asignar un propietario al dispositivo: {{ $device->devId}}
                        </a>
                    @endif
                </div>
                <div class="flex items-center justify-end mt-6">
                    <x-secondary-button>
                        <a href="{{ url('/admin/admin_panel') }}" class="btn btn-secondary">Retornar</a>
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center bg-slate-100 rounded-md shadow-md m-2">

    </div>
</div>
@endsection

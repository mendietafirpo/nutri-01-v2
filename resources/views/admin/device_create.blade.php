@extends('layouts.guestn')

@section('content')
<div class="container">
    <p class="bg-purple-100 text-2xl text-gray-600 font-bold p-4 ml-5">Registrar un nuevo dispositivo</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-center">
        <form action="{{ route('devices.store') }}" method="POST" class="bg-slate-100 rounded-md shadow-md mb-4 p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <x-input-label for="devId" :value="__('ID disp')" />
                    <x-text-input id="devId" class="block mt-1 w-full" type="text" name="devId" :value="old('devId')" required autofocus />
                    <x-input-error :messages="$errors->get('devId')" class="mt-2" />
                </div>

                <div class="grid col-span-2">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="services" :value="__('Servicios')" />
                    <x-text-input id="services" class="block mt-1 w-full" type="text" name="services" :value="old('services')" required autofocus />
                    <x-input-error :messages="$errors->get('services')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="duration" :value="__('Duración')" />
                    <x-text-input id="duration" class="block mt-1 w-full" type="text" name="duration" :value="old('duration')" required autofocus />
                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="initTime" :value="__('Inicio')" />
                    <x-text-input id="initTime" class="block mt-1 w-full" type="text" name="initTime" :value="old('initTime')" required autofocus />
                    <x-input-error :messages="$errors->get('initTime')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="endTime" :value="__('Final')" />
                    <x-text-input id="endTime" class="block mt-1 w-full" type="text" name="endTime" :value="old('endTime')" required autofocus />
                    <x-input-error :messages="$errors->get('endTime')" class="mt-2" />
                </div>
                
                <div>
                    <x-input-label for="gmtTime" :value="__('gmtTime')" />
                    <x-text-input id="gmtTime" class="block mt-1 w-full" type="text" name="gmtTime" :value="old('gmtTime')" required autofocus />
                    <x-input-error :messages="$errors->get('gmtTime')" class="mt-2" />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button>
                        {{ __('Guardar Dispositivo') }}
                    </x-primary-button>
                </div>
                <div class="flex items-center justify-end mt-6">
                    <x-secondary-button>
                        <a href="{{ url('/admin/admin_panel') }}" class="btn btn-secondary">Cancelar</a>
                    </x-secondary-button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

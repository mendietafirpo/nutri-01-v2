@extends('layouts.guestn')

@section('content')
<div class="container">
    <p class="bg-purple-100 text-2xl text-gray-600 font-bold p-4 ml-5">Modificar usuarios</p>

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
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-slate-100 rounded-md shadow-md mb-4 p-6">
            @csrf
            @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div>
                <x-input-label for="id" :value="__('ID')" />
                <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id', $user->id)" required readonly/>
                <x-input-error :messages="$errors->get('id')" class="mt-2" />
            </div>

            <div class="grid col-span-2">
                <x-input-label for="firstName" :value="__('Nombre')" />
                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName', $user->firstName)" required autofocus/>
                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
            </div>

            <div class="grid col-span-2">
                <x-input-label for="lastName" :value="__('Apellido')" />
                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName', $user->lastName)" required/>
                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
            </div>

            <div class="grid col-span-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $user->email)" required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="cellPhone" :value="__('Teléfono')" />
                <x-text-input id="cellPhone" class="block mt-1 w-full" type="text" name="cellPhone" :value="old('cellPhone', $user->cellPhone)"/>
                <x-input-error :messages="$errors->get('cellPhone')" class="mt-2" />
            </div>

            <div class="grid col-span-2">
                <x-input-label for="addrLine1" :value="__('Dirección (línea 1)')" />
                <x-text-input id="addrLine1" class="block mt-1 w-full" type="text" name="addrLine1" :value="old('addrLine1', $user->addrLine1)"/>
                <x-input-error :messages="$errors->get('addrLine1')" class="mt-2" />
            </div>

            <div class="grid col-span-2">
                <x-input-label for="addrLine2" :value="__('Dirección (línea 2)')" />
                <x-text-input id="addrLine2" class="block mt-1 w-full" type="text" name="addrLine2" :value="old('addrLine2', $user->addrLine2)"/>
                <x-input-error :messages="$errors->get('addrLine1')" class="mt-2" />
            </div>

            <div class="grid col-span-2">
                <x-input-label for="city" :value="__('Ciudad')" />
                
                <select name="city" id="city" class="form-multiselect block rounded-md shadow-sm mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">{{ __('Selecciona una ciudad...') }}</option>
                    
                    @foreach($cities as $op)
                        <option value="{{ $op }}" {{ old('city', $user->city) == $op ? 'selected' : '' }}>
                            {{ $op }}
                        </option>
                    @endforeach
                </select>
                
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="zipCode" :value="__('Código postal')" />
                <x-text-input id="zipCode" class="block mt-1 w-full" type="text" name="zipCode" :value="old('zipCode', $user->zipCode)"/>
                <x-input-error :messages="$errors->get('zipCode')" class="mt-2" />
            </div>


            <div class="grid col-span-2 mt-2">
                <x-input-label for="city" :value="__('País')" />
                
                <select name="country" id="country" class="form-multiselect block rounded-md shadow-sm mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">{{ __('Selecciona un país...') }}</option>
                    
                    @foreach($countries as $op)
                        <option value="{{ $op }}" {{ old('country', $user->country) == $op ? 'selected' : '' }}>
                            {{ $op }}
                        </option>
                    @endforeach
                </select>
                
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="role" :value="__('Rol de Usuario')" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="1" @selected(old('role', $user->role) == '1')>Administrador</option>
                    <option value="2" @selected(old('role', $user->role) == '2')>Popietario</option>
                    <option value="3" @selected(old('role', $user->role) == '3')>Visitante</option>
                    <!--<option value="3" {{ old('role') == 'user' ? 'selected' : '' }}>Visitante</option>-->
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
        </div>
        <div>
            <div class="flex items-center justify-end mt-6">
                <x-primary-button>
                    {{ __('Guardar cambios') }}
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

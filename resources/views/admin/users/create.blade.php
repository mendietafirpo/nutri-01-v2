@extends('layouts.guestn')

@section('content')
<div class="flex justify-center px-4 mt-6">
    <div class="bg-white p-6 rounded-md shadow-md w-full max-w-2xl">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">{{ __('Registrar Nuevo Usuario') }}</h2>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <!-- Fila 1: Nombre y Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="firstName" :value="__('Nombre')" />
                    <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus />
                    <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="lastName" :value="__('Apellido')" />
                    <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus />
                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                </div>

                <div class="grid col-span-2">
                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- Fila 2: Rol y Teléfono -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                <div>
                    <x-input-label for="role" :value="__('Rol de Usuario')" />
                    <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="1" @selected(old('role', '2') == '1')>Administrador</option>
                        <option value="2" @selected(old('role', '2') == '2')>Popietario</option>
                        <option value="3" @selected(old('role', '2') == '3')>Visitante</option>
                        <!--<option value="3" {{ old('role') == 'user' ? 'selected' : '' }}>Visitante</option>-->
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="cellPhone" :value="__('Teléfono Celular')" />
                    <x-text-input id="cellPhone" class="block mt-1 w-full" type="text" name="cellPhone" :value="old('cellPhone')" />
                    <x-input-error :messages="$errors->get('cellPhone')" class="mt-2" />
                </div>
            </div>

            <!-- Dirección Línea 1 -->
            <div class="mt-2">
                <x-input-label for="addrLine1" :value="__('Dirección Línea 1')" />
                <x-text-input id="addrLine1" class="block mt-1 w-full" type="text" name="addrLine1" :value="old('addrLine1')" />
                <x-input-error :messages="$errors->get('addrLine1')" class="mt-2" />
            </div>

            <!-- Dirección Línea 2 -->
            <div class="mt-2">
                <x-input-label for="addrLine2" :value="__('Dirección Línea 2 (Opcional)')" />
                <x-text-input id="addrLine2" class="block mt-1 w-full" type="text" name="addrLine2" :value="old('addrLine2')" />
                <x-input-error :messages="$errors->get('addrLine2')" class="mt-2" />
            </div>

            <!-- Fila 3: Ciudad, País y Código Postal -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div class="grid col-span-2">
                    <x-input-label for="city" :value="__('Ciudad')" />
                    
                    <select name="city" id="city" class="form-multiselect block rounded-md shadow-sm mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">{{ __('Selecciona una ciudad...') }}</option>
                        
                        @foreach($cities as $op)
                            <option value="{{ $op }}" {{ old('city') == $op ? 'selected' : '' }}>
                                {{ $op }}
                            </option>
                        @endforeach
                    </select>
                    
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="grid col-span-2 mt-2">
                    <x-input-label for="city" :value="__('País')" />
                    
                    <select name="country" id="country" class="form-multiselect block rounded-md shadow-sm mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">{{ __('Selecciona un país...') }}</option>
                        
                        @foreach($countries as $op)
                            <option value="{{ $op }}" {{ old('coutry') == $op ? 'selected' : '' }}>
                                {{ $op }}
                            </option>
                        @endforeach
                    </select>
                    
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>
            </div>
            <div class="mt-2">
                <x-input-label for="zipCode" :value="__('Código Postal')" />
                <x-text-input id="zipCode" class="block mt-1 w-full" type="text" name="zipCode" :value="old('zipCode')" />
                <x-input-error :messages="$errors->get('zipCode')" class="mt-2" />
            </div>

            <!-- Fila 4: Contraseñas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button>
                    {{ __('Guardar Usuario') }}
                </x-primary-button>
            </div>
            <div class="flex items-center justify-end mt-6">
                <x-secondary-button>
                    <a href="{{ url('/admin/admin_panel') }}" class="btn btn-secondary">Cancelar</a>
                </x-secondary-button>
            </div>
        </form>
    </div>
</div>
@endsection
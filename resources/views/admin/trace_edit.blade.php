@extends('layouts.guestn')

@section('content')
<div class="container">
    <p class="text-lg text-purple-900 font-bold shadow-lg m-4 p-2">Editar Registro</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-center">
        <form action="{{ route('traces.update', $trace->traceId) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">

            <div>
                <x-input-label for="devId" :value="__('ID disp')" />
                <x-text-input id="devId" class="block mt-1 w-full" type="text" name="devId" :value="old('devId', $trace->devId)" required autofocus/>
                <x-input-error :messages="$errors->get('devId')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="devLong" :value="__('Longitude')" />
                <x-text-input id="devLong" class="block mt-1 w-full" type="text" name="devLong" :value="old('devLong', $trace->devLong)" required />
                <x-input-error :messages="$errors->get('devLong')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="nsInd" :value="__('nsInd')" />
                <x-text-input id="nsInd" class="block mt-1 w-full" type="text" name="nsInd" :value="old('nsInd', $trace->nsInd)" required />
                <x-input-error :messages="$errors->get('nsInd')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="devLat" :value="__('Latitude')" />
                <x-text-input id="devLat" class="block mt-1 w-full" type="text" name="devLat" :value="old('devLat', $trace->devLat)" required />
                <x-input-error :messages="$errors->get('devLat')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="ewInd" :value="__('ewInd')" />
                <x-text-input id="ewInd" class="block mt-1 w-full" type="text" name="ewInd" :value="old('ewInd', $trace->ewInd)" required />
                <x-input-error :messages="$errors->get('ewInd')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="serveNum" :value="__('serveNum')" />
                <x-text-input id="serveNum" class="block mt-1 w-full" type="number" name="serveNum" :value="old('serveNum', $trace->serveNum)" required />
                <x-input-error :messages="$errors->get('serveNum')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="serveTime" :value="__('serveTime')" />
                <x-text-input id="serveTime" class="block mt-1 w-full" type="text" name="serveTime" :value="old('serveTime', $trace->serveTime)" required />
                <x-input-error :messages="$errors->get('serveTime')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="serveVolt" :value="__('serveVolt')" />
                <x-text-input id="serveVolt" class="block mt-1 w-full" type="text" name="serveVolt" :value="old('serveVolt', $trace->serveVolt)" required />
                <x-input-error :messages="$errors->get('serveVolt')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="serveTemp" :value="__('serveTemp')" />
                <x-text-input id="serveTemp" class="block mt-1 w-full" type="text" name="serveTemp" :value="old('serveTemp', $trace->serveTemp)" required />
                <x-input-error :messages="$errors->get('serveTemp')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="serveHum" :value="__('serveHum')" />
                <x-text-input id="serveHum" class="block mt-1 w-full" type="text" name="serveHum" :value="old('serveHum', $trace->serveHum)" required />
                <x-input-error :messages="$errors->get('serveHum')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="servePress" :value="__('servePress')" />
                <x-text-input id="servePress" class="block mt-1 w-full" type="text" name="servePress" :value="old('servePress', $trace->servePress)" required />
                <x-input-error :messages="$errors->get('servePress')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="signalQual" :value="__('signalQual')" />
                <x-text-input id="signalQual" class="block mt-1 w-full" type="text" name="signalQual" :value="old('signalQual', $trace->signalQual)" required />
                <x-input-error :messages="$errors->get('signalQual')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="simIccid" :value="__('simIccid')" />
                <x-text-input id="simIccid" class="block mt-1 w-full" type="text" name="simIccid" :value="old('simIccid', $trace->simIccid)" required />
                <x-input-error :messages="$errors->get('simIccid')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="modemImei" :value="__('modemImei')" />
                <x-text-input id="modemImei" class="block mt-1 w-full" type="text" name="modemImei" :value="old('modemImei', $trace->modemImei)" required />
                <x-input-error :messages="$errors->get('modemImei')" class="mt-2" />
            </div>
            <div class="grid col-span-2">
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
@endsection

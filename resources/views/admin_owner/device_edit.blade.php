@extends('layouts.guestn')

@section('content')
<div class="container">
    <div class="flex flex-col max-w-lg items-center justify-center">
        <div class="inline-block">Realizar cambios en: {{$device->devId}}</div>
        <div> 
            <form action="{{ route('device_owner.update', $device->devId) }}" method="POST">
                @csrf @method('PUT')
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 mt-4">Número de Servicios</label>
                        <div class="flex items-center">
                            <button type="button" onclick="decrementService()" class="bg-red-200 p-2 rounded-md border shadow-md hover:bg-red-500"><<</i></button>
                            <input type="number" name="services" id="services_input" 
                                class="w-full border border-gray-300 p-2 text-center focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                value="{{ max(2, min(12, (int)$device->services)) }}" 
                                min="2" max="12">

                            <button type="button" onclick="incrementService()" class="bg-green-200 p-2 rounded-md border shadow-md hover:bg-green-500">>></i></button>
                        </div>
                        <small class="text-gray-500 text-xs">Mínimo 2, Máximo 12</small>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Duración del Servicio (Segundos)</label>
                        <div class="flex items-center">
                            <button type="button" onclick="stepDuration(-1)" class="bg-red-200 p-2 rounded-md border shadow-md hover:bg-red-500"><<</button>
                            <input type="number" name="duration" id="duration_input" 
                                class="w-full border border-gray-300 p-2 text-center focus:outline-none focus:ring-2" 
                                value="{{ max(8, min(30, (int)$device->duration)) }}" 
                                min="8" max="30">
                            <button type="button" onclick="stepDuration(1)" class="bg-green-200 p-2 rounded-md border shadow-md hover:bg-green-500">>></button>
                        </div>
                        <small class="text-gray-500 text-xs">Rango permitido: 8 a 30 segundos.</small>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Hora Inicio (HHMM)</label>
                        <div class="flex items-center">
                            <button type="button" onclick="stepTime('initTime', -10)" class="bg-red-200 p-2 rounded-md border shadow-md hover:bg-red-500"><<</button>
                            <input type="number" name="initTime" id="initTime" class="w-full border p-2 text-center border-gray-300" value="{{ $device->initTime }}">
                            <button type="button" onclick="stepTime('initTime', 10)" class="bg-green-200 p-2 rounded-md border shadow-md hover:bg-green-500">>></button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Hora Fin (HHMM)</label>
                        <div class="flex items-center">
                            <button type="button" onclick="stepTime('endTime', -10)" class="bg-red-200 p-2 rounded-md border shadow-md hover:bg-red-500"><<</button>
                            <input type="number" name="endTime" id="endTime" class="w-full border p-2 text-center border-gray-300" value="{{ $device->endTime }}">
                            <button type="button" onclick="stepTime('endTime', 10)" class="bg-green-200 p-2 rounded-md border shadow-md hover:bg-green-500">>></button>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-green-600 text-white p-3 hove:bg-green-400 rounded my-4">Guardar Cambios</button>
                        <a href="{{ route('user_panel') }}" class="w-full text-center bg-gray-800 hover:bg-gray-500 text-white p-3 rounded mt-4">Retornar</a>
                    </div>
                </div>
            </form>
        </div>

        @if ($errors->has('range'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ $errors->first('range') }}
            </div>
        @endif
    </div>
</div>

<script>
    const serviceInput = document.getElementById('services_input');

    function incrementService() {
        let currentValue = parseInt(serviceInput.value);
        if (currentValue < 12) {
            serviceInput.value = currentValue + 1;
        }
    }

    function decrementService() {
        let currentValue = parseInt(serviceInput.value);
        if (currentValue > 2) {
            serviceInput.value = currentValue - 1;
        }
    }
    
    function stepDuration(amount) {
    const input = document.getElementById('duration_input');
    let currentValue = parseInt(input.value);
    let newValue = currentValue + amount;

    if (newValue >= 8 && newValue <= 30) {
        input.value = newValue;
    }
    }
</script>

<script>
    function stepTime(id, amount) {
        const input = document.getElementById(id);
        let value = parseInt(input.value);
        
        // Lógica básica para no romper el formato de minutos (00 a 50)
        // Nota: Esta es una lógica simple de "unidades", 
        // para un reloj real se necesitaría manejar el acarreo de horas.
        if (amount > 0 && value < 2350) {
            value += amount;
        } else if (amount < 0 && value > 0) {
            value += amount;
        }
        
        input.value = value;
        validateRange();
    }

    function validateRange() {
        const services = parseInt(document.getElementById('services_input').value);
        const init = parseInt(document.getElementById('initTime').value);
        const end = parseInt(document.getElementById('endTime').value);
        const msg = document.getElementById('validation-msg');
        
        const diff = end - init;
        const minRequired = 60 * services;

        if (diff <= minRequired) {
            msg.innerText = `⚠️ El rango debe ser mayor a ${minRequired} para ${services} servicios.`;
            msg.classList.remove('hidden');
        } else {
            msg.classList.add('hidden');
        }
    }
</script>
<p id="validation-msg" class="text-red-500 text-xs mt-1 hidden"></p>
@endsection


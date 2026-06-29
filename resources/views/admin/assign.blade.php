@extends('layouts.guestn')

@section('content')
<div class="container">
    <h2>Editar Registro</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold mb-4">Asignar Usuario a Dispositivo</h2>
        
        <div class="mb-4 p-3 bg-gray-100 rounded">
            <p><strong>Dispositivo:</strong> {{ $device->nombre }} (ID: {{ $device->devId }})</p>
        </div>

        <form action="{{ route('devices.assign.store') }}" method="POST">
            @csrf
            
            <input type="hidden" name="device_id" value="{{ $device->devId }}">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                    Seleccionar Usuario
                </label>
                <select name="user_id" id="user_id" required
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                    <option value="">-- Elige un usuario --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->lastName }} {{ $user->firstName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ url()->previous() }}" class="text-gray-500 hover:text-gray-700">Cancelar</a>
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                    Vincular Dispositivo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

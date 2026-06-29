@extends('layouts.guestn')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container max-w-2xl p-6">
    <h1 class="text-2xl font-bold mb-4">Gestión de Paises</h1>
    <div class="flex items-center justify-start mt-6 ml-4">
        <x-secondary-button>
            <a href="{{ url('/admin/admin_panel') }}" class="btn btn-secondary">Retornar</a>
        </x-secondary-button>
    </div>
    <div class="bg-gray-100 p-4 rounded mb-8">
        <h2 class="font-bold mb-2">Agregar Nuevo País</h2>
        <form action="{{ route('countries.store') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="city" placeholder="Nombre del país" required
                class="border p-2 rounded w-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>

    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3 text-left">Nombre Actual</th>
                <th class="p-3 text-left">Acciones (Editar nombre)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $c)
            <tr class="border-b">
                <td class="p-3">{{ $c->city }}</td>
                <td class="p-3">
                    <form action="{{ route('countries.update', $c->country) }}" method="POST" class="flex gap-2">
                        @csrf
                        @method('PUT')
                        <input type="text" name="country" value="{{ $c->country }}" 
                            class="border p-1 rounded text-sm">
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                            Renombrar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

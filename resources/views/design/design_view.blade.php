@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Ingresar Descripciones</h2>
    <form action="{{ route('saveDescriptions') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="videoDescription" class="block text-gray-700">Descripción del Video</label>
            <textarea id="videoDescription" name="videoDescription" class="w-full p-2 border rounded" rows="4"></textarea>
        </div>
        <div class="mb-4">
            <label for="imageDescriptions" class="block text-gray-700">Descripciones de las Imágenes (separadas por comas)</label>
            <textarea id="imageDescriptions" name="imageDescriptions" class="w-full p-2 border rounded" rows="4"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection
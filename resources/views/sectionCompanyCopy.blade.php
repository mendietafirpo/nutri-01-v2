@extends('layouts.guest')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-12 bg-gray-200 shadow-md p-">
    <!-- Encabezado -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold mb-2">Titulo</h1>
        <p class="text-gray-600">Cualidades</p>
    </div>

    <!-- Contenido Principal -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Imagen Principal -->
        <div class="flex justify-center">
            <img src="https://" 
                 alt="Alt imagen" 
                 class="rounded shadow-md max-w-full h-auto">
        </div>

        <!-- Descripción del Producto -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">Caracterìsticas del producto</h2>
            <ul class="list-disc pl-6 text-gray-700 mb-4">
                <li>Caracteristica 1.</li>
                <li>Caracteristica 2.</li>
                <li>Caracteristica 3.</li>
                <li>Caracteristica 4.</li>
            </ul>
            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Mas detalles
        </div>
    </div>

    <!-- Sección de Videos e Imágenes -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold mb-4">Galería de imagen</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Imagen 1 -->
            <img src="https://m.media-amazon.com/images/I/71rwIoLGtxL._AC_SL1500_.jpg" 
                 alt="Flashlight Side View" 
                 class="rounded shadow-md">
            
            <!-- Imagen 2 -->
            <img src="https://m.media-amazon.com/images/I/71ATjKYjDtL._AC_SL1500_.jpg" 
                 alt="Flashlight Top View" 
                 class="rounded shadow-md">

            <!-- Video -->
            <div class="aspect-w-16 aspect-h-9">
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                        title="Blukar Flashlight Overview" 
                        class="rounded shadow-md" 
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Información Adicional -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold mb-4">¿Por qué elegir ...</h2>
        <p class="text-gray-700">
            Detalle extendido del producto.
        </p>
    </div>
</div>
@endsection

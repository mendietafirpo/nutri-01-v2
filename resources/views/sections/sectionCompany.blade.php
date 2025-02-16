@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Sección Nosotros -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Columna Izquierda: Texto -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Sobre Nosotros</h2>
            <p class="text-gray-600 mb-6">
                Somos una empresa comprometida con la innovación y la excelencia, ofreciendo productos/servicios de calidad para nuestros clientes.
            </p>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700">🌍 Nuestra Visión</h3>
                <p class="text-gray-600">
                    Convertirnos en líderes del sector, marcando la diferencia con soluciones innovadoras y un enfoque centrado en las personas.
                </p>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700">🎯 Nuestra Misión</h3>
                <p class="text-gray-600">
                    Brindar productos/servicios de alta calidad, garantizando satisfacción y generando un impacto positivo en la comunidad.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-700">💡 Filosofía</h3>
                <p class="text-gray-600">
                    Creemos en la honestidad, la transparencia y el compromiso con el crecimiento sostenible de nuestro entorno.
                </p>
            </div>
        </div>

        <!-- Columna Derecha: Imágenes -->
        <div class="grid grid-cols-2 gap-4">
            <img src="{{ asset('images/empresa1.jpg') }}" alt="Nuestra empresa" class="rounded-lg shadow-lg">
            <img src="{{ asset('images/empresa2.jpg') }}" alt="Nuestro equipo" class="rounded-lg shadow-lg">
        </div>
    </div>

    <!-- Galería con Lightbox -->
    <div class="mt-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Galería</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <!-- Imagen 1 -->
            <div x-data="{ open: false }">
                <img src="{{ asset('images/gallery1.jpg') }}" alt="Galería 1" class="w-full h-56 object-cover rounded-lg shadow-lg cursor-pointer hover:scale-105 transition-transform duration-300" @click="open = true">
                <p class="text-center text-gray-600 mt-2">Descripción de la imagen 1</p>

                <!-- Lightbox -->
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.away="open = false">
                    <img src="{{ asset('images/gallery1.jpg') }}" class="max-w-full max-h-full rounded-lg">
                </div>
            </div>

            <!-- Video 1 -->
            <div x-data="{ open: false }">
                <video class="w-full h-56 rounded-lg shadow-lg cursor-pointer hover:scale-105 transition-transform duration-300" controls @click="open = true">
                    <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                    Tu navegador no soporta videos.
                </video>
                <p class="text-center text-gray-600 mt-2">Descripción del video 1</p>

                <!-- Lightbox -->
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.away="open = false">
                    <video class="max-w-full max-h-full rounded-lg" controls>
                        <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>

            <!-- Imagen 2 -->
            <div x-data="{ open: false }">
                <img src="{{ asset('images/gallery2.jpg') }}" alt="Galería 2" class="w-full h-56 object-cover rounded-lg shadow-lg cursor-pointer hover:scale-105 transition-transform duration-300" @click="open = true">
                <p class="text-center text-gray-600 mt-2">Descripción de la imagen 2</p>

                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.away="open = false">
                    <img src="{{ asset('images/gallery2.jpg') }}" class="max-w-full max-h-full rounded-lg">
                </div>
            </div>

            <!-- Video 2 -->
            <div x-data="{ open: false }">
                <video class="w-full h-56 rounded-lg shadow-lg cursor-pointer hover:scale-105 transition-transform duration-300" controls @click="open = true">
                    <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                    Tu navegador no soporta videos.
                </video>
                <p class="text-center text-gray-600 mt-2">Descripción del video 2</p>

                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.away="open = false">
                    <video class="max-w-full max-h-full rounded-lg" controls>
                        <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>

            <!-- Imagen 3 -->
            <div x-data="{ open: false }">
                <img src="{{ asset('images/gallery3.jpg') }}" alt="Galería 3" class="w-full h-56 object-cover rounded-lg shadow-lg cursor-pointer hover:scale-105 transition-transform duration-300" @click="open = true">
                <p class="text-center text-gray-600 mt-2">Descripción de la imagen 3</p>

                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.away="open = false">
                    <img src="{{ asset('images/gallery3.jpg') }}" class="max-w-full max-h-full rounded-lg">
                </div>
            </div>

            <!-- Video 3 -->
            <div x-data="{ open: false }">
                <video class="w-full h-56 rounded-lg shadow-lg cursor-pointer hover:scale-105 transition-transform duration-300" controls @click="open = true">
                    <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                    Tu navegador no soporta videos.
                </video>
                <p class="text-center text-gray-600 mt-2">Descripción del video 3</p>

                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.away="open = false">
                    <video class="max-w-full max-h-full rounded-lg" controls>
                        <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

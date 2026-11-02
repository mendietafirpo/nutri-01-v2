@extends('layouts.guest')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white p-8 sm:p-12 rounded-2xl shadow-xl border border-gray-100 space-y-6">
        <h1 class="text-3xl font-extrabold text-gray-900 border-b border-gray-100 pb-4">Términos y Condiciones</h1>
        
        <p class="text-gray-600 text-sm">Última actualización: {{ date('Y') }}</p>

        <div class="space-y-4 text-gray-700 leading-relaxed">
            <h2 class="text-xl font-bold text-gray-800 pt-2">1. Aceptación de los términos</h2>
            <p>
                Al acceder y utilizar el sitio web y los servicios de Nutritronix, usted acepta cumplir con los presentes términos y condiciones de uso.
            </p>

            <h2 class="text-xl font-bold text-gray-800 pt-2">2. Uso del Sitio</h2>
            <p>
                El contenido de este sitio web (textos, imágenes, especificaciones de productos) es propiedad de Nutritronix. Queda prohibida su reproducción total o parcial sin autorización previa.
            </p>

            <h2 class="text-xl font-bold text-gray-800 pt-2">3. Limitación de responsabilidad</h2>
            <p>
                Nutritronix no se hace responsable por interrupciones temporales del sitio web debido a mantenimientos o fallas técnicas externas, ni por el uso indebido de la información técnica publicada.
            </p>
        </div>

        <div class="pt-6 border-t border-gray-100">
            <a href="{{ url('/') }}" class="text-blue-600 hover:underline font-semibold">&larr; Volver al inicio</a>
        </div>
    </div>
</div>
@endsection
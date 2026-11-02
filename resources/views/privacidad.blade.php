@extends('layouts.guest')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white p-8 sm:p-12 rounded-2xl shadow-xl border border-gray-100 space-y-6">
        <h1 class="text-3xl font-extrabold text-gray-900 border-b border-gray-100 pb-4">Política de Privacidad</h1>
        
        <p class="text-gray-600 text-sm">Última actualización: {{ date('Y') }}</p>

        <div class="space-y-4 text-gray-700 leading-relaxed">
            <h2 class="text-xl font-bold text-gray-800 pt-2">1. Información que recopilamos</h2>
            <p>
                En Nutritronix recopilamos información básica proporcionada voluntariamente por los usuarios a través de nuestros formularios de contacto, tales como nombre, correo electrónico y teléfono, con el único fin de responder a sus consultas.
            </p>

            <h2 class="text-xl font-bold text-gray-800 pt-2">2. Uso de los datos</h2>
            <p>
                Los datos personales recolectados no son compartidos, vendidos ni cedidos a terceros. Se utilizan exclusivamente para la gestión comercial y soporte técnico de nuestros productos.
            </p>

            <h2 class="text-xl font-bold text-gray-800 pt-2">3. Seguridad</h2>
            <p>
                Implementamos medidas de seguridad técnicas y organizativas para proteger su información contra accesos no autorizados o alteraciones.
            </p>
        </div>

        <div class="pt-6 border-t border-gray-100">
            <a href="{{ url('/') }}" class="text-blue-600 hover:underline font-semibold">&larr; Volver al inicio</a>
        </div>
    </div>
</div>
@endsection
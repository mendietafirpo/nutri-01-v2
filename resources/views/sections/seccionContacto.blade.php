@extends('layouts.guest')
@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-xl shadow-md mb-8 flex items-center gap-2">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 17.292l-4.5-4.364 1.857-1.858 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.643z"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900">Contacto</h1>
        <p class="text-gray-600 mt-1">Ponte en contacto con nosotros o visítanos en nuestras instalaciones.</p>
    </div>

    <!-- Grid Principal: Izquierda (Mapa y Datos) / Derecha (Formulario) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        
        <!-- COLUMNA IZQUIERDA: Mapa y Datos de Contacto -->
        <div class="space-y-8">
            <!-- Mapa Responsivo -->
            <div class="bg-white p-3 rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d6509.187050062191!2d-58.027652006448875!3d-31.531900702093623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m5!1s0x95ade063eaaf40e5%3A0xa0bee645bf78e96a!2sPuerto%20Yeru%C3%A1!3m2!1d-31.5320696!2d-58.0149067!4m3!3m2!1d-31.5327615!2d-58.030097899999994!5e1!3m2!1sen!2sit!4v1734619805629!5m2!1sen!2sit" 
                    class="w-full h-80 rounded-xl border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Información de Contacto -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl border border-gray-100 space-y-4">
                <h3 class="text-xl font-bold text-gray-900 border-b border-gray-100 pb-3">Información de Contacto</h3>
                
                <div class="flex items-start gap-3 text-gray-700">
                    <span class="text-blue-600 font-bold">📍</span>
                    <p><strong>Dirección:</strong> Calle Ficticia 123, Entre Ríos, Argentina</p>
                </div>
                <div class="flex items-center gap-3 text-gray-700">
                    <span class="text-blue-600 font-bold">📞</span>
                    <p><strong>Teléfono:</strong> +333 999 999</p>
                </div>
                <div class="flex items-center gap-3 text-gray-700">
                    <span class="text-blue-600 font-bold">✉️</span>
                    <p><strong>Email:</strong> info@nutri01.com</p>
                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA: Formulario -->
        <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-xl border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Envíanos tu consulta</h3>
            
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                @csrf
                <!-- CAMPO HONEYPOT (Invisible para humanos, trampa para bots) -->
                <div style="display:none;" aria-hidden="true">
                    <label for="website_url">No llenar este campo si eres humano</label>
                    <input type="text" name="website_url" id="website_url" value="" tabindex="-1" autocomplete="off">
                </div>
                
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nombre:</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email:</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="cellPhone" class="block text-sm font-semibold text-gray-700 mb-1">Teléfono:</label>
                        <input type="tel" id="cellPhone" name="cellPhone" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-semibold text-gray-700 mb-1">Ciudad:</label>
                        <input type="text" id="city" name="city" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">
                    </div>
                </div>

                <div>
                    <label for="country" class="block text-sm font-semibold text-gray-700 mb-1">País:</label>
                    <input type="text" id="country" name="country" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">
                </div>

                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-1">Mensaje:</label>
                    <textarea id="message" name="message" rows="4" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all"></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors shadow-md">
                    Enviar Mensaje
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
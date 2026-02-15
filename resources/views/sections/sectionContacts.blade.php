@extends('layouts.guest')
@section('content')
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="font-sans text-gray-800 bg-gray-50">
        <!-- Contenido principal -->
        <div class="container mx-auto py-8 px-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Contacto</h1>

            <!-- Mapa -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d6509.187050062191!2d-58.027652006448875!3d-31.531900702093623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m5!1s0x95ade063eaaf40e5%3A0xa0bee645bf78e96a!2sPuerto%20Yeru%C3%A1!3m2!1d-31.5320696!2d-58.0149067!4m3!3m2!1d-31.5327615!2d-58.030097899999994!5e1!3m2!1sen!2sit!4v1734619805629!5m2!1sen!2sit" 
                width="900" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">

            </iframe>
            <!-- Información de contacto -->
            <div class="contact-info mb-8">
                <h3 class="text-xl font-semibold text-blue-500 mb-4">Información de Contacto</h3>
                <p class="mb-2"><strong>Dirección:</strong> Calle Ficticia 123, Entrer Ríos, Argentina</p>
                <p class="mb-2"><strong>Teléfono:</strong> +333 999 999</p>
                <p><strong>Email:</strong> info@nutri01.com</p>
            </div>

            <!-- Formulario de contacto -->
            <div class="contact-form">
                <h3 class="text-xl font-semibold text-blue-500 mb-4">Envíanos tu consulta</h3>
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Nombre:</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email:</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700">Mensaje:</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white font-semibold p-2 rounded-md hover:bg-blue-600">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

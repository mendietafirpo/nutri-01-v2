<footer class="bg-orange-50 text-slate-800 py-10 px-4 rounded-b-xl shadow-xl mt-12 border-t border-slate-200">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 items-center text-center md:text-left">
        
        <!-- Columna 1: Enlaces Legales -->
        <div class="flex flex-col space-y-2 md:items-start items-center">
            <span class="text-xs font-semibold test-slate-600 uppercase tracking-wider mb-1">Legal</span>
            <a href="{{ url('/privacidad') }}" class="text-sm text-gray-700 hover:text-black transition-colors">Privacidad</a>
            <a href="{{ url('/terminos') }}" class="text-sm text-gray-700 hover:text-black transition-colors">Términos y Condiciones</a>
            <a href="{{ url('/contacto') }}" class="text-sm text-gray-700 hover:text-black transition-colors">Contacto</a>
        </div>

        <!-- Columna 2: Información del Sitio -->
        <div class="flex flex-col space-y-2 items-center">
            <span class="text-xs font-semibold test-slate-600 uppercase tracking-wider mb-1">Información del Sitio</span>
            <a href="{{ url('/nosotros') }}" class="text-sm text-gray-700 hover:text-black transition-colors">Sobre Nosotros</a>
        </div>

        <!-- Columna 3: Redes Sociales / Contacto -->
        <div class="flex flex-col space-y-2 md:items-end items-center">
            <span class="text-xs font-semibold test-slate-600 uppercase tracking-wider mb-1">Conéctate</span>
            <div class="flex space-x-4">
                <!-- LinkedIn Icon -->
                <a href="https://www.linkedin.com/nosotros/NAME/" target="_blank" rel="noopener noreferrer" class="p-2 bg-gray-800 hover:bg-blue-600 text-gray-300 hover:text-black rounded-full transition-all shadow" aria-label="LinkedIn">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </a>
                <!-- Email Icon -->
                <a href="mailto:mail@gmail.com.ar" class="p-2 bg-gray-800 hover:bg-red-600 text-gray-300 hover:text-black rounded-full transition-all shadow" aria-label="Correo electrónico">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.611 3.746zm-.653.535l5.03 4.086 5.03-4.086 5.591 6.537h-21.242l5.591-6.537zm14.03-5.464l-4.611 3.746 4.611 5.712v-9.458zm-13.377 1.085l5.724 4.65 5.724-4.65-5.724-4.65-5.724 4.65z"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>

    <!-- Línea divisoria y Copyright -->
    <div class="max-w-7xl mx-auto mt-8 pt-6 border-t border-gray-800 text-center text-xs test-slate-600 flex flex-col sm:flex-row items-center justify-center gap-2">
        <div class="flex items-center gap-1">
            <svg class="w-4 h-4 fill-current inline" viewBox="0 0 24 24">
                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-5.514 0-10-4.486-10-10s4.486-10 10-10 10 4.486 10 10-4.486 10-10 10zm0-18c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 14c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"/>
            </svg>
            <span>{{ date('Y') }} {{ config('app.name') }}.</span>
        </div>
        <span>| Todos los derechos reservados.</span>
    </div>
</footer>
@section('content')
<section class="py-10 bg-slate-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- ENCABEZADO -->
        <header class="text-center max-w-3xl mx-auto mb-8">
            <span class="inline-block mb-3 px-3 py-1 rounded-full bg-orange-50 text-orange-600 text-xs sm:text-sm font-semibold tracking-wide uppercase border border-orange-200">
                Producto
            </span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight">
                Comedero automático <span class="text-orange-600">NUTRITRONIX®</span>
            </h1>
            <div class="mx-auto mt-4 h-1 w-20 rounded-full bg-orange-500"></div>
        </header>

        <!-- GALERÍA -->
        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 border border-slate-200 border-l-8 border-b-8 border-l-orange-500 border-b-orange-500">

            <div class="relative w-full max-w-2xl mx-auto overflow-hidden rounded-xl bg-slate-800 shadow-md p-2">
                <img id="modalImage"
                     src="{{ asset('storage/uploads/product_image_1.webp') }}"
                     alt="Comedero Nutritronix"
                     class="w-full h-72 sm:h-96 object-cover rounded-lg transition-opacity duration-300">

                <!-- Flechas -->
                <button type="button" onclick="changeImage(-1)" aria-label="Imagen anterior"
                        class="absolute left-4 top-1/2 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full bg-white/90 text-slate-800 shadow-md hover:bg-orange-500 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" onclick="changeImage(1)" aria-label="Imagen siguiente"
                        class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full bg-white/90 text-slate-800 shadow-md hover:bg-orange-500 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <!-- Miniaturas -->
            <div class="mt-6 flex justify-center gap-3">
                @foreach ([1, 2, 3, 4] as $i)
                    <button type="button" onclick="setImage({{ $i - 1 }})" aria-label="Ver imagen {{ $i }}"
                            class="thumb rounded-lg overflow-hidden ring-2 ring-transparent opacity-60 hover:opacity-100 hover:scale-105 focus:outline-none focus-visible:ring-orange-600 transition-all">
                        <img src="{{ asset('storage/uploads/product_image_' . $i . '.webp') }}"
                             alt="Miniatura {{ $i }}" loading="lazy"
                             class="w-20 h-14 object-cover">
                    </button>
                @endforeach
            </div>
        </div>

        <div class="mt-12 space-y-10">

            <!-- PRESTACIONES -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500">
                <h2 class="text-2xl font-bold text-slate-900">Prestaciones</h2>
                <div class="mt-2 mb-6 h-1 w-12 rounded-full bg-orange-500"></div>

                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ([
                        'Automatización y entrega precisa de raciones para ganado bovino.',
                        'Sensores meteorológicos y registro de datos en tiempo real.',
                        'Microprocesador incorporado, conexión a la nube y alimentación solar.',
                        'Estructura resistente, móvil y adaptada a condiciones de intemperie.',
                    ] as $item)
                        <li class="flex items-start gap-3 p-4 rounded-lg bg-slate-50 border border-slate-200">
                            <span class="flex items-center justify-center shrink-0 w-6 h-6 rounded-full bg-orange-500 text-white mt-0.5">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                            <span class="text-slate-700 leading-relaxed">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- DESCRIPCIÓN -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500">
                <h2 class="text-2xl font-bold text-slate-900">Descripción del producto</h2>
                <div class="mt-2 mb-6 h-1 w-12 rounded-full bg-orange-500"></div>

                <p class="mb-6 p-4 rounded-lg bg-orange-50 border-l-4 border-orange-500 text-base sm:text-lg font-bold text-slate-900 leading-snug">
                    Comedero robotizado para entregas múltiples, solar, electrónico y programable
                </p>

                <ul class="space-y-3 text-slate-700 leading-relaxed list-disc pl-5 marker:text-orange-500">
                    <li>Diseñado para cumplir un programa alimenticio de <strong class="text-slate-900">múltiples entregas</strong>.</li>
                    <li>Número de raciones regulable entre <strong class="text-slate-900">2 y 12</strong> (se dispensa generalmente entre 4 y 7 raciones diarias).</li>
                    <li>Antes de cada suministro, el equipo emite <strong class="text-slate-900">60 segundos de aviso acústico</strong> (sirena), aprovechando el reflejo condicionado de Pavlov.</li>
                    <li>Se temporiza 60 segundos antes de entregar la comida; el animal come de forma racionada y el suministro se realiza mediante energía solar.</li>
                    <li>Volumen de comida regulable en amplios márgenes; horarios de cada comida ajustables; frente de bandejas de <strong class="text-slate-900">12,60 metros</strong> distribuidos en cuatro caras.</li>
                    <li>Autonomía para <strong class="text-slate-900">20 a 24 cabezas vacunas</strong> durante 7 a 14 días, con reserva de baterías de 8 a 14 días nublados consecutivos.</li>
                    <li>Fácilmente movible mediante un tractor pequeño o camioneta 4x4, y totalmente configurable por comando <strong class="text-slate-900">Bluetooth</strong> desde un celular.</li>
                </ul>
            </div>

            <!-- ESPECIFICACIONES TÉCNICAS -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500">
                <h2 class="text-2xl font-bold text-slate-900">Especificaciones técnicas</h2>
                <div class="mt-2 mb-6 h-1 w-12 rounded-full bg-orange-500"></div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        ['Modelo', 'NUTRITRONIX® 001'],
                        ['Dimensiones y peso', '3 x 2 metros, 250 kg (peso a vacío)'],
                        ['Capacidad en cabezas', '20 a 24 cabezas'],
                        ['Capacidad de almacenaje', 'Tolva de 300 litros (aprox. 200 kg)'],
                        ['Alimentación', 'Energía solar con respaldo de batería'],
                        ['Conectividad', 'Bluetooth / Opcional nube'],
                    ] as [$label, $value])
                        <div class="p-4 rounded-lg bg-slate-50 border border-slate-200 border-l-4 border-l-orange-500">
                            <dt class="text-xs font-semibold uppercase tracking-wide text-orange-700">{{ $label }}</dt>
                            <dd class="mt-1 text-base font-medium text-slate-900">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>

        <!-- LLAMADA A LA ACCIÓN -->
        <div class="mt-14 rounded-2xl bg-slate-900 p-8 sm:p-10 text-center shadow-xl border-b-8 border-orange-500">
            <h3 class="text-2xl sm:text-3xl font-bold text-white">¿Interesado en nuestro producto?</h3>
            <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-orange-500"></div>
            <p class="mt-4 mb-8 text-slate-300 max-w-xl mx-auto">
                Contáctenos para más información, asesoramiento técnico y cotizaciones.
            </p>
            <a href="{{ url('/contacto') }}"
               class="inline-block bg-orange-500 hover:bg-orange-400 text-slate-900 font-bold text-lg py-3 px-8 rounded-xl shadow-md
                      focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900
                      active:scale-[0.98] transition duration-200">
                Solicitar cotización
            </a>
        </div>

    </div>
</section>

<!-- Script de Galería -->
<script>
    const galleryImages = [
        { src: "{{ asset('storage/uploads/product_image_1.webp') }}", alt: "Comedero Nutritronix - Vista principal" },
        { src: "{{ asset('storage/uploads/product_image_2.webp') }}", alt: "Comedero Nutritronix - Vista 2" },
        { src: "{{ asset('storage/uploads/product_image_3.webp') }}", alt: "Comedero Nutritronix - Vista 3" },
        { src: "{{ asset('storage/uploads/product_image_4.webp') }}", alt: "Comedero Nutritronix - Vista 4" }
    ];

    let currentImageIndex = 0;

    function setImage(index) {
        currentImageIndex = index;
        const modalImage = document.getElementById('modalImage');
        const imageData = galleryImages[index];

        modalImage.src = imageData.src;
        modalImage.alt = imageData.alt;

        // Miniatura activa: anillo naranja y opacidad completa
        document.querySelectorAll('.thumb').forEach((thumb, i) => {
            const active = i === index;
            thumb.classList.toggle('ring-orange-500', active);
            thumb.classList.toggle('opacity-100', active);
            thumb.classList.toggle('ring-transparent', !active);
            thumb.classList.toggle('opacity-60', !active);
        });
    }

    function changeImage(direction) {
        currentImageIndex = (currentImageIndex + direction + galleryImages.length) % galleryImages.length;
        setImage(currentImageIndex);
    }

    // Navegación con teclado
    document.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft') changeImage(-1);
        else if (e.key === 'ArrowRight') changeImage(1);
    });

    // Estado inicial: marca la primera miniatura como activa
    setImage(0);
</script>
@endsection
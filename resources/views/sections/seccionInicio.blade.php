@section('content')
<div class="max-w-7xl mx-auto px-4 mt-8 mb-12 w-full">

    <!-- HERO -->
    <section class="text-center max-w-3xl mx-auto">
        <span class="inline-block mb-3 px-3 py-1 rounded-full bg-orange-50 text-orange-600 text-xs sm:text-sm font-semibold tracking-wide uppercase border border-orange-200">
            Alimentación inteligente
        </span>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight">
            <span class="text-orange-600">intelCom:</span> el comedero inteligente que entiende a su ganado
        </h1>
        <div class="mx-auto mt-4 h-1 w-20 rounded-full bg-orange-500"></div>
        <p class="mt-5 text-base md:text-lg leading-relaxed text-slate-600">
            La alimentación automática, racionada y controlada directamente desde su celular o laptop
            le permite una producción eficiente mediante la reducción de costos y de mano de obra diaria.
        </p>
    </section>

    <!-- VIDEO + CARACTERÍSTICAS -->
    <section class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center w-full rounded-2xl bg-white p-6 lg:p-8 shadow-xl border border-slate-200 border-l-8 border-b-8 border-l-orange-500 border-b-orange-500">

        <!-- Video -->
        <div class="rounded-xl bg-slate-800 shadow-md overflow-hidden p-2">
            <video controls preload="metadata" class="w-full h-auto rounded-lg">
                <source src="{{ asset('storage/videos/home_video_1.mp4') }}" type="video/mp4">
            </video>
        </div>

        <!-- Características -->
        <div class="flex flex-col justify-center text-slate-700">
            <h2 class="text-xl md:text-2xl font-bold text-slate-900 mb-1">
                ¿Por qué elegir <span class="text-orange-600">intelCom</span>?
            </h2>
            <div class="mb-5 h-1 w-12 rounded-full bg-orange-500"></div>

            <ul class="space-y-3 text-sm sm:text-base leading-relaxed marker:text-orange-500 list-disc pl-5">
                <li><strong class="text-slate-900">El secreto de la conversión:</strong> suministre a su ganado 4, 5 o más raciones al día y mantenga una carga ruminal óptima el mayor tiempo posible.</li>
                <li>Olvídese de los altos costos de mano de obra y gasoil, y de los sábados, domingos, feriados y partes de enfermo.</li>
                <li><strong class="text-slate-900">Racione con energía solar:</strong> ¡es gratis!</li>
                <li>Entregue <strong class="text-slate-900">2.000 a 4.000 raciones al año</strong> por equipo sin un solo atraso.</li>
                <li>Visualice las raciones entregadas en nuestro tablero de control SaaS con hora, temperatura, humedad, presión, batería y geoposicionamiento.</li>
                <li>Maneje todos sus comederos y campos desde la comodidad de su celular o laptop, y cuide su dinero con nuestro SaaS.</li>
                <li>Use estas estadísticas para mejorar su rentabilidad, día tras día.</li>
            </ul>
        </div>
    </section>

    <!-- TARJETAS CON IMAGEN -->
    <section class="mt-14">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-slate-900">Conozca el equipo</h2>
            <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-orange-500"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Tarjeta 1 -->
            <article class="flex flex-col bg-white rounded-xl shadow-lg border border-slate-200 border-l-4 border-b-4 border-l-orange-500 border-b-orange-500 overflow-hidden hover:-translate-y-1 hover:shadow-xl transition duration-200">
                <img src="{{ asset('storage/uploads/home_image_1.webp') }}" alt="Comedero robótico intelCom en el campo" loading="lazy" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Para el productor pequeño y mediano</h3>
                    <p class="text-sm sm:text-base leading-relaxed text-slate-600">
                        El sistema se orienta al productor que actualmente usa un sistema manual o gravitacional. Accede a un comedero robótico que mejora sustancialmente su productividad, pues optimiza la conversión y su uso.
                    </p>
                </div>
            </article>

            <!-- Tarjeta 2 -->
            <article class="flex flex-col bg-white rounded-xl shadow-lg border border-slate-200 border-l-4 border-b-4 border-l-orange-500 border-b-orange-500 overflow-hidden hover:-translate-y-1 hover:shadow-xl transition duration-200">
                <img src="{{ asset('storage/uploads/home_image_2.webp') }}" alt="Pirámide de distribución de alimento" loading="lazy" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Diseño de distribución perimetral</h3>
                    <p class="text-sm sm:text-base leading-relaxed text-slate-600">
                        Cuenta con un chasis estructural prismático rectangular y una pirámide de distribución por cuyas cuatro caras se desliza el alimento, permitiendo el acceso perimetral de los animales. Unidad central de control a energía solar.
                    </p>
                </div>
            </article>

            <!-- Tarjeta 3 -->
            <article class="flex flex-col bg-white rounded-xl shadow-lg border border-slate-200 border-l-4 border-b-4 border-l-orange-500 border-b-orange-500 overflow-hidden hover:-translate-y-1 hover:shadow-xl transition duration-200 md:col-span-2 lg:col-span-1">
                <img src="{{ asset('storage/uploads/home_image_3.webp') }}" alt="Estructura de madera con techo de zinc y tolva" loading="lazy" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Construcción robusta</h3>
                    <p class="text-sm sm:text-base leading-relaxed text-slate-600">
                        Estructura funcional construida preferentemente en madera, montada sobre patines metálicos y resguardada con techo de zinc. Incluye una tolva vertical de chapa de acero con capacidad para planificar la alimentación semanalmente.
                    </p>
                </div>
            </article>

        </div>
    </section>
</div>
@endsection
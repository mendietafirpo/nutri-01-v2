@extends('layouts.guest')
@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- SECCIÓN PRINCIPAL: Quiénes somos + Visión/Misión -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start bg-white p-6 sm:p-10 rounded-2xl shadow-xl border border-gray-100">
        
        <!-- Columna Izquierda: Sobre Nosotros -->
        <div class="space-y-4">
            <h2 class="text-3xl font-extrabold text-gray-900 border-b-2 border-green-500 pb-2 inline-block">
                Sobre Nosotros
            </h2>
            <p class="text-gray-700 leading-relaxed text-base sm:text-lg">
                Como empresa agropecuaria contamos con una amplia experiencia en la producción de ganado bovino, principalmente en la producción de carne, procurando la excelencia en cuanto a producto terminado. Nos basamos en producir conservando la naturaleza, utilizando el Pastoreo Voisin para aumentar la eficiencia productiva y mejorar los suelos. 
            </p>
            <p class="text-gray-700 leading-relaxed text-base sm:text-lg">
                Utilizamos energía solar para nuestros bombeos, reduciendo a casi cero el uso de combustibles fósiles. También hacemos uso de aguadas en cada parcela, maximizando el consumo de agua fresca de excelente calidad. Nuestro lema es producir nuestro propio biofertilizante y no usar agroquímicos. 
            </p>
            <p class="text-gray-700 leading-relaxed text-base sm:text-lg">
                Nuestra genética se basa en cruzar nuestras vacas madres británicas con genética masculina Limousin, mediante el protocolo LIMFLEX. Es así que también disponemos de nuestra propia Cabaña Limousin con la mejor genética de Argentina.
            </p>
        </div>

        <!-- Columna Derecha: Visión, Misión y Filosofía -->
        <div class="space-y-6 bg-slate-50 p-6 rounded-xl border border-slate-200">
            <!-- Visión -->
            <div>
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-2">
                    <span>🌍</span> Nuestra Visión
                </h3>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Generar valor respetando la naturaleza, reduciendo la huella de carbono y el impacto ambiental.
                </p>
            </div>

            <hr class="border-slate-200">

            <!-- Misión -->
            <div>
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-2">
                    <span>🎯</span> Nuestra Misión
                </h3>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Brindar productos y soluciones de calidad, garantizando satisfacción y generando un impacto positivo en el sector.
                </p>
            </div>

            <hr class="border-slate-200">

            <!-- Filosofía -->
            <div>
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2 mb-2">
                    <span>💡</span> Filosofía
                </h3>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Creemos en la honestidad, la transparencia y el compromiso con el crecimiento sostenible de nuestro entorno.
                </p>
            </div>
        </div>

    </div>

    <!-- SECCIÓN SECUNDARIA: Tarjetas de Enfoque y Producción -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Tarjeta 1 -->
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 flex flex-col justify-between hover:shadow-2xl transition-shadow">
            <h4 class="text-xl font-bold text-blue-600 mb-3">Enfoque y Tecnología</h4>
            <p class="text-gray-700 font-montserrat text-base leading-relaxed">
                En el desarrollo de una amplia experiencia en el engorde de ganado bovino bajo sistema pastoril rotativo y suplementación controlada, buscamos la excelencia en la producción agropecuaria a través de la puesta en práctica de tecnologías existentes, la innovación constante y la experimentación.
            </p>
        </div>

        <!-- Tarjeta 2 -->
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 flex flex-col justify-between hover:shadow-2xl transition-shadow">
            <h4 class="text-xl font-bold text-blue-600 mb-3">Integración Regional</h4>
            <p class="text-gray-700 font-montserrat text-base leading-relaxed">
                Nuestra filosofía de producción se basa en la integración horizontal con otras empresas de la región, lo que nos permite optimizar no solo los recursos de producción sino también los recursos tecnológicos y la experiencia de cada una de las partes en sus respectivos campos de acción.
            </p>
        </div>

    </div>

</div>
@endsection
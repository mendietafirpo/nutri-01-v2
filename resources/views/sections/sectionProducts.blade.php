@section('content')
<section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <aside class="block items-center justify-center shadow-2xl w-full rounded-lg p-2 mt-8 ml-6">
                <div class="justify-items-center">
                    <h2 class="text-center text-2xl font-bold text-green-800 mb-4">COMEDERO AUTOMATICO NUTRITRONIX®</h2>
                    <img
                        id="modalImage"
                        src="{{ asset('storage\uploads\product_image_1.webp') }}" 
                        alt=""
                        class="items-center justify-center w-1/2 ml-6 pl-12"
                    >
                </div>
                <!-- Miniaturas en Modal -->
                <div class="text-center bottom-4 left-0 right-0 pt-6">
                    <div class="flex justify-center space-x-2">
                        <div class="cursor-pointer border-2 border-transparent rounded" onclick="setImage(0)">
                            <img src="{{ asset('storage\uploads\product_image_1.webp') }}" class="w-16 h-12 object-cover thumbnail-modal" data-index="0">
                        </div>
                        <div class="cursor-pointer border-2 border-transparent rounded" onclick="setImage(1)">
                            <img src="{{ asset('storage\uploads\product_image_2.webp') }}" class="w-16 h-12 object-cover thumbnail-modal" data-index="1">
                        </div>
                        <div class="cursor-pointer border-2 border-transparent rounded" onclick="setImage(2)">
                            <img src="{{ asset('storage\uploads\product_image_3.webp') }}" class="w-16 h-12 object-cover thumbnail-modal" data-index="2">
                        </div>
                        <div class="cursor-pointer border-2 border-transparent rounded" onclick="setImage(3)">
                            <img src="{{ asset('storage\uploads\product_image_4.webp') }}" class="w-16 h-12 object-cover thumbnail-modal" data-index="3">
                        </div>
                    </div>
                </div>

            </aside>

            <!-- Grid de Contenido - 3 columnas-->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4  mt-12">
                <!-- Columna Izquierda - Información del Producto -->
                <div class="lg:col-span-2">
                    <!-- Prestaciones -->
                    <div class="m-8">
                        <h2 class="text-2xl font-bold text-green-800 mb-4">Prestaciones</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Automatización y entrega precisa de raciones para ganado bovino</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Sensores meteorológico y registro de datos</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Microprocesador incorporado, conexión a la nube y alimentación solar</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Estructura resistente, movil y adapta a condiciones de interperie</span>
                            </div>
                        </div>
                    </div>
                <!-- Descripción -->
                    <div class="m-8 pt-8">
                        <h2 class="text-2xl font-bold text-green-800 mb-4">Descripción del Producto</h2>
                        <p class="text-xl font-bold text-gray-700">
                         COMEDERO ROBOTIZADO  PARA ENTREGAS MULTIPLES, SOLAR ELECTRONICO Y PROGRAMABLE </p>
                         <p class="pt-4">  • Diseñado para cumplir un programa alimenticio de múltiples entregas </p>
                         <p class="pt-4">  • Número de raciones regulable entre 2 y 12, se dispensa generalmente entre 4 a 7 raciones diarias, </p>
                         <p class="pt-4">  • Antes de cada suministro, el equipo dispara 60 segundos una sirena que avisa a la tropa, aprovechando el reflejo condicionado de 
                            Pavlov </p>
                         <p class="pt-4">  • Se temporiza cada 60 segundos antes de entregar la comida, el animal come racionado, el suministro se hace mediante energía solar</p>
                         <p class="pt-4">  • Volumen de comida regulable en amplios márgenes, Horarios de cada comida regulables, frente de bandejas de 12,60 metros en cuatro bandejas,</p>   
                         <p class="pt-4">  • Autonomía para 20 a 24 cabezas vacunas durante 7 a 14 días, autonomía de baterías para 8 a 14 días nublados consecutivos </p>
                         <p class="pt-4">  • Movible por un tractor pequeño o camioneta 4*4, regulable por Comando Bluetooth desde un celular.</p>

                    </div>



                    <!-- Especificaciones Técnicas -->
                    <div class="mb-8pt-8">
                        <h2 class="text-2xl font-bold text-green-800 mb-4 ml-6">Especificaciones Técnicas</h2>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h3 class="font-semibold text-gray-800 py-2">Modelo</h3>
                                    <p class="text-gray-600">NUTRITRONIX® 001</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 py-2">Dimensiones y peso</h3>
                                    <p class="text-gray-600">3 x 2 metros, 250?? kg peso a vacío </p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 py-2">Capacidad en cabezas</h3>
                                    <p class="text-gray-600">20 a 24 cabezas</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 py-2">Capacidad almacenaje</h3>
                                    <p class="text-gray-600">Tolva 300 lts, 200 kg ??</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 py-2">Otras especificaciones ??</h3>
                                    <p class="text-gray-600">5</p>
                                </div>
                                <!--<div>
                                    <h3 class="font-semibold text-gray-800">Otras</h3>
                                    <p class="text-gray-600">3 x 2</p>
                                </div> -->

                            </div>
                        </div>
                    </div>
            </div>

    </div>
        <!-- Llamada a la acción -->
    <div>
        <div class="mt-12 text-center">
            <div class="bg-green-50 rounded-lg p-8">
                <h3 class="text-2xl font-bold text-green-800 mb-4">¿Interesado en nuestro producto?</h3>
                <p class="text-gray-700 mb-6">Contáctanos para más información y cotizaciones</p>
                <a href="{{ url('/contacts') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    Solicitar Cotización
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Modal de Galería -->
<script>
    // Configuración de la galería
    const galleryImages = [
        {
            src: "{{ asset('storage/uploads/product_image_1.webp') }}",
            alt: "Maíz de alta calidad - Vista principal"
        },
        {
            src: "{{ asset('storage/uploads/product_image_2.webp') }}",
            alt: "Maíz de alta calidad - Campo de cultivo"
        },
        {
            src: "{{ asset('storage/uploads/product_image_3.webp') }}",
            alt: "Maíz de alta calidad - Proceso de cosecha"
        },
        {
            src: "{{ asset('storage/uploads/product_image_4.webp') }}",
            alt: "Maíz de alta calidad - Producto final"
        }
    ];

    let currentImageIndex = 0;

    function openModal() {
        const modal = document.getElementById('galleryModal');
        currentImageIndex = 0;
        setImage(currentImageIndex);
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('galleryModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function changeImage(direction) {
        currentImageIndex += direction;
        
        if (currentImageIndex < 0) {
            currentImageIndex = galleryImages.length - 1;
        } else if (currentImageIndex >= galleryImages.length) {
            currentImageIndex = 0;
        }
        
        setImage(currentImageIndex);
    }

    function setImage(index) {
        currentImageIndex = index;
        const modalImage = document.getElementById('modalImage');
        const imageData = galleryImages[index];
        
        modalImage.src = imageData.src;
        modalImage.alt = imageData.alt;
        
        // Actualizar miniaturas activas
        document.querySelectorAll('.thumbnail-modal').forEach((thumb, i) => {
            if (i === index) {
                thumb.parentElement.classList.add('border-white', 'border-2');
            } else {
                thumb.parentElement.classList.remove('border-white', 'border-2');
            }
        });
    }

    // Cerrar modal con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        } else if (e.key === 'ArrowLeft') {
            changeImage(-1);
        } else if (e.key === 'ArrowRight') {
            changeImage(1);
        }
    });

    // Cerrar modal al hacer click fuera de la imagen
    document.getElementById('galleryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    </script>

    <style>
    .thumbnail-modal {
        transition: transform 0.2s ease;
    }

    .thumbnail-modal:hover {
        transform: scale(1.1);
    }

    #galleryModal {
        backdrop-filter: blur(5px);
    }
</style>
@endsection

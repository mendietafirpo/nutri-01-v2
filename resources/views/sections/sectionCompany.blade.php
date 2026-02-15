@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Sección Nosotros -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Columna Izquierda: Texto -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Sobre Nosotros</h2>
            <!--DINAMIC TEXT 1-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['company_description_1']))
                        <p class="text-gray-700 mt-2">{!! $descriptions['company_description_1'] !!}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1)
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['company_description_1']) }}' }" 
                            x-show="editing" 
                            x-cloak
                            x-init="$nextTick(() => $refs.trix.editor.loadHTML(newDescription))"
                            class="mt-2"
                            >
                            <input id="company_description_1" type="hidden" x-model="newDescription">
                            <trix-editor input="company_description_1" x-ref="trix" @trix-change="newDescription = $event.target.value"></trix-editor>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="company_description_1" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div> 

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700 py-4">🌍 Nuestra Visión</h3>
                <p class="text-gray-600">
                    Generar valor respetando la naturaleza, reduciendo la huella de carbono y el impacto ambiental. 
                </p>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700 py-4">🎯 Nuestra Misión</h3>
                <p class="text-gray-600">
                    Brindar productos y soluciones de calidad, garantizando satisfacción y generando un impacto positivo en el sector.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-700 py-4">💡 Filosofía</h3>
                <p class="text-gray-600">
                    Creemos en la honestidad, la transparencia y el compromiso con el crecimiento sostenible de nuestro entorno.
                </p>
            </div>
        </div>

        <!-- Columna Derecha: Imágenes -->
        <div class="grid grid-cols-2 gap-4">
            <div class="rounded-lg shadow-lg text-xl font-montserrat text-fuchsia-600 p-2"> 
                <!--DINAMIC TEXT 2 -->
                <div x-data="{ editing: false }">
                    <!--dinamic text-->
                    <div x-show="!editing">
                        @if(isset($descriptions['company_description_2']))
                            <p class="mt-2">{!! $descriptions['company_description_2'] !!}</p>
                        @else
                            <p class="text-red-500">texto no disponible</p>
                        @endif
                    </div>
                    <!--editing text-->
                    @auth
                        @if(auth()->user()->role === 1)
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>
                            <!--edition-->
                            <div x-data="{ newDescription: '{{ addslashes($descriptions['company_description_2']) }}' }" 
                                x-show="editing" 
                                x-cloak
                                x-init="$nextTick(() => $refs.trix.editor.loadHTML(newDescription))"
                                class="mt-2"
                                >
                                <input id="company_description_2" type="hidden" x-model="newDescription">
                                <trix-editor input="company_description_1" x-ref="trix" @trix-change="newDescription = $event.target.value"></trix-editor>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                        ❌
                                    </button>
                                    <button onclick="saveDesign(this)" data-key="company_description_2" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                    ✔️
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="rounded-lg shadow-lg text-xl font-montserrat text-fuchsia-600 p-2">
                <!--DINAMIC TEXT 3-->
                <div x-data="{ editing: false }">
                    <!--dinamic text-->
                    <div x-show="!editing">
                        @if(isset($descriptions['company_description_3']))
                            <p class="mt-2">{!! $descriptions['company_description_3'] !!}</p>
                        @else
                            <p class="text-red-500">texto no disponible</p>
                        @endif
                    </div>
                    <!--editing text-->
                    @auth
                        @if(auth()->user()->role === 1)
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>
                            <!--edition-->
                            <div x-data="{ newDescription: '{{ addslashes($descriptions['company_description_3']) }}' }" 
                                x-show="editing" 
                                x-cloak
                                x-init="$nextTick(() => $refs.trix.editor.loadHTML(newDescription))"
                                class="mt-2"
                                >
                                <input id="company_description_3" type="hidden" x-model="newDescription">
                                <trix-editor input="company_description_1" x-ref="trix" @trix-change="newDescription = $event.target.value"></trix-editor>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                        ❌
                                    </button>
                                    <button onclick="saveDesign(this)" data-key="company_description_3" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                    ✔️
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/designs.js') }}"></script>

@endsection

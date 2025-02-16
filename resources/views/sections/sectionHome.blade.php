@section('content')
<div class="mx-auto px-2 py-2 bg-slate-200 justify-center w-screen">
    <div class="grid grid-cols-2 bg-slate-100 md:grid-cols-2 gap-8 shadow-lg w-full rounded-lg p-6">
        <!-- Video Section -->
        <div class="video-container">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/B6kkTl5I_oA" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
            </iframe>
        </div>

        <!-- Description Section -->
        <div class="grid grid-cols-2 gap-6  bg-slate-100 rounded-md text-gray-800 px-4 py-4">
            <!-- Title -->
            @if(isset($descriptions['home_title_1']))
                <div class="col-start-1" x-data="{
                        editing: false, 
                        newDescription: '{{ addslashes($descriptions['home_title_1']) }}', 
                        saveDescription() {
                            fetch(`{{ route('update.description', 'home_title_1') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ value: this.newDescription })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.editing = false;
                                    alert('Título guardado correctamente.');
                                } else {
                                    alert('Error al guardar.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        }
                    }">
                    <h2 class="text-lg font-bold" x-show="!editing" x-text="newDescription"></h2>

                    @auth
                        @if(auth()->user()->role === 1)
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>

                            <div x-show="editing" class="mt-2">
                                <textarea x-model="newDescription" class="border rounded w-full p-2"></textarea>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded">Cancelar</button>
                                    <button @click="saveDescription()" class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Description -->
            @if(isset($descriptions['home_description_1']))
                <div class="col-start-1" x-data="{
                        editing: false, 
                        newDescription: '{{ addslashes($descriptions['home_description_1']) }}', 
                        saveDescription() {
                            fetch(`{{ route('update.description', 'home_description_1') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ value: this.newDescription })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.editing = false;
                                    alert('Descripción guardada correctamente.');
                                } else {
                                    alert('Error al guardar.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        }
                    }">
                    <p x-show="!editing" x-text="newDescription"></p>

                    @auth
                        @if(auth()->user()->role === 1)
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>

                            <div x-show="editing" class="mt-2">
                                <textarea x-model="newDescription" class="border rounded w-full p-2"></textarea>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded">Cancelar</button>
                                    <button @click="saveDescription()" class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif

            <!--end description edition-->
            <div>
            @if(isset($descriptions['home_title_2']))
                <div class="col-start-1" x-data="{
                        editing: false, 
                        newDescription: '{{ addslashes($descriptions['home_title_1']) }}', 
                        saveDescription() {
                            fetch(`{{ route('update.description', 'home_title_1') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ value: this.newDescription })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.editing = false;
                                    alert('Título guardado correctamente.');
                                } else {
                                    alert('Error al guardar.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        }
                    }">
                    <h2 class="text-lg font-bold" x-show="!editing" x-text="newDescription"></h2>

                    @auth
                        @if(auth()->user()->role === 1)
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>

                            <div x-show="editing" class="mt-2">
                                <textarea x-model="newDescription" class="border rounded w-full p-2"></textarea>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded">Cancelar</button>
                                    <button @click="saveDescription()" class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Description -->
            @if(isset($descriptions['home_description_2']))
                <div class="col-start-1" x-data="{
                        editing: false, 
                        newDescription: '{{ addslashes($descriptions['home_description_1']) }}', 
                        saveDescription() {
                            fetch(`{{ route('update.description', 'home_description_1') }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ value: this.newDescription })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.editing = false;
                                    alert('Descripción guardada correctamente.');
                                } else {
                                    alert('Error al guardar.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        }
                    }">
                    <p x-show="!editing" x-text="newDescription"></p>

                    @auth
                        @if(auth()->user()->role === 1)
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>

                            <div x-show="editing" class="mt-2">
                                <textarea x-model="newDescription" class="border rounded w-full p-2"></textarea>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded">Cancelar</button>
                                    <button @click="saveDescription()" class="bg-blue-500 text-white px-3 py-1 rounded">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        <div class="image-container bg-slate-400 p-4 rounded">
            <img src="path/to/image1.jpg" alt="Descripción de la imagen 1" class="w-full h-auto rounded">
            <p class="text-white mt-2">Breve descripción de la imagen 1</p>
        </div>
        <div class="image-container bg-slate-400 p-4 rounded">
            <img src="path/to/image2.jpg" alt="Descripción de la imagen 2" class="w-full h-auto rounded">
            <p class="text-white mt-2">Breve descripción de la imagen 2</p>
        </div>
        <div class="image-container bg-slate-400 p-4 rounded">
            <img src="path/to/image3.jpg" alt="Descripción de la imagen 3" class="w-full h-auto rounded">
            <p class="text-white mt-2">Breve descripción de la imagen 3</p>
        </div>
    </div>
        <!-- Image Grid Section 2 -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        <div class="image-container bg-slate-400 p-4 rounded">
            <img src="path/to/image1.jpg" alt="Descripción de la imagen 1" class="w-full h-auto rounded">
            <p class="text-white mt-2">Breve descripción de la imagen 1</p>
        </div>
        <div class="image-container bg-slate-400 p-4 rounded">
            <img src="path/to/image2.jpg" alt="Descripción de la imagen 2" class="w-full h-auto rounded">
            <p class="text-white mt-2">Breve descripción de la imagen 2</p>
        </div>
        <div class="image-container bg-slate-400 p-4 rounded">
            <img src="path/to/image3.jpg" alt="Descripción de la imagen 3" class="w-full h-auto rounded">
            <p class="text-white mt-2">Breve descripción de la imagen 3</p>
        </div>
        <!--prueba color-->
        <div>
            <div class="p-4 border rounded-md">
                <input id="home_color_2" type="color" class="w-16 h-8 cursor-pointer border rounded">
                <button onclick="saveColor(this)" data-key="home_color_2" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Guardar Color
                </button>

                <div style="background-color: {{ $colors['home_color_2'] }};">
                    Contenido aquí
                </div>
                <div><button onclick="saveConfig(this)" data-color="#ff0000" data-key="Admin">Guardar Configuración</button></div>
            </div>
        </div>
            <!--prueba texto diramico-->
            @if(isset($descriptions['home_description_3']))
                <p>{{ $descriptions['home_description_3'] }}</p>
            @else
                <p class="text-red-500">texto no disponible</p>
            @endif
    </div>
</div>

<script src="{{ asset('js/designs.js') }}"></script>

@endsection

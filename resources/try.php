    <!-- Image Grid Section -->
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
    </div>


    <!--end description edition-->
    <div>
        <p>two column </p>
        <h2 class="text-2xl font-bold mb-4">Novedades</h2>
        <p class="text-lg">Aquí incluir algún texto que sirva como .</p>
    </div>


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
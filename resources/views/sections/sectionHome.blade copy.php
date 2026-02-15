@section('content')
<body class="mx-auto px-2 w-screen" style="background-color: {{ $colors['home_color_1'] }};">
    <section class="grid grid-cols-1 sm:grid-cols-2 gap-2 shadow-2xl w-full rounded-lg p-2 mt-8" style="background-color: {{ $colors['home_color_1'] }};">
        <!-- Video Section column 1-->
        <aside class="lg:rounded-l-md rounded-md bg-slate-600 justify-items-center">
            @php
                $videoName = 'home_video_1';
                $extensions = ['mp4', 'avi', 'mov', 'webm'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/videos/{$videoName}.{$ext}"))) {
                        $imagePath = asset("storage/videos/{$videoName}.{$ext}");
                        break;
                    }
                }
            @endphp
            <video width="640" height="360" controls class="p-4">
                @if($imagePath)
                    <source src="{{ $imagePath }}" type="video/mp4">
                @else
                    <p>Imagen no encontrada</p>
                @endif
            </video>
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data" class="bg-purple-400 rounded-md">
                    @csrf
                    <input hidden type="text" name="video_name" id="video-name" value="home_video_1.mp4" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Ej: mi_video" required>

                    <label for="video" class="block text-sm font-medium text-gray-700 mt-4">Selecciona un video (.mp4):</label>
                    <input type="file" name="video" id="video" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" accept="video/mp4,video/avi,video/mov,video/webm">

                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                @endif
            @endauth
        </aside>
        <!-- Description video, colmn 2 -->
        <aside class="text-gray-800 ml-8 mr-3 lg:rounded-r-md rounded-md" style="background-color: {{ $colors['home_color_2'] }};">
            <div class="col-start-1 mt-8">
                <!--title-->
                <div x-data="{ editing: false }" class="mt-8 ml-4">
                    <div x-show="!editing">
                        @if(isset($descriptions['home_title_1']))
                            <p class="font-bold text-lg">{{ $descriptions['home_title_1'] }}</p>
                        @else
                            <p class="text-red-500">texto no disponible</p>
                        @endif
                    </div>
                        @auth
                            @if(auth()->user()->role === 1  & session('editMode') === 'true')
                                <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                    ✏️ Edit
                                </button>
                                <!--edition-->
                                <div x-data="{ newDescription: '{{ addslashes($descriptions['home_title_1']) }}' }" x-show="editing" x-cloak class="mt-2">
                                    <textarea id="home_title_1" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                                    <div class="flex justify-end space-x-2 mt-2">
                                        <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                            ❌
                                        </button>
                                        <button onclick="saveDesign(this)" data-key="home_title_1" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                        ✔️
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endauth
                </div> 
                <div x-data="{ editing: false }" class="px-4 mt-4">
                    <!--dinamic text-->
                    <div x-show="!editing">
                        @if(isset($descriptions['home_description_1']))
                            <p>{{ $descriptions['home_description_1'] }}</p>
                        @else
                            <p class="text-red-500">texto no disponible</p>
                        @endif
                    </div>
                    <!--editing text-->
                    @auth
                        @if(auth()->user()->role === 1  & session('editMode') === 'true')
                            <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                                ✏️ Edit
                            </button>
                            <!--edition-->
                            <div x-data="{ newDescription: '{{ addslashes($descriptions['home_description_1']) }}' }" x-show="editing" x-cloak class="mt-2">
                                <textarea id="home_description_1" x-model="newDescription" x-cloak class="border rounded w-full p-2"></textarea>
                                <div class="flex justify-end space-x-2 mt-2">
                                    <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                        ❌
                                    </button>
                                    <button onclick="saveDesign(this)" data-key="home_description_1" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                    ✔️
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </aside>
    </section>
    <!-- IMAGE GRID SECTION 1 -->
    <aside class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 p-4">
        <!--BLOCK IMAGEN 1-->
        <div class="image-container bg-slate-400 p-4 rounded shadow-2xl" style="background-color: {{ $colors['home_color_3'] }};">
            @php
                $imageName = 'home_image_1';
                $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/uploads/{$imageName}.{$ext}"))) {
                        $imagePath = asset("storage/uploads/{$imageName}.{$ext}");
                        break;
                    }
                }
            @endphp            
            @if($imagePath)
                <img src="{{ $imagePath }}" alt="Imagen" class="w-full h-auto rounded">
            @else
                <p>Imagen no encontrada</p>
            @endif

            <!--load new image-->
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="text" name="image_name" value="home_image_1" id="image-name" hidden required>
                    <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Vista previa:</h3>
                    <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
                </div>
                @endif
            @endauth
            <!--DINAMIC TEXT 1-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['home_imagetext_1']))
                        <p class="text-gray-700 mt-2">{{ $descriptions['home_imagetext_1'] }}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1 & session('editMode') === 'true')
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['home_imagetext_1']) }}' }" x-show="editing" x-cloak class="mt-2">
                            <textarea id="home_imagetext_1" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="home_imagetext_1" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div> 
        </div>
        <!--BLOCK IMAGEN 2-->
        <div class="image-container bg-slate-400 p-4 rounded shadow-2xl" style="background-color: {{ $colors['home_color_3'] }};">
            @php
                $imageName = 'home_image_2';
                $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/uploads/{$imageName}.{$ext}"))) {
                        $imagePath = asset("storage/uploads/{$imageName}.{$ext}");
                        break;
                    }
                }
            @endphp            
            @if($imagePath)
                <img src="{{ $imagePath }}" alt="Imagen" class="w-full h-auto rounded">
            @else
                <p>Imagen no encontrada</p>
            @endif
            <!--load new image-->
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="text" name="image_name" value="home_image_2" id="image-name" hidden required>
                    <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Vista previa:</h3>
                    <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
                </div>
                @endif
            @endauth
            <!--DINAMIC TEXT 2-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['home_imagetext_2']))
                        <p class="text-gray-700 mt-2">{{ $descriptions['home_imagetext_2'] }}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1 & session('editMode') === 'true')
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['home_imagetext_2']) }}' }" x-show="editing" x-cloak class="mt-2">
                            <textarea id="home_imagetext_2" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="home_imagetext_2" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div> 
        </div>
        <!--BLOCK IMAGEN 3-->
        <div class="image-container bg-slate-400 p-4 rounded shadow-2xl" style="background-color: {{ $colors['home_color_3'] }};">
            @php
                $imageName = 'home_image_3';
                $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/uploads/{$imageName}.{$ext}"))) {
                        $imagePath = asset("storage/uploads/{$imageName}.{$ext}");
                        break;
                    }
                }
            @endphp            
            @if($imagePath)
                <img src="{{ $imagePath }}" alt="Imagen" class="w-full h-auto rounded">
            @else
                <p>Imagen no encontrada</p>
            @endif
            <!--load new image-->
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="text" name="image_name" value="home_image_3" id="image-name" hidden required>
                    <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                <div class="mt-4">
                <h3 class="text-lg font-semibold">Vista previa:</h3>
                    <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
                </div>
                @endif
            @endauth
            <!--DINAMIC TEXT 3-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['home_imagetext_3']))
                        <p class="text-gray-700 mt-2">{{ $descriptions['home_imagetext_3'] }}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1 & session('editMode') === 'true')
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['home_imagetext_3']) }}' }" x-show="editing" x-cloak class="mt-2">
                            <textarea id="home_imagetext_3" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="home_imagetext_3" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                @endauth
            </div> 
        </div>
    </aside>
    <!-- Image Grid Section 2 -->
    <aside class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 p-4">
        <!--BLOCK IMAGEN 4-->
        <div class="image-container bg-slate-400 p-4 rounded shadow-2xl"  style="background-color: {{ $colors['home_color_3'] }};">
            @php
                $imageName = 'home_image_4';
                $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/uploads/{$imageName}.{$ext}"))) {
                        $imagePath = asset("storage/uploads/{$imageName}.{$ext}");
                        break;
                    }
                }
            @endphp            
            @if($imagePath)
                <img src="{{ $imagePath }}" alt="Imagen" class="w-full h-auto rounded">
            @else
                <p>Imagen no encontrada</p>
            @endif
            <!--load new image-->
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="text" name="image_name" value="home_image_4" id="image-name" hidden required>
                    <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                <div class="mt-4">
                <h3 class="text-lg font-semibold">Vista previa:</h3>
                    <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
                </div>
                @endif
            @endauth
            <!--DINAMIC TEXT 4-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['home_imagetext_4']))
                        <p class="text-gray-700 mt-2">{{ $descriptions['home_imagetext_4'] }}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1 & session('editMode') === 'true')
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['home_imagetext_4']) }}' }" x-show="editing" x-cloak class="mt-2">
                            <textarea id="home_imagetext_4" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="home_imagetext_4" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div> 
        </div>
        <!--BLOCK IMAGEN 5-->
        <div class="image-container bg-slate-400 p-4 rounded shadow-2xl"  style="background-color: {{ $colors['home_color_3'] }};">
            @php
                $imageName = 'home_image_5';
                $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/uploads/{$imageName}.{$ext}"))) {
                        $imagePath = asset("storage/uploads/{$imageName}.{$ext}");
                        break;
                    }
                }
            @endphp            
            @if($imagePath)
                <img src="{{ $imagePath }}" alt="Imagen" class="w-full h-auto rounded">
            @else
                <p>Imagen no encontrada</p>
            @endif
            <!--load new image-->
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="text" name="image_name" value="home_image_5" id="image-name" hidden required>
                    <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                <div class="mt-4">
                <h3 class="text-lg font-semibold">Vista previa:</h3>
                    <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
                </div>
                @endif
            @endauth
            <!--DINAMIC TEXT 5-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['home_imagetext_5']))
                        <p class="text-gray-700 mt-2">{{ $descriptions['home_imagetext_5'] }}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1 & session('editMode') === 'true')
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['home_imagetext_5']) }}' }" x-show="editing" x-cloak class="mt-2">
                            <textarea id="home_imagetext_5" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="home_imagetext_5" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div> 
        </div>
        <!--BLOCK IMAGEN 6-->
        <div class="image-container bg-slate-400 p-4 rounded shadow-2xl"  style="background-color: {{ $colors['home_color_3'] }};">
            @php
                $imageName = 'home_image_6';
                $extensions = ['jpg', 'jpeg', 'png', 'webp'];
                $imagePath = null;

                foreach ($extensions as $ext) {
                    if (file_exists(public_path("storage/uploads/{$imageName}.{$ext}"))) {
                        $imagePath = asset("storage/uploads/{$imageName}.{$ext}");
                        break;
                    }
                }
            @endphp            
            @if($imagePath)
                <img src="{{ $imagePath }}" alt="Imagen" class="w-full h-auto rounded">
            @else
                <p>Imagen no encontrada</p>
            @endif
            <!--load new image-->
            @auth
                @if(auth()->user()->role === 1 & session('editMode') === 'true')
                <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                    @csrf
                    <input type="text" name="image_name" value="home_image_6" id="image-name" hidden required>
                    <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
                </form>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Vista previa:</h3>
                    <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
                </div>
                @endif
            @endauth
            <!--DINAMIC TEXT 6-->
            <div x-data="{ editing: false }" class="col-start-2 mt-8">
                <!--dinamic text-->
                <div x-show="!editing">
                    @if(isset($descriptions['home_imagetext_6']))
                        <p class="text-gray-700 mt-2">{{ $descriptions['home_imagetext_6'] }}</p>
                    @else
                        <p class="text-red-500">texto no disponible</p>
                    @endif
                </div>
                <!--editing text-->
                @auth
                    @if(auth()->user()->role === 1 & session('editMode') === 'true')
                        <button @click="editing = true" class="text-gray-400 px-3 py-1 rounded text-sm hover:text-red-700">
                            ✏️ Edit
                        </button>
                        <!--edition-->
                        <div x-data="{ newDescription: '{{ addslashes($descriptions['home_imagetext_6']) }}' }" x-show="editing" x-cloak class="mt-2">
                            <textarea id="home_imagetext_6" x-model="newDescription" class="border rounded w-full p-2"></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button @click="editing = false" class="bg-gray-300 px-3 py-1 rounded text-sm">
                                    ❌
                                </button>
                                <button onclick="saveDesign(this)" data-key="home_imagetext_6" @click="editing = false" class="bg-green-200 text-white px-3 py-1 rounded text-sm">
                                ✔️
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div> 
        </div>
    </aside>
    <!--editing color-->
    @auth
        @if(auth()->user()->role === 1 & session('editMode') === 'true')
            <div class="grid grid-cols-1 bg-white gap-4 p-8">
                <div class="col-start-1" style="background-color: {{ $colors['home_color_1'] }};">
                    <color class="flex justify-end">
                        <p>color bg 1</p>
                        <input id="home_color_1" type="color" class="w-16 h-8 cursor-pointer border rounded">
                        <button onclick="saveDesign(this)" data-key="home_color_1" class="bg-gray-400 text-white p-2 mb-2 rounded text-sm shadow-sm">
                            ✔️
                        </button>
                    </color>
                </div>
                <div class="col-start-1" style="background-color: {{ $colors['home_color_2'] }};">
                    <color class="flex justify-end">
                        <p>color bg 2</p>
                        <input id="home_color_2" type="color" class="w-16 h-8 cursor-pointer border rounded">
                        <button onclick="saveDesign(this)" data-key="home_color_2" class="bg-gray-400 text-white p-2 mb-2 rounded text-sm shadow-sm">
                            ✔️
                        </button>
                    </color>
                </div>
                <div class="col-start-1" style="background-color: {{ $colors['home_color_3'] }};">
                    <color class="flex justify-end">
                        <p>color bg 3</p>
                        <input id="home_color_3" type="color" class="w-16 h-8 cursor-pointer border rounded">
                        <button onclick="saveDesign(this)" data-key="home_color_3" class="bg-gray-400 text-white p-2 mb-2 rounded text-sm shadow-sm">
                            ✔️
                        </button>
                    </color>
                </div>
            </div>
        @endif
    @endauth

    
    @auth
        @if(auth()->user()->role === 1)
        <form id="formEditMode" action="{{ route('home.editmode') }}" method="POST" class="ml-4 bg-blue-400 rounded-md text-black w-72 p-2">
            @csrf
                <label for="editMode">Edit Mode</label>
                <select id="editMode" type="text" title="edit mode" onchange="this.form.submit()" name="editMode" class="form-multiselect rounded-md h-9 mx-4 w-40">
                    <option value="false" {{ session('editMode') == 'false' ? 'selected' : '' }}>False</option>
                    <option value="true" {{ session('editMode') == 'true' ? 'selected' : '' }}>True</option>
                </select>
        </form>
        @endif
    @endauth
</body>

<script src="{{ asset('js/designs.js') }}"></script>
@endsection

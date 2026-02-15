<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/trix.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
            <!--DINAMIC TEXT 6-->
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
     
    <script src="{{ asset('js/trix.js') }}"></script>
    <script src="{{ asset('js/attachments.js') }}"></script>
    <script src="{{ asset('js/designs.js') }}"></script>
</body>
</html>
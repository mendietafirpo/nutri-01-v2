<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Subir Imagen</h2>
        <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data" id="upload-form">
            @csrf
            <input type="file" name="image" id="image-input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subir</button>
        </form>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Vista previa:</h3>
            <img id="preview" class="mt-2 w-full rounded-lg shadow-sm hidden">
        </div>
    </div>

    <script>
        document.getElementById('image-input').addEventListener('change', function(event) {
            let reader = new FileReader();
            reader.onload = function(){
                let preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</body>
</html>

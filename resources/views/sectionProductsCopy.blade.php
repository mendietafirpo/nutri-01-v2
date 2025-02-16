@section('content')
<div class="mx-auto px-2 py-2 bg-slate-200 justify-center w-screen">
    <div class="grid grid-cols-1 bg-slate-100 md:grid-cols-2 gap-8 shadow-lg w-full rounded-lg p-6">
        <!-- Video Section -->
        <div class="video-container">
            <div class="video-container">
                <iframe width="640" height="360" src="https://www.youtube.com/embed/B6kkTl5I_oA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <!-- Description Section -->
        <div class="bg-slate-100 rounded-md text-gray-800 px-4 py-4">
            <div class="grid grid-cols-2">
                <div>
                    <p>one column </p>
                    <h2 class="text-2xl font-bold mb-4">Descripción del Video</h2>
                    <p class="text-lg">Aquí va una breve descripción del video. Puedes agregar más detalles sobre el contenido del video y cualquier otra información relevante.</p>
                </div>
                <div>
                    <p>two column </p>
                    <h2 class="text-2xl font-bold mb-4">Novedades</h2>
                    <p class="text-lg">Aquí incluir algún texto que sirva como .</p>
                </div>
            </div>
        </div>
    </div>
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
</div>
@endsection

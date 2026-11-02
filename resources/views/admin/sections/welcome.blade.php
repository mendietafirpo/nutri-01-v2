<body class="bg-slate-100 min-h-screen p-4 sm:p-8 font-sans antialiased">

    <main class="max-w-3xl mx-auto bg-white p-6 sm:p-10 rounded-2xl shadow-lg border border-slate-200">

        <!-- Encabezado -->
        <header class="mb-8 pb-6 border-b border-slate-200">
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Panel de administración</h1>
            <p class="mt-1 text-sm sm:text-base text-slate-600">Selecciona el módulo que deseas gestionar.</p>
        </header>

        <!-- Opciones -->
        <section class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

            <button onclick="saveView(this)" data-valor="2"
                class="group flex flex-col items-start gap-3 text-left p-5 rounded-xl border border-slate-200 bg-white shadow-sm
                       hover:border-purple-500 hover:bg-purple-50 hover:shadow-md
                       focus:outline-none focus-visible:ring-2 focus-visible:ring-purple-600 focus-visible:ring-offset-2
                       active:scale-[0.98] transition-all duration-200">
                <span class="flex items-center justify-center w-11 h-11 rounded-lg bg-purple-100 text-purple-700 text-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">👥</span>
                <span class="text-base sm:text-lg font-semibold text-slate-800">Administrar usuarios</span>
            </button>

            <button onclick="saveView(this)" data-valor="3"
                class="group flex flex-col items-start gap-3 text-left p-5 rounded-xl border border-slate-200 bg-white shadow-sm
                       hover:border-purple-500 hover:bg-purple-50 hover:shadow-md
                       focus:outline-none focus-visible:ring-2 focus-visible:ring-purple-600 focus-visible:ring-offset-2
                       active:scale-[0.98] transition-all duration-200">
                <span class="flex items-center justify-center w-11 h-11 rounded-lg bg-purple-100 text-purple-700 text-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">📱</span>
                <span class="text-base sm:text-lg font-semibold text-slate-800">Administrar dispositivos</span>
            </button>

            <button onclick="saveView(this)" data-valor="4"
                class="group flex flex-col items-start gap-3 text-left p-5 rounded-xl border border-slate-200 bg-white shadow-sm
                       hover:border-purple-500 hover:bg-purple-50 hover:shadow-md
                       focus:outline-none focus-visible:ring-2 focus-visible:ring-purple-600 focus-visible:ring-offset-2
                       active:scale-[0.98] transition-all duration-200">
                <span class="flex items-center justify-center w-11 h-11 rounded-lg bg-purple-100 text-purple-700 text-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">🛠️</span>
                <span class="text-base sm:text-lg font-semibold text-slate-800">Administrar registros técnicos</span>
            </button>

            <button onclick="saveView(this)" data-valor="5"
                class="group flex flex-col items-start gap-3 text-left p-5 rounded-xl border border-slate-200 bg-white shadow-sm
                       hover:border-purple-500 hover:bg-purple-50 hover:shadow-md
                       focus:outline-none focus-visible:ring-2 focus-visible:ring-purple-600 focus-visible:ring-offset-2
                       active:scale-[0.98] transition-all duration-200">
                <span class="flex items-center justify-center w-11 h-11 rounded-lg bg-purple-100 text-purple-700 text-xl group-hover:bg-purple-600 group-hover:text-white transition-colors">💬</span>
                <span class="text-base sm:text-lg font-semibold text-slate-800">Administrar contactos y mensajería</span>
            </button>

        </section>
    </main>
</body>
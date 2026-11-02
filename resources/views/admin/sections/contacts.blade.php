{{-- admin/sections/contacts.blade.php (sin <body>, sin @extends) --}}
<div class="bg-white rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500 overflow-hidden">

    <!-- ENCABEZADO -->
    <div class="px-6 py-5 border-b border-slate-200">
        <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Mensajes de usuarios</h1>
        <div class="mt-2 h-1 w-12 rounded-full bg-orange-500"></div>
    </div>

    <!-- FILTROS -->
    <form action="" method="GET"
          class="px-6 py-5 bg-slate-50 border-b border-slate-200 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 items-end">

        <div>
            <label for="search" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1.5">Nombre o ciudad</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Buscar..."
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400
                          focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/40">
        </div>

        <div>
            <label for="date_from" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1.5">Desde</label>
            <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}"
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900
                          focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/40">
        </div>

        <div>
            <label for="date_to" class="block text-xs font-semibold uppercase tracking-wide text-slate-600 mb-1.5">Hasta</label>
            <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}"
                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-900
                          focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/40">
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="submit"
                    class="flex-1 inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-orange-500 text-sm font-bold text-slate-900
                           hover:bg-orange-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-300 focus-visible:ring-offset-2
                           active:scale-[0.98] transition">
                Filtrar
            </button>
            {{-- "Todos" = limpiar filtros: basta un enlace a la URL actual sin parámetros --}}
            <a href="{{ url()->current() }}"
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-sm font-semibold text-slate-700
                      hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                      focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
                Todos
            </a>
        </div>
    </form>

    <!-- TABLA (el scroll horizontal queda dentro de la tarjeta) -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-600 border-b border-slate-200">
                <tr>
                    <th scope="col" class="px-4 py-3 font-semibold">ID</th>
                    <th scope="col" class="px-4 py-3 font-semibold whitespace-nowrap">Fecha</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Nombre</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Email</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Teléfono</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Ciudad</th>
                    <th scope="col" class="px-4 py-3 font-semibold">País</th>
                    <th scope="col" class="px-4 py-3 font-semibold min-w-[16rem]">Mensaje</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @forelse($contacts as $contact)
                    <tr class="hover:bg-orange-50 transition-colors align-top">
                        <td class="px-4 py-3 font-semibold text-slate-900 tabular-nums">{{ $contact->id }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums whitespace-nowrap">{{ $contact->updated_at }}</td>
                        <td class="px-4 py-3 text-slate-800 whitespace-nowrap">{{ $contact->name }}</td>
                        <td class="px-4 py-3 text-slate-600 whitespace-nowrap">{{ $contact->email }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums whitespace-nowrap">{{ $contact->cellPhone }}</td>
                        <td class="px-4 py-3 text-slate-600 whitespace-nowrap">{{ $contact->city }}</td>
                        <td class="px-4 py-3 text-slate-600 whitespace-nowrap">{{ $contact->country }}</td>
                        {{-- El mensaje puede ser largo: se permite saltar de línea y se limita el ancho --}}
                        <td class="px-4 py-3 text-slate-700 leading-relaxed min-w-[16rem] max-w-md whitespace-normal break-words">{{ $contact->message }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end">
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST"
                                      onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 rounded-lg border border-red-200 bg-red-50 text-xs font-semibold text-red-700
                                                   hover:bg-red-600 hover:text-white hover:border-red-600
                                                   focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 transition-colors">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-4 py-10 text-center text-slate-500">No hay mensajes para los filtros seleccionados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINACIÓN -->
    @if($contacts->hasPages())
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
            {{ $contacts->withQueryString()->links() }}
        </div>
    @endif
</div>

<script>
    function confirmDelete(event) {
        if (!confirm("¿Seguro que quieres eliminar este mensaje?")) {
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>
{{-- admin/sections/users.blade.php (sin <body>, sin @extends) --}}
<div class="bg-white rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500 overflow-hidden">

    <!-- ENCABEZADO -->
    <div class="px-6 py-5 border-b border-slate-200 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Usuarios registrados</h1>
            <div class="mt-2 h-1 w-12 rounded-full bg-orange-500"></div>
        </div>

        <div class="flex flex-wrap items-center gap-2 sm:gap-3">
            <a href="{{ route('cities.index') }}"
               class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-sm font-semibold text-slate-700
                      hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                      focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                Actualizar ciudades
            </a>
            <a href="{{ route('countries.index') }}"
               class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-sm font-semibold text-slate-700
                      hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                      focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                Actualizar países
            </a>
            <a href="{{ route('admin.users.create') }}"
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-orange-500 text-sm font-bold text-slate-900
                      hover:bg-orange-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-300 focus-visible:ring-offset-2
                      active:scale-[0.98] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                </svg>
                Nuevo usuario
            </a>
        </div>
    </div>

    <!-- TABLA (el scroll horizontal queda dentro de la tarjeta) -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left whitespace-nowrap">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-600 border-b border-slate-200">
                <tr>
                    <th scope="col" class="px-4 py-3 font-semibold">ID</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Nombre</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Apellido</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Email</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Teléfono</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Dirección 1</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Dirección 2</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Ciudad</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Zip</th>
                    <th scope="col" class="px-4 py-3 font-semibold">País</th>
                    <th scope="col" class="px-4 py-3 font-semibold">Rol</th>
                    <th scope="col" class="px-4 py-3 font-semibold text-right">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @forelse($users as $user)
                    <tr class="hover:bg-orange-50 transition-colors">
                        <td class="px-4 py-3 font-semibold text-slate-900 tabular-nums">{{ $user->id }}</td>
                        <td class="px-4 py-3 text-slate-800">{{ $user->firstName }}</td>
                        <td class="px-4 py-3 text-slate-800">{{ $user->lastName }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $user->cellPhone }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->addrLine1 }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->addrLine2 }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->city }}</td>
                        <td class="px-4 py-3 text-slate-600 tabular-nums">{{ $user->zipCode }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->country }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-block px-2.5 py-1 rounded-full bg-orange-50 text-orange-700 border border-orange-200 text-xs font-medium">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 rounded-lg border border-slate-300 bg-white text-xs font-semibold text-slate-700
                                          hover:border-orange-400 hover:bg-orange-50 hover:text-orange-700
                                          focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                                    Editar
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline"
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
                        <td colspan="12" class="px-4 py-10 text-center text-slate-500">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINACIÓN (solo si $users es paginado) -->
    @if(method_exists($users, 'hasPages') && $users->hasPages())
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
            {{ $users->withQueryString()->links() }}
        </div>
    @endif
</div>

<script>
    function confirmDelete(event) {
        if (!confirm("¿Seguro que quieres eliminar este usuario?")) {
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>
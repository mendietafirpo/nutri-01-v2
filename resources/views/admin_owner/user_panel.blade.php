<x-app-layout>
@section('content')
<style>[x-cloak]{display:none!important}</style>

@php
    $sectionOwner = (int) session('viewSection_owner', 1);

    $menu = [
        [1, 'Panel principal', 'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z'],
        [3, 'Registros técnicos', 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z'],
    ];
@endphp

<section class="flex h-screen bg-slate-100">

    <!-- SIDEBAR (inicia replegado) -->
    <aside x-data="{ expand: false }"
           :class="expand ? 'w-60' : 'w-16'"
           class="relative flex flex-col justify-between h-full overflow-hidden bg-slate-900 text-slate-300 shadow-xl border-r border-slate-800 transition-all duration-300 ease-in-out">

        <div>
            <!-- Cabecera -->
            <div class="h-16 flex items-center border-b border-slate-800 px-2"
                 :class="expand ? 'justify-between px-4' : 'justify-center'">

                <div x-show="expand" x-cloak x-transition.opacity class="flex items-center gap-2 whitespace-nowrap">
                    <span class="h-6 w-1.5 rounded-full bg-orange-500"></span>
                    <span class="text-sm font-bold uppercase tracking-wider text-white">Panel</span>
                </div>

                <button type="button" @click="expand = !expand"
                        :aria-label="expand ? 'Replegar menú lateral' : 'Expandir menú lateral'"
                        :aria-expanded="expand"
                        class="flex items-center justify-center w-10 h-10 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-orange-400
                               focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                    <svg class="w-5 h-5 transition-transform duration-300" :class="expand ? '' : 'rotate-180'"
                         fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"/>
                    </svg>
                </button>
            </div>

            <!-- Navegación -->
            <nav class="mt-4 px-2" aria-label="Menú del panel">
                <ul class="space-y-1">
                    @foreach ($menu as [$valor, $label, $icon])
                        @php $active = $sectionOwner === $valor || ($valor === 1 && !in_array($sectionOwner, [2, 3])); @endphp
                        <li>
                            <button type="button" onclick="saveView(this)" data-valor="{{ $valor }}"
                                    :title="expand ? '' : '{{ $label }}'"
                                    aria-label="{{ $label }}"
                                    @if($active) aria-current="page" @endif
                                    :class="expand ? 'justify-start gap-3 px-3' : 'justify-center'"
                                    class="relative w-full h-11 flex items-center rounded-lg text-left transition-colors
                                           focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500
                                           {{ $active ? 'bg-slate-800 text-orange-400' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">

                                @if($active)
                                    <span class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-orange-500"></span>
                                @endif

                                <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
                                </svg>
                                <span x-show="expand" x-cloak x-transition.opacity class="text-sm font-medium whitespace-nowrap">{{ $label }}</span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <!-- Pie -->
        <div class="h-12 flex items-center justify-center border-t border-slate-800 text-xs text-slate-500">
            <span x-show="expand" x-cloak x-transition.opacity class="whitespace-nowrap font-semibold text-orange-500">intelCom</span>
            <span x-show="!expand" x-cloak class="font-semibold text-orange-500">iC</span>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL (centrado) -->
    <main class="flex-1 min-w-0 overflow-y-auto">
        <div class="max-w-6xl mx-auto w-full p-4 sm:p-6 lg:p-8">

            @if(session('success'))
                <div role="alert" class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 border-l-4 border-l-green-600 text-green-800 text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @switch($sectionOwner)
                @case(2)
                    @include('admin_owner.sections.devices')
                    @break
                @case(3)
                    @include('admin_owner.sections.traces')
                    @break
                @default
                    @include('admin_owner.sections.welcome')
            @endswitch
        </div>
    </main>
</section>
@endsection
</x-app-layout>

<script>
    function saveView(button) {
        let valor = button.getAttribute('data-valor');
        fetch('/save_view_section_owner', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ valor: valor })
        })
        .then(response => response.json())
        .then(data => {
            window.location.href = "{{ route('user_panel') }}";
        })
        .catch(error => console.error('Error:', error));
    }
</script>
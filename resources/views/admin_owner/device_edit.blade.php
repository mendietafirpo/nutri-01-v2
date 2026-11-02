@extends('layouts.guestn')

@section('content')
@php
    $fields = [
        ['services_input', 'services', 'Número de servicios', 'Mínimo 2, máximo 12', max(2, min(12, (int) $device->services)), 2, 12, 1, 'number'],
        ['duration_input', 'duration', 'Duración del servicio (segundos)', 'Rango permitido: 8 a 30 segundos', max(8, min(30, (int) $device->duration)), 8, 30, 1, 'number'],
        ['initTime', 'initTime', 'Hora de inicio (HHMM)', 'Se ajusta de a 10 minutos', $device->initTime, 0, 2350, 10, 'time'],
        ['endTime', 'endTime', 'Hora de fin (HHMM)', 'Se ajusta de a 10 minutos', $device->endTime, 0, 2350, 10, 'time'],
    ];
@endphp

<div class="w-full max-w-md mx-auto px-4 py-8">

    <!-- ENCABEZADO -->
    <header class="mb-6 text-center">
        <span class="inline-block mb-3 px-3 py-1 rounded-full bg-orange-50 text-orange-600 text-xs font-semibold tracking-wide uppercase border border-orange-200">
            Configuración
        </span>
        <h1 class="text-2xl font-bold text-slate-900">
            Dispositivo <span class="text-orange-600">{{ $device->devId }}</span>
        </h1>
        <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-orange-500"></div>
        <p class="mt-3 text-sm text-slate-600">Ajuste los parámetros de alimentación y guarde los cambios.</p>
    </header>

    <!-- ERROR DEL SERVIDOR -->
    @if ($errors->has('range'))
        <div role="alert" class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 border-l-4 border-l-red-600 text-red-800 text-sm font-medium">
            {{ $errors->first('range') }}
        </div>
    @endif

    <!-- FORMULARIO -->
    <form action="{{ route('device_owner.update', $device->devId) }}" method="POST"
          class="bg-white rounded-2xl shadow-lg border border-slate-200 border-l-4 border-l-orange-500 p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            @foreach ($fields as [$id, $name, $label, $hint, $value, $min, $max, $step, $kind])
                <div>
                    <label for="{{ $id }}" class="block text-sm font-semibold text-slate-800 mb-2">{{ $label }}</label>

                    <div class="flex items-stretch">
                        <button type="button" onclick="stepField('{{ $id }}', -1)" aria-label="Disminuir"
                                class="flex items-center justify-center w-12 shrink-0 rounded-l-lg border border-slate-300 bg-slate-50 text-slate-600
                                       hover:bg-orange-50 hover:text-orange-600 hover:border-orange-400
                                       focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 active:scale-95 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                            </svg>
                        </button>

                        <input type="number" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
                               min="{{ $min }}" max="{{ $max }}"
                               data-kind="{{ $kind }}" data-step="{{ $step }}"
                               class="w-full min-w-0 py-3 border-y border-x-0 border-slate-300 text-center text-lg font-semibold text-slate-900
                                      focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500
                                      [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none">

                        <button type="button" onclick="stepField('{{ $id }}', 1)" aria-label="Aumentar"
                                class="flex items-center justify-center w-12 shrink-0 rounded-r-lg border border-slate-300 bg-slate-50 text-slate-600
                                       hover:bg-orange-50 hover:text-orange-600 hover:border-orange-400
                                       focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 active:scale-95 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                            </svg>
                        </button>
                    </div>

                    <p class="mt-1.5 text-xs text-slate-500">{{ $hint }}</p>
                </div>
            @endforeach
        </div>

        <!-- AVISO DE VALIDACIÓN -->
        <p id="validation-msg" role="status"
           class="hidden mt-6 p-3 rounded-lg bg-amber-50 border border-amber-200 border-l-4 border-l-amber-500 text-amber-800 text-sm"></p>

        <!-- ACCIONES -->
        <div class="mt-8 pt-6 border-t border-slate-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
            <a href="{{ route('user_panel') }}"
               class="inline-flex justify-center items-center px-5 py-2.5 rounded-lg border border-slate-300 bg-white text-sm font-semibold text-slate-700
                      hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition-colors">
                Retornar
            </a>
            <button type="submit"
                    class="inline-flex justify-center items-center px-5 py-2.5 rounded-lg bg-orange-500 text-sm font-bold text-slate-900
                           hover:bg-orange-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-300 focus-visible:ring-offset-2
                           active:scale-[0.98] transition">
                Guardar cambios
            </button>
        </div>
    </form>
</div>

<script>
    // HHMM <-> minutos reales (evita valores como 0860)
    const toMin  = v => Math.floor(v / 100) * 60 + (v % 100);
    const toHHMM = m => Math.floor(m / 60) * 100 + (m % 60);

    function stepField(id, dir) {
        const input = document.getElementById(id);
        const min   = parseInt(input.min);
        const max   = parseInt(input.max);
        const step  = parseInt(input.dataset.step);
        const cur   = parseInt(input.value) || min;

        if (input.dataset.kind === 'time') {
            const m = Math.min(Math.max(toMin(cur) + dir * step, toMin(min)), toMin(max));
            input.value = toHHMM(m);
        } else {
            input.value = Math.min(Math.max(cur + dir * step, min), max);
        }
        validateRange();
    }

    function validateRange() {
        const services = parseInt(document.getElementById('services_input').value) || 0;
        const init     = toMin(parseInt(document.getElementById('initTime').value) || 0);
        const end      = toMin(parseInt(document.getElementById('endTime').value) || 0);
        const msg      = document.getElementById('validation-msg');

        const minRequired = 60 * services;   // minutos
        if (end - init <= minRequired) {
            msg.textContent = `⚠️ El rango entre inicio y fin debe ser mayor a ${minRequired} minutos para ${services} servicios.`;
            msg.classList.remove('hidden');
        } else {
            msg.classList.add('hidden');
        }
    }

    // También valida al escribir a mano
    document.querySelectorAll('input[type="number"]').forEach(i => i.addEventListener('input', validateRange));
    validateRange();
</script>
@endsection
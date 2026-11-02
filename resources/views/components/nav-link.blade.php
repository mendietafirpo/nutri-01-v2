@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 text-md font-medium leading-5 text-gray-800 focus:outline-none transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 text-md font-medium leading-5 text-slate-600 hover:text-slate-800 hover:border-green-300 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
@props(['active' => false])

@php
    $classes = ($active ?? false)
                ? 'block px-4 py-2 text-sm leading-5 text-white transition ease-in-out bg-blue-500'
                : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>

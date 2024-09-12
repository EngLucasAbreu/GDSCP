@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block px-2 py-2 '
            : 'block px-2 py-2 ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

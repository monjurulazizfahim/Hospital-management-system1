@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $classes = match ($variant) {
        'secondary' => 'inline-flex items-center justify-center gap-2 rounded-full bg-white px-5 py-3 text-sm font-semibold text-navy-900 shadow-sm ring-1 ring-sand-100 transition hover:bg-sand-50',
        'outline' => 'inline-flex items-center justify-center gap-2 rounded-full border border-white/30 bg-transparent px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10',
        'navy' => 'inline-flex items-center justify-center gap-2 rounded-full bg-navy-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-navy-800',
        'ghost' => 'inline-flex items-center justify-center gap-2 rounded-full px-4 py-2 text-sm font-semibold text-teal-800 transition hover:bg-teal-50',
        'emergency' => 'inline-flex items-center justify-center gap-2 rounded-full bg-red-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-red-800',
        default => 'inline-flex items-center justify-center gap-2 rounded-full bg-teal-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800',
    };
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif

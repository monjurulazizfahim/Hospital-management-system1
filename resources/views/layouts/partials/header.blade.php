@php
    $hospitalName = $hospital->get('hospital_name') ?: 'Hospital';
    $links = [
        ['label' => 'Home', 'href' => route('home')],
        ['label' => 'About', 'href' => route('home').'#about'],
        ['label' => 'Departments', 'href' => route('home').'#departments'],
        ['label' => 'Doctors', 'href' => route('home').'#doctors'],
        ['label' => 'Services', 'href' => route('home').'#services'],
        ['label' => 'Health Packages', 'href' => route('home').'#packages'],
        ['label' => 'Blog', 'href' => route('home').'#articles'],
        ['label' => 'Contact', 'href' => route('home').'#contact'],
    ];
@endphp

<header class="sticky top-0 z-40 border-b border-sand-100 bg-white/90 backdrop-blur-md">
    @include('layouts.partials.topbar')

    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3 sm:px-6">
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
            @if ($hospital->get('logo'))
                <img src="{{ $hospital->get('logo') }}" alt="{{ $hospitalName }} logo" class="h-11 w-11 rounded-2xl object-cover ring-1 ring-sand-100">
            @else
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-teal-700 text-sm font-bold text-white">LG</span>
            @endif
            <span class="min-w-0">
                <span class="block truncate font-display text-lg font-semibold leading-tight text-navy-900 sm:text-xl">{{ $hospitalName }}</span>
                <span class="hidden text-[11px] uppercase tracking-[0.18em] text-teal-700 sm:block">Healthcare</span>
            </span>
        </a>

        <nav class="hidden items-center gap-5 xl:flex" aria-label="Primary">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}" class="text-sm font-medium text-ink-600 transition hover:text-navy-900">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <div class="flex items-center gap-2">
            <x-ui.button href="{{ route('home') }}#contact" class="hidden sm:inline-flex">Book Appointment</x-ui.button>
            <button
                type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-sand-100 text-navy-900 xl:hidden"
                data-nav-toggle
                aria-expanded="false"
                aria-controls="mobile-navigation"
                aria-label="Open menu"
            >
                <span class="sr-only">Open menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
    </div>
</header>

<div id="mobile-navigation" class="fixed inset-0 z-50 hidden xl:hidden" data-nav-panel>
    <button type="button" class="absolute inset-0 bg-navy-950/50" data-nav-close aria-label="Close menu"></button>
    <div class="absolute inset-y-0 right-0 flex w-[min(22rem,100%)] flex-col bg-white p-6 shadow-2xl">
        <div class="flex items-center justify-between">
            <p class="font-display text-lg font-semibold text-navy-900">Menu</p>
            <button type="button" class="rounded-full p-2 text-ink-600" data-nav-close aria-label="Close menu">✕</button>
        </div>
        <nav class="mt-8 flex flex-col gap-4" aria-label="Mobile">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}" class="text-base font-medium text-navy-900" data-nav-close>{{ $link['label'] }}</a>
            @endforeach
        </nav>
        <x-ui.button href="{{ route('home') }}#contact" class="mt-8" data-nav-close>Book Appointment</x-ui.button>
        @if ($hospital->get('emergency_phone'))
            <a href="tel:{{ preg_replace('/\s+/', '', $hospital->get('emergency_phone')) }}" class="mt-4 text-sm font-semibold text-red-700">
                Emergency {{ $hospital->get('emergency_phone') }}
            </a>
        @endif
    </div>
</div>

@props(['package'])

<article class="flex h-full flex-col rounded-3xl bg-white p-7 shadow-[0_12px_40px_-24px_rgba(7,20,31,0.35)] ring-1 ring-sand-100">
    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gold-500">Health Package</p>
    <h3 class="font-display mt-3 text-2xl font-semibold text-navy-900">{{ $package->title }}</h3>
    <p class="mt-3 text-sm leading-6 text-ink-600">{{ \Illuminate\Support\Str::limit(strip_tags($package->description), 120) }}</p>
    @if ($package->healthPackageItems->isNotEmpty())
        <ul class="mt-5 space-y-2 text-sm text-ink-600">
            @foreach ($package->healthPackageItems->take(4) as $item)
                <li class="flex gap-2">
                    <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-teal-700"></span>
                    {{ $item->title }}
                </li>
            @endforeach
        </ul>
    @endif
    <div class="mt-auto pt-6">
        <p class="font-display text-3xl font-semibold text-navy-900">৳{{ number_format((float) $package->price) }}</p>
        @if ($package->duration_label)
            <p class="mt-1 text-xs uppercase tracking-wide text-ink-400">{{ $package->duration_label }}</p>
        @endif
        <x-ui.button href="#contact" class="mt-5 w-full">Book Package</x-ui.button>
    </div>
</article>

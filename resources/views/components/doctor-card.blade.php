@props(['doctor'])

<article class="flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-[0_12px_40px_-24px_rgba(7,20,31,0.35)] ring-1 ring-sand-100">
    <div class="relative h-56 bg-navy-900">
        <img
            src="{{ $doctor->photo ?: 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=800&q=70' }}"
            alt="Portrait of {{ $doctor->name }}"
            class="h-full w-full object-cover object-top opacity-95"
        >
        <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-navy-950/80 to-transparent"></div>
    </div>
    <div class="flex flex-1 flex-col p-6">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-teal-700">{{ $doctor->department?->name }}</p>
        <h3 class="font-display mt-2 text-xl font-semibold text-navy-900">{{ $doctor->name }}</h3>
        <p class="mt-1 text-sm text-ink-600">{{ $doctor->designation }}</p>
        @if ($doctor->specialization)
            <p class="mt-3 text-sm text-ink-600">{{ $doctor->specialization }}</p>
        @endif
        <div class="mt-6 flex flex-wrap gap-3">
            <x-ui.button href="#doctors" variant="ghost" class="px-0">View Profile</x-ui.button>
            <x-ui.button href="#contact">Book Appointment</x-ui.button>
        </div>
    </div>
</article>

@props(['department'])

<article class="group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-[0_12px_40px_-24px_rgba(7,20,31,0.35)] ring-1 ring-sand-100 transition hover:-translate-y-1 hover:shadow-[0_24px_50px_-28px_rgba(7,20,31,0.45)]">
    <div class="relative h-40 overflow-hidden bg-teal-50">
        <img
            src="{{ $department->image ?: 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=800&q=70' }}"
            alt="{{ $department->name }} department"
            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
        >
        <div class="absolute left-4 top-4 inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white/95 text-teal-700 shadow-sm">
            <x-icon :name="$department->icon ?: 'heart'" class="h-5 w-5" />
        </div>
    </div>
    <div class="flex flex-1 flex-col p-6">
        <h3 class="font-display text-xl font-semibold text-navy-900">{{ $department->name }}</h3>
        <p class="mt-3 flex-1 text-sm leading-6 text-ink-600">{{ \Illuminate\Support\Str::limit(strip_tags($department->description), 120) }}</p>
        <a href="#departments" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-teal-700">
            View Department
            <span aria-hidden="true">→</span>
        </a>
    </div>
</article>

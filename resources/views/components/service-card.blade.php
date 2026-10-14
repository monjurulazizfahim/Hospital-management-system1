@props(['service'])

<article class="flex h-full flex-col rounded-3xl bg-white p-6 shadow-[0_12px_40px_-24px_rgba(7,20,31,0.35)] ring-1 ring-sand-100">
    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-teal-50 text-teal-700">
        <x-icon :name="$service->icon ?: 'heart'" class="h-6 w-6" />
    </div>
    <h3 class="font-display mt-5 text-lg font-semibold text-navy-900">{{ $service->title }}</h3>
    <p class="mt-3 flex-1 text-sm leading-6 text-ink-600">{{ $service->summary ?: \Illuminate\Support\Str::limit(strip_tags($service->body), 110) }}</p>
    <a href="#services" class="mt-5 text-sm font-semibold text-teal-700">Learn More →</a>
</article>

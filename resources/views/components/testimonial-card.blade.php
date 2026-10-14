@props(['testimonial'])

<figure class="flex h-full flex-col rounded-3xl bg-white p-7 shadow-[0_12px_40px_-24px_rgba(7,20,31,0.35)] ring-1 ring-sand-100">
    <div class="flex items-center gap-1 text-gold-500" aria-label="{{ $testimonial->rating }} out of 5">
        @for ($i = 1; $i <= 5; $i++)
            <span class="{{ $i <= (int) $testimonial->rating ? 'opacity-100' : 'opacity-25' }}">★</span>
        @endfor
    </div>
    <blockquote class="mt-4 flex-1 text-base leading-7 text-ink-600">“{{ $testimonial->quote }}”</blockquote>
    <figcaption class="mt-6 flex items-center gap-3">
        <img
            src="{{ $testimonial->photo ?: 'https://placehold.co/80x80/0F766E/FFFFFF?text=Patient' }}"
            alt=""
            class="h-11 w-11 rounded-full object-cover"
        >
        <div>
            <p class="text-sm font-semibold text-navy-900">{{ $testimonial->display_name }}</p>
            <p class="text-xs text-ink-400">{{ $testimonial->display_role }}</p>
        </div>
    </figcaption>
</figure>

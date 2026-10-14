@props(['post'])

<article class="group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-[0_12px_40px_-24px_rgba(7,20,31,0.35)] ring-1 ring-sand-100">
    <div class="h-48 overflow-hidden bg-sand-100">
        <img
            src="{{ $post->cover_image ?: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=70' }}"
            alt="{{ $post->title }}"
            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
        >
    </div>
    <div class="flex flex-1 flex-col p-6">
        <div class="flex items-center justify-between gap-3 text-xs font-semibold uppercase tracking-[0.16em] text-teal-700">
            <span>{{ $post->blogCategory?->name }}</span>
            @if ($post->published_at)
                <time datetime="{{ $post->published_at->toDateString() }}" class="text-ink-400">{{ $post->published_at->format('d M Y') }}</time>
            @endif
        </div>
        <h3 class="font-display mt-3 text-xl font-semibold text-navy-900">{{ $post->title }}</h3>
        <p class="mt-3 flex-1 text-sm leading-6 text-ink-600">{{ \Illuminate\Support\Str::limit($post->excerpt, 130) }}</p>
        <a href="#articles" class="mt-5 text-sm font-semibold text-teal-700">Read More →</a>
    </div>
</article>

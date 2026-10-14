@props([
    'eyebrow' => null,
    'title',
    'intro' => null,
    'align' => 'left',
    'tone' => 'dark',
])

<div @class(['max-w-2xl', 'mx-auto text-center' => $align === 'center'])>
    @if ($eyebrow)
        <p @class(['text-xs font-semibold uppercase tracking-[0.22em]', 'text-gold-500' => $tone === 'light', 'text-teal-700' => $tone === 'dark'])>{{ $eyebrow }}</p>
    @endif
    <h2 @class(['font-display mt-3 text-3xl font-semibold tracking-tight sm:text-4xl', 'text-white' => $tone === 'light', 'text-navy-900' => $tone === 'dark'])>{{ $title }}</h2>
    @if ($intro)
        <p @class(['mt-4 text-base leading-7', 'text-white/70' => $tone === 'light', 'text-ink-600' => $tone === 'dark'])>{{ $intro }}</p>
    @endif
</div>

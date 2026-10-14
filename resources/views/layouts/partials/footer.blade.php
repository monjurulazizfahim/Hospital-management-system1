@php
    $hospitalName = $hospital->get('hospital_name') ?: 'Hospital';
@endphp

<footer class="bg-navy-950 text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 py-16 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <p class="font-display text-2xl font-semibold">{{ $hospitalName }}</p>
            <p class="mt-4 max-w-xs text-sm leading-6 text-white/70">{{ \Illuminate\Support\Str::limit($hospital->get('about_content'), 180) }}</p>
            <div class="mt-5 flex gap-3 text-sm text-white/70">
                @if ($hospital->get('facebook_url'))
                    <a href="{{ $hospital->get('facebook_url') }}" class="hover:text-white">Facebook</a>
                @endif
                @if ($hospital->get('instagram_url'))
                    <a href="{{ $hospital->get('instagram_url') }}" class="hover:text-white">Instagram</a>
                @endif
                @if ($hospital->get('youtube_url'))
                    <a href="{{ $hospital->get('youtube_url') }}" class="hover:text-white">YouTube</a>
                @endif
            </div>
        </div>
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-gold-500">Quick Links</p>
            <ul class="mt-4 space-y-2 text-sm text-white/75">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                <li><a href="{{ route('home') }}#about" class="hover:text-white">About</a></li>
                <li><a href="{{ route('home') }}#doctors" class="hover:text-white">Doctors</a></li>
                <li><a href="{{ route('home') }}#packages" class="hover:text-white">Health Packages</a></li>
                <li><a href="{{ route('home') }}#contact" class="hover:text-white">Contact</a></li>
                <li><a href="{{ route('home') }}#contact" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="{{ route('home') }}#contact" class="hover:text-white">Terms &amp; Conditions</a></li>
            </ul>
        </div>
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-gold-500">Departments</p>
            <ul class="mt-4 space-y-2 text-sm text-white/75">
                @forelse ($footerDepartments as $department)
                    <li><a href="{{ route('home') }}#departments" class="hover:text-white">{{ $department->name }}</a></li>
                @empty
                    <li>Departments coming soon</li>
                @endforelse
            </ul>
        </div>
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-gold-500">Contact</p>
            <ul class="mt-4 space-y-3 text-sm text-white/75">
                @if ($hospital->get('address'))
                    <li class="flex gap-2"><x-icon name="pin" class="mt-0.5 h-4 w-4 shrink-0" /> {{ $hospital->get('address') }}</li>
                @endif
                @if ($hospital->get('phone'))
                    <li class="flex gap-2"><x-icon name="phone" class="mt-0.5 h-4 w-4 shrink-0" /> {{ $hospital->get('phone') }}</li>
                @endif
                @if ($hospital->get('email'))
                    <li class="flex gap-2"><x-icon name="mail" class="mt-0.5 h-4 w-4 shrink-0" /> {{ $hospital->get('email') }}</li>
                @endif
            </ul>
            <p class="mt-6 text-sm font-semibold uppercase tracking-[0.18em] text-gold-500">Services</p>
            <ul class="mt-3 space-y-2 text-sm text-white/75">
                @foreach ($footerServices->take(4) as $service)
                    <li><a href="{{ route('home') }}#services" class="hover:text-white">{{ $service->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-5 text-xs text-white/50 sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ date('Y') }} {{ $hospitalName }}. All rights reserved.</p>
            <p>Demo website for development. Not a real healthcare facility.</p>
        </div>
    </div>
</footer>

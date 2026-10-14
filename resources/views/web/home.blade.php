@extends('layouts.public')

@php
    $hospitalName = $hospital->get('hospital_name') ?: 'Hospital';
    $heroTitle = $heroBanner?->title ?: 'Exceptional care, delivered with calm precision';
    $heroText = $heroBanner?->subtitle ?: ($hospital->get('tagline') ?: 'A modern hospital experience built around patients and families.');
    $heroCtaLabel = $heroBanner?->cta_label ?: 'Book Appointment';
    $heroCtaUrl = $heroBanner?->cta_url ?: '#contact';
    $heroImage = 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=2000&q=80';
    $aboutImage = 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=1400&q=80';
    $hoursLabel = $workingHours['saturday'] ?? '9:00 AM – 9:00 PM';
@endphp

@section('title', $hospitalName.' | Premium Hospital Care')
@section('meta_description', $hospital->get('tagline') ?: 'Professional hospital care, consultant doctors, diagnostics, and 24/7 emergency support.')

@section('content')
    <section class="relative isolate min-h-[34rem] overflow-hidden bg-navy-950 text-white lg:min-h-[40rem]">
        <img src="{{ $heroImage }}" alt="Hospital care team walking through a modern clinical corridor" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-navy-950/92 via-navy-950/78 to-navy-900/35"></div>
        <div class="relative mx-auto flex max-w-7xl flex-col gap-8 px-6 py-20 lg:flex-row lg:items-end lg:py-28">
            <div class="max-w-2xl">
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-gold-500">{{ $hospitalName }}</p>
                <h1 class="font-display mt-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">{{ $heroTitle }}</h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-white/80 sm:text-lg">{{ $heroText }}</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <x-ui.button href="{{ $heroCtaUrl }}">{{ $heroCtaLabel }}</x-ui.button>
                    <x-ui.button href="#doctors" variant="outline">Find a Doctor</x-ui.button>
                </div>
            </div>
            @if ($hospital->get('emergency_phone'))
                <aside class="w-full max-w-sm rounded-3xl border border-white/15 bg-white/10 p-6 backdrop-blur-md lg:ml-auto">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-500">Emergency contact</p>
                    <p class="mt-3 font-display text-2xl font-semibold">{{ $hospital->get('emergency_phone') }}</p>
                    <p class="mt-2 text-sm text-white/70">24/7 emergency desk. For a medical emergency, call immediately or visit the hospital.</p>
                    <x-ui.button href="tel:{{ preg_replace('/\s+/', '', $hospital->get('emergency_phone')) }}" variant="emergency" class="mt-5">Call Emergency</x-ui.button>
                </aside>
            @endif
        </div>
    </section>

    <section class="relative z-10 mx-auto -mt-8 grid max-w-7xl gap-4 px-6 sm:grid-cols-2 lg:grid-cols-4">
        <a href="#contact" class="rounded-3xl bg-white p-6 shadow-[0_18px_40px_-28px_rgba(7,20,31,0.5)] ring-1 ring-sand-100 transition hover:-translate-y-1">
            <x-icon name="calendar" class="h-6 w-6 text-teal-700" />
            <p class="mt-4 font-semibold text-navy-900">Book Appointment</p>
            <p class="mt-2 text-sm text-ink-600">Reserve a consultant slot with a specialist.</p>
        </a>
        <a href="#doctors" class="rounded-3xl bg-white p-6 shadow-[0_18px_40px_-28px_rgba(7,20,31,0.5)] ring-1 ring-sand-100 transition hover:-translate-y-1">
            <x-icon name="users" class="h-6 w-6 text-teal-700" />
            <p class="mt-4 font-semibold text-navy-900">Find a Doctor</p>
            <p class="mt-2 text-sm text-ink-600">Browse consultants by department and expertise.</p>
        </a>
        <a href="#departments" class="rounded-3xl bg-white p-6 shadow-[0_18px_40px_-28px_rgba(7,20,31,0.5)] ring-1 ring-sand-100 transition hover:-translate-y-1">
            <x-icon name="building" class="h-6 w-6 text-teal-700" />
            <p class="mt-4 font-semibold text-navy-900">Departments</p>
            <p class="mt-2 text-sm text-ink-600">Cardiology, pediatrics, surgery, and more.</p>
        </a>
        <a href="#emergency" class="rounded-3xl bg-navy-900 p-6 text-white shadow-[0_18px_40px_-28px_rgba(7,20,31,0.5)] transition hover:-translate-y-1">
            <x-icon name="phone" class="h-6 w-6 text-gold-500" />
            <p class="mt-4 font-semibold">Emergency</p>
            <p class="mt-2 text-sm text-white/70">Immediate help, day and night.</p>
        </a>
    </section>

    <section id="about" class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 lg:grid-cols-2">
        <div class="overflow-hidden rounded-[2rem]">
            <img src="{{ $aboutImage }}" alt="Clinicians collaborating in a modern hospital setting" class="h-full min-h-[22rem] w-full object-cover">
        </div>
        <div>
            <x-ui.section-heading
                eyebrow="About the hospital"
                :title="$hospitalName"
                :intro="$hospital->get('about_content')"
            />
            <dl class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl bg-white p-5 ring-1 ring-sand-100">
                    <dt class="text-sm font-semibold text-navy-900">Mission</dt>
                    <dd class="mt-2 text-sm leading-6 text-ink-600">Deliver calm, evidence-informed care that puts every patient and family first.</dd>
                </div>
                <div class="rounded-2xl bg-white p-5 ring-1 ring-sand-100">
                    <dt class="text-sm font-semibold text-navy-900">Vision</dt>
                    <dd class="mt-2 text-sm leading-6 text-ink-600">Be the most trusted neighbourhood hospital for comprehensive, dignified healthcare.</dd>
                </div>
            </dl>
            <x-ui.button href="#contact" variant="navy" class="mt-8">Learn More</x-ui.button>
        </div>
    </section>

    <section id="departments" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <x-ui.section-heading
                    eyebrow="Clinical specialties"
                    title="Departments"
                    intro="Consultant-led departments designed around clear pathways from first visit to follow-up."
                />
                <a href="#departments" class="text-sm font-semibold text-teal-700">View All Departments →</a>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($departments as $department)
                    <x-department-card :department="$department" />
                @empty
                    <p class="text-ink-600">Departments will appear here once they are published.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="doctors" class="py-20">
        <div class="mx-auto max-w-7xl px-6">
            <x-ui.section-heading
                eyebrow="Consultants"
                title="Featured Doctors"
                intro="Meet fictional demo consultants used to populate this hospital website."
            />
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($doctors as $doctor)
                    <x-doctor-card :doctor="$doctor" />
                @empty
                    <p class="text-ink-600">Doctor profiles will appear here once they are published.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="services" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-6">
            <x-ui.section-heading
                eyebrow="Diagnostics & care"
                title="Hospital Services"
                intro="From emergency care to imaging and pharmacy, services are managed from the hospital database."
            />
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($services as $service)
                    <x-service-card :service="$service" />
                @empty
                    <p class="text-ink-600">Services will appear here once they are published.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="packages" class="py-20">
        <div class="mx-auto max-w-7xl px-6">
            <x-ui.section-heading
                eyebrow="Preventive care"
                title="Health Packages"
                intro="Structured screening packages with transparent demo pricing."
                align="center"
            />
            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @forelse ($packages as $package)
                    <x-package-card :package="$package" />
                @empty
                    <p class="text-center text-ink-600">Health packages will appear here once they are published.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-navy-900 py-20 text-white">
        <div class="mx-auto max-w-7xl px-6">
            <x-ui.section-heading
                eyebrow="Why patients choose us"
                title="Care you can trust"
                tone="light"
            />
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <article class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <x-icon name="users" class="h-6 w-6 text-gold-500" />
                    <h3 class="mt-4 font-semibold">Experienced Medical Professionals</h3>
                    <p class="mt-2 text-sm leading-6 text-white/70">Consultant-led teams across core adult and paediatric specialties.</p>
                </article>
                <article class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <x-icon name="building" class="h-6 w-6 text-gold-500" />
                    <h3 class="mt-4 font-semibold">Modern Medical Facilities</h3>
                    <p class="mt-2 text-sm leading-6 text-white/70">Diagnostics, theatre pathways, and inpatient support designed for clarity.</p>
                </article>
                <article class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <x-icon name="phone" class="h-6 w-6 text-gold-500" />
                    <h3 class="mt-4 font-semibold">24/7 Emergency Care</h3>
                    <p class="mt-2 text-sm leading-6 text-white/70">A dedicated emergency desk for urgent assessment, day and night.</p>
                </article>
                <article class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <x-icon name="shield" class="h-6 w-6 text-gold-500" />
                    <h3 class="mt-4 font-semibold">Patient-Centered Care</h3>
                    <p class="mt-2 text-sm leading-6 text-white/70">Clear communication, dignity, and family involvement at every step.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto grid max-w-7xl gap-6 px-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-3xl bg-white p-6 text-center ring-1 ring-sand-100">
                <p class="font-display text-4xl font-semibold text-navy-900">{{ $stats['doctors'] }}</p>
                <p class="mt-2 text-sm text-ink-600">Experienced Doctors</p>
            </div>
            <div class="rounded-3xl bg-white p-6 text-center ring-1 ring-sand-100">
                <p class="font-display text-4xl font-semibold text-navy-900">{{ $stats['departments'] }}</p>
                <p class="mt-2 text-sm text-ink-600">Departments</p>
            </div>
            <div class="rounded-3xl bg-white p-6 text-center ring-1 ring-sand-100">
                <p class="font-display text-4xl font-semibold text-navy-900">{{ $stats['patients'] }}</p>
                <p class="mt-2 text-sm text-ink-600">Patients Served</p>
            </div>
            <div class="rounded-3xl bg-white p-6 text-center ring-1 ring-sand-100">
                <p class="font-display text-4xl font-semibold text-navy-900">{{ $stats['services'] }}</p>
                <p class="mt-2 text-sm text-ink-600">Hospital Services</p>
            </div>
        </div>
    </section>

    <section id="testimonials" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-6">
            <x-ui.section-heading
                eyebrow="Patient voice"
                title="Testimonials"
                intro="Published demo testimonials. These are fictional quotes for the website prototype."
                align="center"
            />
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($testimonials as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" />
                @empty
                    <p class="text-center text-ink-600">Testimonials will appear here once they are approved.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="articles" class="py-20">
        <div class="mx-auto max-w-7xl px-6">
            <x-ui.section-heading
                eyebrow="Health education"
                title="Latest Health Articles"
                intro="General wellness articles. They are not a substitute for personal medical advice."
            />
            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @forelse ($posts as $post)
                    <x-blog-card :post="$post" />
                @empty
                    <p class="text-ink-600">Articles will appear here once they are published.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="emergency" class="bg-red-800 py-16 text-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-8 px-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-red-100">{{ $emergencyBanner?->title ?: 'Emergency care' }}</p>
                <h2 class="font-display mt-3 text-3xl font-semibold sm:text-4xl">{{ $emergencyBanner?->subtitle ?: 'If this is an emergency, do not wait. Call or come in now.' }}</h2>
                @if ($hospital->get('emergency_phone'))
                    <p class="mt-4 text-2xl font-semibold">{{ $hospital->get('emergency_phone') }}</p>
                @endif
            </div>
            <div class="flex flex-wrap gap-3">
                @if ($hospital->get('emergency_phone'))
                    <x-ui.button href="tel:{{ preg_replace('/\s+/', '', $hospital->get('emergency_phone')) }}" variant="secondary">Call Ambulance / Emergency</x-ui.button>
                @endif
                <x-ui.button href="#contact" variant="outline">Contact Hospital</x-ui.button>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 lg:grid-cols-2">
            <div>
                <x-ui.section-heading
                    eyebrow="Visit us"
                    title="Contact & location"
                    :intro="$hospital->get('address')"
                />
                <ul class="mt-8 space-y-4 text-sm text-ink-600">
                    @if ($hospital->get('phone'))
                        <li class="flex gap-3"><x-icon name="phone" class="h-5 w-5 text-teal-700" /> {{ $hospital->get('phone') }}</li>
                    @endif
                    @if ($hospital->get('email'))
                        <li class="flex gap-3"><x-icon name="mail" class="h-5 w-5 text-teal-700" /> {{ $hospital->get('email') }}</li>
                    @endif
                    <li class="flex gap-3"><x-icon name="clock" class="h-5 w-5 text-teal-700" /> {{ $hoursLabel }}@if (! empty($workingHours['emergency'])) · Emergency {{ $workingHours['emergency'] }}@endif</li>
                </ul>
                <x-ui.button href="#contact" class="mt-8">Book Appointment</x-ui.button>
            </div>
            <div class="min-h-[20rem] overflow-hidden rounded-[2rem] bg-sand-100 ring-1 ring-sand-100">
                @if ($hospital->get('map_embed'))
                    {!! $hospital->get('map_embed') !!}
                @else
                    <div class="flex h-full min-h-[20rem] flex-col items-center justify-center px-8 text-center">
                        <x-icon name="pin" class="h-8 w-8 text-teal-700" />
                        <p class="mt-4 font-semibold text-navy-900">Map placeholder</p>
                        <p class="mt-2 max-w-sm text-sm text-ink-600">A Google Map embed can be added from hospital settings. {{ $hospital->get('address') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

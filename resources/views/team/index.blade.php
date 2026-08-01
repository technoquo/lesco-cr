@extends('layouts.app')

@section('title', 'Nuestro equipo — LESCO por Costa Rica')

@section('meta')
    <x-seo-meta
        title="Nuestro equipo — LESCO por Costa Rica"
        description="Conocé al equipo detrás de LESCO por Costa Rica, comprometidos con la enseñanza de la Lengua de Señas Costarricense."
    />
@endsection

@section('head')
<style>
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(2.5rem); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .member-card { opacity: 0; }
    .member-card.is-visible {
        animation: fadeUp 0.75s cubic-bezier(.22, .68, 0, 1.15) both;
    }

    .member-photo {
        transition: transform 0.6s cubic-bezier(.22, .68, 0, 1.15);
    }
    .member-card:hover .member-photo { transform: scale(1.05); }

    @media (prefers-reduced-motion: reduce) {
        .member-card        { opacity: 1 !important; animation: none !important; }
        .member-photo       { transition: none !important; }
    }
</style>
@endsection

@section('content')

    {{-- Hero --}}
    <section class="bg-blue-900 text-white py-20 px-4">
        <div class="max-w-5xl mx-auto">
            <p class="text-blue-300 text-xs font-semibold tracking-widest uppercase mb-5">El equipo</p>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight max-w-xl">
                Las personas detrás de LESCO por Costa Rica
            </h1>
            <p class="mt-5 text-blue-200 text-lg max-w-lg leading-relaxed">
                Movidas por la inclusión y el amor a la cultura sorda costarricense.
            </p>
        </div>
    </section>

    {{-- Members --}}
    <section class="py-20 px-4 bg-gray-50" aria-labelledby="team-heading">
        <h2 id="team-heading" class="sr-only">Integrantes del equipo</h2>

        <div class="max-w-4xl mx-auto">

            {{-- Intro --}}
            <div class="mb-14 max-w-2xl">
                <h2 class="text-2xl font-bold text-gray-900 mb-5">Conocé al equipo</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        Detrás de LESCO por Costa Rica, estamos un grupo de personas que tenemos como filosofía de vida la inclusión, y que nos une el amor por lo que nos gusta y apasiona.
                    </p>
                    <p>
                        Cada una de las personas que formamos parte brindamos nuestras habilidades para lograr que otras personas comprendan la importancia de la Cultura Sorda y la LESCO en nuestro país como parte de hacer una sociedad más inclusiva y así formar una gran familia.
                    </p>
                </div>
            </div>

            @if($members->isEmpty())
                <p class="text-center text-gray-500 py-16">
                    El contenido de esta sección está siendo preparado. Volvé pronto.
                </p>
            @else
                <ul
                    role="list"
                    class="grid grid-cols-1 gap-8 sm:grid-cols-2 justify-items-center"
                    x-data
                    x-init="
                        const cards = $el.querySelectorAll('.member-card');
                        const io = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    entry.target.classList.add('is-visible');
                                    io.unobserve(entry.target);
                                }
                            });
                        }, { threshold: 0.12 });
                        cards.forEach(card => io.observe(card));
                    "
                >
                    @foreach($members as $i => $member)
                        <li
                            class="member-card w-full max-w-sm"
                            style="animation-delay: {{ $i * 160 }}ms"
                        >
                            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-shadow duration-500 h-full">

                                {{-- Portrait photo --}}
                                <div class="overflow-hidden aspect-[3/4] bg-blue-50">
                                    @if($member->photo)
                                        <img
                                            src="{{ asset('storage/' . $member->photo) }}"
                                            alt="Foto de {{ $member->name }}"
                                            class="member-photo w-full h-full object-cover object-center"
                                            loading="lazy"
                                        >
                                    @else
                                        <div class="w-full h-full flex items-center justify-center" aria-hidden="true">
                                            <span class="text-blue-300 font-bold text-7xl">
                                                {{ mb_substr($member->name, 0, 1) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Info --}}
                                <div class="px-6 py-5">
                                    <h3 class="text-xl font-bold text-red-600 leading-snug">
                                        {{ $member->name }}
                                    </h3>
                                    <p class="text-sm text-red-500 font-medium mt-1">
                                        {{ $member->role }}
                                    </p>
                                    @if($member->bio)
                                        <p class="text-sm text-gray-600 mt-3 leading-relaxed">
                                            {{ $member->bio }}
                                        </p>
                                    @endif
                                </div>

                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-blue-50 py-16 px-4" aria-labelledby="team-cta-heading">
        <div class="max-w-3xl mx-auto text-center">
            <h2 id="team-cta-heading" class="text-2xl font-bold text-gray-900 mb-3">
                ¿Querés aprender con nosotros?
            </h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Conocé los talleres y programas que el equipo de LESCO por Costa Rica tiene para vos.
            </p>
            <a
                href="{{ route('services.index') }}"
                class="inline-flex items-center justify-center px-8 py-3 bg-blue-900 text-white font-semibold rounded-full hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-900 focus-visible:ring-offset-2"
            >
                Ver nuestros servicios
            </a>
        </div>
    </section>

@endsection

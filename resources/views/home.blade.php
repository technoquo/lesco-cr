@extends('layouts.app')

@section('title', 'Aprender Lesco - Lesco por Costa Rica')

@section('meta')
    <x-seo-meta
        title="Aprender Lesco - Lesco por Costa Rica"
        description="Lesco por Costa Rica - Aprender Lesco"
        :image="asset('img/quienes_somos.jpg')"
        imageType="image/jpeg"
    />
@endsection

@section('content')

    {{-- Hero --}}
    <section class="bg-blue-900 text-white py-24 sm:py-32 px-4" aria-labelledby="hero-heading">
        <div class="max-w-4xl mx-auto text-center">
            <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight tracking-tight">
                La LESCO cambia vidas
            </h1>
            <p class="mt-6 text-lg sm:text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
                Aprendé la Lengua de Señas Costarricense y contribuí a una sociedad más inclusiva para la comunidad sorda.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a
                    href="{{ route('services.index') }}"
                    class="inline-flex items-center justify-center px-8 py-3 bg-white text-blue-900 font-semibold rounded-full hover:bg-blue-50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-blue-900"
                >
                    Ver nuestros servicios
                </a>
                <a
                    href="/contacto"
                    class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-white font-semibold rounded-full hover:bg-white/10 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white"
                >
                    Contáctanos
                </a>
            </div>
        </div>
    </section>

    {{-- Quiénes somos --}}
    <section class="py-20 px-4" aria-labelledby="about-heading">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 id="about-heading" class="text-3xl font-bold text-gray-900 mb-4 text-4xl">¿Quiénes somos?</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed text-3xl">
                    <p>
                        Somos una agrupación interdisciplinaria compuesta por personas sordas y oyentes que buscamos visibilizar la importancia de la cultura sorda y la LESCO en nuestro país.
                    </p>

                </div>
                <a
                    href="{{ route('team.index') }}"
                    class="inline-flex items-center mt-6 text-blue-700 font-semibold hover:text-blue-900 transition-colors group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                >
                    Conocé al equipo
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <div class="bg-blue-50 rounded-2xl aspect-video flex items-center justify-center text-blue-300 border-2 border-dashed border-blue-200" aria-hidden="true">
                <span class="text-sm text-blue-400">
                    <img src="{{ asset('img/quienes_somos.jpg') }}" alt="Nuestro equipo de LESCO por Costa Rica" class="rounded-2xl">
                </span>
            </div>
        </div>
    </section>

    {{-- Contadores --}}
    @if($stats->isNotEmpty())
    <section class="bg-blue-900 text-white py-16 px-4" aria-label="Estadísticas">
        <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-10 text-center">
            @foreach($stats as $stat)
            <div x-data="counterAnimation({{ $stat->value }})">
                <span
                    class="block text-5xl font-bold tabular-nums"
                    x-text="current.toLocaleString('es-CR')"
                    aria-label="{{ number_format($stat->value) }} {{ $stat->label }}"
                >0</span>
                <span class="block mt-2 text-blue-200 font-medium text-lg">{{ $stat->label }}</span>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Testimonios --}}
    @if($testimonials->isNotEmpty())
    <section class="py-20 px-4 bg-gray-50" aria-labelledby="testimonials-heading">
        <div class="max-w-3xl mx-auto">
            <h2 id="testimonials-heading" class="text-3xl font-bold text-center text-gray-900 mb-12">
                Lo que dicen nuestros estudiantes
            </h2>

            <div
                x-data="testimonialCarousel({{ $testimonials->count() }})"
                aria-live="polite"
                aria-atomic="true"
            >
                {{-- Grid stacking: todos los slides ocupan la misma celda para evitar saltos de altura --}}
                <div class="grid">
                    @foreach($testimonials as $i => $testimonial)
                    <div
                        style="grid-area: 1/1"
                        :class="current === {{ $i }} ? 'opacity-100' : 'opacity-0 pointer-events-none'"
                        class="transition-opacity duration-300"
                        :aria-hidden="current !== {{ $i }}"
                    >
                        <x-testimonial-card :testimonial="$testimonial" />
                    </div>
                    @endforeach
                </div>

                @if($testimonials->count() > 1)
                <div class="flex justify-center items-center gap-6 mt-8">
                    <button
                        @click="prev()"
                        class="p-2 rounded-full border border-gray-300 hover:bg-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
                        aria-label="Testimonio anterior"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <div class="flex gap-2" role="tablist" aria-label="Seleccionar testimonio">
                        @foreach($testimonials as $i => $testimonial)
                        <button
                            @click="current = {{ $i }}"
                            :aria-selected="current === {{ $i }}"
                            :class="current === {{ $i }} ? 'bg-blue-700' : 'bg-gray-300 hover:bg-gray-400'"
                            class="w-2.5 h-2.5 rounded-full transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
                            role="tab"
                            aria-label="Testimonio {{ $i + 1 }}"
                        ></button>
                        @endforeach
                    </div>

                    <button
                        @click="next()"
                        class="p-2 rounded-full border border-gray-300 hover:bg-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
                        aria-label="Testimonio siguiente"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Alianzas --}}
    @if($alliances->isNotEmpty())
    <section class="py-16 px-4" aria-labelledby="alliances-heading">
        <div class="max-w-5xl mx-auto text-center">
            <h2 id="alliances-heading" class="text-2xl font-bold text-gray-900 mb-10">Nuestras alianzas</h2>
            <div class="flex flex-wrap justify-center items-center gap-8">
                @foreach($alliances as $alliance)
                <div class="flex items-center justify-center">
                    @if($alliance->url)
                    <a href="{{ $alliance->url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $alliance->name }}">
                        <img
                            src="{{ asset('img/' . $alliance->logo) }}"
                            alt="{{ $alliance->name }}"
                            class="h-14 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100"
                        >
                    </a>
                    @else
                    <img
                        src="{{ asset('img/' . $alliance->logo) }}"
                        alt="{{ $alliance->name }}"
                        class="h-14 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100"
                    >
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Servicios --}}
    <section class="bg-blue-50 py-16 px-4" aria-labelledby="cta-heading">
        <div class="max-w-3xl mx-auto text-center">
            <h2 id="cta-heading" class="text-3xl font-bold text-gray-900 mb-4">
                ¿Listo para aprender LESCO?
            </h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Descubrí todos nuestros talleres y programas de formación, diseñados para adaptarse a tus necesidades.
            </p>
            <a
                href="{{ route('services.index') }}"
                class="inline-flex items-center justify-center px-8 py-3 bg-blue-900 text-white font-semibold rounded-full hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-900 focus-visible:ring-offset-2"
            >
                Ver todos los servicios
            </a>
        </div>
    </section>

@endsection

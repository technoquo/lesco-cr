@extends('layouts.app')

@section('title', 'Servicios y talleres — LESCO por Costa Rica')

@section('meta')
    <x-seo-meta
        title="Servicios y talleres — LESCO por Costa Rica"
        description="Talleres virtuales y programas de formación en Lengua de Señas Costarricense (LESCO) para personas, empresas e instituciones."
    />
@endsection

@section('content')

    <div class="bg-blue-900 text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold">Servicios y talleres</h1>
            <p class="mt-4 text-blue-200 text-lg max-w-2xl mx-auto">
                Formación en LESCO adaptada a personas, empresas e instituciones. Elegí el programa que mejor se ajuste a tus necesidades.
            </p>
        </div>
    </div>

    {{-- Galería visual --}}
    <section class="py-10 px-4" aria-label="Nuestras actividades en LESCO">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:grid-rows-2 md:h-80">

                <div class="relative rounded-2xl overflow-hidden aspect-video md:col-span-2 md:row-span-2 md:aspect-auto">
                    <img
                        src="{{ asset('storage/imported/ensenando.jpg') }}"
                        alt="Instructora enseñando Lengua de Señas Costarricense"
                        class="absolute inset-0 w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 via-transparent to-transparent"></div>
                    <p class="absolute bottom-5 left-5 text-white font-semibold text-base">Instructoras certificadas en LESCO</p>
                </div>

                <div class="relative rounded-2xl overflow-hidden aspect-video md:aspect-auto">
                    <img
                        src="{{ asset('storage/imported/laptop.jpg') }}"
                        alt="Talleres virtuales de LESCO"
                        class="absolute inset-0 w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 via-transparent to-transparent"></div>
                    <p class="absolute bottom-3 left-3 text-white text-sm font-semibold">Modalidad virtual</p>
                </div>

                <div class="relative rounded-2xl overflow-hidden aspect-video md:aspect-auto">
                    <img
                        src="{{ asset('storage/imported/lesco.jpg') }}"
                        alt="Comunidad y cultura LESCO"
                        class="absolute inset-0 w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 via-transparent to-transparent"></div>
                    <p class="absolute bottom-3 left-3 text-white text-sm font-semibold">Cultura sorda costarricense</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 px-4" aria-labelledby="services-heading">
        <h2 id="services-heading" class="sr-only">Listado de servicios</h2>
        <div class="max-w-6xl mx-auto">

            @if($services->isEmpty())
                <p class="text-center text-gray-500 py-12">No hay servicios disponibles en este momento.</p>
            @else
                <ul class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2" role="list">
                    @foreach($services as $service)
                    <li>
                        <x-service-card :service="$service" class="h-full" />
                    </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </section>

    {{-- CTA Contacto --}}
    <section class="bg-blue-50 py-16 px-4" aria-labelledby="contact-cta-heading">
        <div class="max-w-3xl mx-auto text-center">
            <h2 id="contact-cta-heading" class="text-2xl font-bold text-gray-900 mb-3">
                ¿Tenés preguntas sobre nuestros servicios?
            </h2>
            <p class="text-gray-600 mb-6">Escribinos y te respondemos con gusto.</p>
            <a
                href="/contacto"
                class="inline-flex items-center justify-center px-8 py-3 bg-blue-900 text-white font-semibold rounded-full hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-900 focus-visible:ring-offset-2"
            >
                Contactar
            </a>
        </div>
    </section>

@endsection

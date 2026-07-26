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

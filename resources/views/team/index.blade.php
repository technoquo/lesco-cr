@extends('layouts.app')

@section('title', 'Nuestro equipo — LESCO por Costa Rica')

@section('meta')
    <x-seo-meta
        title="Nuestro equipo — LESCO por Costa Rica"
        description="Conocé al equipo detrás de LESCO por Costa Rica, comprometidos con la enseñanza de la Lengua de Señas Costarricense."
    />
@endsection

@section('content')

    <div class="bg-blue-900 text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold">Nuestro equipo</h1>
            <p class="mt-4 text-blue-200 text-lg">Las personas detrás de LESCO por Costa Rica.</p>
        </div>
    </div>

    <section class="py-16 px-4" aria-labelledby="team-heading">
        <h2 id="team-heading" class="sr-only">Integrantes del equipo</h2>
        <div class="max-w-6xl mx-auto">

            @if($members->isEmpty())
                <p class="text-center text-gray-500 py-12">
                    El contenido de esta sección está siendo preparado. Volvé pronto.
                </p>
            @else
                <ul class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3" role="list">
                    @foreach($members as $member)
                    <li class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-center">
                        @if($member->photo)
                            <img
                                src="{{ asset('storage/' . $member->photo) }}"
                                alt="Foto de {{ $member->name }}"
                                class="w-24 h-24 rounded-full object-cover mx-auto mb-4"
                            >
                        @else
                            <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-4" aria-hidden="true">
                                <span class="text-blue-600 font-bold text-3xl">{{ mb_substr($member->name, 0, 1) }}</span>
                            </div>
                        @endif

                        <h3 class="text-lg font-bold text-gray-900">{{ $member->name }}</h3>
                        <p class="text-sm text-blue-700 font-medium mt-1">{{ $member->role }}</p>

                        @if($member->bio)
                            <p class="text-sm text-gray-600 mt-3 leading-relaxed">{{ $member->bio }}</p>
                        @endif
                    </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </section>

@endsection

@extends('layouts.app')

@section('title', $post->title . ' — LESCO por Costa Rica')

@section('meta')
    <x-seo-meta
        :title="$post->title . ' — LESCO por Costa Rica'"
        :description="$post->excerpt"
        :image="$post->featured_image ? asset('storage/' . $post->featured_image) : null"
    />
@endsection

@section('content')

    {{-- Encabezado del post --}}
    <header class="bg-blue-900 text-white py-16 px-4">
        <div class="max-w-3xl mx-auto">
            <a
                href="{{ route('blog.index') }}"
                class="inline-flex items-center text-blue-200 hover:text-white text-sm font-medium mb-6 transition-colors group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver al blog
            </a>

            <time
                datetime="{{ $post->published_at->toDateString() }}"
                class="block text-blue-300 text-sm font-medium uppercase tracking-wide mb-3"
            >
                {{ $post->published_at->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
            </time>

            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">{{ $post->title }}</h1>

            @if($post->excerpt)
                <p class="mt-4 text-blue-100 text-lg leading-relaxed">{{ $post->excerpt }}</p>
            @endif
        </div>
    </header>

    {{-- Imagen destacada --}}
    @if($post->featured_image)
        <div class="max-w-4xl mx-auto px-4 -mt-8">
            <img
                src="{{ asset('storage/' . $post->featured_image) }}"
                alt="{{ $post->title }}"
                class="w-full max-h-96 object-cover rounded-2xl shadow-lg"
            >
        </div>
    @endif

    {{-- Contenido --}}
    <article class="max-w-3xl mx-auto px-4 py-12">
        <div class="blog-content">
            {!! $post->content !!}
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <a
                href="{{ route('blog.index') }}"
                class="inline-flex items-center text-sm font-semibold text-blue-700 hover:text-blue-900 transition-colors group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver al blog
            </a>
        </div>
    </article>

@endsection

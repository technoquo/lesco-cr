@extends('layouts.app')

@section('title', 'Blog — LESCO por Costa Rica')

@section('meta')
    <x-seo-meta
        title="Blog — LESCO por Costa Rica"
        description="Artículos y noticias sobre la Lengua de Señas Costarricense, cultura sorda e inclusión."
    />
@endsection

@section('content')

    <div class="bg-blue-900 text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold">Blog</h1>
            <p class="mt-4 text-blue-200 text-lg">Artículos sobre LESCO, cultura sorda e inclusión.</p>
        </div>
    </div>

    <section class="py-16 px-4" aria-labelledby="posts-heading">
        <h2 id="posts-heading" class="sr-only">Entradas del blog</h2>
        <div class="max-w-6xl mx-auto">

            @if($posts->isEmpty())
                <p class="text-center text-gray-500 py-12">No hay entradas publicadas aún.</p>
            @else
                <ul class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3" role="list">
                    @foreach($posts as $post)
                    <li>
                        <article class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col h-full hover:shadow-md transition-shadow">

                            @if($post->featured_image)
                                <img
                                    src="{{ asset('storage/' . $post->featured_image) }}"
                                    alt=""
                                    class="w-full h-48 object-cover"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-48 bg-blue-50 flex items-center justify-center" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                            @endif

                            <div class="p-6 flex flex-col flex-1">
                                <time
                                    datetime="{{ $post->published_at->toDateString() }}"
                                    class="text-xs font-medium text-blue-700 uppercase tracking-wide mb-2 block"
                                >
                                    {{ $post->published_at->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                                </time>

                                <h3 class="text-lg font-bold text-gray-900 leading-snug mb-3">
                                    <a
                                        href="{{ route('blog.show', $post) }}"
                                        class="hover:text-blue-700 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                                    >
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                @if($post->excerpt)
                                    <p class="text-gray-600 text-sm leading-relaxed flex-1 line-clamp-3">
                                        {{ $post->excerpt }}
                                    </p>
                                @endif

                                <a
                                    href="{{ route('blog.show', $post) }}"
                                    class="mt-4 inline-flex items-center text-sm font-semibold text-blue-700 hover:text-blue-900 transition-colors group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                                    aria-label="Leer más: {{ $post->title }}"
                                >
                                    Leer más
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>

                @if($posts->hasPages())
                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>
                @endif
            @endif

        </div>
    </section>

@endsection

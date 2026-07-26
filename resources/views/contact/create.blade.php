@extends('layouts.app')

@section('title', 'Contacto — LESCO por Costa Rica')

@section('meta')
    <x-seo-meta
        title="Contacto — LESCO por Costa Rica"
        description="Escribinos y te respondemos. Estamos disponibles para consultas sobre nuestros talleres y servicios de LESCO."
    />
@endsection

@section('content')

    <div class="bg-blue-900 text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold">Contacto</h1>
            <p class="mt-4 text-blue-200 text-lg">Escribinos y te respondemos a la brevedad.</p>
        </div>
    </div>

    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 gap-12 lg:grid-cols-3">

            {{-- Formulario --}}
            <div class="lg:col-span-2">

                {{-- Mensaje de éxito --}}
                @if(session('success'))
                    <div
                        class="mb-8 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3"
                        role="alert"
                        aria-live="polite"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    novalidate
                    aria-label="Formulario de contacto"
                >
                    @csrf

                    {{-- Honeypot: oculto para humanos, visible para bots --}}
                    <div aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;">
                        <label for="website">No completar este campo</label>
                        <input type="text" id="website" name="website" value="" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="space-y-6">

                        {{-- Nombre --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Nombre completo <span class="text-red-500" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                class="w-full rounded-xl border px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow
                                    {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-300 bg-white' }}"
                                aria-describedby="{{ $errors->has('name') ? 'name-error' : '' }}"
                                aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                                placeholder="Tu nombre"
                            >
                            @error('name')
                                <p id="name-error" class="mt-1.5 text-sm text-red-600" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Correo --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Correo electrónico <span class="text-red-500" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                class="w-full rounded-xl border px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow
                                    {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-300 bg-white' }}"
                                aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}"
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                                placeholder="tucorreo@ejemplo.com"
                            >
                            @error('email')
                                <p id="email-error" class="mt-1.5 text-sm text-red-600" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Mensaje --}}
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Mensaje <span class="text-red-500" aria-hidden="true">*</span>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                class="w-full rounded-xl border px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow resize-y
                                    {{ $errors->has('message') ? 'border-red-400 bg-red-50' : 'border-gray-300 bg-white' }}"
                                aria-describedby="{{ $errors->has('message') ? 'message-error' : '' }}"
                                aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}"
                                placeholder="¿En qué podemos ayudarte?"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p id="message-error" class="mt-1.5 text-sm text-red-600" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="w-full sm:w-auto px-8 py-3 bg-blue-900 text-white font-semibold rounded-full hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-900 focus-visible:ring-offset-2"
                        >
                            Enviar mensaje
                        </button>

                    </div>
                </form>
            </div>

            {{-- Info de contacto --}}
            <aside aria-label="Información de contacto">
                <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 space-y-6">
                    <h2 class="text-lg font-bold text-gray-900">Información de contacto</h2>

                    <div class="space-y-4 text-sm text-gray-600">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <address class="not-italic leading-relaxed">San José, Costa Rica</address>
                        </div>

                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:+50600000000" class="hover:text-blue-700 transition-colors">+506 0000-0000</a>
                        </div>

                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:info@lescoporcostarica.com" class="hover:text-blue-700 transition-colors break-all">
                                info@lescoporcostarica.com
                            </a>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-sm font-semibold text-gray-700 mb-3">Redes sociales</p>
                        <div class="flex gap-4">
                            <a
                                href="https://www.facebook.com/lescoporcostarica"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-sm text-blue-700 hover:text-blue-900 transition-colors underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                                aria-label="Facebook (abre en nueva pestaña)"
                            >Facebook</a>
                            <a
                                href="https://www.instagram.com/lescoporcostarica"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-sm text-blue-700 hover:text-blue-900 transition-colors underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                                aria-label="Instagram (abre en nueva pestaña)"
                            >Instagram</a>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </section>

@endsection

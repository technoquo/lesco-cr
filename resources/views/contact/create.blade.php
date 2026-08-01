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
                            <a href="tel:+50686394542" class="hover:text-blue-700 transition-colors">+506 8639 4542</a>
                        </div>

                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.531 5.845L.057 23.571a.5.5 0 00.372.429h.078a.5.5 0 00.249-.067l5.882-1.519A11.938 11.938 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.882a9.878 9.878 0 01-5.031-1.376l-.36-.214-3.733.964.992-3.614-.236-.373A9.836 9.836 0 012.118 12C2.118 6.533 6.533 2.118 12 2.118S21.882 6.533 21.882 12 17.467 21.882 12 21.882z"/>
                            </svg>
                            <a href="https://wa.me/50686394542" target="_blank" rel="noopener noreferrer" class="hover:text-green-600 transition-colors">
                                WhatsApp: +506 8639 4542
                            </a>
                        </div>

                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:cursos@lescoporcostarica.com" class="hover:text-blue-700 transition-colors break-all">
                                cursos@lescoporcostarica.com
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
                                class="text-blue-600 hover:text-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                                aria-label="Facebook (abre en nueva pestaña)"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987H7.898V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/lescoporcostarica"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-pink-500 hover:text-pink-700 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-pink-500 rounded"
                                aria-label="Instagram (abre en nueva pestaña)"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </section>

@endsection

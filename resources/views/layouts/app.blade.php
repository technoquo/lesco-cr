<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    @yield('meta')
    @yield('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <a href="#main-content" class="skip-link">Saltar al contenido principal</a>

    <x-accessibility-widget />

    <header class="bg-blue-900 text-white shadow-md" role="banner">
        <nav
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
            x-data="{ menuOpen: false }"
            aria-label="Navegación principal"
        >
            <div class="flex items-center justify-between h-24">

                {{-- Logo --}}
                <a
                    href="{{ route('home') }}"
                    class="focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
                >
                     <span class="flex items-center justify-center bg-white rounded-full w-20 h-20 p-2 shadow mb-3">
                        <img src="{{ asset('img/logo_lescoporcostarica.png') }}" alt="LESCO por Costa Rica" class="w-full h-full object-contain">
                    </span>
                </a>

                {{-- Navegación escritorio --}}
                <ul class="hidden md:flex items-center gap-7 text-sm font-medium" role="list">
                    <li>
                        <a href="{{ route('home') }}" class="text-white/90 hover:text-white hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded px-1">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="/equipo" class="text-white/90 hover:text-white hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded px-1">
                            Equipo
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="text-white/90 hover:text-white hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded px-1">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/servicios" class="text-white/90 hover:text-white hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded px-1">
                            Servicios
                        </a>
                    </li>
                    <li>
                        <a href="/contacto" class="text-white/90 hover:text-white hover:underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded px-1">
                            Contacto
                        </a>
                    </li>
                </ul>

                {{-- Botón hamburguesa --}}
                <button
                    @click="menuOpen = !menuOpen"
                    :aria-expanded="menuOpen.toString()"
                    aria-controls="mobile-menu"
                    class="md:hidden p-2 rounded-md text-white hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white"
                    :aria-label="menuOpen ? 'Cerrar menú' : 'Abrir menú'"
                >
                    <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="menuOpen" style="display:none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Menú móvil --}}
            <div
                id="mobile-menu"
                x-show="menuOpen"
                x-transition:enter="transition duration-200 ease-out"
                x-transition:enter-start="opacity-0 -translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition duration-150 ease-in"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-1"
                @keydown.escape.window="menuOpen = false"
                style="display:none"
                class="md:hidden pb-4 border-t border-blue-800 mt-1 pt-3"
            >
                <ul class="flex flex-col gap-1" role="list">
                    <li>
                        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-white/90 hover:text-white hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="/equipo" class="block px-3 py-2 rounded-md text-white/90 hover:text-white hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
                            Equipo
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="block px-3 py-2 rounded-md text-white/90 hover:text-white hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/servicios" class="block px-3 py-2 rounded-md text-white/90 hover:text-white hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
                            Servicios
                        </a>
                    </li>
                    <li>
                        <a href="/contacto" class="block px-3 py-2 rounded-md text-white/90 hover:text-white hover:bg-blue-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
                            Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main-content" tabindex="-1" class="flex-1 focus-visible:outline-none">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Marca --}}
                <div>
                    <span class="flex items-center justify-center bg-white rounded-full w-20 h-20 p-2 shadow mb-3">
                        <img src="{{ asset('img/logo_lescoporcostarica.png') }}" alt="LESCO por Costa Rica" class="w-full h-full object-contain">
                    </span>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Promovemos el aprendizaje y la difusión de la Lengua de Señas Costarricense para construir una sociedad más inclusiva.
                    </p>
                </div>

                {{-- Contacto --}}
                <div>
                    <h2 class="text-white font-semibold text-sm mb-3">Contacto</h2>
                    <address class="not-italic text-sm space-y-2 text-gray-400">
                        <p>San José, Costa Rica</p>
                        <p>
                            <a href="tel:+50686394542" class="hover:text-white transition-colors underline">
                                +506 8639 4542
                            </a>
                        </p>
                        <p>
                            <a href="https://wa.me/50686394542" target="_blank" rel="noopener noreferrer" class="hover:text-green-400 transition-colors underline">
                                WhatsApp: +506 8639 4542
                            </a>
                        </p>
                        <p>
                            <a href="mailto:cursos@lescoporcostarica.com" class="hover:text-white transition-colors underline">
                                cursos@lescoporcostarica.com
                            </a>
                        </p>
                    </address>
                </div>

                {{-- Redes sociales --}}
                <div>
                    <h2 class="text-white font-semibold text-sm mb-3">Síguenos</h2>
                    <div class="flex gap-4 text-gray-400">
                        <a
                            href="https://www.facebook.com/lescoporcostarica"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="hover:text-blue-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
                            aria-label="Síguenos en Facebook (abre en nueva pestaña)"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987H7.898V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a
                            href="https://www.instagram.com/lescoporcostarica"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="hover:text-pink-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
                            aria-label="Síguenos en Instagram (abre en nueva pestaña)"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-800 text-xs text-center text-gray-500">
                &copy; {{ date('Y') }} LESCO por Costa Rica. Todos los derechos reservados.
            </div>
        </div>
    </footer>

</body>
</html>

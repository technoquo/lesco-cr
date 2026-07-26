<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
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
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a
                    href="{{ route('home') }}"
                    class="text-lg font-bold tracking-tight hover:text-blue-200 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
                >
                    LESCO por Costa Rica
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
                    <p class="text-white font-bold text-base mb-3">LESCO por Costa Rica</p>
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
                            <a href="tel:+50600000000" class="hover:text-white transition-colors underline">
                                +506 0000-0000
                            </a>
                        </p>
                        <p>
                            <a href="mailto:info@lescoporcostarica.com" class="hover:text-white transition-colors underline">
                                info@lescoporcostarica.com
                            </a>
                        </p>
                    </address>
                </div>

                {{-- Redes sociales --}}
                <div>
                    <h2 class="text-white font-semibold text-sm mb-3">Síguenos</h2>
                    <div class="flex flex-col gap-2 text-sm text-gray-400">
                        <a
                            href="https://www.facebook.com/lescoporcostarica"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="hover:text-white transition-colors underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
                            aria-label="Síguenos en Facebook (abre en nueva pestaña)"
                        >
                            Facebook
                        </a>
                        <a
                            href="https://www.instagram.com/lescoporcostarica"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="hover:text-white transition-colors underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white rounded"
                            aria-label="Síguenos en Instagram (abre en nueva pestaña)"
                        >
                            Instagram
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

<div
    x-data="accessibilityWidget"
    class="fixed bottom-5 right-5 z-50"
    role="region"
    aria-label="Herramientas de accesibilidad"
>
    {{-- Toggle button --}}
    <button
        @click="open = !open"
        :aria-expanded="open.toString()"
        aria-controls="a11y-panel"
        class="flex items-center justify-center w-12 h-12 bg-blue-900 text-white rounded-full shadow-lg hover:bg-blue-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500 transition-colors"
        title="Opciones de accesibilidad"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="12" cy="4" r="1.5" fill="currentColor" stroke="none"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5m0 0-3 5m3-5 3 5M9 11H7m10 0h-2"/>
        </svg>
        <span class="sr-only">Opciones de accesibilidad</span>
    </button>

    {{-- Panel --}}
    <div
        id="a11y-panel"
        x-show="open"
        x-transition:enter="transition duration-150 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @keydown.escape.window="open = false"
        @click.outside="open = false"
        style="display: none"
        class="absolute bottom-14 right-0 w-68 bg-white rounded-2xl shadow-xl border border-gray-200 p-5 space-y-4 origin-bottom-right"
        role="dialog"
        aria-label="Panel de accesibilidad"
    >
        <h2 class="text-sm font-semibold text-gray-800">Accesibilidad</h2>

        {{-- Font size --}}
        <div>
            <p class="text-xs text-gray-500 mb-2">Tamaño de letra</p>
            <div class="flex items-center gap-2">
                <button
                    @click="decrease()"
                    :disabled="fontSize <= -2"
                    class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 font-bold text-base hover:bg-gray-100 disabled:opacity-40 disabled:cursor-not-allowed transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
                    aria-label="Reducir tamaño de letra"
                >
                    A−
                </button>
                <span
                    class="flex-1 text-center text-sm text-gray-600 tabular-nums"
                    x-text="(fontSize > 0 ? '+' : '') + (fontSize * 10) + '%'"
                    aria-live="polite"
                ></span>
                <button
                    @click="increase()"
                    :disabled="fontSize >= 3"
                    class="w-9 h-9 flex items-center justify-center rounded-lg border border-gray-300 text-gray-700 font-bold text-base hover:bg-gray-100 disabled:opacity-40 disabled:cursor-not-allowed transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
                    aria-label="Aumentar tamaño de letra"
                >
                    A+
                </button>
            </div>
        </div>

        {{-- High contrast --}}
        <div class="flex items-center justify-between gap-3">
            <span class="text-sm text-gray-700">Alto contraste</span>
            <button
                @click="toggleContrast()"
                :aria-pressed="highContrast.toString()"
                :class="highContrast ? 'bg-blue-700' : 'bg-gray-300'"
                class="relative inline-flex h-6 w-11 flex-shrink-0 items-center rounded-full transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                role="switch"
                aria-label="Activar alto contraste"
            >
                <span
                    :class="highContrast ? 'translate-x-6' : 'translate-x-1'"
                    class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform"
                ></span>
            </button>
        </div>

        {{-- Grayscale --}}
        <div class="flex items-center justify-between gap-3">
            <span class="text-sm text-gray-700">Escala de grises</span>
            <button
                @click="toggleGrayscale()"
                :aria-pressed="grayscale.toString()"
                :class="grayscale ? 'bg-blue-700' : 'bg-gray-300'"
                class="relative inline-flex h-6 w-11 flex-shrink-0 items-center rounded-full transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                role="switch"
                aria-label="Activar escala de grises"
            >
                <span
                    :class="grayscale ? 'translate-x-6' : 'translate-x-1'"
                    class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform"
                ></span>
            </button>
        </div>

        {{-- Reset --}}
        <button
            @click="reset()"
            class="w-full text-xs text-gray-400 hover:text-gray-600 underline transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
        >
            Restablecer valores
        </button>
    </div>
</div>

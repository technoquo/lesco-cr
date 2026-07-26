@props(['service'])

<article {{ $attributes->merge(['class' => 'bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col']) }}>
    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->title }}</h3>

    <p class="text-gray-600 leading-relaxed flex-1 mb-4">{{ $service->description }}</p>

    @if($service->target_population)
        <p class="text-sm text-blue-700 font-medium mb-3">
            <span class="sr-only">Dirigido a: </span>{{ $service->target_population }}
        </p>
    @endif

    <div class="mt-auto pt-4 border-t border-gray-100">
        @if($service->price_label)
            <span class="text-lg font-bold text-gray-900">{{ $service->price_label }}</span>
        @endif
    </div>
</article>

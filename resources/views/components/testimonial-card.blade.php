@props(['testimonial'])

<div {{ $attributes->merge(['class' => 'bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center max-w-2xl mx-auto']) }}>
    @if($testimonial->photo)
        <img
            src="{{ asset('img/' . $testimonial->photo) }}"
            alt="Foto de {{ $testimonial->name }}"
            class="w-16 h-16 rounded-full object-cover mx-auto mb-4"
        >
    @else
        <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-4" aria-hidden="true">
            <span class="text-blue-600 font-bold text-xl">{{ mb_substr($testimonial->name, 0, 1) }}</span>
        </div>
    @endif

    <blockquote class="text-gray-700 text-base leading-relaxed italic mb-6">
        "{{ $testimonial->content }}"
    </blockquote>

    <cite class="not-italic">
        <span class="font-semibold text-gray-900 block">{{ $testimonial->name }}</span>
        @if($testimonial->role)
            <span class="text-sm text-gray-500">{{ $testimonial->role }}</span>
        @endif
    </cite>
</div>

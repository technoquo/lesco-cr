@props([
    'title'       => null,
    'description' => null,
    'image'       => null,
])

@php
    $resolvedTitle = $title ?? config('app.name');
@endphp

<link rel="canonical" href="{{ request()->url() }}">
<meta name="description" content="{{ $description ?? 'LESCO por Costa Rica — promovemos el aprendizaje de la Lengua de Señas Costarricense.' }}">

<meta property="og:title"       content="{{ $resolvedTitle }}">
<meta property="og:description" content="{{ $description ?? 'LESCO por Costa Rica — promovemos el aprendizaje de la Lengua de Señas Costarricense.' }}">
<meta property="og:url"         content="{{ request()->url() }}">
<meta property="og:type"        content="website">
<meta property="og:site_name"   content="{{ config('app.name') }}">
<meta property="og:locale"      content="es_CR">
@if($image)
<meta property="og:image" content="{{ $image }}">
@endif

<meta name="twitter:card"  content="summary_large_image">
<meta name="twitter:title" content="{{ $resolvedTitle }}">
@if($description)
<meta name="twitter:description" content="{{ $description }}">
@endif
@if($image)
<meta name="twitter:image" content="{{ $image }}">
@endif

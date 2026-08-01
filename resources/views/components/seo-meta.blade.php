@props([
    'title'       => null,
    'description' => null,
    'image'       => null,
    'imageWidth'  => null,
    'imageHeight' => null,
    'imageType'   => null,
    'publisher'   => null,
    'modifiedTime'=> null,
])

@php
    $resolvedTitle       = $title ?? config('app.name');
    $resolvedDescription = $description ?? 'LESCO por Costa Rica — promovemos el aprendizaje de la Lengua de Señas Costarricense.';
    $resolvedPublisher   = $publisher ?? 'https://www.facebook.com/lescoxcr';
@endphp

<link rel="canonical" href="{{ request()->url() }}">
<meta name="description" content="{{ $resolvedDescription }}">

<meta property="og:locale"      content="es_ES">
<meta property="og:type"        content="website">
<meta property="og:title"       content="{{ $resolvedTitle }}">
<meta property="og:description" content="{{ $resolvedDescription }}">
<meta property="og:url"         content="{{ request()->url() }}">
<meta property="og:site_name"   content="{{ config('app.name') }}">
<meta property="article:publisher" content="{{ $resolvedPublisher }}">
@if($modifiedTime)
<meta property="article:modified_time" content="{{ $modifiedTime }}">
@endif
@if($image)
<meta property="og:image"       content="{{ $image }}">
@if($imageWidth)
<meta property="og:image:width" content="{{ $imageWidth }}">
@endif
@if($imageHeight)
<meta property="og:image:height" content="{{ $imageHeight }}">
@endif
<meta property="og:image:type"  content="{{ $imageType ?? 'image/jpeg' }}">
@endif

<meta name="twitter:card"  content="summary_large_image">
<meta name="twitter:title" content="{{ $resolvedTitle }}">
<meta name="twitter:description" content="{{ $resolvedDescription }}">
@if($image)
<meta name="twitter:image" content="{{ $image }}">
@endif

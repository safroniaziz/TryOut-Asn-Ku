@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'url' => null,
    'type' => 'website',
    'noindex' => false,
    'nofollow' => false,
])

@php
    $seoService = app(\App\Services\SeoService::class);
    
    $meta = $seoService->generateMetaTags([
        'title' => $title,
        'description' => $description,
        'keywords' => $keywords,
        'image' => $image,
        'url' => $url,
        'type' => $type,
    ]);
    
    $og = $seoService->generateOpenGraphTags($meta);
    $twitter = $seoService->generateTwitterCardTags($meta);
    $canonical = $seoService->generateCanonicalUrl($url);
    $robotsMeta = $seoService->generateRobotsMeta(!$noindex, !$nofollow);
@endphp

{{-- Primary Meta Tags --}}
<title>{{ $meta['title'] }}</title>
<meta name="title" content="{{ $meta['title'] }}">
<meta name="description" content="{{ $meta['description'] }}">
<meta name="keywords" content="{{ $meta['keywords'] }}">
<meta name="robots" content="{{ $robotsMeta }}">
<meta name="googlebot" content="{{ $robotsMeta }}">
<meta name="author" content="{{ config('app.name') }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph / Facebook --}}
@foreach($og as $property => $content)
<meta property="{{ $property }}" content="{{ $content }}">
@endforeach

{{-- Twitter --}}
@foreach($twitter as $name => $content)
<meta name="{{ $name }}" content="{{ $content }}">
@endforeach

{{-- Additional SEO Tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="Indonesian">
<meta name="revisit-after" content="7 days">

{{-- Geographic Tags for Local SEO --}}
<meta name="geo.region" content="ID">
<meta name="geo.placename" content="Indonesia">

{{-- Theme Color --}}
<meta name="theme-color" content="#4F46E5">
<meta name="msapplication-TileColor" content="#4F46E5">

{{-- Slot untuk additional meta tags --}}
{{ $slot }}

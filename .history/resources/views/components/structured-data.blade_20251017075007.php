@props([
    'type' => 'website',
    'data' => [],
])

@php
    $seoService = app(\App\Services\SeoService::class);
    $structuredData = $seoService->generateStructuredData($type, $data);
@endphp

@if(!empty($structuredData))
<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif

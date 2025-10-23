@extends('layouts.app')

@push('seo-meta')
<x-seo-meta
    title="{{ config('app.name') }} - Platform Tryout ASN CPNS PPPK Terbaik di Indonesia"
    description="Persiapkan diri Anda untuk tes CPNS, PPPK, dan Kedinasan dengan tryout online terlengkap. Soal terbaru, pembahasan detail, leaderboard kompetitif, dan 100% GRATIS!"
    keywords="tryout asn, cpns 2024, pppk 2024, kedinasan, latihan soal asn, tes cpns online, soal cpns gratis, tryout cpns, belajar asn, soal pppk"
    :image="asset('images/og-homepage.jpg')"
/>
@endpush

@push('structured-data')
{{-- Website Schema --}}
<x-structured-data type="website" />

{{-- Organization Schema --}}
<x-structured-data type="organization" />

{{-- FAQ Schema (contoh) --}}
<x-structured-data 
    type="faq" 
    :data="[
        'questions' => [
            [
                '@type' => 'Question',
                'name' => 'Apakah tryout ASN di platform ini gratis?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Ya, kami menyediakan tryout gratis untuk persiapan CPNS dan PPPK dengan pembahasan lengkap.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Berapa jumlah soal dalam satu tryout?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Setiap tryout memiliki jumlah soal yang bervariasi, umumnya 100-150 soal sesuai dengan standar tes ASN.'
                ]
            ]
        ]
    ]" 
/>
@endpush

@section('content')
{{-- Existing content --}}
<div class="min-h-screen">
    {{-- Your existing homepage content here --}}
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-6">
            Platform Tryout ASN CPNS PPPK Terbaik
        </h1>
        
        <p class="text-lg text-center text-gray-700 mb-8">
            Persiapkan diri Anda dengan tryout online terlengkap untuk tes CPNS, PPPK, dan Kedinasan
        </p>
        
        {{-- Rest of your content --}}
    </div>
</div>
@endsection

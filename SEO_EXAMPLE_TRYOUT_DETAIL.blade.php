{{--
    Contoh Implementasi SEO untuk Halaman Detail Tryout
    Copy code ini dan sesuaikan dengan view tryout detail Anda
--}}

@extends('layouts.app')

{{-- SEO Meta Tags --}}
@push('seo-meta')
<x-seo-meta
    :title="$tryout->nama . ' - Tryout ASN ' . config('app.name')"
    :description="'Kerjakan tryout ' . $tryout->nama . ' dengan ' . ($tryout->soals_count ?? $tryout->soals->count()) . ' soal pilihan ganda. Gratis pembahasan lengkap dan detail. Persiapan terbaik untuk CPNS dan PPPK 2024!'"
    :keywords="'tryout ' . strtolower($tryout->nama) . ', latihan soal asn, cpns 2024, pppk 2024, ' . strtolower($tryout->jenis ?? 'kedinasan')"
    :image="$tryout->thumbnail ?? asset('images/og-tryout.jpg')"
    type="article"
/>
@endpush

{{-- Structured Data --}}
@push('structured-data')
{{-- Course Schema untuk Tryout --}}
<x-structured-data
    type="course"
    :data="[
        'name' => $tryout->nama,
        'description' => $tryout->deskripsi ?? 'Tryout ASN untuk persiapan CPNS dan PPPK dengan soal pilihan ganda dan pembahasan lengkap'
    ]"
/>

{{-- Breadcrumb Schema --}}
<x-structured-data
    type="breadcrumb"
    :data="[
        'items' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => url('/')
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Tryout',
                'item' => url('/tryout')
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $tryout->nama,
                'item' => url()->current()
            ]
        ]
    ]"
/>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Breadcrumb (visible) --}}
    <nav class="text-sm mb-4" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li><a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800">Home</a></li>
            <li class="text-gray-500">/</li>
            <li><a href="{{ url('/tryout') }}" class="text-blue-600 hover:text-blue-800">Tryout</a></li>
            <li class="text-gray-500">/</li>
            <li class="text-gray-700">{{ $tryout->nama }}</li>
        </ol>
    </nav>

    {{-- Tryout Header with SEO-optimized headings --}}
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">
            {{ $tryout->nama }}
        </h1>

        @if($tryout->deskripsi)
        <div class="text-gray-700 mb-4">
            <h2 class="text-xl font-semibold mb-2">Deskripsi Tryout</h2>
            <p>{{ $tryout->deskripsi }}</p>
        </div>
        @endif

        {{-- Tryout Stats (good for engagement metrics) --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
            <div class="text-center p-4 bg-blue-50 rounded-lg">
                <div class="text-2xl font-bold text-blue-600">
                    {{ $tryout->soals_count ?? $tryout->soals->count() }}
                </div>
                <div class="text-sm text-gray-600">Total Soal</div>
            </div>

            <div class="text-center p-4 bg-green-50 rounded-lg">
                <div class="text-2xl font-bold text-green-600">
                    {{ $tryout->durasi ?? 90 }} Menit
                </div>
                <div class="text-sm text-gray-600">Durasi</div>
            </div>

            <div class="text-center p-4 bg-purple-50 rounded-lg">
                <div class="text-2xl font-bold text-purple-600">
                    {{ $tryout->participants_count ?? 0 }}
                </div>
                <div class="text-sm text-gray-600">Peserta</div>
            </div>

            <div class="text-center p-4 bg-orange-50 rounded-lg">
                <div class="text-2xl font-bold text-orange-600">
                    Gratis
                </div>
                <div class="text-sm text-gray-600">Biaya</div>
            </div>
        </div>

        {{-- CTA Button (important for conversion) --}}
        <div class="mt-6">
            <a href="{{ route('tryout.start', $tryout->id) }}"
               class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Mulai Tryout Sekarang
            </a>
        </div>
    </div>

    {{-- Materi/Topics Covered (good for keywords) --}}
    @if($tryout->materis && $tryout->materis->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Materi yang Diujikan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($tryout->materis as $materi)
            <div class="flex items-center space-x-2 p-3 bg-gray-50 rounded-lg">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-sm text-gray-700">{{ $materi->judul }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Leaderboard (social proof) --}}
    @if($leaderboard && $leaderboard->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Leaderboard</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rank</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Skor</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($leaderboard as $index => $entry)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            #{{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $entry->user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $entry->skor }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{-- FAQ Section (great for SEO + Rich Snippets) --}}
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Pertanyaan Umum</h2>

        <div class="space-y-4">
            <div class="border-b pb-4">
                <h3 class="font-semibold text-gray-900 mb-2">Apakah tryout ini gratis?</h3>
                <p class="text-gray-700">Ya, tryout ini sepenuhnya gratis termasuk pembahasan lengkap untuk setiap soal.</p>
            </div>

            <div class="border-b pb-4">
                <h3 class="font-semibold text-gray-900 mb-2">Berapa lama waktu pengerjaan?</h3>
                <p class="text-gray-700">Waktu pengerjaan tryout ini adalah {{ $tryout->durasi ?? 90 }} menit untuk {{ $tryout->soals_count ?? $tryout->soals->count() }} soal.</p>
            </div>

            <div class="border-b pb-4">
                <h3 class="font-semibold text-gray-900 mb-2">Apakah ada pembahasan?</h3>
                <p class="text-gray-700">Ya, setiap soal dilengkapi dengan pembahasan detail yang bisa Anda akses setelah menyelesaikan tryout.</p>
            </div>

            <div class="pb-4">
                <h3 class="font-semibold text-gray-900 mb-2">Apakah saya perlu daftar?</h3>
                <p class="text-gray-700">Ya, Anda perlu mendaftar terlebih dahulu untuk dapat mengikuti tryout dan menyimpan hasil Anda.</p>
            </div>
        </div>
    </div>

    {{-- Related Tryouts (internal linking for SEO) --}}
    @if($relatedTryouts && $relatedTryouts->count() > 0)
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Tryout Lainnya</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedTryouts as $related)
            <a href="{{ route('tryout.show', $related->id) }}"
               class="block bg-white rounded-lg shadow hover:shadow-lg transition p-6">
                <h3 class="font-semibold text-gray-900 mb-2">{{ $related->nama }}</h3>
                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($related->deskripsi, 100) }}</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span>{{ $related->soals_count ?? 0 }} soal</span>
                    <span class="text-blue-600 font-medium">Mulai →</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection

{{--
    SEO CHECKLIST untuk halaman ini:
    ✅ Unique title tag dengan keyword
    ✅ Meta description menarik (150-160 chars)
    ✅ H1 tag (hanya 1, di judul tryout)
    ✅ H2 tags untuk section headers
    ✅ H3 tags untuk FAQ
    ✅ Structured data (Course + Breadcrumb)
    ✅ Open Graph tags
    ✅ Twitter Card
    ✅ Internal links (related tryouts)
    ✅ Breadcrumb navigation
    ✅ FAQ section untuk rich snippets
    ✅ Social proof (leaderboard)
    ✅ Clear CTA
    ✅ Mobile responsive (Tailwind CSS)
    ✅ Semantic HTML
--}}

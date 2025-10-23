# Quick Start Guide - SEO Implementation

## 🚀 Langkah Cepat (5 Menit)

### 1. Generate Sitemap
```bash
./vendor/bin/sail artisan sitemap:generate
```

Sitemap Anda sekarang tersedia di: `http://localhost:8020/sitemap.xml`

### 2. Cek Robots.txt
Akses: `http://localhost:8020/robots.txt`

### 3. Update Homepage

Edit `resources/views/welcome.blade.php` (atau homepage Anda):

```blade
@extends('layouts.app')

@push('seo-meta')
<x-seo-meta
    title="{{ config('app.name') }} - Platform Tryout ASN CPNS PPPK Terbaik di Indonesia"
    description="Persiapkan diri Anda untuk tes CPNS, PPPK, dan Kedinasan dengan tryout online terlengkap. Soal terbaru, pembahasan detail, dan leaderboard kompetitif. Gratis!"
    keywords="tryout asn, cpns 2024, pppk 2024, kedinasan, latihan soal asn, tes cpns online, soal cpns gratis, tryout cpns, belajar asn"
    :image="asset('images/og-homepage.jpg')"
/>
@endpush

@push('structured-data')
<x-structured-data type="website" />
<x-structured-data type="organization" />
@endpush

@section('content')
    {{-- Content Anda --}}
@endsection
```

### 4. Update Halaman Tryout

Contoh untuk halaman detail tryout:

```blade
@extends('layouts.app')

@push('seo-meta')
<x-seo-meta
    :title="$tryout->nama . ' - Tryout ASN ' . config('app.name')"
    :description="'Kerjakan tryout ' . $tryout->nama . ' dengan soal pilihan ganda terlengkap. Gratis pembahasan detail dan leaderboard. Persiapan CPNS PPPK terbaik!'"
    :keywords="'tryout ' . strtolower($tryout->nama) . ', latihan soal asn, cpns, pppk, kedinasan'"
    :image="asset('images/og-tryout.jpg')"
    type="article"
/>
@endpush

@push('structured-data')
<x-structured-data 
    type="course" 
    :data="[
        'name' => $tryout->nama,
        'description' => 'Tryout ASN untuk persiapan CPNS dan PPPK'
    ]" 
/>

<x-structured-data 
    type="breadcrumb" 
    :data="[
        'items' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Tryout', 'item' => url('/tryout')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $tryout->nama, 'item' => url()->current()]
        ]
    ]" 
/>
@endpush

@section('content')
    {{-- Content tryout --}}
@endsection
```

## 📊 SEO Checker Tool

Cek skor SEO halaman Anda:

```javascript
// Gunakan di browser console atau buat form admin
fetch('/admin/seo/check-score', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
        title: 'Tryout ASN CPNS 2024 - Platform Terbaik',
        description: 'Latihan soal tryout ASN CPNS terlengkap dengan pembahasan detail',
        keywords: 'tryout asn, cpns 2024, pppk',
        image: 'https://example.com/image.jpg'
    })
})
.then(res => res.json())
.then(data => console.log(data));

// Response:
// {
//   "score": 85,
//   "grade": "B - Baik",
//   "issues": [],
//   "recommendations": []
// }
```

## 🔄 Otomasi Sitemap

Edit `app/Console/Kernel.php`:

```php
protected function schedule(Schedule $schedule)
{
    // Generate sitemap setiap hari jam 2 pagi
    $schedule->command('sitemap:generate')->dailyAt('02:00');
    
    // Cleanup old activity logs setiap minggu
    $schedule->command('activitylog:cleanup --days=90')->weekly();
}
```

## 📝 Template untuk Halaman Lain

### Halaman List (Index)
```blade
@push('seo-meta')
<x-seo-meta
    title="Daftar Tryout ASN CPNS PPPK - {{ config('app.name') }}"
    description="Pilih tryout ASN sesuai kebutuhan Anda. Tersedia tryout CPNS, PPPK, dan Kedinasan dengan soal terbaru dan pembahasan lengkap."
    keywords="daftar tryout asn, kumpulan soal cpns, bank soal pppk, latihan tes kedinasan"
/>
@endpush

@push('structured-data')
<x-structured-data type="website" />
@endpush
```

### Halaman Profil User
```blade
@push('seo-meta')
<x-seo-meta
    :title="$user->name . ' - Profil ' . config('app.name')"
    description="Profil dan hasil tryout peserta ASN"
    :noindex="true"
    :nofollow="true"
/>
@endpush
```

### Halaman Admin/Dashboard
```blade
@push('seo-meta')
<x-seo-meta
    title="Dashboard Admin"
    description="Dashboard administrator"
    :noindex="true"
    :nofollow="true"
/>
@endpush
```

## 🎯 Prioritas Halaman untuk SEO

### High Priority (Priority 1.0 - 0.9)
✅ Homepage
✅ Halaman Tryout List
✅ Halaman Materi List

### Medium Priority (Priority 0.8 - 0.7)
- Detail Tryout (populer)
- Halaman FAQ
- Halaman Tentang Kami
- Blog Posts

### Low Priority (Priority 0.6 - 0.5)
- Detail Materi
- Halaman Kontak

### No Index
- Dashboard User
- Admin Pages
- Auth Pages (Login, Register)
- API Endpoints

## 🔍 Testing Checklist

Sebelum deploy production:

- [ ] Sitemap.xml bisa diakses
- [ ] Robots.txt bisa diakses
- [ ] Semua halaman punya title unik
- [ ] Semua halaman punya meta description unik
- [ ] Structured data valid (test di https://search.google.com/test/rich-results)
- [ ] Open Graph tags ada (test di https://www.opengraph.xyz/)
- [ ] Canonical URLs benar
- [ ] Mobile responsive
- [ ] Page speed bagus (test di https://pagespeed.web.dev/)

## 📱 Social Media Preview

Test sharing di social media:

**Facebook Debugger:**
https://developers.facebook.com/tools/debug/

**Twitter Card Validator:**
https://cards-dev.twitter.com/validator

**LinkedIn Post Inspector:**
https://www.linkedin.com/post-inspector/

## 🚀 Deploy Checklist

Saat production:

1. **Setup SSL (HTTPS)** - WAJIB!
2. **Submit sitemap ke:**
   - Google Search Console
   - Bing Webmaster Tools
3. **Install Google Analytics**
4. **Enable caching di server**
5. **Optimize images**
6. **Enable Gzip compression**

## 💡 Tips Tambahan

1. **Update Sitemap Otomatis:**
   Setiap kali buat tryout/materi baru, generate ulang sitemap

2. **Monitor Ranking:**
   - Google Search Console (gratis)
   - Ahrefs (berbayar tapi powerful)
   - SEMrush (berbayar)

3. **Content is King:**
   - Buat blog post minimal 2x seminggu
   - Fokus keyword: "tryout asn", "cpns 2024", "pppk"
   - Minimal 1000 kata per artikel

4. **Build Backlinks:**
   - Guest post di blog pendidikan
   - Share di forum ASN
   - Kerja sama dengan kampus

---

**Need Help?**
Baca dokumentasi lengkap di `SEO_IMPLEMENTATION.md`

**Quick Commands:**
```bash
# Generate sitemap
./vendor/bin/sail artisan sitemap:generate

# Clear SEO cache
./vendor/bin/sail artisan cache:clear

# Check routes
./vendor/bin/sail artisan route:list | grep seo
```

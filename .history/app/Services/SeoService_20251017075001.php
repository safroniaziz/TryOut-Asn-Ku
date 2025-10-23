<?php

namespace App\Services;

use App\Models\Tryout;
use App\Models\Materi;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SeoService
{
    /**
     * Generate meta tags untuk halaman
     */
    public function generateMetaTags(array $data = []): array
    {
        $defaults = [
            'title' => config('app.name') . ' - Platform Tryout ASN Terbaik',
            'description' => 'Latihan soal tryout ASN CPNS, PPPK, dan Kedinasan terlengkap. Raih impian menjadi ASN dengan persiapan terbaik.',
            'keywords' => 'tryout asn, cpns, pppk, kedinasan, latihan soal asn, tes cpns online, soal cpns, tryout cpns gratis',
            'image' => asset('images/og-image.jpg'),
            'url' => url()->current(),
            'type' => 'website',
        ];

        return array_merge($defaults, $data);
    }

    /**
     * Generate schema.org structured data
     */
    public function generateStructuredData(string $type, array $data = []): array
    {
        switch ($type) {
            case 'website':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'WebSite',
                    'name' => config('app.name'),
                    'url' => config('app.url'),
                    'description' => 'Platform Tryout ASN CPNS PPPK Terbaik',
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => config('app.url') . '/tryout?search={search_term_string}',
                        'query-input' => 'required name=search_term_string',
                    ],
                ];

            case 'organization':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'EducationalOrganization',
                    'name' => config('app.name'),
                    'url' => config('app.url'),
                    'logo' => asset('images/logo.png'),
                    'description' => 'Platform Tryout ASN CPNS PPPK Terbaik di Indonesia',
                    'sameAs' => [
                        // Tambahkan social media URLs
                        'https://facebook.com/yourpage',
                        'https://instagram.com/yourpage',
                        'https://twitter.com/yourpage',
                    ],
                ];

            case 'course':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'Course',
                    'name' => $data['name'] ?? '',
                    'description' => $data['description'] ?? '',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => config('app.name'),
                        'url' => config('app.url'),
                    ],
                ];

            case 'faq':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    'mainEntity' => $data['questions'] ?? [],
                ];

            case 'breadcrumb':
                return [
                    '@context' => 'https://schema.org',
                    '@type' => 'BreadcrumbList',
                    'itemListElement' => $data['items'] ?? [],
                ];

            default:
                return [];
        }
    }

    /**
     * Generate canonical URL
     */
    public function generateCanonicalUrl(?string $url = null): string
    {
        $url = $url ?? url()->current();
        
        // Remove query parameters for clean canonical URL
        $parsedUrl = parse_url($url);
        $canonical = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . ($parsedUrl['path'] ?? '');
        
        return rtrim($canonical, '/');
    }

    /**
     * Generate Open Graph tags
     */
    public function generateOpenGraphTags(array $data = []): array
    {
        $meta = $this->generateMetaTags($data);

        return [
            'og:title' => $meta['title'],
            'og:description' => $meta['description'],
            'og:image' => $meta['image'],
            'og:url' => $meta['url'],
            'og:type' => $meta['type'],
            'og:site_name' => config('app.name'),
            'og:locale' => 'id_ID',
        ];
    }

    /**
     * Generate Twitter Card tags
     */
    public function generateTwitterCardTags(array $data = []): array
    {
        $meta = $this->generateMetaTags($data);

        return [
            'twitter:card' => 'summary_large_image',
            'twitter:title' => $meta['title'],
            'twitter:description' => $meta['description'],
            'twitter:image' => $meta['image'],
            // 'twitter:site' => '@yourtwitterhandle',
        ];
    }

    /**
     * Get popular tryouts for sitemap priority
     */
    public function getPopularTryouts(int $limit = 50): \Illuminate\Database\Eloquent\Collection
    {
        return Cache::remember('seo.popular_tryouts', 3600, function () use ($limit) {
            return Tryout::withCount('jawabanUsers')
                ->orderBy('jawaban_users_count', 'desc')
                ->limit($limit)
                ->get();
        });
    }

    /**
     * Get trending materis for content optimization
     */
    public function getTrendingMateris(int $limit = 20): \Illuminate\Database\Eloquent\Collection
    {
        return Cache::remember('seo.trending_materis', 3600, function () use ($limit) {
            return Materi::where('created_at', '>=', now()->subMonths(3))
                ->limit($limit)
                ->get();
        });
    }

    /**
     * Calculate SEO score for page
     */
    public function calculateSeoScore(array $data): array
    {
        $score = 100;
        $issues = [];
        $recommendations = [];

        // Title length check (50-60 characters optimal)
        if (isset($data['title'])) {
            $titleLength = mb_strlen($data['title']);
            if ($titleLength < 30) {
                $score -= 10;
                $issues[] = 'Judul terlalu pendek (minimal 30 karakter)';
                $recommendations[] = 'Panjangkan judul dengan kata kunci relevan';
            } elseif ($titleLength > 60) {
                $score -= 5;
                $issues[] = 'Judul terlalu panjang (maksimal 60 karakter)';
                $recommendations[] = 'Perpendek judul agar tidak terpotong di hasil pencarian';
            }
        } else {
            $score -= 20;
            $issues[] = 'Tidak ada judul';
            $recommendations[] = 'Tambahkan judul yang menarik dan mengandung kata kunci';
        }

        // Description length check (150-160 characters optimal)
        if (isset($data['description'])) {
            $descLength = mb_strlen($data['description']);
            if ($descLength < 120) {
                $score -= 10;
                $issues[] = 'Deskripsi terlalu pendek (minimal 120 karakter)';
                $recommendations[] = 'Tambahkan detail lebih banyak di deskripsi';
            } elseif ($descLength > 160) {
                $score -= 5;
                $issues[] = 'Deskripsi terlalu panjang (maksimal 160 karakter)';
                $recommendations[] = 'Perpendek deskripsi agar tidak terpotong';
            }
        } else {
            $score -= 20;
            $issues[] = 'Tidak ada deskripsi';
            $recommendations[] = 'Tambahkan meta description yang menarik';
        }

        // Keywords check
        if (!isset($data['keywords']) || empty($data['keywords'])) {
            $score -= 10;
            $issues[] = 'Tidak ada kata kunci';
            $recommendations[] = 'Tambahkan kata kunci relevan (tryout asn, cpns, pppk)';
        }

        // Image check
        if (!isset($data['image'])) {
            $score -= 10;
            $issues[] = 'Tidak ada gambar OG';
            $recommendations[] = 'Tambahkan gambar untuk social media sharing';
        }

        return [
            'score' => max(0, $score),
            'grade' => $this->getScoreGrade($score),
            'issues' => $issues,
            'recommendations' => $recommendations,
        ];
    }

    /**
     * Get grade from score
     */
    private function getScoreGrade(int $score): string
    {
        if ($score >= 90) return 'A - Sangat Baik';
        if ($score >= 80) return 'B - Baik';
        if ($score >= 70) return 'C - Cukup';
        if ($score >= 60) return 'D - Kurang';
        return 'F - Buruk';
    }

    /**
     * Generate robots meta tag
     */
    public function generateRobotsMeta(bool $index = true, bool $follow = true): string
    {
        $index = $index ? 'index' : 'noindex';
        $follow = $follow ? 'follow' : 'nofollow';
        
        return "$index, $follow";
    }

    /**
     * Get SEO-friendly slug
     */
    public function generateSlug(string $text): string
    {
        // Convert to lowercase
        $text = mb_strtolower($text, 'UTF-8');
        
        // Replace spaces with hyphens
        $text = preg_replace('/\s+/', '-', $text);
        
        // Remove special characters
        $text = preg_replace('/[^a-z0-9\-]/', '', $text);
        
        // Remove multiple hyphens
        $text = preg_replace('/-+/', '-', $text);
        
        // Trim hyphens from ends
        return trim($text, '-');
    }

    /**
     * Clear SEO cache
     */
    public function clearSeoCache(): void
    {
        Cache::forget('seo.popular_tryouts');
        Cache::forget('seo.trending_materis');
    }
}

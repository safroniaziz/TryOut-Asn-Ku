<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    /**
     * Generate robots.txt dynamically
     */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /dashboard/\n";
        $content .= "Disallow: /api/\n";
        $content .= "Disallow: /*.json$\n";
        $content .= "\n";
        $content .= "Sitemap: " . url('sitemap.xml') . "\n";

        return response($content)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Check SEO score (untuk admin)
     */
    public function checkScore(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'keywords' => $request->input('keywords'),
            'image' => $request->input('image'),
        ];

        $score = $this->seoService->calculateSeoScore($data);

        return response()->json($score);
    }

    /**
     * Clear SEO cache
     */
    public function clearCache()
    {
        $this->seoService->clearSeoCache();

        return response()->json([
            'success' => true,
            'message' => 'SEO cache berhasil dibersihkan',
        ]);
    }
}

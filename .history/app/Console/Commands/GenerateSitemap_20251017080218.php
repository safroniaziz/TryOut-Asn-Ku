<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Tryout;
use App\Models\Materi;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap untuk SEO';

    public function handle()
    {
        $this->info('Membuat sitemap...');

        $sitemap = Sitemap::create();

        // Homepage dengan priority tertinggi
        $sitemap->add(
            Url::create('/')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        // Halaman penting
        $importantPages = [
            '/tentang-kami',
            '/kontak',
            '/faq',
            '/blog',
        ];

        foreach ($importantPages as $page) {
            $sitemap->add(
                Url::create($page)
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        // Halaman tryout list
        $sitemap->add(
            Url::create('/tryout')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
        );

        // Detail tryout
        $tryouts = Tryout::all();
        $this->info("Menambahkan {$tryouts->count()} tryout...");

        foreach ($tryouts as $tryout) {
            $sitemap->add(
                Url::create("/tryout/{$tryout->id}")
                    ->setLastModificationDate($tryout->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }

        // Halaman materi
        $sitemap->add(
            Url::create('/materi')
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
        );

        // Detail materi
        $materis = Materi::all();
        $this->info("Menambahkan {$materis->count()} materi...");

        foreach ($materis as $materi) {
            $sitemap->add(
                Url::create("/materi/{$materi->id}")
                    ->setLastModificationDate($materi->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.6)
            );
        }

        // Simpan sitemap
        $sitemapPath = public_path('sitemap.xml');
        $sitemap->writeToFile($sitemapPath);

        $this->info('✓ Sitemap berhasil dibuat di: ' . $sitemapPath);
        $this->info('URL sitemap: ' . url('sitemap.xml'));

        return Command::SUCCESS;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tryout;
use App\Models\Category;

class TryoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CPNS SKD Pakets
        $cpnsSkdPackages = [
            'Paket Tryout 1 - SKD',
            'Paket Tryout 2 - SKD',
            'Paket Tryout 3 - SKD',
            'Paket Tryout 4 - SKD',
            'Paket Tryout 5 - SKD',
        ];

        // CPNS SKB Pakets (disabled for now - focus on SKD)
        // $cpnsSkbPackages = [
        //     'Paket Tryout 1 - SKB Tenaga Pendidik',
        //     'Paket Tryout 2 - SKB Tenaga Kesehatan',
        //     'Paket Tryout 3 - SKB Tenaga Teknik',
        //     'Paket Tryout 4 - SKB Tenaga Administrasi Umum',
        //     'Paket Tryout 5 - SKB Analis Kepegawaian',
        // ];

        // PPPK Teknis Pakets
        $pppkTeknisPackages = [
            'Paket Tryout 1 - Teknis',
            'Paket Tryout 2 - Teknis',
            'Paket Tryout 3 - Teknis',
            'Paket Tryout 4 - Teknis',
            'Paket Tryout 5 - Teknis',
        ];

        // PPPK Non-Manajerial Pakets (disabled - focus on non-teknis only)
        // $pppkNonManajerialPackages = [
        //     'Paket Tryout 1 - Wawancara',
        //     'Paket Tryout 2 - Wawancara',
        //     'Paket Tryout 3 - Wawancara',
        //     'Paket Tryout 4 - Sosio Kultural',
        //     'Paket Tryout 5 - Sosio Kultural',
        //     'Paket Tryout 1 - Teknis Komputer',
        //     'Paket Tryout 2 - Teknik Informatika',
        //     'Paket Tryout 3 - Teknik Mesin',
        //     'Paket Tryout 4 - Teknik Sipil',
        //     'Paket Tryout 5 - Teknik Elektro',
        //     'Paket Tryout 1 - Teknik Arsitektur',
        //     'Paket Tryout 2 - Teknik Lingkungan',
        //     'Paket Tryout 3 - Pranata Komputer',
        //     'Paket Tryout 4 - Pranata Akuntansi',
        //     'Paket Tryout 5 - Pranata Keuangan',
        // ];

        // Tryout Nasional/Serentak
        $tryoutNasional = [
            [
                'title' => 'Tryout Nasional SKD 2025',
                'description' => 'Simulasi Tryout SKD nasional yang diselenggarakan serentak seluruh Indonesia',
                'type' => 'CPNS',
                'kategori' => 'SKD Nasional',
                'duration_minutes' => 120,
                'total_questions' => 165,
            ],
            [
                'title' => 'Tryout Nasional PPPK Manajerial 2025',
                'description' => 'Simulasi Tryout PPPK Manajerial nasional yang diselenggarakan serentak',
                'type' => 'PPPK',
                'kategori' => 'Manajerial Nasional',
                'duration_minutes' => 140,
                'total_questions' => 180,
            ],
        ];

        // Tryout Bebas Kapan Saja
        $tryoutBebas = [
            [
                'title' => 'Tryout CPNS SKD - Bisa Kapan Saja',
                'description' => 'Latihan CPNS SKD yang bisa dikerjakan kapan saja, tanpa batasan waktu',
                'type' => 'CPNS',
                'kategori' => 'SKD Latihan',
                'duration_minutes' => 120,
                'total_questions' => 165,
            ],
            [
                'title' => 'Tryout PPPK - Bisa Kapan Saja',
                'description' => 'Latihan PPPK yang bisa dikerjakan kapan saja, tanpa batasan waktu',
                'type' => 'PPPK',
                'kategori' => 'Latihan PPPK',
                'duration_minutes' => 120,
                'total_questions' => 120,
            ],
        ];

              // Create CPNS SKD Tryouts (1 tryout per package containing TIU+TWK+TKP)
        foreach ($cpnsSkdPackages as $index => $packageName) {
            // Control free packages - only first 2 packages are free
            $packageType = $index < 2 ? 'free' : 'premium';

            // Single tryout with all SKD components
            $tryout = Tryout::create([
                'title' => $packageName,
                'slug' => \Str::slug($packageName),
                'description' => "Tes Seleksi Kompetensi Dasar - Paket " . ($index + 1),
                'type' => 'CPNS',
                'kategori' => 'SKD',
                'duration_minutes' => 100,
                'total_questions' => 110, // TWK 30 + TIU 35 + TKP 45
                'is_active' => true,
                'package_type' => $packageType,
                'free_until' => null,
                'tryout_time' => 'free',
                'start_date' => null,
                'end_date' => null,
            ]);

            // Attach categories with question counts
            $twkCategory = Category::where('name', 'TWK')->first();
            $tiuCategory = Category::where('name', 'TIU')->first();
            $tkpCategory = Category::where('name', 'TKP')->first();

            if ($twkCategory) $tryout->categories()->attach($twkCategory->id, ['question_count' => 30]);
            if ($tiuCategory) $tryout->categories()->attach($tiuCategory->id, ['question_count' => 35]);
            if ($tkpCategory) $tryout->categories()->attach($tkpCategory->id, ['question_count' => 45]);
        }

        // Create CPNS SKB Tryouts (per instansi)
        $cpnsSkbPackages = [
            'Paket SKB Tenaga Pendidik',
            'Paket SKB Tenaga Kesehatan',
            'Paket SKB Tenaga Teknik',
            'Paket SKB Tenaga Administrasi Umum',
            'Paket SKB Analisis Kepegawaian'
        ];

        foreach ($cpnsSkbPackages as $index => $packageName) {
            // Only first SKB package is free
            $packageType = $index === 0 ? 'free' : 'premium';

            // Single tryout for SKB
            $tryout = Tryout::create([
                'title' => $packageName,
                'slug' => \Str::slug($packageName),
                'description' => "Tes Seleksi Kompetensi Bidang - " . str_replace('Paket SKB ', '', $packageName),
                'type' => 'CPNS',
                'kategori' => 'SKB',
                'duration_minutes' => 120,
                'total_questions' => 100,
                'is_active' => true,
                'package_type' => $packageType,
                'free_until' => null,
                'tryout_time' => 'free',
                'start_date' => null,
                'end_date' => null,
            ]);

            // Attach appropriate SKB category
            $categoryName = str_replace('Paket SKB ', '', $packageName);
            $skbCategory = Category::where('name', $categoryName)->first();

            if ($skbCategory) {
                $tryout->categories()->attach($skbCategory->id, ['question_count' => 100]);
            }
        }

        // Create CPNS SKB Tryouts (disabled for now - focus on SKD)
        // foreach ($cpnsSkbPackages as $index => $packageName) {
        //     // Only first package is free
        //     $packageType = $index === 0 ? 'free' : 'premium';
        //     Tryout::create([
        //         'title' => $packageName,
        //         'description' => "Simulasi Seleksi Kompetensi Bidang - Paket " . ($index + 1),
        //         'type' => 'CPNS',
        //         'kategori' => $packageName,
        //         'duration_minutes' => 100,
        //         'total_questions' => 100,
        //         'is_active' => true,
        //         'package_type' => $packageType,
        //         'free_until' => null,
        //     ]);
        // }

        // Create PPPK Teknis Tryouts (Only Teknis component)
        foreach ($pppkTeknisPackages as $index => $packageName) {
            // Only first 2 packages are free
            $packageType = $index < 2 ? 'free' : 'premium';

            $tryout = Tryout::create([
                'title' => $packageName,
                'slug' => \Str::slug($packageName),
                'description' => "Tes Teknis - Paket " . ($index + 1),
                'type' => 'PPPK',
                'kategori' => 'Teknis',
                'duration_minutes' => 120,
                'total_questions' => 90,
                'is_active' => true,
                'package_type' => $packageType,
                'free_until' => null,
                'tryout_time' => 'free',
                'start_date' => null,
                'end_date' => null,
            ]);

            // Attach random technical category
            $technicalCategories = Category::where('type', 'PPPK')
                ->whereNotIn('name', ['Manajerial', 'Sosio Kultural', 'Wawancara'])
                ->inRandomOrder()
                ->first();

            if ($technicalCategories) {
                $tryout->categories()->attach($technicalCategories->id, ['question_count' => 90]);
            }
        }

        // Create PPPK Non-Manajerial Tryouts (disabled - focus on non-teknis only)
        // foreach ($pppkNonManajerialPackages as $index => $packageName) {
        //     // Control free packages - only first 3 packages are free
        //     $packageType = $index < 3 ? 'free' : 'premium';
        //
        //     // Create individual tryouts for technical/specialized tests
        //     if (str_contains($packageName, 'Teknis') || str_contains($packageName, 'Teknik') || str_contains($packageName, 'Pranata')) {
        //         $kategori = $packageName;
        //         $duration = 120;
        //         $questions = 120;
        //
        //         Tryout::create([
        //             'title' => $packageName,
        //             'description' => "Tes " . str_replace('Paket Tryout ', '', $packageName) . " - Paket " . ($index + 1),
        //             'type' => 'PPPK',
        //             'kategori' => $kategori,
        //             'duration_minutes' => $duration,
        //             'total_questions' => $questions,
        //             'is_active' => true,
        //             'package_type' => $packageType,
        //             'free_until' => null,
        //         ]);
        //     }
        // }

        // Create PPPK Non-Teknis Complete Tryouts (Manajerial + Sosio Kultural + Wawancara)
        $pppkNonTeknisPackages = [
            'Paket Tryout 1 - Non-Teknis',
            'Paket Tryout 2 - Non-Teknis',
            'Paket Tryout 3 - Non-Teknis',
            'Paket Tryout 4 - Non-Teknis',
            'Paket Tryout 5 - Non-Teknis',
        ];

        foreach ($pppkNonTeknisPackages as $index => $packageName) {
            // Only first 2 are free
            $packageType = $index < 2 ? 'free' : 'premium';

            $tryout = Tryout::create([
                'title' => $packageName,
                'slug' => \Str::slug($packageName),
                'description' => "Tes Non-Teknis - Paket " . ($index + 1),
                'type' => 'PPPK',
                'kategori' => 'Non-Teknis',
                'duration_minutes' => 75,
                'total_questions' => 55,
                'is_active' => true,
                'package_type' => $packageType,
                'free_until' => null,
                'tryout_time' => 'free',
                'start_date' => null,
                'end_date' => null,
            ]);

            // Attach non-technical categories
            $manajerialCategory = Category::where('name', 'Manajerial')->first();
            $sosioCategory = Category::where('name', 'Sosio Kultural')->first();
            $wawancaraCategory = Category::where('name', 'Wawancara')->first();

            if ($manajerialCategory) $tryout->categories()->attach($manajerialCategory->id, ['question_count' => 25]);
            if ($sosioCategory) $tryout->categories()->attach($sosioCategory->id, ['question_count' => 20]);
            if ($wawancaraCategory) $tryout->categories()->attach($wawancaraCategory->id, ['question_count' => 10]);
        }

        // Create Tryout Nasional/Serentak
        foreach ($tryoutNasional as $index => $tryout) {
            // Only first national tryout is free
            $packageType = $index === 0 ? 'free' : 'premium';
            Tryout::create([
                'title' => $tryout['title'],
                'slug' => \Str::slug($tryout['title']),
                'description' => $tryout['description'],
                'type' => $tryout['type'],
                'kategori' => $tryout['kategori'],
                'duration_minutes' => $tryout['duration_minutes'],
                'total_questions' => $tryout['total_questions'],
                'is_active' => true,
                'package_type' => $packageType,
                'free_until' => null,
                'tryout_time' => 'nasional',
                'start_date' => now()->addDays(7), // Start 7 days from now
                'end_date' => now()->addDays(14), // End 14 days from now
            ]);
        }

        // Create Tryout Bebas Kapan Saja
        foreach ($tryoutBebas as $tryout) {
            // All bebas packages are free
            $newTryout = Tryout::create([
                'title' => $tryout['title'],
                'slug' => \Str::slug($tryout['title']),
                'description' => $tryout['description'],
                'type' => $tryout['type'],
                'kategori' => 'Bebas',
                'duration_minutes' => $tryout['duration_minutes'],
                'total_questions' => $tryout['total_questions'],
                'is_active' => true,
                'package_type' => 'free',
                'free_until' => null,
                'tryout_time' => 'free',
                'start_date' => null,
                'end_date' => null,
            ]);

            // Attach appropriate categories
            if ($tryout['type'] === 'CPNS') {
                // Attach SKD categories for CPNS free package
                $twkCategory = Category::where('name', 'TWK')->first();
                $tiuCategory = Category::where('name', 'TIU')->first();
                $tkpCategory = Category::where('name', 'TKP')->first();

                if ($twkCategory) $newTryout->categories()->attach($twkCategory->id, ['question_count' => 30]);
                if ($tiuCategory) $newTryout->categories()->attach($tiuCategory->id, ['question_count' => 35]);
                if ($tkpCategory) $newTryout->categories()->attach($tkpCategory->id, ['question_count' => 45]);
            } else {
                // Attach Non-Teknis categories for PPPK free package
                $manajerialCategory = Category::where('name', 'Manajerial')->first();
                $sosioCategory = Category::where('name', 'Sosio Kultural')->first();
                $wawancaraCategory = Category::where('name', 'Wawancara')->first();

                if ($manajerialCategory) $newTryout->categories()->attach($manajerialCategory->id, ['question_count' => 25]);
                if ($sosioCategory) $newTryout->categories()->attach($sosioCategory->id, ['question_count' => 20]);
                if ($wawancaraCategory) $newTryout->categories()->attach($wawancaraCategory->id, ['question_count' => 10]);
            }
        }
    }
}
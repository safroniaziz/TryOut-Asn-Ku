<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CPNS Categories
        $cpnsCategories = [
            ['name' => 'TWK', 'description' => 'Tes Wawasan Kebangsaan - 30 soal', 'type' => 'CPNS'],
            ['name' => 'TIU', 'description' => 'Tes Intelegensia Umum - 35 soal', 'type' => 'CPNS'],
            ['name' => 'TKP', 'description' => 'Tes Karakteristik Pribadi - 45 soal', 'type' => 'CPNS'],
        ];

        // PPPK Teknis Categories
        $pppkTeknisCategories = [
            ['name' => 'Pranata Komputer', 'description' => 'Teknis Komputer dan TI', 'type' => 'PPPK'],
            ['name' => 'Guru', 'description' => 'Tenaga Pendidik/Guru', 'type' => 'PPPK'],
            ['name' => 'Tenaga Kesehatan', 'description' => 'Profesi Kesehatan', 'type' => 'PPPK'],
            ['name' => 'Penyuluh', 'description' => 'Tenaga Penyuluh', 'type' => 'PPPK'],
            ['name' => 'Teknik Sipil', 'description' => 'Teknik Sipil dan Infrastruktur', 'type' => 'PPPK'],
            ['name' => 'Teknik Elektro', 'description' => 'Teknik Elektro', 'type' => 'PPPK'],
            ['name' => 'Akuntansi', 'description' => 'Pranata Akuntansi', 'type' => 'PPPK'],
            ['name' => 'Keuangan', 'description' => 'Pranata Keuangan', 'type' => 'PPPK'],
        ];

        // PPPK Non-Teknis Categories
        $pppkNonTeknisCategories = [
            ['name' => 'Manajerial', 'description' => 'Kemampuan Manajerial - 25 soal', 'type' => 'PPPK'],
            ['name' => 'Sosio Kultural', 'description' => 'Sosial Kultural - 20 soal', 'type' => 'PPPK'],
            ['name' => 'Wawancara', 'description' => 'Wawancara Kompetensi - 10 soal', 'type' => 'PPPK'],
        ];

        // Insert all categories
        foreach ($cpnsCategories as $category) {
            Category::create($category);
        }

        foreach ($pppkTeknisCategories as $category) {
            Category::create($category);
        }

        foreach ($pppkNonTeknisCategories as $category) {
            Category::create($category);
        }

        $this->command->info('Master categories seeded successfully!');
    }
}

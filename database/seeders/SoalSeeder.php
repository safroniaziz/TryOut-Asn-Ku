<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soal;
use App\Models\Tryout;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find "Paket Tryout 1 - SKD" tryout
        $tryout = Tryout::where('title', 'Paket Tryout 1 - SKD')->first();

        if (!$tryout) {
            $this->command->error('Paket Tryout 1 - SKD tidak ditemukan!');
            return;
        }

        // Clear existing questions for this tryout to avoid duplicates
        Soal::where('tryout_id', $tryout->id)->delete();

        // Generate 150 questions: 30 TWK, 35 TIU, 85 TKP
        $this->command->info('Creating 150 soal SKD untuk Paket Tryout 1 - SKD...');

        // TWK Questions (30 soal - nomor 1-30)
        $this->command->info('Membuat 30 soal TWK...');
        for ($i = 1; $i <= 30; $i++) {
            Soal::factory()->twk()->create([
                'tryout_id' => $tryout->id,
                'nomor_soal' => $i,
                'kategori' => 'TWK'
            ]);
        }

        // TIU Questions (35 soal - nomor 31-65)
        $this->command->info('Membuat 35 soal TIU...');
        for ($i = 31; $i <= 65; $i++) {
            Soal::factory()->tiu()->create([
                'tryout_id' => $tryout->id,
                'nomor_soal' => $i,
                'kategori' => 'TIU'
            ]);
        }

        // TKP Questions (85 soal - nomor 66-150)
        $this->command->info('Membuat 85 soal TKP...');
        for ($i = 66; $i <= 150; $i++) {
            Soal::factory()->tkp()->create([
                'tryout_id' => $tryout->id,
                'nomor_soal' => $i,
                'kategori' => 'TKP'
            ]);
        }

        $this->command->info('Berhasil membuat 150 soal SKD!');
        $this->command->info('- 30 soal TWK (Tes Wawasan Kebangsaan)');
        $this->command->info('- 35 soal TIU (Tes Intelegensi Umum)');
        $this->command->info('- 85 soal TKP (Tes Karakteristik Pribadi)');

        // Update tryout total_questions
        $tryout->update(['total_questions' => 150]);
        $this->command->info('Total questions untuk Paket Tryout 1 - SKD: 150');
    }
}
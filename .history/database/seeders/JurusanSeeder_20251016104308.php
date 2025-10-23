<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $jurusan = [
            // TEKNIK
            ['nama_jurusan' => 'Teknik Informatika', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Komputer', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Sistem Informasi', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Elektro', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Mesin', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Sipil', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Industri', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Kimia', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Teknik Lingkungan', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Arsitektur', 'kategori' => 'teknik'],
            ['nama_jurusan' => 'Planologi', 'kategori' => 'teknik'],
            
            // EKONOMI & BISNIS
            ['nama_jurusan' => 'Akuntansi', 'kategori' => 'ekonomi_bisnis'],
            ['nama_jurusan' => 'Manajemen', 'kategori' => 'ekonomi_bisnis'],
            ['nama_jurusan' => 'Ekonomi Pembangunan', 'kategori' => 'ekonomi_bisnis'],
            ['nama_jurusan' => 'Ekonomi Syariah', 'kategori' => 'ekonomi_bisnis'],
            ['nama_jurusan' => 'Manajemen Keuangan', 'kategori' => 'ekonomi_bisnis'],
            ['nama_jurusan' => 'Bisnis Digital', 'kategori' => 'ekonomi_bisnis'],
            ['nama_jurusan' => 'Kewirausahaan', 'kategori' => 'ekonomi_bisnis'],
            
            // SOSIAL & POLITIK
            ['nama_jurusan' => 'Administrasi Negara', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Administrasi Bisnis', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Ilmu Politik', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Hubungan Internasional', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Sosiologi', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Antropologi', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Ilmu Pemerintahan', 'kategori' => 'sosial_politik'],
            ['nama_jurusan' => 'Kebijakan Publik', 'kategori' => 'sosial_politik'],
            
            // HUKUM
            ['nama_jurusan' => 'Ilmu Hukum', 'kategori' => 'hukum'],
            ['nama_jurusan' => 'Hukum Pidana', 'kategori' => 'hukum'],
            ['nama_jurusan' => 'Hukum Perdata', 'kategori' => 'hukum'],
            ['nama_jurusan' => 'Hukum Tata Negara', 'kategori' => 'hukum'],
            ['nama_jurusan' => 'Hukum Bisnis', 'kategori' => 'hukum'],
            
            // KESEHATAN
            ['nama_jurusan' => 'Kedokteran', 'kategori' => 'kesehatan'],
            ['nama_jurusan' => 'Kedokteran Gigi', 'kategori' => 'kesehatan'],
            ['nama_jurusan' => 'Keperawatan', 'kategori' => 'kesehatan'],
            ['nama_jurusan' => 'Farmasi', 'kategori' => 'kesehatan'],
            ['nama_jurusan' => 'Kesehatan Masyarakat', 'kategori' => 'kesehatan'],
            ['nama_jurusan' => 'Gizi', 'kategori' => 'kesehatan'],
            ['nama_jurusan' => 'Fisioterapi', 'kategori' => 'kesehatan'],
            
            // PENDIDIKAN
            ['nama_jurusan' => 'Pendidikan Guru Sekolah Dasar', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Bahasa Indonesia', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Bahasa Inggris', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Matematika', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Fisika', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Kimia', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Biologi', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Sejarah', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Pendidikan Geografi', 'kategori' => 'pendidikan'],
            ['nama_jurusan' => 'Bimbingan Konseling', 'kategori' => 'pendidikan'],
            
            // AGAMA
            ['nama_jurusan' => 'Ilmu Al-Quran dan Tafsir', 'kategori' => 'agama'],
            ['nama_jurusan' => 'Syariah', 'kategori' => 'agama'],
            ['nama_jurusan' => 'Dakwah', 'kategori' => 'agama'],
            ['nama_jurusan' => 'Pendidikan Agama Islam', 'kategori' => 'agama'],
            ['nama_jurusan' => 'Teologi', 'kategori' => 'agama'],
            
            // SAINS & MATEMATIKA
            ['nama_jurusan' => 'Matematika', 'kategori' => 'sains_matematika'],
            ['nama_jurusan' => 'Fisika', 'kategori' => 'sains_matematika'],
            ['nama_jurusan' => 'Kimia', 'kategori' => 'sains_matematika'],
            ['nama_jurusan' => 'Biologi', 'kategori' => 'sains_matematika'],
            ['nama_jurusan' => 'Statistika', 'kategori' => 'sains_matematika'],
            ['nama_jurusan' => 'Geologi', 'kategori' => 'sains_matematika'],
            ['nama_jurusan' => 'Geofisika', 'kategori' => 'sains_matematika'],
            
            // PERTANIAN
            ['nama_jurusan' => 'Agroteknologi', 'kategori' => 'pertanian'],
            ['nama_jurusan' => 'Agribisnis', 'kategori' => 'pertanian'],
            ['nama_jurusan' => 'Peternakan', 'kategori' => 'pertanian'],
            ['nama_jurusan' => 'Kehutanan', 'kategori' => 'pertanian'],
            ['nama_jurusan' => 'Perikanan', 'kategori' => 'pertanian'],
            
            // SENI & DESAIN
            ['nama_jurusan' => 'Desain Grafis', 'kategori' => 'seni_desain'],
            ['nama_jurusan' => 'Seni Rupa', 'kategori' => 'seni_desain'],
            ['nama_jurusan' => 'Desain Interior', 'kategori' => 'seni_desain'],
            ['nama_jurusan' => 'Seni Musik', 'kategori' => 'seni_desain'],
            ['nama_jurusan' => 'Seni Tari', 'kategori' => 'seni_desain'],
            
            // KOMUNIKASI
            ['nama_jurusan' => 'Ilmu Komunikasi', 'kategori' => 'komunikasi'],
            ['nama_jurusan' => 'Jurnalistik', 'kategori' => 'komunikasi'],
            ['nama_jurusan' => 'Broadcasting', 'kategori' => 'komunikasi'],
            ['nama_jurusan' => 'Public Relations', 'kategori' => 'komunikasi'],
            
            // PSIKOLOGI
            ['nama_jurusan' => 'Psikologi', 'kategori' => 'psikologi'],
            ['nama_jurusan' => 'Psikologi Klinis', 'kategori' => 'psikologi'],
            ['nama_jurusan' => 'Psikologi Industri', 'kategori' => 'psikologi'],
            
            // LAINNYA
            ['nama_jurusan' => 'Sastra Indonesia', 'kategori' => 'lainnya'],
            ['nama_jurusan' => 'Sastra Inggris', 'kategori' => 'lainnya'],
            ['nama_jurusan' => 'Bahasa dan Sastra Arab', 'kategori' => 'lainnya'],
            ['nama_jurusan' => 'Sejarah', 'kategori' => 'lainnya'],
            ['nama_jurusan' => 'Geografi', 'kategori' => 'lainnya'],
            ['nama_jurusan' => 'Lainnya', 'kategori' => 'lainnya'],
        ];

        foreach ($jurusan as $data) {
            Jurusan::create($data);
        }
    }
}

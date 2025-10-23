<?php

namespace Database\Seeders;

use App\Models\Universitas;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitasSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Helper function untuk mendapatkan ID kota
        $getKotaId = function($namaKota, $namaProvinsi) {
            $provinsi = Provinsi::where('nama_provinsi', $namaProvinsi)->first();
            $kota = Kota::where('nama_kota', $namaKota)->where('provinsi_id', $provinsi->id)->first();
            return $kota ? $kota->id : null;
        };

        // Helper function untuk mendapatkan ID provinsi
        $getProvinsiId = function($namaProvinsi) {
            $provinsi = Provinsi::where('nama_provinsi', $namaProvinsi)->first();
            return $provinsi ? $provinsi->id : null;
        };
        // Data Universitas Negeri
        $universitasNegeri = [
            ['nama_universitas' => 'Universitas Indonesia', 'singkatan' => 'UI', 'jenis' => 'negeri', 'kota' => 'Depok', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Gadjah Mada', 'singkatan' => 'UGM', 'jenis' => 'negeri', 'kota' => 'Sleman', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Institut Teknologi Bandung', 'singkatan' => 'ITB', 'jenis' => 'negeri', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Institut Pertanian Bogor', 'singkatan' => 'IPB University', 'jenis' => 'negeri', 'kota' => 'Bogor', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Airlangga', 'singkatan' => 'UNAIR', 'jenis' => 'negeri', 'provinsi' => 'Jawa Timur', 'kota' => 'Surabaya'],
            ['nama_universitas' => 'Institut Teknologi Sepuluh Nopember', 'singkatan' => 'ITS', 'jenis' => 'negeri', 'provinsi' => 'Jawa Timur', 'kota' => 'Surabaya'],
            ['nama_universitas' => 'Universitas Diponegoro', 'singkatan' => 'UNDIP', 'jenis' => 'negeri', 'provinsi' => 'Jawa Tengah', 'kota' => 'Semarang'],
            ['nama_universitas' => 'Universitas Padjadjaran', 'singkatan' => 'UNPAD', 'jenis' => 'negeri', 'provinsi' => 'Jawa Barat', 'kota' => 'Bandung'],
            ['nama_universitas' => 'Universitas Brawijaya', 'singkatan' => 'UB', 'jenis' => 'negeri', 'provinsi' => 'Jawa Timur', 'kota' => 'Malang'],
            ['nama_universitas' => 'Universitas Hasanuddin', 'singkatan' => 'UNHAS', 'jenis' => 'negeri', 'provinsi' => 'Sulawesi Selatan', 'kota' => 'Makassar'],
            ['nama_universitas' => 'Universitas Sumatera Utara', 'singkatan' => 'USU', 'jenis' => 'negeri', 'provinsi' => 'Sumatera Utara', 'kota' => 'Medan'],
            ['nama_universitas' => 'Universitas Andalas', 'singkatan' => 'UNAND', 'jenis' => 'negeri', 'provinsi' => 'Sumatera Barat', 'kota' => 'Padang'],
            ['nama_universitas' => 'Universitas Negeri Yogyakarta', 'singkatan' => 'UNY', 'jenis' => 'negeri', 'provinsi' => 'DI Yogyakarta', 'kota' => 'Yogyakarta'],
            ['nama_universitas' => 'Universitas Negeri Malang', 'singkatan' => 'UM', 'jenis' => 'negeri', 'provinsi' => 'Jawa Timur', 'kota' => 'Malang'],
            ['nama_universitas' => 'Universitas Negeri Jakarta', 'singkatan' => 'UNJ', 'jenis' => 'negeri', 'provinsi' => 'DKI Jakarta', 'kota' => 'Jakarta'],
            ['nama_universitas' => 'Universitas Negeri Semarang', 'singkatan' => 'UNNES', 'jenis' => 'negeri', 'provinsi' => 'Jawa Tengah', 'kota' => 'Semarang'],
            ['nama_universitas' => 'Universitas Negeri Surabaya', 'singkatan' => 'UNESA', 'jenis' => 'negeri', 'provinsi' => 'Jawa Timur', 'kota' => 'Surabaya'],
            ['nama_universitas' => 'Universitas Negeri Makassar', 'singkatan' => 'UNM', 'jenis' => 'negeri', 'provinsi' => 'Sulawesi Selatan', 'kota' => 'Makassar'],
            ['nama_universitas' => 'Universitas Syiah Kuala', 'singkatan' => 'USK', 'jenis' => 'negeri', 'provinsi' => 'Aceh', 'kota' => 'Banda Aceh'],
            ['nama_universitas' => 'Universitas Lambung Mangkurat', 'singkatan' => 'ULM', 'jenis' => 'negeri', 'provinsi' => 'Kalimantan Selatan', 'kota' => 'Banjarmasin'],
            ['nama_universitas' => 'Universitas Riau', 'singkatan' => 'UR', 'jenis' => 'negeri', 'provinsi' => 'Riau', 'kota' => 'Pekanbaru'],
            ['nama_universitas' => 'Universitas Jember', 'singkatan' => 'UNEJ', 'jenis' => 'negeri', 'provinsi' => 'Jawa Timur', 'kota' => 'Jember'],
            ['nama_universitas' => 'Universitas Tanjungpura', 'singkatan' => 'UNTAN', 'jenis' => 'negeri', 'provinsi' => 'Kalimantan Barat', 'kota' => 'Pontianak'],
            ['nama_universitas' => 'Universitas Udayana', 'singkatan' => 'UNUD', 'jenis' => 'negeri', 'provinsi' => 'Bali', 'kota' => 'Denpasar'],
            ['nama_universitas' => 'Universitas Mataram', 'singkatan' => 'UNRAM', 'jenis' => 'negeri', 'provinsi' => 'Nusa Tenggara Barat', 'kota' => 'Mataram'],
            ['nama_universitas' => 'Universitas Sam Ratulangi', 'singkatan' => 'UNSRAT', 'jenis' => 'negeri', 'provinsi' => 'Sulawesi Utara', 'kota' => 'Manado'],
            ['nama_universitas' => 'Universitas Palangka Raya', 'singkatan' => 'UPR', 'jenis' => 'negeri', 'provinsi' => 'Kalimantan Tengah', 'kota' => 'Palangka Raya'],
            ['nama_universitas' => 'Universitas Tadulako', 'singkatan' => 'UNTAD', 'jenis' => 'negeri', 'provinsi' => 'Sulawesi Tengah', 'kota' => 'Palu'],
            ['nama_universitas' => 'Universitas Mulawarman', 'singkatan' => 'UNMUL', 'jenis' => 'negeri', 'provinsi' => 'Kalimantan Timur', 'kota' => 'Samarinda'],
            ['nama_universitas' => 'Universitas Nusa Cendana', 'singkatan' => 'UNDANA', 'jenis' => 'negeri', 'provinsi' => 'Nusa Tenggara Timur', 'kota' => 'Kupang'],
        ];

        $universitasSwasta = [
            ['nama_universitas' => 'Universitas Bina Nusantara', 'singkatan' => 'BINUS University', 'jenis' => 'swasta', 'provinsi' => 'DKI Jakarta', 'kota' => 'Jakarta'],
            ['nama_universitas' => 'Universitas Tarumanagara', 'singkatan' => 'UNTAR', 'jenis' => 'swasta', 'provinsi' => 'DKI Jakarta', 'kota' => 'Jakarta'],
            ['nama_universitas' => 'Universitas Trisakti', 'singkatan' => 'TRISAKTI', 'jenis' => 'swasta', 'provinsi' => 'DKI Jakarta', 'kota' => 'Jakarta'],
            ['nama_universitas' => 'Universitas Katolik Parahyangan', 'singkatan' => 'UNPAR', 'jenis' => 'swasta', 'provinsi' => 'Jawa Barat', 'kota' => 'Bandung'],
            ['nama_universitas' => 'Universitas Atma Jaya Jakarta', 'singkatan' => 'UAJY', 'jenis' => 'swasta', 'provinsi' => 'DKI Jakarta', 'kota' => 'Jakarta'],
            ['nama_universitas' => 'Universitas Pelita Harapan', 'singkatan' => 'UPH', 'jenis' => 'swasta', 'provinsi' => 'Banten', 'kota' => 'Tangerang'],
            ['nama_universitas' => 'Universitas Kristen Petra', 'singkatan' => 'UK Petra', 'jenis' => 'swasta', 'provinsi' => 'Jawa Timur', 'kota' => 'Surabaya'],
            ['nama_universitas' => 'Universitas Sanata Dharma', 'singkatan' => 'USD', 'jenis' => 'swasta', 'provinsi' => 'DI Yogyakarta', 'kota' => 'Yogyakarta'],
            ['nama_universitas' => 'Universitas Islam Indonesia', 'singkatan' => 'UII', 'jenis' => 'swasta', 'provinsi' => 'DI Yogyakarta', 'kota' => 'Yogyakarta'],
            ['nama_universitas' => 'Universitas Muhammadiyah Yogyakarta', 'singkatan' => 'UMY', 'jenis' => 'swasta', 'provinsi' => 'DI Yogyakarta', 'kota' => 'Yogyakarta'],
            ['nama_universitas' => 'Universitas Muhammadiyah Malang', 'singkatan' => 'UMM', 'jenis' => 'swasta', 'provinsi' => 'Jawa Timur', 'kota' => 'Malang'],
            ['nama_universitas' => 'Universitas Muhammadiyah Surakarta', 'singkatan' => 'UMS', 'jenis' => 'swasta', 'provinsi' => 'Jawa Tengah', 'kota' => 'Surakarta'],
            ['nama_universitas' => 'Universitas Telkom', 'singkatan' => 'Telkom University', 'jenis' => 'swasta', 'provinsi' => 'Jawa Barat', 'kota' => 'Bandung'],
            ['nama_universitas' => 'Universitas Surabaya', 'singkatan' => 'UBAYA', 'jenis' => 'swasta', 'provinsi' => 'Jawa Timur', 'kota' => 'Surabaya'],
            ['nama_universitas' => 'President University', 'singkatan' => 'President University', 'jenis' => 'swasta', 'provinsi' => 'Jawa Barat', 'kota' => 'Bekasi'],
        ];

        // Data pendidikan lainnya
        $pendidikanLain = [
            ['nama_universitas' => 'SMA Negeri', 'singkatan' => 'SMA N', 'jenis' => 'negeri', 'provinsi' => null, 'kota' => null],
            ['nama_universitas' => 'SMA Swasta', 'singkatan' => 'SMA S', 'jenis' => 'swasta', 'provinsi' => null, 'kota' => null],
            ['nama_universitas' => 'SMK Negeri', 'singkatan' => 'SMK N', 'jenis' => 'negeri', 'provinsi' => null, 'kota' => null],
            ['nama_universitas' => 'SMK Swasta', 'singkatan' => 'SMK S', 'jenis' => 'swasta', 'provinsi' => null, 'kota' => null],
            ['nama_universitas' => 'Madrasah Aliyah Negeri', 'singkatan' => 'MAN', 'jenis' => 'negeri', 'provinsi' => null, 'kota' => null],
            ['nama_universitas' => 'Madrasah Aliyah Swasta', 'singkatan' => 'MAS', 'jenis' => 'swasta', 'provinsi' => null, 'kota' => null],
            ['nama_universitas' => 'Lainnya', 'singkatan' => 'Lainnya', 'jenis' => 'swasta', 'provinsi' => null, 'kota' => null],
        ];

        // Insert semua data
        foreach ($universitasNegeri as $univ) {
            Universitas::create($univ);
        }

        foreach ($universitasSwasta as $univ) {
            Universitas::create($univ);
        }

        foreach ($pendidikanLain as $univ) {
            Universitas::create($univ);
        }
    }
}

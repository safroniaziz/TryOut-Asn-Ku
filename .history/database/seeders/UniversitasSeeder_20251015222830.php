<?php

namespace Database\Seeders;

use App\Models\Universitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitasSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $universitasNegeri = [
            ['nama_universitas' => 'Universitas Indonesia', 'singkatan' => 'UI', 'jenis' => 'negeri', 'provinsi' => 'DKI Jakarta', 'kota' => 'Jakarta'],
            ['nama_universitas' => 'Universitas Gadjah Mada', 'singkatan' => 'UGM', 'jenis' => 'negeri', 'provinsi' => 'DI Yogyakarta', 'kota' => 'Yogyakarta'],
            ['nama_universitas' => 'Institut Teknologi Bandung', 'singkatan' => 'ITB', 'jenis' => 'negeri', 'provinsi' => 'Jawa Barat', 'kota' => 'Bandung'],
            ['nama_universitas' => 'Institut Pertanian Bogor', 'singkatan' => 'IPB University', 'jenis' => 'negeri', 'provinsi' => 'Jawa Barat', 'kota' => 'Bogor'],
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

        foreach ($universitasNegeri as $univ) {
            Universitas::create($univ);
        }
    }
}

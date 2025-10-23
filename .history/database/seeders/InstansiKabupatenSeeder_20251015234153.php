<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiKabupatenSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Helper function untuk mendapatkan ID provinsi
        $getProvinsiId = function($namaProvinsi) {
            $provinsi = Provinsi::where('nama_provinsi', $namaProvinsi)->first();
            return $provinsi ? $provinsi->id : null;
        };

        // PEMERINTAH KABUPATEN PER PROVINSI
        
        // ACEH
        $pemkabAceh = [
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Barat', 'singkatan' => 'Pemkab Aceh Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Barat Daya', 'singkatan' => 'Pemkab Aceh Barat Daya', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Besar', 'singkatan' => 'Pemkab Aceh Besar', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Jaya', 'singkatan' => 'Pemkab Aceh Jaya', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Selatan', 'singkatan' => 'Pemkab Aceh Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Singkil', 'singkatan' => 'Pemkab Aceh Singkil', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Tamiang', 'singkatan' => 'Pemkab Aceh Tamiang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Tengah', 'singkatan' => 'Pemkab Aceh Tengah', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Tenggara', 'singkatan' => 'Pemkab Aceh Tenggara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Timur', 'singkatan' => 'Pemkab Aceh Timur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Aceh Utara', 'singkatan' => 'Pemkab Aceh Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bener Meriah', 'singkatan' => 'Pemkab Bener Meriah', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bireuen', 'singkatan' => 'Pemkab Bireuen', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Gayo Lues', 'singkatan' => 'Pemkab Gayo Lues', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Nagan Raya', 'singkatan' => 'Pemkab Nagan Raya', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pidie', 'singkatan' => 'Pemkab Pidie', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pidie Jaya', 'singkatan' => 'Pemkab Pidie Jaya', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kabupaten Simeulue', 'singkatan' => 'Pemkab Simeulue', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Aceh'],
        ];

        // SUMATERA UTARA
        $pemkabSumut = [
            ['nama_instansi' => 'Pemerintah Kabupaten Asahan', 'singkatan' => 'Pemkab Asahan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Batubara', 'singkatan' => 'Pemkab Batubara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Dairi', 'singkatan' => 'Pemkab Dairi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Deli Serdang', 'singkatan' => 'Pemkab Deli Serdang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Humbang Hasundutan', 'singkatan' => 'Pemkab Humbang Hasundutan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Karo', 'singkatan' => 'Pemkab Karo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Labuhanbatu', 'singkatan' => 'Pemkab Labuhanbatu', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Labuhanbatu Selatan', 'singkatan' => 'Pemkab Labuhanbatu Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Labuhanbatu Utara', 'singkatan' => 'Pemkab Labuhanbatu Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Langkat', 'singkatan' => 'Pemkab Langkat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Mandailing Natal', 'singkatan' => 'Pemkab Mandailing Natal', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Nias', 'singkatan' => 'Pemkab Nias', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Nias Barat', 'singkatan' => 'Pemkab Nias Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Nias Selatan', 'singkatan' => 'Pemkab Nias Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Nias Utara', 'singkatan' => 'Pemkab Nias Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Padang Lawas', 'singkatan' => 'Pemkab Padang Lawas', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Padang Lawas Utara', 'singkatan' => 'Pemkab Padang Lawas Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pakpak Bharat', 'singkatan' => 'Pemkab Pakpak Bharat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Samosir', 'singkatan' => 'Pemkab Samosir', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Serdang Bedagai', 'singkatan' => 'Pemkab Serdang Bedagai', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Simalungun', 'singkatan' => 'Pemkab Simalungun', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tapanuli Selatan', 'singkatan' => 'Pemkab Tapanuli Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tapanuli Tengah', 'singkatan' => 'Pemkab Tapanuli Tengah', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tapanuli Utara', 'singkatan' => 'Pemkab Tapanuli Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kabupaten Toba', 'singkatan' => 'Pemkab Toba', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Utara'],
        ];

        // Gabungkan semua data
        $allPemkab = array_merge($pemkabAceh, $pemkabSumut);

        // Insert semua data pemkab
        foreach ($allPemkab as $instansi) {
            Instansi::create([
                'nama_instansi' => $instansi['nama_instansi'],
                'singkatan' => $instansi['singkatan'],
                'jenis' => $instansi['jenis'],
                'kategori' => $instansi['kategori'],
                'provinsi_id' => isset($instansi['provinsi']) ? $getProvinsiId($instansi['provinsi']) : null,
                'aktif' => true,
            ]);
        }
    }
}
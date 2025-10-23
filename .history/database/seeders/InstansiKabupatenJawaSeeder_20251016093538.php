<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiKabupatenJawaSeeder extends Seeder
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

        // JAWA BARAT
        $pemkabJabar = [
            ['nama_instansi' => 'Pemerintah Kabupaten Bandung', 'singkatan' => 'Pemkab Bandung', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bandung Barat', 'singkatan' => 'Pemkab Bandung Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bekasi', 'singkatan' => 'Pemkab Bekasi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bogor', 'singkatan' => 'Pemkab Bogor', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ciamis', 'singkatan' => 'Pemkab Ciamis', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Cianjur', 'singkatan' => 'Pemkab Cianjur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Cirebon', 'singkatan' => 'Pemkab Cirebon', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Garut', 'singkatan' => 'Pemkab Garut', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Indramayu', 'singkatan' => 'Pemkab Indramayu', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Karawang', 'singkatan' => 'Pemkab Karawang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kuningan', 'singkatan' => 'Pemkab Kuningan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Majalengka', 'singkatan' => 'Pemkab Majalengka', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pangandaran', 'singkatan' => 'Pemkab Pangandaran', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Purwakarta', 'singkatan' => 'Pemkab Purwakarta', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Subang', 'singkatan' => 'Pemkab Subang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sukabumi', 'singkatan' => 'Pemkab Sukabumi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sumedang', 'singkatan' => 'Pemkab Sumedang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tasikmalaya', 'singkatan' => 'Pemkab Tasikmalaya', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Barat'],
        ];

        // JAWA TENGAH
        $pemkabJateng = [
            ['nama_instansi' => 'Pemerintah Kabupaten Banjarnegara', 'singkatan' => 'Pemkab Banjarnegara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Banyumas', 'singkatan' => 'Pemkab Banyumas', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Batang', 'singkatan' => 'Pemkab Batang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Blora', 'singkatan' => 'Pemkab Blora', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Boyolali', 'singkatan' => 'Pemkab Boyolali', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Brebes', 'singkatan' => 'Pemkab Brebes', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Cilacap', 'singkatan' => 'Pemkab Cilacap', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Demak', 'singkatan' => 'Pemkab Demak', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Grobogan', 'singkatan' => 'Pemkab Grobogan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Jepara', 'singkatan' => 'Pemkab Jepara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Karanganyar', 'singkatan' => 'Pemkab Karanganyar', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kebumen', 'singkatan' => 'Pemkab Kebumen', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kendal', 'singkatan' => 'Pemkab Kendal', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Klaten', 'singkatan' => 'Pemkab Klaten', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kudus', 'singkatan' => 'Pemkab Kudus', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Magelang', 'singkatan' => 'Pemkab Magelang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pati', 'singkatan' => 'Pemkab Pati', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pekalongan', 'singkatan' => 'Pemkab Pekalongan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pemalang', 'singkatan' => 'Pemkab Pemalang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Purbalingga', 'singkatan' => 'Pemkab Purbalingga', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Purworejo', 'singkatan' => 'Pemkab Purworejo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Rembang', 'singkatan' => 'Pemkab Rembang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Semarang', 'singkatan' => 'Pemkab Semarang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sragen', 'singkatan' => 'Pemkab Sragen', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sukoharjo', 'singkatan' => 'Pemkab Sukoharjo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tegal', 'singkatan' => 'Pemkab Tegal', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Temanggung', 'singkatan' => 'Pemkab Temanggung', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Wonogiri', 'singkatan' => 'Pemkab Wonogiri', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kabupaten Wonosobo', 'singkatan' => 'Pemkab Wonosobo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Tengah'],
        ];

        // DI YOGYAKARTA
        $pemkabYogyakarta = [
            ['nama_instansi' => 'Pemerintah Kabupaten Bantul', 'singkatan' => 'Pemkab Bantul', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'DI Yogyakarta'],
            ['nama_instansi' => 'Pemerintah Kabupaten Gunungkidul', 'singkatan' => 'Pemkab Gunungkidul', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'DI Yogyakarta'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kulon Progo', 'singkatan' => 'Pemkab Kulon Progo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'DI Yogyakarta'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sleman', 'singkatan' => 'Pemkab Sleman', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'DI Yogyakarta'],
        ];

        // JAWA TIMUR
        $pemkabJatim = [
            ['nama_instansi' => 'Pemerintah Kabupaten Bangkalan', 'singkatan' => 'Pemkab Bangkalan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Banyuwangi', 'singkatan' => 'Pemkab Banyuwangi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Blitar', 'singkatan' => 'Pemkab Blitar', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bojonegoro', 'singkatan' => 'Pemkab Bojonegoro', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bondowoso', 'singkatan' => 'Pemkab Bondowoso', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Gresik', 'singkatan' => 'Pemkab Gresik', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Jember', 'singkatan' => 'Pemkab Jember', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Jombang', 'singkatan' => 'Pemkab Jombang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kediri', 'singkatan' => 'Pemkab Kediri', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lamongan', 'singkatan' => 'Pemkab Lamongan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lumajang', 'singkatan' => 'Pemkab Lumajang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Madiun', 'singkatan' => 'Pemkab Madiun', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Magetan', 'singkatan' => 'Pemkab Magetan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Malang', 'singkatan' => 'Pemkab Malang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Mojokerto', 'singkatan' => 'Pemkab Mojokerto', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Nganjuk', 'singkatan' => 'Pemkab Nganjuk', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ngawi', 'singkatan' => 'Pemkab Ngawi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pacitan', 'singkatan' => 'Pemkab Pacitan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pamekasan', 'singkatan' => 'Pemkab Pamekasan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pasuruan', 'singkatan' => 'Pemkab Pasuruan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ponorogo', 'singkatan' => 'Pemkab Ponorogo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Probolinggo', 'singkatan' => 'Pemkab Probolinggo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sampang', 'singkatan' => 'Pemkab Sampang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sidoarjo', 'singkatan' => 'Pemkab Sidoarjo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Situbondo', 'singkatan' => 'Pemkab Situbondo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sumenep', 'singkatan' => 'Pemkab Sumenep', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Trenggalek', 'singkatan' => 'Pemkab Trenggalek', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tuban', 'singkatan' => 'Pemkab Tuban', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tulungagung', 'singkatan' => 'Pemkab Tulungagung', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jawa Timur'],
        ];

        // BANTEN
        $pemkabBanten = [
            ['nama_instansi' => 'Pemerintah Kabupaten Lebak', 'singkatan' => 'Pemkab Lebak', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pandeglang', 'singkatan' => 'Pemkab Pandeglang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Kabupaten Serang', 'singkatan' => 'Pemkab Serang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tangerang', 'singkatan' => 'Pemkab Tangerang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Banten'],
        ];

        // Gabungkan semua data Jawa
        $allPemkabJawa = array_merge(
            $pemkabJabar,
            $pemkabJateng,
            $pemkabYogyakarta,
            $pemkabJatim,
            $pemkabBanten
        );

        // Insert semua data pemkab Jawa
        foreach ($allPemkabJawa as $instansi) {
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

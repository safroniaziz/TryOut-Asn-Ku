<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Ambil ID provinsi berdasarkan nama
        $aceh = Provinsi::where('nama_provinsi', 'Aceh')->first()->id;
        $sumut = Provinsi::where('nama_provinsi', 'Sumatera Utara')->first()->id;
        $sumbar = Provinsi::where('nama_provinsi', 'Sumatera Barat')->first()->id;
        $riau = Provinsi::where('nama_provinsi', 'Riau')->first()->id;
        $jambi = Provinsi::where('nama_provinsi', 'Jambi')->first()->id;
        $sumsel = Provinsi::where('nama_provinsi', 'Sumatera Selatan')->first()->id;
        $bengkulu = Provinsi::where('nama_provinsi', 'Bengkulu')->first()->id;
        $lampung = Provinsi::where('nama_provinsi', 'Lampung')->first()->id;
        $babel = Provinsi::where('nama_provinsi', 'Kepulauan Bangka Belitung')->first()->id;
        $kepri = Provinsi::where('nama_provinsi', 'Kepulauan Riau')->first()->id;
        $jakarta = Provinsi::where('nama_provinsi', 'DKI Jakarta')->first()->id;
        $jabar = Provinsi::where('nama_provinsi', 'Jawa Barat')->first()->id;
        $jateng = Provinsi::where('nama_provinsi', 'Jawa Tengah')->first()->id;
        $yogya = Provinsi::where('nama_provinsi', 'DI Yogyakarta')->first()->id;
        $jatim = Provinsi::where('nama_provinsi', 'Jawa Timur')->first()->id;
        $banten = Provinsi::where('nama_provinsi', 'Banten')->first()->id;

        $kotaData = [
            // Aceh
            ['provinsi_id' => $aceh, 'nama_kota' => 'Banda Aceh', 'jenis' => 'kota'],
            ['provinsi_id' => $aceh, 'nama_kota' => 'Langsa', 'jenis' => 'kota'],
            ['provinsi_id' => $aceh, 'nama_kota' => 'Lhokseumawe', 'jenis' => 'kota'],
            ['provinsi_id' => $aceh, 'nama_kota' => 'Sabang', 'jenis' => 'kota'],
            ['provinsi_id' => $aceh, 'nama_kota' => 'Subulussalam', 'jenis' => 'kota'],

            // Sumatera Utara
            ['provinsi_id' => $sumut, 'nama_kota' => 'Medan', 'jenis' => 'kota'],
            ['provinsi_id' => $sumut, 'nama_kota' => 'Binjai', 'jenis' => 'kota'],
            ['provinsi_id' => $sumut, 'nama_kota' => 'Tebing Tinggi', 'jenis' => 'kota'],
            ['provinsi_id' => $sumut, 'nama_kota' => 'Pematangsiantar', 'jenis' => 'kota'],
            ['provinsi_id' => $sumut, 'nama_kota' => 'Tanjungbalai', 'jenis' => 'kota'],

            // DKI Jakarta
            ['provinsi_id' => $jakarta, 'nama_kota' => 'Jakarta Pusat', 'jenis' => 'kota'],
            ['provinsi_id' => $jakarta, 'nama_kota' => 'Jakarta Utara', 'jenis' => 'kota'],
            ['provinsi_id' => $jakarta, 'nama_kota' => 'Jakarta Barat', 'jenis' => 'kota'],
            ['provinsi_id' => $jakarta, 'nama_kota' => 'Jakarta Selatan', 'jenis' => 'kota'],
            ['provinsi_id' => $jakarta, 'nama_kota' => 'Jakarta Timur', 'jenis' => 'kota'],
            ['provinsi_id' => $jakarta, 'nama_kota' => 'Kepulauan Seribu', 'jenis' => 'kabupaten'],

            // Jawa Barat
            ['provinsi_id' => $jabar, 'nama_kota' => 'Bandung', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Bekasi', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Bogor', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Cirebon', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Depok', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Sukabumi', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Tasikmalaya', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Cimahi', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Banjar', 'jenis' => 'kota'],

            // Jawa Tengah
            ['provinsi_id' => $jateng, 'nama_kota' => 'Semarang', 'jenis' => 'kota'],
            ['provinsi_id' => $jateng, 'nama_kota' => 'Surakarta', 'jenis' => 'kota'],
            ['provinsi_id' => $jateng, 'nama_kota' => 'Salatiga', 'jenis' => 'kota'],
            ['provinsi_id' => $jateng, 'nama_kota' => 'Magelang', 'jenis' => 'kota'],
            ['provinsi_id' => $jateng, 'nama_kota' => 'Pekalongan', 'jenis' => 'kota'],
            ['provinsi_id' => $jateng, 'nama_kota' => 'Tegal', 'jenis' => 'kota'],

            // DI Yogyakarta
            ['provinsi_id' => $yogya, 'nama_kota' => 'Yogyakarta', 'jenis' => 'kota'],
            ['provinsi_id' => $yogya, 'nama_kota' => 'Sleman', 'jenis' => 'kabupaten'],
            ['provinsi_id' => $yogya, 'nama_kota' => 'Bantul', 'jenis' => 'kabupaten'],
            ['provinsi_id' => $yogya, 'nama_kota' => 'Kulon Progo', 'jenis' => 'kabupaten'],
            ['provinsi_id' => $yogya, 'nama_kota' => 'Gunung Kidul', 'jenis' => 'kabupaten'],

            // Jawa Timur
            ['provinsi_id' => $jatim, 'nama_kota' => 'Surabaya', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Malang', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Kediri', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Blitar', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Mojokerto', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Madiun', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Pasuruan', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Probolinggo', 'jenis' => 'kota'],
            ['provinsi_id' => $jatim, 'nama_kota' => 'Batu', 'jenis' => 'kota'],

            // Banten
            ['provinsi_id' => $banten, 'nama_kota' => 'Serang', 'jenis' => 'kota'],
            ['provinsi_id' => $banten, 'nama_kota' => 'Cilegon', 'jenis' => 'kota'],
            ['provinsi_id' => $banten, 'nama_kota' => 'Tangerang', 'jenis' => 'kota'],
            ['provinsi_id' => $banten, 'nama_kota' => 'Tangerang Selatan', 'jenis' => 'kota'],
        ];

        foreach ($kotaData as $kota) {
            Kota::create($kota);
        }
    }
}

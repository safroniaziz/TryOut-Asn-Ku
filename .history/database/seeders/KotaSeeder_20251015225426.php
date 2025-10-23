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
        $bali = Provinsi::where('nama_provinsi', 'Bali')->first()->id;
        $ntb = Provinsi::where('nama_provinsi', 'Nusa Tenggara Barat')->first()->id;
        $ntt = Provinsi::where('nama_provinsi', 'Nusa Tenggara Timur')->first()->id;
        $kalbar = Provinsi::where('nama_provinsi', 'Kalimantan Barat')->first()->id;
        $kalteng = Provinsi::where('nama_provinsi', 'Kalimantan Tengah')->first()->id;
        $kalsel = Provinsi::where('nama_provinsi', 'Kalimantan Selatan')->first()->id;
        $kaltim = Provinsi::where('nama_provinsi', 'Kalimantan Timur')->first()->id;
        $sulut = Provinsi::where('nama_provinsi', 'Sulawesi Utara')->first()->id;
        $sulteng = Provinsi::where('nama_provinsi', 'Sulawesi Tengah')->first()->id;
        $sulsel = Provinsi::where('nama_provinsi', 'Sulawesi Selatan')->first()->id;
        $sultra = Provinsi::where('nama_provinsi', 'Sulawesi Tenggara')->first()->id;
        $maluku = Provinsi::where('nama_provinsi', 'Maluku')->first()->id;
        $papua = Provinsi::where('nama_provinsi', 'Papua')->first()->id;
        $papbar = Provinsi::where('nama_provinsi', 'Papua Barat')->first()->id;

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
            ['provinsi_id' => $banten, 'nama_kota' => 'Gowa', 'jenis' => 'kabupaten'],
            
            // Tambahan kota untuk universitas yang belum ada
            ['provinsi_id' => $aceh, 'nama_kota' => 'Meulaboh', 'jenis' => 'kota'],
            ['provinsi_id' => $sumbar, 'nama_kota' => 'Padang', 'jenis' => 'kota'],
            ['provinsi_id' => $riau, 'nama_kota' => 'Pekanbaru', 'jenis' => 'kota'],
            ['provinsi_id' => $jambi, 'nama_kota' => 'Jambi', 'jenis' => 'kota'],
            ['provinsi_id' => $bengkulu, 'nama_kota' => 'Bengkulu', 'jenis' => 'kota'],
            ['provinsi_id' => $lampung, 'nama_kota' => 'Bandar Lampung', 'jenis' => 'kota'],
            ['provinsi_id' => $jabar, 'nama_kota' => 'Sumedang', 'jenis' => 'kabupaten'],
            
            // Kota lainnya untuk universitas
            ['provinsi_id' => $kalbar, 'nama_kota' => 'Pontianak', 'jenis' => 'kota'],
            ['provinsi_id' => $kalsel, 'nama_kota' => 'Banjarmasin', 'jenis' => 'kota'],
            ['provinsi_id' => $kaltim, 'nama_kota' => 'Samarinda', 'jenis' => 'kota'],
            ['provinsi_id' => $kalteng, 'nama_kota' => 'Palangka Raya', 'jenis' => 'kota'],
            ['provinsi_id' => $sulteng, 'nama_kota' => 'Palu', 'jenis' => 'kota'],
            ['provinsi_id' => $sulut, 'nama_kota' => 'Manado', 'jenis' => 'kota'],
            ['provinsi_id' => $sultra, 'nama_kota' => 'Kendari', 'jenis' => 'kota'],
            ['provinsi_id' => $sulsel, 'nama_kota' => 'Makassar', 'jenis' => 'kota'],
            ['provinsi_id' => $sulsel, 'nama_kota' => 'Gowa', 'jenis' => 'kabupaten'],
            ['provinsi_id' => $maluku, 'nama_kota' => 'Ambon', 'jenis' => 'kota'],
            ['provinsi_id' => $papua, 'nama_kota' => 'Jayapura', 'jenis' => 'kota'],
            ['provinsi_id' => $papbar, 'nama_kota' => 'Manokwari', 'jenis' => 'kota'],
            ['provinsi_id' => $ntt, 'nama_kota' => 'Kupang', 'jenis' => 'kota'],
            ['provinsi_id' => $ntb, 'nama_kota' => 'Mataram', 'jenis' => 'kota'],
            
            // Kabupaten di Yogyakarta
            ['provinsi_id' => $yogya, 'nama_kota' => 'Sleman', 'jenis' => 'kabupaten'],
            ['provinsi_id' => $yogya, 'nama_kota' => 'Bantul', 'jenis' => 'kabupaten'],
        ];

        foreach ($kotaData as $kota) {
            Kota::create($kota);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiSeeder extends Seeder
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

        // Helper function untuk mendapatkan ID kota
        $getKotaId = function($namaKota, $namaProvinsi) {
            $provinsi = Provinsi::where('nama_provinsi', $namaProvinsi)->first();
            if (!$provinsi) return null;
            
            $kota = Kota::where('nama_kota', $namaKota)->where('provinsi_id', $provinsi->id)->first();
            return $kota ? $kota->id : null;
        };

        // LEMBAGA TINGGI / KONSTITUSIONAL / YUDIKATIF / PEMERIKSA KEUANGAN
        $lembagaTinggi = [
            ['nama_instansi' => 'Presiden Republik Indonesia', 'singkatan' => 'Presiden RI', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Wakil Presiden Republik Indonesia', 'singkatan' => 'Wapres RI', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Majelis Permusyawaratan Rakyat', 'singkatan' => 'MPR', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Dewan Perwakilan Daerah', 'singkatan' => 'DPD', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Mahkamah Agung', 'singkatan' => 'MA', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Mahkamah Konstitusi', 'singkatan' => 'MK', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Komisi Yudisial', 'singkatan' => 'KY', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Pemeriksa Keuangan', 'singkatan' => 'BPK', 'jenis' => 'lembaga_tinggi', 'kategori' => 'pusat'],
        ];

        // LEMBAGA PENYELENGGARA PEMILU & PENGAWAS PEMILU
        $lembagaPemilu = [
            ['nama_instansi' => 'Komisi Pemilihan Umum', 'singkatan' => 'KPU', 'jenis' => 'lembaga_pemilu', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Pengawas Pemilihan Umum', 'singkatan' => 'Bawaslu', 'jenis' => 'lembaga_pemilu', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Dewan Kehormatan Penyelenggara Pemilu', 'singkatan' => 'DKPP', 'jenis' => 'lembaga_pemilu', 'kategori' => 'pusat'],
        ];

        // LEMBAGA ANTI-KORUPSI & PENGAWASAN
        $lembagaPengawasan = [
            ['nama_instansi' => 'Komisi Pemberantasan Korupsi', 'singkatan' => 'KPK', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Ombudsman Republik Indonesia', 'singkatan' => 'ORI', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Komisi Nasional Hak Asasi Manusia', 'singkatan' => 'Komnas HAM', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Komisi Perlindungan Anak Indonesia', 'singkatan' => 'KPAI', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Komisi Informasi Pusat', 'singkatan' => 'KIP', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Dewan Pers', 'singkatan' => 'Dewan Pers', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Dewan Pendidikan Nasional', 'singkatan' => 'DPN', 'jenis' => 'lembaga_pengawasan', 'kategori' => 'pusat'],
        ];

        // LEMBAGA PEMERINTAH NON-KEMENTERIAN (LPNK)
        $lpnk = [
            ['nama_instansi' => 'Badan Pengawas Obat dan Makanan', 'singkatan' => 'BPOM', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Nasional Penanggulangan Bencana', 'singkatan' => 'BNPB', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Nasional Narkotika', 'singkatan' => 'BNN', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Kepegawaian Negara', 'singkatan' => 'BKN', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Pusat Statistik', 'singkatan' => 'BPS', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Siber dan Sandi Negara', 'singkatan' => 'BSSN', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Pengawas Keuangan dan Pembangunan', 'singkatan' => 'BPKP', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan SAR Nasional', 'singkatan' => 'Basarnas', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Arsip Nasional Republik Indonesia', 'singkatan' => 'ANRI', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Perpustakaan Nasional', 'singkatan' => 'Perpusnas', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah', 'singkatan' => 'LKPP', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Lembaga Administrasi Negara', 'singkatan' => 'LAN', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Pengatur Hilir Minyak dan Gas Bumi', 'singkatan' => 'BPH Migas', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Pengelola Keuangan Haji', 'singkatan' => 'BPKH', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Nasional Penanggulangan Terorisme', 'singkatan' => 'BNPT', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Lembaga Sensor Film', 'singkatan' => 'LSF', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Keamanan Laut', 'singkatan' => 'Bakamla', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Riset dan Inovasi Nasional', 'singkatan' => 'BRIN', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Amil Zakat Nasional', 'singkatan' => 'BAZNAS', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Penyelenggara Jaminan Sosial Kesehatan', 'singkatan' => 'BPJS Kesehatan', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Penyelenggara Jaminan Sosial Ketenagakerjaan', 'singkatan' => 'BPJS Ketenagakerjaan', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Standardisasi Nasional', 'singkatan' => 'BSN', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
            ['nama_instansi' => 'Badan Meteorologi, Klimatologi, dan Geofisika', 'singkatan' => 'BMKG', 'jenis' => 'lpnk', 'kategori' => 'pusat'],
        ];

        // PEMERINTAH PROVINSI
        $pemprov = [
            ['nama_instansi' => 'Pemerintah Aceh', 'singkatan' => 'Pemerintah Aceh', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Provinsi Sumatera Utara', 'singkatan' => 'Pemprov Sumut', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Provinsi Sumatera Barat', 'singkatan' => 'Pemprov Sumbar', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Provinsi Riau', 'singkatan' => 'Pemprov Riau', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Provinsi Kepulauan Riau', 'singkatan' => 'Pemprov Kepri', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kepulauan Riau'],
            ['nama_instansi' => 'Pemerintah Provinsi Jambi', 'singkatan' => 'Pemprov Jambi', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Provinsi Bengkulu', 'singkatan' => 'Pemprov Bengkulu', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Provinsi Sumatera Selatan', 'singkatan' => 'Pemprov Sumsel', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Provinsi Kepulauan Bangka Belitung', 'singkatan' => 'Pemprov Babel', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_instansi' => 'Pemerintah Provinsi Lampung', 'singkatan' => 'Pemprov Lampung', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Provinsi Banten', 'singkatan' => 'Pemprov Banten', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Provinsi DKI Jakarta', 'singkatan' => 'Pemprov DKI', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'DKI Jakarta'],
            ['nama_instansi' => 'Pemerintah Provinsi Jawa Barat', 'singkatan' => 'Pemprov Jabar', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Provinsi Jawa Tengah', 'singkatan' => 'Pemprov Jateng', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Daerah Istimewa Yogyakarta', 'singkatan' => 'Pemda Istimewa DIY', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'DI Yogyakarta'],
            ['nama_instansi' => 'Pemerintah Provinsi Jawa Timur', 'singkatan' => 'Pemprov Jatim', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Provinsi Bali', 'singkatan' => 'Pemprov Bali', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Bali'],
            ['nama_instansi' => 'Pemerintah Provinsi Nusa Tenggara Barat', 'singkatan' => 'Pemprov NTB', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Nusa Tenggara Barat'],
            ['nama_instansi' => 'Pemerintah Provinsi Nusa Tenggara Timur', 'singkatan' => 'Pemprov NTT', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Nusa Tenggara Timur'],
            ['nama_instansi' => 'Pemerintah Provinsi Kalimantan Barat', 'singkatan' => 'Pemprov Kalbar', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kalimantan Barat'],
            ['nama_instansi' => 'Pemerintah Provinsi Kalimantan Tengah', 'singkatan' => 'Pemprov Kalteng', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kalimantan Tengah'],
            ['nama_instansi' => 'Pemerintah Provinsi Kalimantan Selatan', 'singkatan' => 'Pemprov Kalsel', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kalimantan Selatan'],
            ['nama_instansi' => 'Pemerintah Provinsi Kalimantan Timur', 'singkatan' => 'Pemprov Kaltim', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kalimantan Timur'],
            ['nama_instansi' => 'Pemerintah Provinsi Kalimantan Utara', 'singkatan' => 'Pemprov Kaltara', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Kalimantan Utara'],
            ['nama_instansi' => 'Pemerintah Provinsi Sulawesi Utara', 'singkatan' => 'Pemprov Sulut', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sulawesi Utara'],
            ['nama_instansi' => 'Pemerintah Provinsi Gorontalo', 'singkatan' => 'Pemprov Gorontalo', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Gorontalo'],
            ['nama_instansi' => 'Pemerintah Provinsi Sulawesi Tengah', 'singkatan' => 'Pemprov Sulteng', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sulawesi Tengah'],
            ['nama_instansi' => 'Pemerintah Provinsi Sulawesi Barat', 'singkatan' => 'Pemprov Sulbar', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sulawesi Barat'],
            ['nama_instansi' => 'Pemerintah Provinsi Sulawesi Selatan', 'singkatan' => 'Pemprov Sulsel', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sulawesi Selatan'],
            ['nama_instansi' => 'Pemerintah Provinsi Sulawesi Tenggara', 'singkatan' => 'Pemprov Sultra', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Sulawesi Tenggara'],
            ['nama_instansi' => 'Pemerintah Provinsi Maluku', 'singkatan' => 'Pemprov Maluku', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Maluku'],
            ['nama_instansi' => 'Pemerintah Provinsi Maluku Utara', 'singkatan' => 'Pemprov Malut', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Maluku Utara'],
            ['nama_instansi' => 'Pemerintah Provinsi Papua', 'singkatan' => 'Pemprov Papua', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Papua'],
            ['nama_instansi' => 'Pemerintah Provinsi Papua Barat', 'singkatan' => 'Pemprov Papua Barat', 'jenis' => 'pemprov', 'kategori' => 'provinsi', 'provinsi' => 'Papua Barat']
        ];

        // Insert lembaga tinggi
        foreach ($lembagaTinggi as $instansi) {
            Instansi::create([
                'nama_instansi' => $instansi['nama_instansi'],
                'singkatan' => $instansi['singkatan'],
                'jenis' => $instansi['jenis'],
                'kategori' => $instansi['kategori'],
                'aktif' => true,
            ]);
        }

        // Insert lembaga pemilu
        foreach ($lembagaPemilu as $instansi) {
            Instansi::create([
                'nama_instansi' => $instansi['nama_instansi'],
                'singkatan' => $instansi['singkatan'],
                'jenis' => $instansi['jenis'],
                'kategori' => $instansi['kategori'],
                'aktif' => true,
            ]);
        }

        // Insert lembaga pengawasan
        foreach ($lembagaPengawasan as $instansi) {
            Instansi::create([
                'nama_instansi' => $instansi['nama_instansi'],
                'singkatan' => $instansi['singkatan'],
                'jenis' => $instansi['jenis'],
                'kategori' => $instansi['kategori'],
                'aktif' => true,
            ]);
        }

        // Insert LPNK
        foreach ($lpnk as $instansi) {
            Instansi::create([
                'nama_instansi' => $instansi['nama_instansi'],
                'singkatan' => $instansi['singkatan'],
                'jenis' => $instansi['jenis'],
                'kategori' => $instansi['kategori'],
                'aktif' => true,
            ]);
        }

        // Insert pemerintah provinsi
        foreach ($pemprov as $instansi) {
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

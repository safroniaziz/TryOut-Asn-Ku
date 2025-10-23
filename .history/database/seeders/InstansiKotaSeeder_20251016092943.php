<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstansiKotaSeeder extends Seeder
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

        // PEMERINTAH KOTA PER PROVINSI

        // ACEH
        $pemkotAceh = [
            ['nama_instansi' => 'Pemerintah Kota Banda Aceh', 'singkatan' => 'Pemkot Banda Aceh', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kota Langsa', 'singkatan' => 'Pemkot Langsa', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kota Lhokseumawe', 'singkatan' => 'Pemkot Lhokseumawe', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kota Sabang', 'singkatan' => 'Pemkot Sabang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Aceh'],
            ['nama_instansi' => 'Pemerintah Kota Subulussalam', 'singkatan' => 'Pemkot Subulussalam', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Aceh'],
        ];

        // SUMATERA UTARA
        $pemkotSumut = [
            ['nama_instansi' => 'Pemerintah Kota Binjai', 'singkatan' => 'Pemkot Binjai', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Gunungsitoli', 'singkatan' => 'Pemkot Gunungsitoli', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Medan', 'singkatan' => 'Pemkot Medan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Padangsidimpuan', 'singkatan' => 'Pemkot Padangsidimpuan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Pematangsiantar', 'singkatan' => 'Pemkot Pematangsiantar', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Sibolga', 'singkatan' => 'Pemkot Sibolga', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Tanjungbalai', 'singkatan' => 'Pemkot Tanjungbalai', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
            ['nama_instansi' => 'Pemerintah Kota Tebing Tinggi', 'singkatan' => 'Pemkot Tebing Tinggi', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Utara'],
        ];

        // SUMATERA BARAT
        $pemkotSumbar = [
            ['nama_instansi' => 'Pemerintah Kota Bukittinggi', 'singkatan' => 'Pemkot Bukittinggi', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kota Padang', 'singkatan' => 'Pemkot Padang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kota Padangpanjang', 'singkatan' => 'Pemkot Padangpanjang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kota Pariaman', 'singkatan' => 'Pemkot Pariaman', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kota Payakumbuh', 'singkatan' => 'Pemkot Payakumbuh', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kota Sawahlunto', 'singkatan' => 'Pemkot Sawahlunto', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kota Solok', 'singkatan' => 'Pemkot Solok', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Barat'],
        ];

        // RIAU
        $pemkotRiau = [
            ['nama_instansi' => 'Pemerintah Kota Dumai', 'singkatan' => 'Pemkot Dumai', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kota Pekanbaru', 'singkatan' => 'Pemkot Pekanbaru', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Riau'],
        ];

        // JAMBI
        $pemkotJambi = [
            ['nama_instansi' => 'Pemerintah Kota Jambi', 'singkatan' => 'Pemkot Jambi', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kota Sungai Penuh', 'singkatan' => 'Pemkot Sungai Penuh', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jambi'],
        ];

        // SUMATERA SELATAN
        $pemkotSumsel = [
            ['nama_instansi' => 'Pemerintah Kota Lubuklinggau', 'singkatan' => 'Pemkot Lubuklinggau', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kota Pagar Alam', 'singkatan' => 'Pemkot Pagar Alam', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kota Palembang', 'singkatan' => 'Pemkot Palembang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kota Prabumulih', 'singkatan' => 'Pemkot Prabumulih', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sumatera Selatan'],
        ];

        // BENGKULU
        $pemkotBengkulu = [
            ['nama_instansi' => 'Pemerintah Kota Bengkulu', 'singkatan' => 'Pemkot Bengkulu', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Bengkulu'],
        ];

        // LAMPUNG
        $pemkotLampung = [
            ['nama_instansi' => 'Pemerintah Kota Bandar Lampung', 'singkatan' => 'Pemkot Bandar Lampung', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kota Metro', 'singkatan' => 'Pemkot Metro', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Lampung'],
        ];

        // KEPULAUAN BANGKA BELITUNG
        $pemkotBabel = [
            ['nama_instansi' => 'Pemerintah Kota Pangkalpinang', 'singkatan' => 'Pemkot Pangkalpinang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kepulauan Bangka Belitung'],
        ];

        // KEPULAUAN RIAU
        $pemkotKepri = [
            ['nama_instansi' => 'Pemerintah Kota Batam', 'singkatan' => 'Pemkot Batam', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kepulauan Riau'],
            ['nama_instansi' => 'Pemerintah Kota Tanjungpinang', 'singkatan' => 'Pemkot Tanjungpinang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kepulauan Riau'],
        ];

        // DKI JAKARTA
        $pemkotJakarta = [
            ['nama_instansi' => 'Pemerintah Kota Jakarta Barat', 'singkatan' => 'Pemkot Jakarta Barat', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'DKI Jakarta'],
            ['nama_instansi' => 'Pemerintah Kota Jakarta Pusat', 'singkatan' => 'Pemkot Jakarta Pusat', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'DKI Jakarta'],
            ['nama_instansi' => 'Pemerintah Kota Jakarta Selatan', 'singkatan' => 'Pemkot Jakarta Selatan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'DKI Jakarta'],
            ['nama_instansi' => 'Pemerintah Kota Jakarta Timur', 'singkatan' => 'Pemkot Jakarta Timur', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'DKI Jakarta'],
            ['nama_instansi' => 'Pemerintah Kota Jakarta Utara', 'singkatan' => 'Pemkot Jakarta Utara', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'DKI Jakarta'],
        ];

        // JAWA BARAT
        $pemkotJabar = [
            ['nama_instansi' => 'Pemerintah Kota Bandung', 'singkatan' => 'Pemkot Bandung', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Banjar', 'singkatan' => 'Pemkot Banjar', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Bekasi', 'singkatan' => 'Pemkot Bekasi', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Bogor', 'singkatan' => 'Pemkot Bogor', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Cimahi', 'singkatan' => 'Pemkot Cimahi', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Cirebon', 'singkatan' => 'Pemkot Cirebon', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Depok', 'singkatan' => 'Pemkot Depok', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Sukabumi', 'singkatan' => 'Pemkot Sukabumi', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
            ['nama_instansi' => 'Pemerintah Kota Tasikmalaya', 'singkatan' => 'Pemkot Tasikmalaya', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Barat'],
        ];

        // JAWA TENGAH
        $pemkotJateng = [
            ['nama_instansi' => 'Pemerintah Kota Magelang', 'singkatan' => 'Pemkot Magelang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kota Pekalongan', 'singkatan' => 'Pemkot Pekalongan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kota Salatiga', 'singkatan' => 'Pemkot Salatiga', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kota Semarang', 'singkatan' => 'Pemkot Semarang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kota Surakarta', 'singkatan' => 'Pemkot Surakarta', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Tengah'],
            ['nama_instansi' => 'Pemerintah Kota Tegal', 'singkatan' => 'Pemkot Tegal', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Tengah'],
        ];

        // DI YOGYAKARTA
        $pemkotYogyakarta = [
            ['nama_instansi' => 'Pemerintah Kota Yogyakarta', 'singkatan' => 'Pemkot Yogyakarta', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'DI Yogyakarta'],
        ];

        // JAWA TIMUR
        $pemkotJatim = [
            ['nama_instansi' => 'Pemerintah Kota Batu', 'singkatan' => 'Pemkot Batu', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Blitar', 'singkatan' => 'Pemkot Blitar', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Kediri', 'singkatan' => 'Pemkot Kediri', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Madiun', 'singkatan' => 'Pemkot Madiun', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Malang', 'singkatan' => 'Pemkot Malang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Mojokerto', 'singkatan' => 'Pemkot Mojokerto', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Pasuruan', 'singkatan' => 'Pemkot Pasuruan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Probolinggo', 'singkatan' => 'Pemkot Probolinggo', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
            ['nama_instansi' => 'Pemerintah Kota Surabaya', 'singkatan' => 'Pemkot Surabaya', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Jawa Timur'],
        ];

        // BANTEN
        $pemkotBanten = [
            ['nama_instansi' => 'Pemerintah Kota Cilegon', 'singkatan' => 'Pemkot Cilegon', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Kota Serang', 'singkatan' => 'Pemkot Serang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Kota Tangerang', 'singkatan' => 'Pemkot Tangerang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Banten'],
            ['nama_instansi' => 'Pemerintah Kota Tangerang Selatan', 'singkatan' => 'Pemkot Tangerang Selatan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Banten'],
        ];

        // BALI
        $pemkotBali = [
            ['nama_instansi' => 'Pemerintah Kota Denpasar', 'singkatan' => 'Pemkot Denpasar', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Bali'],
        ];

        // NUSA TENGGARA BARAT
        $pemkotNTB = [
            ['nama_instansi' => 'Pemerintah Kota Bima', 'singkatan' => 'Pemkot Bima', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Nusa Tenggara Barat'],
            ['nama_instansi' => 'Pemerintah Kota Mataram', 'singkatan' => 'Pemkot Mataram', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Nusa Tenggara Barat'],
        ];

        // NUSA TENGGARA TIMUR
        $pemkotNTT = [
            ['nama_instansi' => 'Pemerintah Kota Kupang', 'singkatan' => 'Pemkot Kupang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Nusa Tenggara Timur'],
        ];

        // KALIMANTAN BARAT
        $pemkotKalbar = [
            ['nama_instansi' => 'Pemerintah Kota Pontianak', 'singkatan' => 'Pemkot Pontianak', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Barat'],
            ['nama_instansi' => 'Pemerintah Kota Singkawang', 'singkatan' => 'Pemkot Singkawang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Barat'],
        ];

        // KALIMANTAN TENGAH
        $pemkotKalteng = [
            ['nama_instansi' => 'Pemerintah Kota Palangka Raya', 'singkatan' => 'Pemkot Palangka Raya', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Tengah'],
        ];

        // KALIMANTAN SELATAN
        $pemkotKalsel = [
            ['nama_instansi' => 'Pemerintah Kota Banjarbaru', 'singkatan' => 'Pemkot Banjarbaru', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Selatan'],
            ['nama_instansi' => 'Pemerintah Kota Banjarmasin', 'singkatan' => 'Pemkot Banjarmasin', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Selatan'],
        ];

        // KALIMANTAN TIMUR
        $pemkotKaltim = [
            ['nama_instansi' => 'Pemerintah Kota Balikpapan', 'singkatan' => 'Pemkot Balikpapan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Timur'],
            ['nama_instansi' => 'Pemerintah Kota Bontang', 'singkatan' => 'Pemkot Bontang', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Timur'],
            ['nama_instansi' => 'Pemerintah Kota Samarinda', 'singkatan' => 'Pemkot Samarinda', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Timur'],
        ];

        // KALIMANTAN UTARA
        $pemkotKaltara = [
            ['nama_instansi' => 'Pemerintah Kota Tarakan', 'singkatan' => 'Pemkot Tarakan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Kalimantan Utara'],
        ];

        // SULAWESI UTARA
        $pemkotSulut = [
            ['nama_instansi' => 'Pemerintah Kota Bitung', 'singkatan' => 'Pemkot Bitung', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Utara'],
            ['nama_instansi' => 'Pemerintah Kota Kotamobagu', 'singkatan' => 'Pemkot Kotamobagu', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Utara'],
            ['nama_instansi' => 'Pemerintah Kota Manado', 'singkatan' => 'Pemkot Manado', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Utara'],
            ['nama_instansi' => 'Pemerintah Kota Tomohon', 'singkatan' => 'Pemkot Tomohon', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Utara'],
        ];

        // SULAWESI TENGAH
        $pemkotSulteng = [
            ['nama_instansi' => 'Pemerintah Kota Palu', 'singkatan' => 'Pemkot Palu', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Tengah'],
        ];

        // SULAWESI SELATAN
        $pemkotSulsel = [
            ['nama_instansi' => 'Pemerintah Kota Makassar', 'singkatan' => 'Pemkot Makassar', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Selatan'],
            ['nama_instansi' => 'Pemerintah Kota Palopo', 'singkatan' => 'Pemkot Palopo', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Selatan'],
            ['nama_instansi' => 'Pemerintah Kota Parepare', 'singkatan' => 'Pemkot Parepare', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Selatan'],
        ];

        // SULAWESI TENGGARA
        $pemkotSultra = [
            ['nama_instansi' => 'Pemerintah Kota Baubau', 'singkatan' => 'Pemkot Baubau', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Tenggara'],
            ['nama_instansi' => 'Pemerintah Kota Kendari', 'singkatan' => 'Pemkot Kendari', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Sulawesi Tenggara'],
        ];

        // GORONTALO
        $pemkotGorontalo = [
            ['nama_instansi' => 'Pemerintah Kota Gorontalo', 'singkatan' => 'Pemkot Gorontalo', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Gorontalo'],
        ];

        // SULAWESI BARAT
        $pemkotSulbar = [
            // Tidak ada kota di Sulawesi Barat
        ];

        // MALUKU
        $pemkotMaluku = [
            ['nama_instansi' => 'Pemerintah Kota Ambon', 'singkatan' => 'Pemkot Ambon', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Maluku'],
            ['nama_instansi' => 'Pemerintah Kota Tual', 'singkatan' => 'Pemkot Tual', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Maluku'],
        ];

        // MALUKU UTARA
        $pemkotMalut = [
            ['nama_instansi' => 'Pemerintah Kota Ternate', 'singkatan' => 'Pemkot Ternate', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Maluku Utara'],
            ['nama_instansi' => 'Pemerintah Kota Tidore Kepulauan', 'singkatan' => 'Pemkot Tidore Kepulauan', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Maluku Utara'],
        ];

        // PAPUA BARAT
        $pemkotPapbar = [
            ['nama_instansi' => 'Pemerintah Kota Sorong', 'singkatan' => 'Pemkot Sorong', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Papua Barat'],
        ];

        // PAPUA
        $pemkotPapua = [
            ['nama_instansi' => 'Pemerintah Kota Jayapura', 'singkatan' => 'Pemkot Jayapura', 'jenis' => 'pemkot', 'kategori' => 'kota', 'provinsi' => 'Papua'],
        ];

        // Gabungkan semua data
        $allPemkot = array_merge(
            $pemkotAceh, 
            $pemkotSumut, 
            $pemkotSumbar, 
            $pemkotRiau, 
            $pemkotJambi, 
            $pemkotSumsel, 
            $pemkotBengkulu, 
            $pemkotLampung,
            $pemkotBabel,
            $pemkotKepri,
            $pemkotJakarta,
            $pemkotJabar,
            $pemkotJateng,
            $pemkotYogyakarta,
            $pemkotJatim,
            $pemkotBanten,
            $pemkotBali,
            $pemkotNTB,
            $pemkotNTT,
            $pemkotKalbar,
            $pemkotKalteng,
            $pemkotKalsel,
            $pemkotKaltim,
            $pemkotKaltara,
            $pemkotSulut,
            $pemkotSulteng,
            $pemkotSulsel,
            $pemkotSultra,
            $pemkotGorontalo,
            $pemkotSulbar,
            $pemkotMaluku,
            $pemkotMalut,
            $pemkotPapbar,
            $pemkotPapua
        );

        // Insert semua data pemkot
        foreach ($allPemkot as $instansi) {
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
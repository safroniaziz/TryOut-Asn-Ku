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

        // Gabungkan semua data
        $allPemkot = array_merge(
            $pemkotAceh, 
            $pemkotSumut, 
            $pemkotSumbar, 
            $pemkotRiau, 
            $pemkotJambi, 
            $pemkotSumsel, 
            $pemkotBengkulu, 
            $pemkotLampung
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
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
        // Data Universitas Negeri dengan kota dan provinsi yang benar
        $universitasNegeri = [
            // 1-10
            ['nama_universitas' => 'Universitas Indonesia', 'singkatan' => 'UI', 'kota' => 'Depok', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Gadjah Mada', 'singkatan' => 'UGM', 'kota' => 'Sleman', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Institut Teknologi Bandung', 'singkatan' => 'ITB', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Institut Pertanian Bogor', 'singkatan' => 'IPB University', 'kota' => 'Bogor', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Airlangga', 'singkatan' => 'UNAIR', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Institut Teknologi Sepuluh Nopember', 'singkatan' => 'ITS', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Diponegoro', 'singkatan' => 'UNDIP', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Padjadjaran', 'singkatan' => 'UNPAD', 'kota' => 'Sumedang', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Brawijaya', 'singkatan' => 'UB', 'kota' => 'Malang', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Hasanuddin', 'singkatan' => 'UNHAS', 'kota' => 'Makassar', 'provinsi' => 'Sulawesi Selatan'],
            
            // 11-20
            ['nama_universitas' => 'Universitas Sumatera Utara', 'singkatan' => 'USU', 'kota' => 'Medan', 'provinsi' => 'Sumatera Utara'],
            ['nama_universitas' => 'Universitas Andalas', 'singkatan' => 'UNAND', 'kota' => 'Padang', 'provinsi' => 'Sumatera Barat'],
            ['nama_universitas' => 'Universitas Negeri Yogyakarta', 'singkatan' => 'UNY', 'kota' => 'Yogyakarta', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Universitas Negeri Jakarta', 'singkatan' => 'UNJ', 'kota' => 'Jakarta Pusat', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Negeri Semarang', 'singkatan' => 'UNNES', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Negeri Surabaya', 'singkatan' => 'UNESA', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Negeri Malang', 'singkatan' => 'UM', 'kota' => 'Malang', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Syiah Kuala', 'singkatan' => 'USK', 'kota' => 'Banda Aceh', 'provinsi' => 'Aceh'],
            ['nama_universitas' => 'Universitas Riau', 'singkatan' => 'UR', 'kota' => 'Pekanbaru', 'provinsi' => 'Riau'],
            ['nama_universitas' => 'Universitas Lampung', 'singkatan' => 'UNILA', 'kota' => 'Bandar Lampung', 'provinsi' => 'Lampung'],
            
            // 21-30
            ['nama_universitas' => 'Universitas Jambi', 'singkatan' => 'UNJA', 'kota' => 'Jambi', 'provinsi' => 'Jambi'],
            ['nama_universitas' => 'Universitas Bengkulu', 'singkatan' => 'UNIB', 'kota' => 'Bengkulu', 'provinsi' => 'Bengkulu'],
            ['nama_universitas' => 'Universitas Tanjungpura', 'singkatan' => 'UNTAN', 'kota' => 'Pontianak', 'provinsi' => 'Kalimantan Barat'],
            ['nama_universitas' => 'Universitas Lambung Mangkurat', 'singkatan' => 'ULM', 'kota' => 'Banjarmasin', 'provinsi' => 'Kalimantan Selatan'],
            ['nama_universitas' => 'Universitas Mulawarman', 'singkatan' => 'UNMUL', 'kota' => 'Samarinda', 'provinsi' => 'Kalimantan Timur'],
            ['nama_universitas' => 'Universitas Palangka Raya', 'singkatan' => 'UPR', 'kota' => 'Palangka Raya', 'provinsi' => 'Kalimantan Tengah'],
            ['nama_universitas' => 'Universitas Tadulako', 'singkatan' => 'UNTAD', 'kota' => 'Palu', 'provinsi' => 'Sulawesi Tengah'],
            ['nama_universitas' => 'Universitas Sam Ratulangi', 'singkatan' => 'UNSRAT', 'kota' => 'Manado', 'provinsi' => 'Sulawesi Utara'],
            ['nama_universitas' => 'Universitas Halu Oleo', 'singkatan' => 'UHO', 'kota' => 'Kendari', 'provinsi' => 'Sulawesi Tenggara'],
            ['nama_universitas' => 'Universitas Pattimura', 'singkatan' => 'UNPATTI', 'kota' => 'Ambon', 'provinsi' => 'Maluku'],
            
            // 31-42
            ['nama_universitas' => 'Universitas Cenderawasih', 'singkatan' => 'UNCEN', 'kota' => 'Jayapura', 'provinsi' => 'Papua'],
            ['nama_universitas' => 'Universitas Papua', 'singkatan' => 'UNIPA', 'kota' => 'Manokwari', 'provinsi' => 'Papua Barat'],
            ['nama_universitas' => 'Universitas Nusa Cendana', 'singkatan' => 'UNDANA', 'kota' => 'Kupang', 'provinsi' => 'Nusa Tenggara Timur'],
            ['nama_universitas' => 'Universitas Mataram', 'singkatan' => 'UNRAM', 'kota' => 'Mataram', 'provinsi' => 'Nusa Tenggara Barat'],
            ['nama_universitas' => 'Universitas Sultan Ageng Tirtayasa', 'singkatan' => 'UNTIRTA', 'kota' => 'Serang', 'provinsi' => 'Banten'],
            ['nama_universitas' => 'Universitas Teuku Umar', 'singkatan' => 'UTU', 'kota' => 'Meulaboh', 'provinsi' => 'Aceh'],
            ['nama_universitas' => 'Universitas Siliwangi', 'singkatan' => 'UNSIL', 'kota' => 'Tasikmalaya', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Negeri Makassar', 'singkatan' => 'UNM', 'kota' => 'Makassar', 'provinsi' => 'Sulawesi Selatan'],
            ['nama_universitas' => 'Universitas Islam Negeri Syarif Hidayatullah Jakarta', 'singkatan' => 'UIN Jakarta', 'kota' => 'Tangerang Selatan', 'provinsi' => 'Banten'],
            ['nama_universitas' => 'Universitas Islam Negeri Sunan Kalijaga', 'singkatan' => 'UIN Yogyakarta', 'kota' => 'Yogyakarta', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Universitas Islam Negeri Maulana Malik Ibrahim', 'singkatan' => 'UIN Malang', 'kota' => 'Malang', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Islam Negeri Alauddin', 'singkatan' => 'UIN Makassar', 'kota' => 'Gowa', 'provinsi' => 'Sulawesi Selatan'],
        ];

        // Data Universitas Swasta
        $universitasSwasta = [
            // 1-10
            ['nama_universitas' => 'Universitas Bina Nusantara', 'singkatan' => 'BINUS', 'kota' => 'Jakarta Barat', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Tarumanagara', 'singkatan' => 'UNTAR', 'kota' => 'Jakarta Barat', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Trisakti', 'singkatan' => 'TRISAKTI', 'kota' => 'Jakarta Pusat', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Katolik Parahyangan', 'singkatan' => 'UNPAR', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Atma Jaya Jakarta', 'singkatan' => 'UAJY', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Pelita Harapan', 'singkatan' => 'UPH', 'kota' => 'Tangerang', 'provinsi' => 'Banten'],
            ['nama_universitas' => 'Universitas Kristen Petra', 'singkatan' => 'UK Petra', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Sanata Dharma', 'singkatan' => 'USD', 'kota' => 'Yogyakarta', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Universitas Islam Indonesia', 'singkatan' => 'UII', 'kota' => 'Sleman', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Universitas Muhammadiyah Yogyakarta', 'singkatan' => 'UMY', 'kota' => 'Bantul', 'provinsi' => 'DI Yogyakarta'],

            // 11-20  
            ['nama_universitas' => 'Universitas Muhammadiyah Malang', 'singkatan' => 'UMM', 'kota' => 'Malang', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Muhammadiyah Surakarta', 'singkatan' => 'UMS', 'kota' => 'Surakarta', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Muhammadiyah Jakarta', 'singkatan' => 'UMJ', 'kota' => 'Jakarta Timur', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Muhammadiyah Semarang', 'singkatan' => 'UNIMUS', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Mercu Buana', 'singkatan' => 'UMB', 'kota' => 'Jakarta Barat', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Gunadarma', 'singkatan' => 'UG', 'kota' => 'Depok', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Telkom University', 'singkatan' => 'Tel-U', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Kristen Satya Wacana', 'singkatan' => 'UKSW', 'kota' => 'Salatiga', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Surabaya', 'singkatan' => 'UBAYA', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Pancasila', 'singkatan' => 'UP', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],

            // 21-30
            ['nama_universitas' => 'Universitas Nasional', 'singkatan' => 'UNAS', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Esa Unggul', 'singkatan' => 'UEU', 'kota' => 'Jakarta Barat', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Al Azhar Indonesia', 'singkatan' => 'UAI', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Kristen Indonesia', 'singkatan' => 'UKI', 'kota' => 'Jakarta Timur', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Ciputra', 'singkatan' => 'UC', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Dian Nuswantoro', 'singkatan' => 'UDINUS', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Kristen Maranatha', 'singkatan' => 'UKM', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Ahmad Dahlan', 'singkatan' => 'UAD', 'kota' => 'Yogyakarta', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Universitas Islam Sultan Agung', 'singkatan' => 'UNISSULA', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Islam Bandung', 'singkatan' => 'UNISBA', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],

            // 31-45
            ['nama_universitas' => 'Universitas Katolik Soegijapranata', 'singkatan' => 'UNIKA Soegijapranata', 'kota' => 'Semarang', 'provinsi' => 'Jawa Tengah'],
            ['nama_universitas' => 'Universitas Komputer Indonesia', 'singkatan' => 'UNIKOM', 'kota' => 'Bandung', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Narotama', 'singkatan' => 'NAROTAMA', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas 17 Agustus 1945', 'singkatan' => 'UNTAG', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Pembangunan Nasional Veteran Jakarta', 'singkatan' => 'UPNVJ', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Pembangunan Nasional Veteran Yogyakarta', 'singkatan' => 'UPNVY', 'kota' => 'Sleman', 'provinsi' => 'DI Yogyakarta'],
            ['nama_universitas' => 'Universitas Pembangunan Nasional Veteran Jawa Timur', 'singkatan' => 'UPNVJT', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'Universitas Widya Mandala Surabaya', 'singkatan' => 'UKWMS', 'kota' => 'Surabaya', 'provinsi' => 'Jawa Timur'],
            ['nama_universitas' => 'President University', 'singkatan' => 'PRESIDENT', 'kota' => 'Bekasi', 'provinsi' => 'Jawa Barat'],
            ['nama_universitas' => 'Universitas Multimedia Nusantara', 'singkatan' => 'UMN', 'kota' => 'Tangerang', 'provinsi' => 'Banten'],
            ['nama_universitas' => 'Universitas Prasetiya Mulya', 'singkatan' => 'PRASMUL', 'kota' => 'Tangerang Selatan', 'provinsi' => 'Banten'],
            ['nama_universitas' => 'Universitas Katolik Indonesia Atma Jaya', 'singkatan' => 'Unika Atma Jaya', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Paramadina', 'singkatan' => 'PARAMADINA', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Bakrie', 'singkatan' => 'UB', 'kota' => 'Jakarta Selatan', 'provinsi' => 'DKI Jakarta'],
            ['nama_universitas' => 'Universitas Pelita Harapan Medan', 'singkatan' => 'UPH Medan', 'kota' => 'Medan', 'provinsi' => 'Sumatera Utara'],
        ];

        // Data pendidikan lainnya
        $pendidikanLain = [
            ['nama_universitas' => 'SMA Negeri', 'singkatan' => 'SMA N', 'kota' => null, 'provinsi' => null],
            ['nama_universitas' => 'SMA Swasta', 'singkatan' => 'SMA S', 'kota' => null, 'provinsi' => null],
            ['nama_universitas' => 'SMK Negeri', 'singkatan' => 'SMK N', 'kota' => null, 'provinsi' => null],
            ['nama_universitas' => 'SMK Swasta', 'singkatan' => 'SMK S', 'kota' => null, 'provinsi' => null],
            ['nama_universitas' => 'Madrasah Aliyah Negeri', 'singkatan' => 'MAN', 'kota' => null, 'provinsi' => null],
            ['nama_universitas' => 'Madrasah Aliyah Swasta', 'singkatan' => 'MAS', 'kota' => null, 'provinsi' => null],
            ['nama_universitas' => 'Lainnya', 'singkatan' => 'Lainnya', 'kota' => null, 'provinsi' => null],
        ];

        // Insert universitas negeri
        foreach ($universitasNegeri as $univ) {
            Universitas::create([
                'nama_universitas' => $univ['nama_universitas'],
                'singkatan' => $univ['singkatan'],
                'jenis' => 'negeri',
                'provinsi_id' => $univ['provinsi'] ? $getProvinsiId($univ['provinsi']) : null,
                'kota_id' => $univ['kota'] && $univ['provinsi'] ? $getKotaId($univ['kota'], $univ['provinsi']) : null,
                'aktif' => true,
            ]);
        }

        // Insert universitas swasta  
        foreach ($universitasSwasta as $univ) {
            Universitas::create([
                'nama_universitas' => $univ['nama_universitas'],
                'singkatan' => $univ['singkatan'],
                'jenis' => 'swasta',
                'provinsi_id' => $univ['provinsi'] ? $getProvinsiId($univ['provinsi']) : null,
                'kota_id' => $univ['kota'] && $univ['provinsi'] ? $getKotaId($univ['kota'], $univ['provinsi']) : null,
                'aktif' => true,
            ]);
        }

        // Insert pendidikan lainnya
        foreach ($pendidikanLain as $univ) {
            Universitas::create([
                'nama_universitas' => $univ['nama_universitas'],
                'singkatan' => $univ['singkatan'],
                'jenis' => $univ['nama_universitas'] === 'SMA Negeri' || $univ['nama_universitas'] === 'SMK Negeri' || $univ['nama_universitas'] === 'Madrasah Aliyah Negeri' ? 'negeri' : 'swasta',
                'provinsi_id' => null,
                'kota_id' => null,
                'aktif' => true,
            ]);
        }
    }
}

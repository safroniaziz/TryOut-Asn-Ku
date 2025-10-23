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

        // SUMATERA BARAT
        $pemkabSumbar = [
            ['nama_instansi' => 'Pemerintah Kabupaten Agam', 'singkatan' => 'Pemkab Agam', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Dharmasraya', 'singkatan' => 'Pemkab Dharmasraya', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kepulauan Mentawai', 'singkatan' => 'Pemkab Kepulauan Mentawai', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lima Puluh Kota', 'singkatan' => 'Pemkab Lima Puluh Kota', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Padang Pariaman', 'singkatan' => 'Pemkab Padang Pariaman', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pasaman', 'singkatan' => 'Pemkab Pasaman', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pasaman Barat', 'singkatan' => 'Pemkab Pasaman Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pesisir Selatan', 'singkatan' => 'Pemkab Pesisir Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sijunjung', 'singkatan' => 'Pemkab Sijunjung', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Solok', 'singkatan' => 'Pemkab Solok', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Solok Selatan', 'singkatan' => 'Pemkab Solok Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tanah Datar', 'singkatan' => 'Pemkab Tanah Datar', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Barat'],
        ];

        // RIAU
        $pemkabRiau = [
            ['nama_instansi' => 'Pemerintah Kabupaten Bengkalis', 'singkatan' => 'Pemkab Bengkalis', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Indragiri Hilir', 'singkatan' => 'Pemkab Indragiri Hilir', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Indragiri Hulu', 'singkatan' => 'Pemkab Indragiri Hulu', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kampar', 'singkatan' => 'Pemkab Kampar', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kepulauan Meranti', 'singkatan' => 'Pemkab Kepulauan Meranti', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kuantan Singingi', 'singkatan' => 'Pemkab Kuantan Singingi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pelalawan', 'singkatan' => 'Pemkab Pelalawan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Rokan Hilir', 'singkatan' => 'Pemkab Rokan Hilir', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Rokan Hulu', 'singkatan' => 'Pemkab Rokan Hulu', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
            ['nama_instansi' => 'Pemerintah Kabupaten Siak', 'singkatan' => 'Pemkab Siak', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Riau'],
        ];

        // JAMBI
        $pemkabJambi = [
            ['nama_instansi' => 'Pemerintah Kabupaten Batang Hari', 'singkatan' => 'Pemkab Batang Hari', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bungo', 'singkatan' => 'Pemkab Bungo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kerinci', 'singkatan' => 'Pemkab Kerinci', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Merangin', 'singkatan' => 'Pemkab Merangin', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Muaro Jambi', 'singkatan' => 'Pemkab Muaro Jambi', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Sarolangun', 'singkatan' => 'Pemkab Sarolangun', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tanjung Jabung Barat', 'singkatan' => 'Pemkab Tanjung Jabung Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tanjung Jabung Timur', 'singkatan' => 'Pemkab Tanjung Jabung Timur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tebo', 'singkatan' => 'Pemkab Tebo', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Jambi'],
        ];

        // SUMATERA SELATAN
        $pemkabSumsel = [
            ['nama_instansi' => 'Pemerintah Kabupaten Banyuasin', 'singkatan' => 'Pemkab Banyuasin', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Empat Lawang', 'singkatan' => 'Pemkab Empat Lawang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lahat', 'singkatan' => 'Pemkab Lahat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Muara Enim', 'singkatan' => 'Pemkab Muara Enim', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Musi Banyuasin', 'singkatan' => 'Pemkab Musi Banyuasin', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Musi Rawas', 'singkatan' => 'Pemkab Musi Rawas', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Musi Rawas Utara', 'singkatan' => 'Pemkab Musi Rawas Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ogan Ilir', 'singkatan' => 'Pemkab Ogan Ilir', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ogan Komering Ilir', 'singkatan' => 'Pemkab Ogan Komering Ilir', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ogan Komering Ulu', 'singkatan' => 'Pemkab Ogan Komering Ulu', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ogan Komering Ulu Selatan', 'singkatan' => 'Pemkab Ogan Komering Ulu Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
            ['nama_instansi' => 'Pemerintah Kabupaten Ogan Komering Ulu Timur', 'singkatan' => 'Pemkab Ogan Komering Ulu Timur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Sumatera Selatan'],
        ];

        // BENGKULU
        $pemkabBengkulu = [
            ['nama_instansi' => 'Pemerintah Kabupaten Bengkulu Selatan', 'singkatan' => 'Pemkab Bengkulu Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bengkulu Tengah', 'singkatan' => 'Pemkab Bengkulu Tengah', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bengkulu Utara', 'singkatan' => 'Pemkab Bengkulu Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kaur', 'singkatan' => 'Pemkab Kaur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Kepahiang', 'singkatan' => 'Pemkab Kepahiang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lebong', 'singkatan' => 'Pemkab Lebong', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Mukomuko', 'singkatan' => 'Pemkab Mukomuko', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Rejang Lebong', 'singkatan' => 'Pemkab Rejang Lebong', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
            ['nama_instansi' => 'Pemerintah Kabupaten Seluma', 'singkatan' => 'Pemkab Seluma', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Bengkulu'],
        ];

        // LAMPUNG
        $pemkabLampung = [
            ['nama_instansi' => 'Pemerintah Kabupaten Lampung Barat', 'singkatan' => 'Pemkab Lampung Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lampung Selatan', 'singkatan' => 'Pemkab Lampung Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lampung Tengah', 'singkatan' => 'Pemkab Lampung Tengah', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lampung Timur', 'singkatan' => 'Pemkab Lampung Timur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Lampung Utara', 'singkatan' => 'Pemkab Lampung Utara', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Mesuji', 'singkatan' => 'Pemkab Mesuji', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pesawaran', 'singkatan' => 'Pemkab Pesawaran', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pesisir Barat', 'singkatan' => 'Pemkab Pesisir Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Pringsewu', 'singkatan' => 'Pemkab Pringsewu', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tanggamus', 'singkatan' => 'Pemkab Tanggamus', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tulang Bawang', 'singkatan' => 'Pemkab Tulang Bawang', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Tulang Bawang Barat', 'singkatan' => 'Pemkab Tulang Bawang Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Way Kanan', 'singkatan' => 'Pemkab Way Kanan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Lampung'],
        ];

        // KEPULAUAN BANGKA BELITUNG
        $pemkabBabel = [
            ['nama_instansi' => 'Pemerintah Kabupaten Bangka', 'singkatan' => 'Pemkab Bangka', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bangka Barat', 'singkatan' => 'Pemkab Bangka Barat', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bangka Selatan', 'singkatan' => 'Pemkab Bangka Selatan', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Bangka Tengah', 'singkatan' => 'Pemkab Bangka Tengah', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Belitung', 'singkatan' => 'Pemkab Belitung', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_instansi' => 'Pemerintah Kabupaten Belitung Timur', 'singkatan' => 'Pemkab Belitung Timur', 'jenis' => 'pemkab', 'kategori' => 'kabupaten', 'provinsi' => 'Kepulauan Bangka Belitung'],
        ];

        // Gabungkan semua data
        $allPemkab = array_merge(
            $pemkabAceh,
            $pemkabSumut,
            $pemkabSumbar,
            $pemkabRiau,
            $pemkabJambi,
            $pemkabSumsel,
            $pemkabBengkulu,
            $pemkabLampung,
            $pemkabBabel
        );

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

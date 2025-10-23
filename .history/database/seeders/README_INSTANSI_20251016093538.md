# Seeder Instansi Pemerintah Indonesia

## Overview
Seeder ini menyediakan data lengkap instansi pemerintahan Indonesia untuk sistem ASN (Aparatur Sipil Negara), mencakup:

- **442 Total Instansi** 
- **30 Kementerian**
- **16 Lembaga Tinggi Negara**
- **46 Lembaga Pemerintah Non Kementerian (LPNK)**
- **34 Pemerintah Provinsi**
- **198 Pemerintah Kabupaten**
- **98 Pemerintah Kota**

## Struktur Data

### Tabel Instansi
```sql
- id (Primary Key)
- nama_instansi (VARCHAR)
- singkatan (VARCHAR, nullable)
- jenis (ENUM: lembaga_tinggi, lembaga_pemilu, lembaga_pengawasan, lpnk, pemprov, pemkab, pemkot, kementerian)
- kategori (ENUM: pusat, provinsi, kabupaten, kota, kementerian)
- provinsi_id (Foreign Key ke tabel provinsi, nullable)
- kota_id (Foreign Key ke tabel kota, nullable)
- deskripsi (TEXT, nullable)
- aktif (BOOLEAN, default: true)
- created_at & updated_at (TIMESTAMP)
```

### Kategori Instansi

#### 1. Lembaga Tinggi Negara (16 instansi)
- MPR, DPR, DPD, BPK, MA, MK, KY, Presiden, dan lain-lain

#### 2. Lembaga Pemilu (3 instansi)
- KPU, Bawaslu, DKPP

#### 3. Lembaga Pengawasan (7 instansi)  
- KPK, Ombudsman, LPSK, PPATK, dan lain-lain

#### 4. Kementerian (30 instansi)
- Semua kementerian dalam Kabinet Indonesia
- Kemendagri, Kemenlu, Kemhan, Kemenkeu, dan lain-lain

#### 5. LPNK (46 instansi)
- Lembaga Pemerintah Non Kementerian
- BAPPENAS, BPS, LIPI, BPOM, dan lain-lain

#### 6. Pemerintah Provinsi (34 provinsi)
- Seluruh provinsi di Indonesia
- Aceh hingga Papua Barat Daya

#### 7. Pemerintah Kabupaten (198 kabupaten)
- Kabupaten dari 34 provinsi
- Terbagi dalam beberapa seeder berdasarkan geografis

#### 8. Pemerintah Kota (98 kota)
- Kota dari seluruh Indonesia
- Jakarta Pusat hingga Sorong

## File Seeder

### 1. InstansiSeeder.php (Main Seeder)
- Instansi pusat (kementerian, lembaga tinggi, LPNK)
- Pemerintah provinsi
- Koordinasi dengan seeder kabupaten/kota

### 2. InstansiKabupatenSeeder.php
- Kabupaten Sumatera
- Kabupaten Kalimantan, Sulawesi, Papua
- Regional non-Jawa

### 3. InstansiKabupatenJawaSeeder.php
- Kabupaten Jawa Barat (18 kabupaten)
- Kabupaten Jawa Tengah (29 kabupaten)  
- Kabupaten Jawa Timur (29 kabupaten)
- Kabupaten DI Yogyakarta (4 kabupaten)
- Kabupaten Banten (4 kabupaten)

### 4. InstansiKotaSeeder.php
- Semua kota dari 34 provinsi
- Jakarta (5 kota administratif)
- Kota besar dan kecil

## Penggunaan

### Menjalankan Seeder
```bash
# Migrasi fresh dengan seeder
php artisan migrate:fresh --seed

# Hanya seeder instansi
php artisan db:seed --class=InstansiSeeder
```

### Query Data
```php
// Total instansi
$total = Instansi::count();

// Berdasarkan jenis
$kementerian = Instansi::where('jenis', 'kementerian')->get();
$pemkab = Instansi::where('jenis', 'pemkab')->get();

// Berdasarkan provinsi
$instansiJabar = Instansi::whereHas('provinsi', function($q) {
    $q->where('nama_provinsi', 'Jawa Barat');
})->get();

// Instansi aktif
$aktif = Instansi::where('aktif', true)->get();
```

## Fitur

### 1. Relasi Database
- Foreign key ke tabel provinsi untuk pemkab/pemkot
- Cascade delete untuk integritas data

### 2. Indeks Database
- Index pada jenis dan kategori
- Index pada provinsi_id dan jenis

### 3. Validasi Data  
- Enum values untuk jenis dan kategori
- Nullable fields untuk fleksibilitas

### 4. Organisasi Geografis
- Pemisahan seeder berdasarkan wilayah
- Optimasi performa untuk dataset besar

## Maintenance

### Menambah Instansi Baru
1. Edit seeder yang sesuai
2. Tambahkan data dalam format array
3. Jalankan `php artisan db:seed --class=NamaSeeder`

### Update Data Existing
```php
Instansi::where('nama_instansi', 'Nama Lama')
    ->update(['nama_instansi' => 'Nama Baru']);
```

## Validasi Data

Seeder ini telah divalidasi dengan:
- ✅ 442 total instansi berhasil dimasukkan
- ✅ Relasi foreign key berfungsi
- ✅ Data tersebar merata di seluruh provinsi
- ✅ Tidak ada duplikasi nama instansi
- ✅ Enum values sesuai dengan skema database

## Penggunaan dalam Aplikasi

### Form Dropdown Instansi
```php
$instansi = Instansi::where('aktif', true)
    ->orderBy('nama_instansi')
    ->get();
```

### Filter Berdasarkan Jenis
```php
$kementerian = Instansi::where('jenis', 'kementerian')
    ->where('aktif', true)
    ->pluck('nama_instansi', 'id');
```

### Cascading Dropdown (Provinsi > Instansi Daerah)
```php
Route::get('/api/instansi-by-provinsi/{provinsi_id}', function($provinsi_id) {
    return Instansi::whereIn('jenis', ['pemkab', 'pemkot'])
        ->where('provinsi_id', $provinsi_id)
        ->where('aktif', true)
        ->get();
});
```

---

**Update Terakhir**: 16 Oktober 2025  
**Versi**: 1.0  
**Maintainer**: Tim Pengembang ASN System

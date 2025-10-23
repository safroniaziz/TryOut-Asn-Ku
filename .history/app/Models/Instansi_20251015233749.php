<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instansi extends Model
{
    protected $table = 'instansi';
    
    protected $fillable = [
        'nama_instansi',
        'singkatan',
        'jenis',
        'kategori',
        'provinsi_id',
        'kota_id',
        'deskripsi',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }
}

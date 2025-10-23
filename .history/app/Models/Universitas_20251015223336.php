<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Universitas extends Model
{
    protected $table = 'universitas';

    protected $fillable = [
        'nama_universitas',
        'singkatan',
        'jenis',
        'provinsi_id',
        'kota_id',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    // Relationships
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }

    // Scope untuk universitas aktif
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    // Scope berdasarkan jenis
    public function scopeNegeri($query)
    {
        return $query->where('jenis', 'negeri');
    }

    public function scopeSwasta($query)
    {
        return $query->where('jenis', 'swasta');
    }

    public function scopeByProvinsi($query, $provinsiId)
    {
        return $query->where('provinsi_id', $provinsiId);
    }

    public function scopeByKota($query, $kotaId)
    {
        return $query->where('kota_id', $kotaId);
    }
}

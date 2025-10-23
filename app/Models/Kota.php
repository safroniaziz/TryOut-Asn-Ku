<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kota extends Model
{
    protected $table = 'kota';

    protected $fillable = [
        'provinsi_id',
        'nama_kota',
        'jenis',
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

    public function universitas(): HasMany
    {
        return $this->hasMany(Universitas::class);
    }

    // Scopes
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeByProvinsi($query, $provinsiId)
    {
        return $query->where('provinsi_id', $provinsiId);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    
    protected $fillable = [
        'nama_provinsi',
        'kode_provinsi',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    // Relationships
    public function kota(): HasMany
    {
        return $this->hasMany(Kota::class);
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
}

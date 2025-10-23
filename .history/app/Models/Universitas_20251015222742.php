<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    protected $table = 'universitas';
    
    protected $fillable = [
        'nama_universitas',
        'singkatan',
        'jenis',
        'provinsi',
        'kota',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

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
}

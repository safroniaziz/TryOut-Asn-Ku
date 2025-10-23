<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function tryouts()
    {
        return $this->belongsToMany(Tryout::class, 'tryout_categories')
            ->withPivot('question_count')
            ->withTimestamps();
    }

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCPNS($query)
    {
        return $query->where('type', 'CPNS');
    }

    public function scopePPPK($query)
    {
        return $query->where('type', 'PPPK');
    }
}

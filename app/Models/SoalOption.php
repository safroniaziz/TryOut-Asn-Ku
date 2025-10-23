<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'soal_id',
        'option_key',
        'option_text',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    // Relationships
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    // Scopes
    public function scopeCorrect($query)
    {
        return $query->where('is_correct', true);
    }

    public function scopeForSoal($query, $soalId)
    {
        return $query->where('soal_id', $soalId);
    }

    // Helpers
    public function isCorrect()
    {
        return $this->is_correct;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tryout_id',
        'soal_id',
        'jawaban',
        'is_correct',
        'skor',
        'finished_at'
    ];

    protected $casts = [
        'is_correct' => 'boolean',
        'finished_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    // Scopes
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeForTryout($query, $tryoutId)
    {
        return $query->where('tryout_id', $tryoutId);
    }

    public function scopeCorrect($query)
    {
        return $query->where('is_correct', true);
    }

    public function scopeIncorrect($query)
    {
        return $query->where('is_correct', false);
    }
}

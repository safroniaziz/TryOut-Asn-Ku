<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'kategori',
        'duration_minutes',
        'total_questions',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function jawabanUsers()
    {
        return $this->hasMany(JawabanUser::class);
    }

    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class);
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

    // Helpers
    public function getUserScore($userId)
    {
        $leaderboard = $this->leaderboards()->where('user_id', $userId)->first();
        return $leaderboard ? $leaderboard->total_skor : null;
    }

    public function hasUserCompleted($userId)
    {
        return $this->leaderboards()->where('user_id', $userId)->exists();
    }
}

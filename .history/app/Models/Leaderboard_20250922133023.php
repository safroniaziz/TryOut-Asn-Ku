<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tryout_id',
        'total_skor',
        'benar',
        'salah',
        'tidak_dijawab',
        'rank',
        'persentase',
        'waktu_pengerjaan_detik'
    ];

    protected $casts = [
        'persentase' => 'decimal:2',
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

    // Scopes
    public function scopeForTryout($query, $tryoutId)
    {
        return $query->where('tryout_id', $tryoutId);
    }

    public function scopeTopRanks($query, $limit = 10)
    {
        return $query->orderBy('rank')->limit($limit);
    }

    public function scopeByScore($query)
    {
        return $query->orderBy('total_skor', 'desc');
    }

    // Helpers
    public function getWaktuPengerjaanFormatted()
    {
        $detik = $this->waktu_pengerjaan_detik;
        $jam = floor($detik / 3600);
        $menit = floor(($detik % 3600) / 60);
        $detik = $detik % 60;

        if ($jam > 0) {
            return sprintf('%02d:%02d:%02d', $jam, $menit, $detik);
        }

        return sprintf('%02d:%02d', $menit, $detik);
    }

    public function calculateRank()
    {
        $rank = static::where('tryout_id', $this->tryout_id)
                     ->where('total_skor', '>', $this->total_skor)
                     ->count() + 1;

        $this->update(['rank' => $rank]);
        return $rank;
    }
}

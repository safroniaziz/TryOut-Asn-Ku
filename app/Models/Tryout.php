<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'type',
        'kategori',
        'duration_minutes',
        'total_questions',
        'is_active',
        'package_type',
        'free_until',
        'tryout_time',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'free_until' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relationships
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tryout_categories')
            ->withPivot('question_count')
            ->withTimestamps();
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

    // Route key name for SEO-friendly URLs
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Package Type Helpers
    public function isFree()
    {
        return $this->package_type === 'free' ||
               ($this->package_type === 'free_limited' && $this->free_until && $this->free_until->isFuture());
    }

    public function isPremium()
    {
        return !$this->isFree();
    }

    public function getPackageTypeLabel()
    {
        if ($this->isFree()) {
            return $this->package_type === 'free_limited' && $this->free_until
                ? 'FREE (Until ' . $this->free_until->format('M d, Y') . ')'
                : 'FREE';
        }
        return 'PREMIUM';
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tryout_id',
        'title',
        'description',
        'file_path',
        'file_name',
        'file_size',
        'is_premium',
        'download_count',
        'is_active'
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    // Helpers
    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }

    public function getFileSizeFormatted()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function canBeDownloadedBy($user)
    {
        if (!$this->is_premium) {
            return true;
        }

        // Check if user has active premium subscription
        return $user->hasActivePremiumSubscription();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'status',
        'amount',
        'payment_method',
        'transaction_id'
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_akhir' => 'datetime',
        'amount' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('tanggal_akhir', '>=', now());
    }

    public function scopeExpired($query)
    {
        return $query->where('tanggal_akhir', '<', now());
    }

    // Helpers
    public function isActive()
    {
        return $this->status === 'active' && $this->tanggal_akhir >= now();
    }

    public function isExpired()
    {
        return $this->tanggal_akhir < now();
    }

    public function getDaysRemaining()
    {
        if ($this->isExpired()) {
            return 0;
        }

        return Carbon::now()->diffInDays($this->tanggal_akhir);
    }

    public function getRemainingPercentage()
    {
        $totalDays = Carbon::parse($this->tanggal_mulai)->diffInDays($this->tanggal_akhir);
        $remainingDays = $this->getDaysRemaining();
        
        return $totalDays > 0 ? ($remainingDays / $totalDays) * 100 : 0;
    }
}

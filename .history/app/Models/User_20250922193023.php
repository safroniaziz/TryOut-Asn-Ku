<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'target_test',
        'experience_level', 
        'target_institution',
        'referral_code',
        'motivation',
        'newsletter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function jawabanUsers()
    {
        return $this->hasMany(JawabanUser::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class);
    }

    // Premium subscription helpers
    public function hasActivePremiumSubscription()
    {
        return $this->subscriptions()
                   ->where('status', 'active')
                   ->where('tanggal_akhir', '>=', now())
                   ->exists();
    }

    public function getActivePremiumSubscription()
    {
        return $this->subscriptions()
                   ->where('status', 'active')
                   ->where('tanggal_akhir', '>=', now())
                   ->first();
    }

    public function hasCompletedTryout($tryoutId)
    {
        return $this->leaderboards()->where('tryout_id', $tryoutId)->exists();
    }

    public function getTryoutScore($tryoutId)
    {
        $leaderboard = $this->leaderboards()->where('tryout_id', $tryoutId)->first();
        return $leaderboard ? $leaderboard->total_skor : null;
    }
}

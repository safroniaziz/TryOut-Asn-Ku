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
        'whatsapp',
        'city',
        'education_level',
        'work_status',
        'target_score',
        'my_referral_code',
        'parent_id',
        'used_referral_code',
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

    // Referral System Relationships
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function allDescendants()
    {
        return $this->children()->with('allDescendants');
    }

    // Referral relationships
    public function referralsGiven()
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    public function referralReceived()
    {
        return $this->hasOne(Referral::class, 'referred_id')->where('level', 1);
    }

    // Generate unique referral code
    public static function generateReferralCode()
    {
        do {
            $code = 'ASN' . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6));
        } while (self::where('my_referral_code', $code)->exists());
        
        return $code;
    }

    // Get referral statistics
    public function getReferralStats()
    {
        $directReferrals = $this->children()->count();
        $totalReferrals = $this->getTotalReferralsCount();
        
        return [
            'direct' => $directReferrals,
            'total' => $totalReferrals,
            'levels' => $this->getReferralLevels()
        ];
    }

    private function getTotalReferralsCount($user = null, $count = 0)
    {
        if (!$user) $user = $this;
        
        $children = $user->children;
        $count += $children->count();
        
        foreach ($children as $child) {
            $count = $this->getTotalReferralsCount($child, $count);
        }
        
        return $count;
    }

    private function getReferralLevels($user = null, $level = 1, $levels = [])
    {
        if (!$user) $user = $this;
        
        $children = $user->children;
        if ($children->count() > 0) {
            $levels[$level] = $children->count();
            
            foreach ($children as $child) {
                $levels = $this->getReferralLevels($child, $level + 1, $levels);
            }
        }
        
        return $levels;
    }
}

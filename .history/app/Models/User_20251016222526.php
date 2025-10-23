<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'phone_verified_at',
        'target_test',
        'experience_level',
        'target_institution',
        'motivation',
        'newsletter',
        'whatsapp',
        'city',
        'education_level',
        'work_status',
        'target_score',
        'my_referral_code',      // Auto-generated referral code untuk user ini
        'parent_id',
        'used_referral_code',    // Referral code orang lain yang diinput saat daftar (nullable)
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
            'phone_verified_at' => 'datetime',
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

    // Generate unique referral code dengan format ASN2025000001, ASN2025000002, dst
    public static function generateReferralCode($userId = null)
    {
        $year = date('Y');
        $userId = $userId ?: (static::max('id') + 1);

        // Format: ASN2025000001 (5 digit dengan padding), mengantisipasi banyak pendaftar
        return 'ASN' . $year . str_pad($userId, 6, '0', STR_PAD_LEFT);
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

    // Boot method untuk auto-generate referral code
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->my_referral_code)) {
                // Generate kode referral berdasarkan ID yang akan diberikan
                $nextId = static::max('id') + 1;
                $user->my_referral_code = static::generateReferralCode($nextId);
            }
        });
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

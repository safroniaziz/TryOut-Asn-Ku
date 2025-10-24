<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $package_type_id
 * @property int $tryout_count
 * @property json|null $included_modules
 * @property int $access_duration_days
 * @property bool $can_access_challenges
 * @property bool $can_use_referral
 * @property bool $is_active
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\PackageType $packageType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TryoutPackagePrice> $prices
 * @property-read \App\Models\TryoutPackagePrice|null $currentPrice
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserSubscription> $subscriptions
 */
class TryoutPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'package_type_id',
        'tryout_count',
        'included_modules',
        'access_duration_days',
        'can_access_challenges',
        'can_use_referral',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'included_modules' => 'array',
        'can_access_challenges' => 'boolean',
        'can_use_referral' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    public function prices()
    {
        return $this->hasMany(TryoutPackagePrice::class);
    }

    public function currentPrice()
    {
        return $this->hasOne(TryoutPackagePrice::class)
                    ->where('is_active', true)
                    ->where(function ($query) {
                        $query->whereNull('expiry_date')
                              ->orWhere('expiry_date', '>=', now());
                    })
                    ->where('effective_date', '<=', now())
                    ->latest('effective_date');
    }

    public function subscriptions()
    {
        return $this->morphMany(UserSubscription::class, 'subscribable');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessors
    public function getCurrentPriceAttribute()
    {
        return $this->currentPrice?->current_price ?? 0;
    }

    public function getDisplayPriceAttribute()
    {
        return $this->currentPrice?->display_price ?? 'Rp 0';
    }

    public function getCanAccessChallengesAttribute($value)
    {
        // Tryout packages cannot access challenges
        return false;
    }
}
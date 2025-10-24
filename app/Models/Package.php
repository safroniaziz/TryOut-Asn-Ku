<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $package_category
 * @property int $package_type_id
 * @property bool $can_access_challenges
 * @property bool $can_use_referral
 * @property bool $is_active
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\PackageType $packageType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PackagePrice> $prices
 * @property-read \App\Models\PackagePrice|null $currentPrice
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserSubscription> $subscriptions
 */
class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'package_category',
        'package_type_id',
        'can_access_challenges',
        'can_use_referral',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
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
        return $this->hasMany(PackagePrice::class);
    }

    public function currentPrice()
    {
        return $this->hasOne(PackagePrice::class)
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

    public function scopeByCategory($query, $category)
    {
        return $query->where('package_category', $category);
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
        // For full packages, check if it can access challenges
        if ($this->package_category === 'full_package') {
            return (bool) $value;
        }

        // Single modules and tryouts cannot access challenges
        return false;
    }
}
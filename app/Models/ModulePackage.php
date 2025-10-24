<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $module_id
 * @property int $access_duration_days
 * @property int $included_tryout_count
 * @property bool $can_access_challenges
 * @property bool $can_use_referral
 * @property bool $is_active
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\Module $module
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ModulePackagePrice> $prices
 * @property-read \App\Models\ModulePackagePrice|null $currentPrice
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserSubscription> $subscriptions
 */
class ModulePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'module_id',
        'access_duration_days',
        'included_tryout_count',
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
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function prices()
    {
        return $this->hasMany(ModulePackagePrice::class);
    }

    public function currentPrice()
    {
        return $this->hasOne(ModulePackagePrice::class)
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
}
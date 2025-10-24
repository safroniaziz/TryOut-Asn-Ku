<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $subscribable_type
 * @property int $subscribable_id
 * @property string $package_name
 * @property string $package_category
 * @property float $original_price
 * @property float $discount_amount
 * @property float $referral_discount_amount
 * @property float $final_price
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property bool $is_active
 * @property bool $can_access_challenges
 * @property json|null $accessible_modules
 * @property int|null $remaining_tryouts
 * @property string $payment_method
 * @property string $payment_reference
 * @property string $payment_status
 * @property string|null $referral_code_used
 * @property int|null $referral_id
 * @property string|null $admin_notes
 * @property int|null $processed_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\User $user
 * @property-read \App\Models\User|null $referrer
 * @property-read \App\Models\User|null $processedBy
 * @property-read \App\Models\Package|\App\Models\ModulePackage|\App\Models\TryoutPackage $subscribable
 */
class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscribable_type',
        'subscribable_id',
        'package_name',
        'package_category',
        'original_price',
        'discount_amount',
        'referral_discount_amount',
        'final_price',
        'starts_at',
        'expires_at',
        'is_active',
        'can_access_challenges',
        'accessible_modules',
        'remaining_tryouts',
        'payment_method',
        'payment_reference',
        'payment_status',
        'referral_code_used',
        'referral_id',
        'admin_notes',
        'processed_by',
    ];

    protected $casts = [
        'original_price' => 'float',
        'discount_amount' => 'float',
        'referral_discount_amount' => 'float',
        'final_price' => 'float',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
        'can_access_challenges' => 'boolean',
        'accessible_modules' => 'array',
        'remaining_tryouts' => 'integer',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }

    public function processedBy()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function subscribable()
    {
        return $this->morphTo();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('expires_at', '>', now());
    }

    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<=', now());
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Accessors
    public function getIsExpiredAttribute()
    {
        return $this->expires_at->isPast();
    }

    public function getDaysLeftAttribute()
    {
        return now()->diffInDays($this->expires_at);
    }

    public function getCanAccessTryoutsAttribute()
    {
        return $this->package_category === 'full_package' ||
               $this->remaining_tryouts > 0;
    }

    public function getFormattedFinalPriceAttribute()
    {
        return 'Rp ' . number_format($this->final_price, 0, ',', '.');
    }

    // Helper methods
    public function activate()
    {
        $this->update([
            'is_active' => true,
            'payment_status' => 'completed',
            'starts_at' => $this->starts_at ?? now(),
            'expires_at' => $this->expires_at ?? now()->addYear(),
        ]);
    }

    public function deactivate()
    {
        $this->update([
            'is_active' => false,
        ]);
    }

    public function extendAccess($days)
    {
        $this->update([
            'expires_at' => $this->expires_at->addDays($days),
        ]);
    }
}
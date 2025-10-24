<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $registrant_id
 * @property string $registrant_name
 * @property string $registrant_email
 * @property int $total_people
 * @property int|null $applied_tier_id
 * @property string $package_category
 * @property json|null $package_details
 * @property float $price_per_person
 * @property float $base_total
 * @property float $discount_percentage
 * @property float $discount_amount
 * @property float $final_total
 * @property float $final_price_per_person
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $requested_at
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property \Illuminate\Support\Carbon|null $cancelled_at
 * @property int|null $approved_by
 * @property string|null $payment_method
 * @property string|null $payment_reference
 * @property float|null $amount_paid
 * @property string|null $payment_proof_path
 * @property string|null $special_notes
 * @property json|null $registered_people_data
 * @property string|null $referral_code_used
 * @property int|null $referral_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\User $registrant
 * @property-read \App\Models\User|null $approvedBy
 * @property-read \App\Models\Referral|null $referral
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BulkSubscriptionUser> $bulkSubscriptionUsers
 */
class BulkRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registrant_id',
        'registrant_name',
        'registrant_email',
        'total_people',
        'applied_tier_id',
        'package_category',
        'package_details',
        'price_per_person',
        'base_total',
        'discount_percentage',
        'discount_amount',
        'final_total',
        'final_price_per_person',
        'status',
        'requested_at',
        'approved_at',
        'paid_at',
        'cancelled_at',
        'approved_by',
        'payment_method',
        'payment_reference',
        'amount_paid',
        'payment_proof_path',
        'special_notes',
        'registered_people_data',
        'referral_code_used',
        'referral_id',
    ];

    protected $casts = [
        'price_per_person' => 'float',
        'base_total' => 'float',
        'discount_percentage' => 'float',
        'discount_amount' => 'float',
        'final_total' => 'float',
        'final_price_per_person' => 'float',
        'amount_paid' => 'float',
        'requested_at' => 'datetime',
        'approved_at' => 'datetime',
        'paid_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'package_details' => 'array',
        'registered_people_data' => 'array',
    ];

    // Relationships
    public function registrant()
    {
        return $this->belongsTo(User::class, 'registrant_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }

    public function bulkSubscriptionUsers()
    {
        return $this->hasMany(BulkSubscriptionUser::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    // Accessors
    public function getFormattedFinalTotalAttribute()
    {
        return 'Rp ' . number_format($this->final_total, 0, ',', '.');
    }

    public function getFormattedDiscountAmountAttribute()
    {
        return 'Rp ' . number_format($this->discount_amount, 0, ',', '.');
    }

    public function getDiscountPercentageDisplayAttribute()
    {
        return $this->discount_percentage . '%';
    }

    // Helper methods
    public function approve($approvedBy = null)
    {
        $this->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => $approvedBy,
        ]);
    }

    public function markAsPaid($amountPaid = null, $paymentReference = null)
    {
        $this->update([
            'status' => 'paid',
            'paid_at' => now(),
            'amount_paid' => $amountPaid ?? $this->final_total,
            'payment_reference' => $paymentReference,
        ]);
    }

    public function cancel($reason = null)
    {
        $this->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'special_notes' => $reason,
        ]);
    }

    public function activateAllSubscriptions()
    {
        $this->bulkSubscriptionUsers()->update([
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addYear(),
            'activated_at' => now(),
        ]);
    }
}
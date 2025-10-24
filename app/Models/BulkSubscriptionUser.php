<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bulk_registration_id
 * @property int|null $user_id
 * @property string $user_name
 * @property string $user_email
 * @property string|null $user_phone
 * @property string $package_name
 * @property string $package_category
 * @property float $original_price_per_person
 * @property float $final_price_per_person
 * @property string $status
 * @property bool $can_access_challenges
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property \Illuminate\Support\Carbon|null $activated_at
 * @property int|null $activated_by
 * @property string|null $activation_notes
 * @property bool $account_created
 * @property string|null $temporary_password
 * @property \Illuminate\Support\Carbon|null $account_created_at
 * @property bool $welcome_email_sent
 * @property \Illuminate\Support\Carbon|null $welcome_email_sent_at
 * @property bool $login_details_sent
 * @property \Illuminate\Support\Carbon|null $login_details_sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\BulkRegistration $bulkRegistration
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\User|null $activatedBy
 */
class BulkSubscriptionUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulk_registration_id',
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'package_name',
        'package_category',
        'original_price_per_person',
        'final_price_per_person',
        'status',
        'can_access_challenges',
        'starts_at',
        'expires_at',
        'activated_at',
        'activated_by',
        'activation_notes',
        'account_created',
        'temporary_password',
        'account_created_at',
        'welcome_email_sent',
        'welcome_email_sent_at',
        'login_details_sent',
        'login_details_sent_at',
    ];

    protected $casts = [
        'original_price_per_person' => 'float',
        'final_price_per_person' => 'float',
        'can_access_challenges' => 'boolean',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'activated_at' => 'datetime',
        'account_created' => 'boolean',
        'temporary_password' => 'string',
        'account_created_at' => 'datetime',
        'welcome_email_sent' => 'boolean',
        'welcome_email_sent_at' => 'datetime',
        'login_details_sent' => 'boolean',
        'login_details_sent_at' => 'datetime',
    ];

    // Relationships
    public function bulkRegistration()
    {
        return $this->belongsTo(BulkRegistration::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activatedBy()
    {
        return $this->belongsTo(User::class, 'activated_by');
    }

    // Scopes
    public function scopePendingPayment($query)
    {
        return $query->where('status', 'pending_payment');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeExistingUsers($query)
    {
        return $query->whereNotNull('user_id');
    }

    public function scopeNewUsers($query)
    {
        return $query->whereNull('user_id');
    }

    // Accessors
    public function getFormattedFinalPriceAttribute()
    {
        return 'Rp ' . number_format($this->final_price_per_person, 0, ',', '.');
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending_payment' => '<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">Pending Payment</span>',
            'active' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Active</span>',
            default => '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">' . ucfirst($this->status) . '</span>'
        };
    }

    // Helper methods
    public function activate($activatedBy = null, $notes = null)
    {
        $this->update([
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addYear(),
            'activated_at' => now(),
            'activated_by' => $activatedBy,
            'activation_notes' => $notes,
        ]);

        // Create user subscription if user exists
        if ($this->user && $this->bulkRegistration) {
            UserSubscription::create([
                'user_id' => $this->user_id,
                'subscribable_type' => 'App\Models\Package',
                'subscribable_id' => json_decode($this->bulkRegistration->package_details, true)['package_id'] ?? 1,
                'package_name' => $this->package_name,
                'package_category' => $this->package_category,
                'original_price' => $this->original_price_per_person,
                'final_price' => $this->final_price_per_person,
                'starts_at' => now(),
                'expires_at' => now()->addYear(),
                'is_active' => true,
                'can_access_challenges' => $this->can_access_challenges,
                'payment_method' => 'bulk_registration',
                'payment_status' => 'completed',
                'admin_notes' => "Activated from bulk registration #{$this->bulk_registration_id}",
            ]);
        }
    }

    public function markAccountCreated()
    {
        $this->update([
            'account_created' => true,
            'account_created_at' => now(),
        ]);
    }

    public function markWelcomeEmailSent()
    {
        $this->update([
            'welcome_email_sent' => true,
            'welcome_email_sent_at' => now(),
        ]);
    }

    public function markLoginDetailsSent()
    {
        $this->update([
            'login_details_sent' => true,
            'login_details_sent_at' => now(),
        ]);
    }
}
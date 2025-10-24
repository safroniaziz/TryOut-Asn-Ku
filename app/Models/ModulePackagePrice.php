<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $module_package_id
 * @property float $base_price
 * @property float $current_price
 * @property string $display_price
 * @property bool $show_base_price
 * @property \Illuminate\Support\Carbon|null $effective_date
 * @property \Illuminate\Support\Carbon|null $expiry_date
 * @property bool $is_active
 * @property string|null $admin_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\ModulePackage $modulePackage
 */
class ModulePackagePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_package_id',
        'base_price',
        'current_price',
        'display_price',
        'show_base_price',
        'effective_date',
        'expiry_date',
        'is_active',
        'admin_notes',
    ];

    protected $casts = [
        'base_price' => 'float',
        'current_price' => 'float',
        'show_base_price' => 'boolean',
        'is_active' => 'boolean',
        'effective_date' => 'datetime',
        'expiry_date' => 'datetime',
    ];

    // Relationships
    public function modulePackage()
    {
        return $this->belongsTo(ModulePackage::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeEffective($query)
    {
        return $query->where('effective_date', '<=', now())
                    ->where(function ($subQuery) {
                        $subQuery->whereNull('expiry_date')
                               ->orWhere('expiry_date', '>=', now());
                    });
    }
}
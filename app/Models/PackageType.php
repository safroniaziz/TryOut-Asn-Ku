<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property bool $can_access_challenges
 * @property bool $can_use_referral
 * @property int $sort_order
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Package> $packages
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Module> $modules
 */
class PackageType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'can_access_challenges',
        'can_use_referral',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'can_access_challenges' => 'boolean',
        'can_use_referral' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
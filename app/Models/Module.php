<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $exam_type
 * @property string $module_type
 * @property int $package_type_id
 * @property bool $is_active
 * @property int $sort_order
 * @property string|null $icon
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\PackageType $packageType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ModulePackage> $modulePackages
 */
class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'exam_type',
        'module_type',
        'package_type_id',
        'is_active',
        'sort_order',
        'icon',
        'color',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    public function modulePackages()
    {
        return $this->hasMany(ModulePackage::class);
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

    public function scopeByExamType($query, $examType)
    {
        return $query->where('exam_type', $examType);
    }
}
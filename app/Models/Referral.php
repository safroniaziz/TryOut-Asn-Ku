<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referrer_id',
        'referred_id',
        'referral_code_used',
        'level',
        'status'
    ];

    // Relationships
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referred()
    {
        return $this->belongsTo(User::class, 'referred_id');
    }

    // Create referral chain
    public static function createReferralChain($newUserId, $parentId, $referralCode)
    {
        $referrals = [];
        $currentParentId = $parentId;
        $level = 1;

        // Create multi-level referral chain (up to 5 levels)
        while ($currentParentId && $level <= 5) {
            $referrals[] = self::create([
                'referrer_id' => $currentParentId,
                'referred_id' => $newUserId,
                'referral_code_used' => $referralCode,
                'level' => $level,
                'status' => 'active'
            ]);

            // Get parent of current parent for next level
            $parentUser = User::find($currentParentId);
            $currentParentId = $parentUser ? $parentUser->parent_id : null;
            $level++;
        }

        return $referrals;
    }
}

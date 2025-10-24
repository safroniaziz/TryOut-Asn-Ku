<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Fix referral table to work with new pricing system
     */
    public function up(): void
    {
        Schema::table('referrals', function (Blueprint $table) {
            // Add missing columns for dynamic pricing
            $table->json('package_details')->nullable()->after('referrer_reward_amount');
            $table->dateTime('package_purchased_at')->nullable()->after('package_details');
            $table->dateTime('reward_processed_at')->nullable()->after('package_purchased_at');

            // Note: referral_code_used already exists, so we don't need to modify referral_code
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn([
                'package_details',
                'package_purchased_at',
                'reward_processed_at'
            ]);
        });
    }
};
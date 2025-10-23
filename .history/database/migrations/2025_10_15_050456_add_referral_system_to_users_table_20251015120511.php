<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom untuk sistem referral
            $table->string('my_referral_code', 20)->unique()->nullable()->after('target_score');
            $table->unsignedBigInteger('parent_id')->nullable()->after('my_referral_code');
            $table->string('used_referral_code', 20)->nullable()->after('parent_id');
            
            // Foreign key constraint
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('set null');
            
            // Index untuk performa
            $table->index('my_referral_code');
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropIndex(['my_referral_code']);
            $table->dropIndex(['parent_id']);
            $table->dropColumn([
                'my_referral_code',
                'parent_id', 
                'used_referral_code'
            ]);
        });
    }
};

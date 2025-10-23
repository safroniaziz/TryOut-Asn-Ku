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
            $table->string('phone')->nullable()->after('email');
            $table->string('target_test')->nullable()->after('phone');
            $table->enum('experience_level', ['beginner', 'intermediate', 'experienced'])->nullable()->after('target_test');
            $table->string('target_institution')->nullable()->after('experience_level');
            $table->string('referral_code')->nullable()->after('target_institution');
            $table->enum('motivation', ['serve_nation', 'job_security', 'career_growth', 'family_dream', 'other'])->nullable()->after('referral_code');
            $table->boolean('newsletter')->default(false)->after('motivation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'target_test',
                'experience_level',
                'target_institution',
                'referral_code',
                'motivation',
                'newsletter'
            ]);
        });
    }
};

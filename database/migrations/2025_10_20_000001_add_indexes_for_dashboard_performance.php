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
        Schema::table('leaderboards', function (Blueprint $table) {
            // Add indexes for better dashboard performance
            $table->index(['user_id', 'total_skor']);
            $table->index(['tryout_id', 'total_skor']);
            $table->index('created_at');
            $table->index('total_skor');
        });

        Schema::table('tryouts', function (Blueprint $table) {
            // Add indexes for better dashboard performance
            $table->index(['type', 'kategori']);
            $table->index('created_at');
            $table->index('package_type');
            $table->index(['is_active', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaderboards', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'total_skor']);
            $table->dropIndex(['tryout_id', 'total_skor']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['total_skor']);
        });

        Schema::table('tryouts', function (Blueprint $table) {
            $table->dropIndex(['type', 'kategori']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['package_type']);
            $table->dropIndex(['is_active', 'type']);
        });
    }
};
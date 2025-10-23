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
        Schema::table('tryouts', function (Blueprint $table) {
            $table->enum('package_type', ['free', 'premium', 'free_limited'])->default('free')->after('is_active');
            $table->timestamp('free_until')->nullable()->after('package_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tryouts', function (Blueprint $table) {
            $table->dropColumn(['package_type', 'free_until']);
        });
    }
};

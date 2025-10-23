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
            // Add tryout_time column
            $table->enum('tryout_time', ['nasional', 'free'])->default('free')->after('package_type');

            // Add date columns for nasional tryouts
            $table->date('start_date')->nullable()->after('tryout_time');
            $table->date('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tryouts', function (Blueprint $table) {
            $table->dropColumn(['tryout_time', 'start_date', 'end_date']);
        });
    }
};

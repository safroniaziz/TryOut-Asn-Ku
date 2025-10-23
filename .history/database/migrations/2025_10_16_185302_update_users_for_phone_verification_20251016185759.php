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
        // Check if 'phone' column exists and rename it
        if (Schema::hasColumn('users', 'phone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->renameColumn('phone', 'phone_number');
            });
        }
        
        // Add phone verification timestamp
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone_verified_at')) {
                $table->timestamp('phone_verified_at')->nullable()->after('phone_number');
            }
            
            // Make phone_number unique if column exists
            if (Schema::hasColumn('users', 'phone_number')) {
                $table->string('phone_number')->nullable()->unique()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_verified_at');
            $table->dropUnique(['phone_number']);
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('phone_number', 'phone');
        });
    }
};

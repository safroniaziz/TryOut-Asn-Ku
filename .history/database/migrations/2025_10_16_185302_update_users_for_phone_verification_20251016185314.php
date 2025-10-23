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
            // Rename phone to phone_number untuk konsistensi
            $table->renameColumn('phone', 'phone_number');
            
            // Tambah timestamp untuk verifikasi phone
            $table->timestamp('phone_verified_at')->nullable()->after('phone_number');
            
            // Make phone_number unique dan required untuk registration
            $table->string('phone_number')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('phone_number', 'phone');
            $table->dropColumn('phone_verified_at');
            $table->dropUnique(['phone_number']);
        });
    }
};

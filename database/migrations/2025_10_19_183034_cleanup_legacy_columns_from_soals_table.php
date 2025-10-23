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
        Schema::table('soals', function (Blueprint $table) {
            // Drop legacy columns that are no longer needed
            // These have been migrated to soal_options table
            $table->dropColumn([
                'pilihan_a',
                'pilihan_b',
                'pilihan_c',
                'pilihan_d',
                'pilihan_e',
                'kunci_jawaban',
                'kategori' // Keep category_id as the normalized version
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soals', function (Blueprint $table) {
            // Restore legacy columns for rollback
            $table->text('pilihan_a')->nullable();
            $table->text('pilihan_b')->nullable();
            $table->text('pilihan_c')->nullable();
            $table->text('pilihan_d')->nullable();
            $table->text('pilihan_e')->nullable();
            $table->enum('kunci_jawaban', ['A', 'B', 'C', 'D', 'E'])->nullable();
            $table->string('kategori')->nullable(); // Legacy category column
        });

        // Note: This rollback doesn't restore the data,
        // just the column structure. Data restoration would
        // require migrating back from soal_options table.
    }
};

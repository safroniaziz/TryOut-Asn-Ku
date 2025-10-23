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
        // Create soal_options table
        Schema::create('soal_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id')->constrained()->onDelete('cascade');
            $table->enum('option_key', ['A', 'B', 'C', 'D', 'E', 'F'])->notNull();
            $table->text('option_text')->notNull();
            $table->boolean('is_correct')->default(false);
            $table->timestamps();

            // Unique constraint: each question can only have one option per key
            $table->unique(['soal_id', 'option_key']);
            // Index for performance
            $table->index(['soal_id', 'is_correct']);
        });

        // Migrate existing data from soals table to soal_options
        $this->migrateExistingOptions();
    }

    /**
     * Migrate existing options from soals table
     */
    private function migrateExistingOptions(): void
    {
        // Get all soals with their options
        $soals = \DB::table('soals')->get();

        foreach ($soals as $soal) {
            $options = [
                'A' => $soal->pilihan_a,
                'B' => $soal->pilihan_b,
                'C' => $soal->pilihan_c,
                'D' => $soal->pilihan_d,
                'E' => $soal->pilihan_e,
            ];

            foreach ($options as $key => $text) {
                if (!empty($text)) {
                    \DB::table('soal_options')->insert([
                        'soal_id' => $soal->id,
                        'option_key' => $key,
                        'option_text' => $text,
                        'is_correct' => ($key === $soal->kunci_jawaban),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_options');
    }
};

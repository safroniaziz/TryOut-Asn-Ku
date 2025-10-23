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
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('tryout_id')->constrained()->onDelete('cascade');
            $table->integer('total_skor');
            $table->integer('benar');
            $table->integer('salah');
            $table->integer('tidak_dijawab');
            $table->integer('rank')->nullable();
            $table->decimal('persentase', 5, 2); // persentase nilai
            $table->integer('waktu_pengerjaan_detik'); // waktu pengerjaan dalam detik
            $table->timestamps();

            $table->unique(['user_id', 'tryout_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderboards');
    }
};

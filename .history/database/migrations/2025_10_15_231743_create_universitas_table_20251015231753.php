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
        Schema::create('universitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_universitas');
            $table->string('singkatan')->nullable();
            $table->enum('jenis', ['negeri', 'swasta']);
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsi')->onDelete('set null');
            $table->foreignId('kota_id')->nullable()->constrained('kota')->onDelete('set null');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
            
            $table->index(['jenis', 'provinsi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universitas');
    }
};

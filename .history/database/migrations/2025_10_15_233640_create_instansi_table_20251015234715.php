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
        Schema::create('instansi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->string('singkatan')->nullable();
            $table->enum('jenis', [
                'lembaga_tinggi',
                'lembaga_pemilu',
                'lembaga_pengawasan',
                'lpnk',
                'pemprov',
                'pemkab',
                'pemkot',
                'kementerian'
            ]);
            $table->enum('kategori', [
                'pusat',
                'provinsi',
                'kabupaten',
                'kota',
                'kementerian'
            ])->default('pusat');
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsi')->onDelete('set null');
            $table->foreignId('kota_id')->nullable()->constrained('kota')->onDelete('set null');
            $table->text('deskripsi')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();

            $table->index(['jenis', 'kategori']);
            $table->index(['provinsi_id', 'jenis']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansi');
    }
};

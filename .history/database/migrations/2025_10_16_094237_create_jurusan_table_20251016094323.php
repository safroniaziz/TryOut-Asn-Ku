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
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jurusan');
            $table->enum('kategori', [
                'teknik', 
                'ekonomi_bisnis', 
                'sosial_politik', 
                'hukum', 
                'kesehatan', 
                'pendidikan', 
                'agama', 
                'sains_matematika',
                'pertanian',
                'seni_desain',
                'komunikasi',
                'psikologi',
                'lainnya'
            ])->default('lainnya');
            $table->text('deskripsi')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
            
            $table->index(['kategori', 'nama_jurusan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan');
    }
};

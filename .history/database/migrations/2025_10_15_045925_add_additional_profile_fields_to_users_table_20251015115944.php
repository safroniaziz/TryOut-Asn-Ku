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
            $table->string('whatsapp')->nullable()->after('phone');
            $table->string('city')->nullable()->after('whatsapp');
            $table->enum('education_level', ['SMA', 'D3', 'S1', 'S2', 'S3'])->nullable()->after('city');
            $table->enum('work_status', ['mahasiswa', 'pengangguran', 'swasta', 'pns', 'freelancer', 'wiraswasta'])->nullable()->after('education_level');
            $table->integer('target_score')->nullable()->after('work_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'whatsapp',
                'city', 
                'education_level',
                'work_status',
                'target_score'
            ]);
        });
    }
};

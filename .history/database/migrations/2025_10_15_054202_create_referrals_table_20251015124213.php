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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referrer_id'); // Yang punya kode referral
            $table->unsignedBigInteger('referred_id'); // Yang pakai kode referral
            $table->string('referral_code_used', 20); // Kode yang digunakan
            $table->integer('level')->default(1); // Level kedalaman
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            // Foreign keys
            $table->foreign('referrer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('referred_id')->references('id')->on('users')->onDelete('cascade');
            
            // Indexes
            $table->index(['referrer_id', 'level']);
            $table->index('referred_id');
            
            // Unique constraint
            $table->unique('referred_id'); // Setiap user hanya bisa direferral sekali
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};

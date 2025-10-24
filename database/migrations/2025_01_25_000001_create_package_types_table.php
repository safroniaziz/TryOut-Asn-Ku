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
        Schema::create('package_types', function (Blueprint $table) {
            $table->id();

            // Package basic info
            $table->string('name'); // 'CPNS', 'PPPK', 'Mixed'
            $table->string('slug')->unique(); // 'cpns', 'pppk', 'mixed'
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);

            // Package access control
            $table->boolean('can_access_challenges')->default(false); // Only full packages can access challenges
            $table->boolean('can_use_referral')->default(true); // All packages can use referral codes

            // Sort order for display
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes for performance
            $table->index('slug');
            $table->index('is_active');
        });

        // Insert initial package types
        DB::table('package_types')->insert([
            [
                'name' => 'CPNS',
                'slug' => 'cpns',
                'description' => 'Paket lengkap CPNS dengan semua modul (TIU, TWK, TKP)',
                'can_access_challenges' => true, // Full package dapat akses challenges
                'can_use_referral' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PPPK',
                'slug' => 'pppk',
                'description' => 'Paket lengkap PPPK dengan semua modul (Teknis, Wawancara, SosioKultural, Manajerial)',
                'can_access_challenges' => true, // Full package dapat akses challenges
                'can_use_referral' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CPNS + PPPK',
                'slug' => 'mixed',
                'description' => 'Paket gabungan CPNS dan PPPK dengan semua modul',
                'can_access_challenges' => true, // Full package dapat akses challenges
                'can_use_referral' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_types');
    }
};
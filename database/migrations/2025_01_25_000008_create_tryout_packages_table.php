<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table creates dynamic single tryout packages
     * Price: 39,000 per tryout package
     */
    public function up(): void
    {
        Schema::create('tryout_packages', function (Blueprint $table) {
            $table->id();

            // Tryout package identification
            $table->string('name'); // '1 Paket Tryout CPNS', '1 Paket Tryout PPPK'
            $table->string('slug')->unique(); // '1-tryout-cpns', '1-tryout-pppk'
            $table->text('description')->nullable();

            // Tryout package configuration
            $table->foreignId('package_type_id')->constrained()->onDelete('cascade'); // CPNS or PPPK
            $table->integer('tryout_count')->default(1); // Default 1 tryout per package
            $table->json('included_modules'); // Modules included: [1,2,3] for CPNS, [4,5,6,7] for PPPK

            // Package settings
            $table->integer('access_duration_days')->default(7); // Short access for single tryout
            $table->boolean('can_access_challenges')->default(false); // Cannot access challenges
            $table->boolean('can_use_referral')->default(true);
            $table->boolean('is_active')->default(true);

            // Display settings
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index(['package_type_id', 'is_active']);
        });

        // Create tryout packages for each exam type
        DB::table('tryout_packages')->insert([
            [
                'name' => '1 Paket Tryout CPNS',
                'slug' => '1-tryout-cpns',
                'description' => 'Akses 1 paket tryout CPNS spesifik dengan semua modul (TIU, TWK, TKP)',
                'package_type_id' => 1, // CPNS
                'tryout_count' => 1,
                'included_modules' => json_encode([1, 2, 3]), // TIU, TWK, TKP
                'access_duration_days' => 7,
                'can_access_challenges' => false,
                'can_use_referral' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '1 Paket Tryout PPPK',
                'slug' => '1-tryout-pppk',
                'description' => 'Akses 1 paket tryout PPPK spesifik dengan semua modul (Teknis, Wawancara, SosioKultural, Manajerial)',
                'package_type_id' => 2, // PPPK
                'tryout_count' => 1,
                'included_modules' => json_encode([4, 5, 6, 7]), // Teknis, Wawancara, SosioKultural, Manajerial
                'access_duration_days' => 7,
                'can_access_challenges' => false,
                'can_use_referral' => true,
                'sort_order' => 2,
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
        Schema::dropIfExists('tryout_packages');
    }
};
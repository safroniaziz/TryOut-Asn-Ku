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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            // Package identification
            $table->string('name'); // 'CPNS Full Package', 'TIU Only', '1 Paket Tryout CPNS'
            $table->string('slug')->unique(); // 'cpns-full', 'tiu-only', '1-tryout-cpns'
            $table->text('description')->nullable();

            // Package type categorization
            $table->enum('package_category', ['full_package', 'single_module', 'single_tryout']);
            $table->foreignId('package_type_id')->constrained()->onDelete('cascade'); // CPNS, PPPK, Mixed

            // Package configuration
            $table->json('included_modules')->nullable(); // For full_package: [1,2,3], for single_module: [1]
            $table->integer('included_tryout_count')->default(0); // 0 for unlimited/full packages, 1 for single tryout
            $table->integer('access_duration_days')->default(30); // Durasi akses dalam hari

            // Package permissions
            $table->boolean('can_access_challenges')->default(false); // Only full packages can access challenges
            $table->boolean('can_use_referral')->default(true);
            $table->boolean('is_active')->default(true);

            // Display settings
            $table->string('badge_text')->nullable(); // 'Best Value', 'Popular', 'New'
            $table->string('badge_color')->nullable(); // 'green', 'red', 'blue'
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes for performance
            $table->index('slug');
            $table->index('package_category');
            $table->index('is_active');
        });

        // Insert initial packages
        DB::table('packages')->insert([
            // Full Packages (199k & 349k)
            [
                'name' => 'Paket CPNS Lengkap',
                'slug' => 'cpns-full',
                'description' => 'Akses lengkap semua modul CPNS (TIU, TWK, TKP) dengan unlimited tryout',
                'package_category' => 'full_package',
                'package_type_id' => 1, // CPNS
                'included_modules' => json_encode([1, 2, 3]), // TIU, TWK, TKP
                'included_tryout_count' => 0, // Unlimited
                'access_duration_days' => 30,
                'can_access_challenges' => true,
                'can_use_referral' => true,
                'badge_text' => 'Popular',
                'badge_color' => 'red',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket PPPK Lengkap',
                'slug' => 'pppk-full',
                'description' => 'Akses lengkap semua modul PPPK (Teknis, Wawancara, SosioKultural, Manajerial) dengan unlimited tryout',
                'package_category' => 'full_package',
                'package_type_id' => 2, // PPPK
                'included_modules' => json_encode([4, 5, 6, 7]), // Teknis, Wawancara, SosioKultural, Manajerial
                'included_tryout_count' => 0, // Unlimited
                'access_duration_days' => 30,
                'can_access_challenges' => true,
                'can_use_referral' => true,
                'badge_text' => 'Best Value',
                'badge_color' => 'green',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket CPNS + PPPK',
                'slug' => 'cpns-pppk-full',
                'description' => 'Akses lengkap semua modul CPNS dan PPPK dengan unlimited tryout',
                'package_category' => 'full_package',
                'package_type_id' => 3, // Mixed
                'included_modules' => json_encode([1, 2, 3, 4, 5, 6, 7]), // All modules
                'included_tryout_count' => 0, // Unlimited
                'access_duration_days' => 30,
                'can_access_challenges' => true,
                'can_use_referral' => true,
                'badge_text' => 'Premium',
                'badge_color' => 'purple',
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
        Schema::dropIfExists('packages');
    }
};
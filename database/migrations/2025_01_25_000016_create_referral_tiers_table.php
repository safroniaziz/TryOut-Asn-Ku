<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Create referral tiers table for bulk registration pricing
     * Formula: 7% + (n × 1%) with max 15%
     */
    public function up(): void
    {
        // Check if table exists first
        if (!Schema::hasTable('referral_tiers')) {
            Schema::create('referral_tiers', function (Blueprint $table) {
                $table->id();

                // Tier definition
                $table->integer('min_people');
                $table->integer('max_people')->nullable();
                $table->decimal('discount_percentage', 5, 2);

                // Tier details
                $table->string('description');
                $table->text('terms')->nullable();
                $table->boolean('is_active')->default(true);

                // Display settings
                $table->string('badge_text')->nullable();
                $table->string('badge_color')->nullable();

                // Sorting
                $table->integer('sort_order')->default(0);

                $table->timestamps();

                // Indexes
                $table->index(['min_people', 'max_people']);
                $table->index('is_active');
                $table->index('sort_order');
            });

            // Insert bulk registration tiers
            DB::table('referral_tiers')->insert([
                [
                    'min_people' => 3,
                    'max_people' => 3,
                    'discount_percentage' => 10.00,
                    'description' => '3 orang: 10% diskon total',
                    'terms' => 'Minimum 3 orang untuk mendapatkan diskon',
                    'badge_text' => 'Popular',
                    'badge_color' => 'red',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'min_people' => 4,
                    'max_people' => 4,
                    'discount_percentage' => 11.00,
                    'description' => '4 orang: 11% diskon total',
                    'terms' => 'Tiap tambah 1 orang dapat tambahan 1% diskon',
                    'sort_order' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'min_people' => 5,
                    'max_people' => 5,
                    'discount_percentage' => 12.00,
                    'description' => '5 orang: 12% diskon total',
                    'terms' => 'Tiap tambah 1 orang dapat tambahan 1% diskon',
                    'sort_order' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'min_people' => 6,
                    'max_people' => 6,
                    'discount_percentage' => 13.00,
                    'description' => '6 orang: 13% diskon total',
                    'terms' => 'Tiap tambah 1 orang dapat tambahan 1% diskon',
                    'sort_order' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'min_people' => 7,
                    'max_people' => 7,
                    'discount_percentage' => 14.00,
                    'description' => '7 orang: 14% diskon total',
                    'terms' => 'Tiap tambah 1 orang dapat tambahan 1% diskon',
                    'sort_order' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'min_people' => 8,
                    'max_people' => null, // Unlimited max
                    'discount_percentage' => 15.00,
                    'description' => '8+ orang: 15% diskon (maksimal)',
                    'terms' => 'Maksimal diskon 15%, tidak ada tambahan diskon untuk 9+ orang',
                    'badge_text' => 'Best Value',
                    'badge_color' => 'green',
                    'sort_order' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_tiers');
    }
};
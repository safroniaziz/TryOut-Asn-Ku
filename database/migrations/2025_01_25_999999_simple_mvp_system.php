<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Simple MVP System - Only essential tables for launch
     * Focus on speed to market and user validation
     */
    public function up(): void
    {
        // 1. Simple Packages Table
        Schema::create('mvp_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 'CPNS Full Package', 'PPPK Full Package', 'TIU Only', '1 Tryout CPNS'
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2); // Simple price field
            $table->boolean('can_access_challenges')->default(false); // Only full packages = true
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 2. Simple User Subscriptions
        Schema::create('mvp_user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained('mvp_packages')->onDelete('cascade');
            $table->decimal('amount_paid', 10, 2);
            $table->dateTime('starts_at');
            $table->dateTime('expires_at');
            $table->boolean('is_active')->default(true);
            $table->string('payment_status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 3. Simple Referrals
        Schema::create('mvp_referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referrer_id')->constrained()->onDelete('cascade'); // User yang ngajak
            $table->foreignId('referred_id')->nullable()->constrained()->onDelete('cascade'); // User yang diajak
            $table->string('referral_code')->unique();
            $table->decimal('referrer_reward', 10, 2)->nullable(); // 10% dari pembayaran
            $table->decimal('referred_discount', 10, 2)->nullable(); // 5% discount
            $table->enum('status', ['pending', 'confirmed', 'rewarded'])->default('pending');
            $table->timestamps();
        });

        // 4. Simple Achievements (existing untuk challenges)
        Schema::create('mvp_user_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('package_number'); // 1-10
            $table->string('badge_name');
            $table->enum('status', ['locked', 'available', 'completed'])->default('locked');
            $table->integer('score')->nullable();
            $table->decimal('cashback_reward', 10, 2)->default(0);
            $table->enum('cashback_status', ['pending', 'paid'])->default('pending');
            $table->timestamps();
        });

        // Insert initial packages
        DB::table('mvp_packages')->insert([
            [
                'name' => 'Paket CPNS Lengkap',
                'slug' => 'cpns-full',
                'price' => 199000,
                'can_access_challenges' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket PPPK Lengkap',
                'slug' => 'pppk-full',
                'price' => 199000,
                'can_access_challenges' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket CPNS + PPPK',
                'slug' => 'cpns-pppk-full',
                'price' => 349000,
                'can_access_challenges' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Modul TIU',
                'slug' => 'tiu-module',
                'price' => 79000,
                'can_access_challenges' => false,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Modul TWK',
                'slug' => 'twk-module',
                'price' => 79000,
                'can_access_challenges' => false,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Modul TKP',
                'slug' => 'tkp-module',
                'price' => 79000,
                'can_access_challenges' => false,
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '1 Paket Tryout CPNS',
                'slug' => 'tryout-cpns',
                'price' => 39000,
                'can_access_challenges' => false,
                'sort_order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '1 Paket Tryout PPPK',
                'slug' => 'tryout-pppk',
                'price' => 39000,
                'can_access_challenges' => false,
                'sort_order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert initial achievements (10 packages)
        for ($i = 1; $i <= 10; $i++) {
            $badgeNames = [
                'Pemula', 'Pekerja Keras', 'Pencapaian Cashback', 'Pembelajar Cerdas',
                'Semi Finalis', 'Master Cashback', 'Elite Performer', 'Challenger Pro',
                'Grand Finalist', 'Master Achievement'
            ];

            $cashbackAmount = in_array($i, [3, 6, 10]) ? 5000 : 0;

            DB::table('mvp_user_achievements')->insert([
                'user_id' => 1, // Will be updated per user
                'package_number' => $i,
                'badge_name' => $badgeNames[$i - 1],
                'status' => $i == 1 ? 'available' : 'locked', // Only package 1 available
                'cashback_reward' => $cashbackAmount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvp_user_achievements');
        Schema::dropIfExists('mvp_referrals');
        Schema::dropIfExists('mvp_user_subscriptions');
        Schema::dropIfExists('mvp_packages');
    }
};
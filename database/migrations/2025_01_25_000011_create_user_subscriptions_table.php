<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table tracks user subscriptions for any package type
     * (full packages, module packages, tryout packages)
     */
    public function up(): void
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();

            // User and package relationship
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Subscription details - polymorphic to support multiple package types
            $table->morphs('subscribable'); // subscribable_type & subscribable_id

            // Package identification at time of purchase
            $table->string('package_name'); // Store name at purchase time for historical purposes
            $table->string('package_category'); // full_package, single_module, single_tryout

            // Pricing details
            $table->decimal('original_price', 10, 2); // Harga asli
            $table->decimal('discount_amount', 10, 2)->default(0); // Diskon dari promo/bulk
            $table->decimal('referral_discount_amount', 10, 2)->default(0); // Diskon dari referral (5%)
            $table->decimal('final_price', 10, 2); // Harga yang dibayar user

            // Subscription access
            $table->dateTime('starts_at'); // Waktu mulai akses
            $table->dateTime('expires_at'); // Waktu expired akses
            $table->boolean('is_active')->default(true);

            // Subscription features
            $table->boolean('can_access_challenges')->default(false);
            $table->json('accessible_modules')->nullable(); // Array of module IDs user can access
            $table->integer('remaining_tryouts')->nullable(); // Null = unlimited

            // Payment details
            $table->string('payment_method')->nullable(); // 'transfer', 'ewallet', etc.
            $table->string('payment_reference')->nullable(); // Transaction reference
            $table->string('payment_status')->default('pending'); // pending, completed, failed, cancelled

            // Referral tracking
            $table->string('referral_code_used')->nullable(); // Jika pakai referral code
            $table->foreignId('referral_id')->nullable()->constrained('referrals')->onDelete('set null');

            // Admin notes
            $table->text('admin_notes')->nullable();
            $table->foreignId('processed_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();

            // Indexes for performance
            $table->index(['user_id', 'is_active']);
            $table->index(['subscribable_type', 'subscribable_id']);
            $table->index(['expires_at', 'is_active']);
            $table->index('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};
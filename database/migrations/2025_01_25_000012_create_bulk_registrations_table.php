<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table handles bulk registrations with progressive discounts:
     * 3 orang = 10%, 4 orang = 11%, 5 orang = 12%, 6+ orang = 15% (max)
     * Formula: 7% + (n × 1%) with max 15%
     */
    public function up(): void
    {
        Schema::create('bulk_registrations', function (Blueprint $table) {
            $table->id();

            // Registrant information
            $table->foreignId('registrant_id')->constrained('users')->onDelete('cascade'); // User yang mendaftarkan (pembayar)
            $table->string('registrant_name'); // Name at time of registration
            $table->string('registrant_email'); // Email at time of registration

            // Bulk registration details
            $table->integer('total_people'); // Total orang yang didaftarkan (3, 4, 5, 6, etc.)
            $table->integer('applied_tier_id')->nullable(); // Which tier was applied (from referral_tiers table)

            // Package information being purchased
            $table->enum('package_category', ['full_package']); // Currently only full packages support bulk
            $table->json('package_details'); // Package IDs, names, and counts for each person

            // Pricing calculations
            $table->decimal('price_per_person', 10, 2); // Standard price per person (199,000 or 349,000)
            $table->decimal('base_total', 10, 2); // price_per_person × total_people
            $table->decimal('discount_percentage', 5, 2); // Applied discount: 10%, 11%, 12%, 13%, 14%, or 15%
            $table->decimal('discount_amount', 10, 2); // base_total × discount_percentage
            $table->decimal('final_total', 10, 2); // base_total - discount_amount
            $table->decimal('final_price_per_person', 10, 2); // final_total ÷ total_people

            // Bulk registration metadata
            $table->json('registered_people_data'); // Array of people data: [{name, email, package_type}, ...]
            $table->text('special_notes')->nullable(); // Notes about this bulk registration

            // Registration status and timing
            $table->enum('status', ['pending', 'approved', 'paid', 'cancelled'])->default('pending');
            $table->dateTime('requested_at');
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            // Admin processing
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->text('admin_notes')->nullable();

            // Payment information
            $table->string('payment_method')->nullable(); // 'bank_transfer', 'ewallet', etc.
            $table->string('payment_reference')->nullable(); // Transaction ID
            $table->decimal('amount_paid', 10, 2)->nullable(); // Actual amount paid
            $table->string('payment_proof_path')->nullable(); // Path to payment proof file

            // Referral tracking (if bulk registration came from referral)
            $table->string('referral_code_used')->nullable(); // If bulk registration used referral code
            $table->foreignId('referral_id')->nullable()->constrained('referrals')->onDelete('set null');

            $table->timestamps();

            // Indexes for performance
            $table->index(['registrant_id', 'status']);
            $table->index('status');
            $table->index('requested_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulk_registrations');
    }
};
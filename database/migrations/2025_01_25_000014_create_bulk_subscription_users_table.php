<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table links bulk registration to individual user subscriptions
     * When a bulk registration is paid, create individual subscriptions for each person
     */
    public function up(): void
    {
        Schema::create('bulk_subscription_users', function (Blueprint $table) {
            $table->id();

            // Link to bulk registration
            $table->foreignId('bulk_registration_id')->constrained()->onDelete('cascade');

            // User who gets the subscription
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Can be null if user not created yet
            $table->string('user_name'); // Name of the registered person
            $table->string('user_email'); // Email of the registered person
            $table->string('user_phone')->nullable(); // Phone number for contact

            // Subscription details
            $table->string('package_name'); // "Paket CPNS Lengkap", "Paket PPPK Lengkap"
            $table->enum('package_category', ['full_package']); // Only full packages support bulk
            $table->foreignId('package_id')->nullable()->constrained()->onDelete('set null'); // Package they get

            // Pricing for this individual
            $table->decimal('original_price_per_person', 10, 2); // Base price (199,000 or 349,000)
            $table->decimal('final_price_per_person', 10, 2); // After bulk discount

            // Subscription status
            $table->enum('status', ['pending_payment', 'pending_activation', 'active', 'cancelled'])->default('pending_payment');
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->boolean('can_access_challenges')->default(true); // Bulk registration always gets challenge access

            // Activation details
            $table->dateTime('activated_at')->nullable();
            $table->foreignId('activated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->text('activation_notes')->nullable();

            // User account creation
            $table->boolean('account_created')->default(false);
            $table->string('temporary_password')->nullable(); // Generated password if account auto-created
            $table->dateTime('account_created_at')->nullable();

            // Communication tracking
            $table->boolean('welcome_email_sent')->default(false);
            $table->dateTime('welcome_email_sent_at')->nullable();
            $table->boolean('login_details_sent')->default(false);
            $table->dateTime('login_details_sent_at')->nullable();

            $table->timestamps();

            // Indexes for performance
            $table->index(['bulk_registration_id', 'status']);
            $table->index('user_email');
            $table->index('status');
            $table->index('account_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulk_subscription_users');
    }
};
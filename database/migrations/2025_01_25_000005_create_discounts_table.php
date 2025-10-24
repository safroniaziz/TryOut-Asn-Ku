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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();

            // Discount identification
            $table->string('name'); // 'Ramadhan Sale', 'Flash Sale', 'Early Bird'
            $table->string('code')->unique()->nullable(); // 'RAMADHAN2025', 'FLASH50'
            $table->text('description')->nullable();

            // Discount type and value
            $table->enum('discount_type', ['percentage', 'fixed_amount']); // Percentage atau fixed amount
            $table->decimal('discount_value', 10, 2); // Nilai diskon: 15.00 (percentage) atau 25000.00 (fixed)
            $table->decimal('minimum_amount', 10, 2)->nullable(); // Minimum pembelian untuk dapat diskon
            $table->decimal('maximum_discount', 10, 2)->nullable(); // Maksimal diskon untuk percentage type

            // Discount applicability
            $table->json('applicable_packages')->nullable(); // Package IDs yang bisa pakai diskon, null = all packages
            $table->json('applicable_categories')->nullable(); // Package categories yang bisa pakai diskon, null = all

            // Discount timing
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_active')->default(true);

            // Discount limits
            $table->integer('usage_limit')->nullable(); // Batas penggunaan total
            $table->integer('usage_limit_per_user')->nullable(); // Batas penggunaan per user
            $table->integer('current_usage')->default(0); // Current usage counter

            // Display settings
            $table->string('badge_text')->nullable(); // 'Limited Time', 'Special Offer'
            $table->string('badge_color')->nullable(); // 'red', 'green', 'orange'
            $table->text('terms_conditions')->nullable(); // Syarat & ketentuan

            // Admin settings
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->text('admin_notes')->nullable();

            $table->timestamps();

            // Indexes for performance
            $table->index(['code', 'is_active']);
            $table->index(['start_date', 'end_date']);
            $table->index(['is_active', 'usage_limit', 'current_usage']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
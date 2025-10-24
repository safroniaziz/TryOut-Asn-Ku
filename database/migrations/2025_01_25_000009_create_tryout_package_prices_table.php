<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table stores pricing for single tryout packages
     * Initial price: 39,000 per tryout package
     */
    public function up(): void
    {
        Schema::create('tryout_package_prices', function (Blueprint $table) {
            $table->id();

            // Price relationship to tryout package
            $table->foreignId('tryout_package_id')->constrained()->onDelete('cascade');

            // Core pricing for tryout packages
            $table->decimal('base_price', 10, 2); // Harga dasar (39,000)
            $table->decimal('current_price', 10, 2); // Harga aktual setelah diskon

            // Price display
            $table->string('display_price'); // "Rp 39.000"
            $table->boolean('show_base_price')->default(false); // Tampilkan harga coret jika ada diskon

            // Price validity
            $table->date('effective_date')->default(now());
            $table->date('expiry_date')->nullable();
            $table->boolean('is_active')->default(true);

            // Admin notes
            $table->text('admin_notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['tryout_package_id', 'is_active']);
            $table->index('effective_date');
        });

        // Insert initial prices for tryout packages (39k each)
        DB::table('tryout_package_prices')->insert([
            [
                'tryout_package_id' => 1, // 1 Paket Tryout CPNS
                'base_price' => 39000,
                'current_price' => 39000,
                'display_price' => 'Rp 39.000',
                'show_base_price' => false,
                'effective_date' => now(),
                'admin_notes' => 'Harga standar 1 paket tryout CPNS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tryout_package_id' => 2, // 1 Paket Tryout PPPK
                'base_price' => 39000,
                'current_price' => 39000,
                'display_price' => 'Rp 39.000',
                'show_base_price' => false,
                'effective_date' => now(),
                'admin_notes' => 'Harga standar 1 paket tryout PPPK',
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
        Schema::dropIfExists('tryout_package_prices');
    }
};
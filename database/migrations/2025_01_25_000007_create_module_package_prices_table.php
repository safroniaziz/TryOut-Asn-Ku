<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table stores pricing for single module packages
     * Initial price: 79,000 per module
     */
    public function up(): void
    {
        Schema::create('module_package_prices', function (Blueprint $table) {
            $table->id();

            // Price relationship to module package
            $table->foreignId('module_package_id')->constrained()->onDelete('cascade');

            // Core pricing for module packages
            $table->decimal('base_price', 10, 2); // Harga dasar (79,000)
            $table->decimal('current_price', 10, 2); // Harga aktual setelah diskon

            // Price display
            $table->string('display_price'); // "Rp 79.000"
            $table->boolean('show_base_price')->default(false); // Tampilkan harga coret jika ada diskon

            // Price validity
            $table->date('effective_date')->default(now());
            $table->date('expiry_date')->nullable();
            $table->boolean('is_active')->default(true);

            // Admin notes
            $table->text('admin_notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['module_package_id', 'is_active']);
            $table->index('effective_date');
        });

        // Insert initial prices for all module packages (79k each)
        $modulePackages = DB::table('module_packages')->get();

        foreach ($modulePackages as $package) {
            DB::table('module_package_prices')->insert([
                'module_package_id' => $package->id,
                'base_price' => 79000,
                'current_price' => 79000,
                'display_price' => 'Rp 79.000',
                'show_base_price' => false,
                'effective_date' => now(),
                'admin_notes' => 'Harga standar paket modul tunggal',
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
        Schema::dropIfExists('module_package_prices');
    }
};
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
        Schema::create('package_prices', function (Blueprint $table) {
            $table->id();

            // Price relationship
            $table->foreignId('package_id')->constrained()->onDelete('cascade');

            // Core pricing
            $table->decimal('base_price', 10, 2); // Harga dasar (contoh: 199000, 79000, 39000)
            $table->decimal('current_price', 10, 2); // Harga aktual setelah diskon (sama dengan base jika tidak ada diskon)

            // Price display settings
            $table->string('display_price'); // Format display: "Rp 199.000"
            $table->boolean('show_base_price')->default(false); // Tampilkan harga coret untuk diskon

            // Price metadata
            $table->date('effective_date')->default(now()); // Tanggal berlaku harga ini
            $table->date('expiry_date')->nullable(); // Tanggal kadaluarsa harga (null = permanent)
            $table->boolean('is_active')->default(true);

            // Price notes for admin
            $table->text('admin_notes')->nullable(); // Catatan admin tentang perubahan harga

            $table->timestamps();

            // Indexes for performance
            $table->index(['package_id', 'is_active']);
            $table->index('effective_date');
        });

        // Insert initial prices for full packages
        DB::table('package_prices')->insert([
            [
                'package_id' => 1, // CPNS Full Package
                'base_price' => 199000,
                'current_price' => 199000,
                'display_price' => 'Rp 199.000',
                'show_base_price' => false,
                'effective_date' => now(),
                'admin_notes' => 'Harga standar paket CPNS lengkap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_id' => 2, // PPPK Full Package
                'base_price' => 199000,
                'current_price' => 199000,
                'display_price' => 'Rp 199.000',
                'show_base_price' => false,
                'effective_date' => now(),
                'admin_notes' => 'Harga standar paket PPPK lengkap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_id' => 3, // CPNS + PPPK Full Package
                'base_price' => 349000,
                'current_price' => 349000,
                'display_price' => 'Rp 349.000',
                'show_base_price' => false,
                'effective_date' => now(),
                'admin_notes' => 'Harga standar paket gabungan CPNS + PPPK',
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
        Schema::dropIfExists('package_prices');
    }
};
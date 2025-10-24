<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table allows creating single module packages dynamically
     * rather than hardcoding them in packages table.
     * Admin can create packages like "TIU Only", "Teknis Only", etc.
     */
    public function up(): void
    {
        Schema::create('module_packages', function (Blueprint $table) {
            $table->id();

            // Module package identification
            $table->string('name'); // 'TIU Only', 'Teknis Only', 'Wawancara Only'
            $table->string('slug')->unique(); // 'tiu-only', 'teknis-only'
            $table->text('description')->nullable();

            // Module relationship (one module per package)
            $table->foreignId('module_id')->constrained()->onDelete('cascade');

            // Package settings
            $table->integer('access_duration_days')->default(15); // Single modules have shorter access
            $table->integer('included_tryout_count')->default(5); // Limited tryout for single modules
            $table->boolean('can_access_challenges')->default(false); // Single modules cannot access challenges
            $table->boolean('can_use_referral')->default(true);
            $table->boolean('is_active')->default(true);

            // Display settings
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index(['module_id', 'is_active']);
        });

        // Insert initial single module packages with 79k price
        $modules = DB::table('modules')->get();

        foreach ($modules as $module) {
            DB::table('module_packages')->insert([
                'name' => $module->name . ' Only',
                'slug' => $module->slug . '-only',
                'description' => 'Pakai modul ' . $module->name . ' saja dengan akses terbatas',
                'module_id' => $module->id,
                'access_duration_days' => 15,
                'included_tryout_count' => 5,
                'can_access_challenges' => false,
                'can_use_referral' => true,
                'sort_order' => $module->sort_order,
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
        Schema::dropIfExists('module_packages');
    }
};
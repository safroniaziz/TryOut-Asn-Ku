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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();

            // Module basic info
            $table->string('name'); // 'TIU', 'TWK', 'TKP', 'Teknis', 'Wawancara', dll
            $table->string('slug')->unique(); // 'tiu', 'twk', 'tkp', dll
            $table->text('description')->nullable();

            // Module type categorization
            $table->enum('exam_type', ['cpns', 'pppk']); // CPNS atau PPPK
            $table->enum('module_type', ['learning', 'assessment']); // Learning material atau assessment

            // Package relationship
            $table->foreignId('package_type_id')->constrained()->onDelete('cascade');

            // Module control
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);

            // Display settings
            $table->string('icon')->nullable(); // Font Awesome icon class
            $table->string('color')->nullable(); // Theme color

            $table->timestamps();

            // Indexes
            $table->index('slug');
            $table->index('exam_type');
            $table->index('is_active');
        });

        // Insert initial modules for CPNS
        DB::table('modules')->insert([
            [
                'name' => 'Tes Intelegensia Umum',
                'slug' => 'tiu',
                'description' => 'Modul TIU untuk mengukur kemampuan verbal, numerik, dan figural',
                'exam_type' => 'cpns',
                'module_type' => 'assessment',
                'package_type_id' => 1, // CPNS package
                'icon' => 'fas fa-brain',
                'color' => 'blue',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tes Wawasan Kebangsaan',
                'slug' => 'twk',
                'description' => 'Modul TWK untuk mengukur pemahaman tentang bangsa dan negara',
                'exam_type' => 'cpns',
                'module_type' => 'assessment',
                'package_type_id' => 1,
                'icon' => 'fas fa-flag',
                'color' => 'red',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tes Karakteristik Pribadi',
                'slug' => 'tkp',
                'description' => 'Modul TKP untuk mengukur karakteristik pribadi',
                'exam_type' => 'cpns',
                'module_type' => 'assessment',
                'package_type_id' => 1,
                'icon' => 'fas fa-user-check',
                'color' => 'green',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert initial modules for PPPK
        DB::table('modules')->insert([
            [
                'name' => 'Tes Teknis',
                'slug' => 'teknis',
                'description' => 'Modul teknis sesuai bidang keahlian PPPK',
                'exam_type' => 'pppk',
                'module_type' => 'assessment',
                'package_type_id' => 2, // PPPK package
                'icon' => 'fas fa-cogs',
                'color' => 'purple',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tes Wawancara',
                'slug' => 'wawancara',
                'description' => 'Modul wawancara PPPK',
                'exam_type' => 'pppk',
                'module_type' => 'assessment',
                'package_type_id' => 2,
                'icon' => 'fas fa-comments',
                'color' => 'orange',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tes Sosio Kultural',
                'slug' => 'sosiokultural',
                'description' => 'Modul sosio kultural PPPK',
                'exam_type' => 'pppk',
                'module_type' => 'assessment',
                'package_type_id' => 2,
                'icon' => 'fas fa-users',
                'color' => 'pink',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tes Manajerial',
                'slug' => 'manajerial',
                'description' => 'Modul manajerial PPPK',
                'exam_type' => 'pppk',
                'module_type' => 'assessment',
                'package_type_id' => 2,
                'icon' => 'fas fa-briefcase',
                'color' => 'indigo',
                'sort_order' => 4,
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
        Schema::dropIfExists('modules');
    }
};
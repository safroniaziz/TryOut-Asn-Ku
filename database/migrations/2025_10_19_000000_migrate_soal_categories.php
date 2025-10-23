<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, let's see what categories we have available
        $categories = Category::all()->pluck('name', 'id')->toArray();

        // Update existing soals to map string kategori to proper category_id
        \DB::table('soals')->whereNotNull('kategori')->get()->each(function ($soal) use ($categories) {
            $kategori = $soal->kategori;

            // Map common category names to proper category IDs
            $categoryMap = [
                'TWK' => $this->getCategoryIdByName($categories, 'TWK'),
                'TIU' => $this->getCategoryIdByName($categories, 'TIU'),
                'TKP' => $this->getCategoryIdByName($categories, 'TKP'),
                'Manajerial' => $this->getCategoryIdByName($categories, 'Manajerial'),
                'Sosio Kultural' => $this->getCategoryIdByName($categories, 'Sosio Kultural'),
                'Wawancara' => $this->getCategoryIdByName($categories, 'Wawancara'),
                'Pranata Komputer' => $this->getCategoryIdByName($categories, 'Pranata Komputer'),
            ];

            $categoryId = $categoryMap[$kategori] ?? null;

            if ($categoryId) {
                \DB::table('soals')
                    ->where('id', $soal->id)
                    ->update(['category_id' => $categoryId]);
            }
        });
    }

    /**
     * Helper to get category ID by name
     */
    private function getCategoryIdByName($categories, $name)
    {
        $flipped = array_flip($categories);
        return $flipped[$name] ?? null;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse data migration
        // The category_id column will be dropped by the previous migration's down method
    }
};
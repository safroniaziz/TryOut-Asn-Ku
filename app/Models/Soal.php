<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tryout_id',
        'category_id',
        'pertanyaan',
        'pembahasan',
        'nomor_soal'
    ];

    // Relationships
    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function jawabanUsers()
    {
        return $this->hasMany(JawabanUser::class);
    }

    public function soalOptions()
    {
        return $this->hasMany(SoalOption::class);
    }

    public function getPilihanArray()
    {
        // Use new structure only
        $options = [];
        foreach ($this->soalOptions as $option) {
            $options[$option->option_key] = $option->option_text;
        }
        return $options;
    }

    public function getCorrectAnswer()
    {
        // Use new structure only
        $correctOption = $this->soalOptions()->correct()->first();
        return $correctOption ? $correctOption->option_key : null;
    }

    public function isCorrectAnswer($jawaban)
    {
        return $this->getCorrectAnswer() === $jawaban;
    }

    public function getOptionText($optionKey)
    {
        // Use new structure only
        $option = $this->soalOptions()->where('option_key', $optionKey)->first();
        return $option ? $option->option_text : null;
    }

    public function getAvailableOptions()
    {
        // Return all available options from new structure
        return $this->soalOptions()->orderBy('option_key')->get();
    }
}

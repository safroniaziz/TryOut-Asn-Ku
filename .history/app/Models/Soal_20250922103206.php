<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tryout_id',
        'pertanyaan',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'pilihan_e',
        'kunci_jawaban',
        'pembahasan',
        'kategori',
        'nomor_soal'
    ];

    // Relationships
    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function jawabanUsers()
    {
        return $this->hasMany(JawabanUser::class);
    }

    // Helpers
    public function getPilihanArray()
    {
        return [
            'A' => $this->pilihan_a,
            'B' => $this->pilihan_b,
            'C' => $this->pilihan_c,
            'D' => $this->pilihan_d,
            'E' => $this->pilihan_e,
        ];
    }

    public function isCorrectAnswer($jawaban)
    {
        return $this->kunci_jawaban === $jawaban;
    }
}

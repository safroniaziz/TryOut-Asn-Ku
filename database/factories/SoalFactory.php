<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soal>
 */
class SoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pertanyaan' => $this->faker->sentence(),
            'pilihan_a' => $this->faker->sentence(),
            'pilihan_b' => $this->faker->sentence(),
            'pilihan_c' => $this->faker->sentence(),
            'pilihan_d' => $this->faker->sentence(),
            'pilihan_e' => $this->faker->sentence(),
            'kunci_jawaban' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            'pembahasan' => $this->faker->paragraph(),
            'kategori' => $this->faker->randomElement(['TWK', 'TIU', 'TKP']),
            'nomor_soal' => $this->faker->numberBetween(1, 150),
        ];
    }

    /**
     * Create TWK (Tes Wawasan Kebangsaan) questions
     */
    public function twk()
    {
        return $this->state(fn (array $attributes) => [
            'kategori' => 'TWK',
            'pertanyaan' => $this->getTWKQuestion(),
            'pilihan_a' => $this->getTWKOption('A'),
            'pilihan_b' => $this->getTWKOption('B'),
            'pilihan_c' => $this->getTWKOption('C'),
            'pilihan_d' => $this->getTWKOption('D'),
            'pilihan_e' => $this->getTWKOption('E'),
            'kunci_jawaban' => 'A',
            'pembahasan' => $this->getTWKExplanation(),
        ]);
    }

    /**
     * Create TIU (Tes Intelegensi Umum) questions
     */
    public function tiu()
    {
        return $this->state(fn (array $attributes) => [
            'kategori' => 'TIU',
            'pertanyaan' => $this->getTIUQuestion(),
            'pilihan_a' => $this->getTIUOption('A'),
            'pilihan_b' => $this->getTIUOption('B'),
            'pilihan_c' => $this->getTIUOption('C'),
            'pilihan_d' => $this->getTIUOption('D'),
            'pilihan_e' => $this->getTIUOption('E'),
            'kunci_jawaban' => 'B',
            'pembahasan' => $this->getTIUExplanation(),
        ]);
    }

    /**
     * Create TKP (Tes Karakteristik Pribadi) questions
     */
    public function tkp()
    {
        return $this->state(fn (array $attributes) => [
            'kategori' => 'TKP',
            'pertanyaan' => $this->getTKPQuestion(),
            'pilihan_a' => $this->getTKPOption('A'),
            'pilihan_b' => $this->getTKPOption('B'),
            'pilihan_c' => $this->getTKPOption('C'),
            'pilihan_d' => $this->getTKPOption('D'),
            'pilihan_e' => $this->getTKPOption('E'),
            'kunci_jawaban' => 'C',
            'pembahasan' => $this->getTKPExplanation(),
        ]);
    }

    private function getTWKQuestion()
    {
        $questions = [
            'Dasar negara Indonesia yang tertuang dalam Pembukaan UUD 1945 Alinea keempat adalah...',
            'Pancasila sebagai ideologi negara Indonesia memiliki fungsi sebagai...',
            'Negara Indonesia adalah negara hukum sebagaimana tertuang dalam Pasal...',
            'Sistem pemerintahan Indonesia menganut sistem...',
            'Kedaulatan berada di tangan rakyat dan dilaksanakan menurut UUD 1945 adalah prinsip...',
            'Presiden Indonesia memegang jabatan selama...',
            'MPR (Majelis Permusyawaratan Rakyat) dapat dibubarkan oleh...',
            'Mahkamah Konstitusi memiliki kewenangan untuk...',
            'Komisi Yudisial bertugas mengajukan calon hakim agung kepada...',
            'Ketetapan MPR yang berlaku sebagai hukum dasar adalah...',
        ];
        return $this->faker->randomElement($questions);
    }

    private function getTWKOption($letter)
    {
        $options = [
            'A' => [
                'Pancasila',
                'Dasar negara',
                'Sumber dari segala sumber hukum',
                'Karakter bangsa',
                'Falsafah hidup bangsa'
            ],
            'B' => [
                'UUD 1945',
                'Ideologi terbuka',
                'Peraturan pemerintah',
                'Sistem politik',
                'Adat istiadat'
            ],
            'C' => [
                'NKRI',
                'Ideologi tertutup',
                'Kebiasaan masyarakat',
                'Norma sosial',
                'Kebudayaan lokal'
            ],
            'D' => [
                'Bhinneka Tunggal Ika',
                'Falsafah negara',
                'Ajaran agama',
                'Moral umum',
                'Etika profesi'
            ],
            'E' => [
                'Semua benar',
                'Tidak ada jawaban',
                'A dan B benar',
                'B dan C benar',
                'Semua salah'
            ]
        ];
        return $this->faker->randomElement($options[$letter]);
    }

    private function getTWKExplanation()
    {
        return 'Pembahasan: Jawaban yang paling tepat adalah A karena sesuai dengan Pasal 1 Ayat (1) UUD 1945 yang menyatakan bahwa Negara Indonesia adalah negara kesatuan yang berbentuk Republik.';
    }

    private function getTIUQuestion()
    {
        $questions = [
            'Jika 2x + 5 = 13, maka nilai x adalah...',
            'Deret aritmatika 3, 7, 11, 15, ... maka suku ke-10 adalah...',
            'Perbandingan A:B = 3:4 dan B:C = 6:7, maka A:C =...',
            'Sebuah lingkaran memiliki jari-jari 14 cm, maka luasnya adalah...',
            'Jika sebuah segitiga memiliki sisi 3, 4, dan 5, maka segitiga tersebut adalah...',
            'Hasil dari 25 × 8 ÷ 4 + 12 adalah...',
            'Jika log x = 3, maka nilai x adalah...',
            'Persamaan garis yang melalui titik (2,3) dan (4,7) adalah...',
            'Median dari data: 2, 4, 6, 8, 10, 12, 14 adalah...',
            'Modus dari data: 5, 7, 5, 9, 11, 5, 13 adalah...'
        ];
        return $this->faker->randomElement($questions);
    }

    private function getTIUOption($letter)
    {
        $options = [
            'A' => ['2', '25', '3:7', '616 cm²', 'Segitiga siku-siku', '56', '100', 'y = 2x - 1', '8', '5'],
            'B' => ['3', '31', '9:14', '154 cm²', 'Segitiga sama kaki', '58', '1000', 'y = 2x + 1', '10', '7'],
            'C' => ['4', '39', '18:14', '308 cm²', 'Segitiga sama sisi', '62', '27', 'y = x + 1', '12', '9'],
            'D' => ['5', '43', '27:28', '616π cm²', 'Segitiga tumpul', '68', '10000', 'y = 3x - 3', '14', '11'],
            'E' => ['6', '47', '1:2', '154π cm²', 'Tidak dapat ditentukan', '72', 'e³', 'y = x + 3', '16', '13']
        ];
        return $this->faker->randomElement($options[$letter]);
    }

    private function getTIUExplanation()
    {
        return 'Pembahasan: Jawaban yang paling tepat adalah B karena perhitungan matematis yang tepat adalah 2x + 5 = 13, maka 2x = 13 - 5 = 8, sehingga x = 4.';
    }

    private function getTKPQuestion()
    {
        $questions = [
            'Ketika atasan memberikan kritik yang membangun, sikap yang sebaiknya Anda tunjukkan adalah...',
            'Dalam bekerja tim, ada teman yang kesulitan menyelesaikan tugas. Tindakan Anda adalah...',
            'Ketika ada perbedaan pendapat dalam rapat, cara terbaik menyelesaikannya adalah...',
            'Anda diminta mengerjakan tugas baru di luar bidang Anda. Reaksi Anda adalah...',
            'Ketika deadline mendesak namun ada tugas lain yang harus selesai, Anda akan...',
            'Rekan kerja mengalami masalah pribadi yang memengaruhi kinerja. Sikap Anda adalah...',
            'Ketika ide Anda ditolak dalam rapat, respon yang tepat adalah...',
            'Anda menemukan kesalahan dalam keputusan atasan. Tindakan Anda adalah...',
            'Ketika menghadapi tantangan baru yang sulit, pendekatan Anda adalah...',
            'Dalam situasi konflik dengan rekan kerja, langkah pertama yang Anda ambil adalah...'
        ];
        return $this->faker->randomElement($questions);
    }

    private function getTKPOption($letter)
    {
        $options = [
            'A' => [
                'Membela diri dan mencari alasan',
                'Mengabaikan dan fokus pada tugas sendiri',
                'Menolak mentah-mentah',
                'Menyerah dan meminta bantuan terus-menerus',
                'Menghindari konflik'
            ],
            'B' => [
                'Menerima dengan emosi negatif',
                'Mengkritik di belakang',
                'Mendominasi diskusi',
                'Menolak tanpa alasan jelas',
                'Menyalahkan orang lain'
            ],
            'C' => [
                'Menerima dengan terbuka dan mempelajari',
                'Menawarkan bantuan secara sukarela',
                'Mencari solusi kompromi',
                'Mencoba mempelajari dan berkonsultasi',
                'Mencari prioritas dan manajemen waktu',
                'Memberikan dukungan dan empati',
                'Mencari masukan dan memperbaiki',
                'Berbicara secara pribadi dengan sopan',
                'Menganalisis dan mencari strategi',
                'Mendengarkan dan memahami perspektif'
            ],
            'D' => [
                'Mengabaikan kritik tersebut',
                'Melaporkan ke atasan',
                'Menarik diri dari diskusi',
                'Mengerjakan dengan setengah hati',
                'Panik dan stress berlebihan',
                'Membicarakan ke orang lain',
                'Argumen keras dan mendesak',
                'Mengumumkan ke publik',
                'Menunda dan menghindar',
                'Melaporkan ke HRD'
            ],
            'E' => [
                'Membalas kritik yang tidak perlu',
                'Bersaing tidak sehat',
                'Memaksakan kehendak',
                'Menolak semua tugas tambahan',
                'Hanya mengerjakan yang mudah',
                'Mengambil alih tugasnya',
                'Mengundurkan diri dari rapat',
                'Menyembunyikan kesalahan tersebut',
                'Menyerah tanpa mencoba',
                'Memusuhi rekan kerja'
            ]
        ];
        return $this->faker->randomElement($options[$letter]);
    }

    private function getTKPExplanation()
    {
        return 'Pembahasan: Jawaban C paling tepat karena menunjukkan sikap terbuka, kooperatif, dan profesional dalam menghadapi berbagai situasi kerja yang menantang.';
    }
}
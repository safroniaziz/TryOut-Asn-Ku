<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute harus diterima.',
    'accepted_if' => ':attribute harus diterima ketika :other adalah :value.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus tanggal setelah :date.',
    'after_or_equal' => ':attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandung huruf.',
    'alpha_dash' => ':attribute hanya boleh mengandung huruf, angka, strip, dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh mengandung huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'ascii' => ':attribute hanya boleh mengandung karakter alfanumerik single-byte dan simbol.',
    'before' => ':attribute harus tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => ':attribute harus memiliki antara :min dan :max item.',
        'file' => ':attribute harus berukuran antara :min dan :max kilobyte.',
        'numeric' => ':attribute harus antara :min dan :max.',
        'string' => ':attribute harus antara :min dan :max karakter.',
    ],
    'boolean' => ':attribute harus berupa true atau false.',
    'can' => ':attribute mengandung nilai yang tidak diizinkan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Password salah.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'decimal' => ':attribute harus memiliki :decimal tempat desimal.',
    'declined' => ':attribute harus ditolak.',
    'declined_if' => ':attribute harus ditolak ketika :other adalah :value.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus :digits digit.',
    'digits_between' => ':attribute harus antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => ':attribute memiliki nilai duplikat.',
    'doesnt_end_with' => ':attribute tidak boleh berakhir dengan salah satu dari: :values.',
    'doesnt_start_with' => ':attribute tidak boleh dimulai dengan salah satu dari: :values.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'ends_with' => ':attribute harus berakhir dengan salah satu dari: :values.',
    'enum' => ':attribute yang dipilih tidak valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'extensions' => ':attribute harus memiliki salah satu ekstensi: :values.',
    'file' => ':attribute harus berupa file.',
    'filled' => ':attribute harus memiliki nilai.',
    'gt' => [
        'array' => ':attribute harus memiliki lebih dari :value item.',
        'file' => ':attribute harus lebih besar dari :value kilobyte.',
        'numeric' => ':attribute harus lebih besar dari :value.',
        'string' => ':attribute harus lebih dari :value karakter.',
    ],
    'gte' => [
        'array' => ':attribute harus memiliki :value item atau lebih.',
        'file' => ':attribute harus lebih besar atau sama dengan :value kilobyte.',
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'string' => ':attribute harus :value karakter atau lebih.',
    ],
    'hex_color' => ':attribute harus berupa warna hexadecimal yang valid.',
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute tidak ada dalam :other.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus berupa alamat IP yang valid.',
    'ipv4' => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
    'json' => ':attribute harus berupa JSON string yang valid.',
    'lowercase' => ':attribute harus huruf kecil.',
    'lt' => [
        'array' => ':attribute harus memiliki kurang dari :value item.',
        'file' => ':attribute harus kurang dari :value kilobyte.',
        'numeric' => ':attribute harus kurang dari :value.',
        'string' => ':attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => ':attribute tidak boleh memiliki lebih dari :value item.',
        'file' => ':attribute harus kurang dari atau sama dengan :value kilobyte.',
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'string' => ':attribute harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => ':attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
        'file' => ':attribute tidak boleh lebih besar dari :max kilobyte.',
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'string' => ':attribute tidak boleh lebih dari :max karakter.',
    ],
    'max_digits' => ':attribute tidak boleh memiliki lebih dari :max digit.',
    'mimes' => ':attribute harus berupa file bertipe: :values.',
    'mimetypes' => ':attribute harus berupa file bertipe: :values.',
    'min' => [
        'array' => ':attribute harus memiliki minimal :min item.',
        'file' => ':attribute harus minimal :min kilobyte.',
        'numeric' => ':attribute harus minimal :min.',
        'string' => ':attribute harus minimal :min karakter.',
    ],
    'min_digits' => ':attribute harus memiliki minimal :min digit.',
    'missing' => ':attribute harus hilang.',
    'missing_if' => ':attribute harus hilang ketika :other adalah :value.',
    'missing_unless' => ':attribute harus hilang kecuali :other adalah :value.',
    'missing_with' => ':attribute harus hilang ketika :values ada.',
    'missing_with_all' => ':attribute harus hilang ketika :values ada.',
    'multiple_of' => ':attribute harus kelipatan dari :value.',
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => [
        'letters' => ':attribute harus mengandung minimal satu huruf.',
        'mixed' => ':attribute harus mengandung minimal satu huruf besar dan satu huruf kecil.',
        'numbers' => ':attribute harus mengandung minimal satu angka.',
        'symbols' => ':attribute harus mengandung minimal satu simbol.',
        'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Silakan pilih :attribute yang berbeda.',
    ],
    'present' => ':attribute harus ada.',
    'present_if' => ':attribute harus ada ketika :other adalah :value.',
    'present_unless' => ':attribute harus ada kecuali :other adalah :value.',
    'present_with' => ':attribute harus ada ketika :values ada.',
    'present_with_all' => ':attribute harus ada ketika :values ada.',
    'prohibited' => ':attribute dilarang.',
    'prohibited_if' => ':attribute dilarang ketika :other adalah :value.',
    'prohibited_unless' => ':attribute dilarang kecuali :other adalah :value.',
    'prohibits' => ':attribute melarang :other untuk ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => ':attribute wajib diisi.',
    'required_array_keys' => ':attribute harus berisi entri untuk: :values.',
    'required_if' => ':attribute wajib diisi ketika :other adalah :value.',
    'required_if_accepted' => ':attribute wajib diisi ketika :other diterima.',
    'required_unless' => ':attribute wajib diisi kecuali :other adalah :values.',
    'required_with' => ':attribute wajib diisi ketika :values ada.',
    'required_with_all' => ':attribute wajib diisi ketika :values ada.',
    'required_without' => ':attribute wajib diisi ketika :values tidak ada.',
    'required_without_all' => ':attribute wajib diisi ketika tidak ada :values.',
    'same' => ':attribute dan :other harus sama.',
    'size' => [
        'array' => ':attribute harus memiliki :size item.',
        'file' => ':attribute harus berukuran :size kilobyte.',
        'numeric' => ':attribute harus :size.',
        'string' => ':attribute harus :size karakter.',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu dari: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus berupa zona waktu yang valid.',
    'unique' => ':attribute sudah digunakan.',
    'uploaded' => ':attribute gagal diunggah.',
    'uppercase' => ':attribute harus huruf besar.',
    'url' => ':attribute harus berupa URL yang valid.',
    'ulid' => ':attribute harus berupa ULID yang valid.',
    'uuid' => ':attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "rule.attribute" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'nama lengkap',
        'email' => 'email',
        'password' => 'password',
        'password_confirmation' => 'konfirmasi password',
        'whatsapp' => 'nomor WhatsApp',
        'phone' => 'nomor telepon',
        'city' => 'kota/kabupaten',
        'province' => 'provinsi',
        'address' => 'alamat',
        'education_level' => 'tingkat pendidikan',
        'work_status' => 'status pekerjaan',
        'target_score' => 'target skor',
        'target_test' => 'target tes',
        'target_agency' => 'target instansi',
        'target_institution' => 'target institusi',
        'experience_level' => 'tingkat pengalaman',
        'referral_code' => 'kode referral',
        'used_referral_code' => 'kode referral',
        'motivation' => 'motivasi',
        'newsletter' => 'newsletter',
        'cpns_type' => 'jenis CPNS',
        'major' => 'jurusan',
        'university' => 'universitas',
        'my_referral_code' => 'kode referral saya',
    ],

];

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Tugas Mandiri: Profil Akademis ITS
|--------------------------------------------------------------------------
|
| Spesifikasi teknis:
|   Rute 1: Halaman Home          GET /
|   Rute 2: Detail Profil         GET /mahasiswa/{nrp}  (regex 10 digit)
|   Rute 3: Ide Agentic AI        GET /agent/{tema?}    (parameter opsional)
|
| Tantangan Tambahan:
|   Tantangan 1: Regex where() pada /mahasiswa/{nrp}
|   Tantangan 2: Kalkulator IPK   GET /hitung-ipk/{ip1}/{ip2}
|   Tantangan 3: Prefix Group /dashboard  +  Route::fallback()
|
*/

/* ======================================================================
   RUTE 1 — Halaman Home
   Named route: 'home'
   ====================================================================== */
Route::get('/', function () {
    return view('home');
})->name('home');

/* ======================================================================
   RUTE 2 — Detail Profil Mahasiswa
   Parameter wajib: {nrp}
   Named route  : 'mahasiswa.profil'
   TANTANGAN 1  : Regex where() — hanya menerima 10 digit angka (NRP ITS)
   ====================================================================== */
Route::get('/mahasiswa/{nrp}', function (string $nrp) {
    $profil = [
        'nama'       => 'Aziz Adi Pramana',
        'email'      => 'azizadi@mahasiswa.its.ac.id',
        'departemen' => 'Departemen Informatika',
        'fakultas'   => 'Fakultas Elektro dan Informatika Cerdas (FTEIC)',
        'kampus'     => 'Institut Teknologi Sepuluh Nopember (ITS), Surabaya',
        'kota'       => 'Surabaya, Jawa Timur',
        'angkatan'   => '2024',
        'ipk'        => 3.16,
        'keahlian'   => [
            'PHP', 'Laravel', 'Python', 'JavaScript', 'Vue.js',
            'MySQL', 'REST API', 'Docker', 'Git', 'Machine Learning',
        ],
        'minat'      => [
            'Agentic AI', 'Natural Language Processing',
            'Sistem Multi-Agen', 'Web Engineering', 'Cloud Computing',
        ],
        'riwayat'    => [
            ['semester' => 1, 'sks' => 20, 'ip' => 2.59, 'status' => 'Lulus'],
            ['semester' => 2, 'sks' => 22, 'ip' => 3.43, 'status' => 'Lulus'],
            ['semester' => 3, 'sks' => 22, 'ip' => 3.03, 'status' => 'Lulus'],
            ['semester' => 4, 'sks' => 22, 'ip' => 3.57, 'status' => 'Lulus'],
            ['semester' => 5, 'sks' => 20, 'ip' => null, 'status' => 'Berjalan'],
        ],
    ];

    return view('mahasiswa', compact('nrp', 'profil'));
})
->where('nrp', '[0-9]{10}')    // Tantangan 1: hanya 10 digit angka
->name('mahasiswa.profil');     // Named route wajib

/* ======================================================================
   RUTE 3 — Ide Platform Agentic AI
   Parameter opsional: {tema?}
   Named route  : 'agent.ide'
   Fallback default: 'General Assistant Agent'
   ====================================================================== */
Route::get('/agent/{tema?}', function (string $tema = 'General Assistant Agent') {
    $temaAsli = request()->route('tema'); // null jika tidak diisi

    if ($tema !== 'Job-Application-Assistant') {
        $tema = 'General Assistant Agent';
    }

    $temaData = [
        'General Assistant Agent' => [
            'deskripsi' => 'Platform AI asisten belajar serbaguna (Study Buddy) yang dirancang khusus untuk mendampingi mahasiswa dalam memahami materi kuliah, merangkum jurnal, dan mengatur jadwal akademis harian.',
            'fitur' => [
                ['icon' => '📚', 'nama' => 'Tutor Pribadi 24/7', 'deskripsi' => 'Memberikan penjelasan interaktif untuk materi kuliah yang sulit dipahami.'],
                ['icon' => '📝', 'nama' => 'Perangkum Jurnal AI', 'deskripsi' => 'Mampu membaca file PDF jurnal ilmiah dan mengekstrak poin-poin penting dalam hitungan detik.'],
                ['icon' => '📅', 'nama' => 'Manajemen Jadwal', 'deskripsi' => 'Mengatur jadwal kuliah, deadline tugas, dan waktu ujian secara terpusat.'],
                ['icon' => '💡', 'nama' => 'Generator Ide Proyek', 'deskripsi' => 'Memberikan saran topik untuk tugas akhir atau paper berdasarkan tren riset terkini.'],
                ['icon' => '🗣️', 'nama' => 'Simulasi Presentasi', 'deskripsi' => 'Mendengarkan latihan presentasi mahasiswa dan memberikan feedback struktur bahasa.'],
                ['icon' => '🎯', 'nama' => 'Tracking Fokus', 'deskripsi' => 'Mengintegrasikan teknik pomodoro dan memblokir distraksi saat sesi belajar mendalam.'],
            ],
            'alur' => [
                ['step' => 'A', 'icon' => '📁', 'judul' => 'Upload Materi',       'detail' => 'Mahasiswa mengunggah slide kuliah atau PDF referensi ke sistem'],
                ['step' => 'B', 'icon' => '🧠', 'judul' => 'Analisis AI',         'detail' => 'Agent memproses materi dan membangun knowledge base khusus'],
                ['step' => 'C', 'icon' => '💬', 'judul' => 'Sesi Tanya Jawab',    'detail' => 'Pengguna dapat bertanya secara natural terkait materi tersebut'],
                ['step' => 'D', 'icon' => '📝', 'judul' => 'Pembuatan Kuis',      'detail' => 'AI membuatkan kuis latihan otomatis untuk menguji pemahaman'],
                ['step' => 'E', 'icon' => '📊', 'judul' => 'Laporan Progress',    'detail' => 'Menerima metrik evaluasi kesiapan sebelum menghadapi ujian sebenarnya'],
                ['step' => 'F', 'icon' => '🏆', 'judul' => 'Capaian Akademis',    'detail' => 'Menyimpan riwayat belajar untuk melihat peningkatan performa'],
            ],
        ],

        // ✨ IDE UTAMA — Aziz Adi Pramana
        'Job-Application-Assistant' => [
            'deskripsi' => 'Sistem AI agentic yang membantu pengguna menemukan lowongan kerja yang sesuai berdasarkan kompetensi dan pengalaman melalui percakapan, menganalisis kecocokan, lalu secara otomatis membuat CV yang disesuaikan dan menyiapkan email lamaran siap kirim.',
            'fitur' => [
                ['icon' => '💬', 'nama' => 'Profil via Chat',        'deskripsi' => 'Pengguna memasukkan kompetensi, pengalaman, dan preferensi kerja melalui percakapan natural dengan agent AI.'],
                ['icon' => '🔍', 'nama' => 'Pencarian Lowongan',     'deskripsi' => 'Agent secara otomatis mencari dan menganalisis lowongan dari berbagai platform (LinkedIn, Jobstreet, Glints, dll.).'],
                ['icon' => '📊', 'nama' => 'Match Score Analysis',   'deskripsi' => 'Setiap lowongan mendapat persentase kecocokan berbasis analisis NLP antara profil pengguna dan requirement posisi.'],
                ['icon' => '📄', 'nama' => 'Auto CV Generation',     'deskripsi' => 'Agent menghasilkan CV yang disesuaikan otomatis per posisi — menonjolkan skills dan pengalaman yang paling relevan.'],
                ['icon' => '✉️', 'nama' => 'Email Lamaran Otomatis', 'deskripsi' => 'Menyiapkan email lamaran profesional yang dipersonalisasi untuk setiap posisi, siap diedit sebelum dikirim.'],
                ['icon' => '▶️', 'nama' => 'Human-in-the-Loop Run',  'deskripsi' => 'Pengguna dapat mengevaluasi dan mengedit CV serta email sebelum menekan tombol Run untuk melanjutkan proses lamaran.'],
            ],
            'alur' => [
                ['step' => '01', 'icon' => '💬', 'judul' => 'Input via Chat',        'detail' => 'Ceritakan skill, pengalaman, dan jenis pekerjaan yang diinginkan'],
                ['step' => '02', 'icon' => '🔍', 'judul' => 'Agent Mencari',         'detail' => 'AI secara otonom menelusuri ribuan lowongan dari berbagai platform'],
                ['step' => '03', 'icon' => '📊', 'judul' => 'Analisis Kecocokan',    'detail' => 'Setiap lowongan diberi skor match (%) berdasarkan profil pengguna'],
                ['step' => '04', 'icon' => '📄', 'judul' => 'Generate CV & Email',   'detail' => 'CV dan email lamaran dibuat otomatis, disesuaikan per posisi'],
                ['step' => '05', 'icon' => '✏️', 'judul' => 'Review & Edit',         'detail' => 'Pengguna mengevaluasi dan mengedit hasil sesuai keinginan'],
                ['step' => '06', 'icon' => '🚀', 'judul' => 'Run — Kirim Lamaran',   'detail' => 'Tekan Run untuk melanjutkan proses lamaran secara otomatis'],
            ],
        ],
    ];

    $data = $temaData[$tema];

    $techStackPerTema = [
        'Job-Application-Assistant' => [
            ['icon' => '🐍', 'nama' => 'Python',         'kategori' => 'Backend AI'],
            ['icon' => '🦜', 'nama' => 'LangChain',      'kategori' => 'Agent Framework'],
            ['icon' => '🤖', 'nama' => 'OpenAI GPT-4o',  'kategori' => 'LLM Engine'],
            ['icon' => '🔎', 'nama' => 'SerpAPI',         'kategori' => 'Job Search Tool'],
            ['icon' => '📝', 'nama' => 'ReportLab',       'kategori' => 'CV Generator'],
            ['icon' => '⚡', 'nama' => 'FastAPI',          'kategori' => 'API Layer'],
            ['icon' => '🐘', 'nama' => 'Laravel',          'kategori' => 'Web Backend'],
            ['icon' => '💚', 'nama' => 'Vue.js',           'kategori' => 'Frontend'],
            ['icon' => '🗄️', 'nama' => 'PostgreSQL',      'kategori' => 'Database'],
            ['icon' => '🔴', 'nama' => 'Redis',            'kategori' => 'Queue/Cache'],
        ],
        'General Assistant Agent' => [
            ['icon' => '🐍', 'nama' => 'Python',       'kategori' => 'Backend AI'],
            ['icon' => '🦜', 'nama' => 'LangChain',    'kategori' => 'AI Framework'],
            ['icon' => '🤖', 'nama' => 'OpenAI GPT',   'kategori' => 'LLM Engine'],
            ['icon' => '⚡', 'nama' => 'FastAPI',        'kategori' => 'API Layer'],
            ['icon' => '🐘', 'nama' => 'Laravel',        'kategori' => 'Web Backend'],
            ['icon' => '💚', 'nama' => 'Vue.js',         'kategori' => 'Frontend'],
            ['icon' => '🗄️', 'nama' => 'PostgreSQL',    'kategori' => 'Database'],
            ['icon' => '🔴', 'nama' => 'Redis',          'kategori' => 'Cache/Queue'],
            ['icon' => '🐳', 'nama' => 'Docker',         'kategori' => 'Container'],
            ['icon' => '☁️', 'nama' => 'Cloud Native',   'kategori' => 'Deployment'],
        ],
    ];
    $techStack = $techStackPerTema[$tema];

    $temaLain = [
        ['slug' => 'Job-Application-Assistant', 'nama' => 'Job Application Assistant', 'icon' => '💼'],
    ];

    return view('agent', [
        'tema'      => $tema,
        'temaAsli'  => $temaAsli,
        'deskripsi' => $data['deskripsi'],
        'fitur'     => $data['fitur'],
        'alur'      => $data['alur'],
        'techStack' => $techStack,
        'temaLain'  => $temaLain,
    ]);
})->name('agent.ide');

/* ======================================================================
   TANTANGAN 2 — Kalkulator Portofolio Akademis
   GET /hitung-ipk/{ip1}/{ip2}
   Named route: 'hitung.ipk'
   ====================================================================== */
Route::get('/hitung-ipk/{ip1}/{ip2}', function (float $ip1, float $ip2) {
    $jumlah   = $ip1 + $ip2;
    $rataRata = round($jumlah / 2, 2);

    return view('kalkulator', compact('ip1', 'ip2', 'jumlah', 'rataRata'));
})->name('hitung.ipk');

/* ======================================================================
   TANTANGAN 3 — Route Grouping dengan Prefix /dashboard
   Named prefix: 'dashboard.'
   ====================================================================== */
Route::prefix('dashboard')->name('dashboard.')->group(function () {

    // GET /dashboard → 'dashboard.home'
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    // GET /dashboard/profil/{nrp} → 'dashboard.profil'
    Route::get('/profil/{nrp}', function (string $nrp) {
        return redirect()->route('mahasiswa.profil', ['nrp' => $nrp]);
    })->where('nrp', '[0-9]{10}')->name('profil');

});

/* ======================================================================
   TANTANGAN 3 — Fallback Route (halaman tidak ditemukan)
   ====================================================================== */
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

@extends('layouts.app')

@section('title', 'Profil Mahasiswa ' . $nrp . ' - ITS')

@section('content')
<div class="animate-in">
    {{-- Route Info --}}
    <div style="margin-bottom: 2rem;">
        <div class="route-pill">
            <span class="method-get">GET</span>
            /mahasiswa/<strong>{{ $nrp }}</strong>
            <span style="color: var(--text-muted); font-family: 'Inter', sans-serif; font-size: 0.72rem;">→ route('mahasiswa.profil', ['nrp' => '{{ $nrp }}'])</span>
        </div>
    </div>

    {{-- Profile Hero --}}
    <div class="card" style="margin-bottom: 2rem; background: linear-gradient(135deg, rgba(108,99,255,0.08), rgba(56,249,215,0.04));">
        <div style="display: flex; gap: 2rem; align-items: flex-start; flex-wrap: wrap;">
            {{-- Avatar --}}
            <div style="position: relative; flex-shrink: 0;">
                <div style="width: 110px; height: 110px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--accent2)); display: flex; align-items: center; justify-content: center; font-size: 3rem; box-shadow: 0 0 30px rgba(108,99,255,0.4);">
                    🧑‍💻
                </div>
                <div style="position: absolute; bottom: 4px; right: 4px; width: 20px; height: 20px; background: var(--accent); border-radius: 50%; border: 3px solid var(--bg-card); box-shadow: 0 0 8px var(--accent);"></div>
            </div>

            {{-- Info --}}
            <div style="flex: 1; min-width: 200px;">
                <div style="display: flex; gap: 0.5rem; margin-bottom: 0.75rem; flex-wrap: wrap;">
                    <span class="badge badge-primary">🎓 Mahasiswa Aktif</span>
                    <span class="badge badge-success">✅ Semester 5</span>
                    <span class="badge badge-info">💻 Informatika</span>
                </div>
                <h1 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 0.35rem;">{{ $profil['nama'] }}</h1>
                <p style="color: var(--text-muted); margin-bottom: 0.25rem; font-size: 0.9rem;">
                    📌 NRP: <strong style="color: var(--accent2); font-family: 'Courier New', monospace; font-size: 1rem;">{{ $nrp }}</strong>
                </p>
                <p style="color: var(--text-muted); font-size: 0.875rem;">{{ $profil['departemen'] }} &mdash; {{ $profil['fakultas'] }}</p>
                <p style="color: var(--text-muted); font-size: 0.875rem; margin-top: 0.25rem;">🏛️ {{ $profil['kampus'] }}</p>
            </div>

            {{-- IPK Box --}}
            <div style="text-align: center; padding: 1.5rem 2rem; background: var(--bg-card2); border-radius: 16px; border: 1px solid rgba(108,99,255,0.3);">
                <div style="font-size: 2.5rem; font-weight: 800; background: linear-gradient(135deg, var(--primary), var(--accent2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    {{ $profil['ipk'] }}
                </div>
                <div style="color: var(--text-muted); font-size: 0.75rem; margin-top: 0.25rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em;">IPK Kumulatif</div>
                <div style="margin-top: 0.75rem;">
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ ($profil['ipk'] / 4) * 100 }}%;"></div>
                    </div>
                    <div style="color: var(--text-muted); font-size: 0.7rem; margin-top: 0.35rem;">{{ number_format(($profil['ipk'] / 4) * 100, 1) }}% dari 4.00</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-2" style="margin-bottom: 2rem;">
        {{-- Data Diri --}}
        <div class="card">
            <div class="section-label">Identitas</div>
            <h2 style="font-size: 1.1rem; margin-bottom: 1.25rem;">Data Diri Lengkap</h2>

            @foreach ([
                ['label' => 'Nama Lengkap', 'icon' => '👤', 'value' => $profil['nama']],
                ['label' => 'NRP', 'icon' => '🔖', 'value' => $nrp],
                ['label' => 'Email', 'icon' => '✉️', 'value' => $profil['email']],
                ['label' => 'Asal Kota', 'icon' => '📍', 'value' => $profil['kota']],
                ['label' => 'Angkatan', 'icon' => '📅', 'value' => $profil['angkatan']],
                ['label' => 'Status', 'icon' => '✅', 'value' => 'Mahasiswa Aktif'],
            ] as $item)
            <div style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 0; border-bottom: 1px solid rgba(255,255,255,0.04);">
                <span style="font-size: 1.1rem; width: 24px; flex-shrink: 0;">{{ $item['icon'] }}</span>
                <div style="flex: 1;">
                    <div style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 0.2rem;">{{ $item['label'] }}</div>
                    <div style="font-size: 0.9rem; font-weight: 500;">{{ $item['value'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Riwayat Studi --}}
        <div class="card">
            <div class="section-label">Akademik</div>
            <h2 style="font-size: 1.1rem; margin-bottom: 1.25rem;">Riwayat Studi</h2>
            <div class="timeline">
                @foreach ($profil['riwayat'] as $riwayat)
                <div class="timeline-item">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="font-weight: 600; font-size: 0.9rem;">Semester {{ $riwayat['semester'] }}</div>
                        <span class="badge badge-{{ $riwayat['ip'] >= 3.5 ? 'success' : ($riwayat['ip'] >= 3.0 ? 'primary' : 'danger') }}">
                            IP: {{ $riwayat['ip'] }}
                        </span>
                    </div>
                    <div style="color: var(--text-muted); font-size: 0.8rem; margin-top: 0.3rem;">{{ $riwayat['sks'] }} SKS &mdash; {{ $riwayat['status'] }}</div>
                    <div class="progress-bar" style="margin-top: 0.5rem;">
                        <div class="progress-fill" style="width: {{ ($riwayat['ip'] / 4) * 100 }}%;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Keahlian & Minat --}}
    <div class="card" style="margin-bottom: 2rem;">
        <div class="section-label">Kompetensi</div>
        <h2 style="font-size: 1.1rem; margin-bottom: 1.25rem;">Keahlian & Minat</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
            @foreach ($profil['keahlian'] as $skill)
            <span class="badge badge-primary" style="font-size: 0.8rem;">{{ $skill }}</span>
            @endforeach
        </div>
        <div class="divider"></div>
        <h3 style="font-size: 0.95rem; margin-bottom: 1rem; color: var(--text-muted);">Minat Riset</h3>
        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
            @foreach ($profil['minat'] as $minat)
            <span class="badge badge-info" style="font-size: 0.8rem;">{{ $minat }}</span>
            @endforeach
        </div>
    </div>

    {{-- Kode Rute Info --}}
    <div class="card card-glass">
        <div class="section-label">Laravel</div>
        <h2 style="font-size: 1rem; margin-bottom: 1rem;">Implementasi Named Route</h2>
        <div class="code-block">
<span class="comment">// routes/web.php — Rute 2 dengan Regex Constraint</span>
<br>Route::<span class="func">get</span>(<span class="string">'/mahasiswa/{nrp}'</span>, <span class="keyword">function</span>(string $nrp) {
<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="func">view</span>(<span class="string">'mahasiswa'</span>, compact(<span class="string">'nrp'</span>));
<br>})-><span class="func">where</span>(<span class="string">'nrp'</span>, <span class="string">'[0-9]{10}'</span>)  <span class="comment">// Tantangan 1: Regex 10 digit</span>
<br>&nbsp;-><span class="func">name</span>(<span class="string">'mahasiswa.profil'</span>);       <span class="comment">// Named route wajib</span>
        </div>
    </div>
</div>
@endsection

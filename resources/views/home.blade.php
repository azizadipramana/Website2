@extends('layouts.app')

@section('title', 'Home - Profil Akademis ITS')

@section('content')
<div class="animate-in">
    {{-- Hero Section --}}
    <div style="text-align:center; padding: 2rem 0 4rem;">
        <div class="route-pill" style="margin: 0 auto 1.5rem; width: fit-content;">
            <span class="method-get">GET</span>
            /
            <span style="color: var(--text-muted); font-family: 'Inter', sans-serif; font-size: 0.72rem;">→ route('home')</span>
        </div>

        <div style="font-size: 4rem; margin-bottom: 1rem; animation: fadeInUp 0.5s ease;">🏛️</div>

        <div class="section-label" style="justify-content: center;">
            Institut Teknologi Sepuluh Nopember
        </div>

        <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 800; line-height: 1.1; margin-bottom: 1.25rem;">
            Selamat Datang di<br>
            <span class="gradient-text">Profil Akademis ITS</span>
        </h1>

        <p style="font-size: 1.15rem; color: var(--text-muted); max-width: 560px; margin: 0 auto 2.5rem; line-height: 1.7;">
            Platform informasi akademis mahasiswa Departemen Informatika ITS.
            Maju bersama inovasi, teknologi, dan semangat <em>excellence</em>.
        </p>

        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('mahasiswa.profil', ['nrp' => '5025241195']) }}" class="btn btn-primary" id="btn-lihat-profil">
                👤 Lihat Profil Saya
            </a>
            <a href="{{ route('agent.ide') }}" class="btn btn-outline" id="btn-ide-ai">
                🤖 Ide Agentic AI
            </a>
            <a href="{{ route('agent.ide', ['tema' => 'Job-Application-Assistant']) }}" class="btn btn-outline" id="btn-ide-utama" style="border-color: rgba(108,99,255,0.4); color: #A09EFF; background: rgba(108,99,255,0.05);">
                ✨ Proposed Ide Utama
            </a>
        </div>
    </div>

    {{-- Stats Section --}}
    <div class="grid-3 animate-in animate-in-delay-1" style="margin-bottom: 3rem;">
        <div class="stat-box">
            <span class="stat-value">3.16</span>
            <span class="stat-label">📊 IPK Kumulatif</span>
        </div>
        <div class="stat-box">
            <span class="stat-value">5</span>
            <span class="stat-label">📅 Semester Aktif</span>
        </div>
        <div class="stat-box">
            <span class="stat-value">106</span>
            <span class="stat-label">✅ SKS Ditempuh</span>
        </div>
    </div>

    {{-- Info Cards --}}
    <div class="grid-2 animate-in animate-in-delay-2" style="margin-bottom: 3rem;">
        <div class="card">
            <div style="font-size: 2rem; margin-bottom: 1rem;">🎯</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 0.5rem;">Profil Mahasiswa</h3>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.7; margin-bottom: 1.25rem;">
                Informasi lengkap data diri, riwayat akademik, dan pencapaian selama menjalani studi di Departemen Informatika ITS.
            </p>
            <a href="{{ route('mahasiswa.profil', ['nrp' => '5025241195']) }}" class="btn btn-outline" style="font-size: 0.8rem;" id="btn-profil-card">
                Buka Profil →
            </a>
        </div>

        <div class="card">
            <div style="font-size: 2rem; margin-bottom: 1rem;">🤖</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 0.5rem;">Platform Agentic AI</h3>
            <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.7; margin-bottom: 1.25rem;">
                Proyeksi ide tugas akhir semester tentang pengembangan platform berbasis Agentic AI yang inovatif dan solutif.
            </p>
            <a href="{{ route('agent.ide') }}" class="btn btn-outline" style="font-size: 0.8rem;" id="btn-agent-card">
                Eksplorasi Ide →
            </a>
        </div>
    </div>

    {{-- Quick Navigation --}}
    <div class="card animate-in animate-in-delay-3">
        <div class="section-label">Navigasi Rute</div>
        <h2 style="font-size: 1.25rem; margin-bottom: 1.5rem;">Peta Rute Aplikasi</h2>
        <div style="display: flex; flex-direction: column; gap: 0.75rem;">

            <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-size: 1.25rem;">🏠</span>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Halaman Home</div>
                        <div class="code-block" style="padding: 0.2rem 0.6rem; border-radius: 6px; font-size: 0.75rem; display: inline-block; margin-top: 0.25rem;">GET /</div>
                    </div>
                </div>
                <span class="badge badge-success">route('home')</span>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-size: 1.25rem;">👤</span>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Detail Profil Mahasiswa</div>
                        <div class="code-block" style="padding: 0.2rem 0.6rem; border-radius: 6px; font-size: 0.75rem; display: inline-block; margin-top: 0.25rem;">GET /mahasiswa/{nrp}</div>
                    </div>
                </div>
                <span class="badge badge-primary">route('mahasiswa.profil')</span>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-size: 1.25rem;">🤖</span>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Ide Agentic AI</div>
                        <div class="code-block" style="padding: 0.2rem 0.6rem; border-radius: 6px; font-size: 0.75rem; display: inline-block; margin-top: 0.25rem;">GET /agent/{tema?}</div>
                    </div>
                </div>
                <span class="badge badge-info">route('agent.ide')</span>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-size: 1.25rem;">📊</span>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Kalkulator IPK</div>
                        <div class="code-block" style="padding: 0.2rem 0.6rem; border-radius: 6px; font-size: 0.75rem; display: inline-block; margin-top: 0.25rem;">GET /hitung-ipk/{ip1}/{ip2}</div>
                    </div>
                </div>
                <span class="badge badge-danger">route('hitung.ipk')</span>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-size: 1.25rem;">🗂️</span>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Dashboard Akademis</div>
                        <div class="code-block" style="padding: 0.2rem 0.6rem; border-radius: 6px; font-size: 0.75rem; display: inline-block; margin-top: 0.25rem;">GET /dashboard/*</div>
                    </div>
                </div>
                <span class="badge badge-primary">Prefix Group</span>
            </div>

        </div>
    </div>
</div>
@endsection

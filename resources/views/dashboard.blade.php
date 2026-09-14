@extends('layouts.app')

@section('title', 'Dashboard Akademis - ITS')

@section('content')
<div class="animate-in">
    {{-- Route Info --}}
    <div style="margin-bottom: 2rem;">
        <div class="route-pill">
            <span class="method-get">GET</span>
            /dashboard
            <span style="color: var(--text-muted); font-family: 'Inter', sans-serif; font-size: 0.72rem;">→ route('dashboard.home') — Tantangan 3: Prefix Group</span>
        </div>
    </div>

    {{-- Hero --}}
    <div class="page-hero">
        <div style="font-size: 4rem; margin-bottom: 1rem;">🗂️</div>
        <div class="section-label" style="justify-content: center;">Tantangan 3 — Grouping Routes</div>
        <h1>Dashboard<br><span class="gradient-text">Akademis Mahasiswa</span></h1>
        <p style="margin-top: 1rem;">Ringkasan terpadu seluruh data akademis di bawah prefix group <code style="color: var(--accent2);">/dashboard</code>.</p>
    </div>

    {{-- Quick Stats --}}
    <div class="grid-3 animate-in animate-in-delay-1" style="margin-bottom: 2rem;">
        <div class="stat-box">
            <span class="stat-value">3.82</span>
            <span class="stat-label">📊 IPK Kumulatif</span>
        </div>
        <div class="stat-box">
            <span class="stat-value">128</span>
            <span class="stat-label">📋 SKS Lulus</span>
        </div>
        <div class="stat-box">
            <span class="stat-value">Sem 6</span>
            <span class="stat-label">📅 Semester Aktif</span>
        </div>
    </div>

    {{-- Dashboard Menu Cards --}}
    <div class="grid-2 animate-in animate-in-delay-2" style="margin-bottom: 2rem;">
        <a href="{{ route('mahasiswa.profil', ['nrp' => '5025231001']) }}" style="text-decoration: none;" id="dash-link-profil">
            <div class="card" style="height: 100%; cursor: pointer;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">👤</div>
                <h3 style="font-size: 1rem; margin-bottom: 0.5rem;">Profil Mahasiswa</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; line-height: 1.6; margin-bottom: 1rem;">Data diri lengkap, riwayat studi, dan kompetensi akademis.</p>
                <div class="route-pill" style="width: fit-content; margin: 0;">
                    <span class="method-get">GET</span> /mahasiswa/5025231001
                </div>
            </div>
        </a>

        <a href="{{ route('agent.ide') }}" style="text-decoration: none;" id="dash-link-agent">
            <div class="card" style="height: 100%; cursor: pointer;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🤖</div>
                <h3 style="font-size: 1rem; margin-bottom: 0.5rem;">Ide Agentic AI</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; line-height: 1.6; margin-bottom: 1rem;">Proyeksi platform AI cerdas untuk tugas akhir semester.</p>
                <div class="route-pill" style="width: fit-content; margin: 0;">
                    <span class="method-get">GET</span> /agent
                </div>
            </div>
        </a>

        <a href="{{ route('hitung.ipk', ['ip1' => '3.75', 'ip2' => '3.80']) }}" style="text-decoration: none;" id="dash-link-kalkulator">
            <div class="card" style="height: 100%; cursor: pointer;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📊</div>
                <h3 style="font-size: 1rem; margin-bottom: 0.5rem;">Kalkulator IPK</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; line-height: 1.6; margin-bottom: 1rem;">Hitung rata-rata IP semester untuk portofolio akademis.</p>
                <div class="route-pill" style="width: fit-content; margin: 0;">
                    <span class="method-get">GET</span> /hitung-ipk/3.75/3.80
                </div>
            </div>
        </a>

        <a href="{{ route('home') }}" style="text-decoration: none;" id="dash-link-home">
            <div class="card" style="height: 100%; cursor: pointer;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🏠</div>
                <h3 style="font-size: 1rem; margin-bottom: 0.5rem;">Halaman Home</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; line-height: 1.6; margin-bottom: 1rem;">Sambutan selamat datang dan navigasi aplikasi utama.</p>
                <div class="route-pill" style="width: fit-content; margin: 0;">
                    <span class="method-get">GET</span> /
                </div>
            </div>
        </a>
    </div>

    {{-- Route Group Code --}}
    <div class="card card-glass animate-in animate-in-delay-3">
        <div class="section-label">Laravel</div>
        <h2 style="font-size: 1rem; margin-bottom: 1rem;">Implementasi Route Grouping & Prefix</h2>
        <div class="code-block">
<span class="comment">// routes/web.php — Tantangan 3: Route Group dengan Prefix</span>
<br>Route::<span class="func">prefix</span>(<span class="string">'dashboard'</span>)-><span class="func">name</span>(<span class="string">'dashboard.'</span>)-><span class="func">group</span>(<span class="keyword">function</span>() {
<br>
<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// GET /dashboard → 'dashboard.home'</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;Route::<span class="func">get</span>(<span class="string">'/'</span>, <span class="keyword">function</span>() {
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="func">view</span>(<span class="string">'dashboard'</span>);
<br>&nbsp;&nbsp;&nbsp;&nbsp;})-><span class="func">name</span>(<span class="string">'home'</span>);
<br>
<br>});
<br>
<br><span class="comment">// Fallback untuk halaman tidak ditemukan</span>
<br>Route::<span class="func">fallback</span>(<span class="keyword">function</span>() {
<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="func">view</span>(<span class="string">'errors.404'</span>);
<br>});
        </div>
    </div>
</div>
@endsection

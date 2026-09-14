@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan | ITS')

@section('content')
<div style="min-height: 60vh; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 4rem 2rem;">
    <div style="font-size: 6rem; margin-bottom: 1.5rem; animation: float 3s ease-in-out infinite;">🚀</div>

    <div class="section-label" style="justify-content: center; margin-bottom: 0.75rem;">Fallback Route</div>

    <div style="font-size: 8rem; font-weight: 900; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1; margin-bottom: 1rem;">
        404
    </div>

    <h1 style="font-size: 1.75rem; margin-bottom: 0.75rem;">Halaman Tidak Ditemukan</h1>
    <p style="color: var(--text-muted); max-width: 480px; line-height: 1.7; margin-bottom: 2rem; font-size: 0.95rem;">
        Rute yang kamu akses tidak terdaftar dalam sistem routing Laravel.
        Ini ditangani oleh <code style="color: var(--accent2);">Route::fallback()</code> — fitur fallback route Laravel.
    </p>

    <div class="code-block" style="max-width: 480px; margin-bottom: 2rem; text-align: left;">
<span class="comment">// Rute yang kamu coba:</span>
<br><span class="keyword">GET</span> <span class="string">{{ request()->path() !== '/' ? '/' . request()->path() : '/' }}</span>
<br>
<br><span class="comment">// Tidak ditemukan → Route::fallback() dijalankan</span>
    </div>

    <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;">
        <a href="{{ route('home') }}" class="btn btn-primary" id="btn-kembali-home">
            🏠 Kembali ke Home
        </a>
        <a href="{{ route('dashboard.home') }}" class="btn btn-outline" id="btn-ke-dashboard">
            🗂️ Ke Dashboard
        </a>
    </div>
</div>

@push('styles')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
</style>
@endpush
@endsection

@extends('layouts.app')

@section('title', 'Kalkulator IPK - ITS')

@section('content')
<div class="animate-in">
    {{-- Route Info --}}
    <div style="margin-bottom: 2rem;">
        <div class="route-pill">
            <span class="method-get">GET</span>
            /hitung-ipk/<strong>{{ $ip1 }}</strong>/<strong>{{ $ip2 }}</strong>
            <span style="color: var(--text-muted); font-family: 'Inter', sans-serif; font-size: 0.72rem;">→ route('hitung.ipk')</span>
        </div>
    </div>

    {{-- Hero --}}
    <div class="page-hero">
        <div style="font-size: 4rem; margin-bottom: 1rem;">📊</div>
        <div class="section-label" style="justify-content: center;">Tantangan Tambahan 2</div>
        <h1>Kalkulator Portofolio<br><span class="gradient-text">Akademis</span></h1>
        <p style="margin-top: 1rem;">Hitung rata-rata IP dua semester secara otomatis menggunakan parameter rute Laravel.</p>
    </div>

    {{-- Result Card --}}
    <div class="card animate-in animate-in-delay-1" style="margin-bottom: 2rem; background: linear-gradient(135deg, rgba(108,99,255,0.08), rgba(56,249,215,0.05)); text-align: center; padding: 3rem 2rem;">
        <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.5rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Rata-Rata IPK</div>
        <div style="font-size: 5rem; font-weight: 900; background: linear-gradient(135deg, var(--primary), var(--accent2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1; margin-bottom: 0.75rem;">
            {{ $rataRata }}
        </div>
        <div style="font-family: 'Courier New', monospace; color: var(--text-muted); font-size: 1rem; margin-bottom: 1.5rem;">
            ({{ $ip1 }} + {{ $ip2 }}) &divide; 2 = <strong style="color: var(--accent2);">{{ $rataRata }}</strong>
        </div>

        {{-- Grade badge --}}
        @if($rataRata >= 3.75)
            <span class="badge badge-success" style="font-size: 0.9rem; padding: 0.5rem 1.25rem;">🏆 Cumlaude &mdash; Luar Biasa!</span>
        @elseif($rataRata >= 3.5)
            <span class="badge badge-primary" style="font-size: 0.9rem; padding: 0.5rem 1.25rem;">⭐ Sangat Memuaskan</span>
        @elseif($rataRata >= 3.0)
            <span class="badge badge-info" style="font-size: 0.9rem; padding: 0.5rem 1.25rem;">👍 Memuaskan</span>
        @elseif($rataRata >= 2.0)
            <span class="badge badge-warning" style="font-size: 0.9rem; padding: 0.5rem 1.25rem; background: rgba(255,193,7,0.1); color: #FFC107; border: 1px solid rgba(255,193,7,0.3);">📈 Cukup</span>
        @else
            <span class="badge badge-danger" style="font-size: 0.9rem; padding: 0.5rem 1.25rem;">⚠️ Perlu Ditingkatkan</span>
        @endif

        <div class="progress-bar" style="max-width: 400px; margin: 1.5rem auto 0; height: 10px; border-radius: 5px;">
            <div class="progress-fill" style="width: {{ ($rataRata / 4) * 100 }}%;"></div>
        </div>
        <div style="color: var(--text-muted); font-size: 0.75rem; margin-top: 0.5rem;">{{ number_format(($rataRata / 4) * 100, 1) }}% dari nilai maksimum 4.00</div>
    </div>

    {{-- Detail per semester --}}
    <div class="grid-2 animate-in animate-in-delay-2" style="margin-bottom: 2rem;">
        <div class="card" style="text-align: center;">
            <div style="color: var(--text-muted); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.5rem;">Semester 1 (IP1)</div>
            <div style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $ip1 }}</div>
            <div class="progress-bar" style="margin-top: 1rem;">
                <div class="progress-fill" style="width: {{ ($ip1 / 4) * 100 }}%; background: linear-gradient(90deg, var(--primary), var(--secondary));"></div>
            </div>
        </div>
        <div class="card" style="text-align: center;">
            <div style="color: var(--text-muted); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.5rem;">Semester 2 (IP2)</div>
            <div style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, var(--accent), var(--accent2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ $ip2 }}</div>
            <div class="progress-bar" style="margin-top: 1rem;">
                <div class="progress-fill" style="width: {{ ($ip2 / 4) * 100 }}%; background: linear-gradient(90deg, var(--accent), var(--accent2));"></div>
            </div>
        </div>
    </div>

    {{-- Form Input Interaktif --}}
    <div class="card animate-in animate-in-delay-2" style="margin-bottom: 2rem;">
        <div class="section-label">Input Interaktif</div>
        <h2 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Ketik Nilai IP Anda Sendiri</h2>
        <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 1.5rem;">
            Masukkan nilai IP untuk Semester 1 dan Semester 2 (rentang 0.00 &ndash; 4.00). Ketika tombol ditekan, sistem otomatis mengarahkan ke rute Laravel <code>/hitung-ipk/{ip1}/{ip2}</code>.
        </p>

        <form id="form-kalkulator" onsubmit="hitungManual(event)" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) auto; gap: 1rem; align-items: end;">
            <div>
                <label for="input-ip1" style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 0.4rem;">
                    IP Semester 1:
                </label>
                <input type="number" id="input-ip1" step="0.01" min="0" max="4" value="{{ $ip1 }}" required
                       style="width: 100%; padding: 0.75rem 1rem; background: var(--bg-card2); border: 1px solid var(--border); border-radius: 10px; color: var(--text); font-size: 1rem; font-family: 'Space Grotesk', sans-serif;"
                       placeholder="Contoh: 3.50">
            </div>

            <div>
                <label for="input-ip2" style="display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 0.4rem;">
                    IP Semester 2:
                </label>
                <input type="number" id="input-ip2" step="0.01" min="0" max="4" value="{{ $ip2 }}" required
                       style="width: 100%; padding: 0.75rem 1rem; background: var(--bg-card2); border: 1px solid var(--border); border-radius: 10px; color: var(--text); font-size: 1rem; font-family: 'Space Grotesk', sans-serif;"
                       placeholder="Contoh: 3.75">
            </div>

            <div>
                <button type="submit" class="btn btn-primary" id="btn-hitung-manual" style="height: 48px; padding: 0 1.75rem; white-space: nowrap; width: 100%;">
                    ⚡ Hitung Sekarang
                </button>
            </div>
        </form>
    </div>

    {{-- Try Other Values --}}
    <div class="card animate-in animate-in-delay-3" style="margin-bottom: 2rem;">
        <div class="section-label">Coba Sendiri</div>
        <h2 style="font-size: 1.05rem; margin-bottom: 1.25rem;">Hitung IPK Lainnya</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
            @foreach ([
                ['ip1' => 4.00, 'ip2' => 4.00, 'label' => '4.00 + 4.00'],
                ['ip1' => 3.75, 'ip2' => 3.80, 'label' => '3.75 + 3.80'],
                ['ip1' => 3.50, 'ip2' => 3.60, 'label' => '3.50 + 3.60'],
                ['ip1' => 3.00, 'ip2' => 3.25, 'label' => '3.00 + 3.25'],
                ['ip1' => 2.75, 'ip2' => 2.80, 'label' => '2.75 + 2.80'],
            ] as $contoh)
            <a href="{{ route('hitung.ipk', ['ip1' => $contoh['ip1'], 'ip2' => $contoh['ip2']]) }}"
               style="padding: 0.6rem 1.1rem; background: var(--bg-card2); border: 1px solid var(--border); border-radius: 10px; text-decoration: none; color: var(--text); font-size: 0.82rem; font-family: 'Courier New', monospace; transition: all 0.2s ease;"
               onmouseover="this.style.borderColor='rgba(108,99,255,0.4)'; this.style.background='rgba(108,99,255,0.08)'"
               onmouseout="this.style.borderColor='var(--border)'; this.style.background='var(--bg-card2)'"
               id="btn-contoh-{{ $loop->index }}">
                {{ $contoh['label'] }}
            </a>
            @endforeach
        </div>
    </div>

    {{-- Route Code --}}
    <div class="card card-glass">
        <div class="section-label">Laravel</div>
        <h2 style="font-size: 1rem; margin-bottom: 1rem;">Implementasi Kalkulator Route</h2>
        <div class="code-block">
<span class="comment">// routes/web.php — Tantangan 2: Kalkulator IPK</span>
<br>Route::<span class="func">get</span>(<span class="string">'/hitung-ipk/{ip1}/{ip2}'</span>, <span class="keyword">function</span>(<span class="keyword">float</span> $ip1, <span class="keyword">float</span> $ip2) {
<br>&nbsp;&nbsp;&nbsp;&nbsp;$jumlah   = $ip1 + $ip2;
<br>&nbsp;&nbsp;&nbsp;&nbsp;$rataRata = <span class="func">round</span>($jumlah / 2, 2);
<br>
<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="func">view</span>(<span class="string">'kalkulator'</span>, <span class="func">compact</span>(<span class="string">'ip1'</span>, <span class="string">'ip2'</span>, <span class="string">'jumlah'</span>, <span class="string">'rataRata'</span>));
<br>})-><span class="func">name</span>(<span class="string">'hitung.ipk'</span>);
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function hitungManual(e) {
    e.preventDefault();
    const ip1Raw = document.getElementById('input-ip1').value;
    const ip2Raw = document.getElementById('input-ip2').value;
    const ip1 = parseFloat(ip1Raw);
    const ip2 = parseFloat(ip2Raw);

    if (isNaN(ip1) || isNaN(ip2)) {
        alert('Mohon masukkan angka IP yang valid.');
        return;
    }

    if (ip1 < 0 || ip1 > 4 || ip2 < 0 || ip2 > 4) {
        alert('Nilai IP harus berada dalam rentang 0.00 sampai 4.00.');
        return;
    }

    // Arahkan ke rute Laravel: /hitung-ipk/{ip1}/{ip2}
    window.location.href = "{{ url('/hitung-ipk') }}/" + encodeURIComponent(ip1) + "/" + encodeURIComponent(ip2);
}
</script>
@endpush

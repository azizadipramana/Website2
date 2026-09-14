@extends('layouts.app')

@section('title', 'Agentic AI - ' . $tema . ' | ITS')

@section('content')
<div class="animate-in">
    {{-- Route Info --}}
    <div style="margin-bottom: 2rem;">
        <div class="route-pill">
            <span class="method-get">GET</span>
            /agent/@if($temaAsli)<strong>{{ $temaAsli }}</strong>@else<em style="color: var(--text-muted);">(kosong → fallback)</em>@endif
            <span style="color: var(--text-muted); font-family: 'Inter', sans-serif; font-size: 0.72rem;">→ route('agent.ide')</span>
        </div>
        @if(!$temaAsli)
        <div class="alert alert-warning" style="margin-top: 0.75rem; max-width: 640px;">
            <span>⚠️</span>
            <span>Parameter <code>tema</code> tidak diberikan — menggunakan nilai <strong>fallback default</strong>: "{{ $tema }}"</span>
        </div>
        @endif
    </div>

    @if($tema === 'Job-Application-Assistant')
    {{-- ============================================================
         TAMPILAN KHUSUS: JOB APPLICATION ASSISTANT (IDE UTAMA)
         ============================================================ --}}

    {{-- Hero --}}
    <div style="text-align: center; margin-bottom: 3rem;">
        <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, rgba(108,99,255,0.15), rgba(56,249,215,0.1)); border: 1px solid rgba(108,99,255,0.3); border-radius: 30px; padding: 0.4rem 1.1rem; font-size: 0.78rem; font-weight: 600; color: #A09EFF; margin-bottom: 1.5rem; letter-spacing: 0.05em;">
            ✨ IDE TUGAS AKHIR SEMESTER &nbsp;&middot;&nbsp; Aziz Adi Pramana
        </div>
        <div style="font-size: 4rem; margin-bottom: 1rem;">💼</div>
        <div class="section-label" style="justify-content: center;">Agentic AI Platform</div>
        <h1 style="font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 800; margin-bottom: 1.25rem; line-height: 1.2;">
            Job Application<br>
            <span class="gradient-text">Assistant Agent</span>
        </h1>
        <p style="color: var(--text-muted); max-width: 620px; margin: 0 auto 2rem; font-size: 1rem; line-height: 1.8;">
            {{ $deskripsi }}
        </p>
        <a href="{{ route('agent.ide', ['tema' => 'Job-Application-Assistant']) }}" class="btn btn-primary" style="font-size: 0.9rem;" id="btn-jaa-cta">
            🚀 Lihat Platform Ini
        </a>
    </div>

    {{-- Alur Kerja (Pipeline) --}}
    @if($alur)
    <div class="card animate-in animate-in-delay-1" style="margin-bottom: 2rem; padding: 2.5rem;">
        <div class="section-label">Cara Kerja</div>
        <h2 style="font-size: 1.2rem; margin-bottom: 2rem;">Alur Kerja Agent <span style="color: var(--text-muted); font-size: 0.9rem; font-weight: 400;">— End-to-End Pipeline</span></h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1rem;">
            @foreach($alur as $step)
            <div style="display: flex; gap: 1rem; padding: 1.25rem; background: var(--bg-card2); border-radius: 14px; border: 1px solid var(--border); position: relative; overflow: hidden; transition: all 0.25s ease;"
                 onmouseover="this.style.borderColor='rgba(108,99,255,0.45)'; this.style.transform='translateY(-2px)'"
                 onmouseout="this.style.borderColor='var(--border)'; this.style.transform='translateY(0)'">
                {{-- Glow Number --}}
                <div style="position: absolute; top: -10px; right: -8px; font-size: 4.5rem; font-weight: 900; color: rgba(108,99,255,0.06); line-height: 1; font-family: 'Space Grotesk', sans-serif; pointer-events: none;">
                    {{ $step['step'] }}
                </div>
                {{-- Icon --}}
                <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, rgba(108,99,255,0.2), rgba(56,249,215,0.1)); display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0;">
                    {{ $step['icon'] }}
                </div>
                {{-- Text --}}
                <div style="flex: 1; min-width: 0;">
                    <div style="font-weight: 700; font-size: 0.88rem; margin-bottom: 0.3rem; color: var(--text);">
                        <span style="color: var(--text-muted); font-size: 0.7rem; font-family: 'Courier New', monospace;">{{ $step['step'] }}</span>
                        &nbsp;{{ $step['judul'] }}
                    </div>
                    <div style="font-size: 0.78rem; color: var(--text-muted); line-height: 1.5;">{{ $step['detail'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Human-in-the-Loop highlight --}}
        <div style="margin-top: 1.5rem; padding: 1rem 1.25rem; background: linear-gradient(135deg, rgba(67,233,123,0.08), rgba(56,249,215,0.05)); border: 1px solid rgba(67,233,123,0.25); border-radius: 12px; display: flex; align-items: center; gap: 0.75rem;">
            <span style="font-size: 1.5rem;">🧑‍💻</span>
            <div>
                <div style="font-weight: 700; font-size: 0.88rem; color: #43E97B; margin-bottom: 0.2rem;">Human-in-the-Loop</div>
                <div style="font-size: 0.8rem; color: var(--text-muted);">Pengguna selalu memiliki kontrol penuh — evaluasi, edit, lalu tekan <strong style="color: var(--text);">Run ▶</strong> untuk melanjutkan proses lamaran secara otomatis.</div>
            </div>
        </div>
    </div>
    @endif

    {{-- Feature Cards --}}
    <div class="animate-in animate-in-delay-2" style="margin-bottom: 2rem;">
        <div style="margin-bottom: 1.25rem;">
            <div class="section-label">Fitur Utama</div>
            <h2 style="font-size: 1.1rem;">Kemampuan Platform</h2>
        </div>
        <div class="grid-3">
            @foreach ($fitur as $f)
            <div class="card" style="padding: 1.5rem;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, rgba(108,99,255,0.15), rgba(56,249,215,0.08)); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 1rem;">{{ $f['icon'] }}</div>
                <h3 style="font-size: 0.9rem; margin-bottom: 0.5rem; font-weight: 700;">{{ $f['nama'] }}</h3>
                <p style="color: var(--text-muted); font-size: 0.8rem; line-height: 1.65;">{{ $f['deskripsi'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Match Score Mock UI --}}
    <div class="card animate-in animate-in-delay-3" style="margin-bottom: 2rem;">
        <div class="section-label">Preview</div>
        <h2 style="font-size: 1.1rem; margin-bottom: 1.5rem;">Contoh Hasil Analisis Kecocokan</h2>

        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
            @foreach ([
                ['posisi' => 'Backend Engineer — Gojek', 'match' => 92, 'skill' => 'Python, FastAPI, PostgreSQL', 'color' => '#43E97B'],
                ['posisi' => 'AI Engineer — Tokopedia', 'match' => 87, 'skill' => 'LangChain, OpenAI, Python', 'color' => '#38F9D7'],
                ['posisi' => 'Full-Stack Developer — Traveloka', 'match' => 79, 'skill' => 'Laravel, Vue.js, MySQL', 'color' => '#6C63FF'],
                ['posisi' => 'Data Engineer — Shopee', 'match' => 65, 'skill' => 'Python, Spark, Hadoop', 'color' => '#FFC107'],
            ] as $job)
            <div style="padding: 1rem 1.25rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.6rem; gap: 0.75rem; flex-wrap: wrap;">
                    <div>
                        <div style="font-weight: 600; font-size: 0.88rem;">{{ $job['posisi'] }}</div>
                        <div style="font-size: 0.72rem; color: var(--text-muted); margin-top: 0.2rem;">🔧 {{ $job['skill'] }}</div>
                    </div>
                    <div style="font-size: 1.4rem; font-weight: 800; color: {{ $job['color'] }}; font-family: 'Space Grotesk', sans-serif; flex-shrink: 0;">
                        {{ $job['match'] }}%
                    </div>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $job['match'] }}%; background: linear-gradient(90deg, {{ $job['color'] }}, rgba(255,255,255,0.3));"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
    {{-- ============================================================
         TAMPILAN GENERIK untuk tema lain
         ============================================================ --}}
    {{-- Hero --}}
    <div style="text-align: center; margin-bottom: 3rem;">
        <div style="font-size: 4rem; margin-bottom: 1rem;">🤖</div>
        <div class="section-label" style="justify-content: center;">Ide Tugas Akhir Semester</div>
        <h1 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 800; margin-bottom: 1rem; line-height: 1.2;">
            Platform Agentic AI<br>
            <span class="gradient-text">{{ str_replace('-', ' ', $tema) }}</span>
        </h1>
        <p style="color: var(--text-muted); max-width: 580px; margin: 0 auto 2rem; font-size: 1rem; line-height: 1.7;">
            {{ $deskripsi }}
        </p>
        <a href="{{ route('agent.ide', ['tema' => 'Job-Application-Assistant']) }}" class="btn btn-primary" style="font-size: 0.95rem; box-shadow: 0 4px 15px rgba(108,99,255,0.3);">
            ✨ Lihat Proposed Ide Utama
        </a>
    </div>

    {{-- Feature Cards --}}
    <div class="grid-3 animate-in animate-in-delay-1" style="margin-bottom: 2rem;">
        @foreach ($fitur as $f)
        <div class="card" style="padding: 1.5rem;">
            <div style="font-size: 2rem; margin-bottom: 0.75rem;">{{ $f['icon'] }}</div>
            <h3 style="font-size: 0.95rem; margin-bottom: 0.5rem;">{{ $f['nama'] }}</h3>
            <p style="color: var(--text-muted); font-size: 0.82rem; line-height: 1.6;">{{ $f['deskripsi'] }}</p>
        </div>
        @endforeach
    </div>
    @endif

    {{-- Tech Stack --}}
    <div class="card animate-in animate-in-delay-{{ $tema === 'Job-Application-Assistant' ? '4' : '2' }}" style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.5rem;">
            <div>
                <div class="section-label">Arsitektur</div>
                <h2 style="font-size: 1.1rem;">Technology Stack</h2>
            </div>
            <span class="badge badge-success"><span class="glow-dot"></span> Aktif Dikembangkan</span>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 0.75rem;">
            @foreach ($techStack as $tech)
            <div style="padding: 0.875rem; background: var(--bg-card2); border-radius: 12px; border: 1px solid var(--border); text-align: center; transition: all 0.2s ease; cursor: default;"
                 onmouseover="this.style.borderColor='rgba(108,99,255,0.4)'; this.style.background='rgba(108,99,255,0.06)'"
                 onmouseout="this.style.borderColor='var(--border)'; this.style.background='var(--bg-card2)'">
                <div style="font-size: 1.5rem; margin-bottom: 0.4rem;">{{ $tech['icon'] }}</div>
                <div style="font-size: 0.78rem; font-weight: 600; color: var(--text);">{{ $tech['nama'] }}</div>
                <div style="font-size: 0.68rem; color: var(--text-muted); margin-top: 0.2rem;">{{ $tech['kategori'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Explore other themes --}}
    <div class="card card-glass animate-in animate-in-delay-{{ $tema === 'Job-Application-Assistant' ? '5' : '3' }}" style="margin-bottom: 2rem;">
        <div class="section-label">Jelajahi</div>
        <h2 style="font-size: 1.05rem; margin-bottom: 1.25rem;">Tema Platform Lainnya</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
            @foreach ($temaLain as $t)
            @if($t['slug'] !== $tema)
            <a href="{{ route('agent.ide', ['tema' => $t['slug']]) }}"
               style="display: flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1rem; background: {{ $t['slug'] === 'Job-Application-Assistant' ? 'rgba(108,99,255,0.12)' : 'var(--bg-card2)' }}; border: 1px solid {{ $t['slug'] === 'Job-Application-Assistant' ? 'rgba(108,99,255,0.4)' : 'var(--border)' }}; border-radius: 10px; text-decoration: none; color: var(--text); font-size: 0.85rem; transition: all 0.2s ease;"
               onmouseover="this.style.borderColor='rgba(108,99,255,0.5)'; this.style.background='rgba(108,99,255,0.12)'"
               onmouseout="this.style.borderColor='{{ $t['slug'] === 'Job-Application-Assistant' ? 'rgba(108,99,255,0.4)' : 'var(--border)' }}'; this.style.background='{{ $t['slug'] === 'Job-Application-Assistant' ? 'rgba(108,99,255,0.12)' : 'var(--bg-card2)' }}'"
               id="btn-tema-{{ $loop->index }}">
                {{ $t['icon'] }} {{ $t['nama'] }}
                @if($t['slug'] === 'Job-Application-Assistant')
                <span style="font-size: 0.65rem; background: rgba(108,99,255,0.2); color: #A09EFF; border-radius: 4px; padding: 0.1rem 0.4rem; font-weight: 700; letter-spacing: 0.05em;">IDE SAYA</span>
                @endif
            </a>
            @endif
            @endforeach
            <a href="{{ route('agent.ide') }}"
               style="display: flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1rem; background: rgba(108,99,255,0.08); border: 1px solid rgba(108,99,255,0.25); border-radius: 10px; text-decoration: none; color: #A09EFF; font-size: 0.85rem;"
               id="btn-tema-default">
                🔄 Default (Tanpa Tema)
            </a>
        </div>
    </div>

    {{-- Route Code --}}
    <div class="card card-glass">
        <div class="section-label">Laravel</div>
        <h2 style="font-size: 1rem; margin-bottom: 1rem;">Implementasi Parameter Opsional</h2>
        <div class="code-block">
<span class="comment">// routes/web.php — Rute 3: Parameter Opsional dengan Fallback</span>
<br>Route::<span class="func">get</span>(<span class="string">'/agent/{tema?}'</span>, <span class="keyword">function</span>(<span class="keyword">string</span> $tema = <span class="string">'Job-Application-Assistant'</span>) {
<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// Jika tema kosong → pakai nilai default fallback</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="func">view</span>(<span class="string">'agent'</span>, compact(<span class="string">'tema'</span>));
<br>})-><span class="func">name</span>(<span class="string">'agent.ide'</span>);
<br>
<br><span class="comment">// Contoh penggunaan named route:</span>
<br><span class="func">route</span>(<span class="string">'agent.ide'</span>)                                        <span class="comment">// → /agent (fallback default)</span>
<br><span class="func">route</span>(<span class="string">'agent.ide'</span>, [<span class="string">'tema'</span> => <span class="string">'Job-Application-Assistant'</span>]) <span class="comment">// → /agent/Job-Application-Assistant</span>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profil Akademis Mahasiswa ITS - Sistem Informasi Agentic AI">
    <title>@yield('title', 'Profil Akademis ITS')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C63FF;
            --primary-dark: #4C46CC;
            --secondary: #FF6584;
            --accent: #43E97B;
            --accent2: #38F9D7;
            --bg: #0A0B14;
            --bg-card: #12131F;
            --bg-card2: #1A1B2E;
            --text: #E8E8F0;
            --text-muted: #8888AA;
            --border: rgba(108,99,255,0.25);
            --glow: rgba(108,99,255,0.4);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }
        body::before {
            content: '';
            position: fixed;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(ellipse at 20% 20%, rgba(108,99,255,0.08) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 80%, rgba(255,101,132,0.06) 0%, transparent 50%),
                        radial-gradient(ellipse at 50% 50%, rgba(67,233,123,0.04) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
            animation: bgFloat 20s ease-in-out infinite alternate;
        }
        @keyframes bgFloat {
            0% { transform: translate(0,0) rotate(0deg); }
            100% { transform: translate(2%,2%) rotate(1deg); }
        }
        nav {
            position: sticky; top: 0; z-index: 100;
            background: rgba(10,11,20,0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
        }
        .nav-inner {
            max-width: 1200px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            height: 64px;
        }
        .nav-logo {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700; font-size: 1.2rem;
            background: linear-gradient(135deg, var(--primary), var(--accent2));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text; text-decoration: none;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .nav-links { display: flex; align-items: center; gap: 0.25rem; list-style: none; }
        .nav-links a {
            color: var(--text-muted); text-decoration: none;
            font-size: 0.875rem; font-weight: 500;
            padding: 0.5rem 0.875rem; border-radius: 8px;
            transition: all 0.2s ease; border: 1px solid transparent;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--text); background: rgba(108,99,255,0.12);
            border-color: var(--border);
        }
        main {
            position: relative; z-index: 1;
            max-width: 1200px; margin: 0 auto;
            padding: 3rem 2rem; min-height: calc(100vh - 64px - 80px);
        }
        .card {
            background: var(--bg-card); border: 1px solid var(--border);
            border-radius: 20px; padding: 2rem; position: relative; overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 1px; background: linear-gradient(90deg, transparent, var(--primary), transparent);
            opacity: 0; transition: opacity 0.3s ease;
        }
        .card:hover { transform: translateY(-4px); box-shadow: 0 20px 60px rgba(108,99,255,0.15); border-color: rgba(108,99,255,0.4); }
        .card:hover::before { opacity: 1; }
        .card-glass { background: rgba(18,19,31,0.6); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }
        .badge {
            display: inline-flex; align-items: center; gap: 0.35rem;
            padding: 0.3rem 0.75rem; border-radius: 20px;
            font-size: 0.75rem; font-weight: 600; letter-spacing: 0.03em;
        }
        .badge-primary { background: rgba(108,99,255,0.15); color: #A09EFF; border: 1px solid rgba(108,99,255,0.3); }
        .badge-success { background: rgba(67,233,123,0.1); color: #43E97B; border: 1px solid rgba(67,233,123,0.25); }
        .badge-danger { background: rgba(255,101,132,0.1); color: #FF6584; border: 1px solid rgba(255,101,132,0.25); }
        .badge-info { background: rgba(56,249,215,0.1); color: #38F9D7; border: 1px solid rgba(56,249,215,0.25); }
        .btn {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.625rem 1.375rem; border-radius: 10px;
            font-weight: 600; font-size: 0.875rem; text-decoration: none;
            transition: all 0.25s ease; border: none; cursor: pointer;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white; box-shadow: 0 4px 15px rgba(108,99,255,0.3);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(108,99,255,0.45); }
        .btn-outline {
            background: transparent; color: var(--primary);
            border: 1px solid rgba(108,99,255,0.4);
        }
        .btn-outline:hover { background: rgba(108,99,255,0.1); border-color: var(--primary); }
        .section-label {
            font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;
            text-transform: uppercase; color: var(--primary); margin-bottom: 0.5rem;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .section-label::before { content: ''; display: block; width: 20px; height: 2px; background: var(--primary); border-radius: 1px; }
        h1, h2, h3 { font-family: 'Space Grotesk', sans-serif; }
        .gradient-text { background: linear-gradient(135deg, var(--primary), var(--accent2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .divider { height: 1px; background: linear-gradient(90deg, transparent, var(--border), transparent); margin: 2rem 0; }
        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
        @media (max-width: 768px) { .grid-2, .grid-3 { grid-template-columns: 1fr; } main { padding: 2rem 1rem; } }
        .stat-box { text-align: center; padding: 1.25rem; background: var(--bg-card2); border-radius: 14px; border: 1px solid var(--border); }
        .stat-value { font-family: 'Space Grotesk', sans-serif; font-size: 2rem; font-weight: 700; background: linear-gradient(135deg, var(--primary), var(--accent2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; display: block; }
        .stat-label { font-size: 0.75rem; color: var(--text-muted); font-weight: 500; margin-top: 0.25rem; }
        .timeline { position: relative; padding-left: 1.5rem; }
        .timeline::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--primary), transparent); border-radius: 1px; }
        .timeline-item { position: relative; padding: 0 0 2rem 1.5rem; }
        .timeline-item::before { content: ''; position: absolute; left: -1.5rem; top: 0.35rem; width: 10px; height: 10px; border-radius: 50%; background: var(--primary); box-shadow: 0 0 10px var(--glow); transform: translateX(-4px); }
        .alert { padding: 1rem 1.25rem; border-radius: 12px; display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.9rem; }
        .alert-info { background: rgba(108,99,255,0.1); border: 1px solid rgba(108,99,255,0.25); color: #B0AEFF; }
        .alert-success { background: rgba(67,233,123,0.08); border: 1px solid rgba(67,233,123,0.2); color: #43E97B; }
        .alert-warning { background: rgba(255,193,7,0.08); border: 1px solid rgba(255,193,7,0.2); color: #FFC107; }
        .progress-bar { height: 6px; background: var(--bg-card2); border-radius: 3px; overflow: hidden; margin-top: 0.5rem; }
        .progress-fill { height: 100%; border-radius: 3px; background: linear-gradient(90deg, var(--primary), var(--accent2)); }
        footer { position: relative; z-index: 1; text-align: center; padding: 1.5rem 2rem; border-top: 1px solid var(--border); color: var(--text-muted); font-size: 0.8rem; }
        footer a { color: var(--primary); text-decoration: none; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulse { 0%, 100% { box-shadow: 0 0 0 0 var(--glow); } 50% { box-shadow: 0 0 0 8px transparent; } }
        .animate-in { animation: fadeInUp 0.6s ease forwards; }
        .animate-in-delay-1 { animation-delay: 0.1s; opacity: 0; }
        .animate-in-delay-2 { animation-delay: 0.2s; opacity: 0; }
        .animate-in-delay-3 { animation-delay: 0.3s; opacity: 0; }
        .animate-in-delay-4 { animation-delay: 0.4s; opacity: 0; }
        .glow-dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 8px var(--accent); animation: pulse 2s infinite; }
        .code-block { background: #0D0E1A; border: 1px solid rgba(108,99,255,0.2); border-radius: 12px; padding: 1rem 1.25rem; font-family: 'Courier New', monospace; font-size: 0.85rem; color: #A09EFF; overflow-x: auto; line-height: 1.7; }
        .code-block .keyword { color: #FF6584; }
        .code-block .string { color: #43E97B; }
        .code-block .comment { color: #4A4A6A; }
        .code-block .func { color: #38F9D7; }
        .tag { display: inline-block; padding: 0.2rem 0.6rem; background: var(--bg-card2); border: 1px solid var(--border); border-radius: 6px; font-size: 0.72rem; color: var(--text-muted); font-weight: 500; }
        .page-hero { text-align: center; margin-bottom: 3rem; }
        .page-hero h1 { font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 800; line-height: 1.15; margin-bottom: 1rem; }
        .page-hero p { font-size: 1.1rem; color: var(--text-muted); max-width: 600px; margin: 0 auto; }
        .route-pill { display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(108,99,255,0.08); border: 1px solid rgba(108,99,255,0.2); border-radius: 8px; padding: 0.4rem 0.85rem; font-family: 'Courier New', monospace; font-size: 0.8rem; color: #A09EFF; margin-bottom: 1rem; }
        .method-get { background: rgba(67,233,123,0.12); color: #43E97B; border: 1px solid rgba(67,233,123,0.25); border-radius: 4px; padding: 0.15rem 0.4rem; font-size: 0.65rem; font-weight: 700; font-family: 'Inter', sans-serif; letter-spacing: 0.05em; }
    </style>
    @stack('styles')
</head>
<body>
    <nav>
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="nav-logo">
                🎓 ITS Academic
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" id="nav-home">Home</a></li>
                <li><a href="{{ route('mahasiswa.profil', ['nrp' => '5025241195']) }}" class="{{ request()->routeIs('mahasiswa.profil') ? 'active' : '' }}" id="nav-profil">Profil</a></li>
                <li><a href="{{ route('agent.ide', ['tema' => 'Job-Application-Assistant']) }}" class="{{ request()->routeIs('agent.*') ? 'active' : '' }}" id="nav-agent">🤖 Agentic AI</a></li>
                <li><a href="{{ route('dashboard.home') }}" class="{{ request()->routeIs('dashboard.*') ? 'active' : '' }}" id="nav-dashboard">Dashboard</a></li>
                <li><a href="{{ route('hitung.ipk', ['ip1' => '3.75', 'ip2' => '3.80']) }}" class="{{ request()->routeIs('hitung.ipk') ? 'active' : '' }}" id="nav-kalkulator">Kalkulator IPK</a></li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>
            ⚡ Dibangun dengan <strong>Laravel</strong> &nbsp;&middot;&nbsp;
            <span class="glow-dot"></span> &nbsp;
            Kampus ITS Sukolilo, Surabaya &nbsp;&middot;&nbsp;
            <a href="{{ route('home') }}">Kembali ke Home</a>
        </p>
    </footer>

    @stack('scripts')
</body>
</html>

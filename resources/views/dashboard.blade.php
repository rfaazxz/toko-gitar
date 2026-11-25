<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Fret Factory</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap">
    <style>
        :root {
            --ink: #0e0c09;
            --paper: #f5f0e8;
            --amber: #c8862a;
            --amber-warm: #e09a30;
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'DM Sans', system-ui, sans-serif;
            --font-mono: 'DM Mono', monospace;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: var(--font-body);
            background: #0e0c09;
            color: #f5f0e8;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            background-image:
                radial-gradient(circle at 85% 10%, rgba(200,134,42,0.09) 0%, transparent 45%),
                linear-gradient(180deg, #141009 0%, #0e0c09 45%, #090705 100%);
        }

        /* NAVBAR */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 clamp(1.5rem, 5vw, 4rem);
            height: 72px;
            background: rgba(14,12,9,0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(200,134,42,0.12);
        }
        .logo {
            display: flex;
            align-items: baseline;
            gap: 0.5rem;
            text-decoration: none;
        }
        .logo-mark {
            font-family: var(--font-display);
            font-weight: 900;
            font-size: 1.45rem;
            color: #f5f0e8;
            letter-spacing: -0.02em;
        }
        .logo-mark em { font-style: italic; color: var(--amber); }
        .logo-tagline {
            font-family: var(--font-mono);
            font-size: 0.58rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(200,134,42,0.7);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.75rem;
            list-style: none;
        }
        @media (max-width: 700px) { .nav-links { display: none; } }
        .nav-links a {
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(245,240,232,0.55);
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active { color: var(--amber); }

        .nav-actions { display: flex; align-items: center; gap: 0.75rem; }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.65rem 1.3rem;
            border-radius: 2px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .btn-amber { background: var(--amber); color: #0e0c09; }
        .btn-amber:hover { background: var(--amber-warm); transform: translateY(-1px); }
        .btn-ghost {
            background: transparent;
            color: rgba(245,240,232,0.72);
            border: 1px solid rgba(245,240,232,0.14);
        }
        .btn-ghost:hover {
            color: #f5f0e8;
            border-color: rgba(200,134,42,0.45);
            background: rgba(200,134,42,0.05);
        }
        .btn-danger {
            background: rgba(239,68,68,0.1);
            color: #f87171;
            border: 1px solid rgba(239,68,68,0.25);
        }
        .btn-danger:hover {
            background: rgba(239,68,68,0.2);
            border-color: rgba(239,68,68,0.45);
        }

        /* PAGE CONTAINER */
        .page {
            max-width: 1120px;
            margin: 0 auto;
            padding: clamp(2.25rem, 6vw, 4rem) clamp(1.25rem, 4vw, 2.5rem) 5rem;
        }

        /* HEADER */
        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 1.5rem;
            padding-bottom: 1.75rem;
            border-bottom: 1px solid rgba(200,134,42,0.14);
            margin-bottom: 2.25rem;
            flex-wrap: wrap;
        }
        .eyebrow {
            font-family: var(--font-mono);
            font-size: 0.62rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--amber);
            display: flex;
            align-items: center;
            gap: 0.65rem;
            margin-bottom: 0.5rem;
        }
        .eyebrow::before {
            content: "";
            width: 1.6rem;
            height: 1px;
            background: rgba(200,134,42,0.65);
        }
        .page-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4.5vw, 3rem);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -0.025em;
            color: #f5f0e8;
        }
        .page-title em { font-style: italic; color: var(--amber); }

        .role-pill {
            font-family: var(--font-mono);
            font-size: 0.62rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--amber);
            background: rgba(200,134,42,0.08);
            border: 1px solid rgba(200,134,42,0.28);
            padding: 0.45rem 0.85rem;
            border-radius: 2px;
        }

        /* STATS STRIP */
        @php
            $hasProdukModel = class_exists(\App\Models\Produk::class);
            $produkList     = $hasProdukModel ? \App\Models\Produk::all() : collect();
            $totalProduk    = $produkList->count();
            $totalStok      = $produkList->sum('stok');
            $totalNilai     = $produkList->sum(fn($p) => ($p->harga ?? 0) * ($p->stok ?? 0));
        @endphp
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-num">{{ $totalProduk }}</div>
                <div class="stat-label">Total Instrumen</div>
            </div>
            <div class="stat-card">
                <div class="stat-num">{{ number_format($totalStok, 0, ',', '.') }}</div>
                <div class="stat-label">Unit Tersedia</div>
            </div>
            <div class="stat-card">
                <div class="stat-num money">Rp {{ number_format($totalNilai, 0, ',', '.') }}</div>
                <div class="stat-label">Estimasi Nilai Stok</div>
            </div>
        </div>

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.5px;
            background: rgba(200,134,42,0.14);
            border: 1px solid rgba(200,134,42,0.14);
            margin-bottom: 2.25rem;
        }
        @media (max-width: 680px) { .stats-grid { grid-template-columns: 1fr; } }
        .stat-card {
            background: #120e08;
            padding: 1.35rem 1.5rem;
        }
        .stat-num {
            font-family: var(--font-display);
            font-size: 1.85rem;
            font-weight: 700;
            color: #f5f0e8;
            line-height: 1.15;
            font-variant-numeric: tabular-nums;
        }
        .stat-num.money { font-size: 1.35rem; color: var(--amber-warm); padding-top: 0.25rem; }
        .stat-label {
            font-family: var(--font-mono);
            font-size: 0.6rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(245,240,232,0.45);
            margin-top: 0.35rem;
        }

        /* MAIN PANEL */
        .panel-grid {
            display: grid;
            grid-template-columns: 1.25fr 0.95fr;
            gap: 1.5rem;
            align-items: start;
        }
        @media (max-width: 820px) { .panel-grid { grid-template-columns: 1fr; } }

        .card {
            background: #141009;
            border: 1px solid rgba(200,134,42,0.18);
            border-radius: 2px;
            padding: 1.85rem;
        }
        .card-head {
            font-family: var(--font-mono);
            font-size: 0.62rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--amber);
            margin-bottom: 1.15rem;
        }
        .welcome-heading {
            font-family: var(--font-display);
            font-size: 1.55rem;
            font-weight: 700;
            color: #f5f0e8;
            margin-bottom: 0.5rem;
        }
        .welcome-heading span { color: var(--amber-warm); font-style: italic; }
        .welcome-desc {
            font-size: 0.88rem;
            line-height: 1.65;
            color: rgba(245,240,232,0.62);
            margin-bottom: 1.5rem;
        }

        .info-box {
            background: rgba(245,240,232,0.025);
            border: 1px solid rgba(200,134,42,0.14);
            border-radius: 2px;
            padding: 1.1rem 1.25rem;
            display: grid;
            gap: 0.75rem;
            margin-bottom: 1.65rem;
        }
        .info-row {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }
        .info-key {
            font-family: var(--font-mono);
            font-size: 0.58rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(245,240,232,0.42);
        }
        .info-val {
            font-size: 0.92rem;
            font-weight: 500;
            color: #f5f0e8;
        }

        .action-row {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            flex-wrap: wrap;
        }

        .shortcut-list {
            display: grid;
            gap: 0.85rem;
        }
        .shortcut-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 1.15rem;
            background: rgba(245,240,232,0.02);
            border: 1px solid rgba(200,134,42,0.13);
            border-radius: 2px;
            text-decoration: none;
            color: #f5f0e8;
            transition: all 0.2s;
        }
        .shortcut-link:hover {
            border-color: rgba(200,134,42,0.45);
            background: rgba(200,134,42,0.05);
            transform: translateX(2px);
        }
        .shortcut-title { font-size: 0.88rem; font-weight: 600; color: #f5f0e8; }
        .shortcut-sub { font-size: 0.74rem; color: rgba(245,240,232,0.48); margin-top: 0.15rem; }
        .shortcut-arrow { font-family: var(--font-mono); color: var(--amber); font-size: 0.9rem; }

        /* FOOTER */
        .footer {
            background: #080604;
            border-top: 1px solid rgba(200,134,42,0.08);
            padding: 2rem clamp(1.5rem, 5vw, 4rem);
            margin-top: auto;
        }
        .footer-inner {
            max-width: 1120px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .footer-brand { font-family: var(--font-display); font-weight: 900; color: rgba(245,240,232,0.65); }
        .footer-brand em { font-style: italic; color: var(--amber); }
        .footer-copy { font-size: 0.72rem; color: rgba(245,240,232,0.28); }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ url('/') }}" class="logo">
        <span class="logo-mark">Fret<em>Factory</em></span>
        <span class="logo-tagline">Est. 2024</span>
    </a>

    <ul class="nav-links">
        <li><a href="{{ url('/') }}">Beranda</a></li>
        <li><a href="{{ url('/#katalog') }}">Katalog</a></li>
        <li><a href="{{ route('dashboard') }}" class="active">Dashboard</a></li>
        <li><a href="{{ route('produk.index') }}">Kelola Produk</a></li>
    </ul>

    <div class="nav-actions">
        <a href="{{ url('/#katalog') }}" class="btn btn-ghost">Lihat Toko</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav>

<main class="page">
    <div class="page-header">
        <div>
            <div class="eyebrow">Control Room · PPLG Store</div>
            <h1 class="page-title">Dashboard <em>Fret Factory</em></h1>
        </div>
        <span class="role-pill">Akun Terautentikasi</span>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-num">{{ $totalProduk }}</div>
            <div class="stat-label">Total Instrumen</div>
        </div>
        <div class="stat-card">
            <div class="stat-num">{{ number_format($totalStok, 0, ',', '.') }}</div>
            <div class="stat-label">Unit Tersedia</div>
        </div>
        <div class="stat-card">
            <div class="stat-num money">Rp {{ number_format($totalNilai, 0, ',', '.') }}</div>
            <div class="stat-label">Estimasi Nilai Stok</div>
        </div>
    </div>

    <div class="panel-grid">
        <section class="card">
            <div class="card-head">Profil Pengguna</div>
            <h2 class="welcome-heading">Selamat datang, <span>{{ Auth::user()->name }}</span></h2>
            <p class="welcome-desc">
                Kelola katalog instrumen, pantau stok gitar dan perlengkapan, atau cek tampilan etalase publik Fret Factory.
            </p>

            <div class="info-box">
                <div class="info-row">
                    <span class="info-key">Nama Lengkap</span>
                    <span class="info-val">{{ Auth::user()->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-key">Alamat Email</span>
                    <span class="info-val">{{ Auth::user()->email }}</span>
                </div>
            </div>

            <div class="action-row">
                <a href="{{ route('produk.index') }}" class="btn btn-amber">
                    Kelola Produk →
                </a>

                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>
                </form>
            </div>
        </section>

        <aside class="card">
            <div class="card-head">Akses Cepat</div>
            <div class="shortcut-list">
                <a href="{{ route('produk.index') }}" class="shortcut-link">
                    <div>
                        <div class="shortcut-title">Daftar & Kelola Produk</div>
                        <div class="shortcut-sub">Tambah, edit, atau hapus instrumen di katalog</div>
                    </div>
                    <span class="shortcut-arrow">→</span>
                </a>

                <a href="{{ route('produk.create') }}" class="shortcut-link">
                    <div>
                        <div class="shortcut-title">Tambah Produk Baru</div>
                        <div class="shortcut-sub">Input gitar elektrik, akustik, bass, atau aksesoris</div>
                    </div>
                    <span class="shortcut-arrow">+</span>
                </a>

                <a href="{{ url('/#katalog') }}" class="shortcut-link">
                    <div>
                        <div class="shortcut-title">Etalase Beranda & Katalog</div>
                        <div class="shortcut-sub">Lihat tampilan publik, pop-up spek, dan checkout dummy</div>
                    </div>
                    <span class="shortcut-arrow">↗</span>
                </a>
            </div>
        </aside>
    </div>
</main>

<footer class="footer">
    <div class="footer-inner">
        <span class="footer-brand">Fret<em>Factory</em></span>
        <span class="footer-copy">© {{ date('Y') }} Fret Factory · PPLG Store</span>
    </div>
</footer>

</body>
</html>
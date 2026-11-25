<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk — Fret Factory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap">
    <style>
        :root {
            --ink: #0e0c09;
            --paper: #f5f0e8;
            --amber: #c8862a;
            --amber-warm: #e09a30;
            --muted: #8c7e68;
            --card-bg: #191510;
            --card-border: rgba(200,134,42,0.15);
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
        }

        /* NAV */
        .navbar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2.5rem; height: 68px;
            background: rgba(14,12,9,0.95);
            border-bottom: 1px solid rgba(200,134,42,0.12);
            position: sticky; top: 0; z-index: 50;
        }
        .logo { font-family: var(--font-display); font-weight: 900; font-size: 1.3rem; color: #f5f0e8; text-decoration: none; letter-spacing: -0.02em; }
        .logo em { font-style: italic; color: var(--amber); }
        .nav-right { display: flex; align-items: center; gap: 1rem; }
        .nav-link { font-size: 0.75rem; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(245,240,232,0.5); text-decoration: none; transition: color 0.2s; }
        .nav-link:hover { color: #f5f0e8; }
        .btn { display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; padding: 0.5rem 1.1rem; border-radius: 2px; border: none; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .btn-amber { background: var(--amber); color: #0e0c09; }
        .btn-amber:hover { background: var(--amber-warm); }
        .btn-ghost { background: transparent; color: rgba(245,240,232,0.5); border: 1px solid rgba(245,240,232,0.12); }
        .btn-ghost:hover { color: #f5f0e8; border-color: rgba(245,240,232,0.3); }
        .btn-danger { background: rgba(239,68,68,0.1); color: #f87171; border: 1px solid rgba(239,68,68,0.2); }
        .btn-danger:hover { background: rgba(239,68,68,0.2); }

        /* LAYOUT */
        .page { max-width: 1200px; margin: 0 auto; padding: 2.5rem 2rem; }

        /* PAGE HEADER */
        .page-header { display: flex; align-items: flex-end; justify-content: space-between; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap; }
        .page-eyebrow { font-family: var(--font-mono); font-size: 0.6rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--amber); opacity: 0.8; margin-bottom: 0.4rem; }
        .page-title { font-family: var(--font-display); font-size: 2rem; font-weight: 700; letter-spacing: -0.02em; color: #f5f0e8; }

        /* ALERT */
        .alert { padding: 0.9rem 1.25rem; border-radius: 2px; font-size: 0.8rem; font-weight: 500; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.6rem; }
        .alert-success { background: rgba(74,222,128,0.08); border: 1px solid rgba(74,222,128,0.2); color: #4ade80; }
        .alert-error   { background: rgba(239,68,68,0.08);  border: 1px solid rgba(239,68,68,0.2);  color: #f87171; }

        /* TABLE */
        .table-wrap { border: 1px solid rgba(200,134,42,0.1); border-radius: 2px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        thead { background: rgba(200,134,42,0.06); border-bottom: 1px solid rgba(200,134,42,0.12); }
        thead th { font-family: var(--font-mono); font-size: 0.6rem; letter-spacing: 0.16em; text-transform: uppercase; color: rgba(200,134,42,0.7); padding: 0.9rem 1.25rem; text-align: left; font-weight: 500; }
        tbody tr { border-bottom: 1px solid rgba(245,240,232,0.04); transition: background 0.15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(200,134,42,0.04); }
        tbody td { padding: 1rem 1.25rem; font-size: 0.85rem; color: rgba(245,240,232,0.75); vertical-align: middle; }
        .td-name { font-family: var(--font-display); font-size: 0.95rem; font-weight: 700; color: #f5f0e8; }
        .td-price { font-variant-numeric: tabular-nums; color: var(--amber); font-weight: 600; }
        .badge { display: inline-block; font-family: var(--font-mono); font-size: 0.58rem; letter-spacing: 0.12em; text-transform: uppercase; padding: 0.25rem 0.6rem; border-radius: 1px; background: rgba(200,134,42,0.1); color: rgba(200,134,42,0.9); border: 1px solid rgba(200,134,42,0.2); }
        .stock-ok  { color: #4ade80; }
        .stock-low { color: #fbbf24; }
        .stock-out { color: #f87171; }

        .td-foto img { width: 48px; height: 48px; object-fit: cover; border-radius: 2px; border: 1px solid rgba(200,134,42,0.15); }
        .td-foto .no-foto { width: 48px; height: 48px; background: rgba(200,134,42,0.06); border: 1px solid rgba(200,134,42,0.1); border-radius: 2px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; opacity: 0.4; }

        .actions { display: flex; gap: 0.5rem; }

        /* EMPTY */
        .empty { padding: 5rem 2rem; text-align: center; }
        .empty-icon { font-size: 2.5rem; opacity: 0.15; display: block; margin-bottom: 1rem; }
        .empty-title { font-family: var(--font-display); font-size: 1.3rem; font-weight: 700; color: rgba(245,240,232,0.4); margin-bottom: 0.5rem; }
        .empty-sub { font-size: 0.8rem; color: rgba(245,240,232,0.2); margin-bottom: 1.5rem; }

        /* STATS */
        .stats-row { display: flex; gap: 1px; background: rgba(200,134,42,0.08); border: 1px solid rgba(200,134,42,0.08); border-radius: 2px; margin-bottom: 2rem; overflow: hidden; }
        .stat-box { flex: 1; background: #0e0c09; padding: 1.25rem 1.5rem; min-width: 0; }
        .stat-box-num { font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: #f5f0e8; }
        .stat-box-label { font-family: var(--font-mono); font-size: 0.6rem; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(200,134,42,0.6); margin-top: 0.25rem; }

        @media (max-width: 640px) {
            .navbar { padding: 0 1rem; }
            .page { padding: 1.5rem 1rem; }
            .stats-row { flex-direction: column; }
            thead th:nth-child(3), tbody td:nth-child(3) { display: none; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ url('/') }}" class="logo">Fret<em>Factory</em></a>
    <div class="nav-right">
        <a href="{{ url('/') }}" class="nav-link">Beranda</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-ghost">Logout</button>
        </form>
    </div>
</nav>

<div class="page">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <div class="page-eyebrow">Admin Panel</div>
            <h1 class="page-title">Kelola Produk</h1>
        </div>
        <a href="{{ route('produk.create') }}" class="btn btn-amber">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                <path d="M6 1v10M1 6h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
            Tambah Produk
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><circle cx="7" cy="7" r="6" stroke="currentColor" stroke-width="1.4"/><path d="m4.5 7 2 2 3-3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <!-- Stats -->
    @php
        $totalProduk = $produks->count();
        $totalStok   = $produks->sum('stok');
        $totalNilai  = $produks->sum(fn($p) => ($p->harga ?? 0) * ($p->stok ?? 0));
    @endphp
    <div class="stats-row">
        <div class="stat-box">
            <div class="stat-box-num">{{ $totalProduk }}</div>
            <div class="stat-box-label">Total Produk</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-num">{{ number_format($totalStok, 0, ',', '.') }}</div>
            <div class="stat-box-label">Total Stok</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-num" style="font-size:1.2rem">Rp {{ number_format($totalNilai, 0, ',', '.') }}</div>
            <div class="stat-box-label">Nilai Inventori</div>
        </div>
    </div>

    <!-- Table -->
    <div class="table-wrap">
        @if($produks->isEmpty())
            <div class="empty">
                <span class="empty-icon">🎸</span>
                <h3 class="empty-title">Belum Ada Produk</h3>
                <p class="empty-sub">Tambahkan instrumen pertama ke katalog kamu.</p>
                <a href="{{ route('produk.create') }}" class="btn btn-amber">Tambah Produk</a>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produks as $produk)
                        @php
                            $fotoUrl = null;
                            $fileFoto = $produk->foto ?? $produk->gambar ?? $produk->image ?? $produk->photo ?? null;
                            if (!empty($fileFoto)) {
                                $fotoUrl = filter_var($fileFoto, FILTER_VALIDATE_URL) ? $fileFoto : asset('storage/' . $fileFoto);
                            }
                            $namaProduk = $produk->nama ?? $produk->nama_produk ?? '-';
                            $stok = $produk->stok ?? 0;
                            $stokClass = $stok === 0 ? 'stock-out' : ($stok <= 3 ? 'stock-low' : 'stock-ok');
                        @endphp
                        <tr>
                            <td class="td-foto">
                                @if($fotoUrl)
                                    <img src="{{ $fotoUrl }}" alt="{{ $namaProduk }}">
                                @else
                                    <div class="no-foto">🎸</div>
                                @endif
                            </td>
                            <td class="td-name">{{ $namaProduk }}</td>
                            <td><span class="badge">{{ $produk->kategori ?? '-' }}</span></td>
                            <td class="td-price">Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}</td>
                            <td class="{{ $stokClass }}">{{ $stok }} pcs</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-ghost">Edit</a>
                                    <form method="POST" action="{{ route('produk.destroy', $produk->id) }}" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>
</body>
</html>
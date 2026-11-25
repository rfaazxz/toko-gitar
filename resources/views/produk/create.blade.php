<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk — Fret Factory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap">
    <style>
        :root {
            --amber: #c8862a; --amber-warm: #e09a30;
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'DM Sans', system-ui, sans-serif;
            --font-mono: 'DM Mono', monospace;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--font-body); background: #0e0c09; color: #f5f0e8; min-height: 100vh; -webkit-font-smoothing: antialiased; }

        .navbar { display: flex; align-items: center; justify-content: space-between; padding: 0 2.5rem; height: 68px; background: rgba(14,12,9,0.95); border-bottom: 1px solid rgba(200,134,42,0.12); position: sticky; top: 0; z-index: 50; }
        .logo { font-family: var(--font-display); font-weight: 900; font-size: 1.3rem; color: #f5f0e8; text-decoration: none; letter-spacing: -0.02em; }
        .logo em { font-style: italic; color: var(--amber); }
        .back-link { font-size: 0.75rem; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(245,240,232,0.45); text-decoration: none; display: flex; align-items: center; gap: 0.4rem; transition: color 0.2s; }
        .back-link:hover { color: #f5f0e8; }

        .page { max-width: 760px; margin: 0 auto; padding: 3rem 2rem; }
        .page-eyebrow { font-family: var(--font-mono); font-size: 0.6rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--amber); opacity: 0.8; margin-bottom: 0.4rem; }
        .page-title { font-family: var(--font-display); font-size: 2rem; font-weight: 700; letter-spacing: -0.02em; color: #f5f0e8; margin-bottom: 2.5rem; }

        /* FORM */
        .form-card { background: #141009; border: 1px solid rgba(200,134,42,0.12); border-radius: 2px; padding: 2rem; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        @media (max-width: 540px) { .form-grid { grid-template-columns: 1fr; } .navbar { padding: 0 1rem; } .page { padding: 2rem 1rem; } }
        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }
        .form-group.full { grid-column: 1 / -1; }
        label { font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(200,134,42,0.75); font-weight: 500; }
        input[type="text"], input[type="number"], input[type="file"], select, textarea {
            background: rgba(245,240,232,0.04);
            border: 1px solid rgba(245,240,232,0.1);
            border-radius: 2px;
            padding: 0.8rem 1rem;
            font-family: var(--font-body);
            font-size: 0.875rem;
            color: #f5f0e8;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
            width: 100%;
        }
        input:focus, select:focus, textarea:focus {
            border-color: rgba(200,134,42,0.45);
            background: rgba(245,240,232,0.06);
        }
        input::placeholder, textarea::placeholder { color: rgba(245,240,232,0.2); }
        select option { background: #191510; color: #f5f0e8; }
        .error-msg { font-size: 0.72rem; color: #f87171; margin-top: 0.1rem; }

        /* Preview foto */
        .foto-preview { margin-top: 0.75rem; display: none; }
        .foto-preview img { width: 100%; max-height: 200px; object-fit: cover; border-radius: 2px; border: 1px solid rgba(200,134,42,0.15); }
        .foto-hint { font-size: 0.7rem; color: rgba(245,240,232,0.25); margin-top: 0.4rem; }

        /* Divider */
        .form-divider { grid-column: 1/-1; border: none; border-top: 1px solid rgba(200,134,42,0.08); margin: 0.5rem 0; }

        /* Buttons */
        .form-actions { display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem; flex-wrap: wrap; }
        .btn { display: inline-flex; align-items: center; gap: 0.4rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; padding: 0.65rem 1.4rem; border-radius: 2px; border: none; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .btn-amber { background: var(--amber); color: #0e0c09; }
        .btn-amber:hover { background: var(--amber-warm); }
        .btn-ghost { background: transparent; color: rgba(245,240,232,0.45); border: 1px solid rgba(245,240,232,0.1); }
        .btn-ghost:hover { color: #f5f0e8; border-color: rgba(245,240,232,0.25); }

        /* API info box */
        .api-info { background: rgba(200,134,42,0.05); border: 1px solid rgba(200,134,42,0.15); border-radius: 2px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; display: flex; gap: 0.75rem; align-items: flex-start; }
        .api-info-icon { font-size: 0.9rem; margin-top: 0.1rem; opacity: 0.7; }
        .api-info-text { font-size: 0.75rem; color: rgba(200,134,42,0.75); line-height: 1.6; }
        .api-info-text code { font-family: var(--font-mono); font-size: 0.7rem; background: rgba(200,134,42,0.1); padding: 0.1rem 0.4rem; border-radius: 2px; color: var(--amber); }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ url('/') }}" class="logo">Fret<em>Factory</em></a>
    <a href="{{ route('produk.index') }}" class="back-link">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M8 1L3 6l5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Kembali
    </a>
</nav>

<div class="page">

    <div class="page-eyebrow">Admin Panel</div>
    <h1 class="page-title">Tambah Produk Baru</h1>

    <div class="api-info">
        <span class="api-info-icon">ℹ</span>
        <div class="api-info-text">
            Produk juga bisa ditambahkan via API: <code>POST /api/produk</code> dengan field <code>nama</code>, <code>harga</code>, <code>stok</code>, <code>kategori</code>, <code>foto</code>.
        </div>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">

                <!-- Nama -->
                <div class="form-group full">
                    <label for="nama">Nama Produk</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Gibson Les Paul Standard '60s…" required>
                    @error('nama') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <!-- Kategori -->
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" required>
                        <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Pilih kategori…</option>
                        @foreach(['Elektrik', 'Akustik', 'Bass', 'Classical', 'Semi-Hollow', 'Aksesoris', 'Efek Gitar', 'Amplifier', 'Lainnya'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori') === $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <!-- Stok -->
                <div class="form-group">
                    <label for="stok">Stok (pcs)</label>
                    <input type="number" id="stok" name="stok" value="{{ old('stok', 1) }}" min="0" required>
                    @error('stok') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <!-- Harga -->
                <div class="form-group full">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" value="{{ old('harga') }}" min="0" placeholder="5000000" required>
                    @error('harga') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <hr class="form-divider">

                <!-- Foto -->
                <div class="form-group full">
                    <label for="foto">Foto Produk</label>
                    <input type="file" id="foto" name="foto" accept="image/jpg,image/jpeg,image/png,image/webp" onchange="previewFoto(this)">
                    <span class="foto-hint">JPG, PNG, atau WebP — maks. 2MB</span>
                    <div class="foto-preview" id="fotoPreview">
                        <img id="fotoPreviewImg" src="" alt="Preview foto">
                    </div>
                    @error('foto') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('produk.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-amber">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6.5l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewFoto(input) {
        const preview = document.getElementById('fotoPreview');
        const img = document.getElementById('fotoPreviewImg');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                img.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
</body>
</html>

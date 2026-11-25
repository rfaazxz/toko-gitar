<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Dummy — Fret Factory</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap">
    <style>
        :root {
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
        }
        .navbar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2.5rem; height: 68px;
            background: rgba(14,12,9,0.95);
            border-bottom: 1px solid rgba(200,134,42,0.14);
        }
        .logo { font-family: var(--font-display); font-weight: 900; font-size: 1.3rem; color: #f5f0e8; text-decoration: none; letter-spacing: -0.02em; }
        .logo em { font-style: italic; color: var(--amber); }
        .back-link { font-size: 0.75rem; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(245,240,232,0.55); text-decoration: none; }
        .back-link:hover { color: #f5f0e8; }

        .page { max-width: 980px; margin: 0 auto; padding: 2.5rem 1.5rem 4rem; }
        .eyebrow { font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--amber); margin-bottom: 0.35rem; }
        .title { font-family: var(--font-display); font-size: clamp(1.6rem, 3.5vw, 2.2rem); font-weight: 700; margin-bottom: 0.5rem; }
        .dummy-tag {
            display: inline-block; font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.12em;
            text-transform: uppercase; color: #fbbf24; background: rgba(251,191,36,0.08);
            border: 1px solid rgba(251,191,36,0.28); padding: 0.28rem 0.65rem; border-radius: 2px; margin-bottom: 2rem;
        }

        .grid { display: grid; grid-template-columns: 1.25fr 0.9fr; gap: 1.5rem; align-items: start; }
        @media (max-width: 780px) { .grid { grid-template-columns: 1fr; } .navbar { padding: 0 1.2rem; } }

        .card { background: #141009; border: 1px solid rgba(200,134,42,0.16); border-radius: 2px; padding: 1.75rem; }
        .card-heading { font-family: var(--font-mono); font-size: 0.65rem; letter-spacing: 0.16em; text-transform: uppercase; color: rgba(200,134,42,0.8); margin-bottom: 1.25rem; }

        .form-group { display: flex; flex-direction: column; gap: 0.45rem; margin-bottom: 1.15rem; }
        label { font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(245,240,232,0.65); }
        input, select, textarea {
            background: rgba(245,240,232,0.04); border: 1px solid rgba(245,240,232,0.12);
            border-radius: 2px; padding: 0.75rem 0.95rem; font-family: var(--font-body);
            font-size: 0.88rem; color: #f5f0e8; outline: none; width: 100%;
        }
        input:focus, select:focus, textarea:focus { border-color: rgba(200,134,42,0.55); }
        select option { background: #191510; color: #f5f0e8; }

        .method-list { display: grid; gap: 0.65rem; margin-bottom: 1.35rem; }
        .method-option {
            display: flex; align-items: center; justify-content: space-between; gap: 0.75rem;
            padding: 0.85rem 1rem; border: 1px solid rgba(245,240,232,0.12); border-radius: 2px;
            background: rgba(245,240,232,0.02); cursor: pointer;
        }
        .method-option input { width: auto; accent-color: var(--amber); }
        .method-title { font-size: 0.88rem; font-weight: 600; color: #f5f0e8; }
        .method-sub { font-size: 0.72rem; color: rgba(245,240,232,0.45); }

        .prod-preview { display: flex; gap: 1rem; align-items: center; padding-bottom: 1.25rem; border-bottom: 1px solid rgba(200,134,42,0.12); margin-bottom: 1.25rem; }
        .prod-preview img { width: 76px; height: 76px; object-fit: cover; border-radius: 2px; border: 1px solid rgba(200,134,42,0.2); }
        .prod-no-img { width: 76px; height: 76px; display: flex; align-items: center; justify-content: center; background: rgba(200,134,42,0.08); border-radius: 2px; font-size: 1.6rem; }
        .prod-name { font-family: var(--font-display); font-size: 1.05rem; font-weight: 700; }
        .prod-kat { font-family: var(--font-mono); font-size: 0.6rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--amber); margin-bottom: 0.2rem; }

        .summary-row { display: flex; justify-content: space-between; font-size: 0.85rem; color: rgba(245,240,232,0.7); margin-bottom: 0.65rem; }
        .summary-total { display: flex; justify-content: space-between; align-items: baseline; padding-top: 0.85rem; margin-top: 0.85rem; border-top: 1px solid rgba(200,134,42,0.16); font-weight: 700; }
        .summary-total .val { font-family: var(--font-display); font-size: 1.4rem; color: var(--amber-warm); }

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 0.45rem; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.09em; text-transform: uppercase; padding: 0.85rem 1.4rem; border-radius: 2px; border: none; cursor: pointer; text-decoration: none; width: 100%; }
        .btn-amber { background: var(--amber); color: #0e0c09; }
        .btn-amber:hover { background: var(--amber-warm); }
        .btn-ghost { background: transparent; color: #f5f0e8; border: 1px solid rgba(245,240,232,0.18); margin-top: 0.75rem; }
        .btn-ghost:hover { border-color: var(--amber); color: var(--amber); }

        .alert-err { background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.3); color: #fca5a5; padding: 0.85rem 1rem; border-radius: 2px; font-size: 0.82rem; margin-bottom: 1.25rem; }
        .success-box { background: rgba(74,222,128,0.07); border: 1px solid rgba(74,222,128,0.28); border-radius: 2px; padding: 1.75rem; }
        .success-badge { font-family: var(--font-mono); font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: #4ade80; margin-bottom: 0.4rem; }
        .inv-code { font-family: var(--font-mono); font-size: 1rem; color: var(--amber-warm); margin: 0.5rem 0 1.25rem; }
    </style>
</head>
<body>
<nav class="navbar">
    <a href="{{ url('/') }}" class="logo">Fret<em>Factory</em></a>
    <a href="{{ url('/#katalog') }}" class="back-link">← Kembali ke Katalog</a>
</nav>

<div class="page">
    <div class="eyebrow">Simulasi Transaksi</div>
    <h1 class="title">Halaman Payment Dummy</h1>
    <span class="dummy-tag">Mode Uji Coba · Tidak Ada Tagihan Asli</span>

    @if(session('error'))
        <div class="alert-err">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-err">
            @foreach($errors->all() as $err)
                <div>• {{ $err }}</div>
            @endforeach
        </div>
    @endif

    @php
        $namaProduk = $produk->nama ?? $produk->nama_produk ?? 'Instrumen';
        $fileFoto   = $produk->gambar ?? $produk->foto ?? null;
        $fotoUrl    = !empty($fileFoto) ? (filter_var($fileFoto, FILTER_VALIDATE_URL) ? $fileFoto : asset('storage/' . $fileFoto)) : null;
        $hargaAwal  = (float) ($produk->harga ?? 0);
        $stokTersedia = (int) ($produk->stok ?? 0);
    @endphp

    @if(!empty($success) && !empty($order))
        <div class="success-box">
            <div class="success-badge">✓ Pembayaran Dummy Berhasil</div>
            <h2 style="font-family:var(--font-display);font-size:1.6rem;margin-bottom:0.25rem;">Terima kasih, {{ $order['nama_pembeli'] }}!</h2>
            <p style="font-size:0.85rem;color:rgba(245,240,232,0.72);">Simulasi pembayaran telah tercatat dan stok produk telah diperbarui.</p>

            <div class="inv-code">Invoice: {{ $order['invoice'] }} · {{ $order['waktu_bayar'] }}</div>

            <div class="summary-row"><span>Produk</span><span>{{ $order['produk_nama'] }} ({{ $order['qty'] }} pcs)</span></div>
            <div class="summary-row"><span>Metode Pembayaran</span><span>{{ strtoupper(str_replace('_', ' ', $order['metode_bayar'])) }}</span></div>
            <div class="summary-row"><span>Alamat Pengiriman</span><span>{{ $order['alamat'] }}</span></div>
            <div class="summary-total">
                <span>Total Dibayar (Dummy)</span>
                <span class="val">Rp {{ number_format($order['total_bayar'], 0, ',', '.') }}</span>
            </div>

            <div style="margin-top:1.5rem;max-width:320px;">
                <a href="{{ url('/#katalog') }}" class="btn btn-amber">Kembali ke Katalog</a>
            </div>
        </div>
    @else
        <div class="grid">
            <div class="card">
                <div class="card-heading">Data Pembeli & Metode Bayar Dummy</div>

                <form method="POST" action="{{ route('checkout.process', $produk->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="nama_pembeli">Nama Lengkap</label>
                        <input type="text" id="nama_pembeli" name="nama_pembeli" value="{{ old('nama_pembeli', auth()->user()->name ?? 'Budi Santoso') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email_pembeli">Email</label>
                        <input type="email" id="email_pembeli" name="email_pembeli" value="{{ old('email_pembeli', auth()->user()->email ?? 'test@example.com') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No. WhatsApp / HP</label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', '081234567890') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="qty">Jumlah Unit (Stok: {{ $stokTersedia }} pcs)</label>
                        <input type="number" id="qty" name="qty" min="1" max="{{ max(1, $stokTersedia) }}" value="{{ old('qty', 1) }}" onchange="updateSummary()" oninput="updateSummary()" {{ $stokTersedia < 1 ? 'disabled' : 'required' }}>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Pengiriman</label>
                        <textarea id="alamat" name="alamat" rows="2" required>{{ old('alamat', 'Jl. Merdeka No. 10, Jakarta') }}</textarea>
                    </div>

                    <div class="card-heading" style="margin-top:1.25rem;">Pilih Metode Pembayaran Dummy</div>
                    <div class="method-list">
                        <label class="method-option">
                            <div>
                                <div class="method-title">Virtual Account Bank (Dummy)</div>
                                <div class="method-sub">VA 8801-0812-3456-7890 · Otomatis terkonfirmasi</div>
                            </div>
                            <input type="radio" name="metode_bayar" value="bank_transfer" {{ old('metode_bayar', 'bank_transfer') === 'bank_transfer' ? 'checked' : '' }}>
                        </label>
                        <label class="method-option">
                            <div>
                                <div class="method-title">QRIS Instan (Dummy)</div>
                                <div class="method-sub">Scan kode QR simulasi · Instan</div>
                            </div>
                            <input type="radio" name="metode_bayar" value="qris_dummy" {{ old('metode_bayar') === 'qris_dummy' ? 'checked' : '' }}>
                        </label>
                        <label class="method-option">
                            <div>
                                <div class="method-title">E-Wallet OVO / GoPay / DANA (Dummy)</div>
                                <div class="method-sub">Simulasi pembayaran dompet digital</div>
                            </div>
                            <input type="radio" name="metode_bayar" value="ewallet_dummy" {{ old('metode_bayar') === 'ewallet_dummy' ? 'checked' : '' }}>
                        </label>
                    </div>

                    @if($stokTersedia > 0)
                        <button type="submit" class="btn btn-amber">Konfirmasi & Bayar (Dummy)</button>
                    @else
                        <button type="button" class="btn btn-ghost" disabled>Stok Habis</button>
                    @endif
                </form>
            </div>

            <div class="card">
                <div class="card-heading">Ringkasan Pesanan</div>

                <div class="prod-preview">
                    @if($fotoUrl)
                        <img src="{{ $fotoUrl }}" alt="{{ $namaProduk }}">
                    @else
                        <div class="prod-no-img">🎸</div>
                    @endif
                    <div>
                        <div class="prod-kat">{{ $produk->kategori ?? '-' }}</div>
                        <div class="prod-name">{{ $namaProduk }}</div>
                        <div style="font-size:0.8rem;color:rgba(245,240,232,0.55);margin-top:0.2rem;">
                            Rp {{ number_format($hargaAwal, 0, ',', '.') }} / unit
                        </div>
                    </div>
                </div>

                <div class="summary-row">
                    <span>Jumlah</span>
                    <span id="sumQty">1 pcs</span>
                </div>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span id="sumSubtotal">Rp {{ number_format($hargaAwal, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Biaya Layanan Dummy</span>
                    <span>Rp 2.500</span>
                </div>
                <div class="summary-total">
                    <span>Total Pembayaran</span>
                    <span class="val" id="sumTotal">Rp {{ number_format($hargaAwal + 2500, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    const unitPrice = {{ $hargaAwal }};
    const adminFee = 2500;
    const maxStock = {{ $stokTersedia }};

    function formatRupiah(num) {
        return 'Rp ' + Math.max(0, Math.round(num)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function updateSummary() {
        const qtyInput = document.getElementById('qty');
        if (!qtyInput) return;
        let qty = parseInt(qtyInput.value || '1', 10);
        if (isNaN(qty) || qty < 1) qty = 1;
        if (maxStock > 0 && qty > maxStock) qty = maxStock;

        const subtotal = unitPrice * qty;
        const total = subtotal + adminFee;

        document.getElementById('sumQty').textContent = qty + ' pcs';
        document.getElementById('sumSubtotal').textContent = formatRupiah(subtotal);
        document.getElementById('sumTotal').textContent = formatRupiah(total);
    }
</script>
</body>
</html>
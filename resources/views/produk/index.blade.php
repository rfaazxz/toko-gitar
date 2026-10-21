<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore Admin - Dashboard CRUD Produk</title>
    <!-- Bootstrap 5 CSS & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; }
        .stat-card { border: none; border-radius: 12px; transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-3px); }
        .product-card { border: none; border-radius: 15px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 8px 24px rgba(0,0,0,0.12); }
        .product-img { height: 180px; object-fit: cover; background-color: #e9ecef; }
        .badge-category { position: absolute; top: 12px; right: 12px; font-size: 0.75rem; border-radius: 20px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="/produk"><i class="fa-solid fa-store me-2 text-warning"></i>RaffStore Admin</a>
            <a href="/produk/create" class="btn btn-warning fw-bold"><i class="fa-solid fa-plus me-1"></i> Tambah Produk</a>
        </div>
    </nav>

    <div class="container">

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <strong><i class="fa-solid fa-circle-check me-2"></i>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Widget Statistik Gokil -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card stat-card bg-primary text-white shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 text-uppercase fw-semibold mb-1">Total Produk</h6>
                            <h2 class="fw-bold mb-0">{{ $totalProduk }}</h2>
                        </div>
                        <i class="fa-solid fa-boxes-stacked fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-success text-white shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 text-uppercase fw-semibold mb-1">Estimasi Nilai Aset</h6>
                            <h2 class="fw-bold mb-0">Rp {{ number_format($totalAset, 0, ',', '.') }}</h2>
                        </div>
                        <i class="fa-solid fa-wallet fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-danger text-white shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 text-uppercase fw-semibold mb-1">Stok Habis</h6>
                            <h2 class="fw-bold mb-0">{{ $stokHabis }} Item</h2>
                        </div>
                        <i class="fa-solid fa-triangle-exclamation fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
            <form action="/produk" method="GET" class="row g-2 align-items-center">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                        <input type="text" name="search" class="form-control bg-light border-start-0" placeholder="Cari produk..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select bg-light">
                        <option value="">-- Semua Kategori --</option>
                        @foreach ($kategoriList as $kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort" class="form-select bg-light">
                        <option value="">-- Urutkan --</option>
                        <option value="harga_asc" {{ request('sort') == 'harga_asc' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="harga_desc" {{ request('sort') == 'harga_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                        <option value="stok_asc" {{ request('sort') == 'stok_asc' ? 'selected' : '' }}>Stok Tersedikit</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-filter me-1"></i> Filter</button>
                    @if(request('search') || request('kategori') || request('sort'))
                        <a href="/produk" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate"></i></a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Catalog Cards -->
        <div class="row g-4">
            @forelse ($produks as $produk)
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card h-100 position-relative">
                        <!-- Category Badge -->
                        <span class="badge bg-dark badge-category px-3 py-2">{{ $produk->kategori }}</span>

                        <!-- Image -->
                        @if ($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top product-img" alt="{{ $produk->nama }}">
                        @else
                            <div class="product-img d-flex align-items-center justify-content-center text-muted">
                                <i class="fa-solid fa-image fa-3x"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-1">{{ $produk->nama }}</h5>
                            <p class="card-text text-muted small mb-3">{{ Str::limit($produk->deskripsi, 70) }}</p>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-success fw-bold mb-0">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                                    
                                    <!-- Stock Badge -->
                                    @if ($produk->stok == 0)
                                        <span class="badge bg-danger-subtle text-danger fw-bold border border-danger">Habis</span>
                                    @elseif ($produk->stok <= 5)
                                        <span class="badge bg-warning-subtle text-warning-emphasis fw-bold border border-warning">Sisa {{ $produk->stok }}</span>
                                    @else
                                        <span class="badge bg-success-subtle text-success fw-bold border border-success">Stok: {{ $produk->stok }}</span>
                                    @endif
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="/produk/{{ $produk->id }}/edit" class="btn btn-outline-primary btn-sm w-100 fw-semibold"><i class="fa-solid fa-pen-to-square me-1"></i> Edit</a>
                                    
                                    <form action="/produk/{{ $produk->id }}" method="POST" class="w-100" onsubmit="return confirm('Yakin mau hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-semibold"><i class="fa-solid fa-trash me-1"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                        <i class="fa-solid fa-box-open fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">Produk Tidak Ditemukan</h4>
                        <p class="text-secondary">Coba ubah kata kunci pencarian atau reset filter.</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
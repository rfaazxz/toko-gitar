<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Next-Gen Tech & Gaming Gear</title>
    
    <!-- Google Fonts & Bootstrap 5 & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --dark-bg: #0b0f19;
            --card-bg: #ffffff;
        }

        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background-color: #f8fafc; color: #0f172a; overflow-x: hidden; }
        
        /* Glassmorphism Navbar */
        .navbar-glass {
            background: rgba(11, 15, 25, 0.85) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Hero Ultra Styling */
        .hero-section {
            background: radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.18) 0%, transparent 50%),
                        radial-gradient(circle at 20% 80%, rgba(168, 85, 247, 0.15) 0%, transparent 50%),
                        var(--dark-bg);
            color: white;
            padding: 100px 0 120px;
            border-bottom-left-radius: 48px;
            border-bottom-right-radius: 48px;
            position: relative;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            letter-spacing: -1.5px;
            line-height: 1.15;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Glowing Badges & Buttons */
        .btn-glow {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            border: none;
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
            transition: all 0.3s ease;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(99, 102, 241, 0.7);
            color: white;
        }

        /* Category Filter Pills */
        .category-pill {
            padding: 10px 24px;
            border-radius: 99px;
            font-weight: 600;
            font-size: 0.875rem;
            background: #ffffff;
            color: #64748b;
            border: 1px solid #e2e8f0;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .category-pill:hover, .category-pill.active {
            background: var(--dark-bg);
            color: #ffffff;
            border-color: var(--dark-bg);
            box-shadow: 0 10px 20px -5px rgba(15, 23, 42, 0.2);
            transform: translateY(-2px);
        }

        /* Product Card Ultra */
        .card-product {
            border: 1px solid #f1f5f9;
            border-radius: 24px;
            background: #ffffff;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.03);
        }
        .card-product:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 35px -10px rgba(0, 0, 0, 0.08);
            border-color: #e2e8f0;
        }
        
        .product-img-wrapper {
            height: 230px;
            background: radial-gradient(circle, #f8fafc 0%, #f1f5f9 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .product-img-wrapper img {
            max-height: 190px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .card-product:hover .product-img-wrapper img {
            transform: scale(1.08);
        }

        /* Glass Floating Admin Button */
        .floating-admin-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            color: #38bdf8;
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 14px 24px;
            border-radius: 99px;
            font-weight: 700;
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .floating-admin-btn:hover {
            transform: scale(1.05) translateY(-3px);
            color: #ffffff;
            background: #0f172a;
        }

        /* Modal Customization */
        .modal-content { border-radius: 32px; border: none; }
    </style>
</head>
<body>

    <!-- Floating Quick Admin Button -->
    <a href="/produk" class="floating-admin-btn d-flex align-items-center gap-2">
        <i class="fa-solid fa-sliders text-warning"></i>
        <span>Admin Panel</span>
    </a>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-glass sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-extrabold text-white d-flex align-items-center gap-2 fs-4" href="/">
                <span class="bg-primary text-white rounded-3 px-2 py-1 fs-6"><i class="fa-solid fa-microchip"></i></span>
                Raff<span class="text-primary">Store</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 fw-semibold" href="#katalog">Katalog Store</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 fw-semibold" href="#features">Keunggulan</a></li>
                    <li class="nav-item ms-lg-2">
                        <a href="/produk" class="btn btn-glow rounded-pill px-4 py-2 fw-bold btn-sm">
                            <i class="fa-solid fa-gear me-1"></i> Dashboard Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section Ultra -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="d-inline-flex align-items-center gap-2 bg-white bg-opacity-10 border border-white border-opacity-10 px-3 py-2 rounded-pill mb-4">
                        <span class="badge bg-warning text-dark rounded-pill fw-bold">NEW</span>
                        <small class="text-white-50 fw-semibold">E-Commerce Ready & Integrated Database</small>
                    </div>
                    <h1 class="hero-title mb-3">Power Your Setup With Best Gear.</h1>
                    <p class="text-white-50 fs-5 mb-4 leading-relaxed">
                        Temukan hardware komputer, laptop, dan peripheral original bergaransi resmi. Terhubung langsung secara real-time dengan database toko.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#katalog" class="btn btn-glow rounded-pill px-4 py-3 fw-bold">
                            <i class="fa-solid fa-cart-shopping me-2"></i>Eksplor Produk
                        </a>
                        <a href="/produk" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold border-opacity-25">
                            <i class="fa-solid fa-database me-2"></i>Kelola Data (CRUD)
                        </a>
                    </div>

                    <!-- Quick Stats -->
                    <div class="row mt-5 pt-3 border-top border-white border-opacity-10">
                        <div class="col-4">
                            <h4 class="fw-bold text-white mb-0">100%</h4>
                            <small class="text-white-50">Original Product</small>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-bold text-white mb-0">24/7</h4>
                            <small class="text-white-50">Tech Support</small>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-bold text-white mb-0">Official</h4>
                            <small class="text-white-50">Garansi Resmi</small>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 text-center">
                    <div class="position-relative d-inline-block">
                        <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&w=700&q=80" class="img-fluid rounded-4 shadow-lg border border-white border-opacity-10" alt="Hardware Setup">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section id="features" class="py-5 my-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 border border-slate-100 shadow-sm h-100 d-flex gap-3 align-items-start">
                        <div class="bg-primary-subtle text-primary rounded-4 p-3 fs-3"><i class="fa-solid fa-shield-halved"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Jaminan Garansi Resmi</h6>
                            <p class="text-muted small mb-0">Semua produk dilindungi garansi distributor resmi hingga 3 tahun.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 border border-slate-100 shadow-sm h-100 d-flex gap-3 align-items-start">
                        <div class="bg-success-subtle text-success rounded-4 p-3 fs-3"><i class="fa-solid fa-truck-fast"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Pengiriman Super Cepat</h6>
                            <p class="text-muted small mb-0">Proses kirim aman dengan proteksi ekstra bubble wrap tebal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 border border-slate-100 shadow-sm h-100 d-flex gap-3 align-items-start">
                        <div class="bg-warning-subtle text-warning-emphasis rounded-4 p-3 fs-3"><i class="fa-solid fa-headset"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Konsultasi Build PC</h6>
                            <p class="text-muted small mb-0">Bisa tanya-tanya spesifikasi yang cocok dengan budget kamu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Produk Main Section -->
    <section id="katalog" class="py-5 bg-white border-top">
        <div class="container py-3">
            
            <div class="row align-items-end mb-4 g-3">
                <div class="col-lg-6">
                    <h2 class="fw-extrabold text-dark mb-1 fs-2">Katalog Hardware Terkini</h2>
                    <p class="text-muted mb-0">Semua item secara otomatis tersinkronisasi dari Database Admin</p>
                </div>
                <div class="col-lg-6">
                    <!-- Search Bar Modern -->
                    <form action="/#katalog" method="GET" class="d-flex gap-2 justify-content-lg-end">
                        <div class="input-group style-search" style="max-width: 360px;">
                            <span class="input-group-text bg-light border-end-0 rounded-start-pill ps-3">
                                <i class="fa-solid fa-magnifying-glass text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control bg-light border-start-0 rounded-end-pill py-2" placeholder="Cari nama produk..." value="{{ request('search') }}">
                        </div>
                        @if(request('search') || request('kategori'))
                            <a href="/#katalog" class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;"><i class="fa-solid fa-rotate"></i></a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Filter Kategori (Pill) -->
            <div class="d-flex flex-wrap gap-2 mb-5">
                <a href="/#katalog" class="category-pill {{ request('kategori') == '' ? 'active' : '' }}">
                    <i class="fa-solid fa-border-all"></i> Semua
                </a>
                @foreach ($kategoriList as $kat)
                    <a href="/?kategori={{ $kat }}#katalog" class="category-pill {{ request('kategori') == $kat ? 'active' : '' }}">
                        {{ $kat }}
                    </a>
                @endforeach
            </div>

            <!-- Grid Produk -->
            <div class="row g-4">
                @forelse ($produks as $produk)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card-product h-100 d-flex flex-column justify-content-between">
                            <div>
                                <!-- Image Box -->
                                <div class="product-img-wrapper">
                                    <span class="badge bg-dark bg-opacity-75 text-white position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill fs-xs fw-bold" style="backdrop-filter: blur(4px);">
                                        {{ $produk->kategori }}
                                    </span>
                                    
                                    @if ($produk->gambar)
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}">
                                    @else
                                        <div class="text-center text-muted">
                                            <i class="fa-solid fa-box-open fa-3x opacity-25"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Content -->
                                <div class="p-4">
                                    <h6 class="fw-bold text-dark mb-2 text-truncate" title="{{ $produk->nama }}">{{ $produk->nama }}</h6>
                                    <p class="text-muted small mb-3" style="min-height: 38px; line-height: 1.4;">{{ Str::limit($produk->deskripsi, 52) }}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="fw-extrabold text-primary mb-0">
                                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        </h5>

                                        <!-- Badge Stok -->
                                        @if ($produk->stok == 0)
                                            <span class="badge bg-danger-subtle text-danger fw-bold rounded-pill px-2 py-1">Habis</span>
                                        @elseif ($produk->stok <= 5)
                                            <span class="badge bg-warning-subtle text-warning-emphasis fw-bold rounded-pill px-2 py-1">Sisa {{ $produk->stok }}</span>
                                        @else
                                            <span class="badge bg-success-subtle text-success fw-bold rounded-pill px-2 py-1">Stok: {{ $produk->stok }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Button Modal Detail -->
                            <div class="p-4 pt-0">
                                <button class="btn btn-outline-dark btn-sm rounded-pill w-100 fw-bold py-2" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $produk->id }}">
                                    <i class="fa-solid fa-eye me-1"></i> Detail Spesifikasi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Detail Produk -->
                    <div class="modal fade" id="modalDetail{{ $produk->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content overflow-hidden">
                                <div class="modal-header border-0 pb-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4 pt-0">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-md-5">
                                            <div class="bg-light rounded-4 p-4 text-center border">
                                                @if ($produk->gambar)
                                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded-3" style="max-height: 240px; object-fit: contain;">
                                                @else
                                                    <i class="fa-solid fa-image fa-4x text-muted opacity-25 my-4"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="badge bg-primary-subtle text-primary fw-bold rounded-pill px-3 py-2 mb-2">{{ $produk->kategori }}</span>
                                            <h3 class="fw-bold text-dark mb-2">{{ $produk->nama }}</h3>
                                            <h3 class="text-primary fw-extrabold mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h3>

                                            <div class="mb-3">
                                                <strong class="text-dark small">Ketersediaan Stok:</strong> 
                                                @if ($produk->stok == 0)
                                                    <span class="badge bg-danger ms-1">Habis</span>
                                                @else
                                                    <span class="badge bg-success ms-1">Tersedia ({{ $produk->stok }} Unit)</span>
                                                @endif
                                            </div>

                                            <p class="text-muted small mb-4 leading-relaxed">{{ $produk->deskripsi }}</p>

                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-light rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">Tutup</button>
                                                <a href="/produk" class="btn btn-dark rounded-pill px-4 fw-bold"><i class="fa-solid fa-pen-to-square me-1"></i> Edit Data</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12 text-center py-5">
                        <div class="bg-light rounded-4 p-5 d-inline-block border">
                            <i class="fa-solid fa-magnifying-glass fa-3x text-muted mb-3 opacity-50"></i>
                            <h5 class="fw-bold text-dark">Produk Tidak Ditemukan</h5>
                            <p class="text-muted small mb-3">Coba gunakan kata kunci pencarian lain atau pilih kategori berbeda.</p>
                            <a href="/#katalog" class="btn btn-dark rounded-pill px-4 fw-bold">Reset Pencarian</a>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <h5 class="fw-bold text-white mb-2"><i class="fa-solid fa-microchip text-primary me-2"></i>TechStore App</h5>
                    <p class="text-white-50 small mb-0">Project Laravel 11 CRUD & Responsive Landing Page.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} TechStore. Created for Tugas Web Sales Laravel 11.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
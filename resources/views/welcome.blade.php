<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPLG STORE — Ultimate Tech & Gaming Marketplace</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .btn-glow {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.7);
        }
        .card-cyber {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .card-cyber:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 20px 40px -15px rgba(124, 58, 237, 0.3);
        }
    </style>
</head>
<body class="bg-slate-950 font-sans min-h-screen text-slate-100 flex flex-col justify-between selection:bg-pink-500 selection:text-white overflow-x-hidden">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white text-xs font-bold py-2 px-6 tracking-wide flex justify-between items-center shadow-md">
        <span class="flex items-center gap-2">
            <span class="animate-pulse">🔥</span> MEGA SALE PPLG: Diskon Guitar Hingga 70% & Free Ongkir Se-Indonesia!
        </span>
        <div class="hidden md:flex items-center gap-4 text-[11px] opacity-90">
            <a href="#" class="hover:underline">Support Center</a>
            <span>•</span>
            <a href="#" class="hover:underline">Cek Garansi</a>
        </div>
    </div>

    <!-- Sticky Futuristic Navbar -->
    <nav class="bg-slate-950/90 backdrop-blur-xl border-b border-slate-800/80 px-6 py-4 sticky top-0 z-50 shadow-2xl">
        <div class="max-w-7xl mx-auto flex justify-between items-center gap-6">
            
            <!-- Logo Brand (Diubah ke teks warna solid solid/glow biar gak ngebug) -->
            <a href="{{ url('/') }}" class="font-black text-2xl tracking-widest text-indigo-400 flex items-center gap-2">
                ⚡ PPLG GUITAR  <span class="text-white">STORE</span>
            </a>

            <!-- Search Bar Interaktif -->
            <div class="hidden lg:flex flex-1 max-w-xl items-center bg-slate-900/90 rounded-2xl p-1.5 border border-slate-800 focus-within:border-indigo-500 transition shadow-inner">
                <span class="pl-3 text-slate-400">🔍</span>
                <input type="text" id="searchInput" onkeyup="filterProducts()" placeholder="Cari Gitar Fender..." class="w-full bg-transparent px-3 py-1.5 text-sm text-white placeholder-slate-500 outline-none">
            </div>

            <!-- Menu Auth & Navigasi -->
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="text-slate-300 hover:text-indigo-400 font-bold text-xs px-3 py-2 transition">Beranda</a>

                @auth
                    <a href="{{ route('dashboard') }}" class="text-slate-300 hover:text-indigo-400 font-bold text-xs px-3 py-2 transition">Dashboard</a>
                    <a href="{{ route('produk.index') }}" class="text-slate-300 hover:text-indigo-400 font-bold text-xs px-3 py-2 transition">Kelola Produk</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-rose-500/20 hover:bg-rose-600 text-rose-300 hover:text-white border border-rose-500/30 px-4 py-2 rounded-xl font-bold text-xs transition">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn-glow text-white px-5 py-2.5 rounded-xl text-xs font-black tracking-wide">
                        MASUK
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="border border-indigo-500/50 text-indigo-300 hover:bg-indigo-500/10 px-4 py-2.5 rounded-xl text-xs font-bold transition">
                            DAFTAR
                        </a>
                    @endif
                @endguest
            </div>
        </div>
    </nav>

    <!-- Super Hero Banner -->
    <div class="relative bg-slate-950 py-20 px-6 overflow-hidden border-b border-slate-800/80">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[350px] bg-gradient-to-tr from-indigo-600/20 to-pink-600/20 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
            <div class="lg:col-span-7 text-center lg:text-left">
                <span class="inline-flex items-center gap-2 bg-indigo-500/10 text-indigo-400 border border-indigo-500/30 text-xs font-black px-4 py-1.5 rounded-full mb-6 uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span> E-Commerce Next-Gen
                </span>
                <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-none mb-6">
                    Gitar Impian. <br>
                    <span class="text-indigo-400">Kualitas Terbaik.</span>
                </h1>
                <p class="text-slate-400 text-base sm:text-lg mb-8 leading-relaxed max-w-xl">
                  Pusat koleksi gitar akustik, elektrik, bass, dan perlengkapan audio original dengan garansi resmi serta pengiriman super aman ke seluruh Indonesia.
                </p>

                <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="#katalog" class="btn-glow text-white text-xs font-black px-8 py-4 rounded-2xl tracking-wider uppercase">
                        Jelajahi Produk 🔥
                    </a>
                </div>
            </div>

            <!-- Stats Showcase -->
            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <div class="bg-slate-900/60 border border-slate-800 p-6 rounded-3xl backdrop-blur-md">
                    <span class="text-3xl font-black text-indigo-400 block mb-1">100%</span>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Produk Original</span>
                </div>
                <div class="bg-slate-900/60 border border-slate-800 p-6 rounded-3xl backdrop-blur-md">
                    <span class="text-3xl font-black text-purple-400 block mb-1">24/7</span>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Layanan Garansi</span>
                </div>
                <div class="bg-slate-900/60 border border-slate-800 p-6 rounded-3xl backdrop-blur-md">
                    <span class="text-3xl font-black text-pink-400 block mb-1">2 Jam</span>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Instant Delivery</span>
                </div>
                <div class="bg-slate-900/60 border border-slate-800 p-6 rounded-3xl backdrop-blur-md">
                    <span class="text-3xl font-black text-emerald-400 block mb-1">4.9 ★</span>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rating Toko</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Katalog Produk Utama -->
    <main id="katalog" class="max-w-7xl mx-auto px-6 py-16 flex-1 w-full">

        <!-- Status Auth Info -->
        @guest
            <div class="bg-indigo-950/40 border border-indigo-500/30 rounded-2xl p-5 mb-10 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <span class="text-2xl">💡</span>
                    <div>
                        <h4 class="font-bold text-white text-sm">Mode Pengunjung</h4>
                        <p class="text-slate-400 text-xs">Silakan login untuk mengakses fitur manajemen produk (CRUD) admin.</p>
                    </div>
                </div>
                <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs px-5 py-2.5 rounded-xl transition shrink-0">
                    Login Admin
                </a>
            </div>
        @endguest

        @auth
            <div class="bg-emerald-950/40 border border-emerald-500/30 rounded-2xl p-5 mb-10 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <span class="text-2xl">👑</span>
                    <div>
                        <h4 class="font-bold text-white text-sm">Sesi Admin Aktif: {{ Auth::user()->name }}</h4>
                        <p class="text-slate-400 text-xs">Anda dapat mengelola stok, foto, dan harga barang secara langsung.</p>
                    </div>
                </div>
                <a href="{{ route('produk.index') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs px-5 py-2.5 rounded-xl transition shrink-0">
                    Kelola Produk &rarr;
                </a>
            </div>
        @endauth

        <!-- Title Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4 border-b border-slate-800 pb-6">
            <div>
                <span class="text-indigo-400 text-xs font-extrabold uppercase tracking-widest">Katalog Pilihan</span>
                <h2 class="text-3xl font-black text-white tracking-tight mt-1">Daftar Produk Terbaru</h2>
            </div>
            <div class="text-xs font-bold text-slate-400 bg-slate-900 border border-slate-800 px-4 py-2 rounded-xl">
                Tersedia: <span class="text-indigo-400 font-black">{{ count($produks) }} Items</span>
            </div>
        </div>

        <!-- Grid Produk -->
        <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($produks as $produk)
                @php
    // Mengecek berbagai kemungkinan nama kolom foto di database
    $fileFoto = $produk->foto ?? $produk->gambar ?? $produk->image ?? $produk->photo ?? null;
    $fotoUrl = null;

    if (!empty($fileFoto)) {
        $fotoUrl = filter_var($fileFoto, FILTER_VALIDATE_URL) ? $fileFoto : asset('storage/' . $fileFoto);
    }
    $namaProduk = $produk->nama_produk ?? $produk->nama ?? 'Produk PPLG';
@endphp

                <div class="product-item card-cyber rounded-3xl overflow-hidden flex flex-col justify-between group" data-name="{{ strtolower($namaProduk) }}">
                    <div>
                        <!-- Foto & Badge -->
<div class="relative bg-slate-900 h-60 w-full overflow-hidden flex items-center justify-center">
    @if($fotoUrl)
        <img src="{{ $fotoUrl }}" alt="{{ $namaProduk }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
    @else
        <div class="flex flex-col items-center justify-center text-slate-600">
            <span class="text-5xl mb-2">💻</span>
            <span class="text-[10px] font-bold tracking-widest uppercase">PPLG Official</span>
        </div>
    @endif

    <span class="absolute top-4 left-4 bg-indigo-600 text-white text-[9px] font-black uppercase px-3 py-1 rounded-full shadow-lg">
        Official
    </span>
</div>

                        <!-- Detail Informasi -->
                        <div class="p-6">
                            <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest block mb-1">
                                {{ $produk->kategori ?? 'Hardware' }}
                            </span>
                            <h3 class="font-bold text-white text-base mb-3 line-clamp-2 leading-snug">
                                {{ $namaProduk }}
                            </h3>

                            <div class="flex items-baseline gap-1 my-3">
                                <span class="text-xs font-bold text-indigo-400">Rp</span>
                                <span class="text-2xl font-black text-white">
                                    {{ number_format($produk->harga ?? 0, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="px-6 pb-6 pt-0 border-t border-slate-800/60 flex items-center justify-between text-xs text-slate-400 mt-2">
                        <span>Stok: <strong class="text-white">{{ $produk->stok ?? 0 }} pcs</strong></span>
                        <span class="text-emerald-400 font-bold">✔ Ready Stock</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-slate-900/40 border border-dashed border-slate-800 rounded-3xl p-16 text-center">
                    <span class="text-5xl block mb-4">📦</span>
                    <h3 class="text-xl font-bold text-white mb-2">Belum Ada Produk Tersedia</h3>
                    <p class="text-slate-500 text-sm max-w-md mx-auto">Database produk masih kosong. Silakan masuk sebagai admin untuk menambahkan produk.</p>
                </div>
            @endforelse
        </div>

    </main>

    <!-- Footer Super Megah -->
    <footer class="bg-slate-950 text-slate-500 border-t border-slate-800/80 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div>
                <a href="#" class="font-black text-2xl text-white block mb-4 tracking-wider">⚡ PPLG STORE</a>
                <p class="text-xs leading-relaxed text-slate-400">
                    Platform E-Commerce Modern Simulasi Pembelajaran PPLG dengan Laravel 11 & Tailwind CSS.
                </p>
            </div>
            <div>
                <h4 class="text-white text-xs font-black uppercase tracking-wider mb-4">Navigasi</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard Admin</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white text-xs font-black uppercase tracking-wider mb-4">Fitur</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="#" class="hover:text-white transition">Katalog Hardware</a></li>
                    <li><a href="#" class="hover:text-white transition">Garansi Resmi</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white text-xs font-black uppercase tracking-wider mb-4">Keamanan</h4>
                <span class="inline-block bg-slate-900 border border-slate-800 text-emerald-400 text-[10px] font-bold px-3 py-1.5 rounded-lg">
                    🔒 Protected by Laravel Auth
                </span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pt-6 border-t border-slate-900 text-center text-xs text-slate-600">
            &copy; 2026 PPLG Store. Built with ❤️ for PPLG Project.
        </div>
    </footer>

    <!-- Filter JavaScript -->
    <script>
        function filterProducts() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const items = document.getElementsByClassName('product-item');

            for (let i = 0; i < items.length; i++) {
                const name = items[i].getAttribute('data-name');
                if (name.includes(input)) {
                    items[i].style.display = "flex";
                } else {
                    items[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
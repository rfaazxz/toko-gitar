    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Edit Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body class="bg-light py-5">
        <div class="container" style="max-width: 700px;">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h3 class="fw-bold text-dark mb-4"><i class="fa-solid fa-pen-to-square text-primary me-2"></i>Edit Produk</h3>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Elektrik" {{ old('kategori', $produk->kategori) == 'Elektrik' ? 'selected' : '' }}>Elektrik</option>
                            <option value="Aksesoris" {{ old('kategori', $produk->kategori) == 'Akustik' ? 'selected' : '' }}>Akustik</option>
                            <option value="Penyimpanan" {{ old('kategori', $produk->kategori) == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ganti Foto Produk (Opsional)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        @if($produk->gambar)
                            <small class="text-muted d-block mt-1">Foto saat ini ada. Unggah foto baru jika ingin mengganti.</small>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary fw-bold w-100">Update Produk</button>
                        <a href="/produk" class="btn btn-outline-secondary w-100">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
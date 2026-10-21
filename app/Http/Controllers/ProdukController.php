<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // 1. Landing Page
    public function landing(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_produk', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $produks = $query->latest()->get();
        $kategoriList = Produk::select('kategori')->distinct()->pluck('kategori');

        return view('landing', compact('produks', 'kategoriList'));
    }

    // 2. Dashboard Admin (READ & Filter/Search)
    public function index(Request $request)
    {
        $query = Produk::query();

        // Pencarian
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_produk', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Sorting / Pengurutan
        if ($request->filled('sort')) {
            if ($request->sort == 'harga_asc') {
                $query->orderBy('harga', 'asc');
            } elseif ($request->sort == 'harga_desc') {
                $query->orderBy('harga', 'desc');
            } elseif ($request->sort == 'stok_asc') {
                $query->orderBy('stok', 'asc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $produks = $query->get();

        // Hitung Statistik untuk Widget Dashboard Admin
        $totalProduk = Produk::count();
        $totalAset = Produk::selectRaw('SUM(harga * stok) as total')->value('total') ?? 0;
        $stokHabis = Produk::where('stok', 0)->count();

        $kategoriList = Produk::select('kategori')->distinct()->pluck('kategori');

        return view('produk.index', compact('produks', 'totalProduk', 'totalAset', 'stokHabis', 'kategoriList'));
    }

    // 3. Form Tambah Produk
    public function create()
    {
        return view('produk.create');
    }

    // 4. Proses Simpan Produk (CREATE)
    public function store(Request $request)
    {
        // Validasi mendukung input 'nama' maupun 'nama_produk'
        $request->validate([
            'nama'        => 'nullable|min:3',
            'nama_produk' => 'nullable|min:3',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'kategori'    => 'required',
            'deskripsi'   => 'nullable',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Mengambil nilai nama produk (baik dari input 'nama' atau 'nama_produk')
        $namaInput = $request->input('nama') ?? $request->input('nama_produk');

        if (!$namaInput) {
            return back()->withErrors(['nama' => 'Nama produk wajib diisi!'])->withInput();
        }

        $data = [
            'nama'      => $namaInput,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi ?? '',
        ];

        // Penanganan upload gambar/foto
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        } elseif ($request->hasFile('foto')) {
            $data['gambar'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect('/produk')->with('success', '⚡ Produk baru berhasil ditambahkan!');
    }

    // 5. Form Edit Produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // 6. Proses Update Produk (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'        => 'nullable|min:3',
            'nama_produk' => 'nullable|min:3',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'kategori'    => 'required',
            'deskripsi'   => 'nullable',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $produk = Produk::findOrFail($id);
        
        $namaInput = $request->input('nama') ?? $request->input('nama_produk') ?? $produk->nama;

        $data = [
            'nama'      => $namaInput,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi ?? $produk->deskripsi,
        ];

        // Penanganan upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        } elseif ($request->hasFile('foto')) {
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect('/produk')->with('success', '✨ Data produk berhasil diperbarui!');
    }

    // 7. Hapus Produk (DELETE)
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        
        $fileFoto = $produk->gambar ?? $produk->foto;
        if ($fileFoto && Storage::disk('public')->exists($fileFoto)) {
            Storage::disk('public')->delete($fileFoto);
        }

        $produk->delete();

        return redirect('/produk')->with('success', '🗑️ Produk berhasil dihapus!');
    }
}
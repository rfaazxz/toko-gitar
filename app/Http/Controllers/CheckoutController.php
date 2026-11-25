<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show(Produk $produk)
    {
        return view('checkout.show', compact('produk'));
    }

    public function process(Request $request, Produk $produk)
    {
        $maxStok = max(1, (int) ($produk->stok ?? 1));

        $validated = $request->validate([
            'nama_pembeli'    => 'required|string|max:120',
            'email_pembeli'   => 'required|email|max:120',
            'no_hp'           => 'required|string|max:30',
            'alamat'          => 'required|string|max:500',
            'metode_bayar'    => 'required|in:bank_transfer,qris_dummy,ewallet_dummy',
            'qty'             => 'required|integer|min:1|max:' . $maxStok,
        ]);

        if (($produk->stok ?? 0) < $validated['qty']) {
            return back()
                ->withInput()
                ->with('error', 'Stok produk tidak mencukupi untuk jumlah yang dipilih.');
        }

        $orderData = DB::transaction(function () use ($produk, $validated) {
            $freshProduk = Produk::whereKey($produk->id)->lockForUpdate()->firstOrFail();

            if (($freshProduk->stok ?? 0) < $validated['qty']) {
                throw new \RuntimeException('Stok baru saja habis.');
            }

            $freshProduk->decrement('stok', $validated['qty']);

            $hargaSatuan = (float) ($freshProduk->harga ?? 0);
            $subtotal    = $hargaSatuan * $validated['qty'];
            $biayaAdmin  = 2500;
            $totalBayar  = $subtotal + $biayaAdmin;

            return [
                'invoice'       => 'FF-DUMMY-' . strtoupper(Str::random(6)),
                'waktu_bayar'   => now()->format('d M Y H:i:s'),
                'produk_nama'   => $freshProduk->nama ?? $freshProduk->nama_produk ?? 'Instrumen',
                'kategori'      => $freshProduk->kategori ?? '-',
                'harga_satuan'  => $hargaSatuan,
                'qty'           => $validated['qty'],
                'subtotal'      => $subtotal,
                'biaya_admin'   => $biayaAdmin,
                'total_bayar'   => $totalBayar,
                'metode_bayar'  => $validated['metode_bayar'],
                'nama_pembeli'  => $validated['nama_pembeli'],
                'email_pembeli' => $validated['email_pembeli'],
                'no_hp'         => $validated['no_hp'],
                'alamat'        => $validated['alamat'],
            ];
        });

        return view('checkout.show', [
            'produk'  => $produk->fresh(),
            'success' => true,
            'order'   => $orderData,
        ]);
    }
}
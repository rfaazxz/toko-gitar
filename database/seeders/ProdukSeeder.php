<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Mouse Logitech G102', 'harga' => 250000, 'stok' => 15, 'kategori' => 'Aksesoris', 'deskripsi' => 'Mouse gaming RGB dengan sensor presisi.'],
            ['nama' => 'Keyboard Mechanical Keychron K2', 'harga' => 1200000, 'stok' => 8, 'kategori' => 'Aksesoris', 'deskripsi' => 'Keyboard wireless mechanical layout 75%.'],
            ['nama' => 'Monitor Dell 24 Inch IPS', 'harga' => 1850000, 'stok' => 5, 'kategori' => 'Elektronik', 'deskripsi' => 'Monitor Full HD 75Hz panel IPS.'],
            ['nama' => 'Headset SteelSeries Arctis 3', 'harga' => 850000, 'stok' => 10, 'kategori' => 'Aksesoris', 'deskripsi' => 'Headset gaming nyaman dengan mic noise cancelling.'],
            ['nama' => 'Laptop ASUS Vivobook 14', 'harga' => 7500000, 'stok' => 4, 'kategori' => 'Elektronik', 'deskripsi' => 'Laptop harian cepat dengan prosesor Intel Core i3.'],
            ['nama' => 'Flashdisk SanDisk 64GB', 'harga' => 85000, 'stok' => 30, 'kategori' => 'Penyimpanan', 'deskripsi' => 'Flashdisk USB 3.0 transfer cepat.'],
            ['nama' => 'SSD NVMe Samsung 500GB', 'harga' => 750000, 'stok' => 12, 'kategori' => 'Penyimpanan', 'deskripsi' => 'SSD internal M.2 kecepatan tinggi.'],
            ['nama' => 'Webcam Logitech C920', 'harga' => 950000, 'stok' => 7, 'kategori' => 'Elektronik', 'deskripsi' => 'Webcam Full HD 1080p untuk streaming dan meeting.'],
            ['nama' => 'Mousepad Gaming XL', 'harga' => 60000, 'stok' => 25, 'kategori' => 'Aksesoris', 'deskripsi' => 'Mousepad ukuran besar bahan kain berkualitas.'],
            ['nama' => 'Kabel HDMI 2.0 2 Meter', 'harga' => 45000, 'stok' => 50, 'kategori' => 'Aksesoris', 'deskripsi' => 'Kabel HDMI mendukung resolusi 4K 60Hz.'],
        ];

        foreach ($data as $item) {
            Produk::create($item);
        }
    }
}
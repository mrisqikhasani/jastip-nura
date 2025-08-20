<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'nama_produk' => 'Cardigan Rajut Rib Motif Serong',
                'harga' => 150000,
                'deskripsi' => 'Cardigan rajut dengan motif serong elegan dan kancing kristal yang memberi kesan mewah dan feminin. Cocok untuk tampilan hangat namun tetap stylish.',
                'kategori' => 'atasan',
                'ukuran' => 'All Size (fit to M–L)',
                'foto' => 'products/atasan-1.jpg',
            ],
            [
                'nama_produk' => 'Rok Tweed Hitam Putih Rantai',
                'harga' => 170000,
                'deskripsi' => 'Rok mini berbahan tweed motif kotak dengan detail rantai emas dan pita hitam yang elegan. Cocok untuk tampilan semi-formal atau kasual chic.',
                'kategori' => 'bawahan',
                'ukuran' => 'Lingkar pinggang ±64–72 cm, panjang rok ±40 cm',
                'foto' => 'products/bawahan-1.jpg',
            ],
            [
                'nama_produk' => 'Hand & Body Lotion 12 Vitamin',
                'harga' => 35000,
                'deskripsi' => 'Lotion ringan dengan kandungan vitamin C dan E, cepat meresap dan cocok untuk perawatan harian.',
                'kategori' => 'bodycare',
                'ukuran' => '100g',
                'foto' => 'products/bodycare-1.jpg',
            ],
            [
                'nama_produk' => 'Coconut Deep Aqua Mask',
                'harga' => 8000,
                'deskripsi' => 'Masker wajah dengan kandungan ekstrak kelapa yang kaya akan kelembapan alami, membantu menghidrasi kulit kering dan menjaga elastisitas wajah. Cocok untuk semua jenis kulit, direkomendasikan digunakan 2–3 kali seminggu.',
                'kategori' => 'skincare',
                'ukuran' => '30g',
                'foto' => 'products/skincare-1.jpg',
            ],
        ]);
    }
}

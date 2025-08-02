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
                'name' => 'Cardigan Rajut Rib Motif Serong',
                'price' => 150000,
                'description' => 'Cardigan rajut dengan motif serong elegan dan kancing kristal yang memberi kesan mewah dan feminin. Cocok untuk tampilan hangat namun tetap stylish.',
                'category' => 'atasan',
                'size' => 'All Size (fit to M–L)',
                'image' => '/storage/product/atasan-1.jpg',
            ],
            [
                'name' => 'Rok Tweed Hitam Putih Rantai',
                'price' => 170000,
                'description' => 'Rok mini berbahan tweed motif kotak dengan detail rantai emas dan pita hitam yang elegan. Cocok untuk tampilan semi-formal atau kasual chic.',
                'category' => 'bawahan',
                'size' => 'Lingkar pinggang ±64–72 cm, panjang rok ±40 cm',
                'image' => '/storage/product/bawahan-1.jpg',
            ],
            [
                'name' => 'Hand & Body Lotion 12 Vitamin',
                'price' => 35000,
                'description' => 'Lotion ringan dengan kandungan vitamin C dan E, cepat meresap dan cocok untuk perawatan harian.',
                'category' => 'bodycare',
                'size' => '100g',
                'image' => '/storage/product/bodycare-1.jpg',
            ],
            [
                'name' => 'Coconut Deep Aqua Mask',
                'price' => 8000,
                'description' => 'Masker wajah dengan kandungan ekstrak kelapa yang kaya akan kelembapan alami, membantu menghidrasi kulit kering dan menjaga elastisitas wajah.',
                'category' => 'skincare',
                'size' => '30g',
                'image' => '/storage/product/skincare-1.jpg',
            ],
        ]);
    }
}

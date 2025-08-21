<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //get home
    public function index()
    {
        $recommendedProducts = Product::inRandomOrder()->limit(4)->get();
        return view('home', compact('recommendedProducts'));
    }

    public function catalog()
    {
        // Get enum values from 'category' column in 'products' table
        $typeValueCategories = \DB::select("SHOW COLUMNS FROM produk WHERE Field = 'kategori'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $typeValueCategories, $matches);

        $categories = [];
        if (!empty($matches[1])) {
            $categories = array_map(function ($value) {
                return trim($value, "'");
            }, explode(',', $matches[1]));
        }

        $products = Product::all();

        // Optional: hitung jumlah produk per kategori
        $categoryCounts = Product::select('kategori', \DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori')
            ->toArray();

        return view('catalog', compact('products', 'categories', 'categoryCounts'));
    }

    public function productDetail($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            // Handle not found, you can redirect or show 404
            abort(404, 'Product not found');
        }

        $relatedProducts = Product::where('kategori', $product->kategori)
            ->where('id_produk', '!=', $product->id_produk)
            ->limit(4)
            ->get();

        return view('productdetail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

}

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
        $typeValueCategories = \DB::select("SHOW COLUMNS FROM products WHERE Field = 'category'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $typeValueCategories, $matches);

        $categories = [];
        if (!empty($matches[1])) {
            $categories = array_map(function ($value) {
                return trim($value, "'");
            }, explode(',', $matches[1]));
        }

        $products = Product::all();

        // Optional: hitung jumlah produk per kategori
        $categoryCounts = Product::select('category', \DB::raw('count(*) as total'))
            ->groupBy('category')
            ->pluck('total', 'category')
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

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('productdetail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

}

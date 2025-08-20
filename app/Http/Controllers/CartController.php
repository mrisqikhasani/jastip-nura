<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartLineItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $cart = Cart::with('cartLineItems.product')
            ->where('id_pelanggan', Auth::id())
            ->first();

        $cartItems = $cart ? $cart->cartLineItems : collect();

        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart', compact('cartItems', 'subtotal'));
    }

    public function store(Request $request)
    {
         if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        try {
            $validated = $request->validate([
                'id_produk' => 'required|exists:products,id',
                'kuantitas' => 'required|integer|min:1',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors(),
            ], 422);
        }

        try {
            $cart = Cart::firstOrCreate(
                ['id_pelanggan' => Auth::id()],
                ['total_harga' => 0] // Default value saat pertama kali dibuat
                );

            $item = $cart->cartLineItems()
                ->where('id_produk', $validated['id_produk'])
                ->first();

            if ($item) {
                $item->increment('kuantitas', $validated['kuantitas']);
            } else {
                // Calculate sub_price based on product price and quantity
                $product = Product::findOrFail($validated['id_produk']);
                $cart->cartLineItems()->create([
                    'id_produk' => $validated['id_produk'],
                    'kuantitas' => $validated['kuantitas'],
                    'subtotal' => $product->price * $validated['kuantitas'],
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menambahkan produk ke keranjang.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $itemId)
    {
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'action' => 'required|in:plus,minus',
        ]);

        $item = CartLineItem::with('product', 'cart')
            ->whereHas('cart', function ($query) {
                $query->where('id_pelanggan', Auth::id());
            })->findOrFail($itemId);

        if ($validated['action'] === 'plus') {
            $item->increment('kuantitas');
        } else {
            $item->update(['kuantitas' => max(1, $item->quantity - 1)]);
        }

        $newTotal = $item->product->price * $item->quantity;

        $subtotal = $item->cart->cartLineItems->sum(fn($i) => $i->product->price * $i->quantity);

        return response()->json([
            'success' => true,
            'newQuantity' => $item->quantity,
            'newTotal' => $newTotal,
            'subtotal' => $subtotal,
        ]);
    }
}

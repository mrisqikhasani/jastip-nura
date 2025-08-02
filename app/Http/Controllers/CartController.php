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
            ->where('user_id', Auth::id())
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
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
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
                ['user_id' => Auth::id()],
                ['total_price' => 0] // Default value saat pertama kali dibuat
                );

            $item = $cart->cartLineItems()
                ->where('product_id', $validated['product_id'])
                ->first();

            if ($item) {
                $item->increment('quantity', $validated['quantity']);
            } else {
                // Calculate sub_price based on product price and quantity
                $product = Product::findOrFail($validated['product_id']);
                $cart->cartLineItems()->create([
                    'product_id' => $validated['product_id'],
                    'quantity' => $validated['quantity'],
                    'sub_price' => $product->price * $validated['quantity'],
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
                $query->where('user_id', Auth::id());
            })->findOrFail($itemId);

        if ($validated['action'] === 'plus') {
            $item->increment('quantity');
        } else {
            $item->update(['quantity' => max(1, $item->quantity - 1)]);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('cartLineItems.product')
            ->where('user_id', auth()->id())
            ->first();

        $cartItems = $cart ? $cart->cartLineItems : collect();

        $subtotal = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        }, 0);

        return view('cart', compact('cartItems', 'subtotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', auth()->id())->first();

        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id(),
            ]);
        }

        $cartLineItem = $cart->cartLineItems()
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartLineItem) {
            $cartLineItem->quantity += $request->quantity;
            $cartLineItem->save();
        } else {
            $cart->cartLineItems()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart.'
        ]);
    }



    public function update(Request $request, $id)
    {
        try {
            $item = Cart::find($id);
            if (!$item) {
                return response()->json(['error' => 'Item not found'], 404);
            }

            // Optional: test if product exists
            $product = $item->product;
            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            if ($request->action === 'plus') {
                $item->quantity += 1;
            } elseif ($request->action === 'minus') {
                $item->quantity = max(1, $item->quantity - 1);
            }

            $item->save();

            $newTotal = $product->price * $item->quantity;

            $subtotal = Cart::with('product')->get()->reduce(function ($carry, $cart) {
                return $carry + ($cart->product->price * $cart->quantity);
            }, 0);

            return response()->json([
                'success' => true,
                'newQuantity' => $item->quantity,
                'newTotal' => $newTotal,
                'subtotal' => $subtotal,
            ]);

        } catch (\Exception $e) {
            \Log::error('Cart update error: ' . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }



}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //order histoy account profile
    public function orderUser(Request $request)
    {
        $user = Auth::user();

        $orders = Order::with(['orderLineItems.product'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.orderhistory', compact('orders', 'user'));
    }

    // order defail account profile
    public function orderDetail($orderId)
    {
        $user = Auth::user();

        $order = Order::with(['orderLineItems.product', 'shippingAddress'])
            ->where('user_id', $user->id)
            ->where('id', $orderId)
            ->firstOrFail();

        return view('profile.orderorview', compact('order', 'user'));
    }

    // Checkout page to order
    public function checkoutOrderpage()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('checkout');
    }

    public function checkoutOrderSuccessPage($orderId)
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        $order = Order::find($orderId);

        return view('checkoutsucess', compact('order')); 
    }

    public function showUploadForm(Order $order)
    {
        return view('paymentupload', compact('order'));
    }
}

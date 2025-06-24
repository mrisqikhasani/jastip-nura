<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function orderUser(Request $request)
    {
        $user = Auth::user();

        // Ambil order dengan relasi line items & product
        $orders = Order::with(['orderLineItems.product'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.orderhistory', compact('orders','user'));
    }
}

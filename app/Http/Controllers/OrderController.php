<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;


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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        $order = Order::find($orderId);

        return view('checkoutsucess', compact('order'));
    }

    public function showUploadForm(Order $order)
    {
        return view('paymentupload', compact('order'));
    }
    public function processUpload(Request $request, Order $order)
    {
        try {
            // Validasi input
            $request->validate([
                'proof' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            ]);

            // Hapus file lama jika ada
            if ($order->payments_proof && Storage::disk('public')->exists($order->payments_proof)) {
                Storage::disk('public')->delete($order->payments_proof);
            }

            // Simpan file baru
            $path = $request->file('proof')->store('payment_proofs', 'public');

            // Update order
            $order->update([
                'payments_proofs' => $path,
                'status' => 'Diproses',
            ]);

            return redirect('/account/order/' . $order->id)
                ->with('success', 'Bukti transfer berhasil diunggah!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'upload_error' => 'Gagal mengunggah bukti transfer. ' . $e->getMessage()
            ]);
        }
    }

}

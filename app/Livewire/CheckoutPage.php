<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderLineItem;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

class CheckoutPage extends Component
{
    public $cart;
    public $address;
    public $selectedAddressId;
    public $selectedPaymentMethod = 'cod'; // default
    public $total;

    public function mount()
    {
        $this->cart = Cart::with('cartLineItems.product')
            ->where('user_id', auth()->id())
            ->first();

        $this->address = auth()->user()->address;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = $this->cart->cartLineItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }

    public function placeOrder()
    {
        $this->validate([
            'selectedAddressId' => 'required|exists:address,id',
            'selectedPaymentMethod' => 'required|string',
        ]);

        $order = null;
        DB::transaction(function () use (&$order) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'shipping_address_id' => $this->selectedAddressId,
                'payment_method' => $this->selectedPaymentMethod,
                'status' => 'Menunggu',
                'order_date' => now(),
                'total_price' => $this->total,
            ]);

            foreach ($this->cart->cartLineItems as $item) {
                OrderLineItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'sub_price' => $item->product->price * $item->quantity,
                ]);
            }

            $this->cart->total_price = 0;
            $this->cart->save();

            // Kosongkan keranjang
            $this->cart->cartLineItems()->delete();
        });

        session()->flash('success', 'Order berhasil dibuat!');
        return redirect()->to("/checkout/{$order->id}/success");
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}

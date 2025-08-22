<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartLineItem;

class CartLivewire extends Component
{
    public $cart;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = Cart::with('cartLineItems.product')
            ->where('id_pengguna', auth()->id())
            ->first();

        if ($this->cart) {
            $subtotal = $this->cart->cartLineItems->sum(fn($item) => $item->product->harga * $item->kuantitas);
            $this->cart->total_harga = $subtotal;
            $this->cart->save();
        }
    }

    public function increment($lineItemId)
    {
        $lineItem = CartLineItem::findOrFail($lineItemId);
        $lineItem->kuantitas += 1;
        $lineItem->save();
        $this->loadCart();
    }

    public function decrement($lineItemId)
    {
        $lineItem = CartLineItem::findOrFail($lineItemId);

        if ($lineItem->kuantitas > 1) {
            $lineItem->kuantitas -= 1;
            $lineItem->save();
        } else {
            $lineItem->delete(); 
        }

        $this->loadCart();
    }

    public function deleteItem($lineItemId)
    {
        CartLineItem::where('id_detail_keranjang', $lineItemId)
            ->whereHas('cart', fn ($q) => $q->where('id_pengguna', auth()->id()))
            ->delete();

        $this->loadCart();
    }

    public function prosesCheckout()
    {
        return redirect('/checkout');
    }

    public function render()
    {
        return view('livewire.cart-livewire');
    }
}

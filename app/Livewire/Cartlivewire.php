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
            ->where('user_id', auth()->id())
            ->first();

        if ($this->cart) {
            $subtotal = $this->cart->cartLineItems->sum(fn($item) => $item->product->price * $item->quantity);
            $this->cart->total_price = $subtotal;
            $this->cart->save();
        }
    }

    public function increment($lineItemId)
    {
        $lineItem = CartLineItem::findOrFail($lineItemId);
        $lineItem->quantity += 1;
        $lineItem->save();
        $this->loadCart();
    }

    public function decrement($lineItemId)
    {
        $lineItem = CartLineItem::findOrFail($lineItemId);

        if ($lineItem->quantity > 1) {
            $lineItem->quantity -= 1;
            $lineItem->save();
        } else {
            $lineItem->delete(); 
        }

        $this->loadCart();
    }

    public function deleteItem($lineItemId)
    {
        CartLineItem::where('id', $lineItemId)
            ->whereHas('cart', fn ($q) => $q->where('user_id', auth()->id()))
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

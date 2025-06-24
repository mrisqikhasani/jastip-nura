<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;


class CartRow extends Component
{
    public $cartItem;

    public function mount($cartItem)
    {
        $this->cartItem = $cartItem;
    }

    public function increaseQty()
    {
        $this->cartItem->quantity += 1;
        $this->cartItem->save();
    }

    public function decreaseQty()
    {
        if ($this->cartItem->quantity > 1) {
            $this->cartItem->quantity -= 1;
            $this->cartItem->save();
        }
    }

    public function render()
    {
        return view('livewire.cart-row');
    }
}

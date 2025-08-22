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
            ->where('id_pengguna', auth()->id())
            ->first();

        $this->address = auth()->user()->address;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = $this->cart->cartLineItems->sum(function ($item) {
            return $item->product->harga * $item->kuantitas;
        });
    }

    public function placeOrder()
    {
        try {
            $this->validate([
                'selectedAddressId' => 'required|exists:alamat,id_alamat',
                'selectedPaymentMethod' => 'required|string',
            ], [
                'selectedAddressId.required' => 'Silakan pilih alamat pengiriman.',
                'selectedAddressId.exists' => 'Alamat yang dipilih tidak valid.',
                'selectedPaymentMethod.required' => 'Metode pembayaran wajib dipilih.',
            ]);

            if (!$this->cart || $this->cart->cartLineItems->isEmpty()) {
                $this->addError('cart', 'Keranjang masih kosong, tidak bisa membuat pesanan.');
                return;
            }

            $order = null;
            DB::transaction(function () use (&$order) {
                $order = Order::create([
                    'id_pengguna' => auth()->id(),
                    'id_alamat' => $this->selectedAddressId,
                    'metode_pembayaran' => $this->selectedPaymentMethod,
                    'status' => 'Menunggu',
                    'tanggal_pemesanan' => now(),
                    'total_harga' => $this->total,
                ]);

                foreach ($this->cart->cartLineItems as $item) {
                    OrderLineItem::create([
                        'id_pesanan' => $order->id_pesanan,
                        'id_produk' => $item->id_produk,
                        'kuantitas' => $item->kuantitas,
                        'subtotal' => $item->product->harga * $item->kuantitas,
                    ]);
                }

                $this->cart->total_harga = 0;
                $this->cart->save();

                // Kosongkan keranjang
                $this->cart->cartLineItems()->delete();
            });

            session()->flash('success', 'Order berhasil dibuat!');
            return redirect()->to("/checkout/{$order->id_pesanan}/success");
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error validasi otomatis ditangani Livewire, bisa custom kalau mau
            throw $e;
        } catch (\Exception $e) {
            // Tangani error tak terduga
            session()->flash('error', 'Terjadi kesalahan saat membuat pesanan. Silakan coba lagi.');
            \Log::error('Checkout Error: ' . $e->getMessage());
            return;
        }
    }


    public function render()
    {
        return view('livewire.checkout-page');
    }
}

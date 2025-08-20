<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cart;
use App\Models\Product;

class CartLineItem extends Model
{
    protected $table = 'detail_keranjang';

    protected $fillable = [
        'id_keranjang',
        'id_produk',
        'kuantitas',
        'subtotal',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

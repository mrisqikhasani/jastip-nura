<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cart;
use App\Models\Product;

class CartLineItem extends Model
{
    protected $table = 'cart_line_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'sub_price',
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

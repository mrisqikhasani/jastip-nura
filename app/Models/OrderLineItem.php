<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderLineItem extends Model
{
    protected $table = 'order_line_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'sub_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Address;
use App\Models\User;
use App\Models\OrderLineItem;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'payment_method',
        'status',
        'order_date',
        'shipping_address_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function orderLineItems()
    {
        return $this->hasMany(OrderLineItem::class);
    }
}

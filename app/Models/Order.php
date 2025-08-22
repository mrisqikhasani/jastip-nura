<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Address;
use App\Models\User;
use App\Models\OrderLineItem;

class Order extends Model
{
    protected $table = 'pesanan';

    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_pengguna',
        'total_harga',
        'metode_pembayaran',
        'status',
        'tanggal_pemesanan',
        'id_alamat',
        'bukti_pembayaran',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'id_alamat');
    }

    public function orderLineItems()
    {
        return $this->hasMany(OrderLineItem::class, 'id_pesanan');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;


class Cart extends Model
{
    //
    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';

    protected $fillable = [
        'id_pengguna',
        'total_harga',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cartLineItems(): HasMany
    {
        return $this->hasMany(CartLineItem::class);
    }

}
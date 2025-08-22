<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk'; 

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'ukuran',
        'harga',
        'deskripsi',
        'kategori',
        'foto',
    ];
}

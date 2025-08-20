<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    protected $table = 'alamat';

    protected $fillable = [
        'id_pelanggan',
        'nama_penerima',
        'nomor_telepon',
        'provinsi',
        'kota',
        'kode_pos',
        'detail_alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

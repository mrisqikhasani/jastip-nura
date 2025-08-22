<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    protected $table = 'alamat';

    protected $primaryKey = 'id_alamat';

    protected $fillable = [
        'id_pengguna',
        'nama_penerima',
        'nomor_telepon',
        'provinsi',
        'kota',
        'kode_pos',
        'detail_alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id_pengguna');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'user_id',
        'receiver_name',
        'phone_number',
        'province',
        'city',
        'postal_code',
        'detail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

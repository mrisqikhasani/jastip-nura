<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama_lengkap',
        'nama_pengguna',
        'email',
        'password',
        'peran',
        'nomor_telepon',
        'foto_profil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'id_pengguna', 'id_pengguna');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id_pengguna', 'id_pengguna');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_pengguna', 'id_pengguna');
    }



    // ==================================================
    // filament

    public function getFilamentName(): string
    {
        return $this->getAttributeValue('nama_lengkap');
    }

    public function getNameAttribute():string
    {
        return $this->nama_lengkap;
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return $this->peran === 'admin';
    }

}

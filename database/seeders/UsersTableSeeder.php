<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'adminura@gmail.com')->exists()) {
            User::create([
                'nama_lengkap' => 'Admin Jastip',
                'email' => 'adminura@gmail.com',
                'password' => Hash::make('@dm1n123'),
                'peran' => 'admin', 
                'nomor_telepon' => '0838555936', 
            ]);
        }

        if (!User::where('email', 'nrsenita@gmail.com')->exists()) {
            User::create([
                'nama_lengkap' => 'Noor Senita',
                'email' => 'nrsenita@gmail.com',
                'password' => Hash::make('@Noor008'),
                'peran' => 'pelanggan',
                'nomor_telepon' => '0878555637',
            ]);
        }
    }
}

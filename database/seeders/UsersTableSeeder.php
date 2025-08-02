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
                'name' => 'Admin Jastip',
                'email' => 'adminura@gmail.com',
                'username' => 'adminura',
                'password' => Hash::make('@dm1n123'),
                'role' => 'admin', 
                'phone_number' => '081234567890', 
            ]);
        }

        if (!User::where('email', 'nrsenita@gmail.com')->exists()) {
            User::create([
                'name' => 'Noor Senita',
                'email' => 'nrsenita@gmail.com',
                'username' => 'nrsenita',
                'password' => Hash::make('@Noor008'),
                'role' => 'user',
                'phone_number' => '081234567890',
            ]);
        }
    }
}

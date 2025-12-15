<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin E-Commerce',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'Agatha Bellen',
            'email' => 'agatha@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

        User::create([
            'name' => 'Rafi Hidayat',
            'email' => 'rafi@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

    }
}

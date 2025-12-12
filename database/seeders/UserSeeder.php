<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin 
        User::firstOrCreate(
            ['email' => 'theodoraaulia@gmail.com'],
            [
                'name' => 'Theodora Aurelia',
                'password' => Hash::make('aureliathe123'),
                'role' => 'admin',
            ]
        );

        // 2. Member 1
        User::firstOrCreate(
            ['email' => 'elenorakriya@gmail.com'],
            [
                'name' => 'Kriya Elenora',
                'password' => Hash::make('elenoraa456'),
                'role' => 'member',
            ]
        );

        // 3. Member 2
        User::firstOrCreate(
            ['email' => 'tiaraputri@gmail.com'],
            [
                'name' => 'Tiara Nadya Putri',
                'password' => Hash::make('tiaranadya789'),
                'role' => 'member',
            ]
        );
    }
}

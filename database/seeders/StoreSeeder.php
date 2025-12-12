<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $owner = User::where('email', 'elenorakriya@gmail.com')->first();

        if (!$owner) return;
        
        Store::firstOrCreate(
            ['user_id' => $owner->id], 
            [
                'name' => 'Ethereal Stationary',
                'logo' => 'public/assets/images/logo.png', 
                'about' => 'Menyediakan Berbagai Macam Alat Tulis dan Stationary',
                'phone' => '081234567890',
                'city' => 'Jakarta',
                'address_id' => 1,
                'address' => 'Jl. Melati No. 23',
                'postal_code' => '12345',
                'is_verified' => true,
            ]
        );
    }
}
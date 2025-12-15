<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        Store::create([
            'user_id' => 2,
            'name' => 'Barenbliss',
            'logo' => 'assets/images/logo-barenbliss.jpeg',
            'about' => 'barenbliss adalah brand kecantikan asal Korea yang menawarkan skincare dan makeup clean beauty dengan kandungan aman, vegan-friendly, dan fokus pada hasil natural glow.',
            'phone' => '081234567890',

            'address_id' => 'ADDR-001',
            'city' => 'Jakarta Selatan',
            'address' => 'Jl. Jenderal Sudirman No. 1, SCBD',
            'postal_code' => '12190',

            'is_verified' => true,
        ]);


    }
}

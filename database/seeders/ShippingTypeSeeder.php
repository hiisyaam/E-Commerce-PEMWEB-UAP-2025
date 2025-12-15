<?php

namespace Database\Seeders;

use App\Models\ShippingType;
use Illuminate\Database\Seeder;

class ShippingTypeSeeder extends Seeder
{
    public function run(): void
    {
        ShippingType::create(['name' => 'Regular', 'price' => 10000]);
        ShippingType::create(['name' => 'Express', 'price' => 20000]);
        ShippingType::create(['name' => 'Kargo', 'price' => 15000]);
    }
}

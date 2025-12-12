<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShippingType;

class ShippingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShippingType::firstOrCreate(['name' => 'Regular'], ['cost' => 10000]);
        ShippingType::firstOrCreate(['name' => 'Express'], ['cost' => 20000]);
    }
}

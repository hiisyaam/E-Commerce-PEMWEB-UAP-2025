<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\StoreBalance;

class StoreBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Store::all() as $store) {
            StoreBalance::firstOrCreate(
            ['store_id' => $store->id],
            ['balance' => 0]
            );
    }
}
}
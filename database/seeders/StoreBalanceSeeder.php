<?php

namespace Database\Seeders;

use App\Models\StoreBalance;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreBalanceSeeder extends Seeder
{
    public function run(): void
    {
        $store = Store::first();
        StoreBalance::create([
            'store_id' => $store->id,
            'balance' => 0
        ]);

    }
}

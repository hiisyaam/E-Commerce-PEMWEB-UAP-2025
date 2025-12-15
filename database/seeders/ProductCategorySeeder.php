<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Cleanser' => 'Produk pembersih wajah.',
            'Toner' => 'Produk untuk menyeimbangkan pH kulit.',
            'Serum' => 'Produk dengan konsentrasi bahan aktif tinggi.',
            'Moisturizer' => 'Produk pelembap untuk menjaga hidrasi kulit.',
            'Sunscreen' => 'Produk pelindung kulit dari sinar UV.',
        ];

        foreach ($categories as $name => $desc) {
            ProductCategory::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $desc,
            ]);
        }
    }
}

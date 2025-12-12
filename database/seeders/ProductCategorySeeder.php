<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pulpen', 
            'Buku', 
            'Pensil', 
            'Highlighter', 
            'Washie-tape'
        ];

        foreach ($categories as $name) {
            ProductCategory::updateOrCreate(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'description' => "Kategori untuk $name"
                ]
            );
        }
    }
    
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            1 => [
                ['file' => 'Skintific-cleanser.png', 'thumbnail' => true],
            ],
            2 => [
                ['file' => 'Cosrx-cleanser.jpg', 'thumbnail' => true],
            ],
            3 => [
                ['file' => 'Somethinc-Toner.jpg', 'thumbnail' => true],
            ],
            4 => [
                ['file' => 'Lightening-Toner.jpg', 'thumbnail' => true],
            ],
            5 => [
                ['file' => 'Niacinamid-Serum.jpg', 'thumbnail' => true],
            ],
            6 => [
                ['file' => 'Retinol-Serum.png', 'thumbnail' => true],
            ],
            7 => [
                ['file' => 'Skintific-moist.png', 'thumbnail' => true],
            ],
            8 => [
                ['file' => 'Somethinc-moist.jpg', 'thumbnail' => true],
            ],
            9 => [
                ['file' => 'Azarine-sunscreen.jpg', 'thumbnail' => true],
            ],
            10 => [
                ['file' => 'SkinAqua-sunscreen.jpg', 'thumbnail' => true],
            ],
        ];

        foreach ($images as $productId => $imageList) {
            foreach ($imageList as $img) {
                ProductImage::create([
                    'product_id'   => $productId,
                    'image'        => 'assets/images/products/' . $productId . '/' . $img['file'],
                    'is_thumbnail' => $img['thumbnail'],
                ]);
            }
        }
    }
}

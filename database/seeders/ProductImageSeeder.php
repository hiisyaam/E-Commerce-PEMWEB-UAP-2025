<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            1 => [
                ['file' => 'zebra-sarasa-1.jpg', 'thumbnail' => true],
            ],
            2 => [
                ['file' => 'zebra-kokoro-1.jpeg', 'thumbnail' => true],
            ],
            3 => [
                ['file' => 'sidu-38-lembar.jpg', 'thumbnail' => true],
            ],
            4 => [
                ['file' => 'notebook-a5-1.jpeg', 'thumbnail' => true],
            ],
            5 => [
                ['file' => 'castell-9000.jpg', 'thumbnail' => true],
            ],
            6 => [
                ['file' => 'staedtler-2b.jpg', 'thumbnail' => true],
            ],
            7 => [
                ['file' => 'joyko-hi-69-1.jpeg', 'thumbnail' => true],
            ],
            8 => [
                ['file' => 'kenko-ovaliner.jpeg', 'thumbnail' => true],
            ],
            9 => [
                ['file' => 'washie-tape-pastel.jpeg', 'thumbnail' => true],
            ],
            10 => [
                ['file' => 'washie-tape-flower.jpg', 'thumbnail' => true],
            ],
        ];

        foreach ($images as $productId => $imageList) {
            foreach ($imageList as $img) {
                ProductImage::create([
                    'product_id'   => $productId,
                    'image'        => 'assets/images/' . $productId . '/' . $img['file'],
                    'is_thumbnail' => $img['thumbnail'],
                ]);
            }
        }
    }
}
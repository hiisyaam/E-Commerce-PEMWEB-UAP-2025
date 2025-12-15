<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List produk sementara (tanpa database)
    private $products = [
        1 => [
            'id' => 1,
            'name' => 'PURE CLEANSER',
            'category' => 'Cleanser',
            'price' => 120000,
            'price_before' => 150000,
            'discount' => 20,
            'stock' => 24,
            'images' => [
                'cleanser1.webp',
                'cleanser2.webp',
                'cleanser3.webp'
            ],
            'desc' => 'Pembersih wajah dengan formula lembut yang efektif mengangkat kotoran tanpa membuat kulit kering.'
        ],

        2 => [
            'id' => 2,
            'name' => 'HYDRABOOST SERUM',
            'category' => 'Serum',
            'price' => 180000,
            'price_before' => 200000,
            'discount' => 10,
            'stock' => 12,
            'images' => [
                'serum1.webp',
                'serum2.webp',
                'serum3.webp'
            ],
            'desc' => 'Serum dengan konsentrasi tinggi untuk meningkatkan hidrasi kulit dan menjaga kelembapan sepanjang hari.'
        ],

        3 => [
            'id' => 3,
            'name' => 'MOISTURE LOCK CREAM',
            'category' => 'Moisturizer',
            'price' => 99000,
            'price_before' => 120000,
            'discount' => 18,
            'stock' => 30,
            'images' => [
                'moist1.webp',
                'moist2.webp',
                'moist3.webp'
            ],
            'desc' => 'Krim pelembap yang diformulasikan untuk menjaga kulit tetap halus, lembut, dan ternutrisi.'
        ],
    ];

    /**
     * Menampilkan halaman detail produk
     */
    public function show($id)
    {
        // cek apakah produk ada
        if (!isset($this->products[$id])) {
            return abort(404, "Product not found");
        }

        $product = $this->products[$id];

        return view('customer.product', compact('product'));
    }
}
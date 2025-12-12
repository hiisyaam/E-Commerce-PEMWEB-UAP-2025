<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = Store::first();
        $categories = ProductCategory::all();

        if (!$store || $categories->count() == 0) {
            return;
        }

        $products = [
            [   'name' => 'Pulpen Zebra Kokoro Gel Pen Colors 0.5 mm Isi 10 Pcs', 
                'price' => 60000,
                'stock' => 30,
                'weight' => 100,
                'description' => 'Pulpen gel premium dengan warna tinta cerah, cocok untuk mencatat, journaling, dan membuat highlight tipis. Nyaman digunakan karena tip 0.5 mm yang halus.',
                'category' => 'Pulpen'
            ],
            [   'name' => 'Pulpen Zebra Sarasa Clip 0.5 Retractable Gel Ink', 
                'price' => 177000, 
                'stock' => 43,
                'weight' => 100,
                'description' => 'Pulpen gel retractable dengan tinta pekat, cepat kering, dan nyaman digunakan untuk menulis lama. Clip kuat dan tidak mudah patah.',
                'category' => 'Pulpen'
            ],
            [   'name' => 'Buku Tulis Sidu 38 Lembar (1 Pack Isi 10 Pcs)', 
                'price' => 35000, 
                'stock' => 45,
                'weight' => 200,
                'description' => 'Buku tulis SIDU yang terkenal awet dan nyaman dipakai. Kertas lebih tebal sehingga tidak tembus tinta. Cocok untuk sekolah maupun kuliah.',
                'category' => 'Buku'
            ],
            [   'name' => 'Buku Catatan Notebook A5 Kerja Buku Jurnal', 
                'price' => 54000, 
                'stock' => 50,
                'weight' => 150,
                'description' => 'Notebook ukuran A5 dengan desain minimalis. Kertas premium cocok untuk journaling, to-do list, dan catatan kerja.',
                'category' => 'Buku'
            ],
            [   'name' => 'Faber-Castell Pencil Castell 9000-2B', 
                'price' => 56000, 
                'stock' => 27,
                'weight' => 100,
                'description' => 'Pensil profesional dengan tingkat kekerasan 2B. Cocok untuk sketching, menggambar detail, dan shading.',
                'category' => 'Pensil'
            ],
            [   'name' => 'Pensil 2B Staedtler', 
                'price' => 47000, 
                'stock' => 39,
                'weight' => 200,
                'description' => 'Pensil Staedtler 2B yang lembut dan nyaman digunakan. Cocok untuk ujian, menggambar, dan coretan harian.',
                'category' => 'Pensil'
            ],
            [   'name' => 'Joyko HI-69-6 Erasable Highlighter 1 Set Isi 6 Pcs Dual Tip', 
                'price' => 90000, 
                'stock' => 23,
                'weight' => 60,
                'description' => 'Highlighter dengan dua ujung (dual tip) dan dapat dihapus. Cocok untuk belajar, note warna-warni, dan journaling.',
                'category' => 'Highlighter'
            ],
            [   'name' => 'Highlighter Kenko Ovaliner Pink', 
                'price' => 22000,
                'stock' => 42, 
                'weight' => 100,
                'description' => 'Highlighter warna pink dengan bentuk oval yang ergonomis. Warna stabilo cerah tidak mudah luntur.',
                'category' => 'Highlighter'
            ],
            [   'name' => 'Washie Tape Dekorasi Pastel Kartun Lucu', 
                'price' => 30000, 
                'stock' => 32,
                'weight' => 50,
                'description' => 'Washie tape bermotif kartun lucu dengan warna pastel. Cocok untuk dekorasi jurnal, kartu, dan scrapbook.',
                'category' => 'Washie-tape'
            ],
            [   'name' => 'Washie Tape Spring Flower Romantic Series', 
                'price' => 36000, 
                'stock' => 60,
                'weight' => 70,
                'description' => 'Seri washi tape bertema bunga musim semi dengan warna lembut. Cocok untuk dekorasi atau bullet journal.',
                'category' => 'Washie-tape'
            ],
        ];

        foreach ($products as $p) {

            $category = ProductCategory::where('name', $p['category'])->first();
            $slug = Str::slug($p['category']) . '-' . Str::slug($p['name']);

            Product::firstOrCreate(
                ['name' => $p['name']],
                [
                    'store_id' => $store->id,
                    'product_category_id' => $category->id,
                    'price' => $p['price'],
                    'stock' => $p['stock'],
                    'weight' => $p['weight'] ?? 100,
                    'description' => $p['description'],
                    'slug' => $slug,
                ]
            );
        }
    }
}
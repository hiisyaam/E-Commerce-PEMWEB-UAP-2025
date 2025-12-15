<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $store = Store::first();

        $products = [
            [
                'name' => 'Skintific 5X Ceramide Low pH Cleanser',
                'slug' => 'skintific-cleanser',
                'price' => 65000,
                'description' => 'Cleanser gentle dengan Ceramide untuk skin barrier.',
                'weight' => 120,
                'stock' => 50,
            ],
            [
                'name' => 'Cosrx Low pH Good Morning Gel Cleanser',
                'product_category_id' => 1,
                'price' => 130000,
                'description' => 'Facial wash untuk semua jenis kulit.',
                'weight' => 100,
                'stock' => 40,
            ],
            [
                'name' => 'Harlette Oatmilk Gentle Facial Wash',
                'product_category_id' => 1,
                'price' => 86000,
                'description' => 'Cleanser gentle dengan oatmilk.',
                'weight' => 100,
                'stock' => 30,
            ],
            [
                'name' => 'Skin Game Kind Hydrating Facial Wash',
                'product_category_id' => 1,
                'price' => 124000,
                'description' => 'Membersihkan kulit tanpa menyebabkan kulit kering & ketarik',
                'weight' => 100,
                'stock' => 35,
            ],
            [
                'name' => 'Avoskin Miraculous Refining Toner',
                'product_category_id' => 2,
                'price' => 173000,
                'description' => 'Toner eksfoliasi AHA-BHA-PHA-PGA',
                'weight' => 100,
                'stock' => 25,
            ],
            [
                'name' => 'Pyunkang Yul Essence Toner',
                'product_category_id' => 2,
                'price' => 110000,
                'description' => 'Toner basic yang melembabkan untuk semua jenis kulit.',
                'weight' => 100,
                'stock' => 20,
            ],
            [
                'name' => 'SKIN1004 Madagascar Centella Toning Toner',
                'product_category_id' => 2,
                'price' => 144500,
                'description' => 'Toner dengan kandungan Centella Asiatica.',
                'weight' => 100,
                'stock' => 30,
            ],
            [
                'name' => 'Anua Heartleaf 77% Soothing Toner',
                'product_category_id' => 2,
                'price' => 247000,
                'description' => 'Toner membantu menenangkan kulit sensitif.',
                'weight' => 200,
                'stock' => 25,
            ],
            [
                'name' => 'Avoskin YSB Niacinamide 12%',
                'product_category_id' => 3,
                'price' => 115000,
                'description' => 'Serum pencerah dengan Niacinamide tinggi.',
                'weight' => 50,
                'stock' => 30,
            ],
            [
                'name' => 'Glad2Glow Peach Retinol Serum',
                'product_category_id' => 3,
                'price' => 38000,
                'description' => 'Serum khusus mencegah penuaan.',
                'weight' => 50,
                'stock' => 35,
            ],
            [
                'name' => 'Beauty of Joseon Greentea Calming Serum',
                'product_category_id' => 3,
                'price' => 125000,
                'description' => 'Serum dengan Green Tea Extract membantu mengurangi tampilan minyak di wajah.',
                'weight' => 20,
                'stock' => 25,
            ],
            [
                'name' => 'Elformula Peeling Solution',
                'product_category_id' => 3,
                'price' => 161000,
                'description' => 'Serum membersihkan pori-pori dan meregenerasi kulit wajah.',
                'weight' => 35,
                'stock' => 15,
            ],
            [
                'name' => 'Innisfree Collagen Green Tea Ceramide Bounce Cream',
                'product_category_id' => 4,
                'price' => 368000,
                'description' => 'Moisturizer untuk skin barier agar kulit kencang dan sehat.',
                'weight' => 50,
                'stock' => 15,
            ],
            [
                'name' => 'Laneige Bouncy & Firm Sleeping Mask',
                'product_category_id' => 4,
                'price' => 399000,
                'description' => 'Masker tidur yang dapat merevitalisasi kulit.',
                'weight' => 60,
                'stock' => 15,
            ],
            [
                'name' => 'From This Island Papua Red Fruit Plumping Cream',
                'product_category_id' => 4,
                'price' => 220000,
                'description' => 'Moisturizer meningkatkan produksi kolagen & mengatasi penuaan dini.',
                'weight' => 60,
                'stock' => 30,
            ],
            [
                'name' => 'SKIN1004 Madagascar Centella Cream',
                'product_category_id' => 4,
                'price' => 149000,
                'description' => 'Moisturizer untuk hidrasi dan nutrisi kulit.',
                'weight' => 75,
                'stock' => 25,
            ],
            [
                'name' => 'Labore Acne & Oil Correct Physical Sunscreen SPF50+',
                'product_category_id' => 5,
                'price' => 185000,
                'description' => 'Sunscreen physical acne tanpa menutup pori.',
                'weight' => 40,
                'stock' => 20,
            ],
            [
                'name' => 'Wardah Sunscreen Moisturizer SPF 35',
                'product_category_id' => 5,
                'price' => 40000,
                'description' => 'Sunscreen nyaman dan ringan digunakan setiap hari.',
                'weight' => 35,
                'stock' => 30,
            ],
            [
                'name' => 'Avoskin The Great Shield SPF 50',
                'product_category_id' => 5,
                'price' => 135000,
                'description' => 'Sunscreen waterbased matte dan minimal whitecast.',
                'weight' => 30,
                'stock' => 25,
            ],
            [
                'name' => 'Harlette Oat Probiotic Sunscreen SPF 50',
                'product_category_id' => 5,
                'price' => 153000,
                'description' => 'Sunscreen Lembut dan tidak berbau.',
                'weight' => 40,
                'stock' => 20,
            ],
        ];


        foreach ($products as $item) {
            Product::create([
                'store_id' => $store->id,
                'product_category_id' => $item['product_category_id'],
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => $item['description'],
                'condition' => 'new',
                'price' => $item['price'],
                'weight' => $item['weight'],
                'stock' => $item['stock'],
            ]);
        }

    }
}

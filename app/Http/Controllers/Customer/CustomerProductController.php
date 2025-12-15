<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class CustomerProductController extends Controller
{
    public function show($slug)
    {
        $products = [

            // CLEANSER
            'skintific-cleanser' => [
                'id' => 1,
                'name' => 'Skintific 5X Ceramide Cleanser',
                'category' => 'Cleanser',
                'price' => 65000,
                'stock' => 25,
                'desc' => 'Cleanser dengan 5X ceramide untuk kulit sensitif.',
                'how_to_use' => 'Basahi wajah, pijat lembut selama 20 detik lalu bilas.',
                'ingredients' => 'Water, Glycerin, Ceramide Complex, Amino Acid.',
                'for_who' => 'Kulit sensitif, kering, atau barrier rusak.',
                'images' => ['1/Skintific-cleanser.png']
            ],

            'cosrx-cleanser' => [
                'id' => 1,
                'name' => 'Cosrx Low pH Cleanser',
                'category' => 'Cleanser',
                'price' => 130000,
                'stock' => 40,
                'desc' => 'Cleanser pH rendah untuk kulit berminyak.',
                'how_to_use' => 'Gunakan pagi & malam sebelum skincare.',
                'ingredients' => 'Coco-Glucoside, Tea Tree Oil, Water.',
                'for_who' => 'Kulit oily & acne-prone.',
                'images' => ['2/Cosrx-cleanser.jpg']
            ],

            'harlette-cleanser' => [
                'id' => 1,
                'name' => 'Harlette Oatmilk Gentle Facial Wash',
                'category' => 'Cleanser',
                'price' => 86000,
                'stock' => 30,
                'desc' => 'Oatmilk Gentle Facial Wash yang lembut.',
                'how_to_use' => 'Usapkan ke wajah lalu bilas.',
                'ingredients' => 'Oat Extract, Glycerin, Vitamin E.',
                'for_who' => 'Kulit sensitif & kering.',
                'images' => ['3/harlette-cleanser.png']
            ],

            'skin-game-cleanser' => [
                'id' => 1,
                'name' => 'Skin Game Kind Hydrating Facial Wash',
                'category' => 'Cleanser',
                'price' => 124000,
                'stock' => 35,
                'desc' => 'Membersihkan kulit tanpa menyebabkan kulit kering.',
                'how_to_use' => 'Pijat lembut ke wajah, lalu bilas.',
                'ingredients' => 'Glycerin, Panthenol, Hyaluronic Acid.',
                'for_who' => 'Kulit normal, oily, atau kombinasi.',
                'images' => ['4/Skin Game-cleanser.png']
            ],

            // TONER
            'avoskin-toner' => [
                'id' => 2,
                'name' => 'Avoskin Miraculous Refining Toner',
                'category' => 'Toner',
                'price' => 173000,
                'stock' => 25,
                'desc' => 'Toner eksfoliasi AHA-BHA-PHA-PGA.',
                'how_to_use' => 'Gunakan malam hari 2–3x seminggu.',
                'ingredients' => 'AHA, BHA, PHA, Niacinamide.',
                'for_who' => 'Kulit kusam & tekstur tidak rata.',
                'images' => ['5/Avoskin-toner.png']
            ],

            'pyunkang-yul-toner' => [
                'id' => 2,
                'name' => 'Pyunkang Yul Essence Toner',
                'category' => 'Toner',
                'price' => 110000,
                'stock' => 20,
                'desc' => 'Toner basic melembabkan.',
                'how_to_use' => 'Gunakan setelah cuci muka.',
                'ingredients' => 'Milk Vetch Root Extract.',
                'for_who' => 'Semua jenis kulit.',
                'images' => ['6/Pyunkang Yul-toner.jpg']
            ],

            'skin1004-toner' => [
                'id' => 2,
                'name' => 'SKIN1004 Madagascar Centella Toning Toner',
                'category' => 'Toner',
                'price' => 144500,
                'stock' => 30,
                'desc' => 'Mengandung Centella Asiatica.',
                'how_to_use' => 'Gunakan setelah cleansing.',
                'ingredients' => 'Centella Extract, PHA.',
                'for_who' => 'Kulit sensitif & kemerahan.',
                'images' => ['7/SKIN1004-toner.png']
            ],

            'anua-toner' => [
                'id' => 2,
                'name' => 'Anua Heartleaf 77% Soothing Toner',
                'category' => 'Toner',
                'price' => 247000,
                'stock' => 25,
                'desc' => 'Menenangkan kulit sensitif.',
                'how_to_use' => 'Tuang ke kapas atau tangan.',
                'ingredients' => 'Heartleaf Extract 77%.',
                'for_who' => 'Kulit sensitif & acne-prone.',
                'images' => ['8/Anua-toner.png']
            ],

            // SERUM
            'avoskin-niacinamide-serum' => [
                'id' => 3,
                'name' => 'Avoskin YSB Niacinamide 12%',
                'category' => 'Serum',
                'price' => 115000,
                'stock' => 30,
                'desc' => 'Serum pencerah dengan Niacinamide tinggi.',
                'how_to_use' => 'Gunakan 2–3 tetes setelah toner.',
                'ingredients' => 'Niacinamide 12%, Zinc.',
                'for_who' => 'Kulit kusam & bekas jerawat.',
                'images' => ['9/Avoskin-serum.png']
            ],

            'glad2glow-retinol' => [
                'id' => 3,
                'name' => 'Glad2Glow Peach Retinol Serum',
                'category' => 'Serum',
                'price' => 38000,
                'stock' => 35,
                'desc' => 'Serum retinol untuk penuaan dini.',
                'how_to_use' => 'Gunakan malam hari.',
                'ingredients' => 'Retinol, Vitamin E.',
                'for_who' => 'Kulit aging atau fine lines.',
                'images' => ['10/Retinol-Serum.png']
            ],

            'boj-greentea-serum' => [
                'id' => 3,
                'name' => 'Beauty of Joseon Greentea Calming Serum',
                'category' => 'Serum',
                'price' => 125000,
                'stock' => 25,
                'desc' => 'Serum Green Tea untuk mengontrol minyak.',
                'how_to_use' => 'Gunakan pagi/malam.',
                'ingredients' => 'Green Tea Extract, Mugwort.',
                'for_who' => 'Kulit oily & acne.',
                'images' => ['11/BoJ-serum.png']
            ],

            'elformula-peeling-solution' => [
                'id' => 3,
                'name' => 'Elformula Peeling Solution',
                'category' => 'Serum',
                'price' => 161000,
                'stock' => 15,
                'desc' => 'Membersihkan pori & regenerasi kulit.',
                'how_to_use' => 'Gunakan 1–2x seminggu.',
                'ingredients' => 'AHA 30%, BHA 2%.',
                'for_who' => 'Kulit kusam & komedo.',
                'images' => ['12/elformula-serum.png']
            ],

            // MOISTURIZER
            'innisfree-moist' => [
                'id' => 4,
                'name' => 'Innisfree Collagen Green Tea Ceramide Cream',
                'category' => 'Moisturizer',
                'price' => 368000,
                'stock' => 15,
                'desc' => 'Untuk skin barrier & elastisitas kulit.',
                'how_to_use' => 'Pakai setelah serum.',
                'ingredients' => 'Green Tea, Ceramide, Collagen.',
                'for_who' => 'Kulit kering & aging.',
                'images' => ['13/Innisfree-moist.png']
            ],

            'laneige-moist' => [
                'id' => 4,
                'name' => 'Laneige Bouncy & Firm Sleeping Mask',
                'category' => 'Moisturizer',
                'price' => 399000,
                'stock' => 15,
                'desc' => 'Masker tidur untuk revitalisasi kulit.',
                'how_to_use' => 'Gunakan malam hari.',
                'ingredients' => 'Collagen, Hyaluronic Acid.',
                'for_who' => 'Semua jenis kulit.',
                'images' => ['14/Laneige-moist.png']
            ],

            'fti-moist' => [
                'id' => 4,
                'name' => 'From This Island Papua Red Fruit Plumping Cream',
                'category' => 'Moisturizer',
                'price' => 220000,
                'stock' => 30,
                'desc' => 'Meningkatkan produksi kolagen.',
                'how_to_use' => 'Gunakan pagi & malam.',
                'ingredients' => 'Red Fruit Oil, Vitamin E.',
                'for_who' => 'Kulit aging.',
                'images' => ['15/From This Island-mois.png']
            ],

            'skin1004-moist' => [
                'id' => 4,
                'name' => 'SKIN1004 Madagascar Centella Cream',
                'category' => 'Moisturizer',
                'price' => 149000,
                'stock' => 25,
                'desc' => 'Hidrasi & nutrisi kulit.',
                'how_to_use' => 'Gunakan setelah serum.',
                'ingredients' => 'Centella Extract.',
                'for_who' => 'Kulit sensitif.',
                'images' => ['16/SKIN1004-moist.png']
            ],

            // SUNSCREEN
            'labore-sunscreen' => [
                'id' => 5,
                'name' => 'Labore Acne & Oil Correct Physical Sunscreen',
                'category' => 'Sunscreen',
                'price' => 185000,
                'stock' => 20,
                'desc' => 'Sunscreen physical non-comedogenic.',
                'how_to_use' => 'Gunakan 15 menit sebelum keluar rumah.',
                'ingredients' => 'Zinc Oxide, Titanium Dioxide.',
                'for_who' => 'Kulit acne & oily.',
                'images' => ['17/Labore-sunscreen.png']
            ],

            'wardah-sunscreen' => [
                'id' => 5,
                'name' => 'Wardah Sunscreen Moisturizer SPF35',
                'category' => 'Sunscreen',
                'price' => 40000,
                'stock' => 30,
                'desc' => 'Sunscreen ringan untuk daily use.',
                'how_to_use' => 'Gunakan sebelum makeup.',
                'ingredients' => 'UV Filters, Vitamin E.',
                'for_who' => 'Semua jenis kulit.',
                'images' => ['18/Wardah-sunscreen.png']
            ],

            'avoskin-sunscreen' => [
                'id' => 5,
                'name' => 'Avoskin The Great Shield SPF 50',
                'category' => 'Sunscreen',
                'price' => 135000,
                'stock' => 25,
                'desc' => 'Waterbased, matte, low whitecast.',
                'how_to_use' => 'Gunakan secukupnya ke wajah & leher.',
                'ingredients' => 'UV Filters, Niacinamide.',
                'for_who' => 'Kulit oily & kombinasi.',
                'images' => ['19/avoskin-sunscreen.webp']
            ],

            'harlette-sunscreen' => [
                'id' => 5,
                'name' => 'Harlette Oat Probiotic Sunscreen',
                'category' => 'Sunscreen',
                'price' => 153000,
                'stock' => 20,
                'desc' => 'Sunscreen lembut tanpa bau.',
                'how_to_use' => 'Gunakan setelah moisturizer.',
                'ingredients' => 'Oat Extract, Probiotics.',
                'for_who' => 'Kulit sensitif.',
                'images' => ['20/harlette-sunscreen.png']
            ],

        ];

        if (!isset($products[$slug])) {
            abort(404);
        }

        $product = $products[$slug];

        return view('customer.product', compact('product'));
    }
}
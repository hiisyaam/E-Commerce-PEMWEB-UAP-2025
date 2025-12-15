@extends('layouts.customer')

@section('content')

<!-- HERO SECTION -->
<section class="relative w-full">
    <img src="/assets/images/barenbliss.jpg"
         class="w-full h-[650px] object-cover opacity-90">

    <a href="#"
       class="absolute left-10 lg:left-20 bottom-24 bg-white px-8 py-3 text-lg font-semibold rounded-md shadow hover:bg-gray-100 w-max">
        BUY NOW
    </a>
</section>

<section class="max-w-7xl mx-auto px-6 mt-14">
    <h2 class="text-xl font-bold mb-4">Cleanser</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $products = [
                ['img' => '1/Skintific-cleanser.png', 'name' => 'Skintific', 'slug' => 'skintific-cleanser', 'desc' => 'Skintific 5X Ceramide Low pH Cleanser', 'price' => '65.000'],
                ['img' => '2/Cosrx-cleanser.jpg', 'name' => 'Cosrx', 'slug' => 'cosrx-cleanser', 'desc' => 'Low pH Good Morning Gel Cleanser', 'price' => '130.000'],
                ['img' => '3/harlette-cleanser.png', 'name' => 'Harlette', 'slug' => 'harlette-cleanser', 'desc' => 'Oatmilk Gentle Facial Wash', 'price' => '86.000'],
                ['img' => '4/Skin Game-cleanser.png', 'name' => 'Skin Game', 'slug' => 'skin-game-cleanser', 'desc' => 'Kind Hydrating Facial Wash', 'price' => '124.000']
            ];
        @endphp

        @foreach ($products as $p)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="/assets/images/products/{{ $p['img'] }}"
                     class="rounded-lg h-60 w-full object-scale-down object-center">

                <h3 class="mt-3 font-semibold">{{ $p['name'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
                <p class="mt-1 font-bold">Rp. {{ $p['price'] }}</p>

                <a href="{{ route('product.detail', $p['slug']) }}"
                    class="mt-3 block text-center w-full py-2 bg-[#8BAE8E] text-white rounded-lg hover:opacity-90">
                    Product Details
                </a>
            </div>
        @endforeach

    </div>
</section>

<section class="max-w-7xl mx-auto px-6 mt-14">
    <h2 class="text-xl font-bold mb-4">Toner</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $products = [
                ['img' => '5/Avoskin-toner.png', 'name' => 'Avoskin', 'slug' => 'avoskin-toner', 'desc' => 'Miraculous Refining Toner', 'price' => '173.000'],
                ['img' => '6/Pyunkang Yul-toner.jpg', 'name' => 'Pyunkang Yul', 'slug' => 'pyunkang-yul-toner', 'desc' => 'Essence Toner', 'price' => '110.000'],
                ['img' => '7/SKIN1004-toner.png', 'name' => 'SKIN1004', 'slug' => 'skin1004-toner', 'desc' => 'Madagascar Centella Toning Toner', 'price' => '144.500'],
                ['img' => '8/Anua-toner.png', 'name' => 'Anua', 'slug' => 'anua-toner', 'desc' => 'Heartleaf 77% Soothing Toner', 'price' => '247.500'],
            ];
        @endphp

        @foreach ($products as $p)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="/assets/images/products/{{ $p['img'] }}"
                     class="rounded-lg h-60 w-full object-scale-down object-center">

                <h3 class="mt-3 font-semibold">{{ $p['name'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
                <p class="mt-1 font-bold">Rp. {{ $p['price'] }}</p>

                <a href="{{ route('product.detail', $p['slug']) }}"
                    class="mt-3 block text-center w-full py-2 bg-[#8BAE8E] text-white rounded-lg hover:opacity-90">
                    Product Details
                </a>
            </div>
        @endforeach

    </div>
</section>

<section class="max-w-7xl mx-auto px-6 mt-14">
    <h2 class="text-xl font-bold mb-4">Serum</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $products = [
                ['img' => '9/Avoskin-serum.png', 'name' => 'Avoskin YSB', 'slug' => 'avoskin-niacinamide-serum', 'desc' => 'Niacinamide 12%', 'price' => '115.000'],
                ['img' => '10/Retinol-Serum.png', 'name' => 'Glad2Glow', 'slug' => 'glad2glow-retinol', 'desc' => 'Peach Retinol Serum', 'price' => '38.000'],
                ['img' => '11/BoJ-serum.png', 'name' => 'Beauty of Joseon', 'slug' => 'boj-greentea-serum', 'desc' => 'Greentea Calming Serum', 'price' => '125.300'],
                ['img' => '12/elformula-serum.png', 'name' => 'Elformula', 'slug' => 'elformula-peeling-solution', 'desc' => 'Intensive Peeling Solution', 'price' => '161.280'],
            ];
        @endphp

        @foreach ($products as $p)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="/assets/images/products/{{ $p['img'] }}"
                     class="rounded-lg h-60 w-full object-scale-down object-center">

                <h3 class="mt-3 font-semibold">{{ $p['name'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
                <p class="mt-1 font-bold">Rp. {{ $p['price'] }}</p>

                <a href="{{ route('product.detail', $p['slug']) }}"
                    class="mt-3 block text-center w-full py-2 bg-[#8BAE8E] text-white rounded-lg hover:opacity-90">
                    Product Details
                </a>
            </div>
        @endforeach

    </div>
</section>

<section class="max-w-7xl mx-auto px-6 mt-14">
    <h2 class="text-xl font-bold mb-4">Moisturizer</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $products = [
                ['img' => '13/Innisfree-moist.png', 'name' => 'Innisfree', 'slug' => 'innisfree-moist', 'desc' => 'Green Tea Ceramide Bounce Cream', 'price' => '368.900'],
                ['img' => '14/Laneige-moist.png', 'name' => 'Laneige', 'slug' => 'laneige-moist', 'desc' => 'Bouncy & Firm Sleeping Mask', 'price' => '397.500'],
                ['img' => '15/From This Island-mois.png', 'name' => 'From This Island', 'slug' => 'fti-moist', 'desc' => 'Papua Red Fruit Plumping Cream', 'price' => '220.150'],
                ['img' => '16/SKIN1004-moist.png', 'name' => 'SKIN1004', 'slug' => 'skin1004-moist', 'desc' => 'Madagascar Centella Cream', 'price' => '149.600']
            ];
        @endphp

        @foreach ($products as $p)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="/assets/images/products/{{ $p['img'] }}"
                     class="rounded-lg h-60 w-full object-scale-down object-center">

                <h3 class="mt-3 font-semibold">{{ $p['name'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
                <p class="mt-1 font-bold">Rp. {{ $p['price'] }}</p>

                <a href="{{ route('product.detail', $p['slug']) }}"
                    class="mt-3 block text-center w-full py-2 bg-[#8BAE8E] text-white rounded-lg hover:opacity-90">
                    Product Details
                </a>
            </div>
        @endforeach

    </div>
</section>

<section class="max-w-7xl mx-auto px-6 mt-14">
    <h2 class="text-xl font-bold mb-4">Sunscreen</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $products = [
                ['img' => '17/Labore-sunscreen.png', 'name' => 'Labore Acne & Oil', 'slug' => 'labore-sunscreen', 'desc' => 'Physical Sunscreen SPF50+', 'price' => '185.000'],
                ['img' => '18/Wardah-sunscreen.png', 'name' => 'Wardah UV Shield Acne', 'slug' => 'wardah-sunscreen', 'desc' => 'Sunscreen Moisturizer SPF35', 'price' => '39.500'],
                ['img' => '19/avoskin-sunscreen.webp', 'name' => 'Avoskin', 'slug' => 'avoskin-sunscreen', 'desc' => 'The Great Shield SPF50', 'price' => '135.000'],
                ['img' => '20/harlette-sunscreen.png', 'name' => 'Harlette', 'slug' => 'harlette-sunscreen', 'desc' => 'Oat Probiotic Sunscreen SPF 50', 'price' => '153.000']
            ];
        @endphp

        @foreach ($products as $p)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="/assets/images/products/{{ $p['img'] }}"
                     class="rounded-lg h-60 w-full object-scale-down object-center">

                <h3 class="mt-3 font-semibold">{{ $p['name'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
                <p class="mt-1 font-bold">Rp. {{ $p['price'] }}</p>

                <a href="{{ route('product.detail', $p['slug']) }}"
                    class="mt-3 block text-center w-full py-2 bg-[#8BAE8E] text-white rounded-lg hover:opacity-90">
                    Product Details
                </a>
            </div>
        @endforeach

    </div>
</section>

<!-- FOOTER -->
<footer class="bg-[#8BAE8E] text-white mt-20 pt-12 pb-6 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

        <!-- ABOUT -->
        <div>
            <h4 class="font-bold mb-3">ABOUT</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-[#8BAE8E]">Company</a></li>
                <li><a href="#" class="hover:text-[#8BAE8E]">Community</a></li>
                <li><a href="#" class="hover:text-[#8BAE8E]">Careers</a></li>
            </ul>
        </div>

        <!-- BLOG -->
        <div>
            <h4 class="font-bold mb-3">BLOG</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-[#8BAE8E]">Tech</a></li>
                <li><a href="#" class="hover:text-[#8BAE8E]">Music</a></li>
                <li><a href="#" class="hover:text-[#8BAE8E]">Video</a></li>
            </ul>
        </div>

        <!-- PRODUCTS -->
        <div>
            <h4 class="font-bold mb-3">PRODUCTS</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-[#8BAE8E]">Lovellea App</a></li>
                <li><a href="#" class="hover:text-[#8BAE8E]">Lovellea Desktop</a></li>
                <li><a href="#" class="hover:text-[#8BAE8E]">Lovellea Cloud</a></li>
            </ul>
        </div>

        <!-- LOGO + SOCIAL -->
        <div class="flex flex-col items-start md:items-end">
            <img src="/assets/images/bg-remove.png" class="h-20 mb-2" alt="Lovellea Logo">
            <p class="text-sm mb-4">It's all about your beauty</p>

            <div class="flex gap-4 text-xl">
                <a href="#"><i class="fa-brands fa-facebook hover:text-[#8BAE8E]"></i></a>
                <a href="#"><i class="fa-brands fa-twitter hover:text-[#8BAE8E]"></i></a>
                <a href="#"><i class="fa-brands fa-instagram hover:text-[#8BAE8E]"></i></a>
            </div>
        </div>
    </div>

    <!-- BOTTOM COPYRIGHT -->
    <div class="max-w-7xl mx-auto px-6 mt-10 flex flex-col md:flex-row justify-between text-sm border-t border-gray-200 pt-4">
        <p>Jl. Mawar 21, Malang, Indonesia</p>
        <p>© 2025 Lovellea, Made With Love</p>
    </div>
</footer>

@endsection
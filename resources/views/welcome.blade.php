<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lovellea Beauty</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        .swiper-button-next,
        .swiper-button-prev {
            width: 35px;
            height: 35px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 22px;
            font-weight: 600;
            color: #7a7a7a;
        }
        .swiper-button-next::after { content: '>'; }
        .swiper-button-prev::after { content: '<'; }

        .swiper-button-next { right: 15px; }
        .swiper-button-prev { left: 15px; }

        .myHeroSwiper .swiper-button-next,
        .myHeroSwiper .swiper-button-prev {
            top: 50% !important;
            transform: translateY(-50%);
        }

        .myHeroSwiper .swiper-pagination {
            bottom: 15px !important;
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#fdf7f7] text-gray-800">

    <!-- NAVBAR -->
    <nav class="w-full bg-white py-4 shadow-sm fixed top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between relative">
            
            <!-- LEFT LOGO -->
            <div class="flex items-center gap-3">
                <img src="/assets/images/logo.png" class="h-16" alt="Lovellea Logo">
            </div>

            <!-- CENTER MENU -->
            <div class="hidden md:flex gap-16 text-sm font-semibold text-gray-700 absolute left-1/2 -translate-x-1/2">
                <a href="#" class="hover:text-[#8BAE8E]">New</a>
                <a href="#" class="hover:text-[#8BAE8E]">Brands</a>
                <a href="#" class="hover:text-[#8BAE8E]">About</a>
                <a href="#" class="hover:text-[#8BAE8E]">Contact</a>
            </div>

            <!-- RIGHT AUTH + ICONS -->
            <div class="flex items-center gap-4 text-gray-700">

                @auth
                    <a href="/dashboard" class="text-sm font-semibold hover:text-pink-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-[#8BAE8E] text-white px-7 py-1 rounded-lg hover:opacity-90">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-white text-[#8BAE8E] border border-[#8BAE8E] px-5 py-1 rounded-lg 
                              hover:bg-[#8BAE8E] hover:text-white transition">
                        Register
                    </a>
                @endauth

                <i class="fa-regular fa-user text-xl"></i>
                <i class="fa-regular fa-heart text-xl"></i>
                <i class="fa-solid fa-bag-shopping text-xl"></i>
            </div>

        </div>
    </nav>

    <!-- SPACER -->
    <div class="pt-24"></div>

    <!-- HERO SECTION -->
    <section class="w-full max-w-7xl mx-auto px-6 py-8">
        <div class="swiper myHeroSwiper relative" style="height: 450px;">
            <div class="swiper-wrapper">

                <!-- SLIDE 1 -->
                <div class="swiper-slide">
                    <div class="rounded-2xl flex flex-col md:flex-row items-center p-10 h-full 
                        bg-cover bg-center"
                    style="background-image: url('/assets/images/bener.jpg');">

                        <!-- IMAGE -->
                        <div class="w-full md:w-1/2 flex justify-center">
                            <img src="/assets/images/product1.png"
                                class="w-64 md:w-80 drop-shadow-lg"
                                alt="">
                        </div>

                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="swiper-slide">
                    <div class="rounded-2xl flex flex-col md:flex-row items-center p-10 h-full 
                        bg-cover bg-center"
                    style="background-image: url('/assets/images/2.bener.jpg');">

                        <!-- IMAGE -->
                        <div class="w-full md:w-1/2 flex justify-center">
                            <img src="/assets/images/product1.png"
                                class="w-64 md:w-80 drop-shadow-lg"
                                alt="">
                        </div>

                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div class="swiper-slide">
                    <div class="rounded-2xl flex flex-col md:flex-row items-center p-10 h-full 
                        bg-cover bg-center"
                    style="background-image: url('/assets/images/benerrr.jpg');">

                        <!-- IMAGE -->
                        <div class="w-full md:w-1/2 flex justify-center">
                            <img src="/assets/images/product1.png"
                                class="w-64 md:w-80 drop-shadow-lg"
                                alt="">
                        </div>

                    </div>
                </div>

            </div>

            <!-- Buttons -->
            <div class="swiper-button-next !text-gray-600"></div>
            <div class="swiper-button-prev !text-gray-600"></div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>

        </div>
    </section>


    <!-- BEST SELLERS -->
    <section class="max-w-7xl mx-auto px-6 mt-14">
        <h2 class="text-xl font-bold mb-4">BEST SELLERS</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @php
                $products = [
                    ['img' => '2/Cosrx-cleanser.jpg', 'name' => 'Cosrx', 'desc' => 'Low pH Good Morning Gel Cleanser', 'price' => '130.000'],
                    ['img' => '7/SKIN1004-toner.png', 'name' => 'SKIN1004', 'desc' => 'Madagascar Centella Toning Toner', 'price' => '144.500'],
                    ['img' => '11/BoJ-serum.png', 'name' => 'Beauty of Josoen', 'desc' => 'Greentea Calming Serum', 'price' => '125.300'],
                    ['img' => '15/From This Island-mois.png', 'name' => 'From This Island', 'desc' => 'Papua Red Fruit Plumping Cream', 'price' => '220.150']
                ];
            @endphp

            @foreach ($products as $p)
                <div class="bg-white rounded-xl shadow p-4">
                    <img src="/assets/images/products/{{ $p['img'] }}"
                         class="rounded-lg h-60 w-full object-scale-down object-center">

                    <h3 class="mt-3 font-semibold">{{ $p['name'] }}</h3>
                    <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
                    <p class="mt-1 font-bold">Rp. {{ $p['price'] }}</p>

                    <a href="{{ route('login') }}"
                        class="mt-3 w-full py-2 block text-center bg-[#8BAE8E] text-white rounded-lg hover:opacity-90">
                        Product Details
                    </a>

                </div>
            @endforeach

        </div>
    </section>

    <!-- PROMO BANNER -->
    <section class="max-w-7xl mx-auto px-6 mt-16">
        <div class="bg-[#feeef5] rounded-xl p-10 flex flex-col md:flex-row items-center gap-10">

            <img src="assets/images/products/10/Retinol-Serum.png"
                 class="h-48 rounded-xl object-cover">

            <div>
                <h3 class="text-2xl font-semibold text-[#516c5d]">Limited Edition Gift</h3>
                <p class="mt-2 text-gray-600">SAVE 10% on exclusive skincare + Peach Retinol Serum.</p>

                <a href="{{ route('login') }}"
                    class="mt-4 inline-block bg-[#8BAE8E] text-white px-6 py-3 rounded-lg hover:opacity-90">
                    Shop now
                </a>
            </div>

        </div>
    </section>

    <!-- CATEGORY -->
    <section class="max-w-7xl mx-auto px-6 mt-16 mb-20">
        <h2 class="text-xl font-bold mb-4">SHOP BY CATEGORY</h2>

        <div class="flex gap-6 overflow-x-auto pb-2 scrollbar-hide">
            
            @php
                $categories = [
                    ['slug' => 'facewash', 'img' => 'facewash.jpg', 'name' => 'Cleanser'],
                    ['img' => 'toner.jpg', 'name' => 'Toner'],
                    ['img' => 'serum.jpg', 'name' => 'Serum'],
                    ['img' => 'moisturizer.jpg', 'name' => 'Moisturizer'],
                    ['img' => 'sunscreen.jpg', 'name' => 'Sunscreen'],
                ];
            @endphp

            @foreach ($categories as $c)
                <a href="{{route('login')}}">
                    <div class="min-w-[200px] md:min-w-[250px] rounded-xl overflow-hidden relative group flex-shrink-0">
                        <img src="/assets/images/{{ $c['img'] }}"
                             class="object-cover h-40 w-full group-hover:scale-110 transition">
                        <p class="absolute bottom-2 left-3 text-white font-bold drop-shadow">{{ $c['name'] }}</p>
                    </div>
                </a>
            @endforeach

        </div>
    </section>

    <!-- SWIPER SCRIPT -->
    <script>
        var swiper = new Swiper(".myHeroSwiper", {
            loop: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            pagination: { el: ".swiper-pagination", clickable: true }
        });
    </script>

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

</body>
</html>
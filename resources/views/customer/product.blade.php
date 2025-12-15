@extends('layouts.customer')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10 mt-24 bg-white rounded-xl shadow-sm">

    @php
        function detectCategory($name) {
            $name = strtolower($name);

            return match (true) {
                str_contains($name, 'cleanser') => 'Cleanser',
                str_contains($name, 'face wash') => 'Cleanser',
                str_contains($name, 'toner') => 'Toner',
                str_contains($name, 'serum') => 'Serum',
                str_contains($name, 'moisturizer') => 'Moisturizer',
                str_contains($name, 'cream') => 'Moisturizer',
                str_contains($name, 'sunscreen') => 'Sunscreen',
                default => 'Skincare',
            };
        }
    @endphp

    <!-- Breadcrumb -->
    <nav class="text-sm mb-6 text-gray-500">
        <a href="/" class="hover:underline">Home</a> >
        <span>{{ $product['name'] }}</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- LEFT IMAGE -->
        <div>
            <img id="mainImage"
                src="/assets/images/products/{{ $product['images'][0] }}"
                class="w-full h-[420px] object-contain rounded-lg shadow border">
        </div>

        <!-- RIGHT PRODUCT INFO -->
        <div>
            <!-- CATEGORY (warna baru #8BAE8E + deteksi otomatis) -->
            <p class="text-[#8BAE8E] font-semibold text-sm">
                {{ detectCategory($product['name']) }}
            </p>

            <h1 class="text-2xl font-bold mt-1">{{ $product['name'] }}</h1>

            <div class="flex items-center mt-2 gap-2">
                <i class="fa-solid fa-star text-yellow-400"></i>
                <span>5</span>
                <span class="text-gray-500">(12 Penilaian)</span>

                <!-- Lihat Penilaian -->
                <button id="btnReview" class="text-[#8BAE8E] hover:underline ml-2">
                    Lihat Penilaian
                </button>
            </div>

            <!-- PRICE -->
            <div class="mt-4">
                <p class="text-3xl font-bold">
                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                </p>
            </div>


            <!-- Quantity -->
            <div class="mt-6">
                <p class="font-semibold">Jumlah</p>

                <div class="flex items-center gap-3 mt-2">
                    <button id="btnMinus" class="px-3 py-1 border rounded">-</button>
                    <span id="qtyValue">1</span>
                    <button id="btnPlus" class="px-3 py-1 border rounded">+</button>

                    <span class="text-gray-500 ml-4">
                        Stock Tersedia: {{ $product['stock'] }}
                    </span>
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4 mt-7">

                <!-- ADD TO CART -->
                <button id="btnAddCart"
                    class="px-6 py-3 rounded-lg bg-[#8BAE8E] text-white font-semibold hover:opacity-90">
                    + Add to Bag
                </button>

                <!-- BUY NOW -->
                <button id="btnBuyNow"
                    class="bg-white text-[#8BAE8E] border border-[#8BAE8E] px-5 py-1 rounded-lg hover:bg-[#8BAE8E] hover:text-white font-semibold transition">
                    Checkout
                </button>

            </div>
        </div>
    </div>

    <!-- TABS -->
    <div class="mt-10">

        <div class="flex gap-6 border-b pb-2">

            <button class="tab-btn active-tab"
                onclick="openTab('desc')">Description</button>

            <button class="tab-btn"
                onclick="openTab('use')">How To Use</button>

            <button class="tab-btn"
                onclick="openTab('ingredients')">Ingredients</button>

            <button class="tab-btn"
                onclick="openTab('who')">For Who</button>

            <!-- TAB: REVIEW -->
            <button class="tab-btn"
                onclick="openTab('review')">Penilaian</button>

        </div>

        <!-- TAB CONTENT -->
        <div id="tab-desc" class="tab-content mt-6">
            <p class="text-gray-700 leading-relaxed">
                {{ $product['desc'] ?? 'Tidak ada deskripsi.' }}
            </p>
        </div>

        <div id="tab-use" class="tab-content hidden mt-6">
            <p class="text-gray-700 leading-relaxed">
                {{ $product['how_to_use'] ?? 'Informasi cara penggunaan belum tersedia.' }}
            </p>
        </div>


        <div id="tab-ingredients" class="tab-content hidden mt-6">
            <p class="text-gray-700 leading-relaxed">
                {{ $product['ingredients'] ?? 'Ingredients belum tersedia.' }}
            </p>
        </div>

        <div id="tab-who" class="tab-content hidden mt-6">
            <p class="text-gray-700 leading-relaxed">
                {{ $product['for_who'] ?? 'Informasi kecocokan belum tersedia.' }}
            </p>
        </div>

        <!-- TAB REVIEW -->
        <div id="tab-review" class="tab-content hidden mt-6">
            <h2 class="text-xl font-semibold mb-3">Penilaian Pengguna</h2>
            <p class="text-gray-700 mb-2">⭐ 5 — Produk sangat bagus!</p>
            <p class="text-gray-700 mb-2">⭐ 4 — Cocok untuk kulit saya.</p>
            <p class="text-gray-700">⭐ 5 — Harga terjangkau, kualitas oke.</p>
        </div>
    </div>

</div>

<script>
    // OPEN TAB FUNCTION
    function openTab(tab) {
        document.querySelectorAll('.tab-btn')
            .forEach(btn => btn.classList.remove('active-tab'));

        event.target.classList.add('active-tab');

        document.querySelectorAll('.tab-content')
            .forEach(c => c.classList.add('hidden'));

        document.getElementById('tab-' + tab).classList.remove('hidden');
    }

    // Lihat Penilaian
    document.getElementById('btnReview').addEventListener('click', function() {
        document.querySelector("button[onclick=\"openTab('review')\"]").click();
        window.scrollTo({ top: 600, behavior: 'smooth' });
    });

    // Quantity
    let qty = 1;
    const qtyValue = document.getElementById('qtyValue');

    document.getElementById('btnMinus').onclick = () => {
        if (qty > 1) qty--;
        qtyValue.innerText = qty;
    };

    document.getElementById('btnPlus').onclick = () => {
        qty++;
        qtyValue.innerText = qty;
    };

    // Add to Cart
    document.getElementById('btnAddCart').addEventListener('click', function() {
        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                id: {{ $product['id'] }},
                qty: qty
            })
        })
        .then(res => res.json())
        .then(data => {
            alert("Produk berhasil ditambahkan ke keranjang!");
        });
    });

    // BUY NOW
    document.getElementById('btnBuyNow').addEventListener('click', function() {
        window.location = "{{ route('customer.checkout') }}";
    });
</script>

<style>
    .tab-btn {
        padding-bottom: 8px;
        font-weight: 500;
        color: black;
    }
    .active-tab {
        color: #8BAE8E !important;
        border-bottom: 2px solid #8BAE8E;
    }
</style>

@endsection
@extends('layouts.member')

@section('content')

<style>
    .product-gallery img {
        width: 100%;
        max-height: 450px;
        object-fit: contain;
        border-radius: 12px;
        background: #fff;
    }

    .thumb-list img {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 8px;
        cursor: pointer;
        padding: 4px;
        background: white;
        border: 2px solid transparent;
    }

    .thumb-list img:hover {
        border-color: #A4133C;
    }

    .btn-buy {
        background: #A4133C;
        color: white;
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: bold;
        transition: .2s;
        width: 100%;
    }
    .btn-buy:hover {
        background: #C5184A;
        transform: scale(1.05);
    }

    .product-card {
        padding: 25px;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .footer-ethereal {
    background-color: #FFF0F3; 
    padding: 40px 0;
    border-top: 2px solid #f5d7dd; 
    margin-top: 60px;
}

.footer-logo {
    width: 80px;
    margin-bottom: 12px;
}

.footer-text {
    color: #A4133C; 
    font-size: 14px;
    margin-top: 5px;
}

.footer-copy {
    color: #8f8f8f;
    font-size: 13px;
    margin-top: 8px;
}

</style>

<div class="container my-5">

    <div class="row g-4">

        <div class="col-md-6">

            <div class="product-gallery mb-3">
                @php
                    $thumbnail = $product->productImages->where('is_thumbnail', true)->first();
                @endphp

                <img id="mainImage"
                     src="{{ $thumbnail ? asset($thumbnail->image) : asset('/no-image.png') }}"
                     alt="{{ $product->name }}">
            </div>

            <div class="d-flex gap-2 thumb-list">
                @foreach ($product->productImages as $img)
                    <img src="{{ asset($img->image) }}" onclick="changeImage(this)">
                @endforeach
            </div>

        </div>

        <div class="col-md-6">

            <div class="product-card">

                <h3 class="fw-bold">{{ $product->name }}</h3>

                <p class="text-secondary mb-1">
                    {{ $product->productCategory->name ?? 'Kategori tidak ditemukan' }}
                </p>

                <h2 class="fw-bold text-danger mb-3">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </h2>

                <p class="text-muted">{{ $product->description }}</p>

                <hr>

                <p><strong>Stok:</strong> {{ $product->stock }}</p>
                <p><strong>Toko:</strong> {{ $product->store->name ?? '-' }}</p>

                <hr>

                <form action="{{ route('member.cart.add') }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="d-flex align-items-center mb-3" style="gap: 10px;">
                        <button type="button" class="btn btn-light" id="btn-minus">-</button>

                        <input 
                            type="number"
                            name="quantity"
                            id="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            class="form-control text-center"
                            style="width: 70px;"
                        >

                        <button type="button" class="btn btn-light" id="btn-plus">+</button>
                    </div>

<form action="{{ route('member.cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="quantity" id="quantity" value="1">

    
</form>

<form action="{{ route('member.checkout.index') }}" method="GET" id="buyNowForm">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="qty" id="qtyInput" value="1">

    <button type="submit" class="btn-buy">Beli Sekarang</button>
</form>

                </form>

            </div>

            <div class="mt-4">
                <h4 class="fw-bold mb-3">Review Produk</h4>

                @if($product->reviews->count() > 0)
                    @foreach($product->reviews as $review)
                        <div class="p-3 mb-3 border rounded">

                            <strong>
                                Rating:
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        ⭐
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </strong>

                            <p class="mt-2 mb-0">{{ $review->review }}</p>

                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Belum ada review untuk produk ini.</p>
                @endif
            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="footer-ethereal mt-5">
    <div class="container text-center">
        <img src="{{ asset('assets/images/logo.png') }}" 
             alt="Ethereal Logo" 
             class="footer-logo">

        <p class="footer-text">
            Ethereal Stationery — Temukan alat tulis terbaik untuk kebutuhanmu.
        </p>

        <p class="footer-copy">
            © 2025 Ethereal Stationery. All rights reserved.
        </p>
    </div>
</footer>


<script>
    const minus = document.getElementById('btn-minus');
    const plus = document.getElementById('btn-plus');
    const qty = document.getElementById('quantity');
    const qtyInput = document.getElementById('qtyInput');

    minus.addEventListener('click', () => {
        if (qty.value > 1) qty.value--;
        qtyInput.value = qty.value;
    });

    plus.addEventListener('click', () => {
        qty.value++;
        qtyInput.value = qty.value;
    });
</script>
@endsection

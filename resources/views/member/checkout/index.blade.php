@extends('layouts.member')

@section('content')

<style>
    .checkout-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        border: 1px solid #eee;
    }

    .title {
        font-size: 22px;
        font-weight: bold;
        color: #A4133C;
    }

    .label {
        font-weight: 600;
        margin-bottom: 6px;
    }

    .btn-primary-custom {
        background: #A4133C;
        border: none;
        padding: 12px 20px;
        color: white;
        border-radius: 12px;
        width: 100%;
        font-weight: bold;
        transition: 0.2s;
    }

    .btn-primary-custom:hover {
        background: #C5184A;
        transform: scale(1.03);
    }
</style>

<div class="container py-4 mt-3">

<h2 class="mb-4 fw-bold" style="margin-top: -40px;">Checkout</h2>

    <div class="checkout-card mx-auto" style="max-width: 650px;">

        <!-- INFO PRODUK -->
        <h4 class="title mb-3">Detail Produk</h4>

        <p><strong>Nama Produk:</strong> {{ $product->name }}</p>
        <p><strong>Harga Satuan:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>

        <p class="mb-1"><strong>Jumlah:</strong> {{ $qty }}</p>

<hr>

<form action="{{ route('member.checkout.process') }}" method="POST">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="qty" value="{{ $qty }}">

            <div class="mt-3">
                <label class="label">Alamat Pengiriman</label>
                <input type="text" name="address" class="form-control" placeholder="Masukkan alamat lengkap" required>
            </div>

            <div class="mt-4">
                <label class="label">Jenis Pengiriman</label>
                <select name="shipping_type" class="form-control" required id="shippingSelector">
                    <option value="" disabled selected>-- Pilih Jenis Pengiriman --</option>

                    @foreach($shippingTypes as $ship)
                        <option 
                            value="{{ $ship->id }}" 
                            data-cost="{{ $ship->cost }}">
                            {{ $ship->name }} — Rp {{ number_format($ship->cost, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label class="label">Metode Pembayaran</label>
                <select name="payment_method" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
                    <option value="wallet">Saldo (Wallet)</option>
                    <option value="va">Transfer Virtual Account</option>
                </select>
            </div>

            <hr class="my-4">

            <h5 class="fw-bold">Rincian Pembayaran</h5>

            <p>Subtotal  
                <span class="float-end" id="subtotalText">
                    Rp {{ number_format($product->price * $qty, 0, ',', '.') }}
                </span>
            </p>

            <p>Ongkos Kirim  
                <span class="float-end" id="ongkirText">Rp 0</span>
            </p>

            <hr>

            <p class="fw-bold">Total Bayar  
                <span class="float-end" id="totalText">
                    Rp {{ number_format($product->price * $qty, 0, ',', '.') }}
                </span>
            </p>

            <button class="btn-primary-custom mt-4">Lanjut Pembayaran</button>

        </form>

    </div>

</div>

<script>
    let subtotal = {{ $product->price * $qty }};
    let shippingSelect = document.getElementById("shippingSelector");
    let ongkirText = document.getElementById("ongkirText");
    let totalText = document.getElementById("totalText");

    shippingSelect.addEventListener("change", function () {
        let ongkir = parseInt(this.options[this.selectedIndex].dataset.cost);
        ongkirText.textContent = "Rp " + ongkir.toLocaleString("id-ID");
        totalText.textContent = "Rp " + (subtotal + ongkir).toLocaleString("id-ID");
    });
</script>

@endsection
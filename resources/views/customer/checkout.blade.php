@extends('layouts.customer')

@section('content')
<div class="max-w-xl mx-auto py-10">

    <h2 class="text-2xl font-bold mb-6">Checkout</h2>

    <form action="{{ route('customer.checkout.process') }}" method="POST">
        @csrf

        <input type="hidden" name="product_id" value="{{ request('product_id') }}">

        <label class="font-semibold">Alamat Pengiriman</label>
        <textarea name="address" class="w-full border p-2 rounded mb-4" required></textarea>

        <label class="font-semibold">Tipe Pengiriman</label>
        <select name="shipping_type" class="w-full border p-2 rounded mb-4">
            <option value="regular">Regular (Rp 10.000)</option>
            <option value="express">Express (Rp 20.000)</option>
        </select>

        <label class="font-semibold">Metode Pembayaran</label>
        <select name="payment_method" class="w-full border p-2 rounded mb-6">
            <option value="saldo">Saldo</option>
            <option value="transfer">Transfer VA</option>
        </select>

        <button class="w-full bg-green-600 py-2 text-white rounded">Bayar</button>
    </form>

</div>
@endsection

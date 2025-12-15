@extends('layouts.seller')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Total Produk</h3>
        <p class="text-3xl font-bold">{{ $products }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Total Pesanan</h3>
        <p class="text-3xl font-bold">{{ $orders }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Toko</h3>
        <p class="text-xl font-bold">{{ $store->name }}</p>
    </div>

</div>
@endsection


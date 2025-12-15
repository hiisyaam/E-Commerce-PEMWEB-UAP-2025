@extends('layouts.seller')

@section('title','Saldo')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-bold mb-4 text-[#8BAE8E]">
        Saldo Toko
    </h1>
    <p class="text-gray-500 text-sm mt-1">
        Total saldo yang tersedia dan dapat ditarik.
    </p>
</div>

<div class="bg-white p-8 rounded-xl shadow-sm border border-[#e6e6e6]">
    <h3 class="text-xl font-medium text-gray-500 mb-2">Total Saldo</h3>

    <p class="text-4xl font-bold text-[#8BAE8E] tracking-tight">
        Rp {{ number_format($balance->balance ?? 0) }}
    </p>
</div>

@endsection

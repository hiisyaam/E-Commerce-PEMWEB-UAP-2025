@extends('layouts.seller')

@section('title','Tambah Kategori')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-semibold tracking-tight text-[#8BAE8E]">
        Tambah Kategori
    </h1>
    <p class="text-gray-500 text-sm mt-1">
        Buat kategori baru untuk produk toko Anda.
    </p>
</div>

<div class="bg-white p-8 rounded-xl shadow-sm border border-[#e6e6e6] max-w-xl">

    <form action="{{ route('seller.categories.store') }}" method="POST">
        @csrf

        {{-- Label --}}
        <label class="block font-medium text-gray-700 mb-2">
            Nama Kategori
        </label>

        {{-- Input --}}
        <input type="text" 
               name="name"
               class="w-full border border-[#dcdcdc] rounded-lg px-4 py-3 mb-6
                      focus:outline-none focus:ring-2 focus:ring-[#8BAE8E] focus:border-transparent
                      transition text-gray-700"
               placeholder="Masukkan nama kategori...">

        {{-- Button Simpan --}}
        <button
            class="px-6 py-3 bg-[#8BAE8E] text-white font-medium rounded-lg shadow-sm 
                   hover:bg-[#7ba27e] transition">
            Simpan
        </button>

    </form>

</div>

@endsection

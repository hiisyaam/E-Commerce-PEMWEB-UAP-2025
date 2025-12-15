@extends('layouts.seller')

@section('title','Tambah Produk')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-semibold text-[#8BAE8E]">Tambah Produk</h1>
</div>

<div class="bg-[#fdf7f7] shadow-sm rounded-2xl p-8 border border-[#e8e2e2]">
    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Nama Produk --}}
        <div>
            <label class="block mb-1 font-medium text-[#8BAE8E]">Nama Produk</label>
            <input 
                type="text" 
                name="name" 
                class="w-full p-3 rounded-xl border border-[#dcdcdc] bg-white focus:outline-none focus:ring-2 focus:ring-[#8BAE8E] text-gray-700"
            >
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium text-[#8BAE8E]">Kategori</label>
            <select 
                name="category_id" 
                class="w-full p-3 rounded-xl border border-[#dcdcdc] bg-white focus:outline-none focus:ring-2 focus:ring-[#8BAE8E] text-gray-700"
            >
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Harga --}}
        <div>
            <label class="block mb-1 font-medium text-[#8BAE8E]">Harga</label>
            <input 
                type="number" 
                name="price" 
                class="w-full p-3 rounded-xl border border-[#dcdcdc] bg-white focus:outline-none focus:ring-2 focus:ring-[#8BAE8E] text-gray-700"
            >
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium text-[#8BAE8E]">Deskripsi</label>
            <textarea 
                name="description"
                rows="4"
                class="w-full p-3 rounded-xl border border-[#dcdcdc] bg-white focus:outline-none focus:ring-2 focus:ring-[#8BAE8E] text-gray-700"
            ></textarea>
        </div>

        {{-- Gambar Produk --}}
        <div>
            <label class="block mb-1 font-medium text-[#8BAE8E]">Gambar Produk (boleh lebih dari satu)</label>
            <input 
                type="file" 
                name="images[]" 
                multiple
                class="w-full text-gray-700"
            >
        </div>

        {{-- Button --}}
        <button 
            class="px-6 py-3 rounded-xl bg-[#8BAE8E] text-white font-medium hover:bg-[#7aa080] transition"
        >
            Simpan
        </button>
    </form>
</div>
@endsection

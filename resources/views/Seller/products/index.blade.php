@extends('layouts.seller')

@section('title','Produk')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-semibold text-[#8BAE8E]">Produk</h1>
</div>

<a href="{{ route('seller.products.create') }}" 
   class="px-6 py-3 rounded-xl bg-[#8BAE8E] text-white font-medium hover:bg-[#7aa080] transition">
    Tambah Produk
</a>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">

    @foreach ($products as $p)
        <div class="bg-white p-6 rounded-2xl shadow-sm flex flex-col">
            
            {{-- Thumbnail --}}
            <img 
                src="{{ asset('storage/' . $p->thumbnail) }}" 
                class="w-full h-40 object-cover rounded-xl mb-4"
                alt="{{ $p->name }}"
            >

            {{-- Nama & Harga --}}
            <h3 class="text-lg font-semibold text-gray-700">{{ $p->name }}</h3>
            <p class="text-[#8BAE8E] font-medium mt-1">Rp {{ number_format($p->price) }}</p>

            {{-- Action Buttons --}}
            <div class="mt-4 flex gap-2">
                <a href="{{ route('seller.products.edit', $p->id) }}"
                   class="px-3 py-2 rounded-xl bg-[#F0F8F5] text-[#8BAE8E] font-medium hover:bg-[#d3e3d8] transition">
                   Edit
                </a>

                <a href="{{ route('seller.products.images', $p->id) }}"
                   class="px-3 py-2 rounded-xl bg-[#FFF5E5] text-[#E6994D] font-medium hover:bg-[#ffe2b8] transition">
                   Gambar
                </a>

                <form action="{{ route('seller.products.destroy', $p->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-3 py-2 rounded-xl bg-[#FDE2E2] text-red-600 font-medium hover:bg-[#f8caca] transition">
                        Hapus
                    </button>
                </form>
            </div>

        </div>
    @endforeach

</div>

@endsection

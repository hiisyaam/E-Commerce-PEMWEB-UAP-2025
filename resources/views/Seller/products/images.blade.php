@extends('layouts.seller')

@section('title','Gambar Produk')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-semibold text-[#8BAE8E]">
        Gambar Produk: {{ $product->name }}
    </h1>
</div>

{{-- Form Upload --}}
<div class="bg-[#fdf7f7] shadow-sm rounded-2xl p-8 border border-[#e8e2e2] mb-8">
    <form action="{{ route('seller.products.images.store', $product->id) }}" 
          method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block mb-2 font-medium text-[#8BAE8E]">Tambah Gambar (Multiple)</label>
            <input 
                type="file" 
                name="images[]" 
                multiple
                class="w-full text-gray-700"
            >
        </div>

        <button class="px-6 py-3 rounded-xl bg-[#8BAE8E] text-white font-medium hover:bg-[#7aa080] transition">
            Upload
        </button>
    </form>
</div>

{{-- Grid Gambar --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($images as $img)
        <div class="bg-white p-4 rounded-2xl shadow-sm flex flex-col items-center">
            <img 
                src="{{ asset('storage/' . $img->image) }}" 
                class="w-full h-40 object-cover rounded-xl mb-4"
            >

            <form action="{{ route('seller.products.images.delete', [$product->id, $img->id]) }}" 
                  method="POST">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-xl bg-red-500 text-white font-medium hover:bg-red-600 transition">
                    Hapus
                </button>
            </form>
        </div>
    @endforeach
</div>

@endsection

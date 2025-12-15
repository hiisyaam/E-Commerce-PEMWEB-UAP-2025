@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-2xl font-bold mb-6 capitalize">
        Category: {{ $slug }}
    </h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @foreach ($products as $product)
            <div class="border rounded-xl p-4 bg-white shadow">

                {{-- gambar thumbnail --}}
                @if ($product->images->first())
                    <img src="{{ asset($product->images->first()->image_path) }}"
                         class="w-full h-40 object-cover rounded">
                @endif

                <h2 class="font-semibold mt-3">{{ $product->name }}</h2>
                <p class="text-pink-600 font-bold">Rp{{ number_format($product->price) }}</p>

                <a href="{{ route('products.show', $product->slug) }}"
                   class="mt-3 block w-full text-center bg-pink-500 text-white py-2 rounded-lg">
                    View Product
                </a>
            </div>
        @endforeach

    </div>

</div>
@endsection
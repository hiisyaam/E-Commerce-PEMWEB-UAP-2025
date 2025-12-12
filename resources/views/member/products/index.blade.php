<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Produk</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div class="bg-white p-6 shadow rounded">

            <h3 class="text-lg font-semibold mb-4">Daftar Produk</h3>

            <ul class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <li class="border rounded p-4">
                        <h4 class="font-semibold">{{ $product->name }}</h4>
                        <p class="text-gray-600">{{ $product->price }}</p>

                        <a href="{{ route('member.products.show', $product->id) }}"
                           class="text-blue-600 mt-2 inline-block">Detail</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</x-app-layout>
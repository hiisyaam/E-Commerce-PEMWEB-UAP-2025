@extends('layouts.seller')

@section('title','Edit Kategori')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-semibold text-[#8BAE8E]">Edit Kategori</h1>
</div>

<div class="bg-[#fdf7f7] shadow-sm rounded-2xl p-8 border border-[#e8e2e2]">
    <form action="{{ route('seller.categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nama Kategori --}}
        <div>
            <label class="block mb-1 font-medium text-[#8BAE8E]">Nama Kategori</label>
            <input 
                type="text" 
                name="name" 
                value="{{ $category->name }}" 
                class="w-full p-3 rounded-xl border border-[#dcdcdc] bg-white 
                       focus:outline-none focus:ring-2 focus:ring-[#8BAE8E] text-gray-700"
            >
        </div>

        {{-- Button --}}
        <button 
            class="px-6 py-3 rounded-xl bg-[#8BAE8E] text-white font-medium hover:bg-[#7aa080] transition"
        >
            Update
        </button>
    </form>
</div>

@endsection

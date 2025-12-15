@extends('layouts.customer')

@section('content')

<h2 class="text-3xl font-semibold mb-8 text-gray-800">My Profile</h2>

<div class="grid md:grid-cols-2 gap-8 m-20">

    {{-- USER CARD --}}
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-[#C7E8D4]">
        <h3 class="text-xl font-bold mb-4 text-gray-700">Informasi Akun</h3>

        <div class="space-y-3 text-gray-700">
            <p><span class="font-semibold">Name:</span> {{ $user->name }}</p>
            <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
            <p>
                <span class="font-semibold">Role:</span>
                <span class="capitalize px-3 py-1 bg-[#E6F4EE] rounded-lg">
                    {{ $user->role }}
                </span>
            </p>
        </div>

        {{-- tombol edit profile --}}
        <div class="mt-6">
            <a href="#" class="inline-block px-5 py-2 rounded-lg bg-[#8BAE8E] text-white font-medium hover:opacity-90 focus:ring-[#8bae8e] focus:border-[#8bae8e] transition">
                Profile Edit
            </a>
        </div>
    </div>


    {{-- STORE CARD --}}
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-[#C7E8D4]">
        <h3 class="text-xl font-bold mb-4 text-gray-700">My Store</h3>

        {{-- BELUM MEMBUKA TOKO --}}
        @if(!$store)
            <p class="text-gray-600 mb-6">
                You don't have a store yet. Start creating your store today!
            </p>

            <a href="/store/register" 
                class="inline-block px-5 py-2 rounded-lg bg-[#8BAE8E] text-white font-semibold hover:opacity-90 focus:ring-[#8bae8e] focus:border-[#8bae8e] transition">
                Register Store
            </a>
        @endif


        {{-- SUDAH MENDAFTAR, MENUNGGU VERIFIKASI --}}
        @if($store && !$store->is_verified)
            <div class="p-4 bg-yellow-50 border border-yellow-300 rounded-xl text-yellow-700">
               Your store is currently awaiting admin verification.
            </div>

            <p class="mt-4 text-gray-700 font-medium">
                Store Name: {{ $store->store_name }}
            </p>
        @endif


        {{-- SELLER SUDAH VERIFIED --}}
        @if($store && $store->is_verified)
            <p class="text-gray-700 mb-4">
                You have an active store.
            </p>

            <div class="space-y-2 text-gray-700">
                <p><strong>Store Name:</strong> {{ $store->store_name }}</p>
                <p><strong>Status:</strong> 
                    <span class="px-3 py-1 rounded-lg bg-green-100 text-green-700">
                        Verified
                    </span>
                </p>
            </div>

            <div class="mt-6">
                <a href="/seller/dashboard"
                    class="inline-block px-5 py-2 rounded-lg bg-[#8BAE8E] text-white font-medium hover:opacity-90 focus:ring-[#8bae8e] focus:border-[#8bae8e] transition">
                    Manage Store
                </a>
            </div>
        @endif

    </div>

</div>

@endsection
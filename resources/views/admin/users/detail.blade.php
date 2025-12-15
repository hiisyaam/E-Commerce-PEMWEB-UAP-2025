@extends('layouts.admin')

@section('content')

<h2 class="text-3xl font-semibold mb-8 text-gray-800">Detail User</h2>

<div class="grid md:grid-cols-2 gap-10">

    {{-- USER CARD --}}
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-[#C7E8D4]">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-full bg-[#B8E0D2] flex items-center justify-center text-white text-xl font-bold">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <h3 class="text-2xl font-semibold text-gray-700">
                User Information
            </h3>
        </div>

        <div class="space-y-3 text-gray-700">
            <div class="flex justify-between">
                <span class="font-medium">Name</span>
                <span>{{ $user->name }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Email</span>
                <span>{{ $user->email }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Role</span>
                <span class="capitalize px-3 py-1 rounded-lg bg-[#EEF7F2] border border-[#D6F0E2]">
                    {{ $user->role }}
                </span>
            </div>
        </div>
    </div>

    {{-- STORE CARD --}}
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-[#C7E8D4]">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-full bg-[#8BAE8E] flex items-center justify-center text-white text-xl font-bold">
                🏬
            </div>
            <h3 class="text-2xl font-semibold text-gray-700">
                Store Information
            </h3>
        </div>

        @if($user->store)
            <div class="space-y-3 text-gray-700">

                <div class="flex justify-between">
                    <span class="font-medium">Store Name</span>
                    <span>{{ $user->store->store_name }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Phone</span>
                    <span>{{ $user->store->phone }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Address</span>
                    <span class="text-right max-w-[60%]">{{ $user->store->address }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium">Verified</span>
                    <span class="px-3 py-1 rounded-lg 
                        {{ $user->store->is_verified ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                        {{ $user->store->is_verified ? 'Verified' : 'Not Verified' }}
                    </span>
                </div>

            </div>
        @else
            <div class="text-gray-500 italic">User does not own a store.</div>
        @endif

    </div>

</div>

@endsection

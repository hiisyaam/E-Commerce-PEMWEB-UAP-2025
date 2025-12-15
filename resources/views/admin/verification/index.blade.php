@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-semibold mb-8">Store Verification</h2>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-[#8BAE8E]">

    <table class="w-full border-collapse overflow-hidden rounded-lg">
        <thead class=" bg-[#8BAE8E] text-white">
            <tr>
                <th class="p-4 text-left font-medium">Store Name</th>
                <th class="p-4 text-left font-medium">Owner</th>
                <th class="p-4 text-left font-medium">Email</th>
                <th class="p-4 text-left font-medium">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">

            @foreach($stores as $store)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 font-medium text-gray-700">
                    {{ $store->store_name }}
                </td>

                <td class="p-4 text-gray-700">
                    {{ $store->owner->name }}
                </td>

                <td class="p-4 text-gray-700">
                    {{ $store->owner->email }}
                </td>

                <td class="p-4">
                    <div class="flex gap-3">

                        {{-- VERIFY --}}
                        <form action="{{ route('admin.verification.verify', $store->id) }}" method="POST">
                            @csrf
                            <button 
                                class="px-4 py-2 rounded-lg font-medium border border-[#A3D9C9] 
                                bg-[#EEF7F2] text-[#2F3E46] hover:bg-[#DFF1E8] transition">
                                Verify
                            </button>
                        </form>

                        {{-- REJECT --}}
                        <form action="{{ route('admin.verification.reject', $store->id) }}" method="POST">
                            @csrf
                            <button 
                                class="px-4 py-2 rounded-lg font-medium border border-red-300
                                bg-red-100 text-red-700 hover:bg-red-200 transition">
                                Reject
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection

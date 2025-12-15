@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-semibold mb-8">Dashboard Overview</h1>

{{-- TOP CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

    {{-- Total Users --}}
    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6 flex flex-col gap-3">
        <p class="text-gray-500 text-sm">Total Users</p>
        <p class="text-3xl font-semibold">{{ $totalUsers }}</p>
    </div>

    {{-- Total Stores --}}
    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6 flex flex-col gap-3">
        <p class="text-gray-500 text-sm">Total Stores</p>
        <p class="text-3xl font-semibold">{{ $totalStores }}</p>
    </div>

    {{-- Pending Verification --}}
    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6 flex flex-col gap-3">
        <p class="text-gray-500 text-sm">Waiting Verification</p>
        <p class="text-3xl font-semibold">{{ $waitingVerification }}</p>
    </div>

</div>


{{-- TABLE: Pending Stores --}}
<div class="bg-white border border-gray-200 shadow-sm rounded-2xl overflow-hidden">

    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-semibold">Pending Stores</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Store Name</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Owner</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Email</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pendingStoresList as $store)
                    <tr class="border-b border-gray-100">
                        <td class="px-6 py-4">{{ $store->store_name }}</td>
                        <td class="px-6 py-4">{{ $store->user->name }}</td>
                        <td class="px-6 py-4">{{ $store->user->email }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.verification.show', $store->id) }}"
                               class="text-[#8BAE8E] font-medium hover:underline">Review</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                            No pending store verifications.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

@endsection

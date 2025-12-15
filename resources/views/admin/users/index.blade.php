@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-semibold mb-8">User & Store Management</h1>

{{-- WRAPPER CARD --}}
<div class="bg-white border border-gray-200 shadow-sm rounded-2xl overflow-hidden">

    {{-- HEADER --}}
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-semibold">All Users</h2>
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">

            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Name</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Email</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Role</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Store</th>
                    <th class="px-6 py-3 text-sm font-medium text-gray-600">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">

                        {{-- NAME --}}
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $user->name }}
                        </td>

                        {{-- EMAIL --}}
                        <td class="px-6 py-4 text-gray-700">
                            {{ $user->email }}
                        </td>

                        {{-- ROLE --}}
                        <td class="px-6 py-4 capitalize text-gray-700">
                            {{ $user->role }}
                        </td>

                        {{-- STORE --}}
                        <td class="px-6 py-4 text-gray-700">
                            {{ $user->store->store_name ?? '—' }}
                        </td>

                        {{-- ACTION --}}
                        <td class="px-6 py-4">
                            <a href="{{ url('/admin/users/' . $user->id) }}"
                                class="inline-block px-4 py-2 bg-[#8BAE8E] text-white text-sm rounded-lg shadow-sm hover:opacity-90 transition">
                                Detail
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection

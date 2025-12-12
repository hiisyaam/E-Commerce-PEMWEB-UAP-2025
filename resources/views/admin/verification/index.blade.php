{{-- resources/views/admin/verification/index.blade.php --}}
@extends('admin.layouts.admin')

@section('content')
<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Verifikasi Store</h1>
    </div>

    {{-- Pesan sukses / error --}}
    @if (session('success'))
        <div class="p-3 mb-4 bg-green-200 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-3 mb-4 bg-red-200 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Nama Store</th>
                    <th class="p-2 border">Alamat</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($stores as $store)
                    <tr>
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $store->name }}</td>
                        <td class="p-2 border">{{ $store->address }}</td>

                        <td class="p-2 border flex gap-2">
                            {{-- Approve --}}
                            <form action="{{ route('admin.verification.approve', $store->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-green-600 text-white rounded"
                                        onclick="return confirm('Setujui store ini?')">
                                    Approve
                                </button>
                            </form>

                            {{-- Reject --}}
                            <form action="{{ route('admin.verification.reject', $store->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-red-600 text-white rounded"
                                        onclick="return confirm('Tolak store ini?')">
                                    Reject
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">
                            Tidak ada store yang menunggu verifikasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection

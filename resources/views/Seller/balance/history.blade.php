@extends('layouts.seller')

@section('title','Riwayat Saldo')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-semibold tracking-tight text-[#8BAE8E]">
        Riwayat Saldo
    </h1>
    <p class="text-gray-500 text-sm mt-1">
        Semua transaksi keluar dan masuk saldo toko.
    </p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-[#e6e6e6] overflow-hidden">

    <table class="w-full text-left">
        <thead class="bg-[#fafafa] border-b border-[#e6e6e6]">
            <tr>
                <th class="px-6 py-4 font-semibold text-[#8BAE8E]">Keterangan</th>
                <th class="px-6 py-4 font-semibold text-[#8BAE8E]">Jumlah</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($transactions as $t)
            <tr class="border-b border-[#f1f1f1] hover:bg-[#f8f8f8] transition">
                <td class="px-6 py-4 text-gray-700">
                    {{ $t->description }}
                </td>
                <td class="px-6 py-4 font-medium 
                    {{ $t->amount > 0 ? 'text-green-600' : 'text-red-500' }}">
                    {{ $t->amount > 0 ? '+' : '-' }} 
                    Rp {{ number_format(abs($t->amount)) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="px-6 py-6 text-center text-gray-500">
                    Belum ada riwayat transaksi.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection

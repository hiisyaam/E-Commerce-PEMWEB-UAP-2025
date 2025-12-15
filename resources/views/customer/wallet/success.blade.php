@extends('layouts.customer')

@section('content')
<div class="max-w-xl mx-auto py-10 text-center">

    <h2 class="text-2xl font-bold mb-4">Pengajuan Topup Berhasil!</h2>

    <p class="mb-4">Silakan transfer ke nomor Virtual Account berikut:</p>

    <div class="bg-white p-6 rounded shadow mb-6">
        <p class="text-gray-700">VA Number:</p>
        <p class="text-3xl font-bold">{{ $topup->va_number }}</p>
        <p class="mt-3">Amount: <strong>Rp {{ number_format($topup->amount) }}</strong></p>
    </div>

    <a href="{{ route('customer.home') }}" class="bg-green-600 px-5 py-2 rounded text-white">
        Kembali ke Home
    </a>

</div>
@endsection

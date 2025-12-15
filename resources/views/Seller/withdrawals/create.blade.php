@extends('layouts.seller')

@section('title','Penarikan Dana')

@section('content')
<h1 class="text-2xl font-bold mb-4">Ajukan Penarikan Dana</h1>

<form action="{{ route('seller.withdrawals.store') }}" method="POST" class="space-y-4">
    @csrf

    <label>Jumlah</label>
    <input type="number" name="amount" class="w-full border p-2 rounded">

    <button class="px-4 py-2 bg-blue-600 text-white rounded">Ajukan</button>
</form>
@endsection

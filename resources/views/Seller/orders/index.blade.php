@extends('layouts.seller')

@section('title','Pesanan')

@section('content')
<h1 class="text-2xl font-bold mb-4">Pesanan Masuk</h1>

<table class="w-full bg-white rounded shadow">
<tr class="border-b">
    <th class="p-2">Invoice</th>
    <th class="p-2">Total</th>
    <th class="p-2">Status</th>
    <th class="p-2">Aksi</th>
</tr>

@foreach ($orders as $o)
<tr class="border-b">
    <td class="p-2">{{ $o->invoice }}</td>
    <td class="p-2">Rp {{ number_format($o->total) }}</td>
    <td class="p-2">{{ $o->status }}</td>
    <td class="p-2">
        <a href="{{ route('seller.orders.detail',$o->id) }}" class="text-blue-600">Detail</a>
    </td>
</tr>
@endforeach

</table>
@endsection

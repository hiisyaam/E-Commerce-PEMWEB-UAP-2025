@extends('layouts.seller')

@section('title','Riwayat Penarikan')

@section('content')
<h1 class="text-2xl font-bold mb-4">Riwayat Penarikan Dana</h1>

<table class="w-full bg-white rounded shadow">
    <tr>
        <th class="p-2">Jumlah</th>
        <th class="p-2">Status</th>
    </tr>

    @foreach ($withdrawals as $w)
    <tr class="border-b">
        <td class="p-2">Rp {{ number_format($w->amount) }}</td>
        <td class="p-2">{{ $w->status }}</td>
    </tr>
    @endforeach
</table>

@endsection


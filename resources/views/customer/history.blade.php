@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10">

    <h2 class="text-2xl font-bold mb-6">Transaction History</h2>

    @forelse($orders as $order)
        <div class="bg-white shadow rounded-xl p-5 mb-4">
            <div class="flex justify-between">
                <div>
                    <p class="font-semibold">Order #{{ $order->order_code }}</p>
                    <p class="text-gray-500 text-sm">{{ $order->created_at->format('d M Y H:i') }}</p>
                    <p class="mt-2">Total: <strong>Rp {{ number_format($order->total_amount) }}</strong></p>
                </div>

                <a href="{{ route('history.detail', $order->id) }}"
                   class="bg-green-600 text-white px-4 py-2 rounded-lg h-fit">
                    Details
                </a>
            </div>
        </div>

    @empty
        <p class="text-gray-500">No transactions found.</p>
    @endforelse

</div>
@endsection
@extends('layouts.member')

@section('content')
<div class="container py-5">
    <div class="payment-card">

        <h2 class="title">Cek Pembayaran</h2>

        <form action="{{ route('member.payment.check') }}" method="POST">
            @csrf

            <p class="label">Masukkan Nomor VA</p>
            <input type="text" name="va" class="form-control" required>

            <button class="btn-pay mt-3">Cek Pembayaran</button>
        </form>

    </div>
</div>
@endsection
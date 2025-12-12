@extends('layouts.member')

@section('content')
<style>
.payment-card {
    background: #fff;
    padding: 25px;
    border-radius: 16px;
    max-width: 520px;
    margin: auto;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid #eee;
}
.title {
    font-size: 24px;
    font-weight: 700;
    color: #A4133C;
    text-align: center;
    margin-bottom: 20px;
}
.label {
    font-weight: 600;
    color: #444;
}
.value-box {
    background: #f9f9f9;
    padding: 12px 15px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
}
.copy-btn {
    background: #A4133C;
    color: white;
    padding: 5px 12px;
    font-size: 13px;
    border-radius: 6px;
    cursor: pointer;
    border: none;
}
.btn-pay {
    background: #A4133C;
    color: white;
    padding: 14px;
    border: none;
    border-radius: 12px;
    width: 100%;
    font-size: 17px;
    margin-top: 20px;
    font-weight: 600;
    transition: 0.2s;
}
.btn-pay:hover {
    background: #C5184A;
    transform: scale(1.03);
}
</style>

<div class="container py-5">

    <div class="payment-card">

        <h2 class="title">Pembayaran Virtual Account</h2>

        <!-- NOMOR VA -->
        <p class="label">Nomor Virtual Account</p>
        <div class="value-box">
            <span id="vaText">{{ $transaction->va_number ?? '-' }}</span>
            <button class="copy-btn" onclick="copyVA()">Copy</button>
        </div>

        <!-- TOTAL BAYAR -->
        <p class="label mt-4">Total Bayar</p>
        <div class="value-box">
            Rp {{ number_format($transaction->grand_total, 0, ',', '.') }}
        </div>

        @if($transaction->payment_status == 'unpaid')
        <form action="{{ route('member.payment.process', $transaction->id) }}" method="POST">
            @csrf
            <button class="btn-pay">Bayar Sekarang</button>
        </form>
        @else
        <p class="text-success mt-4 text-center" style="font-weight:600;">
            Pembayaran Berhasil ✔
        </p>
        @endif

    </div>

</div>

<script>
function copyVA() {
    let text = document.getElementById('vaText').innerText;
    navigator.clipboard.writeText(text);

    alert("Nomor VA berhasil disalin!");
}
</script>

@endsection
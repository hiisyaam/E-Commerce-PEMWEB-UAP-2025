@extends('seller.layout')

@section('title','Pesanan')

@section('content')
<h3>Daftar Pesanan</h3>

@if(empty($orders))
    <p>Belum ada pesanan.</p>
@endif
@endsection

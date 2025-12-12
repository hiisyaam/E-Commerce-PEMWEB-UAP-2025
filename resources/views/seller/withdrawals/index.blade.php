@extends('seller.layout')

@section('title','Penarikan')

@section('content')
<h3>Riwayat Penarikan</h3>

@if(empty($withdrawals))
    <p>Belum ada data penarikan.</p>
@endif
@endsection

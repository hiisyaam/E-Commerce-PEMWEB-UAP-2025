@extends('seller.layout')

@section('title','Produk')

@section('content')
<h3>Daftar Produk</h3>

@if(empty($products))
    <p>Belum ada produk.</p>
@endif
@endsection

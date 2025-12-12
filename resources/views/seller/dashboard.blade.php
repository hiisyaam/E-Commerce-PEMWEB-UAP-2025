@extends('seller.layout')

@section('title','Dashboard')

@section('content')

<h2 class="page-title">Selamat Datang, {{ Auth::user()->name }}</h2>
<p class="text-muted">Ini dashboard seller, silakan pilih menu di sidebar.</p>

</div>
</div>

@php
    $store = Auth::user()->store; 
@endphp

<div class="row mt-4 g-4">
    <div class="col-md-4">
        <div class="card card-ethereal p-3">
            <h6 class="mb-2">Saldo Toko</h6>
            @php
                $balance = optional(optional($store)->storeBalance)->balance ?? 0;
            @endphp
            <h3 class="mb-0">Rp {{ number_format($balance,0,',','.') }}</h3>
            <a href="{{ route('seller.balance') }}" class="btn btn-primary-ethereal btn-sm mt-3">Ke Saldo</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-ethereal p-3">
            <h6 class="mb-2">Produk</h6>
            @php
                $productCount = optional(optional($store)->products)->count() ?? 0;
            @endphp
            <h3 class="mb-0">{{ $productCount }}</h3>
            <a href="{{ route('seller.products.index') }}" class="btn btn-primary-ethereal btn-sm mt-3">Kelola Produk</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-ethereal p-3">
            <h6 class="mb-2">Pesanan Masuk</h6>
            @php
                $pendingOrders = optional(optional($store)->transactions)->where('status','pending')->count() ?? 0;
            @endphp
            <h3 class="mb-0">{{ $pendingOrders }}</h3>
            <a href="{{ route('seller.orders') }}" class="btn btn-primary-ethereal btn-sm mt-3">Pesanan</a>
        </div>
    </div>
</div>

<div class="mt-4">
    <h5 class="page-title mt-4">Kategori & Produk Terbaru</h5>

    <div class="d-flex gap-3 mt-3 flex-wrap">
        @foreach(['Pena','Pensil','Buku','Highlighter','Washi Tape'] as $cat)
        <button class="card card-ethereal py-3 px-4 text-center fw-semibold 
               border-0"
            style="min-width:140px; cursor:pointer;">
        {{ $cat }}
            </button>

        @endforeach
    </div>

    <div class="row g-4 mt-3">
        @foreach(optional(optional($store)->products)->take(4) ?? [] as $p)
            @php
                $img = optional(optional($p->product_images)->first())->path ?? 'assets/images/placeholder.png';
            @endphp

            <div class="col-md-3">
                <div class="card product-card">
                    <img src="{{ asset($img) }}" 
                         class="card-img-top"
                         style="height:160px;object-fit:cover;">

                    <div class="card-body">
                        <h6 class="fw-semibold">{{ $p->name }}</h6>
                        <p class="fw-bold">Rp {{ number_format($p->price,0,',','.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

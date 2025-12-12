@extends('seller.layout')

@section('title','Profil Toko')

@section('content')
<h3 class="page-title mb-3">Profil Toko</h3>

<form>
    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Toko</label>
        <input class="form-control" placeholder="Nama tokoku...">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Tentang Toko</label>
        <textarea class="form-control" rows="3"></textarea>
    </div>

    <button class="btn btn-primary-ethereal">Simpan</button>
</form>
@endsection

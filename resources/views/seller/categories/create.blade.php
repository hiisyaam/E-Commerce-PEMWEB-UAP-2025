@extends('seller.layout') @section('content')
<h3>Tambah Kategori</h3>
<form action="{{ route('seller.categories.store') }}" method="POST">@csrf
  <input name="name" class="form-control mb-3" placeholder="Nama kategori">
  <button class="btn btn-primary-ethereal">Simpan</button>
</form>
@endsection

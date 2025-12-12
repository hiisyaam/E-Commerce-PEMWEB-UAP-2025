@extends('seller.layout') @section('content')
<h3>Tambah Produk</h3>
<form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">@csrf
  <input name="name" class="form-control mb-2" placeholder="Nama produk">
  <input name="price" type="number" class="form-control mb-2" placeholder="Harga">
  <input name="stock" type="number" class="form-control mb-2" placeholder="Stok">
  <select name="product_category_id" class="form-select mb-2">@foreach(\App\Models\ProductCategory::all() as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach</select>
  <textarea name="description" class="form-control mb-2" rows="3" placeholder="Deskripsi"></textarea>
  <input type="file" name="images[]" multiple class="form-control mb-2">
  <button class="btn btn-primary-ethereal">Simpan</button>
</form>
@endsection

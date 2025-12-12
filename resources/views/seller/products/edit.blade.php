@extends('seller.layout') @section('content')
<h3>Edit Produk</h3>
<form action="{{ route('seller.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
  <input name="name" value="{{ $product->name }}" class="form-control mb-2">
  <input name="price" value="{{ $product->price }}" class="form-control mb-2">
  <input name="stock" value="{{ $product->stock }}" class="form-control mb-2">
  <textarea name="description" class="form-control mb-2">{{ $product->description }}</textarea>
  <input type="file" name="images[]" multiple class="form-control mb-2">
  <button class="btn btn-primary-ethereal">Update</button>
</form>
@endsection

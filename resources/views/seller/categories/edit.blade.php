@extends('seller.layout') @section('content')
<h3>Edit Kategori</h3>
<form action="{{ route('seller.categories.update',$category->id) }}" method="POST">@csrf @method('PUT')
  <input name="name" value="{{ $category->name }}" class="form-control mb-3">
  <button class="btn btn-primary-ethereal">Update</button>
</form>
@endsection

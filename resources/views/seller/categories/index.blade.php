@extends('seller.layout')
@section('title','Kategori Produk')
@section('content')
  <div class="d-flex justify-content-between align-items-center">
    <h3>Kategori Produk</h3>
    <a href="{{ route('seller.categories.create') }}" class="btn btn-primary-ethereal">+ Tambah</a>
  </div>
  <table class="table mt-3">
    <thead><tr><th>#</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
      @foreach($categories as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>
          <a href="{{ route('seller.categories.edit',$c->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <form action="{{ route('seller.categories.destroy',$c->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

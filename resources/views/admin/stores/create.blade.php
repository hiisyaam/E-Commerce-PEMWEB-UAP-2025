@extends('admin.layouts.app')

@section('title', 'Tambah Store')

@section('content')
<div class="card shadow-sm p-4">
    <h4 class="mb-4">Tambah Store</h4>

    <form action="{{ route('admin.stores.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Store</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama store" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="address" class="form-control" placeholder="Masukkan alamat" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="description" class="form-control" placeholder="Masukkan keterangan"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.stores.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
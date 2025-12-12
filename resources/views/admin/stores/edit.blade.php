@extends('admin.layouts.app')

@section('title', 'Edit Store')

@section('content')
<div class="card shadow-sm p-4">
    <h4 class="mb-4">Edit Store</h4>

    <form action="{{ route('admin.stores.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Store</label>
            <input type="text" name="name" class="form-control" value="{{ $store->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ $store->address }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="description" class="form-control">{{ $store->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.stores.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
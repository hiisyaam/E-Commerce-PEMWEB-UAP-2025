@extends('layouts.seller')

@section('title','Edit Kategori')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('seller.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" id="name" name="name"
                           value="{{ $category->name }}"
                           class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success mt-3">Update</button>
            </form>

        </div>
    </div>

</div>
@endsection

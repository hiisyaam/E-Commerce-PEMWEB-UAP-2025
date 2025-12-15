@extends('layouts.seller')

@section('title', 'Profil Toko')

@section('content')
<h1 class="text-2xl font-bold mb-4">Profil Toko</h1>

<form action="{{ route('seller.store.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <img src="{{ asset('storage/' . $store->logo) }}" class="w-24 h-24 rounded mb-4">

    <div>
        <label>Nama Toko</label>
        <input type="text" name="name" value="{{ $store->name }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Logo (Optional)</label>
        <input type="file" name="logo" class="w-full">
    </div>

    <div>
        <label>Tentang Toko</label>
        <textarea name="about" class="w-full border p-2 rounded">{{ $store->about }}</textarea>
    </div>

    <div>
        <label>No HP</label>
        <input type="text" name="phone" value="{{ $store->phone }}" class="w-full border p-2 rounded">
    </div>

    <button class="px-4 py-2 bg-green-600 text-white rounded">Update</button>

</form>
@endsection


@extends('layouts.seller')

@section('title', 'Register Toko')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Toko</h1>

<form action="{{ route('seller.store.register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label>Nama Toko</label>
        <input type="text" name="name" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Logo</label>
        <input type="file" name="logo" class="w-full">
    </div>

    <div>
        <label>Tentang Toko</label>
        <textarea name="about" class="w-full border p-2 rounded"></textarea>
    </div>

    <div>
        <label>No HP</label>
        <input type="text" name="phone" class="w-full border p-2 rounded">
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded">Daftar</button>

</form>
@endsection


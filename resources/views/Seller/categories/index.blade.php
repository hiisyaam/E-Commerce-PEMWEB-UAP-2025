@extends('layouts.seller')

@section('title','Kategori')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Kategori</h1>

    <a href="{{ route('seller.categories.create') }}" class="btn btn-primary mb-3">
        Tambah Kategori
    </a>

    <div class="card shadow">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td class="d-flex gap-2">

                                <a href="{{ route('seller.categories.edit', $cat->id) }}"
                                   class="btn btn-sm btn-warning mr-2">
                                    Edit
                                </a>

                                <form action="{{ route('seller.categories.destroy', $cat->id) }}"
                                      method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection

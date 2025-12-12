@extends('admin.layouts.admin')

@section('title', 'Store Management')


@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Store</h4>
        <a href="{{ route('admin.stores.create') }}" class="btn btn-primary btn-sm">
            + Tambah Store
        </a>
    </div>

    <div class="card-body">
        @if ($stores->count() === 0)
            <div class="alert alert-warning text-center">
                Belum ada store.
            </div>
        @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Nama Store</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($stores as $store)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>{{ $store->description }}</td>
                    <td>
                        <a href="{{ route('admin.stores.edit', $store->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin menghapus store ini?');"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

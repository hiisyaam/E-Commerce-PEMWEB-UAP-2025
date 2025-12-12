
@extends('admin.layouts.admin')
@section('content')

<div class="container mt-5">

    <h2 class="fw-bold mb-4" style="color:#A4133C;">User Management</h2>

    <div class="bg-white p-4 rounded-3 shadow-sm border" 
         style="border-color: #f0d9df !important;">

        <table class="table align-middle">
            <thead class="text-white" style="background-color:#A4133C;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td class="text-capitalize">{{ $user->role }}</td>

                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm"
                                    style="background-color:#D00000; color:white;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-secondary py-3">
                        Tidak ada data user.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection
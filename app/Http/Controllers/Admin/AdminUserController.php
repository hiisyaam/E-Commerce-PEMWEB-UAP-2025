<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->role;

        $users = User::with('store')
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->get();

        return view('admin.users.index', compact('users', 'role'));
    }


    

    public function detail($id)
    {
        $user = User::with('store')->findOrFail($id);
        return view('admin.users.detail', compact('user'));
    }
}

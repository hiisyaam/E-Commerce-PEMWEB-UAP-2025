<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;

class AdminController extends Controller
{
    public function index()
    {

        $totalUsers = User::count();

        $totalStores = Store::count();

        $pendingStores = Store::where('is_verified', false)->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalStores',
            'pendingStores'
        ));
}
}

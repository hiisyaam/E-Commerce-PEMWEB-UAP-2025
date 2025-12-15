<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStores = Store::count();
        $pendingStores = Store::where('is_verified', false)->count();
        $waitingVerification = $pendingStores; 
        $verifications = Store::where('is_verified', false)->get();
        $pendingStoresList = Store::where('is_verified', false)->with('user')->get();


        return view('admin.dashboard', compact(
        'totalUsers',
        'totalStores',
        'pendingStores',
        'waitingVerification',
        'verifications',
        'pendingStoresList'
    ));

    }
}

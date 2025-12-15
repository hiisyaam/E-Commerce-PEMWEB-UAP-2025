<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        $store = Auth::user()->store;
        $products = $store->products()->count();
        $orders = $store->transactions()->count();

        return view('seller.dashboard', compact('store', 'products', 'orders'));
    }
}

<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class SellerOrderController extends Controller
{
    public function index()
    {
        $orders = [];
        return view('seller.orders.index', compact('orders'));
    }
}

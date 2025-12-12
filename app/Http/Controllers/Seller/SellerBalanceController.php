<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class SellerBalanceController extends Controller
{
    public function index()
    {
        return view('seller.balance.index');
    }
}

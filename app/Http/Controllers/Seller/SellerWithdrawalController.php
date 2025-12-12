<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class SellerWithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = []; 
        return view('seller.withdrawals.index', compact('withdrawals'));
    }
}

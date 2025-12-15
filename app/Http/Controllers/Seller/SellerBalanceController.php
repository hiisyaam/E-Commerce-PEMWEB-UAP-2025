<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerBalanceController extends Controller
{
    public function index()
    {
        $balance = Auth::user()->store->storeBallance;
        return view('seller.balance.index', compact('balance'));
    }

    public function history()
    {
        $transactions = Auth::user()->store->transactions()->latest()->get();
        return view('seller.balance.history', compact('transactions'));
    }
}

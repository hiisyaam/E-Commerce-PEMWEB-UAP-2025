<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerWithdrawalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->store) {
            $store = \App\Models\Store::create([
                'user_id' => $user->id,
                'name' => $user->name . "'s Store",
                'about' => 'Store description',
                'phone' => '-',
            ]);
        } else {
            $store = $user->store;
        }

        if (!$store->storeBalance) {
            $store->storeBalance()->create([
                'balance' => 0
            ]);
        }

        $withdrawals = Withdrawal::where('store_balance_id', $store->storeBalance->id)
            ->latest()
            ->get();

        return view('seller.withdrawals.index', compact('withdrawals'));
    }




    public function create()
    {
        return view('seller.withdrawals.create');
    }

    public function store(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:10000']);

        Withdrawal::create([
            'store_id' => Auth::user()->store->id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->route('seller.withdrawals.index')
            ->with('success', 'Permintaan penarikan dana dikirim!');
    }
}

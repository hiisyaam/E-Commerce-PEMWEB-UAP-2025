<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index()
{
    $wallet = Wallet::firstOrCreate(
        ['user_id' => auth()->id()],
        ['balance' => 0]
    );

    $history = WalletTransaction::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->get();

    return view('member.wallet.index', compact('wallet', 'history'));
}

    public function createVA(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000'
        ]);

        $va = 'VA' . now()->timestamp . rand(100, 999);

        $trx = WalletTransaction::create([
            'user_id'   => auth()->id(),
            'va_number' => $va,
            'amount'    => $request->amount,
            'status'    => 'pending'
        ]);

        return redirect()->route('member.wallet.pay', $trx->id);
    }

    public function pay(WalletTransaction $transaction)
{
    $wallet = Wallet::firstOrCreate(
        ['user_id' => auth()->id()],
        ['balance' => 0]
    );

    $history = WalletTransaction::where('user_id', auth()->id())
        ->orderBy('id', 'desc')
        ->get();

    return view('member.wallet.pay', compact('transaction', 'wallet', 'history'));
}


    public function simulatePayment(Request $request, WalletTransaction $transaction)
{
    if ($transaction->status === 'paid') {
        return redirect()->back()->with('error', 'Transaksi sudah dibayar.');
    }

    DB::transaction(function () use ($transaction) {

        $transaction->update(['status' => 'paid']);

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $transaction->user_id],
            ['balance' => 0]
        );

        $wallet->update([
            'balance' => $wallet->balance + $transaction->amount
        ]);
    });

    return redirect()->route('member.wallet.index')
        ->with('success', 'Pembayaran berhasil! Saldo berhasil ditambahkan.');
}
}
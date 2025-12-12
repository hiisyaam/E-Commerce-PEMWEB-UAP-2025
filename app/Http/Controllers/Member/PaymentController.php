<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\UserBalance;
use App\Models\StoreBalance;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('member.payment.index'); 
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('member.payment.pay', compact('transaction'));
    }

    public function confirmPayment(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->payment_status === 'paid') {
            return redirect()->route('member.transactions.index')->with('info', 'Transaksi sudah dibayar.');
        }

        $transaction->update(['payment_status' => 'paid']);

        StoreBalance::addToStore($transaction->store_id, $transaction->grand_total);

        return redirect()->route('member.transactions.index')->with('success', 'Pembayaran berhasil!');
    }

    public function checkVA(Request $request)
    {
        $topup = UserBalance::where('va_number', $request->va)->first();
        if ($topup) {
            return view('member.payment.confirm', ['type'=>'topup','data'=>$topup]);
        }

        $trx = Transaction::where('va_number', $request->va)->first();
        if ($trx) {
            return view('member.payment.confirm', ['type'=>'purchase','data'=>$trx]);
        }

        return back()->with('error','Kode VA tidak ditemukan');
    }
    public function confirmVA($type, $id)
{

    if ($type === 'topup') {

        $topup = UserBalance::findOrFail($id);

        if ($topup->status === 'paid') {
            return back()->with('error', 'Topup sudah diproses.');
        }

        $topup->update(['status' => 'paid']);

        $user = $topup->user;
        $user->balance->update([
            'balance' => $user->balance->balance + $topup->amount
        ]);

        return redirect()->route('member.payment.index')
            ->with('success', 'Topup berhasil! Saldo bertambah.');
    }

    if ($type === 'purchase') {

        $trx = Transaction::findOrFail($id);

        if ($trx->payment_status === 'paid') {
            return back()->with('error', 'Transaksi sudah dibayar.');
        }

        $trx->update(['payment_status' => 'paid']);

        StoreBalance::addToStore($trx->store_id, $trx->grand_total);

        return redirect()->route('member.payment.index')
            ->with('success', 'Pembayaran berhasil!');
    }

    return back()->with('error', 'Jenis pembayaran tidak valid.');
}
}
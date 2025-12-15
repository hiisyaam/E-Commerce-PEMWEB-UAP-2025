<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VirtualAccount;
use App\Models\UserBalance;
use App\Models\Transaction;
use App\Models\StoreBalance;

class PaymentController extends Controller
{
    public function paymentPage()
    {
        return view('payment.index');
    }

    public function checkVA(Request $request)
    {
        $va = VirtualAccount::where('code', $request->code)->first();

        if (!$va) {
            return back()->with('error', 'Kode VA tidak ditemukan');
        }

        return view('payment.confirm', compact('va'));
    }

    public function confirmPayment(Request $request)
    {
        $va = VirtualAccount::find($request->va_id);

        if (!$va) {
            return back()->with('error', 'VA tidak ditemukan');
        }

        if ($va->status !== 'pending') {
            return back()->with('error', 'VA sudah diproses sebelumnya');
        }

        //topup saldo
        if ($va->type === 'topup') {
            $balance = UserBalance::firstOrCreate(
                ['user_id' => $va->user_id],
                ['balance' => 0]
            );

            $balance->balance += $va->amount;
            $balance->save();

            $va->status = 'paid';
            $va->save();

            return redirect()->route('wallet.topup')->with('success', 'Topup berhasil!');
        }

        //pembelian produk
        if($va->type === 'transaction'){
            $transaction = Transaction::find($va->transaction_id);

            if (!$transaction) {
                return back()->with('error', 'Transaksi tidak ditemukan');
            }

            $transaction->payment_status = 'paid';
            $transaction->save();

            // Tambah saldo toko
            $storeBalance = StoreBalance::firstOrCreate(
                ['store_id' => $transaction->store_id],
                ['balance' => 0]
            );

            $storeBalance->balance += $transaction->grand_total;
            $storeBalance->save();

            $va->status = 'paid';
            $va->save();

            return redirect()->route('history')->with('success', 'Pembayaran berhasil!');

        }
    }    
}

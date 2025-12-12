<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('buyer_id', auth()->id())
            ->with('details.product')
            ->latest()
            ->get();

        return view('member.transactions.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::with('details.product')
            ->where('buyer_id', auth()->id())
            ->findOrFail($id);

        return view('history.show', compact('transaction'));
    }
}
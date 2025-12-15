<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\TopupRequest;
use Illuminate\Http\Request;

class CustomerWalletController extends Controller
{
    public function topup()
    {
        return view('customer.wallet.topup');
    }

    public function submitTopup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000'
        ]);

        $topup = TopupRequest::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'va_number' => '777' . rand(10000000, 99999999),
            'status' => 'pending',
        ]);

        return redirect()->route('customer.wallet.success', $topup->id);
    }

    public function success($id)
    {
        $topup = TopupRequest::findOrFail($id);

        return view('customer.wallet.success', compact('topup'));
    }
}

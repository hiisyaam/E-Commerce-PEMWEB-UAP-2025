<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBalance;
use App\Models\VirtualAccount;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public function topupPage()
    {
        return view('wallet.topup');
    }

    public function createTopupVA(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000'
        ]);

        $user = auth()->user();

        // Generate kode VA unik
        $va_code = 'VA' . time() . rand(100,999);

        $va = VirtualAccount::create([
            'user_id' => $user->id,
            'type' => 'topup',
            'code' => $va_code,
            'amount' => $request->amount,
            'status' => 'pending'
        ]);
        
        return redirect()->back()->with('success', 'VA berhasil dibuat: ' . $va->code);
    }
}

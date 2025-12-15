<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CustomerCheckoutController extends Controller
{
    public function index()
    {
        return view('customer.checkout');
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'shipping_type' => 'required',
            'product_id' => 'required',
            'payment_method' => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'total_price' => $product->price,
            'shipping_type' => $request->shipping_type,
            'shipping_cost' => $request->shipping_type === 'express' ? 20000 : 10000,
            'payment_method' => $request->payment_method,
            'address' => $request->address,
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'qty' => 1,
            'price' => $product->price
        ]);

        return redirect()->route('customer.history')->with('success', 'Checkout berhasil!');
    }
}

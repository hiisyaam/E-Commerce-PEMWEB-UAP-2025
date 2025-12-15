<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Keranjang masih kosong.');
        }

        return view('checkout.index', [
            'cart' => $cart
        ]);
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'shipping_type' => 'required', // regular / express
            'payment_method' => 'required' // saldo / va
        ]);

        $cart = session('cart', []);

        $shipping_cost = $request->shipping_type === 'express' ? 20000 : 10000;

        $cart_total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);

        $total = $cart_total + $shipping_cost;

        // CEK SALDO
        if ($request->payment_method === 'saldo') {
            if (auth()->user()->wallet_balance < $total) {
                return back()->with('error', 'Saldo tidak cukup!');
            }
            // potong saldo
            auth()->user()->decrement('wallet_balance', $total);
        }

        // SIMPAN TRANSAKSI
        $trx = Transaction::create([
            'user_id' => auth()->id(),
            'address' => $request->address,
            'shipping_type' => $request->shipping_type,
            'shipping_cost' => $shipping_cost,
            'payment_method' => $request->payment_method,
            'total_amount' => $total,
            'status' => 'paid'
        ]);

        // SIMPAN DETAIL
        foreach ($cart as $item) {
            TransactionDetail::create([
                'transaction_id' => $trx->id,
                'product_id' => $item['id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['qty'],
            ]);

            // KURANGI STOCK
            Product::where('id', $item['id'])->decrement('stock', $item['qty']);
        }

        // CLEAR CART
        session()->forget('cart');

        return redirect('/wallet/sukses')->with('success', 'Checkout berhasil!');
    }
}

<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\ShippingType;
use App\Models\UserBalance;
use App\Models\StoreBalance;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $shippingTypes = ShippingType::all();
        $qty = $request->qty ?? 1;

        return view('member.checkout.index', compact('product', 'shippingTypes', 'qty'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'product_id'     => 'required',
            'shipping_type'  => 'required',
            'payment_method' => 'required',
            'address'        => 'required',
        ]);

        $qty = $request->qty ?? 1;

        $product       = Product::findOrFail($request->product_id);
        $shippingType  = ShippingType::findOrFail($request->shipping_type);

        $shippingCost = $shippingType->cost;
        $subtotal     = $product->price * $qty;
        $total        = $subtotal + $shippingCost;

        $transactionData = [
            'code'           => 'TRX' . time(),
            'buyer_id'       => auth()->id(),
            'store_id'       => $product->store_id,
            'shipping_type'  => $shippingType->name,
            'shipping_cost'  => $shippingCost,
            'grand_total'    => $total,
            'tax'            => 0,
            'address'        => $request->address,
            'city'           => $request->city ?? 'Unknown',
            'postal_code'    => $request->postal_code ?? '00000',
            'address_id'     => 'ADDR' . time(),
            'shipping'       => $shippingType->name,
        ];

        if ($request->payment_method === 'wallet') {

            $wallet = UserBalance::firstOrCreate(
                ['user_id' => auth()->id()],
                ['balance' => 0]
            );

            if ($wallet->balance < $total) {
                return back()->with('error', 'Saldo tidak cukup. Silakan topup terlebih dahulu.');
            }

            $wallet->decrement('balance', $total);

            $transactionData['payment_status'] = 'paid';

            $transaction = Transaction::create($transactionData);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id'     => $product->id,
                'qty'            => $qty,
                'subtotal'       => $subtotal,
            ]);

            StoreBalance::addToStore($product->store_id, $total);

            return redirect()->route('member.transactions.index')
                ->with('success', 'Pembayaran berhasil menggunakan saldo (wallet).');
        }



        $transactionData['payment_status'] = 'unpaid';

        $transaction = Transaction::create($transactionData);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id'     => $product->id,
            'qty'            => $qty,
            'subtotal'       => $subtotal,
        ]);

        $transaction->update([
            'va_number' => rand(1000000000, 9999999999)
        ]);

        return redirect()->route('member.payment.page', $transaction->id);
    }
}
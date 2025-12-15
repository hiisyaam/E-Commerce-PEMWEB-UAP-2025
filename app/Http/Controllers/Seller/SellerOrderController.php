<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerOrderController extends Controller
{
    public function index()
    {
        $storeId = Auth::user()->store->id;

        $orders = Transaction::where('store_id', $storeId)->latest()->get();

        return view('seller.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Transaction::where('store_id', Auth::user()->store->id)->findOrFail($id);

        return view('seller.orders.detail', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Transaction::where('store_id', Auth::user()->store->id)->findOrFail($id);

        $order->update([
            'status' => $request->status,
            'tracking_number' => $request->tracking_number,
        ]);

        return back()->with('success', 'Status pesanan diperbarui!');
    }
}

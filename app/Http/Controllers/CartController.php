<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        $qty = $request->qty;

        if (isset($cart[$id])) {
            $cart[$id] += $qty;
        } else {
            $cart[$id] = $qty;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk ditambahkan ke keranjang!'
        ]);
    }
}

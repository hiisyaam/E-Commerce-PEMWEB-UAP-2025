<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
{
    $product = Product::findOrFail($request->product_id);

    $qty = $request->quantity; 

    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['qty'] += $qty;
    } else {
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'image' => $product->productImages->where('is_thumbnail', true)->first()->image ?? '/no-image.png'
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('member.checkout.index');
}
}
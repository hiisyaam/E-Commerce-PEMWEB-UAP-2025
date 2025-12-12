<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class SellerProductController extends Controller
{
    public function index()
    {
        $products = []; 
        return view('seller.products.index', compact('products'));
    }
}

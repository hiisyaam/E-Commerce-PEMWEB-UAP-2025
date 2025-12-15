<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class CustomerHomeController extends Controller
{
    public function index()
    {
        
        $products = Product::with('store', 'productImages')->latest()->get();
        $categories = ProductCategory::all();
        return view('customer.home', compact('products', 'categories'));
    }
}

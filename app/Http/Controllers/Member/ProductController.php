<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();

        $products = Product::with('store', 'productImages')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
{
    $product = Product::with([
        'store',
        'productImages',
        'reviews' 
    ])->findOrFail($id);

    return view('member.products.show', compact('product'));
}
}
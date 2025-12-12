<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Product;              
use App\Models\ProductCategory; 

class MemberDashboardController extends Controller
{
    public function index()
{
    return view('member.dashboard', [
        'products' => Product::latest()->take(12)->get(),
        'categories' => ProductCategory::all(),
    ]);
}
}
<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class SellerCategoryController extends Controller
{
    public function index()
    {
        return view('seller.categories.index');
    }
}

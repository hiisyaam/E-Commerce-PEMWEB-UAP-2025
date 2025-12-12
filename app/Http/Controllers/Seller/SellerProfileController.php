<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class SellerProfileController extends Controller
{
    public function index()
    {
        return view('seller.profile.index');
    }
}

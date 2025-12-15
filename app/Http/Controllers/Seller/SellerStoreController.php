<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerStoreController extends Controller
{
    public function registerForm()
    {
        // Kalau user sudah punya toko, redirect ke dashboard seller
        if (Auth::user()->store) {
            return redirect()->route('seller.dashboard');
        }

        return view('seller.store.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'about' => 'required',
            'phone' => 'required',
        ]);

        if (Auth::user()->store) {
            return back()->with('error', 'Kamu sudah memiliki toko!');
        }

        $logoPath = $request->file('logo')->store('stores/logo', 'public');

        Store::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'logo' => $logoPath,
            'about' => $request->about,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('seller.dashboard')->with('success', 'Toko berhasil dibuat!');
    }

    public function edit()
    {
        $store = Auth::user()->store;
        return view('seller.store.profile', compact('store'));
    }

    public function update(Request $request)
{
    $store = Auth::user()->store;

    $request->validate([
        'name' => 'required',
        'about' => 'required',
        'phone' => 'required',
    ]);

    if ($request->hasFile('logo')) {
        Storage::disk('public')->delete($store->logo);
        $store->logo = $request->file('logo')->store('stores/logo', 'public');
    }

    $store->update($request->only([
        'name', 'about', 'phone', 'city', 'address', 'postal_code'
    ]));

    return back()->with('success', 'Profil toko diperbarui!');
}


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;

class AdminVerificationController extends Controller
{
    public function index()
    {
        $stores = Store::where('is_verified', false)->get();
        return view('admin.verification.index', compact('stores'));
    }

    public function approve($id)
    {
        $store = Store::findOrFail($id);
        $store->is_verified = true;
        $store->save();

        return redirect()->back()->with('success', 'Toko berhasil diverifikasi');
    }

    public function reject($id)
    {
        $store = Store::findOrFail($id);
        $store->is_verified = false;
        $store->save();

        return redirect()->back()->with('error', 'Pendaftaran toko ditolak');
    }
}

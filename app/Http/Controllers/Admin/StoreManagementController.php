<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreManagementController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
{
    return view('admin.stores.create');
}

public function store(Request $request)
{
    Store::create([
        'name' => $request->name,
        'address' => $request->address,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.stores.index')->with('success', 'Store berhasil ditambahkan!');
}

public function edit($id)
{
    $store = Store::findOrFail($id);
    return view('admin.stores.edit', compact('store'));
}

public function update(Request $request, $id)
{
    $store = Store::findOrFail($id);

    $store->update([
        'name' => $request->name,
        'address' => $request->address,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.stores.index')->with('success', 'Store berhasil diperbarui!');
}

public function delete($id)
{
    Store::findOrFail($id)->delete();
    return redirect()->route('admin.stores.index')->with('success', 'Store berhasil dihapus!');
}
}
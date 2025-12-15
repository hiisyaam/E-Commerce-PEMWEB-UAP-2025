<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerCategoryController extends Controller
{
    public function index()
    {
        $storeId = Auth::user()->store->id;
        $categories = ProductCategory::where('store_id', $storeId)->get();

        return view('seller.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('seller.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        ProductCategory::create([
            'store_id' => Auth::user()->store->id,
            'name' => $request->name,
        ]);

        return redirect()->route('seller.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $category = ProductCategory::where('store_id', Auth::user()->store->id)->findOrFail($id);
        return view('seller.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::where('store_id', Auth::user()->store->id)->findOrFail($id);

        $request->validate(['name' => 'required']);

        $category->update(['name' => $request->name]);

        return redirect()->route('seller.categories.index')->with('success', 'Kategori diperbarui!');
    }

    public function destroy($id)
    {
        $category = ProductCategory::where('store_id', Auth::user()->store->id)->findOrFail($id);
        $category->delete();

        return back()->with('success', 'Kategori dihapus!');
    }
}

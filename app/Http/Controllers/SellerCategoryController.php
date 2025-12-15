<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class SellerCategoryController extends Controller
{
    // Menampilkan semua kategori milik seller
    public function index()
    {
        $categories = ProductCategory::where('user_id', auth()->id())->get();

        return view('seller.categories.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('seller.categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        ProductCategory::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);

        // Memastikan seller hanya mengedit kategorinya sendiri
        if ($category->user_id != auth()->id()) {
            abort(403);
        }

        return view('seller.categories.edit', compact('category'));
    }

    // Update kategori
    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        if ($category->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if ($category->user_id != auth()->id()) {
            abort(403);
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}

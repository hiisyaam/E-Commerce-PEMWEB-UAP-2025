<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SellerProductController extends Controller
{
    // Menampilkan semua produk seller
    public function index()
    {
        $storeId = auth()->user()->store->id;

        $products = Product::where('store_id', $storeId)->get();

        return view('seller.products.index', compact('products'));
    }

    // Form tambah produk
    public function create()
    {
        $storeId = auth()->user()->store->id;

        $categories = ProductCategory::all();

        return view('seller.products.create', compact('categories'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:70',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:product_categories,id',
            'image' => 'nullable|image|max:2048'

        ]);

        // Upload gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // Form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id != auth()->id()) {
            abort(403);
        }

        $categories = ProductCategory::where('user_id', auth()->id())->get();

        return view('seller.products.edit', compact('product', 'categories'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|min:3|max:70',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        // Upload gambar baru kalau ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id != auth()->id()) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}

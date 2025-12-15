<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerProductController extends Controller
{
    public function index()
    {
        $storeId = Auth::user()->store->id;
        $products = Product::where('store_id', $storeId)->get();

        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::where('store_id', Auth::user()->store->id)->get();
        return view('seller.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image',
        ]);

        $thumbPath = $request->file('thumbnail')->store('products/thumbnail', 'public');

        Product::create([
            'store_id' => Auth::user()->store->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'thumbnail' => $thumbPath,
            'price' => $request->price,
            'stock' => $request->stock ?? 0,
            'description' => $request->description,
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        $categories = ProductCategory::where('store_id', Auth::user()->store->id)->get();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($product->thumbnail);
            $product->thumbnail = $request->file('thumbnail')->store('products/thumbnail', 'public');
        }

        $product->update($request->only(['name', 'category_id', 'price', 'stock', 'description']));

        return redirect()->route('seller.products.index')->with('success', 'Produk diperbarui!');
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        Storage::disk('public')->delete($product->thumbnail);
        $product->delete();

        return back()->with('success', 'Produk dihapus!');
    }

    private function authorizeProduct($product)
    {
        if ($product->store_id != Auth::user()->store->id) {
            abort(403);
        }
    }
}

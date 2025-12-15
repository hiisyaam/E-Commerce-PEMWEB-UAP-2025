<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerProductImageController extends Controller
{
    public function index(Product $product)
    {
        $this->authorizeProduct($product);

        $images = $product->images;
        return view('seller.products.images', compact('product', 'images'));
    }

    public function store(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $request->validate([
            'images.*' => 'required|image'
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('products/images', 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'image' => $path,
            ]);
        }

        return back()->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function destroy(Product $product, ProductImage $image)
    {
        $this->authorizeProduct($product);

        Storage::disk('public')->delete($image->image);
        $image->delete();

        return back()->with('success', 'Gambar dihapus!');
    }

    private function authorizeProduct($product)
    {
        if ($product->store_id != Auth::user()->store->id) {
            abort(403);
        }
    }
}

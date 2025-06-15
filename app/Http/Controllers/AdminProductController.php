<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function products()
    {
        return view('admin.products');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'jam_buka' => 'required|string',
            'telepon' => 'required|string',
            'platform' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:51200',
            'shop_description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('produk', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Toko berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'jam_buka' => 'required|string',
            'telepon' => 'required|string',
            'platform' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:51200',
            'shop_description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('produk', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Toko berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Toko berhasil dihapus.');
    }

    public function show(Product $product)
    {
        // menampilkan detail toko dan menampilkan daftar menu
        $product->load('menus');
        return view('admin.products.show', compact('product'));
    }
}

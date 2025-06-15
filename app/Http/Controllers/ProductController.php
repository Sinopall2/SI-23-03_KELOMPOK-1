<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\HighlightProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Tampilkan produk ke halaman utama (home)
    public function index() {
        $products = Product::latest()->get();
        $highlights = HighlightProduct::latest()->get();

        // Fallback: jika tidak ada highlight, pakai semua produk
        if ($highlights->isEmpty() && $products->count() > 0) {
            $highlights = $products->map(function($product) {
                return (object)[
                    'title' => $product->name,
                    'description' => $product->description,
                    'image' => $product->image,
                    'product_id' => $product->id,
                ];
            });
        }

        return view('home', [
            'products' => $products,
            'highlights' => $highlights,
        ]);
    }

    public function productList() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->incrementView();
        return view('products.show', compact('product'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HighlightProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminHighlightController extends Controller
{
    public function index()
    {
        $highlights = HighlightProduct::latest()->get();
        return view('admin.highlight.index', compact('highlights'));
    }

    public function create()
    {
        $products = Product::all(); // ambil semua produk untuk dipilih
        return view('admin.highlight.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:51200',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('highlight', 'public');
        }

        HighlightProduct::create($data);

        return redirect()->route('admin.highlight.index')->with('success', 'Produk unggulan berhasil disimpan.');
    }

    public function edit($id)
    {
        $highlight = HighlightProduct::findOrFail($id);
        $products = Product::all();

        return view('admin.highlight.edit', compact('highlight', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:51200',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $highlight = HighlightProduct::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($highlight->image) {
                Storage::disk('public')->delete($highlight->image);
            }
            $data['image'] = $request->file('image')->store('highlight', 'public');
        }

        $highlight->update($data);

        return redirect()->route('admin.highlight.index')->with('success', 'Produk unggulan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $highlight = HighlightProduct::findOrFail($id);

        if ($highlight->image) {
            Storage::disk('public')->delete($highlight->image);
        }

        $highlight->delete();

        return redirect()->route('admin.highlight.index')->with('success', 'Produk unggulan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;  // Assuming you have a Product model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = new Review();
        $review->product_id = $productId;
        $review->user_id = Auth::id(); // Assuming user is logged in
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->save();

        return back()->with('success', 'Review added successfully');
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $reviews = $product->reviews()->with('user')->get();
        
        return view('product.show', compact('product', 'reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with('success', 'Review berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display reviews for a product
     */
    public function index($productId)
    {
        $reviews = Review::with('user')
            ->where('product_id', $productId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($reviews);
    }

    /**
     * Create a new review
     */
    public function store(Request $request, $productId)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $userId = $request->user()->id;

        // Kiểm tra product tồn tại
        Product::findOrFail($productId);

        // Kiểm tra user đã review chưa
        $existingReview = Review::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();

        if ($existingReview) {
            return response()->json(['message' => 'You have already reviewed this product'], 400);
        }

        $review = Review::create([
            'product_id' => $productId,
            'user_id' => $userId,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null
        ]);

        $review->load('user');

        return response()->json($review, 201);
    }

    /**
     * Update a review
     */
    public function update(Request $request, $productId, $id)
    {
        $validated = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $userId = $request->user()->id;
        $review = Review::where('product_id', $productId)
            ->where('user_id', $userId)
            ->findOrFail($id);

        $review->update($validated);
        $review->load('user');

        return response()->json($review);
    }

    /**
     * Delete a review
     */
    public function destroy(Request $request, $productId, $id)
    {
        $userId = $request->user()->id;
        $review = Review::where('product_id', $productId)
            ->where('user_id', $userId)
            ->findOrFail($id);

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully'], 200);
    }
}

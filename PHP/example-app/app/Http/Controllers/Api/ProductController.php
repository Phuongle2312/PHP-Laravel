<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand', 'images', 'reviews']);

        // Filter by brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Search by product name
        if ($request->has('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        // Filter featured products
        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $products = $query->paginate($request->get('per_page', 15));

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'storage' => 'nullable|string',
            'ram' => 'nullable|string',
            'color' => 'nullable|string',
            'screen_size' => 'nullable|string',
            'battery' => 'nullable|string',
            'camera' => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'is_featured' => 'boolean'
        ]);

        $product = Product::create($validated);
        $product->load(['category', 'brand', 'images']);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'images', 'reviews.user'])
            ->findOrFail($id);

        // Thêm average rating vào response
        $product->average_rating = $product->reviews->avg('rating') ?? 0;
        $product->reviews_count = $product->reviews->count();

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'sometimes|string|max:255',
            'brand_id' => 'sometimes|exists:brands,id',
            'category_id' => 'sometimes|exists:categories,id',
            'price' => 'sometimes|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'storage' => 'nullable|string',
            'ram' => 'nullable|string',
            'color' => 'nullable|string',
            'screen_size' => 'nullable|string',
            'battery' => 'nullable|string',
            'camera' => 'nullable|string',
            'stock_quantity' => 'sometimes|integer|min:0',
            'is_featured' => 'boolean'
        ]);

        $product->update($validated);
        $product->load(['category', 'brand', 'images']);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}


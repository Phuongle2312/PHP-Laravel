<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of brands
     */
    public function index()
    {
        $brands = Brand::withCount('products')->get();
        return response()->json($brands);
    }

    /**
     * Store a newly created brand
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $brand = Brand::create($validated);
        return response()->json($brand, 201);
    }

    /**
     * Display the specified brand with products
     */
    public function show($id)
    {
        $brand = Brand::with('products')->findOrFail($id);
        return response()->json($brand);
    }

    /**
     * Update the specified brand
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'logo' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $brand->update($validated);
        return response()->json($brand);
    }

    /**
     * Remove the specified brand
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json(['message' => 'Brand deleted successfully'], 200);
    }
}

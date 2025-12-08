<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display cart items
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $cartItems = CartItem::with('product.images')
            ->where('user_id', $userId)
            ->get();

        // Tính tổng tiền
        $total = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?? $item->product->price;
            $total += $price * $item->quantity;
        }

        return response()->json([
            'items' => $cartItems,
            'total' => $total,
            'count' => $cartItems->sum('quantity')
        ]);
    }

    /**
     * Add product to cart
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = $request->user()->id;
        $product = Product::findOrFail($validated['product_id']);

        // Kiểm tra stock
        if ($product->stock_quantity < $validated['quantity']) {
            return response()->json(['message' => 'Not enough stock'], 400);
        }

        // Kiểm tra xem product đã có trong cart chưa
        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($cartItem) {
            // Cập nhật quantity
            $newQuantity = $cartItem->quantity + $validated['quantity'];
            if ($product->stock_quantity < $newQuantity) {
                return response()->json(['message' => 'Not enough stock'], 400);
            }
            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            // Tạo mới
            $cartItem = CartItem::create([
                'user_id' => $userId,
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity']
            ]);
        }

        $cartItem->load('product');

        return response()->json($cartItem, 201);
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = $request->user()->id;
        $cartItem = CartItem::where('user_id', $userId)->findOrFail($id);

        // Kiểm tra stock
        if ($cartItem->product->stock_quantity < $validated['quantity']) {
            return response()->json(['message' => 'Not enough stock'], 400);
        }

        $cartItem->update(['quantity' => $validated['quantity']]);
        $cartItem->load('product');

        return response()->json($cartItem);
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request, $id)
    {
        $userId = $request->user()->id;
        $cartItem = CartItem::where('user_id', $userId)->findOrFail($id);
        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart'], 200);
    }

    /**
     * Clear entire cart
     */
    public function clear(Request $request)
    {
        $userId = $request->user()->id;
        CartItem::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Cart cleared'], 200);
    }
}

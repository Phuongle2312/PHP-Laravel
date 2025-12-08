<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display user's orders
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $orders = Order::with(['orderItems.product'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($orders);
    }

    /**
     * Create a new order from cart
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string|in:cod,bank_transfer,credit_card',
            'notes' => 'nullable|string'
        ]);

        $userId = $request->user()->id;

        // Lấy cart items của user
        $cartItems = CartItem::with('product')
            ->where('user_id', $userId)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        // Tính tổng tiền
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?? $item->product->price;
            $totalAmount += $price * $item->quantity;
        }

        // Tạo order
        $order = Order::create([
            'user_id' => $userId,
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_method' => $validated['payment_method'],
            'shipping_address' => $validated['shipping_address'],
            'phone' => $validated['phone'],
            'notes' => $validated['notes'] ?? null
        ]);

        // Tạo order items từ cart
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price ?? $item->product->price;
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $price
            ]);

            // Giảm stock quantity
            $item->product->decrement('stock_quantity', $item->quantity);
        }

        // Xóa cart sau khi đặt hàng
        CartItem::where('user_id', $userId)->delete();

        $order->load(['orderItems.product']);

        return response()->json($order, 201);
    }

    /**
     * Display the specified order
     */
    public function show(Request $request, $id)
    {
        $userId = $request->user()->id;
        $order = Order::with(['orderItems.product'])
            ->where('user_id', $userId)
            ->findOrFail($id);

        return response()->json($order);
    }

    /**
     * Update order status (admin only - simplified for now)
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $validated['status']]);

        return response()->json($order);
    }

    /**
     * Cancel an order
     */
    public function cancel(Request $request, $id)
    {
        $userId = $request->user()->id;
        $order = Order::where('user_id', $userId)->findOrFail($id);

        if (!in_array($order->status, ['pending', 'processing'])) {
            return response()->json(['message' => 'Cannot cancel this order'], 400);
        }

        // Hoàn lại stock
        foreach ($order->orderItems as $item) {
            $item->product->increment('stock_quantity', $item->quantity);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json($order);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display checkout page.
     */
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $cartItemsData = [];
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $cartItemsData[] = [
                'id' => $item->id,
                'product' => $item->product,
                'quantity' => $item->quantity,
                'size' => $item->size,
                'color' => $item->color,
                'total' => $item->total,
            ];
            $subtotal += $item->total;
        }

        $tax = $subtotal * 0.08;
        $shipping = 5.99;
        $total = $subtotal + $tax + $shipping;

        return Inertia::render('Shop/Checkout', [
            'cartItems' => $cartItemsData,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }

    /**
     * Process the order.
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_state' => 'required|string',
            'shipping_zip' => 'required|string',
            'shipping_country' => 'required|string',
            'shipping_phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        // Calculate totals
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->total;
        }
        $tax = $subtotal * 0.08;
        $shipping = 5.99;
        $total = $subtotal + $tax + $shipping;

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => Order::generateOrderNumber(),
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_state' => $request->shipping_state,
            'shipping_zip' => $request->shipping_zip,
            'shipping_country' => $request->shipping_country,
            'shipping_phone' => $request->shipping_phone,
            'notes' => $request->notes,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping_cost' => $shipping,
            'total' => $total,
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'product_name' => $item->product->name,
                'size' => $item->size,
                'color' => $item->color,
                'quantity' => $item->quantity,
                'price' => $item->product->current_price,
                'total' => $item->total,
            ]);

            // Update stock
            $item->product->decrement('stock_quantity', $item->quantity);
        }

        // Clear cart
        $user->cartItems()->delete();

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order placed successfully!');
    }

    /**
     * Display order details.
     */
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return Inertia::render('Shop/Order', [
            'order' => $order->load('orderItems.product'),
        ]);
    }

    /**
     * Display user's order history.
     */
    public function index()
    {
        $orders = Auth::user()->orders()
            ->with('orderItems')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Shop/Orders', [
            'orders' => $orders,
        ]);
    }

    /**
     * Cancel an order.
     */
    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$order->canBeCancelled()) {
            return back()->withErrors(['order' => 'This order cannot be cancelled.']);
        }

        $order->update(['status' => 'cancelled']);

        // Restore stock
        foreach ($order->orderItems as $item) {
            $item->product->increment('stock_quantity', $item->quantity);
        }

        return back()->with('success', 'Order cancelled successfully!');
    }
}

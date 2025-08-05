<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartController extends Controller
{
    /**
     * Display the shopping cart.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
        
        $cartItemsData = [];
        $total = 0;

        foreach ($cartItems as $item) {
            $cartItemsData[] = [
                'id' => $item->id,
                'product_id' => $item->product->id,
                'name' => $item->product->name,
                'slug' => $item->product->slug,
                'main_image' => $item->product->main_image,
                'price' => $item->product->current_price,
                'size' => $item->size,
                'color' => $item->color,
                'quantity' => $item->quantity,
                'total' => $item->total,
            ];
            $total += $item->total;
        }

        return Inertia::render('Shop/Cart', [
            'cartItems' => $cartItemsData,
            'subtotal' => $total,
            'tax' => $total * 0.08,
            'shipping' => count($cartItemsData) > 0 ? 5.99 : 0,
            'total' => $total + ($total * 0.08) + (count($cartItemsData) > 0 ? 5.99 : 0),
            'cartCount' => $user->cart_count,
        ]);
    }

    /**
     * Add item to cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);
        
        if ($product->stock_quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        // Check if item already exists in cart
        $existingItem = $user->cartItems()
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->where('color', $request->color)
            ->first();

        if ($existingItem) {
            // Update quantity if item exists
            $existingItem->update([
                'quantity' => $existingItem->quantity + $request->quantity
            ]);
        } else {
            // Create new cart item
            $user->cartItems()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'color' => $request->color,
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Product added to cart successfully!',
            'cartCount' => $user->fresh()->cart_count
        ]);
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $cartItem = $user->cartItems()->findOrFail($request->cart_item_id);
        
        // Check stock availability
        if ($cartItem->product->stock_quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $cartItem->update(['quantity' => $request->quantity]);
        
        return redirect()->back()->with([
            'success' => 'Cart updated successfully!',
            'cartCount' => $user->fresh()->cart_count
        ]);
    }

    /**
     * Remove item from cart.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
        ]);

        $user = Auth::user();
        $cartItem = $user->cartItems()->findOrFail($request->cart_item_id);
        $cartItem->delete();
        
        return redirect()->back()->with([
            'success' => 'Item removed from cart!',
            'cartCount' => $user->fresh()->cart_count
        ]);
    }

    /**
     * Clear the entire cart.
     */
    public function clear()
    {
        $user = Auth::user();
        $user->cartItems()->delete();
        
        return redirect()->back()->with([
            'success' => 'Cart cleared successfully!',
            'cartCount' => 0
        ]);
    }

    /**
     * Get cart count for navbar.
     */
    public function getCartCount()
    {
        $user = Auth::user();
        return response()->json(['cartCount' => $user->cart_count]);
    }
}

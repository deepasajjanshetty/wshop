<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{
    /**
     * Display the shop homepage.
     */
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->active()
            ->featured()
            ->inStock()
            ->take(8)
            ->get();

        $categories = Category::active()->get();

        // Get cart count for authenticated users
        $cartCount = 0;
        if (auth()->check()) {
            $cartCount = auth()->user()->cart_count;
        }

        return Inertia::render('Shop/Index', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'auth' => [
                'user' => auth()->user(),
            ],
            'cartCount' => session('cartCount', $cartCount),
        ]);
    }

    /**
     * Display products by category.
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->active()->firstOrFail();
        
        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->active()
            ->inStock()
            ->paginate(12);

        // Get cart count for authenticated users
        $cartCount = 0;
        if (auth()->check()) {
            $cartCount = auth()->user()->cart_count;
        }

        return Inertia::render('Shop/Category', [
            'category' => $category,
            'products' => $products,
            'auth' => [
                'user' => auth()->user(),
            ],
            'cartCount' => session('cartCount', $cartCount),
        ]);
    }

    /**
     * Display product details.
     */
    public function product($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->inStock()
            ->take(4)
            ->get();

        // Get cart count for authenticated users
        $cartCount = 0;
        if (auth()->check()) {
            $cartCount = auth()->user()->cart_count;
        }

        return Inertia::render('Shop/Product', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'flash' => [
                'success' => session('success'),
                'error' => session('error'),
            ],
            'auth' => [
                'user' => auth()->user(),
            ],
            'cartCount' => session('cartCount', $cartCount),
        ]);
    }

    /**
     * Search products.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $products = Product::with('category')
            ->where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->active()
            ->inStock()
            ->paginate(12);

        return Inertia::render('Shop/Search', [
            'products' => $products,
            'query' => $query,
        ]);
    }
}

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Hardcoded product data (no database)
    $products = [
        [
            'id' => 1,
            'name' => 'Wireless Bluetooth Headphones',
            'price' => 1299.00,
            'original_price' => 2499.00,
            'discount' => 48,
            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400',
            'rating' => 4.8,
            'sold' => 15000,
            'category' => 'Electronics',
            'location' => 'Manila',
        ],
        [
            'id' => 2,
            'name' => 'USB-C Fast Charging Cable 2m',
            'price' => 199.00,
            'original_price' => 399.00,
            'discount' => 50,
            'image' => 'https://images.unsplash.com/photo-1583863788434-e58a36330cf0?w=400',
            'rating' => 4.9,
            'sold' => 25000,
            'category' => 'Electronics',
            'location' => 'Quezon City',
        ],
        [
            'id' => 3,
            'name' => 'Men\'s Casual Sneakers',
            'price' => 899.00,
            'original_price' => 1899.00,
            'discount' => 53,
            'image' => 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=400',
            'rating' => 4.7,
            'sold' => 8500,
            'category' => 'Fashion',
            'location' => 'Cebu City',
        ],
        [
            'id' => 4,
            'name' => 'Portable Power Bank 20000mAh',
            'price' => 599.00,
            'original_price' => 1299.00,
            'discount' => 54,
            'image' => 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=400',
            'rating' => 4.6,
            'sold' => 12000,
            'category' => 'Electronics',
            'location' => 'Makati',
        ],
        [
            'id' => 5,
            'name' => 'Women\'s Summer Dress',
            'price' => 459.00,
            'original_price' => 999.00,
            'discount' => 54,
            'image' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=400',
            'rating' => 4.5,
            'sold' => 6800,
            'category' => 'Fashion',
            'location' => 'Davao City',
        ],
        [
            'id' => 6,
            'name' => 'Smart Watch Fitness Tracker',
            'price' => 1899.00,
            'original_price' => 3999.00,
            'discount' => 53,
            'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400',
            'rating' => 4.8,
            'sold' => 18000,
            'category' => 'Electronics',
            'location' => 'Manila',
        ],
        [
            'id' => 7,
            'name' => 'Laptop Backpack Water Resistant',
            'price' => 799.00,
            'original_price' => 1599.00,
            'discount' => 50,
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400',
            'rating' => 4.7,
            'sold' => 9500,
            'category' => 'Bags',
            'location' => 'Quezon City',
        ],
        [
            'id' => 8,
            'name' => 'Wireless Gaming Mouse RGB',
            'price' => 699.00,
            'original_price' => 1499.00,
            'discount' => 53,
            'image' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=400',
            'rating' => 4.9,
            'sold' => 22000,
            'category' => 'Electronics',
            'location' => 'Makati',
        ],
        [
            'id' => 9,
            'name' => 'Stainless Steel Water Bottle 1L',
            'price' => 299.00,
            'original_price' => 599.00,
            'discount' => 50,
            'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=400',
            'rating' => 4.6,
            'sold' => 11000,
            'category' => 'Home & Living',
            'location' => 'Manila',
        ],
        [
            'id' => 10,
            'name' => 'LED Desk Lamp Adjustable',
            'price' => 549.00,
            'original_price' => 1099.00,
            'discount' => 50,
            'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=400',
            'rating' => 4.5,
            'sold' => 7500,
            'category' => 'Home & Living',
            'location' => 'Cebu City',
        ],
        [
            'id' => 11,
            'name' => 'Mechanical Gaming Keyboard',
            'price' => 1599.00,
            'original_price' => 2999.00,
            'discount' => 47,
            'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=400',
            'rating' => 4.8,
            'sold' => 14000,
            'category' => 'Electronics',
            'location' => 'Makati',
        ],
        [
            'id' => 12,
            'name' => 'Yoga Mat Non-Slip 6mm',
            'price' => 399.00,
            'original_price' => 799.00,
            'discount' => 50,
            'image' => 'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=400',
            'rating' => 4.7,
            'sold' => 8900,
            'category' => 'Sports',
            'location' => 'Quezon City',
        ],
    ];

    // Get search and filter parameters
    $search = request('search', '');
    $category = request('category', '');
    $minPrice = request('min_price', '');
    $maxPrice = request('max_price', '');
    $sortBy = request('sort_by', 'popular');

    // Filter products
    $filteredProducts = collect($products);

    if ($search) {
        $filteredProducts = $filteredProducts->filter(function ($product) use ($search) {
            return stripos($product['name'], $search) !== false;
        });
    }

    if ($category) {
        $filteredProducts = $filteredProducts->filter(function ($product) use ($category) {
            return $product['category'] === $category;
        });
    }

    if ($minPrice) {
        $filteredProducts = $filteredProducts->filter(function ($product) use ($minPrice) {
            return $product['price'] >= $minPrice;
        });
    }

    if ($maxPrice) {
        $filteredProducts = $filteredProducts->filter(function ($product) use ($maxPrice) {
            return $product['price'] <= $maxPrice;
        });
    }

    // Sort products
    switch ($sortBy) {
        case 'price_low':
            $filteredProducts = $filteredProducts->sortBy('price');
            break;
        case 'price_high':
            $filteredProducts = $filteredProducts->sortByDesc('price');
            break;
        case 'sales':
            $filteredProducts = $filteredProducts->sortByDesc('sold');
            break;
        default: // popular
            $filteredProducts = $filteredProducts->sortByDesc('rating');
    }

    // Get unique categories
    $categories = collect($products)->pluck('category')->unique()->sort()->values();

    return view('home', [
        'products' => $filteredProducts->values(),
        'categories' => $categories,
        'search' => $search,
        'selectedCategory' => $category,
        'minPrice' => $minPrice,
        'maxPrice' => $maxPrice,
        'sortBy' => $sortBy,
    ]);
});

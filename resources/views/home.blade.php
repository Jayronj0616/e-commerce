<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee Clone - Online Shopping</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('partials.styles')
</head>
<body class="bg-gray-50">
    <!-- Top Banner -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white text-xs py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex gap-4">
                <a href="#" class="hover:opacity-80">Seller Centre</a>
                <a href="#" class="hover:opacity-80">Download</a>
                <span>Follow us on</span>
                <a href="#" class="hover:opacity-80"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:opacity-80"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:opacity-80"><i class="far fa-bell"></i> Notifications</a>
                <a href="#" class="hover:opacity-80"><i class="far fa-question-circle"></i> Help</a>
                <a href="#" onclick="openSignupModal()" class="hover:opacity-80 cursor-pointer">Sign Up</a>
                <a href="#" onclick="openLoginModal()" class="hover:opacity-80 cursor-pointer">Login</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between gap-8">
                <!-- Logo -->
                <div class="flex items-center gap-8">
                    <a href="/" class="flex items-center gap-2">
                        <div class="text-orange-500 text-3xl font-bold">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <span class="text-2xl font-bold text-orange-500">Shopee</span>
                    </a>
                </div>

                <!-- Search Bar -->
                <form method="GET" action="/" class="flex-1 max-w-3xl">
                    <div class="relative">
                        <input 
                            type="text" 
                            name="search"
                            value="{{ $search }}"
                            placeholder="Search products..." 
                            class="w-full px-4 py-3 pr-32 border-2 border-orange-500 rounded-sm focus:outline-none focus:border-orange-600"
                        >
                        <button type="submit" class="absolute right-0 top-0 bottom-0 px-6 bg-orange-500 hover:bg-orange-600 text-white rounded-r-sm">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                    <div class="mt-2 flex gap-3 text-xs text-gray-600">
                        <a href="/?search=headphones" class="hover:text-orange-500">Headphones</a>
                        <a href="/?search=powerbank" class="hover:text-orange-500">Powerbank</a>
                        <a href="/?search=shoes" class="hover:text-orange-500">Shoes</a>
                        <a href="/?search=watch" class="hover:text-orange-500">Watch</a>
                        <a href="/?search=laptop" class="hover:text-orange-500">Laptop Bag</a>
                    </div>
                </form>

                <!-- Cart -->
                <a href="#" onclick="openCart()" class="text-orange-500 hover:text-orange-600 relative">
                    <i class="fas fa-shopping-cart text-3xl"></i>
                    <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Categories Bar -->
    <div class="bg-white border-b">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center gap-6 text-sm overflow-x-auto">
                <a href="/?search={{ $search }}&sort_by={{ $sortBy }}" class="category-link whitespace-nowrap {{ $selectedCategory === '' ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}">
                    All Products
                </a>
                @foreach($categories as $cat)
                <a href="/?category={{ $cat }}&search={{ $search }}&sort_by={{ $sortBy }}" class="category-link whitespace-nowrap {{ $selectedCategory === $cat ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}">
                    {{ $cat }}
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-6">
        <div class="flex gap-6">
            <!-- Sidebar Filters -->
            <aside class="w-64 flex-shrink-0">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-filter text-orange-500"></i>
                        Filters
                    </h3>

                    <!-- Price Range -->
                    <form method="GET" action="/" id="filterForm">
                        <input type="hidden" name="search" value="{{ $search }}">
                        <input type="hidden" name="category" value="{{ $selectedCategory }}">
                        <input type="hidden" name="sort_by" value="{{ $sortBy }}">

                        <div class="mb-6">
                            <h4 class="font-semibold text-sm mb-3">Price Range</h4>
                            <div class="space-y-2">
                                <input 
                                    type="number" 
                                    name="min_price" 
                                    value="{{ $minPrice }}"
                                    placeholder="Min" 
                                    class="w-full px-3 py-2 border rounded text-sm"
                                >
                                <input 
                                    type="number" 
                                    name="max_price"
                                    value="{{ $maxPrice }}"
                                    placeholder="Max" 
                                    class="w-full px-3 py-2 border rounded text-sm"
                                >
                                <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600 text-sm">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Category Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-sm mb-3">Category</h4>
                        <div class="space-y-2">
                            <a href="/" class="block text-sm {{ $selectedCategory === '' ? 'text-orange-500 font-semibold' : 'text-gray-600 hover:text-orange-500' }}">
                                All Categories
                            </a>
                            @foreach($categories as $cat)
                            <a href="/?category={{ $cat }}&search={{ $search }}&sort_by={{ $sortBy }}" 
                               class="block text-sm {{ $selectedCategory === $cat ? 'text-orange-500 font-semibold' : 'text-gray-600 hover:text-orange-500' }}">
                                {{ $cat }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Rating Filter -->
                    <div>
                        <h4 class="font-semibold text-sm mb-3">Rating</h4>
                        <div class="space-y-2">
                            @for($i = 5; $i >= 4; $i--)
                            <a href="#" class="flex items-center gap-2 text-sm text-gray-600 hover:text-orange-500">
                                @for($j = 0; $j < $i; $j++)
                                <i class="fas fa-star text-yellow-400 text-xs"></i>
                                @endfor
                                @for($j = $i; $j < 5; $j++)
                                <i class="far fa-star text-gray-300 text-xs"></i>
                                @endfor
                                <span>& Up</span>
                            </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <!-- Sort Bar -->
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4 flex items-center justify-between">
                    <span class="text-gray-600">Sort By</span>
                    <div class="flex gap-2">
                        <a href="/?search={{ $search }}&category={{ $selectedCategory }}&sort_by=popular" 
                           class="sort-btn px-4 py-2 rounded {{ $sortBy === 'popular' ? 'bg-orange-500 text-white active' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            Popular
                        </a>
                        <a href="/?search={{ $search }}&category={{ $selectedCategory }}&sort_by=sales" 
                           class="sort-btn px-4 py-2 rounded {{ $sortBy === 'sales' ? 'bg-orange-500 text-white active' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            Top Sales
                        </a>
                        <a href="/?search={{ $search }}&category={{ $selectedCategory }}&sort_by=price_low" 
                           class="sort-btn px-4 py-2 rounded {{ $sortBy === 'price_low' ? 'bg-orange-500 text-white active' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            Price: Low to High
                        </a>
                        <a href="/?search={{ $search }}&category={{ $selectedCategory }}&sort_by=price_high" 
                           class="sort-btn px-4 py-2 rounded {{ $sortBy === 'price_high' ? 'bg-orange-500 text-white active' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            Price: High to Low
                        </a>
                    </div>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    @foreach($products as $product)
                    <div onclick='openProductModal(@json($product))' class="product-card bg-white rounded-lg shadow-sm hover:shadow-lg cursor-pointer group">
                        <div class="relative overflow-hidden">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                            @if($product['discount'] > 0)
                            <div class="absolute top-0 right-0 bg-yellow-400 text-xs font-bold px-2 py-1 rounded-bl">
                                {{ $product['discount'] }}% OFF
                            </div>
                            @endif
                        </div>
                        <div class="p-3">
                            <h3 class="text-sm text-gray-800 mb-2 line-clamp-2 h-10">{{ $product['name'] }}</h3>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-orange-500 text-lg font-bold">₱{{ number_format($product['price'], 2) }}</span>
                                @if($product['original_price'] > $product['price'])
                                <span class="text-gray-400 text-xs line-through">₱{{ number_format($product['original_price'], 2) }}</span>
                                @endif
                            </div>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span>{{ $product['rating'] }}</span>
                                </div>
                                <span>{{ number_format($product['sold']) }} sold</span>
                            </div>
                            <div class="text-xs text-gray-400 mt-2">
                                <i class="fas fa-map-marker-alt"></i> {{ $product['location'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Products Found</h3>
                    <p class="text-gray-500">Try adjusting your filters or search terms</p>
                    <a href="/" class="inline-block mt-4 px-6 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                        Clear Filters
                    </a>
                </div>
                @endif
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="font-bold mb-4">Customer Service</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-orange-500">Help Centre</a></li>
                        <li><a href="#" class="hover:text-orange-500">How to Buy</a></li>
                        <li><a href="#" class="hover:text-orange-500">Shipping & Delivery</a></li>
                        <li><a href="#" class="hover:text-orange-500">Return & Refund</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">About Shopee</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-orange-500">About Us</a></li>
                        <li><a href="#" class="hover:text-orange-500">Careers</a></li>
                        <li><a href="#" class="hover:text-orange-500">Shopee Blog</a></li>
                        <li><a href="#" class="hover:text-orange-500">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Payment</h4>
                    <div class="flex flex-wrap gap-2">
                        <div class="w-12 h-8 bg-gray-100 rounded flex items-center justify-center">
                            <i class="fab fa-cc-visa text-xl text-blue-600"></i>
                        </div>
                        <div class="w-12 h-8 bg-gray-100 rounded flex items-center justify-center">
                            <i class="fab fa-cc-mastercard text-xl text-red-600"></i>
                        </div>
                        <div class="w-12 h-8 bg-gray-100 rounded flex items-center justify-center">
                            <i class="fab fa-cc-paypal text-xl text-blue-500"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Follow Us</h4>
                    <div class="flex gap-4">
                        <a href="#" class="text-2xl text-gray-600 hover:text-orange-500"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-2xl text-gray-600 hover:text-orange-500"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-2xl text-gray-600 hover:text-orange-500"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t mt-8 pt-8 text-center text-sm text-gray-500">
                <p>© 2024 Shopee Clone. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    @include('partials.modals')
    @include('partials.cart-sidebar')
    @include('partials.scripts')
</body>
</html>

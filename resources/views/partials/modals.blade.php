<!-- Product Modal -->
<div id="productModal" class="fixed inset-0 z-50 hidden items-center justify-center modal-overlay" onclick="closeProductModal(event)">
    <div class="bg-white rounded-lg max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
        <div class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-bold">Product Details</h2>
            <button onclick="closeProductModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div>
                    <img id="modalImage" src="" alt="" class="w-full rounded-lg">
                    <div id="modalDiscount" class="mt-2 inline-block bg-yellow-400 text-xs font-bold px-3 py-1 rounded hidden"></div>
                </div>
                
                <!-- Product Info -->
                <div>
                    <h3 id="modalName" class="text-2xl font-bold text-gray-800 mb-4"></h3>
                    
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span id="modalRating" class="font-semibold"></span>
                        </div>
                        <span class="text-gray-400">|</span>
                        <span id="modalSold" class="text-gray-600"></span>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <div class="flex items-baseline gap-3">
                            <span id="modalPrice" class="text-3xl font-bold text-orange-500"></span>
                            <span id="modalOriginalPrice" class="text-gray-400 text-lg line-through"></span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt text-orange-500"></i>
                            <span id="modalLocation"></span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <span class="text-gray-600 text-sm">Category: </span>
                        <span id="modalCategory" class="text-orange-500 font-semibold"></span>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold mb-2">Quantity</label>
                        <div class="flex items-center gap-3">
                            <button onclick="decreaseQty()" class="w-8 h-8 border rounded hover:bg-gray-100">
                                <i class="fas fa-minus text-xs"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" class="w-20 text-center border rounded py-1" readonly>
                            <button onclick="increaseQty()" class="w-8 h-8 border rounded hover:bg-gray-100">
                                <i class="fas fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="addToCart()" class="btn-animate flex-1 bg-orange-100 text-orange-500 border-2 border-orange-500 py-3 rounded-sm hover:bg-orange-200 font-semibold">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                        <button onclick="buyNow()" class="btn-animate flex-1 bg-orange-500 text-white py-3 rounded-sm hover:bg-orange-600 font-semibold">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 z-50 hidden items-center justify-center modal-overlay" onclick="closeLoginModal(event)">
    <div class="bg-white rounded-lg max-w-md w-full mx-4" onclick="event.stopPropagation()">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
            <h2 class="text-xl font-bold">Login</h2>
            <button onclick="closeLoginModal()" class="text-white hover:text-gray-200">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6">
            <form onsubmit="return false;">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Email/Phone</label>
                    <input type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-orange-500" placeholder="Enter your email or phone">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Password</label>
                    <input type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-orange-500" placeholder="Enter your password">
                </div>
                <div class="flex justify-between items-center mb-6">
                    <label class="flex items-center text-sm">
                        <input type="checkbox" class="mr-2">
                        Remember me
                    </label>
                    <a href="#" class="text-sm text-orange-500 hover:text-orange-600">Forgot Password?</a>
                </div>
                <button type="submit" class="btn-animate w-full bg-orange-500 text-white py-3 rounded hover:bg-orange-600 font-semibold">
                    Login
                </button>
            </form>
            <div class="mt-4 text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="#" onclick="switchToSignup()" class="text-orange-500 hover:text-orange-600 font-semibold">Sign Up</a>
            </div>
            <div class="mt-6 relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Or continue with</span>
                </div>
            </div>
            <div class="mt-6 grid grid-cols-2 gap-3">
                <button class="flex items-center justify-center gap-2 border py-2 rounded hover:bg-gray-50">
                    <i class="fab fa-facebook text-blue-600 text-xl"></i>
                    <span class="text-sm font-semibold">Facebook</span>
                </button>
                <button class="flex items-center justify-center gap-2 border py-2 rounded hover:bg-gray-50">
                    <i class="fab fa-google text-red-600 text-xl"></i>
                    <span class="text-sm font-semibold">Google</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Signup Modal -->
<div id="signupModal" class="fixed inset-0 z-50 hidden items-center justify-center modal-overlay" onclick="closeSignupModal(event)">
    <div class="bg-white rounded-lg max-w-md w-full mx-4" onclick="event.stopPropagation()">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
            <h2 class="text-xl font-bold">Sign Up</h2>
            <button onclick="closeSignupModal()" class="text-white hover:text-gray-200">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6">
            <form onsubmit="return false;">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-orange-500" placeholder="Enter your full name">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Email</label>
                    <input type="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-orange-500" placeholder="Enter your email">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-orange-500" placeholder="Enter your phone number">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Password</label>
                    <input type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:border-orange-500" placeholder="Create a password">
                </div>
                <div class="mb-6">
                    <label class="flex items-center text-sm">
                        <input type="checkbox" class="mr-2">
                        I agree to the Terms & Conditions
                    </label>
                </div>
                <button type="submit" class="btn-animate w-full bg-orange-500 text-white py-3 rounded hover:bg-orange-600 font-semibold">
                    Sign Up
                </button>
            </form>
            <div class="mt-4 text-center text-sm text-gray-600">
                Already have an account? 
                <a href="#" onclick="switchToLogin()" class="text-orange-500 hover:text-orange-600 font-semibold">Login</a>
            </div>
        </div>
    </div>
</div>

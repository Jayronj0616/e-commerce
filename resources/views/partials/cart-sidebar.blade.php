<!-- Cart Sidebar -->
<div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="closeCart()"></div>
<div id="cartSidebar" class="fixed right-0 top-0 h-full w-96 bg-white shadow-2xl z-50 cart-sidebar">
    <div class="flex flex-col h-full">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-bold">Shopping Cart (3)</h2>
            <button onclick="closeCart()" class="text-white hover:text-gray-200">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        
        <div class="flex-1 overflow-y-auto p-4">
            <!-- Cart Item 1 -->
            <div class="flex gap-4 mb-4 pb-4 border-b">
                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400" alt="Product" class="w-20 h-20 object-cover rounded">
                <div class="flex-1">
                    <h4 class="text-sm font-semibold mb-1">Wireless Bluetooth Headphones</h4>
                    <p class="text-orange-500 font-bold mb-2">₱1,299.00</p>
                    <div class="flex items-center gap-2">
                        <button class="w-6 h-6 border rounded text-xs hover:bg-gray-100">-</button>
                        <span class="text-sm">1</span>
                        <button class="w-6 h-6 border rounded text-xs hover:bg-gray-100">+</button>
                        <button class="ml-auto text-red-500 hover:text-red-600 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cart Item 2 -->
            <div class="flex gap-4 mb-4 pb-4 border-b">
                <img src="https://images.unsplash.com/photo-1583863788434-e58a36330cf0?w=400" alt="Product" class="w-20 h-20 object-cover rounded">
                <div class="flex-1">
                    <h4 class="text-sm font-semibold mb-1">USB-C Fast Charging Cable 2m</h4>
                    <p class="text-orange-500 font-bold mb-2">₱199.00</p>
                    <div class="flex items-center gap-2">
                        <button class="w-6 h-6 border rounded text-xs hover:bg-gray-100">-</button>
                        <span class="text-sm">2</span>
                        <button class="w-6 h-6 border rounded text-xs hover:bg-gray-100">+</button>
                        <button class="ml-auto text-red-500 hover:text-red-600 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cart Item 3 -->
            <div class="flex gap-4 mb-4 pb-4 border-b">
                <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=400" alt="Product" class="w-20 h-20 object-cover rounded">
                <div class="flex-1">
                    <h4 class="text-sm font-semibold mb-1">Men's Casual Sneakers</h4>
                    <p class="text-orange-500 font-bold mb-2">₱899.00</p>
                    <div class="flex items-center gap-2">
                        <button class="w-6 h-6 border rounded text-xs hover:bg-gray-100">-</button>
                        <span class="text-sm">1</span>
                        <button class="w-6 h-6 border rounded text-xs hover:bg-gray-100">+</button>
                        <button class="ml-auto text-red-500 hover:text-red-600 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t p-4 bg-gray-50">
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Subtotal:</span>
                <span class="font-semibold">₱2,696.00</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Shipping:</span>
                <span class="font-semibold">₱50.00</span>
            </div>
            <div class="flex justify-between mb-4 text-lg font-bold">
                <span>Total:</span>
                <span class="text-orange-500">₱2,746.00</span>
            </div>
            <button class="btn-animate w-full bg-orange-500 text-white py-3 rounded hover:bg-orange-600 font-semibold">
                Checkout
            </button>
        </div>
    </div>
</div>

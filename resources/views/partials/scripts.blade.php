<script>
    let currentProduct = null;

    // Product Modal Functions
    function openProductModal(product) {
        currentProduct = product;
        document.getElementById('modalImage').src = product.image;
        document.getElementById('modalName').textContent = product.name;
        document.getElementById('modalRating').textContent = product.rating;
        document.getElementById('modalSold').textContent = product.sold.toLocaleString() + ' sold';
        document.getElementById('modalPrice').textContent = '₱' + product.price.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('modalOriginalPrice').textContent = '₱' + product.original_price.toLocaleString('en-US', {minimumFractionDigits: 2});
        document.getElementById('modalLocation').textContent = product.location;
        document.getElementById('modalCategory').textContent = product.category;
        
        if (product.discount > 0) {
            document.getElementById('modalDiscount').textContent = product.discount + '% OFF';
            document.getElementById('modalDiscount').classList.remove('hidden');
        } else {
            document.getElementById('modalDiscount').classList.add('hidden');
        }
        
        document.getElementById('quantity').value = 1;
        document.getElementById('productModal').classList.remove('hidden');
        document.getElementById('productModal').classList.add('flex');
    }

    function closeProductModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('productModal').classList.add('hidden');
        document.getElementById('productModal').classList.remove('flex');
        currentProduct = null;
    }

    function increaseQty() {
        const qtyInput = document.getElementById('quantity');
        qtyInput.value = parseInt(qtyInput.value) + 1;
    }

    function decreaseQty() {
        const qtyInput = document.getElementById('quantity');
        if (parseInt(qtyInput.value) > 1) {
            qtyInput.value = parseInt(qtyInput.value) - 1;
        }
    }

    function addToCart() {
        const qty = document.getElementById('quantity');
        const total = (currentProduct.price * qty.value).toLocaleString('en-US', {minimumFractionDigits: 2});
        
        Swal.fire({
            icon: 'success',
            title: 'Added to Cart!',
            html: `
                <div class="text-left">
                    <p class="text-gray-700 mb-2"><strong>Product:</strong> ${currentProduct.name}</p>
                    <p class="text-gray-700 mb-2"><strong>Quantity:</strong> ${qty.value}</p>
                    <p class="text-gray-700"><strong>Price:</strong> ₱${currentProduct.price.toLocaleString('en-US', {minimumFractionDigits: 2})}</p>
                    <p class="text-orange-500 font-bold text-lg mt-3"><strong>Total:</strong> ₱${total}</p>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'View Cart',
            cancelButtonText: 'Continue Shopping',
            customClass: {
                popup: 'rounded-lg',
                confirmButton: 'btn-animate',
                cancelButton: 'btn-animate'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                openCart();
            }
            closeProductModal();
        });
    }

    function buyNow() {
        const qty = document.getElementById('quantity').value;
        const total = (currentProduct.price * qty).toLocaleString('en-US', {minimumFractionDigits: 2});
        
        Swal.fire({
            icon: 'info',
            title: 'Proceed to Checkout?',
            html: `
                <div class="text-left">
                    <p class="text-gray-700 mb-2"><strong>Product:</strong> ${currentProduct.name}</p>
                    <p class="text-gray-700 mb-2"><strong>Quantity:</strong> ${qty}</p>
                    <p class="text-orange-500 font-bold text-lg mt-3"><strong>Total:</strong> ₱${total}</p>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Yes, Checkout',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'rounded-lg',
                confirmButton: 'btn-animate',
                cancelButton: 'btn-animate'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Order Placed!',
                    text: 'This is a demo. No actual order was processed.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn-animate'
                    }
                });
            }
            closeProductModal();
        });
    }

    // Login Modal Functions
    function openLoginModal() {
        document.getElementById('loginModal').classList.remove('hidden');
        document.getElementById('loginModal').classList.add('flex');
    }

    function closeLoginModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('loginModal').classList.add('hidden');
        document.getElementById('loginModal').classList.remove('flex');
    }

    // Signup Modal Functions
    function openSignupModal() {
        document.getElementById('signupModal').classList.remove('hidden');
        document.getElementById('signupModal').classList.add('flex');
    }

    function closeSignupModal(event) {
        if (event && event.target !== event.currentTarget) return;
        document.getElementById('signupModal').classList.add('hidden');
        document.getElementById('signupModal').classList.remove('flex');
    }

    // Switch between Login and Signup
    function switchToSignup() {
        closeLoginModal();
        openSignupModal();
    }

    function switchToLogin() {
        closeSignupModal();
        openLoginModal();
    }

    // Cart Functions
    function openCart() {
        document.getElementById('cartOverlay').classList.remove('hidden');
        document.getElementById('cartSidebar').classList.add('active');
    }

    function closeCart() {
        document.getElementById('cartOverlay').classList.add('hidden');
        document.getElementById('cartSidebar').classList.remove('active');
    }

    // Close modals on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeProductModal();
            closeLoginModal();
            closeSignupModal();
            closeCart();
        }
    });
</script>

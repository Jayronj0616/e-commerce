<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .cart-sidebar {
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }
    .cart-sidebar.active {
        transform: translateX(0);
    }
    
    /* Hover animations */
    .product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .product-card:hover {
        transform: translateY(-4px);
    }
    .product-card:active {
        transform: translateY(-2px);
    }
    
    /* Button animations */
    .btn-animate {
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .btn-animate:active {
        transform: scale(0.95);
    }
    .btn-animate::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    .btn-animate:active::before {
        width: 300px;
        height: 300px;
    }
    
    /* Category link animations */
    .category-link {
        transition: all 0.2s ease;
        position: relative;
    }
    .category-link::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 0;
        height: 2px;
        background: #f97316;
        transition: width 0.3s ease;
    }
    .category-link:hover::after {
        width: 100%;
    }
    
    /* Sort button animations */
    .sort-btn {
        transition: all 0.2s ease;
    }
    .sort-btn:hover:not(.active) {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .sort-btn:active {
        transform: translateY(0);
    }
    
    /* SweetAlert2 custom styling */
    .swal2-popup {
        border-radius: 0.5rem !important;
        padding: 2rem !important;
    }
    .swal2-title {
        font-size: 1.5rem !important;
        font-weight: 700 !important;
        color: #1f2937 !important;
    }
    .swal2-html-container {
        font-size: 1rem !important;
        color: #6b7280 !important;
    }
    .swal2-confirm {
        background-color: #f97316 !important;
        border-radius: 0.25rem !important;
        padding: 0.75rem 2rem !important;
        font-weight: 600 !important;
        transition: all 0.2s ease !important;
    }
    .swal2-confirm:hover {
        background-color: #ea580c !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
    }
    .swal2-cancel {
        background-color: #e5e7eb !important;
        color: #374151 !important;
        border-radius: 0.25rem !important;
        padding: 0.75rem 2rem !important;
        font-weight: 600 !important;
        transition: all 0.2s ease !important;
    }
    .swal2-cancel:hover {
        background-color: #d1d5db !important;
    }
</style>

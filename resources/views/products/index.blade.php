@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">

    <!-- Header Section -->
    <div class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4 class="fw-bold text-dark mb-1">
                    <i class="fas fa-cube text-primary me-2"></i>Products Inventory
                </h4>
                <small class="text-muted">Manage and track all your products</small>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm shadow-sm" style="border-radius: 8px;">
                    <i class="fas fa-plus-circle me-1"></i>Add New Product
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4 g-2">
        <div class="col-md-3">
            <div class="card border-0 rounded-2 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <div class="card-body p-3 text-center">
                    <div class="mb-2">
                        <i class="fas fa-box-open fa-lg opacity-75"></i>
                    </div>
                    <h6 class="card-title opacity-75 fw-normal mb-1" style="font-size: 0.8rem;">Total Products</h6>
                    <h5 class="fw-bold mb-0">{{ $products->count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 rounded-2 shadow-sm h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                <div class="card-body p-3 text-center">
                    <div class="mb-2">
                        <i class="fas fa-dollar-sign fa-lg opacity-75"></i>
                    </div>
                    <h6 class="card-title opacity-75 fw-normal mb-1" style="font-size: 0.8rem;">Total Value</h6>
                    <h5 class="fw-bold mb-0">${{ number_format($products->sum('price'), 0) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 rounded-2 shadow-sm h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                <div class="card-body p-3 text-center">
                    <div class="mb-2">
                        <i class="fas fa-cube fa-lg opacity-75"></i>
                    </div>
                    <h6 class="card-title opacity-75 fw-normal mb-1" style="font-size: 0.8rem;">Total Stock</h6>
                    <h5 class="fw-bold mb-0">{{ $products->sum('quantity') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 rounded-2 shadow-sm h-100" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white;">
                <div class="card-body p-3 text-center">
                    <div class="mb-2">
                        <i class="fas fa-list fa-lg opacity-75"></i>
                    </div>
                    <h6 class="card-title opacity-75 fw-normal mb-1" style="font-size: 0.8rem;">Categories</h6>
                    <h5 class="fw-bold mb-0">{{ $products->pluck('category_id')->unique()->count() }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table Card -->
    <div class="card border-0 rounded-2 shadow-sm overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 px-4">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-list me-2 text-primary"></i>All Products
                </h6>
                <span class="badge bg-primary" style="font-size: 0.8rem;">{{ $products->count() }} items</span>
            </div>
        </div>

        <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="bg-light position-sticky top-0">
                    <tr>
                        <th class="ps-4 fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">#</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Image</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Product</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">SKU</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Category</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Price</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Stock</th>
                        <th class="text-center fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="border-bottom" style="transition: background-color 0.2s ease;">
                        <td class="ps-4">
                            <span class="badge bg-light text-dark fw-bold" style="font-size: 0.75rem;">{{ $loop->iteration }}</span>
                        </td>

                        {{-- Image Preview --}}
                        <td>
                            @if($product->getMedia('product_images')->count())
                            @php
                            $firstImage = $product->getMedia('product_images')->first();
                            @endphp
                            <img src="{{ asset('storage/' . $firstImage->id . '/' . $firstImage->file_name) }}"
                                alt="{{ $product->product_name }}"
                                class="rounded"
                                style="width: 45px; height: 45px; object-fit: cover; border: 1px solid #e9ecef;">
                            @else
                            <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; font-size: 0.8rem;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                            @endif
                        </td>

                        <td>
                            <div>
                                <span class="fw-600 text-dark d-block" style="font-size: 0.95rem;">{{ $product->product_name }}</span>
                                <small class="text-muted" style="font-size: 0.75rem;">ID: {{ $product->id }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border border-secondary" style="font-size: 0.75rem;">{{ $product->product_id }}</span>
                        </td>
                        <td>
                            <span class="badge bg-primary" style="font-size: 0.75rem;">{{ $product->category->name }}</span>
                        </td>
                        <td>
                            <span class="fw-bold text-primary" style="font-size: 0.95rem;">
                                ${{ number_format($product->price, 2) }}
                            </span>
                        </td>
                        <td>
                            @if($product->quantity > 50)
                            <span class="badge bg-success" style="font-size: 0.75rem;">{{ $product->quantity }} In Stock</span>
                            @elseif($product->quantity > 20)
                            <span class="badge bg-info" style="font-size: 0.75rem;">{{ $product->quantity }} In Stock</span>
                            @elseif($product->quantity > 0)
                            <span class="badge bg-warning text-dark" style="font-size: 0.75rem;">{{ $product->quantity }} Low Stock</span>
                            @else
                            <span class="badge bg-danger" style="font-size: 0.75rem;">Out of Stock</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Product">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Delete Product" data-product-id="{{ $product->id }}" data-product-name="{{ $product->product_name }}" onclick="openDeleteModal(event)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-inbox text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                            </div>
                            <h6 class="text-muted mb-2">No Products Found</h6>
                            <small class="text-muted d-block mb-3">Start adding products to build your inventory</small>
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-1"></i>Create First Product
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Premium Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-4 py-5">
                <div class="mb-4">
                    <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%);">
                        <i class="fas fa-trash-alt text-white fa-2x"></i>
                    </div>
                </div>
                <h5 class="fw-bold text-dark mb-2">Delete Product</h5>
                <p class="text-muted mb-1">Are you sure you want to delete</p>
                <p class="fw-bold text-danger mb-4">
                    <span id="productNameDisplay"></span>
                </p>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                    <i class="fas fa-exclamation-circle text-warning me-2"></i>
                    This action cannot be undone. All data will be permanently deleted.
                </p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmDeleteBtn">
                    <i class="fas fa-trash-alt me-1"></i>Delete Product
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let currentDeleteForm = null;

    function openDeleteModal(event) {
        event.preventDefault();

        const button = event.target.closest('button');
        const productName = button.getAttribute('data-product-name');

        document.getElementById('productNameDisplay').textContent = '"' + productName + '"';
        currentDeleteForm = button.closest('form');

        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (currentDeleteForm) {
                currentDeleteForm.submit();
            }
        });
    });
</script>

<style>
    .table tbody tr {
        transition: background-color 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa !important;
    }

    .btn-group-sm .btn {
        border-radius: 6px;
        padding: 5px 10px;
    }

    .badge {
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 4px;
    }

    .table-responsive {
        scroll-behavior: smooth;
    }

    .table-responsive::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: transparent;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #999;
    }

    .card {
        transition: box-shadow 0.3s ease;
    }

    .modal-content {
        border-radius: 12px;
    }

    .rounded-circle {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection
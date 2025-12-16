@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">

    <!-- Page Header -->
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.3rem;">
                    <i class="fas fa-box text-primary me-2"></i>Product Details
                </h5>
                <small class="text-muted" style="font-size: 0.85rem;">View comprehensive product information</small>
            </div>
            <a href="{{ route('products.index') }}" class="btn border-1 border-secondary" style="padding: 0.5rem 1.2rem; font-size: 0.9rem;">
                <i class="fas fa-arrow-left me-1"></i>Back
            </a>
        </div>
    </div>

    <!-- Product Info Section -->
    <div class="card border-0 rounded-2 mb-4" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">
        <div class="card-body p-4">
            <!-- Product Name Header -->
            <div class="mb-4 pb-3 border-bottom">
                <h4 class="fw-bold text-dark mb-2" style="font-size: 1.5rem;">{{ $product->product_name }}</h4>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-primary" style="font-size: 0.8rem;">{{ $product->category->name }}</span>
                    @if($product->quantity > 20)
                    <span class="badge bg-success" style="font-size: 0.8rem;">In Stock</span>
                    @elseif($product->quantity > 0)
                    <span class="badge bg-warning text-dark" style="font-size: 0.8rem;">Low Stock</span>
                    @else
                    <span class="badge bg-danger" style="font-size: 0.8rem;">Out of Stock</span>
                    @endif
                </div>
            </div>

            <!-- Product Details Grid -->
            <div class="row g-3">
                <!-- SKU -->
                <div class="col-md-4">
                    <div class="p-3 rounded-2" style="background-color: #f8f9fa;">
                        <p class="text-muted mb-1" style="font-size: 0.8rem;">
                            <i class="fas fa-barcode text-primary me-2"></i>PRODUCT SKU
                        </p>
                        <p class="fw-bold text-dark mb-0" style="font-size: 1rem;">{{ $product->product_id }}</p>
                    </div>
                </div>

                <!-- Current Price -->
                <div class="col-md-4">
                    <div class="p-3 rounded-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                        <p class="text-white opacity-75 mb-1" style="font-size: 0.8rem;">
                            <i class="fas fa-tag me-2"></i>CURRENT PRICE
                        </p>
                        <h5 class="fw-bold mb-0">${{ number_format($product->price, 2) }}</h5>
                    </div>
                </div>

                <!-- Previous Price -->
                <div class="col-md-4">
                    <div class="p-3 rounded-2" style="background-color: #f8f9fa;">
                        <p class="text-muted mb-1" style="font-size: 0.8rem;">
                            <i class="fas fa-dollar-sign text-info me-2"></i>PREVIOUS PRICE
                        </p>
                        @if($product->previous_price)
                        <p class="fw-bold text-dark mb-0" style="font-size: 1rem;">${{ number_format($product->previous_price, 2) }}</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-down me-1"></i>{{ round((($product->previous_price - $product->price) / $product->previous_price) * 100) }}% Off
                        </small>
                        @else
                        <p class="text-muted mb-0" style="font-size: 0.9rem;">N/A</p>
                        @endif
                    </div>
                </div>

                <!-- Stock Quantity -->
                <div class="col-md-4">
                    <div class="p-3 rounded-2" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                        <p class="text-white opacity-75 mb-1" style="font-size: 0.8rem;">
                            <i class="fas fa-cube me-2"></i>STOCK QUANTITY
                        </p>
                        <h5 class="fw-bold mb-0">{{ $product->quantity }} Units</h5>
                    </div>
                </div>

                <!-- Alert Quantity -->
                <div class="col-md-4">
                    <div class="p-3 rounded-2" style="background-color: #f8f9fa;">
                        <p class="text-muted mb-1" style="font-size: 0.8rem;">
                            <i class="fas fa-bell text-danger me-2"></i>ALERT QUANTITY
                        </p>
                        <p class="fw-bold text-dark mb-0" style="font-size: 1rem;">{{ $product->alert_quantity }} Units</p>
                    </div>
                </div>

                <!-- Category -->
                <div class="col-md-4">
                    <div class="p-3 rounded-2" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                        <p class="text-white opacity-75 mb-1" style="font-size: 0.8rem;">
                            <i class="fas fa-list me-2"></i>CATEGORY
                        </p>
                        <h5 class="fw-bold mb-0">{{ $product->category->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Images Section -->
    <div class="card border-0 rounded-2" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">
        <div class="card-header bg-white border-bottom py-3 px-4">
            <h6 class="mb-0 fw-bold text-dark">
                <i class="fas fa-images text-primary me-2"></i>Product Images
            </h6>
        </div>
        <div class="card-body p-4">
            @if($product->getMedia('product_images')->count())
            <div class="row g-3">
                @foreach($product->getMedia('product_images') as $image)
                <div class="col-md-4 col-lg-3">
                    <div class="position-relative overflow-hidden rounded-2 shadow-sm" style="transition: all 0.3s ease;">
                        <img src="{{ asset('storage/' . $image->id . '/' . $image->file_name) }}"
                            class="img-fluid w-100"
                            style="object-fit: cover; height: 220px; border: 2px solid #e9ecef; display: block;"
                            alt="Product Image">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                            style="background: rgba(0, 0, 0, 0); transition: all 0.3s ease; opacity: 0;"
                            class="image-overlay">
                            <a href="{{ asset('storage/' . $image->id . '/' . $image->file_name) }}"
                                target="_blank"
                                class="btn btn-light btn-sm"
                                style="font-size: 0.85rem; padding: 0.4rem 1rem;">
                                <i class="fas fa-external-link-alt me-1"></i>View Full
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-inbox text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                <p class="text-muted mt-3 mb-0" style="font-size: 0.9rem;">No images available for this product</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex gap-2 mt-4 justify-content-end">
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning shadow-sm" style="padding: 0.5rem 1.5rem; font-size: 0.9rem;">
            <i class="fas fa-edit me-1"></i>Edit Product
        </a>
        <a href="{{ route('products.index') }}" class="btn border-1 border-secondary" style="padding: 0.5rem 1.2rem; font-size: 0.9rem;">
            <i class="fas fa-arrow-left me-1"></i>Back
        </a>
    </div>
</div>

<style>
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .position-relative:hover .image-overlay {
        background: rgba(0, 0, 0, 0.5) !important;
        opacity: 1 !important;
    }

    .badge {
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .btn {
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3) !important;
    }

    .fw-bold {
        font-weight: 700;
    }
</style>

@endsection
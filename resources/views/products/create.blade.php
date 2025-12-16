@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">

    <!-- Page Header -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.3rem;">
            <i class="fas fa-plus-circle text-primary me-2"></i>Add New Product
        </h5>
        <small class="text-muted" style="font-size: 0.85rem;">Fill in the product details below</small>
    </div>

    <!-- Form Card -->
    <div class="card border-0 rounded-2 shadow" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Product Name & SKU -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-box text-primary me-2"></i>Product Name
                        </label>
                        <input name="product_name" class="form-control border-0 shadow-sm" style="padding: 0.6rem 1rem; font-size: 0.9rem;" placeholder="Enter product name" required>
                        @error('product_name')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-barcode text-primary me-2"></i>Product SKU
                        </label>
                        <input name="product_id" class="form-control border-0 shadow-sm" style="padding: 0.6rem 1rem; font-size: 0.9rem;" placeholder="e.g., PROD-001" required>
                        @error('product_id')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Price Section -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-tag text-success me-2"></i>Price
                        </label>
                        <div class="input-group" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border-radius: 8px; overflow: hidden;">
                            <span class="input-group-text border-0 bg-light" style="font-size: 0.9rem;">$</span>
                            <input name="price" type="number" step="0.01" class="form-control border-0" style="padding: 0.6rem 1rem; font-size: 0.9rem;" placeholder="0.00" required>
                        </div>
                        @error('price')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-dollar-sign text-info me-2"></i>Previous Price
                        </label>
                        <div class="input-group" style="box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border-radius: 8px; overflow: hidden;">
                            <span class="input-group-text border-0 bg-light" style="font-size: 0.9rem;">$</span>
                            <input name="previous_price" type="number" step="0.01" class="form-control border-0" style="padding: 0.6rem 1rem; font-size: 0.9rem;" placeholder="0.00">
                        </div>
                        @error('previous_price')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-list text-primary me-2"></i>Category
                        </label>
                        <select name="category_id" class="form-select border-0 shadow-sm" style="padding: 0.6rem 1rem; font-size: 0.9rem;" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Quantity Section -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-cube text-warning me-2"></i>Quantity
                        </label>
                        <input name="quantity" type="number" class="form-control border-0 shadow-sm" style="padding: 0.6rem 1rem; font-size: 0.9rem;" placeholder="0" required>
                        @error('quantity')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-bell text-danger me-2"></i>Alert Quantity
                        </label>
                        <input name="alert_quantity" type="number" class="form-control border-0 shadow-sm" style="padding: 0.6rem 1rem; font-size: 0.9rem;" placeholder="Minimum stock level" required>
                        @error('alert_quantity')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Image Upload Section -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-images text-primary me-2"></i>Product Images
                        </label>

                        <div class="card border-2 border-dashed bg-light" style="border-color: #dee2e6; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <div class="card-body p-3 text-center" id="dropZone">
                                <i class="fas fa-cloud-upload-alt text-primary" style="font-size: 2rem;"></i>
                                <p class="text-dark fw-600 mt-2 mb-1" style="font-size: 0.9rem;">Drag & drop images here</p>
                                <p class="text-muted mb-2" style="font-size: 0.8rem;">or click to select files</p>
                                <input type="file"
                                    name="images[]"
                                    id="imageInput"
                                    class="form-control"
                                    multiple
                                    accept="image/*"
                                    onchange="previewImages(event)"
                                    style="display: none;">
                                <button type="button" class="btn btn-primary btn-sm" style="font-size: 0.85rem; padding: 0.4rem 1rem;" onclick="document.getElementById('imageInput').click()">
                                    <i class="fas fa-browse me-1"></i>Select Images
                                </button>
                            </div>
                        </div>
                        @error('images')
                        <small class="text-danger" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Image Preview Section -->
                <div class="row mb-3" id="previewSection" style="display: none;">
                    <div class="col-md-12">
                        <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                            <i class="fas fa-check-circle text-success me-2"></i>Selected Images
                        </label>
                        <div id="image-preview" class="d-flex flex-wrap gap-2"></div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="row mt-3 pt-3 border-top">
                    <div class="col-md-12 d-flex gap-2 justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn border-1 border-secondary" style="padding: 0.5rem 1.2rem; font-size: 0.9rem;">
                            <i class="fas fa-arrow-left me-1"></i>Back
                        </a>
                        <button type="submit" class="btn btn-primary shadow-sm" style="padding: 0.5rem 1.5rem; font-size: 0.9rem; box-shadow: 0 3px 10px rgba(13, 110, 253, 0.2);">
                            <i class="fas fa-save me-1"></i>Save Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const dropZone = document.getElementById('dropZone');
    const imageInput = document.getElementById('imageInput');
    const previewSection = document.getElementById('previewSection');

    // Drag and drop events
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.style.borderColor = '#0d6efd';
        dropZone.style.backgroundColor = '#e7f1ff';
    });

    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.style.borderColor = '#dee2e6';
        dropZone.style.backgroundColor = '#f8f9fa';
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.style.borderColor = '#dee2e6';
        dropZone.style.backgroundColor = '#f8f9fa';

        const files = e.dataTransfer.files;
        imageInput.files = files;

        const event = {
            target: {
                files: files
            }
        };
        previewImages(event);
    });

    function previewImages(event) {
        let preview = document.getElementById('image-preview');
        preview.innerHTML = '';

        const files = event.target.files;
        if (files.length > 0) {
            previewSection.style.display = 'block';
        }

        Array.from(files).forEach((file, index) => {
            let reader = new FileReader();
            reader.onload = function(e) {
                let imgContainer = document.createElement('div');
                imgContainer.className = 'position-relative';
                imgContainer.style.width = '120px';

                let img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'rounded-2 shadow-sm';
                img.style.width = '120px';
                img.style.height = '120px';
                img.style.objectFit = 'cover';
                img.style.border = '2px solid #e9ecef';

                let removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger btn-sm position-absolute';
                removeBtn.style.top = '-10px';
                removeBtn.style.right = '-10px';
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.onclick = function(e) {
                    e.preventDefault();
                    imgContainer.remove();
                    if (preview.children.length === 0) {
                        previewSection.style.display = 'none';
                    }
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeBtn);
                preview.appendChild(imgContainer);
            }
            reader.readAsDataURL(file);
        });
    }
</script>

<style>
    .form-control,
    .form-select {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .input-group-text {
        border-radius: 8px 0 0 8px;
        font-weight: 600;
    }

    .input-group .form-control {
        border-radius: 0 8px 8px 0;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .btn {
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3) !important;
    }

    .border-dashed {
        border-style: dashed !important;
    }

    #dropZone {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #dropZone:hover {
        border-color: #0d6efd;
        background-color: #e7f1ff;
    }

    .fw-600 {
        font-weight: 600;
    }
</style>

@endsection
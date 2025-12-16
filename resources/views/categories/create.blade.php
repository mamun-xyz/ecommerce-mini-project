@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">

    <!-- Page Header -->
    <div class="mb-4">
        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.3rem;">
            <i class="fas fa-plus-circle text-primary me-2"></i>Add New Category
        </h5>
        <small class="text-muted" style="font-size: 0.85rem;">Create a new product category</small>
    </div>

    <!-- Form Card -->
    <div class="card border-0 rounded-2" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); max-width: 600px;">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf

                <!-- Category Name -->
                <div class="mb-4">
                    <label class="form-label fw-600 text-dark mb-2" style="font-size: 0.9rem;">
                        <i class="fas fa-list text-primary me-2"></i>Category Name
                    </label>
                    <input type="text"
                        name="name"
                        class="form-control border-0 shadow-sm"
                        style="padding: 0.7rem 1rem; font-size: 0.95rem;"
                        placeholder="Enter category name"
                        value="{{ old('name') }}"
                        required>
                    @error('name')
                    <small class="text-danger d-block mt-2" style="font-size: 0.75rem;">
                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                    </small>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <a href="{{ route('categories.index') }}" class="btn border-1 border-secondary" style="padding: 0.6rem 1.5rem; font-size: 0.9rem; flex: 1;">
                        <i class="fas fa-arrow-left me-1"></i>Back
                    </a>
                    <button type="submit" class="btn btn-success shadow-sm" style="padding: 0.6rem 1.5rem; font-size: 0.9rem; flex: 1; box-shadow: 0 3px 10px rgba(40, 167, 69, 0.2);">
                        <i class="fas fa-save me-1"></i>Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Info Card -->
    <div class="mt-4 p-3 rounded-2" style="background-color: #e7f3ff; border-left: 4px solid #0d6efd;">
        <p class="mb-0 text-dark" style="font-size: 0.85rem;">
            <i class="fas fa-info-circle text-primary me-2"></i>
            <strong>Tip:</strong> Use clear and descriptive names for your categories to help organize your products effectively.
        </p>
    </div>
</div>

<style>
    .form-control {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .btn {
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3) !important;
    }

    .btn-success:active {
        transform: translateY(0);
    }

    .fw-600 {
        font-weight: 600;
    }
</style>

@endsection
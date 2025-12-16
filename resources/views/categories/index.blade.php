@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">

    <!-- Header Section -->
    <div class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.3rem;">
                    <i class="fas fa-list text-primary me-2"></i>Categories Management
                </h5>
                <small class="text-muted" style="font-size: 0.85rem;">Manage all product categories</small>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm shadow-sm" style="border-radius: 8px; padding: 0.5rem 1.2rem;">
                    <i class="fas fa-plus-circle me-1"></i>Add New Category
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Card -->
    <div class="mb-4">
        <div class="card border-0 rounded-2 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="opacity-75 mb-1" style="font-size: 0.85rem;">
                            <i class="fas fa-cube me-2"></i>TOTAL CATEGORIES
                        </p>
                        <h4 class="fw-bold mb-0">{{ $categories->count() }}</h4>
                    </div>
                    <i class="fas fa-folder-open fa-3x opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Table Card -->
    <div class="card border-0 rounded-2 shadow-sm overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 px-4">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold text-dark">
                    <i class="fas fa-th-list me-2 text-primary"></i>All Categories
                </h6>
                <span class="badge bg-primary" style="font-size: 0.8rem;">{{ $categories->count() }} items</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">#</th>
                        <th class="fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Category Name</th>
                        <th class="text-center fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr class="border-bottom" style="transition: background-color 0.2s ease;">
                        <td class="ps-4">
                            <span class="badge bg-light text-dark fw-bold" style="font-size: 0.75rem;">{{ $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="p-2 rounded" style="background-color: #e7f1ff;">
                                    <i class="fas fa-folder text-primary"></i>
                                </div>
                                <span class="fw-600 text-dark" style="font-size: 0.95rem;">{{ $category->name }}</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Category">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Delete Category" data-category-id="{{ $category->id }}" data-category-name="{{ $category->name }}" onclick="openDeleteModal(event)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-inbox text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                            </div>
                            <h6 class="text-muted mb-2">No Categories Found</h6>
                            <small class="text-muted d-block mb-3">Start by creating your first category</small>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-1"></i>Create Category
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
                <h5 class="fw-bold text-dark mb-2">Delete Category</h5>
                <p class="text-muted mb-1">Are you sure you want to delete</p>
                <p class="fw-bold text-danger mb-4">
                    <span id="categoryNameDisplay"></span>
                </p>
                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                    <i class="fas fa-exclamation-circle text-warning me-2"></i>
                    This action cannot be undone.
                </p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmDeleteBtn">
                    <i class="fas fa-trash-alt me-1"></i>Delete Category
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
        const categoryName = button.getAttribute('data-category-name');

        document.getElementById('categoryNameDisplay').textContent = '"' + categoryName + '"';
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

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3) !important;
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

    .fw-600 {
        font-weight: 600;
    }
</style>

@endsection
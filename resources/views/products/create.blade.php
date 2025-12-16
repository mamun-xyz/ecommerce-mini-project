@extends('layouts.app')

@section('content')
<h3>Add Product</h3>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Product Name</label>
            <input name="product_name" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Product SKU</label>
            <input name="product_id" class="form-control" required>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Price</label>
            <input name="price" class="form-control" required>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Previous Price</label>
            <input name="previous_price" class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Quantity</label>
            <input name="quantity" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Alert Quantity</label>
            <input name="alert_quantity" class="form-control" required>
        </div>

        {{-- Image Upload --}}
        <div class="col-md-12 mb-3">
            <label class="form-label">Product Images</label>
            <input type="file"
                name="images[]"
                class="form-control"
                multiple
                accept="image/*"
                onchange="previewImages(event)">
        </div>

        {{-- Image Preview --}}
        <div class="col-md-12">
            <div id="image-preview" class="d-flex flex-wrap gap-2"></div>
        </div>
    </div>

    <button class="btn btn-success mt-3">Save</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
</form>

{{-- Image Preview Script --}}
<script>
    function previewImages(event) {
        let preview = document.getElementById('image-preview');
        preview.innerHTML = '';

        Array.from(event.target.files).forEach(file => {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'rounded border';
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    }
</script>
@endsection
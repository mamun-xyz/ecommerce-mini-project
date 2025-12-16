@extends('layouts.app')

@section('content')
<h3>Edit Product</h3>

<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Product Name</label>
            <input name="product_name"
                value="{{ old('product_name', $product->product_name) }}"
                class="form-control"
                required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Product SKU</label>
            <input name="product_id"
                value="{{ old('product_id', $product->product_id) }}"
                class="form-control"
                required>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Price</label>
            <input name="price"
                value="{{ old('price', $product->price) }}"
                class="form-control"
                required>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Previous Price</label>
            <input name="previous_price"
                value="{{ old('previous_price', $product->previous_price) }}"
                class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Quantity</label>
            <input name="quantity"
                value="{{ old('quantity', $product->quantity) }}"
                class="form-control"
                required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Alert Quantity</label>
            <input name="alert_quantity"
                value="{{ old('alert_quantity', $product->alert_quantity) }}"
                class="form-control"
                required>
        </div>

        {{-- Existing Images --}}
        @if($product->getMedia('product_images')->count())
        <div class="col-md-12 mb-3">
            <label class="form-label">Current Images</label>
            <div class="d-flex flex-wrap gap-2">
                @foreach($product->getMedia('product_images') as $image)
                <img src="{{ $image->getUrl() }}"
                    width="100"
                    height="100"
                    class="rounded border"
                    style="object-fit: cover;">
                @endforeach
            </div>
        </div>
        @endif

        {{-- Upload New Images --}}
        <div class="col-md-12 mb-3">
            <label class="form-label">Replace Images</label>
            <input type="file"
                name="images[]"
                class="form-control"
                multiple
                accept="image/*"
                onchange="previewImages(event)">
        </div>

        {{-- New Image Preview --}}
        <div class="col-md-12">
            <div id="image-preview" class="d-flex flex-wrap gap-2"></div>
        </div>
    </div>

    <button class="btn btn-primary mt-3">Update</button>
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
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.className = 'rounded border';
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    }
</script>
@endsection
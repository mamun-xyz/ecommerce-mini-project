@extends('layouts.app')

@section('content')
<h3>Product Details</h3>

<div class="card mb-4">
    <div class="card-body">
        <h4>{{ $product->product_name }}</h4>
        <p><strong>SKU:</strong> {{ $product->product_id }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Previous Price:</strong> ${{ $product->previous_price ?? 'N/A' }}</p>
        <p><strong>Stock:</strong> {{ $product->quantity }}</p>
        <p><strong>Alert Quantity:</strong> {{ $product->alert_quantity }}</p>
    </div>
</div>

<h5>Product Images</h5>
<div class="row">
    @if($product->getMedia('product_images')->count())
    @foreach($product->getMedia('product_images') as $image)
    <div class="col-md-3 mb-3">
        <img src="{{ $image->getUrl() }}"
            class="img-fluid rounded border"
            style="object-fit: cover; height: 150px; width: 100%;">
    </div>
    @endforeach
    @else
    <div class="col-12">
        <p class="text-muted">No images available for this product.</p>
    </div>
    @endif
</div>

<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
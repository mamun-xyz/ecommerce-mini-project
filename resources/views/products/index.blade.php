@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Products</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th width="200">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>

            {{-- Image Preview --}}
            <td>
                @if($product->getMedia('product_images')->count())
                <img src="{{ $product->getFirstMediaUrl('product_images') }}"
                    alt="{{ $product->product_name }}"
                    width="50" height="50"
                    style="object-fit: cover; border-radius: 5px;">
                @else
                <span class="text-muted">No Image</span>
                @endif
            </td>

            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->category->name }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
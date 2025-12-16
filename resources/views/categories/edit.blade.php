@extends('layouts.app')

@section('content')
<h3>Edit Category</h3>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
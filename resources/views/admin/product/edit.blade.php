@extends('layout.admin')

@section('content')

<div class="container">
    <h2>Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" 
                   name="name" 
                   class="form-control"
                   value="{{ old('name', $product->name) }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}"
                        {{ $product->category_id == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" 
                   step="0.01"
                   name="price" 
                   class="form-control"
                   value="{{ old('price', $product->price) }}">
        </div>

        <div class="mb-3">
            <label>Sale Price</label>
            <input type="number" 
                   step="0.01"
                   name="sale_price" 
                   class="form-control"
                   value="{{ old('sale_price', $product->sale_price) }}">
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" 
                   name="stock" 
                   class="form-control"
                   value="{{ old('stock', $product->stock) }}">
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" width="100">
            @else
                No image
            @endif
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>
                <input type="checkbox" 
                       name="is_active"
                       {{ $product->is_active ? 'checked' : '' }}>
                Active
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('product.index') }}" 
           class="btn btn-secondary">
           Back
        </a>

    </form>
</div>

@endsection
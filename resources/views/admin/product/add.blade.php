@extends('layout.admin')
@section('content')


        <h1>Create Product</h1>
        <form action="{{ route('product.store') }}" method="post">  
            @csrf
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"><br>
            <input type="text" name="price" placeholder="Price" value="{{ old('price') }}"><br>
            <input type="number" name="stock" placeholder="Stock" value="{{ old('stock') }}"><br>
            <button type="submit">Create</button>
            <a href="{{ route('product.index') }}">Back</a>
        </form>
        </center>
    
        @endsection
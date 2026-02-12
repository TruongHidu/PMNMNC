<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <center>
        <h1> Edit</h1>
        @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

        <form action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="name" placeholder="Name" value="{{ $product->name }}"><br>
            <input type="text" name="price" placeholder="Price" value="{{ $product->price  }}"><br>
            <input type="number" name="stock" placeholder="Stock" value="{{ $product->stock }}"><br>
            <button >Update</button>
            <a href="{{ route('product.index') }}">Back</a>
        </form>
    </center>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="{{ route('product.store') }}" method="post">  
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="price" placeholder="Price">
        <button type="submit">Create</button>
        <a href="{{ route('product.index') }}">Back</a>
        
    </form>

</body>
</html>
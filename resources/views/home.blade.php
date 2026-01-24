<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Home</h1>
        @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
        <a href="{{ route('product.index') }}">Product</a><br>
        <a href="{{ route('login') }}">Login</a>
    </center>
</body>
</html>
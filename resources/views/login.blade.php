<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center><h1>Login</h1>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
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
<form action="{{ route('login.post') }}" method="POST">

    @csrf
    <div>
        <label> Email: </label><br>
        <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
    </div>
    <br>
    <div>
        <label>Password: </label><br>
        <input type="password" name="password" placeholder="Enter password">
    </div>
    <br>
    <button type="submit"> Login</button>
    <a href="{{ route('signup') }}"> Sign Up</a>

</form>
</center>
</body>
</html>
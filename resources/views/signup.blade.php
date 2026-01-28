<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <center>
        <h1>Đăng ký</h1>
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
        <form method="POST" action="{{ route('signup.post') }}">
            @csrf
           <div>
                <label>Email: </label>
                <input type="email" name="email" placeholder="Enter email" value ="{{ old('email') }}">
            </div>
            <div>
                <label>Password: </label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <div>
                <label>Password: </label>
                <input type="password" name="rePassword" placeholder="Re-enter your password">
            </div>
            <div>
                <label>Name: </label>
                <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}">
            </div>
            <div>
                <label> Tuổi: </label>
                <input type="number" name="age" min="1" max="120">
            </div>

            <button type="submit">Đăng ký</button>
        </form>
    </center>
</body>
</html>
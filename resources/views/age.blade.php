<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Nhập tuổi của bạn</h1>
    <form method="POST" action="{{ route('age.save') }}">
    @csrf
    <input name="age" placeholder="Nhập tuổi" value="{{ old('age') }}">
    @error('age')
        <div style="color:red">{{ $message }}</div>
    @enderror
    <button>Gửi</button>
</form>
    
</center>
    
</body>
</html>
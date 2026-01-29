<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <center>
        <h1>Sign In</h1>

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

        <form method="POST" action="{{ route('check.signin') }}">
            @csrf
            <input name="username" placeholder="Username" value="{{ old('username') }}"><br><br>

            <input type="password" name="password" placeholder="Password"><br><br>

            <input type="password" name="repass" placeholder="Re-password"><br><br>

            <input name="mssv" placeholder="MSSV" value="{{ old('mssv') }}"><br><br>

            <input name="lopmonhoc" placeholder="Lớp môn học" value="{{ old('lopmonhoc') }}"><br><br>

            <select name="gioitinh">
                <option value="">-- Chọn giới tính --</option>
                <option value="nam" {{ old('gioitinh')=='nam' ? 'selected' : '' }}>Nam</option>
                <option value="nu" {{ old('gioitinh')=='nu' ? 'selected' : '' }}>Nữ</option>
            </select><br><br>

            <button>Sign In</button>
        </form>
    </center>
</body>
</html>

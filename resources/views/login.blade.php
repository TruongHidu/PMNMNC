@extends('layout.assets')

@section('content')

<div class="container mt-5">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Login</h3>
        </div>

        {{-- Thông báo thành công --}}
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        {{-- Thông báo lỗi --}}
        @if ($errors->any())
            <div class="alert alert-danger m-3">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger m-3">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Start -->
        <form class="form-horizontal" action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="card-body">

                <!-- Email -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Enter Email"
                               value="{{ old('email') }}">
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter Password">
                    </div>
                </div>

                <!-- Remember -->
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input">
                            <label class="form-check-label">Remember me</label>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info btn-block">Sign in</button>
                <a href="{{ route('signup') }}" class="btn btn-link btn-block">
                    Chưa có tài khoản? Đăng ký
                </a>
            </div>
        </form>

    </div>
</div>

@endsection
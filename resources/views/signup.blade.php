@extends('layout.assets')
@section('content')
<div class="container mt-5">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Login</h3>
        </div>

        {{-- Hiển thị lỗi --}}
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

        <form method="POST" action="{{ route('signup.post') }}">
            @csrf

            <div class="card-body">

                <!-- Email -->
                <div class="form-group">
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email"
                           value="{{ old('email') }}">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">
                </div>

                <!-- Re-Password -->
                <div class="form-group">
                    <input type="password"
                           name="rePassword"
                           class="form-control"
                           placeholder="Re-enter Password">
                </div>

                <!-- Name -->
                <div class="form-group">
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Full Name"
                           value="{{ old('name') }}">
                </div>

                <!-- Age -->
                <div class="form-group">
                    <input type="number"
                           name="age"
                           class="form-control"
                           placeholder="Age"
                           min="1"
                           max="120">
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info btn-block">
                    Đăng ký
                </button>

                <a href="{{ route('login') }}" class="btn btn-link btn-block">
                    Đã có tài khoản? Đăng nhập
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
@extends('layouts.applogin')

@section('content')
<div class="container">
    <h1>Đăng nhập</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
    <p class="mt-3">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
</div>
@endsection
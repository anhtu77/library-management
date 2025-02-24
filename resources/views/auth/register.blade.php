@extends('layouts.applogin')

@section('content')
<div class="container">
    <h1>Đăng ký</h1>

    <!-- Hiển thị thông báo lỗi validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Họ và tên:</label>
            <input type="text" name="name" id="name" class="form-control" value="" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation">Nhập lại mật khẩu:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
@endsection
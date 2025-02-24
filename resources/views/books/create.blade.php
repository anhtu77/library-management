@extends('layouts.app')

@section('title', 'Thêm sách mới')

@section('content')
    <h1 class="mb-4">Thêm sách mới</h1>

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

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="isbn">Mã sách:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="author">Tác giả:</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="publisher">Nhà xuất bản:</label>
            <input type="text" name="publisher" id="publisher" class="form-control" value="{{ old('publisher') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="year">Năm xuất bản:</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm sách</button>
    </form>
@endsection
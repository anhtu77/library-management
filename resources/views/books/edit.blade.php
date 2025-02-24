@extends('layouts.app')

@section('title', 'Chỉnh sửa sách')

@section('content')
    <h1>Chỉnh sửa sách</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="isbn">Mã sách:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $book->isbn }}" required>
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Tác giả:</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="publisher">Nhà xuất bản:</label>
            <input type="text" name="publisher" id="publisher" class="form-control" value="{{ $book->publisher }}" required>
        </div>
        <div class="form-group">
            <label for="year">Năm xuất bản:</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $book->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
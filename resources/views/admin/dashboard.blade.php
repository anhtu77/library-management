@extends('layouts.app')


@section('title', 'Danh sách sách')

@section('content')

    <!-- Nút đăng xuất -->
    <div class="text-end mb-3">
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Đăng xuất</button>
        </form>
    </div>

    <h1 class="mb-4">Danh sách sách</h1>
    <div class="mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm sách</a>
        <a href="{{ route('borrowings.index') }}" class="btn btn-info">Quản lý sách mượn</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 100px;">Mã sách</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Nhà xuất bản</th>
                <th>Năm</th>
                <th style="width: 100px;">Số lượng</th>
                <th style="width: 200px;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->year }}</td>
                    <td style="text-align: center;">{{ $book->quantity }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        @if ($book->quantity > 0)
                            <form action="{{ route('books.borrow', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Mượn</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
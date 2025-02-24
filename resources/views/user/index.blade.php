@extends('layouts.appuser')

@section('title', 'Trang chủ')

@section('content')
    <!-- Nút đăng xuất -->
    <div class="text-end mb-3">
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Đăng xuất</button>
        </form>
    </div>

    <h1 class="mb-4">Danh sách sách</h1>
    <a href="{{ route('user.borrowings') }}" class="btn btn-info mb-3">Quản lý sách mượn</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã sách</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Nhà xuất bản</th>
                <th>Năm</th>
                <th>Số lượng</th>
                <th>Hành động</th>
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
                    <td>{{ $book->quantity }}</td>
                    <td>
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
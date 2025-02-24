@extends('layouts.appuser')

@section('content')
<div class="container">
    <h1>Danh sách sách mượn của bạn</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Trạng thái</th>
                <th>Hành động</th> <!-- Thêm cột hành động -->
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->book->title }}</td>
                    <td>{{ $borrowing->borrowed_date }}</td>
                    <td>{{ $borrowing->returned_date ?? 'Chưa trả' }}</td>
                    <td>
                        @if ($borrowing->returned_date)
                            <span class="text-success">Đã trả</span>
                        @else
                            <span class="text-danger">Đang mượn</span>
                        @endif
                    </td>
                    <td>
                        <!-- Nút trả sách (chỉ hiển thị nếu sách chưa trả) -->
                        @if (!$borrowing->returned_date)
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-warning btn-sm">Trả sách</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
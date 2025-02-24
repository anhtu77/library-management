@extends('layouts.app')

@section('title', 'Quản lý sách mượn')

@section('content')
    <h1 class="mb-4">Quản lý sách mượn</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Người mượn</th>
                <th>Sách</th>
                <th>Ngày mượn</th>
                <th>Hạn trả</th>
                <th>Ngày trả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->book->title }}</td>
                    <td>{{ $borrowing->borrowed_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->returned_date ?? 'Chưa trả' }}</td>
                    <td>
                        @if (!$borrowing->returned_date)
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Trả sách</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
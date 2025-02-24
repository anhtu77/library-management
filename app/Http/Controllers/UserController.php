<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrowing;

class UserController extends Controller
{
    // Hiển thị trang chủ của user
    public function index()
    {
        // Kiểm tra role của người dùng
        if (Auth::user()->role !== 'user') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }

        // Logic hiển thị trang user
        $books = Book::all();
        return view('user.index', compact('books'));
    }

    // Hiển thị danh sách sách mượn của người dùng
    public function borrowings()
    {
        // Kiểm tra role của người dùng
        if (Auth::user()->role !== 'user') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }

        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lấy danh sách sách mượn của người dùng
        $borrowings = Borrowing::where('user_id', $user->id)
            ->with('book') // Nạp thông tin sách
            ->get();

        // Truyền dữ liệu sang view
        return view('user.borrowings', compact('borrowings'));
    }
}
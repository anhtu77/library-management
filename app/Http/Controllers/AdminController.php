<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrowing;
use App\Models\Book;

class AdminController extends Controller
{
    // Hiển thị trang dashboard của admin
    public function index()
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
        }
    
        // Kiểm tra role của người dùng
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }
    
        // Lấy danh sách sách mượn từ database
        $borrowings = Borrowing::with(['user', 'book'])->get();
    
        // Lấy danh sách sách từ database
        $books = Book::all();
    
        // Truyền cả hai biến $borrowings và $books sang view
        return view('admin.dashboard', compact('borrowings', 'books'));
    }
    
}
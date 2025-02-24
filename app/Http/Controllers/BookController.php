<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Kiểm tra vai trò của người dùng
        if (Auth::user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
        }

        $books = Book::all(); // Lấy tất cả sách từ cơ sở dữ liệu
        return view('admin.dashboard', compact('books')); // Truyền biến $books sang view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kiểm tra vai trò của người dùng
      // Kiểm tra nếu người dùng chưa đăng nhập
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
    }

    // Kiểm tra vai trò của người dùng
    if (Auth::user()->role !== 'admin') {
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
    }

    return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
        }
    
        // Kiểm tra vai trò của người dùng
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }
    
        // Validate dữ liệu đầu vào
        $request->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
    
        // Tạo sách mới
        Book::create($request->all());
    
        // Chuyển hướng về trang admin.dashboard với thông báo thành công
        return redirect()->route('admin.dashboard')->with('success', 'Sách đã được thêm thành công!');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
        }
    
        // Kiểm tra vai trò của người dùng
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }
    
        return view('books.edit', compact('book'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
        }
    
        // Kiểm tra vai trò của người dùng
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }
    
        $request->validate([
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
    
        $book->update($request->all());
    
        // Chuyển hướng về trang admin.dashboard với thông báo thành công
        return redirect()->route('admin.dashboard')->with('success', 'Sách đã được cập nhật thành công!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước.');
        }
    
        // Kiểm tra vai trò của người dùng
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }
    
        $book->delete();
    
        // Chuyển hướng về trang admin.dashboard với thông báo thành công
        return redirect()->route('admin.dashboard')->with('success', 'Sách đã được xóa thành công!');
    }
    
}
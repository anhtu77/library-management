<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import model Book

class IndexController extends Controller
{
    // Hiển thị trang index
    public function index()
    {
        // Lấy danh sách sách từ database
        $books = Book::all();

        // Truyền biến $books sang view
        return view('index', ['books' => $books]);
    }
}
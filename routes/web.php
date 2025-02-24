<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Chuyển hướng route mặc định (/)
Route::redirect('/', '/login');

// Sử dụng route resource để quản lý các route CRUD cho BookController
Route::resource('books', BookController::class);

// Hiển thị form đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Xử lý đăng nhập
Route::post('/login', [AuthController::class, 'login']);

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Các route yêu cầu đăng nhập
use App\Http\Controllers\IndexController;

Route::middleware('auth')->group(function () {
    Route::get('/index', [IndexController::class, 'index'])->name('index');
});

// Route mượn sách
Route::post('/books/{book}/borrow', [BorrowingController::class, 'borrow'])->name('books.borrow');

// Route trả sách
Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'return'])->name('borrowings.return');



// Route quản lý sách mượn
Route::middleware('auth')->group(function () {
    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'return'])->name('borrowings.return');
});


// Route dành cho admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Route dành cho user
Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route dành cho user
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/borrowings', [UserController::class, 'borrowings'])->name('user.borrowings');
// Route đăng ký
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
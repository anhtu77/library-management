<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function index()
    {
        // Lấy danh sách sách mượn từ database
        $borrowings = Borrowing::with(['user', 'book'])->get();
        return view('borrowings.index', compact('borrowings'));
    }
    // Xử lý mượn sách
    public function borrow(Request $request, $bookId)
    {
        // Kiểm tra xem sách có tồn tại không
        $book = Book::findOrFail($bookId);

        // Kiểm tra xem sách còn đủ số lượng để mượn không
        if ($book->quantity > 0) {
            // Tạo bản ghi mượn sách
            Borrowing::create([
                'user_id' => Auth::id(), // Người dùng hiện tại
                'book_id' => $book->id,
                'borrowed_date' => now(), // Ngày mượn là ngày hiện tại
                'due_date' => now()->addDays(14), // Hẹn trả sau 14 ngày
            ]);

            // Giảm số lượng sách trong kho
            $book->decrement('quantity');

            return redirect()->back()->with('success', 'Mượn sách thành công!');
        }

        return redirect()->back()->with('error', 'Sách đã hết, không thể mượn.');
    }

    // Xử lý trả sách
    public function return($borrowingId)
    {
        // Tìm bản ghi mượn sách
        $borrowing = Borrowing::findOrFail($borrowingId);

        // Kiểm tra xem sách đã được trả chưa
        if (!$borrowing->returned_date) {
            // Cập nhật ngày trả
            $borrowing->update([
                'returned_date' => now(),
            ]);

            // Tăng số lượng sách trong kho
            $borrowing->book->increment('quantity');

            return redirect()->back()->with('success', 'Trả sách thành công!');
        }

        return redirect()->back()->with('error', 'Sách đã được trả trước đó.');
    }
}
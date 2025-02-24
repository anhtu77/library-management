<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Khai báo các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'publisher',
        'year',
        'quantity',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
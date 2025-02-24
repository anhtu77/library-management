<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Người mượn
            $table->unsignedBigInteger('book_id'); // Sách được mượn
            $table->date('borrowed_date'); // Ngày mượn
            $table->date('due_date'); // Ngày hẹn trả
            $table->date('returned_date')->nullable(); // Ngày trả (nếu đã trả)
            $table->timestamps(); // Thêm created_at và updated_at
    
            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};

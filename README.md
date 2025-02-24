# 📚 Library Management System

**Library Management System** là một ứng dụng web giúp quản lý sách và mượn/trả sách trong thư viện. Ứng dụng được xây dựng bằng **Laravel** và hỗ trợ hai vai trò người dùng: **Admin** và **User**.

---

## 🚀 Tính năng chính

### 1. Quản lý sách (Admin)
- **Thêm sách mới**: Thêm thông tin sách (ISBN, tiêu đề, tác giả, nhà xuất bản, năm xuất bản, số lượng).
- **Xem danh sách sách**: Hiển thị tất cả sách trong thư viện.
- **Sửa thông tin sách**: Cập nhật thông tin sách.
- **Xóa sách**: Xóa sách khỏi hệ thống.

### 2. Quản lý mượn/trả sách
- **Mượn sách**: Người dùng có thể mượn sách nếu sách còn số lượng.
- **Trả sách**: Người dùng có thể trả sách đã mượn.

### 3. Phân quyền người dùng
- **Admin**: Có quyền quản lý sách và xem danh sách mượn/trả sách.
- **User**: Có quyền xem danh sách sách, mượn/trả sách.

### 4. Đăng ký và đăng nhập
- **Đăng ký**: Người dùng có thể đăng ký tài khoản mới.
- **Đăng nhập**: Người dùng đăng nhập để truy cập hệ thống.

---

## 🛠️ Công nghệ sử dụng

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Bootstrap, Blade Templates
- **Database**: MySQL
- **Authentication**: Laravel Auth

---

## 🖥️ Cài đặt và chạy ứng dụng

### 1. Yêu cầu hệ thống
- PHP >= 8.0
- Composer
- MySQL
- Node.js (nếu cần biên dịch CSS/JS)

### 2. Cài đặt
- Cài đặt dependencies
- composer install
- npm install
- Cấu hình môi trường
- cp .env.example .env
- Cập nhật thông tin kết nối database trong file .env:
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=library_management
- DB_USERNAME=root
- DB_PASSWORD=your_password

- Tạo key và chạy migrations
- php artisan key:generate
- php artisan migrate --seed
- Chạy ứng dụng
- php artisan serve

### Tài khoản mẫu 
### Admin
- Email: admin@example.com
- Password: password

### User
- Email: user@example.com
- Password: password

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm Font Awesome (nếu cần) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Thêm CSS tùy chỉnh (nếu có) -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white text-center py-4">
        <div class="container">
            <h1>Quản lý Thư viện</h1>
            <nav class="mt-3">
                <a href="{{ route('user.index') }}" class="text-white mx-2" style="text-decoration: none;">Trang chủ</a>
                
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Footer -->
    

    <!-- Thêm Bootstrap JS và các script khác -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Thêm JavaScript tùy chỉnh (nếu có) -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
        header { background-color: #343a40; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: white; text-decoration: none; margin-left: 20px; font-weight: bold; }
        .container { padding: 20px; max-width: 1200px; margin: auto; background: white; min-height: 80vh; box-shadow: 0 0 10px rgba(0,0,0,0.1); mt-4; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f8f9fa; }
        .btn { padding: 8px 12px; text-decoration: none; color: white; border-radius: 4px; display: inline-block; border: none; cursor: pointer; }
        .btn-primary { background-color: #007bff; }
        .btn-danger { background-color: #dc3545; }
        .btn-warning { background-color: #ffc107; color: black; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

    <header>
        <h2>HỆ THỐNG QUẢN LÝ SẢN PHẨM</h2>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('products.index') }}">Sản phẩm</a>
        </nav>
    </header>

    <div class="container">
        <x-alert />
        
        @yield('content')
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Thêm Sản Phẩm Kho</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/products/store" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giá tiền (VNĐ)</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Số lượng nhập kho</label>
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Danh mục</label>
                                <select name="category" class="form-select">
                                    <option value="">-- Chọn danh mục --</option>
                                    <option value="Điện thoại" {{ old('category') == 'Điện thoại' ? 'selected' : '' }}>Điện thoại</option>
                                    <option value="Laptop" {{ old('category') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                    <option value="Phụ kiện" {{ old('category') == 'Phụ kiện' ? 'selected' : '' }}>Phụ kiện</option>
                                    <option value="Gia dụng" {{ old('category') == 'Gia dụng' ? 'selected' : '' }}>Gia dụng</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Lưu Sản Phẩm</button>
                                <a href="/products" class="btn btn-secondary">Quay lại danh sách kho</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
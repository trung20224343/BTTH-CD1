<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Lý Kho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid mt-4 px-4">
        @if(Session::has('success'))
            <div class="alert alert-success fw-bold">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Danh Sách Sản Phẩm Tồn Kho</h4>
                <a href="/products/create" class="btn btn-success btn-sm">Thêm Sản Phẩm Mới</a>
            </div>
            <div class="card-body">
                <form action="/products" method="GET" class="row g-3 mb-4">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="Nhập tên sản phẩm cần tìm...">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Mã SP</th>
                                <th class="text-start">Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Giá (VNĐ)</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật tồn kho</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $pd)
                            <tr>
                                <td>#{{ $pd->id }}</td>
                                <td class="text-start fw-bold">{{ $pd->name }}</td>
                                <td><span class="badge bg-secondary">{{ $pd->category }}</span></td>
                                <td class="text-danger fw-bold">{{ number_format($pd->price) }} ₫</td>
                                <td>
                                    @if($pd->quantity == 0)
                                        <span class="badge bg-danger fs-6">Hết hàng</span>
                                    @elseif($pd->quantity < 5)
                                        <span class="badge bg-warning text-dark fs-6">Sắp hết hàng</span>
                                    @else
                                        <span class="badge bg-success fs-6">Còn hàng</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="/products/update/{{ $pd->id }}" method="POST" class="d-flex justify-content-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $pd->quantity }}" class="form-control form-control-sm me-2 text-center" style="width: 80px;" min="0">
                                        <button type="submit" class="btn btn-sm btn-info text-white">Lưu</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/products/delete/{{ $pd->id }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi kho?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-muted py-4">Hệ thống chưa có sản phẩm nào hoặc không tìm thấy kết quả.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Danh Sách Sinh Viên</h4>
                <a href="/students/create" class="btn btn-light btn-sm">Thêm Mới</a>
            </div>
            <div class="card-body">
                <form action="/students" method="GET" class="row g-3 mb-4">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="Tìm kiếm theo tên...">
                    </div>
                    <div class="col-md-2">
                        <select name="sort" class="form-select">
                            <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Tên A-Z</option>
                            <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Tên Z-A</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Lọc</button>
                    </div>
                </form>

                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên sinh viên</th>
                            <th>Ngành học</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $st)
                        <tr>
                            <td>{{ $st->id }}</td>
                            <td>{{ $st->name }}</td>
                            <td>{{ $st->major }}</td>
                            <td>{{ $st->email }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Không tìm thấy sinh viên nào</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
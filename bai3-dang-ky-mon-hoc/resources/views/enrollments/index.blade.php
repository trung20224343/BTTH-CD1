<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Môn Học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        @if(Session::has('success'))
            <div class="alert alert-success fw-bold">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger fw-bold">{{ Session::get('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">1. Thêm Sinh Viên</div>
                    <div class="card-body">
                        <form action="/students/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên sinh viên...">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Lưu Sinh Viên</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-success text-white fw-bold">2. Thêm Môn Học</div>
                    <div class="card-body">
                        <form action="/courses/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tên môn học...">
                            </div>
                            <div class="mb-3">
                                <input type="number" name="credits" class="form-control" placeholder="Số tín chỉ..." min="1">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Lưu Môn Học</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold">3. Đăng Ký Môn</div>
                    <div class="card-body">
                        <form action="/enrollments/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <select name="student_id" class="form-select">
                                    <option value="">-- Chọn Sinh Viên --</option>
                                    @foreach($students as $st)
                                        <option value="{{ $st->id }}">{{ $st->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="course_id" class="form-select">
                                    <option value="">-- Chọn Môn Học --</option>
                                    @foreach($courses as $cs)
                                        <option value="{{ $cs->id }}">{{ $cs->name }} ({{ $cs->credits }} TC)</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning w-100 fw-bold">Xác Nhận Đăng Ký</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white fw-bold">Danh Sách Đăng Ký & Tín Chỉ</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-start">Tên Sinh Viên</th>
                                    <th class="text-start">Các Môn Đã Đăng Ký</th>
                                    <th>Tổng Tín Chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                <tr>
                                    <td class="text-start fw-bold">{{ $student->name }}</td>
                                    <td class="text-start">
                                        @forelse($student->courses as $course)
                                            <span class="badge bg-info text-dark me-1 mb-1 fs-6">{{ $course->name }} ({{ $course->credits }})</span>
                                        @empty
                                            <span class="text-muted fst-italic">Chưa đăng ký môn nào</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        @php $total = $student->courses->sum('credits'); @endphp
                                        @if($total > 0)
                                            <span class="badge {{ $total == 18 ? 'bg-danger' : 'bg-success' }} fs-5">{{ $total }} / 18</span>
                                        @else
                                            <span class="text-muted">0 / 18</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-muted py-4">Hệ thống chưa có dữ liệu sinh viên.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
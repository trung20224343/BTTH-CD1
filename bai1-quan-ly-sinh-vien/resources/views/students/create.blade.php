<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Thêm Sinh Viên Mới</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
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

                        <form action="/students/store" method="POST">
                            @csrf <div class="mb-3">
                                <label class="form-label fw-bold">Tên sinh viên</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập họ và tên...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Ngành học</label>
                                <input type="text" name="major" class="form-control" value="{{ old('major') }}" placeholder="Ví dụ: Công nghệ thông tin">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="example@email.com">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Lưu Thông Tin</button>
                                <a href="/students" class="btn btn-secondary">Xem Danh Sách</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
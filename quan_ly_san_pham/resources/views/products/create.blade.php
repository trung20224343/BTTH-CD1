@extends('layout.master')

@section('content')
    <h1>Thêm Sản phẩm mới</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 5px;">
        @csrf
        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Giá bán (VNĐ):</label>
            <input type="number" name="price" required>
        </div>

        <div class="form-group">
            <label>Số lượng kho:</label>
            <input type="number" name="quantity" required>
        </div>

        <div class="form-group">
            <label>Danh mục:</label>
            <select name="category_id" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm:</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
        <a href="{{ route('products.index') }}" class="btn btn-warning">Quay lại</a>
    </form>
@endsection
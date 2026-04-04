@extends('layout.master')

@section('content')
    <h1>Cập nhật Sản phẩm</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 5px;">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label>Giá bán (VNĐ):</label>
            <input type="number" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label>Số lượng kho:</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" required>
        </div>

        <div class="form-group">
            <label>Danh mục:</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm hiện tại:</label><br>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="150" style="margin-bottom: 10px; border-radius: 5px;"><br>
            @endif
            <label>Chọn ảnh mới (nếu muốn thay đổi):</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        <a href="{{ route('products.index') }}" class="btn btn-warning">Quay lại</a>
    </form>
@endsection
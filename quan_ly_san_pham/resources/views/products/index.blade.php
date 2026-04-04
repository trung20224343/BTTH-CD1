@extends('layout.master')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Danh sách Sản phẩm</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Thêm sản phẩm</a>
    </div>

    <form method="GET" action="{{ route('products.index') }}" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px; display: flex; gap: 10px;">
        <input type="text" name="search" placeholder="Nhập tên sản phẩm cần tìm..." value="{{ request('search') }}" style="flex: 1; padding: 8px;">
        <select name="sort" style="padding: 8px;">
            <option value="">-- Sắp xếp theo giá --</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
        </select>
        <button type="submit" class="btn btn-primary">Lọc / Tìm kiếm</button>
        <a href="{{ route('products.index') }}" class="btn btn-warning" style="text-decoration: none; padding: 8px 12px;">Xóa bộ lọc</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="80" style="border-radius: 4px;">
                        @else
                            <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td>{{ $product->category->name ?? 'Không phân loại' }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 20px;">Không tìm thấy sản phẩm nào!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>
@endsection
@extends('layout.master')

@section('content')
    <h1>Trang Tổng Quan (Dashboard)</h1>

    <div style="display: flex; gap: 20px; margin-bottom: 30px;">
        <div style="flex: 1; background-color: #e3f2fd; padding: 20px; border-radius: 8px; border: 1px solid #b6e2ff;">
            <h3>Tổng số sản phẩm</h3>
            <p style="font-size: 30px; font-weight: bold; color: #0056b3;">{{ $totalProducts }}</p>
        </div>
        <div style="flex: 1; background-color: #e8f5e9; padding: 20px; border-radius: 8px; border: 1px solid #c8e6c9;">
            <h3>Tổng số danh mục</h3>
            <p style="font-size: 30px; font-weight: bold; color: #2e7d32;">{{ $totalCategories }}</p>
        </div>
    </div>

    <h2>5 Sản phẩm mới nhất</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Ngày thêm</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
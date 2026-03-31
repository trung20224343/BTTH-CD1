<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->orderBy('id', 'desc')->get();
        return view('products.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'price.required' => 'Vui lòng nhập giá tiền.',
            'price.numeric' => 'Giá tiền phải là con số.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'category.required' => 'Vui lòng chọn danh mục.'
        ]);

        Product::create($request->all());

        return redirect('/products')->with('success', 'Đã thêm sản phẩm thành công!');
    }

    public function updateQuantity(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update(['quantity' => $request->quantity]);
        
        return redirect('/products')->with('success', 'Đã cập nhật tồn kho!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect('/products')->with('success', 'Đã xóa sản phẩm khỏi hệ thống!');
    }
}
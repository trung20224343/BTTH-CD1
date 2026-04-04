<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $latestProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact('totalProducts', 'totalCategories', 'latestProducts'));
    }

    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sort') && $request->sort != '') {
            $query->orderBy('price', $request->sort);
        } else {
            $query->orderBy('id', 'desc');
        }

        $products = $query->paginate(5);
        
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        Product::create($data);
        
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        
        $product->update($data);
        
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
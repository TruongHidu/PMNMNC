<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Danh sách sản phẩm
     */
    public function index()
    {
        $products = Product::with('category')
                    ->where('is_delete', 0)
                    ->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Form thêm
     */
    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Lưu sản phẩm
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'name',
            'price',
            'sale_price',
            'stock',
            'category_id',
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['is_delete'] = 0;

        // Upload ảnh
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('product.index')
                         ->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Form sửa
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('is_delete', 0)->get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $data = $request->only([
            'name',
            'price',
            'sale_price',
            'stock',
            'category_id',
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Nếu upload ảnh mới
        if ($request->hasFile('image')) {

            // Xóa ảnh cũ
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('product.index')
                         ->with('success', 'Cập nhật thành công');
    }

    /**
     * Xóa mềm
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_delete' => 1]);

        return back()->with('success', 'Đã xóa sản phẩm');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.category.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'description' => 'required', // Bắt buộc theo yêu cầu của bạn
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active'   => 'boolean',
        ]);

        $data = $request->all();

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Lấy danh sách cha: loại bỏ chính nó để tránh vòng lặp vô tận
        $categories = Category::where('is_delete', 0)
                                ->where('id', '!=', $category->id)
                                ->get();
                                
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'parent_id'   => 'nullable|exists:categories,id',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'is_active'   => 'required|boolean',
    ]);

    if ($request->parent_id == $category->id) {
        return back()->withErrors('Danh mục cha không hợp lệ');
    }

    if ($this->isChild($category->id, $request->parent_id)) {
        return back()->withErrors('Không được chọn danh mục con làm cha');
    }

    $data = $request->only([
        'name',
        'parent_id',
        'description',
        'is_active'
    ]);

    // ✅ Nếu upload ảnh mới → xóa ảnh cũ
    if ($request->hasFile('image')) {

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $path = $request->file('image')->store('categories', 'public');
        $data['image'] = $path;
    }

    $category->update($data);

    return redirect()->route('category.index')
                     ->with('success', 'Cập nhật danh mục thành công');
}

    public function destroy(Category $category)
    {
        // Xóa mềm bằng cách update flag
        $category->update(['is_delete' => 1]);
        return back()->with('success', 'Đã xóa danh mục.');
    }

    /**
     * Kiểm tra đệ quy xem một ID có phải là con/cháu của ID khác không
     */
    private function isChild($id, $parentId)
    {
        if (!$parentId) return false;

        $parent = Category::find($parentId);
        while ($parent) {
            if ($parent->id == $id) return true;
            $parent = $parent->parent;
        }
        return false;
    }

}

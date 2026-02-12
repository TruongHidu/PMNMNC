@extends('layout.admin')
@section('content')
<div class="container">
    <h1>Chỉnh sửa danh mục</h1>

    <form action="{{ route('category.update', $category) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Tên --}}
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $category->name) }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Danh mục cha --}}
        <div class="mb-3">
            <label class="form-label">Danh mục cha</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Là danh mục gốc --</option>
                @foreach($categories as $item)
                    <option value="{{ $item->id }}"
                        {{ old('parent_id', $category->parent_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Mô tả --}}
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Ảnh --}}
        <div class="mb-3">
            <label class="form-label">Hình ảnh</label>
            <input type="file"
                   name="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if($category->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$category->image) }}"
                         style="width:120px;height:120px;object-fit:cover"
                         class="img-thumbnail">
                </div>
            @endif
        </div>

        {{-- Trạng thái --}}
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>
                    Hiển thị
                </option>
                <option value="0" {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>
                    Ẩn
                </option>
            </select>
        </div>

        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>


    </center>

@endsection
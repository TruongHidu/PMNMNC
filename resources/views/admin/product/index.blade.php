@extends('layout.admin')

@section('content')

<div class="container">
    <h2>Product Management</h2>

    <a href="{{ route('product.create') }}" class="btn btn-success mb-3">
        Add New Product
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product List</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>

                    <td>
                        @if($p->image)
                            <img src="{{ asset('storage/'.$p->image) }}" width="60">
                        @else
                            No image
                        @endif
                    </td>

                    <td>{{ $p->name }}</td>

                    <td>{{ $p->category?->name ?? '---' }}</td>

                    <td>{{ number_format($p->price, 0, ',', '.') }} đ</td>

                    <td>
                        @if($p->sale_price)
                            {{ number_format($p->sale_price, 0, ',', '.') }} đ
                        @else
                            ---
                        @endif
                    </td>

                    <td>
                        @if($p->stock > 0)
                            <span class="badge bg-success">{{ $p->stock }}</span>
                        @else
                            <span class="badge bg-danger">Hết hàng</span>
                        @endif
                    </td>

                    <td>
                        @if($p->is_active)
                            <span class="badge bg-primary">Hiển thị</span>
                        @else
                            <span class="badge bg-secondary">Ẩn</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('product.edit', $p) }}" 
                           class="btn btn-sm btn-primary">
                           Sửa
                        </a>

                        <form action="{{ route('product.destroy', $p) }}" 
                              method="POST" 
                              style="display:inline"
                              onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $products->links() }}
    </div>
</div>

@endsection
@extends('layout.admin')

@section('content')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th style="width: 10px">Name</th>
                      <th>Description</th>
                      <th>Thuộc danh mục</th>
                      <th style="width: 40px">Image</th>
                      <th style="width: 40px">Trạng thái </th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $c)
                    <tr>
                      <td>{{ $c->id }}</td>
                      <td>{{ $c->name }}</td>
                      <td>
                       {{ $c->description }}
                      </td>
                      <td>{{ $c->parent?->name }}</td>
                      <td>
                        @if($c->image)
                        <img src="{{ asset('storage/'.$c->image) }}" width="100">

                        @else
                            No image
                        @endif
                      </td>
                      <td>{{ $c->is_active ? 'Hiển thị' : 'Ẩn' }}</td>
                      <td>
                        <a href="{{ route('category.edit', $c) }}">Sửa</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>

            <a href="{{ route('category.create') }}" class="btn-create">
        Add New Category
    </a>
@endsection

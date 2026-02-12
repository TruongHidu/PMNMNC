@extends('layout.admin')

@section('content')
<div class="container">
    <h2>Product Management</h2>

   
    <br>
    <a href="{{ route('product.create') }}" class="btn-create">
        Add New Product
    </a>
</div>
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
                      <th>Price</th>
                      <th>Stock</th>
                      <th style="width: 40px">Edit</th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $p)
                    <tr>
                      <td>{{ $p->id }}</td>
                      <td>{{ $p->name }}</td>
                      <td>
                       {{ $p->price }}
                      </td>
                      <td>{{ $p->stock }}</td>
                    
                      <td>
                        <a href="{{ route('product.edit', $p) }}">Sửa</a>
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

            
@endsection

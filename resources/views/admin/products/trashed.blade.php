@extends ('layouts.app')

@section ('content')

    <div class="panel panel-default">
        <div class="panel-heading">Trashed Products</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Restore</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ asset($product->image) }}" alt="{{ $product->name . ' image' }}" width="40"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <a href="{{ route('products.restore', ['id' => $product->id]) }}" class="btn btn-info btn-xs">Restore</button>
                            </td>
                            <td>
                                <form action="{{ route('products.kill', ['id' => $product->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                          </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>

@stop
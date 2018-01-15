@extends ('layouts.app')

@section ('content')

    <div class="panel panel-default">
        <div class="panel-heading">Orders</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Products</th>
                    <th>Edit</th>
                    <th>Delivery</th>
                    <th>Trash</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($orders as $order)
                        <tr>

                            <td>{{ $order->name }}</td>
         					<td>{{ $order->address }}</td>
         					<td>{{ $order->number }}</td>
         					<td>{{ $order->products }}</td>

                            <td>
                                <a href="{{ route('orders.edit', ['id' => $order->id]) }}" class="btn btn-info btn-xs">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('orders.delivery', ['id' => $order->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    @if($order-> delivery == 0)
            						<a href="{{ route('orders.delivery', ['id' => $order->id]) }}" class="btn btn-success btn-xs">delivery</a>
           							@endif
           							@if($order-> delivery == 1)
           							<a href="{{ route('orders.delivery', ['id' => $order->id]) }}" class="btn disable btn-xs">delivered</a>
           							@endif
                                    
                                </form>
                            </td>
	
							<td>
                                <form action="{{ route('orders.destroy', ['id' => $order->id]) }}" method="POST">
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
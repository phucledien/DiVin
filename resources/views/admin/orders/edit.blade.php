@extends ('layouts.app')

@section('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">Edit Customer Detail</div>
        <div class="panel-body">
            <form action="{{ route('orders.update', ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                </div>                
                <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                </div>
                <div class="form-group">
                        <label for="name">Number</label>
                        <input type="text" name="number" class="form-control" value="{{ $customer->number }}">
                </div>
              
                <div class="form-group">
                    <button class="btn btn-success form-control">Update Customer Detail</button>
                </div>
            </form>
        </div>
    </div>

@endsection
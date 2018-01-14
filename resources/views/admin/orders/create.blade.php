@extends ('layouts.app')

@section('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">Create a new category</div>
        <div class="panel-body">
            <form action="{{ route('categories.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control">Save Category</button>
                </div>
            </form>
        </div>
    </div>

@endsection
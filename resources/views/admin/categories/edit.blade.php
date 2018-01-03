@extends ('layouts.app')

@section('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">Edit the category</div>
        <div class="panel-body">
            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control">Save Category</button>
                </div>
            </form>
        </div>
    </div>

@endsection
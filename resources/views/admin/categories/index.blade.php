@extends ('layouts.app')

@section ('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Categories
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>
					Category name
				</th>
				<th>
					Editing
				</th>
				<th>
					Deleting
				</th>
			</thead>

			<tbody>
				@if ($categories->count() > 0)
					@foreach ($categories as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							<td>
								<a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-xs btn-info">Edit</a>
							</td>

							<td>
								<form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-xs">Delete</button>
                                </form>								
							</td>
							
						</tr>
					@endforeach
				@else
					<tr>
						<th colspan="3" class="text-center">There is no category</th>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@stop
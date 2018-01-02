@extends ('layouts.app')

@section ('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Blog settings
	</div>

	<div class="panel-body">
		<form action="{{ route('setting.update') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
			<div class="form-group">
				<label for="site_name">Site name</label>
				<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
            </div>
            
            <textarea class="form-control" name="about" id="about" cols="30" rows="10">{{ $settings->about }}</textarea>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" value="{{ $settings->address }}" class="form-control">
			</div>

			<div class="form-group">
				<label for="contact_number">Contact phone</label>
				<input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
			</div>

			<div class="form-group">
				<label for="contact_email">Contact email</label>
				<input type="email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Save settings
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop
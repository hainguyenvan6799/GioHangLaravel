@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign Up</h1>

		@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err . '<br>'}}
				@endforeach
			</div>
		@endif

		<form method="POST" action="login">
			{{csrf_field()}}

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="Submit">Login</button>
		</form>

	</div>
</div>
@endsection
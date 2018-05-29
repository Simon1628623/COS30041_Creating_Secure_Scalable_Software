<!DOCTYPE html>
<html>
<head>
<title>Create restaurants</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('restaurants') }}">restaurants Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('restaurants') }}">View All restaurants</a></li>
			<li><a href="{{ URL::to('restaurants/create') }}">Create a restaurants</a>
		</ul>
		</nav>
		<h1>Create a restaurants</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'restaurants')) }}
		<div class="form-group">
			{{ Form::label('restname', 'Restaurant Name') }}
			{{ Form::text('restname', Input::old('restname'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('restphone', 'Restaurant Phone') }}
			{{ Form::text('restphone', Input::old('restphone'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('restaddress1', 'Restaurant Address 1') }}
			{{ Form::text('restaddress1', Input::old('restaddress1'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('restaddress2', 'Restaurant Address 1') }}
			{{ Form::text('restaddress2', Input::old('restaddress2'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('suburb', 'Suburb') }}
			{{ Form::text('suburb', Input::old('suburb'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('numberofseats', 'Number Of Seats') }}
			{{ Form::text('numberofseats', Input::old('numberofseats'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('country_id', 'Country ID') }}
			{{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('category_id', 'Cateogry ID') }}
			{{ Form::text('category_id', Input::old('category_id'), array('class' => 'form-control')) }}
		</div>
		{{ Form::submit('Create the restaurants!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Create roles</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('roles') }}">roles Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('roles') }}">View All roles</a></li>
			<li><a href="{{ URL::to('roles/create') }}">Create a roles</a>
		</ul>
		</nav>
		<h1>Create a roles</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'roles')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</div>
		{{ Form::submit('Create the roles!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
</body>
</html>
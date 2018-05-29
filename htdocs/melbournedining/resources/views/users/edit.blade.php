<!DOCTYPE html>
<html>
<head>
 <title>Edit users</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('users') }}">users Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('users') }}">View All users</a></li>
				<li><a href="{{ URL::to('users/create') }}">Create a users</a>
			</ul>
		</nav>
		<h1>Edit {{ $users->id }}</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($users, array('route' => array('users.update', $users->id),
		'method' => 'PUT')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('country_id', 'Country ID') }}
			{{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::open(array('url' => 'users/' . $users->id, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete this users', array('class' => 'btn btn-warning'))}}
			{{ Form::close() }}
		</div>
		{{ Form::submit('Edit the users!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
</body>
</html>
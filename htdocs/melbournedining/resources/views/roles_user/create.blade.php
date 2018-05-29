<!DOCTYPE html>
<html>
<head>
<title>Create roles_user</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('roles_user') }}">roles_user Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('roles_user') }}">View All roles_user</a></li>
			<li><a href="{{ URL::to('roles_user/create') }}">Create a roles_user</a>
		</ul>
		</nav>
		<h1>Create a roles_user</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'roles_user')) }}
		<div class="form-group">
			{{ Form::label('user_id', 'User ID') }}
			{{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('role_id', 'Role ID') }}
			{{ Form::text('role_id', Input::old('role_id'), array('class' => 'form-control')) }}
		</div>
		{{ Form::submit('Create the roles_user!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
</body>
</html>
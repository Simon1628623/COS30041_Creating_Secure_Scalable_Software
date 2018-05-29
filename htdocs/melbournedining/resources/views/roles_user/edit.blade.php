<!DOCTYPE html>
<html>
<head>
 <title>Edit roles_user</title>
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
		<h1>Edit {{ $roles_user->user_id }}</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($roles_user, array('route' => array('roles_user.update', $roles_user->user_id),
		'method' => 'PUT')) }}
		<div class="form-group">
			{{ Form::label('user_id', 'user_id') }}
			{{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('role_id', 'Role ID') }}
			{{ Form::text('role_id', Input::old('role_id'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::open(array('url' => 'roles_user/' . $roles_user->user_id, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete this roles_user', array('class' => 'btn btn-warning'))}}
			{{ Form::close() }}
		</div>
		{{ Form::submit('Edit the roles_user!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
</body>
</html>
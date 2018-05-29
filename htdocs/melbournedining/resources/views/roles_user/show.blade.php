<!DOCTYPE html>
<html>
<head>
<title>Show roles_user</title>
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
		<h1>Showing {{ $roles_user->user_id }}</h1>
		<div class="jumbotron text-center">
			<p>User ID: {{ $roles_user->user_id }}</p>
			<p>Role ID: {{ $roles_user->role_id }}</p>
			<p>Created At: {{ $roles_user->created_at }}</p>
			<p>Updated At: {{ $roles_user->updated_at }}</p>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Show roles</title>
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
		<h1>Showing {{ $roles->id }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $roles->id }}</p>
			<p>Name: {{ $roles->name }}</p>
			<p>Created At: {{ $roles->created_at }}</p>
			<p>Updated At: {{ $roles->updated_at }}</p>
		</div>
	</div>
</body>
</html>
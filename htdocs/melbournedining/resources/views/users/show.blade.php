<!DOCTYPE html>
<html>
<head>
<title>Show users</title>
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
		<h1>Showing {{ $users->id }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $users->id }}</p>
			<p>Name: {{ $users->name }}</p>
			<p>Email: {{ $users->email }}</p>
			<p>Password: {{ $users->password }}</p>
			<p>Created At: {{ $users->created_at }}</p>
			<p>Updated At: {{ $users->updated_at }}</p>
			<p>Country ID: {{ $users->country_id }}</p>
		</div>
	</div>
</body>
</html>
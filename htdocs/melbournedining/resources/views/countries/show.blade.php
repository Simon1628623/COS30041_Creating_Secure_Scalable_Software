<!DOCTYPE html>
<html>
<head>
<title>Show countries</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('countries') }}">countries Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('countries') }}">View All countries</a></li>
				<li><a href="{{ URL::to('countries/create') }}">Create a countries</a>
			</ul>
		</nav>
		<h1>Showing {{ $countries->id }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $countries->id }}</p>
			<p>Name: {{ $countries->name }}</p>
			<p>Created At: {{ $countries->created_at }}</p>
			<p>Updated At: {{ $countries->updated_at }}</p>
		</div>
	</div>
</body>
</html>
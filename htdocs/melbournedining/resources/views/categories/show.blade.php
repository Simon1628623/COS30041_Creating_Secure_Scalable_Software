<!DOCTYPE html>
<html>
<head>
<title>Show Category</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('categories') }}">categories Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('categories') }}">View All categories</a></li>
				<li><a href="{{ URL::to('categories/create') }}">Create a Category</a>
			</ul>
		</nav>
		<h1>Showing {{ $categories->id }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $categories->id }}</p>
			<p>Name: {{ $categories->name }}</p>
			<p>Created At: {{ $categories->created_at }}</p>
			<p>Updated At: {{ $categories->updated_at }}</p>
		</div>
	</div>
</body>
</html>
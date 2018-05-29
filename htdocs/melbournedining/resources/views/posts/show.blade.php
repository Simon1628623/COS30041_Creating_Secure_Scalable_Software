<!DOCTYPE html>
<html>
<head>
<title>Show posts</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('posts') }}">posts Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('posts') }}">View All posts</a></li>
				<li><a href="{{ URL::to('posts/create') }}">Create a posts</a>
			</ul>
		</nav>
		<h1>Showing {{ $posts->id }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $posts->id }}</p>
			<p>Content: {{ $posts->content }}</p>
			<p>Created At: {{ $posts->created_at }}</p>
			<p>Updated At: {{ $posts->updated_at }}</p>
			<p>Restaurant ID: {{ $posts->restaurant_id }}</p>
			<p>User ID: {{ $posts->user_id }}</p>
		</div>
	</div>
</body>
</html>
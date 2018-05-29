<!DOCTYPE html>
<html>
<head>
<title>Show comments</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('comments') }}">comments Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('comments') }}">View All comments</a></li>
				<li><a href="{{ URL::to('comments/create') }}">Create a comments</a>
			</ul>
		</nav>
		<h1>Showing {{ $comments->id }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $comments->id }}</p>
			<p>Content: {{ $comments->content }}</p>
			<p>Created At: {{ $comments->created_at }}</p>
			<p>Updated At: {{ $comments->updated_at }}</p>
			<p>Post ID: {{ $comments->post_id }}</p>
			<p>User ID: {{ $comments->user_id }}</p>
		</div>
	</div>
</body>
</html>
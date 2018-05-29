<!DOCTYPE html>
<html>
<head>
 <title>posts (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('posts') }}">posts Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('posts') }}">View All posts</a></li>
				<li><a href="{{ URL::to('posts/create')}}">Create a posts</a>
			</ul>
		</nav>
		<h1>All the posts</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message') }}</div>
		@endif
		<table class="table table-striped table-bpostsed">
			<thead>
				<tr>
				<th>ID</th>
				<th>Content</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Restaurant ID</th>
				<th>User ID</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $key => $value)
				<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->content }}</td>
				<td>{{ $value->created_at }}</td>
				<td>{{ $value->updated_at }}</td>
				<td>{{ $value->restaurant_id }}</td>
				<td>{{ $value->user_id }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the posts (uses the destroy
				method DESTROY /posts/{id} -->
				<!-- we will add this later since its a
				little more complicated than the other two buttons -->
				<!-- Show the posts (uses the show method
				found at GET /posts/{id} -->
				<a class="btn btn-small btn-success"
				href="{{ URL::to('posts/' . $value->id) }}">Show
				this posts</a>
				<!-- Edit this posts (uses the edit
				method found at GET /posts/{id}/edit -->
				<a class="btn btn-small btn-info"
				href="{{ URL::to('posts/' . $value->id . '/edit')
				}}">Edit this posts</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>